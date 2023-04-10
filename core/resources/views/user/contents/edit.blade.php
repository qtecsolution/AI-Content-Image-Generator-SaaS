@extends('layouts.app')
@section('title','Contents')
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


                                        <div class="form-content mt-2">

                                            <div class="row g-4">
                                                @if((isset($data->useCase->title_label) && $data->useCase->title_label!='') || $data->type=='code')
                                                <!-- Title    -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title" class="form-label">{{$data->useCase->title_label??'Title'}}</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="title" required autocomplete="off" name="title"
                                                            placeholder="Write here..." value="{{ $data->title }}">
                                                    </div>
                                                </div>
                                                @endif
                                                @if(isset($data->useCase->short_description_label) && $data->useCase->short_description_label!='')
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="short_description" class="form-label">{{$data->useCase->short_description_label}}</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="short_description" autocomplete="off" name="short_description"
                                                            placeholder="" value="{{ $data->short_description }}">
                                                    </div>
                                                </div>
                                                @endif
                                                @if((isset($data->useCase->description_label) && $data->useCase->description_label!='') || $data->type=='code')
                                                <!-- description -->
                                                <div class="col-12">
                                                    <!-- description  -->
                                                    <div class="form-group">
                                                        <label for="description" class="form-label">{{$data->useCase->description_label??'Instructions'}}</label>
                                                        <textarea class="form-control custom-input" id="description" autocomplete="off" name="description"
                                                            placeholder="Description" rows="6">@purify($data->description)</textarea>
                                                    </div>
                                                </div>
                                                @endif

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
                                    <textarea id="summernote" name="generated_content">{!! htmlspecialchars($data->generated_content) !!}</textarea>
                                </div>

                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

