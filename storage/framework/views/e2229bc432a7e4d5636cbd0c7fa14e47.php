<div class="footer_copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="footer_copyright_inner">
                    <?php echo e(pagesetting('footer-copy-right-text')); ?>

                </div>
            </div>
            <div class="col-md-4 text-end">
                <nav>
                    <ul class='footer_copyright_social'>
                        <?php if(!empty(pagesetting('footer-social-icons'))): ?>
                            <?php $__currentLoopData = pagesetting('footer-social-icons'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialIcon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    // Map legacy Twitter class to X and use white SVG fallback when applicable
                                    $iconClass = str_replace('fa-twitter', 'fa-x-twitter', gv($socialIcon, 'footer-social-icon-class'));
                                    $isX = strpos($iconClass, 'fa-x-twitter') !== false;
                                ?>
                                <li class='footer_copyright_social_list'>
                                    <a href="<?php echo e(gv($socialIcon, 'footer-social-icon-url')); ?>" target='_blank' class='footer_copyright_social_list_link'>
                                        <?php if($isX): ?>
                                            <img src="<?php echo e(asset('public/backEnd/img/x-twitter.svg')); ?>" alt="X" style="width:16px; height:16px;">
                                        <?php else: ?>
                                            <i class="<?php echo e($iconClass); ?>"></i>
                                        <?php endif; ?>
                                        <?php echo e(gv($socialIcon, 'footer-social-label')); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\schoolmanagement\resources\views/themes/edulia/pagebuilder/footer-copyright/view.blade.php ENDPATH**/ ?>