<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ApplicationEvaluation;
use App\Models\ApplicationSubmission;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $current_user = auth()->user();

        return view('dashboard.index', [
            'user'      => $current_user,
            'solutions' => $current_user->authorizedSolutions,
        ]);
    }

    /**
     * Show a single solution page.
     */
    public function solution(Solution $solution)
    {
        $current_user = auth()->user();

        $submissions = $solution->applicationSubmissions;

        return view('dashboard.solutions.show', [
            'user'     => $current_user,
            'solution' => $solution,
        ]);
    }

    public function submission(ApplicationSubmission $submission)
    {
        $current_user = auth()->user();

        if (!$current_user->hasAccessToSolution($submission->solution)) {
            abort(403);
        }

        $evalSections = getEvalFieldsBySection($submission->form->blocks);

        switch ($current_user->user_role) {
            case 'evaluator':
                $evaluation = $submission->evaluations->where('evaluator_id', $current_user->id)->first();

                $evalData = collect([
                    'points' => $evaluation->data ?? [],
                    'note'   => $evaluation->note ?? '',
                ]);

                break;

            case 'financer':
                $evalData = $submission->solution->evaluators->reject(function ($member) use ($submission) {
                    return !$member->hasAccessToSolution($submission->solution);
                })->map(function ($member) use ($submission, $evalSections) {
                    $evaluation = $submission->evaluations->where('evaluator_id', $member->id)->first();

                    if (!is_null($evaluation)) {
                        $evalData = collect($evaluation->data);

                        $total = $evalData->map(function ($section) {
                            return collect($section)->reduce('sum');
                        })->reduce('sum');

                        // Combine scores with questions
                        $details = $evalSections->map(function ($section, $sectionIndex) use ($evalData) {
                            $section['criteria'] = $section['criteria']
                                ->map(function ($field, $fieldIndex) use ($evalData, $sectionIndex) {
                                    $field['value'] = number_format($evalData[$sectionIndex][$fieldIndex], 2);

                                    return $field;
                                });

                            $sum = collect($section['criteria'])->pluck('value')->reduce('sum');

                            $section['total'] = $sum;

                            return $section;
                        });
                    }

                    return [
                        'evaluator'             => $member->name,
                        'evaluation_created_at' => $evaluation
                            ? $evaluation->created_at
                            ->timezone(config('app.display_timezone'))
                            ->toDateTimeString()
                            : '-',
                        'evaluation_updated_at' => $evaluation
                            ? $evaluation->updated_at
                            ->timezone(config('app.display_timezone'))
                            ->toDateTimeString()
                            : '-',
                        'evaluation_total'      => $total ?? '-',
                        'note'                  => $evaluation->note ?? '',
                        'details'               => $details ?? [],
                    ];
                })->values();

                break;

            default:
                $evalData = null;
                break;
        }

        return view('dashboard.submissions.show', [
            'submission'   => $submission,
            'user'         => $current_user,
            'formAction'   => route('dashboard.evaluate', ['submission' => $submission]),
            'sections'     => getFormFieldsBySection($submission->form->blocks),
            'evalSections' => $evalSections,
            'evalData'     => $evalData,
        ]);
    }

    public function evaluate(ApplicationSubmission $submission, Request $request)
    {
        $current_user = auth()->user();

        if ($current_user->user_role !== 'evaluator' || !$current_user->hasAccessToSolution($submission->solution)) {
            abort(403);
        }

        $attributes = $request->validate(getEvalValidationRules($submission->form->blocks));

        $evaluation = ApplicationEvaluation::firstOrCreate([
            'evaluator_id'  => $current_user->id,
            'submission_id' => $submission->id,
        ]);

        $evaluation->fill($attributes)->save();
    }

    public function download($uuid, $filename)
    {
        $current_user = auth()->user();
        $submission = ApplicationSubmission::where('uuid', $uuid)->firstOrFail();

        if (!$current_user->hasAccessToSolution($submission->solution)) {
            abort(403);
        }

        $disk = Storage::disk('applicationDocuments');
        $path = sprintf(
            '/%s/%s',
            $uuid,
            $filename
        );

        if (!$disk->exists($path)) {
            abort(404);
        }

        return response()->stream(function () use ($path, $disk) {
            $stream = $disk->readStream($path);
            fpassthru($stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, [
            "Content-Type"        => $disk->mimeType($path),
            "Content-Length"      => $disk->size($path),
            "Content-Disposition" => "attachment; filename=\"" . basename($path) . "\"",
        ]);
    }
}
