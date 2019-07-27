@extends('layouts.dashboard')

@section('content')
<div class="hero is-fullheight-with-navbar">
    <div class="hero-body columns is-centered is-gapless">
        <div class="column is-6-tablet is-4-desktop is-3-fullhd">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">{{ __('auth.login') }}</p>
                </div>

                <form class="card-content" method="post" action="{{ route('login') }}"  autocomplete="off">
                    @csrf

                    <b-field
                        label="{{ __('dashboard.email') }}"
                        @error('email')
                            type="is-danger"
                            message="{{ $message }}"
                        @enderror
                    >
                        <b-input name="email" type="email" />
                    </b-field>

                    <b-field
                        label="{{ __('dashboard.password') }}"
                        @error('password')
                            type="is-danger"
                            message="{{ $message }}"
                        @enderror
                    >
                        <b-input name="password" type="password"/>
                    </b-field>

                    <b-field>
                        <b-checkbox name="remember">{{ __('auth.rememberMe') }}</b-checkbox>
                    </b-field>

                    <b-field>
                        <div class="buttons">
                            <b-button tag="button" native-type="submit" type="is-primary">{{ __('auth.login') }}</b-button>

                            @if (Route::has('password.request'))
                                <b-button tag="a" type="is-text" href="{{ route('password.request') }}">{{ __('auth.forgotPassword.label') }}</b-button>
                            @endif
                        </div>
                    </b-field>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
