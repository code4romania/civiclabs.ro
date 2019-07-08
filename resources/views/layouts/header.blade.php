@php
    $alternateUrls = $alternateUrls ?? [];
@endphp

<nav class="navbar is-spaced has-shadow" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ url('/') }}">
            @svg('logo', 'logo')
        </a>

        <a class="navbar-burger" aria-label="menu"
            v-on:click="isNavbarOpen = !isNavbarOpen"
            v-bind:class="{ 'is-active': isNavbarOpen }">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div aria-id="navbarTop" class="navbar-menu" v-bind:class="{ 'is-active': isNavbarOpen }">
        <div class="navbar-end">
            @foreach (\A17\Twill\Models\Feature::forBucket('header') as $element)
                @php
                    $url = Localization::getLocalizedURL(null, $element->slug);
                @endphp
                <a
                    href="{{ $url }}"
                    class="navbar-item is-text {{ request()->url() == $url ? 'is-active' : '' }}">
                    {{ $element->title }}
                </a>
            @endforeach

            @foreach (config('navigation.header') as $element)
                @php
                    if (isset($element['url'])) {
                        $url = $element['url'];
                    } else {
                        $url = route($element['route'], $element['params'][ app()->getLocale() ] ?? $element['params'] ?? []);
                    }
                @endphp


                @if ($element['id'] == 'donate')
                    <div class="navbar-item">
                        <a href="{{ $url }}" class="button is-success">
                            {{ __("navigation.{$element['id']}") }}
                        </a>
                    </div>
                @elseif ($element['id'] == 'login')
                    <div class="navbar-item">
                        <a href="{{ $url }}" class="button is-primary">
                            {{ __("navigation.{$element['id']}") }}
                        </a>
                    </div>
                @else
                    <a href="{{ $url }}" class="navbar-item {{ request()->url() == $url ? 'is-active' : '' }}">
                        {{ __("navigation.{$element['id']}") }}
                    </a>
                @endif
            @endforeach

            @foreach ($alternateUrls as $locale => $url)
                <div class="navbar-item">
                    <a href="{{ $url }}" hreflang="{{ $locale }}" title="{{ config("translatable.languages.$locale") }}">
                        {{ strtoupper($locale) }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</nav>
