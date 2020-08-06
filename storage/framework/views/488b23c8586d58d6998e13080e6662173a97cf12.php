<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.home_menu'); ?></a>
                    </li>

                    <?php if(isset($cate_post)): ?>
                        <?php if(App::isLocale('vn')): ?>
                            <?php $__currentLoopData = $cate_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="" title=""><?php echo $item['name']; ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php $__currentLoopData = $cate_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="" title=""><?php echo $item['name_en']; ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <?php if(isset($cate_post)): ?>
                        <?php $__currentLoopData = $cate_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h3 class="section-title"><?php echo $item['name']; ?></h3>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <?php if(isset($post)): ?>
                <div class="section-detail">
                    <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul class="list-item">
                        <li class="clearfix">
                            <a href="<?php echo url('chi-tiet-bai-viet',[$item['id'],$item['alias']]); ?>" title="" class="thumb fl-left">
                                <img src="<?php echo e(asset('resources/upload/post/'.$item['image'])); ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="<?php echo url('chi-tiet-bai-viet',[$item['id'],$item['alias']]); ?>" title="" class="title"><?php echo $item['post_name']; ?></a>
                                <span class="create-date"><?php echo $item['created_at']; ?></span>
                                <p class="desc"><?php echo $item['desc']; ?></p>
                            </div>
                        </li>
                    </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <p><?php echo app('translator')->getFromJson('home.no_post'); ?> <?php echo $cate_post['name']; ?></p>
                <?php endif; ?>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php if($post->currentPage() != 1): ?>
                            <li>
                                <a href="<?php echo $post->url($post->currentPage() - 1); ?>" title=""><?php echo app('translator')->getFromJson('home.before'); ?></a>
                            </li>
                        <?php endif; ?>
                            <?php for($i = 1; $i <= $post->lastPage(); $i++): ?>
                            <li class="<?php echo ($post->currentPage() == $i) ? 'active' :null; ?>">
                                <a href="<?php echo $post->url($i); ?>" title=""><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>
                        <?php if($post->currentPage() != $post->lastPage()): ?>
                            <li>
                                <a href="<?php echo $post->url($post->currentPage() + 1); ?>" title=""><?php echo app('translator')->getFromJson('home.after'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php echo $__env->make('layout.sidebar_blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\ismart\resources\views/pages/post/cate_blog.blade.php ENDPATH**/ ?>