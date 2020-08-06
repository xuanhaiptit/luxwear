<html>
    <head>
        <title>Trang đăng nhập</title>
{{--        <meta name="csrf-token" content="{{ custom_csrf_token() }}">--}}
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/css/import/login.css') }}">
        <link href="{{ url('public/admin/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ url('public/admin/css/bootstrap/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css"/>
        <script src="{{ url('public/admin/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('public/admin/js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
    </head>
    <body>
        <form id="login_admin_form" class="box" method="post">
            @csrf
            <h1>Login</h1>
            <input type="text" name="username" value="" id="username" placeholder="Tên đăng nhập">
            <span class="error username_error" style="display: none"></span>
            <input type="password" name="password" id="password" placeholder="Mật khẩu">
            <span class="error password_error" style="display: none"></span>
            <input type="submit" name="btn_login" id="btn_login" value="Login">
            <div class="alert alert-danger error errorAll" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p class="error errorAll" style="color: red;display: none"></p>
            </div>
        </form>
        <div class="cms1-table">
            <!-- start modal confirm success !-->
            <div class="modal fade center-dialog-ie" id="confirm-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Đăng nhập</h3>
                        </div>
                        <div class="modal-body">
                            <p>Đăng nhập admin thành công</p>
                        </div>
                        <div class="modal-footer">
                            <button id="success" class="btn btn-success button-add-publisher" type="button" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal confirm delete !-->
        </div>
    </body>
</html>
<script>
    $(document).ready(function () {
        $('#login_admin_form').submit(function (e) {
            e.preventDefault();
            // alert('oke');
            $.ajax({
                url:'{{ route('post.admin.login') }}',
                type:'post',
                typeData:'json',
                data:$(this).serialize(),
                success:function(data){
                    console.log(data);
                    if(data.error == true){
                        $('.error').hide();
                        if(data.message.username != undefined){
                            $('.username_error').show().html(data.message.username);
                        }
                        if(data.message.password != undefined){
                            $('.password_error').show().html(data.message.password);
                        }
                        if(data.message.errorAll != undefined){
                            $('.errorAll').show().html(data.message.errorAll);
                        }
                    }else{
                        $('#confirm-success').modal('show');
                        $('#confirm-success').on('shown.bs.modal',function(){
                            window.location.href = "{{ route('get.admin') }}";
                        });
                    }
                },
            });
        });
    });
</script>