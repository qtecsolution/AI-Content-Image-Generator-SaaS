@extends('layouts.app')

@section('title','Page Content Create')
@section('breadcrumb')
<li class="breadcrumb-item">@translate(Page Content Create)</li>
@endsection
@section('content')
<div class="main-content p-2 p-md-4 pt-0">
    <div class="row">
        <div class="col-12">
            <section class="my-projects">

                <div class="my-projects-header">
                    <div class="header-title">@translate(Page Content)</div>

                    <div class="project-button pull-right">
                       
                        <a href="{{ route('pages.content.index', $id) }}" class="seeall-btn d-flex">
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

                <div class="my-projects-body ">
                    <div class="row">
                        <div class="col-lg-8">
                        <form action="{{ route('pages.content.store', $id) }}" class="blog-form" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input name="page_id" type="hidden" value="{{ $id }}">
                        <div class="form-group mb-2">
                            <label class="col-form-label" for="content-title">@translate(Content Title) <span
                                    class="text-danger">*</span></label>
                            <input placeholder="@translate(Enter Content Title)"
                                class="form-control custom-input @error('title') is-invalid @enderror" type="text"
                                value="{{ old('title') }}" name="title" id="content-title">
                        </div>

                        <div class="form-group mb-2">
                            <label class="col-form-label" for="val-suggestions">
                                @translate(Content Description)</label>
                            <textarea required id="summernote"
                                class="form-control  custom-input note-editable @error('body') is-invalid @enderror"
                                name="body" rows="5" aria-required="true">{{ old('body') }}</textarea>
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
        </div>
        </section>
    </div>

</div>
</div>
@endsection