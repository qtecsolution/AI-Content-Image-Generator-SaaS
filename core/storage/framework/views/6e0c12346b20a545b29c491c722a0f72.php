<?php $__env->startSection('content'); ?>
    <!-- ===================hero  start======================= -->
    <section class="hero">
        <div class="container">
            <div class="row g-4">

                <div class="col-12">
                    <div class="hero-content pt-5">
                        <h1 class="hero-title">Write your Business Idea <br>
                            with <span class="logo-name"> <?php echo e(readConfig('name')); ?> </span> </h1>
                        <p class="hero-des"><?php echo e(readConfig('name')); ?> is designed to help you streamline your writing process,
                            <br>
                            increase your productivity, and create high-quality content.
                        </p>

                        <a href="<?php echo e(route('register')); ?>" class="primarybtn-landing">
                            <span class="title">Get your free access now </span>
                            <span>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 15L15 5" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M6.875 5H15V13.125" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </span>
                        </a>

                        <p class="credit">No credit card required</p>
                    </div>
                </div>

                <div class="col-12" data-aos="zoom-in" data-aos-delay="500" data-aos-duration="1000">
                    <figure class="preview-image">
                        <img src="assets/images/landing/preview-editor.svg" alt="preview editor">
                    </figure>
                </div>

            </div>
        </div>
    </section>
    <!-- ===================hero end ======================= -->

    <!-- =================== benifits start ======================= -->
    <section class="benifits" id="usecase">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Content</span></button>
                        <h3 class="benifits-title"> <span><?php echo e(readConfig('name')); ?></span> helps <br> <span>startup teams.</span></h3>
                        <p class="des">Get better results in a fraction of the time. Finally, a writing tool <br> you’ll
                            actually use.</p>
                    </div>
                </div>
            </div>

            <!-- cards -->
            <div class="row m-0">

                <div class="benifits-container">
                    <!-- benifits cards  -->
                    <div class="benifits-cards-wrapper">
                        <?php $__currentLoopData = $firstUseCases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fUseCase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- single card  -->
                            <div class="benifits-card" data-aos="fade-up">
                                <div class="left">
                                    <figure class="card-icon-wrapper">
                                        <?php if($fUseCase->icon != '' && file_exists($fUseCase->icon)): ?>
                                            <img src="<?php echo e(asset($fUseCase->icon)); ?>" alt="">
                                        <?php else: ?>
                                            <img src="assets/icons/cards-icons/NotePencil.svg" alt="">
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <div class="right">
                                    <p class="title"> <?php echo e($fUseCase->title); ?> </p>
                                    <p class="text"><?php echo e($fUseCase->details); ?></p>
                                    <a href="<?php echo e(route('content.create')); ?>?case=<?php echo e($fUseCase->id); ?>" class="card-link">
                                        <span class="text">Try <?php echo e($fUseCase->title); ?> </span> <img
                                            src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <!--  -->
                    <div class="collapse" id="collapseExample">
                        <!-- benifits cards  -->
                        <div class="benifits-cards-wrapper py-4">

                            <?php $__currentLoopData = $restUseCases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rUseCase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- single card  -->
                                <div class="benifits-card" data-aos="fade-up">
                                    <div class="left">
                                        <figure class="card-icon-wrapper">
                                            <?php if($rUseCase->icon != '' && file_exists($rUseCase->icon)): ?>
                                                <img src="<?php echo e(asset($rUseCase->icon)); ?>" alt="">
                                            <?php else: ?>
                                                <img src="assets/icons/cards-icons/NotePencil.svg" alt="">
                                            <?php endif; ?>
                                        </figure>
                                    </div>
                                    <div class="right">
                                        <p class="title"> <?php echo e($rUseCase->title); ?> </p>
                                        <p class="text"><?php echo e($rUseCase->details); ?></p>
                                        <a href="<?php echo e(route('content.create')); ?>?case=<?php echo e($rUseCase->id); ?>"
                                            class="card-link"> <span class="text">Try <?php echo e($rUseCase->title); ?> </span> <img
                                                src="assets/icons/cards-icons/right-arrow.svg" alt=""> </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                    </div>
                    <!-- all template button -->
                    <div class="d-flex  align-items-center justify-content-center py-5">
                        <?php if(count($restUseCases) > 0): ?>
                            <button class="all-template-btn" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                                <span>See All templates </span> <img src="assets/icons/cards-icons/ArrowUpRight.svg"
                                    alt="arrow icon "> </button>
                        <?php endif; ?>
                    </div>

                    <!--  -->
                    <div class="card-divider"></div>
                    <div class="row g-4  py-5">

                        <div class="col-md-4" data-aos="flip-left">
                            <div class="benifit-col">
                                <h3 class="title">Write better content faster</h3>
                                <p class="content">Leverage AI to write your content and
                                    copy in minutes.</p>
                            </div>
                        </div>

                        <div class="col-md-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                            <div class="benifit-col">
                                <h3 class="title">Say ‘goodbye’ to the blank page</h3>
                                <p class="content">Generate high-converting copy for all your campaigns with just a few
                                    clicks.</p>
                            </div>
                        </div>

                        <div class="col-md-4" data-aos="flip-right" data-aos-anchor-placement="center-bottom">
                            <div class="benifit-col">
                                <h3 class="title"><?php echo e($totalUseCase); ?>+ templates</h3>
                                <p class="content">Streamline content production by leveraging <?php echo e($totalUseCase); ?>+ templates.</p>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </section>
    <!-- =================== benifits end ======================= -->

    <!--================= AI IMAGE GENERATE START================ -->
    <section class="image-generate" id="generateImage">
        <div class="container">

            <div class="row g-4">

                <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                    data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Content</span></button>
                        <h3 class="benifits-title"> <span><?php echo e(readConfig('name')); ?></span> helps to <br> <span>generate image..</span></h3>
                        <p class="des">Get your content and content thumbnail in one place. <br> Generate unique and
                            beautiful image with one click.</p>
                    </div>
                </div>
                <div class="col-lg-8 mx-auto">
                    <figure class="generate-image1">
                        <img src="assets/images/landing/generate.svg" alt="generate image ">
                    </figure>
                </div>
                <div class="col-lg-8 mx-auto">
                    <figure class="generate-image2">
                        <img src="assets/images/landing/generate2.svg" alt="generate image ">
                    </figure>
                </div>

            </div>


        </div>
    </section>
    <!--================= AI IMAGE GENERATE END================== -->

    <!-- ==============work start======================= -->
    <section class="how-works" id="works">
        <div class="container pt-4">

            <div class="row g-4 align-items-center">

                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Work</span></button>
                        <h3 class="benifits-title"> How <span class="logo-color"><?php echo e(readConfig('name')); ?></span> works </h3>

                    </div>
                </div>

                <div class="col-lg-5" data-aos="zoom-in" data-aos-duration="1000">
                    <figure class="works-immage">
                        <img src="assets/images/landing/create-post.svg" alt="preview editor">
                    </figure>
                </div>
                <div class="col-lg-7" data-aos="zoom-in" data-aos-duration="1000">
                    <figure class="works-immage">
                        <img src="assets/images/landing/editor.svg" alt="preview editor">
                    </figure>
                </div>



            </div>

            <!-- steps  -->

            <div class="steps-wrapper">

                <div class="step" data-aos="fade-up" data-aos-duration="1000">
                    <div class="left">
                        <div class="count-number">
                            <svg width="7" height="16" viewBox="0 0 7 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.90625 3.49902L5.28125 1.25V14.75" stroke="#2C4CAC" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="right">
                        <h3 class="title">Choose Your UseCase & Fill Up.</h3>
                        <p class="content">This feature streamlines the process of using AI Writing, making it simple
                            and intuitive for users to accomplish their desired task.</p>
                    </div>
                </div>

                <div class="step" data-aos="fade-up" data-aos-duration="1000">
                    <div class="left">
                        <div class="count-number">
                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.89022 3.3114C2.07349 2.87781 2.34541 2.48734 2.68853 2.16507C3.03165 1.84281 3.43838 1.59587 3.8826 1.44012C4.32682 1.28437 4.7987 1.22325 5.26794 1.26069C5.73718 1.29814 6.19339 1.43331 6.60729 1.65752C7.02119 1.88174 7.38362 2.19005 7.6713 2.56265C7.95898 2.93524 8.16554 3.36389 8.27773 3.82106C8.38992 4.27822 8.40525 4.7538 8.32274 5.21724C8.24022 5.68068 8.06169 6.12174 7.7986 6.51209V6.51209L1.625 14.7501V14.7493H8.375"
                                    stroke="#2C4CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                    <div class="right">
                        <h3 class="title">Wow! It generates your content.</h3>
                        <p class="content">The AI Writing model will then analyze the input and generate a unique and
                            creative piece of content based on the user's specifications.</p>
                    </div>
                </div>

                <div class="step" data-aos="fade-up" data-aos-duration="1000">
                    <div class="left">
                        <div class="count-number">
                            <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.625 1.25H8.37411L4.43802 6.87564C5.0855 6.87562 5.72299 7.03528 6.29403 7.34048C6.86506 7.64568 7.35201 8.087 7.71175 8.62535C8.07148 9.1637 8.2929 9.78246 8.35637 10.4268C8.41985 11.0712 8.32344 11.7213 8.07567 12.3194C7.8279 12.9176 7.43643 13.4455 6.93592 13.8563C6.43542 14.267 5.84134 14.548 5.2063 14.6743C4.57126 14.8007 3.91487 14.7684 3.29527 14.5805C2.67568 14.3925 2.11199 14.0547 1.65415 13.5968"
                                    stroke="#2C4CAC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                    </div>
                    <div class="right">
                        <h3 class="title">Edit, polish, and publish</h3>
                        <p class="content">Use <?php echo e(readConfig('name')); ?> editor to rewrite paragraphs and polish up sentences.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ==============work end======================= -->

    <!-- ==============Choose package start======================= -->
    <section class="choose-package" id="pricing">
        <div class="container">

            <div class="row g-4 align-items-center">

                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Pricing</span></button>
                        <h3 class="benifits-title">Choose Your <br>
                            Preferred Package</h3>

                    </div>
                </div>
            </div>

            <!-- steps  -->

            <!--  Pricing slider  -->
            <div class="swiper mySwiper py-5 mx-2">
                <div class="swiper-wrapper">
                    <!-- single  card free-->
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide" data-aos="fade-up" data-aos-duration="1000">
                        <div class="pricing-card">

                            <div class="pricing-card-header">
                                <span class="price">
                                    <span class="currency"><?php echo e(readConfig('currency_sambol')); ?></span>
                                    <span class="number"><?php echo e($item->price); ?></span>
                                    <span class="plane-time">/mo</span>
                                </span>
                                <span class="name"><?php echo e($item->name); ?></span>
                                <p class="info text-secondary">No credit card required</p>
                            </div>

                            <div class="pricing-card-body">
                                <ul class="facility-list">
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Access to all basic features</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Generate <?php echo e($item->word_count); ?> AI Words / month</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span><?php echo e($item->call_api_count); ?> Api Request / month</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Store <?php echo e($item->documet_count); ?> documents on server</span>
                                    </li>
                                    <li>
                                        <span class="icon-wrapper">
                                            <img src="assets/images/icons/check.svg" alt="check icon ">
                                        </span>
                                        <span>Generate <?php echo e($item->image_count); ?> Image / month </span>
                                    </li>
                                </ul>
                                <div class="d-grid">
                                    <a href="" class="btn-subscribe text-center text-white"> Subscribe </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
    </section>
    <!-- ==============Choose package end ======================= -->

    <!--===================== faq  start=====================-->
    <section class="faq">
        <div class="container">

            <div class="row g-4 align-items-center">

                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section-header">
                        <button class="section-btn"><span class="text">Faq</span></button>
                        <h3 class="benifits-title"> Frequently Asked <br>
                            Questions </h3>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <!-- accordion item -->
                        <?php $__currentLoopData = $allFaq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqIndex => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-<?php echo e($faq->id); ?>">
                                <button class="accordion-button <?php if($faqIndex>0): ?> collapsed <?php endif; ?>" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqCollapse-<?php echo e($faq->id); ?>" aria-expanded="false" aria-controls="faqCollapse-<?php echo e($faq->id); ?>">
                                    <?php echo e($faq->question); ?>

                                </button>
                            </h2>
                            <div id="faqCollapse-<?php echo e($faq->id); ?>" class="accordion-collapse collapse <?php if($faqIndex==0): ?> show <?php endif; ?>" aria-labelledby="heading-<?php echo e($faq->id); ?>"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <div class="card-divider-faq"></div>
                                    <p> <?php echo e($faq->answear); ?> </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===================== faq  end=====================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/frontend/index.blade.php ENDPATH**/ ?>