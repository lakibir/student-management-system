<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="blog_card_wrapper searchBlogContent">
        <div class="blog_card_wrapper_img">
            <img src="<?php echo e(asset($item->image)); ?>" alt="<?php echo e($item->news_title); ?>">
        </div>
        <div class="blog_card_wrapper_content">
            <a href="<?php echo e(route('frontend.news-details', $item->id)); ?>" class='blog_card_wrapper_content_title'><?php echo e($item->news_title); ?></a>
            <p class="blog_card_wrapper_content_meta"><?php echo e(dateConvert($item->publish_date)); ?> / <?php echo e($item->category->category_name); ?></p>
            <p><?php echo mb_strimwidth($item->news_body, 0, 200, "..."); ?></p>
            <a href="<?php echo e(route('frontend.news-details', $item->id)); ?>"><?php echo e(__('edulia.read_more')); ?></a>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/frontEnd/theme/edulia/read_more_blog_list.blade.php ENDPATH**/ ?>