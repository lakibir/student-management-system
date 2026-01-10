    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('fees.fees_invoice'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make('fees::_allFeesList',['role'=> 'student'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/Fees\Resources/views/student/feesInfo.blade.php ENDPATH**/ ?>