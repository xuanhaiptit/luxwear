<?php $__env->startSection('content'); ?>

    <style type="text/css">
        .forgot_password_form {
            width: 385px;
            margin: 30px auto;
        }
        .forgot_password_form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 3px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .forgot_password_form h2 {
            margin: 0 0 15px;
        }
        .form-control, .login-btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .input-group-addon .fa {
            font-size: 18px;
        }
        .login-btn {
            font-size: 15px;
            font-weight: bold;
        }
        .social-btn .btn {
            border: none;
            margin: 10px 3px 0;
            opacity: 1;
        }
        .social-btn .btn:hover {
            opacity: 0.9;
        }
        .social-btn .btn-primary {
            background: #507cc0;
        }
        .social-btn .btn-info {
            background: #64ccf1;
        }
        .social-btn .btn-danger {
            background: #df4930;
        }
        .or-seperator {
            margin-top: 20px;
            text-align: center;
            border-top: 1px solid #ccc;
        }
        .or-seperator i {
            padding: 0 10px;
            background: #f7f7f7;
            position: relative;
            top: -11px;
            z-index: 1;
        }
    </style>
    <div id="main-content-wp" class="clearfix category-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="<?php echo url('/'); ?>" title=""><?php echo app('translator')->getFromJson('home.home_menu'); ?></a>
                        </li>
                        <li>
                            <a href="" title=""><?php echo app('translator')->getFromJson('home.forgot_pw'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="forgot_password_form">
                <form action="" id="form_forgot_password" method="post">
                    <div class="form-group" style="text-align: center">
                        <?php if(Session::has('success')): ?>
                            <span class="success" style="color:#0abc0a">
                                <?php echo Session::get('success'); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo app('translator')->getFromJson('home.provide_email'); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary login-btn btn-block"><?php echo app('translator')->getFromJson('home.forgot_pw'); ?></button>
                    </div>
                    <div class="form-group" style="text-align: center">
                        <?php if(Session::has('danger')): ?>
                            <span class="error">
                                <?php echo Session::get('danger'); ?>

                            </span>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/pages/user/forgot_password.blade.php ENDPATH**/ ?>