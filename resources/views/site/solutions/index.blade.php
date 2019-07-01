@extends('layouts.app')

@section('content')
    <article>
        @include('site.partials.hero', [
            'title'       => $header['title'],
            'description' => $header['description'],
        ])
        <div class="section">
            <div class="container">
                @include('site.solutions.filter')

                <div class="columns is-multiline">
                    @foreach ($items as $item)
                        @include('site.solutions.loop')
                    @endforeach
                </div>
            </div>
        </div>
    </article>
@stop
