<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.active_exams'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php
        $route = moduleStatusCheck('OnlineExam')==true ? 'om-take_online_exam' : 'take_online_exam' ;
    ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.online_exam'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.online_exam'); ?></a>
                    <a href="<?php echo e(route('student_online_exam')); ?>"><?php echo app('translator')->get('exam.active_exams'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs_scroll_nav ml-0 mb-20" role="tablist">
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <li class="nav-item">
                                    <a class="nav-link <?php if($key== 0): ?> active <?php endif; ?> " href="#tab<?php echo e($key); ?>" role="tab" data-toggle="tab">
                                        <?php echo e(moduleStatusCheck('University') ? $record->unSemesterLabel->name : $record->class->class_name); ?> 
                                        (<?php echo e($record->section->section_name); ?>) 
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <div role="tabpanel" class="tab-pane fade mt-60  <?php if($key== 0): ?> active show <?php endif; ?>" id="tab<?php echo e($key); ?>">
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
                                                <th><?php echo app('translator')->get('exam.title'); ?></th>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <th> <?php echo app('translator')->get('university::un.semester_label'); ?> (<?php echo app('translator')->get('common.section'); ?>)</th>
                                                <?php else: ?>
                                                    <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                                <?php endif; ?>
                                                <th><?php echo app('translator')->get('exam.subject'); ?></th>
                                                <th><?php echo app('translator')->get('exam.exam_date'); ?></th>
                                                <th><?php echo app('translator')->get('exam.duration'); ?></th>
                                            
                                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $record->OnlineExam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $online_exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    @$submitted_answer = $student->studentOnlineExam->where('online_exam_id',$online_exam->id)->first();
                                                ?>
                                                    <tr>
                                                        <td><?php echo e(@$online_exam->title); ?></td>
                                                        <?php if(moduleStatusCheck('University')): ?>
                                                            <td><?php echo e(@$online_exam->unSemesterLabel->name.'  ('.@$online_exam->section->section_name.')'); ?></td>
                                                        <?php else: ?>
                                                            <td><?php echo e(@$online_exam->class->class_name.'  ('.@$online_exam->section->section_name.')'); ?></td>
                                                        <?php endif; ?>
                                                        <td><?php echo e(@$online_exam->subject !=""?@$online_exam->subject->subject_name:""); ?></td>
                                                        <td data-sort="<?php echo e(strtotime(@$online_exam->date)); ?>">
                                                            <?php echo e(@$online_exam->date != ""? dateConvert(@$online_exam->date):''); ?>

            
                                                            <br>
                                                            Time: <?php echo e(date('h:i A', strtotime(@$online_exam->start_time)).' - '.date('h:i A', strtotime(@$online_exam->end_time))); ?>

                                                        </td>
                                                        <?php
            
                                                            $totalDuration = $online_exam->end_time !='NULL' ? Carbon::parse($online_exam->end_time)->diffinminutes( Carbon::parse($online_exam->start_time) ) : 0;
            
                                                        ?>
                                                        <td>
                                                            <?php echo e($online_exam->end_time !='NULL' ? gmdate($totalDuration) : 'Unlimited'); ?>  <?php echo app('translator')->get('exam.minutes'); ?>
                                                        </td>
                                                        
            
                                                        <td>
                                                            <?php
                                                                    $startTime = strtotime($online_exam->date . ' ' . $online_exam->start_time);
                                                                    $endTime = strtotime($online_exam->date . ' ' . $online_exam->end_time);
                                                                    $now = date('h:i:s');
                                                                    $now =  strtotime("now");
                                                                    // dump($submitted_answer);
                                                                ?>
                                                            <?php if( !empty( $submitted_answer)): ?>
                                                                <?php if(@$submitted_answer->status == 1): ?>
                                                                        <?php if($submitted_answer->student_done==1): ?>
                                                                            <span class="btn primary-btn small  fix-gr-bg"
                                                                            style="background:green"><?php echo app('translator')->get('exam.already_submitted'); ?></span>
                                                                        <?php elseif($startTime <= $now && $now <= $endTime): ?>
                                                                            <a class="btn primary-btn small  fix-gr-bg"
                                                                                style="background:green"
                                                                                href="<?php echo e(route($route, [@$online_exam->id])); ?>"><?php echo app('translator')->get('exam.take_exam'); ?></a>
                                                                        
                                                                        <?php elseif($startTime >= $now && $now <= $endTime): ?>
                                                                            <span class="btn primary-btn small  fix-gr-bg"
                                                                                style="background:blue">Waiting</span>
                                                                        <?php elseif($now >= $endTime): ?>
                                                                            <span class="btn primary-btn small  fix-gr-bg"
                                                                                style="background:#dc3545">Closed</span>
                                                                        
                                                                        
                                                                        <?php else: ?>
                                                                            
                                                                            <span class="btn primary-btn small  fix-gr-bg"
                                                                                style="background:green"><?php echo app('translator')->get('exam.already_submitted'); ?></span>
                                                                        <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <?php if($startTime <= $now && $now <= $endTime): ?>
                                                                    <a class="btn primary-btn small  fix-gr-bg"
                                                                    style="background:green;"
                                                                    href="<?php echo e(route($route, [@$online_exam->id])); ?>"><?php echo app('translator')->get('exam.take_exam'); ?></a>
                                                                <?php elseif($startTime >= $now && $now <= $endTime): ?>
                                                                    <span class="btn primary-btn small  fix-gr-bg"
                                                                        style="background:blue"><?php echo app('translator')->get('common.waiting'); ?></span>
                                                                <?php elseif($now >= $endTime): ?>
                                                                    <span class="btn primary-btn small  fix-gr-bg"
                                                                        style="background:#dc3545"><?php echo app('translator')->get('common.closed'); ?></span>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade admin-query" id="deleteOnlineExam">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete_item'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg"
                                data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'online-exam-delete', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <input type="hidden" name="id" id="online_exam_id">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/studentPanel/online_exam.blade.php ENDPATH**/ ?>