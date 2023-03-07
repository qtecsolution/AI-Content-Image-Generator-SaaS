<form method="post" class="bg-warning p-2 border-lite" action="<?php echo e(route('use-case.update', $data->id)); ?>" id="save-form"
    enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="col-12">
        <div class="pull-right">
            <i class="fa fa-pencil"></i>
       </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="title" class="form-label">Use Case : </label>
            <input type="text" class="form-control custom-input <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="title"
                required autocomplete="off" name="title" placeholder="Use Case" value="<?php echo e($data->title); ?>">
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
                name="details" placeholder="Details" rows="4"><?php echo e($data->details); ?></textarea>
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
                <?php 
                    $inputFields = explode(',',$data->input_fields);
                ?>
                <label> <input class="input_fields" type="checkbox" value="1" name="input_fields[]" <?php if(in_array(1,$inputFields)): ?> checked <?php endif; ?> > Title </label>
                <label  class="mx-4"> <input class="input_fields" type="checkbox" value="2" name="input_fields[]" <?php if(in_array(2,$inputFields)): ?> checked <?php endif; ?>> Keywords </label>
                <label> <input class="input_fields" type="checkbox" value="3" name="input_fields[]" <?php if(in_array(3,$inputFields)): ?> checked <?php endif; ?>> Description </label>
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
                name="prompt" placeholder="Prompt" rows="4"><?php echo e($data->prompt ?? 'Write me content with this keywords: [keywords]. The title is "[title]" and the description: [description]'); ?></textarea>
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

            <?php if($data->icon != '' && file_exists($data->icon)): ?>
                <div class="mb-1">
                    <img src="<?php echo e(asset($data->icon)); ?>" alt="Icon" style="max-height:30px">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control custom-input <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="icon"
                autocomplete="off" name="icon" onchange="imageCheck(this)">
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
        <button type="submit" class="generate-btn">Update</button>
    </div>
</form>
<script>
    window.setTimeout(() => {
        let form = document.getElementById('save-form');
        form.classList.remove('bg-warning');
        form.classList.add('bg-light');

    }, 500);
</script>
<?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/useCase/edit.blade.php ENDPATH**/ ?>