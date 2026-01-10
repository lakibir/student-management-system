<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('front_settings.add_news'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('Modules/AiContent/Resources/assets/css/ai_content.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/editor/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('front_settings.news_list'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"> <?php echo app('translator')->get('front_settings.frontend_cms'); ?></a>
                    <a href="#"><?php echo app('translator')->get('front_settings.news_list'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($add_news)): ?>
                <?php if(userPermission('store_news')): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('news_index')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if(isset($add_news)): ?>
                            <?php echo e(Form::open([
                                'class' => 'form-horizontal',
                                'files' => true,
                                'route' => 'update_news',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                                'id' => 'add-income-update',
                            ])); ?>

                        <?php else: ?>
                            <?php if(userPermission('store_news')): ?>
                                <?php echo e(Form::open([
                                    'class' => 'form-horizontal',
                                    'files' => true,
                                    'route' => 'store_news',
                                    'method' => 'POST',
                                    'enctype' => 'multipart/form-data',
                                    'id' => 'add-income',
                                ])); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="white-box">
                            <div class="main-title">
                                <h3 class="mb-15">
                                    <?php if(isset($add_news)): ?>
                                        <?php echo app('translator')->get('front_settings.update_news'); ?>
                                    <?php else: ?>
                                        <?php echo app('translator')->get('common.add_news'); ?>
                                    <?php endif; ?>
                                </h3>
                            </div>
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('front_settings.title'); ?>
                                                        <span class="text-danger"> *</span></label>
                                                    <input class="primary_input_field form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" type="text" name="title"
                                                        autocomplete="off"
                                                        value="<?php echo e(isset($add_news) ? $add_news->news_title : old('title')); ?>">
                                                    <input type="hidden" name="id"
                                                        value="<?php echo e(isset($add_news) ? $add_news->id : ''); ?>">


                                                    <?php if($errors->has('title')): ?>
                                                        <span class="text-danger" >
                                                            <?php echo e($errors->first('title')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mt-15">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="primary_input">
                                                            <label class="primary_field_label" for=""><?php echo app('translator')->get('common.image'); ?><span class="text-danger"> *</span></label>
                                                            <div class="primary_file_uploader">
                                                                <input
                                                                class="primary_input_field form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" name="image" type="text" id="placeholderFileOneName" placeholder="<?php echo e(isset($add_news) ? ($add_news->image != '' ? getFilePath3($add_news->image) : trans('front_settings.image') . ' *') : trans('front_settings.image') . ' *'); ?>" readonly>

                                                                <button class="" type="button">
                                                                    <label class="primary-btn small fix-gr-bg" for="addNewsImage"><?php echo e(__('common.browse')); ?></label>
                                                                    <input type="file" class="d-none" name="image" id="addNewsImage">
                                                                </button>
                                                                
                                                                <?php if($errors->has('image')): ?>
                                                                    <span class="text-danger" >
                                                                        <?php echo e($errors->first('image')); ?>

                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.category'); ?>
                                                    <span class="text-danger"> *</span></label>
                                                <select class="primary_select form-control<?php echo e($errors->has('category_id') ? ' is-invalid' : ''); ?>" name="category_id">
                                                    <option data-display="<?php echo app('translator')->get('common.select'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.select'); ?> *
                                                    </option>
                                                    <?php $__currentLoopData = $news_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option data-display="<?php echo e($value->category_name); ?>"
                                                            value="<?php echo e($value->id); ?>"
                                                            <?php if(isset($add_news)): ?> <?php if($add_news->category_id == $value->id): ?>
                                                                selected <?php endif; ?>
                                                            <?php endif; ?>>
                                                            <?php echo e($value->category_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('category_id')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('category_id')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="row  mt-15">
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for="date_of_birth"><?php echo e(__('common.publish_date')); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <div class="primary_datepicker_input">
                                                        <div class="no-gutters input-right-icon">
                                                            <div class="col">
                                                                <div class="">
                                                                    <input
                                                                        class="primary_input_field date form-control<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>"
                                                                        id="startDate" type="text"
                                                                        placeholder="<?php echo app('translator')->get('common.date'); ?> *" name="date"
                                                                        value="<?php echo e(isset($add_news) ? date('m/d/Y', strtotime($add_news->publish_date)) : date('m/d/Y')); ?>">
                                                                        <button class="btn-date" data-id="#startDate" type="button">
                                                                            <i class="ti-calendar" id="start-date-icon"></i>
                                                                        </button>
                                                                        <?php if($errors->has('date')): ?>
                                                                            <span class="text-danger invalid-select" role="alert">
                                                                                <?php echo e($errors->first('date')); ?>

                                                                            </span>
                                                                        <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-15">
                                        <img class="previewImageSize <?php echo e(@$add_news->image ? '' : 'd-none'); ?>" src="<?php echo e(@$add_news->image ? asset($add_news->image) : ''); ?>" alt="" id="newsImageShow" height="100%" width="100%">
                                    </div>
                                    <div class="col-md-12 mt-15">
                                        <div class="primary_input">
                                            <label class="primary_input_label d-flex" for=""><?php echo app('translator')->get('common.description'); ?>
                                                <span
                                                    class="text-danger">*</span>
                                                <?php if(moduleStatusCheck('AiContent')): ?>
                                                    <?php echo $__env->make('aicontent::inc.button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </label>
                                            <textarea class="generated-text primary_input_field form-control<?php echo e($errors->has('description') ? ' is-invalid' : ''); ?> newsSummerNote"
                                                name="description"><?php echo isset($add_news) ? $add_news->news_body : old('description'); ?></textarea>
                                            <?php if($errors->has('description')): ?>
                                                <span class="text-danger" >
                                                    <?php echo e($errors->first('description')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-15">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('common.news_status'); ?></label>
                                        <div class="">
                                            <input type="checkbox" id="newsStatus" class="common-checkbox form-control" name="status" value=1 <?php echo e(isset($add_news) ? ($add_news->status == 1 ? 'checked' : '') : 'checked'); ?>>
                                            <label for="newsStatus"><?php echo e(__('common.show')); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-15">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.use_global_settings_for_can_comment_and_comment_auto_approval'); ?></label>
                                                <div class="">
                                                    <input type="checkbox" id="newsSettings" class="common-checkbox form-control" name="is_global" value="1" <?php echo e(isset($add_news) ? ($add_news->is_global == 1 ? 'checked' : '') : 'checked'); ?>>
                                                    <label for="newsSettings"><?php echo e(__('common.yes')); ?></label>
                                                </div>
                                            </div>

                                            <div class="col-md-3 newsSettingsDiv d-none">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.can_comment_only_for_this_news'); ?></label>
                                                <div class="">
                                                    <input type="checkbox" id="isComment" class="common-checkbox form-control" name="is_comment" value="1" <?php echo e(isset($add_news) ? ($add_news->is_comment == 1 ? 'checked' : '') : ''); ?>>
                                                    <label for="isComment"><?php echo e(__('common.yes')); ?></label>
                                                </div>
                                            </div>

                                            <div class="col-md-3 newsSettingsDiv d-none">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('common.auto_approval_comment_only_for_this_news'); ?></label>
                                                <div class="">
                                                    <input type="checkbox" id="autoApproval" class="common-checkbox form-control" name="auto_approve" value="1" <?php echo e(isset($add_news) ? ($add_news->auto_approve == 1 ? 'checked' : '') : ''); ?>>
                                                    <label for="autoApproval"><?php echo e(__('common.yes')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $tooltip = '';
                                    if (userPermission('store_news')) {
                                        $tooltip = '';
                                    }elseif(userPermission('edit-news') && isset($add_news)){
                                        $tooltip = '';
                                    } else {
                                        $tooltip = 'You have no permission to add';
                                    }
                                ?>
                                <div class="row mt-15">
                                    <div class="col-lg-12 text-center">
                                        <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip"
                                                title="Disabled For Demo "> <button
                                                    class="primary-btn fix-gr-bg  demo_view" style="pointer-events: none;"
                                                    type="button"><?php echo app('translator')->get('front_settings.update'); ?></button></span>
                                        <?php else: ?>
                                            <button class="primary-btn fix-gr-bg" data-toggle="tooltip"
                                                title="<?php echo e(@$tooltip); ?>">
                                                <span class="ti-check"></span>
                                                <?php if(isset($add_news)): ?>
                                                    <?php echo app('translator')->get('front_settings.update_news'); ?>
                                                <?php else: ?>
                                                    <?php echo app('translator')->get('common.add_news'); ?>
                                                <?php endif; ?>

                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-12 mt-40">
                <div class="white-box">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-15"><?php echo app('translator')->get('front_settings.news_list'); ?></h3>
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
                                            <th><?php echo app('translator')->get('front_settings.title'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.publication_date'); ?></th>
                                            <th><?php echo app('translator')->get('student.category'); ?></th>
                                            <th><?php echo app('translator')->get('front_settings.image'); ?></th>
                                            <th><?php echo app('translator')->get('common.action'); ?></th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($value->news_title); ?></td>
                                                <td data-sort="<?php echo e(strtotime($value->publish_date)); ?>">
                                                    <?php echo e($value->publish_date != '' ? dateConvert($value->publish_date) : ''); ?>

                                                </td>
                                                <td><?php echo e($value->category != '' ? $value->category->category_name : ''); ?></td>
                                                <td><img src="<?php echo e(asset($value->image)); ?>" width="60px" height="50px"></td>
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
                                                        <?php if(userPermission('newsDetails')): ?>
                                                            <a href="<?php echo e(route('newsDetails', $value->id)); ?>"
                                                                class="dropdown-item small fix-gr-bg modalLink"
                                                                title="<?php echo app('translator')->get('front_settings.news_details'); ?>" data-modal-size="modal-lg">
                                                                <?php echo app('translator')->get('common.view'); ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        <?php if(userPermission('edit-news')): ?>
                                                            <a class="dropdown-item"
                                                                href="<?php echo e(route('edit-news', $value->id)); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(userPermission('delete-news')): ?>
                                                            <?php if(Illuminate\Support\Facades\Config::get('app.app_sync')): ?>
                                                                <span tabindex="0" data-toggle="tooltip"
                                                                    title="Disabled For Demo">
                                                                    <a href="#"
                                                                        class="dropdown-item small fix-gr-bg  demo_view"
                                                                        style="pointer-events: none;"><?php echo app('translator')->get('common.delete'); ?></a></span>
                                                            <?php else: ?>
                                                                <a href="<?php echo e(route('for-delete-news', $value->id)); ?>"
                                                                    class="dropdown-item small fix-gr-bg modalLink"
                                                                    title="<?php echo app('translator')->get('front_settings.delete_news'); ?>" data-modal-size="modal-md">
                                                                    <?php echo app('translator')->get('common.delete'); ?>
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
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/editor/summernote-bs4.js"></script>
    <script>
        $(document).ready(function(){
            var checkData = $('#newsSettings').is(":checked");
            checkDataFun(checkData);

            $(document).on('click', '#newsSettings', function(){
                if($(this).is(":checked")) {
                    if(!$('.newsSettingsDiv').hasClass('d-none')){
                        $('.newsSettingsDiv').addClass('d-none');
                    }
                }else{
                    if($('.newsSettingsDiv').hasClass('d-none')){
                        $('.newsSettingsDiv').removeClass('d-none');
                    }
                }
            });

            function checkDataFun(checkData){
                if(checkData){
                    if(!$('.newsSettingsDiv').hasClass('d-none')){
                        $('.newsSettingsDiv').addClass('d-none');
                    }
                }else{
                    if($('.newsSettingsDiv').hasClass('d-none')){
                        $('.newsSettingsDiv').removeClass('d-none');
                    }
                }
            }
        });

        
    </script>
    <script>
        $('.newsSummerNote').summernote({
            placeholder: 'Write here',
            tabsize: 2,
            height: 300
        });
    </script>
    
    <script>
        $(document).on('change', '#addNewsImage', function(event) {
            $('#newsImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderFileOneName');
            imageChangeWithFile($(this)[0], '#newsImageShow');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/frontSettings/news/news_page.blade.php ENDPATH**/ ?>