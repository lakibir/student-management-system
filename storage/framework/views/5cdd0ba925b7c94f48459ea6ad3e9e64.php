<?php $__env->startSection('title'); ?> 
<?php $__env->startPush('css'); ?>
    <style>
        .check_box_table .QA_table .table tbody td:first-child {
            padding-left: 25px !important;
        }
        .check_box_table .QA_table .table tbody td:nth-child(2) {
            padding-left: 10px !important;
        }

        @media (max-width: 767px){
    .dataTables_filter label{
        top: -25px!important;
        width: 100%;
        }
    }

        @media screen and (max-width: 640px) {
            div.dt-buttons {
                display: none;
            }

            .dataTables_filter label{
                top: -60px!important;
                width: 100%;
                float: right;
            }
            .main-title{
                margin-bottom: 40px
            }
        }

    </style>
<?php $__env->stopPush(); ?>
<?php echo app('translator')->get('dormitory.dormitory'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('dormitory.dormitory'); ?> </h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href=""><?php echo app('translator')->get('dormitory.dormitory'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        
        <div class="row">
            <div class="col-lg-3 mb-30">
                <!-- Start Student Meta Information -->
                    <?php if(moduleStatusCheck('University')): ?>
                        <?php if ($__env->exists('university::promote.inc.student_profile',['student_detail'=>$student_detail->defaultClass])) echo $__env->make('university::promote.inc.student_profile',['student_detail'=>$student_detail->defaultClass], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php if ($__env->exists('backEnd.studentInformation.inc.student_profile')) echo $__env->make('backEnd.studentInformation.inc.student_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
              
                <!-- End Student Meta Information -->

            </div>
            <div class="col-lg-9 mt-40">

                <div class="white-box">
                    <div class="row mt-40">
                        <div class="col-lg-12">
                            <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                <table id="table_id" class="table" cellspacing="0" width="100%">
    
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('dormitory.dormitory'); ?></th>
                                            <th><?php echo app('translator')->get('dormitory.room_name'); ?></th>
                                            <th><?php echo app('translator')->get('dormitory.room_type'); ?></th>
                                            <th><?php echo app('translator')->get('dormitory.no_of_bed'); ?></th>
                                            <th><?php echo app('translator')->get('common.status'); ?></th>
                                            <th><?php echo app('translator')->get('dormitory.cost_per_bed'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php $__currentLoopData = $room_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(isset($room_list->dormitory->dormitory_name)? $room_list->dormitory->dormitory_name:''); ?></td>
                                                <td><?php echo e($room_list->name); ?></td>
                                                <td><?php echo e(isset($room_list->roomType->type)? $room_list->roomType->type: ''); ?></td>
                                                <td><?php echo e($room_list->number_of_bed); ?></td>
                                                <td>
                                                    <?php if($student_detail->room_id == $room_list->id): ?>
                                                        <button class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('dormitory.assigned'); ?></button>
                                                    <?php endif; ?>
    
                                                </td>
                                                <td><?php echo e($room_list->cost_per_bed); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/parentPanel/dormitory.blade.php ENDPATH**/ ?>