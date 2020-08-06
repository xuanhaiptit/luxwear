@extends('layout.index')
@section('content')
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
    @include('layout.sidebar')

        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Từ khóa: {!! $keyword !!}</h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị {!! count($search_product) !!} sản phẩm ({!! count($num_rows) !!} sản phẩm)</p>
                        <div class="form-filter">
                        </div>
                    </div>
                </div>
                <div class="section-detail">
                    <ul class="list-item" id="search_product_ajax">
                        @foreach($search_product as $item)
                            <li>
                                <?php
                                $date = date("Y-m-d");
                                $week = strtotime(date("Y-m-d",strtotime($item->created_at))."+1 week");
                                $datediff = $week - (strtotime($date));
                                $labelnew = "";
                                if (floor($datediff / (60 * 60 * 24)) > 0 && floor($datediff / (60 * 60 * 24)) <= 7) {
                                    $labelnew = "block2-labelnew";
                                }
                                ?>
                                <p class="<?php echo $labelnew; ?>">
                                </p>
                                <a href="{!! url('ctsp',[$item->id,$item->alias]) !!}" title="" class="thumb">
                                    <img src="{{ asset('resources/upload/product/'.$item->image) }}">
                                </a>
                                <a href="{!! url('ctsp',[$item->id,$item->alias]) !!}" title="" class="product-name">{!! $item->product_name !!}</a>
                                <div class="price">
                                    <span class="new">{!! number_format($item->price_new,0,',','.') !!} đ</span>
                                    <span class="old">{!! number_format($item->price_old,0,',','.') !!} đ</span>
                                </div>
                                <div class="action clearfix">
                                    <div class="product-icon-container">
                                        <a href="{!! route('add.cart',$item->id) !!}"  title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul class="list-item clearfix">
                        <li>
                            {{ $search_product->appends(Request::all())->links() }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{--@section('script')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}
{{--            $('#search_product').submit(function(){--}}
{{--                $.ajax({--}}
{{--                    url:'{{ route('post.search') }}',--}}
{{--                    type:'post',--}}
{{--                    data:$(this).serialize(),--}}
{{--                    success:function(data){--}}
{{--                        console.log(data);--}}
{{--                        $('#search_product_ajax').html('');--}}
{{--                        var url = {{ url('ctsp',[$item->id,$item->alias]) }};--}}
{{--                        $.each(keyword,function(key,value){--}}
{{--                            $('#search_product_ajax').append('<li>'+--}}
{{--                                '<a href="" class="thumb">' +--}}
{{--                                ' <img src="">'  +'>'--}}
{{--                                '</a>'--}}

{{--                                '</li>');--}}
{{--                        });--}}
{{--                    },--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
