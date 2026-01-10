<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('exam.exam_schedule'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .main-title h3 {
            position: absolute;
            top: 100% !important;
        }
        table.dataTable thead th {
            padding-left: 30px !important;
        }
        table.dataTable tbody th, table.dataTable tbody td {
            padding: 20px 10px 20px 20px !important;
        }
        table.dataTable thead .sorting_asc::after,
        table.dataTable thead .sorting::after,
        table.dataTable thead .sorting_desc::after{
            top: 10px !important;
            left: 15px !important;
        }
        .dataTables_wrapper {
            margin-top: 50px !important;
        } 
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam_schedule'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam_schedule'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
            <div class="white-box">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'parent_exam_schedule_search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                                <div class="row">
                                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    <input type="hidden" name="student_id"  value="<?php echo e($student_id); ?>">
                                    <div class="col-lg-6 mt-30-md">
                                        <select class="primary_select form-control<?php echo e($errors->has('exam') ? ' is-invalid' : ''); ?>" name="exam">
                                            <option data-display="Select Exam *" value=""><?php echo app('translator')->get('exam.select_exam'); ?> *</option>
                                                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($record->Exam): ?>
                                                <?php $__currentLoopData = $record->Exam->unique(function ($item) {
                                                    return $item->exam_type_id.$item->class_id.$item->section_id;
                                                }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($exam->id); ?>" <?php echo e(isset($exam_id)? (@$exam->id == @$exam_id? 'selected':''):''); ?>><?php echo e($exam->examType->title); ?> - <?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>)</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('exam')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('exam')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="col-lg-6 text-right">
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
        </div>
    </section>
<?php if(isset($assign_subjects)): ?>
<section class="mt-20">
    <div class="container-fluid p-0">
        <div class="white-box mt-40">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-15"><?php echo app('translator')->get('exam.exam_routine'); ?></h3>
                    </div>
                </div>
                <div class="col-lg-6 pull-right">
                    <div class="main-title">
                        <div class="print_button pull-right mb-15">
                            <a href="<?php echo e(route('parent-routine-print', [$class_id, $section_id,$exam_type_id])); ?>" class="primary-btn small fix-gr-bg pull-left" target="_blank"><i class="ti-printer"> </i> <?php echo app('translator')->get('common.print'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
    
    
            <div class="row">
                <div class="col-lg-12">
                    <table id="table_id" class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width:10%;" >
                                    <?php echo app('translator')->get('exam.date_&_day'); ?>
                                </th>
                                <th><?php echo app('translator')->get('common.subject'); ?></th>
                                <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                <th><?php echo app('translator')->get('common.teacher'); ?></th>         
                                <th><?php echo app('translator')->get('common.time'); ?></th>  
                                <th><?php echo app('translator')->get('common.duration'); ?></th>         
                                <th><?php echo app('translator')->get('common.room'); ?></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $exam_routines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date => $exam_routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td ><?php echo e(dateConvert($exam_routine->date)); ?> <br><?php echo e(Carbon::createFromFormat('Y-m-d', $exam_routine->date)->format('l')); ?></td>
                                <td>
                                  <strong> <?php echo e($exam_routine->subject ? $exam_routine->subject->subject_name :''); ?> </strong>  <?php echo e($exam_routine->subject ? '('.$exam_routine->subject->subject_code .')':''); ?>

                                </td>
                                <td><?php echo e($exam_routine->class ? $exam_routine->class->class_name :''); ?> <?php echo e($exam_routine->section ? '('. $exam_routine->section->section_name .')':''); ?></td>
                                <td><?php echo e($exam_routine->teacher ? $exam_routine->teacher->full_name :''); ?></td>
                               
                                <td> <?php echo e(date('h:i A', strtotime(@$exam_routine->start_time))); ?> - <?php echo e(date('h:i A', strtotime(@$exam_routine->end_time))); ?> </td>
                                <td>
                                    <?php
                                      $duration=strtotime($exam_routine->end_time)-strtotime($exam_routine->start_time); 
                                    ?>
                             
                                 <?php echo e(timeCalculation($duration)); ?>

                                </td>
                               
                                <td><?php echo e($exam_routine->classRoom ? $exam_routine->classRoom->room_no :''); ?></td>
                               
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/parentPanel/parent_exam_schedule.blade.php ENDPATH**/ ?>