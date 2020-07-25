<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ApplicationSubmission;
use App\Models\Solution;
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

        $solutions = Solution::with([
            'domains',
            'medias',
            'financers',
            'applicants',
            'implementers',
            'developers',
        ]);

        return view('site.solutions.index', [
            'items'         => $solutions
                ->publishedInListings()
                ->ordered()
                ->get(),
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
        $item = Solution::forSlug($slug)
            ->publishedInListings()
            ->withActiveTranslations()
            ->firstOrFail();

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
        $item = Solution::forSlug($slug)
            ->publishedInListings()
            ->withActiveTranslations()
            ->firstOrFail();

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
        $item = Solution::forSlug($slug)
            ->publishedInListings()
            ->withActiveTranslations()
            ->firstOrFail();

        if (!$item->applicationForms->first() || !$item->applicationForms->first()->accepts_submissions) {
            abort(404);
        }

        $validationRules = getFormValidationRules($item->applicationForms->first()->blocks);

        $attributes = $request->validate($validationRules);
        $uuid = (string) Str::uuid();

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
            }
        }

        $submission = new ApplicationSubmission();
        $submission->fill([
            'uuid'  => $uuid,
            'title' => $attributes['data'][0][0]['value'],
            'data'  => $attributes['data'],
        ]);

        $submission->form()->associate($item->applicationForms->first());
        $submission->solution()->associate($item);

        $submission->save();
    }
}
