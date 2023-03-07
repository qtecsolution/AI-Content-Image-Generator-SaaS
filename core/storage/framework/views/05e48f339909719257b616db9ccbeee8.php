<?php $__env->startSection('title', 'AI Content Generate'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">AI Content Generate</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                                                <?php echo e(Form::select('case', $cases, $request->case ?? '', ['class' => 'w-100 nice-select', 'required', 'id' => 'useCase'])); ?>

                                            </div>
                                        </div>
                                        <!-- select tone  -->
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="language" class="form-label">Select Language</label>
                                                <?php echo e(Form::select('language', $languages, 'English (USA)', ['class' => 'w-100 nice-select', 'required', 'id' => 'language'])); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-4">
                                        <!-- Title    -->
                                        <div class="col-12" id="title-field"
                                            <?php if(!in_array(1, $inputFields)): ?> style="display: none" <?php endif; ?>>
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
                                            <?php if(!in_array(2, $inputFields)): ?> style="display: none" <?php endif; ?>>
                                            <div class="form-group">
                                                <label for="keywords" class="form-label">Keywords</label>
                                                <input type="text" class="form-control custom-input" id="keywords"
                                                    autocomplete="off" name="keywords" placeholder="Enter your keywords">
                                            </div>
                                        </div>

                                        <!-- description -->
                                        <div class="col-12 mb-2" id="description-field"
                                            <?php if(!in_array(3, $inputFields)): ?> style="display: none" <?php endif; ?>>
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
                        <form method="post" action="<?php echo e(route('contents.store')); ?>" id="save-form">
                            <?php echo csrf_field(); ?>
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
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('#useCase').change(function() {
            let id = $(this).val();
            $.get("<?php echo e(route('use-case.input-fields')); ?>?id=" + id, function(result) {
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
                url: "<?php echo e(route('content.generate')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/openAi/content.blade.php ENDPATH**/ ?>