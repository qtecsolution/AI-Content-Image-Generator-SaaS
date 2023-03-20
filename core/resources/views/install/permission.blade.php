@extends('install.app')
@section('content')
    <div class="card">
        <div class="card-body text-center">

            <div class="text-center">
                <img src="{{filePath(getInstallerSystemSetting('type_logo'))}}" class="img-fluid" alt="logo">
            </div>

            <div class="text-center mb-2">
                <h1 class="ont-weight-bold">Checking File Permissions</h1>
                <h5>We ran diagnosis on your server. Review the items that have a red mark on it. <br> If everything is green, you are good to go to the next step.</h5>
            </div>

            <ul class="list-group">
                <li class="list-group-item text-semibold">
                    Php version 8.1 +
                    @php
                        $phpVersion = number_format((float)phpversion(), 2, '.', '');
                    @endphp
                   
                    @if ($phpVersion >= 8.1)
                        <i class="fa fa-check text-success pull-right"></i>
                    @else
                        <i class="fa fa-close text-danger pull-right"></i>
                    @endif
                </li>
                <li class="list-group-item text-semibold">
                    Curl Enabled

                    @if ($permission['curl_enabled'])
                        <i class="fa fa-check text-success pull-right"></i>
                    @else
                        <i class="fa fa-close text-danger pull-right"></i>

                    @endif
                </li>
                <li class="list-group-item text-semibold">
                    <b>.env</b> File Permission

                    @if ($permission['db_file_write_perm'])
                        <i class="fa fa-check text-success pull-right"></i>
                    @else
                        <i class="fa fa-close text-danger pull-right"></i>

                    @endif
                </li>

                <li class="list-group-item text-semibold">
                    <b>.storage</b> Path Permission

                    @if ($permission['storage'])
                        <i class="fa fa-check text-success pull-right"></i>
                    @else
                        <i class="fa fa-close text-danger pull-right"></i>

                    @endif
                </li>
                <li class="list-group-item text-semibold">
                    <b>public </b> Path Permission

                    @if ($permission['public'])
                        <i class="fa fa-check text-success pull-right"></i>
                    @else
                        <i class="fa fa-close text-danger pull-right"></i>

                    @endif
                </li>

                <li class="list-group-item text-semibold">
                    <b>.htaccess </b> Path Permission

                    @if ($permission['htaccess'])
                        <i class="fa fa-check text-success pull-right"></i>
                    @else
                        <i class="fa fa-close text-danger pull-right"></i>

                    @endif
                </li>
            </ul>

            <p class="text-center mt-3">
                @if ($permission['curl_enabled'] == 1 && 
                $permission['db_file_write_perm'] == 1 &&  
                $permission['storage'] == 1 &&  
                $permission['public'] == 1 &&  
                $permission['htaccess'] == 1 &&  
                $phpVersion >= 8)
                    <a href = "{{ route('create') }}" class="btn btn-primary font-18">Go To Next Step</a>
                @endif
            </p>
        </div>
    </div>


@endsection
