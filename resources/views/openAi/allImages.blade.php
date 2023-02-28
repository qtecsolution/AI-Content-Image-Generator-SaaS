@extends('layouts.app')

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <section class="my-projects">

            <div class="my-projects-header border-bottom">
                <h4 class="header-title">All Generated Images</h4>
                <div class="project-button pull-right">
                    <a href="{{ route('image.create') }}" class="btn btn-light btn-xs"> <i class="fa fa-plus-circle"></i> New
                    </a>
                </div>
            </div>
            <div class="my-projects-body">
                <form action="">
                    <div class="searchbox mb-3 custom">
                        <span class="search-icon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="q" value="{{ $request->q ?? '' }}" id="searchINputField">

                        <div class="right-text">
                            <button class="btn btn-secondary btn-sm"> <i class="fa fa-search"></i> </button>
                            <a href="{{ route('image.all') }}" class="btn btn-light btn-sm"> <i class="fa fa-refresh"></i>
                            </a>
                        </div>
                    </div>
                </form>
                <div class="row g-2">
                    @foreach ($images as $image)
                        <div class="col-3">
                            <div class="card">
                                <img src="{{ asset($image->image_path) }}" class="card-img-top p-1"
                                    alt="{{ $image->prompt }}">
                                <div class="card-body">
                                    <p class="card-text text-truncate">{{ $image->prompt }}</p>
                                </div>
                                <div class="card-body text-center">
                                    <a href="{{ asset($image->image_path) }}" title="Download Image"
                                        class="card-link btn btn-sm btn-light text-info" download> <i
                                            class="fa fa-lg fa-download"></i> </a>
                                    <a href="{{ route('image.regenerate',$image->id) }}" title="Regenerate Image"
                                                class="card-link btn btn-sm btn-light text-warning"> <i
                                                    class="fa fa-lg fa-refresh"></i> </a>
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
                <div class="row g-2">
                    <div class="col mt-3">
                        {{ $images->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
