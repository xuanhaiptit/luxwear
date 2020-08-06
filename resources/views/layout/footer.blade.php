<div id="footer-wp">
    <div id="foot-body">
        <div class="wp-inner clearfix">
            <div class="block" id="info-company">
                <h3 class="title">@lang('home.ismart')</h3>
                <p class="desc">@lang('home.ismart_title')</p>
                <div id="payment">
                    <div class="thumb">
                        <img src="public/images/img-foot.png" alt="">
                    </div>
                </div>
            </div>
            <div class="block menu-ft" id="info-shop">
                <h3 class="title">@lang('home.store')</h3>
                <ul class="list-item">
                    <li>
                        <p>@lang('home.address_footer')</p>
                    </li>
                    <li>
                        <p>@lang('home.phone_footer')</p>
                    </li>
                    <li>
                        <p>@lang('home.email_footer')</p>
                    </li>
                </ul>
            </div>
            <div class="block menu-ft policy" id="info-shop">
                <h3 class="title">@lang('home.policy')</h3>
                <ul class="list-item">
                    <li>
                        <a href="" title="">@lang('home.regulation_policy')</a>
                    </li>
                    <li>
                        <a href="" title="">@lang('home.warranty_policy')</a>
                    </li>
                    <li>
                        <a href="" title="">@lang('home.assembly_policy')</a>
                    </li>
                    <li>
                        <a href="" title="">@lang('home.delivery')</a>
                    </li>
                </ul>
            </div>
            <div class="block" id="newfeed">
                <h3 class="title">@lang('home.news')</h3>
                <p class="desc">@lang('home.promotion')</p>
                <div id="form-reg">
                </div>
            </div>
        </div>
    </div>
    <div id="foot-bot">
        <div class="wp-inner">
            <p id="copyright">@lang('home.college')</p>
        </div>
    </div>
</div>
</div>
<div id="menu-respon">
    @if(Auth::check())
        <span class="logo">@lang('home.hello')! <strong>{{Auth::User()->fullname}}</strong></span>
    @else
        <span class="logo">@lang('home.ismart')</span>
    @endif
    <div id="menu-respon-wp">
        <?php
            $cate_product = DB::table('cate_product')->select('*')->get()->toArray();
        ?>
        <ul class="" id="main-menu-respon">
            @foreach($cate_product as $item)
            <li>
                <a href="#" title>{!! $item->name !!}</a>
                <ul class="sub-menu">
                    <?php
                        $cate_product_detail = DB::table('cate_product_detail')->where('parent_id',$item->id)->where('status',1)->get()->toArray();
                    ?>
                    @foreach($cate_product_detail as $product_detail)
                    <li>
                        <a href="{!! url('loaisanpham',[$product_detail->id,$product_detail->alias]) !!}" title="">{!! $product_detail->name !!}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
            <li>
                <a href="{!! route('get.blog') !!}" title="">@lang('home.blog_menu')</a>
            </li>
            <li>
                <a href="{!! route('get.gioithieu') !!}" title="">@lang('home.introduce_menu')</a>
            </li>
            <li>
                <a href="{!! url('lien-he-mobile') !!}" title="">@lang('home.contact_menu')</a>
            </li>
            @if(Auth::check())
                <li>
                    <a href="{!! url('thong-tin-ca-nhan/'.Auth::user()['id']) !!}" title="@lang('home.info_account')">@lang('home.info_account')</a>
                </li>
                <li>
                    <a href="{{url('lichsugiaodich/'.Auth::user()['id'])}}">@lang('home.history')</a>
                </li>
                <li>
                    <a class="logout" href="{{ url('dang-xuat') }}" title="">@lang('home.logout_menu')</a>
                </li>
            </div>
            @else
            <li>
                <a href="{{ url('dang-nhap') }}" title="">@lang('home.login_menu')</a>
            </li>
            <li>
                <a href="{{ url('dang-ky') }}" title="">@lang('home.register_menu')</a>
            </li>
            @endif
        </ul>
    </div>
</div>
<div id="btn-top"><img src="{!! url('public/images/icon-to-top.png') !!}" alt=""/></div>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    $(document).ready(function(){
        $('#contact_form_modal').click(function(e){
            e.preventDefault();
            $('#form-contact-modal').modal('show');
            $('#form_contact').click(function(){
                $.ajax({
                    url:'{{route('post.lien-he')}}',
                    type:'post',
                    dataType:'json',
                    data: $(this).serialize(),
                    success:function(data){
                        console.log(data);
                        if(data.error == true){
                            $('.error').hide();
                            if(data.message.name_contact != undefined){
                                $('.name_contact_error').show().html(data.message.name_contact);
                            }
                            if(data.message.email_contact != undefined){
                                $('.email_contact_error').show().html(data.message.email_contact);
                            }
                            if(data.message.message != undefined){
                                $('.email_message').show().html(data.message.message);
                            }
                        }else{
                            swal({
                                title: "Thành công",
                                text: data.message,
                                type: "success",
                                timer: 2000
                            }).then(function() {
                                window.location = "/";
                            });
                        }
                    }
                });
            });
        });
    });
</script>
