@formField('input', [
    'type'        => 'text',
    'name'        => 'name',
    'label'       => 'Full Name',
    'required'    => true,
])

@formField('input', [
    'type'        => 'email',
    'name'        => 'email',
    'label'       => 'Email',
    'required'    => true,
])

@formField('select', [
    'name'        => 'role',
    'label'       => 'Role',
    'placeholder' => 'Select user role',
    'options'     => collect(config('dashboard.user_roles')),
])
