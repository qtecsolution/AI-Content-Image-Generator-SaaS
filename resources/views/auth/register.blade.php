@extends('auth.app')

@section('title', 'Signup')

@section('content')

    <form action="" class="authentication-form needs-validation" novalidate>

        <div class="authentication-form-header align-items-start">
            <h3 class="logo-name">type.ez</h3>
            <h3 class="section-title">Sign up</h3>
            <p class="form-des">Start your 30-day free trial. </p>
        </div>

        <div class="authentication-form-body">

            <!-- Name   -->
            <div class="form-group">
                <label for="name" class="form-label">Name *</label>
                <input type="text" class="form-control custom-input" id="name" required autocomplete="off"
                    placeholder="Enter your name">
                <div class="valid-feedback">
                    Awesome! You're one step closer to greatness.
                </div>
                <div class="invalid-feedback">
                    Enter your name! Don't want to call you Nameless
                </div>
            </div>

            <!-- Email    -->
            <div class="form-group">
                <label for="email" class="form-label">Email* </label>
                <input type="email" class="form-control custom-input" id="email" required autocomplete="off"
                    placeholder="Enter your Email">
                <div class="valid-feedback">
                    Awesome! You're one step closer to greatness.
                </div>
                <div class="invalid-feedback">
                    Please enter a valid email address
                </div>
            </div>

            <!-- password -->

            <div class="form-group">
                <label for="password" class="form-label">Password* *</label>
                <input type="password" class="form-control custom-input" id="password" required autocomplete="off"
                    placeholder="Enter your Password">
                <p><span class="small">Must be at least 8 characters.</span></p>
                <div class="valid-feedback">
                    Awesome! You're one step closer to greatness.
                </div>
                <div class="invalid-feedback">
                    Please enter a valid email address
                </div>
            </div>

            <!-- get started  -->
            <button class="gradient-btn">Create account </button>



            <!-- google  -->
            <button class="social-btn" type="button">
                <span class="icon">
                    <img src="{{asset('assets/images/icons/google.svg')}}" width="25">
                </span>
                <span class="text">Sign up with Google</span>
            </button>


            <p class="authentication-bottom">Already have an account? <a href="{{route('login')}}">Log in </a> </p>

        </div>
    </form>
@endsection
