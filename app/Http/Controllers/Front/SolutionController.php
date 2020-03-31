<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ApplicationSubmission;
use App\Models\Solution;
use App\Models\DashboardUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = [
            'title'       => $this->getStoredValue('solutionsTitle', 'site'),
            'description' => $this->getStoredValue('solutionsDescription', 'site'),
        ];

        $this->setSeo($header);

        return view('site.solutions.index', [
            'items'         => Solution::publishedInListings()->ordered()->get(),
            'alternateUrls' => $this->getAlternateLocaleUrls('solutions.index'),
            'header'        => $header,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = Solution::forSlug($slug)->publishedInListings()->withActiveTranslations()->firstOrFail();

        $this->setSeo([
            'title'       => $item->title,
            'description' => $item->description,
            'image'       => $item->image('image', 'default', [
                'w'   => max(config('twill.breakpoints')),
                'fit' => 'max',
            ]),
        ]);

        $ngos = (!$item->implementers->count()) ? ($item->applicants) : ($item->implementers);

        return view('site.solutions.show', [
            'item'          => $item,
            'alternateUrls' => $this->getAlternateLocaleUrls('solutions.show', $item),
            'ngos'          => $ngos->map(function ($ngo) {
                return [
                    'title' => $ngo->title,
                    'image' => $ngo->image('logo', 'default', [
                        'h' => 40,
                        'fm' => 'png',
                    ]),
                ];
            }),
        ]);
    }

    public function apply($slug)
    {
        $item = Solution::forSlug($slug)->publishedInListings()->withActiveTranslations()->firstOrFail();

        if (!$item->applicationForms->first() || !$item->applicationForms->first()->accepts_submissions) {
            abort(404);
        }

        $this->setSeo([
            'title'       => $item->title,
            'description' => $item->description,
        ]);

        return view('site.solutions.apply', [
            'item'          => $item,
            'alternateUrls' => $this->getAlternateLocaleUrls('solutions.show', $item),
            'form'          => $item->applicationForms->first(),
            'formAction'    => route('solutions.submit', ['solution' => $slug]),
        ]);
    }

    public function submit($slug, Request $request)
    {
        $item = Solution::forSlug($slug)->publishedInListings()->withActiveTranslations()->firstOrFail();
        if (!$item->applicationForms->first() || !$item->applicationForms->first()->accepts_submissions) {
            abort(404);
        }

        $validationRules = getFormValidationRules($item->applicationForms->first()->blocks);

        $attributes = $request->validate($validationRules);
        $uuid = (string) Str::uuid();


        /** Fields for extracting the name and email of the parson who submits the form. */
        $email = NULL;
        $name = NULL;

        /**
         * Upload files if available
         */
        foreach ($attributes['data'] as $sectionIndex => $section) {
            foreach ($section as $fieldIndex => $field) {
                $inputName = sprintf(
                    'data.%d.%d.value',
                    $sectionIndex,
                    $fieldIndex
                );

                if ($request->hasFile($inputName)) {
                    $fileName = sprintf(
                        '%d.%d.%s',
                        $sectionIndex,
                        $fieldIndex,
                        $request->file($inputName)->getClientOriginalName()
                    );

                    $file = $request->file($inputName)->storeAs("/{$uuid}/", $fileName, 'applicationDocuments');

                    $attributes['data'][$sectionIndex][$fieldIndex]['value'] = $fileName;
                }

                /** Search for the name */
                if ((false !== strpos(strtolower($field['label']), 'nume')) && (false !== strpos(strtolower($field['label']), 'prenume'))) {
                    $name = $field['value'];
                }

                /** Search for the email */
                if ((false !== strpos(strtolower($field['label']), 'e-mail')) || (false !== strpos(strtolower($field['label']), 'email'))) {
                    $email = $field['value'];
                }
            }
        }

        /** Extract user or create a new one. */
        $user = NULL;
        if ($email) {
            $user = DashboardUser::whereEmail($email)->first();

            if (NULL === $user) {
                $user = new DashboardUser();

                $user->fill([
                    'email'     => $email,
                    'name'      => $name,
                    'user_role' => 'applicant',
                    'published' => 1,
                ]);

                $user->save();
            }
        }

        /** Save application submission. */
        $submission = new ApplicationSubmission();
        $submission->fill([
            'uuid'              => $uuid,
            'title'             => $attributes['data'][0][0]['value'],
            'data'              => $attributes['data'],
            'dashboard_user_id' => ($user) ? ($user->id) : (NULL),
            'status'            => 'received',
        ]);

        $submission->form()->associate($item->applicationForms->first());
        $submission->solution()->associate($item);

        $submission->save();
    }
}
