@extends('layouts.app')
@section('title', 'AI Code Generator')
@section('breadcrumb')
    <li class="breadcrumb-item active">AI Code Generator</li>
@endsection
@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <section class="my-projects">
            <div class="my-projects-header border-bottom">
                <h4 class="header-title">AI Code Generator</h4>
            </div>
            <div class="my-projects-body">
                <div class="row">

                    <!-- create post column -->
                    <div class="col-lg-5 mt-3">

                        <div class="create-post">
                            <form action="{{route('code.generate')}}" id="input-form"
                                class="createpost-form  needs-validati  h-100 flex-column  justify-content-between" method="post">
                                @csrf                                
                                <div class="form-content">
                                    <div class="row g-4 mb-3">
                                        <!-- description -->
                                        <div class="col-12 mb-2" id="description-field">
                                            <div class="form-group">
                                                <label for="description" class="form-label">Instructions</label>
                                                <textarea class="form-control custom-input" id="description" autocomplete="off" name="description"
                                                    placeholder="Ex: Create a php code for get session." rows="6"></textarea>
                                                <small class="text-mute"> Should describe your need for better result.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="text-danger" id="openai-error" style="display: none">
                                        <small> Don't worry, you can contact with admin. </small>
                                        <br>
                                         <small> <b>Open AI Error:</b>  <span></span> </small>
                                    </p>
                                </div>
                                <div class="generate-btn-wrapper">
                                    <span id="content-generate-preloader" style="display: none" class="lh-50 me-2"> <i
                                            class="fa fa-circle-o-notch fa-spin fs-4" aria-hidden="true"></i> </span>
                                    <button type="submit" class="generate-btn">Generate</button>
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
        function contentSave() {
            let description = $('#description').val();
            $('#save-title').val( description.slice(0, 200));
            $('#save-description').val(description);
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
            $('#openai-error').hide();
            let description = $('#description').val();

            $('#content-generate-preloader').show();

            $.ajax({
                type: 'POST',
                url: "{{ route('code.generate') }}",
                data: {
                    description,
                },
                success: function(data) {
                    let formatted_text=nl2br(data.content);
                    $('#summernote').summernote('code', formatted_text);
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
                    var errors = msg.responseJSON;
                    $('#openai-error').show();
                    $('#openai-error span').html(errors?.error);
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
        function nl2br (str, is_xhtml) {
            var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
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
