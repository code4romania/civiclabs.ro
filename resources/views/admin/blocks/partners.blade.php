@formField('input', [
    'name'           => 'title',
    'type'           => 'text',
    'label'          => 'Section title',
    'required'       => true,
    'translated'     => true,
])

@formField('wysiwyg', [
    'name'           => 'description',
    'label'          => 'Description',
    'toolbarOptions' => config('twill.toolbar_options'),
    'editSource'     => true,
    'translated'     => true,
])

@formField('select', [
    'name'       => 'width',
    'label'      => 'Logo size',
    'default'    => 'third',
    'unpack'     => true,
    'options'    => [
        [
            'value' => 'quarter',
            'label' => '25%',
        ],
        [
            'value' => 'third',
            'label' => '33%',
        ],
        [
            'value' => 'half',
            'label' => '50%',
        ],
    ],
])

@formField('select', [
    'name'       => 'displayNames',
    'label'      => 'Display partner names',
    'default'    => 0,
    'options'    => [
        [
            'value' => 0,
            'label' => 'No',
        ],
        [
            'value' => 1,
            'label' => 'Yes',
        ],
    ],
])


@formField('browser', [
    'routePrefix'    => '',
    'moduleName'     => 'partners',
    'name'           => 'partners',
    'label'          => 'Partners',
    'max'            => 20,
])
