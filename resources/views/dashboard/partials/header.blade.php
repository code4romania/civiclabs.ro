<header class="section is-slim">
    <nav class="breadcrumb is-size-7" aria-label="breadcrumbs">
        <ul>
            <li>
                <a class="is-link is-inversed" href="{{ route('dashboard.home') }}">
                    {{ __('dashboard.nav.home') }}
                </a>
            </li>

            @foreach ($crumbs as $crumb)
                <li {!! $loop->last ? 'class="is-active"' : '' !!}>
                    <a @if ($crumb['url'] ?? false) href="{{ $crumb['url'] }}" class="is-link is-inversed" @endif>
                        {{ $crumb['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    <h1 class="title">
        <span>{{ $solution->title }}</span>
        <a href="{{ Localization::getLocalizedURL(App::getLocale(), route('solutions.show', ['solution' => $solution->slug])) }}" target="_blank">
            <b-icon icon="open-in-new"></b-icon>
        </a>
    </h1>
    <div class="content">
        {!! $solution->description !!}

        @if ($solution->applicationForms->first())
            <p>
                <strong>{{ __('dashboard.table.evaluation_deadline') }}:</strong>
                {{ $solution->applicationForms->first()->evaluation_deadline_tz }}
            </p>
        @endif
    </div>
</header>
