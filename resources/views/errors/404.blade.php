@extends('layouts.app')

@section('content')
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container has-text-centered">
                <header class="columns is-centered">
                    <div class="column is-5">
                        <h1 class="title">{{ __('errors.404') }}</h1>

                        <a href="{{ url('/') }}" class="button is-medium is-primary">{{ __('errors.back') }}</a>
                    </div>
                </header>
                <div class="columns is-centered">
                   <div class="column is-7 section">
                        @svg('errors/404')
                   </div>
                </div>
            </div>
        </div>
    </section>
@endsection
