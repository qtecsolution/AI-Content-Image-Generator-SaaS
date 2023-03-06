@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item active"> Change Password</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row">

            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h5 class="header-title text-capitalize"> Change Password </h5>
                    </div>
                    <div class="my-projects-body">
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="card">
                                    <div class="p-2">
                                        @if ($user->avatar != '' && file_exists($user->avatar))
                                            <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}"
                                                style="max-width:150px">
                                        @else
                                            <img src="{{ asset('assets/images/placeholder.png') }}"
                                                alt="{{ $user->name }}" style="max-width:150px">
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"> {{ $user->name }} </h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> <b> Email: </b> {{ $user->email }} </li>
                                        <li class="list-group-item"> <b> Phone: </b> {{ $user->phone }} </li>
                                        <li class="list-group-item"> <b> Address: </b> {{ $user->address ?? '' }} </li>
                                        @if ($user->type == 'user')
                                            <li class="list-group-item"> <b> Plan: </b> {{ $user->plan->name ?? '' }}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 border-start">
                                <form method="POST" action="{{ route('profile.password.update') }}" class="authentication-form needs-validation">
                                    @csrf

                                    <div class="authentication-form-body">

                                        <!-- Name   -->
                                        <div class="form-group mb-3">
                                            <label for="current_password" class="form-label">Current Password *</label>
                                            <input id="current_password" type="password"
                                                class="form-control custom-input @error('current_password') is-invalid @enderror"
                                                name="current_password" required
                                                placeholder="Enter your current password" autocomplete="off" autofocus>

                                            @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <!-- Email    -->
                                        <div class="form-group mb-3">
                                            <label for="new_password" class="form-label">New Password* </label>
                                            <input id="new_password" type="password"
                                                class="form-control custom-input @error('new_password') is-invalid @enderror"
                                                name="new_password" required autocomplete="off"
                                                placeholder="Enter your new password">

                                            @error('new_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="confirm_password" class="form-label">Confirm Password* </label>
                                            <input id="confirm_password" type="password"
                                                class="form-control custom-input @error('confirm_password') is-invalid @enderror"
                                                name="confirm_password" required
                                                placeholder="Confirm your password">

                                            @error('confirm_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="generate-btn-wrapper">
                                            <button type="submit" class="generate-btn">Update</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
