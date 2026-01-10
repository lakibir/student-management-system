<?php if (! $__env->hasRenderedOnce('f32ad4ee-4b96-4c41-9477-0a8445533924')): $__env->markAsRenderedOnce('f32ad4ee-4b96-4c41-9477-0a8445533924');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <style>
        iframe {
            width: 100% !important;
            height: 100% !important;
        }
        .google_map{
            height: 200px;
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<div class="contacts_info mt-5">
    <p><?php echo pagesetting('google_map_editor'); ?></p>
    <div class="google_map w-100">
        <?php echo pagesetting('google_map_key'); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/themes/edulia/pagebuilder/google-map/view.blade.php ENDPATH**/ ?>