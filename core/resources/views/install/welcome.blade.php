@extends('install.app')
@section('content')
    <div class="card">
        <div class="card-body text-center">

            <div class="text-center">
                <img src="{{ filePath(getInstallerSystemSetting('type_logo')) }}"  class="img-fluid" alt="logo">
            </div>

            <h4 class="font-weight m-2">{{ getInstallerSystemSetting('type_name') }} Installation</h4>
            <h5 class="m-2">You will need to know the following items before proceeding</h5>

            <ul class="list-group">
                <li class="list-group-item">
                    <h6 class="font-weight-normal">
                        <i class="fas fa-check"></i> Database Host Name
                    </h6>
                </li>
                <li class="list-group-item">
                    <h6 class="font-weight-normal">
                        <i class="fas fa-check"></i> Database Name
                    </h6>
                </li>
                <li class="list-group-item">
                    <h6 class="font-weight-normal">
                        <i class="fas fa-check"></i> Database User Name
                    </h6>
                </li>
                <li class="list-group-item">
                    <h6 class="font-weight-normal">
                        <i class="fas fa-check"></i> Database Password
                    </h6>
                </li>
            </ul>

            <p class="m-2">During the installation process. we will check if the files there needed to be written (<strong>.env
                    file</strong>)
                have <strong>write permission</strong>. We Will also check if
                <strong>curl</strong> are enabled on your server or not.
            </p>
            <br>
            <p class="m-2">Gather the information mentioned above before hitting the start installation button. if you are ready...</p>

       
            <div class="text-center">
            <a href="{{ route('permission') }}" class="btn btn-primary"> Start Installation
                Process</a>
            </div>
        </div>
    </div>
@endsection
