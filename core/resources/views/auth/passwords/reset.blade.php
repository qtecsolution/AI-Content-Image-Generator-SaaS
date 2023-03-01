@extends('auth.app')

@section('content')
    <form class="authentication-form needs-validation" method="POST" action="{{ route('password.update') }}">
        @csrf

        <div class="authentication-form-header">
            <h3 class="logo-name">{{ readConfig('type_name') }}</h3>
            <h3 class="section-title">Enter your new password</h3>
            <p class="form-des"> Please enter your valid email and password. </p>
        </div>

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>


            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror custom-input"
                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group">
            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>


            <input id="password" type="password" class="custom-input form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="form-group mb-3">
            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>


            <input id="password-confirm" type="password" class="form-control custom-input" name="password_confirmation"
                required autocomplete="new-password">

        </div>

        <div class="row mb-0">
            <button type="submit" class="gradient-btn">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
@endsection
