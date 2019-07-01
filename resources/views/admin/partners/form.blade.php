@extends('twill::layouts.form')

@section('contentFields')
    @formField('medias', [
        'name'           => 'logo',
        'label'          => 'Logo',
        'withVideoUrl'   => false,
        'withAddInfo'    => false,
        'withCaption'    => false,
        'maxlength'      => 1
    ])

    @formField('input', [
        'name'        => 'website',
        'label'       => 'Website',
        'type'        => 'text',
    ])

    @formField('checkbox', [
        'name'       => 'featured',
        'label'      => 'Featured as main partner',
    ])

    @formField('browser', [
        'routePrefix' => 'solutions',
        'moduleName'  => 'domains',
        'name'        => 'financesDomains',
        'label'       => 'Domains financed',
        'max'         => 100,
    ])

    @formField('browser', [
        'routePrefix' => 'solutions',
        'moduleName'  => 'solutions',
        'name'        => 'financesSolutions',
        'label'       => 'Solutions financed',
        'max'         => 100,
    ])

    @formField('browser', [
        'routePrefix' => 'solutions',
        'moduleName'  => 'solutions',
        'name'        => 'implementsSolutions',
        'label'       => 'Solutions implemented',
        'max'         => 100,
    ])

    @formField('browser', [
        'routePrefix' => 'solutions',
        'moduleName'  => 'solutions',
        'name'        => 'developsSolutions',
        'label'       => 'Solutions developed',
        'max'         => 100,
    ])
@stop
