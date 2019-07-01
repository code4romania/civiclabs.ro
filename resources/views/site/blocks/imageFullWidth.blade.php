<section class="section block block-image block-image-fullwidth">
    <div class="container">
        <figure>
            <picture class="image">
                @foreach (config('twill.breakpoints') as $breakpoint)
                    <source
                        media="screen and (max-width: {{ $breakpoint - 1 }}px"
                        srcset="{{ $block->image('image', 'default', [
                            'w' => $breakpoint
                        ]) }}">
                @endforeach
                <img
                    src="{{ $block->image('image', 'default', [
                        'w' => max(config('twill.breakpoints')),
                    ]) }}"
                    alt="{{ $block->imageAltText('image')}}">
            </picture>

            @if ($block->imageCaption('image'))
                <figcaption class="caption">
                    <div class="has-text-grey is-italic">
                        <div class="is-flex">
                            <span class="icon has-text-grey-light">
                                <i class="mdi mdi-18px mdi-camera"></i>
                            </span>
                            <p>{{ $block->imageCaption('image') }}</p>
                        </div>
                    </div>
                </figcaption>
            @endif
        </figure>
    </div>
</section>
