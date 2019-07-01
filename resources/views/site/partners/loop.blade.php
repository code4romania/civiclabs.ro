
<article class="column is-6-tablet is-{{ $logoWidth }}-desktop partner">
    @if ($item->website)
        <a href="{{ $item->website }}" target="_blank" rel="noopener noreferrer">
    @endif

    <figure class="block image is-square has-border">
        <img src="{{ $item->image('logo', 'default', [
            'w'   => config('twill.breakpoints.tablet'),
            'fit' => 'fill',
        ]) }}" class="is-fluid" alt="">
    </figure>


    @if ($showTitle)
        <div class="content">
            <p class="title is-size-6">{{ $item->title }}</p>
        </div>
    @endif

    @if ($item->website)
        </a>
    @endif
</article>
