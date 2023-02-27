@extends('layouts.app')

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header">
                        <h4 class="header-title">AI Image Generator</h4>
                        <div class="project-button pull-right">
                            <a href="{{ route('content.create') }}" class="btn btn-light btn-xs"> <i
                                    class="fa fa-list"></i> View All </a>
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <div class="row g-4">

                            <!-- create post column -->
                            <div class="col-lg-5 mt-3">

                                <div class="create-post">
                                    <form action="{{ route('image.generate') }}" method="POST" id="input-form"
                                        class="createpost-form  needs-validation h-100 flex-column  justify-content-between">
                                        @csrf

                                        <div class="form-content">
                                            <div class="row g-4 mb-3">

                                                <!-- Title    -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="prompt" class="form-label">Details</label>
                                                        <input type="text"
                                                            class="form-control custom-input @error('prompt') is-invalid @enderror"
                                                            id="prompt" required autocomplete="off" name="prompt"
                                                            placeholder="What go you want to generate?">
                                                        <div class="invalid-feedback">
                                                            Please enter a details
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-4">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="quantity" class="form-label">Quantity</label>
                                                        <select class="nice-select w-100" name="quantity" id="quantity">
                                                            <option value="1" selected>1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please Select Quantity
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="image_size" class="form-label">Image Size</label>
                                                        <select class="nice-select w-100" name="image_size" id="image_size">
                                                            <option value="256x256" selected>256x256</option>
                                                            <option value="512x512">512x512</option>
                                                            <option value="1024x1024">1024x1024</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please Select Size
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="generate-btn-wrapper">
                                            <button type="submit" class="generate-btn">Generate</button>
                                        </div>


                                    </form>
                                </div>



                            </div>

                            <!-- editor column -->
                            <div class="col-lg-7 border-start mt-0">
                                <div class="row g-2">
                                    @foreach ($images as $image)
                                        <div class="col-4">
                                            <div class="card">
                                                <img src="{{ asset($image->image_path) }}" class="card-img-top p-1"
                                                    alt="{{ $image->prompt }}">
                                                <div class="card-body">
                                                    <p class="card-text">{{ $image->prompt }}</p>
                                                </div>
                                                <div class="card-body">
                                                    <a href="{{ asset($image->image_path) }}"
                                                        class="card-link btn btn-sm btn-success pull-right" download> <i
                                                            class="fa fa-download"></i> Download </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if(count($images)>0)
                                <div class="row">
                                    <div class="col text-center">
                                        <br>
                                        <a class="btn btn-secondary w-100"> View All Generated Images <i class="fa fa-arrow-right"></i> </a>
                                    </div>
                                </div>
                                @endif
                            </div>

                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
