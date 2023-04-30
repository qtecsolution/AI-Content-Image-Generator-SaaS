@extends('auth.app')

@section('title', 'Register')

@section('content')

    <form method="POST" action="{{ route('register') }}" class="authentication-form needs-validation" novalidate>
        @csrf

        <div class="authentication-form-header">
            <h3 class="logo-name"> <a href="{{ route('/') }}"> <img class="header-logo" src="{{filePath(readConfig('logo'))}}" alt="{{readConfig('name')}}"> </a> </h3>
            <h3 class="section-title">Sign up</h3>
            <p class="form-des">{{ readConfig('type_register_title') }}</p>
        </div>

        <div class="authentication-form-body">

            <!-- Name   -->
            <div class="form-group">
                <label for="name" class="form-label">Name *</label>
                <input id="name" type="text" class="form-control custom-input @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required placeholder="Enter your name" autocomplete="name"
                    autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="valid-feedback">
                    Awesome! You're one step closer to greatness.
                </div>
            </div>

            <!-- Email    -->
            <div class="form-group">
                <label for="email" class="form-label">Email* </label>
                <input id="email" type="email" class="form-control custom-input @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your Email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="valid-feedback">
                    Awesome! You're one step closer to greatness.
                </div>
            </div>

            <!-- password -->

            <div class="form-group">
                <label for="password" class="form-label">Password* </label>
                <input id="password" type="password"
                    class="form-control custom-input @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password" placeholder="Enter your Password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <p><span class="small">Must be at least 8 characters.</span></p>
                <div class="valid-feedback">
                    Awesome! You're one step closer to greatness.
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Confirm Password* </label>
                <input id="password-confirm" type="password" class="form-control custom-input" name="password_confirmation"
                    required autocomplete="new-password" placeholder="Retype your Password">
            </div>

            <!-- get started  -->
            <button class="gradient-btn" type="submit">Create account </button>

            @if (env('GOOGLE_CLIENT_ID') != '' && env('GOOGLE_CLIENT_SECRET') != '')
                <!-- google  -->
                <button onclick="redirectUrl('{{ route('auth.google') }}')" class="social-btn" type="button">
                    <span class="icon">
                        <img src="{{ asset('/assets/images/icons/google.svg') }}" width="25">
                    </span>
                    <span class="text">Register with Google</span>
                </button>
            @endif


            <p class="authentication-bottom">Already have an account? <a href="{{ route('login') }}">Log in </a> </p>

        </div>
    </form>
@endsection
