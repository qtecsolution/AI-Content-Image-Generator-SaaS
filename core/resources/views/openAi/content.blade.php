@extends('layouts.app')
@section('title', 'AI Content Generate')
@section('breadcrumb')
    <li class="breadcrumb-item active">AI Content Generate</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <section class="my-projects">
            <div class="my-projects-header border-bottom">
                <h4 class="header-title">AI Content Generate</h4>
            </div>
            <div class="my-projects-body">
                <div class="row">

                    <!-- create post column -->
                    <div class="col-lg-5 mt-3">

                        <div class="create-post">
                            <form action="" id="input-form"
                                class="createpost-form  needs-validation  h-100 flex-column  justify-content-between">

                                <div class="form-content">
                                    <div class="row g-4 mb-3">

                                        <!-- Type    -->
                                        <div class="col-7">
                                            <div class="form-group">
                                                <label for="case" class="form-label">Choose Use Case</label>
                                                {{ Form::select('case', $cases, $request->case ?? '', ['class' => 'w-100 nice-select', 'required', 'id' => 'useCase']) }}
                                            </div>
                                        </div>
                                        <!-- select tone  -->
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="language" class="form-label">Select Language</label>
                                                {{ Form::select('language', $languages, 'English (USA)', ['class' => 'w-100 nice-select', 'required', 'id' => 'language']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <!-- Title    -->
                                        <div class="col-12" id="title-field"
                                            @if (!in_array(1, $inputFields)) style="display: none" @endif>
                                            <div class="form-group">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" class="form-control custom-input" id="title"
                                                    autocomplete="off" name="title" placeholder="Write here...">
                                                <div class="valid-feedback">
                                                    Awesome! You're one step closer to greatness.
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please enter a title
                                                </div>
                                            </div>
                                        </div>

                                        <!-- keywords -->
                                        <div class="col-12" id="keywords-field"
                                            @if (!in_array(2, $inputFields)) style="display: none" @endif>
                                            <div class="form-group">
                                                <label for="keywords" class="form-label">Keywords</label>
                                                <input type="text" class="form-control custom-input" id="keywords"
                                                    autocomplete="off" name="keywords" placeholder="Enter your keywords">
                                            </div>
                                        </div>

                                        <!-- description -->
                                        <div class="col-12 mb-2" id="description-field"
                                            @if (!in_array(3, $inputFields)) style="display: none" @endif>
                                            <div class="form-group">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control custom-input" id="description" autocomplete="off" name="description"
                                                    placeholder="Description" rows="6"></textarea>
                                                <small class="text-mute"> Should describe your need for better result.
                                                </small>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row g-4">
                                        <div class="col-6 mt-4" id="selectPriority">
                                            <div class="form-group">
                                                <label for="priority" class="form-label">Creativity <i
                                                        class="fa fa-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-title="Select creativity level to get various results"></i>
                                                </label>
                                                <select class="nice-select w-100" name="priority" id="temp">
                                                    <option value="0">Low</option>
                                                    <option value="0.7" selected>Average</option>
                                                    <option value="1">High </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="priority" class="form-label">Tone of voice <i
                                                        class="fa fa-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-title="Set result tone of the text as needed."></i> </label>
                                                <select id="tone" name="tone" class="nice-select w-100">
                                                    <option value="funny">Funny</option>
                                                    <option value="casual" selected=""> Casual</option>
                                                    <option value="excited"> Excited</option>
                                                    <option value="professional"> Professional</option>
                                                    <option value="witty"> Witty</option>
                                                    <option value="sarcastic"> Sarcastic</option>
                                                    <option value="feminine"> Feminine</option>
                                                    <option value="masculine"> Masculine</option>
                                                    <option value="bold"> Bold</option>
                                                    <option value="dramatic"> Dramatic</option>
                                                    <option value="gumpy"> Gumpy</option>
                                                    <option value="secretive"> Secretive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div class="form-group mt-3">
                                                <label for="quantity" class="form-label">Number of results <i
                                                        class="fa fa-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-title="How many results you want to see?"></i> </label>
                                                <select id="quantity" name="quantity" class="nice-select w-100">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mt-3">
                                                <label for="max_words" class="form-label">Maximum Results Length <i
                                                        class="fa fa-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        data-bs-title="Maximum words can generate."></i> </label>
                                                        <input type="number" class="form-control custom-input" id="max_words"
                                                        autocomplete="off" name="max_words" placeholder="Max Length" min="5" max="500" value="200">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="generate-btn-wrapper">
                                    <span id="content-generate-preloader" style="display: none" class="lh-50 me-2"> <i
                                            class="fa fa-circle-o-notch fa-spin fs-4" aria-hidden="true"></i> </span>
                                    <button type="submit" class="generate-btn">Generate post</button>
                                </div>


                            </form>
                        </div>



                    </div>

                    <!-- editor column -->
                    <div class="col-lg-7 border-start mt-0">
                        <form method="post" action="{{ route('contents.store') }}" id="save-form">
                            @csrf
                            <input type="hidden" name="title" id="save-title">
                            <input type="hidden" name="keywords" id="save-keywords">
                            <input type="hidden" name="use_case_id" id="save-case">
                            <input type="hidden" name="description" id="save-description">
                            <textarea id="summernote" name="generated_content"></textarea>
                        </form>

                         <!-- coutn -->
                <div id="content-control" class="count" style="display: none">
                    <div class="left">
                        <span class="words"> <span id="words-count"> 0 </span> Words</span>
                        <span class="charecters"> <span id="charecters-count"> 0 </span> Characters</span>
                    </div>

                    <div class="right">
                        <button type="button" onclick="regenerate()" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Regenerate content">
                            
                            <span>
                            <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.20833 1.04175L10.375 3.20841M10.375 3.20841L8.20833 5.37508M10.375 3.20841H2.79167C2.21703 3.20841 1.66593 3.43669 1.2596 3.84302C0.853273 4.24935 0.625 4.80045 0.625 5.37508V6.45841M2.79167 12.9584L0.625 10.7917M0.625 10.7917L2.79167 8.62508M0.625 10.7917H8.20833C8.78297 10.7917 9.33407 10.5635 9.7404 10.1571C10.1467 9.75082 10.375 9.19972 10.375 8.62508V7.54175" stroke="#1D2939" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                            </span>
                            <span>Regenerate</span>
                        </button>
                        <button type="button" class="copy-button" onclick="copyText()" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Copy to clipboard">
                          <span>
                          <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.70825 7.62492H2.16659C1.87927 7.62492 1.60372 7.51078 1.40055 7.30762C1.19739 7.10445 1.08325 6.8289 1.08325 6.54159V1.66659C1.08325 1.37927 1.19739 1.10372 1.40055 0.900553C1.60372 0.697388 1.87927 0.583252 2.16659 0.583252H7.04159C7.3289 0.583252 7.60445 0.697388 7.80762 0.900553C8.01078 1.10372 8.12492 1.37927 8.12492 1.66659V2.20825M5.95825 4.37492H10.8333C11.4316 4.37492 11.9166 4.85994 11.9166 5.45825V10.3333C11.9166 10.9316 11.4316 11.4166 10.8333 11.4166H5.95825C5.35994 11.4166 4.87492 10.9316 4.87492 10.3333V5.45825C4.87492 4.85994 5.35994 4.37492 5.95825 4.37492Z" stroke="#1D2939" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                          </span>

                            <span>copy</span>
                        </button>
                        <button type="button" onclick="contentSave()" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Save content">
                        <span>
                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.04175 0.583252H2.25008C1.96276 0.583252 1.68721 0.697388 1.48405 0.900553C1.28088 1.10372 1.16675 1.37927 1.16675 1.66659V10.3333C1.16675 10.6206 1.28088 10.8961 1.48405 11.0993C1.68721 11.3024 1.96276 11.4166 2.25008 11.4166H8.75008C9.0374 11.4166 9.31295 11.3024 9.51611 11.0993C9.71928 10.8961 9.83341 10.6206 9.83341 10.3333V4.37492M6.04175 0.583252L9.83341 4.37492M6.04175 0.583252V4.37492H9.83341" stroke="#1D2939" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            </span>
                            <span>save</span>
                        </button>
                    </div>
                </div>
                

                    </div>

                </div>

               
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $('#useCase').change(function() {
            let id = $(this).val();
            $.get("{{ route('use-case.input-fields') }}?id=" + id, function(result) {
                $('#title-field').hide();
                $('#keywords-field').hide();
                $('#description-field').hide();
                if (result.includes("1")) {
                    $('#title-field').show();
                }
                if (result.includes("2")) {
                    $('#keywords-field').show();
                }
                if (result.includes("3")) {
                    $('#description-field').show();
                }
            })
        })

        function contentSave() {
            let title = $('#title').val();
            let keywords = $('#keywords').val();
            let description = $('#description').val();
            let useCaseVal = $('#useCase option:selected').val();
            $('#save-title').val(title);
            $('#save-keywords').val(keywords);
            $('#save-description').val(description);
            $('#save-case').val(useCaseVal);
            $('form#save-form').submit();
        }
        $(document).ready(function() {
            // Submit form
            $("form#input-form").submit(function(event) {
                event.preventDefault();
                contentGenerate()
            });
        });

        function contentGenerate() {
            let title = $('#title').val();
            let keywords = $('#keywords').val();
            let description = $('#description').val();
            let useCaseVal = $('#useCase option:selected').val();
            let temp = $('#temp option:selected').val();
            let language = $('#language option:selected').val();
            let tone = $('#tone option:selected').val();
            let quantity = $('#quantity option:selected').val();
            let maxWords = $('#max_words').val();

            $('#content-generate-preloader').show();

            $.ajax({
                type: 'POST',
                url: "{{ route('content.generate') }}",
                data: {
                    title,
                    keywords,
                    description,
                    temp,
                    use_case: useCaseVal,
                    language,
                    tone,
                    quantity,
                    max_words:maxWords
                },
                success: function(data) {
                    $('#summernote').summernote('code', data.content);
                    $('#content-generate-preloader').hide();
                    $('#words-count').html(data.words);
                    $('#charecters-count').html(data.characters);
                    $('#content-control').show();
                    $('.content-regenerate').show();
                    $('.content-generate-preloader').hide();
                    console.log(data);
                },
                error: function(msg) {
                    $('#content-generate-preloader').hide();
                    $('#content-control').hide();
                    console.log(msg);
                    var errors = msg.responseJSON;
                    console.log(errors)
                }
            });
        }

        // Regenerate content
        function regenerate() {

            let title = $('#title').val();
            if (title != '') {
                $('.content-regenerate').hide();
                $('.content-generate-preloader').show();
                $("form#input-form").submit();
            }
        }
        // Document Copy
        function copyText() {
            // Copy content to clipboard
            var textToCopy = $('#summernote').summernote('code');
            textToCopy = textToCopy.replace("<!-- default value -->", "");
            var $temp = $('<input>');
            $('body').append($temp);
            $temp.val(textToCopy).select();
            document.execCommand('copy');
            $temp.remove();

            // Change copy button tooltip
            $('.copy-button').attr('data-bs-original-title', 'Content Copied!');
            $('.copy-button').tooltip('show');
            setTimeout(function() {
                $('.copy-button').attr('data-bs-original-title', 'Copy to clipboard');
                $('.copy-button').tooltip('hide');
            }, 1000);
        }



        // Summernote (Texteditor) Script
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'list']],
                    ['color', ['forecolor']],
                    ['height', ['height']]
                ],
                colorNames: {
                    'red': '#ff0000',
                    'green': '#00ff00',
                    'blue': '#0000ff'
                }
            });

            // these code for fixing some style in editor 
            var styleEle = $("style#fixed");
            if (styleEle.length == 0)
                $(
                    "<style id=\"fixed\">.note-editor .dropdown-toggle::after { all: unset; } .note-editor .note-dropdown-menu { box-sizing: content-box; } .note-editor .note-modal-footer { box-sizing: content-box; }</style>"
                )
                .prependTo("body");
        })
    </script>
@endsection
