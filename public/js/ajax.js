$(document).ready(function () {
    $('#form-bs-register').submit(function (e) {
        e.preventDefault();
        var url = 'dang-ky';
        // $('#confirm-success').modal('show');
        // alert('oke');
        $.ajax({
            url:url,
            type:'post',
            typeData:'json',
            data:$(this).serialize(),
            success:function(data){
                // console.log(data);
                if(data.error == true){
                    $('.error').hide();
                    if(data.message.fullname != undefined){
                        $('.fullname_error').show().html(data.message.fullname);
                    }
                    if(data.message.username != undefined){
                        $('.username_error').show().html(data.message.username);
                    }
                    if(data.message.password != undefined){
                        $('.password_error').show().html(data.message.password);
                    }
                    if(data.message.email != undefined){
                        $('.email_error').show().html(data.message.email);
                    }
                    if(data.message.address != undefined){
                        $('.address_error').show().html(data.message.address);
                    }
                    if(data.message.phone != undefined){
                        $('.phone_error').show().html(data.message.phone);
                    }
                    if(data.message.confirm_password != undefined){
                        $('.confirm_password_error').show().html(data.message.confirm_password);
                    }
                    if(data.message.gender != undefined){
                        $('.gender_error').show().html(data.message.gender);
                    }
                    if(data.message.errorAll != undefined){
                        $('.errorAll').show().html(data.message.errorAll);
                    }
                    if(data.message.captcha != undefined){
                        $('.captcha_error').show().html(data.message.captcha);
                        $('#password').val('');
                        $('#confirm_password').val();
                    }
                }else{
                    swal({
                        title: "Thành công",
                        text: data.message,
                        type: "success",
                        timer: 2000
                    }).then(function() {
                        window.location = "dang-nhap";
                    });
                }
            },
            complete:function(){
                $('body, html').animate({scrollTop:$('#form-bs-register').offset().top}, 'slow');
            }
        });
    });

    $('#form-bs-login').submit(function (e) {
        e.preventDefault();
        var url = 'dang-nhap';

        $.ajax({
            url:url,
            type:'post',
            typeData:'json',
            data:$(this).serialize(),
            success:function(data){
                // console.log(data);
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
                        swal({
                            // position: 'top-end',
                            type: 'error',
                            text:'Tên đăng nhập hoặc mật khẩu không chính xác!',
                            title: 'Thất bại',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#username').val('');
                        $('#password').val('');
                    }
                }else{
                    swal({
                        title: "Thành công",
                        text: data.message,
                        type: "success",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location = "trang-chu";
                    });
                }
            },
        });
    });

    // change password
    $('.change_password_bs').submit(function (e) {
        e.preventDefault();
        // var url = $(this).attr('action');
        $.ajax({
            url:'thay-doi-mat-khau',
            type:'post',
            dataType:'json',
            data:$(this).serialize(),
            success:function(data){
                console.log(data);
                if(data.error == true){
                    $('.error').hide();
                    if(data.message.password_old != undefined){
                        $('.password_old_error').show().html(data.message.password_old);
                    }
                    if(data.message.password_new != undefined){
                        $('.password_new_error').show().html(data.message.password_new);
                    }
                    if(data.message.password_confirm != undefined){
                        $('.password_confirm_error').show().html(data.message.password_confirm);
                    }
                    if(data.message.errorAll != undefined){
                        $('.errorAll').show().html(data.message.errorAll);
                    }
                }else{
                    swal({
                        title: "Thành công",
                        text: data.message,
                        type: "success",
                        showConfirmButton: true,
                        timer: 1500
                    }).then(function() {
                        window.location = "logout_change_pass";
                    });
                }
            }
        });
    });

    // update info account
    $('#update_customer').click(function (e) {
        e.preventDefault();
        $.ajax({
            url:$('#info_customer').attr('action'),
            type:'POST',
            data : new FormData($('#info_customer')[0]),
            processData: false,
            contentType: false,
            success:function(data){
                if(data.error == true){
                    $('.error').hide();
                    if(data.message.display_name != undefined){
                        $('.fullname_error').show().html(data.message.display_name);
                    }
                    if(data.message.user_email != undefined){
                        $('.email_error').show().html(data.message.user_email);
                    }
                    if(data.message.user_address != undefined){
                        $('.address_error').show().html(data.message.user_address);
                    }
                    if(data.message.user_tel != undefined){
                        $('.phone_error').show().html(data.message.user_tel);
                    }
                    if(data.message.sltgender != undefined){
                        $('.gender_error').show().html(data.message.sltgender);
                    }
                }else{
                    swal({
                        title: "Thành công",
                        text: data.message,
                        type: "success",
                        timer: 2000
                    }).then(function() {
                        window.location = "thong-tin-ca-nhan";
                    });
                }
            },
        });
    });

    // dat hang ajax
    $('#form-checkout').submit(function (e) {
        e.preventDefault();
        var url = 'checkout';
        $.ajax({
            url:url,
            type:'post',
            typeData:'json',
            data:$(this).serialize(),
            success:function(data){
                console.log(data);
                if(data.error == true){
                    $('.error').hide();
                    if(data.message.fullname != undefined){
                        $('.fullname_error').show().html(data.message.fullname);
                    }
                    if(data.message.email != undefined){
                        $('.email_error').show().html(data.message.email);
                    }
                    if(data.message.address != undefined){
                        $('.address_error').show().html(data.message.address);
                    }
                    if(data.message.phone != undefined){
                        $('.phone_error').show().html(data.message.phone);
                    }
                }else{
                    swal({
                        title: "Thành công",
                        text: data.message,
                        type: "success",
                        timer: 2000
                    }).then(function() {
                        window.location = "care_customer";
                    });
                }
            },
        });
    });
});
