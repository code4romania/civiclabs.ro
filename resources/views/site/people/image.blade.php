@php
    $rounded   = $rounded ?? true;
    $size      = $size ?? false;
    $media     = $media ?? false;
    $link      = $link ?? false;
    $linkClass = $linkClass ?? 'author-link';
@endphp

@if (!is_null($person) && $person->hasImage('image', 'default'))
    @if ($link)
        <a
            href="{{ route('team.show', ['member' => $person->slug]) }}"
            class="{{ $linkClass }}">
    @endif

    <figure
        @if ($media) class="media-left" @endif
        >
        <picture class="image {{ $size !== false ? "is-${size}x${size}" : 'is-square' }}">
            <img
                @if ($rounded)
                    class="is-rounded"
                @endif
                src="{{ $person->image('image', 'default', [
                    'w' => $size ?: config('twill.breakpoints.tablet'),
                    'fit' => 'max',
                ]) }}"

                alt="{{ $person->imageAltText('image')}}">
        </picture>
    </figure>

    @if ($link)
        </a>
    @endif
@endif
