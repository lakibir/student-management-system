<?php
    $div = isset($div) ? $div : 'col-lg-3';
    $mt = isset($mt) ? $mt : 'mt-30-md';
    $required = $required ?? [];
    $selected = isset($selected) ? $selected : null;
    
    $class_id = $selected && in_array('class_id', $selected) ? $selected['class_id'] : null;
    $section_id = $selected && in_array('section_id', $selected) ? $selected['section_id'] : null;
    $subject_id = $selected && in_array('subject_id', $selected) ? $selected['subject_id'] : null;
    $sections = $class_id ? sections($class_id) : null;
    $subjects = $class_id && $section_id ? subjects($class_id, $section_id) : null;
    $visiable = $visiable ?? [];
?>

<?php if(in_array('class', $visiable)): ?>
<div class="<?php echo e($div . ' ' . $mt); ?>">
    <label class="primary_input_label" for=""><?php echo e(__('common.class')); ?>

        <span class="text-danger"><?php echo e(in_array('class', $required) ? '*' : ''); ?></span>
    </label>
    <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class"
        name="class_id">
        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> <?php echo e(in_array('class', $required) ? ' *' : ''); ?>" value="">
            <?php echo app('translator')->get('common.select_class'); ?> <?php echo e(in_array('class', $required) ? ' *' : ''); ?></option>
        <?php if(isset($classes)): ?>
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($class->id); ?>"
                    <?php echo e(isset($class_id) ? ($class_id == $class->id ? 'selected' : '') : ''); ?>>
                    <?php echo e($class->class_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>

    <?php if($errors->has('class')): ?>
        <span class="text-danger invalid-select" role="alert">
            <?php echo e($errors->first('class')); ?>

        </span>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php if(in_array('section', $visiable)): ?>
<div class="<?php echo e($div . ' ' . $mt); ?>" id="select_section_div">
    <label class="primary_input_label" for=""><?php echo e(__('common.section')); ?>

        <span class="text-danger"><?php echo e(in_array('section', $required) ? '*' : ''); ?></span>
    </label>
    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section"
        id="select_section" name="section_id">
        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> <?php echo e(in_array('section', $required) ? '*' : ''); ?>" value="">
            <?php echo app('translator')->get('common.select_section'); ?> <?php echo e(in_array('section', $required) ? '*' : ''); ?></option>
        <?php if(isset($sections)): ?>
            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($section->id); ?>"
                    <?php echo e(isset($section_id) ? ($section_id == $section->section_id ? 'selected' : '') : ''); ?>>
                    <?php echo e($section->sectionName->section_name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
    <div class="pull-right loader" id="select_section_loader" style="margin-top: -30px;padding-right: 21px;">
        <img src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="" style="width: 28px;height:28px;">
    </div>
    <?php if($errors->has('section')): ?>
        <span class="text-danger invalid-select" role="alert">
            <?php echo e($errors->first('section')); ?>

        </span>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if(in_array('subject', $visiable)): ?>
<div class="<?php echo e($div . ' ' . $mt); ?>" id="select_subject_div">
    <label class="primary_input_label" for=""><?php echo e(__('common.subject')); ?>

        <span class="text-danger"><?php echo e(in_array('subject', $required) ? '*' : ''); ?></span>
    </label>
    <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_subject"
        id="select_subject" name="subject_id">
        <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> <?php echo e(in_array('subject', $required) ? ' *' : ''); ?>" value="">
            <?php echo app('translator')->get('common.select_subjects'); ?> <?php echo e(in_array('subject', $required) ? ' *' : ''); ?></option>
        <?php if(isset($subjects)): ?>
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($subject->subject_id); ?>"
                    <?php echo e(isset($subject_id) ? ($subject_id == $subject->subject_id ? 'selected' : '') : ''); ?>>
                    <?php echo e($subject->subject->subject_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
    <div class="pull-right loader" id="select_subject_loader" style="margin-top: -30px;padding-right: 21px;">
        <img src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="" style="width: 28px;height:28px;">
    </div>
    <?php if($errors->has('subject')): ?>
        <span class="text-danger invalid-select" role="alert">
            <?php echo e($errors->first('subject')); ?>

        </span>
    <?php endif; ?>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/common/class_section_subject.blade.php ENDPATH**/ ?>