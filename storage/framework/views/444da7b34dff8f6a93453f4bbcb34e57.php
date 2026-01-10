<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('lesson::lesson.my_lesson_plan'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
.school-table-style tr td{
    min-width: 200px;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
 <link rel="stylesheet" href="<?php echo e(url('Modules/Lesson/Resources/assets/css/lesson_plan.css')); ?>">
    <section class="sms-breadcrumb mb-10 white-box">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('lesson::lesson.my_lesson_plan'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.lesson'); ?></a>
                    <a href="#"><?php echo app('translator')->get('lesson::lesson.my_lesson_plan'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
              
                    <?php if(Auth::user()->role_id==1): ?>
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'lesson-planner', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">                          
                            <div class="col-lg-6 mt-30-md">
                                <select class="primary_select form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" id="select_class" name="teacher">
                                    <option data-display="<?php echo app('translator')->get('common.select_teacher'); ?> *" value=""><?php echo app('translator')->get('common.select_teacher'); ?> *</option>
                                   
                                        <option value="<?php echo e($teacher_id); ?>"  selected=""><?php echo e(@$teacher->full_name); ?></option>
                                   
                                </select>
                                <?php if($errors->has('teacher')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('teacher')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 mt-20 text-left">
                                <button type="submit" class="primary-btn small fix-gr-bg">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if(isset($class_times)): ?>
<section class="mt-20">
    <div class="container-fluid p-0">
<div class="row mt-20">
                    <div class="col-lg-12 col-md-12">
                        <div class="main-title">
                            <?php 
                            $dates[6];
                            if(isset($week_number)){
                                $week_number=$week_number;
                            } else{
                                $week_number=$this_week;
                            } 

                             ?>

                    <h3 class="text-center "><a href="<?php echo e(url('/lesson/teacher/dicrease-week/'.$dates[0])); ?>"><</a> week <?php echo e($week_number); ?> <a href="<?php echo e(url('/lesson/teacher/change-week/'.$dates[6])); ?>">></a></h3> 
                   
                        </div>
                    </div>
             </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table school-table-style" cellspacing="0" width="100%">
                        <thead>
                           
                            <tr>
                               
                                <?php
                                    $height= 0;
                                    $tr = [];
                                ?>
                                <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                    <?php if( $sm_weekend->teacherClassRoutine->count() >$height): ?>
                                        <?php
                                            $height =  $sm_weekend->teacherClassRoutine->count();
                                        ?>
                                    <?php endif; ?>
    
                                <th><?php echo e(@$sm_weekend->name); ?> <br> 
                                    <?php echo e(date('d-M-y', strtotime($dates[$key]))); ?>

                                </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
    
                        <tbody>
    
                            <?php
                            $used = [];
                            $tr=[];
                
                        ?>
                        <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        
                            $i = 0;
                        ?>
                            <?php $__currentLoopData = $sm_weekend->teacherClassRoutine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                if(!in_array($routine->id, $used)){
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject']= $routine->subject ? $routine->subject->subject_name :'';
                                    $tr[$i][$sm_weekend->name][$loop->index]['subject_code']= $routine->subject ? $routine->subject->subject_code :'';
                                    $tr[$i][$sm_weekend->name][$loop->index]['class_room']= $routine->classRoom ? $routine->classRoom->room_no : '';
                                    $tr[$i][$sm_weekend->name][$loop->index]['teacher']= $routine->teacherDetail ? $routine->teacherDetail->full_name :'';
                                    $tr[$i][$sm_weekend->name][$loop->index]['start_time']=  $routine->start_time;
                                    $tr[$i][$sm_weekend->name][$loop->index]['end_time']= $routine->end_time;
                                    $tr[$i][$sm_weekend->name][$loop->index]['class_name']= $routine->class ? $routine->class->class_name : '';
                                    $tr[$i][$sm_weekend->name][$loop->index]['section_name']= $routine->section ? $routine->section->section_name : '';
                                    $tr[$i][$sm_weekend->name][$loop->index]['is_break']= $routine->is_break;
                                    $used[] = $routine->id;
                                    $tr[$i][$sm_weekend->name][$loop->index]['routine_id']= $routine->id;
                                } 
                                     
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                            <?php
                                
                                $i++;
                            ?>
                
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                       <?php for($i = 0; $i < $height; $i++): ?>
                       <tr>
                        <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $days): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php $__currentLoopData = $sm_weekends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$sm_weekend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         
                            <td>
                                <?php
                                
                                     $lesson_date=$dates[$key];
                                     $classes=gv($days,$sm_weekend->name);
    
                                 ?>
                                 <?php if($classes && gv($classes,$i)): ?>              
                                   <?php if($classes[$i]['is_break']): ?>
                                  <strong > <?php echo app('translator')->get('lesson::lesson.break'); ?> </strong>
                                     
                                   <span class=""> (<?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>  - <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>)  <br> </span> 
                                    <?php else: ?>
                                    <span class=""><?php echo e(date('h:i A', strtotime(@$classes[$i]['start_time']))); ?>  - <?php echo e(date('h:i A', strtotime(@$classes[$i]['end_time']))); ?>  <br> </span> 
                                        <span class="">  <strong>  <?php echo e($classes[$i]['subject']); ?> </strong>  (<?php echo e($classes[$i]['subject_code']); ?>) <br>  </span>            
                                        <?php if($classes[$i]['class_room']): ?>
                                            <span class=""> <strong><?php echo app('translator')->get('common.room'); ?> :</strong>  <?php echo e($classes[$i]['class_room']); ?>  <br>     </span>
                                        <?php endif; ?>    
                                        <?php if($classes[$i]['class_name']): ?>
                                        <span class=""> <?php echo e($classes[$i]['class_name']); ?>   <?php if($classes[$i]['section_name']): ?> ( <?php echo e($classes[$i]['section_name']); ?> )   <?php endif; ?>  <br> </span>
                                        <?php endif; ?> 
    
                                        <?php
                                   
                                          $routine_id   =  $classes[$i]['routine_id'];
                                         
                                          $lessonPlan   =  DB::table('lesson_planners')
                                                                ->where('lesson_date',$lesson_date)
                                                                ->where('routine_id',$routine_id)                                              
                                                                ->where('academic_id', getAcademicId())
                                                                ->where('school_id',Auth::user()->school_id)
                                                                ->first();
                                
                                                            
                                        ?>
                                        <?php if($lessonPlan): ?>
                                        <div class="row">
                                            <div class="col-lg-2 text-right">
                                                <a href="<?php echo e(route('view-lesson-planner-lesson', [$lessonPlan->id])); ?>" 
                                                    class="primary-btn small tr-bg icon-only modalLink"
                                                    title="<?php echo app('translator')->get('lesson::lesson.lesson_overview'); ?> " data-modal-size="modal-lg" >
                                                    <span class="ti-eye" id=""></span>
                                                </a>
                                            </div>
                                                     <div class="col-lg-2 text-right">
                                                        <a href="<?php echo e(route('delete-lesson-planner-lesson', [$lessonPlan->id])); ?>" 
                                                            class="primary-btn small tr-bg icon-only  modalLink" data-modal-size="modal-md" 
                                                            title="<?php echo app('translator')->get('common.delete_lesson_plan'); ?>">
                                                            <span class="ti-close" id=""></span>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-2 text-right">
                                                        <a href="<?php echo e(route('edit-lesson-planner-lesson', [$lessonPlan->id])); ?>" 
                                                            class="primary-btn small tr-bg icon-only mr-10 modalLink" data-modal-size="modal-lg" 
                                                            title="<?php echo app('translator')->get('common.edit_lesson_plan'); ?> <?php echo e(date('d-M-y',strtotime($lesson_date))); ?> ( <?php echo e(date('h:i A', strtotime(@$start_time))); ?>-<?php echo e(date('h:i A', strtotime(@$end_time))); ?> )">
                                                            <span class="ti-pencil" id=""></span>
                                                        </a>
                                                    </div>
                                        </div>
                                        <?php else: ?>
                                                <div class="col-lg-6 text-right">
                                                    <a href="<?php echo e(route('add-lesson-planner-lesson', [$sm_weekend->id,$teacher_id,$routine_id,$lesson_date])); ?>" 
                                                        class="primary-btn small tr-bg icon-only mr-10 modalLink" data-modal-size="modal-lg" 
                                                        title="<?php echo app('translator')->get('common.add_lesson_plan'); ?> <?php echo e(date('d-M-y',strtotime($lesson_date))); ?> ( <?php echo e(date('h:i A', strtotime(@$start_time))); ?>-<?php echo e(date('h:i A', strtotime(@$end_time))); ?> )">
                                                        <span class="ti-plus" id="addClassRoutine"></span>
                                                    </a>
                                                </div>
                                        <?php endif; ?>
                                     <?php endif; ?>
                
                                <?php endif; ?>
                                
                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                  
                                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tr>
                
                       <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php endif; ?>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/Lesson\Resources/views/teacher/teacherLessonPlan.blade.php ENDPATH**/ ?>