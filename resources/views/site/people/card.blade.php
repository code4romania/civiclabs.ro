@php
    $rounded   = $rounded ?? true;
    $size      = $size ?? 96;
    $link      = $link ?? true;
    $linkClass = $linkClass ?? 'author-link';
@endphp

@if ($author)
    <aside class="media is-vcentered">
        @include('site.people.image', [
            'person'    => $author,
            'media'     => true,
            'rounded'   => $rounded,
            'link'      => $link,
            'linkClass' => $linkClass,
            'size'      => $size,
        ])
        <div class="media-content">
            <p><a href="{{ route('team.show', ['member' => $author->slug]) }}"><strong>{{ $author->name }}</strong></a><p>
            <p><small>{{ $author->title}}</small></p>
        </div>
    </aside>
@endif
