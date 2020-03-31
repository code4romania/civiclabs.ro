@php
    $columns = collect([
        'solution_name' => [
            'sortable'   => true,
        ],
        'application_date' => [
            'sortable'   => true,
        ],
        'submission_status' => [
            'sortable'   => true,
        ],
        'actions' => [
            'renderHtml' => true,
            'numeric'    => true,
        ],
    ])->map('mapTableColumns')->values();

    $data = Auth::user()->applicationSubmissions->map(function($submission) {
        $solution = $submission->solution->first();

        return [
            'solution_name'     => $submission->solution->title,
            'application_date'  => $submission->submission_date,
            'submission_status' => __("dashboard.application_submissions_statuses.$submission->status") ?? '–',
            'actions'           => sprintf('<a href="%s" class="button is-small is-primary">%s</a>',
                route('solutions.show', ['solution' => $submission->solution->slug]),
                __('dashboard.action.view_solution')
            ),
        ];
    });
@endphp

<section class="section">
    <div class="container">
        <header class="section is-slim">
            <h1 class="title">{{ __('dashboard.submissions.title') }}</h1>
        </header>

        <b-table :data="{{ $data }}" :columns="{{ $columns }}"></b-table>
    </div>
</section>
