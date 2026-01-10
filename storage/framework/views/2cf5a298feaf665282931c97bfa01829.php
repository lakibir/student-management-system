<?php $__env->startSection('title'); ?>

<?php echo app('translator')->get('exam.marks_grade'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.marks_grade'); ?> </h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examination'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.marks_grade'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($marks_grade)): ?>
             <?php if(userPermission("marks-grade-store")): ?>

                <div class="row">
                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                        <a href="<?php echo e(route('marks-grade')); ?>" class="primary-btn small fix-gr-bg">
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
                            <?php if(isset($marks_grade)): ?>
                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('marks-grade-update',$marks_grade->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                            <?php else: ?>
                            <?php if(userPermission("marks-grade-store")): ?>

                                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'marks-grade-store',
                                'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php if(isset($marks_grade)): ?>
                                            <?php echo app('translator')->get('exam.edit_grade'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('exam.add_grade'); ?>
                                        <?php endif; ?>
                                      
                                    </h3>
                                </div>
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12">
                                        
                                            <div class="primary_input">
                                                <label> <?php echo app('translator')->get('exam.grade_name'); ?> <span class="text-danger"> *</span></label>
                                                <input
                                                    class="primary_input_field form-control<?php echo e($errors->has('grade_name') ? ' is-invalid' : ''); ?>"
                                                    type="text" name="grade_name" autocomplete="off"
                                                    value="<?php echo e(isset($marks_grade)? $marks_grade->grade_name:Request::old('grade_name')); ?>">
                                                <input type="hidden" name="id"
                                                       value="<?php echo e(isset($marks_grade)? $marks_grade->id: ''); ?>">
                                              
                                                
                                                <?php if($errors->has('grade_name')): ?>
                                                    <span class="text-danger" >
                                                        <?php echo e($errors->first('grade_name')); ?></span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if(generalSetting()->result_type != 'mark'): ?>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.gpa'); ?> <span class="text-danger"> *</span></label>
                                                <input oninput="numberCheckWithDot(this)"
                                                    class="primary_input_field form-control<?php echo e($errors->has('gpa') ? ' is-invalid' : ''); ?>"
                                                    type="number" step="0.1" name="gpa" autocomplete="off"
                                                    value="<?php echo e(isset($marks_grade)? $marks_grade->gpa:Request::old('gpa')); ?>">
                                                <input type="hidden" name="id"
                                                       value="<?php echo e(isset($marks_grade)? $marks_grade->id: Request::old('gpa')); ?>">
                                                
                                                
                                                <?php if($errors->has('gpa')): ?>
                                                    <span class="text-danger" >
                                                <?php echo e($errors->first('gpa')); ?>

                                            </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <?php endif; ?> 
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.percent_from'); ?><span class="text-danger"> *</span></label>
                                                <input oninput="numberCheckWithDot(this)"
                                                    class="primary_input_field form-control<?php echo e($errors->has('percent_from') ? ' is-invalid' : ''); ?>"
                                                    type="number" name="percent_from" autocomplete="off" 
                                                    value="<?php echo e(isset($marks_grade)? $marks_grade->percent_from:Request::old('percent_from')); ?>">
                                                
                                                
                                                <?php if($errors->has('percent_from')): ?>
                                                    <span class="text-danger" >
                                                <?php echo e($errors->first('percent_from')); ?>

                                            </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.percent_to'); ?><span class="text-danger"> *</span></label>
                                                <input oninput="numberCheckWithDot(this)"
                                                    class="primary_input_field form-control<?php echo e($errors->has('percent_upto') ? ' is-invalid' : ''); ?>"
                                                    type="number" name="percent_upto" autocomplete="off"
                                                    value="<?php echo e(isset($marks_grade)? $marks_grade->percent_upto:Request::old('percent_upto')); ?>">
                                                <input type="hidden" name="id"
                                                       value="<?php echo e(isset($marks_grade)? $marks_grade->id: ''); ?>">
                                                
                                                
                                                <?php if($errors->has('percent_upto')): ?>
                                                    <span class="text-danger" >
                                                <?php echo e($errors->first('percent_upto')); ?>

                                            </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <?php if(generalSetting()->result_type != 'mark'): ?>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.gpa_from'); ?><span class="text-danger"> *</span></label>
                                                <input oninput="numberCheckWithDot(this)"
                                                    class="primary_input_field form-control<?php echo e($errors->has('grade_from') ? ' is-invalid' : ''); ?>"
                                                    type="number" step="0.1" name="grade_from" autocomplete="off"
                                                    value="<?php echo e(isset($marks_grade)? $marks_grade->from:Request::old('grade_from')); ?>">
                                               
                                                
                                                <?php if($errors->has('grade_from')): ?>
                                                    <span class="text-danger" >
                                                <?php echo e($errors->first('grade_from')); ?>

                                            </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.gpa_to'); ?><span class="text-danger"> *</span></label>
                                                <input oninput="numberCheckWithDot(this)"
                                                    class="primary_input_field form-control<?php echo e($errors->has('grade_upto') ? ' is-invalid' : ''); ?>"
                                                    type="number" step="0.1" name="grade_upto" autocomplete="off"
                                                    value="<?php echo e(isset($marks_grade)? $marks_grade->up: ''); ?>">
                                                <input type="hidden" name="id"
                                                       value="<?php echo e(isset($marks_grade)? $marks_grade->id: ''); ?>">
                                                
                                                
                                                <?php if($errors->has('grade_upto')): ?>
                                                    <span class="text-danger" >
                                                <?php echo e($errors->first('grade_upto')); ?>

                                            </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>
                                    <?php endif; ?> 
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.description'); ?> <?php if(generalSetting()->result_type == 'mark'): ?><span class="text-danger"> *</span><?php endif; ?> </label>
                                                <textarea class="primary_input_field form-control" cols="0" rows="4"
                                                          name="description"><?php echo e(isset($marks_grade)? $marks_grade->description: Request::old('description')); ?></textarea>
                                              
                                                
                                                <?php if($errors->has('description')): ?>
                                                    <span class="text-danger" >
                                                <?php echo e($errors->first('description')); ?>

                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
	                                <?php 
                                        $tooltip = "";
                                      if(userPermission("marks-grade-store") || userPermission("marks-grade-edit")){
                                            $tooltip = "";
                                        }else{
                                            $tooltip = "You have no permission to add";
                                        }
                                    ?>

                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                           <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                                <span class="ti-check"></span>

                                                <?php if(isset($marks_grade)): ?>
                                                    <?php echo app('translator')->get('exam.update_grade'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('exam.save_grade'); ?>
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
                                    <h3 class="mb-15"><?php echo app('translator')->get('exam.grade_list'); ?></h3>
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
                                        <th>
                                            <?php echo app('translator')->get('common.sl'); ?>
                                        </th>
                                        <th>
                                            <?php echo app('translator')->get('exam.grade'); ?>
                                        </th>
                                        <?php if(generalSetting()->result_type != 'mark'): ?>
                                        <th>
                                            <?php echo app('translator')->get('exam.gpa'); ?>
                                        </th>
                                        <?php endif; ?> 
                                        <th>
                                            <?php echo app('translator')->get('exam.percent_from_to'); ?>
                                        </th>
                                        
                                        <th>
                                            <?php if(generalSetting()->result_type == 'mark'): ?>
                                                <?php echo app('translator')->get('common.description'); ?>
                                            <?php else: ?> 
                                                <?php echo app('translator')->get('exam.gpa_from_to'); ?>
                                            <?php endif; ?> 
                                        </th>
                                       
                                        <th>
                                            <?php echo app('translator')->get('common.action'); ?>
                                        </th>
                                    </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php
                                            $i=1;
                                        ?>
                                    <?php $__currentLoopData = $marks_grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marks_grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e(@$i++); ?>

                                            </td>
                                            <td>
                                                <?php echo e(@$marks_grade->grade_name); ?>

                                            </td>
                                            <?php if(generalSetting()->result_type != 'mark'): ?>
                                            <td>
                                                <?php echo e(@$marks_grade->gpa); ?>

                                            </td>
                                            <?php endif; ?> 
                                            <td>
                                                <?php echo e(@$marks_grade->percent_from); ?>-<?php echo e(@$marks_grade->percent_upto); ?>%
                                            </td>
                                           
                                            <td>
                                                <?php if(generalSetting()->result_type == 'mark'): ?>
                                                <?php echo e(@$marks_grade->description); ?>

                                                <?php else: ?> 
                                                <?php echo e(@$marks_grade->from); ?>-<?php echo e(@$marks_grade->up); ?>

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
                                                       <?php if(userPermission('marks-grade-edit')): ?>
    
                                                       <a class="dropdown-item" href="<?php echo e(route('marks-grade-edit', [$marks_grade->id
                                                        ])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                       <?php endif; ?>
                                                       <?php if(userPermission('marks-grade-delete')): ?>
    
                                                       <a class="dropdown-item" data-toggle="modal"
                                                           data-target="#deleteMarksGradeModal<?php echo e(@$marks_grade->id); ?>"
                                                           href="#"><?php echo app('translator')->get('common.delete'); ?></a>
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
                                        <div class="modal fade admin-query" id="deleteMarksGradeModal<?php echo e(@$marks_grade->id); ?>">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?php echo app('translator')->get('exam.delete_grade'); ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                        </div>
                                                        <div class="mt-40 d-flex justify-content-between">
                                                            <button type="button" class="primary-btn tr-bg"
                                                                    data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                            <?php echo e(Form::open(['route' => array('marks-grade-delete',$marks_grade->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

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
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/examination/marks_grade.blade.php ENDPATH**/ ?>