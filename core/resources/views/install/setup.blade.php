@extends('install.app')
@section('content')

    <div class="card">
        <div class="card-body ">

            <form action="{{route('db.setup')}}" method="post" class="text-left">
                @csrf
                <div class="text-center">
                    <img src="{{filePath(getInstallerSystemSetting('type_logo'))}}" class="img-fluid" alt="logo">
                </div>
                <h4 class="text-center my-4">@lang('Setup Database Configuration')</h4>
                <div class="alert alert-secondary" role="alert">
                    Database configuration is needed because it specifies the necessary settings for connecting an application to a database. The configuration includes parameters such as the database name, server name,  username and password connection details that are required to establish a connection to the database.
                  </div>

                  <div class="alert alert-dark" role="alert">
                    Without proper database configuration, an application cannot access or interact with the database, which can prevent the application from functioning properly. Incorrect configuration settings can also lead to errors, security issues, or poor performance.
                  </div>

                <div class="form-group mb-3">
                    <input type="hidden" name="types[]" value="DB_HOST">
                    <label class="mb-2">@lang('Database Host')</label>
                    <input class="form-control custom-input" placeholder="Database Host" name="DB_HOST" required>
                </div>
                <div class="form-group mb-3">
                    <input type="hidden" name="types[]" value="DB_DATABASE">
                    <label class="mb-2">@lang('Database Name')</label>
                    <input class="form-control custom-input" placeholder="Database Name" name="DB_DATABASE" required>
                </div>

                <div class="form-group mb-3">
                    <input type="hidden" name="types[]" value="DB_USERNAME">
                    <label class="mb-2">@lang('Database Username')</label>
                    <input class="form-control custom-input" placeholder="Database Username" name="DB_USERNAME" required>
                </div>

                <div class="form-group mb-3">
                    <input type="hidden" name="types[]" value="DB_PASSWORD">
                    <label class="mb-2">@lang('Database Password')</label>
                    <input class="form-control custom-input" placeholder="Database Password" type="password" name="DB_PASSWORD">
                </div>

                <div class="text-center">
                    <button class="btn btn-primary  font-18" type="submit">@lang('Save The Configuration')</button>
                </div>
            </form>

        </div>
    </div>


@endsection
