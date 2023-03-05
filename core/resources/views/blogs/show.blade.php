@extends('layouts.app')
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
                            <a href="{{ route('manage-blogs.index') }}" class="btn btn-light btn-xs"> <i
                                    class="fa fa-list"></i> View All </a>
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <div class="row g-4">
                            <div class="col-8">
                                <div class="row mb-3">
                                    <label class="col-md-12"><b> Title: </b> </label>
                                    <div class="col-md-12">
                                        {{ $data->title }}
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-12"><b> Description: </b> </label>
                                    <div class="col-md-12">
                                        @php echo $data->description @endphp
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 border-start">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <a class="btn btn-light btn-sm pull-right" href="{{route('manage-blogs.edit',$data->id)}}"> <i class="fa fa-edit"></i> Edit </a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-12"><b> Image: </b> </label>
                                    <div class="col-md-12">
                                        @if ($data->image != '' && file_exists($data->image))
                                            <img src="{{ asset($data->image) }}" style="max-width:200px">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-12"><b> Category: </b> {{ $data->category->name??'' }} </label>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-12"><b> Tags: </b> </label>
                                    <div class="col-md-12">
                                        {{ $data->tags }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-12"><b> Meta Description: </b> </label>
                                    <div class="col-md-12">
                                        {{ $data->meta_description }}
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-12"><b> Status: </b> 
                                    @if ($data->is_published == 1)
                                        <span class="text-success">Published</span>
                                    @else
                                        <span class="form-text">Draft</span>
                                    @endif 
                                </label>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
