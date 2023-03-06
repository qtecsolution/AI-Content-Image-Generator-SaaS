@extends('install.app')
@section('content')

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.store') }}" class="text-left">
                @csrf
                <div class="text-center">
                    <img src="{{filePath(getInstallerSystemSetting('type_logo'))}}" class="img-fluid" alt="logo">
                </div>
                <h4 class="ont-weight-bold text-center my-4">@lang('Create Super Admin')</h4>

                <div class="alert alert-primary" role="alert">
                    To create a super admin user, you will typically need administrative access to the application. Here are the general steps to create a super admin user:
                  </div>
                  <div class="alert alert-secondary" role="alert">
                    Once you have created the super admin user, they will have access to all administrative features and functionality within the application. 
                    It is important to ensure that the super admin user's account is secured with a strong password  to prevent unauthorized access. 
                    It is also recommended to limit the number of super admin users to the minimum necessary to reduce the risk of security breaches.
                  </div>

                <div class="form-group">
                    <label for="name" class="col-form-label text-md-right">@lang('Name')</label>


                    <input placeholder="Enter UserName" id="name" type="text"
                           class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="email" class="col-form-label text-md-right">@lang('E-Mail Address')</label>


                    <input id="email" placeholder="Enter Email" type="email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="password" class=" col-form-label text-md-right">@lang('Password')</label>


                    <input id="password" placeholder="Enter Password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>

                <div class="form-group ">
                    <label for="password-confirm" class="col-form-label text-md-right">
                        @lang('Confirm Password')</label>


                    <input id="password-confirm" placeholder="Enter Confirm Password" type="password"
                           class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>

                <div class="text-center mt-3">
                    <button class="btn btn-primary  font-18" type="submit">@lang('Submit For Save')</button>
                </div>
            </form>

        </div>
    </div>


@endsection
