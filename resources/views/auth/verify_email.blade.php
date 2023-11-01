<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
     <!-- Required meta tags -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Url Path -->
        <meta name="server-path" content="{{ url('/') }}">
         <!-- Title Page-->
        <title>@yield('title', 'Plotsfinder')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('backend/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('backend/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('backend/vendor/wow/animate.css" rel="stylesheet')}}" media="all">

    <link href="{{asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('backend/css/theme.css')}}" rel="stylesheet" media="all">
    @yield('styles')
</head>
<body>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <h4>{{__('Thank you for registration')}} </h4>
                        <p>Please check your email that has been sent you on your email <b> {{isset($user['email']) ? $user['email'] : ''}} </b> for email confirmation. </p>

                        <form id="otp_form"  action="">
                            @csrf
                            <div class="row">
                                <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP" value="" required>
                                    </div>
                                    <div class="alert alert-success" id="success_message" style="display: none;">
                                        <strong>{{__('Success!')}} </strong>
                                    </div>
                                    <div class="alert alert-danger" id="error_message" style="display: none;">
                                        <strong>{{__('Danger!')}} </strong>
                                    </div>
                                    @php
                                        if(isset($user) && !is_null($user) && !is_null($user->otp_resend_time) && (Carbon\Carbon::parse($user->otp_resend_time)) > Carbon\Carbon::now())
                                        {
                                            $init = Carbon\Carbon::parse($user->otp_resend_time)->diffInSeconds(Carbon\Carbon::now());
                                            $minutes = floor(($init / 60) % 60);
                                            $seconds = $init % 60;
                                            echo '<a href="javascript:void(0);" onclick="resendOTP(this)" id="resendotp" class="otp_activate_palsome" style="float:right;color: #3B5998;font-weight: 500;" data-resend-time="'.Carbon\Carbon::parse($user->otp_resend_time)->diffInSeconds(Carbon\Carbon::now()).'" disabled> Resend OTP in <span id="__otp__resend_time" >'.$minutes .' minutes '.$seconds.' seconds '.'</span></a>';
                                        }
                                        elseif (isset($user) && !is_null($user) && is_null($user->otp_resend_time))
                                        {
                                            echo '<a href="javascript:void(0);" onclick="resendOTP(this)" id="resendotp" class="otp_activate_palsome" style=" float:right; color: #3B5998;font-weight: 500;" data-resend-time="0"> Resend OTP </a>';
                                        }
                                        else
                                        {
                                            echo '<a href="javascript:void(0);" onclick="resendOTP(this)" id="resendotp" class="otp_activate_palsome" style="float:right;color: #3B5998;font-weight: 500;" data-resend-time="0"> Resend OTP </a>';
                                        }
                                    @endphp
                                    {!! nl2br(isset($user) && !is_null($user) ? '<p style="color:black">Attempts left: <span id="__otp_attempts">'.$user->otp_attempts.'</span></p>' : '' )!!}

                                    @php
                                        if(isset($user) && !is_null($user) && !is_null($user->otp_time))
                                            {
                                                $otp_time = Carbon\Carbon::parse($user->otp_time)->diffInSeconds(Carbon\Carbon::now());
                                                $otp_minutes = floor(($otp_time / 60) % 60);
                                                $otp_seconds = $otp_time % 60;
                                                echo '<button type="button" onclick="CheckOTP(this)" id="checkOTP" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" data-resend-time="'.Carbon\Carbon::parse($user->otp_time)->diffInSeconds(Carbon\Carbon::now()).'" disabled> Wait for  <span id="__otp_time" >'.$otp_minutes .' minutes '.$otp_seconds.' seconds '.'</span></button>';
                                            }
                                            elseif (isset($user) && !is_null($user) && is_null($user->otp_resend_time))
                                            {
                                                echo '<button type="button" onclick="CheckOTP(this)" id="checkOTP" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" data-resend-time="0"> Continue </button>';
                                            }
                                            else
                                            {
                                                echo '<button type="button" onclick="CheckOTP(this)" id="checkOTP" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" data-resend-time="0"> Continue </button>';
                                            }
                                    @endphp

                                </div>
                            </div>
                            <input type="hidden" name="token" value="{{isset($token)?$token:''}}">
                            <input type="hidden" name="email" id="__email" value="{{isset($email)?$email:''}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- Jquery JS-->
      <script src="{{asset('backend/vendor/jquery-3.2.1.min.js')}}"></script>
      <!-- Bootstrap JS-->
      <script src="{{asset('backend/vendor/bootstrap-4.1/popper.min.js')}}"></script>
      <script src="{{asset('backend/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
      <script src="{{asset('backend/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
      <!-- Main JS-->
      <script src="{{asset('backend/js/main.js')}}"></script>
      @yield('scripts')
      <script>
        <script>

function CheckOTP(elem)
{
    var submit = $(elem);
    var otp = $("#otp").val();
    var __email = $("#__email").val();

    $('.otp-error-class').remove();
    if($.trim(otp) == '')
    {
        $("#otp").after($('<div class="otp-error-class"  ><span style="color: red;">OTP Field is compulsory</span></div>'))
        setTimeout(function () {
            $('.otp-error-class').remove();
        }, 3000);
        return;
    }
    else if($.trim(otp).length != 6)
    {
        $("#otp").after($('<div class="otp-error-class"  ><span style="color: red;">OTP should be 6 digits</span></div>'))
        setTimeout(function () {
            $('.otp-error-class').remove();
        }, 3000);
        return;
    }

    //Remove validation error msgs
    $('.reset_password_error').remove();
    button_status(submit, true, 'Checking');

    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url: "{{route('checkOTP')}}",
        data: {otp: otp, _token: token, 'email': __email},
        success: function (data) {
            button_status(submit, false);
            var status = data.status;
            if(status == 'exits'){
                $("#error_message").show();
                $("#resendotp").hide();
                $("#success_message").hide();
                $("#error_message").html("<strong>Otp Active!</strong> "+ data.message);
                $('#checkOTP').removeAttr('disabled');
                setInterval(function() {
                    window.location.href = "{{route('login')}}";
                }, 3000);
            }
            if(status == 'active'){
                $("#success_message").show();
                $("#resendotp").hide();
                $("#error_message").hide();
                $("#success_message").html("<strong>Success!</strong> "+ data.message);
                $('#checkOTP').removeAttr('disabled');
                setInterval(function() {
                    window.location.href = "{{route('home')}}";
                }, 3000);
            }

            if(status == 'otp wrong'){
                $("#error_message").show();
                // $("#resendotp").hide();
                $("#success_message").hide();
                $("#error_message").html("<strong>OTP Wrong!</strong> "+ data.message);
                if(data.__user['otp_attempts'] >= '1')
                {
                    $('#__otp_attempts').html(data.__user['otp_attempts']);
                    $('#checkOTP').removeAttr('disabled');
                }
                setTimeout(function () {
                    $("#error_message").html("");
                    $("#error_message").hide();
                },1500);

                if(data.__user['otp_time'] != null)
                {
                    let time__ = Number(data._otp_time_handle);
                    $('#checkOTP').attr('disabled', true);
                    $('#checkOTP').data('resend-time', time__);
                    $('#checkOTP').html("Wait for  <span id='__otp_time' ></span>");
                    $("#resendotp").hide();


                    var checkOTP_2_Interval = setInterval(function() {
                        if(time__ > 1)
                        {
                            time__ = time__ - 1;
                            var m = Math.floor(time__ % 3600 / 60);
                            var s = Math.floor(time__ % 3600 % 60);

                            var mDisplay = m > 0 ? m + (m == 1 ? " minute " : " minutes ") : "";
                            var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
                            $('#__otp_time').text(mDisplay + sDisplay);
                        }
                        else
                        {
                            resend_time = 0;
                            $('#checkOTP').removeAttr('disabled');
                            $('#checkOTP').data('resend-time', '0');
                            $('#checkOTP').html('Continue');
                            $("#resendotp").show();
                            $('#__otp_attempts').html('3');
                            clearInterval(checkOTP_2_Interval);
                        }

                    }, 1000);
                }
            }

            if(status == 'otp error'){
                $("#error_message").show();
                $("#success_message").hide();
                $("#error_message").html("<strong>OTP Error!</strong> "+ data.message);
                if(data.__user['otp_attempts'] >= '1')
                {
                    $('#__otp_attempts').html(data.__user['otp_attempts']);
                    $('#checkOTP').removeAttr('disabled');
                }
                setTimeout(function () {
                    $("#error_message").html("");
                    $("#error_message").hide();
                },1500);

                if(data.__user['otp_time'] != null)
                {
                    let time__ = Number(data._otp_time_handle);

                    $('#checkOTP').attr('disabled', true);
                    $('#checkOTP').data('resend-time', time__);
                    $('#checkOTP').html("Wait for  <span id='__otp_time' ></span>");
                    $("#resendotp").hide();

                    var checkOTP_2_Interval = setInterval(function() {
                        if(time__ > 1)
                        {
                            time__ = time__ - 1;
                            var m = Math.floor(time__ % 3600 / 60);
                            var s = Math.floor(time__ % 3600 % 60);

                            var mDisplay = m > 0 ? m + (m == 1 ? " minute " : " minutes ") : "";
                            var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
                            $('#__otp_time').text(mDisplay + sDisplay);
                        }
                        else
                        {
                            resend_time = 0;
                            $('#checkOTP').removeAttr('disabled');
                            $('#checkOTP').data('resend-time', '0');
                            $('#checkOTP').html('Continue');
                            $("#resendotp").show();
                            $('#__otp_attempts').html('3');
                            clearInterval(checkOTP_2_Interval);
                        }

                    }, 1000);
                }
            }

            if(status == 'no_user')
            {
                $("#error_message").show();
                $("#success_message").hide();
                $("#resendotp").hide();
                $('#__otp_attempts').html(data.__user['otp_attempts']);
                $("#error_message").html("<strong>Error!</strong> "+ data.message);
                setInterval(function() {
                    window.location.href = "{{route('home')}}";
                }, 3000);
            }
        },
        error: function(reponse)
        {
            button_status(submit, false);
        }
    });
}
function resendOTP(elem){
    var submit = $(elem);
    if(elem.hasAttribute('disabled'))
    {
        $("#error_message").show();
        $("#error_message").html("<strong>Please wait for "+$('#__otp__resend_time').html()+".</strong>");

        setTimeout(function () {
            $("#error_message").html("");
            $("#error_message").hide();
        }, 1500);

        return true;
    }
    var email = $("#__email").val();
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url: "{{route('saveOTP')}}",
        data: {email: email, _token: token},
        success: function (data) {
            button_status(submit, false);
            var status = data.status;
            if(status == 'success')
            {
                $("#success_message").show();
                $("#success_message").html("<strong>Success!</strong> "+ data.message);
                setTimeout(function () {
                    $("#success_message").html("");
                    $("#success_message").hide();
                },1500);

                if(data._opt_resend_time_handle != null && data._opt_resend_time_handle != '0')
                {
                    let time__ = Number(data._opt_resend_time_handle);
                    if(time__ > 0)
                    {
                        $('#resendotp').attr('disabled', true);
                        $('#resendotp').data('resend-time', time__);
                        $('#resendotp').html("Resend OTP in  <span id='__otp__resend_time' ></span>");
                        var resend_otp_interval = setInterval(function() {
                            if(time__ > 1)
                            {
                                time__ = time__ - 1;
                                let min = Math.floor(time__ % 3600 / 60);
                                let sec = Math.floor(time__ % 3600 % 60);

                                let minDisplay = min > 0 ? min + (min == 1 ? " minute " : " minutes ") : "";
                                let secDisplay = sec > 0 ? sec + (sec == 1 ? " second" : " seconds") : "";

                                $('#__otp__resend_time').text(minDisplay + secDisplay);
                            }
                            else
                            {
                                time__ = 0;
                                $('#resendotp').removeAttr('disabled');
                                $('#resendotp').data('resend-time', '0');
                                $('#resendotp').html('Resend OTP');
                                clearInterval(resend_otp_interval);
                            }

                        }, 1000);
                    }

                }
            }
        },
        error: function(reponse)
        {
            button_status(submit, false);
        }
    });
}

// window.addEventListener("beforeunload", function (e) {
//     var message = "Are you sure you want to leave?";
//
//     (e || window.event).returnValue = message;
//     return message;
// });

$( document ).ready(function() {
    var resend_time = Number($('#resendotp').data('resend-time'));
    if(resend_time > 0)
    {
        var resend_time_interval = setInterval(function() {
            if(resend_time > 1)
            {
                resend_time = resend_time - 1;
                var min = Math.floor(resend_time % 3600 / 60);
                var sec = Math.floor(resend_time % 3600 % 60);

                var minDisplay = min > 0 ? min + (min == 1 ? " minute " : " minutes ") : "";
                var secDisplay = sec > 0 ? sec + (sec == 1 ? " second" : " seconds") : "";
                $('#__otp__resend_time').text(minDisplay + secDisplay);
            }
            else
            {
                resend_time = 0;
                $('#resendotp').removeAttr('disabled');
                $('#resendotp').data('resend-time', '0');
                $('#resendotp').html('Resend OTP');
                clearInterval(resend_time_interval);
            }

        }, 1000);
    }

    var checkOTP_time = Number($('#checkOTP').data('resend-time'));
    if(checkOTP_time > 0)
    {
        $("#resendotp").hide();
        var checkOTP_Interval = setInterval(function() {
            if(checkOTP_time > 1)
            {
                checkOTP_time = checkOTP_time - 1;
                var m = Math.floor(checkOTP_time % 3600 / 60);
                var s = Math.floor(checkOTP_time % 3600 % 60);

                var mDisplay = m > 0 ? m + (m == 1 ? " minute " : " minutes ") : "";
                var sDisplay = s > 0 ? s + (s == 1 ? " second" : " seconds") : "";
                $('#__otp_time').text(mDisplay + sDisplay);
            }
            else
            {
                resend_time = 0;
                $('#checkOTP').removeAttr('disabled');
                $('#checkOTP').data('resend-time', '0');
                $('#checkOTP').html('Continue');
                $("#resendotp").show();
                clearInterval(checkOTP_Interval);
            }

        }, 1000);
    }
});
</script>
      </script>
  </body>

  </html>

