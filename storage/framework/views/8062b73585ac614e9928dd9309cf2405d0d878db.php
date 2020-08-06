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
        background-color: #535353!important;
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
                        <a href="" title=""><?php echo app('translator')->getFromJson('home.detail'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table table-bordered table-customize table-responsive">
                    <thead>
                        <tr>
                            <th class="thead-text"><?php echo app('translator')->getFromJson('home.stt'); ?></th>
                            <th class="thead-text"><?php echo app('translator')->getFromJson('home.pr_photo'); ?></th>
                            <th class="thead-text"><?php echo app('translator')->getFromJson('home.pr_code'); ?></th>
                            <th class="thead-text"><?php echo app('translator')->getFromJson('home.pr_price'); ?></th>
                            <th class="thead-text"><?php echo app('translator')->getFromJson('home.quality'); ?></th>
                            <th class="thead-text"><?php echo app('translator')->getFromJson('home.amount'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 0?>
                    <?php $__currentLoopData = $bill_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $stt ++?>
                        <tr>
                            <td width="5%" class="thead-text"><?php echo $stt; ?></td>
                            <td width="10%" class="thead-text">
                                <div class="thumb" style="    display: inline-block;width: 100px;min-height: 100px;overflow: hidden;">
                                    <img src="<?php echo e(asset('resources/upload/product/'.$item['image'])); ?>" alt="">
                                </div>
                            </td>
                            <td width="40%" class="thead-text"><?php echo $item['product_name']; ?></td>
                            <td width="20%" class="thead-text"><?php echo number_format($item['price_new'],0,",","."); ?> VNĐ</td>
                            <td width="5%" class="thead-text"><?php echo $item['quality']; ?></td>
                            <td width="20%" class="thead-text"><?php echo number_format($item['sub_total'],0,",","."); ?> VNĐ</td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div><br>
        <div class="section" style="float: left">
            <a class="btn btn-info" href="<?php echo e(url('lichsugiaodich/'.Auth::user()->id)); ?>"><?php echo app('translator')->getFromJson('home.come_back'); ?></a>
        </div>
        <div class="section" style="float: right;font-size: 20px;font-weight: 300">
            <div class="section-detail">
                <p class="btn btn-xs btn-success"><?php echo app('translator')->getFromJson('home.total_qty'); ?>:</p> <span><?php echo e($total_qty); ?> <?php echo app('translator')->getFromJson('home.product'); ?></span><br>
                <p class="btn btn-xs btn-success"><?php echo app('translator')->getFromJson('home.total_orders'); ?>:</p> <span><?php echo number_format($total_price,0,",",","); ?> đ</span>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/pages/history/chitiethoadonkh.blade.php ENDPATH**/ ?>
