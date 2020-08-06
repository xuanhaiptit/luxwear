<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.home_menu'); ?></a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.blog_menu'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.blog_menu'); ?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="clearfix">
                            <a href="<?php echo url('chi-tiet-bai-viet',[$item['id'],$item['alias']]); ?>" title="" class="thumb fl-left">
                                <img src="<?php echo e(asset('resources/upload/post/'.$item['image'])); ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <?php if(App::isLocale('vn')): ?>
                                <a href="?page=detail_blog" title="" class="title"><?php echo $item['desc']; ?></a>
                                <?php else: ?>
                                <a href="?page=detail_blog" title="" class="title"><?php echo $item['desc_en']; ?></a>
                                <?php endif; ?>

                                <span class="create-date"><?php echo $item['created_at']; ?></span>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
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

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/pages/post/list_blog.blade.php ENDPATH**/ ?>