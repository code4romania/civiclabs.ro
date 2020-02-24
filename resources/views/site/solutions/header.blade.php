<div class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <header class="column is-7-tablet">
                    <nav class="breadcrumb is-size-7" aria-label="breadcrumbs">
                        <ul>
                            <li><a class="is-link is-inversed" href="{{ url('/') }}">{{ __('content.home') }}</a></li>

                            @foreach ($item->domains()->get() as $domain)
                                @if ($domain->parent->first())
                                    <li>
                                        <a class="is-link is-inversed" href="{{ route('domains.show', ['domain' => $domain->parent->first()->slug ]) }}">
                                            {{ $domain->parent->first()->title }}
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a class="is-link is-inversed" href="{{ route('domains.show', ['domain' => $domain->slug ]) }}">
                                        {{ $domain->title }}
                                    </a>
                                </li>
                            @endforeach
                      </ul>
                    </nav>
                    <h1 class="title is-size-1-desktop">{{ $item->title }}</h1>

                    @if (strip_tags($item->description))
                        <div class="content">{!! $item->description !!}</div>
                    @endif

                    @if ($item->status)
                        <div class="content">
                            <p>
                                <strong>Status:</strong>
                                {{ __("solution.status.{$item->status}") }}
                            </p>
                        </div>
                    @endif


                    @if ($item->repositories)
                        <ul>
                            @foreach ($item->repositories as $repository)
                                <li class="is-inline-block">
                                    <a href="https://github.com/{{$repository}}" class="button is-primary" target="_blank" rel="noopener noreferrer">
                                        <b-icon icon="github-circle" size="is-small"></b-icon>
                                        <span>{{ $repository }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </header>
            </div>
        </div>
    </div>
</div>

@include('site.solutions.partner-stripe')
