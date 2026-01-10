<?php $__env->startSection('title'); ?>
<?php echo e($student_detail->first_name.' '.$student_detail->last_name); ?> <?php echo app('translator')->get('common.subjects'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<?php $__env->startPush('css'); ?>
<style>
    table.dataTable tbody th, table.dataTable tbody td {
        padding-left: 20px !important;
    }

    table.dataTable thead th {
        padding-left: 34px !important;
    }

    table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting:after,table.dataTable thead .sorting_desc:after {
        left: 16px;
        top: 10px;
    }
</style>
<?php $__env->stopPush(); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('common.subjects'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="<?php echo e(route('parent_subjects', [$student_detail->id])); ?>"><?php echo app('translator')->get('common.subjects'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
       
        <div class="row">
            <div class="col-lg-12 student-details up_admin_visitor">
                <div class="white-box">
                    <ul class="nav nav-tabs tabs_scroll_nav mt-0" role="tablist">

                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <li class="nav-item mb-0">
                            <a class="nav-link mb-0 <?php if($key== 0): ?> active <?php endif; ?> " href="#tab<?php echo e($key); ?>" role="tab" data-toggle="tab">
                                <?php if(moduleStatusCheck('University')): ?> 
                                    <?php echo e($record->semesterLabel->name); ?> (<?php echo e($record->unSection->section_name); ?>) - <?php echo e(@$record->unAcademic->name); ?>

                               <?php else: ?>
                                    <?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>) 
                                <?php endif; ?> 
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                    </ul>
    
                     
                    <!-- Tab panes -->
                    <div class="tab-content mt-10">
                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <div role="tabpanel" class="tab-pane fade  <?php if($key== 0): ?> active show <?php endif; ?>" id="tab<?php echo e($key); ?>">
                                <div class="row mt-60">
                                    <div class="col-lg-12">
                                        <table id="table_id" class="table" cellspacing="0" width="100%">
    
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('common.subject'); ?></th>
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                    <th><?php echo app('translator')->get('university::un.number_of_hours'); ?></th>
                                                    <?php endif; ?> 
                                                    <th><?php echo app('translator')->get('common.teacher'); ?></th>
                                                    <th><?php echo app('translator')->get('academics.subject_type'); ?></th>
                                                </tr>
                                            </thead>
    
                                            <?php 
                                            if(moduleStatusCheck('University')){
                                                $subjects = $record->UnAssignSubject;
                                            }else{
                                                $subjects = $record->AssignSubject ;
                                            }
                                            ?>
                
                                            <tbody>
                                                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignSubject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(@$assignSubject->subject!=""?@$assignSubject->subject->subject_name:""); ?> - ( <?php echo e(@$assignSubject->subject->subject_code); ?> )</td>
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                    <td><?php echo e(@$assignSubject->subject->number_of_hours); ?></td>
                                                    <?php endif; ?>
    
                                                    <td><?php echo e(@$assignSubject->teacher!=""?@$assignSubject->teacher->full_name:""); ?></td>
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                    <td>
                                                        <?php echo e(@$assignSubject->subject->subject_type); ?>

                                                    </td>
                                                    <?php else: ?>
                                                    <td>
                                                        <?php if(!empty(@$assignSubject->subject)): ?>
                                                        <?php echo e(@$assignSubject->subject->subject_type == "T"? 'Theory': 'Practical'); ?>

                                                        <?php endif; ?>
                                                    </td>
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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/parentPanel/subject.blade.php ENDPATH**/ ?>