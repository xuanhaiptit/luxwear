@extends('layout.index')
@section('content')
    <div id="main-content-wp" class="clearfix detail-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="{!! url('/') !!}" title="">@lang('home.home_menu')</a>
                        </li>
                        @if(App::isLocale('vn'))
                            @if(isset($danhmucsp))
                                <li>
                                    <a href="" title="">{!! $danhmucsp['name'] !!}</a>
                                </li>
                            @endif
                            @if(isset($loaisp))
                                <li>
                                    <a href="" title="">{!! $loaisp['name'] !!}</a>
                                </li>
                            @endif
                            @if(isset($ctsp))
                                <li>
                                    <a href="" title="">{!! $ctsp['product_name'] !!}</a>
                                </li>
                            @endif
                        @else
                            @if(isset($danhmucsp))
                                <li>
                                    <a href="" title="">{!! $danhmucsp['name_en'] !!}</a>
                                </li>
                            @endif
                            @if(isset($loaisp))
                                <li>
                                    <a href="" title="">{!! $loaisp['name_detail_en'] !!}</a>
                                </li>
                            @endif
                            @if(isset($ctsp))
                                <li>
                                    <a href="" title="">{!! $ctsp['product_name_en'] !!}</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left">
                            <a href="" id="main-thumb" class="clearfix">
                                <div style="height:356px;width:356px;" class="zoomWrapper"><img id="zoom"
                                                                                                src="{{ asset('resources/upload/product/'.$ctsp['image']) }}"
                                                                                                data-zoom-image="{{ asset('resources/upload/product/'.$ctsp['image']) }}"
                                                                                                style="position: absolute;">
                                </div>
                            </a>
                            <div id="list-thumb">
                                @if(isset($list_image))
                                    @foreach($list_image as $item)
                                        <a href=""
                                           data-image="{{ asset('resources/upload/product_detail/'.$item['image']) }}"
                                           data-zoom-image="{{ asset('resources/upload/product_detail/'.$item['image']) }}">
                                            <img id="zoom-img"
                                                 src="{{ asset('resources/upload/product_detail/'.$item['image']) }}"/>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="{{ asset('resources/upload/product/'.$ctsp['image']) }}" alt="">
                        </div>
                        <div class="info fl-right">
                            @if(App::isLocale('vn'))
                                <h3 class="product-name">{!! $ctsp['product_name'] !!}</h3>
                            @else
                                <h3 class="product-name">{!! $ctsp['product_name_en'] !!}</h3>
                            @endif
                            <?php
                            $ageDetail = 0;
                            if ($ctsp['product_total_rating'])
                            {
                                $ageDetail = round($ctsp['product_total_number'] / $ctsp['product_total_rating'], 2);
                            }
                            ?>
                            <div class="pro_rating">
                                @for($i = 1; $i<=5; $i++)
                                    <a href="#"><i class="fa fa-star {{ $i <= $ageDetail ? 'active' : '' }}"></i></a>
                                @endfor
                            </div>
                            @if(App::isLocale('vn'))
                                <div class="desc">
                                    <p>{!! $ctsp['desc'] !!}</p>
                                </div>
                            @else
                                <div class="desc">
                                    <p>{!! $ctsp['desc_en'] !!}</p>
                                </div>
                            @endif
                            <div class="num-product">
                                <span class="title">@lang('home.pr_qty'): </span>
                                @if($ctsp['qty_product'] == 0)
                                    <span class="status">@lang('home.temporarily')</span>
                                @else
                                    <span class="status">{!! $ctsp['qty_product'] !!}</span>
                                @endif
                            </div>
                            <p class="price">{!! number_format($ctsp['price_new'],0,",",".") !!} đ
                                @if($ctsp['price_old'] != 0)
                                    <span class="price_old">{!! number_format($ctsp['price_old'],0,",",".") !!} đ</span>
                                @else
                                    <span></span>
                                @endif
                            </p>
                            <form action="{{ route('add.cart',$ctsp->id) }}" id="form-add-cart" method="GET"
                                  enctype="multipart/form-data">
                                <ul>
                                    @foreach($product_sizes as $product_size)
                                        <input type="radio" id="{{$product_size->id}}" name="product_size_id"
                                               value="{{$product_size->id}}">
                                        <label for="{{$product_size->id}}">Size {{$product_size->name}}</label><br>
                                    @endforeach
                                </ul>
                                <div class="product-icon-container">
                                    <div class="product-icon-container">
                                        <button type="submit" class="add-cart" id="add-cart">
                                            Thêm giỏ hàng
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">@lang('home.desc_pr')</h3>
                    </div>
                    @if(App::isLocale('vn'))
                        <div class="section-detail">
                            <p>{!! $ctsp['content'] !!}</p>
                        </div>
                    @else
                        <div class="section-detail">
                            <p>{!! $ctsp['content_en'] !!}</p>
                        </div>
                    @endif
                    <div id="like-fb" class="cleafix">
                        <div class="fb-like" data-href="" data-layout="button_count" data-action="like"
                             data-size="small" data-show-faces="true" data-share="true"></div>
                    </div>
                    <div class="component_rating" style="margin-bottom: 20px">
                        <h3 class="section-title">@lang('home.review') &amp; @lang('home.comment')</h3>
                        <div class="component_rating_content"
                             style="display: flex;align-items: center;border-radius: 5px;border: 1px solid #dedede;">
                            <div class="rating_item" style="width: 20%;position: relative;">
                                <span class="fa fa-star"
                                      style="font-size: 100px;color:#ff9705;display: block;margin: 0px auto;text-align: center;"></span>
                                <b class="number-star">{{ $ageDetail }}</b>
                            </div>
                            <div class="list_rating" style="width: 60%;padding: 20px">
                                @foreach($arrayRatings as $key => $item)
                                    <?php
                                    $itemAge = round(($item['total'] / $ctsp->product_total_rating) * 100, 0);
                                    ?>
                                    <div class="item_rating" style="display: flex;align-items: center;">
                                        <div style="width:10%;font-size: 14px;">
                                            {!! $key !!}<span class="fa fa-star"></span>
                                        </div>
                                        <div style="width:70%;margin: 0 20px;">
                                            <span
                                                style="width: 100%;height: 8px;display: block;border:1px solid #dedede;border-radius: 5px;background-color:#dedede "><b
                                                    style="width: {!! $itemAge !!}%;background-color: #f25800;display: block;height: 100%;border-radius: 5px;"></b></span>
                                        </div>
                                        <div style="width:20%">
                                            <a href="">{!! $item['total'] !!} @lang('home.review') </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="submit-review">
                                <a href="#" class="js_rating_action">@lang('home.submit_review')</a>
                            </div>
                        </div>
                        <?php
                        $listRatingText = [
                            1 => 'Không thích',
                            2 => 'Tạm được',
                            3 => 'Bình thường',
                            4 => 'Rất tốt',
                            5 => 'Tuyệt vời',
                        ];
                        ?>
                        <div class="form_rating hide">
                            <div style="display: flex;margin-top: 15px;font-size: 15px;">
                                <p style="margin-bottom: 0">@lang('home.select_review')</p>
                                <span style="margin: 0 15px" class="list_start">
                                @for($i = 1;$i <= 5; $i++)
                                        <i class="fa fa-star" data-key={!! $i !!}></i>
                                    @endfor
                            </span>
                                <span class="list_text">@lang('home.good')</span>
                                <input type="hidden" name="" value="" class="number_rating">
                            </div>
                            <div class="row" style="margin-top: 15px;"><br>
                                <div class="span6">
                                    <textarea id="emojionearea1" style="height: 65px;" name=""
                                              class="form-control ra_content" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                @if(Auth::check())
                                    <a href="{!! route('post.save.products',$ctsp->id) !!}" class="js_rating_product"
                                       style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px;">Gửi
                                        đánh giá</a>
                                @else
                                    <a href="{!! url('dang-nhap') !!}"
                                       onclick="return confirm_delete('Bạn cần phải đăng nhập trước khi gửi đánh giá!')"
                                       style="width: 200px;background: #288ad6;padding: 10px;color: white;border-radius: 5px;">Gửi
                                        đánh giá</a>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="component_list_rating">
                            @if(isset($danhgia))
                                @foreach($danhgia as $item)
                                    <div class="rating_item" style="margin: 10px 0">
                                        <div>
                                            <span
                                                style="color: #333;font-weight: bold;text-transform: capitalize;">{{isset($item->user->fullname)? $item->user->fullname : ''}}</span>
                                            <a href="" style="color:#2ba832"><i class="fa fa-check-circle-o"></i> Đã
                                                đánh giá tại website</a>
                                        </div>
                                        <p style="margin-bottom: 0">
                                    <span class="pro_rating">
                                        @for($i = 1; $i <=5; $i++)
                                            <i class="fa fa-star  {{$i <= $item->number ? 'active' : ''}}"></i>
                                        @endfor
                                    </span>
                                            <span>{{$item->content}}</span>
                                        </p>
                                        <div>
                                            <span><i class="fa fa-clock"></i>{{$item->created_at}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="section" id="same-category-wp">
                    <div class="section-head">
                        <h3 class="section-title">@lang('home.pr_same')</h3>
                    </div>
                    <div class="section-detail">
                        @if(isset($product_cate_same))
                            <ul class="list-item">
                                @foreach($product_cate_same as $item)
                                    <li>
                                        <?php
                                        $date = date("Y-m-d");
                                        $week = strtotime(date("Y-m-d", strtotime($item['created_at'])) . "+1 week");
                                        $datediff = $week - (strtotime($date));
                                        $labelnew = "";
                                        if (floor($datediff / (60 * 60 * 24)) > 0 && floor($datediff / (60 * 60 * 24)) <= 7)
                                        {
                                            $labelnew = "block2-labelnew";
                                        }
                                        ?>
                                        <p class="<?php echo $labelnew; ?>">
                                        </p>
                                        <a href="{!! url('ctsp',[$item['id'],$item['alias']]) !!}" title=""
                                           class="thumb">
                                            <img src="{{ asset('resources/upload/product/'.$item['image']) }}">
                                        </a>
                                        <a href="{!! url('ctsp',[$item['id'],$item['alias']]) !!}" title=""
                                           class="product-name">{!! $item['product_name'] !!}</a>
                                        <div class="price">
                                            <span
                                                class="new">{!! number_format($item['price_new'],0,",",".") !!} đ</span>
                                            @if($item['price_old'] != 0)
                                                <span
                                                    class="old">{!! number_format($item['price_old'],0,",",".") !!} đ</span>
                                            @else
                                            @endif
                                        </div>
                                        <div class="action clearfix">
                                            <div class="product-icon-container">
                                                <a href="{!! route('add.cart',$item['id']) !!}" title="Thêm giỏ hàng"
                                                   class="add-cart">@lang('home.add_to_cart')</a>
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

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {
            let listStart = $(".list_start .fa");
            listRatingText = {
                1: 'Không thích',
                2: 'Tạm được',
                3: 'Bình thường',
                4: 'Tốt',
                5: 'Tuyệt vời',
            }
            listStart.mouseover(function () {
                let $this = $(this);
                let number = $this.attr('data-key');
                listStart.removeClass('rating_active')

                $(".number_rating").val(number);
                $.each(listStart, function (key, value) {
                    if (key + 1 <= number)
                    {
                        $(this).addClass('rating_active')
                    }
                });

                $(".list_text").text('').text(listRatingText[number]).show();
            });

            $(".js_rating_action").click(function (event) {
                event.preventDefault();

                if ($(".form_rating").hasClass('hide'))
                {
                    $(".form_rating").addClass('active').removeClass('hide')
                } else
                {
                    $(".form_rating").addClass('hide').removeClass('active')
                }
            })

            $(".js_rating_product").click(function (e) {
                e.preventDefault();
                let content = $(".ra_content").val();
                let number = $(".number_rating").val();
                let url = $(this).attr('href');
                if (content && number)
                {
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: {number: number, r_content: content},
                        success: function (result) {
                            console.log(result);
                            if (result.level == 1)
                            {
                                alert("Gửi đánh giá thành công");
                                location.reload();
                            }
                        }
                    });
                }
            });
        });
        // function updateItem(id)
        // {
        //     sl = $(".sl_" + id).val();
        //     sl++;
        //     alert(sl++);
        // }
        // function updateItem1(id)
        // {
        //     sl = $(".sl_" + id).val();
        //     sl--;
        // }
        $(document).ready(function () {
            $("#emojionearea1").emojioneArea({
                pickerPosition: "bottom",
                tonesStyle: "bullet",
                search: false,
                events: {
                    keyup: function (editor, event) {
                        console.log(editor.html());
                        console.log(this.getText());
                    }
                }
            });

        });
    </script>
@stop
