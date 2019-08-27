@php
    $author = $author ?? $item->people()->first() ?? null;
    $permalink = route('blog.show', [ 'post' => $item->slug ]);
@endphp

<div class="column is-12-tablet is-10-desktop is-6-fullhd">
    <article class="card columns is-gapless is-horizontal-tablet">
        @if ($item->hasImage('image', 'default'))
            <figure class="column is-5-tablet is-4-widescreen card-image">
                <picture class="image is-3by2">
                    @foreach (config('twill.breakpoints') as $breakpoint)
                        <source
                            media="screen and (max-width: {{ $breakpoint - 1 }}px)"
                            srcset="{{ $item->image('image', 'default', [
                                'w' => $breakpoint
                            ]) }}">
                    @endforeach
                    <a href="{{ $permalink }}">
                        <img
                            src="{{ $item->image('image', 'default', [
                                    'w' => config('twill.breakpoints.tablet'),
                                ]) }}"
                            alt="{{ $item->imageAltText('image')}}">
                    </a>
                </picture>
            </figure>
        @endif
        <div class="column">
            <div class="card-content">
                <div class="content">
                    <div class="post-meta">
                        @include('site.partials.timePublishStart', [
                            'item' => $item
                        ])
                    </div>
                    <h1 class="title is-size-5">
                        <a href="{{ $permalink }}">{{ $item->title }}</a>
                    </h1>
                    <h2 class="subtitle is-size-6">{{ $item->subtitle }}</h2>

                    <p>{{ str_limit($item->description, 120, '…') }}</p>
                </div>

                @if ($author)
                    @include('site.people.card', [
                        'author' => $author,
                        'size'   => 64,
                    ])
                @endif
            </div>
        </div>
    </article>
</div>
