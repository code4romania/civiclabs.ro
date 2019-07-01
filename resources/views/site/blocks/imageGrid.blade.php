@php
    $medias = $block->imageObjects('image', 'default');
    $columns = $block->input('columns') ?? 2;
@endphp

<section class="section block block-image block-image-grid">
    <div class="container">
        <div class="columns is-multiline is-centered">
            @foreach ($medias as $media)
                <figure class="column is-{{ floor(12 / $columns) }}-tablet">
                    <picture class="image is-3by2">
                        @foreach (config('twill.breakpoints') as $breakpoint)
                            <source
                                srcset="{{ $block->image('image', 'default', ['w' => $breakpoint ], false, false, $media) }}"
                                media="screen and (max-width: {{ $breakpoint - 1 }}px)">
                        @endforeach
                        <img
                            src="{{ $block->image('image', 'default', [
                                'w' => max(config('twill.breakpoints')),
                            ], false, false, $media) }}"
                            alt="{{ $block->imageAltText('image', $media) }}">
                    </picture>

                    @if ($block->imageCaption('image', $media))
                        <figcaption class="caption">
                            <div class="has-text-grey is-italic">
                                <div class="is-flex">
                                    <span class="icon has-text-grey-light">
                                        <i class="mdi mdi-18px mdi-camera"></i>
                                    </span>
                                    <p>{{ $block->imageCaption('images', $media) }}</p>
                                </div>
                            </div>
                        </figcaption>
                    @endif
                </figure>
            @endforeach
        </div>
    </div>
</section>
