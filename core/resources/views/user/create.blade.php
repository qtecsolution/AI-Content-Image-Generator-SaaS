@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">New</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h5 class="header-title">Admin Create</h5>
                        <div class="project-button pull-right">
                            <a href="{{ route('admin.all') }}" class="btn btn-light btn-xs">
                                <i class="fa fa-list"></i>
                                View All
                            </a>
                        </div>
                    </div>

                    <div class="my-projects-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="project-table-wrapper p-3">
                                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data"
                                        class="authentication-form needs-validation" novalidate>
                                        @csrf
        
        
                                        <div class="authentication-form-body">
        
                                            <!-- Name   -->
                                            <div class="form-group  mb-3">
                                                <label for="name" class="form-label">Name *</label>
                                                <input id="name" type="text"
                                                    class="form-control custom-input @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}" required
                                                    placeholder="Enter your name" autocomplete="name" autofocus>
        
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
        
                                            </div>
        
                                            <div class="form-group  mb-3">
                                                <label for="avatar" class="form-label">Avatar* </label>
                                                <input id="avatar" type="file"
                                                    class="form-control custom-input @error('avatar') is-invalid @enderror"
                                                    name="avatar" value="{{ old('avatar') }}" required>
        
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
        
                                            <!-- Email    -->
                                            <div class="form-group  mb-3">
                                                <label for="email" class="form-label">Email* </label>
                                                <input id="email" type="email"
                                                    class="form-control custom-input @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                                    placeholder="Enter your Email">
        
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
        
                                            </div>
        
                                            <div class="form-group  mb-3">
                                                <label for="phone" class="form-label">Phone* </label>
                                                <input id="phone" type="tel"
                                                    class="form-control custom-input @error('phone') is-invalid @enderror"
                                                    name="phone" value="{{ old('phone') }}" required
                                                    placeholder="Enter your phone">
        
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group  mb-3">
                                                <label for="address" class="form-label">Address </label>
                                                <input id="address" type="text"
                                                    class="form-control custom-input @error('address') is-invalid @enderror"
                                                    name="address" value="{{ old('address') }}" required
                                                    placeholder="Enter your address">
        
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
        
                                            <!-- password -->
        
                                            <div class="form-group  mb-3">
                                                <label for="password" class="form-label">Password* </label>
                                                <input id="password" type="password"
                                                    class="form-control custom-input @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"
                                                    placeholder="Enter your Password">
        
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <p><span class="small">Must be at least 8 characters.</span></p>
        
                                            </div>
                                            <div class="form-group  mb-3">
                                                <label for="password" class="form-label">Confirm Password* </label>
                                                <input id="password-confirm" type="password" class="form-control custom-input"
                                                    name="password_confirmation" required autocomplete="new-password"
                                                    placeholder="Retype your Password">
                                            </div>
        
                                            <button class="gradient-btn mt-2" type="submit">Create User </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
