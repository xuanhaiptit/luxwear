<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý danh mục sản phẩm</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li><a href="<?php echo e(route('get.list.cate_product')); ?>"> Cate Product</a></li>
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
                                <label for="txtcatename">Tên danh mục</label>
                                <input type="text" class="form-control" value="<?php echo old('txtcatename'); ?>" name="txtcatename" id="txtcatename">
                                <span class="error"><?php echo $errors->first('txtcatename'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="txtcatename_en">Tên danh mục (en)</label>
                                <input type="text" class="form-control" value="<?php echo old('txtcatename_en'); ?>" name="txtcatename_en" id="txtcatename_en">
                                <span class="error"><?php echo $errors->first('txtcatename_en'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="txtkeyword">Keyword</label>
                                <input type="text" class="form-control" value="<?php echo old('txtkeyword'); ?>" name="txtkeyword" id="txtkeyword">
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/admin/cate_product/add.blade.php ENDPATH**/ ?>