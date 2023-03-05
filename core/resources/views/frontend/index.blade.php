<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI WRITER LANDING </title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- MAIN CSS  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
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
                    <a href="index.html">
                        <h3 class="logo-name text-center header-logo">type.ez</h3>
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
                       
                        <li><a href="login.html" class="primarybtn-landing ">Get started ___ it’s free</a></li>
                    </ul>
                </div>
            </div>

            <!-- mobile header  -->

            <div class="moble-header d-flex justify-content-between d-lg-none align-items-center ">
                <a href="index.html">
                    <h3 class="logo-name text-center header-logo">type.ez</h3>
                </a>

                <span data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
                    <svg width="36" height="10" viewBox="0 0 36 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="36" height="4" fill="#1D2939"/>
                        <rect y="6" width="36" height="4" fill="#1D2939"/>
                    </svg>
                        
                </span>
            </div>



        </div>
    </header>
    <!-- ===================header end ======================= -->

    <!-- ===================hero  start======================= -->
    <section class="hero">
        <div class="container">
            <div class="row g-4">

                <div class="col-12">
                    <div class="hero-content pt-5">
                        <h1 class="hero-title">Write your Business Idea <br>
                            with <span class="logo-name"> type.ez</span> </h1>
                        <p class="hero-des">` Type.ez is designed to help you streamline your writing process, <br>
                            increase your productivity, and create high-quality content.</p>

                        <button class="primarybtn-landing">
                            <span class="title">Get your free access now </span>
                            <span>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 15L15 5" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6.875 5H15V13.125" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </span>
                        </button>

                        <p class="credit">No credit card required</p>
                    </div>
                </div>

                <div class="col-12" data-aos="zoom-in" data-aos-delay="500" data-aos-duration="1000">
                    <figure class="preview-image">
                        <img src="assets/images/landing/preview-editor.svg" alt="preview editor">
                    </figure>
                </div>

            </div>
        </div>
    </section>
    <!-- ===================hero end ======================= -->

    <!-- =================== benifits start ======================= -->
    <section class="benifits" id="usecase">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                    data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Content</span></button>
                        <h3 class="benifits-title"> <span>Type.ez</span> helps <br> <span>startup teams.</span></h3>
                        <p class="des">Get better results in a fraction of the time. Finally, a writing tool <br> you’ll
                            actually use.</p>
                    </div>
                </div>
            </div>

            <!-- cards -->
            <div class="row m-0">

                <div class="benifits-container">
                    <!-- benifits cards  -->
                    <div class="benifits-cards-wrapper">

                        <!-- single card  -->
                        <div class="benifits-card" data-aos="fade-up">
                            <div class="left">
                                <figure class="card-icon-wrapper">
                                    <img src="assets/icons/cards-icons/NotePencil.svg" alt="">
                                </figure>
                            </div>
                            <div class="right">
                                <p class="title">Blog Content</p>
                                <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                <a href="#" class="card-link"> <span class="text">Try blog content </span> <img
                                        src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                            </div>
                        </div>

                        <!-- single card -->
                        <div class="benifits-card" data-aos="fade-up">
                            <div class="left">
                                <figure class="card-icon-wrapper">
                                    <img src="assets/icons/cards-icons/File.svg" alt="">
                                </figure>
                            </div>
                            <div class="right">
                                <p class="title">Sales Copy</p>
                                <p class="text">Conver your audience with copy thats sells</p>
                                <a href="#" class="card-link"> <span class="text">Try Sales Copy </span> <img
                                        src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                            </div>
                        </div>

                        <!-- single card -->
                        <div class="benifits-card" data-aos="fade-up">
                            <div class="left">
                                <figure class="card-icon-wrapper">
                                    <img src="assets/icons/cards-icons/MonitorPlay.svg" alt="">
                                </figure>
                            </div>
                            <div class="right">
                                <p class="title">Digital Ad Copy</p>
                                <p class="text">Produce compelling ad copy in just a few clicks.</p>
                                <a href="#" class="card-link"> <span class="text">Try Digital Ad Copy </span> <img
                                        src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                            </div>
                        </div>

                        <!-- single card -->
                        <div class="benifits-card" data-aos="fade-up">
                            <div class="left">
                                <figure class="card-icon-wrapper">
                                    <img src="assets/icons/cards-icons/TwitterLogo.svg" alt="twitter logo ">
                                </figure>
                            </div>
                            <div class="right">
                                <p class="title">Social Media Content</p>
                                <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                <a href="#" class="card-link"> <span class="text">Try Social Media Content</span> <img
                                        src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                            </div>
                        </div>

                        <!-- single card -->
                        <div class="benifits-card" data-aos="fade-up">
                            <div class="left">
                                <figure class="card-icon-wrapper">
                                    <img src="assets/icons/cards-icons/ShoppingCartSimple.svg" alt="twitter logo ">
                                </figure>
                            </div>
                            <div class="right">
                                <p class="title">eCommerce Content</p>
                                <p class="text">Generate beautifully written product descriptions to increase sales.</p>
                                <a href="#" class="card-link"> <span class="text">Try eCommerce Content</span> <img
                                        src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                            </div>
                        </div>

                        <!-- single card -->
                        <div class="benifits-card" data-aos="fade-up">
                            <div class="left">
                                <figure class="card-icon-wrapper">
                                    <img src="assets/icons/cards-icons/Desktop.svg" alt="twitter logo ">
                                </figure>
                            </div>
                            <div class="right">
                                <p class="title">Website Copy</p>
                                <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                <a href="#" class="card-link"> <span class="text">Try Website Copy </span> <img
                                        src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                            </div>
                        </div>

                        <!-- single card -->
                        <div class="benifits-card" data-aos="fade-up">
                            <div class="left">
                                <figure class="card-icon-wrapper">
                                    <img src="assets/icons/cards-icons/Desktop.svg" alt="twitter logo ">
                                </figure>
                            </div>
                            <div class="right">
                                <p class="title">Cover Letter</p>
                                <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                <a href="#" class="card-link"> <span class="text">Try Cover Letter </span> <img
                                        src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                            </div>
                        </div>


                        <!-- single card -->
                        <div class="benifits-card" data-aos="fade-up">
                            <div class="left">
                                <figure class="card-icon-wrapper">
                                    <img src="assets/icons/cards-icons/Tag.svg" alt="SEO meta description logo   ">
                                </figure>
                            </div>
                            <div class="right">
                                <p class="title">SEO Meta Description</p>
                                <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                <a href="#" class="card-link"> <span class="text">Try SEO Meta Description </span> <img
                                        src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                            </div>
                        </div>

                        <!-- single card -->
                        <div class="benifits-card" data-aos="fade-up">
                            <div class="left">
                                <figure class="card-icon-wrapper">
                                    <img src="assets/icons/cards-icons/GoogleLogo.svg" alt=" Google logo ">
                                </figure>
                            </div>
                            <div class="right">
                                <p class="title">Google Search Ads</p>
                                <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                <a href="#" class="card-link"> <span class="text">Try Google Search Ads </span> <img
                                        src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                            </div>
                        </div>

                    </div>

                    <!--  -->
                    <div class="collapse" id="collapseExample">
                        <!-- benifits cards  -->
                        <div class="benifits-cards-wrapper py-4">

                            <!-- single card  -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <img src="assets/icons/cards-icons/NotePencil.svg" alt="">
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title">Blog Content</p>
                                    <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                    <a href="#" class="card-link"> <span class="text">Try blog content </span> <img
                                            src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>

                            <!-- single card -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <img src="assets/icons/cards-icons/File.svg" alt="">
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title">Sales Copy</p>
                                    <p class="text">Conver your audience with copy thats sells</p>
                                    <a href="#" class="card-link"> <span class="text">Try Sales Copy </span> <img
                                            src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>

                            <!-- single card -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <img src="assets/icons/cards-icons/MonitorPlay.svg" alt="">
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title">Digital Ad Copy</p>
                                    <p class="text">Produce compelling ad copy in just a few clicks.</p>
                                    <a href="#" class="card-link"> <span class="text">Try Digital Ad Copy </span> <img
                                            src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>

                            <!-- single card -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <img src="assets/icons/cards-icons/TwitterLogo.svg" alt="twitter logo ">
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title">Social Media Content</p>
                                    <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                    <a href="#" class="card-link"> <span class="text">Try Social Media Content</span>
                                        <img src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>

                            <!-- single card -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <img src="assets/icons/cards-icons/ShoppingCartSimple.svg" alt="twitter logo ">
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title">eCommerce Content</p>
                                    <p class="text">Generate beautifully written product descriptions to increase sales.
                                    </p>
                                    <a href="#" class="card-link"> <span class="text">Try eCommerce Content</span> <img
                                            src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>

                            <!-- single card -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <img src="assets/icons/cards-icons/Desktop.svg" alt="twitter logo ">
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title">Website Copy</p>
                                    <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                    <a href="#" class="card-link"> <span class="text">Try Website Copy </span> <img
                                            src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>

                            <!-- single card -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <img src="assets/icons/cards-icons/Desktop.svg" alt="twitter logo ">
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title">Cover Letter</p>
                                    <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                    <a href="#" class="card-link"> <span class="text">Try Cover Letter </span> <img
                                            src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>


                            <!-- single card -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <img src="assets/icons/cards-icons/Tag.svg" alt="SEO meta description logo   ">
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title">SEO Meta Description</p>
                                    <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                    <a href="#" class="card-link"> <span class="text">Try SEO Meta Description </span>
                                        <img src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>

                            <!-- single card -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <img src="assets/icons/cards-icons/GoogleLogo.svg" alt=" Google logo ">
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title">Google Search Ads</p>
                                    <p class="text">Write optimized blog posts in a fraction of the time.</p>
                                    <a href="#" class="card-link"> <span class="text">Try Google Search Ads </span> <img
                                            src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- all template button -->
                    <div class="d-flex  align-items-center justify-content-center py-5">
                        <button class="all-template-btn" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                            <span>See All templates </span> <img src="assets/icons/cards-icons/ArrowUpRight.svg"
                                alt="arrow icon "> </button>
                    </div>

                    <!--  -->
                    <div class="card-divider"></div>
                    <div class="row g-4  py-5">

                        <div class="col-md-4" data-aos="flip-left">
                            <div class="benifit-col">
                                <h3 class="title">Write better content faster</h3>
                                <p class="content">Leverage AI to write your content and
                                    copy in minutes.</p>
                            </div>
                        </div>

                        <div class="col-md-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                            <div class="benifit-col">
                                <h3 class="title">Say ‘goodbye’ to the blank page</h3>
                                <p class="content">Generate high-converting copy for all your campaigns with just a few
                                    clicks.</p>
                            </div>
                        </div>

                        <div class="col-md-4" data-aos="flip-right" data-aos-anchor-placement="center-bottom">
                            <div class="benifit-col">
                                <h3 class="title">20+ templates</h3>
                                <p class="content">Streamline content production by leveraging 20+ templates.</p>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </section>
    <!-- =================== benifits end ======================= -->

    <!--================= AI IMAGE GENERATE START================ -->
    <section class="image-generate" id="generateImage">
        <div class="container">
            
            <div class="row g-4">

                <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                    data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Content</span></button>
                        <h3 class="benifits-title"> <span>Type.ez</span> helps to <br> <span>generate image..</span></h3>
                        <p class="des">Get your content and content thumbnail in one place. <br> Generate unique and beautiful image with one click.</p>
                    </div>
                </div>
                <div class="col-lg-8 mx-auto">
                    <figure class="generate-image1">
                        <img src="assets/images/landing/generate.svg"  alt="generate image ">
                    </figure>
                </div>
                <div class="col-lg-8 mx-auto">
                    <figure class="generate-image2">
                        <img src="assets/images/landing/generate2.svg" alt="generate image ">
                    </figure>
                </div>
                
            </div>

            
        </div>
    </section>
    <!--================= AI IMAGE GENERATE END================== -->

    <!-- ==============work start======================= -->
    <section class="how-works" id="works">
        <div class="container pt-4">

            <div class="row g-4 align-items-center">

                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Work</span></button>
                        <h3 class="benifits-title"> How <span class="logo-color">Type.ez</span> works </h3>

                    </div>
                </div>

                <div class="col-lg-5" data-aos="zoom-in" data-aos-duration="1000">
                    <figure class="works-immage">
                        <img src="assets/images/landing/create-post.svg"  alt="preview editor">
                    </figure>
                </div>
                <div class="col-lg-7" data-aos="zoom-in" data-aos-duration="1000">
                    <figure class="works-immage">
                        <img src="assets/images/landing/editor.svg" alt="preview editor">
                    </figure>
                </div>



            </div>

            <!-- steps  -->

            <div class="steps-wrapper">

                <div class="step" data-aos="fade-up" data-aos-duration="1000">
                    <div class="left">
                        <div class="count-number">
                            <svg width="7" height="16" viewBox="0 0 7 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.90625 3.49902L5.28125 1.25V14.75" stroke="#2C4CAC" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="right">
                        <h3 class="title">Choose Your UseCase & Fill Up.</h3>
                        <p class="content">This feature streamlines the process of using AI Writing, making it simple
                            and intuitive for users to accomplish their desired task.</p>
                    </div>
                </div>

                <div class="step" data-aos="fade-up" data-aos-duration="1000">
                    <div class="left">
                        <div class="count-number">
                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.89022 3.3114C2.07349 2.87781 2.34541 2.48734 2.68853 2.16507C3.03165 1.84281 3.43838 1.59587 3.8826 1.44012C4.32682 1.28437 4.7987 1.22325 5.26794 1.26069C5.73718 1.29814 6.19339 1.43331 6.60729 1.65752C7.02119 1.88174 7.38362 2.19005 7.6713 2.56265C7.95898 2.93524 8.16554 3.36389 8.27773 3.82106C8.38992 4.27822 8.40525 4.7538 8.32274 5.21724C8.24022 5.68068 8.06169 6.12174 7.7986 6.51209V6.51209L1.625 14.7501V14.7493H8.375"
                                    stroke="#2C4CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="right">
                        <h3 class="title">Wow! It generates your content.</h3>
                        <p class="content">The AI Writing model will then analyze the input and generate a unique and
                            creative piece of content based on the user's specifications.</p>
                    </div>
                </div>

                <div class="step" data-aos="fade-up" data-aos-duration="1000">
                    <div class="left">
                        <div class="count-number">
                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.625 1.25H8.37411L4.43802 6.87564C5.0855 6.87562 5.72299 7.03528 6.29403 7.34048C6.86506 7.64568 7.35201 8.087 7.71175 8.62535C8.07148 9.1637 8.2929 9.78246 8.35637 10.4268C8.41985 11.0712 8.32344 11.7213 8.07567 12.3194C7.8279 12.9176 7.43643 13.4455 6.93592 13.8563C6.43542 14.267 5.84134 14.548 5.2063 14.6743C4.57126 14.8007 3.91487 14.7684 3.29527 14.5805C2.67568 14.3925 2.11199 14.0547 1.65415 13.5968"
                                    stroke="#2C4CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                    </div>
                    <div class="right">
                        <h3 class="title">Edit, polish, and publish</h3>
                        <p class="content">Use Type.ez editor to rewrite paragraphs and polish up sentences.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ==============work end======================= -->

    <!-- ==============Choose package start======================= -->
    <section class="choose-package" id="pricing">
        <div class="container">

            <div class="row g-4 align-items-center">

                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Pricing</span></button>
                        <h3 class="benifits-title">Choose Your <br>
                            Preferred Package</h3>

                    </div>
                </div>
            </div>

            <!-- steps  -->

            <!--  Pricing slider  -->
            <div class="swiper mySwiper py-5 mx-2">
                <div class="swiper-wrapper">
                    <!-- single  card free-->

                    <div class="swiper-slide" data-aos="fade-up" data-aos-duration="1000">
                        <div class="pricing-card">

                            <div class="pricing-card-header">
                                <span class="price">
                                    <span class="currency">$</span>
                                    <span class="number">0</span>
                                    <span class="plane-time">/mo</span>
                                </span>
                                <span class="name">Free</span>
                                <p class="info text-secondary">No credit card required</p>
                            </div>

                            <div class="pricing-card-body">
                                <ul class="facility-list">
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access to all basic features</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Generate 2,000 AI Words / month</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access upto 5 use-cases</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Unlimited projects</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper cross-icon">
                                            <img src="assets/images/icons/cross.svg" alt="cross  icon ">
                                        </span>
                                        <span>Multiple user & email support</span>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <button class="btn-subscribe">Subscribe</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="swiper-slide" data-aos="fade-up">
                        <div class="pricing-card">

                            <div class="pricing-card-header">
                                <span class="price">
                                    <span class="currency">$</span>
                                    <span class="number">0</span>
                                    <span class="plane-time">/mo</span>
                                </span>
                                <span class="name">Free</span>
                                <p class="info text-secondary">No credit card required</p>
                            </div>

                            <div class="pricing-card-body">
                                <ul class="facility-list">
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access to all basic features</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Generate 2,000 AI Words / month</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access upto 5 use-cases</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Unlimited projects</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper cross-icon">
                                            <img src="assets/images/icons/cross.svg" alt="cross  icon ">
                                        </span>
                                        <span>Multiple user & email support</span>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <button class="btn-subscribe subscribed">Already subscribed</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide" data-aos="fade-up">
                        <div class="pricing-card">

                            <div class="pricing-card-header">
                                <span class="price">
                                    <span class="currency">$</span>
                                    <span class="number">0</span>
                                    <span class="plane-time">/mo</span>
                                </span>
                                <span class="name">Free</span>
                                <p class="info text-secondary">No credit card required</p>
                            </div>

                            <div class="pricing-card-body">
                                <ul class="facility-list">
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access to all basic features</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Generate 2,000 AI Words / month</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access upto 5 use-cases</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Unlimited projects</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper cross-icon">
                                            <img src="assets/images/icons/cross.svg" alt="cross  icon ">
                                        </span>
                                        <span>Multiple user & email support</span>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <button class="btn-subscribe subscribed">Already subscribed</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide" data-aos="fade-up">
                        <div class="pricing-card">

                            <div class="pricing-card-header">
                                <span class="price">
                                    <span class="currency">$</span>
                                    <span class="number">0</span>
                                    <span class="plane-time">/mo</span>
                                </span>
                                <span class="name">Free</span>
                                <p class="info text-secondary">No credit card required</p>
                            </div>

                            <div class="pricing-card-body">
                                <ul class="facility-list">
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access to all basic features</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Generate 2,000 AI Words / month</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access upto 5 use-cases</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Unlimited projects</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper cross-icon">
                                            <img src="assets/images/icons/cross.svg" alt="cross  icon ">
                                        </span>
                                        <span>Multiple user & email support</span>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <button class="btn-subscribe subscribed">Already subscribed</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide" data-aos="fade-up">
                        <div class="pricing-card">

                            <div class="pricing-card-header">
                                <span class="price">
                                    <span class="currency">$</span>
                                    <span class="number">0</span>
                                    <span class="plane-time">/mo</span>
                                </span>
                                <span class="name">Free</span>
                                <p class="info text-secondary">No credit card required</p>
                            </div>

                            <div class="pricing-card-body">
                                <ul class="facility-list">
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access to all basic features</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Generate 2,000 AI Words / month</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access upto 5 use-cases</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Unlimited projects</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper cross-icon">
                                            <img src="assets/images/icons/cross.svg" alt="cross  icon ">
                                        </span>
                                        <span>Multiple user & email support</span>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <button class="btn-subscribe subscribed">Already subscribed</button>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>
    <!-- ==============Choose package end ======================= -->
    
     <!--===================== faq  start=====================-->
     <section class="faq">
        <div class="container">

            <div class="row g-4 align-items-center">

                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Faq</span></button>
                        <h3 class="benifits-title"> Frequently Asked  <br>
                            Questions </h3>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <!-- accordion item one  -->
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" 
                            aria-expanded="true" aria-controls="collapseOne">
                               What can I create with Type.ez?
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body"> 
                                <div class="card-divider-faq"></div>
                                <p>We have copywriting tools for everything you need to start and run your business! You can write blog posts, product descriptions, and even Instagram captions with Type.ez . We're always updating our tools, so let us know what else you'd like to see!</p>
                            </div>
                          </div>
                        </div>
                        <!-- accordion item two -->

                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" 
                            aria-controls="collapseTwo">
                            What can I create with Type.ez?
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body"> 
                                <div class="card-divider-faq"></div>
                                <p>We have copywriting tools for everything you need to start and run your business! You can write blog posts, product descriptions, and even Instagram captions with Type.ez . We're always updating our tools, so let us know what else you'd like to see!</p>


                            </div>
                          </div>
                        </div>
                        <!-- accordion item Three  -->


                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" 
                             aria-controls="collapseThree">
                             What can I create with Type.ez?
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body"> 
                                <div class="card-divider-faq"></div>
                                <p>We have copywriting tools for everything you need to start and run your business! You can write blog posts, product descriptions, and even Instagram captions with Type.ez . We're always updating our tools, so let us know what else you'd like to see!</p>


                            </div>
                          </div>
                        </div>
                        <!-- accordion item four -->
                        
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" 
                             aria-controls="collapseThree">
                             What can I create with Type.ez?
                            </button>
                          </h2>
                          <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                               <div class="card-divider-faq"></div>
                               <p>We have copywriting tools for everything you need to start and run your business! You can write blog posts, product descriptions, and even Instagram captions with Type.ez . We're always updating our tools, so let us know what else you'd like to see!</p>

                            </div>
                          </div>
                        </div>
                        <!-- accordion item five -->

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" 
                               aria-controls="collapseThree">
                               What can I create with Type.ez?
                              </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                              <div class="accordion-body"> 
                                <div class="card-divider-faq"></div>
                                  <p>Visa is a document which you need to travoel to a country legally. Some of the important visa types are Tourist 
                                  Visa, Transit Visa, Short Stay or Visitor Visa, Business Visa, Residence Visa, Immigrant Visa, and Medical Visa. </p>

                              </div>
                            </div>
                          </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===================== faq  end=====================-->

    <!-- ==============get started start======================= -->
    <section class="get-started">
        <div class="container py-5">

            <div class="row g-4 align-items-center" data-aos="fade-up" data-aos-duration="1000">

                <div class="col-12" data-aos-duration="1000">
                    <div class="section-header">
                        <h3 class="benifits-title"> Ready to get started?</h3>
                        <p class="des">Write 10x faster, engage your audience, & never struggle <br> with the blank page
                            again.</p>

                    </div>
                </div>

            </div>

            <div class="row g-4 text-center px-5 justify-content-center" data-aos="fade-up" data-aos-duration="1000">

                <div class="col-lg-4">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="assets/icons/cards-icons/check-logn.svg" alt="long check icon ">
                        </div>
                        <span>No credit card required</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="assets/icons/cards-icons/check-logn.svg" alt="long check icon ">
                        </div>
                        <span>7-day trial of Standard plan</span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="assets/icons/cards-icons/check-logn.svg" alt="long check icon ">
                        </div>
                        <span>20+ content types to explore</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="assets/icons/cards-icons/check-logn.svg" alt="long check icon ">
                        </div>
                        <span>AI Image generate</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="getstarted-box">
                        <div class="long-check-wrapper">
                            <img src="assets/icons/cards-icons/check-logn.svg" alt="long check icon ">
                        </div>
                        <span>Progressive Web Apps</span>
                    </div>
                </div>

            </div>

            <div class="button-wrapper py-5 d-flex align-items-center  ps-5 ps-lg-0 justify-content-lg-center"
                data-aos="fade-up">
                <button class="primarybtn-landing">
                    <span class="title">Get your free access now </span>
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 15L15 5" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M6.875 5H15V13.125" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>

                    </span>
                </button>
            </div>

        </div>
    </section>
    <!-- ==============get started end ======================= -->

    <footer class="landing-footer ">
        <div class="container">
            <div class="footer-content" data-aos="fade-up" data-aos-duration="1000">
                <div class="row g-4">
                    <div class="col-lg-2">
                        <a href="index.html">
                            <h3 class="logo-name ">type.ez</h3>
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
                                <a href="" class="link"> Register</a>
                                <a href="" class="link"> Login</a>
                                <a href="" class="link"> SEO Meta Description</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4">
                        <div class="footerlinks">
                            <h5 class="footerlinks-title">Blogs</h5>
                            <div class="footerlink">
                                <a href="" class="link">AI for Sales Teams: How It Works, and How to Get Started</a>
                                <a href="" class="link"> Automated Product Descriptions for Large E-commerce
                                    Retailers</a>
                                <a href="" class="link"> AI for Advertising: The Tools, Tips, & Examples You Need</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-divider"></div>

                <div class="footer-social">
                    <ul class="socilmenu">
                        <li class="socialmenu-item">
                            <a href="" class="socialmenu-link"><img src="assets/icons/social/facebook.svg" alt=""></a>
                        </li>
                        <li class="socialmenu-item">
                            <a href="" class="socialmenu-link"><img src="assets/icons/social/twitter.svg" alt=""></a>
                        </li>
                        <li class="socialmenu-item">
                            <a href="" class="socialmenu-link"><img src="assets/icons/social/linkdin.svg" alt=""></a>
                        </li>
                    </ul>
                </div>

                <div class="copyright">
                    <p class="copyright-text">© 2023 Type.ez</p>
                </div>
            </div>
        </div>
    </footer>


    <!-- MOBILE-MENU -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenu">
        <div class="offcanvas-header">
            <a href="index.html">
                <h3 class="logo-name text-center header-logo">type.ez</h3>
            </a>

            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    <a href="login.html" class="mobilelist-link">Login</a>
                </li>


            </ul>


        </div>
    </div>




    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
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

        window.onscroll = function () {
            // We add pageYOffset for compatibility with IE.
            if (window.scrollY >= scrollTrigger || window.pageYOffset >= scrollTrigger) {
                document.getElementsByTagName("header")[0].classList.add('bg-white');
            } else {
                document.getElementsByTagName("header")[0].classList.remove('bg-white');
            }
        };
       
    </script>
</body>

</html>