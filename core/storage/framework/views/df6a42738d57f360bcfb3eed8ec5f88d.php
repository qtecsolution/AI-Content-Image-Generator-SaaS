<?php $__env->startSection('title','Use Case'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Use Case</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                                <form method="post" class="p-2 border-lite bg-light" action="<?php echo e(route('use-case.store')); ?>" id="save-form"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="title" class="form-label">Use Case : </label>
                                            <input type="text"
                                                class="form-control custom-input <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="title" required autocomplete="off" name="title"
                                                placeholder="Use Case" value="<?php echo e(old('title')); ?>">
                                            <div class="valid-feedback">
                                                Awesome! You're one step closer to greatness.
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter a title
                                            </div>
                                        </div>
                                    </div>

                                    <!-- description -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="details" class="form-label">Details : </label>
                                            <textarea class="form-control custom-input <?php $__errorArgs = ['details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="details" autocomplete="off"
                                                name="details" placeholder="Details" rows="4"><?php echo e(old('details')); ?></textarea>
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
                                            <label for="details" class="form-label"> Input Fields : </label>
                                            <div>
                                                <label> <input class="input_fields" type="checkbox" value="1" name="input_fields[]" checked> Title </label>
                                                <label  class="mx-4"> <input class="input_fields" type="checkbox" value="2" name="input_fields[]" checked> Keywords </label>
                                                <label> <input class="input_fields" type="checkbox" value="3" name="input_fields[]" checked> Description </label>
                                            </div>
                                            <?php $__errorArgs = ['input_fields'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger">
                                                At least select one input field!
                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            <div id="input_fields_check" class="text-danger" style="display: none">
                                                At least select one input field!
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Promt -->
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="promt-body" class="form-label">Open AI Resuest Prompt : </label>
                                            <textarea class="form-control custom-input <?php $__errorArgs = ['prompt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="promt-body" autocomplete="off"
                                                name="prompt" placeholder="Prompt" rows="4"><?php echo e(old('prompt') ?? 'Write me content with this keywords: [keywords]. The title is "[title]" and the description: [description]'); ?></textarea>
                                            <div class="valid-feedback">
                                                Awesome! You're one step closer to greatness.
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter your prompt
                                            </div>
                                            <div class="col-md-12">
                                                <span class="placeholder-text" data="promt-body">[keywords]</span>
                                                <span class="placeholder-text" data="promt-body">[title]</span>
                                                <span class="placeholder-text" data="promt-body">[description]</span>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="icon" class="form-label">Icon : </label>
                                            <input type="file"
                                                class="form-control custom-input <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="icon" required autocomplete="off" name="icon"
                                                onchange="imageCheck(this)">
                                            <span class="text-danger" id="fileNotSupported" style="display: none"> File not
                                                supported!</span>
                                            <div class="valid-feedback">
                                                Awesome! You're one step closer to greatness.
                                            </div>
                                            <div class="invalid-feedback">
                                                Please enter a title
                                            </div>
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
                                                <td> Icon</td>
                                                <td>Name</td>
                                                <td> Details </td>
                                                <td>last Modified</td>
                                                <td> Action </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php if($data->icon != '' && file_exists($data->icon)): ?>
                                                            <img src="<?php echo e(asset($data->icon)); ?>" alt="Icon"
                                                                style="max-height:30px">
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($data->title); ?></td>
                                                    <td> <?php echo e($data->details); ?> </td>
                                                    <td> <?php echo e($data->updated_at); ?> </td>
                                                    <td>
                                                        <div class="action-wrapper">
                                                            <a title="Edit Data" class="text-success"
                                                                href="javascript:void(0)"
                                                                onclick='updateForm("<?php echo e(route('use-case.edit', $data->id)); ?>")'>
                                                                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                                            </a>
                                                            <a class="text-danger" title="Delete Data"
                                                                href="javascript:void(0)" type="button"
                                                                onclick='resourceDelete("<?php echo e(route('use-case.destroy', $data->id)); ?>")'>
                                                                <i class="fa fa-trash-o fa-lg"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="row g-2">
                                    <div class="col mt-3">
                                        <?php echo e($allData->links('vendor.pagination.bootstrap-5')); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        // Update Use case
        function updateForm(url) {
            $('#useCaseForm').load(url);
        }

        $(document).ready(function(){
            // Create use case
            $(document).on("submit", "#save-form", function() {
                let fieldsChecked = $('.input_fields:checked').length;
                if(fieldsChecked == 0){
                    event.preventDefault();
                    $('#input_fields_check').show();
                }
                let inputFile = $('#icon');
                if(inputFile.prop('files').length > 0){
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/useCase/index.blade.php ENDPATH**/ ?>