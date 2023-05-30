@extends('layouts.app')
@section('title','All Generated Images')
@section('breadcrumb')
<li class="breadcrumb-item active">All Generated Images</li>
@endsection
@section('content')
<div class="main-content p-2 p-md-4 pt-0">
    <section class="my-projects">

        <div class="my-projects-header border-bottom">
            <h4 class="header-title">All Generated Images</h4>
            <div class="project-button pull-right d-flex align-items-center gap-2">

                <a href="{{ route('image.create') }}" class="seeall-btn d-flex">
                    <span class="icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_532_26737)">
                                <path
                                    d="M7.99967 14.6666C11.6816 14.6666 14.6663 11.6819 14.6663 7.99998C14.6663 4.31808 11.6816 1.33331 7.99967 1.33331C4.31778 1.33331 1.33301 4.31808 1.33301 7.99998C1.33301 11.6819 4.31778 14.6666 7.99967 14.6666Z"
                                    stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M8 5.33331V10.6666" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M5.33301 8H10.6663" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
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
                <a href="{{ route('image.variation') }}" class="seeall-btn d-flex d-none">
                    <span class="icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_532_26737)">
                                <path
                                    d="M7.99967 14.6666C11.6816 14.6666 14.6663 11.6819 14.6663 7.99998C14.6663 4.31808 11.6816 1.33331 7.99967 1.33331C4.31778 1.33331 1.33301 4.31808 1.33301 7.99998C1.33301 11.6819 4.31778 14.6666 7.99967 14.6666Z"
                                    stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M8 5.33331V10.6666" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M5.33301 8H10.6663" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_532_26737">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <span class="mt-1"> New Variant</span>
                </a>


            </div>
        </div>
        <div class="my-projects-body mt-2">
            <form action="">
                <!-- <div class="searchbox mb-3 custom ">
                    <span class="search-icon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="text">

                    <div class="right-text">
                        <button class="btn btn-secondary btn-sm"> <i class="fa fa-search"></i> </button>
                        <a  class="btn btn-light btn-sm"> <i class="fa fa-refresh"></i>
                        </a>
                    </div>
                </div> -->
                <div class="image-search-box">
                    <input type="text" name="q" value="{{ $request->q ?? '' }}" id="searchINputField"
                        class="search-input" placeholder="All Generated Images">
                    <div class="right-icons">
                        <button type="submit" class="btn p-0">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 19L14.65 14.65M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z"
                                    stroke="#D0D5DD" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </button>
                        <a href="{{ route('image.all') }}" class="btn p-0">
                            <span>
                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 2.00001V8.00001M21 8.00001H15M21 8.00001L16.37 3.64001C14.9906 2.25975 13.2 1.3652 11.268 1.09116C9.33593 0.817114 7.36717 1.17843 5.65836 2.12065C3.94954 3.06288 2.59325 4.53496 1.79386 6.31508C0.994479 8.0952 0.795309 10.0869 1.22637 11.9901C1.65743 13.8932 2.69536 15.6047 4.18376 16.8667C5.67216 18.1286 7.53038 18.8726 9.47842 18.9866C11.4265 19.1006 13.3588 18.5783 14.9842 17.4985C16.6096 16.4187 17.84 14.8399 18.49 13"
                                        stroke="#D0D5DD" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>

                    </div>
                </div>
            </form>
            <div class="row g-2">

                @foreach ($images as $image)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="generated-image-card">
                        <figure class="generated-thumb">
                            <img src="{{ asset($image->image_path) }}" class="card-img-top p-1"
                                alt="{{ $image->prompt }}">

                        </figure>




                        <div class="card-foote d-flex justify-content-between mt-4">
                            <p class="title text-truncate font-500">{{ $image->prompt }}</p>
                            <div class="icons d-flex align-items-center gap-2">

                                <a href="{{ asset($image->image_path) }}" data-bs-toggle="tooltip"
                                    data-bs-title="Download this image" download>
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15"
                                                stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M7 10L12 15L17 10" stroke="#1D2939" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 15V3" stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </a>
                                @if ($image->prompt != '')
                                <a href="{{ route('image.regenerate',$image->id) }}" data-bs-toggle="tooltip"
                                    data-bs-title="Regenerate Image">
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23 4V10H17" stroke="#1D2939" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1 20V14H7" stroke="#1D2939" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path
                                                d="M3.51 9.00008C4.01717 7.56686 4.87913 6.28548 6.01547 5.27549C7.1518 4.26551 8.52547 3.55984 10.0083 3.22433C11.4911 2.88883 13.0348 2.93442 14.4952 3.35685C15.9556 3.77928 17.2853 4.56479 18.36 5.64008L23 10.0001M1 14.0001L5.64 18.3601C6.71475 19.4354 8.04437 20.2209 9.50481 20.6433C10.9652 21.0657 12.5089 21.1113 13.9917 20.7758C15.4745 20.4403 16.8482 19.7346 17.9845 18.7247C19.1209 17.7147 19.9828 16.4333 20.49 15.0001"
                                                stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </a>

                                @endif

                                <a data-bs-toggle="tooltip" data-bs-title="Delete this image" href="javascript:void(0)"
                                    type="button" onclick='resourceDelete("{{ route('image.destroy', $image->id) }}")'>
                                    <span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 6H5H21" stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6"
                                                stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M10 11V17" stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M14 11V17" stroke="#1D2939" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row g-2">
                <div class="col mt-3">
                    {{ $images->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script></script>
@endsection