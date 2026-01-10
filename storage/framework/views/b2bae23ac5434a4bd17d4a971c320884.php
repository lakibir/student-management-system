<?php
    $generalSetting = generalSetting();
?>
<div class="footer-item">
    <a href='<?php echo e(url('/')); ?>' class="footer-item-logo" style="display:inline-block; overflow:visible; line-height:1;">
        <img src="<?php echo e(asset('public/backEnd/img/logo.png')); ?>" alt="" style="display:block; width:auto; height:auto; max-width:220px; max-height:none; object-fit:contain;">
    </a>
    <p style="color: <?php echo e(pagesetting('footer-content-bg-color')); ?>">
        <?php echo pagesetting('footer-right-content-text'); ?>

    </p>
</div>
<?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/themes/edulia/pagebuilder/footer-content/view.blade.php ENDPATH**/ ?>