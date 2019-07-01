@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
        'name'       => 'facebook',
        'label'      => 'Facebook',
        'prefix'     => 'https://www.facebook.com/',
        'translated' => false,
        'maxlength'  => 50,
    ])

    @formField('input', [
        'name'       => 'twitter',
        'label'      => 'Twitter',
        'prefix'     => 'https://twitter.com/',
        'translated' => false,
        'maxlength'  => 50,
    ])

    @formField('input', [
        'name'       => 'linkedin',
        'label'      => 'LinkedIn',
        'prefix'     => 'https://www.linkedin.com/',
        'translated' => false,
        'maxlength'  => 50,
    ])
@stop
