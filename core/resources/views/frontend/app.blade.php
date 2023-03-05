<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon.png') }}">
    <title>{{ readConfig('name') }} </title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- MAIN CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <!-- aos scroll animation  -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="body-landing">
    <!-- ===================header start======================= -->
    <header class="landing-header">
        <div class="container">

            <!-- desktop header  -->
            <div class="header-desk d-none d-lg-flex ">
                <div class="header-left">
                    <a href="{{route('/')}}">
                        <h3 class="logo-name text-center header-logo">{{ readConfig('name') }} </h3>
                    </a>
                    <ul class="desk-menu">
                        <li>
                            <a href="#usecase" class="desk-menu-link">Use Cases</a>
                        </li>
                        <li>
                            <a href="#generateImage" class="desk-menu-link">Image generator </a>
                        </li>
                        <li>
                            <a href="#works" class="desk-menu-link">How it Works </a>
                        </li>

                        <li>
                            <a href="#pricing" class="desk-menu-link">Pricing</a>
                        </li>
                        <li><a href="blog.html" class="desk-menu-link">Blog</a></li>
                    </ul>
                </div>

                <div class="header-right">
                    <ul class="desk-menu">

                        <li><a href="{{route('login')}}" class="primarybtn-landing ">Get started ___ it’s free</a></li>
                    </ul>
                </div>
            </div>

            <!-- mobile header  -->

            <div class="moble-header d-flex justify-content-between d-lg-none align-items-center ">
                <a href="{{route('/')}}">
                    <h3 class="logo-name text-center header-logo">{{ readConfig('name') }} </h3>
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

    <footer class="landing-footer ">
        <div class="container">
            <div class="footer-content" data-aos="fade-up" data-aos-duration="1000">
                <div class="row g-4">
                    <div class="col-lg-2">
                        <a href="index.html">
                            <h3 class="logo-name ">{{ readConfig('name') }} </h3>
                        </a>
                    </div>

                    <div class=" col-sm-6 col-lg-2">
                        <div class="footerlinks">
                            <h5 class="footerlinks-title">Product</h5>
                            <div class="footerlink">
                                <a href="" class="link">Pricing</a>
                                <a href="" class="link">Start Writing For Free</a>
                                <a href="" class="link"> User Dashboard</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-2">
                        <div class="footerlinks">
                            <h5 class="footerlinks-title">Use Cases</h5>
                            <div class="footerlink">
                                <a href="" class="link">Blog Idea & Outline</a>
                                <a href="" class="link">Googe Search Ads</a>
                                <a href="" class="link"> Blog Section Writing</a>
                                <a href="" class="link"> Business Ideas</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-2">
                        <div class="footerlinks">
                            <h5 class="footerlinks-title">Support</h5>
                            <div class="footerlink">
                                <a href="" class="link">Contact Us</a>
                                <a href="{{route('register')}}" class="link"> Register</a>
                                <a href="{{route('login')}}" class="link"> Login</a>
                                <a href="" class="link"> SEO Meta Description</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="footerlinks">
                            <h5 class="footerlinks-title">Blogs</h5>
                            <div class="footerlink">
                                <a href="" class="link">AI for Sales Teams: How It Works, and How to Get
                                    Started</a>
                                <a href="" class="link"> Automated Product Descriptions for Large E-commerce
                                    Retailers</a>
                                <a href="" class="link"> AI for Advertising: The Tools, Tips, & Examples You
                                    Need</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-divider"></div>

                <div class="footer-social">
                    <ul class="socilmenu">
                        <li class="socialmenu-item">
                            <a href="" class="socialmenu-link"><img src="assets/icons/social/facebook.svg"
                                    alt=""></a>
                        </li>
                        <li class="socialmenu-item">
                            <a href="" class="socialmenu-link"><img src="assets/icons/social/twitter.svg"
                                    alt=""></a>
                        </li>
                        <li class="socialmenu-item">
                            <a href="" class="socialmenu-link"><img src="assets/icons/social/linkdin.svg"
                                    alt=""></a>
                        </li>
                    </ul>
                </div>

                <div class="copyright">
                    <p class="copyright-text">© {{date('Y')}} {{ readConfig('name') }}  </p>
                </div>
            </div>
        </div>
    </footer>


    <!-- MOBILE-MENU -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenu">
        <div class="offcanvas-header">
            <a href="{{route('/')}}">
                <h3 class="logo-name text-center header-logo">type.ez</h3>
            </a>

            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.2849 15.5425L7.62804 9.88562L1.97118 15.5425L0.0855651 13.6569L5.74242 8L0.0855651 
                    2.34315L1.97118 0.457528L7.62804 6.11438L13.2849 0.457527L15.1705 2.34315L9.51366 8L15.1705 13.6569L13.2849 
                    15.5425Z"
                        fill="#718096" />
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
                    <a href="{{route('login')}}" class="mobilelist-link">Login</a>
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
