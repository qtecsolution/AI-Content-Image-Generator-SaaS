<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon.png') }}">

    <title>{{ config('app.name', 'Social Media Organizer') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <!-- FONTAWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- SUMMERNOTE CS  -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- MAIN CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">





</head>

<body>
    <!-- SIDEBAR MENU START -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h3 class="logo-name text-center">type.ez</h3>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('posts.create') }}" class="add-btn" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Generate your Content">+</a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="" data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-title="Dashboard">
                        <img src="{{ asset('assets/images/menu/home.png') }}">
                    </a>
                </li>

                <!-- Admin Menu -->
                <li>
                    <a href="{{ route('user.index') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-title="User Management"> <img src="{{ asset('assets/images/menu/user.png') }}"> </a>
                </li>
                <li>
                    <a href="{{ route('plan.index') }}" class="" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Manage Plan"> <img
                            src="{{ asset('assets/images/menu/wallet.png') }}"> </a>
                </li>

                <li>
                    <a href="{{ route('plan.userIndex') }}" class="" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Purchase Plan"> <img
                            src="{{ asset('assets/images/menu/wallet.png') }}"> </a>
                </li>

                <li>
                    <a href="{{ route('payment.method') }}" class="" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Payment Gateway"> <img
                            src="{{ asset('assets/images/menu/wallets.png') }}"> </a>
                </li>
                <li>
                    <a href="{{ route('setting') }}" class="" data-bs-toggle="tooltip" data-bs-placement="right"
                        data-bs-title="System Settings"> <img
                            src="{{ asset('assets/images/menu/system-setting.png') }}"> </a>
                </li>

            </ul>
        </div>
    </aside>
    <!-- SIDEBAR MENU END -->

    <!-- MAIN SECTION START -->
    <main class="mainsection">
        <!-- HEADER SECTION START -->
        <header class="header">
            <!-- MOBILE-LOGO -->
            <h3 class="logo-name d-lg-none ">{{readConfig('type_name')}}</h3>
            <!-- ICON-MENU START -->
            <nav class="header-nav">
                <ul class="headermenu">
                    <!-- language  -->
                   
                    <!-- USER-DROPDOWN -->
                    <li class="headermenu-item">
                        <div class="user-info">
                            <figure class="user-thumb">
                                <img src="{{ filePath(Auth::user()->avatar) }}" alt="user image ">
                            </figure>
                            <div class="name-email">
                                <span class="name">{{ Auth::user()->name }}</span>
                                <span class="email">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                        <!-- DROPDOWN-MENU -->
                        <div class="userdropdown">
                            <div class="name-email-mobile">
                                <span class="name">{{ Auth::user()->name }}</span>
                                <span class="email">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="userlist">
                                <li class="userlist-item">
                                    <a href="{{ route('home') }}" class="userlist-link">My Profile</a>
                                </li>
                                <li class="userlist-item">
                                    <a class="userlist-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </header>
        @yield('content')
    </main>
    <!-- MAIN SECTION END -->




    <!-- MOBILE FIXED BUTTON -->
    <a class="add-btn mobile-fixed" href="create-post.html">+</a>
    <!-- BOOTSTRAP JS   -->
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--NICE SELECT 2  JS-->
    <script src="{{ asset('assets/js/niceselect2/nice-select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/niceselect2/nice-select-2-bind.js') }}"></script>

    <!-- JQUERY  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- DATATABLE -->
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    @include('sweetalert::alert')
    @include('layouts.delete');
    @yield('script')

    <!--Start of Tawk.to Script-->
    @if (readConfig('tawk_to') == 'yes')
        @include('layouts.tawk_to');
    @endif
    <!--End of Tawk.to Script-->

</body>
