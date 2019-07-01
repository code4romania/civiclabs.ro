@formField('input', [
    'name'           => 'name',
    'label'          => 'Name',
    'type'           => 'text',
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

@formField('repeater', [
    'type' => 'formField',
])
