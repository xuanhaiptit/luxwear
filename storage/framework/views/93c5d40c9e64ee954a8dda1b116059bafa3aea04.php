<?php $__env->startSection('content'); ?>
    <form role="form" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Quản lý bài viết</h1>
            <div class="breadcrumb">
                <button type="submit" class="btn btn-success btn-sm">
                    <span class="glyphicon glyphicon-edit"></span>
                    Lưu[Sửa]
                </button>
                <a class="btn btn-danger btn-sm" href="<?php echo e(route('get.list.post')); ?>" role="button">
                    <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
                </a>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tabs-1">Home</a></li>
                        <li><a data-toggle="tab" href="#tabs-2">VN</a></li>
                        <li><a data-toggle="tab" href="#tabs-3">EN</a></li>
                    </ul>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="tab-content">
                    <div id="tabs-1" class="tab-pane fade in active">
                        <div class="col-md-12">
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="sltcate_detail">Danh mục bài viết</label>
                                    <select class="form-control" name="sltcate_post" id="sltcate_post">
                                        <?php $__currentLoopData = $cate_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($post['cate_post_id'] == $item['id']): ?>
                                                <option value="<?php echo $item['id']; ?>" selected="selected"><?php echo $item['name']; ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="post_name">Tên bài viết (vn)</label>
                                    <input type="text" class="form-control" value="<?php echo old('post_name'),isset($post) ? $post['post_name'] :null; ?>" name="post_name" id="post_name">
                                    <span class="error"><?php echo $errors->first('post_name'); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="post_name_en">Tên bài viết (en)</label>
                                    <input type="text" class="form-control" value="<?php echo old('post_name_en'),isset($post) ? $post['post_name_en'] :null; ?>" name="post_name_en" id="post_name_en">
                                    <span class="error"><?php echo $errors->first('post_name_en'); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh</label>
                                    <input type="file" name="fimage" id="exampleInputFile">
                                    <input type="hidden" name="img_current" value="<?php echo $post['image']; ?>">
                                    <span class="error"><?php echo $errors->first('fimage'); ?></span>
                                </div>
                                <div class="form-group">
                                    <img style="width: 100px;height: auto;" src="<?php echo e(asset('resources/upload/post/'.$post['image'])); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="featured_post">Bài viết nổi bật</label>
                                    <select class="form-control" name="featured_post" id="featured_post">
                                        <option <?php if($post['featured_post']== 'Bình thường'): ?>
                                                <?php echo "selected = selected"; ?> <?php endif; ?>
                                                value="Bình thường">Bình thường
                                        </option>
                                        <option <?php if($post['featured_post']== 'Nổi bật'): ?>
                                                <?php echo "selected = selected"; ?> <?php endif; ?>
                                                value="Nổi bật">Nổi bật</option>
                                    </select>
                                    <span class="error"><?php echo $errors->first('featured_post'); ?></span>
                                </div>
                            </div>

                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div id="tabs-2" class="tab-pane fade">
                        <div class="form-group">
                            <label for="desc">Mô tả ngắn (vn)</label>
                            <textarea name="desc" id="desc" class="ckeditor"><?php echo old('desc'),isset($post) ? $post['desc'] :null; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung (vn)</label>
                            <textarea name="content" id="content" class="ckeditor"><?php echo old('content'),isset($post) ? $post['content'] :null; ?></textarea>
                        </div>
                    </div>
                    <div id="tabs-3" class="tab-pane fade">
                        <div class="form-group">
                            <label for="desc">Mô tả ngắn (en)</label>
                            <textarea name="desc_en" id="desc_en" class="ckeditor"><?php echo old('desc'),isset($post) ? $post['desc_en'] :null; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung (en)</label>
                            <textarea name="content_en" id="content_en" class="ckeditor"><?php echo old('content_en'),isset($post) ? $post['content_en'] :null; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/admin/post/edit.blade.php ENDPATH**/ ?>