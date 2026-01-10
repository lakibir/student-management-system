    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('wallet::wallet.wallet_report'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('wallet::wallet.wallet_report'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('wallet::wallet.my_wallet'); ?></a>
                <a href="#"><?php echo app('translator')->get('wallet::wallet.wallet_report'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'route' => 'wallet.wallet-report-search', 'method' => 'POST'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-md-4">
                                <label class="primary_input_label" for="">
                                    <?php echo e(__('common.date_range')); ?>

                                        <span class="text-danger"> *</span>
                                </label>
                                <input placeholder="" class="primary_input_field primary_input_field form-control" type="text" name="date_range" value="">
                            </div>
                            <div class="col-lg-4 mt-30-md">
                                <label class="primary_input_label" for="">
                                    <?php echo e(__('common.type')); ?>

                                        <span class="text-danger"> *</span>
                                </label>
                                <select class="primary_select  form-control<?php echo e($errors->has('type') ? ' is-invalid' : ''); ?>" name="type">
                                    <option data-display="<?php echo app('translator')->get('common.select_type'); ?>*" value=""><?php echo app('translator')->get('common.select_type'); ?>*</option>
                                    <option value="diposit"><?php echo app('translator')->get('wallet::wallet.diposit'); ?></option>
                                    <option value="refund"><?php echo app('translator')->get('wallet::wallet.refund'); ?></option>
                                </select>
                            </div>
                            <div class="col-lg-4 mt-30-md">
                                <label class="primary_input_label" for="">
                                    <?php echo e(__('common.status')); ?>

                                        <span class="text-danger"> </span>
                                </label>
                                <select class="primary_select  form-control" name="status">
                                    <option data-display="<?php echo app('translator')->get('common.select_status'); ?>" value=""><?php echo app('translator')->get('common.select_status'); ?></option>
                                    <option value="pending"><?php echo app('translator')->get('common.pending'); ?></option>
                                    <option value="approve"><?php echo app('translator')->get('wallet::wallet.approve'); ?></option>
                                    <option value="reject"><?php echo app('translator')->get('wallet::wallet.reject'); ?></option>
                                </select>
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
</section>
<section class="admin-visitor-area up_st_admin_visitor mt-40">
    <div class="container-fluid p-0">
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
                                    <th><?php echo app('translator')->get('common.sl'); ?></th>
                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                    <th><?php echo app('translator')->get('common.status'); ?></th>
                                    <th><?php echo app('translator')->get('wallet::wallet.apply_date'); ?></th>
                                    <th><?php echo app('translator')->get('wallet::wallet.approve_date'); ?></th>
                                </tr>
                            </thead>
                            <?php if(isset($walletReports)): ?>
                                <tbody>
                                    <?php $__currentLoopData = $walletReports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$walletReport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <td><?php echo e(@$walletReport->userName->full_name); ?></td>
                                            <td>
                                                <?php if($walletReport->status == 'pending'): ?>
                                                    <button class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('common.pending'); ?></button> 
                                                <?php elseif($walletReport->status == 'approve'): ?>
                                                    <button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('wallet::wallet.approve'); ?></button>
                                                <?php else: ?>
                                                    <button class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('wallet::wallet.reject'); ?></button>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e(dateConvert($walletReport->created_at)); ?></td>
                                            <td><?php echo e(dateConvert($walletReport->updated_at)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            <?php endif; ?>
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
<?php echo $__env->make('backEnd.partials.data_table_js', ['i' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_range_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/Wallet\Resources/views/walletReport.blade.php ENDPATH**/ ?>