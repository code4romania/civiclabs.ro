@extends('layouts.app')

@section('content')
    <article>
        @include('site.partials.hero', [
            'title'       => $item->title,
            'description' => $item->description,
        ])
        <div class="section is-slim">
            {!! $item->renderBlocks(false) !!}
        </div>
    </article>
@stop
