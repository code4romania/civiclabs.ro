@if ($item->hasImage('image'))
    <picture class="hero-image">
        @foreach (config('twill.breakpoints') as $breakpoint)
            <source
                media="screen and (max-width: {{ $breakpoint - 1 }}px)"
                srcset="{{ $item->image('image', 'default', [
                    'w'   => $breakpoint,
                    'fit' => 'max',
                ]) }}">
        @endforeach
        <img
            src="{{ $item->image('image', 'default', [
                    'w'   => max(config('twill.breakpoints')),
                    'fit' => 'max',
                ]) }}"
            alt="{{ $item->imageAltText('image')}}">
    </picture>
@endif
