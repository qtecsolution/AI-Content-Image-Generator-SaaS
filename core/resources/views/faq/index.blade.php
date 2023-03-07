@extends('layouts.app')
@section('title','Faq')
@section('breadcrumb')
    <li class="breadcrumb-item active">Faq</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">Faq</h4>
                    </div>
                    <div class="my-projects-body">
                        <div class="row">
                            <div class="col-md-5" id="useCaseForm">
                                <form method="post" class="p-2 border-lite bg-light"
                                    action="{{ route('manage-faq.store') }}" id="save-form">
                                    @csrf
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="question" class="form-label">Question : </label>
                                            <input type="text"
                                                class="form-control custom-input @error('question') is-invalid @enderror"
                                                id="question" required autocomplete="off" name="question"
                                                placeholder="Question ?" value="{{ old('question') }}">
                                            @error('question')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- description -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="answear" class="form-label"> Answear : </label>
                                            <textarea class="form-control custom-input @error('answear') is-invalid @enderror" id="answear"
                                                autocomplete="off" name="answear" placeholder="Answear" rows="8">{{ old('answear') }}</textarea>
                                                @error('answear')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="priority" class="form-label">Priority : </label>
                                            <input type="number" min="1"
                                                class="form-control custom-input @error('priority') is-invalid @enderror"
                                                id="priority" required autocomplete="off" name="priority"
                                                placeholder="Priority" value="{{ old('priority') ?? $maxPriority }}">
                                            @error('priority')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                                <td> SL</td>
                                                <td> Question</td>
                                                <td>Status</td>
                                                <td> Action </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $data)
                                                <tr>
                                                    <td>{{ $data->priority }}</td>
                                                    <td>{{ $data->question }}</td>
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
                                                                onclick='updateForm("{{ route('manage-faq.edit', $data->id) }}")'>
                                                                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                                            </a>
                                                            <a class="text-danger" title="Delete Data"
                                                                href="javascript:void(0)" type="button"
                                                                onclick='resourceDelete("{{ route('manage-faq.destroy', $data->id) }}")'>
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
