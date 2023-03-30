@extends('install.app')
@section('content')
    <div class="card">
        <div class="card-body">

            <div class="text-center">
                <img src="{{ filePath(getInstallerSystemSetting('type_logo')) }}" class="img-fluid" alt="logo">
            </div>

            @if (Session::get('success'))
                <div class="card-body">
                    <div class="alert alert-light" role="alert">
                        When you execute the SQL file, the database management system will create the required tables and
                        populate them with demo data. This can be useful for testing or demonstrating the functionality of a
                        website.
                    </div>
                    <div class="alert alert-dark" role="alert">
                        However, it is important to note that any existing data in the database may be overwritten or
                        deleted when the SQL file is executed, so it is recommended to use caution when running SQL scripts
                        on a production database.
                    </div>
                    <div class="text-center">
                        <a href="{{ route('org.create') }}" class="btn btn-primary font-18">
                            @lang('Import Sql')</a>
                    </div>
                </div>


                <div class="card-body d-none">
                    <h3 class="text-lg-center p-3">
                        @lang('Import Fresh Sql')</h3>
                    <p>
                        @lang('If You Click this button Sql File auto Save in Database')</p>
                    <div class="text-center">
                        <a href="{{ route('sql.empty') }}" class="btn btn-success font-18">
                            @lang('Import Sql')</a>
                    </div>
                </div>
            @else
                @if ($connected)
                    <div class="card-body">
                        <div class="alert alert-light" role="alert">
                            When you execute the SQL file, the database management system will create the required tables
                            and populate them with demo data. This can be useful for testing or demonstrating the
                            functionality of a website.
                        </div>
                        <div class="alert alert-dark" role="alert">
                            However, it is important to note that any existing data in the database may be overwritten or
                            deleted when the SQL file is executed, so it is recommended to use caution when running SQL
                            scripts on a production database.
                        </div>
                        <div class="text-center">
                            <a href="{{ route('org.create') }}" class="btn btn-primary font-18">
                                @lang('Import Sql')</a>
                        </div>
                    </div>


                    <div class="card-body d-none">
                        <h3 class="text-lg-center p-3">
                            @lang('Import Fresh Sql')</h3>
                        <p>
                            @lang('If You Click this button Sql File auto Save in Database')</p>
                        <div class="text-center">
                            <a href="{{ route('sql.empty') }}" class="btn btn-success font-18">
                                @lang('Import Sql')</a>
                        </div>
                    </div>
                @else
                @if (!Session::get('wrong'))
                    <div class="card-body text-center">
                        <div class="alert alert-warning" role="alert">
                            <p>A problem connecting to a database, which could be due to various reasons such as incorrect
                                credentials, network issues, or database server problems. Websites are unable to establish a
                                connection to the database.</p>


                        </div>
                        <hr>
                        <div class="alert alert-primary" role="alert">
                            <p>Please first check your internet connection to ensure that you are connected to the network.
                                Then, verify that you have entered the correct login credentials for the database, and that
                                the database server is running properly. You may also want to check with your system
                                administrator or technical support team for further assistance in resolving the issue.</p>
                        </div>

                        <a href="{{ route('create') }}" class="btn btn-danger btn-lg btn-block font-18">
                            @lang('Go to the Database Setup')</a>
                    </div>
                    @endif
                @endif
            @endif

            @if (Session::get('wrong'))
                <div class="card-body text-center">
                    <div class="alert alert-warning" role="alert">
                        <p>A problem connecting to a database, which could be due to various reasons such as incorrect
                            credentials, network issues, or database server problems. Websites are unable to establish a
                            connection to the database.</p>


                    </div>
                    <hr>
                    <div class="alert alert-primary" role="alert">
                        <p>Please first check your internet connection to ensure that you are connected to the network.
                            Then, verify that you have entered the correct login credentials for the database, and that the
                            database server is running properly. You may also want to check with your system administrator
                            or technical support team for further assistance in resolving the issue.</p>
                    </div>

                    <a href="{{ route('create') }}" class="btn btn-danger btn-lg btn-block font-18">
                        @lang('Go to the Database Setup')</a>
                </div>
            @endif
        </div>
    </div>
@endsection
