@extends('layouts.app')

@section('content')
    <article>
        @include('site.partials.hero', [
            'title'       => $item->title,
            'description' => $item->description,
        ])

        @include('site.domains.progress', [
            'prototyping_percentage' => $item->prototyping_percentage,
            'research_percentage'    => $item->research_percentage,
        ])
        <div class="section is-slim">
            {!! $item->renderBlocks(false) !!}
        </div>
    </article>
@stop
