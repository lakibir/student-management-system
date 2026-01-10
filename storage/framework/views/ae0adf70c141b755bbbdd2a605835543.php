<div class="row">
    <input type="hidden" id="classToSectionRoute" value="<?php echo e(route('fees.ajax-get-all-section')); ?>">
    <input type="hidden" id="sectionToStudentRoute" value="<?php echo e(route('fees.ajax-section-all-student')); ?>">
    <input type="hidden" id="classToStudentRoute" value="<?php echo e(route('fees.ajax-get-all-student')); ?>">
    <div class="col-lg-3 mt-30-md">
        <label class="primary_input_label" for="">
            <?php echo e(__('common.date_range')); ?>

                <span class="text-danger"></span>
        </label>
        <input class="primary_input_field primary_input_field form-control" type="text" name="date_range" value="">
    </div>

    <div class="col-lg-3 mt-30-md">
        <label class="primary_input_label" for="">
            <?php echo e(__('common.class')); ?>

                <span class="text-danger"></span>
        </label>
        <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="feesSelectClass" name="class">
            <option data-display="<?php echo app('translator')->get('common.select_class'); ?>" value=""><?php echo app('translator')->get('common.select_class'); ?></option>
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($class->id); ?>" <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected':''):''); ?>><?php echo e($class->class_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('class')): ?>
        <span class="text-danger invalid-select" role="alert">
            <?php echo e($errors->first('class')); ?>

        </span>
        <?php endif; ?>
    </div>

    <div class="col-lg-3 mt-30-md" id="feesSectionDiv">
        <label class="primary_input_label" for="">
            <?php echo e(__('common.section')); ?>

                <span class="text-danger"> </span>
        </label>
        <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>" id="feesSection" name="section">
            <option data-display="<?php echo app('translator')->get('common.select_section'); ?>" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
        </select>
        <div class="pull-right loader loader_style" id="select_section_loader">
            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
        </div>
        <?php if($errors->has('section')): ?>
            <span class="text-danger invalid-select" role="alert">
                <?php echo e($errors->first('section')); ?>

            </span>
        <?php endif; ?>
    </div>

    <div class="col-lg-3 mt-30-md" id="selectStudentDiv">
        <label class="primary_input_label" for="">
            <?php echo e(__('common.student')); ?>

                <span class="text-danger"> </span>
        </label>
        <select class="primary_select form-control<?php echo e($errors->has('student') ? ' is-invalid' : ''); ?>" id="selectStudent" name="student">
            <option data-display="<?php echo app('translator')->get('common.select_student'); ?>" value=""><?php echo app('translator')->get('common.select_student'); ?></option>
        </select>
        <div class="pull-right loader loader_style" id="student_section_loader">
            <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
        </div>
        <?php if($errors->has('student')): ?>
            <span class="text-danger invalid-select" role="alert">
                <?php echo e($errors->first('student')); ?>

            </span>
        <?php endif; ?>
    </div>

    <div class="col-lg-12 mt-20 text-right">
        <button type="submit" class="primary-btn small fix-gr-bg">
            <span class="ti-search pr-2"></span>
            <?php echo app('translator')->get('common.search'); ?>
        </button>
    </div>
</div><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/Fees\Resources/views/report/_searchForm.blade.php ENDPATH**/ ?>