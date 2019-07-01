@extends('layouts.app')

@section('content')
    <section>
        @include('site.partials.hero', [
            'title'       => $header['title'],
            'description' => $header['description'],
        ])
        <div class="section">
            <div class="container">
                <div class="columns is-multiline is-centered">
                    @foreach ($items as $item)
                        @include('site.posts.loop', [
                            'item' => $item
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@stop
