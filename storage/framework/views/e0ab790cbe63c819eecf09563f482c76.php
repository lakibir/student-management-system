

      <div class="row mt-25 mb-25">
          <div class="col-lg-12">
            <label> <?php echo app('translator')->get('exam.exam_type'); ?> <span class="text-danger"> *</span></label>
              <select class="primary_select form-control <?php echo e($errors->has('exams_type') ? ' is-invalid' : ''); ?>" id="exam_class" name="exams_type">
                  <option data-display="<?php echo app('translator')->get('common.select_exam_type'); ?> *" value=""><?php echo app('translator')->get('common.select_exam_type'); ?> *</option>
                  <?php $__currentLoopData = $exams_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exams_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e(@$exams_type->id); ?>"><?php echo e(@$exams_type->title); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <?php if($errors->has('exams_type')): ?>
                  <span class="text-danger invalid-select" role="alert">
                      <?php echo e($errors->first('exams_type')); ?>

                  </span>
              <?php endif; ?>
          </div>
      </div>
      <?php if(moduleStatusCheck('University')): ?>
        <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
        ['required' => 
            ['USN', 'UD', 'UA', 'US', 'USL','USUB'],
            'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>true, 
        ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
        ['required' => 
            ['USN', 'UD', 'UA', 'US', 'USL','USUB'],
            'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>true, 
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php else: ?> 
      <div class="row mt-25">
          <div class="col-lg-12">
            <label> <?php echo app('translator')->get('common.class'); ?> <span class="text-danger"> *</span></label>
              <select class="primary_select form-control <?php echo e($errors->has('class_id') ? ' is-invalid' : ''); ?>" id="classSelectStudentHomeWork" name="class_id">
                  <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
                  <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e(@$class->id); ?>"><?php echo e(@$class->class_name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <?php if($errors->has('class_id')): ?>
                  <span class="text-danger invalid-select" role="alert">
                      <?php echo e($errors->first('class_id')); ?>

                  </span>
              <?php endif; ?>
          </div>
      </div>
      <div class="row mt-25">
          <div class="col-lg-12">
              <div class="primary_input " id="subjectSelecttHomeworkDiv">
                <label> <?php echo app('translator')->get('common.subject'); ?> <span class="text-danger"> *</span></label>
                  <select class="primary_select  form-control<?php echo e($errors->has('subject_id') ? ' is-invalid' : ''); ?>"
                          name="subject_id" id="subjectSelect">
                      <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> *"
                              value=""><?php echo app('translator')->get('common.subject'); ?> *
                      </option>
                  </select>
                  <div class="pull-right loader loader_style" id="select_subject_loader">
                      <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                  </div>
                  
                  <?php if($errors->has('subject_id')): ?>
                      <span class="text-danger invalid-select" role="alert">
                              <?php echo e($errors->first('subject_id')); ?>

                          </span>
                  <?php endif; ?>
              </div>
          </div>
      </div>
      <div class="row mt-25">
          <div class="col-lg-12 " id="selectSectionsDiv" style="margin-top: -25px;">
              <label for="checkbox" class="mb-2 mt-20"><?php echo app('translator')->get('common.section'); ?> <span class="text-danger"> *</span></label>
                  <select multiple="multiple" id="selectSectionss" name="section_ids[]" style="width:300px" class="multypol_check_select active position-relative">
                    
                  </select>
                  
                  <?php if($errors->has('section_ids')): ?>
                      <span class="text-danger invalid-select" role="alert" style="display:block">
                          <strong style="top:-25px"><?php echo e($errors->first('section_id')); ?>

                      </span>
                  <?php endif; ?>
          </div>
      </div>
      <?php endif; ?>


<?php echo $__env->make('backEnd.partials.multi_select_js_without_push', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(".primary_select").niceSelect('destroy');
    $(".primary_select").niceSelect();
</script>


<?php if(moduleStatusCheck('University')): ?>
<script src="<?php echo e(asset('Modules/University/Resources/assets/js/app.js')); ?>"></script>
<?php else: ?> 
<script src="<?php echo e(asset('public/backEnd/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('public/backEnd/js/developer.js')); ?>"></script>
<?php endif; ?> 


  <?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/examination/exam_setup/single_exam_setup.blade.php ENDPATH**/ ?>