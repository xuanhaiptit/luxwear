@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý khách hàng</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li><a href="{{ route('get.list.user') }}"> Customer</a></li>
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
                        <a href="javascript:void(0)" class="btn btn-danger" id="delete_button" name="delete_button"><i class="fa fa-trash"></i> Delete</a>
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="user_table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="check_all" name="checkAll" id="checkAll"></th>
                                <th><span class="thead-text">STT</span></th>
                                <th><span class="thead-text">Họ và tên</span></th>
                                <th><span class="thead-text">Avatar</span></th>
                                <th><span class="thead-text">Email</span></th>
                                <th><span class="thead-text">Giới tính</span></th>
                                <th><span class="thead-text">Tình trạng</span></th>
                                <th><span class="thead-text">Thao tác</span></th>
                            </tr>
                        </thead>
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
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var dataTable = $('#user_table').DataTable({
                "fnDrawCallback": function() {
                    $('.toggle-class').bootstrapToggle();
                },
                processing: true,
                serverSide: true,
                language: {
                    processing: "<div id='loader'>Tao đang load nghen mậy!</div>"
                },
                ajax: {
                    url: "{{ route('get.data.users') }}",
                    type:'post',
                },

                // select: {
                //     style: 'os',
                //     selector: 'td:first-child'
                // },
                order: [[ 1, 'asc' ]],
                columns: [
                    {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
                    { data: 'id', name: 'id',targets: 1 },
                    { data: 'fullname', name: 'fullname',targets: 2 },
                    {
                        data: 'avatar',
                        name: 'avatar',
                        targets: 3,
                    },
                    { data: 'email', name: 'email',targets: 4 },

                    { data: 'gender', name: 'gender',targets: 5 },
                    {
                        data: 'status',
                        name: 'status',
                        targets: 6 },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                        ,targets: 7
                    }
                ],
            });

            $(document).on('change', '[data-toggle="toggle"]', function(){
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{route('get.changeStatusUser')}}',
                    data: {'status': status, 'id': id,},
                    success: function(data){
                        console.log(data);
                    }
                });
            });

            // delete
            $("#user_table").on("click", ".delete", function(){
                var id = $(this).attr('data-product');
                $(this).parent().parent().attr('id','delele_no_reload'+id);
                swal({
                    title: 'Are you sure?',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then(function (e) {
                    if(e.value === true){
                        $.ajax({
                            url:'delete/' + id,
                            type:'delete',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data:{
                                id: id,
                            },
                            success:function(data){
                                if(data.success == true){
                                    console.log("oke");
                                    // delele_no_reload phải thêm id vào để bit, bit cmj thì thua r
                                    $('#delete_no_reload'+id).remove();
                                    swal({
                                        title: "Done!",
                                        text: data.message,
                                        type: "success",
                                        timer: 1500
                                    }).then(function(){
                                        dataTable.ajax.reload();
                                    });

                                }
                            },
                            error:function(data){
                                alert('error');
                            }
                            // });
                        });
                    }else{
                        e.dismiss;
                    }
                });
            });
        });
    </script>
@stop


