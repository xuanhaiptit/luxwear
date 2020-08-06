<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý sản phẩm</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li><a href="<?php echo e(route('get.list.product')); ?>"> Product</a></li>
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
                        <a href="<?php echo e(route('get.add.product')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Thêm
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
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $url = asset("resources/upload/product/$product->image");
                            $status = $product->status;
                            $check = $status ? 'checked' : '';
                            ?>
                            <tr>
                                <td><input type="checkbox" data-id="<?php echo e($product->id); ?>" name="checkItem"
                                           class="delete_checkbox" class="checkItem"></td>
                                <td><?php echo e($product-> id); ?></td>
                                <td><?php echo e($product->product_name); ?></td>
                                <td><img src='<?php echo e($url); ?>' border="0" class="img-rounded" align="center"/></td>
                                <td>Loại sản phẩm</td>
                                <td><?php echo e($product->qty_product); ?></td>
                                <td>Sản phẩm bán chạy</td>
                                <td>Sản phẩm nổi bật</td>
                                <td><input data-id="<?php echo e($product->id); ?>" id="toggle-demo" name="status"
                                           class="toggle-class"
                                           type="checkbox" data-onstyle="success"
                                           data-offstyle="danger" data-toggle="toggle"
                                           data-on="Active" data-off="InActive" <?php echo e($check); ?> ></td>
                                <td><?php echo e($product->product_name); ?></td>
                                <td>
                                    <ul style="margin-left: -40px">
                                        <?php $__currentLoopData = $product_sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <?php if($product_size->product_id == $product-> id): ?>
                                                    <?php echo e($product_size->name); ?> => <?php echo e($product_size->amount); ?>

                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </td>
                                <td>
                                    <a href="product_edit/<?php echo e($product-> id); ?>"
                                       class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span
                                            class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <button data-product="<?php echo e($product-> id); ?>"
                                            class="btn btn-danger btn-xs dt-delete delete"><span
                                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {

            $(document).on('change', '[data-toggle="toggle"]', function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '<?php echo e(route('get.changeStatusProduct')); ?>',
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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Online\web\ismart\resources\views/admin/product/list.blade.php ENDPATH**/ ?>