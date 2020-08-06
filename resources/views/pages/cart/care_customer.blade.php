@extends('layout.index')
@section('content')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">@lang('home.home_menu')</a>
                    </li>
                    <li>
                        <a href="" title="">@lang('home.care_customer')</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <p class="cart">@lang('home.care_1')</p>
        <p class="cart">@lang('home.care_2')</p>
        <p class="cart">@lang('home.care_3')</p>
        <p class="cart">@lang('home.care_4')</p>
    </div>
</div>

@endsection
