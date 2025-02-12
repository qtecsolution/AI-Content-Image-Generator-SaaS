<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{ readConfig('meta_desc') }}">
    <meta name="author" content="{{ readConfig('name') }} ">
    <meta name="keywords" content="{{ readConfig('meta_key') }}">
    <meta property="og:locale" content="en_US">
    <!-- OPEN-GRAPH META TAGS -->
    <meta property="og:title" content="{{ readConfig('meta_title') }}">
    <meta property="og:description" content="{{ readConfig('meta_desc') }}">
    <meta property="og:image" content="/{{ readConfig('meta_image') }}">
    <meta property="og:type" content="website">
    <title>@yield('title', readConfig('name'))</title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- MAIN CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}?v=1">
    <!-- aos scroll animation  -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @if (readConfig('pwa_active') == 'yes')
        @laravelPWA
    @endif
    <link rel="icon" type="image/png" href="{{ favicon(readConfig('favicon_icon')) }}">
</head>

<body class="body-landing">
    <div class="contributor">
        This is an open source project. To get the access <a href="https://qtecsolution.com/open-source-projects"
            class="text-white"><u>visit here</u></a>.
    </div>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="leader-section section-left"></div>
        <div class="leader-section section-right"></div>
    </div>
    <!-- ===================header start======================= -->
    <header class="landing-header">
        <div class="container">

            <!-- desktop header  -->
            <div class="header-desk d-none d-lg-flex ">
                <div class="header-left">
                    <a href="{{ route('/') }}">
                        <img class="header-logo" src="{{ filePath(readConfig('logo')) }}"
                            alt="{{ readConfig('name') }}">
                    </a>
                    <ul class="desk-menu">
                        <li>
                            <a href="{{ route('/') }}#usecase" class="desk-menu-link">Use Cases</a>
                        </li>
                        <li>
                            <a href="{{ route('/') }}#generateImage" class="desk-menu-link">Image generator </a>
                        </li>
                        <li>
                            <a href="{{ route('/') }}#works" class="desk-menu-link">How it Works </a>
                        </li>

                        <li>
                            <a href="{{ route('/') }}#pricing" class="desk-menu-link">Pricing</a>
                        </li>
                        <li><a href="{{ route('blogs.index') }}" class="desk-menu-link">Blog</a></li>
                    </ul>
                </div>

                <div class="header-right">
                    <ul class="desk-menu d-none d-xl-flex">
                        <li><a href="{{ route('register') }}"
                                class="primarybtn-landing ">{{ Auth::check() ? 'Dashboard' : 'Get started ___ it’s free' }}
                            </a></li>
                    </ul>
                </div>
            </div>

            <!-- mobile header  -->

            <div class="moble-header d-flex justify-content-between d-lg-none align-items-center ">
                <a href="{{ route('/') }}">
                    <img class="header-logo" src="{{ filePath(readConfig('logo')) }}" alt="{{ readConfig('name') }}">
                </a>

                <span data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    <svg width="36" height="10" viewBox="0 0 36 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="36" height="4" fill="#1D2939" />
                        <rect y="6" width="36" height="4" fill="#1D2939" />
                    </svg>

                </span>
            </div>



        </div>
    </header>
    <!-- ===================header end ======================= -->

    @yield('content')
    <!-- ==============get started start======================= -->
    <section class="get-started">
        <div class="container py-5 mt-5">

            <div class="row g-4 align-items-center" data-aos="fade-up" data-aos-duration="1000">

                <div class="col-12" data-aos-duration="1000">
                    <div class="section-header">
                        <h3 class="benifits-title"> Ready to get started?</h3>
                        <p class="des">Write 10x faster, engage your audience, & never struggle <br> with the blank
                            page
                            again.</p>

                    </div>
                </div>

            </div>

            <div class="row g-4 text-center px-5 justify-content-center" data-aos="fade-up" data-aos-duration="1000">

                <div class=" col-6 col-lg-2">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="{{ asset('assets/images/icons/cards-icons/check-logn.svg') }}"
                                alt="long check icon ">
                        </div>
                        <span>Get started for free</span>
                    </div>
                </div>

                <div class=" col-6 col-lg-3">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="{{ asset('assets/images/icons/cards-icons/check-logn.svg') }}"
                                alt="long check icon ">
                        </div>
                        <span>30-day trial of Free plan</span>
                    </div>
                </div>

                <div class=" col-6 col-lg-3">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="{{ asset('assets/images/icons/cards-icons/check-logn.svg') }}"
                                alt="long check icon ">
                        </div>
                        <span>{{ totalUseCase() }}+ content types to explore</span>
                    </div>
                </div>
                <div class=" col-6 col-lg-2">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="{{ asset('assets/images/icons/cards-icons/check-logn.svg') }}"
                                alt="long check icon ">
                        </div>
                        <span>AI Image generate</span>
                    </div>
                </div>
                <div class=" col-6 col-lg-2">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="{{ asset('assets/images/icons/cards-icons/check-logn.svg') }}"
                                alt="long check icon ">
                        </div>
                        <span>Progressive Web Apps</span>
                    </div>
                </div>


            </div>

            <div class="button-wrapper py-5 d-flex align-items-center  ps-5 ps-lg-0 justify-content-lg-center"
                data-aos="fade-up">
                <a href="{{ route('register') }}" class="primarybtn-landing">
                    <span class="title">Get your free access now </span>
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 15L15 5" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M6.875 5H15V13.125" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>

                    </span>
                </a>
            </div>

        </div>
    </section>
    <!-- ==============get started end ======================= -->

    <footer class="landing-footer ">
        <div class="container">
            <div class="footer-content" data-aos="fade-up" data-aos-duration="1000">
                <div class="row g-4">
                    <div class="col-lg-2">
                        <a href="{{ route('/') }}">
                            <img class="header-logo" src="{{ filePath(readConfig('logo')) }}"
                                alt="{{ readConfig('name') }}">
                        </a>
                    </div>

                    <div class=" col-sm-6 col-lg-2">
                        <div class="footerlinks">
                            <h5 class="footerlinks-title">Pages</h5>
                            <div class="footerlink">
                                @foreach (pages() as $item)
                                    <a href="{{ route('page', $item->slug) }}"
                                        class="link">{{ $item->title }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-2">
                        <div class="footerlinks">
                            <h5 class="footerlinks-title">Use Cases</h5>
                            <div class="footerlink">
                                @foreach (footerUseCase() as $fUseCase)
                                    <a href="{{ route('content.create') }}?case={{ $fUseCase->id }}" class="link">
                                        {{ $fUseCase->title }}
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-2">
                        <div class="footerlinks">
                            <h5 class="footerlinks-title">Others</h5>
                            <div class="footerlink">
                                <a href="{{ route('login') }}" class="link"> Login</a>
                                <a href="{{ route('register') }}" class="link"> Register</a>
                                @if (readConfig('tawk_to') == 'yes' && readConfig('tawk_direct_link') != '')
                                    <a target="_blank" href="{{ readConfig('tawk_direct_link') }}" class="link">
                                        Feedback </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="footerlinks">
                            <h5 class="footerlinks-title">Blogs</h5>
                            <div class="footerlink">
                                @foreach (footerBlog() as $blog)
                                    <a href="{{ route('blogs.show', $blog->slug) }}"
                                        class="link">{{ $blog->title }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-divider"></div>

                <div class="footer-social">
                    <ul class="socilmenu">
                        @if (readConfig('type_fb') !== '')
                            <li class="socialmenu-item">
                                <a href="{{ readConfig('type_fb') }}" class="socialmenu-link">
                                    <img src="{{ asset('assets/images/icons/social/facebook.svg') }}" alt="">
                                </a>
                            </li>
                        @endif
                        @if (readConfig('type_tw') !== '')
                            <li class="socialmenu-item">
                                <a href="{{ readConfig('type_tw') }}" class="socialmenu-link">
                                    <img src="{{ asset('assets/images/icons/social/twitter.svg') }}"
                                        alt=""></a>
                            </li>
                        @endif
                        @if (readConfig('type_insta') !== '')
                            <li class="socialmenu-item">
                                <a href="{{ readConfig('type_insta') }}" class="socialmenu-link">
                                    <img src="{{ asset('assets/images/icons/social/linkdin.svg') }}" alt="">
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="copyright">
                    <p class="copyright-text"> {{ readConfig('type_footer') }} </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- MOBILE-MENU -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenu">
        <div class="offcanvas-header">
            <a href="{{ route('/') }}">
                <img class="header-logo" src="{{ filePath(readConfig('logo')) }}" alt="{{ readConfig('name') }}">
            </a>

            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.2849 15.5425L7.62804 9.88562L1.97118 15.5425L0.0855651 13.6569L5.74242 8L0.0855651
                    2.34315L1.97118 0.457528L7.62804 6.11438L13.2849 0.457527L15.1705 2.34315L9.51366 8L15.1705 13.6569L13.2849
                    15.5425Z" fill="#718096" />
                </svg>

            </button>
        </div>

        <div class="offcanvas-body">
            <ul class="mobilelist">
                <li class="mobilelist-item" data-bs-dismiss="offcanvas">
                    <a href="#usecase" class="mobilelist-link">Use Cases</a>
                </li>
                <li class="mobilelist-item" data-bs-dismiss="offcanvas">
                    <a href="#works" class="mobilelist-link">How it Works </a>
                </li>
                <li class="mobilelist-item" data-bs-dismiss="offcanvas">
                    <a href="#pricing" class="mobilelist-link">Pricing</a>
                </li>
                <li class="mobilelist-item" data-bs-dismiss="offcanvas">
                    <a href="{{ route('login') }}" class="mobilelist-link">Login</a>
                </li>
            </ul>


        </div>
    </div>




    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                document.body.classList.add("loaded");
            }, 500);
        });
        // animation on scroll
        AOS.init({
            offset: 120, // offset (in px) from the original trigger point
            delay: 0, // values from 0 to 3000, with step 50ms
            duration: 1000, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: false, // whether animation should happen only once - while scrolling down
            mirror: false, // whether elements should animate out while scrolling past them
            anchorPlacement: 'top-bottom'
        });

        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
                clickable: true
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },

            },
        });



        // header background add when scroll start
        var scrollTrigger = 80;

        window.onscroll = function() {
            // We add pageYOffset for compatibility with IE.
            if (window.scrollY >= scrollTrigger || window.pageYOffset >= scrollTrigger) {
                document.getElementsByTagName("header")[0].classList.add('bg-white');
            } else {
                document.getElementsByTagName("header")[0].classList.remove('bg-white');
            }
        };
    </script>
    @yield('script')
</body>

</html>
