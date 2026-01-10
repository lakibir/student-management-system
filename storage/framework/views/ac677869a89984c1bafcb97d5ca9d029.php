<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('leave.apply_leave'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <style>
            .ti-calendar:before {
                position: absolute;
                top: 30px !important;
                right: -10px;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('leave.apply_leave'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>

                    <a href="#"><?php echo app('translator')->get('leave.apply_leave'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor pl_22">
        <div class="container-fluid p-0">
            <?php if(isset($apply_leave)): ?>
                <?php if(userPermission('parent-leave-store')): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('parent-apply-leave')); ?>" class="primary-btn small fix-gr-bg">
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
                            <?php if(isset($apply_leave)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['parent-leave-update', $apply_leave->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                                <?php if(userPermission('parent-leave-store')): ?>
                                    <?php echo e(Form::open([
                                        'class' => 'form-horizontal',
                                        'files' => true,
                                        'route' => 'parent-leave-store',
                                        'method' => 'POST',
                                        'enctype' => 'multipart/form-data',
                                    ])); ?>

                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($apply_leave)): ?>
                                            <?php echo app('translator')->get('leave.edit_apply_leave'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('leave.add_apply_leave'); ?>
                                        <?php endif; ?>
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row no-gutters input-right-icon">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('leave.apply_date'); ?><span
                                                        class="text-danger"> *</span> </label>
                                                <input
                                                    class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('apply_date') ? ' is-invalid' : ''); ?>"
                                                    id="apply_date" type="text"
                                                    name="apply_date"
                                                    value="<?php echo e(isset($apply_leave) ? date('m/d/Y', strtotime($apply_leave->apply_date)) : date('m/d/Y')); ?>">
                                                <?php if($errors->has('apply_date')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('apply_date')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="mt-10" type="button">
                                                <i class="ti-calendar" id="apply_date_icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id"
                                        value="<?php echo e(isset($apply_leave) ? $apply_leave->id : ''); ?>">
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('student_id') ? ' is-invalid' : ''); ?>"
                                                name="student_id">
                                                <option data-display="<?php echo app('translator')->get('leave.student'); ?> *" value=""><?php echo app('translator')->get('leave.student'); ?>
                                                    *</option>
                                                <?php $__currentLoopData = $user->parent->myChildrens(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->user_id); ?>"
                                                        <?php echo e(isset($apply_leave) ? ($apply_leave->staff_id == $item->user_id ? 'selected' : '') : ''); ?>>
                                                        <?php echo e($item->full_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('student_id')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('student_id')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <select
                                                class="primary_select form-control<?php echo e($errors->has('leave_type') ? ' is-invalid' : ''); ?>"
                                                name="leave_type">
                                                <option data-display="<?php echo app('translator')->get('leave.leave_type'); ?> *" value="">
                                                    <?php echo app('translator')->get('leave.leave_type'); ?>*</option>
                                                <?php $__currentLoopData = $leave_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($leave_type->type_id); ?>"
                                                        <?php echo e(isset($apply_leave) ? ($apply_leave->leave_define_id == $leave_type->id ? 'selected' : '') : ''); ?>>
                                                        <?php echo e($leave_type->leaveType->type); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('leave_type')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('leave_type')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row no-gutters input-right-icon mt-25">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('leave.leave_from'); ?><span
                                                        class="text-danger"> *</span> </label>
                                                <input
                                                    class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('leave_from') ? ' is-invalid' : ''); ?>"
                                                    id="startDate" type="text"
                                                    name="leave_from" autocomplete="off"
                                                    value="<?php echo e(isset($apply_leave) ? date('m/d/Y', strtotime($apply_leave->leave_from)) : ''); ?>">
                                                <?php if($errors->has('leave_from')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('leave_from')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="mt-10" type="button">
                                                <i class="ti-calendar" id="start-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row no-gutters input-right-icon mt-25">
                                        <div class="col">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('leave.leave_to'); ?><span
                                                        class="text-danger">*</span> </label>
                                                <input
                                                    class="primary_input_field  primary_input_field date form-control form-control<?php echo e($errors->has('leave_to') ? ' is-invalid' : ''); ?>"
                                                    id="leave_to" type="text" name="leave_to"
                                                    value="<?php echo e(isset($apply_leave) ? date('m/d/Y', strtotime($apply_leave->leave_to)) : ''); ?>">
                                                <?php if($errors->has('leave_to')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('leave_to')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="mt-10" type="button">
                                                <i class="ti-calendar" id="to-date-icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-25">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('leave.reason'); ?> <span
                                                        class="text-danger"> *</span> </label>
                                                <textarea class="primary_input_field form-control" cols="0" rows="4" name="reason"><?php echo e(isset($apply_leave) ? $apply_leave->reason : ''); ?></textarea>
                                                <?php if($errors->has('reason')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('reason')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters input-right-icon mt-25">
                                        <div class="col">
                                            <div class="primary_input">
                                                <input class="primary_input_field" type="text"
                                                    placeholder="<?php echo e(isset($apply_leave->file) && $apply_leave->file != '' ? getFilePath3($apply_leave->file) : 'Attach File'); ?>"
                                                    disabled id="placeholderAttachFile">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button style="position: relative; top: 8px; right: 12px;"
                                                class="primary-btn-small-input" type="button">
                                                <label class="primary-btn small fix-gr-bg"
                                                    for="attach_file"><?php echo app('translator')->get('common.browse'); ?></label>
                                                <input type="file" class="d-none" name="attach_file"
                                                    id="attach_file">
                                            </button>
                                            <?php if($errors->has('attach_file')): ?>
                                                <span class="text-danger">
                                                    <?php echo e($errors->first('attach_file')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php
                                        $tooltip = '';
                                        if (userPermission('parent-leave-store')) {
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
                                                <?php if(isset($apply_leave)): ?>
                                                    <?php echo app('translator')->get('leave.update_apply_leave'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('leave.save_apply_leave'); ?>
                                                <?php endif; ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('leave.leave_list'); ?> </h3>
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
                                                <th><?php echo app('translator')->get('student.student'); ?></th>
                                                <th><?php echo app('translator')->get('common.type'); ?></th>
                                                <th><?php echo app('translator')->get('common.from'); ?></th>
                                                <th><?php echo app('translator')->get('common.to'); ?></th>
                                                <th><?php echo app('translator')->get('leave.apply_date'); ?></th>
                                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $apply_leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apply_leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($apply_leave->student->full_name); ?></td>
                                                    <td>
                                                        <?php if($apply_leave->leaveDefine != '' && $apply_leave->leaveDefine->leaveType != ''): ?>
                                                            <?php echo e($apply_leave->leaveDefine->leaveType->type); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td data-sort="<?php echo e(strtotime($apply_leave->leave_from)); ?>">
                                                        <?php echo e($apply_leave->leave_from != '' ? dateConvert($apply_leave->leave_from) : ''); ?>

    
                                                    </td>
                                                    <td data-sort="<?php echo e(strtotime($apply_leave->leave_to)); ?>">
                                                        <?php echo e($apply_leave->leave_to != '' ? dateConvert($apply_leave->leave_to) : ''); ?>

    
                                                    </td>
                                                    <td data-sort="<?php echo e(strtotime($apply_leave->apply_date)); ?>">
                                                        <?php echo e($apply_leave->apply_date != '' ? dateConvert($apply_leave->apply_date) : ''); ?>

    
                                                    </td>
                                                    <td>
                                                        <?php if($apply_leave->approve_status == 'P'): ?>
                                                            <button
                                                                class="primary-btn small bg-warning  text-white border-0 tr-bg"><?php echo app('translator')->get('common.pending'); ?></button>
                                                        <?php endif; ?>
                                                        <?php if($apply_leave->approve_status == 'A'): ?>
                                                            <button
                                                                class="primary-btn small bg-success  text-white border-0 tr-bg"><?php echo app('translator')->get('common.approved'); ?></button>
                                                        <?php endif; ?>
                                                        <?php if($apply_leave->approve_status == 'C'): ?>
                                                            <button
                                                                class="primary-btn small bg-danger  text-white border-0 tr-bg"><?php echo app('translator')->get('leave.cancelled'); ?></button>
                                                        <?php endif; ?>
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
                                                            <?php if(userPermission('parent-view-leave-details-apply')): ?>
                                                                <a data-modal-size="modal-lg"
                                                                    title="View Leave Details"
                                                                    class="dropdown-item modalLink"
                                                                    href="<?php echo e(route('parent-view-leave-details-apply', $apply_leave->id)); ?>"><?php echo app('translator')->get('common.view'); ?></a>
                                                            <?php endif; ?>
                                                            <?php if($apply_leave->approve_status == 'P'): ?>
                                                                <?php if(userPermission('parent-leave-edit')): ?>
                                                                    <a class="dropdown-item"
                                                                        href="<?php echo e(route('parent-leave-edit', [$apply_leave->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                                <?php endif; ?>
                                                                <?php if(userPermission('parent-leave-delete')): ?>
                                                                    <a class="dropdown-item" data-toggle="modal"
                                                                        data-target="#deleteApplyLeaveModal<?php echo e($apply_leave->id); ?>"
                                                                        href="#"><?php echo app('translator')->get('common.delete'); ?></a>
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
                                                <div class="modal fade admin-query"
                                                    id="deleteApplyLeaveModal<?php echo e($apply_leave->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('common.delete_apply_leave'); ?></h4>
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
                                                                    <?php echo e(Form::open(['route' => ['parent-leave-delete', $apply_leave->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

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
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/parentPanel/apply_leave.blade.php ENDPATH**/ ?>