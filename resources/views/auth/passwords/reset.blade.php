@extends('layouts.dashboard')

@section('content')
<div class="hero is-fullheight-with-navbar">
    <div class="hero-body columns is-centered is-gapless">
        <div class="column is-6-tablet is-4-desktop is-3-fullhd">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">{{ __('auth.resetPassword') }}</p>
                </div>

                <div class="card-content">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <b-field
                            label="{{ __('dashboard.email') }}"
                            @error('email')
                                type="is-danger"
                                message="{{ $message }}"
                            @enderror
                        >
                            <b-input name="email" type="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus />
                        </b-field>

                        <b-field
                            label="{{ __('dashboard.password') }}"
                            @error('password')
                                type="is-danger"
                                message="{{ $message }}"
                            @enderror
                        >
                            <b-input name="password" type="password" required autocomplete="new-password" />
                        </b-field>

                        <b-field
                            label="{{ __('dashboard.password.confirm') }}"
                            @error('password')
                                type="is-danger"
                            @enderror
                        >
                            <b-input name="password_confirmation" type="password" required autocomplete="new-password" />
                        </b-field>

                        <b-field>
                            <div class="buttons">
                                <b-button tag="button" native-type="submit" type="is-primary">{{ __('auth.resetPassword') }}</b-button>

                                <b-button tag="a" type="is-text" href="{{ route('login') }}">{{ __('auth.forgotPassword.back') }}</b-button>
                            </div>
                        </b-field>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
