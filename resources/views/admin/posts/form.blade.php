@extends('twill::layouts.form', [
    'contentFieldsetLabel' => 'Summary',
    'additionalFieldsets' => [
        [
            'fieldset' => 'content-blocks',
            'label'    => 'Content',
        ],
    ],
])

@section('contentFields')
    @formField('input', [
        'name'           => 'subtitle',
        'label'          => 'Subtitle',
        'type'           => 'text',
        'required'       => false,
        'translated'     => true,
        'maxlength'      => 100,
    ])

    @formField('input', [
        'name'           => 'description',
        'label'          => 'Short description',
        'type'           => 'textarea',
        'toolbarOptions' => config('twill.toolbar_options'),
        'editSource'     => true,
        'translated'     => true,
        'maxlength'      => 300,
    ])

    @formField('medias', [
        'name'           => 'image',
        'label'          => 'Cover',
        'withVideoUrl'   => false,
        'withAddInfo'    => false,
        'maxlength'      => 1
    ])

    @formField('browser', [
        'routePrefix' => '',
        'moduleName'  => 'people',
        'name'        => 'people',
        'label'       => 'Author',
        'max'         => 1,
    ])

@stop

@section('fieldsets')
    <a17-fieldset title="Content" id="content-blocks">
        @formField('block_editor', [
            'withoutSeparator' => true,
        ])
    </a17-fieldset>
@stop
