    <?php $__env->startSection('title'); ?> 
        <?php echo app('translator')->get('wallet::wallet.wallet_reject_request'); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php echo $__env->make('wallet::_walletRequest',['status'=>'reject'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\Modules/Wallet\Resources/views/walletReject.blade.php ENDPATH**/ ?>