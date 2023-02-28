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



    @if(readConfig('pwa_active') == 'yes')
      @laravelPWA
    @endif


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
                    <a href="{{ route('content.create') }}" class="add-btn" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Generate your Content">+</a>
                </li>
                <li>
                    <a href="{{ route('image.create') }}" class="add-btn" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="AI Image Generate">-</a>
                </li>
                @if (Auth::user()->type == 'user')
                <li>
                    <a href="{{ route('home') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Home">
                        <img src="{{ asset('assets/icons/home.svg') }}">
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('contents.index') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Saved Content">
                        <img src="{{ asset('assets/icons/save.svg') }}">
                    </a>
                </li>
                <li>
                    <a href="{{ route('content-history.index') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Genertated History">
                        <img src="{{ asset('assets/icons/cards-icons/Book.svg') }}">
                    </a>
                </li>
                
                
                @if (Auth::user()->type == 'admin')
                    <!-- Admin Menu -->
                    <li>
                        <a href="{{ route('home') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="Dashboard">
                            <img src="{{ asset('assets/icons/home.svg') }}">
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="User Management"> <img
                                src="{{ asset('assets/icons/users.svg') }}"> </a>
                    </li>

                    <li>
                        <a href="{{ route('plan.index') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="Manage Plan"> <img
                                src="{{ asset('assets/icons/zap.svg') }}"> </a>
                    </li>

                    <li>
                        <a href="{{ route('plan.userIndex') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="Purchase Plan"> <img
                                src="{{ asset('assets/icons/layers.svg') }}"> </a>
                    </li>

                    <li>
                        <a href="{{ route('payment.method') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="Payment Gateway"> <img
                                src="{{ asset('assets/icons/credit-card.svg') }}"> </a>
                    </li>

                    <li>
                        <a href="{{ route('setting') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="System Settings"> <img
                                src="{{ asset('assets/icons/gear.svg') }}"> </a>
                    </li>
                @endif

            </ul>
        </div>
    </aside>
    <!-- SIDEBAR MENU END -->

    <!-- MAIN SECTION START -->
    <main class="mainsection">
        <!-- HEADER SECTION START -->
        <header class="header">
            <!-- hamburger icon  -->
            <button class="btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu"><img
                    src="{{ asset('assets/icons/menu.svg') }}" alt=""></button>
            <!-- MOBILE-LOGO -->
            <h3 class="logo-name d-lg-none ">{{ readConfig('type_name') }}</h3>
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
        <nav class="breadcrumb-nav"
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 pr-2 pull-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home </a></li>
                @yield('breadcrumb')
                {{-- <li class="breadcrumb-item active">Contents</li> --}}
            </ol>
        </nav>
        @yield('content')
    </main>
    <!-- MAIN SECTION END -->




    <!-- MOBILE OFFCANVAS MENU  -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="staticBackdropLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                I will not close if you click outside of me.
            </div>
        </div>
    </div>


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
