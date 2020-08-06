<?php $__env->startSection('content'); ?>
    <style>
        body {
            background: #F1F3FA;
        }

        /* Profile container */
        .profile {
            margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
            padding: 20px 0 10px 0;
            background: #fff;
        }

        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 50%;
            height: 50%;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }

        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-job {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        .profile-usermenu {
            margin-top: 30px;
        }

        .profile-usermenu ul li {
            border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
            border-bottom: none;
        }

        .profile-usermenu ul li a {
            color: #93a3b5;
            font-size: 14px;
            font-weight: 400;
        }

        .profile-usermenu ul li a i {
            margin-right: 8px;
            font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
            background-color: #fafcfd;
            color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
            border-bottom: none;
        }

        .profile-usermenu ul li.active a {
            color: #5b9bd1;
            background-color: #f6f9fb;
            border-left: 2px solid #5b9bd1;
            margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
            padding: 20px;
            background: #fff;
            min-height: 460px;
        }
        .form-control, .form-control:focus, .input-group-addon {
            border-color: #e1e1e1;
        }
        .form-control, .btn {
            border-radius: 3px;
        }
        /*.form-group{*/
        /*    width: 55%;*/
        /*}*/
        .change_password_bs{
            width: 285px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .change_password_bs .form-group {
            margin-bottom: 20px;
        }
        .change_password_bs form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .change_password_bs h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .change_password_bs .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }
        .change_password_bs .input-group-addon {
            max-width: 42px;
            text-align: center;
        }
        .change_password_bs .btn{
            font-size: 16px;
            font-weight: bold;
            background: #19aa8d;
            border: none;
            min-width: 140px;
        }
        .change_password_bs .btn:hover, .change_password_bs .btn:focus {
            background: #179b81;
            outline: none;
        }
        .change_password_bs .fa {
            font-size: 21px;
        }
        .change_password_bs .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }
    </style>

    <div class="container">
        <div class="row profile">
            <?php echo $__env->make('layout/sidebar_account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-md-9">
                <div class="profile-content">
                    <form class="change_password_bs" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" id="password_old" name="password_old" placeholder="<?php echo app('translator')->getFromJson('home.password_old'); ?>">
                            </div>
                            <span class="error password_old_error" style="display: none"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                <input type="password" class="form-control" id="password_new" name="password_new" placeholder="<?php echo app('translator')->getFromJson('home.password_new'); ?>">
                            </div>
                            <span class="error password_new_error" style="display: none"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                            </span>
                                <input type="password" class="form-control" name="password_confirm" placeholder="<?php echo app('translator')->getFromJson('home.confirm_password'); ?>">
                            </div>
                            <span class="error password_confirm_error" style="display: none"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg"><?php echo app('translator')->getFromJson('home.change_pw'); ?></button>
                        </div>
                        <div class="form-group" >
                            <span class="error errorAll" style="display: none"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\ismart\resources\views/pages/user/change_pass.blade.php ENDPATH**/ ?>