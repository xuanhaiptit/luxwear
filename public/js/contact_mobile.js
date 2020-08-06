$(document).ready(function(){
    $('#form-contact-mobile').submit(function (e) {
        // alert('oke');
        e.preventDefault();
        $.ajax({
            url:'lien-he-mobile',
            type:'post',
            dataType:'json',
            data: $(this).serialize(),
            success:function(data){
                console.log(data);
                if(data.error == true){
                    $('.error').hide();
                    if(data.message.name_contact != undefined){
                        $('.name_contact_error').show().html(data.message.name_contact);
                    }
                    if(data.message.email_contact != undefined){
                        $('.email_contact_error').show().html(data.message.email_contact);
                    }
                    if(data.message.message != undefined){
                        $('.email_message').show().html(data.message.message);
                    }
                }else{
                    swal({
                        title: "Thành công",
                        text: data.message,
                        type: "success",
                        timer: 2000
                    }).then(function() {
                        window.location = "/";
                    });
                }
            }
        });
    });
});