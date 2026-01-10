<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('academics.teacher_class_routine_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('academics.teacher_class_routine_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('academics.academics'); ?></a>
                    <a href="#"><?php echo app('translator')->get('academics.teacher_class_routine_report'); ?></a>
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'teacher-class-routine-report', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-12 mt-30-md">
                                <label class="primary_input_label" for="">
                                    <?php echo e(__('common.teacher')); ?>

                                    <span class="text-danger"> *</span>
                                </label>
                                <select
                                    class="primary_select form-control <?php echo e($errors->has('teacher') ? ' is-invalid' : ''); ?>"
                                    name="teacher">
                                    <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?> *" value=""><?php echo app('translator')->get('common.select_teacher'); ?> *</option>

                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($teacher->id); ?>"
                                            <?php echo e(isset($teacher_id) ? ($teacher_id == $teacher->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e($teacher->full_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('teacher')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('teacher')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

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
            </div>
        </div>
    </section>

    <?php if(isset($class_times)): ?>
        <section class="mt-20">
            <div class="container-fluid p-0">
                <div class="white-box mt-40">
                <div class="row justify-content-end">
                    <div class="col-lg-8 pull-right mb-15">
                        <a href="<?php echo e(route('print-teacher-routine', [$teacher_id])); ?>"
                            class="primary-btn small fix-gr-bg pull-right" target="_blank"><i class="ti-printer"> </i>
                            <?php echo app('translator')->get('academics.print'); ?></a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-15"><?php echo app('translator')->get('academics.class_routine'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
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
                        <table id="default_table" class="table school-table-data" cellspacing="0" width="100%">
                            <thead>

                                <tr>

                                    <?php
                                        $height = 0;
                                        $tr = [];
                                    ?>
                                    <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($sm_weekend->teacherClassRoutineAdmin->count() > $height): ?>
                                            <?php
                                                $height = $sm_weekend->teacherClassRoutineAdmin->count();
                                            ?>
                                        <?php endif; ?>

                                        <th><?php echo e(@$sm_weekend->name); ?></th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
                                    $used = [];
                                    $tr = [];
                                    
                                ?>
                                <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        
                                        $i = 0;
                                    ?>
                                    <?php $__currentLoopData = $sm_weekend->teacherClassRoutineAdmin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            if (!in_array($routine->id, $used)) {
                                                if (moduleStatusCheck('University')) {
                                                    $tr[$i][$sm_weekend->name][$loop->index]['subject'] = $routine->unSubject ? $routine->unSubject->subject_name : '';
                                                    $tr[$i][$sm_weekend->name][$loop->index]['subject_code'] = $routine->unSubject ? $routine->unSubject->subject_code : '';
                                                } else {
                                                    $tr[$i][$sm_weekend->name][$loop->index]['subject'] = $routine->subject ? $routine->subject->subject_name : '';
                                                    $tr[$i][$sm_weekend->name][$loop->index]['subject_code'] = $routine->subject ? $routine->subject->subject_code : '';
                                                }
                                                $tr[$i][$sm_weekend->name][$loop->index]['class_room'] = $routine->classRoom ? $routine->classRoom->room_no : '';
                                                $tr[$i][$sm_weekend->name][$loop->index]['teacher'] = $routine->teacherDetail ? $routine->teacherDetail->full_name : '';
                                                $tr[$i][$sm_weekend->name][$loop->index]['start_time'] = $routine->start_time;
                                                $tr[$i][$sm_weekend->name][$loop->index]['end_time'] = $routine->end_time;
                                                $tr[$i][$sm_weekend->name][$loop->index]['class_name'] = $routine->class ? $routine->class->class_name : '';
                                                $tr[$i][$sm_weekend->name][$loop->index]['section_name'] = $routine->section ? $routine->section->section_name : '';
                                                $tr[$i][$sm_weekend->name][$loop->index]['is_break'] = $routine->is_break;
                                                $used[] = $routine->id;
                                            }
                                            
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php
                                        
                                        $i++;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php for($i = 0; $i < $height; $i++): ?>
                                    <tr>
                                        <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <td>
                                                    <?php
                                                        $classes = gv($days, $sm_weekend->name);
                                                    ?>
                                                    <?php if($classes && gv($classes, $i)): ?>
                                                        <?php if($classes[$i]['is_break']): ?>
                                                            <strong> <?php echo app('translator')->get('academics.break'); ?> </strong>

                                                            <span class="">
                                                                (<?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>

                                                                -
                                                                <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>)
                                                            </span><br>
                                                        <?php else: ?>
                                                            <span
                                                                class=""><?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>

                                                                - <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>

                                                            </span><br>
                                                            <span class=""> <strong> <?php echo e($classes[$i]['subject']); ?>

                                                                </strong> (<?php echo e($classes[$i]['subject_code']); ?>) </span><br>
                                                            <?php if($classes[$i]['class_room']): ?>
                                                                <span class=""> <strong><?php echo app('translator')->get('academics.room'); ?> :</strong>
                                                                    <?php echo e($classes[$i]['class_room']); ?> </span><br>
                                                            <?php endif; ?>
                                                            <?php if($classes[$i]['class_name']): ?>
                                                                <span class=""> <?php echo e($classes[$i]['class_name']); ?>

                                                                    <?php if($classes[$i]['section_name']): ?>
                                                                        (
                                                                        <?php echo e($classes[$i]['section_name']); ?> )
                                                                    <?php endif; ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endfor; ?>
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
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/reports/teacher_class_routine_report.blade.php ENDPATH**/ ?>