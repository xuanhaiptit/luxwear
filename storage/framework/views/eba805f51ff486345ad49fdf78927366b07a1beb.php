<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý trang</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li><a href="<?php echo e(route('get.list.page')); ?>"> Page</a></li>
                <li class="active">Index</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <?php echo Session::get('success'); ?>

                </div>
            <?php endif; ?>
            <?php if(Session::has('danger')): ?>
                <div class="alert alert-danger">
                    <?php echo Session::get('danger'); ?>

                </div>
            <?php endif; ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <a href="<?php echo e(route('get.add.page')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="delete_button" name="delete_button"><i class="fa fa-trash"></i> Delete</a>

                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="page_table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="check_all" name="checkAll" id="checkAll"></th>
                            <th><span class="thead-text">STT</span></th>
                            <th><span class="thead-text">Tiêu đề trang</span></th>
                            <th><span class="thead-text">Slug</span></th>
                            <th><span class="thead-text">Trạng thái</span></th>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var dataTable = $('#page_table').DataTable({
                "fnDrawCallback": function() {
                    $('.toggle-class').bootstrapToggle();
                },
                processing: true,
                serverSide: true,
                language: {
                    processing: "<div id='loader'>Tao đang load nghen mậy!</div>"
                },

                ajax: {
                    url: "<?php echo e(route('get.data.pages')); ?>",
                    type:'post',
                },

                order: [[ 1, 'asc' ]],
                columns: [
                    {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
                    { data: 'id', name: 'id',targets: 1 },
                    { data: 'page_title', name: 'page_title',targets: 2 },
                    { data: 'alias', name: 'alias',targets: 3 },
                    { data:'status', name:'status',targets:4},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                        ,targets: 5
                    }
                ],
            });

            $(document).on('change', '[data-toggle="toggle"]', function(){
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '<?php echo e(route('get.changeStatusPage')); ?>',
                    data: {'status': status, 'id': id,},
                    success: function(data){
                        console.log(data);
                    }
                });
            });

            // delete
            $("#page_table").on("click", ".delete", function(){
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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/admin/page/list.blade.php ENDPATH**/ ?>