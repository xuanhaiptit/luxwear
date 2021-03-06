@extends('admin.layouts.master')
@section('content')
    <form role="form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Quản lý trang</h1>
                <div class="breadcrumb">
                    <button type="submit" class="btn btn-success btn-sm">
                        <span class="glyphicon glyphicon-floppy-save"></span>
                        Lưu[Thêm]
                    </button>
                    <a class="btn btn-danger btn-sm" href="{{ route('get.list.page') }}" role="button">
                        <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
                    </a>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tabs-1">VN</a></li>
                            <li><a data-toggle="tab" href="#tabs-2">EN</a></li>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="tab-content">
                        <div id="tabs-1" class="tab-pane fade in active">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="page_title">Tiêu đề trang (vn)</label>
                                        <input type="text" class="form-control" value="{!! old('page_title') !!}" name="page_title" id="page_title">
                                        <span class="error">{!! $errors->first('page_title') !!}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="desc">Mô tả ngắn (vn)</label>
                                        <textarea name="desc" id="desc" class="ckeditor">{!! old('desc') !!}</textarea>
                                        <span class="error">{!! $errors->first('desc') !!}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Nội dung (vn)</label>
                                        <textarea name="content" id="content" class="ckeditor">{!! old('content') !!}</textarea>
                                        <span class="error">{!! $errors->first('content') !!}</span>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                            </div>

                        </div>
                        <div id="tabs-2" class="tab-pane fade">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="page_title_en">Tiêu đề trang (en)</label>
                                        <input type="text" class="form-control" value="{!! old('page_title_en') !!}" name="page_title_en" id="page_title_en">
                                        <span class="error">{!! $errors->first('page_title_en') !!}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="desc_en">Mô tả ngắn (en)</label>
                                        <textarea name="desc_en" id="desc_en" class="ckeditor">{!! old('desc_en') !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content_en">Nội dung (en)</label>
                                        <textarea name="content_en" id="content_en" class="ckeditor">{!! old('content_en') !!}</textarea>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </form>
@endsection
