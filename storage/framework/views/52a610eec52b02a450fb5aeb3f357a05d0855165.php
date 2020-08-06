<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Thông tin tài khoản</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li class="active">Add</li>
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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fullname">Tên hiển thị</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo e(old('fullname')); ?>">
                            <span class="error"><?php echo $errors->first('fullname'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo e(old('fullname')); ?>">
                            <span class="error"><?php echo $errors->first('username'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <span class="error"><?php echo $errors->first('password'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                            <span class="error"><?php echo $errors->first('confirm_password'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo e(old('email')); ?>">
                            <span class="error"><?php echo $errors->first('email'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <input type="file" name="fimage" id="exampleInputFile">
                            <span class="error"><?php echo $errors->first('fimage'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="tel">Số điện thoại</label>
                            <input type="tel" class="form-control" name="phone" pattern="(0[3|7|9|8|5])+([0-9]{8})\b" value="<?php echo e(old('phone')); ?>" maxlength="10" id="tel">
                            <span class="error"><?php echo $errors->first('phone'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?php echo e(old('address')); ?>">
                            <span class="error"><?php echo $errors->first('address'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="sltgender">Giới tính</label>
                            <select class="form-control" name="sltgender" id="sltgender">
                                <option value="">-- Chọn giới tính --</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                            <span class="error"><?php echo $errors->first('sltgender'); ?></span>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Online\web\ismart\resources\views/admin/admin/add.blade.php ENDPATH**/ ?>