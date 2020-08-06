<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title=""><?php echo app('translator')->getFromJson('home.home_menu'); ?></a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.care_customer'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <p class="cart"><?php echo app('translator')->getFromJson('home.care_1'); ?></p>
        <p class="cart"><?php echo app('translator')->getFromJson('home.care_2'); ?></p>
        <p class="cart"><?php echo app('translator')->getFromJson('home.care_3'); ?></p>
        <p class="cart"><?php echo app('translator')->getFromJson('home.care_4'); ?></p>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\ismart\resources\views/pages/cart/care_customer.blade.php ENDPATH**/ ?>