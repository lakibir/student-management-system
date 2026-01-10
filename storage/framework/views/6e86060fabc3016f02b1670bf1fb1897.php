<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.exam_setup'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<style>
    .check_box_table table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child::before,
    .check_box_table table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child::before {
        top: 30px;
    }

    .input-right-icon {
        z-index: inherit !important;
    }

    #productTable tfoot tr td{
        padding: 20px 18px 20px 0px;
    }
</style>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam_setup'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam_setup'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($exam)): ?>
        <?php if(userPermission('exam-setup-store')): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('exam')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>

        <div class="row">

            <div class="col-lg-5 col-xl-4">
                <?php if(isset($exam)): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => ['exam-update', $exam->id], 'method' => 'PUT'])); ?>

                <?php else: ?>
                <?php if(userPermission('exam-setup-store')): ?>
                <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'exam-store', 'method' => 'POST'])); ?>

                <?php endif; ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="main-title mt-0">
                                <h3 class="mb-15">
                                    <?php if(isset($exam)): ?>
                                    <?php echo app('translator')->get('exam.edit_exam'); ?>
                                    <?php else: ?>
                                    <?php echo app('translator')->get('exam.add_exam'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12" id="error-message">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="col-lg-12">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(__('common.exam_system')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select
                                            class="primary_select form-control <?php echo e($errors->has('exam_system') ? ' is-invalid' : ''); ?>"
                                            id="exam_system" name="exam_system">
                                            <option data-display="<?php echo app('translator')->get('common.exam_system'); ?> *" value="">
                                                <?php echo app('translator')->get('common.exam_system'); ?>
                                                *</option>
                                            <option value="single"><?php echo app('translator')->get('common.single_exam'); ?></option>
                                            <option value="multi"><?php echo app('translator')->get('common.multi_exam'); ?></option>
                                        </select>
                                        <?php if($errors->has('exam_system')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('exam_system')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                
                                <div class="exam_view_div" id="exam_view_div"></div>
                                



                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.exam_mark'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input oninput="numberMinCheck(this)"
                                                class="primary_input_field form-control<?php echo e($errors->has('exam_marks') ? ' is-invalid' : ''); ?>"
                                                type="number" name="exam_marks" id="exam_mark_main" autocomplete="off"
                                                onkeypress="return isNumberKey(event)"
                                                value="<?php echo e(isset($exam) ? $exam->exam_mark : 0); ?>" required="">

                                                <div class="text-danger" id="messageAlert"></div>
                                            <?php if($errors->has('exam_marks')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('exam_marks')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php if(@generalSetting()->result_type == 'mark'): ?>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.pass_mark'); ?>
                                                <span class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('pass_mark') ? ' is-invalid' : ''); ?>"
                                                type="text" name="pass_mark" id="exam_mark_main" autocomplete="off"
                                                onkeypress="return isNumberKey(event)"
                                                value="<?php echo e(isset($exam) ? $exam->pass_mark : 0); ?>" required="">

                                            <?php if($errors->has('pass_mark')): ?>
                                            <span class="text-danger">
                                                <?php echo e($errors->first('pass_mark')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box mt-10">
                            <div class="row">
                                <div class="col-xl-10 col-9">
                                    <div class="main-title mt-0">
                                        <h5><?php echo app('translator')->get('exam.add_mark_distributions'); ?> </h5>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-3 text-right">
                                    <button style="position: relative; top: -5px;" type="button"
                                        class="primary-btn icon-only fix-gr-bg" onclick="addRowMark();" id="addRowBtn">
                                        <span class="ti-plus"></span></button>
                                </div>
                            </div>
                            <div class="col-lg-12 p-0">
                                <div class="table-responsive">
                                <table class="table" id="productTable">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th><?php echo app('translator')->get('exam.exam_title'); ?></th>
                                            <th><?php echo app('translator')->get('exam.exam_mark'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr id="row1" class="mt-40">
                                            <td class="border-top-0">
                                                
                                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                                <div class="primary_input">
                                                    <input type="hidden" value="<?php echo app('translator')->get('exam.title'); ?>" id="lang">
                                                    <input class="primary_input_field" type="text" id="exam_title"
                                                        name="exam_title[]" autocomplete="off"
                                                        value="<?php echo e(isset($editData) ? $editData->exam_title : ''); ?>">

                                                </div>
                                            </td>
                                            <td class="border-top-0">
                                                <div class="primary_input">
                                                    <input oninput="numberCheck(this)"
                                                        class="primary_input_field form-control<?php echo e($errors->has('exam_mark') ? ' is-invalid' : ''); ?> exam_mark"
                                                        type="number" id="exam_mark" name="exam_mark[]" autocomplete="off"
                                                        onkeypress="return isNumberKey(event)"
                                                        value="<?php echo e(isset($editData) ? $editData->exam_mark : 0); ?>">
                                                </div>
                                            </td>
                                            <td class="border-0">
                                                <button style="position: relative; top: 6px;"
                                                    class="primary-btn icon-only fix-gr-bg ml-2" type="button">
                                                    <span class="ti-trash"></span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="border-top-0 pr-0" style="position: relative; top: 12px">
                                                <?php echo app('translator')->get('exam.total'); ?></td>
                                            <td class="border-top-0 pr-0" id="totalMark">
                                                <input type="text" class="primary_input_field form-control"
                                                    name="totalMark" readonly="true">
                                            </td>
                                            <td class="border-top-0 pr-0"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-15" id="exam_shedule">
                    <div class="col-lg-12">
                        <div class="white-box mt-10">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-title mt-0">
                                        <h5><?php echo app('translator')->get('exam.exam_schedule_create'); ?> </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-15">

                                <div class="col-lg-12">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.teacher')); ?>

                                        <span class="text-danger"> *</span>
                                    </label>
                                    <select
                                        class="primary_select form-control <?php echo e($errors->has('teacher_id') ? ' is-invalid' : ''); ?>"
                                        id="" name="teacher_id">
                                        <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?> *" value="">
                                            <?php echo app('translator')->get('common.select_teacher'); ?>
                                            *</option> <?php echo e($teachers); ?>

                                        <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$teacher->id); ?>"><?php echo e(@$teacher->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('teacher_id')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('teacher_id')); ?>

                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mt-15">
                                <div class="col-lg-12">

                                    <div class="primary_input">
                                        <label class="primary_input_label"
                                            for=""><?php echo app('translator')->get('admin.date'); ?><span></span></label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">
                                                        <input
                                                            class="primary_input_field  primary_input_field date form-control"
                                                            id="startDate" type="text" name="date"
                                                            value="<?php echo e(date('m/d/Y')); ?>" autocomplete="off" required>
                                                    </div>
                                                </div>
                                                <button class="btn-date" data-id="#startDate" type="button">
                                                    <i class="ti-calendar" id="start-date-icon"></i>
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
                                        <label class="primary_input_label"><?php echo app('translator')->get('academics.start_time'); ?> <span
                                                class="text-danger"> *</span></label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">

                                                        <input
                                                            class="primary_input_field primary_input_field time   form-control<?php echo e(@$errors->has('start_time') ? ' is-invalid' : ''); ?>"
                                                            id="start_time" type="text" name="start_time"
                                                            value="<?php echo e(Carbon::now()->format('H:i')); ?>">
                                                    </div>
                                                </div>
                                                <button class="" type="button">
                                                    <label class="m-0 p-0" for="start_time">
                                                        <i class="ti-timer"></i>
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
                                        <label class="primary_input_label"><?php echo app('translator')->get('exam.end_time'); ?> <span
                                                class="text-danger"> *</span></label>
                                        <div class="primary_datepicker_input">
                                            <div class="no-gutters input-right-icon">
                                                <div class="col">
                                                    <div class="">

                                                        <input
                                                            class="primary_input_field primary_input_field time  form-control<?php echo e(@$errors->has('end_time') ? ' is-invalid' : ''); ?>"
                                                            id="end_time" type="text" name="end_time"
                                                            value="<?php echo e(Carbon::now()->format('H:i')); ?>">
                                                    </div>
                                                </div>
                                                <button class="" type="button">
                                                    <label class="m-0 p-0" for="end_time">
                                                        <i class="ti-timer"></i>
                                                    </label>
                                                </button>
                                            </div>
                                        </div>
                                        <span class="text-danger"><?php echo e($errors->first('date')); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-15 mb-20">
                                <div class="col-lg-12 mt-30-md">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.room')); ?>

                                        <span class="text-danger"> *</span>
                                    </label>
                                    <select class="primary_select" name="room" id="room">
                                        <option data-display="<?php echo app('translator')->get('common.select_room'); ?> *" value="">
                                            <?php echo app('translator')->get('common.select_room'); ?>
                                            *</option>
                                        <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e(@$room->id); ?>"
                                            <?php echo e(isset($routine) ? ($routine->room_id == $room->id ? 'selected' : '') : ''); ?>>
                                            <?php echo e(@$room->room_no); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <span class="text-danger" id="room_error"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
                $tooltip = '';
                if (userPermission('exam-setup-store') || userPermission('exam-edit')) {
                $tooltip = '';
                } else {
                $tooltip = 'You have no permission to add';
                }
                ?>
                <div class="row mt-15">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row mt-15">
                                <div class="col-lg-12 text-center">
                                    <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip"
                                        title="<?php echo e(@$tooltip); ?>">
                                        <span class="ti-check"></span>
                                        <?php if(isset($exam)): ?>
                                        <?php echo app('translator')->get('common.update'); ?>
                                        <?php else: ?>
                                        <?php echo app('translator')->get('common.save'); ?>
                                        <?php endif; ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>


            <div class="col-lg-7 col-xl-8">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title mt-0">
                                <h3 class="mb-15"><?php echo app('translator')->get('exam.exam_list'); ?></h3>
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
                                <table id="table_id" class="table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th><?php echo app('translator')->get('common.sl'); ?></th>
                                            <th><?php echo app('translator')->get('exam.exam_title'); ?></th>
                                            <?php if(moduleStatusCheck('University')): ?>
                                            <th><?php echo app('translator')->get('common.session'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.faculty_department'); ?></th>
                                            <th><?php echo app('translator')->get('common.academic_year'); ?></th>
                                            <th><?php echo app('translator')->get('university::un.semester'); ?></th>
                                            <?php else: ?>
                                            <th><?php echo app('translator')->get('common.class'); ?></th>
                                            <th><?php echo app('translator')->get('common.section'); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo app('translator')->get('exam.subject'); ?></th>
                                            <th><?php echo app('translator')->get('exam.total_mark'); ?></th>
                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                            <th><?php echo app('translator')->get('exam.pass_mark'); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo app('translator')->get('exam.mark_distribution'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php $count =1 ; ?>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($count++); ?></td>
                                            <td><?php echo e($exam->GetExamTitle != '' ? $exam->GetExamTitle->title : ''); ?></td>
                                            <?php if(moduleStatusCheck('University')): ?>
                                            <td><?php echo e($exam->sessionDetails->name); ?></td>
                                            <td><?php echo e($exam->facultyDetails->name . '(' . $exam->departmentDetails->name . ')'); ?>

                                            </td>
                                            <td><?php echo e($exam->academicYearDetails->name); ?></td>
                                            <td><?php echo e($exam->semesterDetails->name); ?></td>
                                            <?php else: ?>
                                            <td><?php echo e($exam->class != '' ? $exam->class->class_name : ''); ?></td>
                                            <td><?php echo e($exam->section != '' ? $exam->section->section_name : ''); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e($exam->subject != '' ? $exam->subject->subject_name : ''); ?></td>
                                            <td><?php echo e($exam->exam_mark); ?></td>
                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                            <td><?php echo e($exam->pass_mark); ?></td>
                                            <?php endif; ?>
                                            <td>
                                                <?php $__currentLoopData = $exam->markDistributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row">
                                                    <div class="col-sm-6"> <?php echo e($row->exam_title); ?> </div>
                                                    <div class="col-sm-4"><strong> <?php echo e($row->exam_mark); ?> </strong>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td>
                                                <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                    <?php if($exam->markRegistered == ''): ?>
                                                        <?php if(userPermission('exam-edit')): ?>
                                                            <a class="dropdown-item"
                                                                href="<?php echo e(route('exam-edit', $exam->id)); ?>"><?php echo app('translator')->get('common.edit'); ?>
                                                            </a>
                                                        <?php endif; ?>
    
                                                        <?php if(userPermission('exam-delete')): ?>
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#deleteExamModal<?php echo e($exam->id); ?>"
                                                                href="#"><?php echo app('translator')->get('common.delete'); ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade admin-query" id="deleteExamModal<?php echo e($exam->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('exam.delete_exam'); ?></h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <?php echo e(Form::open(['route' => ['exam-delete', $exam->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                            <button class="primary-btn fix-gr-bg"
                                                                type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                            <?php echo e(Form::close()); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
<script>
    <?php if( count( $errors ) > 0 ): ?>
    <?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    toastr.error( "<?php echo e($error); ?>" );
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</script>

<script type="text/javascript">
    $( document ).ready( function () {
        $( "#exam_shedule" ).css( "display", "none" );
        $( '#exam_system' ).on( 'change', function () {

            var selected_val = this.value;
            $( 'body' ).find( '#exam_view_div' ).empty();
            if ( selected_val == "single" ) {
                $( "#exam_shedule" ).css( "display", "block" );
            } else {
                $( "#exam_shedule" ).css( "display", "none" );
            }

            $.ajax( {
                type: "get",
                url: "<?php echo e(url('return_exam_view')); ?>",
                headers: {
                    'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
                },
                data: {
                    code: selected_val
                },
                success: function ( data ) {
                    if ( data.status == true ) {
                        $( 'body' ).find( '#exam_view_div' ).append( data.html );
                        $( ".primary_select" ).niceSelect( 'destroy' );
                        $( ".primary_select" ).niceSelect();
                    } else {
                        toastr.error( "Operation Failed" );
                    }
                },
            } );


        } );

    } );

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/examination/exam.blade.php ENDPATH**/ ?>