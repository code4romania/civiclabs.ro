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

@formField('browser', [
    'routePrefix' => '',
    'moduleName'  => 'people',
    'name'        => 'people',
    'label'       => 'People',
    'max'         => 20,
])
