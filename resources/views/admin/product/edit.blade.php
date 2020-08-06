@extends('admin.layouts.master')
@section('content')
    <form action="" method="POST" id="form-edit-product" enctype="multipart/form-data">
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Quản lý sản phẩm</h1>
                <div class="breadcrumb">
                    <button type="submit" class="btn btn-success btn-sm" id="edit_ajax">
                        <span class="glyphicon glyphicon-edit"></span>
                        Lưu[Sửa]
                    </button>
                    <a class="btn btn-danger btn-sm" href="{{ route('get.list.product') }}" role="button">
                        <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
                    </a>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tabs-1">Home</a></li>
                            <li><a data-toggle="tab" href="#tabs-2">VN</a></li>
                            <li><a data-toggle="tab" href="#tabs-3">EN</a></li>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="tab-content">
                        <div id="tabs-1" class="tab-pane fade in active">
                            <div class="col-md-12">
                                <div class="box-body">
                                    @if(isset($product))
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="radio-inline"><input type="radio" name="radio_status"
                                                                                   value="1" {!! ($product['status'] == 1) ? 'checked' :null !!} >Hiển
                                                    thị</label>
                                                <label class="radio-inline"><input type="radio" name="radio_status"
                                                                                   value="0" {!! ($product['status'] == 0) ? 'checked' :null !!}>Không
                                                    hiển thị</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="sltcate_detail">Loại sản phẩm</label>
                                                @if(isset($cate_detail))
                                                    <select class="form-control" name="sltcate_detail"
                                                            id="sltcate_detail">
                                                        @foreach($cate_detail as $item)
                                                            @if($product['cate_product_detail_id'] == $item['id'])
                                                                <option value="{!! $item['id'] !!}"
                                                                        selected="selected">{!! $item['name'] !!}</option>
                                                            @else
                                                                <option
                                                                    value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="product-name">Tên sản phẩm (vn)</label>
                                                <input type="text" class="form-control"
                                                       value="{!! $product['product_name'] !!}" name="product_name"
                                                       id="product-name">
                                                <input type="hidden" id="product_id" value="{!! $product['id'] !!}">
                                                <span class="error product_name_error" style="display: none"></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="product_name_en">Tên sản phẩm (en)</label>
                                                <input type="text" class="form-control"
                                                       value="{!! $product['product_name_en'] !!}"
                                                       name="product_name_en" id="product_name_en">
                                                <span class="error product_name_en_error" style="display: none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_name_en">Size và số lượng mỗi size</label><br/>
                                                @foreach($sizes as $size)
                                                    <?php
                                                    $checked = '';
                                                    $amount = null;
                                                    ?>
                                                    @foreach($product_sizes as $product_size)
                                                        @if($product_size->size_id == $size->id)
                                                            <?php
                                                            $checked = 'checked';
                                                            $amount = $product_size->amount;
                                                            ?>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    <label class="container">Size {{$size->name}}
                                                        <input type="checkbox" name="size_product[]"
                                                               value="{{$size->id}}" {{$checked }}>
                                                        <span class="checkmark"></span>
                                                        <input type="text" class="" value="{!! $amount !!}"
                                                               name="amount_size[]" id="amount_size[]"
                                                               placeholder="Số lượng size {{$size->id}}">
                                                    </label>
                                                @endforeach
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputFile">Hình ảnh</label>
                                                <input type="file" name="fimage" id="exampleInputFile">
                                                <input type="hidden" name="img_current"
                                                       value="{!! $product['image'] !!}">
                                            </div>
                                            <div class="form-group">
                                                <img style="width: 100px;height: 100px;"
                                                     src="{{ asset('resources/upload/product/'.$product->image) }}"
                                                     alt="">
                                            </div>
                                            <div class="form-group">
                                                <label for="price_new">Giá mới</label>
                                                <input type="text" class="form-control"
                                                       value="{!! old('price_new'),isset($product) ? $product['price_new'] :null !!}"
                                                       name="price_new" id="price_new">
                                                <span class="error price_new_error" style="display: none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="price_old">Giá cũ</label>
                                                <input type="text" class="form-control"
                                                       value="{!! old('price_old'),isset($product) ? $product['price_old'] :null !!}"
                                                       name="price_old" id="price_old">
                                            </div>
                                            <div class="form-group">
                                                <label for="qty_product">Số lượng tồn kho</label>
                                                <input type="text" class="form-control"
                                                       value="{!! old('qty_product'),isset($product) ? $product['qty_product'] :null !!}"
                                                       name="qty_product" id="qty_product">
                                                <span class="error qty_product_error" style="display: none"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="selling_product">Sản phẩm bán chạy</label>
                                                <select class="form-control" name="selling_product"
                                                        id="selling_product">
                                                    <option @if($product['selling_product']== 'Bình thường')
                                                            {!! "selected = selected" !!} @endif
                                                            value="Bình thường">Bình thường
                                                    </option>
                                                    <option @if($product['selling_product']== 'Bán chạy')
                                                            {!! "selected = selected" !!} @endif
                                                            value="Bán chạy">Bán chạy
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="featured_product">Sản phẩm nổi bật</label>
                                                <select class="form-control" name="featured_product"
                                                        id="featured_product">
                                                    <option @if($product['featured_product']== 'Bình thường')
                                                            {!! "selected = selected" !!} @endif
                                                            value="Bình thường">Bình thường
                                                    </option>
                                                    <option @if($product['featured_product']== 'Nổi bật')
                                                            {!! "selected = selected" !!} @endif
                                                            value="Nổi bật">Nổi bật
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($list_image))
                                        <div class="col-md-3">
                                            <div class="form-group list_image">
                                                <label>Hình chi tiết</label>
                                                <div id="uploadFile">
                                                    <ul style="padding-left: 0px;">
                                                        @foreach($list_image as $key => $item)
                                                            <li id="{{ $item['id'] }}">
                                                                <div class="form-group" id="{!! $key !!}">
                                                                    <img style="width: 100px; height: 100px;"
                                                                         src="{!! asset('resources/upload/product_detail/'.$item['image']) !!}"
                                                                         idHinh="{!! $item['id'] !!}" id="{!! $key !!}">
                                                                    <a style="display: none;margin-top: -67px;margin-left: -3px;"
                                                                       href="javascript:void(0)" type="button"
                                                                       id="del_img_demo"
                                                                       class="btn btn-danger btn-circle icon_del"><i
                                                                            class="fa fa-times"></i></a>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                    <input type="file" name="list_fImages[]" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- /.box-body -->
                            </div>
                            <div class="box-footer">
                            </div>

                        </div>
                        <div id="tabs-2" class="tab-pane fade">
                            <div class="form-group">
                                <label for="desc">Mô tả ngắn (vn)</label>
                                <textarea name="desc" id="desc"
                                          class="ckeditor">{!! old('desc'),isset($product) ? $product['desc'] :null !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung (vn)</label>
                                <textarea name="content" id="content"
                                          class="ckeditor">{!! old('content'),isset($product) ? $product['content'] :null !!}</textarea>
                            </div>
                        </div>
                        <div id="tabs-3" class="tab-pane fade">
                            <div class="form-group">
                                <label for="product_desc_en">Mô tả ngắn (en)</label>
                                <textarea name="desc_en" id="desc_en"
                                          class="ckeditor">{!! old('desc_en'),isset($product) ? $product['desc_en'] :null !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung (en)</label>
                                <textarea name="content_en" id="content_en"
                                          class="ckeditor">{!! old('content_en'),isset($product) ? $product['content_en'] :null !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </form>
    <!-- /.content -->

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('click', '#edit_ajax', function (e) {
                for (instance in CKEDITOR.instances)
                {
                    $('#' + instance).val(CKEDITOR.instances[instance].getData());
                }
                e.preventDefault();
                var id = $('#product_id').val();
                var url = "/admin/product/product_edit/" + id;
                $.ajax({
                    url: url,
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: new FormData($('#form-edit-product')[0]),
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.error == true)
                        {
                            $('.error').hide();
                            if (data.message.product_name != undefined)
                            {
                                $('.product_name_error').show().html(data.message.product_name);
                            }
                            if (data.message.product_name_en != undefined)
                            {
                                $('.product_name_en_error').show().html(data.message.product_name_en);
                            }
                            if (data.message.price_new != undefined)
                            {
                                $('.price_new_error').show().html(data.message.price_new);
                            }
                            if (data.message.fimage != undefined)
                            {
                                $('.fimage_error').show().html(data.message.fimage);
                            }
                            if (data.message.qty_product != undefined)
                            {
                                $('.qty_product_error').show().html(data.message.qty_product);
                            }
                        } else if (data.error == false)
                        {
                            swal({
                                title: "Thành công",
                                text: data.message,
                                type: "success",
                            }).then(function () {
                                location.href = "{{ route('get.list.product') }}";
                            });
                        }
                    },
                    error: function () {
                        alert('error');
                    }
                });
            });

            $('#uploadFile ul').sortable({
                stop: function () {
                    $.map($(this).find('li'), function (el) {
                        var itemId = el.id;
                        // alert(itemId);
                        var itemIndex = $(el).index();

                        $.ajax({
                            url: "{{ url('admin/product/sortTable_img') }}",
                            type: 'post',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            dataType: 'json',
                            data: {itemId: itemId, itemIndex: itemIndex},
                            success: function (data) {
                                console.log(data);
                            }
                        });
                    });
                }
            });

        });
    </script>
@stop
