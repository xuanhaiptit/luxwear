<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <title>Quản lý LUXWEAR</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="<?php echo e(url('public/admin/js/bootstrap/bootstrap-toggle.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(url('public/admin/css/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>

    <!-- Page level plugin CSS-->
    <link href="<?php echo e(url('public/admin/datatables/dataTables.bootstrap4.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <!-- Custom styles for this template-->

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('public/admin/css/import/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('public/admin/css/import/responsive.css')); ?>">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/dist/css/skins/_all-skins.min.css')); ?>">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo url('public/admin/js/sweetalert/sweetalert2.min.css'); ?>">


    <script src="<?php echo url('public/admin/js/sweetalert/sweetalert2.all.min.js'); ?>"></script>

    <script src="<?php echo e(url('public/admin/js/jquery-2.2.4.min.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(url('public/admin/js/bootstrap/bootstrap-toggle.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('public/admin/js/plugins/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('public/admin/js/main.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('public/admin/js/myscript.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(url('public/admin/js/check.js')); ?>" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
    <script src="<?php echo e(asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo e(asset('public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('public/admin/bower_components/fastclick/lib/fastclick.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('public/admin/dist/js/adminlte.min.js')); ?>"></script>
    <!-- AdminLTE for demo purposes -->







    <?php echo $__env->yieldContent('script'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo e(url('admin')); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Is</b>mart</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Is</b>mart</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e(asset('resources/upload/admin/'.Auth::guard('admin')->user()->avatar)); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo Auth::guard('admin')->user()->fullname; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo e(asset('resources/upload/admin/'.Auth::guard('admin')->user()->avatar)); ?>" class="img-circle" alt="User Image">
                            <p>
                                <?php echo Auth::guard('admin')->user()->fullname; ?>

                            </p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center btn btn-success">
                                    <a href="<?php echo e(url('admin/admin/update/'.Auth::guard('admin')->user()->id)); ?>">Profile</a>
                                </div>
                                <div class="col-xs-4 text-center btn btn-success">
                                    <a href="<?php echo e(url('admin/admin/change_pass/'.Auth::guard('admin')->user()->id)); ?>">Change Pw</a>
                                </div>
                                <div class="col-xs-4 text-center btn btn-success">
                                    <a href="<?php echo e(url('logout')); ?>">Logout</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="padding: 13px!important;">
            <div class="pull-left image">
                <img src="<?php echo e(asset('resources/upload/admin/'.Auth::guard('admin')->user()->avatar)); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo Auth::guard('admin')->user()->fullname; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>
    <!-- /.sidebar -->
</aside>
<?php echo $__env->yieldContent('content'); ?>








<div class="control-sidebar-bg"></div>

</body>
</html>
<?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>
