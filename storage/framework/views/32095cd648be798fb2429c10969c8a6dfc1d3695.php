<?php $__env->startSection('content'); ?>
    <style type="text/css">
        body{
            background-image: url('<?php echo e(asset('public/images/544750.jpg')); ?>');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }
        .form-control, .form-control:focus, .input-group-addon {
            border-color: #e1e1e1;
        }
        .form-control, .btn {
            border-radius: 3px;
        }
        .signup-form {
            width: 390px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .signup-form h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .signup-form hr {
            margin: 0 -30px 20px;
        }
        .signup-form .form-group {
            margin-bottom: 20px;
        }
        .signup-form label {
            font-weight: normal;
            font-size: 13px;
        }
        .signup-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }
        .signup-form .input-group-addon {
            max-width: 42px;
            text-align: center;
        }
        .signup-form input[type="checkbox"] {
            margin-top: 2px;
        }
        .signup-form .btn{
            font-size: 16px;
            font-weight: bold;
            background: #19aa8d;
            border: none;
            min-width: 140px;
        }
        .signup-form .btn:hover, .signup-form .btn:focus {
            background: #179b81;
            outline: none;
        }
        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }
        .signup-form a:hover {
            text-decoration: none;
        }
        .signup-form form a {
            color: #19aa8d;
            text-decoration: none;
        }
        .signup-form form a:hover {
            text-decoration: underline;
        }
        .signup-form .fa {
            font-size: 21px;
        }
        .signup-form .fa-paper-plane {
            font-size: 18px;
        }
        .signup-form .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }
    </style>
    <div class="signup-form">
        <form action="" id="form-bs-register" method="post">
            <?php echo csrf_field(); ?>
            <h2 style="font-size: 20px;text-align: center;"><?php echo app('translator')->getFromJson('home.register_menu'); ?></h2><br>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                    <input type="text" class="form-control" name="fullname" value="<?php echo old('fullname'); ?>" placeholder="<?php echo app('translator')->getFromJson('home.fullname'); ?>">
                </div>
                <span class="error fullname_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                    <input type="text" class="form-control" name="username" value="<?php echo old('username'); ?>" placeholder="<?php echo app('translator')->getFromJson('home.username'); ?>">
                </div>
                <span class="error username_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="<?php echo app('translator')->getFromJson('home.password'); ?>">
                </div>
                <span class="error password_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                    <i class="fa fa-check"></i>
                    </span>
                    <input type="password" class="form-control" name="confirm_password" placeholder="<?php echo app('translator')->getFromJson('home.confirm_password'); ?>">
                </div>
                <span class="error confirm_password_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" name="email" value="<?php echo old('email'); ?>" placeholder="<?php echo app('translator')->getFromJson('home.email'); ?>">
                </div>
                <span class="error email_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                    <input type="text" class="form-control" name="address" value="<?php echo old('address'); ?>" placeholder="<?php echo app('translator')->getFromJson('home.address'); ?>">
                </div>
                <span class="error address_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                    <input type="text" class="form-control" id="tel" name="phone" value="<?php echo old('phone'); ?>" placeholder="<?php echo app('translator')->getFromJson('home.phone'); ?>">
                </div>
                <span class="error phone_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-venus-double"></i></span>
                    <select class="form-control" name="gender" title="Giới tính">
                        <option value="">-- <?php echo app('translator')->getFromJson('home.sl_gender'); ?> --</option>
                        <option value="Nam"><?php echo app('translator')->getFromJson('home.male'); ?></option>
                        <option value="Nữ"><?php echo app('translator')->getFromJson('home.female'); ?></option>
                    </select>
                </div>
                <span class="error gender_error" style="display: none"></span>
            </div>

            <div class="form-group" id="captcha">
                <div class="captcha-image">
                    <?php echo captcha_img('flat'); ?>

                </div>
                <div class="captcha_icon_refresh">
                    <a href="javascript:void(0);" onclick="refreshCaptcha()" id="captcha_refresh">
                        <img class="icon_refresh" src="<?php echo e(asset('public/images/refresh.png')); ?>">
                    </a>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                    <input type="text" class="form-control" name="captcha" id="captcha" placeholder="<?php echo app('translator')->getFromJson('home.img_captcha'); ?>">
                </div>
                <span class="error captcha_error" style="display: none"></span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg"><?php echo app('translator')->getFromJson('home.sign_up'); ?></button>
            </div>
            <div class="text-center"><?php echo app('translator')->getFromJson('home.exist_account'); ?> <a href="<?php echo e(url('dang-nhap')); ?>"><?php echo app('translator')->getFromJson('home.login_here'); ?></a></div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            // Restricts input for the given textbox to the given inputFilter.
            function setInputFilter(textbox, inputFilter) {
                ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                    textbox.addEventListener(event, function() {
                        if (inputFilter(this.value)) {
                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                        } else if (this.hasOwnProperty("oldValue")) {
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        }
                    });
                });
            }

            setInputFilter(document.getElementById("tel"), function(value) {
                return /^\d*$/.test(value); });
        });
        function refreshCaptcha(){
            $.ajax({
                url:'<?php echo e(route('get.refresh')); ?>',
                type:'get',
                success:function(data){
                    $('.captcha-image').html(data);
                }
            });
        }

    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/pages/user/register.blade.php ENDPATH**/ ?>