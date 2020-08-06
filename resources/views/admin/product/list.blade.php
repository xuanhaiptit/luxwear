@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý sản phẩm</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li><a href="{{ route('get.list.product') }}"> Product</a></li>
                <li class="active">Index</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="{{ route('get.add.product') }}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm
                            mới</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="delete_button" name="delete_button"><i
                                class="fa fa-trash"></i> Delete</a>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="product_table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="check_all" name="checkAll" id="checkAll"></th>
                            <th><span class="thead-text">STT</span></th>
                            <th><span class="thead-text">Tên sản phẩm</span></th>
                            <th><span class="thead-text">Hình ảnh</span></th>
                            <th><span class="thead-text">Loại sản phẩm</span></th>
                            <th><span class="thead-text">Tồn kho</span></th>
                            <th><span class="thead-text">Sản phẩm bán chạy</span></th>
                            <th><span class="thead-text">Sản phẩm nổi bật</span></th>
                            <th><span class="thead-text">Trạng thái</span></th>
                            <th><span class="thead-text">Thao tác</span></th>
                            <th><span class="thead-text">Size</span></th>
                            <th><span class="thead-text">Action</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <?php
                            $url = asset("resources/upload/product/$product->image");
                            $status = $product->status;
                            $check = $status ? 'checked' : '';
                            ?>
                            <tr>
                                <td><input type="checkbox" data-id="{{$product->id}}" name="checkItem"
                                           class="delete_checkbox" class="checkItem"></td>
                                <td>{{ $product-> id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td><img src='{{$url}}' border="0" class="img-rounded" align="center"/></td>
                                <td>Loại sản phẩm</td>
                                <td>{{ $product->qty_product }}</td>
                                <td>Sản phẩm bán chạy</td>
                                <td>Sản phẩm nổi bật</td>
                                <td><input data-id="{{$product->id}}" id="toggle-demo" name="status"
                                           class="toggle-class"
                                           type="checkbox" data-onstyle="success"
                                           data-offstyle="danger" data-toggle="toggle"
                                           data-on="Active" data-off="InActive" {{$check}} ></td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <ul style="margin-left: -40px">
                                        @foreach($product_sizes as $product_size)
                                            <li>
                                                @if($product_size->product_id == $product-> id)
                                                    {{ $product_size->name}} => {{ $product_size->amount}}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="product_edit/{{ $product-> id }}"
                                       class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span
                                            class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <button data-product="{{ $product-> id }}"
                                            class="btn btn-danger btn-xs dt-delete delete"><span
                                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $(document).on('change', '[data-toggle="toggle"]', function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{route('get.changeStatusProduct')}}',
                    data: {'status': status, 'id': id,},
                    success: function (data) {
                        console.log(data);
                    }
                });
            });

            // delete
            $("#product_table").on("click", ".delete", function () {
                var id = $(this).attr('data-product');
                $(this).parent().parent().attr('id', 'delele_no_reload' + id);
                swal({
                    title: 'Are you sure?',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then(function (e) {
                    if (e.value === true)
                    {
                        $.ajax({
                            url: 'delete/' + id,
                            type: 'delete',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                id: id,
                            },
                            success: function (data) {
                                if (data.success == true)
                                {
                                    console.log("oke");
                                    // delele_no_reload phải thêm id vào để bit, bit cmj thì thua r
                                    $('#delete_no_reload' + id).remove();
                                    swal({
                                        title: "Done!",
                                        text: data.message,
                                        type: "success",
                                        timer: 1500
                                    }).then(function () {
                                        dataTable.ajax.reload();
                                    });
                                }
                                location.reload();
                            },
                            error: function (data) {
                                alert('error');
                            }
                            // });
                        });
                    } else
                    {
                        e.dismiss;
                    }
                });
            });

        });
    </script>
@stop


