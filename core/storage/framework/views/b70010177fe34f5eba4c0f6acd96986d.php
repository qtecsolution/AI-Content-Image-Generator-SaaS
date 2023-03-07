<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active"> Change Password</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row">

            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h5 class="header-title text-capitalize"> Change Password </h5>
                    </div>
                    <div class="my-projects-body">
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="card">
                                    <div class="p-2">
                                        <?php if($user->avatar != '' && file_exists($user->avatar)): ?>
                                            <img src="<?php echo e(asset($user->avatar)); ?>" alt="<?php echo e($user->name); ?>"
                                                style="max-width:150px">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('assets/images/placeholder.png')); ?>"
                                                alt="<?php echo e($user->name); ?>" style="max-width:150px">
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"> <?php echo e($user->name); ?> </h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"> <b> Email: </b> <?php echo e($user->email); ?> </li>
                                        <li class="list-group-item"> <b> Phone: </b> <?php echo e($user->phone); ?> </li>
                                        <li class="list-group-item"> <b> Address: </b> <?php echo e($user->address ?? ''); ?> </li>
                                        <?php if($user->type == 'user'): ?>
                                            <li class="list-group-item"> <b> Plan: </b> <?php echo e($user->plan->name ?? ''); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 border-start">
                                <form method="POST" action="<?php echo e(route('profile.password.update')); ?>" class="authentication-form needs-validation">
                                    <?php echo csrf_field(); ?>

                                    <div class="authentication-form-body">

                                        <!-- Name   -->
                                        <div class="form-group mb-3">
                                            <label for="current_password" class="form-label">Current Password *</label>
                                            <input id="current_password" type="password"
                                                class="form-control custom-input <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="current_password" required
                                                placeholder="Enter your current password" autocomplete="off" autofocus>

                                            <?php $__errorArgs = ['current_password'];
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

                                        <!-- Email    -->
                                        <div class="form-group mb-3">
                                            <label for="new_password" class="form-label">New Password* </label>
                                            <input id="new_password" type="password"
                                                class="form-control custom-input <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="new_password" required autocomplete="off"
                                                placeholder="Enter your new password">

                                            <?php $__errorArgs = ['new_password'];
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

                                        <div class="form-group mb-3">
                                            <label for="confirm_password" class="form-label">Confirm Password* </label>
                                            <input id="confirm_password" type="password"
                                                class="form-control custom-input <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="confirm_password" required
                                                placeholder="Confirm your password">

                                            <?php $__errorArgs = ['confirm_password'];
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
                                        <div class="generate-btn-wrapper">
                                            <button type="submit" class="generate-btn">Update</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/profile/password.blade.php ENDPATH**/ ?>