@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('contents.index') }}">Contents</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">Edit Content</h4>
                    </div>
                    <div class="my-projects-body">
                        <form action="{{ route('contents.update', $data->id) }}" method="POST"
                            class="createpost-form  needs-validation  h-100 d-flex flex-column  justify-content-between">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <!-- create post column -->
                                <div class="col-lg-5 mt-0">

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
                                                        <div class="valid-feedback">
                                                            Awesome! You're one step closer to greatness.
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please enter a title
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- keywords -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="keywords" class="form-label">Keywords</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="keywords" required autocomplete="off" name="keywords"
                                                            placeholder="Enter your keywords" value="{{ $data->keywords }}">
                                                        <div class="valid-feedback">
                                                            Awesome! You're one step closer to greatness.
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please enter keywords
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- description -->
                                                <div class="col-12">
                                                    <!-- description  -->
                                                    <div class="form-group">
                                                        <label for="description" class="form-label">Description</label>
                                                        <textarea class="form-control custom-input" id="description" autocomplete="off" name="description"
                                                            placeholder="Description">{{ $data->description }}</textarea>
                                                        <div class="valid-feedback">
                                                            Awesome! You're one step closer to greatness.
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please enter your description
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="generate-btn-wrapper">
                                            <button type="submit" class="generate-btn"> <i class="fa fa-save"> </i> &nbsp;
                                                Update</button>
                                        </div>



                                    </div>



                                </div>

                                <!-- editor column -->
                                <div class="col-lg-7 border-start mt-0">
                                    <textarea id="summernote" name="generated_content">{!! $data->generated_content !!}</textarea>
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
                colorNames: {
                    'red': '#ff0000',
                    'green': '#00ff00',
                    'blue': '#0000ff'
                }
            });

        })
    </script>
@endsection
