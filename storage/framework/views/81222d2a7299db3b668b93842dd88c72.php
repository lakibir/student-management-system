<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.donor'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.donor'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.front_settings'); ?></a>
                    <a href="<?php echo e(route('donor')); ?>"><?php echo app('translator')->get('front_settings.donor'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">
                                <?php if(isset($add_donor)): ?>
                                    <?php echo app('translator')->get('front_settings.edit_donor'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('front_settings.donor'); ?>
                                <?php endif; ?>
                            </h3>
                        </div>
                        <?php if(isset($add_donor)): ?>
                            <?php echo e(Form::open([
                                'class' => 'form-horizontal',
                                'files' => true,
                                'route' => 'donor-update',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                            ])); ?>

                            <input type="hidden" value="<?php echo e(@$add_donor->id); ?>" name="id">
                        <?php else: ?>
                            <?php if(userPermission('donor-store')): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'donor-store',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                ])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.name'); ?> <span
                                                    class="text-danger"> *</span></label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off"
                                                value="<?php echo e(isset($add_donor) ? @$add_donor->full_name : old('name')); ?>">
                                            <?php if($errors->has('name')): ?>
                                                <span class="text-danger d-block">
                                                    <?php echo e($errors->first('name')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.profession'); ?> </label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('profession') ? ' is-invalid' : ''); ?>"
                                                type="text" name="profession" autocomplete="off"
                                                value="<?php echo e(isset($add_donor) ? @$add_donor->profession : old('profession')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label"
                                                for="date_of_birth"><?php echo app('translator')->get('common.date_of_birth'); ?></label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <input
                                                                class="primary_input_field primary_input_field date form-control"
                                                                id="date_of_birth" type="text" name="date_of_birth"
                                                                value="<?php echo e(!@$add_donor->date_of_birth ? (old('admission_date') != '' ? old('admission_date') : date('m/d/Y')) : date('m/d/Y', strtotime($add_donor->date_of_birth))); ?>"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <button class="btn-date" style="top: 55% !important;"
                                                        data-id="#date_of_birth" type="button">
                                                        <label class="m-0 p-0" for="date_of_birth">
                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                        </label>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="text-danger"><?php echo e($errors->first('date_of_birth')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.email'); ?> </label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                type="text" name="email" autocomplete="off"
                                                value="<?php echo e(isset($add_donor) ? @$add_donor->email : old('email')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.mobile'); ?> </label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>"
                                                type="text" name="mobile" autocomplete="off"
                                                value="<?php echo e(isset($add_donor) ? @$add_donor->mobile : old('mobile')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('common.photo'); ?> </label>
                                            <div class="primary_file_uploader">
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('photo') ? ' is-invalid' : ''); ?>"
                                                    type="text" id="placeholderFileOneName" name="photo"
                                                    placeholder="<?php echo e(isset($add_donor) ? (@$add_donor->photo != '' ? getFilePath3(@$add_donor->photo) : trans('common.photo')) : trans('common.photo')); ?>"
                                                    id="placeholderUploadContent" readonly>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="document_file_1"><?php echo app('translator')->get('common.browse'); ?></label>
                                                    <input type="file" class="d-none" name="photo"
                                                        id="document_file_1">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.age'); ?> </label>
                                            <input
                                                class="primary_input_field form-control<?php echo e($errors->has('age') ? ' is-invalid' : ''); ?>"
                                                type="text" name="age" autocomplete="off"
                                                value="<?php echo e(isset($add_donor) ? @$add_donor->age : old('age')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-6 primary_input sm_mb_20">
                                                    <label><strong><?php echo app('translator')->get('front_settings.show_public'); ?></strong></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 radio-btn-flex">
                                            <div class="row">
                                                <div class="col-lg-6 primary_input sm_mb_20">
                                                    <input type="radio" name="show_public"
                                                        id="show_public"
                                                        class="common-radio" value="1"
                                                        <?php echo e(@$add_donor->show_public == 1 ? 'checked' : ''); ?>>
                                                    <label for="show_public"><?php echo app('translator')->get('front_settings.show_public'); ?></label>
                                                </div>
                                                <div class="col-lg-6 primary_input sm_mb_20">
                                                    <input type="radio" name="show_public"
                                                        id="do_not_show_public"
                                                        class="common-radio" value="0"
                                                        <?php echo e(@$add_donor->show_public == 0 ? 'checked' : ''); ?>>
                                                    <label for="do_not_show_public"><?php echo app('translator')->get('front_settings.do_not_show_public'); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.gender'); ?> </label>
                                            <select
                                                class="primary_select  form-control"
                                                name="gender">
                                                <option data-display="<?php echo app('translator')->get('front_settings.gender'); ?>" value="">
                                                    <?php echo app('translator')->get('front_settings.gender'); ?>
                                                </option>
                                                <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($gender->id); ?>"
                                                        <?php echo e(@$add_donor->gender_id && $add_donor->gender_id == $gender->id ? 'selected' : ''); ?>>
                                                        <?php echo e($gender->base_setup_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.blood_group'); ?> </label>
                                            <select
                                                class="primary_select  form-control"
                                                name="blood_group">
                                                <option data-display="<?php echo app('translator')->get('front_settings.blood_group'); ?>" value="">
                                                    <?php echo app('translator')->get('front_settings.blood_group'); ?>
                                                </option>
                                                <?php $__currentLoopData = $blood_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blood_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($blood_group->id); ?>"
                                                        <?php echo e(@$add_donor->bloodgroup_id && $add_donor->bloodgroup_id == $blood_group->id ? 'selected' : ''); ?>>
                                                        <?php echo e($blood_group->base_setup_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.religion'); ?> </label>
                                            <select
                                                class="primary_select  form-control"
                                                name="religion">
                                                <option data-display="<?php echo app('translator')->get('front_settings.religion'); ?>" value="">
                                                    <?php echo app('translator')->get('front_settings.religion'); ?>
                                                </option>
                                                <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($religion->id); ?>"
                                                        <?php echo e(@$add_donor->religion_id && $add_donor->religion_id == $religion->id ? 'selected' : ''); ?>>
                                                        <?php echo e($religion->base_setup_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-lg-6">
                                        <div class="primary_input  mt-20">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.current_address'); ?>
                                            </label>
                                            <textarea class="primary_input_field form-control"
                                                cols="0" rows="3" name="current_address" id="current_address"><?php echo e(@$add_donor->current_address ? $add_donor->current_address : old('current_address')); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input  mt-20">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.permanent_address'); ?>
                                            </label>
                                            <textarea class="primary_input_field form-control"
                                                cols="0" rows="3" name="permanent_address" id="permanent_address"><?php echo e(@$add_donor->permanent_address ? $add_donor->permanent_address : old('permanent_address')); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php if(count($custom_fields) && is_show('custom_field') && isMenuAllowToShow('custom_field')): ?>
                                    <div class="row mt-40">
                                        <div class="col-lg-12">
                                            <div class="main-title">
                                                <h4 class="stu-sub-head"><?php echo app('translator')->get('front_settings.custom_field'); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $__env->make('backEnd.studentInformation._custom_field', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                            title="<?php echo e(@$tooltip); ?>">
                                            <?php if(isset($add_donor)): ?>
                                                <?php echo app('translator')->get('common.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('common.add'); ?>
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
        </div>

        <div class="row mt-50">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"><?php echo app('translator')->get('front_settings.donor_list'); ?></h3>
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
                                        <th><?php echo app('translator')->get('front_settings.name'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.profession'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.email'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.mobile'); ?></th>
                                        <th><?php echo app('translator')->get('front_settings.image'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $donors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e(@$value->full_name); ?></td>
                                            <td><?php echo e(@$value->profession); ?></td>
                                            <td><?php echo e(@$value->email); ?></td>
                                            <td><?php echo e(@$value->mobile); ?></td>
                                            <td><img src="<?php echo e(asset(@$value->photo)); ?>" width="50px" height="50px">
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
                                                    <a class="dropdown-item"
                                                        href="<?php echo e(route('donor-edit', @$value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                    <a href="<?php echo e(route('donor-delete-modal', @$value->id)); ?>"
                                                        class="dropdown-item small fix-gr-bg modalLink"
                                                        title="<?php echo app('translator')->get('front_settings.delete_donor'); ?>" data-modal-size="modal-md">
                                                        <?php echo app('translator')->get('common.delete'); ?>
                                                    </a>
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
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/frontSettings/donor/donor.blade.php ENDPATH**/ ?>