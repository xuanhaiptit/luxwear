@extends('layout.index')
@section('content')
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="{!! url('/') !!}" title="">@lang('home.home_menu')</a>
                    </li>
                    @if(isset($cate_detail))
                        @if(App::isLocale('vn'))
                        @foreach($cate_detail as $item)
                        <li>
                            <a href="" title="">
                                <?php
                                $cate = DB::table('cate_product')->where('id',$item['parent_id'])->first();
                                echo $cate->name;
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="" title="">{!! $item['name'] !!}</a>
                        </li>
                        @endforeach
                        @else
                            @foreach($cate_detail as $item)
                                <li>
                                    <a href="" title="">
                                        <?php
                                        $cate = DB::table('cate_product')->where('id',$item['parent_id'])->first();
                                        echo $cate->name_en;
                                        ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="" title="">{!! $item['name_detail_en'] !!}</a>
                                </li>
                            @endforeach
                        @endif
                    @endif
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    @if(isset($cate_detail))
                    @foreach($cate_detail as $item)
                        @if(App::isLocale('vn'))
                                <h3 class="section-title fl-left">{!! $item['name'] !!}</h3>
                        @else
                                <h3 class="section-title fl-left">{!! $item['name_detail_en'] !!}</h3>
                            @endif
                    @endforeach
                    @endif
                    <div class="filter-wp fl-right">
                        <p class="desc">@lang('home.show') {!! count($product) !!} @lang('home.product') ({!! count($num_rows) !!} @lang('home.product'))</p>
                        <form class="tree-most" id="form_order" method="get">
                    <div class="orderby_wrapper pull-right">
                        <label>@lang('home.sort')</label>
                        <select name="orderby" class="orderby" style="border:1px solid #090505;border-radius: 2px;">
                            <option {{Request::get( 'orderby')=="md" ? "selected='selected'": " " }} value="md">@lang('home.default')</option>
                            <option {{Request::get( 'orderby')=="desc" ? "selected='selected'": " " }} value="desc">@lang('home.new_product')</option>
                            <option {{Request::get( 'orderby')=="asc" ? "selected='selected'": " " }} value="asc">@lang('home.old_product')</option>
                            <option {{Request::get( 'orderby')=="price_max" ? "selected='selected'": " "}} value="price_max">@lang('home.price_incre')</option>
                            <option {{Request::get( 'orderby')=="price_min" ? "selected='selected'": " " }} value="price_min">@lang('home.price_desce')</option>
                        </select>
                    </div>
                </form>
                    </div>
                </div>
                @if(!empty($product))
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach($product as $item)
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
                                <span class="new">{!! number_format($item->price_new,0,",",".") !!} đ</span>
                                @if($item->price_old != 0):
                                <span class="old">{!! number_format($item->price_old,0,",",".") !!} đ</span>
                                @else
                                @endif
                            </div>
                            <div class="action clearfix">
                                <div class="product-icon-container">
                                    <a href="{!! route('add.cart',$item->id) !!}"  title="Thêm giỏ hàng" class="add-cart">@lang('home.add_to_cart')</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            @if(count($product) == 0)
            <div><p style="text-align: center;">@lang('home.no_product')</p></div>
            @else
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul class="list-item clearfix">
                        {{-- {{ $product->appends(Request::all())->links() }} --}}
                        @if($product->currentPage() != 1)
                            <li>
                                <a href="{!! $product->url($product->currentPage() - 1) !!}" title="">@lang('home.before')</a>
                            </li>
                        @endif
                            @for($i = 1; $i <= $product->lastPage(); $i++)
                            <li class="{!! ($product->currentPage() == $i) ? 'active' :null !!}">
                                <a href="{!! $product->url($i) !!}" title="">{!! $i !!}</a>
                            </li>
                            @endfor
                        @if($product->currentPage() != $product->lastPage())
                            <li>
                                <a href="{!! $product->url($product->currentPage() + 1) !!}" title="">@lang('home.after')</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            @endif
        </div>
        @include('layout.sidebar_product_detail')
    </div>
</div>
@endsection
@section('script')
    <script>
        $(function(){
            $('.orderby').change(function(){
                $("#form_order").submit();
            })
        })
    </script>
@stop
