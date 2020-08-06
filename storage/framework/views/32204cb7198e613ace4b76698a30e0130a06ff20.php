<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="<?php echo url('/'); ?>" title=""><?php echo app('translator')->getFromJson('home.home_menu'); ?></a>
                    </li>
                    <?php if(isset($cate_detail)): ?>
                        <?php if(App::isLocale('vn')): ?>
                        <?php $__currentLoopData = $cate_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="" title="">
                                <?php
                                $cate = DB::table('cate_product')->where('id',$item['parent_id'])->first();
                                echo $cate->name;
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="" title=""><?php echo $item['name']; ?></a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <?php $__currentLoopData = $cate_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="" title="">
                                        <?php
                                        $cate = DB::table('cate_product')->where('id',$item['parent_id'])->first();
                                        echo $cate->name_en;
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="" title=""><?php echo $item['name_detail_en']; ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <?php if(isset($cate_detail)): ?>
                    <?php $__currentLoopData = $cate_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(App::isLocale('vn')): ?>
                                <h3 class="section-title fl-left"><?php echo $item['name']; ?></h3>
                        <?php else: ?>
                                <h3 class="section-title fl-left"><?php echo $item['name_detail_en']; ?></h3>
                            <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <div class="filter-wp fl-right">
                        <p class="desc"><?php echo app('translator')->getFromJson('home.show'); ?> <?php echo count($product); ?> <?php echo app('translator')->getFromJson('home.product'); ?> (<?php echo count($num_rows); ?> <?php echo app('translator')->getFromJson('home.product'); ?>)</p>
                        <form class="tree-most" id="form_order" method="get">
                    <div class="orderby_wrapper pull-right">
                        <label><?php echo app('translator')->getFromJson('home.sort'); ?></label>
                        <select name="orderby" class="orderby" style="border:1px solid #090505;border-radius: 2px;">
                            <option <?php echo e(Request::get( 'orderby')=="md" ? "selected='selected'": " "); ?> value="md"><?php echo app('translator')->getFromJson('home.default'); ?></option>
                            <option <?php echo e(Request::get( 'orderby')=="desc" ? "selected='selected'": " "); ?> value="desc"><?php echo app('translator')->getFromJson('home.new_product'); ?></option>
                            <option <?php echo e(Request::get( 'orderby')=="asc" ? "selected='selected'": " "); ?> value="asc"><?php echo app('translator')->getFromJson('home.old_product'); ?></option>
                            <option <?php echo e(Request::get( 'orderby')=="price_max" ? "selected='selected'": " "); ?> value="price_max"><?php echo app('translator')->getFromJson('home.price_incre'); ?></option>
                            <option <?php echo e(Request::get( 'orderby')=="price_min" ? "selected='selected'": " "); ?> value="price_min"><?php echo app('translator')->getFromJson('home.price_desce'); ?></option>
                        </select>
                    </div>
                </form>
                    </div>
                </div>
                <?php if(!empty($product)): ?>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <?php if($item->price_old != 0): ?>:
                                <span class="old"><?php echo number_format($item->price_old,0,",","."); ?> đ</span>
                                <?php else: ?>
                                <?php endif; ?>
                            </div>
                            <div class="action clearfix">
                                <div class="product-icon-container">
                                    <a href="<?php echo route('add.cart',$item->id); ?>"  title="Thêm giỏ hàng" class="add-cart"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <?php if(count($product) == 0): ?>
            <div><p style="text-align: center;"><?php echo app('translator')->getFromJson('home.no_product'); ?></p></div>
            <?php else: ?>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul class="list-item clearfix">
                        
                        <?php if($product->currentPage() != 1): ?>
                            <li>
                                <a href="<?php echo $product->url($product->currentPage() - 1); ?>" title=""><?php echo app('translator')->getFromJson('home.before'); ?></a>
                            </li>
                        <?php endif; ?>
                            <?php for($i = 1; $i <= $product->lastPage(); $i++): ?>
                            <li class="<?php echo ($product->currentPage() == $i) ? 'active' :null; ?>">
                                <a href="<?php echo $product->url($i); ?>" title=""><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>
                        <?php if($product->currentPage() != $product->lastPage()): ?>
                            <li>
                                <a href="<?php echo $product->url($product->currentPage() + 1); ?>" title=""><?php echo app('translator')->getFromJson('home.after'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php echo $__env->make('layout.sidebar_product_detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function(){
            $('.orderby').change(function(){
                $("#form_order").submit();
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\ismart\resources\views/pages/product/cate_product.blade.php ENDPATH**/ ?>