@extends('layouts.app')

@php
    $tabs = [
        [
            'id'      => 'prototype',
            'icon'    => 'camera-control',
            'content' => $item->prototype
        ],
        [
            'id'      => 'video',
            'icon'    => 'play-circle-outline',
            'content' => $item->video,
        ],
        [
            'id'      => 'grid',
            'icon'    => 'image-multiple',
            'content' => $item->imagesAsArrays('grid'),
        ],
    ];
@endphp

@section('content')
    <article>
        @include('site.solutions.header')
        <div class="section">
            <div class="container">
                <b-tabs type="is-boxed">
                    @foreach ($tabs as $tab)
                        @continue(empty($tab['content']))

                        <b-tab-item
                            label="{{ __('solution.tab.'. $tab['id']) }}"
                            icon="{{ $tab['icon'] }}">

                            @if ($tab['id'] == 'grid')
                                <div class="columns is-multiline flex-basis-{{ count($item->imagesAsArrays('grid')) }}-items">
                                    @foreach ($item->imagesAsArrays('grid') as $image)
                                        <div class="column">
                                            <figure class="image is-3by2">
                                                <img src="{{ $image['src'] }}"alt="{{ $image['alt'] }}">
                                            </figure>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                @if (!empty($tab['content']))
                                    @include('site.partials.embed', [
                                        'embed' => getEmbedForUrl($tab['content']),
                                    ])
                                @endif
                            @endif
                        </b-tab-item>

                    @endforeach
                </b-tabs>

                <div class="columns is-centered">
                    @if (!$item->financers->count())
                        <div class="column is-6-tablet is-5-widescreen">
                            <b-button
                                icon-left="coins"
                                type="is-primary is-fullwidth"
                                v-on:click="isSolutionModalFinancersActive = true">
                                    {{ __('solution.button.finance') }}
                            </b-button>
                        </div>
                    @endif

                    @if ($item->applicationForms->first() && $item->applicationForms->first()->accepts_submissions)
                        <div class="column is-6-tablet is-5-widescreen">
                            <b-button
                                tag="a"
                                href="{{ route('solutions.apply', ['solution' => $item->slug]) }}"
                                icon-left="crane"
                                type="is-success is-fullwidth">
                                    {{ __('solution.button.implement') }}
                            </b-button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                {!! $item->renderBlocks(false) !!}
            </div>
        </div>

        @include('site.solutions.modal')
    </article>
@stop
