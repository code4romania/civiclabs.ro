@extends('layouts.app')

@section('content')
    <article>
        @include('site.partials.hero', [
            'title'       => $item->title,
            'description' => $item->description,
        ])

        @include('site.domains.progress', [
            'current' => $item->stage,
        ])
        <div class="section is-slim">
            {!! $item->renderBlocks(false) !!}
        </div>
    </article>
@stop
