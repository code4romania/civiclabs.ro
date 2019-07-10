<?php

use Carbon\Carbon;

function getFormFieldParams($field)
{
    $config = [
        'type'       => $field->input('type'),
        'label'      => $field->translatedinput('label'),
        'help'       => $field->translatedinput('help'),
        'required'   => (bool) $field->input('required'),
        'validation' => [],
    ];

    if ($config['required']) {
        $config['validation'][] = 'required';
    } else {
        $config['validation'][] = 'nullable';
    }

    switch ($config['type']) {
        case 'date':
            /**
             * If passed, minDate and maxDate have to be actual dates. This sets reasonable defaults if no explicit
             * values configured
             *
             * @link https://github.com/buefy/buefy/blob/2da91e4a705c287caae120584a6a268db937d206/src/components/datepicker/Datepicker.vue#L231
             */

            if ($field->input('minDate')) {
                $minDate = Carbon::parse($field->input('minDate'), config('app.display_timezone'));
            } else {
                $minDate = Carbon::today()->subYears(5);
            }

            if ($field->input('maxDate')) {
                $maxDate = Carbon::parse($field->input('maxDate'), config('app.display_timezone'));
            } else {
                $maxDate = Carbon::today()->addYears(5);
            }

            $config['minDate'] = $minDate->toIso8601String();
            $config['maxDate'] = $maxDate->toIso8601String();

            if (Carbon::today()->greaterThan($config['minDate'])) {
                $config['focusedDate'] = Carbon::today()->toIso8601String();
            } else {
                $config['focusedDate'] = $config['minDate'];
            }

            $config['validation'][] = 'date';
            $config['validation'][] = sprintf('after_or_equal:%s', $minDate->format('Y-m-d'));
            $config['validation'][] = sprintf('before_or_equal:%s', $maxDate->format('Y-m-d'));

            break;

        case 'file':
            if ($templateUrl = $field->translatedinput('template')) {
                $config['template']   = [
                    'url'   => $templateUrl,
                    'label' => __('dashboard.file.template'),
                ];
            }
            $config['maxSize']    = intval($field->input('maxSize')) ?: false;
            $config['inputLabel'] = __('dashboard.file.choose');


            $config['validation'][] = 'file';
            if ($config['maxSize']) {
                $config['validation'][] = sprintf('min:%d', $config['maxSize'] * 1024);
            }
            break;

        case 'number':
            $config['minValue']   = intval($field->input('minValue')) ?: false;
            $config['maxValue']   = intval($field->input('maxValue')) ?: false;

            $config['validation'][] = 'integer';

            if ($config['minValue']) {
                $config['validation'][] = sprintf('min:%d', $config['minValue']);
            }

            if ($config['maxValue']) {
                $config['validation'][] = sprintf('max:%d', $config['maxValue']);
            }

            break;

        case 'email':
            $config['validation'][] = 'email';
            break;

        case 'url':
            $config['validation'][] = 'url';
            break;

        default:
            /**
             * The input component expects this as a number or string.
             * Setting this to 0 effectively makes the field read-only, while any
             * other value will enable the character counter.
             *
             * @link https://github.com/buefy/buefy/blob/2da91e4a705c287caae120584a6a268db937d206/src/utils/FormElementMixin.js#L13
             */
            $config['maxLength']  = intval($field->input('maxLength')) ?: '';

            $config['validation'][] = 'string';

            if ($config['maxLength']) {
                $config['validation'][] = sprintf('max:%d', $config['maxLength']);
            }
            break;
    }

    return $config;
}

function getFormFieldsBySection($blocks)
{
    return $blocks
        ->where('type', 'formSection')
        ->where('parent_id', null)
        ->map(function ($section) use ($blocks) {
            return [
                'title' => $section->translatedinput('name'),
                'description' => $section->translatedinput('description'),
                'fields' => $blocks
                    ->where('type', 'formField')
                    ->where('parent_id', $section->id)
                    ->map('getFormFieldParams')
                    ->values(),
            ];
        })->values();
}

function getEvalFieldsBySection($blocks)
{
    return $blocks
        ->where('type', 'evalSection')
        ->where('parent_id', null)
        ->map(function ($section, $sectionIndex) use ($blocks) {
            return [
                'title' => $section->translatedinput('name'),
                'criteria' => $blocks
                    ->where('type', 'evalField')
                    ->where('parent_id', $section->id)
                    ->map(function ($field, $fieldIndex) {
                        return [
                            'label' => $field->translatedinput('label'),
                        ];
                    })
                    ->values(),
            ];
        })->values();
}


function getFormValidationRules($blocks)
{
    $validationRules = [];

    $sections = getFormFieldsBySection($blocks);
    foreach ($sections as $sectionIndex => $section) {
        foreach ($section['fields'] as $fieldIndex => $field) {
            $validationRules["data.${sectionIndex}.${fieldIndex}.label"] = [];
            $validationRules["data.${sectionIndex}.${fieldIndex}.value"] = $field['validation'];
        }
    }

    return $validationRules;
}

function getEvalValidationRules($blocks)
{
    $validationRules = [];

    $sections = getEvalFieldsBySection($blocks);
    foreach ($sections as $sectionIndex => $section) {
        foreach ($section['criteria'] as $fieldIndex => $field) {
            $validationRules["data.${sectionIndex}.${fieldIndex}"] = [
                'numeric', 'min:1', 'max:5',
            ];
        }
    }

    $validationRules['note'] = ['string', 'nullable'];

    return $validationRules;
}
