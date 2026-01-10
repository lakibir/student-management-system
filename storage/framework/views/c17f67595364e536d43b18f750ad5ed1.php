<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo app('translator')->get('examplan::exp.seat_plan'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Signika", sans-serif;
            font-weight: 700;
            color: #45395E;
            margin: 0px;
        }

        *,
        ::before,
        ::after {
            margin: 0;
            box-sizing: border-box;
        }

        .text-center {
            text-align: center !important;
        }

        .seat {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            -moz-column-gap: 40px;
            column-gap: 40px;
            row-gap: 20px;
        }

        .seat-item:nth-child(8n+8) {
            page-break-after: always;
        }

        .seat-list {
            font-family: "Signika", sans-serif;
            justify-content: space-between;
            padding: 8px;
            border: 1px solid #156AAF;
            outline: 3px solid #156AAF;
            color: #45395E;
            margin-top: 20px;
            --left-size: 110px;
        }

        .seat-list h3 {
            font-size: 18px;
            line-height: 1.2142857143;
            margin-bottom: 5px;
            color: #6E6D6B;
        }

        .seat-list button {
            background-color: #9ED0F6;
            color: #000000;
            border-radius: 4px;
            padding: 4px 10px;
            border: none;
            transition: all 0.3s ease-in-out;
            font-size: 12px;
            line-height: 1.25;
            display: block;
            margin: auto;
        }

        .seat-user {
            margin-top: 10px;
            display: flex;
        }

        .seat-user h2 {
            font-size: 16px;
            margin-bottom: 10px;
            text-transform: uppercase;
            line-height: 1.2222222222;
            height: 37px;
            overflow: hidden;
        }

        .seat-user h4 {
            font-size: 14px;
            line-height: 1.2142857143;
        }

        .seat-user ul {
            padding: 0;
            margin: 0;
            list-style: none;
            border: 1px solid #33ACBF;
        }

        .seat-user ul li {
            text-align: center;
            padding: 5px;
            color: #000000;
            font-size: 14px;
        }

        .seat-user ul li:not(:last-child) {
            border-bottom: 1px solid #33ACBF;
        }

        .seat-img {
            width: var(--left-size);
            height: 116px;
            overflow: hidden;
            border: 2px solid #33ACBF;
            margin-top: auto;
        }

        .seat-img img {
            width: 100%;
            min-height: 100%;
            height: auto;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .seat-left {
            flex: 0 0 100%;
            max-width: calc(100% - var(--left-size));
            padding-right: 20px;
        }

        .seat-right {
            flex: 0 0 100%;
            max-width: var(--left-size);
            margin-top: auto;
        }

        @media print {
            button {
                -webkit-print-color-adjust: exact;
            }
        }

        .d-flex {
            display: flex !important;
            flex-wrap: wrap;
        }


    </style>
</head>


<body style="padding: 20px;padding-top: 0; width: 800px; margin: auto;">
<div class="seat">
    <?php $__currentLoopData = $seat_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat_plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="seat-item">
            <div class="seat-list">
                <div class="text-center">
                    <?php if($setting->school_name ): ?>
                        <h3 class="text-center"><?php echo e(generalSetting()->school_name); ?></h3>
                    <?php endif; ?>
                   
                        <button class="btn">
                            <?php if($setting->exam_name): ?>
                                <?php echo e($seat_plan->examType->title); ?>

                                <?php endif; ?> 
                                <?php if($setting->academic_year): ?>
                                <?php if($setting->exam_name): ?>  -  <?php endif; ?>  <?php echo e(@$seat_plan->academicYear->year); ?> 
                                <?php endif; ?>
                           
                        
                            <?php if(($seat_plan->studentRecord->studentDetail->student_category_id)): ?>
                                <b> (<?php echo e($seat_plan->studentRecord->studentDetail->category->category_name); ?>) </b>
                            <?php endif; ?>
                            <?php if(@$seat_plan->studentRecord->studentDetail->category->category_name): ?>
                                    <b> (<?php echo e(@$seat_plan->studentRecord->studentDetail->category->category_name); ?>) </b>
                                <?php endif; ?>

                        </button>
                   
                </div>
                <div class="seat-user">
                    <div class="seat-left" <?php if(!$setting->student_photo): ?> style="max-width: 100%; padding-right: 0px;" <?php endif; ?>>
                        <?php if($setting->student_name): ?>
                            <h2><?php echo e(@$seat_plan->studentRecord->studentDetail->full_name); ?></h2>
                        <?php endif; ?>
                        <ul>
                            <?php if($setting->class_section): ?>
                                <li><?php echo e(@$seat_plan->studentRecord->class->class_name); ?>

                                    (<?php echo e(@$seat_plan->studentRecord->section->section_name); ?>)
                                </li>
                            <?php endif; ?>
                            <?php if($setting->roll_no): ?>
                                <li><?php echo app('translator')->get('student.roll_number'); ?>
                                    : <?php echo e(@$seat_plan->studentRecord->studentDetail->roll_no); ?></li>
                            <?php endif; ?>
                            <?php if($setting->admission_no): ?>
                                <li><?php echo app('translator')->get('student.admission_no'); ?>
                                    : <?php echo e(@$seat_plan->studentRecord->studentDetail->admission_no); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php if($setting->student_photo): ?>
                        <div class="seat-right">
                            <div class="seat-img">
                                <?php if($seat_plan->studentRecord->studentDetail->student_photo): ?>
                                    <img src="<?php echo e(asset(@$seat_plan->studentRecord->studentDetail->student_photo)); ?>"
                                         alt="<?php echo e(@$seat_plan->studentRecord->studentDetail->full_name); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('Modules/ExamPlan/Public/images/profile.jpg')); ?>"
                                         alt="<?php echo e(@$seat_plan->studentRecord->studentDetail->full_name); ?>">

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--
        <div class="single_seat d-flex">
            <div class="single_seat_left flex-fill">
                <div class="seat_head">
                    <?php if($setting->school_name ): ?>
            <h3 class="text-center"><?php echo e(generalSetting()->school_name); ?></h3>

        <?php endif; ?>
        <div class="exam_name text-center text-capitalize">
<?php if($setting->exam_name): ?>
            <?php echo e($seat_plan->examType->title); ?>

        <?php endif; ?>
        <?php if($setting->academic_year): ?>
            <?php echo e(@$seat_plan->academicYear->year); ?>

        <?php endif; ?>

        </div>
<?php if($setting->student_name): ?>
            <h4 class="student_name text-uppercase"><?php echo e(@$seat_plan->studentRecord->studentDetail->full_name); ?></h4>

        <?php endif; ?>
        <?php if(isset($seat_plan->studentRecord->studentDetail->category)): ?>
            <h5 class="student_group"><?php echo e(@$seat_plan->studentRecord->studentDetail->category->category_name); ?></h5>

        <?php endif; ?>
        </div>
    </div>
    <div class="single_seat_right">
        <div class="student_img">
<?php if($setting->student_photo): ?>
            <?php if($seat_plan->studentRecord->studentDetail->student_photo): ?>
                <img src="<?php echo e(asset(@$seat_plan->studentRecord->studentDetail->student_photo)); ?>" alt="<?php echo e(@$seat_plan->studentRecord->studentDetail->full_name); ?>">

            <?php else: ?>
                <img src="<?php echo e(asset('Modules/ExamPlan/Public/images/profile.jpg')); ?>" alt="<?php echo e(@$seat_plan->studentRecord->studentDetail->full_name); ?>">
                        

            <?php endif; ?>
        <?php endif; ?>
        </div>
        <div class="student_info d-flex flex-column">
<?php if($setting->class_section): ?>
            <span><?php echo e(@$seat_plan->studentRecord->class->class_name); ?>(<?php echo e(@$seat_plan->studentRecord->section->section_name); ?>)</span>

        <?php endif; ?>
        <?php if($setting->roll_no): ?>
            <span><?php echo app('translator')->get('student.roll_number'); ?> : <?php echo e(@$seat_plan->studentRecord->studentDetail->roll_no); ?></span>

        <?php endif; ?>
        <?php if($setting->admission_no): ?>
            <span><?php echo app('translator')->get('student.admission_no'); ?> : <?php echo e(@$seat_plan->studentRecord->studentDetail->admission_no); ?></span>

        <?php endif; ?>
        </div>
    </div>
</div>-->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</body>

</html><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/ExamPlan\Resources/views/seatplanPrint.blade.php ENDPATH**/ ?>