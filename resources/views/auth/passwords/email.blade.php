@extends('auth.app')

@section('content')
<form method="POST" class="authentication-form needs-validation" action="{{ route('password.email') }}">
    @csrf
    <div class="authentication-form-header">
        <h3 class="logo-name"><a href="{{route('/')}}"> <img class="header-logo" src="{{filePath(readConfig('logo'))}}" alt="{{readConfig('name')}}"> </a></h3>
        <h3 class="section-title">Enter your valid email</h3>
        <p class="form-des">Forget Your Password! Please enter your email here. </p>
    </div>

    <div class="authentication-form-body">
        <!-- Email    -->
        <div class="form-group">
            <label for="email" class="form-label">Email<span class="text-danger">*</span> :</label>
            <input type="email" class="form-control custom-input @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Enter your Email">
            <div class="valid-feedback">
                Awesome! You're one step closer to greatness.
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="gradient-btn"> Send Reset Link </button>
    </div>
</form>
@endsection
