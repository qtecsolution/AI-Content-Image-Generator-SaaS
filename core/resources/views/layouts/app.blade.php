<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon.png') }}">

    <title>@yield('title','Home') - {{ readConfig('name') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
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
            <h3 class="logo-name text-center">{{readConfig('name')}}</h3>
        </div>
        <div class="sidebar-body">
            <!-- user  -->
            <ul class="sidebar-menu">

                <li>
                    <a href="{{route('home')}}" class="sidebar-menu-link">
                        <img src="{{asset('assets/icons/home.svg')}}" alt="home icon ">
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-menu-link" data-bs-toggle="collapse" data-bs-target="#aiContent">
                        <img src="{{asset('assets/icons/content.svg')}}" alt="user icon ">
                        <span class="text">AI Content</span>
                        <span class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </a>

                    <div class="collapse" id="aiContent">
                        <div class="sidebar-drop">
                            <ul>
                                <li><a href="{{ route('content.create') }}">Content Generate</a></li>
                                <li><a href="{{ route('contents.index') }}">Saved Content</a></li>
                                <li><a href="{{ route('content-history.index') }}">Content History</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="sidebar-menu-link" data-bs-toggle="collapse" data-bs-target="#generateDropdown">
                        <img src="{{asset('assets/icons/image.svg')}}" alt="user icon ">
                        <span class="text">AI Image</span>
                        <span class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </a>

                    <div class="collapse" id="generateDropdown">
                        <div class="sidebar-drop">
                            <ul>
                                <li><a href="{{ route('image.create') }}">New Image</a></li>
                                <li><a href="{{ route('image.variation') }}">Image Variation</a></li>
                                <li><a href="{{ route('image.all') }}">All Images</a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                
                <li>
                    <a href="{{ route('plan.userIndex') }}" class="sidebar-menu-link">
                        <img src="{{asset('assets/icons/credit-card.svg')}}" alt="credit card  icon ">
                        <span class="text">Purchase plane</span>

                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-menu-link">
                        <img src="{{asset('assets/icons/reports.svg')}}" alt="credit card  icon ">
                        <span class="text">Reports</span>

                    </a>
                </li>

                @if (Auth::user()->type == 'admin')
                <li class="text-center border-bottom"> Admin Area </li>

                <li>
                    <a href="{{route('dashboard')}}" class="sidebar-menu-link">
                        <img src="{{asset('assets/icons/home.svg')}}" alt="home icon ">
                        <span class="text">Admin Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-menu-link" data-bs-toggle="collapse" data-bs-target="#aiManage">
                        <img src="{{asset('assets/icons/content.svg')}}" alt="user icon ">
                        <span class="text">AI Management</span>
                        <span class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </a>

                    <div class="collapse" id="aiManage">
                        <div class="sidebar-drop">
                            <ul>
                                <li><a href="{{ route('use-case.index') }}">Use Case Templates</a></li>
                                <li><a href="{{ route('setting') }}?tab=openai">AI Settings</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="sidebar-menu-link" data-bs-toggle="collapse" data-bs-target="#userManagement">
                        <img src="{{asset('assets/icons/content.svg')}}" alt="user icon ">
                        <span class="text">Manage Users</span>
                        <span class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </a>

                    <div class="collapse" id="userManagement">
                        <div class="sidebar-drop">
                            <ul>
                                <li><a href="{{ route('users.index') }}">Customer List</a></li>
                                <li><a href="{{ route('admin.all') }}">Admin List</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="sidebar-menu-link" data-bs-toggle="collapse" data-bs-target="#financialManagement">
                        <img src="{{asset('assets/icons/content.svg')}}" alt="user icon ">
                        <span class="text">Financial</span>
                        <span class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </a>

                    <div class="collapse" id="financialManagement">
                        <div class="sidebar-drop">
                            <ul>
                                <li><a href="{{ route('plan.index') }}">Manage Plan</a></li>
                                <li><a href="{{ route('payment.method') }}">Payment Methods</a></li>
                                <li><a href="{{route('order.index')}}">All Transections</a></li>
                                <li><a href="{{route('order.pending')}}">Pending Transections</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="sidebar-menu-link" data-bs-toggle="collapse" data-bs-target="#frontendManage">
                        <img src="{{asset('assets/icons/content.svg')}}" alt="user icon ">
                        <span class="text">Frontend</span>
                        <span class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </a>

                    <div class="collapse" id="frontendManage">
                        <div class="sidebar-drop">
                            <ul>
                                <li><a href="{{ route('setting') }}?tab=cms">Frontend Settings</a></li>
                                <li><a href="{{ route('manage-blogs.index') }}">Blog Manager</a></li>
                                <li><a href="{{ route('blog-category.index') }}">Blog Category</a></li>
                                <li><a href="{{ route('manage-faq.index') }}">FAQ Manager</a></li>
                                <li><a href="{{ route('pages.index') }}">Page Builder</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="sidebar-menu-link" data-bs-toggle="collapse" data-bs-target="#settings">
                        <img src="{{asset('assets/icons/content.svg')}}" alt="user icon ">
                        <span class="text">Settings</span>
                        <span class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>
                    </a>

                    <div class="collapse" id="settings">
                        <div class="sidebar-drop">
                            <ul>
                                <li><a href="{{ route('setting') }}?tab=cms">General Settings</a></li>
                                <li><a href="{{ route('setting') }}?tab=smtp">Mail Configure</a></li>
                                <li><a href="{{ route('setting') }}?tab=seo">SEO Settings</a></li>
                                <li><a href="{{ route('setting') }}?tab=login">Social Login</a></li>
                                <li><a href="{{ route('setting') }}?tab=tawkto">Tawk (Live chat)</a></li>
                                <li><a href="{{ route('setting') }}?tab=pwa">PWA Settings</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li data-bs-toggle="collapse" data-bs-target="#reports">
                    <a href="#" class="sidebar-menu-link">
                        <img src="{{asset('assets/icons/reports.svg')}}" alt="credit card  icon ">
                        <span class="text">Reports</span>
                        <span class="arrow-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </span>

                    </a> 

                    <div class="collapse" id="reports">
                        <div class="sidebar-drop">
                            <ul>
                                <li><a href="#">Sales Reports</a></li>
                                <li><a href="#">Google Analytics</a></li>

                            </ul>
                        </div>
                    </div>
                </li>
                @endif
            </ul>
            <ul class="sidebar-menu d-none">
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

                <li>
                    <a href="{{ route('plan.userIndex') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-title="Purchase Plan"> <img
                            src="{{ asset('assets/icons/layers.svg') }}"> </a>
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
                        <a href="{{ route('users.index') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
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
                        <a href="{{ route('order.index') }}" class="sidebar-menu-link" data-bs-toggle="tooltip"
                            data-bs-placement="right" data-bs-title="Orders"> <img
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
                                    <a href="{{ route('profile') }}" class="userlist-link">My Profile</a>
                                </li>
                                <li class="userlist-item">
                                    <a href="{{ route('profile.password') }}" class="userlist-link">Change Password</a>
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
            <a href="index.html">
                <h3 class="logo-name text-center header-logo">type.ez</h3>
            </a>

            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 20L4 4M20 4L4 20" stroke="#121212" stroke-width="2" stroke-linecap="round"></path>
                </svg>

            </button>
        </div>

        <div class="offcanvas-body">
           <!-- user  -->
           <ul class="sidebar-menu  ">

            <li>
                <a href="index.html" class="sidebar-menu-link">
                    <img src="assets/icons/home.svg" alt="home icon ">
                    <span class="text">User Dashboard</span>
                </a>
            </li>
            <li>
                <a href="index.html" class="sidebar-menu-link ">
                    <img src="assets/icons/content.svg" alt="home icon ">
                    <span class="text">Content generate</span>
                </a>
            </li>
            <li data-bs-toggle="collapse" data-bs-target="#generateDropdown">
                <a href="#" class="sidebar-menu-link active">
                    <img src="assets/icons/image.svg" alt="user icon ">
                    <span class="text">generate image</span>
                    <span class="arrow-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>
                </a>

                <div class="collapse" id="generateDropdown">
                    <div class="sidebar-drop">
                        <ul>
                            <li><a href="#">New Image</a></li>
                            <li><a href="#">Image Variation </a></li>

                        </ul>
                    </div>
                </div>
            </li>


            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/saved.svg" alt="layers icon ">
                    <span class="text">Saved Content</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/history.svg" alt="layers icon ">
                    <span class="text">Content History</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/list.svg" alt="layers icon ">
                    <span class="text">Generated Images</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/credit-card.svg" alt="credit card  icon ">
                    <span class="text">Purchase plane</span>

                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/reports.svg" alt="credit card  icon ">
                    <span class="text">Reports</span>

                </a>
            </li>

        </ul>

        <!-- admin  -->

        <ul class="sidebar-menu w-100">

            <li>
                <a href="index.html" class="sidebar-menu-link">
                    <img src="assets/icons/home.svg" alt=" admin  icon ">
                    <span class="text">admin </span>
                </a>
            </li>
            <li>
                <a href="index.html" class="sidebar-menu-link">
                    <img src="assets/icons/usecases.svg" alt="usecase icon ">
                    <span class="text">Manage Use Case</span>
                </a>
            </li>
            <li>
                <a href="index.html" class="sidebar-menu-link">
                    <img src="assets/icons/users.svg" alt="user icon  icon ">
                    <span class="text">Users List</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/admin.svg" alt="admin  icon ">
                    <span class="text">Admin List</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/plan.svg" alt="plan">
                    <span class="text">Manage plane</span>
                </a>
            </li>
            <li data-bs-toggle="collapse" data-bs-target="#manageBlog">
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons//blog.svg" alt="user icon ">
                    <span class="text">Manage Blog</span>
                    <span class="arrow-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>
                </a>

                <div class="collapse" id="manageBlog">
                    <div class="sidebar-drop">
                        <ul>
                            <li><a href="#">Category</a></li>
                            <li><a href="#">Blog</a></li>

                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/faq.svg" alt="home icon ">
                    <span class="text">Manage Faq</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/pagebuilder.svg" alt="home icon ">
                    <span class="text">Page Builder</span>
                </a>
            </li>
            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/payment.svg" alt="home icon ">
                    <span class="text">Payment Method</span>
                </a>
            </li>




            <li data-bs-toggle="collapse" data-bs-target="#reports">
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/reports.svg" alt="credit card  icon ">
                    <span class="text">Reports</span>
                    <span class="arrow-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>

                </a> 

                <div class="collapse" id="reports">
                    <div class="sidebar-drop">
                        <ul>
                            <li><a href="#">Sales Reports</a></li>
                            <li><a href="#">Google Analytics</a></li>

                        </ul>
                    </div>
                </div>
            </li>

            <li>
                <a href="#" class="sidebar-menu-link">
                    <img src="assets/icons/settings.svg" alt="credit card  icon ">
                    <span class="text">Settings</span>
                    <span class="arrow-icon" data-bs-toggle="collapse" data-bs-target="#settings">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </span>

                </a> 

                <div class="collapse" id="settings">
                    <div class="sidebar-drop">
                        <ul>
                            <li><a href="blog.html">Seo Settings</a></li>
                            <li><a href="#">Mail Configure</a></li>
                        </ul>
                    </div>
                </div>
            </li>
         

        </ul>

        </div>
    </div>

    <!-- SWIPER JS  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- BOOTSTRAP JS   -->
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--NICE SELECT 2  JS-->
    <script src="{{ asset('assets/js/niceselect2/nice-select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/niceselect2/nice-select-2-bind.js') }}"></script>

    <!-- JQUERY  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
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
    @include('layouts.modal');
    <!--Start of Tawk.to Script-->
    @if (readConfig('tawk_to') == 'yes')
        @include('layouts.tawk_to');
    @endif
    <!--End of Tawk.to Script-->

</body>
