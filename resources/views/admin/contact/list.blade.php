@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý liên hệ</h1>
            <ol class="breadcrumb">
                <li><a href="{{url('admin')}}"> Home</a></li>
                <li><a href="{{ route('get.list.contact') }}"> Contact</a></li>
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
                    <table class="table table-hover" id="contact_table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="check_all" name="checkAll" id="checkAll"></th>
                            <th><span class="thead-text">STT</span></th>
                            <th><span class="thead-text">Họ tên</span></th>
                            <th><span class="thead-text">Email</span></th>
                            <th><span class="thead-text">Nội dung</span></th>
                            <th><span class="thead-text">Ngày gửi</span></th>
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
            var dataTable = $('#contact_table').DataTable({
                "fnDrawCallback": function() {
                    $('.toggle-class').bootstrapToggle();
                },
                processing: true,
                serverSide: true,
                language: {
                    processing: "<div id='loader'>Tao đang load nghen mậy!</div>"
                },

                ajax: {
                    url: "{{ route('get.data.contact') }}",
                    type:'post',
                },

                order: [[ 1, 'asc' ]],
                columns: [
                    {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
                    { data: 'id', name: 'id',targets: 1 },
                    { data: 'name', name: 'name',targets: 2 },
                    { data: 'email', name: 'email',targets: 3 },
                    { data: 'message', name: 'message',targets: 4 },
                    { data: 'created_at', name: 'created_at',targets: 5 },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                        ,targets: 6
                    }
                ],
            });

            // delete
            $("#contact_table").on("click", ".delete", function(){
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
                                $('#delete_no_reload'+id).remove();
                                swal({
                                    title: "Done!",
                                    text: data.message,
                                    type: "success",
                                    timer: 1500
                                }).then(function(){
                                    dataTable.ajax.reload();
                                });
                            },
                            error:function(data){
                                alert('error');
                            }
                        });
                    }else{
                        e.dismiss;
                    }
                });
            });

        });
    </script>
@stop


