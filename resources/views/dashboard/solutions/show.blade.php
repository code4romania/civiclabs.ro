@php
    $columns = collect([
        'applicant_name' => [
            'sortable'   => true,
        ],
        'application_date' => [
            'sortable'   => true,
        ],
        'vote_status' => [
            'sortable'   => true,
        ],
        'actions' => [
            'renderHtml' => true,
            'numeric'    => true,
        ],
    ])->map('mapTableColumns')->values();

    $data = $solution->applicationSubmissions->map(function($submission) use ($user) {
        switch ($user->user_role) {
            case 'financer':
                $status = __('dashboard.table.vote_status.progress', [
                    'current' => $submission->evaluations->count(),
                    'total'   => $submission->solution->evaluators->count(),
                ]);
                break;

            case 'evaluator':
                $status = ($submission->evaluations->where('evaluator_id', $user->id)->count()
                    ? __('dashboard.table.vote_status.voted')
                    : (!$submission->form->accepts_evaluations
                        ? __('dashboard.table.vote_status.expired')
                        : __('dashboard.table.vote_status.pending'))
                );
                break;
        }

        return [
            'applicant_name'   => $submission->title,
            'application_date' => $submission->submission_date,
            'vote_status'      => $status ?? '',
            'actions'          => sprintf('<a href="%s" class="button is-small is-primary">%s</a>',
                route('dashboard.submission', ['submission' => $submission]),
                __('dashboard.action.view_form')
            ),
        ];
    });
@endphp

@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="container">
            @include('dashboard.partials.header', [
                'solution' => $solution,
                'crumbs'   => [
                    [
                        'title' => $solution->title,
                        'url'   => route('dashboard.solution', ['solution' => $solution]),
                    ],
                ],
            ])

            <b-table :data="{{ $data }}" :columns="{{ $columns }}">
                <template slot="empty">
                    <section class="section">
                        <div class="content has-text-grey has-text-centered">
                            <p>
                                <b-icon icon="emoticon-sad" size="is-large"></b-icon>
                            </p>

                            <p>{{ __('dashboard.table.solutions.empty') }}</p>
                        </div>
                    </section>
                </template>
            </b-table>
        </div>
    </section>

    @if ($user->user_role == 'financer')
        @include('dashboard.evaluators.list', [
            'evaluators' => $solution->evaluators,
        ])
    @endif
@endsection
