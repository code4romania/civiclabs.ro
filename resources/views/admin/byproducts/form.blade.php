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

    @formField('color', [
        'name'           => 'background_color',
        'label'          => 'Background color',
    ])

    @formField('color', [
        'name'           => 'text_color',
        'label'          => 'Text color',
    ])

    @formField('medias', [
        'name'           => 'image',
        'label'          => 'Image',
        'translated'     => false,
        'type'           => 'number',
    ])

    @formField('files', [
        'name'           => 'attachment',
        'label'          => 'Attachment',
    ])

    @formField('browser', [
        'routePrefix'    => '',
        'moduleName'     => 'people',
        'name'           => 'people',
        'label'          => 'Authors',
        'max'            => 2,
    ])
@stop

@section('fieldsets')
    <a17-fieldset title="Content" id="content-blocks">
        @formField('checkbox', [
            'name'  => 'standalone_page',
            'label' => 'Enable standalone page',
        ])

        @formField('block_editor', [
            'withoutSeparator' => false,
        ])
    </a17-fieldset>
@stop
