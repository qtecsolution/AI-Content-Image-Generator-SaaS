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
                                <form method="post" class="p-2"
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
                            <div class="col-md-7 border-start">
                                <div class="project-table-wrapper  p-3 no-default-search">

                                    <table id="datatables" class="project-table table">
                                        <thead>
                                            <tr>
                                                <td> SL</td>
                                                <td> Question</td>
                                                <td>Status</td>
                                                <td>  </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $data)
                                                <tr>
                                                    <td>{{ $data->priority }}</td>
                                                    <td>{{ $data->question }}</td>
                                                    <td>
                                                        @if ($data->is_published == 1)
                                                        <span class="active-pill py-1"> <span class="circle"></span> Active </span>
                                                        @else
                                                        <span class="inactive-pill py-1"> <span class="circle"></span> Inactive </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="action-wrapper">
                                                            <a data-bs-toggle="tooltip"
                                                             data-bs-placement="top" data-bs-title="Edit Faq"
                                                                href="javascript:void(0)"
                                                                onclick='updateForm("{{ route('manage-faq.edit', $data->id) }}")'>
                                                                <span>
                                                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M9 15.1667H16.5M12.75 1.41669C13.0815 1.08517 13.5312 0.898926 14 0.898926C14.2321 0.898926 14.462 0.94465 14.6765 1.03349C14.891 1.12233 15.0858 1.25254 15.25 1.41669C15.4142 1.58085 15.5444 1.77572 15.6332 1.9902C15.722 2.20467 15.7678 2.43455 15.7678 2.66669C15.7678 2.89884 15.722 3.12871 15.6332 3.34319C15.5444 3.55766 15.4142 3.75254 15.25 3.91669L4.83333 14.3334L1.5 15.1667L2.33333 11.8334L12.75 1.41669Z" stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        </svg>

                                                                </span>
                                                            </a>
                                                            <a  data-bs-toggle="tooltip"
                                                             data-bs-placement="top" data-bs-title="Delete Faq"
                                                                href="javascript:void(0)" type="button"
                                                                onclick='resourceDelete("{{ route('manage-faq.destroy', $data->id) }}")'>
                                                                <span class="delete-icon">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M2.5 5H4.16667H17.5" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M15.8337 4.99996V16.6666C15.8337 17.1087 15.6581 17.5326 15.3455 17.8451C15.0329 18.1577 14.609 18.3333 14.167 18.3333H5.83366C5.39163 18.3333 4.96771 18.1577 4.65515 17.8451C4.34259 17.5326 4.16699 17.1087 4.16699 16.6666V4.99996M6.66699 4.99996V3.33329C6.66699 2.89127 6.84259 2.46734 7.15515 2.15478C7.46771 1.84222 7.89163 1.66663 8.33366 1.66663H11.667C12.109 1.66663 12.5329 1.84222 12.8455 2.15478C13.1581 2.46734 13.3337 2.89127 13.3337 3.33329V4.99996" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M8.33301 9.16663V14.1666" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M11.667 9.16663V14.1666" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>

                                                             </span>
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
                                        {{ $allData->links('vendor.pagination.default') }}
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
