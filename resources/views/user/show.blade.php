@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">User Details</li>
@endsection

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header">
                        <h5 class="header-title">User Details</h5>
                        <div class="project-button pull-right">
                            <a href="{{ route('user.index') }}" class="btn btn-success btn-xs">
                                <i class="fa fa-add"></i>
                                General Users
                            </a>
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <div class="project-table-wrapper p-3">

                            <div class="authentication-form-body">

                                <!-- Name   -->
                                <div class="form-group">
                                    <label for="name" class="form-label">Name *</label>
                                    <input id="name" type="text"
                                        class="form-control custom-input @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name }}" readonly placeholder="Enter your name"
                                        autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                 

                                    @if ($user->avatar != null)
                                        <img src="{{ filePath($user->avatar) }}" width="80px" height="80px">
                                    @endif

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type" class="form-label">User Type* </label>
                                    <select name="type" readonly
                                        class="form-control custom-input @error('type') is-invalid @enderror" required>
                                        <option value="">Select User Type</option>
                                        <option value="admin" {{ $user->type == 'admin' ? 'selected' : null }}>Admin
                                        </option>
                                        <option value="user" {{ $user->type == 'user' ? 'selected' : null }}>General User
                                        </option>
                                    </select>


                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Email    -->
                                <div class="form-group">
                                    <label for="email" class="form-label">Email* </label>
                                    <input id="email" type="email" readonly
                                        class="form-control custom-input @error('email') is-invalid @enderror"
                                        name="email" value="{{ $user->email }}" required autocomplete="email"
                                        placeholder="Enter your Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone* </label>
                                    <input id="phone" readonly type="tel"
                                        class="form-control custom-input @error('phone') is-invalid @enderror"
                                        name="email" value="{{ $user->phone }}" required autocomplete="phone"
                                        placeholder="Enter your phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
