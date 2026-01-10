<?php $__env->startSection(config('pagebuilder.site_section')); ?>
    <?php echo e(headerContent()); ?>

    <?php $__env->startPush(config('pagebuilder.site_style_var')); ?>
        <style>
            .archive_widget_item_keywords li {
                cursor: default;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <?php
        $gs = generalSetting();
    ?>
    <section class="bradcrumb_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bradcrumb_area_inner">
                        <h1>
                            <?php echo e(__('edulia.archive_list')); ?>

                            <span>
                                <a href="<?php echo e(url('/')); ?>"><?php echo e(__('edulia.home')); ?></a> /<?php echo e(__('edulia.archive_list')); ?>

                            </span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_padding archive">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12">
                    <div class="archive_card">
                        <div class="row">
                            <div class="col-lg-8 col-md-7">
                                <div class="col-lg-12 col-md-12" id="dynamicLoadMoreData">
                                    <?php $__currentLoopData = $archives->paginate(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="archive_card_wrapper no-img searchArchiveContent">
                                            <div class="archive_card_wrapper_content">
                                                <a href="<?php echo e(route('frontend.news-details', $item->id)); ?>"
                                                    class='archive_card_wrapper_content_title'><?php echo e($item->news_title); ?></a>
                                                <p class="archive_card_wrapper_content_meta">
                                                    <?php echo e(dateConvert($item->publish_date)); ?> /
                                                    <?php echo e($item->category->category_name); ?></p>
                                                <p><?php echo e($item->news_body); ?></p>
                                                <a href="<?php echo e(route('frontend.news-details', $item->id)); ?>">+
                                                    <?php echo e(__('edulia.read_more')); ?></a>
                                                <input type="hidden" name="createdYear" id="createdYear"
                                                    value="<?php echo e($item->created_at->format('Y')); ?>">
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="archive_btns">
                                        <a href="#"
                                            class="boxed_btn load_more_archive_btn"><?php echo e(__('edulia.load_more')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <?php if($gs->blog_search == 1): ?>
                                <div class="col-lg-4 col-md-5">
                                    <div class="archive_widget">
                                        <div class="archive_widget_search">
                                            <label for="#" class='archive_widget_search_icon'><i
                                                    class="far fa-search"></i></label>
                                            <input type="text" class="input-control-input"
                                                placeholder='<?php echo e(__('edulia.search')); ?>' id="archiveAllContentSearch">
                                        </div>
                                        <div class="archive_widget_item">
                                            <h5>Archive in Year</h5>
                                            <?php $__currentLoopData = $archiveYears; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label for="#" class="checkbox archive_year">
                                                    <input type="checkbox" class="checkbox-input archive_year_value"
                                                        value="<?php echo e($key); ?>">
                                                    <span class="checkbox-title">Archive in <?php echo e($key); ?></span>
                                                </label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="archive_widget_item border-padding-none ">
                                            <h5>Keywords</h5>
                                            <ul class="archive_widget_item_keywords">
                                                <?php $__currentLoopData = $archiveCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archiveCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($archiveCategory->category_name); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo e(footerContent()); ?>

<?php $__env->stopSection(); ?>
<?php if (! $__env->hasRenderedOnce('9349fb19-9e72-4b92-8003-4f483ef41b85')): $__env->markAsRenderedOnce('9349fb19-9e72-4b92-8003-4f483ef41b85');
$__env->startPush(config('pagebuilder.site_script_var')); ?>
    <script>
        $("#archiveAllContentSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".searchArchiveContent").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $(document).on('click', '.load_more_archive_btn', function(e) {
            e.preventDefault();
            var totalBlog = $('.searchArchiveContent').length;
            var year = [];
            $(".archive_year_value:checked").each(function(i) {
                year[i] = $(this).val();
            });
            if (year.length == 0) {
                ajaxRequest(totalBlog, null);
            } else {
                ajaxRequest(totalBlog, year);
            }
        })
        $(document).on('click', '.archive_year', function(e) {
            var year = [];
            $(".archive_year_value:checked").each(function(i) {
                year[i] = $(this).val();
            });
            $.ajax({
                url: "<?php echo e(route('frontend.archive-year-filter')); ?>",
                method: "GET",
                data: {
                    year: year,
                    data_count: year.length,
                },
                success: function(response) {
                    $('#dynamicLoadMoreData').empty();
                    $('#dynamicLoadMoreData').append(response.html);
                }
            })
        })

        function ajaxRequest(totalBlog, selectedYear = null) {
            $.ajax({
                url: "<?php echo e(route('frontend.load-more-archive-list')); ?>",
                method: "POST",
                data: {
                    skip: totalBlog,
                    year: selectedYear,
                    _token: "<?php echo e(csrf_token()); ?>",
                },
                success: function(response) {
                    if (totalBlog == response.total_data) {
                        $('.load_more_archive_btn').hide();
                    } else {
                        $('#dynamicLoadMoreData').append(response.html);
                    }
                }
            })
        }
    </script>
<?php $__env->stopPush(); endif; ?>

<?php echo $__env->make(config('pagebuilder.site_layout'), ['edit' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/frontEnd/theme/edulia/archive/archive_list.blade.php ENDPATH**/ ?>