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
    'name'        => 'user_role',
    'label'       => 'Role',
    'required'    => true,
    'placeholder' => 'Select user role',
    'options'     => collect(config('dashboard.user_roles')),
])
