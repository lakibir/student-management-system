<?php $__env->startPush('css'); ?>
    <style>
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
        .check_box_table .QA_table .table tbody th:nth-child(2){
            padding-left: 20px
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('hr.teachers_list'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('hr.teachers_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.teachers'); ?></a>
                    <a href="#"><?php echo app('translator')->get('hr.teachers_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">

                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?> "
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
                                <div role="tabpanel" class="tab-pane fade mt-60  <?php if($key == 0): ?> active show <?php endif; ?>"
                                    id="tab<?php echo e($key); ?>">
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
                                                    <th width="15%"><?php echo app('translator')->get('hr.teacher_name'); ?></th>
                                                    <th width="10%"><?php echo app('translator')->get('common.subject'); ?></th>
                                                    <?php if(generalSetting()->teacher_email_view): ?>
                                                        <th><?php echo app('translator')->get('common.email'); ?></th>
                                                    <?php endif; ?>
                                                    <?php if(generalSetting()->teacher_phone_view): ?>
                                                        <th><?php echo app('translator')->get('common.phone'); ?></th>
                                                    <?php endif; ?>
                                                    <?php if($teacherEvaluationSetting->is_enable == 0): ?>
                                                        <?php if(in_array('2', $teacherEvaluationSetting->submitted_by)): ?>
                                                            <?php if($teacherEvaluationSetting->rating_submission_time == 'any'): ?>
                                                                <th width="15%"><?php echo app('translator')->get('teacherEvaluation.rate'); ?></th>
                                                                <th width="50%"><?php echo app('translator')->get('teacherEvaluation.comment'); ?></th>
                                                                <th width="10%"><?php echo app('translator')->get('common.action'); ?></th>
                                                            <?php else: ?>
                                                                <?php if(date('m/d/Y') >= date('m/d/Y', strtotime($teacherEvaluationSetting->from_date)) &&
                                                                        date('m/d/Y') <= date('m/d/Y', strtotime($teacherEvaluationSetting->to_date))): ?>
                                                                    <th width="15%"><?php echo app('translator')->get('teacherEvaluation.rate'); ?></th>
                                                                    <th width="50%"><?php echo app('translator')->get('teacherEvaluation.comment'); ?></th>
                                                                    <th width="10%"><?php echo app('translator')->get('common.action'); ?></th>
                                                                <?php endif; ?>
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
                                                                class="img img-thumbnail" style="width: 60px; height: auto;">
                                                            <?php echo e(@$value->teacher != '' ? @$value->teacher->full_name : ''); ?>

                                                        </td>
                                                        <th><?php echo e($value->subject->subject_name); ?></th>
                                                        <?php if(generalSetting()->teacher_email_view): ?>
                                                            <td><?php echo e(@$value->teacher != '' ? @$value->teacher->email : ''); ?></td>
                                                        <?php endif; ?>
                                                        <?php if(generalSetting()->teacher_phone_view): ?>
                                                            <td><?php echo e(@$value->teacher != '' ? @$value->teacher->mobile : ''); ?>

                                                            </td>
                                                        <?php endif; ?>
                                                        <?php if($teacherEvaluationSetting->is_enable == 0): ?>
                                                            <?php if(in_array('2', $teacherEvaluationSetting->submitted_by)): ?>
                                                                <?php if($teacherEvaluationSetting->rating_submission_time == 'any'): ?>
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
                                                                        <th>
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
                                                                        </th>
                                                                        <th>
                                                                            <div class="primary_input">
                                                                                <input
                                                                                    class="primary_input_field read-only-input form-control"
                                                                                    type="text" name="comment">
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="submit"
                                                                                class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('common.save'); ?></button>
                                                                        </th>
                                                                    <?php echo e(Form::close()); ?>

                                                                <?php else: ?>
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
                                                                        <th>
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
                                                                        </th>
                                                                        <th>
                                                                            <div class="primary_input">
                                                                                <input
                                                                                    class="primary_input_field read-only-input form-control"
                                                                                    type="text" name="comment">
                                                                            </div>
                                                                        </th>
                                                                        <th>
                                                                            <button type="submit"
                                                                                class="primary-btn small fix-gr-bg"><?php echo app('translator')->get('common.save'); ?></button>
                                                                        </th>
                                                                        <?php echo e(Form::close()); ?>

                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/studentPanel/studentTeacher.blade.php ENDPATH**/ ?>