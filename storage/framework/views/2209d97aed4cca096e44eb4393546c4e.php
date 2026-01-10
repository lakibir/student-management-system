<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('reports.result'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    @media screen and (max-width: 640px) {
        div.dt-buttons {
            display: none;
        }
    }

    .QA_section{
        margin-bottom: 50px
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('reports.result'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('exam.examinations'); ?></a>
                    <a href="<?php echo e(route('student_result')); ?>"><?php echo app('translator')->get('reports.result'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="student-details">
        <?php if(moduleStatusCheck('University')): ?>
            
            <?php if ($__env->exists('university::exam.student_exam_tab')) echo $__env->make('university::exam.student_exam_tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
        <div class="white-box">
            <ul class="nav nav-tabs tabs_scroll_nav ml-0" role="tablist">

                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($record->is_default == 1): ?> active <?php endif; ?> " href="#tab<?php echo e($key); ?>" role="tab"
                            data-toggle="tab"><?php echo e($record->class->class_name); ?> (<?php echo e($record->section->section_name); ?>) </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
            <div class="tab-content">
                <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div role="tabpanel" class="tab-pane mt-60 fade <?php if($record->is_default == 1): ?> active show <?php endif; ?>" id="tab<?php echo e($key); ?>">
                        <div class="container-fluid p-0 ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="no-search no-paginate no-table-info mb-2">
                                        <?php $__currentLoopData = $exam_terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $today = date('Y-m-d H:i:s');
                                                $get_results = App\SmStudent::getExamResult(@$exam->id, @$record);
                                            ?>
                                            <?php if($get_results): ?>
                                                <div class="main-title mt-5">
                                                    <h3 class="mb-0"><?php echo e(@$exam->title); ?></h3>
                                                </div>
                                                <?php
                                                    $grand_total = 0;
                                                    $grand_total_marks = 0;
                                                    $result = 0;
                                                    $temp_grade = [];
                                                    $total_gpa_point = 0;
                                                    $total_subject = count($get_results);
                                                    $optional_subject = 0;
                                                    $optional_gpa = 0;
                                                ?>
                                                <?php if(@$exam->examSettings && $exam->examSettings->publish_date): ?>
                                                    <?php if($exam->examSettings->publish_date <= $today): ?>
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
                                                        <table id="" class="table mb-5" cellspacing="0"
                                                            width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th><?php echo app('translator')->get('common.date'); ?></th>
                                                                    <th><?php echo app('translator')->get('exam.subject_full_marks'); ?></th>
                                                                    <th style="text-align: center"><?php echo app('translator')->get('exam.obtained_marks'); ?></th>
                                                                    <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                        <th style="text-align: center"><?php echo app('translator')->get('exam.pass_fail'); ?></th>
                                                                    <?php else: ?>
                                                                        <th style="text-align: center"><?php echo app('translator')->get('exam.grade'); ?></th>
                                                                        <th style="text-align: center"><?php echo app('translator')->get('exam.gpa'); ?></th>
                                                                    <?php endif; ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $__currentLoopData = $get_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        if (!is_null($optional_subject_setup) && !is_null($student_optional_subject)) {
                                                                            if ($mark->subject_id != @$student_optional_subject->subject_id) {
                                                                                $temp_grade[] = $mark->total_gpa_grade;
                                                                            }
                                                                        } else {
                                                                            $temp_grade[] = $mark->total_gpa_grade;
                                                                        }
                                                                        $total_gpa_point += $mark->total_gpa_point;
                                                                        if (!is_null(@$student_optional_subject)) {
                                                                            if (@$student_optional_subject->subject_id == $mark->subject->id && $mark->total_gpa_point < @$optional_subject_setup->gpa_above) {
                                                                                $total_gpa_point = $total_gpa_point - $mark->total_gpa_point;
                                                                            }
                                                                        }
                                                                        $temp_gpa[] = $mark->total_gpa_point;
                                                                        $get_subject_marks = subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id);
                                                                        
                                                                        $subject_marks = App\SmStudent::fullMarksBySubject($exam->id, $mark->subject_id);
                                                                        $schedule_by_subject = App\SmStudent::scheduleBySubject($exam->id, $mark->subject_id, @$record);
                                                                        $result_subject = 0;
                                                                        if(@generalSetting()->result_type == 'mark'){
                                                                            $grand_total_marks += subject100PercentMark();
                                                                        }else{
                                                                            $grand_total_marks += $get_subject_marks;
                                                                        }
                                                                        if (@$mark->is_absent == 0) {
                                                                            if(@generalSetting()->result_type == 'mark'){
                                                                                $grand_total += @subjectPercentageMark(@$mark->total_marks, @subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id));
                                                                            }else{
                                                                                $grand_total += @$mark->total_marks;
                                                                            }
                                                                            if ($mark->marks < $subject_marks->pass_mark) {
                                                                                $result_subject++;
                                                                                $result++;
                                                                            }
                                                                        } else {
                                                                            $result_subject++;
                                                                            $result++;
                                                                        }
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo e(!empty($schedule_by_subject->date) ? dateConvert($schedule_by_subject->date) : ''); ?>

                                                                        </td>
                                                                        <td>
                                                                            <?php echo e(@$mark->subject->subject_name); ?>

                                                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                                (<?php echo e(subject100PercentMark()); ?>)
                                                                            <?php else: ?>
                                                                                (<?php echo e(@subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id)); ?>)
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                                <?php echo e(@subjectPercentageMark(@$mark->total_marks, @subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id))); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(@$mark->total_marks); ?>

                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                            <td>
                                                                                <?php
                                                                                    $totalMark = subjectPercentageMark(@$mark->total_marks, @subjectFullMark($mark->exam_type_id, $mark->subject_id, $mark->studentRecord->class_id, $mark->studentRecord->section_id));
                                                                                    $passMark = $mark->subject->pass_mark;
                                                                                ?>
                                                                                <?php if($passMark <= $totalMark): ?>
                                                                                    <?php echo app('translator')->get('exam.pass'); ?>
                                                                                <?php else: ?>
                                                                                    <?php echo app('translator')->get('exam.fail'); ?>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                        <?php else: ?>
                                                                            <td>
                                                                                <?php echo e(@$mark->total_gpa_grade); ?>

                                                                            </td>
                                                                            <td>
                                                                                <?php echo e(number_format(@$mark->total_gpa_point, 2, '.', '')); ?>

                                                                            </td>
                                                                        <?php endif; ?>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th></th>
                                                                    <th><?php echo app('translator')->get('exam.position'); ?>: <?php echo e(getStudentMeritPosition($record->class_id, $record->section_id, $exam->id, $record->id)); ?></th>
                                                                    <th>
                                                                        <?php echo app('translator')->get('exam.grand_total'); ?>:
                                                                        <?php echo e($grand_total); ?>/<?php echo e($grand_total_marks); ?>

                                                                    </th>
                                                                    <?php if(@generalSetting()->result_type == 'mark'): ?>
                                                                        <th></th>
                                                                    <?php else: ?>
                                                                        <th>
                                                                            <?php echo app('translator')->get('exam.grade'); ?>:
                                                                            <?php
                                                                                if (in_array($failgpaname->grade_name, $temp_grade)) {
                                                                                    echo $failgpaname->grade_name;
                                                                                } else {
                                                                                    $final_gpa_point = ($total_gpa_point - $optional_gpa) / ($total_subject - $optional_subject);
                                                                                    $average_grade = 0;
                                                                                    $average_grade_max = 0;
                                                                                    if ($result == 0 && $grand_total_marks != 0) {
                                                                                        $gpa_point = number_format($final_gpa_point, 2, '.', '');
                                                                                        if ($gpa_point >= $maxgpa) {
                                                                                            $average_grade_max = App\SmMarksGrade::where('school_id', Auth::user()->school_id)
                                                                                                ->where('academic_id', getAcademicId())
                                                                                                ->where('from', '<=', $maxgpa)
                                                                                                ->where('up', '>=', $maxgpa)
                                                                                                ->first('grade_name');
                                                                                
                                                                                            echo @$average_grade_max->grade_name;
                                                                                        } else {
                                                                                            $average_grade = App\SmMarksGrade::where('school_id', Auth::user()->school_id)
                                                                                                ->where('academic_id', getAcademicId())
                                                                                                ->where('from', '<=', $final_gpa_point)
                                                                                                ->where('up', '>=', $final_gpa_point)
                                                                                                ->first('grade_name');
                                                                                            echo @$average_grade->grade_name;
                                                                                        }
                                                                                    } else {
                                                                                        echo $failgpaname->grade_name;
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </th>
                                                                        <th>
                                                                            <?php echo app('translator')->get('exam.gpa'); ?>
                                                                            <?php
                                                                                $final_gpa_point = 0;
                                                                                $final_gpa_point = ($total_gpa_point - $optional_gpa) / ($total_subject - $optional_subject);
                                                                                $float_final_gpa_point = number_format($final_gpa_point, 2);
                                                                                if ($float_final_gpa_point >= $maxgpa) {
                                                                                    echo $maxgpa;
                                                                                } else {
                                                                                    echo $float_final_gpa_point;
                                                                                }
                                                                            ?>
                                                                        </th>
                                                                    <?php endif; ?>
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
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>  
        </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/studentPanel/student_result.blade.php ENDPATH**/ ?>