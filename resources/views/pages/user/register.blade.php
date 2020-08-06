@extends('layout.index')
@section('content')
    <style type="text/css">
        body{
            background-image: url('{{ asset('public/images/544750.jpg') }}');
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
            @csrf
            <h2 style="font-size: 20px;text-align: center;">@lang('home.register_menu')</h2><br>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                    <input type="text" class="form-control" name="fullname" value="{!! old('fullname') !!}" placeholder="@lang('home.fullname')">
                </div>
                <span class="error fullname_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                    <input type="text" class="form-control" name="username" value="{!! old('username') !!}" placeholder="@lang('home.username')">
                </div>
                <span class="error username_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="@lang('home.password')">
                </div>
                <span class="error password_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                    <i class="fa fa-check"></i>
                    </span>
                    <input type="password" class="form-control" name="confirm_password" placeholder="@lang('home.confirm_password')">
                </div>
                <span class="error confirm_password_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" name="email" value="{!! old('email') !!}" placeholder="@lang('home.email')">
                </div>
                <span class="error email_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                    <input type="text" class="form-control" name="address" value="{!! old('address') !!}" placeholder="@lang('home.address')">
                </div>
                <span class="error address_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                    <input type="text" class="form-control" id="tel" name="phone" value="{!! old('phone') !!}" placeholder="@lang('home.phone')">
                </div>
                <span class="error phone_error" style="display: none"></span>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-venus-double"></i></span>
                    <select class="form-control" name="gender" title="Giới tính">
                        <option value="">-- @lang('home.sl_gender') --</option>
                        <option value="Nam">@lang('home.male')</option>
                        <option value="Nữ">@lang('home.female')</option>
                    </select>
                </div>
                <span class="error gender_error" style="display: none"></span>
            </div>

            <div class="form-group" id="captcha">
                <div class="captcha-image">
                    {!! captcha_img('flat') !!}
                </div>
                <div class="captcha_icon_refresh">
                    <a href="javascript:void(0);" onclick="refreshCaptcha()" id="captcha_refresh">
                        <img class="icon_refresh" src="{{ asset('public/images/refresh.png') }}">
                    </a>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                    <input type="text" class="form-control" name="captcha" id="captcha" placeholder="@lang('home.img_captcha')">
                </div>
                <span class="error captcha_error" style="display: none"></span>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg">@lang('home.sign_up')</button>
            </div>
            <div class="text-center">@lang('home.exist_account') <a href="{{ url('dang-nhap') }}">@lang('home.login_here')</a></div>
        </form>
    </div>
@endsection
@section('script')
    <script>
        function refreshCaptcha(){
            $.ajax({
                url:'{{ route('get.refresh') }}',
                type:'get',
                success:function(data){
                    $('.captcha-image').html(data);
                }
            });
        }

    </script>
@stop



