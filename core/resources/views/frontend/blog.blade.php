@extends('frontend.app')
@section('content')
    <!-- ===================hero  start======================= -->
    <section class="hero bg-blog pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="hero-content pt-5">
                        <h1 class="hero-title">Welcome to the <br>
                            <span class="logo-name">{{ readConfig('name') }}</span> blog
                        </h1>
                        <p class="hero-des">{{ readConfig('name') }} is designed to help you streamline your writing process,
                            <br>
                            increase your productivity, and create high-quality content.</p>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <!-- ===================hero end ======================= -->

    <!-- ===================blogs================= -->
    <section class="blog">
        <div class="container">


            <!-- cards -->
            <div class="row m-0">

                <!-- blog category buttons -->

                <ul class="category-list">
                    <li class="category-list-item {{ Route::currentRouteName() == 'blogs.index' ? 'active' : '' }}"><a
                            href="{{ route('blogs.index') }}" class="category-list-link">All</a></li>
                    @foreach ($categories as $cat)
                        <li
                            class="category-list-item {{ Request::url() == route('blog.category', $cat->slug) ? 'active' : '' }}">
                            <a href="{{ route('blog.category', $cat->slug) }}"
                                class="category-list-link ">{{ $cat->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <!-- blog category cards -->

                <div class="blog-cards">
                    @foreach ($blogs as $blog)
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="blog-category-card">
                            <figure class="blog-thumb">
                                <img src="{{ filePath($blog->image) }}" alt="">
                            </figure>
                            <div class="right">
                                <p class="date">{{ date('jS F, Y', strtotime($blog->created_at)) }}</p>
                                <h2 class="titel">{{ $blog->title }}</h2>
                                <p class="content">{{ $blog->meta_description }} ...read more</p>


                                <div class="blogcard-footer d-flex justify-content-end">
                                    <button class="go-btn">
                                        <svg width="16" height="16" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.8125 9H15.1875" stroke="#2C4CAC" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M10.125 3.9375L15.1875 9L10.125 14.0625" stroke="#2C4CAC"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- next previous images  -->
                <div class="buttons d-flex align-items-center gap-3 justify-content-center py-3 py-lg-5 blog-pagination">
                    {{ $blogs->links('vendor.pagination.simple-bootstrap-5') }}
                </div>

            </div>
        </div>
    </section>
    <!-- ===================blogs================= -->

    <!--===================== faq  start=====================-->
    <section class="faq">
        <div class="container">

            <div class="row g-4 align-items-center">

                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Faq</span></button>
                        <h3 class="benifits-title"> Frequently Asked <br>
                            Questions </h3>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <!-- accordion item  -->
                        @foreach ($allFaq as $faqIndex => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $faq->id }}">
                                    <button class="accordion-button @if ($faqIndex > 0) collapsed @endif"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faqCollapse-{{ $faq->id }}" aria-expanded="false"
                                        aria-controls="faqCollapse-{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="faqCollapse-{{ $faq->id }}"
                                    class="accordion-collapse collapse @if ($faqIndex == 0) show @endif"
                                    aria-labelledby="heading-{{ $faq->id }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <div class="card-divider-faq"></div>
                                        <p> {{ $faq->answer }} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===================== faq  end=====================-->
@endsection
