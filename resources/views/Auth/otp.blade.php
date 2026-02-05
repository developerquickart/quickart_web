@include('header')
<section class="login_section">
    <div class="login_mainbox">
        <div class="login_background_img">
            <img src="{{asset('assets/images/login-background.webp')}}" alt="Login image" class="img-fluid">
        </div>
        <div class="login_content_mainbox">
            <div class="login_logobox">
                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo" class="img-fluid">
            </div>
            <h1 class="login_headingbox">
                Verify your details
            </h1>
            <p class="otp_para">
                Your OTP has been sent to <span>{{$country_code}} {{$number}}</span> through SMS & WhatsApp.
            </p>
            <form action="{{ route('loginotpsubmit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" id="otp" class="form-control" name="otp">
                    <input type="hidden" id="number" name="number" value="{{$number}}">
                    <input type="hidden" id="country_code" name="country_code" value="{{$country_code}}">
                    <input type="hidden" id="user_email" name="user_email" value="{{$email}}">
                    <input type="hidden" id="name" name="name" value="{{$name}}">
                    <input type="hidden" id="referral_code" name="referral_code" value="{{$country_code}}">
                </div>
                <div class="otp_resend">
                    <div class="didnt_get_otp">
                        Didn't receive OTP?
                    </div>
                    <div class="resend_otp">
                        <a href="javascript:void(0);" onclick="resendOtp(this)" class="submit_btn">Resend OTP</a>
                    </div>
                    <p class="time"></p>
                </div>
                <div class="login_submit_box">
                    <button class="submit_btn">Verify & Continue</button>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    let isTimerRunning = false;

    function resendOtp(element) {
        if (isTimerRunning) {
            Swal.fire({
                icon: 'warning',
                title: 'Please Wait!',
                text: 'Try again after the timer ends.',
                timer: 3000,
                showConfirmButton: false
            });
            return;
        }

        $('.resend_otp').hide();

        var number = document.getElementById('number').value;
        var country_code = document.getElementById('country_code').value;
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}resend-otp";

        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                number: number,
                country_code: country_code,
                _token: _token
            },
            success: function(result) {
                Swal.fire({
                    icon: 'success',
                    title: 'OTP Sent Successfully!',
                    text: 'Please check your phone for the OTP.',
                    timer: 3000,
                    showConfirmButton: false
                });
                timer();
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Failed to Send OTP',
                    text: 'An error occurred: ' + error,
                    timer: 3000,
                    showConfirmButton: false
                });
                $('.resend_otp').show();
            }
        });
    }

    function timer() {
        var seconds = 30;
        isTimerRunning = true;
        $('.resend_otp').hide();
        $('.time').text(formatTime(seconds));

        var countdown = setInterval(function() {
            if (seconds <= 0) {
                clearInterval(countdown);
                $('.time').text('');
                isTimerRunning = false;
                $('.resend_otp').show(); 
            } else {
                $('.time').text(formatTime(seconds));
                seconds--;
            }
        }, 1000);
    }

    function formatTime(seconds) {
        var min = Math.floor(seconds / 60);
        var sec = seconds % 60;
        return (min < 10 ? "0" : "") + min + ":" + (sec < 10 ? "0" : "") + sec;
    }

    timer();
</script>
@include('footer')