@extends('layout.index')
@section('content')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">@lang('home.home_menu')</a>
                    </li>

                    @if(isset($cate_post))
                        @if(App::isLocale('vn'))
                            @foreach($cate_post as $item)
                            <li>
                                <a href="" title="">{!! $item['name'] !!}</a>
                            </li>
                            @endforeach
                        @else
                            @foreach($cate_post as $item)
                                <li>
                                    <a href="" title="">{!! $item['name_en'] !!}</a>
                                </li>
                            @endforeach
                        @endif
                    @endif
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    @if(isset($cate_post))
                        @foreach($cate_post as $item)
                        <h3 class="section-title">{!! $item['name'] !!}</h3>
                        @endforeach
                    @endif
                </div>
                @if(isset($post))
                <div class="section-detail">
                    @foreach($post as $item)
                    <ul class="list-item">
                        <li class="clearfix">
                            <a href="{!! url('chi-tiet-bai-viet',[$item['id'],$item['alias']]) !!}" title="" class="thumb fl-left">
                                <img src="{{ asset('resources/upload/post/'.$item['image']) }}" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="{!! url('chi-tiet-bai-viet',[$item['id'],$item['alias']]) !!}" title="" class="title">{!! $item['post_name'] !!}</a>
                                <span class="create-date">{!! $item['created_at'] !!}</span>
                                <p class="desc">{!! $item['desc'] !!}</p>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
                @else
                <p>@lang('home.no_post') {!! $cate_post['name'] !!}</p>
                @endif
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @if($post->currentPage() != 1)
                            <li>
                                <a href="{!! $post->url($post->currentPage() - 1) !!}" title="">@lang('home.before')</a>
                            </li>
                        @endif
                            @for($i = 1; $i <= $post->lastPage(); $i++)
                            <li class="{!! ($post->currentPage() == $i) ? 'active' :null !!}">
                                <a href="{!! $post->url($i) !!}" title="">{!! $i !!}</a>
                            </li>
                            @endfor
                        @if($post->currentPage() != $post->lastPage())
                            <li>
                                <a href="{!! $post->url($post->currentPage() + 1) !!}" title="">@lang('home.after')</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @include('layout.sidebar_blog')
    </div>
</div>
@endsection
