<div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <ul id="main-menu" class="clearfix" style="float:left;">
                                <li>
                                    <a class="nav-link" href="<?php echo e(url('locale/vn')); ?>" >Việt Nam</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="<?php echo e(url('locale/en')); ?>" >English</a>
                                </li>
                            </ul>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li class="<?php echo e(Request::is('trang-chu') ? 'actived' : ''); ?>">
                                        <a href="<?php echo url('trang-chu'); ?>"  title=""><?php echo app('translator')->getFromJson('home.home_menu'); ?></a>
                                    </li>
                                    <li class="<?php echo e(Request::is('bai-viet') ? 'actived' : ''); ?>">
                                        <a href="<?php echo url('bai-viet'); ?>" title=""><?php echo app('translator')->getFromJson('home.blog_menu'); ?></a>
                                    </li>
                                    <li class="<?php echo e(Request::is('gioi-thieu') ? 'actived' : ''); ?>">
                                        <a href="<?php echo url('gioi-thieu'); ?>" title=""><?php echo app('translator')->getFromJson('home.introduce_menu'); ?></a>
                                    </li>
                                    <li>
                                        <a id="contact_form_modal" href="" ><?php echo app('translator')->getFromJson('home.contact_menu'); ?></a>
                                    </li>
                                    <li>
                                    <?php if(Auth::check()): ?>
                                    <div id="user-login" class="dropdown dropdown-extended fl-right">
                                        <button style="margin-top: 3px;" class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <h3 id="account" class="fl-right"><?php echo app('translator')->getFromJson('home.hello'); ?> <strong><?php echo e(Auth::User()->fullname); ?></strong></h3>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class="user_login"><a href="<?php echo url('thong-tin-ca-nhan'); ?>"><?php echo app('translator')->getFromJson('home.account'); ?></a></li>
                                            <li><a href="<?php echo e(url('lichsugiaodich/'.Auth::user()->id)); ?>"><?php echo app('translator')->getFromJson('home.history'); ?></a></li>
                                            <li><a id="logout_header" href="<?php echo e(url('dang-xuat')); ?>" title=""><?php echo app('translator')->getFromJson('home.logout_menu'); ?></a></li>
                                        </ul>
                                    </div>
                                    <?php else: ?>
                                        <div id="action-user" class="fl-right">
                                            <div id="not-signed">
                                                <a href="<?php echo e(route('dang-nhap')); ?>" class="<?php echo e(Request::is('dang-nhap') ? 'actived' : ''); ?>" title="" id="login"><?php echo app('translator')->getFromJson('home.login_menu'); ?></a>
                                                <a href="<?php echo e(route('dang-ky')); ?>" class="<?php echo e(Request::is('dang-ky') ? 'actived' : ''); ?>" title="" id="reg"><?php echo app('translator')->getFromJson('home.register_menu'); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <form id="form_contact" action="" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="modal fade" id="form-contact-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                                <i style="color: #9e9e9e !important;font-size: 30px;" class="fa fa-user" aria-hidden="true"></i>
                                                <input type="text" name="name_contact" id="name_contact" class="form-control validate" placeholder="Your name">
                                                <span class="error name_contact_error" style="display: none;color:red"></span>
                                            </div>

                                            <div class="md-form mb-5">
                                                <i style="color: #9e9e9e !important;font-size: 30px;" class="fa fa-envelope" aria-hidden="true"></i>
                                                <input type="email" name="email_contact" id="email_contact" class="form-control validate" placeholder="Your email">
                                                <span class="error email_contact_error" style="display: none;color:red"></span>
                                            </div>

                                            <div class="md-form">
                                                <i style="color: #9e9e9e !important;font-size: 30px;" class="fa fa-pencil" aria-hidden="true"></i>
                                                <textarea type="text" name="message" id="emojionearea_contact" class="md-textarea form-control" rows="30" cols="4" style="height: 120px" placeholder="Your message"></textarea>
                                                <span class="error email_message" style="display: none;color:red"></span>
                                            </div>

                                        </div>
                                        <div class="modal-footer d-flex justify-content-center" style="text-align: center!important;">
                                            <button type="button" id="send_contact" class="btn btn-unique">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <style>
                        #product_list{
                            border-radius: 2px;
                            margin-top: -3px;
                            position: absolute;
                            width: 401px;
                            z-index: 9999999;
                        }
                        .dropdown-menu>li>a {
                             padding: 0px 0px!important;
                        }
                    </style>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="<?php echo e(url('/')); ?>" title="" id="logo" class="fl-left"><img src="<?php echo url('public/images/logo.png'); ?>"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="GET" action="<?php echo e(url('search')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="keyword" id="s" placeholder="<?php echo app('translator')->getFromJson('home.search_title'); ?>" required="">
                                    <button type="submit" id="sm-s"><?php echo app('translator')->getFromJson('home.search'); ?></button>
                                </form>
                                <div id="product_list">
                                </div>
                            </div>

                            <script>
                                $(document).ready(function(){

                                    $('#s').keyup(function(){
                                        var keyword = $(this).val();
                                        if(keyword != '')
                                        {
                                            var _token = $('input[name="_token"]').val();
                                            $.ajax({
                                                url:"<?php echo e(route('autocomplete.fetch')); ?>",
                                                method:"POST",
                                                data:{keyword:keyword, _token:_token},
                                                success:function(data){
                                                    $('#product_list').fadeIn();
                                                    $('#product_list').html(data);
                                                }
                                            });
                                        }
                                    });

                                    $(document).on('click', 'li', function(){
                                        $('#s').val($(this).text());
                                        $('#product_list').fadeOut();
                                    });

                                });
                            </script>


                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title"><?php echo app('translator')->getFromJson('home.advisory'); ?></span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="<?php echo route('get.list.cart'); ?>" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num"><?php echo Cart::count();; ?></span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php echo Cart::count();; ?></span>
                                    </div>
                                    <div id="dropdown">

                                        <p class="desc"><?php echo app('translator')->getFromJson('home.have'); ?> <span><?php echo Cart::count();; ?> <?php echo app('translator')->getFromJson('home.product'); ?></span> <?php echo app('translator')->getFromJson('home.in_cart'); ?></p>
                                        <ul class="list-cart">
                                            <?php if(!empty(Cart::content())): ?>
                                            <?php $cart = Cart::content(); ?>
                                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="<?php echo e(asset('resources/upload/product/'.$item->options->img)); ?>" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name"><?php echo $item->name; ?></a>
                                                    <p class="price"><?php echo number_format($item->price,0,",","."); ?> đ</p>
                                                    <p class="qty"><?php echo app('translator')->getFromJson('home.qty'); ?>: <span><?php echo $item->qty; ?></span></p>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left"><?php echo app('translator')->getFromJson('home.total'); ?>:</p>
                                            <p class="price fl-right"><?php echo e(Cart::subtotal(0,',','.')); ?> đ</p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="<?php echo route('get.list.cart'); ?>" title="Giỏ hàng" class="view-cart fl-left"><?php echo app('translator')->getFromJson('home.cart'); ?></a>
                                            <?php if(Auth::check()): ?>
                                            <a href="<?php echo route('get.checkout'); ?>" title="Thanh toán" class="checkout fl-right"><?php echo app('translator')->getFromJson('home.pay'); ?></a>
                                            <?php else: ?>
                                            <a href="<?php echo url('dang-nhap'); ?>" title="Thanh toán" onclick="return confirm_delete('.<?php echo app('translator')->getFromJson('home.nedd_login'); ?>.')" class="checkout fl-right"><?php echo app('translator')->getFromJson('home.pay'); ?></a>
                                            <?php endif; ?>
                                        </dic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php /**PATH E:\xampp\htdocs\ismart\resources\views/layout/header.blade.php ENDPATH**/ ?>