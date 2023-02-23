@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <div class="col-md-12">
                <div class="card custom">
                    <div class="card-header bg-default">
                        <h5 class="card-title no-margin">User Create</h5>
                        <div class="card-button">
                            <a href="{{ route('user.index') }}" class="btn btn-success btn-xs">
                                <i class="fa fa-add"></i>
                                General Users
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data"
                            class="authentication-form needs-validation" novalidate>
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{$user->id}}">

                            <div class="authentication-form-body">

                                <!-- Name   -->
                                <div class="form-group">
                                    <label for="name" class="form-label">Name *</label>
                                    <input id="name" type="text"
                                        class="form-control custom-input @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name }}" required placeholder="Enter your name"
                                        autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="phone" class="form-label">Avatar* </label>
                                    <input id="phone" type="file"
                                        class="form-control custom-input @error('phone') is-invalid @enderror"
                                        name="avatar" value="{{ old('avatar') }}" required autocomplete="phone"
                                        placeholder="Enter your phone">

                                    @if ($user->avatar != null)
                                        <img src="{{ App\Http\Controllers\HomeController::filePath($user->avatar) }}" width="80px" height="80px">
                                    @endif

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="type" class="form-label">User Type* </label>
                                    <select name="type"
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
                                    <input id="phone" type="tel"
                                        class="form-control custom-input @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ $user->phone }}" required autocomplete="phone"
                                        placeholder="Enter your phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>



                                <!-- get started  -->
                                <button class="gradient-btn mt-2" type="submit">Update User </button>


                                <!-- google  -->


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
