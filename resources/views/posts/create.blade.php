@extends('layouts.app')

@section('content')
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">

            <!-- create post column -->
            <div class="col-lg-5 mt-0">

                <div class="create-post">
                    <form action=""
                        class="createpost-form  needs-validation  h-100 d-flex flex-column  justify-content-between"
                        novalidate>

                        <div class="form-content">
                            <h3 class="create-post-header">Create Post</h3>

                            <div class="row g-4">

                                <!-- Title    -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control custom-input" id="title" required
                                            autocomplete="off" placeholder="Enter post title here">
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
                                            autocomplete="off" placeholder="Enter your keywords">
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
                                        <label for="description" class="form-label">Describe your post</label>
                                        <textarea class="form-control custom-input" id="description" required autocomplete="off"
                                            placeholder="Describe our post"></textarea>
                                        <div class="valid-feedback">
                                            Awesome! You're one step closer to greatness.
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter your description
                                        </div>
                                    </div>
                                </div>

                                <!-- select tone  -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="keywords" class="form-label">Select Tone</label>
                                        <select class="nice-select w-100"
                                            style="opacity: 0; width: 0px; padding: 0px; height: 0px;">
                                            <option value="danish">Funny</option>
                                            <option value="dutch">Serious</option>
                                            <option value="douch">Formal</option>
                                            <option value="bangla">Respectful </option>
                                        </select>
                                        <div class="valid-feedback">
                                            Awesome! You're one step closer to greatness.
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter keywords
                                        </div>
                                    </div>
                                </div>

                                <!-- upload box  -->
                                <div class="col-12">
                                    <div class="upload-group">

                                        <span class="upoload-label">Upload Image </span>
                                        <input type="file" name="" id="uploadImage" hidden>

                                        <label for="uploadImage" class="upload-box">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                            <span>Upload an image to specify and elaborate your post details.
                                                SVG,PNG,JPG or GIF</span>

                                            <span class="browse">Browse</span>
                                        </label>

                                    </div>
                                </div>

                                <!-- select platform   -->
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="date" class="form-label">Select Platform</label>
                                        <select name="" id="" class="form-control custom-input">
                                            <option value="facebook">Facebook</option>
                                            <option value="instagram">Instagram</option>
                                            <option value="linkdin">Linkedin</option>
                                            <option value="twitter">Twitter</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- select date  -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="date" class="form-label">Created Date</label>
                                        <input type="date" id="date" class="form-control custom-input">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="generate-btn-wrapper">
                            <button class="generate-btn">Generate post</button>
                        </div>


                    </form>
                </div>



            </div>

            <!-- editor column -->
            <div class="col-lg-7 border-start mt-0">
                <div class="title-box ">
                    <input type="text" placeholder="Title">
                </div>
                <div id="summernote">
                    <!-- default value -->
                </div>

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
    $(document).ready(function () {

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
            $("<style id=\"fixed\">.note-editor .dropdown-toggle::after { all: unset; } .note-editor .note-dropdown-menu { box-sizing: content-box; } .note-editor .note-modal-footer { box-sizing: content-box; }</style>")
                .prependTo("body");
    })
</script>
@endsection
