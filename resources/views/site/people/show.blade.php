@extends('layouts.app')

@section('content')
    <article class="team-profile">
        <header class="hero">
            <div class="container is-fluid">
                <div class="columns is-multiline is-reversed">
                    <div class="column is-12-tablet is-6-desktop has-hero-image">
                        @include('site.people.headerImage', [
                            'item' => $item
                        ])
                    </div>
                    <div class="column is-12-tablet is-6-desktop is-5-fullhd">
                        <div class="hero-body">
                            <h1 class="title is-size-1-desktop">{{ $item->name }}</h1>

                            @if ($item->title)
                                <h2 class="subtitle">{{ $item->title }}</h2>
                            @endif

                            @if (strip_tags($item->bio))
                                <div class="content">{!! $item->bio !!}</div>
                            @endif

                            <dl>
                                @if ($item->fields)
                                    <dt>{{ __('content.askme') }}</dt>
                                    <dd>{{ $item->fields }}</dd>
                                @endif

                                <dt>{{ __('content.followme') }}</dt>
                                <dd>
                                    @foreach (['facebook', 'twitter', 'linkedin'] as $platform)
                                        @continue(!$item->$platform)

                                        @php
                                            switch($platform) {
                                                case 'facebook':
                                                    $platformUrl = 'https://www.facebook.com/';
                                                    break;

                                                case 'twitter':
                                                    $platformUrl = 'https://twitter.com/';
                                                    break;

                                                case 'linkedin':
                                                    $platformUrl = 'https://www.linkedin.com/in/';
                                                    break;
                                            }
                                        @endphp

                                        <a href="{{ $platformUrl }}{{ $item->$platform }}" class="has-button" target="_blank" rel="noopener noreferrer">
                                            <b-icon icon="{{ $platform }}"></b-icon>
                                            @svg('button')
                                        </a>
                                    @endforeach
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @if ($item->domains->count())
            <div class="section">
                <div class="container">
                    <h1 class="title">{{ __('content.domains') }}</h1>

                    <div class="columns is-multiline">
                        @foreach ($item->domains as $domain)
                            <div class="column is-6-tablet is-4-widescreen domain {{ !$domain->published ? 'is-inactive' : '' }}">
                                <div class="media">
                                    <div class="media-left">
                                        @svg('corner', 'image is-48x48')
                                    </div>
                                    <div class="media-content">
                                        @if (!$domain->published)
                                            <strong>{{ $domain->title }}</strong>
                                        @else
                                            <strong>
                                                <a class="is-link is-inversed" href="{{ route('domains.show', [ 'domain' => $domain->slug ]) }}">{{ $domain->title }}</a>
                                            </strong><br>

                                            @foreach ($domain->subdomains as $subdomain)
                                                <a class="is-link is-inversed" href="{{ route('domains.show', [ 'domain' => $subdomain->slug ]) }}">{{ $subdomain->title }}</a><br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if ($item->latestPosts->count())
            <div class="section">
                <div class="container">
                    <h1 class="title">{{ __('content.blog') }}</h1>

                    <div class="columns is-multiline is-centered">
                        @foreach ($item->latestPosts as $post)
                            @include('site.posts.loop', [
                                'item'   => $post,
                                'author' => false,
                            ])
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="section is-slim">
            <div class="container block">
                <h1 class="title">{{ __('content.materials') }}</h1>
            </div>
            {!! $item->renderBlocks(false, [], ['profilePage' => true]) !!}
        </div>
    </article>
@stop
