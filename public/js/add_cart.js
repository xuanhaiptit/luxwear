$(document).ready(function(){
    $('.product-icon-container a').click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function(response) {
                toastr["success"]("Thêm giỏ hàng thành công", "Thành công");
                location.reload();
            }
        });
        return false;
    });

    $('.buy_now_cart a').click(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            success: function(response) {
                window.location.href = 'pages/cart/gio-hang';
            }
        });
        return false;
    });
});
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
