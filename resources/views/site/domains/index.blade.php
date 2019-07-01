@extends('layouts.app')

@section('content')
    <article>
        @include('site.partials.hero', [
            'title'       => $header['title'],
            'description' => $header['description'],
        ])
        <div class="section">
            <div class="container team-list">
                <div class="columns is-multiline">
                    @foreach ($items as $item)
                        @continue(!$item->subdomains->count())
                        @include('site.domains.loop')
                    @endforeach
                </div>
            </div>
        </div>
    </article>
@stop
