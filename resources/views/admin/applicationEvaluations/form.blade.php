@php
    $sections = getEvalFieldsBySection($item->submission->form->blocks);

    $fieldsets = $sections->map(function($section, $sectionIndex) {
        return [
            'fieldset' => sprintf('evaluation_%d', $sectionIndex),
            'label'    => sprintf('Evaluation: %s', $section['title']),
        ];
    })->reject(function($section, $sectionIndex) use ($item) {
        return !isset($item->data[$sectionIndex]);
    })->toArray();

    // dd($sections,$fieldsets);
@endphp

@extends('twill::layouts.form', [
    'additionalFieldsets' => $fieldsets,
    'editableTitle' => false,
    'customTitle' => sprintf('Evaluation #%d', $item->id),
])

@section('contentFields')
    @formField('input', [
        'name'     => 'evaluation_author',
        'label'    => 'Evaluator',
        'readonly' => true,
    ])

    @formField('input', [
        'name'     => 'evaluation_created_date',
        'label'    => 'Date submitted',
        'readonly' => true,
    ])

    @formField('input', [
        'name'     => 'evaluation_updated_date',
        'label'    => 'Date last updated',
        'readonly' => true,
    ])

    @formField('input', [
        'name'     => 'note',
        'label'    => 'Note from evaluator',
        'type'     => 'textarea',
        'readonly' => true,
    ])
@stop

@section('fieldsets')
    @foreach ($fieldsets as $fieldsetIndex => $fieldset)
        <a17-fieldset title="{{ $fieldset['label'] }}" id="{{ $fieldset['fieldset'] }}">
            @foreach ($item->data[$fieldsetIndex] as $fieldIndex => $field)
                <a17-textfield
                    label="{{ $sections[$fieldsetIndex]['criteria'][$fieldIndex]['label'] }}"
                    name="field_{{ $fieldsetIndex }}_{{ $fieldIndex }}"
                    initial-value="{{ $field }}"
                    type="text"
                    readonly
                ></a17-textfield>
            @endforeach
        </a17-fieldset>
    @endforeach
@stop
