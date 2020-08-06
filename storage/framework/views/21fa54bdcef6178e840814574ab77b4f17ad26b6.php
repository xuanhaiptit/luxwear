<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý khách hàng</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"> Home</a></li>
                <li><a href="<?php echo e(route('get.list.user')); ?>"> Customer</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chỉnh sửa</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="fullname">Họ & tên</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo $user['fullname']; ?>">
                            <span class="error"><?php echo $errors->first('fullname'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $user['username']; ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email']; ?>">
                            <span class="error"><?php echo $errors->first('email'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh</label>
                            <input type="file" name="fimage" id="exampleInputFile">
                            <input type="hidden" name="img_current" value="<?php echo $user['avatar']; ?>">
                        </div>
                        <div class="form-group">
                            <img style="width: 100px; height: 100px" src="<?php echo e(asset('resources/upload/user/'.$user['avatar'])); ?>">
                        </div>
                        <div class="form-group">
                            <label for="tel">Số điện thoại</label>
                            <input type="tel" class="form-control" name="phone" pattern="(0[3|7|9|8|5])+([0-9]{8})\b" maxlength="10" required="required" id="tel" value="<?php echo $user['phone']; ?>">
                            <span class="error"><?php echo $errors->first('phone'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" value="<?php echo $user['address']; ?>">
                            <span class="error"><?php echo $errors->first('address'); ?></span>
                        </div>
                        <div class="form-group">
                            <label for="sltgender">Giới tính</label>
                            <select class="form-control" name="sltgender" id="sltgender">
                                <option <?php if($user['gender'] == 'Nam'): ?>
                                        <?php echo "selected = selected"; ?> <?php endif; ?>
                                        value="Nam">Nam
                                </option>
                                <option <?php if($user['gender'] == 'Nữ'): ?>
                                        <?php echo "selected = selected"; ?> <?php endif; ?>
                                        value="Nữ">Nữ</option>
                            </select>
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



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Online\web\ismart\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>