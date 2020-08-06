@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý danh mục loại sản phẩm</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li><a href="{{ route('get.list.cate_product_detail') }}"> Cate Product Detail</a></li>
                <li class="active">Add</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="sltcate">Tên danh mục</label>
                                <select class="form-control" name="sltcate" id="sltcate">
                                    @foreach($cate as $item)
                                        <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                                    @endforeach
                                </select>
                                <span class="error">{!! $errors->first('sltcate') !!}</span>
                            </div>
                            <div class="form-group">
                                <label for="txtcat_id">Tên loại sản phẩm</label>
                                <input type="text" class="form-control" value="{!! old('txtname_cate') !!}" name="txtname_cate" id="txtname_cate">
                                <span class="error">{!! $errors->first('txtname_cate') !!}</span>
                            </div>
                            <div class="form-group">
                                <label for="txtcat_id">Tên loại sản phẩm (en)</label>
                                <input type="text" class="form-control" value="{!! old('txtname_cate_en') !!}" name="txtname_cate_en" id="txtname_cate_en">
                                <span class="error">{!! $errors->first('txtname_cate_en') !!}</span>
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
