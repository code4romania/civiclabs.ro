@php
    $evaluationPartial = ($user->user_role == 'evaluator' ? 'form' : 'table');
@endphp

@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="container">
            @include('dashboard.partials.header', [
                'solution' => $submission->solution,
                'crumbs'   => [
                    [
                        'title' => $submission->solution->title,
                        'url'   => route('dashboard.solution', ['solution' => $submission->solution]),
                    ],[
                        'title' => $submission->title,
                    ],
                ],
            ])
            <div class="content">
                @foreach ($sections as $sectionIndex => $section)
                    <b-collapse tag="section" class="card block block-form-section">
                        <header slot="trigger" slot-scope="props" role="button" class="message is-primary">
                            <h2 class="message-header is-size-6 is-size-5-tablet is-marginless">
                                <span>{{ $section['title'] }}</span>
                                <b-icon :icon="props.open ? 'menu-down' : 'menu-up'" />
                            </h2>
                        </header>

                        <div class="block-form-section card-content">
                            @if ($section['description'])
                                <div class="message is-primary is-small">
                                    <div class="message-body">{!! $section['description'] !!}</div>
                                </div>
                            @endif

                            @foreach ($section['fields'] as $fieldIndex => $field)
                                <div class="field media">
                                    <div class="media-content columns">
                                        <div class="column is-4-tablet is-3-desktop">
                                            <strong>{{ $field['label'] }}</strong>
                                            <span class="help-text">{{ $field['help'] }}</span>
                                        </div>
                                        <div class="column is-8-tablet is-9-desktop">
                                            @switch($field['type'])
                                                @case('file')
                                                    <b-button
                                                        tag="a"
                                                        type="is-primary"
                                                        download
                                                        icon-left="download"
                                                        title="{{ __('dashboard.file.download') }}"
                                                        href="{{ route('dashboard.download', [
                                                            'uuid'     => $submission->uuid,
                                                            'filename' => $submission->data[$sectionIndex][$fieldIndex]['value']
                                                        ]) }}"
                                                    >
                                                        {{ __('dashboard.file.download') }}
                                                    </b-button>
                                                    @break

                                                @case('url')
                                                    <a class="is-link" target="_blank" rel="noopener noreferrer" href="{{ $submission->data[$sectionIndex][$fieldIndex]['value'] }}">
                                                        {{ $submission->data[$sectionIndex][$fieldIndex]['value'] }}
                                                    </a>
                                                    @break

                                                @default
                                                    {{ $submission->data[$sectionIndex][$fieldIndex]['value'] }}
                                            @endswitch
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </b-collapse>
                @endforeach

                @include("dashboard.evaluators.{$evaluationPartial}", [
                    'evalSections' => $evalSections,
                    'evalData'     => $evalData,
                ])
            </div>
        </div>
    </section>
@endsection
