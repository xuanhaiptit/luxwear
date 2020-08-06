<div class="sidebar fl-left">
        <style type="text/css">
        a.active{
            color:red;
        }
    </style>
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
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.filter'); ?></h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <tbody>
                                <ul class="price-filter-link">
                                    <li><strong><?php echo app('translator')->getFromJson('home.choose_price'); ?> </strong></li>
                                    <li><a class="<?php echo e(Request::get('price') == 1 ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['price' => '1'])); ?>"><?php echo app('translator')->getFromJson('home.price_under'); ?></a></li>
                                    <li><a class="<?php echo e(Request::get('price') == 2 ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['price' => '2'])); ?>"><?php echo app('translator')->getFromJson('home.price_5-10'); ?></a></li>
                                    <li><a class="<?php echo e(Request::get('price') == 3 ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['price' => '3'])); ?>"><?php echo app('translator')->getFromJson('home.price_10-15'); ?></a></li>
                                    <li><a class="<?php echo e(Request::get('price') == 4 ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['price' => '4'])); ?>"><?php echo app('translator')->getFromJson('home.price_15-20'); ?></a></li>
                                    <li><a class="<?php echo e(Request::get('price') == 5 ? 'active' : ''); ?>" href="<?php echo e(request()->fullUrlWithQuery(['price' => '5'])); ?>"><?php echo app('translator')->getFromJson('home.price_over'); ?></a></li>
                                </ul>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
<?php /**PATH E:\xampp\htdocs\ismart\resources\views/layout/sidebar_product_detail.blade.php ENDPATH**/ ?>