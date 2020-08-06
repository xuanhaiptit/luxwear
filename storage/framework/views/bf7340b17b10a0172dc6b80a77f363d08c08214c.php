<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <img src="<?php echo e(asset('resources/upload/slider/'.$item['image'])); ?>" alt="">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="<?php echo url('public/images/icon-1.png'); ?>">
                            </div>
                            <h3 class="title"><?php echo app('translator')->getFromJson('home.free_ship'); ?></h3>
                            <p class="desc"><?php echo app('translator')->getFromJson('home.customer'); ?></p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="<?php echo url('public/images/icon-2.png'); ?>">
                            </div>
                            <h3 class="title"><?php echo app('translator')->getFromJson('home.time'); ?></h3>
                            <p class="desc"><?php echo app('translator')->getFromJson('home.phone_contact'); ?></p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="<?php echo url('public/images/icon-3.png'); ?>">
                            </div>
                            <h3 class="title"><?php echo app('translator')->getFromJson('home.save'); ?></h3>
                            <p class="desc"><?php echo app('translator')->getFromJson('home.great'); ?></p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="<?php echo url('public/images/icon-4.png'); ?>">
                            </div>
                            <h3 class="title"><?php echo app('translator')->getFromJson('home.payment'); ?></h3>
                            <p class="desc"><?php echo app('translator')->getFromJson('home.support'); ?></p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="<?php echo url('public/images/icon-5.png'); ?>">
                            </div>
                            <h3 class="title"><?php echo app('translator')->getFromJson('home.order'); ?></h3>
                            <p class="desc"><?php echo app('translator')->getFromJson('home.simple'); ?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.featured_product'); ?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php $__currentLoopData = $featured_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <?php
                            $date = date("Y-m-d");
                            $week = strtotime(date("Y-m-d",strtotime($item->created_at))."+1 week");
                            $datediff = $week - (strtotime($date));
                            $labelnew = "";
                            if (floor($datediff / (60 * 60 * 24)) > 0 && floor($datediff / (60 * 60 * 24)) <= 7) {
                                $labelnew = "block2-labelnew";
                            }
                            ?>
                            <p class="<?php echo $labelnew; ?>">
                            </p>
                            <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="thumb">
                                <img src="<?php echo e(asset('resources/upload/product/'.$item->image)); ?>">
                            </a>
                            <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="product-name"><?php echo $item->product_name; ?></a>
                            <div class="price">
                                <span class="new"><?php echo number_format($item->price_new,0,",","."); ?> đ</span>
                                <?php if($item->price_old != 0): ?>
                                <span class="old"><?php echo number_format($item->price_old,0,",","."); ?> đ</span>
                                <?php else: ?>
                                <?php endif; ?>
                            </div>
                            <div class="action clearfix">
                                <div class="product-icon-container">
                                    <a href="<?php echo route('add.cart',$item->id); ?>"  title="<?php echo app('translator')->getFromJson('home.add_to_cart'); ?>" class="add-cart"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.laptop'); ?></h3>
                </div>
                <div class="section-detail">
                    <?php if(isset($laptop)): ?>

                        <ul class="list-item clearfix">
                            <?php $__currentLoopData = $laptop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php
                                        $date = date("Y-m-d");
                                        $week = strtotime(date("Y-m-d",strtotime($item->created_at))."+1 week");
                                        $datediff = $week - (strtotime($date));
                                        $labelnew = "";
                                        if (floor($datediff / (60 * 60 * 24)) > 0 && floor($datediff / (60 * 60 * 24)) <= 7) {
                                            $labelnew = "block2-labelnew";
                                        }
                                    ?>
                                    <p class="<?php echo $labelnew; ?>">
                                    </p>
                                    <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="thumb">
                                        <img src="<?php echo e(asset('resources/upload/product/'.$item->image)); ?>">
                                    </a>
                                    <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="product-name"><?php echo $item->product_name; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo number_format($item->price_new,0,",","."); ?> đ</span>
                                        <?php if($item->price_old != 0): ?>
                                        <span class="old"><?php echo number_format($item->price_old,0,",","."); ?> đ</span>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="action clearfix">
                                        <div class="product-icon-container">
                                            <a href="<?php echo route('add.cart',$item->id); ?>"  title="<?php echo app('translator')->getFromJson('home.add_to_cart'); ?>" class="add-cart"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.phone'); ?></h3>
                </div>
                <div class="section-detail">
                    <?php if(isset($phone)): ?>
                        <ul class="list-item clearfix">
                            <?php $__currentLoopData = $phone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php
                                    $date = date("Y-m-d");
                                    $week = strtotime(date("Y-m-d",strtotime($item->created_at))."+1 week");
                                    $datediff = $week - (strtotime($date));
                                    $labelnew = "";
                                    if (floor($datediff / (60 * 60 * 24)) > 0 && floor($datediff / (60 * 60 * 24)) <= 7) {
                                        $labelnew = "block2-labelnew";
                                    }
                                    ?>
                                    <p class="<?php echo $labelnew; ?>">
                                    </p>
                                    <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="thumb">
                                        <img src="<?php echo e(asset('resources/upload/product/'.$item->image)); ?>">
                                    </a>
                                    <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="product-name"><?php echo $item->product_name; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo number_format($item->price_new,0,",","."); ?> đ</span>
                                        <?php if($item->price_old != 0): ?>
                                        <span class="old"><?php echo number_format($item->price_old,0,",","."); ?> đ</span>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="action clearfix">
                                        <div class="product-icon-container">
                                            <a href="<?php echo route('add.cart',$item->id); ?>"  title="<?php echo app('translator')->getFromJson('home.add_to_cart'); ?>" class="add-cart"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.accessories'); ?></h3>
                </div>
                <div class="section-detail">
                    <?php if(isset($pk)): ?>
                        <ul class="list-item clearfix">
                            <?php $__currentLoopData = $pk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php
                                    $date = date("Y-m-d");
                                    $week = strtotime(date("Y-m-d",strtotime($item->created_at))."+1 week");
                                    $datediff = $week - (strtotime($date));
                                    $labelnew = "";
                                    if (floor($datediff / (60 * 60 * 24)) > 0 && floor($datediff / (60 * 60 * 24)) <= 7) {
                                        $labelnew = "block2-labelnew";
                                    }
                                    ?>
                                    <p class="<?php echo $labelnew; ?>">
                                    </p>
                                    <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="thumb">
                                        <img src="<?php echo e(asset('resources/upload/product/'.$item->image)); ?>">
                                    </a>
                                    <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="product-name"><?php echo $item->product_name; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo number_format($item->price_new,0,",","."); ?> đ</span>
                                        <?php if($item->price_old != 0): ?>
                                        <span class="old"><?php echo number_format($item->price_old,0,",","."); ?> đ</span>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="action clearfix">
                                        <div class="product-icon-container">
                                            <a href="<?php echo route('add.cart',$item->id); ?>"  title="<?php echo app('translator')->getFromJson('home.add_to_cart'); ?>" class="add-cart"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.device'); ?></h3>
                </div>
                <div class="section-detail">
                    <?php if(isset($tb)): ?>
                        <ul class="list-item clearfix">
                            <?php $__currentLoopData = $tb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php
                                    $date = date("Y-m-d");
                                    $week = strtotime(date("Y-m-d",strtotime($item->created_at))."+1 week");
                                    $datediff = $week - (strtotime($date));
                                    $labelnew = "";
                                    if (floor($datediff / (60 * 60 * 24)) > 0 && floor($datediff / (60 * 60 * 24)) <= 7) {
                                        $labelnew = "block2-labelnew";
                                    }
                                    ?>
                                    <p class="<?php echo $labelnew; ?>">
                                    </p>
                                    <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="thumb">
                                        <img src="<?php echo e(asset('resources/upload/product/'.$item->image)); ?>">
                                    </a>
                                    <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="product-name"><?php echo $item->product_name; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo number_format($item->price_new,0,",","."); ?> đ</span>
                                        <?php if($item->price_old != 0): ?>
                                        <span class="old"><?php echo number_format($item->price_old,0,",","."); ?> đ</span>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="action clearfix">
                                        <div class="product-icon-container">
                                            <a href="<?php echo route('add.cart',$item->id); ?>"  title="<?php echo app('translator')->getFromJson('home.add_to_cart'); ?>" class="add-cart"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Online\web\ismart\resources\views/pages/home.blade.php ENDPATH**/ ?>