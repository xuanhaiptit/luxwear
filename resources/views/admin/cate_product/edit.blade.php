@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý danh mục sản phẩm</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li><a href="{{ route('get.list.cate_product') }}"> Cate Product</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chỉnh sửa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="txtcatename">Tên danh mục</label>
                                <input type="text" class="form-control" value="{!! $cate->name !!}" name="txtcatename" id="txtcatename">
                                <span class="error">{!! $errors->first('txtcatename') !!}</span>
                            </div>
                            <div class="form-group">
                                <label for="txtcatename_en">Tên danh mục (en)</label>
                                <input type="text" class="form-control" value="{!! $cate->name_en !!}" name="txtcatename_en" id="txtcatename_en">
                                <span class="error">{!! $errors->first('txtcatename_en') !!}</span>
                            </div>
                            <div class="form-group">
                                <label for="txtkeyword">Keyword</label>
                                <input type="text" class="form-control" value="{!! $cate->keyword !!}" name="txtkeyword" id="txtkeyword">
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                        <button style="margin-left: 15px;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

