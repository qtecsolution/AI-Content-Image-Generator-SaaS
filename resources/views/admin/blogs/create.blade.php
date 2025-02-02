@extends('layouts.app')
@section('title','Blog Create')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('manage-blogs.index') }}">Blog</a></li>
<li class="breadcrumb-item active">Add New</li>
@endsection
@section('content')
<div class="main-content p-2 p-md-4 pt-0">
    <div class="row">
        <div class="col-12 ">
            <section class="my-projects">

                <div class="my-projects-header border-bottom">
                    <h4 class="header-title">Add New Blog</h4>
                    <div class="project-button pull-right">

                        <a href="{{ route('manage-blogs.index') }}"class="seeall-btn d-flex">
                          <span class="icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.33301 4H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M5.33301 8H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M5.33301 12H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                          </span>
                         <span class="mt-1">View All</span>
                        </a>
                    </div>
                </div>
                <div class="my-projects-body">
                    <form method="post" class="blog-form p-2 " action="{{ route('manage-blogs.store') }}" id="save-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <!-- create post column -->
                            <div class="col-lg-8 mt-0">

                                <div class="create-post">
                                    <div class="form-content">
                                        <div class="row g-4">
                                            <!-- Title    -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input type="text" class="form-control custom-input @error('title') is-invalid @enderror" id="title"
                                                        required autocomplete="off" name="title"
                                                        placeholder="Write here..." value="{{ old('title') }}">
                                                    @error('title')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description" class="form-label">Blog Description</label>
                                                    <textarea id="summernote" name="description">{{old('description')}}</textarea>
                                                    @error('description')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4 border-start mt-0">
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="title" class="form-label">Image</label>
                                            <div>
                                                <input  type="file" name="image" class="form-control custom-input @error('image') is-invalid @enderror" >
                                                 @error('image')
                                                     <div class="invalid-feedback">
                                                         {{ $message }}
                                                     </div>
                                                 @enderror
                                            </div>
                                            <small class="fz-12 mt-2 gray-500">Recommended Image Size 1200X675 </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="category_id" class="form-label">Category</label>
                                            {!! Form::select('category_id', $category, '', ['class' => 'w-100 nice-select','placeholder'=>'-select category-','required']) !!}
                                            @error('category_id')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <label for="tags" class="form-label">Tags</label>
                                        <textarea class="form-control custom-input @error('tags') is-invalid @enderror" id="tags" autocomplete="off" name="tags"
                                            placeholder="Tags sapareted by comma" rows="2">{{old('tags')}}</textarea>
                                        @error('tags')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- description -->
                                <div class="col-12">
                                    <!-- description  -->
                                    <div class="form-group">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea class="form-control custom-input @error('meta_description') is-invalid @enderror" id="meta_description" autocomplete="off" name="meta_description"
                                            placeholder="Meta Description" rows="4">{{old('meta_description')}}</textarea>
                                        @error('meta_description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="is_published" class="form-label col-md-12"> Status : </label>
                                        {!! Form::select('is_published', [1=>'Published',2=>'Draft'], 1, ['class'=>'nice-select']) !!}
                                    </div>
                                </div>
                                <div class="generate-btn-wrapper">
                                    <button type="submit" class="generate-btn px-4">Submit</button>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
