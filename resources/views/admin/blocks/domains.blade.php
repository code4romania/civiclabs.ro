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
    'routePrefix' => 'solutions',
    'moduleName'  => 'domains',
    'name'        => 'domains',
    'label'       => 'Domains',
    'max'         => 20,
])
