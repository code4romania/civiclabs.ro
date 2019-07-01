@extends('layouts.dashboard')

@section('content')
<div class="hero is-fullheight-with-navbar">
    <div class="hero-body columns is-centered is-gapless">
        <div class="column is-6-tablet is-4-desktop is-3-fullhd">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">{{ __('auth.forgotPassword.label') }}</p>
                </div>

                <form class="card-content" method="post" action="{{ route('password.email') }}">
                    @csrf

                    @if (session('status'))
                        <div class="message is-success is-small" role="alert">
                            <p class="message-body">{{ session('status') }}</p>
                        </div>
                    @endif

                    <b-field
                        label="{{ __('dashboard.email') }}"
                        @error('email')
                            type="is-danger"
                            message="{{ $message }}"
                        @enderror
                    >
                        <b-input name="email" type="email" />
                    </b-field>

                    <b-field>
                        <div class="buttons">
                            <b-button tag="button" native-type="submit" type="is-primary">{{ __('auth.forgotPassword.submit') }}</b-button>

                            <b-button tag="a" type="is-text" href="{{ route('login') }}">{{ __('auth.forgotPassword.back') }}</b-button>
                        </div>
                    </b-field>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
