<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicon.png')}}">

    <title>{{ config('app.name', 'Social Media Organizer') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <!-- FONTAWESOME  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- SUMMERNOTE CS  -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- MAIN CSS  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">





</head>

<body>
    <!-- SIDEBAR MENU START -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h3 class="logo-name text-center">type.ez</h3>
        </div>
        <div class="sidebar-body">
            <a href="{{route('posts.create')}}" class="add-btn" 
                data-bs-placement="top">+</a>
            <a href="{{route('home')}}" class="home-btn active">
                <span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.5 7.50008L10 1.66675L17.5 7.50008V16.6667C17.5 17.1088 17.3244 17.5327 17.0118 17.8453C16.6993 18.1578 16.2754 18.3334 15.8333 18.3334H4.16667C3.72464 18.3334 3.30072 18.1578 2.98816 17.8453C2.67559 17.5327 2.5 17.1088 2.5 16.6667V7.50008Z"
                            stroke="#D0D5DD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.5 18.3333V10H12.5V18.3333" stroke="#D0D5DD" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </span>
            </a>
        </div>
    </aside>
    <!-- SIDEBAR MENU END -->

    <!-- MAIN SECTION START -->
    <main class="mainsection">
        <!-- HEADER SECTION START -->
        <header class="header">
            <!-- MOBILE-LOGO -->
            <h3 class="logo-name d-lg-none ">type.ez</h3>
            <!-- ICON-MENU START -->
            <nav class="header-nav">
                <ul class="headermenu">
                    <!-- language  -->
                    <li class="headermenu-item ">
                        <select name="" id="" class="nice-select"
                            style="opacity: 0; width: 0px; padding: 0px; height: 0px;">
                            <option value="danish">DA</option>
                            <option value="dutch">NL</option>
                            <option value="douch">EN</option>
                            <option value="bangla">Bn</option>
                        </select>
                    </li>
                    <!-- USER-DROPDOWN -->
                    <li class="headermenu-item">
                        <div class="user-info">
                            <figure class="user-thumb">
                                <img src="{{asset('assets/images/user.png')}}" alt="user image ">
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
                                    <a href="{{route('home')}}" class="userlist-link">My Profile</a>
                                </li>
                                <li class="userlist-item">
                                    <a class="userlist-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
    <script src="{{asset('assets/js/niceselect2/nice-select2.min.js')}}"></script>
    <script src="{{asset('assets/js/niceselect2/nice-select-2-bind.js')}}"></script>

    <!-- JQUERY  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <!-- DATATABLE -->
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    @yield('script')

</body>