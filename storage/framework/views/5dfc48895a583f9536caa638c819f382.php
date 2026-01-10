<?php $__env->startPush('css'); ?>
    <style>
        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            font-size: 1.5em;
            justify-content: space-around;
            text-align: center;
            width: 5em;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #ccc;
            cursor: pointer;
        }

        .star-rating :checked~label {
            color: #f90;
        }

        article {
            background-color: #ffe;
            box-shadow: 0 0 1em 1px rgba(0, 0, 0, .25);
            color: #006;
            font-family: cursive;
            font-style: italic;
            margin: 4em;
            max-width: 30em;
            padding: 2em;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('teacherEvaluation.my_report'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <section class="sms-breadcrumb mb-20">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('teacherEvaluation.my_report'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('teacherEvaluation.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('teacherEvaluation.teacher_evaluation'); ?></a>
                    <a href="#"><?php echo app('translator')->get('teacherEvaluation.my_report'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row mt-20">
                <div class="col-lg-12 student-details up_admin_visitor">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="white-box">
                            <div class="row">
                                <div class="col-lg-4 no-gutters">
                                    <div class="main-title">
                                        <h3 class="mb-15"><?php echo app('translator')->get('teacherEvaluation.my_report'); ?> </h3>
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
                                                    <th><?php echo app('translator')->get('teacherEvaluation.class'); ?></th>
                                                    <th><?php echo app('translator')->get('teacherEvaluation.section'); ?></th>
                                                    <th><?php echo app('translator')->get('teacherEvaluation.submitted_by'); ?></th>
                                                    <th><?php echo app('translator')->get('teacherEvaluation.rating'); ?></th>
                                                    <th><?php echo app('translator')->get('teacherEvaluation.comment'); ?></th>
                                                    <th><?php echo app('translator')->get('teacherEvaluation.submitted_on'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $teacherEvaluations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacherEvaluation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($teacherEvaluation->studentRecord->class->class_name); ?>

                                                        </td>
                                                        <td><?php echo e($teacherEvaluation->studentRecord->section->section_name); ?>

                                                        </td>
                                                        <td>
                                                            <?php if($teacherEvaluation->role_id == 2): ?>
                                                                <?php echo app('translator')->get('teacherEvaluation.student'); ?>
                                                            <?php else: ?>
                                                                <?php echo app('translator')->get('teacherEvaluation.parent'); ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <div class="star-rating">
                                                                <input type="radio"
                                                                    id="5-stars<?php echo e($teacherEvaluation->id); ?>"
                                                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="5"
                                                                    <?php echo e($teacherEvaluation->rating == 5 ? 'checked' : ''); ?>

                                                                    disabled />
                                                                <label for="5-stars<?php echo e($teacherEvaluation->id); ?>"
                                                                    class="star">&#9733;</label>
                                                                <input type="radio"
                                                                    id="4-stars<?php echo e($teacherEvaluation->id); ?>"
                                                                    name="rating<?php echo e($teacherEvaluation->id); ?>" value="4"
                                                                    <?php echo e($teacherEvaluation->rating == 4 ? 'checked' : ''); ?>

                                                                    disabled />
                                                                <label for="4-stars<?php echo e($teacherEvaluation->id); ?>"
                                                                    class="star">&#9733;</label>
                                                                <input type="radio"
                                                                    id="3-stars<?php echo e($teacherEvaluation->id); ?>"
                                                                    name="rating<?php echo e($teacherEvaluation->id); ?>"
                                                                    value="3"
                                                                    <?php echo e($teacherEvaluation->rating == 3 ? 'checked' : ''); ?>

                                                                    disabled />
                                                                <label for="3-stars<?php echo e($teacherEvaluation->id); ?>"
                                                                    class="star">&#9733;</label>
                                                                <input type="radio"
                                                                    id="2-stars<?php echo e($teacherEvaluation->id); ?>"
                                                                    name="rating<?php echo e($teacherEvaluation->id); ?>"
                                                                    value="2"
                                                                    <?php echo e($teacherEvaluation->rating == 2 ? 'checked' : ''); ?>

                                                                    disabled />
                                                                <label for="2-stars<?php echo e($teacherEvaluation->id); ?>"
                                                                    class="star">&#9733;</label>
                                                                <input type="radio"
                                                                    id="1-star<?php echo e($teacherEvaluation->id); ?>"
                                                                    name="rating<?php echo e($teacherEvaluation->id); ?>"
                                                                    value="1"
                                                                    <?php echo e($teacherEvaluation->rating == 1 ? 'checked' : ''); ?>

                                                                    disabled />
                                                                <label for="1-star<?php echo e($teacherEvaluation->id); ?>"
                                                                    class="star">&#9733;</label>
                                                            </div>
                                                        </td>
                                                        <td data-bs-toggle="tooltip"
                                                            title="<?php echo e($teacherEvaluation->comment); ?>">
                                                            <?php echo e($teacherEvaluation->comment); ?></td>
                                                        <td><?php echo e(dateConvert($teacherEvaluation->created_at)); ?></td>
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
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/teacherEvaluation/report/teacher_panel_evaluation_report.blade.php ENDPATH**/ ?>