@extends('twill::layouts.form', [
    'contentFieldsetLabel' => 'Summary',
    'additionalFieldsets' => [
        [
            'fieldset' => 'applications',
            'label'    => 'Applications',
        ],
        [
            'fieldset' => 'media',
            'label'    => 'Media',
        ],
        [
            'fieldset' => 'github',
            'label'    => 'GitHub Repositories',
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
        'name'        => 'status',
        'label'       => 'Status',
        'required'    => true,
        'options'    => collect(config('stages.solutions'))->map(function ($stage) {
            return [
                'value' => $stage,
                'label' => __("solution.status.$stage"),
            ];
        })->toArray()
    ])

    @formField('browser', [
        'routePrefix' => 'solutions',
        'moduleName'  => 'domains',
        'name'        => 'domains',
        'label'       => 'Domains',
        'max'         => 1,
    ])

    @formField('browser', [
        'routePrefix' => '',
        'moduleName'  => 'partners',
        'name'        => 'financers',
        'label'       => 'Financed by',
        'max'         => 1,
    ])

    @formField('browser', [
        'routePrefix' => '',
        'moduleName'  => 'partners',
        'name'        => 'developers',
        'label'       => 'Developed by',
        'max'         => 10,
    ])

    @formField('browser', [
        'routePrefix' => '',
        'moduleName'  => 'partners',
        'name'        => 'applicants',
        'label'       => 'Interested NGOs',
        'max'         => 100,
    ])

    @formField('browser', [
        'routePrefix' => '',
        'moduleName'  => 'partners',
        'name'        => 'implementers',
        'label'       => 'Winner NGO',
        'max'         => 1,
    ])
@stop

@section('fieldsets')
    <a17-fieldset title="Applications" id="applications">
        @formField('browser', [
            'routePrefix' => 'applications',
            'moduleName'  => 'applicationForms',
            'name'        => 'applicationForms',
            'label'       => 'Application form',
            'max'         => 1,
        ])
        @formField('browser', [
            'routePrefix' => 'applications',
            'moduleName'  => 'dashboardUsers',
            'name'        => 'evaluators',
            'label'       => 'Evaluators',
            'max'         => 100,
        ])
    </a17-fieldset>


    <a17-fieldset title="GitHub Repositories" id="github">
        @for ($i = 0; $i < 5; $i++)
            @formField('input', [
                'name'         => "repository_{$i}",
                'label'        => 'Repository #'. ($i + 1),
                'prefix'       => 'https://github.com/',
                'placeholder'  => 'code4romania/repository',
                'required'     => false,
            ])
        @endfor
    </a17-fieldset>

    <a17-fieldset title="Media" id="media">
        @formField('input', [
            'name'         => 'prototype',
            'label'        => 'Prototype URL',
            'note'         => 'The embed is generated automatically from this url',
            'placeholder'  => 'https://',
            'required'     => true,
        ])

        @formField('input', [
            'name'         => 'video',
            'label'        => 'Video URL',
            'note'         => 'The embed is generated automatically from this url',
            'placeholder'  => 'https://',
            'required'     => true,
        ])

        @formField('medias', [
            'name'           => 'image',
            'label'          => 'Main image',
            'withVideoUrl'   => false,
            'withAddInfo'    => false,
            'max'            => 1,
        ])

        @formField('medias', [
            'name'           => 'grid',
            'label'          => 'Images grid',
            'withVideoUrl'   => false,
            'withAddInfo'    => false,
            'max'            => 7,
        ])

        @formField('block_editor', [
            'withoutSeparator' => false,
            'blocks' => [
                'byproducts', 'singleCheckbox'
            ]
        ])
    </a17-fieldset>
@stop
