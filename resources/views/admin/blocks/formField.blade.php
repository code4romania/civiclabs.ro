@formField('input', [
    'name'           => 'label',
    'label'          => 'Label',
    'type'           => 'text',
    'required'       => true,
    'translated'     => true,
])

@formField('input', [
    'name'           => 'help',
    'label'          => 'Help text',
    'note'           => 'Extra information, visible to the user',
    'type'           => 'text',
    'required'       => false,
    'translated'     => true,
])

@formField('select', [
    'name'       => 'type',
    'label'      => 'Type',
    'default'    => 'text',
    'options'    => [
        [
            'value' => 'text',
            'label' => 'Text',
        ],
        [
            'value' => 'textarea',
            'label' => 'Textarea',
        ],
        [
            'value' => 'url',
            'label' => 'URL',
        ],
        [
            'value' => 'email',
            'label' => 'Email',
        ],
        [
            'value' => 'number',
            'label' => 'Number',
        ],
        [
            'value' => 'date',
            'label' => 'Date',
        ],
        [
            'value' => 'file',
            'label' => 'File',
        ],
    ],
])

@formField('select', [
    'name'       => 'required',
    'label'      => 'Required',
    'default'    => 1,
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

@component('twill::partials.form.utils._connected_fields', [
    'fieldName'       => 'type',
    'fieldValues'     => 'text',
    'renderForBlocks' => true,
    'keepAlive'       => true,
])
    @formField('input', [
        'name'           => 'maxLength',
        'label'          => 'Maximum length',
        'note'           => 'Number of characters',
        'type'           => 'number',
        'required'       => false,
        'translated'     => false,
        'default'        => '',
    ])
@endcomponent

@component('twill::partials.form.utils._connected_fields', [
    'fieldName'       => 'type',
    'fieldValues'     => 'textarea',
    'renderForBlocks' => true,
    'keepAlive'       => true,
])
    @formField('input', [
        'name'           => 'maxLength',
        'label'          => 'Maximum length',
        'note'           => 'Number of characters',
        'type'           => 'number',
        'required'       => false,
        'translated'     => false,
        'default'        => '',
    ])
@endcomponent

@component('twill::partials.form.utils._connected_fields', [
    'fieldName'       => 'type',
    'fieldValues'     => 'number',
    'renderForBlocks' => true,
])
    @formField('input', [
        'name'           => 'minValue',
        'label'          => 'Minimum value',
        'type'           => 'number',
        'required'       => false,
        'translated'     => false,
        'default'        => '',
    ])

    @formField('input', [
        'name'           => 'maxValue',
        'label'          => 'Maximum value',
        'type'           => 'number',
        'required'       => false,
        'translated'     => false,
        'default'        => '',
    ])
@endcomponent

@component('twill::partials.form.utils._connected_fields', [
    'fieldName'       => 'type',
    'fieldValues'     => 'date',
    'renderForBlocks' => true,
])
    @formField('date_picker', [
        'name'           => 'minDate',
        'label'          => 'Earliest date available for selection',
        'placeholder'    => 'Select date',
        'required'       => false,
        'withTime'       => false,
        'allowClear'     => true,
    ])

    @formField('date_picker', [
        'name'           => 'maxDate',
        'label'          => 'Latest date available for selection',
        'placeholder'    => 'Select date',
        'required'       => false,
        'withTime'       => false,
        'allowClear'     => true,
    ])
@endcomponent

@component('twill::partials.form.utils._connected_fields', [
    'fieldName'       => 'type',
    'fieldValues'     => 'file',
    'renderForBlocks' => true,
])
    @formField('input', [
        'name'           => 'template',
        'label'          => 'Template file URL',
        'note'           => 'Will be offered for download',
        'type'           => 'text',
        'required'       => false,
        'translated'     => true,
    ])
@endcomponent
