@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Thông tin tài khoản</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li class="active">Edit</li>
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
                    <h3 class="box-title">Chỉnh sửa</h3>
                    @if(Auth::guard('admin')->user()->level == 1)
                        <a style="float: right" href="{{ route('get.add.admin') }}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
                    @else
                    @endif
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fullname">Tên hiển thị</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" value="{!! $admin['fullname'] !!}">
                            <span class="error">{!! $errors->first('fullname') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="username" id="username" value="{!! $admin['username'] !!}" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{!! $admin['email'] !!}">
                            <span class="error">{!! $errors->first('email') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <input type="file" name="fimage" id="exampleInputFile">
                            <input type="hidden" name="img_current" value="{!! $admin['avatar'] !!}">
                        </div>
                        <div class="form-group">
                            <img style="width: 100px; height: 100px" src="{{ asset('resources/upload/admin/'.$admin['avatar']) }}">
                        </div>
                        <div class="form-group">
                            <label for="tel">Số điện thoại</label>
                            <input type="tel" class="form-control" name="phone" pattern="(0[3|7|9|8|5])+([0-9]{8})\b" maxlength="10" required="required" id="tel" value="{!! $admin['phone'] !!}">
                            <span class="error">{!! $errors->first('phone') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="{!! $admin['address'] !!}">
                            <span class="error">{!! $errors->first('address') !!}</span>
                        </div>
                        <div class="form-group">
                            <label for="sltgender">Giới tính</label>
                            <select class="form-control" name="sltgender" id="sltgender">
                                <option @if($admin['gender'] == 'Nam')
                                        {!! "selected = selected" !!} @endif
                                        value="Nam">Nam
                                </option>
                                <option @if($admin['gender'] == 'Nữ')
                                        {!! "selected = selected" !!} @endif
                                        value="Nữ">Nữ</option>
                            </select>
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


