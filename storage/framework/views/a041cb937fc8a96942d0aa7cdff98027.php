<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('accounts.payroll_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <style>

            table.dataTable tbody th,
            table.dataTable tbody td {
                padding: 20px 30px 20px 30px !important;
            }

            table.dataTable tfoot th,
            table.dataTable tfoot td {
                padding: 10px 30px 6px 30px;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php
        @$setting = generalSetting();
        if (!empty(@$setting->currency_symbol)) {
            @$currency = @$setting->currency_symbol;
        } else {
            @$currency = '$';
        }
    ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('accounts.payroll_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('accounts.accounts'); ?></a>
                    <a href="#"><?php echo app('translator')->get('accounts.reports'); ?></a>
                    <a href="#"><?php echo app('translator')->get('accounts.payroll_report'); ?></a>
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
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'accounts-payroll-report-search', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-6 offset-lg-3 mt-30-md">
                                <div class="no-gutters input-right-icon">
                                    <div class="col">
                                        <div class="primary_input">
                                            <input placeholder=""
                                                class="primary_input_field primary_input_field form-control text-center"
                                                type="text" name="date_range" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-20 text-center">
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
            <?php if(isset($payroll_infos)): ?>
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-lg-6 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('accounts.payroll_report'); ?></h3>
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
                                                    <th><?php echo app('translator')->get('common.name'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.expense_head'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.payment_method'); ?></th>
                                                    <th><?php echo app('translator')->get('accounts.amount'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $total=0;
                                                ?>
                                                <?php $__currentLoopData = $payroll_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payroll_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php 
                                                    $total= $total+ $payroll_info->amount
                                                ?>
                                                <tr>
                                                    <td><?php echo e(@$payroll_info->description); ?></td>
                                                    <td><?php echo e(@$payroll_info->ACHead->head); ?></td>
                                                    <td>
                                                    <?php echo e(@$payroll_info->paymentMethod->method); ?>

                                                    <?php if(@$payroll_info->payment_method_id==3): ?>
                                                    (<?php echo e(@$payroll_info->account->bank_name); ?>)
                                                    <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e(currency_format(@$payroll_info->amount)); ?></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?php echo app('translator')->get('accounts.total'); ?></td>
                                                    <td><?php echo e(currency_format($total)); ?></td>
                                                </tr>
                                            </tfoot>
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
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', ['i' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_range_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/accounts/accounts_payroll_report.blade.php ENDPATH**/ ?>