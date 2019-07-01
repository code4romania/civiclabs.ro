<article class="column is-6-tablet is-4-desktop">
    <a href="{{ route('dashboard.solutions', [ 'solution' => $solution ]) }}" class="card">
        <div class="card-header">
            <p class="card-header-title is-size-5">{{ $solution->title }}</p>
            <span class="card-header-icon">
                <div class="tag tag-{{ $solution->status }}">
                    {{ __("solution.status.{$solution->status}") }}
                </div>
            </span>
        </div>
        <div class="card-content">
            <div class="content">
                <p>{{ $solution->domains->pluck('title')->join(', ') }}</p>

                <p>
                    <strong>
                        {{ trans_choice('dashboard.solutions.proposals', $solution->applicationSubmissions->count()) }}
                    </strong>
                </p>
            </div>
        </div>
    </a>
</article>
