<?php $__env->startSection('content'); ?>
    <form role="form" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Quản lý trang</h1>
                <div class="breadcrumb">
                    <button type="submit" class="btn btn-success btn-sm">
                        <span class="glyphicon glyphicon-edit"></span>
                        Lưu[Sửa]
                    </button>
                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('get.list.page')); ?>" role="button">
                        <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
                    </a>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tabs-1">VN</a></li>
                            <li><a data-toggle="tab" href="#tabs-2">EN</a></li>
                        </ul>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="tab-content">
                        <div id="tabs-1" class="tab-pane fade in active">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="page_title">Tiêu đề trang (vn)</label>
                                        <input type="text" class="form-control" value="<?php echo old('page_title'),isset($page) ? $page['page_title'] :null; ?>" name="page_title" id="page_title">
                                        <span class="error"><?php echo $errors->first('page_title'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="desc">Mô tả ngắn (vn)</label>
                                        <textarea name="desc" id="desc" class="ckeditor"><?php echo old('desc'),isset($page) ? $page['desc'] :null; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Nội dung (vn)</label>
                                        <textarea name="content" id="content" class="ckeditor"><?php echo old('content'),isset($page) ? $page['content'] :null; ?></textarea>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                            </div>
                            <div class="box-footer">
                            </div>
                        </div>
                        <div id="tabs-2" class="tab-pane fade">
                            <div class="col-md-12">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="page_title_en">Tiêu đề trang (en)</label>
                                        <input type="text" class="form-control" value="<?php echo old('page_title_en'),isset($page) ? $page['page_title_en'] :null; ?>" name="page_title_en" id="page_title_en">
                                        <span class="error"><?php echo $errors->first('page_title_en'); ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="desc_en">Mô tả ngắn (en)</label>
                                        <textarea name="desc_en" id="desc_en" class="ckeditor"><?php echo old('desc_en'),isset($page) ? $page['desc_en'] :null; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="content_en">Nội dung (en)</label>
                                        <textarea name="content_en" id="content_en" class="ckeditor"><?php echo old('content_en'),isset($page) ? $page['content_en'] :null; ?></textarea>
                                    </div>
                                </div>

                                <!-- /.box-body -->
                            </div>
                            <div class="box-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Online\web\ismart\resources\views/admin/page/edit.blade.php ENDPATH**/ ?>