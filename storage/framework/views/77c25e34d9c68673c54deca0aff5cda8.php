<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.marks_register'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.marks_register'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.marks_register'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
        <div class="row">
            <div class="col-lg-12">              
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-sm-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    <?php if(userPermission('marks_register_create')): ?>
                        <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg col-sm-6 text_sm_right">
                            <a href="<?php echo e(route('marks_register_create')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('exam.add_marks'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'marks_register_search', 'method' => 'POST', 'id' => 'search_student'])); ?>

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

                                        <div class="col-lg-3 mt-30" id="select_exam_typ_subject_div">
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

                                        <div class="col-lg-3 mt-30" id="select_un_exam_type_subject_div">
                                            <?php echo e(Form::select('subject_id',[""=>__('exam.select_subject').'*'], null , ['class' => 'primary_select  form-control'. ($errors->has('subject_id') ? ' is-invalid' : ''), 'id'=>'select_un_exam_type_subject'])); ?>

                                            
                                            <div class="pull-right loader loader_style" id="select_exam_subject_loader">
                                                <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                            </div>
                                            <?php if($errors->has('subject_id')): ?>
                                                <span class="text-danger custom-error-message" role="alert">
                                                    <?php echo e(@$errors->first('subject_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-3 mt-30-md">
                                    <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                        <option data-display="<?php echo app('translator')->get('exam.select_exam'); ?> *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($exam->id); ?>"
                                                <?php echo e(isset($exam_id) ? ($exam_id == $exam->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e($exam->title); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('exam')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('exam')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3 mt-30-md">
                                    <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="class_subject" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?> *</option>
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
                                
                                <div class="col-lg-3 mt-30-md" id="select_class_subject_div">
                                    <select class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?> select_class_subject" id="select_class_subject" name="subject">
                                        <option data-display="<?php echo app('translator')->get('exam.select_subject'); ?> *" value=""><?php echo app('translator')->get('exam.select_subject'); ?> *</option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_subject_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    <?php if($errors->has('subject')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('subject')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-3 mt-30-md" id="m_select_subject_section_div">
                                    <select class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> m_select_subject_section" id="m_select_subject_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> " value=" "><?php echo app('translator')->get('common.select_section'); ?> </option>
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
        <?php if(isset($marks_registers)): ?>
            <?php if(moduleStatusCheck('University')): ?>
                <div class="row mt-40">
                    <div class="col-lg-12 no-gutters mb-30">
                        <div class="main-title">
                            <h3><?php echo app('translator')->get('exam.marks_register'); ?> | <strong><?php echo app('translator')->get('exam.subject'); ?></strong>: <?php echo e($subjectName->subject_name); ?></h3>
                            <?php if ($__env->exists('university::exam._university_info')) echo $__env->make('university::exam._university_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table school-table-style" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th rowspan="2" ><?php echo app('translator')->get('student.admission_no'); ?>.</th>
                                    <th rowspan="2" ><?php echo app('translator')->get('student.roll_no'); ?>.</th>
                                    <th rowspan="2" ><?php echo app('translator')->get('common.student'); ?></th>
                                    <th colspan="<?php echo e(@$number_of_exam_parts); ?>"> <?php echo e(@$subjectName->subject_name); ?></th>
                                </tr>
                                <tr>
                                    <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th><?php echo e(@$part->exam_title); ?> ( <?php echo e(@$part->exam_mark); ?> ) </th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo app('translator')->get('common.teacher'); ?> <?php echo app('translator')->get('reports.remarks'); ?></th>
                                </tr>
                            </thead>
                            <tbody>                        
                                <?php $colspan = 3; $counter = 0;  ?>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($student->student->admission_no); ?></td>
                                    <td><?php echo e(@$student->roll_no); ?></td>
                                    <td><?php echo e(@$student->student->full_name); ?></td>
                                    <?php $entry_form_count=0; ?>
                                    <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $search_mark = App\SmMarkStore::un_get_mark_by_part($student->student_id, $request, $exam_type, $subject_id, $part->id, $student->id);
                                    ?>
                                        <td><?php echo e($search_mark); ?></td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                        $teacher_remarks = App\SmMarkStore::un_teacher_remarks($student->student_id, $exam_type, $request, $subject_id, $student->id); 
                                    ?>
                                    <td><?php echo e($teacher_remarks); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="row mt-40">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('exam.marks_register'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">



                <div class="row">
                    <div class="col-lg-12">
                        <table class="table school-table-style" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th rowspan="2" ><?php echo app('translator')->get('student.admission_no'); ?>.</th>
                                    <th rowspan="2" ><?php echo app('translator')->get('student.roll_no'); ?>.</th>
                                    <th rowspan="2" ><?php echo app('translator')->get('common.student'); ?></th>
                                    <th colspan="<?php echo e(@$number_of_exam_parts); ?>"> <?php echo e(@$subjectNames->subject_name); ?></th> 
                                    <th rowspan="2"><?php echo app('translator')->get('exam.is_present'); ?></th>
                                </tr>
                                <tr>
                                    <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e(@$part->exam_title); ?> ( <?php echo e(@$part->exam_mark); ?> ) </th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>                        
                                <?php $colspan = 3; $counter = 0;  ?>
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($student->admission_no); ?>

                                        <input type="hidden" name="student_ids[]" value="<?php echo e(@$student->id); ?>">
                                        <input type="hidden" name="student_rolls[<?php echo e(@$student->id); ?>]" value="<?php echo e(@$student->roll_no); ?>">
                                        <input type="hidden" name="student_admissions[<?php echo e(@$student->id); ?>]" value="<?php echo e(@$student->admission_no); ?>">
                                    </td>
                                    <td><?php echo e(@$student->roll_no); ?></td>
                                    <td><?php echo e(@$student->full_name); ?></td>
                                    <?php $entry_form_count=0; ?>
                                    <?php $__currentLoopData = $marks_entry_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <div class="primary_input mt-10">
                                        <input type="hidden" name="exam_setup_ids[]" value="<?php echo e(@$part->id); ?>">
        
                                            <input oninput="numberCheckWithDot(this)" class="primary_input_field marks_input" type="text" name="marks[<?php echo e(@$student->id); ?>][<?php echo e(@$part->id); ?>]" value="0" max="100">
                                            <input class="primary_input_field marks_input" type="hidden" name="exam_Sids[<?php echo e(@$student->id); ?>][<?php echo e(@$entry_form_count++); ?>]" value="0">
                                            <label><?php echo e(@$part->exam_title); ?> <?php echo app('translator')->get('exam.mark'); ?></label>
                                            
                                        </div>                                
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <div class="primary_input">
                                            <input type="checkbox" id="subject_<?php echo e(@$student->id); ?>_<?php echo e(@$student->admission_no); ?>" class="common-checkbox" name="abs[<?php echo e(@$student->id); ?>]" value="1">
                                            <label for="subject_<?php echo e(@$student->id); ?>_<?php echo e(@$student->admission_no); ?>"><?php echo app('translator')->get('common.yes'); ?></label>
                                        </div>
                                            
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </tbody>
                        </table>

                        
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
            

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/examination/masks_register.blade.php ENDPATH**/ ?>