@extends('twill::layouts.settings', [
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
            'fieldset' => 'homepage',
            'label'    => 'Homepage',
        ],
        [
            'fieldset' => 'domains',
            'label'    => 'Domains',
        ],
        [
            'fieldset' => 'solutions',
            'label'    => 'Solutions',
        ],
        [
            'fieldset' => 'blog',
            'label'    => 'Blog',
        ],
    ],
])

@section('contentFields')
    @formField('input', [
        'name'       => 'siteDescription',
        'label'      => 'Site description',
        'type'       => 'textarea',
        'translated' => true,
        'maxlength'  => 300
    ])
@stop

@section('fieldsets')
    <a17-fieldset title="Homepage" id="homepage">
        @php
            $pages = App\Models\Page::all()->map(function($item) {
                return [
                    'value' => $item->id,
                    'label' => $item->title,
                ];
            })->toArray();
        @endphp

        @formField('select', [
            'name'         => 'frontPage',
            'label'        => 'Front page',
            'native'       => true,
            'max'          => 1,
            'options'      => $pages,
        ])

        @formField('medias', [
            'name'           => 'frontMedia',
            'label'          => 'Media',
        ])
    </a17-fieldset>

    <a17-fieldset title="Domains" id="domains">
        @formField('input', [
            'name'           => 'domainsTitle',
            'label'          => 'Title',
            'type'           => 'text',
            'translated'     => true,
        ])

        @formField('wysiwyg', [
            'name'           => 'domainsDescription',
            'label'          => 'Description',
            'toolbarOptions' => config('twill.toolbar_options'),
            'translated'     => true,
            'editSource'     => true,
        ])
    </a17-fieldset>

    <a17-fieldset title="Solutions" id="solutions">
        @formField('input', [
            'name'           => 'solutionsTitle',
            'label'          => 'Title',
            'type'           => 'text',
            'translated'     => true,
        ])

        @formField('wysiwyg', [
            'name'           => 'solutionsDescription',
            'label'          => 'Description',
            'toolbarOptions' => config('twill.toolbar_options'),
            'translated'     => true,
            'editSource'     => true,
        ])
    </a17-fieldset>

    <a17-fieldset title="Blog" id="blog">
        @formField('input', [
            'name'           => 'blogTitle',
            'label'          => 'Title',
            'type'           => 'text',
            'translated'     => true,
        ])

        @formField('wysiwyg', [
            'name'           => 'blogDescription',
            'label'          => 'Description',
            'toolbarOptions' => config('twill.toolbar_options'),
            'translated'     => true,
            'editSource'     => true,
        ])
    </a17-fieldset>
@stop
