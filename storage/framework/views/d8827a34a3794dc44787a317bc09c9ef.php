<?php $__env->startSection('title'); ?> 
<?php echo app('translator')->get('library.book_list'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-20">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('library.book_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('library.library'); ?></a>
                <a href="#"><?php echo app('translator')->get('library.book_list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
    <div class="white-box">
        <div class="row mt-40">
            <div class="col-lg-12">
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
                                        <th><?php echo app('translator')->get('library.book_title'); ?></th>
                                        <th><?php echo app('translator')->get('library.book_no'); ?></th>
                                        <th><?php echo app('translator')->get('library.isbn_no'); ?></th>
                                        <th><?php echo app('translator')->get('student.category'); ?></th>
                                        <th><?php echo app('translator')->get('common.subject'); ?></th>
                                        <th><?php echo app('translator')->get('library.publisher_name'); ?></th>
                                        <th><?php echo app('translator')->get('library.author_name'); ?></th>
                                        <th><?php echo app('translator')->get('library.quantity'); ?></th>
                                        <th><?php echo app('translator')->get('library.price'); ?></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                
                                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <tr>
                                        <td><?php echo e($value->book_title); ?></td>
                                        <td><?php echo e($value->book_number); ?></td>
                                        <td><?php echo e($value->isbn_no); ?></td>
                                        <td>
                                        <?php if(!empty($value->book_category_id)): ?>
                                            <?php echo e($value->bookCategory->category_name); ?>

                                        <?php endif; ?>
                                        </td>
                                        <td>
                                        <?php if(!empty($value->bookSubject)): ?>
                                        <?php echo e($value->bookSubject->subject_name); ?>

                                        <?php endif; ?>
                                        </td>
                                        <td><?php echo e($value->publisher_name); ?></td>
                                        <td><?php echo e($value->author_name); ?></td>
                                        <td><?php echo e($value->quantity); ?></td>
                                    <td><?php echo e($value->book_price); ?></td>
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
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/backEnd/parentPanel/parentBookList.blade.php ENDPATH**/ ?>