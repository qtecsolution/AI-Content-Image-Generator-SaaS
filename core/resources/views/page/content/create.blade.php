@extends('layouts.app')

@section('title','Page Content Create')
@section('breadcrumb')
    <li class="breadcrumb-item">@translate(Page Content Create)</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header">
                        <div class="header-title">@translate(Page Content)</div>

                        <div class="project-button pull-right">
                            <a class="btn btn-light btn-xs" href="{{ route('pages.content.index', $id) }}">
                                <i class="fa fa-list"></i> @translate(Content List)
                            </a>
                        </div>
                    </div>

                    <div class="my-projects-body ">
                        <div class="card-body">
                            <div class="card-body">
                                <form action="{{ route('pages.content.store', $id) }}" class="blog-form" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input name="page_id" type="hidden" value="{{ $id }}">
                                    <div class="form-group mb-2">
                                        <label class="col-form-label">@translate(Content Title) <span
                                                class="text-danger">*</span></label>
                                        <input placeholder="@translate(Enter Content Title)"
                                            class="form-control custom-input @error('title') is-invalid @enderror" type="text"
                                            value="{{ old('title') }}" name="title">
                                    </div>

                                    <div class="form-group mb-2">
                                        <label class="col-form-label" for="val-suggestions">
                                            @translate(Content Description)</label>
                                        <textarea required id="summernote" class="form-control  custom-input note-editable @error('body') is-invalid @enderror" name="body" rows="5"
                                            aria-required="true">{{ old('body') }}</textarea>
                                        @error('body')
                                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="text-center mb-2">
                                        <button class="btn btn-primary px-5 radius-30"
                                            type="submit">@translate(Save)</button>
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
