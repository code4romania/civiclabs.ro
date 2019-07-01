<div class="column is-6-tablet is-4-widescreen">
    <article class="card solution">

        <div class="card-header">
            <h1 class="card-header-title">
                <a href="{{ route('domains.show', ['domain' => $item->slug]) }}" class="is-link is-inversed">
                   {{ $item->title }}
                </a>
            </h1>

            @if ($item->financers->count())
                <div class="card-header-icon">
                    <div class="columns is-multiline is-centered is-mobile">
                        @foreach ($item->financers as $partner)
                            @include('site.partials.partner', [
                                'class'   => 'column is-narrow image',
                                'partner' => $partner,
                                'width'   => 75,
                            ])
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        @if ($item->hasImage('image'))
            <figure class="card-image">
                <a href="{{ route('domains.show', ['domain' => $item->slug]) }}" class="is-block">
                    <picture class="image is-3by2">
                        @foreach (config('twill.breakpoints') as $breakpoint)
                            <source
                                media="screen and (max-width: {{ $breakpoint - 1 }}px)"
                                srcset="{{ $item->image('image', 'default', [
                                    'w' => $breakpoint
                                ]) }}">
                        @endforeach
                        <img
                            src="{{ $item->image('image', 'default', [
                                    'w' => config('twill.breakpoints.tablet'),
                                ]) }}"
                            alt="{{ $item->imageAltText('image')}}">
                    </picture>
                </a>
            </figure>
        @endif

        <div class="card-content">
            @foreach ($item->subdomains as $subdomain)
                <a href="{{ route('domains.show', ['domain' => $subdomain->slug]) }}" class="media is-link is-inversed">
                    <div class="media-content">
                        {{ $subdomain->title }}
                    </div>
                    <div class="media-right">
                        <b-icon icon="arrow-right"></b-icon>
                    </div>
                </a>
            @endforeach
        </div>
    </article>
</div>
