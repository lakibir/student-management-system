<title><?php echo e(__('edulia.blog_list')); ?> </title>
<?php $__env->startSection(config('pagebuilder.site_section')); ?>
<?php echo e(headerContent()); ?>

<?php
    $gs = generalSetting();
?>
    <section class="bradcrumb_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1>
                            <?php echo e(__('edulia.blog_list')); ?> 
                            <span>
                                <a href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /<?php echo e(__('edulia.blog_list')); ?>

                            </span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_padding blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                    <div class="blog_card">
                        <div class="row">
                            <div class="col-lg-8 col-md-7" id="dynamicLoadMoreData">
                                <?php $__currentLoopData = $blogs->paginate(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                            </div>
                            <?php if($gs->blog_search == 1 || $gs->recent_blog == 1): ?>
                                <div class="col-lg-4 col-md-5">
                                    <div class="blog_widget">
                                        <?php if($gs->blog_search == 1): ?>
                                            <div class="blog_widget_search">
                                                <label for="#" class='blog_widget_search_icon'><i class="far fa-search"></i></label>
                                                <input type="text" class="input-control-input" placeholder='<?php echo e(__('edulia.search')); ?>' id="blogallcontentsearch">
                                            </div>
                                        <?php endif; ?>
                                        <?php if($gs->recent_blog == 1): ?>
                                            <div class="blog_widget_item">
                                                <h5><?php echo e(__('edulia.recent_blog')); ?></h5>
                                                <?php $__currentLoopData = $blogs->orderBy('id', 'desc')->paginate(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="blog_widget_item_recentnews">
                                                        <a href="<?php echo e(route('frontend.news-details', $blog->id)); ?>"><?php echo e($blog->news_title); ?></a>
                                                        <p><?php echo e(dateConvert($blog->publish_date)); ?> / <?php echo e($blog->category->category_name); ?></p>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <div class="load_more section_padding_top">
                                        <a href="#" class="site_btn load_more_blog_btn"><?php echo e(__('edulia.load_more')); ?></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('4737d20d-6f79-4c10-84cf-3d4a804d7604')): $__env->markAsRenderedOnce('4737d20d-6f79-4c10-84cf-3d4a804d7604');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        $("#blogallcontentsearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".searchBlogContent").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $(document).on('click', '.load_more_blog_btn', function (e) {
            e.preventDefault();
            var totalBlog = $('.searchBlogContent').length;
            $.ajax({
                url: "<?php echo e(route('frontend.load-more-blog-list')); ?>",
                method: "POST",
                data: {
                    skip: totalBlog,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
                success: function (response) {
                    if(totalBlog == response.total_data){
                        $('.load_more_blog_btn').hide();
                    }else{
                        $('#dynamicLoadMoreData').append(response.html);
                    }
                }
            })
        })
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/frontEnd/theme/edulia/blog_list.blade.php ENDPATH**/ ?>