<?php $__env->startSection('content'); ?>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="<?php echo url('/'); ?>" title=""><?php echo app('translator')->getFromJson('home.home_menu'); ?></a>
                    </li>
                    <?php if(App::isLocale('vn')): ?>
                        <?php if(isset($danhmucsp)): ?>
                            <li>
                                <a href="" title=""><?php echo $danhmucsp['name']; ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($loaisp)): ?>
                            <li>
                                <a href="" title=""><?php echo $loaisp['name']; ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($ctsp)): ?>
                            <li>
                                <a href="" title=""><?php echo $ctsp['product_name']; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if(isset($danhmucsp)): ?>
                            <li>
                                <a href="" title=""><?php echo $danhmucsp['name_en']; ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($loaisp)): ?>
                            <li>
                                <a href="" title=""><?php echo $loaisp['name_detail_en']; ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($ctsp)): ?>
                            <li>
                                <a href="" title=""><?php echo $ctsp['product_name_en']; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" id="main-thumb" class="clearfix">
                            <div style="height:356px;width:356px;" class="zoomWrapper"><img id="zoom" src="<?php echo e(asset('resources/upload/product/'.$ctsp['image'])); ?>" data-zoom-image="<?php echo e(asset('resources/upload/product/'.$ctsp['image'])); ?>" style="position: absolute;"></div>
                        </a>
                        <div id="list-thumb">
                            <?php if(isset($list_image)): ?>
                            <?php $__currentLoopData = $list_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="" data-image="<?php echo e(asset('resources/upload/product_detail/'.$item['image'])); ?>" data-zoom-image="<?php echo e(asset('resources/upload/product_detail/'.$item['image'])); ?>">
                                <img id="zoom-img" src="<?php echo e(asset('resources/upload/product_detail/'.$item['image'])); ?>" />
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="<?php echo e(asset('resources/upload/product/'.$ctsp['image'])); ?>" alt="">
                    </div>
                    <div class="info fl-right">
                        <?php if(App::isLocale('vn')): ?>
                        <h3 class="product-name"><?php echo $ctsp['product_name']; ?></h3>
                        <?php else: ?>
                        <h3 class="product-name"><?php echo $ctsp['product_name_en']; ?></h3>
                        <?php endif; ?>
                        <?php
                            $ageDetail = 0;
                            if($ctsp['product_total_rating']){
                              $ageDetail = round($ctsp['product_total_number'] / $ctsp['product_total_rating'],2);
                            }
                        ?>
                        <div class="pro_rating">
                            <?php for($i = 1; $i<=5; $i++): ?>
                            <a href="#"><i class="fa fa-star <?php echo e($i <= $ageDetail ? 'active' : ''); ?>"></i></a>
                            <?php endfor; ?>
                        </div>
                        <?php if(App::isLocale('vn')): ?>
                            <div class="desc">
                                <p><?php echo $ctsp['desc']; ?></p>
                            </div>
                        <?php else: ?>
                            <div class="desc">
                                <p><?php echo $ctsp['desc_en']; ?></p>
                            </div>
                        <?php endif; ?>
                        <div class="num-product">
                            <span class="title"><?php echo app('translator')->getFromJson('home.pr_qty'); ?>: </span>
                            <?php if($ctsp['qty_product'] == 0): ?>
                            <span class="status"><?php echo app('translator')->getFromJson('home.temporarily'); ?></span>
                            <?php else: ?>
                            <span class="status"><?php echo $ctsp['qty_product']; ?></span>
                            <?php endif; ?>
                        </div>
                        <p class="price"><?php echo number_format($ctsp['price_new'],0,",","."); ?> đ
                            <?php if($ctsp['price_old'] != 0): ?>
                                <span class="price_old"><?php echo number_format($ctsp['price_old'],0,",","."); ?> đ</span>
                                <?php else: ?>
                                <span></span>
                            <?php endif; ?>
                        </p>
                        <div class="product-icon-container">
                            <div class="product-icon-container">
                                <a href="<?php echo route('add.cart',$ctsp->id); ?>"  title="Thêm giỏ hàng" class="add-cart"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.desc_pr'); ?></h3>
                </div>
                <?php if(App::isLocale('vn')): ?>
                <div class="section-detail">
                    <p><?php echo $ctsp['content']; ?></p>
                </div>
                <?php else: ?>
                    <div class="section-detail">
                        <p><?php echo $ctsp['content_en']; ?></p>
                    </div>
                <?php endif; ?>
                <div id="like-fb" class="cleafix">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>
                <div class="component_rating" style="margin-bottom: 20px">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.review'); ?> &amp; <?php echo app('translator')->getFromJson('home.comment'); ?></h3>
                    <div class="component_rating_content" style="display: flex;align-items: center;border-radius: 5px;border: 1px solid #dedede;">
                        <div class="rating_item" style="width: 20%;position: relative;">
                            <span class="fa fa-star" style="font-size: 100px;color:#ff9705;display: block;margin: 0px auto;text-align: center;"></span>
                            <b class="number-star"><?php echo e($ageDetail); ?></b>
                        </div>
                        <div class="list_rating" style="width: 60%;padding: 20px">
                            <?php $__currentLoopData = $arrayRatings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $itemAge = round(($item['total'] / $ctsp->product_total_rating) *100,0);
                                    ?>
                                <div class="item_rating" style="display: flex;align-items: center;">
                                    <div style="width:10%;font-size: 14px;">
                                        <?php echo $key; ?><span class="fa fa-star"></span>
                                    </div>
                                    <div style="width:70%;margin: 0 20px;">
                                        <span style="width: 100%;height: 8px;display: block;border:1px solid #dedede;border-radius: 5px;background-color:#dedede "><b style="width: <?php echo $itemAge; ?>%;background-color: #f25800;display: block;height: 100%;border-radius: 5px;"></b></span>
                                    </div>
                                    <div style="width:20%">
                                        <a href=""><?php echo $item['total']; ?> <?php echo app('translator')->getFromJson('home.review'); ?> </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="submit-review">
                            <a href="#" class="js_rating_action"><?php echo app('translator')->getFromJson('home.submit_review'); ?></a>
                        </div>
                    </div>
                    <?php
                        $listRatingText= [
                            1 => 'Không thích',
                            2 => 'Tạm được',
                            3 => 'Bình thường',
                            4 => 'Rất tốt',
                            5 => 'Tuyệt vời',
                        ];
                    ?>
                    <div class="form_rating hide">
                        <div style="display: flex;margin-top: 15px;font-size: 15px;" >
                            <p style="margin-bottom: 0"><?php echo app('translator')->getFromJson('home.select_review'); ?></p>
                            <span style="margin: 0 15px" class="list_start">
                                <?php for($i = 1;$i <= 5; $i++): ?>
                                    <i class="fa fa-star" data-key=<?php echo $i; ?>></i>
                                <?php endfor; ?>
                            </span>
                            <span class="list_text"><?php echo app('translator')->getFromJson('home.good'); ?></span>
                            <input type="hidden" name="" value="" class="number_rating">
                        </div>
                        <div class="row" style="margin-top: 15px;"><br>
                            <div class="span6">
                                <textarea id="emojionearea1" style="height: 65px;" name="" class="form-control ra_content" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div style="margin-top: 15px;">
                            <?php if(Auth::check()): ?>
                            <a href="<?php echo route('post.save.products',$ctsp->id); ?>" class="js_rating_product" style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px;">Gửi đánh giá</a>
                            <?php else: ?>
                            <a href="<?php echo url('dang-nhap'); ?>" onclick="return confirm_delete('Bạn cần phải đăng nhập trước khi gửi đánh giá!')" style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px;">Gửi đánh giá</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                    <div class="component_list_rating">
                        <?php if(isset($danhgia)): ?>
                            <?php $__currentLoopData = $danhgia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rating_item" style="margin: 10px 0">
                                <div>
                                    <span style="color: #333;font-weight: bold;text-transform: capitalize;"><?php echo e(isset($item->user->fullname)? $item->user->fullname : ''); ?></span>
                                    <a href="" style="color:#2ba832"><i class="fa fa-check-circle-o"></i> Đã đánh giá tại website</a>
                                </div>
                                <p style="margin-bottom: 0">
                                    <span class="pro_rating">
                                        <?php for($i = 1; $i <=5; $i++): ?>
                                        <i class="fa fa-star  <?php echo e($i <= $item->number ? 'active' : ''); ?>" ></i>
                                        <?php endfor; ?>
                                    </span>
                                    <span><?php echo e($item->content); ?></span>
                                </p>
                                <div>
                                    <span><i class="fa fa-clock"></i><?php echo e($item->created_at); ?></span>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title"><?php echo app('translator')->getFromJson('home.pr_same'); ?></h3>
                </div>
                <div class="section-detail">
                    <?php if(isset($product_cate_same)): ?>
                    <ul class="list-item">
                        <?php $__currentLoopData = $product_cate_same; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <?php
                            $date = date("Y-m-d");
                            $week = strtotime(date("Y-m-d",strtotime($item['created_at']))."+1 week");
                            $datediff = $week - (strtotime($date));
                            $labelnew = "";
                            if (floor($datediff / (60 * 60 * 24)) > 0 && floor($datediff / (60 * 60 * 24)) <= 7) {
                                $labelnew = "block2-labelnew";
                            }
                            ?>
                            <p class="<?php echo $labelnew; ?>">
                            </p>
                            <a href="<?php echo url('ctsp',[$item['id'],$item['alias']]); ?>" title="" class="thumb">
                                <img src="<?php echo e(asset('resources/upload/product/'.$item['image'])); ?>">
                            </a>
                            <a href="<?php echo url('ctsp',[$item['id'],$item['alias']]); ?>" title="" class="product-name"><?php echo $item['product_name']; ?></a>
                            <div class="price">
                                <span class="new"><?php echo number_format($item['price_new'],0,",","."); ?> đ</span>
                                <?php if($item['price_old'] != 0): ?>
                                <span class="old"><?php echo number_format($item['price_old'],0,",","."); ?> đ</span>
                                <?php else: ?>
                                <?php endif; ?>
                            </div>
                            <div class="action clearfix">
                                <div class="product-icon-container">
                                    <a href="<?php echo route('add.cart',$item['id']); ?>"  title="Thêm giỏ hàng" class="add-cart"><?php echo app('translator')->getFromJson('home.add_to_cart'); ?></a>
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

<?php $__env->startSection('script'); ?>
    <script>
        $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
        $(function(){
            let listStart = $(".list_start .fa");
            listRatingText = {
                1 : 'Không thích',
                2 : 'Tạm được',
                3 : 'Bình thường',
                4 : 'Tốt',
                5 : 'Tuyệt vời',
                }
            listStart.mouseover(function(){
                let $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active')

                $(".number_rating").val(number);
                $.each(listStart, function(key,value){
                    if( key + 1  <= number){
                        $(this).addClass('rating_active')
                    }
                });

                $(".list_text").text('').text(listRatingText[number]).show();
            });

            $(".js_rating_action").click(function(event){
                event.preventDefault();

                if($(".form_rating").hasClass('hide')){
                    $(".form_rating").addClass('active').removeClass('hide')
                }else{
                    $(".form_rating").addClass('hide').removeClass('active')
                }
            })

            $(".js_rating_product").click(function(e){
                e.preventDefault();
                let content = $(".ra_content").val();
                let number = $(".number_rating").val();
                let url = $(this).attr('href');
                if(content && number){
                    $.ajax({
                          url: url,
                          method: 'POST',
                          data:{number: number, r_content: content},
                        success:function (result) {
                            console.log(result);
                            if(result.level == 1)
                            {
                                alert("Gửi đánh giá thành công");
                                location.reload();
                            }
                        }
                    });
                }
            });
        });
        // function updateItem(id)
        // {
        //     sl = $(".sl_" + id).val();
        //     sl++;
        //     alert(sl++);
        // }
        // function updateItem1(id)
        // {
        //     sl = $(".sl_" + id).val();
        //     sl--;
        // }
        $(document).ready(function() {
            $("#emojionearea1").emojioneArea({
                pickerPosition: "bottom",
                tonesStyle: "bullet",
                search:false,
                events: {
                    keyup: function (editor, event) {
                        console.log(editor.html());
                        console.log(this.getText());
                    }
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\ismart\resources\views/pages/product/detail_product.blade.php ENDPATH**/ ?>