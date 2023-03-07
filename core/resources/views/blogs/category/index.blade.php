@extends('layouts.app')
@section('title','Blog Category')
@section('breadcrumb')
    <li class="breadcrumb-item active">Blog Category</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">Blog Category</h4>
                    </div>
                    <div class="my-projects-body">
                        <div class="row">
                            <div class="col-md-5" id="useCaseForm">
                                <form method="post" class="p-2 border-lite bg-light"
                                    action="{{ route('blog-category.store') }}" id="save-form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name : </label>
                                            <input type="text"
                                                class="form-control custom-input @error('name') is-invalid @enderror"
                                                id="name" required autocomplete="off" name="name"
                                                placeholder="Category Name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="tags" class="form-label">Tags : </label>
                                            <input type="text"
                                                class="form-control custom-input @error('tags') is-invalid @enderror"
                                                id="tags" name="tags" placeholder="Tag separeted by comma"
                                                value="{{ old('tags') }}">
                                            <div class="form-text"> For seo (Optional) </div>
                                            <div class="invalid-feedback">
                                                Please enter some tags
                                            </div>
                                        </div>
                                    </div>

                                    <!-- description -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="meta_description" class="form-label"> Meta Description : </label>
                                            <textarea class="form-control custom-input @error('meta_description') is-invalid @enderror" id="meta_description"
                                                autocomplete="off" name="meta_description" placeholder="Meta Description" rows="4">{{ old('meta_description') }}</textarea>
                                            <div class="form-text"> For seo (Optional) </div>
                                            <div class="invalid-feedback">
                                                Please enter your description
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="is_published" class="form-label"> Status : </label>
                                            {!! Form::select('is_published', [1 => 'Active', 2 => 'Inactive'], '1', ['class' => 'nice-select']) !!}
                                        </div>
                                    </div>
                                    <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7">
                                <div class="project-table-wrapper  p-3 no-default-search">

                                    <table id="datatables" class="project-table table">
                                        <thead>
                                            <tr>
                                                <td> Name</td>
                                                <td>Slug</td>
                                                <td>Status</td>
                                                <td> Action </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $data)
                                                <tr>
                                                    <td>{{ $data->name }}</td>
                                                    <td> {{ $data->slug }} </td>
                                                    <td>
                                                        @if ($data->is_published == 1)
                                                            <span class="text-success">Active</span>
                                                        @else
                                                            <span class="text-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="action-wrapper">
                                                            <a title="Edit Data" class="text-success"
                                                                href="javascript:void(0)"
                                                                onclick='updateForm("{{ route('blog-category.edit', $data->id) }}")'>
                                                                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                                            </a>
                                                            <a class="text-danger" title="Delete Data"
                                                                href="javascript:void(0)" type="button"
                                                                onclick='resourceDelete("{{ route('blog-category.destroy', $data->id) }}")'>
                                                                <i class="fa fa-trash-o fa-lg"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <div class="row g-2">
                                    <div class="col mt-3">
                                        {{ $allData->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        // Update Use case
        function updateForm(url) {
            $('#useCaseForm').load(url);
        }
    </script>
@endsection
