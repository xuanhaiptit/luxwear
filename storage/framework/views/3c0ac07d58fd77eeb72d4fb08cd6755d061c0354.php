<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý danh mục loại sản phẩm</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li><a href="<?php echo e(route('get.list.cate_product_detail')); ?>"> Cate Product Detail</a></li>
                <li class="active">Add</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="col-md-12">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="sltcate">Tên danh mục</label>
                                <select class="form-control" name="sltcate" id="sltcate">
                                    <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="error"><?php echo $errors->first('sltcate'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="txtcat_id">Tên loại sản phẩm</label>
                                <input type="text" class="form-control" value="<?php echo old('txtname_cate'); ?>" name="txtname_cate" id="txtname_cate">
                                <span class="error"><?php echo $errors->first('txtname_cate'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="txtcat_id">Tên loại sản phẩm (en)</label>
                                <input type="text" class="form-control" value="<?php echo old('txtname_cate_en'); ?>" name="txtname_cate_en" id="txtname_cate_en">
                                <span class="error"><?php echo $errors->first('txtname_cate_en'); ?></span>
                            </div>
                        </div>

                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                        <button style="margin-left: 15px;" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Online\web\ismart\resources\views/admin/cate_product_detail/add.blade.php ENDPATH**/ ?>