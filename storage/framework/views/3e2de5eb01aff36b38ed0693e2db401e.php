<?php $__env->startSection(config('pagebuilder.site_section')); ?>
<?php echo e(headerContent()); ?>

    <section class="bradcrumb_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1><?php echo e(__('edulia.course_details')); ?><span><a href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> / <?php echo e(__('edulia.courses_details')); ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_padding course course_details_page mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="course_sidebar">
                        <div class="course_sidebar_thumbnail">
                            <img src="<?php echo e($course->image != ""? asset($course->image) : '../img/client/common-banner1.jpg'); ?>" alt="<?php echo e($course->title); ?>">
                        </div>
                        <?php if($course->courseCategory->category_name): ?>
                            <div class="course_sidebar_content">
                                <h5><?php echo e(__('edulia.category').' '.':'); ?><?php echo e($course->courseCategory->category_name); ?></h5>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-8 col-md-12">
                    <div class="course_details">
                        <div class="course_details_mentor">
                            <div class="course_details_mentor_head">
                                <div class="course_details_mentor_title">
                                    <h5><?php echo e($course->title); ?></h5>
                                </div>
                            </div>
                            <div class="course_details_mentor_wrapper">
                                <?php echo $course->overview; ?>

                            </div>
                        </div>
                        <div class="course_details_preview_img">
                            <img src="<?php echo e($course->image != ""? asset($course->image) : '../img/client/common-banner1.jpg'); ?>" alt="<?php echo e($course->title); ?>">
                        </div>
                        <nav class="course_details_menu">
                            <ul>
                                <?php if($course->outline): ?>
                                    <li class='course_details_menu_list'>
                                        <a href="#" class='course_details_menu_list_link active about-filter' data-name='overview'>
                                            <?php echo e(__('edulia.overview')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if($course->prerequisites): ?>
                                    <li class='course_details_menu_list'>
                                        <a href="#" class='course_details_menu_list_link about-filter' data-name='curriculum'>
                                            <?php echo e(__('edulia.curriculum')); ?> 
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if($course->resources): ?>
                                    <li class='course_details_menu_list'>
                                        <a href="#" class='course_details_menu_list_link about-filter' data-name='instructors'>
                                            <?php echo e(__('edulia.instructors')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if($course->stats): ?>
                                    <li class='course_details_menu_list'>
                                        <a href="#" class='course_details_menu_list_link about-filter' data-name='reviews'>
                                            <?php echo e(__('edulia.reviews')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <div class="course_details_abouts">
                            <div class="course_details_abouts_item overview">
                                <?php echo $course->outline; ?>

                            </div>
                            <div class="course_details_abouts_item curriculum">  
                                <?php echo $course->prerequisites; ?>

                            </div>
                            <div class="course_details_abouts_item instructors">
                                <?php echo $course->resources; ?>

                            </div>
                            <div class="course_details_abouts_item reviews">
                                <?php echo $course->stats; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('23002f65-2999-4ccb-95bc-d66da36af90c')): $__env->markAsRenderedOnce('23002f65-2999-4ccb-95bc-d66da36af90c');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        // ABOUT FILTER BTN
        let filterBtn = document.querySelectorAll('.about-filter');
        let aboutInfo = document.querySelectorAll('.course_details_abouts_item');
        filterBtn.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                let value = e.target.dataset.name;
                aboutInfo.forEach(function(item) {
                    if (item.classList.contains(value)) {
                        item.style.display = 'block'
                    } else {
                        item.style.display = 'none'
                    }
                })
            })
        })
    </script>
<?php $__env->stopPush(); endif; ?>
<?php echo $__env->make(config('pagebuilder.site_layout'),['edit' => false ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/frontEnd/theme/edulia/course/single_course_details_page.blade.php ENDPATH**/ ?>