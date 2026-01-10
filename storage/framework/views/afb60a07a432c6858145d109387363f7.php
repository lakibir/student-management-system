<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('exam.exam_type'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .exam-type-actions{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .dtr-data .CRM_dropdown {
            margin-bottom: 10px;
        }

        @media (max-width: 480px){
            .dtr-data a.small {
                font-size: 10px!important;
                padding: 0px 8px
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('exam.exam_type'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                <a href="#"><?php echo app('translator')->get('exam.exam_type'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">

        <?php if(isset($exam_type_edit)): ?>
         <?php if(userPermission('exam_type_store')): ?>
                       
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('exam-type')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <div class="row">
           

            <div class="col-lg-4 col-xl-3">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($exam_type_edit)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_type_update', 'method' => 'POST'])); ?>

                        <?php else: ?>
                         <?php if(userPermission('exam_type_store')): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'exam_type_store', 'method' => 'POST'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15"><?php if(isset($exam_type_edit)): ?>
                                        <?php echo app('translator')->get('exam.edit_exam_type'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('exam.add_exam_type'); ?>
                                    <?php endif; ?>
                                  
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label> <?php echo app('translator')->get('exam.exam_name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('exam_type_title') ? ' is-invalid' : ''); ?>" type="text" name="exam_type_title" autocomplete="off" value="<?php echo e(isset($exam_type_edit)? $exam_type_edit->title : ''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($exam_type_edit)? $exam_type_edit->id: Request::old('exam_type_title')); ?>">
                                            <?php if($errors->has('exam_type_title')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('exam_type_title')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>  

                                <div class="row mt-20">
                                    <div class="col-lg-12">
                                        <label><?php echo app('translator')->get('exam.average_passing_examination'); ?></label>
                                        <div class="primary_input">
                                            <input type="checkbox" id="averageExam" class="common-checkbox exam-checkbox" name="is_average" <?php echo e(isset($exam_type_edit)? ($exam_type_edit->is_average == 1 ? 'checked' : '') : Request::old('is_average')); ?> <?php echo e(old('is_average') == 'yes' ? 'checked' : ''); ?>>
                                            <label for="averageExam"><?php echo app('translator')->get('common.yes'); ?></label>
                                        </div>
                                    </div>
                                </div>  

                                <div class="row mt-20 averagePercentage d-none">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label> <?php echo app('translator')->get('exam.average_mark'); ?><span class="text-danger">*</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('average_mark') ? ' is-invalid' : ''); ?>" type="text" name="average_mark" autocomplete="off" value="<?php echo e(isset($exam_type_edit)? $exam_type_edit->average_mark : Request::old('average_mark')); ?>">
                                            <?php $__errorArgs = ['average_mark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
	                            <?php 
                                  $tooltip = "";
                                  if(userPermission('exam_type_store') || userPermission('exam_type_edit')){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>

                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($exam_type_edit)): ?>
                                                <?php echo app('translator')->get('exam.update_exam_type'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('exam.save_exam_type'); ?>
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

            <div class="col-lg-8 col-xl-9">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-12 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('exam')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('exam.exam_setup'); ?>
                            </a>
                        </div>
            
                    </div>
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15 "><?php echo app('translator')->get('exam.exam_type_list'); ?></h3>
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
                                        <th><?php echo app('translator')->get('exam.exam_name'); ?></th>
                                        <th><?php echo app('translator')->get('exam.is_average_passing_exam'); ?></th>
                                        <th><?php echo app('translator')->get('exam.average_mark'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php $i=0; ?>
                                    <?php $__currentLoopData = $exams_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exams_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$i); ?></td>
                                        <td><?php echo e(@$exams_type->title); ?></td>
                                        <td><?php echo e($exams_type->is_average == 1 ? __('common.yes') : __('common.no')); ?></td>
                                        <td><?php echo e(number_format($exams_type->average_mark, 2, '.', '')); ?></td>
                                        <td class="exam-type-actions">
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
    
                                                            <?php if(userPermission('exam_type_edit')): ?>
    
                                                            <a class="dropdown-item" href="<?php echo e(route('exam_type_edit', [$exams_type->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                            <?php endif; ?>
                                                            <?php if(userPermission('exam_type_delete')): ?>
    
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#deleteSubjectModal<?php echo e(@$exams_type->id); ?>"  href="#"><?php echo app('translator')->get('common.delete'); ?></a>
                                                       <?php endif; ?>
                                                        </div>
                                                    </div>
                                                     <a class="primary-btn small tr-bg" style="white-space: nowrap" href="<?php echo e(route('exam-marks-setup',$exams_type->id)); ?>">
                                                        <span class="pl ti-settings"></span> <?php echo app('translator')->get('exam.exam_setup'); ?>
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
                                     <div class="modal fade admin-query" id="deleteSubjectModal<?php echo e(@$exams_type->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('exam.delete_exam_type'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
    
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                    </div>
    
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                        <a href="<?php echo e(route('exam_type_delete', [@$exams_type->id])); ?>" class="text-light">
                                                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                         </a>
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
<?php $__env->startPush('script'); ?>
    <script>
        $( document ).ready(function() {
            if($("#averageExam").is(':checked')){
                $(this).val('yes');
                if($('.averagePercentage').hasClass('d-none')){
                    $('.averagePercentage').removeClass('d-none');
                }
            }

            $("#averageExam").on('click', function(){  
                if($(this).is(':checked')){
                    $(this).val('yes');
                    if($('.averagePercentage').hasClass('d-none')){
                        $('.averagePercentage').removeClass('d-none');
                    }
                }else{
                    $(this).val('');
                    $('.averagePercentage').addClass('d-none');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/examination/exam_type.blade.php ENDPATH**/ ?>