@extends('layouts.app')

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <!-- create post column -->
            <div class="col-lg-5 mt-0">

                <div class="create-post">
                    <form action="" id="input-form"
                        class="createpost-form  needs-validation  h-100 flex-column  justify-content-between">

                        <div class="form-content">
                            <h3 class="create-post-header">Content Generate</h3>

                            <div class="row g-4 mb-3">

                                <!-- Type    -->
                                <div class="col-7">
                                    <div class="form-group">
                                        <label for="case" class="form-label">Choose Use Case</label>
                                        {{ Form::select('case', $cases, $request->case ?? '', ['class' => 'w-100 nice-select', 'required', 'id' => 'useCase']) }}
                                    </div>
                                </div>
                                <!-- select tone  -->
                                <div class="col-5" id="selectPriority">
                                    <div class="form-group">
                                        <label for="priority" class="form-label">Select Tone</label>
                                        <select class="nice-select w-100" name="priority" id="temp">
                                            <option value="0">Funny</option>
                                            <option value="0.7" selected>Serious</option>
                                            <option value="0.9">Formal</option>
                                            <option value="1">Respectful </option>
                                        </select>
                                        <div class="valid-feedback">
                                            Awesome! You're one step closer to greatness.
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter keywords
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4">
                                <!-- Title    -->
                                <div class="col-12" id="title-field" @if(!in_array(1,$inputFields)) style="display: none" @endif>
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
                                <div class="col-12" id="keywords-field" @if(!in_array(2,$inputFields)) style="display: none" @endif>
                                    <div class="form-group">
                                        <label for="keywords" class="form-label">Keywords</label>
                                        <input type="text" class="form-control custom-input" id="keywords"
                                            autocomplete="off" name="keywords" placeholder="Enter your keywords">
                                        <div class="valid-feedback">
                                            Awesome! You're one step closer to greatness.
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter keywords
                                        </div>
                                    </div>
                                </div>

                                <!-- description -->
                                <div class="col-12" id="description-field" @if(!in_array(3,$inputFields)) style="display: none" @endif>
                                    <div class="form-group">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control custom-input" id="description" autocomplete="off" name="description"
                                            placeholder="Description" rows="6"></textarea>
                                        <small class="text-mute"> Should describe your need for better result. </small>
                                        <div class="valid-feedback">
                                            Awesome! You're one step closer to greatness.
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter your description
                                        </div>
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

            </div>

        </div>

        <!-- coutn -->
        <div id="content-control" class="count sticky-bottom" style="display: none">
            <div class="left">
                <span class="words"> <span id="words-count"> 0 </span> Words</span>
                <span class="charecters"> <span id="charecters-count"> 0 </span> Characters</span>
            </div>

            <div class="right">
                <button type="button" onclick="regenerate()">
                    <i class="fa fa-refresh fa-spin content-generate-preloader" style="display: none"></i>
                    <i class="fa fa-random content-regenerate" aria-hidden="true"></i>
                    <span>Regenerate</span>
                </button>
                <button type="button" class="copy-button" onclick="copyText()" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Copy to clipboard">
                    <i class="fa fa-copy"></i>
                    <span>copy</span>
                </button>
                <button type="button" onclick="contentSave()">
                    <i class="fa fa-save"></i>
                    <span>save</span>
                </button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#useCase').change(function(){
            let id = $(this).val();
            $.get("{{route('use-case.input-fields')}}?id="+id,function(result){
                $('#title-field').hide();
                $('#keywords-field').hide();
                $('#description-field').hide();
                if(result.includes("1")){
                    $('#title-field').show();
                }
                if(result.includes("2")){
                    $('#keywords-field').show();
                }
                if(result.includes("3")){
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

            $('#content-generate-preloader').show();

            $.ajax({
                type: 'POST',
                url: "{{ route('content.generate') }}",
                data: {
                    title,
                    keywords,
                    description,
                    temp,
                    use_case: useCaseVal
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
