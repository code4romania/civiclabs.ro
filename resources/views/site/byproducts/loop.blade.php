<div class="column
    @if (count($orderedList) == 1)
        is-full
    @else
        is-half
    @endif
">
    <div class="card">

        @if ($item->hasImage('image'))
            <figure class="card-image">
                <picture class="image">
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
            </figure>
        @endif

        @if ($item->title || strip_tags($item->description))
            <div class="card-header" style="
                @if ($block->input('background_color'))
                    background-color: {{ $block->input('background_color') }};
                @endif

                @if ($block->input('text_color'))
                    color: {{ $block->input('text_color') }};
                @endif
            ">
                <p class="card-header-title is-size-6">
                    @if ($item->standalone_page)
                        <a href="{{ route('byproducts.show', ['byproduct' => $item->slug]) }}"
                            style="text-decoration:underline;
                            @if ($block->input('text_color'))
                                color: {{ $block->input('text_color') }};
                            @endif
                        ">
                    @endif

                    {{ $item->title }}

                    @if ($item->standalone_page)
                        </a>
                    @endif
                </p>
                @if ($block->input('icon'))
                    <a href="{{ route('byproducts.show', ['byproduct' => $item->slug]) }}"
                        style="
                        @if ($block->input('text_color'))
                            color: {{ $block->input('text_color') }};
                        @endif
                    ">
                        <span class="material-icons card-header-icon">{{ $block->input('icon') }}</span>
                    </a>
                @endif
            </div>
            <div class="card-content">
                <div class="content">
                    {!! $item->description !!}
                </div>
            </div>
        @endif

        @if (($item->people->count() || $item->file('attachment') || $item->standalone_page))
            <div class="card-content" style="margin-top: auto;">
                <div class="columns is-vcentered is-multiline">
                    <div class="column is-12-tablet is-7-widescreen byproduct-author">
                        @foreach ($item->people as $author)
                            @include('site.people.card', [
                                'author' => $author,
                                'size'   => 64,
                            ])
                        @endforeach
                    </div>

                    <div class="column is-12-tablet is-5-widescreen byproduct-actions">
                        <div class="content has-text-right-widescreen">
                            @if ($item->file('attachment'))
                                <a href="{{ $item->file('attachment') }}" target="_blank" class="has-button">
                                    <b-icon size="is-medium" icon="download"></b-icon>
                                    @svg('button')
                                </a>
                            @endif

                            @if ($item->standalone_page)
                                <a href="{{ route('byproducts.show', ['byproduct' => $item->slug]) }}" class="has-button">
                                    <b-icon size="is-medium" icon="magnify"></b-icon>
                                    @svg('button')
                                </a>

                                <c-share url="{{ route('byproducts.show', ['byproduct' => $item->slug]) }}">
                                    @svg('button')
                                </c-share>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
