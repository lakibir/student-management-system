<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.send_marks_by_sms'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.send_marks_by_sms'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.send_marks_by_sms'); ?></a>
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
                        <div class="col-lg-4 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('exam.send_marks_via_SMS'); ?></h3>
                            </div>
                        </div>
                    </div>

                     <?php if(userPermission('send_marks_by_sms')): ?>

                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'send_marks_by_sms_store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <?php endif; ?>
                    <div class="row">
                        <?php if(moduleStatusCheck('University')): ?>
                                    

                             <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                             ['required' => ['USN','UF', 'UD', 'UA', 'US', 'USL', 'USEC'], 
                             'hide' => ['USUB']
                             ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                             ['required' => ['USN','UF', 'UD', 'UA', 'US', 'USL', 'USEC'], 
                             'hide' => ['USUB']
                             ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                             <div class="col-lg-3 mt-15" id="select_exam_typ_subject_div">
                                <label for=""><?php echo app('translator')->get('exam.select_exam'); ?> *</label>
                                 <?php echo e(Form::select('exam_type',[""=>__('exam.select_exam').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('exam_type') ? ' is-invalid' : ''), 'id'=>'select_exam_typ_subject'])); ?>

                                 
                                 <div class="pull-right loader loader_style" id="select_exam_type_loader">
                                     <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                 </div>
                                 <?php if($errors->has('exam')): ?>
                                     <span class="text-danger custom-error-message" role="alert">
                                         <?php echo e(@$errors->first('exam')); ?>

                                     </span>
                                 <?php endif; ?>
                             </div>
                            <div class="col-lg-3 mt-15">
                                <label for=""><?php echo app('translator')->get('exam.select_receiver'); ?> *</label>
                                <select class="primary_select form-control <?php echo e($errors->has('receiver') ? ' is-invalid' : ''); ?>" name="receiver">
                                    <option data-display="<?php echo app('translator')->get('exam.select_receiver'); ?> *" value=""><?php echo app('translator')->get('exam.select_receiver'); ?> *</option>
                                    
                                    <option value="students"  <?php echo e(( old('receiver') == 'students' ? "selected":"")); ?>><?php echo app('translator')->get('student.students'); ?></option>
                                    <?php if(generalSetting()->with_guardian): ?>
                                        <option value="parents"  <?php echo e(( old('receiver') == 'parents' ? "selected":"")); ?>><?php echo app('translator')->get('student.parents'); ?></option>
                                    <?php endif; ?> 
                                </select>
                                <?php if($errors->has('receiver')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('receiver')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <?php else: ?>
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                    <option data-display="<?php echo app('translator')->get('common.select_exam'); ?> *" value=""><?php echo app('translator')->get('common.select_exam'); ?>*</option>
                                    <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exams!=''?$exam->id:''); ?>"><?php echo e($exams!=''?$exam->title:''); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('exam')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('exam')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="class">
                                    <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>"  <?php echo e(( old('class') == $class->id ? "selected":"")); ?>><?php echo e($class->class_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('class')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('class')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 mt-30-md">
                                <select class="primary_select form-control <?php echo e($errors->has('receiver') ? ' is-invalid' : ''); ?>" name="receiver">
                                    <option data-display="<?php echo app('translator')->get('exam.select_receiver'); ?> *" value=""><?php echo app('translator')->get('exam.select_receiver'); ?> *</option>
                                    
                                    <option value="students"  <?php echo e(( old('receiver') == 'students' ? "selected":"")); ?>><?php echo app('translator')->get('student.students'); ?></option>
                                    <?php if(generalSetting()->with_guardian): ?>
                                        <option value="parents"  <?php echo e(( old('receiver') == 'parents' ? "selected":"")); ?>><?php echo app('translator')->get('student.parents'); ?></option>
                                    <?php endif; ?> 
                                </select>
                                <?php if($errors->has('receiver')): ?>
                                <span class="text-danger invalid-select" role="alert">
                                    <?php echo e($errors->first('receiver')); ?>

                                </span>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                 				<?php 
                                  $tooltip = "";
                                  if(userPermission('send_marks_by_sms')){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                            <div class="col-lg-12 mt-30 text-center">
                               <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('exam.send_marks_via_SMS'); ?>
                                </button>
                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/examination/send_marks_by_sms.blade.php ENDPATH**/ ?>