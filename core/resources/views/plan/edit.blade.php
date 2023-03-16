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
                    <div class="my-projects-header">
                        <h5 class="header-title">Update Plan</h5>
                        <div class="project-button pull-right">
                            <a href="{{route('plan.index')}}" class="btn btn-light btn-xs"> 
                                <i class="fa fa-list"></i> All Plans </a>
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <form method="post" action="{{route('plan.update',$plan->id)}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$plan->id}}">
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Plan Name  <span class="text-danger">*</span></label>
                                <br>
                                <div class="col-sm-12">
                                    <input type="text" value="{{$plan->name}}" name="name" required class="form-control custom-input" id="inputEmail3">
                                </div>
                            </div>
                            

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Work Count limit per request <span class="text-danger">*</span></label>
                               
                                <div class="col-sm-12">
                                    <input type="number" min="0" required value="{{$plan->word_count}}" name="word_count" class="form-control custom-input" id="inputEmail3">
                                </div>
                                <small class="text-muted">if you input the 0 value it's will be unlimited</small>
                            </div>


                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">User request limit <span class="text-danger">*</span></label>
                               
                                <div class="col-sm-12">
                                    <input type="number" min="0" value="{{$plan->word_count}}" required name="call_api_count" class="form-control custom-input" id="inputEmail3">
                                </div>
                                <small class="text-muted">if you input the 0 value it's will be unlimited</small>
                            </div>


                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">User Save Documets limit <span class="text-danger">*</span></label>
                               
                                <div class="col-sm-12">
                                    <input type="number" min="0" value="{{$plan->documet_count}}" required name="documet_count" class="form-control custom-input" id="inputEmail3">
                                </div>
                                <small class="text-muted">if you input the 0 value it's will be unlimited</small>
                            </div>


                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">How many image can generate user <span class="text-danger">*</span></label>
                               
                                <div class="col-sm-12">
                                    <input type="number" min="0" value="{{$plan->image_count}}" required name="image_count" class="form-control custom-input" id="inputEmail3">
                                </div>
                                <small class="text-muted">if you input the 0 value it's will be unlimited</small>
                            </div>

                            

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Language Support <span class="text-danger">*</span></label>
                               
                                <div class="col-sm-12">
                                    <select class="form-control" required name="lang">
                                        <option value="">Select Option</option>
                                        <option value="english" {{$plan->lang == 'english' ? 'selected' : 'null'}}>English</option>
                                        <option value="all" {{$plan->lang == 'all' ? 'selected' : 'null'}}>All Languages</option>
                                    </select>
                                </div>
                               
                            </div>


                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-12 col-form-label">Price <span class="text-danger">*</span> </label>
                               
                                <div class="col-sm-12">
                                    <input type="number" value="{{$plan->price}}" min="0" step="0.01" required name="price" class="form-control custom-input" id="inputEmail3">
                                </div>
                                <small class="text-muted">if you input the 0 value it's will be free</small>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection
