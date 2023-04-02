<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ filePath(readConfig('favicon_icon')) }}">

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
    <link rel="stylesheet" href="{{ asset('assets/css/utilities.css') }}">



    @if(readConfig('pwa_active') == 'yes')
    @laravelPWA
    @endif


</head>

<body>
    <!-- SIDEBAR MENU START -->
    <aside class="sidebar">
        <div class="sidebar-header">

            <a href="{{route('home')}}">
                <h3 class="logo-name text-center"> {{readConfig('name')}} </h3>
            </a>



        </div>
        <div class="sidebar-body">
            <!-- user menu  menu -->
            <div class="dashboard-menu  ">
                <a href="{{route('home')}}" class="dashboard-link gray-800 d-flex align-items-center fz-14 {{ menuActive('home') ? 'active' : '' }}">
                    <span class="icon">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 1.5C13.337 1.5 12.7011 1.76339 12.2322 2.23223C11.7634 2.70107 11.5 3.33696 11.5 4V14C11.5 14.663 11.7634 15.2989 12.2322 15.7678C12.7011 16.2366 13.337 16.5 14 16.5C14.663 16.5 15.2989 16.2366 15.7678 15.7678C16.2366 15.2989 16.5 14.663 16.5 14C16.5 13.337 16.2366 12.7011 15.7678 12.2322C15.2989 11.7634 14.663 11.5 14 11.5H4C3.33696 11.5 2.70107 11.7634 2.23223 12.2322C1.76339 12.7011 1.5 13.337 1.5 14C1.5 14.663 1.76339 15.2989 2.23223 15.7678C2.70107 16.2366 3.33696 16.5 4 16.5C4.66304 16.5 5.29893 16.2366 5.76777 15.7678C6.23661 15.2989 6.5 14.663 6.5 14V4C6.5 3.33696 6.23661 2.70107 5.76777 2.23223C5.29893 1.76339 4.66304 1.5 4 1.5C3.33696 1.5 2.70107 1.76339 2.23223 2.23223C1.76339 2.70107 1.5 3.33696 1.5 4C1.5 4.66304 1.76339 5.29893 2.23223 5.76777C2.70107 6.23661 3.33696 6.5 4 6.5H14C14.663 6.5 15.2989 6.23661 15.7678 5.76777C16.2366 5.29893 16.5 4.66304 16.5 4C16.5 3.33696 16.2366 2.70107 15.7678 2.23223C15.2989 1.76339 14.663 1.5 14 1.5Z"
                                stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </span>
                    <span class="fz-16">Home</span>
                </a>
                <div class="menu-accordion">
                    <div class="accordion" id="userMenuAccordion">
                        <!-- ai content  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button {{ menuActive(['content.*','contents.*','content-history.*']) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#aiContent" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.6666 1.66675H4.99992C4.55789 1.66675 4.13397 1.84234 3.82141 2.1549C3.50885 2.46746 3.33325 2.89139 3.33325 3.33341V16.6667C3.33325 17.1088 3.50885 17.5327 3.82141 17.8453C4.13397 18.1578 4.55789 18.3334 4.99992 18.3334H14.9999C15.4419 18.3334 15.8659 18.1578 16.1784 17.8453C16.491 17.5327 16.6666 17.1088 16.6666 16.6667V6.66675L11.6666 1.66675Z"
                                                stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M11.6667 1.66675V6.66675H16.6667" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.3334 10.8333H6.66675" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.3334 14.1667H6.66675" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.33341 7.5H7.50008H6.66675" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>


                                    </span>
                                    <span class="title fz-16"> AI Content</span>
                                </button>
                            </h2>
                            <div id="aiContent" class="accordion-collapse collapse {{ menuActive(['content.*','contents.*','content-history.*']) ? 'show' : '' }}" aria-labelledby="headingOne"
                                data-bs-parent="#userMenuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('content.create') }}" class="menu-item {{menuActive("content.*") ? 'active' : ''}}">Content Generate</a>
                                        <a href="{{ route('contents.index') }}" class="menu-item {{menuActive("contents.*") ? 'active' : ''}}">Saved Content</a>
                                        <a href="{{ route('content-history.index') }}" class="menu-item {{menuActive("content-history.*") ? 'active' : ''}}">Content History</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ai images -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{ menuActive(['image.*']) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#aiImage" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.8333 2.5H4.16667C3.24619 2.5 2.5 3.24619 2.5 4.16667V15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5H15.8333C16.7538 17.5 17.5 16.7538 17.5 15.8333V4.16667C17.5 3.24619 16.7538 2.5 15.8333 2.5Z"
                                                stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M7.08325 8.33337C7.77361 8.33337 8.33325 7.77373 8.33325 7.08337C8.33325 6.39302 7.77361 5.83337 7.08325 5.83337C6.3929 5.83337 5.83325 6.39302 5.83325 7.08337C5.83325 7.77373 6.3929 8.33337 7.08325 8.33337Z"
                                                stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M17.5001 12.5L13.3334 8.33337L4.16675 17.5" stroke="#475467"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>

                                    <span class="title fz-16">AI Image</span>
                                </button>
                            </h2>
                            <div id="aiImage" class="accordion-collapse collapse {{ menuActive(['image.*']) ? 'show' : '' }}" aria-labelledby="headingThree"
                                data-bs-parent="#userMenuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">

                                        <a href="{{ route('image.create') }}" class="menu-item {{ menuActive(['image.create']) ? 'active' : '' }}">New Image</a>
                                        <a href="{{ route('image.variation') }}" class="menu-item {{ menuActive(['image.variation']) ? 'active' : '' }}">Image Variation</a>
                                        <a href="{{ route('image.all') }}" class="menu-item {{ menuActive(['image.all']) ? 'active' : '' }}">All Images</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <a href="{{ route('user.purchase') }}" class="dashboard-link gray-800 d-flex align-items-center fz-14 {{ menuActive(['user.purchase']) ? 'active' : '' }}">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_532_21535)">
                                <path d="M10 0.833374V19.1667" stroke="#475467" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M14.1667 4.16663H7.91667C7.14312 4.16663 6.40125 4.47392 5.85427 5.0209C5.30729 5.56788 5 6.30974 5 7.08329C5 7.85684 5.30729 8.59871 5.85427 9.14569C6.40125 9.69267 7.14312 9.99996 7.91667 9.99996H12.0833C12.8569 9.99996 13.5987 10.3073 14.1457 10.8542C14.6927 11.4012 15 12.1431 15 12.9166C15 13.6902 14.6927 14.432 14.1457 14.979C13.5987 15.526 12.8569 15.8333 12.0833 15.8333H5"
                                    stroke="#475467" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_532_21535">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>


                    </span>
                    <span class="fz-16">Purchase Plan</span>
                </a>
                <a href="{{ route('user.transactions') }}" class="dashboard-link gray-800 d-flex align-items-center fz-14 {{ menuActive(['user.transactions','user.transactions.details']) ? 'active' : '' }}">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_532_21542)">
                                <path
                                    d="M17.6749 13.2416C17.1448 14.4953 16.3156 15.6001 15.2598 16.4594C14.2041 17.3186 12.9539 17.9061 11.6186 18.1706C10.2833 18.4351 8.90362 18.3684 7.60005 17.9764C6.29649 17.5845 5.10878 16.8792 4.14078 15.9222C3.17277 14.9651 2.45394 13.7856 2.04712 12.4866C1.64031 11.1876 1.5579 9.80868 1.80709 8.47047C2.05629 7.13226 2.62951 5.87547 3.47663 4.80997C4.32376 3.74447 5.419 2.90271 6.6666 2.35828"
                                    stroke="#475467" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M18.3333 9.99996C18.3333 8.90561 18.1178 7.82198 17.699 6.81093C17.2802 5.79988 16.6664 4.88122 15.8926 4.1074C15.1187 3.33358 14.2001 2.71975 13.189 2.30096C12.178 1.88217 11.0943 1.66663 10 1.66663V9.99996H18.3333Z"
                                    stroke="#475467" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_532_21542">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>


                    </span>
                    <span class="fz-16">My Transactions</span>
                </a>
            </div>

            <!-- admin menu -->
            @if(Auth::user()->type=="admin")
            <div class="dashboard-menu">
                <a href="{{route('dashboard')}}" class="dashboard-link gray-800 d-flex align-items-center fz-14 {{ menuActive('dashboard') ? 'active' : '' }}">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.8333 2.5H4.16667C3.24619 2.5 2.5 3.24619 2.5 4.16667V15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5H15.8333C16.7538 17.5 17.5 16.7538 17.5 15.8333V4.16667C17.5 3.24619 16.7538 2.5 15.8333 2.5Z"
                                stroke="#475467" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.5 7.5H17.5" stroke="#475467" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M7.5 17.5V7.5" stroke="#475467" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class="fz-16">Dashboard</span>
                </a>
                <div class="menu-accordion">
                    <div class="accordion" id="menuAccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button {{ (menuActive('use-case.*') || (menuActive('setting') && request()->input('tab') === 'openai')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#manageAi" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_532_26203)">
                                                <path
                                                    d="M15.0002 3.33334H5.00016C4.07969 3.33334 3.3335 4.07954 3.3335 5.00001V15C3.3335 15.9205 4.07969 16.6667 5.00016 16.6667H15.0002C15.9206 16.6667 16.6668 15.9205 16.6668 15V5.00001C16.6668 4.07954 15.9206 3.33334 15.0002 3.33334Z"
                                                    stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M12.5 7.5H7.5V12.5H12.5V7.5Z" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.5 0.833344V3.33334" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.5 0.833344V3.33334" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.5 16.6667V19.1667" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.5 16.6667V19.1667" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.6665 7.5H19.1665" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.6665 11.6667H19.1665" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M0.833496 7.5H3.3335" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M0.833496 11.6667H3.3335" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_532_26203">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                    </span>
                                    <span class="title fz-16"> Manage AI</span>
                                </button>
                            </h2>
                            <div id="manageAi" class="accordion-collapse collapse {{ (menuActive('use-case.*') || (menuActive('setting') && request()->input('tab') === 'openai')) ? 'show' : '' }} " aria-labelledby="headingOne"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('use-case.index') }}" class="menu-item {{ menuActive('use-case.*') ? 'active' : '' }}">Use Case Templates</a>
                                        <a href="{{ route('setting') }}?tab=openai" class="menu-item {{ menuActive('setting') && request()->input('tab') === 'openai' ? 'active' : '' }}">AI Settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{menuActive(['users.*','admin.*'])?'':'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#manageUsers" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_532_26219)">
                                                <path
                                                    d="M14.1668 17.5V15.8333C14.1668 14.9493 13.8156 14.1014 13.1905 13.4763C12.5654 12.8512 11.7176 12.5 10.8335 12.5H4.16683C3.28277 12.5 2.43493 12.8512 1.80981 13.4763C1.18469 14.1014 0.833496 14.9493 0.833496 15.8333V17.5"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M7.49984 9.16667C9.34079 9.16667 10.8332 7.67428 10.8332 5.83333C10.8332 3.99238 9.34079 2.5 7.49984 2.5C5.65889 2.5 4.1665 3.99238 4.1665 5.83333C4.1665 7.67428 5.65889 9.16667 7.49984 9.16667Z"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M19.1665 17.5V15.8333C19.166 15.0948 18.9201 14.3773 18.4676 13.7936C18.0152 13.2099 17.3816 12.793 16.6665 12.6083"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M13.3335 2.60834C14.0505 2.79192 14.686 3.20892 15.1399 3.7936C15.5937 4.37827 15.84 5.09736 15.84 5.8375C15.84 6.57765 15.5937 7.29674 15.1399 7.88141C14.686 8.46609 14.0505 8.88309 13.3335 9.06667"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_532_26219">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                    </span>

                                    <span class="title fz-16">Manage Users</span>
                                </button>
                            </h2>
                            <div id="manageUsers" class="accordion-collapse collapse {{menuActive(['users.*','admin.*'])?'show':''}}" aria-labelledby="headingThree"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('users.index') }}"
                                            class="menu-item {{ menuActive('users.*') ? 'active' : '' }}">Customer
                                            List</a>
                                        <a href="{{ route('admin.all') }}"
                                            class=" menu-item  {{ menuActive('admin.*') ? 'active' : '' }}">Admin
                                            List</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{menuActive(['payment.*','order.*','plan.*']) ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#finanCial" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_532_26228)">
                                                <path
                                                    d="M17.5002 3.33334H2.50016C1.57969 3.33334 0.833496 4.07954 0.833496 5.00001V15C0.833496 15.9205 1.57969 16.6667 2.50016 16.6667H17.5002C18.4206 16.6667 19.1668 15.9205 19.1668 15V5.00001C19.1668 4.07954 18.4206 3.33334 17.5002 3.33334Z"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M0.833496 8.33334H19.1668" stroke="#475467" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_532_26228">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>


                                    </span>

                                    <span class="title fz-16">Financial</span>
                                </button>
                            </h2>
                            <div id="finanCial" class="accordion-collapse collapse {{menuActive(['payment.*','order.*','plan.*']) ? 'show' : ''}} " aria-labelledby="headingThree"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">


                                        <a href="{{ route('plan.index') }}" class="menu-item {{menuActive('plan.*')?'active':''}}">Manage Plan</a>
                                        <a href="{{ route('payment.method') }}" class="menu-item {{menuActive('payment.*')?'active':''}}">Payment Methods</a>
                                        <a href="{{route('order.index')}}" class="menu-item {{menuActive('order.*') && request()->input('status') == null?'active':''}}">All Transactions</a>
                                        <a href="{{route('order.index')}}?status=0" class="menu-item {{menuActive('order.index') && request()->input('status') == "0"?'active':''}}">Pending
                                            Transactions</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{menuActive(['manage-blogs.*','blog-category.*','manage-faq.*','pages.*'])? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#frontend" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.667 2.5H3.33366C2.41318 2.5 1.66699 3.24619 1.66699 4.16667V12.5C1.66699 13.4205 2.41318 14.1667 3.33366 14.1667H16.667C17.5875 14.1667 18.3337 13.4205 18.3337 12.5V4.16667C18.3337 3.24619 17.5875 2.5 16.667 2.5Z"
                                                stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M6.66699 17.5H13.3337" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10 14.1667V17.5" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>

                                    <span class="title fz-16">Frontend</span>
                                </button>
                            </h2>
                            <div id="frontend" class="accordion-collapse collapse {{menuActive(['manage-blogs.*','blog-category.*','manage-faq.*','pages.*'])? 'show' : ''}}" aria-labelledby="headingThree"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('manage-blogs.index') }}" class="menu-item {{menuActive("manage-blogs.*")?'active':''}}">Blog Manager</a>
                                        <a href="{{ route('blog-category.index') }}" class="menu-item {{menuActive("blog-category.*")?'active':''}}">Blog Category</a>
                                        <a href="{{ route('manage-faq.index') }}" class="menu-item {{menuActive("manage-faq.*")?'active':''}}">FAQ Manager</a>
                                        <a href="{{ route('pages.index') }}" class="menu-item {{menuActive("pages.*")?'active':''}}">Page Builder</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{(menuActive("setting") && request()->input('tab') != 'openai')?'':'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#settingMenu" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_532_26407)">
                                                <path
                                                    d="M10 12.5C11.3807 12.5 12.5 11.3807 12.5 10C12.5 8.61929 11.3807 7.5 10 7.5C8.61929 7.5 7.5 8.61929 7.5 10C7.5 11.3807 8.61929 12.5 10 12.5Z"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M16.1663 12.4999C16.0554 12.7513 16.0223 13.0301 16.0713 13.3004C16.1204 13.5707 16.2492 13.8202 16.4413 14.0166L16.4913 14.0666C16.6463 14.2214 16.7692 14.4052 16.8531 14.6075C16.937 14.8098 16.9802 15.0267 16.9802 15.2458C16.9802 15.4648 16.937 15.6817 16.8531 15.884C16.7692 16.0863 16.6463 16.2701 16.4913 16.4249C16.3366 16.5799 16.1527 16.7028 15.9504 16.7867C15.7481 16.8706 15.5312 16.9137 15.3122 16.9137C15.0931 16.9137 14.8763 16.8706 14.6739 16.7867C14.4716 16.7028 14.2878 16.5799 14.133 16.4249L14.083 16.3749C13.8866 16.1828 13.6372 16.0539 13.3668 16.0049C13.0965 15.9559 12.8177 15.989 12.5663 16.0999C12.3199 16.2056 12.1097 16.381 11.9616 16.6045C11.8135 16.8281 11.7341 17.0901 11.733 17.3583V17.4999C11.733 17.9419 11.5574 18.3659 11.2449 18.6784C10.9323 18.991 10.5084 19.1666 10.0663 19.1666C9.62431 19.1666 9.20039 18.991 8.88783 18.6784C8.57527 18.3659 8.39967 17.9419 8.39967 17.4999V17.4249C8.39322 17.1491 8.30394 16.8816 8.14343 16.6572C7.98293 16.4328 7.75862 16.2618 7.49967 16.1666C7.24833 16.0557 6.96951 16.0226 6.69918 16.0716C6.42885 16.1206 6.17941 16.2495 5.98301 16.4416L5.93301 16.4916C5.77822 16.6465 5.5944 16.7695 5.39207 16.8533C5.18974 16.9372 4.97287 16.9804 4.75384 16.9804C4.53481 16.9804 4.31794 16.9372 4.11561 16.8533C3.91328 16.7695 3.72946 16.6465 3.57467 16.4916C3.41971 16.3368 3.29678 16.153 3.21291 15.9507C3.12903 15.7483 3.08586 15.5314 3.08586 15.3124C3.08586 15.0934 3.12903 14.8765 3.21291 14.6742C3.29678 14.4719 3.41971 14.288 3.57467 14.1332L3.62467 14.0833C3.81679 13.8869 3.94566 13.6374 3.99468 13.3671C4.04369 13.0967 4.0106 12.8179 3.89967 12.5666C3.79404 12.3201 3.61864 12.1099 3.39506 11.9618C3.17149 11.8138 2.9095 11.7343 2.64134 11.7333H2.49967C2.05765 11.7333 1.63372 11.5577 1.32116 11.2451C1.0086 10.9325 0.833008 10.5086 0.833008 10.0666C0.833008 9.62456 1.0086 9.20063 1.32116 8.88807C1.63372 8.57551 2.05765 8.39992 2.49967 8.39992H2.57467C2.8505 8.39347 3.11801 8.30418 3.34242 8.14368C3.56684 7.98317 3.73777 7.75886 3.83301 7.49992C3.94394 7.24857 3.97703 6.96976 3.92801 6.69943C3.879 6.4291 3.75012 6.17965 3.55801 5.98325L3.50801 5.93325C3.35305 5.77846 3.23012 5.59465 3.14624 5.39232C3.06237 5.18999 3.0192 4.97311 3.0192 4.75408C3.0192 4.53506 3.06237 4.31818 3.14624 4.11585C3.23012 3.91352 3.35305 3.72971 3.50801 3.57492C3.6628 3.41996 3.84661 3.29703 4.04894 3.21315C4.25127 3.12928 4.46815 3.08611 4.68717 3.08611C4.9062 3.08611 5.12308 3.12928 5.32541 3.21315C5.52774 3.29703 5.71155 3.41996 5.86634 3.57492L5.91634 3.62492C6.11274 3.81703 6.36219 3.94591 6.63252 3.99492C6.90285 4.04394 7.18166 4.01085 7.43301 3.89992H7.49967C7.74615 3.79428 7.95635 3.61888 8.10442 3.39531C8.25248 3.17173 8.33194 2.90974 8.33301 2.64159V2.49992C8.33301 2.05789 8.5086 1.63397 8.82116 1.32141C9.13372 1.00885 9.55765 0.833252 9.99967 0.833252C10.4417 0.833252 10.8656 1.00885 11.1782 1.32141C11.4907 1.63397 11.6663 2.05789 11.6663 2.49992V2.57492C11.6674 2.84307 11.7469 3.10506 11.8949 3.32864C12.043 3.55221 12.2532 3.72762 12.4997 3.83325C12.751 3.94418 13.0298 3.97727 13.3002 3.92826C13.5705 3.87924 13.8199 3.75037 14.0163 3.55825L14.0663 3.50825C14.2211 3.35329 14.4049 3.23036 14.6073 3.14649C14.8096 3.06261 15.0265 3.01944 15.2455 3.01944C15.4645 3.01944 15.6814 3.06261 15.8837 3.14649C16.0861 3.23036 16.2699 3.35329 16.4247 3.50825C16.5796 3.66304 16.7026 3.84685 16.7864 4.04918C16.8703 4.25151 16.9135 4.46839 16.9135 4.68742C16.9135 4.90644 16.8703 5.12332 16.7864 5.32565C16.7026 5.52798 16.5796 5.7118 16.4247 5.86658L16.3747 5.91658C16.1826 6.11298 16.0537 6.36243 16.0047 6.63276C15.9557 6.90309 15.9887 7.1819 16.0997 7.43325V7.49992C16.2053 7.74639 16.3807 7.9566 16.6043 8.10466C16.8279 8.25272 17.0899 8.33218 17.358 8.33325H17.4997C17.9417 8.33325 18.3656 8.50885 18.6782 8.82141C18.9907 9.13397 19.1663 9.55789 19.1663 9.99992C19.1663 10.4419 18.9907 10.8659 18.6782 11.1784C18.3656 11.491 17.9417 11.6666 17.4997 11.6666H17.4247C17.1565 11.6677 16.8945 11.7471 16.671 11.8952C16.4474 12.0432 16.272 12.2534 16.1663 12.4999Z"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_532_26407">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>


                                    </span>

                                    <span class="title fz-16">Settings</span>
                                </button>
                            </h2>
                            <div id="settingMenu" class="accordion-collapse collapse {{(menuActive("setting") && request()->input('tab') != 'openai')?'show':''}}" aria-labelledby="headingThree"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('setting') }}?tab=cms" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'cms' ? 'active' : '' }}">General Settings</a>
                                        <a href="{{ route('setting') }}?tab=smtp" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'smtp' ? 'active' : '' }}">Mail Configure</a>
                                        <a href="{{ route('setting') }}?tab=seo" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'seo' ? 'active' : '' }}">SEO Settings</a>
                                        <a href="{{ route('setting') }}?tab=login" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'login' ? 'active' : '' }}">Social Login</a>
                                        <a href="{{ route('setting') }}?tab=tawkto" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'tawkto' ? 'active' : '' }}">Tawk (Live
                                            chat)</a>
                                        <a href="{{ route('setting') }}?tab=pwa" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'pwa' ? 'active' : '' }}">PWA Settings</a>


                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
            @endif
            



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
                                    <a href="{{ route('plan.userexpense') }}" class="userlist-link">Membership</a>
                                </li>
                                <li class="userlist-item">
                                    <a href="{{ route('profile') }}" class="userlist-link">My Profile</a>
                                </li>
                                <li class="userlist-item">
                                    <a href="{{ route('profile.password') }}" class="userlist-link">Change Password</a>
                                </li>
                                <li class="userlist-item">
                                    <a class="userlist-link" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <nav aria-label="breadcrumb " class="ai-breadcrumb">
            <ol class="breadcrumb m-0 fz-12  font-500">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @yield('breadcrumb')
                {{-- <li class="breadcrumb-item fz-12 active ">Contents</li> --}}
            </ol>
        </nav>
        <!-- <nav class="breadcrumb-nav bg-danger"
            style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 pr-2 pull-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="fa fa-home"></i> Home </a></li>
                @yield('breadcrumb')
                {{-- <li class="breadcrumb-item active">Contents</li> --}}
            </ol>
        </nav> -->
        @yield('content')
    </main>
    <!-- MAIN SECTION END -->




    <!-- MOBILE OFFCANVAS MENU  -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
            <a href="index.html">
                <h3 class="logo-name text-center header-logo"> {{readConfig('name')}} </h3>
            </a>

            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 20L4 4M20 4L4 20" stroke="#121212" stroke-width="2" stroke-linecap="round"></path>
                </svg>

            </button>
        </div>

        <div class="offcanvas-body">
             <!-- user menu  menu -->
            <div class="dashboard-menu  ">
                <a href="{{route('home')}}" class="dashboard-link gray-800 d-flex align-items-center fz-14 {{ menuActive('home') ? 'active' : '' }}">
                    <span class="icon">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 1.5C13.337 1.5 12.7011 1.76339 12.2322 2.23223C11.7634 2.70107 11.5 3.33696 11.5 4V14C11.5 14.663 11.7634 15.2989 12.2322 15.7678C12.7011 16.2366 13.337 16.5 14 16.5C14.663 16.5 15.2989 16.2366 15.7678 15.7678C16.2366 15.2989 16.5 14.663 16.5 14C16.5 13.337 16.2366 12.7011 15.7678 12.2322C15.2989 11.7634 14.663 11.5 14 11.5H4C3.33696 11.5 2.70107 11.7634 2.23223 12.2322C1.76339 12.7011 1.5 13.337 1.5 14C1.5 14.663 1.76339 15.2989 2.23223 15.7678C2.70107 16.2366 3.33696 16.5 4 16.5C4.66304 16.5 5.29893 16.2366 5.76777 15.7678C6.23661 15.2989 6.5 14.663 6.5 14V4C6.5 3.33696 6.23661 2.70107 5.76777 2.23223C5.29893 1.76339 4.66304 1.5 4 1.5C3.33696 1.5 2.70107 1.76339 2.23223 2.23223C1.76339 2.70107 1.5 3.33696 1.5 4C1.5 4.66304 1.76339 5.29893 2.23223 5.76777C2.70107 6.23661 3.33696 6.5 4 6.5H14C14.663 6.5 15.2989 6.23661 15.7678 5.76777C16.2366 5.29893 16.5 4.66304 16.5 4C16.5 3.33696 16.2366 2.70107 15.7678 2.23223C15.2989 1.76339 14.663 1.5 14 1.5Z"
                                stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </span>
                    <span class="fz-16">Home</span>
                </a>
                <div class="menu-accordion">
                    <div class="accordion" id="userMenuAccordion">
                        <!-- ai content  -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button {{ menuActive(['content.*','contents.*','content-history.*']) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#aiContent" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.6666 1.66675H4.99992C4.55789 1.66675 4.13397 1.84234 3.82141 2.1549C3.50885 2.46746 3.33325 2.89139 3.33325 3.33341V16.6667C3.33325 17.1088 3.50885 17.5327 3.82141 17.8453C4.13397 18.1578 4.55789 18.3334 4.99992 18.3334H14.9999C15.4419 18.3334 15.8659 18.1578 16.1784 17.8453C16.491 17.5327 16.6666 17.1088 16.6666 16.6667V6.66675L11.6666 1.66675Z"
                                                stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M11.6667 1.66675V6.66675H16.6667" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.3334 10.8333H6.66675" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.3334 14.1667H6.66675" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8.33341 7.5H7.50008H6.66675" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>


                                    </span>
                                    <span class="title fz-16"> AI Content</span>
                                </button>
                            </h2>
                            <div id="aiContent" class="accordion-collapse collapse {{ menuActive(['content.*','contents.*','content-history.*']) ? 'show' : '' }}" aria-labelledby="headingOne"
                                data-bs-parent="#userMenuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('content.create') }}" class="menu-item {{menuActive("content.*") ? 'active' : ''}}">Content Generate</a>
                                        <a href="{{ route('contents.index') }}" class="menu-item {{menuActive("contents.*") ? 'active' : ''}}">Saved Content</a>
                                        <a href="{{ route('content-history.index') }}" class="menu-item {{menuActive("content-history.*") ? 'active' : ''}}">Content History</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ai images -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{ menuActive(['image.*']) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#aiImage" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.8333 2.5H4.16667C3.24619 2.5 2.5 3.24619 2.5 4.16667V15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5H15.8333C16.7538 17.5 17.5 16.7538 17.5 15.8333V4.16667C17.5 3.24619 16.7538 2.5 15.8333 2.5Z"
                                                stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M7.08325 8.33337C7.77361 8.33337 8.33325 7.77373 8.33325 7.08337C8.33325 6.39302 7.77361 5.83337 7.08325 5.83337C6.3929 5.83337 5.83325 6.39302 5.83325 7.08337C5.83325 7.77373 6.3929 8.33337 7.08325 8.33337Z"
                                                stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M17.5001 12.5L13.3334 8.33337L4.16675 17.5" stroke="#475467"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>

                                    <span class="title fz-16">AI Image</span>
                                </button>
                            </h2>
                            <div id="aiImage" class="accordion-collapse collapse {{ menuActive(['image.*']) ? 'show' : '' }}" aria-labelledby="headingThree"
                                data-bs-parent="#userMenuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">

                                        <a href="{{ route('image.create') }}" class="menu-item {{ menuActive(['image.create']) ? 'active' : '' }}">New Image</a>
                                        <a href="{{ route('image.variation') }}" class="menu-item {{ menuActive(['image.variation']) ? 'active' : '' }}">Image Variation</a>
                                        <a href="{{ route('image.all') }}" class="menu-item {{ menuActive(['image.all']) ? 'active' : '' }}">All Images</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <a href="{{ route('user.purchase') }}" class="dashboard-link gray-800 d-flex align-items-center fz-14 {{ menuActive(['user.purchase']) ? 'active' : '' }}">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_532_21535)">
                                <path d="M10 0.833374V19.1667" stroke="#475467" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M14.1667 4.16663H7.91667C7.14312 4.16663 6.40125 4.47392 5.85427 5.0209C5.30729 5.56788 5 6.30974 5 7.08329C5 7.85684 5.30729 8.59871 5.85427 9.14569C6.40125 9.69267 7.14312 9.99996 7.91667 9.99996H12.0833C12.8569 9.99996 13.5987 10.3073 14.1457 10.8542C14.6927 11.4012 15 12.1431 15 12.9166C15 13.6902 14.6927 14.432 14.1457 14.979C13.5987 15.526 12.8569 15.8333 12.0833 15.8333H5"
                                    stroke="#475467" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_532_21535">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>


                    </span>
                    <span class="fz-16">Purchase Plan</span>
                </a>
                <a href="{{ route('user.transactions') }}" class="dashboard-link gray-800 d-flex align-items-center fz-14 {{ menuActive(['user.transactions','user.transactions.details']) ? 'active' : '' }}">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_532_21542)">
                                <path
                                    d="M17.6749 13.2416C17.1448 14.4953 16.3156 15.6001 15.2598 16.4594C14.2041 17.3186 12.9539 17.9061 11.6186 18.1706C10.2833 18.4351 8.90362 18.3684 7.60005 17.9764C6.29649 17.5845 5.10878 16.8792 4.14078 15.9222C3.17277 14.9651 2.45394 13.7856 2.04712 12.4866C1.64031 11.1876 1.5579 9.80868 1.80709 8.47047C2.05629 7.13226 2.62951 5.87547 3.47663 4.80997C4.32376 3.74447 5.419 2.90271 6.6666 2.35828"
                                    stroke="#475467" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M18.3333 9.99996C18.3333 8.90561 18.1178 7.82198 17.699 6.81093C17.2802 5.79988 16.6664 4.88122 15.8926 4.1074C15.1187 3.33358 14.2001 2.71975 13.189 2.30096C12.178 1.88217 11.0943 1.66663 10 1.66663V9.99996H18.3333Z"
                                    stroke="#475467" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_532_21542">
                                    <rect width="20" height="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>


                    </span>
                    <span class="fz-16">My Transactions</span>
                </a>
            </div>

            <!-- admin menu -->
            @if(Auth::user()->type=="admin")
            <div class="dashboard-menu">
                <a href="{{route('dashboard')}}" class="dashboard-link gray-800 d-flex align-items-center fz-14 {{ menuActive('dashboard') ? 'active' : '' }}">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.8333 2.5H4.16667C3.24619 2.5 2.5 3.24619 2.5 4.16667V15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5H15.8333C16.7538 17.5 17.5 16.7538 17.5 15.8333V4.16667C17.5 3.24619 16.7538 2.5 15.8333 2.5Z"
                                stroke="#475467" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M2.5 7.5H17.5" stroke="#475467" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M7.5 17.5V7.5" stroke="#475467" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class="fz-16">Dashboard</span>
                </a>
                <div class="menu-accordion">
                    <div class="accordion" id="menuAccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button {{ (menuActive('use-case.*') || (menuActive('setting') && request()->input('tab') === 'openai')) ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#manageAi" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_532_26203)">
                                                <path
                                                    d="M15.0002 3.33334H5.00016C4.07969 3.33334 3.3335 4.07954 3.3335 5.00001V15C3.3335 15.9205 4.07969 16.6667 5.00016 16.6667H15.0002C15.9206 16.6667 16.6668 15.9205 16.6668 15V5.00001C16.6668 4.07954 15.9206 3.33334 15.0002 3.33334Z"
                                                    stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M12.5 7.5H7.5V12.5H12.5V7.5Z" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.5 0.833344V3.33334" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.5 0.833344V3.33334" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M7.5 16.6667V19.1667" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.5 16.6667V19.1667" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.6665 7.5H19.1665" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M16.6665 11.6667H19.1665" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M0.833496 7.5H3.3335" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M0.833496 11.6667H3.3335" stroke="#1D2939" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_532_26203">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                    </span>
                                    <span class="title fz-16"> Manage AI</span>
                                </button>
                            </h2>
                            <div id="manageAi" class="accordion-collapse collapse {{ (menuActive('use-case.*') || (menuActive('setting') && request()->input('tab') === 'openai')) ? 'show' : '' }} " aria-labelledby="headingOne"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('use-case.index') }}" class="menu-item {{ menuActive('use-case.*') ? 'active' : '' }}">Use Case Templates</a>
                                        <a href="{{ route('setting') }}?tab=openai" class="menu-item {{ menuActive('setting') && request()->input('tab') === 'openai' ? 'active' : '' }}">AI Settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{menuActive(['users.*','admin.*'])?'':'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#manageUsers" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_532_26219)">
                                                <path
                                                    d="M14.1668 17.5V15.8333C14.1668 14.9493 13.8156 14.1014 13.1905 13.4763C12.5654 12.8512 11.7176 12.5 10.8335 12.5H4.16683C3.28277 12.5 2.43493 12.8512 1.80981 13.4763C1.18469 14.1014 0.833496 14.9493 0.833496 15.8333V17.5"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M7.49984 9.16667C9.34079 9.16667 10.8332 7.67428 10.8332 5.83333C10.8332 3.99238 9.34079 2.5 7.49984 2.5C5.65889 2.5 4.1665 3.99238 4.1665 5.83333C4.1665 7.67428 5.65889 9.16667 7.49984 9.16667Z"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M19.1665 17.5V15.8333C19.166 15.0948 18.9201 14.3773 18.4676 13.7936C18.0152 13.2099 17.3816 12.793 16.6665 12.6083"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M13.3335 2.60834C14.0505 2.79192 14.686 3.20892 15.1399 3.7936C15.5937 4.37827 15.84 5.09736 15.84 5.8375C15.84 6.57765 15.5937 7.29674 15.1399 7.88141C14.686 8.46609 14.0505 8.88309 13.3335 9.06667"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_532_26219">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>

                                    </span>

                                    <span class="title fz-16">Manage Users</span>
                                </button>
                            </h2>
                            <div id="manageUsers" class="accordion-collapse collapse {{menuActive(['users.*','admin.*'])?'show':''}}" aria-labelledby="headingThree"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('users.index') }}"
                                            class="menu-item {{ menuActive('users.*') ? 'active' : '' }}">Customer
                                            List</a>
                                        <a href="{{ route('admin.all') }}"
                                            class=" menu-item  {{ menuActive('admin.*') ? 'active' : '' }}">Admin
                                            List</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{menuActive(['payment.*','order.*','plan.*']) ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#finanCial" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_532_26228)">
                                                <path
                                                    d="M17.5002 3.33334H2.50016C1.57969 3.33334 0.833496 4.07954 0.833496 5.00001V15C0.833496 15.9205 1.57969 16.6667 2.50016 16.6667H17.5002C18.4206 16.6667 19.1668 15.9205 19.1668 15V5.00001C19.1668 4.07954 18.4206 3.33334 17.5002 3.33334Z"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M0.833496 8.33334H19.1668" stroke="#475467" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_532_26228">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>


                                    </span>

                                    <span class="title fz-16">Financial</span>
                                </button>
                            </h2>
                            <div id="finanCial" class="accordion-collapse collapse {{menuActive(['payment.*','order.*','plan.*']) ? 'show' : ''}} " aria-labelledby="headingThree"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">


                                        <a href="{{ route('plan.index') }}" class="menu-item {{menuActive('plan.*')?'active':''}}">Manage Plan</a>
                                        <a href="{{ route('payment.method') }}" class="menu-item {{menuActive('payment.*')?'active':''}}">Payment Methods</a>
                                        <a href="{{route('order.index')}}" class="menu-item {{menuActive('order.*') && request()->input('status') == null?'active':''}}">All Transactions</a>
                                        <a href="{{route('order.index')}}?status=0" class="menu-item {{menuActive('order.index') && request()->input('status') == "0"?'active':''}}">Pending
                                            Transactions</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{menuActive(['manage-blogs.*','blog-category.*','manage-faq.*','pages.*'])? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#frontend" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.667 2.5H3.33366C2.41318 2.5 1.66699 3.24619 1.66699 4.16667V12.5C1.66699 13.4205 2.41318 14.1667 3.33366 14.1667H16.667C17.5875 14.1667 18.3337 13.4205 18.3337 12.5V4.16667C18.3337 3.24619 17.5875 2.5 16.667 2.5Z"
                                                stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M6.66699 17.5H13.3337" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M10 14.1667V17.5" stroke="#475467" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>

                                    <span class="title fz-16">Frontend</span>
                                </button>
                            </h2>
                            <div id="frontend" class="accordion-collapse collapse {{menuActive(['manage-blogs.*','blog-category.*','manage-faq.*','pages.*'])? 'show' : ''}}" aria-labelledby="headingThree"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('manage-blogs.index') }}" class="menu-item {{menuActive("manage-blogs.*")?'active':''}}">Blog Manager</a>
                                        <a href="{{ route('blog-category.index') }}" class="menu-item {{menuActive("blog-category.*")?'active':''}}">Blog Category</a>
                                        <a href="{{ route('manage-faq.index') }}" class="menu-item {{menuActive("manage-faq.*")?'active':''}}">FAQ Manager</a>
                                        <a href="{{ route('pages.index') }}" class="menu-item {{menuActive("pages.*")?'active':''}}">Page Builder</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button {{(menuActive("setting") && request()->input('tab') != 'openai')?'':'collapsed'}}" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#settingMenu" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_532_26407)">
                                                <path
                                                    d="M10 12.5C11.3807 12.5 12.5 11.3807 12.5 10C12.5 8.61929 11.3807 7.5 10 7.5C8.61929 7.5 7.5 8.61929 7.5 10C7.5 11.3807 8.61929 12.5 10 12.5Z"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M16.1663 12.4999C16.0554 12.7513 16.0223 13.0301 16.0713 13.3004C16.1204 13.5707 16.2492 13.8202 16.4413 14.0166L16.4913 14.0666C16.6463 14.2214 16.7692 14.4052 16.8531 14.6075C16.937 14.8098 16.9802 15.0267 16.9802 15.2458C16.9802 15.4648 16.937 15.6817 16.8531 15.884C16.7692 16.0863 16.6463 16.2701 16.4913 16.4249C16.3366 16.5799 16.1527 16.7028 15.9504 16.7867C15.7481 16.8706 15.5312 16.9137 15.3122 16.9137C15.0931 16.9137 14.8763 16.8706 14.6739 16.7867C14.4716 16.7028 14.2878 16.5799 14.133 16.4249L14.083 16.3749C13.8866 16.1828 13.6372 16.0539 13.3668 16.0049C13.0965 15.9559 12.8177 15.989 12.5663 16.0999C12.3199 16.2056 12.1097 16.381 11.9616 16.6045C11.8135 16.8281 11.7341 17.0901 11.733 17.3583V17.4999C11.733 17.9419 11.5574 18.3659 11.2449 18.6784C10.9323 18.991 10.5084 19.1666 10.0663 19.1666C9.62431 19.1666 9.20039 18.991 8.88783 18.6784C8.57527 18.3659 8.39967 17.9419 8.39967 17.4999V17.4249C8.39322 17.1491 8.30394 16.8816 8.14343 16.6572C7.98293 16.4328 7.75862 16.2618 7.49967 16.1666C7.24833 16.0557 6.96951 16.0226 6.69918 16.0716C6.42885 16.1206 6.17941 16.2495 5.98301 16.4416L5.93301 16.4916C5.77822 16.6465 5.5944 16.7695 5.39207 16.8533C5.18974 16.9372 4.97287 16.9804 4.75384 16.9804C4.53481 16.9804 4.31794 16.9372 4.11561 16.8533C3.91328 16.7695 3.72946 16.6465 3.57467 16.4916C3.41971 16.3368 3.29678 16.153 3.21291 15.9507C3.12903 15.7483 3.08586 15.5314 3.08586 15.3124C3.08586 15.0934 3.12903 14.8765 3.21291 14.6742C3.29678 14.4719 3.41971 14.288 3.57467 14.1332L3.62467 14.0833C3.81679 13.8869 3.94566 13.6374 3.99468 13.3671C4.04369 13.0967 4.0106 12.8179 3.89967 12.5666C3.79404 12.3201 3.61864 12.1099 3.39506 11.9618C3.17149 11.8138 2.9095 11.7343 2.64134 11.7333H2.49967C2.05765 11.7333 1.63372 11.5577 1.32116 11.2451C1.0086 10.9325 0.833008 10.5086 0.833008 10.0666C0.833008 9.62456 1.0086 9.20063 1.32116 8.88807C1.63372 8.57551 2.05765 8.39992 2.49967 8.39992H2.57467C2.8505 8.39347 3.11801 8.30418 3.34242 8.14368C3.56684 7.98317 3.73777 7.75886 3.83301 7.49992C3.94394 7.24857 3.97703 6.96976 3.92801 6.69943C3.879 6.4291 3.75012 6.17965 3.55801 5.98325L3.50801 5.93325C3.35305 5.77846 3.23012 5.59465 3.14624 5.39232C3.06237 5.18999 3.0192 4.97311 3.0192 4.75408C3.0192 4.53506 3.06237 4.31818 3.14624 4.11585C3.23012 3.91352 3.35305 3.72971 3.50801 3.57492C3.6628 3.41996 3.84661 3.29703 4.04894 3.21315C4.25127 3.12928 4.46815 3.08611 4.68717 3.08611C4.9062 3.08611 5.12308 3.12928 5.32541 3.21315C5.52774 3.29703 5.71155 3.41996 5.86634 3.57492L5.91634 3.62492C6.11274 3.81703 6.36219 3.94591 6.63252 3.99492C6.90285 4.04394 7.18166 4.01085 7.43301 3.89992H7.49967C7.74615 3.79428 7.95635 3.61888 8.10442 3.39531C8.25248 3.17173 8.33194 2.90974 8.33301 2.64159V2.49992C8.33301 2.05789 8.5086 1.63397 8.82116 1.32141C9.13372 1.00885 9.55765 0.833252 9.99967 0.833252C10.4417 0.833252 10.8656 1.00885 11.1782 1.32141C11.4907 1.63397 11.6663 2.05789 11.6663 2.49992V2.57492C11.6674 2.84307 11.7469 3.10506 11.8949 3.32864C12.043 3.55221 12.2532 3.72762 12.4997 3.83325C12.751 3.94418 13.0298 3.97727 13.3002 3.92826C13.5705 3.87924 13.8199 3.75037 14.0163 3.55825L14.0663 3.50825C14.2211 3.35329 14.4049 3.23036 14.6073 3.14649C14.8096 3.06261 15.0265 3.01944 15.2455 3.01944C15.4645 3.01944 15.6814 3.06261 15.8837 3.14649C16.0861 3.23036 16.2699 3.35329 16.4247 3.50825C16.5796 3.66304 16.7026 3.84685 16.7864 4.04918C16.8703 4.25151 16.9135 4.46839 16.9135 4.68742C16.9135 4.90644 16.8703 5.12332 16.7864 5.32565C16.7026 5.52798 16.5796 5.7118 16.4247 5.86658L16.3747 5.91658C16.1826 6.11298 16.0537 6.36243 16.0047 6.63276C15.9557 6.90309 15.9887 7.1819 16.0997 7.43325V7.49992C16.2053 7.74639 16.3807 7.9566 16.6043 8.10466C16.8279 8.25272 17.0899 8.33218 17.358 8.33325H17.4997C17.9417 8.33325 18.3656 8.50885 18.6782 8.82141C18.9907 9.13397 19.1663 9.55789 19.1663 9.99992C19.1663 10.4419 18.9907 10.8659 18.6782 11.1784C18.3656 11.491 17.9417 11.6666 17.4997 11.6666H17.4247C17.1565 11.6677 16.8945 11.7471 16.671 11.8952C16.4474 12.0432 16.272 12.2534 16.1663 12.4999Z"
                                                    stroke="#475467" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_532_26407">
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>


                                    </span>

                                    <span class="title fz-16">Settings</span>
                                </button>
                            </h2>
                            <div id="settingMenu" class="accordion-collapse collapse {{(menuActive("setting") && request()->input('tab') != 'openai')?'show':''}}" aria-labelledby="headingThree"
                                data-bs-parent="#menuAccordion">
                                <div class="accordion-body">
                                    <div class="menu-items">
                                        <a href="{{ route('setting') }}?tab=cms" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'cms' ? 'active' : '' }}">General Settings</a>
                                        <a href="{{ route('setting') }}?tab=smtp" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'smtp' ? 'active' : '' }}">Mail Configure</a>
                                        <a href="{{ route('setting') }}?tab=seo" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'seo' ? 'active' : '' }}">SEO Settings</a>
                                        <a href="{{ route('setting') }}?tab=login" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'login' ? 'active' : '' }}">Social Login</a>
                                        <a href="{{ route('setting') }}?tab=tawkto" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'tawkto' ? 'active' : '' }}">Tawk (Live
                                            chat)</a>
                                        <a href="{{ route('setting') }}?tab=pwa" class="menu-item {{ menuActive('setting') && request()->input('tab') == 'pwa' ? 'active' : '' }}">PWA Settings</a>


                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
            @endif

        </div>
    </div>

    <!-- SWIPER JS  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- BOOTSTRAP JS   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

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
    })
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    @include('sweetalert::alert')
    @include('layouts.delete')
    @yield('script')
    @include('layouts.modal')
    <!--Start of Tawk.to Script-->
    @if (readConfig('tawk_to') == 'yes')
    @include('layouts.tawk_to')
    @endif
    <!--End of Tawk.to Script-->

</body>