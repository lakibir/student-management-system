<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('system_settings.optional_subject'); ?>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('system_settings.assign_optional_subject'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->get('system_settings.optional_subject'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12"> 
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('system_settings.assign_optional_subject'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php if(userPermission('optional_subject_setup_post')): ?>
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'optional_subject_setup_post', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                    <?php endif; ?>    
                    <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-4">
                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('common.select_class'); ?> <span class="text-danger"> *</span></label>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="primary_input">
                                            <input type="checkbox" id="class<?php echo e(@$class->id); ?>" class="common-checkbox exam-checkbox" name="class[]" value="<?php echo e(@$class->id); ?>" <?php echo e(isset($editData)? (@$class->id == @$editData->class_id? 'checked':''):''); ?>>
                                            <label for="class<?php echo e(@$class->id); ?>"><?php echo e(@$class->class_name); ?></label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="primary_input">
                                    <input type="checkbox" id="all_exams" class="common-checkbox" name="all_exams[]" value="0" <?php echo e((is_array(old('class')) and in_array(@$class->id, old('class'))) ? ' checked' : ''); ?>>
                                    <label for="all_exams"><?php echo app('translator')->get('system_settings.all_select'); ?></label>
                                </div>
                                <?php if($errors->has('class')): ?>
                                <span class="text-danger validate-textarea-checkbox" role="alert">
                                    <?php echo e($errors->first('class')); ?>

                                </span>
                            <?php endif; ?>
                                </div>
                                    <div class="col-lg-4">
                                        <div class="primary_input">
                                            <label class="primary_input_label" for=""><?php echo app('translator')->get('reports.gpa_above'); ?> <span class="text-danger"> *</span></label>
                                            <input oninput= "numberCheckWithDot(this)" class="primary_input_field form-control<?php echo e($errors->has('gpa_above') ? ' is-invalid' : ''); ?>"
                                             name="gpa_above" id="exam_mark_main" autocomplete="off" value="<?php echo e(isset($editData)?  number_format(@$editData->gpa_above, 2, '.', ' ') : 0); ?>" >
                                           
                                            
                                            <?php if($errors->has('gpa_above')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('gpa_above')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                               <?php 
                                    $tooltip = "";
                                    if(userPermission('optional_subject_setup_post') || userPermission('class_optional_edit')){
                                            $tooltip = "";
                                        }else{
                                            $tooltip = "You have no permission to add";
                                        }
                                ?>
                                <div class="col-lg-4 mt-30-md mt-35" id="select_subject_div">
                                    <button type="submit" class="primary-btn small fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e(@$tooltip); ?>">
                                        <span class="pr-2"></span>
                                        <?php if(isset($editData)): ?>
                                        <?php echo app('translator')->get('system_settings.update'); ?>
                                        <?php else: ?>
                                        <?php echo app('translator')->get('system_settings.save'); ?>
                                        <?php endif; ?>
                                    </button>
                                </div> 
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</section>
 <?php if(isset($class_optionals)): ?>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="white-box mt-40">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="main-title">
                            <h3 class="mb-15"> <?php echo app('translator')->get('system_settings.optional_subject'); ?>  </h3>
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
                                        <th><?php echo app('translator')->get('common.class_name'); ?></th>
                                        <th><?php echo app('translator')->get('reports.gpa_above'); ?></th>
                                        <th><?php echo app('translator')->get('common.action'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php $i=0; ?>
                                    <?php $__currentLoopData = $class_optionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class_optional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$i); ?></td>
                                        <td><?php echo e(@$class_optional->class_name); ?></td>
                                        <td><?php echo e(number_format(@$class_optional->gpa_above, 2, '.', ' ')); ?></td>
                                    
                                        <td>
                                            <div class="row">
                                            
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
                                                            <?php if(userPermission('class_optional_edit')): ?>
                                                                <a class="dropdown-item" href="<?php echo e(route('class_optional_edit', [@$class_optional->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                            <?php endif; ?>
                                                            <?php if(userPermission('delete_optional_subject')): ?>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteSubjectModal<?php echo e(@$class_optional->id); ?>"  href="#"><?php echo app('translator')->get('common.delete'); ?></a>
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
                                                
                                            </div>
    
    
                                        
    
                                        </td>
                                    </tr>
                                    <div class="modal fade admin-query" id="deleteSubjectModal<?php echo e(@$class_optional->id); ?>" >
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete_optional_subject'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
    
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                    </div>
    
                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                        <a href="<?php echo e(route('delete_optional_subject', [@$class_optional->id])); ?>" class="text-light">
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
    </section>
<?php endif; ?>
  
 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/systemSettings/optional_subject_setup.blade.php ENDPATH**/ ?>