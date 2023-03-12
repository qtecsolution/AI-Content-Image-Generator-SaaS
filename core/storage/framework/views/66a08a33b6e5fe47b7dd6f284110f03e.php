<?php $__env->startSection('content'); ?>
    <div class="main-content p-2 p-md-4 pt-0">
        <!-- WELCOME SECTION START -->
        <section class="welcome">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="welcome-title">👋 Hi, <?php echo e(Auth::user()->name); ?> </h3>
                    <p class="welcome-text">"Welcome Type.ez! We're glad to have you here. Our platform is designed
                        to help you streamline <br> your writing process, increase your productivity, and create
                        high-quality content. <br> We're confident you'll find the tools and features here to be
                        user-friendly and effective.</p>
                </div>
            </div>
        </section>
        <!-- WELCOME SECTION END -->
        <!-- POPULAR TEMPLATE  SECTION START -->
        <section class="popular-template">
            <div class="popular-template-header">
                <h4 class="header-title">Popular Use Case Templates</h4>
            </div>
            <div class="popular-template-body">
                <div class=" swiper templateSwiper">
                    <div class="swiper-wrapper pb-5">
                        <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo e(route('content.create')); ?>?case=<?php echo e($case->id); ?>" class="template-card">
                                    <figure class="card-img">
                                        <img src="<?php echo e(asset($case->icon)); ?>" alt="<?php echo e($case->title); ?>">
                                    </figure>
                                    <h3 class="card-title"> <?php echo e($case->title); ?> </h3>
                                    <p class="card-des"><?php echo e($case->details); ?></p>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="swiper-pagination mt-5"></div>
                </div>
            </div>
        </section>
        <!-- POPULAR TEMPLATE  SECTION END -->

        <!-- MY PROJECT  SECTION START -->
        <section class="my-projects">

            <div class="my-projects-header">
                <h4 class="header-title">Saved Contents</h4>
            </div>

            <div class="my-projects-body">
                <div class="project-table-wrapper no-default-search p-3">

                    <div class="searchbox">
                        <span class="search-icon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                        <input type="text" name="" id="search-datatable">

                        <div class="right-text" id="delete-selected" style="display: none" role="button"
                            onclick=multipleDelete()>
                            <span>Delete</span>
                            <span class="selected">selected <span class="total-selected"> </span> </span>
                            <span> Contents </span>
                            <input type="hidden" id="multiuple-delete-url"
                                value="<?php echo e(route('contents-multiple-delete')); ?>">
                        </div>
                    </div>

                    <table id="projectTable" class="project-table">
                        <thead>
                            <tr class="bg-white">
                                <td data-orderable="false"> <input type="checkbox" name="row-check"
                                        class="form-check-input check-lg" id="allSelect"></td>
                                <td>Title</td>
                                <td>Keywords </td>
                                <td> Use case </td>
                                <td>Words </td>
                                <td>last Modified</td>
                                <td data-orderable="false"></td>
                            </tr>
                        </thead>
                        <tbody> </tbody>
                    </table>

                </div>
            </div>

        </section>
        <!-- MY PROJECT  SECTION END -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        var swiper = new Swiper(".templateSwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                420: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1100: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1300: {
                    slidesPerView: 5,
                    spaceBetween: 8,
                },
            },
        });
        //Checked all Checkbox 
        $('#allSelect').change(function() {
            $('#projectTable .input-checkbox').prop('checked', $(this).prop('checked'));
            applicantSelected();
        });
        // Checkbox action
        $(document).on("click", "#projectTable .input-checkbox", function() {
            applicantSelected();
        })
        // applicant selected
        function applicantSelected() {
            let numChecked = $('#projectTable .input-checkbox:checked').length;
            if (numChecked > 0) {
                $('#delete-selected').show();
                $('#delete-selected .total-selected').html(numChecked);
            } else {
                $('#delete-selected').hide();
            }
        }
        // multiple delete 
        function multipleDelete() {
            let deleteId = [];
            $('#projectTable .input-checkbox:checked').each(function() {
                deleteId.push($(this).val())
            })
            let id = deleteId.toString();
            let url = $('#multiuple-delete-url').val();
            url += '?id=' + id;
            resourceDelete(url);
        }


        $(function() {
            let table = $('#projectTable').DataTable({
                info: false,
                sDom: 'Rfrtlip',
                language: {
                    paginate: {
                        next: '<i class="fa fa-arrow-right"></i>',
                        previous: '<i class="fa fa-arrow-left"></i>'
                    },
                    "lengthMenu": "Show _MENU_ entries ",
                    pageLength: 10,
                },
                fixedColumns: {
                    left: 1,
                },
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: {
                    url: "<?php echo e(route('contents.create')); ?>"
                },

                columns: [{
                        data: 'checkbox'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'keywords',
                        name: 'keywords'
                    },
                    {
                        data: 'use_case_title',
                        name: 'useCase.title'
                    },
                    {
                        data: 'word_count',
                    },
                    {
                        data: 'last_modify',
                        name: 'updated_at'
                    },
                    {
                        data: 'action'
                    },
                ]
            });

            $('#search-datatable').keyup(function() {
                table.search(this.value).draw();

            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/AI_writter_laravel/core/resources/views/index.blade.php ENDPATH**/ ?>