<?php $__env->startSection('content'); ?>

<style type="text/css">
    body{
        background-image: url('<?php echo e(asset('public/images/544750.jpg')); ?>');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
     }
    .login-form {
        width: 385px;
        margin: 30px auto;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
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
<div class="login-form">
    <form action="" id="form-bs-login" method="post">
        <?php echo csrf_field(); ?>
        <h2 class="text-center" style="font-size: 20px"><?php echo app('translator')->getFromJson('home.login_menu'); ?></h2>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo app('translator')->getFromJson('home.username'); ?>">
            </div>
            <span class="error username_error" style="display: none"></span>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo app('translator')->getFromJson('home.password'); ?>">
            </div>
            <span class="error password_error" style="display: none"></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary login-btn btn-block"><?php echo app('translator')->getFromJson('home.sign_in'); ?></button>
        </div>
        <div class="clearfix">

            <a href="<?php echo url('quen-mat-khau'); ?>" class="pull-right"><?php echo app('translator')->getFromJson('home.forgot_pw'); ?>?</a>
        </div>
        <div class="or-seperator"><i><?php echo app('translator')->getFromJson('home.or'); ?></i></div>
        <p class="text-center"><?php echo app('translator')->getFromJson('home.login_social'); ?></p>
        <div class="text-center social-btn">
            <a href="<?php echo e(url('facebook-login')); ?>" class="btn btn-primary"><i class="fa fa-facebook"></i>&nbsp; Facebook</a>
            <a href="#" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp; Google</a>
        </div><br>
        <p class="text-center text-muted small"><?php echo app('translator')->getFromJson('home.not_account'); ?> <a href="<?php echo e(url('dang-ky')); ?>"><?php echo app('translator')->getFromJson('home.sign_up_here'); ?></a></p>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Online\web\ismart\resources\views/pages/user/login.blade.php ENDPATH**/ ?>