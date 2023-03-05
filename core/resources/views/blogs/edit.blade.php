@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('manage-blogs.index') }}">Blog</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">Edit Blog</h4>
                    </div>
                    <div class="my-projects-body">
                        <form method="post" class="blog-form p-2 border-lite bg-light"
                            action="{{ route('manage-blogs.update',$data->id) }}" id="save-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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
                                                        <input type="text" class="form-control custom-input"
                                                            id="title" required autocomplete="off" name="title"
                                                            placeholder="Write here..." value="{{ $data->title }}">
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
                                                        <textarea id="summernote" name="description">{!! $data->description !!}</textarea>
                                                        @error('description')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <!-- editor column -->
                                <div class="col-lg-4 border-start mt-0">
                                    <!-- keywords -->
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title" class="form-label">Image</label>
                                                @if($data->image != '' && file_exists($data->image))
                                                <div class="mb-1">
                                                    <img src="{{asset($data->image)}}" width="100px">
                                                </div>
                                                @endif
                                                <div>
                                                    <input  type="file" name="image" class="form-control" >
                                                     @error('image')
                                                         <div class="invalid-feedback">
                                                             {{ $message }}
                                                         </div>
                                                     @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="keywords" class="form-label">Category</label>
                                                {!! Form::select('category_id', $category, $data->category_id??'', ['class' => 'w-100 nice-select','placeholder'=>'-select category-','required']) !!}
                                                @error('category_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="tags" class="form-label">Tags</label>
                                            <textarea class="form-control custom-input" id="tags" autocomplete="off" name="tags"
                                                placeholder="Tags sapareted by comma" rows="2">{{ $data->tags }}</textarea>
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
                                            <textarea class="form-control custom-input" id="meta_description" autocomplete="off" name="meta_description"
                                                placeholder="Meta Description" rows="4">{{ $data->meta_description }}</textarea>
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
                                            {!! Form::select('is_published', [1=>'Published',2=>'Draft'], $data->is_published, ['class'=>'nice-select']) !!}
                                        </div>
                                    </div>
                                    <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn"> <i class="fa fa-save"> </i> &nbsp;
                                            Update</button>
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
@section('script')
    <script>
        // Summernote (Texteditor) Script
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'list']],
                    ['color', ['forecolor']],
                    ['height', ['height']]
                ],
            });

        })
    </script>
@endsection
