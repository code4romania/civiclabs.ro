@formField('input', [
    'name'       => 'title',
    'type'       => 'text',
    'label'      => 'Title',
    'translated' => true,
    'maxlength'  => 100,
])

@formField('input', [
    'name'       => 'cookie_title',
    'type'       => 'text',
    'label'      => 'Cookie Title',
    'maxlength'  => 100,
    'required'   => true
])

@formField('wysiwyg', [
    'name'           => 'description',
    'label'          => 'Description',
    'toolbarOptions' => config('twill.toolbar_options'),
    'editSource'     => true,
    'translated'     => true,
])

@formField('input', [
    'name'       => 'btn_text',
    'type'       => 'text',
    'label'      => 'Button text',
    'translated' => true,
    'maxlength'  => 100,
])

@formField('input', [
    'name'       => 'a_text',
    'type'       => 'text',
    'label'      => 'Link text',
    'translated' => true,
    'maxlength'  => 100,
])

@formField('input', [
    'name'        => 'a_url',
    'type'        => 'text',
    'label'       => 'Link url',
    'placeholder' => 'http://link-example.com',
    'translated'  => true,
    'maxlength'   => 100,
])
