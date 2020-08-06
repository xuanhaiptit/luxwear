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
        <ul class="sidebar-menu" data-widget="tree">

            <li class="<?php echo e(Request::is('admin') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('admin')); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/page/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.page'); ?>">
                    <i class="fa fa-folder"></i> <span>Trang</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/post/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.post'); ?>">
                    <i class="fa fa-folder"></i> <span>Bài viết</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/cate_post/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.cate_post'); ?>">
                    <i class="fa fa-folder"></i> <span>Danh mục bài viết</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/product/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.product'); ?>">
                    <i class="fa fa-folder"></i> <span>Sản phẩm</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/cate_product/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.cate_product'); ?>">
                    <i class="fa fa-folder"></i> <span>Danh mục sản phẩm</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/cate_product_detail/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.cate_product_detail'); ?>">
                    <i class="fa fa-folder"></i> <span>Danh mục loại sản phẩm</span>
                </a>
            </li>
            <li class="treeview <?php echo e(Request::is('admin/bill/list') ? 'active' : ''); ?> <?php echo e(Request::is('admin/bill/danhsachhuy') ? 'active' : ''); ?>">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Đơn hàng</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('get.list.bill')); ?>"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="<?php echo e(route('get.list.huy')); ?>"><i class="fa fa-circle-o"></i> Đã hủy</a></li>
                </ul>
            </li>

            <li class="<?php echo e(Request::is('admin/users/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.user'); ?>">
                    <i class="fa fa-folder"></i> <span>Khách hàng</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/slider/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.slider'); ?>">
                    <i class="fa fa-folder"></i> <span>Slider</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/comment/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.comment'); ?>">
                    <i class="fa fa-folder"></i> <span>Bình luận</span>
                </a>
            </li>
            <li class="<?php echo e(Request::is('admin/contact/list') ? 'active' : ''); ?>">
                <a href="<?php echo route('get.list.contact'); ?>">
                    <i class="fa fa-folder"></i> <span>Liên hệ</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>




<?php /**PATH D:\Online\web\ismart\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>