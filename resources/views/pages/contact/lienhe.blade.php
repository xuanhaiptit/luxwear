@extends('layout.index')
@section('content')
    <style>
        html, body {
            min-height: 100%;
        }
        body{
            background-image: url('{{ asset('public/images/544750.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }
        .form-control {
            border-color: #d7d7d7;
            box-shadow: none;
        }
        .form-control:focus, .btn:focus {
            border-color: #a177ff;
            box-shadow: 0 0 8px #c2a8ff;
        }
        .contact-form {
            width: 500px;
            margin: 0 auto;
            padding: 40px 0;
        }
        .contact-form form {
            background: #fff;
            padding: 40px;
            border-radius: 6px;
        }
        .contact-form h1 {
            text-align: center;
            font-size: 50px;
            margin: 0 0 15px;
        }
        .contact-form .form-group {
            margin-bottom: 20px;
        }
        .contact-form .form-control, .contact-form .btn  {
            border-radius: 2px;
            min-height: 40px;
            transition: all 0.5s;
            outline: none;
        }
        .contact-form .btn {
            background: #a177ff;
            font-size: 16px;
            min-height: 50px;
            border: none;
        }
        .contact-form .btn:hover, .contact-form .btn:focus {
            background: #8048ff;
            outline: none;
        }
        .contact-form .btn i {
            margin-right: 5px;
        }
        .contact-form label {
            color: #bbb;
            font-weight: normal;
        }
        .contact-form textarea {
            resize: vertical;
        }
        .hint-text {
            font-size: 15px;
            text-align: center;
            padding-bottom: 25px;
            opacity: 0.8;
        }
    </style>
    <div class="contact-form">
        <form action="" method="post" id="form-contact-mobile">
            @csrf
            <h1>Contact Us</h1>
            <div class="form-group">
                <label for="name_contact">Name</label>
                <input type="text" class="form-control" name="name_contact" value="{!! old('name_contact') !!}">
                <span class="error name_contact_error" style="display: none;color:red"></span>
            </div>
            <div class="form-group">
                <label for="email_contact">Email Address</label>
                <input type="email" class="form-control" name="email_contact" value="{!! old('email_contact') !!}">
                <span class="error email_contact_error" style="display: none;color:red"></span>
            </div>
            <div class="form-group">
                <label for="inputMessage">Message</label>
                <textarea class="form-control" name="message" id="emojionearea_contact_mobile" rows="5"></textarea>
                <span class="error email_message" style="display: none;color:red"></span>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-paper-plane"></i> Send Message</button>
        </form>
    </div>
@stop
@section('script')
    <script>
        $(document).ready(function() {
            $('#emojionearea_contact_mobile').emojioneArea({
                pickerPosition: "bottom",
                tonesStyle: "bullet",
                search:false,
            });
        });
    </script>
@stop

