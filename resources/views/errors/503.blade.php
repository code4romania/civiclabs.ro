<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="font-sans">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Titillium+Web:400,600,700&subset=latin-ext">
    <link rel="stylesheet" href="{{ asset(mix('app.css', 'assets')) }}">

    {{-- Favicons --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/favicons/safari-pinned-tab.svg') }}" color="#ffcc00">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-config" content="{{ asset('assets/favicons/browserconfig.xml') }}">
    <meta name="theme-color" content="#000000">
</head>
<body>
    <div id="app">
        <main>
            <section class="hero is-fullheight is-light is-bold">
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <header class="columns is-centered">
                            <div class="column is-5">
                                <h1 class="title is-size-5 is-size-3-tablet">{{ nl2br(__('errors.503')) }}</h1>
                            </div>
                        </header>
                        <div class="columns is-centered">
                           <div class="column is-7 section">
                                @svg('errors/503')
                           </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="{{ asset(mix('manifest.js', 'assets')) }}"></script>
    <script src="{{ asset(mix('vendor.js', 'assets')) }}"></script>
    <script src="{{ asset(mix('app.js', 'assets')) }}"></script>

    @include('site.partials.analytics')
</body>
</html>
