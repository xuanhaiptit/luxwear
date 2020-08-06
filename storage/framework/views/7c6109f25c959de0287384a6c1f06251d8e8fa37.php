<div id="footer-wp">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title"><?php echo app('translator')->getFromJson('home.ismart'); ?></h3>
                <p class="desc"><?php echo app('translator')->getFromJson('home.ismart_title'); ?></p>
                <div id="payment">
                    <div class="thumb">
                        <img src="public/images/img-foot.png" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title"><?php echo app('translator')->getFromJson('home.store'); ?></h3>
                <ul class="list-item">
                    <li>
                        <p><?php echo app('translator')->getFromJson('home.address_footer'); ?></p>
                    </li>
                    <li>
                        <p><?php echo app('translator')->getFromJson('home.phone_footer'); ?></p>
                    </li>
                    <li>
                        <p><?php echo app('translator')->getFromJson('home.email_footer'); ?></p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title"><?php echo app('translator')->getFromJson('home.policy'); ?></h3>
                <ul class="list-item">
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.regulation_policy'); ?></a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.warranty_policy'); ?></a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.assembly_policy'); ?></a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.delivery'); ?></a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title"><?php echo app('translator')->getFromJson('home.news'); ?></h3>
                <p class="desc"><?php echo app('translator')->getFromJson('home.promotion'); ?></p>
                <div id="form-reg">
                </div>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright"><?php echo app('translator')->getFromJson('home.college'); ?></p>
        </div>
    </div>
</div>
</div>
<div id="menu-respon">
    <?php if(Auth::check()): ?>
        <span class="logo"><?php echo app('translator')->getFromJson('home.hello'); ?>! <strong><?php echo e(Auth::User()->fullname); ?></strong></span>
    <?php else: ?>
        <span class="logo"><?php echo app('translator')->getFromJson('home.ismart'); ?></span>
    <?php endif; ?>
    <div id="menu-respon-wp">
        <?php
            $cate_product = DB::table('cate_product')->select('*')->get()->toArray();
        ?>
        <ul class="" id="main-menu-respon">
            <?php $__currentLoopData = $cate_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="#" title><?php echo $item->name; ?></a>
                <ul class="sub-menu">
                    <?php
                        $cate_product_detail = DB::table('cate_product_detail')->where('parent_id',$item->id)->where('status',1)->get()->toArray();
                    ?>
                    <?php $__currentLoopData = $cate_product_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo url('loaisanpham',[$product_detail->id,$product_detail->alias]); ?>" title=""><?php echo $product_detail->name; ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo route('get.blog'); ?>" title=""><?php echo app('translator')->getFromJson('home.blog_menu'); ?></a>
            </li>
            <li>
                <a href="<?php echo route('get.gioithieu'); ?>" title=""><?php echo app('translator')->getFromJson('home.introduce_menu'); ?></a>
            </li>
            <li>
                <a href="<?php echo url('lien-he-mobile'); ?>" title=""><?php echo app('translator')->getFromJson('home.contact_menu'); ?></a>
            </li>
            <?php if(Auth::check()): ?>
                <li>
                    <a href="<?php echo url('thong-tin-ca-nhan/'.Auth::user()['id']); ?>" title="<?php echo app('translator')->getFromJson('home.info_account'); ?>"><?php echo app('translator')->getFromJson('home.info_account'); ?></a>
                </li>
                <li>
                    <a href="<?php echo e(url('lichsugiaodich/'.Auth::user()['id'])); ?>"><?php echo app('translator')->getFromJson('home.history'); ?></a>
                </li>
                <li>
                    <a class="logout" href="<?php echo e(url('dang-xuat')); ?>" title=""><?php echo app('translator')->getFromJson('home.logout_menu'); ?></a>
                </li>
            </div>
            <?php else: ?>
            <li>
                <a href="<?php echo e(url('dang-nhap')); ?>" title=""><?php echo app('translator')->getFromJson('home.login_menu'); ?></a>
            </li>
            <li>
                <a href="<?php echo e(url('dang-ky')); ?>" title=""><?php echo app('translator')->getFromJson('home.register_menu'); ?></a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div id="btn-top"><img src="<?php echo url('public/images/icon-to-top.png'); ?>" alt=""/></div>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    $(document).ready(function(){
        $('#contact_form_modal').click(function(e){
            e.preventDefault();
            $('#form-contact-modal').modal('show');
            $('#form_contact').click(function(){
                $.ajax({
                    url:'<?php echo e(route('post.lien-he')); ?>',
                    type:'post',
                    dataType:'json',
                    data: $(this).serialize(),
                    success:function(data){
                        console.log(data);
                        if(data.error == true){
                            $('.error').hide();
                            if(data.message.name_contact != undefined){
                                $('.name_contact_error').show().html(data.message.name_contact);
                            }
                            if(data.message.email_contact != undefined){
                                $('.email_contact_error').show().html(data.message.email_contact);
                            }
                            if(data.message.message != undefined){
                                $('.email_message').show().html(data.message.message);
                            }
                        }else{
                            swal({
                                title: "Thành công",
                                text: data.message,
                                type: "success",
                                timer: 2000
                            }).then(function() {
                                window.location = "/";
                            });
                        }
                    }
                });
            });
        });
    });
</script>
<?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/layout/footer.blade.php ENDPATH**/ ?>