<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>LUXWEAR STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link href="{!! url('public/css/emojionearea.min.css') !!}" rel="stylesheet" type="text/css"/>

        <link href="{!! url('public/reset.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! url('public/css/carousel/owl.carousel.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! url('public/css/carousel/owl.theme.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! url('public/css/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! url('public/style.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! url('public/toastr/toastr.min.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! url('public/responsive.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

        <link rel="stylesheet" href="{!! url('public/js/sweetalert/sweetalert2.min.css') !!}">
        <script src="{!! url('public/js/sweetalert/sweetalert2.all.min.js') !!}"></script>

        <script src="{!! url('public/js/jquery-2.2.4.min.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/toastr/toastr.min.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/elevatezoom-master/jquery.elevatezoom.js') !!}" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script src="{!! url('public/js/carousel/owl.carousel.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/emojionearea.min.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/validateEngine/jquery.validationEngine.min.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/validateEngine/jquery.validationEngine-en.min.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/main.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/contact.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/add_cart.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/form_validation.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/contact_mobile.js') !!}" type="text/javascript"></script>
        <script src="{!! url('public/js/ajax.js') !!}" type="text/javascript"></script>
        <script src="{{ url('public/admin/js/myscript.js') }}" type="text/javascript"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
        <script type="text/javascript" language="JavaScript">
            function confirm_delete($mess) {
                return confirm($mess);
            }
        </script>
        @yield('script')
    </head>
    <body>
        @include('layout.header')
        @yield('content')
        @include('layout.footer')
    </body>
</html>
<script>
    $(document).ready(function() {
        $('#emojionearea_contact').emojioneArea({
            pickerPosition: "bottom",
            tonesStyle: "bullet",
            search:false,
        });
    });
</script>
