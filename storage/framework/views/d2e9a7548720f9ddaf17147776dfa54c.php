<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('examplan::exp.generate_seat_plan'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1> <?php echo app('translator')->get('examplan::exp.generate_seat_plan'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('examplan::exp.exam_plan'); ?></a>
                    <a href="#"><?php echo app('translator')->get('examplan::exp.generate_seat_plan'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'examplan.seatplan.search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => ['USN', 'UD', 'UA', 'US', 'USL', 'USUB']]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['required' => ['USN', 'UD', 'UA', 'US', 'USL', 'USUB']]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="col-lg-3 mt-15" id="select_exam_typ_subject_div">
                                    <label for=""><?php echo app('translator')->get('exam.select_exam'); ?> *</label>
                                    <?php echo e(Form::select('exam_type', ['' => __('exam.select_exam') . '*'], null, ['class' => 'primary_select  form-control' . ($errors->has('exam_type') ? ' is-invalid' : ''), 'id' => 'select_exam_typ_subject'])); ?>


                                    <div class="pull-right loader loader_style" id="select_exam_type_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                            alt="loader">
                                    </div>
                                    <?php if($errors->has('exam')): ?>
                                        <span class="text-danger custom-error-message" role="alert">
                                            <?php echo e(@$errors->first('exam')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <div class="col-lg-4 mt-30-md">
                                    <select
                                        class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>"
                                        name="exam" id="exam">
                                        <option data-display="<?php echo app('translator')->get('common.select_exam'); ?> *" value=""><?php echo app('translator')->get('common.select_exam'); ?> *
                                        </option>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($exam->id); ?>"
                                                <?php echo e(isset($exam_id) ? ($exam_id == $exam->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e($exam->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php if($errors->has('exam')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e(@$errors->first('exam')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-md" id="id-card-div">
                                    <select
                                        class="primary_select  form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                        id="select_class" name="class">
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value=""><?php echo app('translator')->get('common.select_class'); ?>
                                        </option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>"
                                                <?php echo e(isset($class_id) ? ($class_id == $class->id ? 'selected' : '') : ''); ?>>
                                                <?php echo e(@$class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('class')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-4 mt-30-md" id="select_section_div">
                                    <select
                                        class="primary_select  form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                        id="select_section" name="section">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value=""><?php echo app('translator')->get('common.select_section'); ?></option>
                                    </select>
                                    <div class="pull-right loader loader_style" id="select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                            alt="loader">
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
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </section>


    <?php if(isset($records)): ?>
        <section class="admin-visitor-area up_admin_visitor">
            <div class="container-fluid p-0">
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'examplan.seatplan.generate', 'method' => 'POST', 'target' => '_blank', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-lg-2 no-gutters">
                                            <div class="main-title">
                                                <h3 class="mb-15"><?php echo app('translator')->get('common.student_list'); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <input type="hidden" name="exam_type_id" value="<?php echo e($exam_id); ?>">
                                        <table class="table school-table-style" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="10%">
                                                        <input type="checkbox" id="checkAll" class="common-checkbox"
                                                            name="checkAll">
                                                        <label for="checkAll"> <?php echo app('translator')->get('common.all'); ?></label>
                                                    </th>
                                                    <th width="20%"><?php echo app('translator')->get('student.student_name'); ?></th>
                                                    <th width="10%"><?php echo app('translator')->get('student.admission_no'); ?></th>
                                                    <th width="15%">
                                                        <?php if(moduleStatusCheck('University')): ?> <?php echo app('translator')->get('university::un.semester_label'); ?> <?php else: ?> <?php echo app('translator')->get('common.class'); ?> <?php endif; ?>
                                                    </th>
                                                    <th width="15%"><?php echo app('translator')->get('student.father_name'); ?></th>
                                                    <th width="10%"><?php echo app('translator')->get('student.category'); ?></th>
                                                    <th width="5%"><?php echo app('translator')->get('common.gender'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
    
                                                            <input type="checkbox" id="student.<?php echo e($student->id); ?>"
                                                                <?php if(in_array($student->id, $seat_plan_ids)): ?> checked <?php endif; ?>
                                                                class="common-checkbox"
                                                                name="data[<?php echo e($loop->index); ?>][checked]" value="1">
                                                            <label for="student.<?php echo e($student->id); ?>"></label>
                                                        </td>
                                                        <input type="hidden"
                                                            name="data[<?php echo e($loop->index); ?>][student_record_id]"
                                                            value="<?php echo e(@$student->id); ?>">
    
                                                        <td><?php echo e($student->studentDetail->full_name); ?></td>
                                                        <td><?php echo e($student->studentDetail->admission_no); ?></td>
                                                        <?php if(moduleStatusCheck('University')): ?>
                                                        <td><?php echo e($student->class != '' ? @$student->unSemesterLabel->name : ''); ?> (<?php echo e('(' . $student->section != '' ? $student->section->section_name : '' . ')'); ?>) </td>
                                                        <?php else: ?>
                                                        <td><?php echo e($student->class != '' ? @$student->class->class_name : ''); ?> (<?php echo e('(' . $student->section != '' ? $student->section->section_name : '' . ')'); ?>) </td>
                                                        <?php endif; ?>
                                                        <td><?php echo e($student->studentDetail->parents != '' ? $student->studentDetail->parents->fathers_name : ''); ?>

                                                        </td>
                                                        <td><?php echo e($student->studentDetail->category != '' ? $student->studentDetail->category->category_name : ''); ?>

                                                        </td>
                                                        <td><?php echo e($student->studentDetail->gender != '' ? $student->studentDetail->gender->base_setup_name : ''); ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-lg-12 text-center">
            
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title=""
                                                data-original-title="">
                                                <span class="ti-check"></span>
                                                <?php echo app('translator')->get('examplan::exp.generate_seat_plan'); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->startSection('script'); ?>
    <script></script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/ExamPlan\Resources/views/seatPlan.blade.php ENDPATH**/ ?>