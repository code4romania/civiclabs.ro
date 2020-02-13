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
    @formField('select', [
      'name'        => 'layout',
      'label'       => 'Layout',
      'required'    => true,
      // 'options'    => collect(config('layouts.pages')),
      'options'    => collect(config('layouts.pages'))->map(function ($layout) {
          return [
              'value' => $layout,
              'label' => __("layouts.$layout"),
          ];
      })->toArray(),
    ])

    @formField('wysiwyg', [
        'name'           => 'description',
        'label'          => 'Description',
        'toolbarOptions' => config('twill.toolbar_options'),
        'editSource'     => true,
        'translated'     => true,
    ])
@stop

@section('fieldsets')
    <a17-fieldset title="Content" id="content-blocks">
        @formField('block_editor', [
            'withoutSeparator' => true,
        ])
    </a17-fieldset>
@stop
