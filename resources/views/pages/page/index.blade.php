@extends('layout.index')
@section('content')
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    @foreach($page as $item)
                    <li>
                        <a href="?" title="">{!! $item['page_title'] !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @include('layout.sidebar')
        <div class="main-content fl-right">
                @foreach($page as $page)
                <div class="section" id="detail-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">{!! $page['page_title'] !!}</h3>
                    </div>
                    <div class="section-detail">
                        <span class="create-date">{!! $page['created_at'] !!}</span>
                        <div class="detail">
                            <p>{!! $page['content'] !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            <div class="section" id="social-wp">
                <div class="section-detail">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <div class="g-plusone-wp">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
