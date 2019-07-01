@extends('layouts.app')

@section('content')
    <div class="section is-slim">
        <div class="columns is-mobile is-gapless is-centered">
            <div class="card column is-11-mobile is-8-tablet">
                <div class="card-header">
                    <p class="card-header-title">
                        {{ $item->title }}
                    </p>
                </div>
                <div class="card-content">
                    {!! $item->renderBlocks(false) !!}
                </div>
            </div>
        </div>
    </div>
@stop
