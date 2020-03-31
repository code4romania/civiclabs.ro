@extends('layouts.dashboard')

@section('content')

    @if ('applicant' === $user->user_role)
        @include('dashboard.submissions.index')
    @else
        @include('dashboard.solutions.index', [
            'solutions' => $solutions,
        ])

        @if ($user->user_role == 'financer')
            @include('dashboard.evaluators.list', [
                'evaluators' => $solutions->map(function($solution) {
                    return $solution->evaluators;
                })->flatten(1)->unique('id')->sortBy('name'),
            ])
        @endif
    @endif

@endsection
