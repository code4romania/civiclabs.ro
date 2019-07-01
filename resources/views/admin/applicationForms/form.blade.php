@extends('twill::layouts.form', [
    'additionalFieldsets' => [
        [
            'fieldset' => 'form',
            'label'    => 'Form',
        ],
    ],
])

@section('contentFields')
    @formField('wysiwyg', [
        'name'           => 'description',
        'label'          => 'Description',
        'toolbarOptions' => config('twill.toolbar_options'),
        'editSource'     => true,
        'translated'     => true,
    ])

    @formField('date_picker', [
        'name'           => 'submission_deadline',
        'label'          => 'Submission Deadline',
        'placeholder'    => 'Select date',
        'required'       => false,
        'withTime'       => true,
    ])

    @formField('date_picker', [
        'name'           => 'evaluation_deadline',
        'label'          => 'Evaluation Deadline',
        'placeholder'    => 'Select date',
        'required'       => false,
        'withTime'       => true,
    ])

    @formField('browser', [
        'routePrefix' => 'solutions',
        'moduleName'  => 'solutions',
        'name'        => 'solutions',
        'label'       => 'Solutions',
        'max'         => 100,
    ])

    @formField('browser', [
        'routePrefix' => 'applications',
        'moduleName'  => 'dashboardUsers',
        'name'        => 'evaluators',
        'label'       => 'Jury members',
        'max'         => 100,
    ])
@stop

@section('fieldsets')
    <a17-fieldset title="Form" id="form">
        @formField('block_editor', [
            'withoutSeparator' => true,
            'blocks' => [
                'formSection',
                'evalSection',
            ],
        ])
    </a17-fieldset>
@stop
