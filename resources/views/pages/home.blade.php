@extends('layout.index')
@section('content')
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    @foreach($slider as $item)
                    <div class="item">
                        <img src="{{ asset('resources/upload/slider/'.$item['image']) }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="{!! url('public/images/icon-1.png') !!}">
                            </div>
                            <h3 class="title">@lang('home.free_ship')</h3>
                            <p class="desc">@lang('home.customer')</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{!! url('public/images/icon-2.png') !!}">
                            </div>
                            <h3 class="title">@lang('home.time')</h3>
                            <p class="desc">@lang('home.phone_contact')</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{!! url('public/images/icon-3.png') !!}">
                            </div>
                            <h3 class="title">@lang('home.save')</h3>
                            <p class="desc">@lang('home.great')</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{!! url('public/images/icon-4.png') !!}">
                            </div>
                            <h3 class="title">@lang('home.payment')</h3>
                            <p class="desc">@lang('home.support')</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{!! url('public/images/icon-5.png') !!}">
                            </div>
                            <h3 class="title">@lang('home.order')</h3>
                            <p class="desc">@lang('home.simple')</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">@lang('home.featured_product')</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($featured_product as $item)
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
                                @if($item->price_old != 0)
                                <span class="old">{!! number_format($item->price_old,0,",",".") !!} đ</span>
                                @else
                                @endif
                            </div>
                            <div class="action clearfix">
                                <div class="product-icon-container">
                                    <a href="{!! route('add.cart',$item->id) !!}"  title="@lang('home.add_to_cart')" class="add-cart">@lang('home.add_to_cart')</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">@lang('home.laptop')</h3>
                </div>
                <div class="section-detail">
                    @if(isset($laptop))

                        <ul class="list-item clearfix">
                            @foreach($laptop as $item)
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
                                        @if($item->price_old != 0)
                                        <span class="old">{!! number_format($item->price_old,0,",",".") !!} đ</span>
                                        @else
                                        @endif
                                    </div>
                                    <div class="action clearfix">
                                        <div class="product-icon-container">
                                            <a href="{!! route('add.cart',$item->id) !!}"  title="@lang('home.add_to_cart')" class="add-cart">@lang('home.add_to_cart')</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">@lang('home.phone')</h3>
                </div>
                <div class="section-detail">
                    @if(isset($phone))
                        <ul class="list-item clearfix">
                            @foreach($phone as $item)
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
                                        @if($item->price_old != 0)
                                        <span class="old">{!! number_format($item->price_old,0,",",".") !!} đ</span>
                                        @else
                                        @endif
                                    </div>
                                    <div class="action clearfix">
                                        <div class="product-icon-container">
                                            <a href="{!! route('add.cart',$item->id) !!}"  title="@lang('home.add_to_cart')" class="add-cart">@lang('home.add_to_cart')</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">@lang('home.accessories')</h3>
                </div>
                <div class="section-detail">
                    @if(isset($pk))
                        <ul class="list-item clearfix">
                            @foreach($pk as $item)
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
                                        @if($item->price_old != 0)
                                        <span class="old">{!! number_format($item->price_old,0,",",".") !!} đ</span>
                                        @else
                                        @endif
                                    </div>
                                    <div class="action clearfix">
                                        <div class="product-icon-container">
                                            <a href="{!! route('add.cart',$item->id) !!}"  title="@lang('home.add_to_cart')" class="add-cart">@lang('home.add_to_cart')</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">@lang('home.device')</h3>
                </div>
                <div class="section-detail">
                    @if(isset($tb))
                        <ul class="list-item clearfix">
                            @foreach($tb as $item)
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
                                        @if($item->price_old != 0)
                                        <span class="old">{!! number_format($item->price_old,0,",",".") !!} đ</span>
                                        @else
                                        @endif
                                    </div>
                                    <div class="action clearfix">
                                        <div class="product-icon-container">
                                            <a href="{!! route('add.cart',$item->id) !!}"  title="@lang('home.add_to_cart')" class="add-cart">@lang('home.add_to_cart')</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        @include('layout.sidebar')
    </div>
</div>
@endsection
