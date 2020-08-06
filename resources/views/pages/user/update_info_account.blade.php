@extends('layout.index')
@section('content')
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
        .update_account{
            width: 285px;
            margin: 0 auto;
            padding: 30px 0;
        }
        .update_account .form-group {
            margin-bottom: 20px;
        }
        .update_account form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .update_account h2 {
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }
        .update_account .form-control {
            min-height: 38px;
            box-shadow: none !important;
        }
        .update_account .input-group-addon {
            max-width: 42px;
            text-align: center;
        }
        .update_account .btn{
            font-size: 16px;
            font-weight: bold;
            background: #19aa8d;
            border: none;
            min-width: 140px;
        }
        .update_account .btn:hover, .update_account .btn:focus {
            background: #179b81;
            outline: none;
        }
        .update_account .fa {
            font-size: 21px;
        }
        .update_account .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }
        .update_account.fa {
            font-size: 21px;
        }
        .update_account .fa-paper-plane {
            font-size: 18px;
        }
    </style>

    <div class="container">
        <div class="row profile">
            @include('layout/sidebar_account')
            <div class="col-md-9">
                <div class="profile-content">
                    <form action="{{ route('post.info') }}" id="info_customer" class="update_account" method="post" enctype="multipart/form-data">
                        @csrf
                        <h2 style="font-size: 20px;">@lang('home.info_account')</h2><br>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
                                <input type="text" class="form-control" name="display_name" value="{!! old('display_name'),Auth::user()->fullname !!}" placeholder="@lang('home.fullname')">
                            </div>
                            <span class="error fullname_error" style="display: none"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                <input type="text" class="form-control" name="username" value="{!! Auth::user()->username !!}" placeholder="@lang('home.username')" readonly="readonly">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control" name="user_email" value="{!! old('user_email'),Auth::user()->email  !!}" placeholder="@lang('home.email')">
                            </div>
                            <span class="error email_error" style="display: none"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                                <input type="text" class="form-control" name="user_address" value="{!! old('user_address'),Auth::user()->address  !!}" placeholder="@lang('home.address')">
                            </div>
                            <span class="error address_error" style="display: none"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                <input type="text" class="form-control" name="user_tel" value="{!! old('user_tel'),Auth::user()->phone  !!}" placeholder="@lang('home.phone')">
                            </div>
                            <span class="error phone_error" style="display: none"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-venus-double"></i></span>
                                <select class="form-control" name="sltgender" title="@lang('home.title')">
                                    <option @if(Auth::user()->gender == 'Nam')
                                            {!! "selected = selected" !!} @endif
                                            value="Nam">@lang('home.male')
                                    </option>
                                    <option @if(Auth::user()->gender == 'Nữ')
                                            {!! "selected = selected" !!} @endif
                                            value="Nữ">@lang('home.female')
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                                <input type="file" class="form-control" name="image">
                                <input type="hidden" name="img_current" value="{!! Auth::user()->avatar !!}">
                            </div>
                        </div>
                        @if(isset(Auth::user()->avatar))
                        <div class="img">
                            <img style="width: 100px!important;height: 75px!important;" src="{{ asset('resources/upload/user/'.Auth::user()->avatar) }}" alt="">
                        </div><br>
                        @else
                        @endif
                        <div class="form-group">
                            <button type="submit" id="update_customer" class="btn btn-primary btn-lg">@lang('home.update')</button>
                        </div>
                        <div class="form-group" >
                            <span class="error errorAll" style="display: none"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



