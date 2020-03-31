@php
    $sections = getFormFieldsBySection($item->form->blocks);

    $fieldsets = $sections->map(function($section, $sectionIndex) {
        return [
            'fieldset' => sprintf('section_%d', $sectionIndex),
            'label'    => $section['title'],
        ];
    })->reject(function($section, $sectionIndex) use ($item) {
        return !isset($item->data[$sectionIndex]);
    })->toArray();
@endphp

@extends('twill::layouts.form', [
    'additionalFieldsets' => $fieldsets,
])

@section('contentFields')
    @formField('input', [
        'name'     => 'submission_date',
        'label'    => 'Submission date',
        'readonly' => true,
    ])

    @formField('input', [
        'name'     => 'form_name',
        'label'    => 'Form',
        'readonly' => true,
    ])

    @formField('input', [
        'name'     => 'solution_name',
        'label'    => 'Solution',
        'readonly' => true,
    ])

    @formField('select', [
        'name'        => 'status',
        'label'       => 'Status',
        'required'    => true,
        'options'    => collect(config('dashboard.application_submissions_statuses'))->map(function ($stage) {
            return [
                'value' => $stage,
                'label' => __("dashboard.application_submissions_statuses.$stage"),
            ];
        })->toArray()
    ])
@stop

@section('fieldsets')
    @foreach ($fieldsets as $fieldsetIndex => $fieldset)
        <a17-fieldset title="{{ $fieldset['label'] }}" id="{{ $fieldset['fieldset'] }}">
            @continue(!isset($item->data[$fieldsetIndex]))
            @foreach ($item->data[$fieldsetIndex] as $fieldIndex => $field)
                <a17-textfield
                    label="{{ $field['label'] }}"
                    name="field_{{ $fieldsetIndex }}_{{ $fieldIndex }}"
                    @if ($sections[$fieldsetIndex]['fields'][$fieldIndex]['help'])
                        note="{{ $sections[$fieldsetIndex]['fields'][$fieldIndex]['help'] }}"
                    @endif
                    initial-value="{{ $field['value'] }}"
                    type="text"
                    readonly
                ></a17-textfield>
            @endforeach
        </a17-fieldset>
    @endforeach
@stop
