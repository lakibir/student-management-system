<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.online_exam'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .input-right-icon {
            z-index: inherit !important;
        }
        .check_box_table table.dataTable.dtr-inline.collapsed > tbody > tr[role='row'] > td:first-child::before, 
        .check_box_table table.dataTable.dtr-inline.collapsed > tbody > tr[role='row'] > th:first-child::before {
            left: 10px;
            top: 55px;
            line-height: 18px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.online_exam'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.online_exam'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.online_exam'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($online_exam)): ?>
                <?php if(userPermission('online-exam-store')): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('online-exam')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($online_exam)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => ['online-exam-update', $online_exam->id], 'method' => 'PUT'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('online-exam-store')): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'online-exam-store', 'method' => 'POST'])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($online_exam)): ?>
                                            <?php echo app('translator')->get('exam.edit_online_exam'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('exam.add_online_exam'); ?>
                                        <?php endif; ?>
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.exam_title'); ?>
                                                    <span class="text-danger"> *</span></label>
                                                <input class="primary_input_field  form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" type="text" name="title"
                                                    autocomplete="off"
                                                    value="<?php echo e(isset($online_exam) ? $online_exam->title : old('title')); ?>">
                                                <input type="hidden" name="id"
                                                    value="<?php echo e(isset($online_exam) ? $online_exam->id : ''); ?>">
                                                <?php if($errors->has('title')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('title')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php if(moduleStatusCheck('University')): ?>
                                    <?php if(isset($editData)): ?>
                                        <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                        [
                                            'required' => ['USN', 'UD', 'UA', 'US', 'USL','USEC','USUB'],
                                            'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>true, 
                                        ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                        [
                                            'required' => ['USN', 'UD', 'UA', 'US', 'USL','USEC','USUB'],
                                            'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>true, 
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php else: ?>
                                        <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                        [
                                            'required' => ['USN', 'UD', 'UA', 'US', 'USL','USEC','USUB'],
                                            'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>true, 
                                            'multipleSelect' => 1,
                                        ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                        [
                                            'required' => ['USN', 'UD', 'UA', 'US', 'USL','USEC','USUB'],
                                            'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>true, 
                                            'multipleSelect' => 1,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                  <?php else: ?> 

                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.class'); ?>
                                                <span class="text-danger"> *</span></label>
                                            <select
                                                class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                id="classSelectStudentHomeWork" name="class">
                                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                                    <?php echo app('translator')->get('common.select_class'); ?> *</option>
                                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($class->id); ?>"
                                                        <?php echo e(isset($online_exam) ? ($class->id == $online_exam->class_id ? 'selected' : '') : (old('class') == $class->id ? 'selected' : '')); ?>>
                                                        <?php echo e($class->class_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('class')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('class')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12" id="subjectSelecttHomeworkDiv">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.subject'); ?>
                                                <span class="text-danger"> *</span></label>
                                            <select
                                                class="primary_select form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>"
                                                id="subjectSelect" name="subject">
                                                <option data-display="<?php echo app('translator')->get('common.select_subjects'); ?> *" value="">
                                                    <?php echo app('translator')->get('common.select_subjects'); ?> *</option>
                                                <?php if(isset($online_exam)): ?>
                                                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($subject->subject_id); ?>"
                                                            <?php echo e($online_exam->subject_id == $subject->subject_id ? 'selected' : ''); ?>>
                                                            <?php echo e($subject->subject->subject_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="pull-right loader loader_style" id="select_subject_loader">
                                                <img class="loader_img_style"
                                                    src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                            </div>
                                            <?php if($errors->has('subject')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('subject')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <?php if(isset($online_exam)): ?>
                                            <div class="col-lg-12" id="select_section_div">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.section'); ?>
                                                    <span class="text-danger"> *</span></label>
                                                <select
                                                    class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section"
                                                    id="select_section" name="section">
                                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.select_section'); ?> *</option>
                                                    <?php if(isset($online_exam)): ?>
                                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($section->section_id); ?>"
                                                                <?php echo e($online_exam->section_id == $section->section_id ? 'selected' : ''); ?>>
                                                                <?php echo e($section->section->section_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <div class="pull-right loader loader_style" id="select_section_loader">
                                                    <img class="loader_img_style"
                                                        src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                        alt="loader">
                                                </div>
                                                <?php if($errors->has('section')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('section')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="col-lg-12" id="selectSectionsDiv">
                                                <label for="checkbox" class="mb-2">
                                                    <?php echo app('translator')->get('common.section'); ?><span class="text-danger">*</span>
                                                </label>
                                                <select multiple class="multypol_check_select active position-relative" id="selectSectionss" name="section[]" style="width:300px"></select>
                                                <?php if($errors->has('section')): ?>
                                                    <span class="text-danger invalid-select" role="alert" style="display:block">
                                                        <span style="top:-25px"><?php echo e($errors->first('section')); ?></span>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.date'); ?>
                                                    <span class="text-danger"> *</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                    class="primary_input_field primary_input_field date form-control"
                                                                    id="startDate" type="text" name="date"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(isset($online_exam) ? date('m/d/Y', strtotime($online_exam->date)) : (old('date') != '' ? old('date') : date('m/d/Y'))); ?>">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#startDate" type="button">
                                                            <label class="m-0 p-0" for="startDate">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('date')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.end_date'); ?>
                                                    <span class="text-danger"> *</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input
                                                                    class="primary_input_field primary_input_field date form-control"
                                                                    id="end_date" type="text" name="end_date"
                                                                    autocomplete="off"
                                                                    value="<?php echo e(isset($online_exam) ? date('m/d/Y', strtotime($online_exam->end_date_time)) : (old('end_date') != '' ? old('end_date') : date('m/d/Y'))); ?>">
                                                            </div>
                                                        </div>
                                                        <button class="btn-date" data-id="#end_date" type="button">
                                                            <label class="m-0 p-0" for="end_date">
                                                                <i class="ti-calendar" id="start-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php echo e($errors->first('date')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-md-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.start_time'); ?>
                                                    <span class="text-danger"> *</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="-"
                                                                    class="primary_input_field primary_input_field time"
                                                                    type="text" name="start_time" id="start_time"
                                                                    value="<?php echo e(isset($online_exam) ? date('H:i', strtotime($online_exam->start_time)) : (old('end_date') != '' ? old('end_date') : date('H:i'))); ?>">

                                                                <?php if($errors->has('start_time')): ?>
                                                                    <span class="text-danger d-block">
                                                                        <?php echo e($errors->first('start_time')); ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <label class="m-0 p-0" for="start_time">
                                                                <i class="ti-timer" id="admission-date-icon"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  mt-25">
                                        <div class="col-md-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.end_time'); ?>
                                                    <span class="text-danger"> *</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="primary_input">
                                                                <input
                                                                    class="primary_input_field primary_input_field time  form-control<?php echo e($errors->has('end_time') ? ' is-invalid' : ''); ?>"
                                                                    type="text" name="end_time" id="end_time"
                                                                    value="<?php echo e(isset($online_exam) ? date('H:i', strtotime($online_exam->end_date_time)) : (old('end_date') != '' ? old('end_date') : date('H:i'))); ?>">
                                                                <?php if($errors->has('end_time')): ?>
                                                                    <span class="text-danger">
                                                                        <?php echo e($errors->first('end_time')); ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <button class="" type="button">
                                                            <label class="m-0 p-0" for="end_time">
                                                                <i class="ti-timer"></i>
                                                            </label>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.minimum_percentage'); ?>
                                                    <span
                                                        class="text-danger">*</span></label>
                                                <input oninput="numberCheckWithDot(this)"
                                                    class="primary_input_field form-control<?php echo e($errors->has('percentage') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="percentage" autocomplete="off"
                                                    value="<?php echo e(isset($online_exam) ? $online_exam->percentage : old('percentage')); ?>">
                                                <input type="hidden" name="id"
                                                    value="<?php echo e(isset($online_exam) ? $online_exam->id : ''); ?>">
                                                <?php if($errors->has('percentage')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('percentage')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.instruction'); ?>
                                                    <span class="text-danger"> *</span></label>
                                                <textarea
                                                    class="primary_input_field form-control<?php echo e($errors->has('instruction') ? ' is-invalid' : ''); ?>"
                                                    cols="0" rows="4"
                                                    name="instruction"><?php echo e(isset($online_exam) ? $online_exam->instruction : old('instruction')); ?></textarea>
                                                <?php if($errors->has('instruction')): ?>
                                                    <span
                                                        class="error text-danger"><?php echo e($errors->first('instruction')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <input type="checkbox" id="auto_mark"
                                                    class="common-checkbox form-control<?php echo e(@$errors->has('auto_mark') ? ' is-invalid' : ''); ?>"
                                                    <?php echo e(isset($online_exam) && $online_exam->auto_mark == 1 ? 'checked' : ''); ?>

                                                    name="auto_mark" value="1">
                                                <label for="auto_mark"><?php echo app('translator')->get('exam.auto_mark_register'); ?></label>
                                                <span> (<?php echo app('translator')->get('exam.only_for_multiple'); ?>)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = '';
                                        if (userPermission('online-exam-store')) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                    ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                            <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                                title="<?php echo e($tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($online_exam)): ?>
                                                    <?php echo app('translator')->get('exam.update_online_exam'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('exam.save_online_exam'); ?>
                                                <?php endif; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="url" value="<?php echo e(Request::url()); ?>">
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('exam.online_exam_list'); ?></h3>
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
                                    <table id="table_id" class="table data-table" cellspacing="0" width="100%">
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
                                                <th><?php echo app('translator')->get('exam.minimum_percentage'); ?></th>
                                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                                <th style="width: 25%"><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
    <div class="modal fade admin-query" id="deleteOnlineExam">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('exam.delete_online_exam'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'online-exam-delete', 'method' => 'POST'])); ?>

                        <input type="hidden" name="online_exam_id" id="online_exam_id">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.multi_select_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.server_side_datatable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        function examDelete(id) {
            var modal = $('#deleteOnlineExam');
            modal.find('input[name=online_exam_id]').val(id)
            modal.modal('show');
        }
        $(document).ready(function() {
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": $.fn.dataTable.pipeline( {
                    url: "<?php echo e(url('online-exam-datatable')); ?>",
                    data: {},
                    pages: "<?php echo e(generalSetting()->ss_page_load); ?>" // number of pages to cache
                } ),
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'class_section', name: 'class_section'},
                    {data: 'subject_name', name: 'subject_name'},
                    {data: 'exam_time', name: 'exam_time'},
                    {data: 'duration', name: 'duration'},
                    {data: 'percentage', name: 'percentage'},
                    {data: 'status_button', name: 'status_button'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                bLengthChange: false,
                bDestroy: true,
                language: {
                    search: "<i class='ti-search'></i>",
                    searchPlaceholder: window.jsLang('quick_search'),
                    paginate: {
                        next: "<i class='ti-arrow-right'></i>",
                        previous: "<i class='ti-arrow-left'></i>",
                    },
                },
                dom: "Bfrtip",
                buttons: [
                    {
                        extend: "copyHtml5",
                        text: '<i class="fa fa-files-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('copy_table'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "excelHtml5",
                        text: '<i class="fa fa-file-excel-o"></i>',
                        titleAttr: window.jsLang('export_to_excel'),
                        title: $("#logo_title").val(),
                        margin: [10, 10, 10, 0],
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "csvHtml5",
                        text: '<i class="fa fa-file-text-o"></i>',
                        titleAttr: window.jsLang('export_to_csv'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "pdfHtml5",
                        text: '<i class="fa fa-file-pdf-o"></i>',
                        title: $("#logo_title").val(),
                        titleAttr: window.jsLang('export_to_pdf'),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                        orientation: "landscape",
                        pageSize: "A4",
                        margin: [0, 0, 0, 12],
                        alignment: "center",
                        header: true,
                        customize: function(doc) {
                            doc.content[1].margin = [100, 0, 100, 0]; //left, top, right, bottom
                            doc.content.splice(1, 0, {
                                margin: [0, 0, 0, 12],
                                alignment: "center",
                                image: "data:image/png;base64," + $("#logo_img").val(),
                            });
                            doc.defaultStyle = {
                                font: 'DejaVuSans'
                            }
                        },
                    },
                    {
                        extend: "print",
                        text: '<i class="fa fa-print"></i>',
                        titleAttr: window.jsLang('print'),
                        title: $("#logo_title").val(),
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        },
                    },
                    {
                        extend: "colvis",
                        text: '<i class="fa fa-columns"></i>',
                        postfixButtons: ["colvisRestore"],
                    },
                ],
                columnDefs: [
                    {
                        visible: false,
                    }, 
                ],
                responsive: true,
            });
        } );
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/examination/online_exam.blade.php ENDPATH**/ ?>