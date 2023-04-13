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
                        <div class="project-button pull-right">

                            <a href="{{ route('use-case.index') }}"class="seeall-btn d-flex">
                                <span class="icon">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.33301 4H13.9997" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5.33301 8H13.9997" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5.33301 12H13.9997" stroke="#1D2939" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M2 4H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M2 8H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                        <path d="M2 12H2.00667" stroke="#1D2939" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                <span class="mt-1">View All</span>
                            </a>
                        </div>
                    </div>
                    <div class="my-projects-body">
                        <div class="row">
                            <form method="post" class="p-2 " action="{{ route('use-case.store') }}" id="save-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5" id="useCaseForm">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="title" class="form-label title-style">Category</label>
                                                    {!! Form::select('use_case_category_id', $category, '', [
                                                        'class' => 'form-control w-100 nice-select',
                                                        'placeholder' => '-select category-',
                                                        'required',
                                                    ]) !!}
                                                    @error('use_case_category_id')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="title" class="form-label title-style">Use Case
                                                        Title</label>
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
                                                    <label for="details" class="form-label"> Input Fields Label and Placeholder:</label>
                                                    <div class="row fz-14 border-bottom py-2 my-2">
                                                        <div class="checkWithLable mb-2 col-md-12">
                                                            <input type="checkbox" id="useCaseTitle"
                                                                class="checkWithLable-box input-check-box"
                                                                name="input_fields[]" value="1" checked hidden>
                                                            <label for="useCaseTitle" class="checkWithLable-label">Title (Label &amp; Placeholder) :</label>
                                                        </div>
                                                        <div class="input-box col-md-6 col-sm-12">
                                                            <input class="form-control" name="title_label" value="Title">
                                                                @error('title_label')
                                                                    <div class="text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                        </div>
                                                        <div class="input-box col-md-6 col-sm-12">
                                                            <input class="form-control" name="title_placeholder" value="Write here" placeholder="Placeholder">
                                                                @error('title_placeholder')
                                                                    <div class="text-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                        </div>
                                                    </div>
                                                    <div class="fz-14 row border-bottom py-2 my-2">
                                                        <div class="checkWithLable mb-2 col-md-12">
                                                            <input type="checkbox" id="useCaseShort"
                                                                class="checkWithLable-box input-check-box"
                                                                name="input_fields[]" value="2" hidden>
                                                            <label for="useCaseShort" class="checkWithLable-label">Short Description <i
                                                                class="fa fa-info-circle" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                data-bs-title="Use this input field with dynamic label and placeholder"></i> : </label>
                                                        </div>
                                                        <div class="input-box col-md-6">
                                                            <input class="form-control" name="short_description_label" value="Short Description">
                                                            @error('short_description_label')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="input-box col-md-6">
                                                            <input class="form-control" name="short_description_placeholder" value="Write short description here">
                                                            @error('short_description_placeholder')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="fz-14 row border-bottom py-2 my-2">
                                                        <div class="checkWithLable mb-2 col-md-12">
                                                            <input type="checkbox" id="useCaseDescription"
                                                                class="checkWithLable-box input-check-box"
                                                                name="input_fields[]" value="3" checked hidden>
                                                            <label for="useCaseDescription" class="checkWithLable-label">Description (Label &amp; Placeholder):</label>
                                                        </div>
                                                        <div class="input-box col-md-6">
                                                            <input class="form-control" name="description_label" value="Description">
                                                            @error('description_label')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="input-box col-md-6">
                                                            <input class="form-control" name="description_placeholder" value="Write description here">
                                                            @error('description_placeholder')
                                                                <div class="text-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    @error('input_fields')
                                                        <div class="text-danger">
                                                            At least select one input field!
                                                        </div>
                                                    @enderror
                                                    <div id="input_fields_check" class="text-danger"
                                                        style="display: none">
                                                        At least select one input field!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-7 border-start">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="promt-body" class="form-label">Open AI Request Prompt
                                                    </label>
                                                    <textarea class="form-control custom-input resize-vertical @error('prompt') is-invalid @enderror" id="promt-body" autocomplete="off"
                                                        name="prompt" placeholder="Prompt" rows="6">{{ old('prompt') ?? 'Write me content with this title "[title]" and the description: [description]' }}</textarea>
                                                    <div class="valid-feedback">
                                                        Awesome! You're one step closer to greatness.
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please enter your prompt
                                                    </div>
                                                    <div class="col-md-12 mt-2 fz-12">
                                                        <span class="placeholder-text" data="promt-body">[title]</span>
                                                        <span class="placeholder-text" data="promt-body">[short_description]</span>
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
                                                    <span class="text-danger" id="fileNotSupported"
                                                        style="display: none"> File
                                                        not
                                                        supported!</span>
                                                    <div class="valid-feedback">
                                                        Awesome! You're one step closer to greatness.
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please enter a title
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <div class="form-group">
                                                    <label for="is_published" class="form-label"> Popularity : </label>
                                                    {!! Form::select('is_popular', [1 => 'Popular', 0 => 'Normal'], '1', ['class' => 'nice-select w-100']) !!}
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <div class="form-group">
                                                    <label for="is_published" class="form-label"> Status : </label>
                                                    {!! Form::select('is_published', [1 => 'Active', 0 => 'Inactive'], '1', ['class' => 'nice-select w-100']) !!}
                                                </div>
                                            </div>
                                            <div class="generate-btn-wrapper">
                                                <button type="submit" class="generate-btn px-4">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
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
