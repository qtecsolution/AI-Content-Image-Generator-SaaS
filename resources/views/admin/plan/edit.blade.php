@extends('layouts.app')
@section('title')
@translate(Plan Update)
@endsection
@section('breadcrumb')
<li class="breadcrumb-item">@translate(Plan Update)</li>
@endsection
@section('content')
<div class="main-content p-2 p-md-4 pt-0">
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
                    <span class="mt-1">All Plans</span>
                </a>
            </div>
        </div>
        <div class="my-projects-body">
            <form method="post" action="{{ route('plan.update', $plan->id) }}" class="overflow-hidden">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $plan->id }}">
                <div class="row g-5">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group mb-3">
                            <label for="planName" class="col-sm-12 col-form-label font-500">Plan Name <span
                                    class="text-danger">*</span> : </label>
                            <br>
                            <div class="col-sm-12">
                                <input type="text" name="name" required class="form-control custom-input @error('name') is-invalid @enderror"
                                    id="planName" placeholder="plan name" value="{{$plan->name}}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="wordCount" class="col-sm-12 col-form-label font-500">Total words per month
                                <span class="text-danger">*</span> : </label>

                            <div class="col-sm-12">
                                <input type="number" min="0" required name="word_count"
                                       class="form-control custom-input @error('word_count') is-invalid @enderror" id="wordCount" placeholder="0" value="{{$plan->word_count}}">
                                    @error('word_count')
                                       <div class="invalid-feedback">
                                           {{ $message }}
                                       </div>
                                   @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="maxWordCount" class="col-sm-12 col-form-label font-500">Maximum word limit per request
                                <span class="text-danger">*</span> : </label>

                            <div class="col-sm-12">
                                <input type="number" min="0" required name="max_words"
                                    class="form-control custom-input @error('max_words') is-invalid @enderror" id="maxWordCount" placeholder="0" value="{{$plan->max_words}}">
                                @error('max_words')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="inputEmail5" class="col-sm-12 col-form-label font-500">Total Image generate per month <span class="text-danger">*</span> : </label>

                            <div class="col-sm-12">
                                <input type="number" min="0" required name="image_count"
                                    class="form-control custom-input @error('image_count') is-invalid @enderror" id="inputEmail5" placeholder="0" value="{{$plan->image_count}}">
                                @error('image_count')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 border-start">
                        <div class="form-group mb-3">
                            <label for="inputEmail6" class="col-sm-12 col-form-label font-500">Monthly Price <span
                                    class="text-danger">*</span> : </label>

                            <div class="col-sm-12">
                                <input type="number" min="0" step="0.01" required name="price"
                                    class="form-control custom-input @error('price') is-invalid @enderror" id="inputEmail6" placeholder="$" value="{{$plan->price}}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputEmail6" class="col-sm-12 col-form-label font-500">Yearly Price <span
                                    class="text-danger">*</span> : </label>

                            <div class="col-sm-12">
                                <input type="number" min="0" step="0.01" required name="yearly_price"
                                    class="form-control custom-input @error('yearly_price') is-invalid @enderror" id="inputEmail6" placeholder="$" value="{{$plan->yearly_price}}">
                                @error('yearly_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="inputEmail6" class="col-sm-12 col-form-label font-500">Templates Access <i
                                class="fa fa-info-circle" data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                data-bs-title="You can select multiple template types."></i> <span
                                    class="text-danger">*</span> : </label>

                            <div class="col-sm-12">
                                {!! Form::select('templates[]',[0=>'All Templates',1=>'Basic Templates',2=>'Standard Templates',3=>'Professional Templates'],$planTemplates,['class'=>'form-control w-100 nice-select','required','multiple']) !!}
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="col-sm-6 mb-3">
                                <label role="button"> <input type="checkbox" value="1" name="code_generate_enabled" {{$plan->code_generate_enabled==1 ?'checked':''}}> Code Generate with AI </label>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label role="button"> <input type="checkbox" value="1" name="chat_enabled" {{$plan->chat_enabled==1 ?'checked':''}}> Chat with AI </label>
                            </div>
                            <div class="col-sm-6">
                                <label> <input type="checkbox" value="1" name="support_enabled" {{$plan->support_enabled==1 ?'checked':''}}> Email and chat support </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="generate-btn-wrapper">
                                <button type="submit" class="generate-btn px-4">Update</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
