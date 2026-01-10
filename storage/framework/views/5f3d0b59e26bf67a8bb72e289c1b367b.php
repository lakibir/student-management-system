<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('admin.student_certificate'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .certificate-middle {
            margin-bottom: 280px;
        }

        .student-certificate .certificate-position {
            position: absolute;
            top: 19%;
        }
        .school-table .dropdown.show .dropdown-toggle:after {
            top: 0 !important;
            left: 0 !important;
        }

        .modal-body {
            overflow: auto;
        }

        .student-certificate {
            width: 990px;
            height: 740px;
        }


    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20 up_breadcrumb">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('admin.student_certificate'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('admin.admin_section'); ?></a>
                <a href="#"><?php echo app('translator')->get('admin.student_certificate'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($certificate)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(route('student-certificate')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('common.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
           
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($certificate)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => array('student-certificate-update',$certificate->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                          <?php if(userPermission("student-certificate")): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student-certificate-store',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">

                        <div class="main-title">
                            <h3 class="mb-15"><?php if(isset($certificate)): ?>
                                    <?php echo app('translator')->get('admin.edit_certificate'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->get('admin.add_certificate'); ?>
                                <?php endif; ?>
                              
                            </h3>
                        </div>
                            <div class="add-visitor">
                                
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('admin.certificate_name'); ?> <span class="text-danger"> *</span></label>
                                            <input class="primary_input_field form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                type="text" name="name" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->name: old('name')); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($certificate)? $certificate->id: ''); ?>">
                                            
                                            <?php if($errors->has('name')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('name')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('admin.header_left_text'); ?><span></span></label>
                                            <input class="primary_input_field<?php echo e($errors->has('header_left_text') ? ' is-invalid' : ''); ?>"
                                                type="text" name="header_left_text" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->header_left_text: old('header_left_text')); ?>">
                                           
                                            <?php if($errors->has('header_left_text')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('header_left_text')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('common.date'); ?> <span></span></label>
                                            <div class="primary_datepicker_input">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="">
                                                            <input class="primary_input_field primary_input_field date form-control" id="startDate" type="text" name="date" autocomplete="off" value="<?php echo e(isset($certificate)? date('m/d/Y', strtotime($certificate->date)): date('m/d/Y')); ?>">
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
                                            <label><?php echo app('translator')->get('admin.body_max_character_lenght_500'); ?> <span></span></label>
                                            <textarea class="primary_input_field" cols="0" rows="4" name="body" maxlength="500"><?php echo e(isset($certificate)? $certificate->body: old('body')); ?></textarea>
                                            
                                            

                                            <?php if($errors->has('body')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('body')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <span class="text-primary">
                                            [name] [dob] [present_address] [guardian] [created_at] [admission_no] [roll_no]  [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone]
                                            <?php if(moduleStatusCheck('University')): ?>
                                            [arabic_name] [faculty] [session] [department] [academic] [semester] [semester_label] [graduation_date]
                                            <?php else: ?> 
                                            [class] [section]
                                            <?php endif; ?> 
                                        </span>
                                    </div>
                                    <div class="col-lg-6 mt-20">
                                        <div class="primary_input">
                                            <label for="font_size"><?php echo app('translator')->get('admin.body_font'); ?> <span class="text-danger"></span></label>
                                            <select class="primary_select form-control" name="body_font_family" id="font-family">
                                                <option data-display=" <?php echo app('translator')->get('admin.body_font'); ?>" value=""> <?php echo app('translator')->get('admin.body_font'); ?></option>
                                                <option value="Arial" <?php echo e(isset($certificate) ? ($certificate->body_font_family == 'Arial' ? 'selected' : ''):''); ?> >Arial</option>
                                                <option value="Arial Black" <?php echo e(isset($certificate) ? ($certificate->body_font_family == 'Arial Black' ? 'selected' : '') :''); ?> >Arial Black</option>
                                                <option value="Pinyon Script" <?php echo e(isset($certificate) ? ($certificate->body_font_family == 'Pinyon Script' ? 'selected' : '') :''); ?> >Pinyon Script</option>
                                                <option value="Comic Sans MS" <?php echo e(isset($certificate) ? ($certificate->body_font_family == 'Comic Sans MS' ? 'selected' : '') :''); ?> >Comic Sans MS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-20">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('admin.font_size'); ?><span class="text-danger">*</span></label>
                                            <input class="primary_input_field<?php echo e($errors->has('body_font_size') ? ' is-invalid' : ''); ?> body_font_size" 
                                                type="text" name="body_font_size" placeholder="Ex: 2em" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->body_font_size: old('body_font_size')); ?>">
                                           
                                          
                                            <?php if($errors->has('body_font_size')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('body_font_size')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15" id="body_two_part">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('admin.body_two_max_character_lenght_500'); ?> <span></span></label>
                                            <textarea class="primary_input_field" cols="0" rows="4" name="body_two" maxlength="500"><?php echo e(isset($certificate)? $certificate->body_two: old('body_two')); ?></textarea>
                                            

                                            <?php if($errors->has('body_two')): ?>
                                                <span class="error text-danger"><?php echo e($errors->first('body_two')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <span class="text-primary">
                                            [name] [dob] [present_address] [guardian] [created_at] [admission_no] [roll_no]  [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone]
                                            <?php if(moduleStatusCheck('University')): ?>
                                            [arabic_name] [faculty] [session] [department] [academic] [semester] [semester_label] [graduation_date]
                                            <?php else: ?> 
                                            [class] [section]
                                            <?php endif; ?> 
                                        </span>
                                    </div>
                                   
                                </div>


                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('admin.footer_left_text'); ?> <span></span></label>
                                            <input class="primary_input_field<?php echo e($errors->has('footer_left_text') ? ' is-invalid' : ''); ?>"
                                                type="text" name="footer_left_text" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->footer_left_text: old('footer_left_text')); ?>">
                                            
                                          
                                            <?php if($errors->has('footer_left_text')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('footer_left_text')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('admin.footer_center_text'); ?><span></span></label>
                                            <input class="primary_input_field<?php echo e($errors->has('footer_center_text') ? ' is-invalid' : ''); ?>"
                                                type="text" name="footer_center_text" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->footer_center_text: old('footer_center_text')); ?>">
                                            
                                          
                                            <?php if($errors->has('footer_center_text')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('footer_center_text')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('admin.footer_right_text'); ?><span></span></label>
                                            <input class="primary_input_field<?php echo e($errors->has('footer_right_text') ? ' is-invalid' : ''); ?>"
                                                type="text" name="footer_right_text" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->footer_right_text: old('footer_right_text')); ?>">
                                           
                                          
                                            <?php if($errors->has('footer_right_text')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('footer_right_text')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12 mb-20">
                                        <label class="primary_input_label" for="">
                                            <?php echo e(_trans('certificate.Page Layout')); ?>

                                            <span class="text-danger"> *</span>
                                        </label>
                                        <select
                                            class="primary_select select_layout form-control<?php echo e($errors->has('layout') ? ' is-invalid' : ''); ?>"
                                            name="layout" id="layout">
                                            <option data-display=" <?php echo e(_trans('certificate.Page Layout')); ?> *"
                                                value=""> <?php echo e(_trans('certificate.Page Layout')); ?> *
                                            </option>
                                            <option value="1"
                                                <?php echo e(isset($certificate) ? ($certificate->layout == 1 ? 'selected' : '') : ''); ?>>
                                                <?php echo e(_trans('certificate.A4 (Portrait)')); ?> </option>
                                            <option value="2"
                                                <?php echo e(isset($certificate) ? ($certificate->layout == 2 ? 'selected' : '') : ''); ?>>
                                                <?php echo e(_trans('certificate.A4 (Landscape)')); ?> </option>
                                            <option value="3"
                                                <?php echo e(isset($certificate) ? ($certificate->layout == 3 ? 'selected' : '') : ''); ?>>
                                                <?php echo e(_trans('certificate.Custom')); ?> </option>

                                        </select>
                                        <?php if($errors->has('layout')): ?>
                                            <span class="text-danger invalid-select" role="alert">
                                                <?php echo e($errors->first('layout')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('admin.height'); ?> (mm)<span class="text-danger">*</span></label>
                                            <input class="primary_input_field<?php echo e($errors->has('height') ? ' is-invalid' : ''); ?> certificate_height" 
                                                type="text" name="height" placeholder="<?php echo app('translator')->get('admin.height'); ?>" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->height: old('height')); ?>">
                                           
                                          
                                            <?php if($errors->has('height')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('height')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="primary_input">
                                            <label><?php echo app('translator')->get('admin.width'); ?> (mm)<span class="text-danger">*</span></label>
                                            <input class="primary_input_field<?php echo e($errors->has('width') ? ' is-invalid' : ''); ?> certificate_width"
                                                type="text" name="width" placeholder="<?php echo app('translator')->get('admin.width'); ?>" autocomplete="off" value="<?php echo e(isset($certificate)? $certificate->width: old('width')); ?>">
                                           
                                          
                                            <?php if($errors->has('width')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('width')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row mt-15">
                                    <div class="col-lg-12 d-flex align-items-center">
                                        <p class="text-uppercase fw-500 mb-10"><?php echo app('translator')->get('admin.student_photo'); ?></p>
                                        <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="student_photo" id="relationFather" value="1" class="common-radio relationButton" <?php echo e(isset($certificate)? ($certificate->student_photo == 1? 'checked': ''):'checked'); ?>>
                                                <label for="relationFather"><?php echo app('translator')->get('common.yes'); ?></label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="student_photo" id="relationMother" value="0" class="common-radio relationButton" <?php echo e(isset($certificate)? ($certificate->student_photo == 0? 'checked': ''):''); ?>>
                                                <label for="relationMother"><?php echo app('translator')->get('common.none'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-none">
                                    <div class="row no-gutters input-right-icon mt-25">
                                        <label for="checkbox" class="mb-2"><?php echo app('translator')->get('admin.certificate_no'); ?></label>
                                        <div class="">
                                            <input type="checkbox" id="checkbox" class="common-checkbox">
                                        </div>
                                    
                                    </div>
                                </div>
                                
                                <div class="row mt-15">
                                    <div class="col-lg-12">
                                        <div class="primary_input">
                                            <div class="primary_file_uploader">
                                                <input class="primary_input_field" type="text" id="placeholderInput"
                                                placeholder="<?php echo e(isset($certificate)? ($certificate->file != ""? getFilePath3($certificate->file):trans('common.image') .' *'): trans('common.image') .' (1100 X 850)px *'); ?>" readonly>
                                                <button class="" type="button">
                                                    <label class="primary-btn small fix-gr-bg" for="browseFile"><?php echo e(__('common.browse')); ?></label>
                                                    <input type="file" class="d-none" name="file" id="browseFile">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
	                           <?php 
                                  $tooltip = "";
                                  if(userPermission("student-certificate-store")){
                                        $tooltip = "";
                                    }else{
                                        $tooltip = "You have no permission to add";
                                    }
                                ?>
                                
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg submit" data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($certificate)): ?>
                                                <?php echo app('translator')->get('admin.update_certificate'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('admin.save_certificate'); ?>
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

            <div class="col-lg-8">
                <div class="white-box">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-15">  <?php echo app('translator')->get('admin.certificate_list'); ?></h3>
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
                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                <thead>
                                    
                                    <tr>
                                        <th><?php echo app('translator')->get('common.name'); ?></th>
                                        <th><?php echo app('translator')->get('admin.background_image'); ?></th>
                                        <th><?php echo e(_trans('common.Default For')); ?></th>
                                        <th><?php echo app('translator')->get('common.actions'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a class="text-color" data-toggle="modal" data-target="#showCertificateModal<?php echo e(@$certificate->id); ?>"  href="#"><?php echo e(@$certificate->name); ?></a></td>
                                        <td>
                                            <?php if(@$certificate->file): ?>
                                                <img src="<?php echo e(url(@$certificate->file)); ?>" width="100">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="primary-btn small fix-gr-bg text-nowrap">
                                                <?php echo e(@$certificate->default_for); ?>

                                            </button>  
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
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#showCertificateModal<?php echo e(@$certificate->id); ?>"  href="#"><?php echo app('translator')->get('common.view'); ?></a>
                                                    <?php if(userPermission("student-certificate-edit")): ?>
                                                    <a class="dropdown-item" href="<?php echo e(route('student-certificate-edit',@$certificate->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                    <?php endif; ?>
                                                    <?php if(userPermission("student-certificate-edit") && moduleStatusCheck('Lms')): ?>
                                                        <?php if(@$certificate->default_for == null): ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('student-certificate-set-default',[@$certificate->id,'course'])); ?>">
                                                                <?php echo e(_trans('lms.Make Default(Course)')); ?>

                                                            </a>
                                                            <a class="dropdown-item" href="<?php echo e(route('student-certificate-set-default',[@$certificate->id,'quiz'])); ?>">
                                                                <?php echo e(_trans('lms.Make Default(Quiz)')); ?>

                                                            </a>
                                                        <?php else: ?>
                                                            <a class="dropdown-item" href="<?php echo e(route('student-certificate-reset-default',@$certificate->id)); ?>">
                                                                <?php echo e(_trans('lms.Reset Default')); ?>

                                                            </a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if(userPermission("student-certificate-delete")): ?>
                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteSectionModal<?php echo e(@$certificate->id); ?>"  href="#"><?php echo app('translator')->get('common.delete'); ?></a>
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
                                    <div class="modal fade admin-query" id="deleteSectionModal<?php echo e(@$certificate->id); ?>">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('admin.delete_certificate'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                                                    </div>

                                                    <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                                                        <?php echo e(Form::open(['route' => array('student-certificate-delete',@$certificate->id), 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.delete'); ?></button>
                                                        <?php echo e(Form::close()); ?>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade admin-query" id="showCertificateModal<?php echo e(@$certificate->id); ?>">
                                        <div class="modal-dialog modal-dialog-centered large-modal">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><?php echo app('translator')->get('admin.view_certificate'); ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="mx-3 my-2 student-certificate">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-12 text-center">
                                                                <div class="mb-5">
                                                                    <img class="img-fluid" src="<?php echo e(asset($certificate->file)); ?>">
                                                                </div>
                                                            </div>

                                                            <div class="text-center certificate-position">
                                                                <div>
                                                                    <div class="row justify-content-lg-between mb-5">
                                                                        <div class="col-md-5">
                                                                            <p class="m-0"><?php echo e(@$certificate->header_left_text); ?></p>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <p class="m-0"><?php echo app('translator')->get('admin.date'); ?>: <?php echo e(@$certificate->date); ?></p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="certificate-middle">
                                                                        <p>
                                                                            <?php echo e(@$certificate->body); ?>

                                                                        </p>
                                                                    </div>

                                                                    <?php if( @$certificate->body_two ): ?>
                                                                    <div class="certificate-middle">
                                                                        <p>
                                                                            <?php echo e(@$certificate->body_two); ?>

                                                                        </p>
                                                                    </div>
                                                                    <?php endif; ?>

                                                                    <div class="mt-80 mb-4">
                                                                        <div class="row">
                                                                            <div class="col-md-4 text-center">
                                                                                <div class="signature bb-15"><?php echo e(@$certificate->footer_left_text); ?></div>
                                                                            </div>
                                                                            <div class="col-md-4 text-center">
                                                                                <div class="signature bb-15"><?php echo e(@$certificate->footer_center_text); ?></div>
                                                                            </div>
                                                                            <div class="col-md-4 text-center">
                                                                                <div class="signature bb-15"><?php echo e(@$certificate->footer_right_text); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
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
<?php $__env->startSection('script'); ?>
    <script>
          $('.select_layout').on('change', function() {
            let layout = $(this).val();
            let height = $('.certificate_height');
            let width = $('.certificate_width');

            if (layout == 1) {
                // Portrait
                height.val('297');
                width.val('210');
                height.attr('readonly', true);
                width.attr('readonly', true);
            } else if (layout == 2) {
                // Landscape
                height.val('210');
                width.val('297');
                height.attr('readonly', true);
                width.attr('readonly', true);
            } else {
                height.val('');
                width.val('');
                height.attr('readonly', false);
                width.attr('readonly', false);
            }
        })
        $('#body_two_part').hide();
        $("#certificate_type").on("change", function () {
            var certificate_type = $("#certificate_type").val();
            if(certificate_type == "arabic"){
                $("#body_two_part").css("display", "block");
            }
            else{
                $("#body_two_part").css("display", "none");
            }
            
        });

        <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/admin/student_certificate.blade.php ENDPATH**/ ?>