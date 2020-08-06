@extends('admin.layouts.master')
@section('content')
    <style>
        /* Style for table */
        .table-customize {
            margin: 0;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 0 0 1px #ccc inset;
        }
        .table-customize > thead > tr {
            background-color: #535353!important;
            border-radius: 3px 3px 0 0;
        }
        .table-customize > thead > tr > th {
            color: #fff;
            border-bottom: none;
            padding: 10px 14px;
            font-size: 14px;
            font-weight: 400;
            border: 1px solid rgba(0, 0, 0, 0.2);
        }
        .table-customize > thead > tr > th:first-child {
            border-radius: 3px 0 0 0;
            border-top: 1px solid rgba(0, 0, 0, 0.2);
        }
        .table-customize > thead > tr > th:last-child {
            border-radius: 0 3px 0 0;
        }
        .table-customize > tbody > tr > td {
            vertical-align: middle;
            padding: 15px 14px;
            color: #ccc;
            font-size: 14px;
            color: #000;
            border: 1px solid #ccc;
        }
        .table-customize > tbody > tr > td a {
            text-decoration: none;
        }

        .table-order > tbody > tr:nth-child(-n + 3) > td:first-child {
            position: relative;
            font-size: 10px;
            font-weight: 700;
        }
        .table-order > tbody > tr:nth-child(-n + 3) > td:first-child span {
            position: absolute;
            left: 0;
            right: 0;
            margin: auto;
            top: 14px;
        }
        .table-order > tbody > tr td:first-child, .table-order > tbody > tr th:first-child {
            text-align: center;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý chi tiết hóa đơn</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li class="active">Index</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Thông tin đơn hàng
                    </h3>
                    @foreach($bill as $item)
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã đơn hàng</label>
                        <input type="text" class="form-control" readonly="readonly" value="{!! $item['id'] !!}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Người đặt hàng</label>
                        <input type="text" class="form-control" readonly="readonly" value="{!! $item['fullname'] !!}">
                    </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ nhận hàng</label>
                        <input type="text" class="form-control" readonly="readonly" value="{!! $item['address'] !!}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="text" class="form-control" readonly="readonly" value="{!! $item['phone'] !!}">
                    </div>
                    @endforeach
                </div>
                <div id="main-content-wp" class="clearfix blog-page"style="background: #f7f7f7;padding-top: 25px;padding-bottom: 75px;">
                    <div id="wrapper" class="wp-inner clearfix">
                        <div class="section" id="info-cart-wp">
                            <div class="section-detail table-responsive">
                                <table class="table table-bordered table-customize table-responsive">
                                    <thead>
                                    <tr>
                                        <th class="thead-text">STT</th>
                                        <th class="thead-text">Ảnh sản phẩm</th>
                                        <th class="thead-text">Tên sản phẩm</th>
                                        <th class="thead-text">Đơn giá</th>
                                        <th class="thead-text">Số lượng</th>
                                        <th class="thead-text">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stt = 0?>
                                    @foreach($list as $item)
                                        <?php $stt ++?>
                                        <tr>
                                            <td width="5%" class="thead-text">{!! $stt !!}</td>
                                            <td width="10%" class="thead-text">
                                                <div class="thumb" style="display: inline-block;width: 100px;min-height: 100px;overflow: hidden;">
                                                    <img style="width: 100px;height: 100px;" src="{{ asset('resources/upload/product/'.$item['image']) }}" alt="">
                                                </div>
                                            </td>
                                            <td width="40%" class="thead-text">{!! $item['product_name'] !!}</td>
                                            <td width="5%" class="thead-text">{!! $item['quality'] !!}</td>
                                            <td width="20%" class="thead-text">{!! number_format($item['price_new'],0,",",".") !!} VNĐ</td>

                                            <td width="20%" class="thead-text">{!! number_format($item['sub_total'],0,",",".") !!} VNĐ</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><br>
                        <div class="form-group" style="float: left">
                            <a class="btn btn-info" href="{{ route('get.list.bill') }}">Quay lại</a>
                        </div>
                        <div class="form-group" style="float: right">
                            @if($check_print_bill->status != 4)
                                <div class="fl-right">
                                    <a href="{!! route('get.inhoadon',$item['bill_id']) !!}"><i class="fa fa-print" aria-hidden="true" style="color:black;margin-right:5px"> Print</i></a>
                                </div>
                            @endif
                        </div>
                        <div class="form-group" style="float: right;font-size: 20px;font-weight: 300">
                            <div class="section-detail">
                                <p class="btn btn-xs btn-success">Tổng số lượng:</p> <span style="font-size: 18px;font-weight: bold;">{{ $total_qty }} sản phẩm</span><br>
                                <p class="btn btn-xs btn-success">Tổng đơn hàng:</p> <span style="font-size: 18px;font-weight: bold;">{!! number_format($total_price,0,",",",") !!} đ</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection


