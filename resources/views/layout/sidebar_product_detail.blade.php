<div class="sidebar fl-left">
        <style type="text/css">
        a.active{
            color:red;
        }
    </style>
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">@lang('home.category_pr')</h3>
                </div>
                <div class="secion-detail" style="text-transform: capitalize;">
                    <?php
                        $cate_product = DB::table('cate_product')->select('*')->where('status',1)->get()->toArray();
                    ?>
                    @foreach($cate_product as $item)
                        <ul class="list-item">
                            <li>
                                @if(App::isLocale('vn'))
                                    <a href="#" title="">{!! $item->name !!}</a>
                                @else
                                    <a href="#" title="">{!! $item->name_en !!}</a>
                                @endif

                                <ul class="sub-menu">
                                    <?php
                                    $cate_product_detail = DB::table('cate_product_detail')->where('parent_id',$item->id)->where('status',1)->get()->toArray();
                                    ?>
                                    @foreach($cate_product_detail as $product_detail)
                                        <li>
                                            @if(App::isLocale('vn'))
                                                <a href="{!! url('loaisanpham',[$product_detail->id,$product_detail->alias]) !!}" title="">{!! $product_detail->name !!}</a>
                                            @else
                                                <a href="{!! url('loaisanpham',[$product_detail->id,$product_detail->alias]) !!}" title="">{!! $product_detail->name_detail_en !!}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    @endforeach
                    {{-- @endif --}}
                </div>
            </div>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">@lang('home.filter')</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <tbody>
                                <ul class="price-filter-link">
                                    <li><strong>@lang('home.choose_price') </strong></li>
                                    <li><a class="{{Request::get('price') == 1 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '1'])}}">@lang('home.price_under')</a></li>
                                    <li><a class="{{Request::get('price') == 2 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '2'])}}">@lang('home.price_5-10')</a></li>
                                    <li><a class="{{Request::get('price') == 3 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '3'])}}">@lang('home.price_10-15')</a></li>
                                    <li><a class="{{Request::get('price') == 4 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '4'])}}">@lang('home.price_15-20')</a></li>
                                    <li><a class="{{Request::get('price') == 5 ? 'active' : ''}}" href="{{request()->fullUrlWithQuery(['price' => '5'])}}">@lang('home.price_over')</a></li>
                                </ul>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
