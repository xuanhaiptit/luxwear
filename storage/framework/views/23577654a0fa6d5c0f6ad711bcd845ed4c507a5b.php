<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý hóa đơn hủy</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li class="active">Bill Cancel</li>
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
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="bill_table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="check_all" name="checkAll" id="checkAll"></th>
                            <th><span class="thead-text">STT</span></th>
                            <th><span class="thead-text">Họ và tên</span></th>
                            <th><span class="thead-text">Số điện thoại</span></th>
                            <th><span class="thead-text">Địa chỉ</span></th>
                            <th><span class="thead-text">Email</span></th>
                            <th><span class="thead-text">Ngày lập</span></th>
                            <th><span class="thead-text">Tình trạng</span></th>
                            <th><span class="thead-text">Chi tiết</span></th>
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
            var dataTable = $('#bill_table').DataTable({
                "fnDrawCallback": function() {
                    $('.toggle-class').bootstrapToggle();
                },
                processing: true,
                serverSide: true,
                language: {
                    processing: "<div id='loader'>Tao đang load nghen mậy!</div>"
                },
                ajax: {
                    url: "<?php echo e(route('get.data.cancel')); ?>",
                    type:'post',
                },
                order: [[ 1, 'asc' ]],
                columns: [
                    {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
                    { data: 'id', name: 'id',targets: 1 },
                    { data: 'fullname', name: 'fullname',targets: 2 },
                    {
                        data: 'phone',
                        name: 'phone',
                        targets: 3,
                    },
                    { data: 'address', name: 'address',targets: 4 },

                    { data: 'email', name: 'email',targets: 5 },
                    { data: 'created_at', name: 'created_at',targets: 6 },
                    { data: 'status', name: 'status',targets: 7 },
                    {
                        data: 'detail',
                        name: 'detail',
                        orderable: false,
                        searchable: false,
                        targets: 8 },
                ],
            });
        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Online\web\ismart\resources\views/admin/bill/danhsachhuy.blade.php ENDPATH**/ ?>