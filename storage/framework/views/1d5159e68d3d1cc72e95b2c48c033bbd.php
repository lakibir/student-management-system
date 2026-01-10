<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('lesson::lesson.lesson_plan_setting'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lesson::lesson.lesson_plan_setting'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson_plan'); ?></a>
                    <a href="<?php echo e(route('lesson.lessonPlan-setting')); ?>"><?php echo app('translator')->get('lesson::lesson.lesson_plan_setting'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <?php if(userPermission("lesson.lesson-planner.setting")): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'lesson.lessonPlan-setting', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <?php endif; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php echo app('translator')->get('lesson::lesson.lesson_plan_setting'); ?>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-30 mt-20">
                            <div class="col-lg-12 d-flex flex-column flex-sm-row relation-button gap-20">
                                <p class="text-uppercase mb-0"><?php echo app('translator')->get('lesson::lesson.lesson_plan_subtopic'); ?></p>
                                <div class="d-flex radio-btn-flex ml-30 gap-20">
                                    <div>
                                        <input type="radio" name="sub_topic_enable" id="sub_topic_enable" value="1"
                                               class="common-radio relationButton" <?php echo e(generalSetting()->sub_topic_enable ? 'checked': ''); ?>>
                                        <label for="sub_topic_enable"><?php echo app('translator')->get('system_settings.enable'); ?></label>
                                    </div>
                                    <div>
                                        <input type="radio" name="sub_topic_enable" id="sub_topic_disable" value="0"
                                               class="common-radio relationButton" <?php echo e(!generalSetting()->sub_topic_enable ? 'checked': ''); ?>>
                                        <label for="sub_topic_disable"><?php echo app('translator')->get('common.disable'); ?></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-12 text-center">

                                <?php if(env('APP_SYNC')==TRUE): ?>
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" > <?php echo app('translator')->get('common.update'); ?></button></span>
                                <?php else: ?>
                                    <?php if(userPermission("lesson.lesson-planner.setting")): ?>
                                        <button type="submit" class="primary-btn fix-gr-bg submit">
                                            <span class="ti-check"></span>
                                            <?php echo app('translator')->get('common.update'); ?>
                                        </button>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

        </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/Lesson\Resources/views/lessonPlan/setting.blade.php ENDPATH**/ ?>