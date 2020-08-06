<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.home_menu'); ?></a>
                    </li>
                    <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(App::isLocale('vn')): ?>
                            <li>
                                <a href="" title=""><?php echo isset($item['cate_post']['name']) ? $item['cate_post']['name'] : ''; ?></a>
                            </li>
                            <li>
                                <a href="" title=""><?php echo $item['post_name']; ?></a>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="" title=""><?php echo isset($item['cate_post']['name_en']) ? $item['cate_post']['name_en'] : ''; ?></a>
                            </li>
                            <li>
                                <a href="" title=""><?php echo $item['post_name_en']; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <?php $__currentLoopData = $detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <?php if(App::isLocale('vn')): ?>
                        <h3 class="section-title"><?php echo $item['post_name']; ?></h3>
                    <?php else: ?>
                        <h3 class="section-title"><?php echo $item['post_name_en']; ?></h3>
                    <?php endif; ?>
                </div>
                <div class="section-detail">
                    <span class="create-date"><?php echo $item['created_at']; ?></span>
                    <?php if(App::isLocale('vn')): ?>
                        <div class="detail">
                            <p><strong><?php echo $item['desc']; ?></strong></p>
                            <p><?php echo $item['content']; ?></p>
                        </div>
                    <?php else: ?>
                        <div class="detail">
                            <p><strong><?php echo $item['desc_en']; ?></strong></p>
                            <p><?php echo $item['content_en']; ?></p>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="section" id="social-wp">
                <div class="section-detail">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>

                </div>
            </div>
        </div>
        <?php echo $__env->make('layout.sidebar_blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/pages/post/detail_blog.blade.php ENDPATH**/ ?>