<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.exam_schedule'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.exam_schedule'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.exam_schedule'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
                            <?php if(userPermission('exam_schedule_create')): ?>
                                <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                                    <a href="<?php echo e(route('exam_schedule_create')); ?>" class="primary-btn small fix-gr-bg">
                                        <span class="ti-plus pr-2"></span>
                                        <?php echo app('translator')->get('exam.add_exam_schedule'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_schedule_report_search_new', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">

                            <?php if(moduleStatusCheck('University')): ?>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                        ['required' => 
                                            ['USN', 'UD', 'UA', 'US', 'USL','USEC'],'hide'=> ['USUB']
                                        ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                        ['required' => 
                                            ['USN', 'UD', 'UA', 'US', 'USL','USEC'],'hide'=> ['USUB']
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        <div class="col-lg-3 mt-15" id="select_exam_typ_subject_div">
                                            <label for=""> <?php echo app('translator')->get('exam.select_exam'); ?> *</label>
                                            <?php echo e(Form::select('exam_type',[""=>__('exam.select_exam').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('exam_type') ? ' is-invalid' : ''), 'id'=>'select_exam_typ_subject'])); ?>

                                            
                                            <div class="pull-right loader loader_style" id="select_exam_type_loader">
                                                <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                            </div>
                                            <?php if($errors->has('exam_type')): ?>
                                                <span class="text-danger custom-error-message" role="alert">
                                                    <?php echo e(@$errors->first('exam_type')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-4 mt-30-md">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.exam')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select form-control<?php echo e($errors->has('exam_type') ? ' is-invalid' : ''); ?>"
                                            name="exam_type">
                                        <option data-display="Select Exam *"
                                                value=""><?php echo app('translator')->get('common.select_exam'); ?> *
                                        </option>
                                        <?php $__currentLoopData = $exam_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$exam_type->id); ?>" <?php echo e(isset($exam_type_id) ? ($exam_type_id == $exam_type->id? 'selected':''):''); ?>><?php echo e(@$exam_type->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('exam_type')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('exam_type')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-md">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.class')); ?>

                                            <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                            id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *"
                                                value=""><?php echo app('translator')->get('common.select_class'); ?> *
                                        </option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$class->id); ?>" <?php echo e(isset($class_id) ? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e(@$class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('class')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-md" id="select_section_div">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.section')); ?>

                                            <span class="text-danger"> </span>
                                    </label>
                                    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                            id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> "
                                                value=""><?php echo app('translator')->get('common.select_section'); ?> 
                                        </option>
                                    </select>
                                    <?php if($errors->has('section')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('section')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if(moduleStatusCheck('University')): ?>
        <?php if ($__env->exists('university::exam.exam_routine_view')) echo $__env->make('university::exam.exam_routine_view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/examination/exam_schedule.blade.php ENDPATH**/ ?>