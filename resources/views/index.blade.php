@extends('layouts.app')
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <!-- WELCOME SECTION START -->
        <section class="welcome">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="welcome-title">👋 Hi, Olivia Rhye</h3>
                    <p class="welcome-text">"Welcome Type.ez! We're glad to have you here. Our platform is designed
                        to help you streamline <br> your writing process, increase your productivity, and create
                        high-quality content. <br> We're confident you'll find the tools and features here to be
                        user-friendly and effective.</p>
                </div>
            </div>
        </section>
        <!-- WELCOME SECTION END -->

        <!-- POPULAR TEMPLATE  SECTION START -->
        <section class="popular-template">
            <div class="popular-template-header">
                <h4 class="header-title">Popular Template</h4>
            </div>
            <div class="popular-template-body">

                <div class="template-wrapper">

                    <!-- single template  -->
                    <a href="{{route('posts.create')}}?case=pro_des" class="template-card">
                        <figure class="card-img">
                            <img src="assets/images/icons/box.svg " alt="">
                        </figure>
                        <h3 class="card-title">Product Description</h3>

                        <p class="card-des">Generate beautifully written product descriptions to increase sales.</p>

                    </a>

                    <!-- single template  -->
                    <a href="{{route('posts.create')}}?case=blog" class="template-card">

                        <figure class="card-img">
                            <img src="assets/images/icons/writting.svg" alt="blog image ">
                        </figure>

                        <h3 class="card-title">Blog Writing</h3>
                        <p class="card-des">The Blog Writing template takes your topic from idea to outline and then
                            generate perfect text.</p>
                    </a>

                    <!-- single template  -->
                    <a href="{{route('posts.create')}}?case=social" class="template-card">

                        <figure class="card-img">
                            <img src="assets/images/icons/social-caption.svg " alt="socila media caption ">
                        </figure>

                        <h3 class="card-title">Social Media Caption</h3>
                        <p class="card-des">Generate beautifully written product descriptions to increase sales.</p>
                    </a>

                    <!-- single template  -->
                    <a href="{{route('posts.create')}}?case=mail" class="template-card">

                        <figure class="card-img">
                            <img src="assets/images/icons/gmail.svg " alt="">
                        </figure>

                        <h3 class="card-title">Mail Writing</h3>
                        <p class="card-des">Generate simple and professional report based on different category with
                            just a few keywords.</p>
                    </a>

                    <!-- single template  -->
                    <a class="template-card" href="{{route('posts.create')}}?case=google_seo">

                        <figure class="card-img">
                            <img src="assets/images/icons/google.svg " alt="google">
                        </figure>

                        <h3 class="card-title">Google SEO</h3>
                        <p class="card-des">The best-performing Google ad copy converts visitors into customer! So
                            don’t miss it.</p>
                    </a>

                </div>


            </div>
        </section>
        <!-- POPULAR TEMPLATE  SECTION END -->

        <!-- MY PROJECT  SECTION START -->
        <section class="my-projects">

            <div class="my-projects-header">
                <h4 class="header-title">My Projects</h4>
            </div>

            <div class="my-projects-body">
                <div class="project-table-wrapper">

                    <div class="searchbox">
                        <span class="search-icon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="" id="searchINputField">

                        <div class="right-text">
                            <span>Delete</span>
                            <span class="selected">selected 4</span>
                            <span>Media posts </span>
                        </div>
                    </div>

                    <table id="projectTable" class="project-table">
                        <thead>
                            <tr>
                                <td data-orderable="false"> <input type="checkbox" name="row-check"
                                        class="form-check-input"></td>
                                <td data-orderable="false">Post Title</td>
                                <td data-orderable="false">Image </td>
                                <td>Platform </td>
                                <td>Words </td>
                                <td>Characters</td>
                                <td>Status </td>
                                <td last Modified>last Modified</td>
                                <td data-orderable="false"></td>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td> 1Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <span type="button" class="" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                        </span>

                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>
                                    2How bd Technology is Revolutionizing Marketing StrategiesHow Technology is
                                    Revolutionizing Marketing StrategiesHow Technology is Revolutionizing Marketing
                                    StrategiesHow Technology is Revolutionizing Marketing Strategies
                                </td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                        <span>twitter</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-not-posted">not posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>february 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="checkbox" name="row-check" class="form-check-input">
                                </td>
                                <td>How Technology is Revolutionizing Marketing Strategies</td>
                                <td>

                                    <figure class="porject-thumb">
                                        <img src="assets/images/user.png" alt="">
                                    </figure>

                                </td>
                                <td>
                                    <div class="social-wrapper">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <span>facebook</span>
                                    </div>

                                </td>
                                <td>
                                    3421
                                </td>
                                <td>342412121</td>
                                <td> <span class="status-posted">posted</span> </td>
                                <td>January 13, 2023 , 11:07 am </td>
                                <td>
                                    <div class="action-wrapper">
                                        <a href="javascript:void(0)"><i class="fa fa-trash-o fa-lg"
                                                aria-hidden="true"></i></a>
                                        <a href="edit-post.html"><i class="fa fa-pencil fa-lg"
                                                aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>



                        </tbody>


                    </table>

                </div>
            </div>

        </section>
        <!-- MY PROJECT  SECTION END -->
    </div>
@endsection
