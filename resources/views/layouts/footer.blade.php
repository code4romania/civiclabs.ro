<footer class="footer has-background-dark has-text-light">
    <div class="container">
        <div class="columns">
            <div class="column is-4 copy">
                <a href="{{ url('/') }}" class="brand">
                    @svg('logo-white', [ 'height' => 30 ])
                </a>

                <h2>{{ __('footer.projectby') }}</h2>
                <a href="https://code4.ro" class="brand">
                    @svg('code4romania-white', [ 'height' => 30 ])
                </a>

                <p>{{ __('footer.tagline') }}</p>
                <div class="social">
                    <a href="https://www.facebook.com/code4romania/" target="_blank">
                        <b-icon icon="facebook"></b-icon>
                    </a>
                    <a href="https://twitter.com/Code4Romania" target="_blank">
                        <b-icon icon="twitter"></b-icon>
                    </a>
                    <a href="https://github.com/code4romania/" target="_blank">
                        <b-icon icon="github-circle"></b-icon>
                    </a>
                    <a href="https://www.linkedin.com/company/code-for-romania" target="_blank">
                        <b-icon icon="linkedin"></b-icon>
                    </a>
                </div>
            </div>
            <div class="column is-4">
                <div class="columns">
                    <ul class="column footer-links">
                        <li class="links-header">{{ __('navigation.links') }}</li>

                        @foreach (getFeaturedMenuItems('footer') as $item)
                            <li class="links-item">
                                <a href="{{ $item['url'] }}">
                                    {{ $item['title'] }}
                                </a>
                            </li>
                        @endforeach

                        @foreach (config('navigation.header') as $element)
                            @php
                                if (isset($element['url'])) {
                                    $url = $element['url'];
                                } else {
                                    $url = route($element['route'], $element['params'][ app()->getLocale() ] ?? $element['params'] ?? []);
                                }
                            @endphp

                            <li class="links-item">
                                <a href="{{ $url }}">
                                    {{ __("navigation.{$element['id']}") }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

@include('site.partials.cookies')
