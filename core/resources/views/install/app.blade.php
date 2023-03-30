<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('app_name') }} - Install</title>
    <!-- Fevicon -->
    {{-- <link rel="shortcut icon" href="{{ filePath(getInstallerSystemSetting('favicon_icon')) }}"> --}}
    <!-- Start CSS -->
    <link href="{{ asset('assets/') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{ asset('assets/') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{ asset('assets/') }}/plugins/metismenu/css/metisMenu.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/') }}/css/pace.css" rel="stylesheet" />
    <script src="{{ asset('assets/') }}/js/pace.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/') }}/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('assets/') }}/css/bootstrap-extended.css" rel="stylesheet">
    <link href="{{ asset('assets/') }}/css/app.css" rel="stylesheet">
    <link href="{{ asset('assets/') }}/css/icons.css" rel="stylesheet">
    <link href="{{ asset('css/custom_style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/install_style.css') }}" rel="stylesheet">

    <!-- End CSS -->
</head>

<body class="bg-login">
    <!-- Start Containerbar -->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        @yield('content')
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!-- End Containerbar -->
    <!-- Start JS -->
    <script src="{{ asset('/') }}{{ asset('assets/') }}/js/bootstrap.bundle.js"></script>
    <!--plugins-->
    <script src="{{ asset('assets/') }}/js/jquery.js"></script>
    <script src="{{ asset('assets/') }}/plugins/simplebar/js/simplebar.js"></script>
    <script src="{{ asset('assets/') }}/plugins/metismenu/js/metisMenu.js"></script>
    <script src="{{ asset('assets/') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <script src="{{ asset('js/summernote/summernote.js') }}"></script>
    <script src="{{ asset('js/custom_script.js') }}"></script>

    <!-- End js -->
</body>

</html>
