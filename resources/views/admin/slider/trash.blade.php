@extends('admin.layouts.master')
@section('content')
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        @include('admin.layouts.sidebar')
        <div id="content" class="fl-right">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
            @endif
            @if(Session::has('danger'))
                <div class="alert alert-danger">
                    {!! Session::get('danger') !!}
                </div>
            @endif
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thùng rác</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
{{--                     <div class="filter-wp clearfix">
                        <form method="GET" action="{{ route('get.search.slider') }}" class="form-s fl-right">
                            <input type="text" name="s" id="s" required="true">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div> --}}
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên slider</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 0; ?>
                                @foreach($trash as $item)
                                <?php $stt++;?>
                                <tr>
                                    <td><span class="tbody-text">{!! $stt !!}</h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="{{ asset('resources/upload/slider/'.$item['image']) }}" alt="">
                                        </div>
                                    </td>
                                    <td><span class="tbody-text">{!! $item['name'] !!}</span></td>
                                    <td>
                                        <a href="{!! route('get.restore.slider',$item['id']) !!}" class="btn btn-info btn-xs">
                                            <i class="fa fa-pencil"></i> Khôi phục
                                        </a>
                                        <a href="{!! route('get.delete_trash.slider',$item['id']) !!}" class="btn btn-danger btn-xs" onclick="return confirm_delete('Bạn có chắc chắn muốn xóa trong thùng rác!')">
                                            <i class="fa fa-trash-o"></i> Xóa
                                        </a>
                                     </td>
                                    @endforeach
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Tên slider</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p class="num_rows">Có {!! count($trash) !!} slider trong thùng rác</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection