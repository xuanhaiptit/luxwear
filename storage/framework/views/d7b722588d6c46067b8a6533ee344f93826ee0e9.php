<!DOCTYPE html>
<html>
<head>
    <title>LUXWEAR STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <link href="<?php echo url('public/reset.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/carousel/owl.carousel.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/carousel/owl.theme.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/import/blog.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/import/fonts.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/import/footer.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/import/global.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/import/header.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/import/category_product.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/css/import/login.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/toastr/toastr.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo url('public/responsive_history.css'); ?>" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    <link rel="stylesheet" href="<?php echo url('public/js/sweetalert/sweetalert2.min.css'); ?>">
    <script src="<?php echo url('public/js/sweetalert/sweetalert2.all.min.js'); ?>"></script>

    <script src="<?php echo url('public/js/jquery-2.2.4.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo url('public/toastr/toastr.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo url('public/js/elevatezoom-master/jquery.elevatezoom.js'); ?>" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="<?php echo url('public/js/carousel/owl.carousel.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo url('public/js/validateEngine/jquery.validationEngine.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo url('public/js/validateEngine/jquery.validationEngine-en.min.js'); ?>" type="text/javascript"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>

</head>
<body>
<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    /* Style for table */
    .table-customize {
        margin: 0;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 0 0 1px #ccc inset;
    }
    .table-customize > thead > tr {
        background-color: #535353;
        border-radius: 3px 3px 0 0;
    }
    .table-customize > thead > tr > th {
        color: #fff;
        border-bottom: none;
        padding: 10px 14px;
        font-size: 14px;
        font-weight: 400;
        border: 1px solid rgba(0, 0, 0, 0.2);
    }
    .table-customize > thead > tr > th:first-child {
        border-radius: 3px 0 0 0;
        border-top: 1px solid rgba(0, 0, 0, 0.2);
    }
    .table-customize > thead > tr > th:last-child {
        border-radius: 0 3px 0 0;
    }
    .table-customize > tbody > tr > td {
        vertical-align: middle;
        padding: 15px 14px;
        color: #ccc;
        font-size: 14px;
        color: #000;
        border: 1px solid #ccc;
    }
    .table-customize > tbody > tr > td a {
        text-decoration: none;
    }

    .table-order > tbody > tr:nth-child(-n + 3) > td:first-child {
        position: relative;
        font-size: 10px;
        font-weight: 700;
    }
    .table-order > tbody > tr:nth-child(-n + 3) > td:first-child span {
        position: absolute;
        left: 0;
        right: 0;
        margin: auto;
        top: 14px;
    }
    .table-order > tbody > tr td:first-child, .table-order > tbody > tr th:first-child {
        text-align: center;
    }
</style>
<div id="main-content-wp" class="clearfix blog-page"style="background: #f7f7f7;padding-top: 25px;padding-bottom: 75px;">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="<?php echo url('/'); ?>" title=""><?php echo app('translator')->getFromJson('home.home_menu'); ?></a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.tran_history'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <?php if(count($bill) != 0): ?>
                    <table class="table table-bordered table-customize table-responsive">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->getFromJson('home.stt'); ?></th>
                                <th><?php echo app('translator')->getFromJson('home.customer_name'); ?></th>
                                <th><?php echo app('translator')->getFromJson('home.email'); ?></th>
                                <th><?php echo app('translator')->getFromJson('home.phone'); ?></th>
                                <th><?php echo app('translator')->getFromJson('home.address'); ?></th>
                                <th><?php echo app('translator')->getFromJson('home.date_founded'); ?></th>
                                <th><?php echo app('translator')->getFromJson('home.status'); ?></th>
                                <th><?php echo app('translator')->getFromJson('home.manipulation'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $stt = 0; ?>
                        <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $stt++ ;?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td><?php echo $item['fullname']; ?></td>
                                <td><?php echo $item['email']; ?></td>
                                <td><?php echo $item['phone']; ?></td>
                                <td><?php echo $item['address']; ?></td>
                                <td><?php echo $item['created_at']; ?></td>
                                <td>
                                    <?php if($item['status']== 0): ?>
                                        <span class="btn btn-xs btn-info"><?php echo app('translator')->getFromJson('home.pending'); ?></span>
                                    <?php elseif($item['status']== 1): ?>
                                        <span class="btn btn-xs btn-warning"><?php echo app('translator')->getFromJson('home.waiting'); ?></span>
                                    <?php elseif($item['status']== 2): ?>
                                        <span class="btn btn-xs btn-primary"><?php echo app('translator')->getFromJson('home.payment_confirm'); ?></span>
                                    <?php elseif($item['status']== 3): ?>
                                        <span class="btn btn-xs btn-success"><?php echo app('translator')->getFromJson('home.success'); ?></span>
                                    <?php elseif($item['status'] == 4): ?>
                                        <span class="btn btn-xs btn-danger"><?php echo app('translator')->getFromJson('home.cancel'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>

                                    <a href="<?php echo e(url('chitiethoadonkh/'.$item['id'])); ?>" class="tbody-text btn btn-xs btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <?php if($item['status'] == 0): ?>
                                        <a href="<?php echo e(url('huydonhang/'.$item['id'])); ?>" id="remove_bill" data_id="<?php echo e($item['id']); ?>" class="tbody-text btn btn-xs btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    <?php else: ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Không có lịch sử giao dịch nào!</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<script>






































</script>

<?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/pages/history/lichsugiaodich.blade.php ENDPATH**/ ?>
