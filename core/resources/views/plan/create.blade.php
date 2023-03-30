@extends('layouts.app')
@section('title')
    @translate(Plan Create)
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">@translate(Plan Create)</li>
@endsection

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h5 class="header-title">Create Plan</h5>
                        <div class="project-button pull-right">
                           
                                <a href="{{ route('plan.index') }}" class="seeall-btn d-flex">
                                <span class="icon">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.33301 4H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33301 8H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M5.33301 12H13.9997" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    </span>   
                                <span class="mt-1">All
                                Plans</span> 
                            </a>    
                        </div>

                    </div>
                    <div class="my-projects-body">
                        <div class="col-md-6">
                            <form method="post" action="{{ route('plan.store') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="planName" class="col-sm-12 col-form-label font-500">Plan Name <span
                                            class="text-danger">*</span> </label>
                                    <br>
                                    <div class="col-sm-12">
                                        <input type="text" name="name" required class="form-control custom-input" 
                                            id="planName" placeholder="plan name">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="wordCount" class="col-sm-12 col-form-label font-500">Word Count limit per request
                                        <span class="text-danger">*</span> </label>

                                    <div class="col-sm-12">
                                        <input type="number" min="0" required name="word_count"
                                            class="form-control custom-input" id="wordCount" placeholder="0">
                                    </div>
                                    <small class="text-muted mt-2 fz-12">if you input 0 , it's will be unlimited</small>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputEmail3" class="col-sm-12 col-form-label font-500">Open AI API request limit <span
                                            class="text-danger">*</span> </label>

                                    <div class="col-sm-12">
                                        <input type="number" min="0" required name="call_api_count"
                                            class="form-control custom-input" id="inputEmail3" placeholder="0">
                                    </div>
                                    <small class="text-muted mt-2 fz-12">if you input the 0 value it's will be unlimited</small>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputEmail4" class="col-sm-12 col-form-label font-500">Save Documets limit <span
                                            class="text-danger">*</span>  </label>

                                    <div class="col-sm-12">
                                        <input type="number" min="0" required name="documet_count"
                                            class="form-control custom-input" id="inputEmail4" placeholder="0">
                                    </div>
                                    <small class="text-muted mt-2 fz-12">if you input the 0 value it's will be unlimited</small>
                                </div>


                                <div class="row mb-3">
                                    <label for="inputEmail5" class="col-sm-12 col-form-label font-500">How many image can generate
                                        user
                                        <span class="text-danger">*</span> </label>

                                    <div class="col-sm-12">
                                        <input type="number" min="0" required name="image_count"
                                            class="form-control custom-input" id="inputEmail5" placeholder="0">
                                    </div>
                                    <small class="text-muted mt-2 fz-12">if you input the 0 value it's will be unlimited</small>
                                </div>




                                <div class="row mb-3">
                                    <label for="inputEmail6" class="col-sm-12 col-form-label font-500">Price <span
                                            class="text-danger">*</span>  </label>

                                    <div class="col-sm-12">
                                        <input type="number" min="0" step="0.01" required name="price"
                                            class="form-control custom-input" id="inputEmail6" placeholder="$">
                                    </div>
                                    <small class="text-muted mt-2 fz-12">if you input the 0 value it's will be free</small>
                                </div>

                                <div class="generate-btn-wrapper">
                                    <button type="submit" class="generate-btn px-4">Create</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
