@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Thông tin tài khoản</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li class="active">Change Password</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
            @endif
            @if(Session::has('danger'))
                <div class="alert alert-danger">
                    {!! Session::get('danger') !!}
                </div>
            @endif
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Đổi mật khẩu</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="pass_old">Mật khẩu cũ</label>
                            <input type="password" class="form-control" name="pass_old" id="pass_old">
                            <span class="error">{!! $errors->first('pass_old') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span class="error">{!! $errors->first('password') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_pass">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" name="confirm_pass" id="confirm_pass">
                            <span class="error">{!! $errors->first('confirm_pass') !!}</span>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection


