<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="padding: 13px!important;">
            <div class="pull-left image">
                <img src="{{ asset('resources/upload/admin/'.Auth::guard('admin')->user()->avatar) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{!! Auth::guard('admin')->user()->fullname !!}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                <a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/page/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.page') !!}">
                    <i class="fa fa-folder"></i> <span>Trang</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/post/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.post') !!}">
                    <i class="fa fa-folder"></i> <span>Bài viết</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/cate_post/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.cate_post') !!}">
                    <i class="fa fa-folder"></i> <span>Danh mục bài viết</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/product/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.product') !!}">
                    <i class="fa fa-folder"></i> <span>Sản phẩm</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/cate_product/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.cate_product') !!}">
                    <i class="fa fa-folder"></i> <span>Danh mục sản phẩm</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/cate_product_detail/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.cate_product_detail') !!}">
                    <i class="fa fa-folder"></i> <span>Danh mục loại sản phẩm</span>
                </a>
            </li>
            <li class="treeview {{ Request::is('admin/bill/list') ? 'active' : '' }} {{ Request::is('admin/bill/danhsachhuy') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Đơn hàng</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('get.list.bill') }}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{ route('get.list.huy') }}"><i class="fa fa-circle-o"></i> Đã hủy</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/users/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.user') !!}">
                    <i class="fa fa-folder"></i> <span>Khách hàng</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/slider/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.slider') !!}">
                    <i class="fa fa-folder"></i> <span>Slider</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/comment/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.comment') !!}">
                    <i class="fa fa-folder"></i> <span>Bình luận</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/contact/list') ? 'active' : '' }}">
                <a href="{!! route('get.list.contact') !!}">
                    <i class="fa fa-folder"></i> <span>Liên hệ</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>




