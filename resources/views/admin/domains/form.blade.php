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
    @formField('wysiwyg', [
        'name'           => 'description',
        'label'          => 'Description',
        'toolbarOptions' => config('twill.toolbar_options'),
        'editSource'     => true,
        'translated'     => true,
    ])

    @formField('select', [
        'name'       => 'stage',
        'label'      => 'Domain stage',
        'default'    => 'mapping',
        'unpack'     => false,
        'options'    => collect(config('stages.domains'))->map(function ($stage) {
            return [
                'value' => $stage,
                'label' => __("domain.stage.$stage"),
            ];
        })->toArray(),
    ])

    @formField('input', [
        'name'         => 'research_percentage',
        'label'        => 'Research percentage',
        'note'         => 'The completion percentage of the research.',
        'type'         => 'number',
        'required'     => false,
        'default'      => 0,
    ])

    @formField('input', [
        'name'         => 'prototyping_percentage',
        'label'        => 'Prototyping percentage',
        'note'         => 'The completion percentage of the prototyping.',
        'type'         => 'number',
        'required'     => false,
        'default'      => 0,
    ])

    @formField('medias', [
        'name'         => 'image',
        'label'        => 'Image',
        'withVideoUrl' => false,
        'withAddInfo'  => false,
        'maxlength'    => 1,
    ])

    @formField('browser', [
        'name'         => 'subdomains',
        'label'        => 'Subdomains',
        'moduleName'   => 'domains',
        'max'          => 100,
    ])

    @formField('browser', [
        'routePrefix' => 'solutions',
        'moduleName'  => 'solutions',
        'name'        => 'solutions',
        'label'       => 'Solutions',
        'max'         => 100,
    ])

    @formField('browser', [
        'routePrefix' => '',
        'moduleName'  => 'partners',
        'name'        => 'financers',
        'label'       => 'Financers',
        'max'         => 10,
    ])
@stop

@section('fieldsets')
    <a17-fieldset title="Content" id="content-blocks">
        @formField('block_editor', [
            'withoutSeparator' => true,
        ])
    </a17-fieldset>
@stop
