@extends('layouts.app')
@section('title', 'Use Case')
@section('breadcrumb')
    <li class="breadcrumb-item active">Use Case</li>
@endsection

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">Manage Use Case</h4>
                    </div>
                    <div class="my-projects-body">
                        <div class="row">
                            <div class="col-md-5" id="useCaseForm">
                                <form method="post" class="p-2 " action="{{ route('use-case.store') }}" id="save-form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <div class="form-group">
                                                <label for="title" class="form-label title-style">Category</label>
                                                {!! Form::select('use_case_category_id', $category, '', [
                                                    'class' => 'form-control w-100 nice-select',
                                                    'placeholder' => '-select category-',
                                                    'required',
                                                ]) !!}
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="form-group">
                                                <label for="title" class="form-label title-style">Use Case Title</label>
                                                <input type="text"
                                                    class="form-control custom-input @error('title') is-invalid @enderror"
                                                    id="title" required autocomplete="off" name="title"
                                                    placeholder="Enter use case title here" value="{{ old('title') }}">
                                            </div>
                                        </div>

                                        <!-- description -->
                                        <div class="col-12 mb-3">
                                            <div class="form-group">
                                                <label for="details" class="form-label">Use Case Details </label>
                                                <textarea class="form-control custom-input @error('details') is-invalid @enderror" id="details" autocomplete="off"
                                                    name="details" placeholder="Describe here" rows="4">{{ old('details') }}</textarea>
                                                <div class="valid-feedback">
                                                    Awesome! You're one step closer to greatness.
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your description
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Input Fields  -->
                                        <div class="col-12 mb-3">
                                            <div class="form-group">
                                                <label for="details" class="form-label"> Input Fields</label>
                                                <div class="fz-14 d-flex gap-3">
                                                    <div class="checkWithLable mb-2">
                                                        <input type="checkbox" id="useCaseTitle"
                                                            class="checkWithLable-box input-check-box" name="input_fields[]"
                                                            value="1" checked hidden>
                                                        <label for="useCaseTitle" class="checkWithLable-label">Title
                                                        </label>
                                                    </div>
                                                    <div class="checkWithLable mb-2">
                                                        <input type="checkbox" id="useCaseKeywords"
                                                            class="checkWithLable-box input-check-box" name="input_fields[]"
                                                            value="2" checked hidden>
                                                        <label for="useCaseKeywords" class="checkWithLable-label">Keywords
                                                        </label>
                                                    </div>
                                                    <div class="checkWithLable mb-2">
                                                        <input type="checkbox" id="useCaseDescription"
                                                            class="checkWithLable-box input-check-box" name="input_fields[]"
                                                            value="3" checked hidden>
                                                        <label for="useCaseDescription" class="checkWithLable-label">
                                                            Description </label>
                                                    </div>
                                                </div>
                                                @error('input_fields')
                                                    <div class="text-danger">
                                                        At least select one input field!
                                                    </div>
                                                @enderror
                                                <div id="input_fields_check" class="text-danger" style="display: none">
                                                    At least select one input field!
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Promt -->
                                        <div class="col-12 mb-3">
                                            <div class="form-group">
                                                <label for="promt-body" class="form-label">Open AI Request Prompt </label>
                                                <textarea class="form-control custom-input @error('prompt') is-invalid @enderror" id="promt-body" autocomplete="off"
                                                    name="prompt" placeholder="Prompt" rows="6">{{ old('prompt') ?? 'Write me content with this keywords: [keywords]. The title is "[title]" and the description: [description]' }}</textarea>
                                                <div class="valid-feedback">
                                                    Awesome! You're one step closer to greatness.
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter your prompt
                                                </div>
                                                <div class="col-md-12 mt-2 fz-12">
                                                    <span class="placeholder-text" data="promt-body">[keywords]</span>
                                                    <span class="placeholder-text" data="promt-body">[title]</span>
                                                    <span class="placeholder-text" data="promt-body">[description]</span>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="form-group">
                                                <label for="icon" class="form-label">Icon</label>
                                                <input type="file"
                                                    class=" form-control fz-14  @error('icon') is-invalid @enderror"
                                                    id="icon" required autocomplete="off" name="icon"
                                                    onchange="imageCheck(this)">
                                                <span class="text-danger" id="fileNotSupported" style="display: none">
                                                    File not
                                                    supported!</span>
                                                <div class="valid-feedback">
                                                    Awesome! You're one step closer to greatness.
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter a title
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="generate-btn-wrapper">
                                        <button type="submit" class="generate-btn px-4">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7 border-start">
                                <div class="project-table-wrapper  p-3 no-default-search">

                                    <table id="datatables" class="project-table table">
                                        <thead>
                                            <tr>
                                                <td> Icon</td>
                                                <td>Name</td>
                                                <td> Details </td>
                                                <td>Last Modified</td>
                                                <td> Action </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $data)
                                                <tr title="Prompt: {{ $data->prompt }}">
                                                    <td>
                                                        @if ($data->icon != '' && file_exists($data->icon))
                                                            <img src="{{ asset($data->icon) }}" alt="Icon"
                                                                style="max-height:30px">
                                                        @endif
                                                    </td>
                                                    <td>{{ $data->title }}</td>
                                                    <td> {{ $data->details }} </td>
                                                    <td> {{ $data->updated_at }} </td>
                                                    <td>
                                                        <div class="action-wrapper">
                                                            <a class="text-danger" title="Delete Data"
                                                                href="javascript:void(0)" type="button"
                                                                onclick='resourceDelete("{{ route('use-case.destroy', $data->id) }}")'>
                                                                <span>
                                                                    <svg width="18" height="19"
                                                                        viewBox="0 0 18 19" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M1.5 4.49996H3.16667M3.16667 4.49996H16.5M3.16667 4.49996V16.1666C3.16667 16.6087 3.34226 17.0326 3.65482 17.3451C3.96738 17.6577 4.39131 17.8333 4.83333 17.8333H13.1667C13.6087 17.8333 14.0326 17.6577 14.3452 17.3451C14.6577 17.0326 14.8333 16.6087 14.8333 16.1666V4.49996H3.16667ZM5.66667 4.49996V2.83329C5.66667 2.39127 5.84226 1.96734 6.15482 1.65478C6.46738 1.34222 6.89131 1.16663 7.33333 1.16663H10.6667C11.1087 1.16663 11.5326 1.34222 11.8452 1.65478C12.1577 1.96734 12.3333 2.39127 12.3333 2.83329V4.49996M7.33333 8.66663V13.6666M10.6667 8.66663V13.6666"
                                                                            stroke="#667085" stroke-width="1.66667"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </svg>

                                                                </span>
                                                            </a>
                                                            <a title="Edit Data" class="text-success"
                                                                href="javascript:void(0)"
                                                                onclick='updateForm("{{ route('use-case.edit', $data->id) }}")'>
                                                                <span>
                                                                    <svg width="20" height="21"
                                                                        viewBox="0 0 20 21" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M10 17.1667H17.5M13.75 3.41669C14.0815 3.08517 14.5312 2.89893 15 2.89893C15.2321 2.89893 15.462 2.94465 15.6765 3.03349C15.891 3.12233 16.0858 3.25254 16.25 3.41669C16.4142 3.58085 16.5444 3.77572 16.6332 3.9902C16.722 4.20467 16.7678 4.43455 16.7678 4.66669C16.7678 4.89884 16.722 5.12871 16.6332 5.34319C16.5444 5.55766 16.4142 5.75254 16.25 5.91669L5.83333 16.3334L2.5 17.1667L3.33333 13.8334L13.75 3.41669Z"
                                                                            stroke="#667085" stroke-width="1.66667"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
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

        $(document).ready(function() {
            // Create use case
            $(document).on("submit", "#save-form", function() {
                let fieldsChecked = $('.input-check-box:checked').length;
                if (fieldsChecked == 0) {
                    event.preventDefault();
                    $('#input_fields_check').show();
                }
                let inputFile = $('#icon');
                if (inputFile.prop('files').length > 0) {
                    let file = inputFile.prop('files')[0];
                    if (file.type.match('image.*')) {
                        $('#fileNotSupported').hide();
                        $(this).submit();
                    } else {
                        $('#fileNotSupported').show();
                        event.preventDefault();
                    }
                }

            })
            $(document).on("click", ".placeholder-text", function() {
                let plcr = $(this).html();
                let area = $(this).attr('data');
                insertAtCaret(area, plcr)
            })
        })

        function insertAtCaret(areaId, text) {
            let txtarea = document.getElementById(areaId);
            if (!txtarea) {
                return;
            }

            let scrollPos = txtarea.scrollTop;
            let strPos = 0;
            let br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
                "ff" : (document.selection ? "ie" : false));
            if (br == "ie") {
                txtarea.focus();
                let range = document.selection.createRange();
                range.moveStart('character', -txtarea.value.length);
                strPos = range.text.length;
            } else if (br == "ff") {
                strPos = txtarea.selectionStart;
            }

            let front = (txtarea.value).substring(0, strPos);
            let back = (txtarea.value).substring(strPos, txtarea.value.length);
            txtarea.value = front + text + back;
            strPos = strPos + text.length;
            if (br == "ie") {
                txtarea.focus();
                let ieRange = document.selection.createRange();
                ieRange.moveStart('character', -txtarea.value.length);
                ieRange.moveStart('character', strPos);
                ieRange.moveEnd('character', 0);
                ieRange.select();
            } else if (br == "ff") {
                txtarea.selectionStart = strPos;
                txtarea.selectionEnd = strPos;
                txtarea.focus();
            }

            txtarea.scrollTop = scrollPos;
        }

        function imageCheck(thisData) {

            let file = thisData.files[0];
            if (file.type.match('image.*')) {
                $('#fileNotSupported').hide();
            } else {
                $('#fileNotSupported').show();
            }
        }
    </script>
@endsection
