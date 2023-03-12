<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('contents.index')); ?>">Contents</a></li>
    <li class="breadcrumb-item active">Edit</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row">
            <div class="col-md-12">
                <section class="my-projects">

                    <div class="my-projects-header border-bottom">
                        <h4 class="header-title">Edit Content</h4>
                    </div>
                    <div class="my-projects-body">
                        <form action="<?php echo e(route('contents.update', $data->id)); ?>" method="POST"
                            class="createpost-form  needs-validation  h-100 d-flex flex-column  justify-content-between">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="row">

                                <!-- create post column -->
                                <div class="col-lg-5 mt-0">

                                    <div class="create-post">


                                        <div class="form-content">

                                            <div class="row g-4">


                                                <!-- Title    -->
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" class="form-control custom-input"
                                                            id="title" required autocomplete="off" name="title"
                                                            placeholder="Write here..." value="<?php echo e($data->title); ?>">
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
                                                        <input type="text" class="form-control custom-input"
                                                            id="keywords" autocomplete="off" name="keywords"
                                                            placeholder="Enter your keywords" value="<?php echo e($data->keywords); ?>">
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
                                                            placeholder="Description"><?php echo e($data->description); ?></textarea>
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
                                            <button type="submit" class="generate-btn"> <i class="fa fa-save"> </i> &nbsp;
                                                Update</button>
                                        </div>



                                    </div>



                                </div>

                                <!-- editor column -->
                                <div class="col-lg-7 border-start mt-0">
                                    <textarea id="summernote" name="generated_content"><?php echo $data->generated_content; ?></textarea>
                                </div>

                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/contents/edit.blade.php ENDPATH**/ ?>