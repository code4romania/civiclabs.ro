@extends('layouts.app')

@section('content')
<section class="hero is-medium">
    <div class="hero-body">
        <div class="container has-text-centered">
            <header class="columns is-centered">
                <div class="column is-5">
                    <h1 class="title is-size-4">{{ __('content.newsletterThanksTitle') }}</h1>
                    <div class="content">
                        <p>{{ __('content.newsletterThanksContent') }}</p>
                    </div>

                    <a href="{{ url('/') }}" class="button is-primary">{{ __('errors.back') }}</a>
                </div>
            </header>
        </div>
    </div>
</section>
@endsection
