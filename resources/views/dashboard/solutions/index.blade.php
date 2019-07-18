@php
    $columns = collect([
        'solution_name' => [
            'sortable'   => true,
        ],
        'application_count' => [
            'numeric'    => true,
            'sortable'   => true,
        ],
        'submission_deadline' => [
            'numeric'    => true,
            'sortable'   => true,
        ],
        'evaluation_deadline' => [
            'numeric'    => true,
            'sortable'   => true,
        ],
        'actions' => [
            'renderHtml' => true,
            'numeric'    => true,
        ],
    ])->map('mapTableColumns')->values();

    $data = $solutions->map(function($solution) {
        $form = $solution->applicationForms->first();

        return [
            'solution_name'       => $solution->title,
            'application_count'   => $solution->applicationSubmissions->count(),
            'submission_deadline' => $form->submission_deadline ?? '–',
            'evaluation_deadline' => $form->evaluation_deadline ?? '–',
            'actions'             => sprintf('<a href="%s" class="button is-small is-primary">%s</a>',
                route('dashboard.solution', ['solution' => $solution]),
                __('dashboard.action.view_submissions')
            ),
        ];
    });
@endphp

<section class="section">
    <div class="container">
        <header class="section is-slim">
            <h1 class="title">{{ __('dashboard.solutions.title') }}</h1>
        </header>

        <b-table :data="{{ $data }}" :columns="{{ $columns }}"></b-table>
    </div>
</section>
