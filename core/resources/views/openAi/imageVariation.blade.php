@extends('layouts.app')

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <section class="my-projects">

            <div class="my-projects-header border-bottom">
                <h4 class="header-title">AI Image Variation Generator</h4>
                <div class="project-button pull-right">
                    <a href="{{ route('image.create') }}" class="btn btn-light btn-xs"> <i class="fa fa-plus-circle"></i> New </a>
                    <a href="{{ route('image.all') }}" class="btn btn-light btn-xs"> <i class="fa fa-list"></i> View All </a>
                </div>
            </div>
            <div class="my-projects-body">
                <div class="row">
                    <div class="col-lg-5">

                        <div class="create-post">

                            <form action="{{ route('image.generate.variation') }}" method="POST" id="input-form"
                                class="createpost-form  needs-validation h-100 flex-column  justify-content-between"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-content">
                                    <div class="row g-4 mb-3">
                                        <div class="col-9">
                                            <div class="form-group">
                                                <label for="upload-image" class="form-label">Select your image</label>
                                                <input type="file"
                                                    class="form-control custom-input @error('old_image') is-invalid @enderror"
                                                    id="upload-image" required name="old_image">
                                                <small class="text-mute">Must be a valid PNG file, less than 4MB, and
                                                    square.</small>
                                                <div class="invalid-feedback">
                                                    @error('old_image')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                                <div>
                                                    <small id="fileNotSupported" class="text-danger"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div id="preview-image" style="display:none">
                                                <img src="{{ asset('assets/images/placeholder.png') }}" width="100px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        {{-- <div class="col-6">
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
                                        </div> --}}
                                        <div class="col-9">
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

                                <div class="generate-btn-wrapper" style="justify-content: flex-start;">
                                    <button type="submit" class="generate-btn">Generate</button>
                                </div>


                            </form>
                        </div>



                    </div>

                    <!-- editor column -->
                    <div class="col-lg-7 border-start mt-0">
                        <div class="row" id="image-spinner" style="display: none">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <br>
                                <div class="spinner">
                                    <i class="fa fa-circle-o-notch fa-spin" style="font-size: 100px;color: #003a91;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 generated-images">
                            @foreach ($images as $image)
                                <div class="col-4">
                                    <div class="card">
                                        <img src="{{ asset($image->old_image) }}" class="card-img-top p-1"
                                            alt="{{ $image->prompt }}">
                                        <div class="card-body">
                                            <p class="card-text text-truncate">Original Image</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <img src="{{ asset($image->image_path) }}" class="card-img-top p-1"
                                            alt="{{ $image->prompt }}">
                                            <div class="card-body">
                                                <p class="card-text text-truncate">New Variant</p>
                                            </div>
                                        <div class="card-body text-center">
                                            <a href="{{ asset($image->image_path) }}" title="Download Image"
                                                class="card-link btn btn-sm btn-light text-info" download> <i
                                                    class="fa fa-lg fa-download"></i> </a>
                                            @if($image->prompt!='')
                                            <a href="{{ route('image.regenerate', $image->id) }}" title="Regenerate Image"
                                                class="card-link btn btn-sm btn-light text-warning"> <i
                                                    class="fa fa-lg fa-refresh"></i> </a>
                                            @endif
                                            <a class="btn btn-sm btn-light text-danger" title="Delete Image"
                                                href="javascript:void(0)" type="button"
                                                onclick='resourceDelete("{{ route('image.destroy', $image->id) }}")'>
                                                <i class="fa fa-trash-o fa-lg"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if (count($images) > 0)
                            <div class="row generated-images">
                                <div class="col text-center">
                                    <br>
                                    <a href="{{ route('image.all') }}" class="btn btn-secondary w-100"> View All Generated
                                        Images <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $('#upload-image').change(function() {
            $('#preview-image').show();
            var file = this.files[0];
            if(file.size > 4000000){
                $('#fileNotSupported').html('Image should be less than 4MB!');
                $('#upload-image').val('');
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview-image img').attr('src', e.target.result);
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                    var height = this.height;
                    var width = this.width;
                    if(width!=height){
                        console.log('Image should be square')
                        $('#upload-image').addClass('is-invalid');
                        $('#fileNotSupported').html(`Image(${(width)}X${(height)}) should be square!`);
                        $('#upload-image').val('');
                        return false;
                    }
                    return true;
                };
            }
            reader.readAsDataURL(file);
        });
        $(document).ready(function() {
            $('#image-spinner').hide();
        })
        $('#input-form').submit(function() {
            $('#image-spinner').show();
            $('.generated-images').hide();
        })
    </script>
@endsection
