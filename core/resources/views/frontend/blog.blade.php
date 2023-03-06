@extends('frontend.app')
@section('content')
    <!-- ===================hero  start======================= -->
    <section class="hero">
        <div class="container">
            <div class="row g-4">
                <div class="col-12">
                    <div class="hero-content pt-5">
                        <h1 class="hero-title">Welcome to the <br>
                            <span class="logo-name"> {{ readConfig('name') }} </span> blog
                        </h1>
                        <p class="hero-des">{{ readConfig('name') }} is designed to help you streamline your writing process,
                            <br>
                            increase your productivity, and create high-quality content.
                        </p>

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


                <div class="blog-cards">
                    @foreach ($blogs as $blog)
                        <a class="blogcard" href="{{route('blogs.show',$blog->slug)}}">
                            <div class="blogcard-header">
                                <p class="date"> {{date('jS F, Y',strtotime($blog->created_at))}} </p>
                            </div>
                            <div class="blogcard-body">
                                <h3 class="title"> {{$blog->title}} </h3>
                                <p class="content">
                                   {{$blog->meta_description}}
                                </p>
                            </div>
                            <div class="blogcard-footer d-flex justify-content-end">
                                <button class="go-btn">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.8125 9H15.1875" stroke="#2C4CAC" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10.125 3.9375L15.1875 9L10.125 14.0625" stroke="#2C4CAC"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
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
                        @foreach($allFaq as $faqIndex => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{$faq->id}}">
                                <button class="accordion-button @if($faqIndex>0) collapsed @endif" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapse-{{$faq->id}}" aria-expanded="false" aria-controls="faqCollapse-{{$faq->id}}">
                                    {{$faq->question}}
                                </button>
                            </h2>
                            <div id="faqCollapse-{{$faq->id}}" class="accordion-collapse collapse @if($faqIndex==0) show @endif" aria-labelledby="heading-{{$faq->id}}"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <div class="card-divider-faq"></div>
                                    <p> {{$faq->answear}} </p>
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
