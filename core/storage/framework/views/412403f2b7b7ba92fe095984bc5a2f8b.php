<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('/assets/images/favicon.png')); ?>">
    <title><?php echo $__env->yieldContent('title', 'Login'); ?></title>
    <!-- BOOTSTRAP  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.min.css')); ?>">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 col-xl-4 mx-auto">

                <div class="authentication-wrapper">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>

            </div>
        </div>
    </div>

    <!-- BOOTSTRAP JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- BOOTSTRAP VALIDATION  -->
    <script src="<?php echo e(asset('assets/js/bootstrap-validation.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>


</body>

</html>
<?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/auth/app.blade.php ENDPATH**/ ?>