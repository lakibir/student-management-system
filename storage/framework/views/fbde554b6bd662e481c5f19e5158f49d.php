<?php $__env->startSection('title'); ?>
    <?php echo e($student_detail->first_name . ' ' . $student_detail->last_name); ?> <?php echo app('translator')->get('student.teacher_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <style>
            table.dataTable tbody th,
            table.dataTable tbody td {
                padding-left: 20px !important;
            }

            table.dataTable thead th {
                padding-left: 34px !important;
            }

            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting_desc:after {
                left: 16px;
                top: 10px;
            }

            .star-rating {
                display: flex;
                flex-direction: row-reverse;
                font-size: 1.5em;
                justify-content: space-around;
                text-align: center;
                width: 5em;
            }

            .star-rating input {
                display: none;
            }

            .star-rating label {
                color: #ccc;
                cursor: pointer;
            }

            .star-rating :checked~label {
                color: #f90;
            }

            article {
                background-color: #ffe;
                box-shadow: 0 0 1em 1px rgba(0, 0, 0, .25);
                color: #006;
                font-family: cursive;
                font-style: italic;
                margin: 4em;
                max-width: 30em;
                padding: 2em;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('student.teacher_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href=""><?php echo app('translator')->get('student.teacher_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs_scroll_nav ml-0" role="tablist">

                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item mb-0">
                                    <a class="nav-link mb-0 <?php if($key == 0): ?> active <?php endif; ?> "
                                        href="#tab<?php echo e($key); ?>" role="tab"
                                        data-toggle="tab"><?php echo e($record->class->class_name); ?>

                                        (<?php echo e($record->section->section_name); ?>)
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div role="tabpanel" class="tab-pane fade  <?php if($key == 0): ?> active show <?php endif; ?>"
                                    id="tab<?php echo e($key); ?>">
                                    <div class="row mt-60">
                                        <div class="col-lg-12">
                                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="15%"><?php echo app('translator')->get('hr.teacher_name'); ?></th>
                                                        <th width="10%"><?php echo app('translator')->get('common.subject'); ?></th>
                                                        <?php if(generalSetting()->teacher_email_view): ?>
                                                            <th><?php echo app('translator')->get('common.email'); ?></th>
                                                        <?php endif; ?>
                                                        <?php if(generalSetting()->teacher_phone_view): ?>
                                                            <th><?php echo app('translator')->get('common.phone'); ?></th>
                                                        <?php endif; ?>
                                                        <?php if($teacherEvaluationSetting->is_enable == 0): ?>
                                                            <?php if(in_array('3', $teacherEvaluationSetting->submitted_by)): ?>
                                                                <?php if(date('m/d/Y') >= date('m/d/Y', strtotime($teacherEvaluationSetting->from_date)) &&
                                                                        date('m/d/Y') <= date('m/d/Y', strtotime($teacherEvaluationSetting->to_date))): ?>
                                                                    <th width="15%"><?php echo app('translator')->get('teacherEvaluation.rate'); ?></th>
                                                                    <th width="50%"><?php echo app('translator')->get('teacherEvaluation.comment'); ?></th>
                                                                    <th width="10%"><?php echo app('translator')->get('common.action'); ?></th>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $record->StudentTeacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <img src="<?php echo e(file_exists(@$value->teacher->staff_photo) ? asset(@$value->teacher->staff_photo) : asset('public/uploads/staff/demo/staff.jpg')); ?>"
                                                                    class="img img-thumbnail"
                                                                    style="width: 60px; height: auto;">
                                                                <?php echo e(@$value->teacher != '' ? @$value->teacher->full_name : ''); ?>

                                                            </td>
                                                            <td><?php echo e($value->subject->subject_name); ?></td>
                                                            <?php if(generalSetting()->teacher_email_view): ?>
                                                                <td><?php echo e(@$value->teacher != '' ? @$value->teacher->email : ''); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if(generalSetting()->teacher_phone_view): ?>
                                                                <td><?php echo e(@$value->teacher != '' ? @$value->teacher->mobile : ''); ?>

                                                                </td>
                                                            <?php endif; ?>
                                                            <?php if($teacherEvaluationSetting->is_enable == 0): ?>
                                                                <?php if(in_array('3', $teacherEvaluationSetting->submitted_by)): ?>
                                                                    <?php if(date('m/d/Y') >= date('m/d/Y', strtotime($teacherEvaluationSetting->from_date)) &&
                                                                            date('m/d/Y') <= date('m/d/Y', strtotime($teacherEvaluationSetting->to_date))): ?>
                                                                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'teacher-evaluation-submit', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'infix_form'])); ?>

                                                                        <input type="hidden" name="teacher_id"
                                                                            value="<?php echo e($value->teacher_id); ?>">
                                                                        <input type="hidden" name="record_id"
                                                                            value="<?php echo e($record->id); ?>">
                                                                        <input type="hidden" name="student_id"
                                                                            value="<?php echo e($record->studentDetail->id); ?>">
                                                                        <input type="hidden" name="parent_id"
                                                                            value="<?php echo e($record->studentDetail->parents->id); ?>">
                                                                        <input type="hidden" name="subject_id"
                                                                            value="<?php echo e($value->subject->id); ?>">
                                                                        <td>
                                                                            <div class="star-rating">
                                                                                <input type="radio"
                                                                                    id="5-stars<?php echo e($value->id); ?>"
                                                                                    name="rating" value="5" />
                                                                                <label for="5-stars<?php echo e($value->id); ?>"
                                                                                    class="star">&#9733;</label>
                                                                                <input type="radio"
                                                                                    id="4-stars<?php echo e($value->id); ?>"
                                                                                    name="rating" value="4" />
                                                                                <label for="4-stars<?php echo e($value->id); ?>"
                                                                                    class="star">&#9733;</label>
                                                                                <input type="radio"
                                                                                    id="3-stars<?php echo e($value->id); ?>"
                                                                                    name="rating" value="3" />
                                                                                <label for="3-stars<?php echo e($value->id); ?>"
                                                                                    class="star">&#9733;</label>
                                                                                <input type="radio"
                                                                                    id="2-stars<?php echo e($value->id); ?>"
                                                                                    name="rating" value="2" />
                                                                                <label for="2-stars<?php echo e($value->id); ?>"
                                                                                    class="star">&#9733;</label>
                                                                                <input type="radio"
                                                                                    id="1-star<?php echo e($value->id); ?>"
                                                                                    name="rating" value="1" />
                                                                                <label for="1-star<?php echo e($value->id); ?>"
                                                                                    class="star">&#9733;</label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="primary_input">
                                                                                <input
                                                                                    class="primary_input_field read-only-input form-control"
                                                                                    type="text" name="comment">
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <button type="submit"
                                                                                class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('common.save'); ?></button>
                                                                        </td>
                                                                        <?php echo e(Form::close()); ?>

                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/parentPanel/teacher_list.blade.php ENDPATH**/ ?>