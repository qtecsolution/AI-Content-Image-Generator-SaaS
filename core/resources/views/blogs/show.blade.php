@extends('layouts.app')
@section('title','Post Show')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('manage-blogs.index') }}">Blog</a></li>
    <li class="breadcrumb-item active">Show</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">Blog Details</h4>
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

                        <div class="row g-4 ">
                            <div class="col-lg-7">
                                <ul class="purchesinfo-list">
                                    <li>
                                        <span>Image</span>
                                        <span>:</span>
                                        <figure class="blog-image">
                                            @if ($data->image != '' && file_exists($data->image))
                                                <img class="img-fluid" src="{{ asset($data->image) }}">
                                            @endif
                                        </figure>
                                        
                                    </li>
                                    <li>
                                        <span>Category</span>
                                        <span>:</span>
                                        <span> {{ $data->category->name??'' }} </span>
                                    </li>
                                    <li>
                                        <span>Tags</span>
                                        <span>:</span>
                                        <span> {{ $data->tags }} </span>
                                    </li>
                                    <li>
                                        <span>Meta Description</span>
                                        <span>:</span>
                                        <span> {{ $data->meta_description }} </span>
                                    </li>
                                    <li>
                                        <span>Status</span>
                                        <span>:</span>
                                        <span>@if ($data->is_published == 1)
                                            <span class="text-success">Published</span>
                                        @else
                                            <span class="form-text">Draft</span>
                                        @endif </span>
                                    </li>

                                </ul>
                               
                            </div>
                            <div class="col-lg-5 border-start">
                            <div class="purchesinfo-list">
                                <li>
                                    Title : {{ $data->title }} 
                                    <a data-bs-toggle="tooltip" data-bs-title="Edit blog" data-bs-placement="top"  href="{{route('manage-blogs.edit',$data->id)}}"> 
                                         <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 15.6667H16.5M12.75 1.91666C13.0815 1.58514 13.5312 1.3989 14 1.3989C14.2321 1.3989 14.462 1.44462 14.6765 1.53346C14.891 1.6223 15.0858 1.75251 15.25 1.91666C15.4142 2.08081 15.5444 2.27569 15.6332 2.49017C15.722 2.70464 15.7678 2.93452 15.7678 3.16666C15.7678 3.39881 15.722 3.62868 15.6332 3.84316C15.5444 4.05763 15.4142 4.25251 15.25 4.41666L4.83333 14.8333L1.5 15.6667L2.33333 12.3333L12.75 1.91666Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                     </a>
                                    
                                </li>
                                <li> Description</li>
                                <li>
                                    <div>
                                        @php echo $data->description @endphp
                                    </div>
                                </li>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
