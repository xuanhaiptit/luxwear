<?php $__env->startSection('content'); ?>
    <style>
        .content-wrapper{
            min-height: 1100px!important;
        }
    </style>
    <div class="content-wrapper" style="min-height: 915.8px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo e($total_product); ?></h3>

                            <p>Sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo e(route('get.list.product')); ?>" class="small-box-footer">Danh sách sản phẩm <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo e($total_post); ?></h3>

                            <p>Bài viết</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-chat "></i>
                        </div>
                        <a href="<?php echo e(route('get.list.post')); ?>" class="small-box-footer">Danh sách bài viết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo e($total_contact); ?></h3>

                            <p>Liên hệ</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-email"></i>
                        </div>
                        <a href="<?php echo e(route('get.list.contact')); ?>" class="small-box-footer">Danh sách liên hệ <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo e($total_bill); ?></h3>

                            <p>Đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cube"></i>
                        </div>
                        <a href="<?php echo e(route('get.list.bill')); ?>" class="small-box-footer">Danh sách đơn hàng <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

        </section>
        <section class="content">

                <!-- /.col (LEFT) -->
                <div class="col-md-12">
                    <!-- LINE CHART -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Bán hàng & Doanh thu</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $chart->html(); ?>

                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="description-block border-right">
                                        <h5 class="description-header" style="color: #e90000;"><?php echo e(number_format($sub_total_old)); ?> VNĐ</h5>
                                            <span class="description-text">Tổng doanh thu năm 2019</span>
                                    </div>
                                    <div class="description-block border-right">
                                        <h5 class="description-header" style="color: #e90000;"><?php echo e(number_format($sub_total)); ?> VNĐ</h5>
                                        <span class="description-text">Tổng doanh thu năm 2020</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 1 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($January)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 2 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($February)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 3 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($March)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 4 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($April)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 5 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($May)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 6 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($June)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 7 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($July)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 8 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($August)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 9 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($September)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 10 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($October)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 11 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($November)); ?> VNĐ</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right" style="display: inline-flex;">
                                    <span class="description-text">Doanh thu tháng 12 :  </span>
                                    <h5 class="description-header" style="color: #e90000;padding-left: 10px;"><?php echo e(number_format($December)); ?> VNĐ</h5>
                                </div>
                            </div>

                        <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <?php echo Charts::scripts(); ?>

                <?php echo $chart->script(); ?>

        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Online\web\ismart\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>