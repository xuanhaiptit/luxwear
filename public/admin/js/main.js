$(document).ready(function () {

    var height = $(window).height() - $('#footer-wp').outerHeight(true) - $('#header-wp').outerHeight(true);
    $('#content').css('min-height', height);

//  CHECK ALL
    var checkbox = $('.list-table-wp tbody tr td input[type="checkbox"]');
//     // var checkbox_check = $('.list-table-wp tbody tr td input[type="checkbox"]:checked');
//     var checkAll = $('input[name="checkAll"]');
//     $(checkAll).click(function () {
//
//         // if($(this).is(':checked',true)){
//         //     $(checkbox).prop("checked", true);
//         // }else{
//         //     $(checkbox).prop("checked", false);
//         // }
//         var status = $(this).prop('checked');
//         $('.list-table-wp tbody tr td input[type="checkbox"]').prop("checked", status);
//     });


// EVENT SIDEBAR MENU
    $('#sidebar-menu .nav-item .nav-link .title').after('<span class="fa fa-angle-right arrow"></span>');
    var sidebar_menu = $('#sidebar-menu > .nav-item > .nav-link');
    sidebar_menu.on('click', function () {
        if (!$(this).parent('li').hasClass('active')) {
            $('.sub-menu').slideUp();
            $(this).parent('li').find('.sub-menu').slideDown();
            $('#sidebar-menu > .nav-item').removeClass('active');
            $(this).parent('li').addClass('active');
            return false;
        } else {
            $('.sub-menu').slideUp();
            $('#sidebar-menu > .nav-item').removeClass('active');
            return false;
        }
    });
});
