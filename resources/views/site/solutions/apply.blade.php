@extends('layouts.app')

@section('content')
    {{-- @include('site.solutions.header') --}}
    <div class="section is-slim">
        <div class="columns is-mobile is-gapless is-centered">
            <div class="card column is-11-mobile is-10-tablet is-8-desktop is-6-widescreen">
                <div class="card-header columns is-multiline is-mobile is-marginless">
                    <div class="card-header-title column is-12-mobile">
                        {{ $form->title }}
                    </div>
                    <div class="column is-12-mobile is-narrow-tablet">
                        <div class="block">
                            <b-icon icon="clock-alert-outline" size="is-small" type="is-grey"></b-icon>
                            <span class="is-size-7">{{ $form->submission_deadline_tz }}</span>
                        </div>
                    </div>
                </div>

                <c-application-form
                    action="{{ $formAction }}"
                    form-id="{{ $item->id }}-{{ $form->id }}"
                    submit-label="{{ __('solution.button.submit') }}"
                    :sections="{{ getFormFieldsBySection($form->blocks) }}"
                    message-success="{{ __('solution.event.submit.success') }}"
                    message-error="{{ __('solution.event.submit.error') }}"
                ></c-application-form>
            </div>
        </div>
    </div>
@stop
