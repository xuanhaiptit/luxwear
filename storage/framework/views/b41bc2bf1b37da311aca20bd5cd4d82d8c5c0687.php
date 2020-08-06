<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('post.add.product')); ?>" id="form-add-product" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Quản lý sản phẩm</h1>
                <div class="breadcrumb">
                    <button type="submit" class="btn btn-success btn-sm" id="add_ajax">
                        <span class="glyphicon glyphicon-floppy-save"></span>
                        Lưu[Thêm]
                    </button>
                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('get.list.product')); ?>" role="button">
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
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="radio-inline"><input type="radio" name="radio_status" value="1" checked>Hiển thị</label>
                                            <label class="radio-inline"><input type="radio" name="radio_status" value="0">Không hiển thị</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="sltcate_detail">Loại sản phẩm</label>
                                            <select class="form-control" name="sltcate_detail" id="sltcate_detail">
                                                <?php $__currentLoopData = $cate_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Tên sản phẩm (vn)</label>
                                            <input type="text" class="form-control" value="<?php echo old('product_name'); ?>" name="product_name" id="product_name">
                                            <span class="error product_name_error" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name_en">Tên sản phẩm (en)</label>
                                            <input type="text" class="form-control" value="<?php echo old('product_name_en'); ?>" name="product_name_en" id="product_name_en">
                                            <span class="error product_name_en_error" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Hình ảnh</label>
                                            <input type="file" name="fimage" id="fimage">
                                            <span class="error fimage_error" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="price_new">Giá mới</label>
                                            <input type="text" class="form-control" value="<?php echo old('price_new'); ?>" name="price_new" id="price_new">
                                            <span class="error price_new_error" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="price_old">Giá cũ</label>
                                            <input type="text" class="form-control" value="<?php echo old('price_old'); ?>" name="price_old" id="price_old">
                                        </div>
                                    </div>
                                    <div class="col-md-3">

                                        <div class="form-group list_image">
                                            <label>Hình chi tiết</label>
                                            <div id="uploadFile">
                                                <input type="file" name="hinhchitiet[]" multiple>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="qty_product">Số lượng tồn kho</label>
                                            <input type="text" class="form-control" value="<?php echo old('qty_product'); ?>" name="qty_product" id="qty_product">
                                            <span class="error qty_product_error" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="selling_product">Sản phẩm bán chạy</label>
                                            <select class="form-control" name="selling_product" id="selling_product">
                                                <option value="">-- Chọn sản phẩm bán chạy --</option>
                                                <option value="Bình thường">Bình thường</option>
                                                <option value="Bán chạy">Bán chạy</option>
                                            </select>
                                            <span class="error selling_product_error" style="display: none"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="featured_product">Sản phẩm nổi bật</label>
                                            <select class="form-control" name="featured_product" id="featured_product">
                                                <option value="">-- Chọn sản phẩm nổi bật --</option>
                                                <option value="Bình thường">Bình thường</option>
                                                <option value="Nổi bật">Nổi bật</option>
                                            </select>
                                            <span class="error featured_product_error" style="display: none"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <div class="box-footer">
                            </div>
                        </div>
                        <div id="tabs-2" class="tab-pane fade">
                            <div class="form-group">
                                <label for="desc">Mô tả ngắn (vn)</label>
                                <textarea name="desc" id="desc" class="ckeditor"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung (vn)</label>
                                <textarea name="content" id="content" class="ckeditor"></textarea>
                            </div>
                        </div>
                        <div id="tabs-3" class="tab-pane fade">
                            <div class="form-group">
                                <label for="desc_en">Mô tả ngắn (en)</label>
                                <textarea name="desc_en" id="desc_en" class="ckeditor"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="content_en">Nội dung (en)</label>
                                <textarea name="content_en" id="content_en" class="ckeditor"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </form>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            $(document).on('click','#add_ajax',function(e){
                for (instance in CKEDITOR.instances) {
                    $('#' + instance).val(CKEDITOR.instances[instance].getData());
                }
                e.preventDefault();
                var url = $('#form-add-product').attr('action');
                $.ajax({
                    url:url,
                    type:'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:new FormData($('#form-add-product')[0]),
                    processData: false,
                    contentType: false,
                    success:function(data){
                        console.log(data);
                        if(data.error == true){
                            $('.error').hide();
                            if(data.message.product_name != undefined){
                                $('.product_name_error').show().html(data.message.product_name);
                            }
                            if(data.message.product_name_en != undefined){
                                $('.product_name_en_error').show().html(data.message.product_name_en);
                            }
                            if(data.message.price_new != undefined){
                                $('.price_new_error').show().html(data.message.price_new);
                            }
                            if(data.message.fimage != undefined){
                                $('.fimage_error').show().html(data.message.fimage);
                            }
                            if(data.message.selling_product != undefined){
                                $('.selling_product_error').show().html(data.message.selling_product);
                            }
                            if(data.message.featured_product != undefined){
                                $('.featured_product_error').show().html(data.message.featured_product);
                            }
                            if(data.message.qty_product != undefined){
                                $('.qty_product_error').show().html(data.message.qty_product);
                            }
                        }else{
                            swal({
                                title: "Thành công",
                                text: data.message,
                                type: "success",
                                timer: 2000
                            }).then(function() {
                                location.href = "<?php echo e(route('get.list.product')); ?>";
                            });
                        }
                    },
                    error:function(){
                        alert('error');
                    }

                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/admin/product/add.blade.php ENDPATH**/ ?>