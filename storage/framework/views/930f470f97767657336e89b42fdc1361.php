<?php $__env->startSection('title'); ?>
<?php echo e($student_detail->first_name.' '.$student_detail->last_name); ?> <?php echo app('translator')->get('transport.transport'); ?>
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
    .primary-btn.small.fix-gr-bg{
        font-size: 11px;
        padding: 0 16px;
    }
</style>
<?php $__env->stopPush(); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('transport.transport'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href=""><?php echo app('translator')->get('transport.transport'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
       
        <div class="row">

            <div class="col-lg-12">

                <div class="row">
                        <div class="col-lg-3 mb-40 pb-30">
                                <!-- Start Student Meta Information -->
                                <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists('university::promote.inc.student_profile',['student_detail'=>$student_detail->defaultClass])) echo $__env->make('university::promote.inc.student_profile',['student_detail'=>$student_detail->defaultClass], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <?php if ($__env->exists('backEnd.studentInformation.inc.student_profile', ['title'=>true])) echo $__env->make('backEnd.studentInformation.inc.student_profile', ['title'=>true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                                <!-- End Student Meta Information -->
                
                            </div>
                    <div class="col-lg-9">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-6 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('transport.transport_route_list'); ?></h3>
                                    </div>
                                </div>
                            </div>
                            <table id="table_id" class="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="col-6"><?php echo app('translator')->get('common.route'); ?></th>
                                        <th class="col-6"><?php echo app('translator')->get('transport.vehicle'); ?></th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td valign="top" class="col-6"><?php echo e($route->route->title); ?></td>
                                        <td class="col-6">
                                            <table>
                                                <?php
                                                  $vehicles = explode(",",$route->vehicle_id);
                                                ?>
                                                <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <!-- <td>
                                                        
                                                    </td> -->
                                                    <td class="d-flex flex-wrap gap-10">
                                                        <span>
                                                            <?php $vehicle = App\SmVehicle::find($vehicle);
                                                            ?>
                                                            <?php echo e($vehicle->vehicle_no); ?>

                                                        </span>
                                                        <div>
                                                            
                                                        <?php if($student_detail->route_list_id == $route->route->id && $student_detail->vechile_id == $vehicle->id): ?>
                                                            <a href="javascript:void(0)" class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('transport.assigned'); ?></a> 
                                                        <?php endif; ?>
                                                        </div>
                                                         
                                                        <div>
                                                             
                                                             
                                                             <a class="primary-btn small fix-gr-bg" data-toggle="modal" data-target="#transportView<?php echo e($route->route->id); ?><?php echo e($vehicle->id); ?>"  href="#"><?php echo app('translator')->get('common.view'); ?></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </table>
                                        </td> 
                                    </tr>
                                    <div class="modal fade admin-query" id="transportView<?php echo e($route->route->id); ?><?php echo e($vehicle->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo e($route->route->title); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
    
                                                <div class="modal-body">
                                                    
    
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <div class="single-meta">
                                                            <div class="row">
                                                                <div class="col-lg-12 no-gutters">
                                                                    <div class="main-title">
                                                                        <h3 class="mb-0 text-center"><?php echo app('translator')->get('common.route'); ?>: <?php echo e($route->route->title); ?></h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="student-meta-box">
                                                                        <div class="single-meta mt-20">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="value text-left">
                                                                                        <?php echo app('translator')->get('transport.vehicle_no'); ?> :
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="name">
                                                                                        <?php echo e($vehicle->vehicle_no); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="single-meta">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="value text-left">
                                                                                        <?php echo app('translator')->get('transport.vehicle_model'); ?>:
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="name">
                                                                                        <?php echo e($vehicle->vehicle_model); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="single-meta">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="value text-left">
                                                                                        <?php echo app('translator')->get('transport.made'); ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="name">
                                                                                        <?php echo e($vehicle->made_year); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php if(!empty($vehicle->driver_id)): ?>
                                                                            
                                                                        
                                                                        <?php
                                                                            $driver_info=App\SmStaff::where('id','=',$vehicle->driver_id)->first();
                                                                        ?>
                                                                        <div class="single-meta">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="value text-left">
                                                                                        <?php echo app('translator')->get('transport.driver_name'); ?>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="name">
                                                                                        <?php echo e(@$driver_info->full_name); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="single-meta">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="value text-left">
                                                                                        <?php echo app('translator')->get('transport.driver_license'); ?>    
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="name">
                                                                                        <?php echo e(@$driver_info->driving_license); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="single-meta">
                                                                            <div class="row">
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="value text-left">
                                                                                        <?php echo app('translator')->get('transport.driver_contact'); ?>  
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6 col-md-6">
                                                                                    <div class="name">
                                                                                        <?php echo e($driver_info->emergency_mobile); ?>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?php endif; ?>
    
    
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/parentPanel/transport.blade.php ENDPATH**/ ?>