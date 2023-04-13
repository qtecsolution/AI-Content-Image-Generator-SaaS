@extends('layouts.app')
@section('title')
    @translate(Page Content Edit)
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">@translate(Page Content Edit)</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="">
            <div class="col-md-12">
                <section class="my-projects">
                    <div class="my-projects-header">
                        <div class="header-title">@translate(Page Section Content)</div>
                        
                        <div class="project-button pull-right">
                            
                            <a  href="{{ route('pages.content.index', $content->page_id) }}" class="seeall-btn d-flex">
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
                            <span class="mt-1"> @translate(Content List)</span>
                        </a>
                            
                        </div>
                    </div>

                    <div class="my-projects-body">
                        <div class="row">
                            <div class="col-lg-8">
                            <form class="blog-form" action="{{ route('pages.content.update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input name="id" type="hidden" value="{{ $content->id }}">
                                <input name="page_id" type="hidden" value="{{ $content->page_id }}">
                                <div class="form-group mb-2">
                                    <label class="form-label">@translate(Content Title) <span class="text-danger">*</span></label>
                                    <input class="form-control custom-input @error('title') is-invalid @enderror" type="text"
                                        value="{{$content->title}}" name="title" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label class="col-form-label" for="val-suggestions">
                                        @translate(Content Description)</label>
                                    <textarea required id="summernote" class="form-control note-editable @error('body') is-invalid @enderror" name="body" rows="5"
                                        aria-required="true">@purify($content->body)</textarea>
                                    @error('body')
                                        <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="generate-btn-wrapper">
                                     <button type="submit" class="generate-btn px-4">@translate(Save)</button>
                                 </div>

                            </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection
