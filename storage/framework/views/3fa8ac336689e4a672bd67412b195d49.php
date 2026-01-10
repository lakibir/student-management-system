<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('exam.question_bank'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .common-checkbox~label::before,
        .common-checkbox~label::after {
            top: 20px !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('exam.question_bank'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.online_exam'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.question_bank'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid p-0">
            <?php if(isset($bank)): ?>
                <?php if(userPermission('question-bank-store')): ?>
                    <div class="row">
                        <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                            <a href="<?php echo e(route('question-bank')); ?>" class="primary-btn small fix-gr-bg">
                                <span class="ti-plus pr-2"></span>
                                <?php echo app('translator')->get('common.add'); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <div class="row">

                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">

                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="white-box">
                                <div class="main-title">
                                    <h3 class="mb-15">
                                        <?php if(isset($bank)): ?>
                                            <?php echo app('translator')->get('exam.edit_question_bank'); ?>
                                        <?php else: ?>
                                            <?php echo app('translator')->get('exam.add_question_bank'); ?>
                                        <?php endif; ?>
    
                                    </h3>
                                </div>

                                <?php if(isset($bank)): ?>
                                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => ['question-bank-update', $bank->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'id' => 'question_bank'])); ?>

                                <?php else: ?>
                                    <?php if(userPermission('question-bank-store')): ?>
                                        <?php echo e(Form::open([
                                            'class' => 'form-horizontal',
                                            'files' => true,
                                            'route' => 'question-bank-store',
                                            'method' => 'POST',
                                            'enctype' => 'multipart/form-data',
                                            'id' => 'question_bank',
                                        ])); ?>

                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="add-visitor">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for="">
                                                <?php echo e(__('exam.group')); ?>

                                                <span class="text-danger"> *</span>
                                            </label>
                                            <select
                                                class="primary_select  form-control<?php echo e($errors->has('group') ? ' is-invalid' : ''); ?>"
                                                name="group">
                                                <option data-display="<?php echo app('translator')->get('exam.select_group'); ?> *" value=""><?php echo app('translator')->get('exam.select_group'); ?>
                                                    *</option>
                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($bank)): ?>
                                                        <option value="<?php echo e($group->id); ?>"
                                                            <?php echo e($group->id == $bank->q_group_id ? 'selected' : ''); ?>>
                                                            <?php echo e($group->title); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($group->id); ?>"
                                                            <?php echo e(old('group') != '' ? (old('group') == $group->id ? 'selected' : '') : ''); ?>>
                                                            <?php echo e($group->title); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('group')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('group')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if(moduleStatusCheck('University')): ?>
                                            <?php if(isset($editData)): ?>
                                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                                [
                                                    'required' => ['USN', 'UD', 'UA', 'US', 'USL','USEC'],
                                                    'hide'=>['USUB'],
                                                    'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>false, 
                                                ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                                [
                                                    'required' => ['USN', 'UD', 'UA', 'US', 'USL','USEC'],
                                                    'hide'=>['USUB'],
                                                    'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>false, 
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                                <?php if ($__env->exists('university::common.session_faculty_depart_academic_semester_level',
                                                [
                                                    'required' => ['USN', 'UD', 'UA', 'US', 'USL','USEC'],
                                                    'hide'=>['USUB'],
                                                    'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>false, 
                                                    'multipleSelect' => 1,
                                                ])) echo $__env->make('university::common.session_faculty_depart_academic_semester_level',
                                                [
                                                    'required' => ['USN', 'UD', 'UA', 'US', 'USL','USEC'],
                                                    'hide'=>['USUB'],
                                                    'div'=>'col-lg-12','row'=>1,'mt'=>'mt-0' ,'subject'=>false, 
                                                    'multipleSelect' => 1,
                                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php endif; ?>
                                        
                                    <?php else: ?> 
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for="">
                                                <?php echo e(__('common.class')); ?>

                                                <span class="text-danger"> *</span>
                                            </label>
                                            <select
                                                class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                                id="class_id_email_sms" name="class">
                                                <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                                    <?php echo app('translator')->get('common.select_class'); ?> *</option>
                                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset($bank)): ?>
                                                        <option value="<?php echo e($class->id); ?>"
                                                            <?php echo e($bank->class_id == $class->id ? 'selected' : ''); ?>>
                                                            <?php echo e($class->class_name); ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo e($class->id); ?>"
                                                            <?php echo e(old('class') != '' ? (old('class') == $class->id ? 'selected' : '') : ''); ?>>
                                                            <?php echo e($class->class_name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('class')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('class')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="row mt-15">
                                        <?php if(!isset($bank)): ?>
                                            <div class="col-lg-12" id="selectSectionsDiv">
                                                <div class="primary_input">
                                                    <label class="primary_input_label"
                                                        for=""><?php echo e(__('common.section')); ?> <span
                                                            class="text-danger"> *</span></label>
                                                    <select name="section[]" id="selectMultiSections" multiple="multiple"
                                                        class="multypol_check_select active position-relative">

                                                    </select>
                                                </div>
                                                <?php if($errors->has('section')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('section')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="col-lg-12" id="select_section_div">
                                                <label class="primary_input_label"
                                                    for=""><?php echo e(__('common.section')); ?> <span class="text-danger">
                                                        *</span></label>
                                                <select
                                                    class="primary_select form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?> select_section"
                                                    id="select_section" name="section">
                                                    <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value="">
                                                        <?php echo app('translator')->get('common.select_section'); ?> *</option>
                                                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(isset($bank)): ?>
                                                            <option value="<?php echo e($section->id); ?>"
                                                                <?php echo e($bank->section_id == $section->id ? 'selected' : ''); ?>>
                                                                <?php echo e($section->section_name); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <div class="pull-right loader loader_style" id="select_section_loader">
                                                    <img class="loader_img_style"
                                                        src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>"
                                                        alt="loader">
                                                </div>
                                                <?php if($errors->has('section')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('section')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="row mt-15">
                                        

                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for="">
                                                <?php echo e(__('exam.question_type')); ?>

                                                <span class="text-danger"> *</span>
                                            </label>
                                            <select class="primary_select form-control<?php echo e($errors->has('question_type') ? ' is-invalid' : ''); ?>" name="question_type" id="question-type">
                                                <option data-display="<?php echo app('translator')->get('exam.question_type'); ?> *" value="">
                                                    <?php echo app('translator')->get('exam.question_type'); ?> *</option>
                                        
                                                <?php if(moduleStatusCheck('MultipleImageQuestion') == true): ?>
                                                    <option value="MI" <?php echo e(isset($bank) ? ($bank->type == 'MI' ? 'selected' : 'disabled') : ''); ?>>
                                                        <?php echo app('translator')->get('exam.multiple_image'); ?></option>
                                                <?php endif; ?>
                                        
                                                <option value="M" <?php echo e(isset($bank) ? ($bank->type == 'M' ? 'selected' : 'disabled') : ''); ?>>
                                                    <?php echo app('translator')->get('exam.multiple_choice'); ?></option>
                                                <option value="T" <?php echo e(isset($bank) ? ($bank->type == 'T' ? 'selected' : 'disabled') : ''); ?>>
                                                    <?php echo app('translator')->get('exam.true_false'); ?></option>
                                                <option value="F" <?php echo e(isset($bank) ? ($bank->type == 'F' ? 'selected' : 'disabled') : ''); ?>>
                                                    <?php echo app('translator')->get('exam.fill_in_the_blanks'); ?></option>
                                            </select>
                                            <?php if($errors->has('group')): ?>
                                                <span class="text-danger invalid-select" role="alert">
                                                    <?php echo e($errors->first('group')); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.question'); ?> <span
                                                        class="text-danger"> *</span></label>
                                                <textarea class="primary_input_field form-control<?php echo e($errors->has('question') ? ' is-invalid' : ''); ?>" cols="0"
                                                    rows="4" name="question"><?php echo e(isset($bank) ? $bank->question : (old('question') != '' ? old('question') : '')); ?></textarea>


                                                <?php if($errors->has('question')): ?>
                                                    <span
                                                        class="error text-danger"><?php echo e($errors->first('question')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-15">
                                        <div class="col-lg-12">
                                            <div class="primary_input">
                                                <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.marks'); ?> <span
                                                        class="text-danger"> *</span></label>
                                                <input oninput="numberCheck(this)"
                                                    class="primary_input_field form-control<?php echo e($errors->has('marks') ? ' is-invalid' : ''); ?>"
                                                    type="number" name="marks"
                                                    value="<?php echo e(isset($bank) ? $bank->marks : (old('marks') != '' ? old('marks') : '')); ?>">


                                                <?php if($errors->has('marks')): ?>
                                                    <span class="text-danger">
                                                        <?php echo e($errors->first('marks')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if (!isset($bank)) {
                                            if (old('question_type') == 'M') {
                                                $multiple_choice = '';
                                            }
                                        } else {
                                            if ($bank->type == 'M' || old('question_type') == 'M') {
                                                $multiple_choice = '';
                                            }
                                        }
                                    ?>
                                    <div class="multiple-choice"
                                        id="<?php echo e(isset($multiple_choice) ? $multiple_choice : 'multiple-choice'); ?>">
                                        <div class="row  mt-15">
                                            <div class="col-lg-7">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.number_of_options'); ?>
                                                        <span class="text-danger"> *</span></label>
                                                    <input
                                                        class="primary_input_field form-control<?php echo e($errors->has('number_of_option') ? ' is-invalid' : ''); ?>"
                                                        type="number" min="2" name="number_of_option"
                                                        autocomplete="off" id="number_of_option"
                                                        value="<?php echo e(isset($bank) ? $bank->number_of_option : ''); ?>">


                                                    <?php if($errors->has('number_of_option')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('number_of_option')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 mt-35">
                                                <button type="button" class="primary-btn small fix-gr-bg"
                                                    id="create-option"><?php echo app('translator')->get('common.create'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if (!isset($bank)) {
                                            if (old('question_type') == 'M') {
                                                $multiple_options = '';
                                            }
                                        } else {
                                            if ($bank->type == 'M' || old('question_type') == 'M') {
                                                $multiple_options = '';
                                            }
                                        }
                                    ?>
                                    <div class="multiple-options"
                                        id="<?php echo e(isset($multiple_options) ? '' : 'multiple-options'); ?>">
                                        <?php
                                            $i = 0;
                                            $multiple_options = [];

                                            if (isset($bank)) {
                                                if ($bank->type == 'M') {
                                                    $multiple_options = $bank->questionMu;
                                                }
                                            }
                                        ?>

                                        <?php $__currentLoopData = $multiple_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multiple_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $i++; ?>
                                            <div class='row align-items-center mt-15'>
                                                <div class='col-8 col-sm-10 col-xl-10'>
                                                    <div class='primary_input'>
                                                        <label class="primary_input_label"
                                                            for=""><?php echo app('translator')->get('exam.option'); ?> <?php echo e($i); ?></label>
                                                        <input class='primary_input_field form-control' type='text'
                                                            name='option[]' autocomplete='off' required
                                                            value="<?php echo e($multiple_option->title); ?>">


                                                    </div>
                                                </div>
                                                <div class='col-4 col-sm-2 col-xl-2 p-0'>
                                                    <input type="checkbox" id="option_check_<?php echo e($i); ?>"
                                                        class="common-checkbox" name="option_check_<?php echo e($i); ?>"
                                                        value="1" <?php if($multiple_option->status == 1): ?> checked <?php endif; ?>>
                                                    <label for="option_check_<?php echo e($i); ?>"></label>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php
                                        if (!isset($bank)) {
                                            if (old('question_type') == 'T') {
                                                $true_false = '';
                                            }
                                        } else {
                                            if ($bank->type == 'T' || old('question_type') == 'T') {
                                                $true_false = '';
                                            }
                                        }
                                    ?>
                                    <div class="true-false" id="<?php echo e(isset($true_false) ? $true_false : 'true-false'); ?>">
                                        <div class="row  mt-15">
                                            <div class="col-lg-12 d-flex">
                                                <p class="text-uppercase fw-500 mb-10"></p>
                                                <div class="d-flex radio-btn-flex">
                                                    <div class="mr-30">
                                                        <input type="radio" name="trueOrFalse" id="relationFather"
                                                            value="T" class="common-radio relationButton"
                                                            <?php echo e(isset($bank) ? ($bank->trueFalse == 'T' ? 'checked' : '') : 'checked'); ?>>
                                                        <label for="relationFather"><?php echo app('translator')->get('exam.true'); ?></label>
                                                    </div>
                                                    <div class="mr-30">
                                                        <input type="radio" name="trueOrFalse" id="relationMother"
                                                            value="F" class="common-radio relationButton"
                                                            <?php echo e(isset($bank) ? ($bank->trueFalse == 'F' ? 'checked' : '') : ''); ?>>
                                                        <label for="relationMother"><?php echo app('translator')->get('exam.false'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if (!isset($bank)) {
                                            if (old('question_type') == 'F') {
                                                $fill_in = '';
                                            }
                                        } else {
                                            if ($bank->type == 'F' || old('question_type') == 'F') {
                                                $fill_in = '';
                                            }
                                        }
                                    ?>
                                    <div class="fill-in-the-blanks"
                                        id="<?php echo e(isset($fill_in) ? $fill_in : 'fill-in-the-blanks'); ?>">
                                        <div class="row  mt-15">
                                            <div class="col-lg-12">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.suitable_words'); ?>
                                                        <span class="text-danger"> *</span></label>
                                                    <textarea class="primary_input_field form-control<?php echo e($errors->has('suitable_words') ? ' is-invalid' : ''); ?>"
                                                        cols="0" rows="5" name="suitable_words"><?php echo e(isset($bank) ? $bank->suitable_words : ''); ?></textarea>


                                                    <?php if($errors->has('suitable_words')): ?>
                                                        <span class="text-danger invalid-select" role="alert">
                                                            <?php echo e($errors->first('suitable_words')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <?php
                                        if (!isset($bank)) {
                                            if (old('question_type') == 'MI') {
                                                $multiple_image = '';
                                            }
                                        } else {
                                            if ($bank->type == 'MI' || old('question_type') == 'MI') {
                                                $multiple_image = '';
                                            }
                                        }
                                    ?>
                                    <div class="multiple-image-section mt-20"
                                        id="<?php echo e(isset($multiple_image) ? $multiple_image : 'multiple-image-section'); ?>">

                                        <div class="row mt-15 mb-20">
                                            <div class="col-lg-12">
                                                <label class="primary_input_label" for="">
                                                    <?php echo e(__('exam.answer_type')); ?>

                                                    <span class="text-danger"> *</span>
                                                </label>
                                                <select
                                                    class="primary_select  form-control<?php echo e($errors->has('answer_type') ? ' is-invalid' : ''); ?>"
                                                    id="answer_type" name="answer_type">
                                                    <option data-display="<?php echo app('translator')->get('exam.answer_type'); ?> *" value="">
                                                        <?php echo app('translator')->get('exam.answer_type'); ?> *</option>
                                                    <option value="radio"
                                                        <?php echo e(isset($bank) ? ($bank->answer_type == 'radio' ? 'selected' : '') : ''); ?>>
                                                        <?php echo app('translator')->get('exam.single_select'); ?></option>
                                                    <option value="checkbox"
                                                        <?php echo e(isset($bank) ? ($bank->answer_type == 'checkbox' ? 'selected' : '') : ''); ?>>
                                                        <?php echo app('translator')->get('exam.multiple_select'); ?></option>
                                                </select>
                                                <?php if($errors->has('answer_type')): ?>
                                                    <span class="text-danger invalid-select" role="alert">
                                                        <?php echo e($errors->first('answer_type')); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="row no-gutters input-right-icon mb-20">
                                            <div class="col">
                                                <div class="primary_input">
                                                    <input
                                                        class="primary_input_field form-control <?php echo e($errors->has('question_image') ? ' is-invalid' : ''); ?>"
                                                        readonly="true" type="text"
                                                        placeholder="<?php echo e(isset($bank->question_image) && @$bank->question_image != '' ? getFilePath3(@$bank->question_image) : trans('exam.question_image') . ' *'); ?>  [650x450]"
                                                        id="placeholderUploadContent">

                                                    <?php if($errors->has('question_image')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('question_image')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <button class="primary-btn-small-input" type="button">
                                                    <label class="primary-btn small fix-gr-bg"
                                                        for="upload_content_file"><?php echo app('translator')->get('common.browse'); ?></label>

                                                    <input type="file" onclick="uploadQuestionImage()"
                                                        class="d-none form-control" name="question_image"
                                                        id="upload_content_file">
                                                </button>
                                            </div>
                                            
                                        </div>
                                        <style>
                                            .multiple-images ::-webkit-file-upload-button {
                                                background: #8432FA;
                                                color: white;
                                                border: #8432FA;
                                            }
                                        </style>

                                        <div class="row  mt-15">
                                            <div class="col-lg-8">
                                                <div class="primary_input">
                                                    <label class="primary_input_label" for=""><?php echo app('translator')->get('exam.number_of_options'); ?>
                                                        <span class="text-danger"> *</span></label>
                                                    <input
                                                        class="primary_input_field form-control<?php echo e($errors->has('number_of_option') ? ' is-invalid' : ''); ?>"
                                                        type="number" min="2" name="number_of_optionImg"
                                                        autocomplete="off" id="number_of_image_option"
                                                        value="<?php echo e(isset($bank) ? $bank->number_of_option : ''); ?>">


                                                    <?php if($errors->has('number_of_option')): ?>
                                                        <span class="text-danger">
                                                            <?php echo e($errors->first('number_of_option')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="button" class="primary-btn small fix-gr-bg"
                                                    id="create-image-option"><?php echo app('translator')->get('common.create'); ?></button>
                                            </div>
                                        </div>

                                        <div class="multiple-images" id="multiple-images">
                                            <?php
                                                $i = 0;
                                                $multiple_options = [];

                                                if (isset($bank)) {
                                                    if ($bank->type == 'MI') {
                                                        $multiple_options = $bank->questionMu;
                                                    }
                                                }
                                            ?>

                                            <?php $__currentLoopData = $multiple_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $multiple_option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php $i++; ?>
                                                <div class='row  mt-15'>
                                                    <div class='col-lg-10'>
                                                        <div class='primary_input'>
                                                            <label class="primary-btn fix-gr-bg multiple_images">
                                                                <i class="fa fa-image"></i> <span
                                                                    class="show_file_name"><?php echo e(\Illuminate\Support\Str::limit(showFileName($multiple_option->title), 10, '...')); ?></span>
                                                                <input type="file"
                                                                    name='images[<?php echo e($multiple_option->id); ?>]'
                                                                    style="display: none;" name="image">
                                                            </label>
                                                            <input type="hidden"
                                                                name="images_old[<?php echo e($multiple_option->id); ?>]"
                                                                value="<?php echo e(@$multiple_option->title); ?>">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-2 mt-10'>
                                                        <input type="checkbox" id="option_check_<?php echo e($i); ?>"
                                                            class="common-checkbox"
                                                            <?php echo e($multiple_option->status == 1 ? 'checked' : ''); ?>

                                                            name="option_check_<?php echo e($i); ?>" value="1">
                                                        <label
                                                            for="option_check_<?php echo e($i); ?>"><?php echo app('translator')->get('exam.yes'); ?></label>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                    
                                    <?php echo e(Form::close()); ?>


                                    <?php
                                        $tooltip = '';
                                        if (userPermission('question-bank-store') || userPermission('question-bank-edit')) {
                                            $tooltip = '';
                                        } else {
                                            $tooltip = 'You have no permission to add';
                                        }
                                    ?>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg" id="question_bank_submit"
                                            data-toggle="tooltip" title="<?php echo e($tooltip); ?>">
                                            <span class="ti-check"></span>
                                            <?php if(isset($bank)): ?>
                                                <?php echo app('translator')->get('exam.update_question'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->get('exam.save_question'); ?>
                                            <?php endif; ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('exam.question_bank_list'); ?></h3>
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
                                                <th><?php echo app('translator')->get('exam.group'); ?></th>
                                                <?php if(moduleStatusCheck('University')): ?>
                                                    <th> <?php echo app('translator')->get('university::un.semester_label'); ?> (<?php echo app('translator')->get('common.section'); ?>)</th>
                                                <?php else: ?>
                                                    <th><?php echo app('translator')->get('common.class_Sec'); ?></th>
                                                <?php endif; ?>
                                                <th><?php echo app('translator')->get('exam.question'); ?></th>
                                                <th><?php echo app('translator')->get('common.type'); ?></th>
                                                <th><?php echo app('translator')->get('common.action'); ?></th>
                                            </tr>
                                        </thead>
    
                                        <tbody>
                                            <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($bank->questionGroup != '' ? $bank->questionGroup->title : ''); ?></td>
                                                    <?php if(moduleStatusCheck('University')): ?>
                                                        <td><?php echo e($bank->unSemesterLabel != '' ? $bank->unSemesterLabel->name : ''); ?> (<?php echo e($bank->section != '' ? $bank->section->section_name : ''); ?>)</td>
                                                    <?php else: ?>
                                                        <td><?php echo e($bank->class != '' ? $bank->class->class_name : ''); ?> (<?php echo e($bank->section != '' ? $bank->section->section_name : ''); ?>)</td>
                                                    <?php endif; ?>
                                                    <td><?php echo e($bank->question); ?></td>
                                                    <td>
                                                        <?php if($bank->type == 'M'): ?>
                                                            <?php echo e('Multiple Choice'); ?>

                                                        <?php elseif($bank->type == 'T'): ?>
                                                            <?php echo e('True False'); ?>

                                                        <?php elseif($bank->type == 'MI'): ?>
                                                            <?php echo e('Multiple Image Choice'); ?>

                                                        <?php else: ?>
                                                            <?php echo e('Fill in the blank'); ?>

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
                                                            <?php if(userPermission('question-bank-edit')): ?>
                                                                <a class="dropdown-item"
                                                                    href="<?php echo e(route('question-bank-edit', [$bank->id])); ?>"><?php echo app('translator')->get('common.edit'); ?></a>
                                                            <?php endif; ?>
                                                            <?php if(userPermission('question-bank-delete')): ?>
                                                                <a class="dropdown-item" data-toggle="modal"
                                                                    data-target="#deleteQuestionBankModal<?php echo e($bank->id); ?>"
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
                                                <div class="modal fade admin-query"
                                                    id="deleteQuestionBankModal<?php echo e($bank->id); ?>">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"><?php echo app('translator')->get('exam.delete_question_bank'); ?></h4>
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
                                                                    <?php echo e(Form::open(['route' => ['question-bank-delete', $bank->id], 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

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
<?php echo $__env->make('backEnd.partials.multi_select_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.multiple_images input[type="file"]').change(function() {
                console.log($(this).closest('.multiple_images').find('.show_file_name'));
                $(this).closest('.multiple_images').find('.show_file_name').html('File Selected');

            });
        });
    </script>
    <script>
        function uploadImage(id) {
            $('.show_file_name' + id).html('File Selected');
            var select_image = $('#question_image' + id);

            console.log('initial image value ' + select_image.val());
            var file = document.getElementById("question_image" + id).files[0];
            if (file) {
                if (file.type == "image/jpeg" || file.type == "image/png" || file.type == "image/jpg") {
                    var img = new Image();

                    img.src = window.URL.createObjectURL(file);

                    img.onload = function() {
                        var width = img.naturalWidth,
                            height = img.naturalHeight;
                        window.URL.revokeObjectURL(img.src);
                        if (width <= 650 && height <= 450) {
                            $('.show_file_name' + id).html(file.name.substr(0, 10));
                        } else {
                            $('.show_file_name' + id).html("Invalid image dimension");
                            $('#question_image' + id).val(null);
                        }
                    };
                } else {
                    $('.show_file_name' + id).html("Invalid file type");
                    $('#question_image' + id).val(null);
                }
            }
        }
    </script>

    <script>
        $('#question_bank_submit').click(function(e) {
            e.preventDefault();
            var ck_box = $('.multiple-images input[type="checkbox"]:checked').length;
            var answer_type = $("#answer_type").val();
            var question_type = $("#question-type").val();

            if (ck_box > 0) {
                if ($("input[name='images[]']").val() == "") { // alert for "address_" input
                    toastr.warning('Please Select Valid Option Images', 'Warning', {
                        timeOut: 5000
                    })
                } else {
                    if (answer_type == 'radio' && ck_box > 1) {
                        toastr.warning('Please Select One Correct Answer', 'Warning', {
                            timeOut: 5000
                        })
                    } else {
                        $('#question_bank').submit();
                    }
                }
            } else {

                if (question_type != 'MI') {
                    $('#question_bank').submit();
                } else {

                    toastr.warning('Please Select Correct  Answer', 'Warning', {
                        timeOut: 5000
                    })
                }
            }
        });

        $(document).on('click', '.common-checkbox', function() {
            var answer_type = $("#answer_type").val();
            if (answer_type == 'radio') {
                $('.common-checkbox').prop('checked', false);
                $(this).prop('checked', true)
            }
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/examination/question_bank.blade.php ENDPATH**/ ?>