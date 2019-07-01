@php
    $type        = $type ?? 'is-primary';
    $showCorner  = $showCorner ?? true;

    $title       = $title ?? '';
    $description = $description ?? '';
    $authors     = collect($authors ?? []);
@endphp

<div class="hero {{ $type }}">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <header class="column is-8">
                    <h1 class="title is-size-1-desktop">{{ $title }}</h1>
                    <div class="content">
                        {!! $description !!}
                    </div>
                </header>
                @if ($authors->count())
                    <div class="column is-4">
                            @foreach ($authors as $author)
                                @include('site.people.card', [
                                    'author' => $author,
                                    'size'   => 64,
                                ])
                            @endforeach
                    </div>
                @elseif ($showCorner)
                    <div class="column is-3-tablet is-offset-1-tablet is-2-desktop is-offset-2-desktop is-hidden-mobile">
                        @svg('corner-light')
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
