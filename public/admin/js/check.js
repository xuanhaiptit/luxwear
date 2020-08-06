$(document).ready(function(){
    //  CHECK ALL

    $('input[name="checkAll"]').click(function () {

        var checkbox = $('tbody tr td input[type="checkbox"]');
        if($(this).is(':checked',true)){
            $(checkbox).prop("checked", true);
        }else{
            $(checkbox).prop("checked", false);
        }
        if($('.delete_checkbox').is(':checked')){
            $('.delete_checkbox').parent().parent().addClass('removeRow');
        }else{
            $('.delete_checkbox').parent().parent().removeClass('removeRow');
        }
    });

    // click checkbox -> red
    $(document).on('click','.delete_checkbox',function(){
        if($(this).is(':checked')){
            $(this).parent().parent().addClass('removeRow');
        }else{
            $(this).parent().parent().removeClass('removeRow');
        }
    });

    // delete checkbox
    $('#delete_button').on('click', function() {
        var id = [];
        var checkbox = $('table tbody tr td input[type="checkbox"]:checked');
        $('.delete_checkbox:checked').each(function () {
            id.push($(this).attr('data-id'));
        });
        if (id.length > 0) {
            $.ajax({
                url: "delete_all",
                type: "delete",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {id: id},
                success: function (data) {
                    $('.removeRow').fadeOut(1500);
                    $('.table tbody tr td input[type="checkbox"]').prop("checked", false);
                    $('.table thead tr th input[type="checkbox"]').prop("checked",false);
                }
            });
        }
    });
});


