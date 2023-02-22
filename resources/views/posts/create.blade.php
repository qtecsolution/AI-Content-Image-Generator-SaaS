@extends('layouts.app')

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <!-- create post column -->
            <div class="col-lg-5 mt-0">

                <div class="create-post">
                    <form action="" id="input-form"
                        class="createpost-form  needs-validation  h-100 d-flex flex-column  justify-content-between">

                        <div class="form-content">
                            <h3 class="create-post-header">Create Post</h3>

                            <div class="row g-4">

                                <!-- Type    -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="case" class="form-label">Choose Use Case</label>
                                        {{ Form::select('case', $cases, $request->case ?? '', ['class' => 'w-100 nice-select', 'required', 'id' => 'useCase']) }}
                                    </div>
                                </div>

                                <!-- Title    -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control custom-input" id="title" required
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="keywords" class="form-label">Keywords</label>
                                        <input type="text" class="form-control custom-input" id="keywords" required
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
                                <div class="col-12">
                                    <!-- description  -->
                                    <div class="form-group">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control custom-input" id="description" autocomplete="off" name="description"
                                            placeholder="Description"></textarea>
                                        <div class="valid-feedback">
                                            Awesome! You're one step closer to greatness.
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter your description
                                        </div>
                                    </div>
                                </div>
                                <!-- select tone  -->
                                <div class="col-12" id="selectPriority">
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
                        </div>

                        <div class="generate-btn-wrapper">
                            <button type="submit" class="generate-btn">Generate post</button>
                        </div>


                    </form>
                </div>



            </div>

            <!-- editor column -->
            <div class="col-lg-7 border-start mt-0">
                <textarea id="summernote">
                    <!-- default value -->
                </textarea>

            </div>

        </div>

        <!-- coutn -->
        <div class="count sticky-bottom">
            <div class="left">
                <span class="words">341 Words</span>
                <span class="charecters">34851574 Characters</span>
            </div>

            <div class="right">
                <button>
                    <i class="fa fa-random" aria-hidden="true"></i>
                    <span>Regenerate</span>
                </button>
                <button>
                    <i class="fa fa-copy"></i>
                    <span>copy</span>
                </button>
                <button>
                    <i class="fa fa-save"></i>
                    <span>save</span>
                </button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {

            // Get form data
            $("form#input-form").submit(function(event) {
                event.preventDefault();

                let title = $('#title').val();
                let keywords = $('#keywords').val();
                let description = $('#description').val();
                let useCaseVal = $('#useCase option:selected').val();
                let prompt;

                switch (useCaseVal) {
                    case 'pro_des':
                        prompt =
                            `Write me product description with keywords ${keywords}. The title of product is "${title}"`;
                        break;
                    case 'blog':
                        prompt =
                            `Write blog description with keywords ${keywords}. The title of blog is "${title}"`;
                        break;
                    case 'social':
                        prompt =
                            `Write social media post with keywords ${keywords}. The title of post is "${title}"`;

                        break;
                    case 'mail':
                        prompt =
                            `Write me a mail content with keywords ${keywords}. The subject of mail is "${title}"`;
                        break;
                    case 'google_seo':
                        prompt =
                            `Write social media post with keywords ${keywords}. The title of post is "${title}"`;
                        prompt =
                            `Write google search ads with target keywords ${keywords}. The Product title is "${title}"`;

                        break;
                    default:
                        prompt = 'Write me a test article';
                        break;
                }

                if (description !== '') {
                    prompt += ` and description ${description}.`;
                }
                let temp = $('#temp option:selected').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('content.openai') }}",
                    data:{
                        prompt: prompt,
                        temp: temp
                    },
                    success: function(data) {
                        console.log(data)
                    },
                    error: function(msg) {
                        console.log(msg);
                        var errors = msg.responseJSON;
                    }
                });

            });


        });

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
