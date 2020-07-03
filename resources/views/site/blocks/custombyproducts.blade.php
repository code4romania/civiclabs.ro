@php
    $customorderedList = $block->browserIds('custombyproduct');
    $custombyproduct = App\Models\Byproduct::find($customorderedList);

    switch ($block->input('width')) {
        case 'quarter':
            $byproductWidth = 3;
            break;

        case 'half':
            $byproductWidth = 6;
            break;

        case 'third':
            $byproductWidth = 9;
            break;
        case 'full':
            $byproductWidth = 12;
        break;
    }
@endphp

@foreach ($custombyproduct as $customitem)
    <div class="column is-{{ $byproductWidth }}">
        <div class="card">
            @if ($customitem->hasImage('image'))
                <figure class="card-image">
                    <picture class="image">
                        @foreach (config('twill.breakpoints') as $breakpoint)
                            <source
                                media="screen and (max-width: {{ $breakpoint - 1 }}px)"
                                    srcset="{{ $customitem->image('image', 'default',
                                    ['w' => $breakpoint]) }}">
                        @endforeach
                        <img
                            src="{{ $customitem->image('image', 'default', [
                                'w' => config('twill.breakpoints.tablet'),
                                    ]) }}"
                            alt="{{ $customitem->imageAltText('image')}}">
                    </picture>
                </figure>
            @endif

            @if ($customitem->title || strip_tags($customitem->description))
                <div class="card-header" style="
                    @if ($block->input('background_color'))
                        background-color: {{ $block->input('background_color') }};
                    @endif

                    @if ($block->input('text_color'))
                        color: {{ $block->input('text_color') }};
                    @endif
                ">
                    <p class="card-header-title is-size-6">
                    @if ($customitem->standalone_page)
                        <a href="{{ route('byproducts.show', ['byproduct' => $customitem->slug]) }}"
                            style="
                            @if ($block->input('text_color'))
                                color: {{ $block->input('text_color') }};
                            @endif
                        ">
                    @endif

                    {{ $customitem->title }}

                    @if ($customitem->standalone_page)
                        </a>
                    @endif

                    @if ($block->input('icon'))
                        <span class="material-icons card-header-icon">{{ $block->input('icon') }}</span>
                    @endif
                    </p>

                </div>
                <div class="card-content">
                    <div class="content">
                        {!! $customitem->description !!}
                     </div>
                </div>
            @endif

            @if (($customitem->people->count() || $customitem->file('attachment') || $customitem->standalone_page))
                <div class="card-content">
                    <div class="columns is-vcentered is-multiline">
                        <div class="column is-12-tablet is-7-widescreen byproduct-author">
                            @foreach ($customitem->people as $author)
                                @include('site.people.card', [
                                    'author' => $author,
                                    'size'   => 64,
                                    ])
                            @endforeach
                        </div>

                    <div class="column is-12-tablet is-5-widescreen byproduct-actions">
                        <div class="content has-text-right-widescreen">
                                @if ($customitem->file('attachment'))
                                    <a href="{{ $customitem->file('attachment') }}" target="_blank" class="has-button">
                                        <b-icon size="is-medium" icon="download"></b-icon>
                                            @svg('button')
                                    </a>
                                @endif

                                @if ($customitem->standalone_page)
                                    <a href="{{ route('byproducts.show', ['byproduct' => $customitem->slug]) }}" class="has-button">
                                        <b-icon size="is-medium" icon="magnify"></b-icon>
                                            @svg('button')
                                    </a>

                                    <c-share url="{{ route('byproducts.show', ['byproduct' => $customitem->slug]) }}">
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
@endforeach
