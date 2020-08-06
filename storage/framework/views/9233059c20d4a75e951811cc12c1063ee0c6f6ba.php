<div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.category_pr'); ?></h3>
                </div>
                <div class="secion-detail" style="text-transform: capitalize;">
                    <?php
                        $cate_product = DB::table('cate_product')->select('*')->where('status',1)->get()->toArray();
                    ?>
                    <?php $__currentLoopData = $cate_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <ul class="list-item">
                        <li>
                            <?php if(App::isLocale('vn')): ?>
                                <a href="#" title=""><?php echo $item->name; ?></a>
                            <?php else: ?>
                                <a href="#" title=""><?php echo $item->name_en; ?></a>
                            <?php endif; ?>

                            <ul class="sub-menu">
                                <?php
                                    $cate_product_detail = DB::table('cate_product_detail')->where('parent_id',$item->id)->where('status',1)->get()->toArray();
                                ?>
                                <?php $__currentLoopData = $cate_product_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <?php if(App::isLocale('vn')): ?>
                                        <a href="<?php echo url('loaisanpham',[$product_detail->id,$product_detail->alias]); ?>" title=""><?php echo $product_detail->name; ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo url('loaisanpham',[$product_detail->id,$product_detail->alias]); ?>" title=""><?php echo $product_detail->name_detail_en; ?></a>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    </ul>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.selling_pr'); ?></h3>
                </div>
                <div class="section-detail">
                    <?php if(isset($selling_product)): ?>
                    <ul class="list-item">
                        <?php $__currentLoopData = $selling_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="clearfix">
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
                            <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="thumb fl-left">
                                <img src="<?php echo e(asset('resources/upload/product/'.$item->image)); ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="<?php echo url('ctsp',[$item->id,$item->alias]); ?>" title="" class="product-name"><?php echo $item->product_name; ?></a>
                                <div class="price">
                                    <span class="new"><?php echo number_format($item->price_new,0,",","."); ?> đ</span>
                                </div>
                                <div class="buy_now_cart">
                                    <a href="<?php echo route('add.cart',$item->id); ?>" class="buy-now"><?php echo app('translator')->getFromJson('home.buy_now'); ?></a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
<?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>