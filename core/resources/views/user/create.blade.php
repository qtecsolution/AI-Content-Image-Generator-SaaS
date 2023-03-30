@extends('layouts.app')
@section('title','New')
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
                            <a href="{{ route('admin.all') }}" class="seeall-btn">
                              <span class="icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.33301 4H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33301 8H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33301 12H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                              </span>   
                             <span>  View All</span> 
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
                                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
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
        
                                            
                                            <!-- Email    -->
                                            <div class="form-group  mb-3">
                                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
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
                                                <label for="phone" class="form-label">Phone<span class="text-danger">*</span> </label>
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
                                                <label for="password" class="form-label">Password<span class="text-danger">*</span> </label>
                                                <input id="password" type="password"
                                                    class="form-control custom-input @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"
                                                    placeholder="Enter your Password">
        
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <p class="mt-1"><span class="small gray-500">Must be at least 8 characters.</span></p>
        
                                            </div>

                                            <div class="form-group  mb-3">
                                                <label for="password" class="form-label">Confirm Password<span class="text-danger">*</span> </label>
                                                <input id="password-confirm" type="password" class="form-control custom-input"
                                                    name="password_confirmation" required autocomplete="new-password"
                                                    placeholder="Retype your Password">
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
        
        
                                            <div class="generate-btn-wrapper">
                                                 <button type="submit" class="generate-btn px-4">Create admin</button>
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
    </div>
@endsection
