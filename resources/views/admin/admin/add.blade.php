@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Thông tin tài khoản</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li class="active">Add</li>
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
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fullname">Tên hiển thị</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" value="{{ old('fullname') }}">
                            <span class="error">{!! $errors->first('fullname') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ old('fullname') }}">
                            <span class="error">{!! $errors->first('username') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span class="error">{!! $errors->first('password') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                            <span class="error">{!! $errors->first('confirm_password') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                            <span class="error">{!! $errors->first('email') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <input type="file" name="fimage" id="exampleInputFile">
                            <span class="error">{!! $errors->first('fimage') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="tel">Số điện thoại</label>
                            <input type="tel" class="form-control" name="phone" pattern="(0[3|7|9|8|5])+([0-9]{8})\b" value="{{ old('phone') }}" maxlength="10" id="tel">
                            <span class="error">{!! $errors->first('phone') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}">
                            <span class="error">{!! $errors->first('address') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="sltgender">Giới tính</label>
                            <select class="form-control" name="sltgender" id="sltgender">
                                <option value="">-- Chọn giới tính --</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                            <span class="error">{!! $errors->first('sltgender') !!}</span>
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


