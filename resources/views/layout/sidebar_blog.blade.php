<div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">@lang('home.category_pr')</h3>
                </div>
                <div class="secion-detail" style="text-transform: capitalize;">
                    <?php

                        $cate_post = DB::table('cate_post')->select('*')->where('status',1)->get()->toArray();
                    ?>
                    @foreach($cate_post as $item)
                    <ul class="list-item">
                        <li>
                            @if(App::isLocale('vn'))
                                <a href="{!! url('loaibaiviet',[$item->id,$item->alias]) !!}" title="">{!! $item->name !!}</a>
                            @else
                                <a href="{!! url('loaibaiviet',[$item->id,$item->alias]) !!}" title="">{!! $item->name_en !!}</a>
                            @endif
                        </li>
                    </ul>
                    @endforeach
                    {{-- @endif --}}
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">@lang('home.selling_pr')</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($selling_product as $item)
                        <li class="clearfix">
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
                            <a href="{!! url('ctsp',[$item->id,$item->alias]) !!}" title="" class="thumb fl-left">
                                <img src="{{ asset('resources/upload/product/'.$item->image) }}" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="{!! url('ctsp',[$item->id,$item->alias]) !!}" title="" class="product-name">{!! $item->product_name !!}</a>
                                <div class="price">
                                    <span class="new">{!! number_format($item->price_new,0,",",".") !!} đ</span>
                                </div>
                                <div class="buy_now_cart">
                                    <a href="{!! route('add.cart',$item->id) !!}"  title="Thêm giỏ hàng" class="buy-now">@lang('home.buy_now')</a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
