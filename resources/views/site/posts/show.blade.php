@extends('layouts.app')

@section('content')
    <article class="blog-post">
        <header class="hero is-medium">
            <div class="container is-fluid">
                <div class="columns is-multiline is-reversed">
                    <div class="column is-12-tablet is-6-desktop has-hero-image">
                        @include('site.posts.headerImage', [
                            'item' => $item
                        ])
                    </div>
                    <div class="column is-12-tablet is-6-desktop is-5-fullhd">
                        <div class="hero-body">
                            <div class="post-meta">
                                @include('site.partials.timePublishStart', [
                                    'item' => $item
                                ])
                            </div>

                            <h1 class="title is-size-1-desktop">{{ $item->title }}</h1>

                            @if ($item->subtitle)
                                <h2 class="subtitle">{{ $item->subtitle }}</h2>
                            @endif

                            @if (strip_tags($item->description))
                                <div class="content">{!! $item->description !!}</div>
                            @endif

                            @include('site.people.card', [
                                'author' => $item->people()->first()
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="section is-slim">
            {!! $item->renderBlocks(false) !!}
        </div>
    </article>
@stop
