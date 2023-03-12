<?php $__env->startSection('title','All Plans'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">All Plans</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content p-2 p-md-4 pt-0">
        <div class="row g-4">
          
            <div class="col-md-12">
                <div class="my-projects">
                    <div class="my-projects-header border-bottom">
                        <h5 class="header-title">All Plans</h5>
                      
                    </div>
                    <div class="my-projects-body">

                        <div class="pricing-body mt-3">

                            <div class="pricing-cards">
                                <!-- single  card free  -->
                                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="pricing-card">
                                    <div class="pricing-card-header">
                                        <span class="price">
                                            <span class="currency"><?php echo e(readConfig('currency_sambol')); ?></span>
                                            <span class="number"><?php echo e($item->price); ?></span>
                                            <span class="plane-time">/mo</span>
                                        </span>
                                        <span class="name"><?php echo e($item->name); ?></span>
                                        <p class="info <?php echo e(strpos($item->sub_name, "@") !== false ? 'text-secondary' : ''); ?>"><?php echo e($item->sub_name); ?></p>
                                    </div>

                                    <div class="pricing-card-body">
                                        <ul class="facility-list">
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="<?php echo e(asset('assets/images/icons/check.svg')); ?>" alt="check icon ">
                                                </span>
                                                <span>Generate Maximum <?php echo e($item->word_count); ?> AI Words</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="<?php echo e(asset('assets/images/icons/check.svg')); ?>" alt="check icon ">
                                                </span>
                                                <span><?php echo e($item->call_api_count); ?> Api Request / month</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="<?php echo e(asset('assets/images/icons/check.svg')); ?>" alt="check icon ">
                                                </span>
                                                <span>Store <?php echo e($item->documet_count); ?> documents on server</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper">
                                                    <img src="<?php echo e(asset('assets/images/icons/check.svg')); ?>" alt="check icon ">
                                                </span>
                                                <span>Store <?php echo e($item->image_count); ?> Generate Image on server</span>
                                            </li>
                                            <li>
                                                <span class="icon-wrapper cross-icon">
                                                    <img src="<?php echo e(asset('assets/images/icons/check.svg')); ?>" alt="cross  icon ">
                                                </span>
                                                <span>Support <?php echo e(Str::upper($item->lang)); ?> Languages</span>
                                            </li>
                                        </ul>
                                        <div class="d-grid">
                                            <?php if($user->plan_id == $item->id): ?>
                                            <button type="button" class="btn-subscribe subscribed" onclick="redirectUrl('<?php echo e(route('plan.userExpanse')); ?>')"> 
                                                See The Expanses
                                            </button>
                                            <?php else: ?>
                                            <button type="button" class="btn-subscribe" onclick="redirectUrl('<?php echo e(route('plan.purchase',$item->id)); ?>')"> 
                                                 Purchase now
                                            </button>
                                            <?php endif; ?>
                                        
                                        </div>
                                    </div>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/plan/userIndex.blade.php ENDPATH**/ ?>