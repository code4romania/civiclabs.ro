@php
    $status = $item->status ?? '';
    $domain = $item->domains->first()->slug ?? '';
@endphp

<div v-bind:class="{
    'is-hidden': activeSolutionFilter.length > 0
        && activeSolutionFilter != 'status.{{$status}}'
        && activeSolutionFilter != 'domain.{{$domain}}'
    }"
    class="solution column is-6-tablet is-4-widescreen">
    <article class="card">
        <div class="solution-status box">
            <strong class="tag is-primary is-medium">{{ __("solution.status.{$status}") }}</strong>
        </div>

        @if ($item->hasImage('image'))
            <figure class="card-image">
                <a href="{{ route('solutions.show', ['solution' => $item->slug]) }}" class="is-block">
                    <picture class="image is-3by2">
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
                </a>
            </figure>
        @endif

        <div class="card-header">
            <h1 class="card-header-title">
                <a href="{{ route('solutions.show', ['solution' => $item->slug]) }}">
                   {{ $item->title }}
                </a>
            </h1>
            <a href="{{ route('solutions.show', ['solution' => $item->slug]) }}" class="card-header-icon">
                <b-icon icon="magnify"></b-icon>
            </a>
        </div>

        <div class="card-content">
            <dl class="is-size-7">
                @if ($item->domains->count())
                    <dt>{{ __('solution.domain') }}</dt>
                    <dd>
                        @foreach ($item->domains as $domain)
                            <a href="{{ route('domains.show', ['domain' => $domain->slug]) }}" class="is-link">
                                {{ $domain->title }}
                            </a>
                        @endforeach
                    </dd>
                @endif

                @foreach (['financers', 'applicants', 'implementers', 'developers'] as $partner_type)
                    @continue(!$item->$partner_type->count())

                    <dt>{{ __("solution.by.{$partner_type}") }}</dt>
                    <dd>{{ $item->$partner_type->pluck('title')->implode(', ') }}</dd>
                @endforeach
            </dl>
        </div>
    </article>
</div>
