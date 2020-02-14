@formField('input', [
    'name'           => 'header',
    'label'          => 'Header',
    'translated'     => true,
])

@formField('wysiwyg', [
    'name'           => 'description',
    'label'          => 'Description',
    'toolbarOptions' => config('twill.toolbar_options'),
    'translated'     => true,
    'editSource'     => true,
])

@formField('input', [
    'name'       => 'button_text',
    'type'       => 'text',
    'label'      => 'Button text',
    'translated' => true,
    'maxlength'  => 100,
])

@formField('input', [
    'name'       => 'button_url',
    'type'       => 'text',
    'label'      => 'Button link',
    'translated' => true,
    'maxlength'  => 100,
])
