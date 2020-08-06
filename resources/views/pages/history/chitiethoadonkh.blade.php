<!DOCTYPE html>
<html>
<head>
    <title>LUXWEAR STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <link href="{!! url('public/reset.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/carousel/owl.carousel.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/carousel/owl.theme.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/import/blog.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/import/fonts.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/import/footer.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/import/global.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/import/header.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/import/category_product.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/css/import/login.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/toastr/toastr.min.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! url('public/responsive_history.css') !!}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <link rel="stylesheet" href="{!! url('public/js/sweetalert/sweetalert2.min.css') !!}">
    <script src="{!! url('public/js/sweetalert/sweetalert2.all.min.js') !!}"></script>

    <script src="{!! url('public/js/jquery-2.2.4.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('public/toastr/toastr.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('public/js/elevatezoom-master/jquery.elevatezoom.js') !!}" type="text/javascript"></script>
    {{--        <script src="{!! url('public/js/bootstrap/bootstrap.min.js') !!}" type="text/javascript"></script>--}}
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="{!! url('public/js/carousel/owl.carousel.js') !!}" type="text/javascript"></script>
    <script src="{!! url('public/js/validateEngine/jquery.validationEngine.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('public/js/validateEngine/jquery.validationEngine-en.min.js') !!}" type="text/javascript"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>

</head>
<body>
@include('layout.header')
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
<div id="main-content-wp" class="clearfix blog-page"style="background: #f7f7f7;padding-top: 25px;padding-bottom: 75px;">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="{!! url('/') !!}" title="">@lang('home.home_menu')</a>
                    </li>
                    <li>
                        <a href="" title="">@lang('home.detail')</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table table-bordered table-customize table-responsive">
                    <thead>
                        <tr>
                            <th class="thead-text">@lang('home.stt')</th>
                            <th class="thead-text">@lang('home.pr_photo')</th>
                            <th class="thead-text">@lang('home.pr_code')</th>
                            <th class="thead-text">@lang('home.pr_price')</th>
                            <th class="thead-text">@lang('home.quality')</th>
                            <th class="thead-text">@lang('home.amount')</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 0?>
                    @foreach($bill_detail as $item)
                        <?php $stt ++?>
                        <tr>
                            <td width="5%" class="thead-text">{!! $stt !!}</td>
                            <td width="10%" class="thead-text">
                                <div class="thumb" style="    display: inline-block;width: 100px;min-height: 100px;overflow: hidden;">
                                    <img src="{{ asset('resources/upload/product/'.$item['image']) }}" alt="">
                                </div>
                            </td>
                            <td width="40%" class="thead-text">{!! $item['product_name'] !!}</td>
                            <td width="20%" class="thead-text">{!! number_format($item['price_new'],0,",",".") !!} VNĐ</td>
                            <td width="5%" class="thead-text">{!! $item['quality'] !!}</td>
                            <td width="20%" class="thead-text">{!! number_format($item['sub_total'],0,",",".") !!} VNĐ</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><br>
        <div class="section" style="float: left">
            <a class="btn btn-info" href="{{ url('lichsugiaodich/'.Auth::user()->id) }}">@lang('home.come_back')</a>
        </div>
        <div class="section" style="float: right;font-size: 20px;font-weight: 300">
            <div class="section-detail">
                <p class="btn btn-xs btn-success">@lang('home.total_qty'):</p> <span>{{ $total_qty }} @lang('home.product')</span><br>
                <p class="btn btn-xs btn-success">@lang('home.total_orders'):</p> <span>{!! number_format($total_price,0,",",",") !!} đ</span>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
</body>
</html>
