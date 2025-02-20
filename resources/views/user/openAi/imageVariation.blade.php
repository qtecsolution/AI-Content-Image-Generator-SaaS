@extends('layouts.app')
@section('title','AI Image Variation Generate')
@section('breadcrumb')
    <li class="breadcrumb-item active">AI Image Variation Generator</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <section class="my-projects">

            <div class="my-projects-header border-bottom">
                <h4 class="header-title">AI Image Variation Generator</h4>
                <div class="project-button pull-right d-flex align-items-center gap-2">
                    
                    <a href="{{ route('image.create') }}" class="seeall-btn d-flex">
                                    <span class="icon">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_532_26737)">
                                                <path d="M7.99967 14.6666C11.6816 14.6666 14.6663 11.6819 14.6663 7.99998C14.6663 4.31808 11.6816 1.33331 7.99967 1.33331C4.31778 1.33331 1.33301 4.31808 1.33301 7.99998C1.33301 11.6819 4.31778 14.6666 7.99967 14.6666Z" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M8 5.33331V10.6666" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M5.33301 8H10.6663" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_532_26737">
                                                <rect width="16" height="16" fill="white"></rect>
                                                </clipPath>
                                                </defs>
                                        </svg>
                                    </span>
                            <span class="mt-1">New</span>
                        </a>
                        <a href="{{ route('image.all') }}" class="seeall-btn d-flex ">
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
                                                <small class="text-mute gray-500 fz-12">Must be a valid PNG file, less than 4MB, and
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
                                <div class="col-md-12 mt-3">
                                    <p class="text-secondary"> <i class="fa fa-bolt"></i> Your balance is <b>{{showBalance()->image}}</b> {{showBalance()->image>1?'images':'image'}} </p>
                                </div>

                                <div class="generate-btn-wrapper" style="justify-content: flex-start;">
                                    <button type="submit" class="generate-btn">Generate Variation</button>
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
                        <div class="row g-2 generated-images mt-2">
                            @foreach ($images as $image)
                                <div class="col-sm-6 col-xxl-4">
                                    <div class="generated-image-card">
                                    <figure class="generated-thumb">
                                        <img src="{{ asset($image->old_image) }}" class="card-img-top p-1"
                                                alt="{{ $image->prompt }}">
                                    </figure>
                                        
                                       
                                        <div class="card-foote d-flex justify-content-between mt-4">
                                            <p class="title text-truncate font-500">Original Image</p>
                                            <div class="icons d-flex align-items-center gap-2">
                                            <a href="{{ route('image.regenerate',$image->id) }}" data-bs-toggle="tooltip" data-bs-title="Regenerate Image" 
                                                > 
                                                <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M23 4V10H17" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M1 20V14H7" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3.51 9.00008C4.01717 7.56686 4.87913 6.28548 6.01547 5.27549C7.1518 4.26551 8.52547 3.55984 10.0083 3.22433C11.4911 2.88883 13.0348 2.93442 14.4952 3.35685C15.9556 3.77928 17.2853 4.56479 18.36 5.64008L23 10.0001M1 14.0001L5.64 18.3601C6.71475 19.4354 8.04437 20.2209 9.50481 20.6433C10.9652 21.0657 12.5089 21.1113 13.9917 20.7758C15.4745 20.4403 16.8482 19.7346 17.9845 18.7247C19.1209 17.7147 19.9828 16.4333 20.49 15.0001" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                </span>
                                            </a>
                                            <a href="{{ asset($image->image_path) }}"  
                                                 data-bs-toggle="tooltip" data-bs-title="Download this image" download> 
                                                <span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M7 10L12 15L17 10" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M12 15V3" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>

                                                </span>
                                            </a>
                                            <a  data-bs-toggle="tooltip" data-bs-title="Delete this image" 
                                                href="javascript:void(0)" type="button"
                                                onclick='resourceDelete("{{ route('image.destroy', $image->id) }}")'>
                                                <span>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 6H5H21" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M10 11V17" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M14 11V17" stroke="#1D2939" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>

                                                </span>
                                            </a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="generated-image-card">
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
