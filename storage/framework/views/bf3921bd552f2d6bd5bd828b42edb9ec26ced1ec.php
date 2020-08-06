<div class="col-md-3">
    <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <img src="<?php echo e(asset('resources/upload/user/'.Auth::user()['avatar'])); ?>" class="img-responsive" alt="">
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
                <?php echo e(Auth::user()['fullname']); ?>

            </div>
            <div class="profile-usertitle-job">

            </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <button type="button" class="btn btn-success btn-sm">Follow</button>
            <button type="button" class="btn btn-danger btn-sm">Message</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li class="<?php echo e(Request::is('thong-tin-ca-nhan') ? 'active' : ''); ?>">
                    <a href="<?php echo url('thong-tin-ca-nhan'); ?>">
                        <i class="fa fa-home"></i>
                        <?php echo app('translator')->getFromJson('home.info_account'); ?> </a>
                </li>
                <li class="<?php echo e(Request::is('thay-doi-mat-khau') ? 'active' : ''); ?>">
                    <a href="<?php echo url('thay-doi-mat-khau'); ?>">
                        <i class="fa fa-unlock"></i>
                        <?php echo app('translator')->getFromJson('home.change_pw'); ?> </a>
                </li>
                <li>
                    <a id="logout_account" href="<?php echo url('logout_account'); ?>">
                        <i class="fa fa-sign-out"></i>
                        <?php echo app('translator')->getFromJson('home.logout_menu'); ?> </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function(){
            // logout
            $('#logout_account').click(function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                swal({
                    title: 'Bạn muốn đăng xuất?',
                    type: "question",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then(function (e) {
                    if(e.value === true){
                        $.ajax({
                            url:url,
                            type:'get',
                            data:$(this).serialize(),
                            success:function(data){
                                console.log(data);
                                if(data.success == true){
                                    swal({
                                        title: "Thành công",
                                        text: data.message,
                                        type: "success",
                                        timer: 2000
                                    }).then(function(){
                                        location.href = '/dang-nhap';
                                    });
                                }
                            },error:function(data){
                                alert('error');
                            }
                        });
                    }else{
                        e.dismiss;
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/layout/sidebar_account.blade.php ENDPATH**/ ?>