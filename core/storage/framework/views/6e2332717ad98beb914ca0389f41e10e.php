<?php $__env->startSection('title', 'Signup'); ?>

<?php $__env->startSection('content'); ?>

<form method="POST" action="<?php echo e(route('register')); ?>" class="authentication-form needs-validation" novalidate>
    <?php echo csrf_field(); ?>

    <div class="authentication-form-header align-items-start">
        <h3 class="logo-name"><?php echo e(readConfig('type_name')); ?></h3>
        <h3 class="section-title">Sign up</h3>
        <p class="form-des"><?php echo e(readConfig('type_register_title')); ?></p>
    </div>

    <div class="authentication-form-body">

        <!-- Name   -->
        <div class="form-group">
            <label for="name" class="form-label">Name *</label>
            <input id="name" type="text" class="form-control custom-input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="name" value="<?php echo e(old('name')); ?>" required placeholder="Enter your name" autocomplete="name"
                autofocus>

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="valid-feedback">
                Awesome! You're one step closer to greatness.
            </div>
        </div>

        <!-- Email    -->
        <div class="form-group">
            <label for="email" class="form-label">Email* </label>
            <input id="email" type="email" class="form-control custom-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Enter your Email">

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="valid-feedback">
                Awesome! You're one step closer to greatness.
            </div>
        </div>

        <!-- password -->

        <div class="form-group">
            <label for="password" class="form-label">Password* </label>
            <input id="password" type="password" class="form-control custom-input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="password" required autocomplete="new-password" placeholder="Enter your Password">

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <p><span class="small">Must be at least 8 characters.</span></p>
            <div class="valid-feedback">
                Awesome! You're one step closer to greatness.
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Confirm Password* </label>
                <input id="password-confirm" type="password" class="form-control custom-input" name="password_confirmation" required autocomplete="new-password"  placeholder="Retype your Password">
        </div>

        <!-- get started  -->
        <button class="gradient-btn" type="submit" >Create account </button>



        <!-- google  -->
       <!-- google  -->
       <button onclick="redirectUrl('<?php echo e(route('auth.google')); ?>')" class="social-btn" type="button">
        <span class="icon">
            <img src="<?php echo e(asset('/assets/images/icons/google.svg')); ?>" width="25">
        </span>
        <span class="text">Sign up with Google</span>
    </button>


        <p class="authentication-bottom">Already have an account? <a href="<?php echo e(route('login')); ?>">Log in </a> </p>

    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/auth/register.blade.php ENDPATH**/ ?>