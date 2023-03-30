@extends('layouts.app')
@section('title')
@translate(Plan Update)
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">@translate(Plan Update)</li>
@endsection
@section('content')
<div class="main-content p-2 p-md-4 pt-0">
    <div class="row g-4">

        <div class="col-md-12">
            <div class="my-projects">
                <div class="my-projects-header border-bottom">
                    <h5 class="header-title">Update Plan</h5>
                    <div class="project-button pull-right">
                        <a href="{{ route('plan.index') }}" class="seeall-btn d-flex">
                            <span class="icon">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.33301 4H13.9997" stroke="#1D2939" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.33301 8H13.9997" stroke="#1D2939" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.33301 12H13.9997" stroke="#1D2939" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </span>
                            <span class="mt-1">All
                                Plans</span>
                        </a>
                    </div>
                </div>
                <div class="my-projects-body mt-1">
                    <div class="col-md-6">
                        <form method="post" action="{{ route('plan.update', $plan->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $plan->id }}">
                            <div class="form-group mb-3">
                                <label for="inputEmail3" class="form-label">Plan Name <span class="text-danger">*</span>
                                </label>


                                <input type="text" value="{{ $plan->name }}" name="name" required
                                    class="form-control custom-input" id="inputEmail3" placeholder="Plan name">
                            </div>



                            <div class="form-group mb-3">
                                <label for="inputEmail4" class="form-label">Word Count limit per request
                                    <span class="text-danger">*</span> </label>


                                <input type="number" min="0" required value="{{ $plan->word_count }}" name="word_count"
                                    class="form-control custom-input" id="inputEmail4" placeholder="0" placeholder="0">

                                <small class="text-muted mt-2 fz-12">if you input the 0 value it's will be
                                    unlimited</small>
                            </div>


                            <div class="form-group mb-3">
                                <label for="inputEmail5" class="form-label">User request limit <span
                                        class="text-danger">*</span> </label>

                                <input type="number" min="0" value="{{ $plan->word_count }}" required
                                    name="call_api_count" class="form-control custom-input" id="inputEmail5"
                                    placeholder="0">
                                <small class="text-muted mt-2 fz-12">if you input the 0 value it's will be
                                    unlimited</small>
                            </div>


                            <div class="form-group mb-3">
                                <label for="inputEmail8" class="form-label">User Save Documets limit <span
                                        class="text-danger">*</span> </label>

                                <input type="number" min="0" value="{{ $plan->documet_count }}" required
                                    name="documet_count" class="form-control custom-input" id="inputEmail8"
                                    placeholder="0">
                                <small class="text-muted mt-2 fz-12">if you input the 0 value it's will be
                                    unlimited</small>
                            </div>


                            <div class="form-group mb-3">
                                <label for="inputEmail9" class="form-label">How many image can generate
                                    user <span class="text-danger">*</span> </label>

                                <input type="number" min="0" value="{{ $plan->image_count }}" required
                                    name="image_count" class="form-control custom-input" id="inputEmail9"
                                    placeholder="0">

                                <small class="text-muted mt-2 fz-12">if you input the 0 value it's will be
                                    unlimited</small>
                            </div>

                            <div class="form-group mb-3">
                                <label for="inputEmail10" class="form-label">Price <span class="text-danger">*</span>
                                </label>
                                <input type="number" value="{{ $plan->price }}" min="0" step="0.01" required
                                    name="price" class="form-control custom-input" id="inputEmail10" placeholder="0">
                                <small class="text-muted mt-2 fz-12">if you input the 0 value it's will be free</small>
                            </div>

                            <div class="generate-btn-wrapper">
                                <button type="submit" class="generate-btn px-4">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection