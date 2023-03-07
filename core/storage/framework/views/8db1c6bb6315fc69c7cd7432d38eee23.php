<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" class="authentication-form needs-validation" action="<?php echo e(route('login')); ?>" novalidate>
        <?php echo csrf_field(); ?>
        <div class="authentication-form-header">
            <h3 class="logo-name"><?php echo e(readConfig('type_name')); ?></h3>
            <h3 class="section-title">Log in to your account</h3>
            <p class="form-des"><?php echo e(readConfig('type_login_title')); ?></p>
        </div>

        <div class="authentication-form-body">

            <!-- Email    -->
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control custom-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email"
                    name="email" value="<?php echo e(old('email')); ?>" required autocomplete="off" placeholder="Enter your Email">
                <div class="valid-feedback">
                    Awesome! You're one step closer to greatness.
                </div>
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
            </div>

            <!-- password -->

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control custom-input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="password" id="password" required autocomplete="off" placeholder="Enter your Password">
                <div class="valid-feedback">
                    Awesome! You're one step closer to greatness.
                </div>
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
            </div>

            <!-- remember and forget -->
            <div class="remember-forgot">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
                <?php if(Route::has('password.request')): ?>
                <a href="<?php echo e(route('password.request')); ?>" class="forgot-pass">Forgot password</a>
                <?php endif; ?>
            </div>

            <!-- get started  -->
            <button class="gradient-btn">Sign in </button>



            <!-- google  -->
            <button onclick="redirectUrl('<?php echo e(route('auth.google')); ?>')" class="social-btn" type="button">
                <span class="icon">
                    <img src="<?php echo e(asset('/assets/images/icons/google.svg')); ?>" width="25">
                </span>
                <span class="text">Sign up with Google</span>
            </button>


            <p class="authentication-bottom">Don’t have an account? <a href="<?php echo e(route('register')); ?>">Sign up</a> </p>

        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/auth/login.blade.php ENDPATH**/ ?>