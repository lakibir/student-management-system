<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .dataTables_filter label {
            top: -40px !important
        }

        #table_id_wrapper .dt-buttons {
            top: -40px !important;
        }

        @media (max-width: 991px) {
            .up_admin_visitor .dataTables_filter>label {
                left: 47%
            }
        }

        @media (min-width: 640px) and (max-width: 767px) {
            .up_admin_visitor .dataTables_filter>label {
                left: 100%
            }
        }

        @media (max-width: 400px) {
            .up_admin_visitor .dataTables_filter>label {
                min-width: 220px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo e($student_detail->full_name); ?>-<?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson_plan_overview'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="student-details">
        <div class="container-fluid p-0">
            <div class="row">
                <!-- Start Student Details -->
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs_scroll_nav ml-0" role="tablist">
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <?php if(moduleStatusCheck('University')): ?>
                                        <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?> "
                                            href="#tab<?php echo e($key); ?>" role="tab"
                                            data-toggle="tab"><?php echo e($record->semesterLabel->name); ?> (
                                            <?php echo e($record->unSemester->name); ?> - <?php echo e($record->unAcademic->name); ?> ) </a>
                                    <?php else: ?>
                                        <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?> "
                                            href="#tab<?php echo e($key); ?>" role="tab"
                                            data-toggle="tab"><?php echo e($record->class->class_name); ?>

                                            (<?php echo e($record->section->section_name); ?>)
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <!-- Tab panes -->
                    <div class="tab-content">
                            <!-- Start Fees Tab -->
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div role="tabpanel" class="tab-pane fade  <?php if($key == 0): ?> active show <?php endif; ?>"
                                    id="tab<?php echo e($key); ?>">
                                    <div class="container-fluid p-0 mt-50">
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
                                                        <th><?php echo app('translator')->get('lesson::lesson.lesson'); ?></th>
                                                        <th><?php echo app('translator')->get('lesson::lesson.topic'); ?></th>
                                                        <th>
                                                            <?php if(generalSetting()->sub_topic_enable): ?>
                                                                <?php echo app('translator')->get('lesson::lesson.sup_topic'); ?>
                                                            <?php else: ?>
                                                                <?php echo app('translator')->get('common.note'); ?>
                                                            <?php endif; ?>
                                                        </th>
                                                        <th><?php echo app('translator')->get('lesson::lesson.completed_date'); ?> </th>
                                                        <th><?php echo app('translator')->get('lesson::lesson.upcoming_date'); ?> </th>
                                                        <th><?php echo app('translator')->get('common.status'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $record->lessonPlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e(@$data->lessonName != '' ? @$data->lessonName->lesson_title : ''); ?>

                                                            </td>
                                                            <td>
                                                                <?php if(count($data->topics) > 0): ?>
                                                                    <?php $__currentLoopData = $data->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php echo e($topic->topicName->topic_title); ?> </br>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                    <?php echo e($data->topicName->topic_title); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if(generalSetting()->sub_topic_enable): ?>
                                                                    <?php if(count($data->topics) > 0): ?>
                                                                        <?php $__currentLoopData = $data->topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php echo e($topic->sub_topic_title); ?> </br>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php else: ?>
                                                                        <?php echo e($data->sub_topic); ?>

                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <?php echo e($data->note); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo e(@$data->competed_date != '' ? @$data->competed_date : ''); ?><br>
                                                            </td>
                                                            <td>
                                                                <?php if(date('Y-m-d') < $data->lesson_date && $data->competed_date == ''): ?>
                                                                    <?php echo app('translator')->get('lesson::lesson.upcoming'); ?> (<?php echo e($data->lesson_date); ?>)<br>
                                                                <?php elseif($data->competed_date == ''): ?>
                                                                    <?php echo app('translator')->get('lesson::lesson.assigned_date'); ?>(<?php echo e($data->lesson_date); ?>)
                                                                    <br>
                                                                <?php else: ?>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if(date('Y-m-d') < $data->lesson_date && $data->competed_date == ''): ?>
                                                                    <?php echo app('translator')->get('lesson::lesson.upcoming'); ?> <br>
                                                                <?php elseif($data->competed_date == ''): ?>
                                                                    <?php echo app('translator')->get('lesson::lesson.incomplete'); ?>
                                                                    <br>
                                                                <?php else: ?>
                                                                    <strong><?php echo app('translator')->get('lesson::lesson.completed'); ?></strong> <br>
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
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- End Fees Tab -->
                        </div>
                    </div>
                    <!-- End Student Details -->
                    </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/Lesson\Resources/views/parent/parent_lesson_plan_overview.blade.php ENDPATH**/ ?>