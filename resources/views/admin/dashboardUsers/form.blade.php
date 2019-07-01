@extends('twill::layouts.form',[
    'contentFieldsetLabel' => 'Profile',
    'editableTitle'        => false,
])

@section('contentFields')
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

    @component('twill::partials.form.utils._connected_fields', [
        'fieldName'       => 'user_role',
        'fieldValues'     => 'financer',
        'renderForBlocks' => false,
        'keepAlive'       => true,
    ])
        @formField('browser', [
            'routePrefix' => '',
            'moduleName'  => 'partners',
            'name'        => 'partners',
            'label'       => 'Partner',
            'max'         => 1,
        ])
    @endcomponent

    @component('twill::partials.form.utils._connected_fields', [
        'fieldName'       => 'user_role',
        'fieldValues'     => 'evaluator',
        'renderForBlocks' => false,
        'keepAlive'       => true,
    ])
        @formField('browser', [
            'routePrefix' => 'solutions',
            'moduleName'  => 'solutions',
            'name'        => 'solutions',
            'label'       => 'Solutions',
            'max'         => 100,
        ])
    @endcomponent
@stop
