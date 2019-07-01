@formField('input', [
    'name'       => 'title',
    'type'       => 'text',
    'label'      => 'Section title',
    'required'   => true,
    'translated' => true,
])

@formField('wysiwyg', [
    'name'           => 'description',
    'label'          => 'Description',
    'toolbarOptions' => config('twill.toolbar_options'),
    'editSource'     => true,
    'translated'     => true,
])

@formField('select', [
    'name'       => 'columns',
    'label'      => 'Columns',
    'default'    => 1,
    'unpack'     => true,
    'options'    => [
        [
            'value' => 1,
            'label' => 1,
        ],
        [
            'value' => 2,
            'label' => 2,
        ],
        [
            'value' => 3,
            'label' => 3,
        ],
    ],
])

@formField('repeater', [
    'type' => 'textBoxItem'
])
