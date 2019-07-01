@extends('twill::layouts.form', [
    'translateTitle'       => false,
    'contentFieldsetLabel' => 'Profile',
    'additionalFieldsets'  => [
        [
            'fieldset' => 'image',
            'label'    => 'Image',
        ],
        [
            'fieldset' => 'social',
            'label'    => 'Social',
        ],
        [
            'fieldset' => 'related',
            'label'    => 'Related content',
        ],
    ],
])

@section('contentFields')
    @formField('input', [
        'name'           => 'title',
        'label'          => 'Title',
        'translated'     => true,
        'maxlength'      => 200,
    ])

    @formField('input', [
        'name'           => 'fields',
        'label'          => 'Ask me about',
        'translated'     => true,
        'maxlength'      => 200,
    ])

    @formField('wysiwyg', [
        'name'           => 'bio',
        'label'          => 'Bio',
        'toolbarOptions' => config('twill.toolbar_options'),
        'editSource'     => true,
        'translated'     => true,
    ])
@stop

@section('fieldsets')
    <a17-fieldset title="Image" id="image">
        @formField('medias', [
            'name'  => 'image',
            'label' => false,
        ])
    </a17-fieldset>

    <a17-fieldset title="Social" id="social">
        @formField('input', [
            'name'       => 'facebook',
            'label'      => 'Facebook',
            'prefix'     => 'https://www.facebook.com/',
            'translated' => false,
            'maxlength'  => 50,
        ])

        @formField('input', [
            'name'       => 'twitter',
            'label'      => 'Twitter',
            'prefix'     => 'https://twitter.com/',
            'translated' => false,
            'maxlength'  => 50,
        ])

        @formField('input', [
            'name'       => 'linkedin',
            'label'      => 'LinkedIn',
            'prefix'     => 'https://www.linkedin.com/in/',
            'translated' => false,
            'maxlength'  => 50,
        ])
    </a17-fieldset>

    <a17-fieldset title="Related content" id="related">
        @formField('browser', [
            'routePrefix' => 'solutions',
            'moduleName'  => 'domains',
            'name'        => 'domains',
            'label'       => 'Domains',
            'max'         => 100,
        ])

        @formField('block_editor', [
            'withoutSeparator' => false,
            'blocks' => [
                'byproducts', 'solutions'
            ]
        ])
    </a17-fieldset>
@stop
