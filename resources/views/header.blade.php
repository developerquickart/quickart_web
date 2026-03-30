<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    
   
    <meta property="og:title" content="{{ $data_arr['title'] ?? 'QuicKart - Fresh Farm-to-Door Delivery' }}" />
    <meta property="og:description" content="{{ $data_arr['description'] ?? 'Get fresh milk, premium dairy, fruits, vegetables, and daily essentials delivered to your doorstep with QuicKart' }}" />
    <meta property="og:image" content="{{ $data_arr['image'] ?? 'https://quickart2.democheck.in/quickart_web/assets/images/QuicKart_New_Final.png' }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <!--<meta property="og:url" content="{{ $data_arr['url'] ?? 'https://quickart2.democheck.in/quickart_web/' }}" />-->
    <meta property="og:type" content="{{ $data_arr['type'] ?? 'website' }}" />
    
	
	
    
    <!-- Favicon Icon -->
    <link rel="icon" type="{{asset('assets/images/favicon.ico')}}" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Material Design Icons -->
    <link href="{{asset('assets/vendor/icons/css/materialdesignicons.min.css')}}" media="all" rel="stylesheet"
        type="text/css" />
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- FANCY BOX SCRIPT  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

    <!-- COUNTRY-CODE-SCRIPT-START -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- COUNTRY-CODE-SCRIPT-END -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="2qG49yvooIbKV2bQ623tBRZoxKxgcA9kJTd678BSLP8" />

    <script>
    function checkStickyCondition() {
        var header = document.querySelector("header");
        var main = document.querySelector("main");
        var mainHeight = main.getBoundingClientRect().height;
        console.log("Main height:", mainHeight);
        if (mainHeight > 1000) {
            // Only check scroll if main is tall enough
            if (window.pageYOffset > 0) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        } else {
            // Always remove sticky if main is too short
            header.classList.remove("sticky");
        }
    }
    window.addEventListener('scroll', checkStickyCondition);
    window.addEventListener('resize', checkStickyCondition);
    window.addEventListener('load', checkStickyCondition);
    // window.addEventListener('pageshow', function (event) {
    //     if (event.persisted || window.performance.getEntriesByType("navigation")[0].type === 'back_forward') {
    //         window.location.reload();
    //     }
    // });
    </script>

    <script>
    // window.onscroll = function() {
    //     var header = document.querySelector("header");
    //     if (window.pageYOffset > 0) {
    //         header.classList.add("sticky");
    //     } else {
    //         header.classList.remove("sticky");
    //     }
    // };
    
    // window.addEventListener('pageshow', function (event) {
    //     if (event.persisted || window.performance.getEntriesByType("navigation")[0].type === 'back_forward') {
    //         window.location.reload();
    //     }
    // });
    </script>
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-256458028-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-256458028-1');
    </script>
<!-- Google tag (gtag.js) START-->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-PY3NQWFYR1"></script>-->
    <!--<script>-->
    <!--    window.dataLayer = window.dataLayer || [];-->
    <!--    function gtag() {-->
    <!--        dataLayer.push(arguments);-->
    <!--    }-->
    <!--    gtag('js', new Date());-->
    <!--    gtag('config', 'G-PY3NQWFYR1');-->
    <!--</script>-->
    <!-- Google tag (gtag.js) END-->
    <script type="application/ld+json">
    {
    "@context": "https://schema.org/",
    "@type": "WebSite",
    "name": "Quickart",
    "url": "https://www.quickart.ae/",
    "potentialAction": {
    "@type": "SearchAction",
    "target": "{search_term_string}",
    "query-input": "required name=search_term_string"
    }
    }
    </script>
    
     <!-- Added by GA4 by ... G1 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YRNMV9TMD8"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){ dataLayer.push(arguments); }
    gtag('js', new Date());

    //gtag('config', 'G-YRNMV9TMD8'); 
    gtag('config', 'G-YRNMV9TMD8', {
        send_page_view: true
    });
    </script>
    
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '722097952778496');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=722097952778496&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
       <?php //if (!empty($pixelEventScript)) echo $pixelEventScript; ?>
    {{-- Login location step: inline critical CSS so it always wins over cache / Bootstrap reboot --}}
    <style id="login-location-critical-css">
        #login .login-location-step { max-width: 420px; margin: 0 auto; padding: 0 4px 8px; }
        #login .login-location-hero { text-align: center; margin-bottom: 1.25rem; }
        #login .login-location-hero-badge {
            display: inline-flex; align-items: center; justify-content: center;
            width: 48px; height: 48px; margin: 0 auto 0.75rem; border-radius: 14px;
            background: linear-gradient(145deg, rgba(255, 222, 52, 0.35), rgba(255, 222, 52, 0.08));
            color: var(--indigo-color, #1a237e); box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
        }
        #login .login-location-title { font-weight: 700; color: var(--indigo-color, #1a237e); line-height: 1.3; }
        #login .login-location-sub {
            font-size: 14px; line-height: 1.5; color: #5c5c6b; max-width: 340px; margin-left: auto; margin-right: auto;
        }
        #login .login-location-actions {
            display: grid; grid-template-columns: 1fr; gap: 12px; margin-bottom: 0.5rem;
        }
        @media (min-width: 480px) {
            #login .login-location-actions { grid-template-columns: 1fr 1fr; gap: 10px; }
        }
        #login button.login-location-option {
            display: flex !important; align-items: flex-start; gap: 12px; width: 100%; text-align: left;
            padding: 14px 16px !important; border-radius: 14px !important;
            border: 2px solid #e8e8ed !important; background: #fafafb !important;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06) !important;
            cursor: pointer; font-family: inherit !important; -webkit-appearance: none !important; appearance: none !important;
            color: inherit !important;
        }
        #login button.login-location-option--primary {
            border-color: rgba(255, 222, 52, 0.85) !important;
            background: linear-gradient(180deg, #fffef8 0%, #fff 100%) !important;
        }
        #login button.login-location-option:hover {
            transform: translateY(-1px); box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1) !important;
        }
        #login button.login-location-option:focus { outline: none !important; box-shadow: 0 0 0 3px rgba(255, 222, 52, 0.45) !important; }
        #login .login-location-option-icon {
            flex-shrink: 0; display: flex; align-items: center; justify-content: center;
            width: 44px; height: 44px; border-radius: 12px;
            background: rgba(255, 222, 52, 0.25); color: var(--indigo-color, #1a237e);
        }
        #login .login-location-option--outline .login-location-option-icon { background: #eef0f4 !important; }
        #login .login-location-option-title { font-weight: 700; font-size: 15px; color: var(--indigo-color, #1a237e); display: block; }
        #login .login-location-option-desc { font-size: 12px; color: #6b6b78; display: block; line-height: 1.35; }
        #login .login-location-map-panel {
            margin-top: 1.25rem; padding: 16px; border-radius: 16px;
            background: linear-gradient(180deg, #f8f9fc 0%, #fff 40%);
            border: 1px solid #e8eaf0 !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        #login .login-location-search-label { display: block; font-size: 13px; font-weight: 600; color: var(--indigo-color, #1a237e); margin-bottom: 8px; }
        #login .login-location-search-wrap { position: relative; margin-bottom: 12px; }
        #login .login-location-search-icon { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #8b8b98; pointer-events: none; z-index: 1; }
        #login .login-location-search-input.form-control {
            padding: 12px 14px 12px 44px !important; border-radius: 12px !important;
            border: 1px solid #d8dbe6 !important; font-size: 14px; background: #fff !important;
        }
        #login .login-location-map-canvas { height: 260px; width: 100%; border-radius: 12px; overflow: hidden; border: 1px solid #e0e3eb; margin-bottom: 14px; }
        #login .login-location-confirm-btn { width: 100%; padding: 12px 20px !important; font-size: 15px; border-radius: 12px !important; font-weight: 700; }
        #login .login-waitlist-card { margin-top: 1.25rem; border: none !important; background: transparent !important; padding: 0 !important; }
        #login .login-waitlist-card-inner {
            padding: 20px 18px 22px; text-align: center; border-radius: 16px;
            background: linear-gradient(160deg, #fff8e8 0%, #fff4dc 35%, #fff 100%);
            border: 1px solid #f0d9a8 !important; box-shadow: 0 8px 28px rgba(200, 150, 60, 0.12);
        }
        #login .login-waitlist-visual {
            display: inline-flex; align-items: center; justify-content: center; width: 56px; height: 56px;
            margin: 0 auto 12px; border-radius: 50%; background: #fff; color: #c48a1a;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }
        #login .login-waitlist-message { font-size: 14px; line-height: 1.55; color: #4a4035; margin-bottom: 16px; max-width: 320px; margin-left: auto; margin-right: auto; }
        #login .login-waitlist-btn { min-width: 200px; padding: 12px 28px !important; border-radius: 12px !important; font-weight: 700; }
        #login button.login-location-back {
            background: none !important; border: none !important; padding: 8px 12px !important;
            font-size: 14px; font-weight: 600; color: #6b6b78 !important; text-decoration: underline;
            cursor: pointer; -webkit-appearance: none !important; appearance: none !important;
        }
        #login button.login-location-back:hover { color: var(--indigo-color, #1a237e) !important; }
        .pac-container { z-index: 20000 !important; }
        /* Home top delivery/search block */
        .qk-delivery-eta {
            position: relative;
            z-index: 5;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 10px;
            width: 100%;
            padding: 12px 14px;
            border-radius: 14px;
            background: linear-gradient(135deg, #191919 0%, #2b2b2b 60%, #1f1f1f 100%);
            color: #fff;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.25);
            font-family: inherit;
        }
        .qk-delivery-eta__glow {
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(120deg, rgba(255, 222, 52, 0.5), transparent 40%, rgba(139, 195, 74, 0.35));
            opacity: 0.3;
            z-index: -1;
            filter: blur(4px);
            animation: qkEtaPulse 2.8s ease-in-out infinite;
        }
        .qk-delivery-eta__left {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            flex: 1;
            min-width: 0;
        }
        .qk-delivery-eta__icon {
            flex-shrink: 0;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.26);
        }
        .qk-delivery-eta__icon svg { display: block; }
        .qk-delivery-eta__label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            opacity: 0.88;
            line-height: 1.2;
        }
        .qk-delivery-eta__time {
            display: block;
            font-size: 34px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.02em;
            color: #fff;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
        }
        .qk-delivery-eta__distance-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            background: rgba(255, 222, 52, 0.2);
            border: 1px solid rgba(255, 222, 52, 0.45);
            font-size: 12px;
            font-weight: 700;
            color: #ffef9c;
            width: fit-content;
        }
        .qk-delivery-eta__hint,
        .qk-delivery-eta__location {
            display: block;
            font-size: 13px;
            opacity: 0.84;
            margin-top: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 240px;
        }
        .qk-delivery-eta__profile {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.24);
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            flex-shrink: 0;
            text-decoration: none;
        }
        .qk-delivery-eta__profile svg { display: block; }
        .qk-home-topbar-wrap {
            display: none;
            width: 100%;
            margin-bottom: 10px;
        }
        @keyframes qkEtaPulse {
            0%, 100% { opacity: 0.35; transform: scale(1); }
            50% { opacity: 0.65; transform: scale(1.02); }
        }
        @media (max-width: 991px) {
            .qk-home-topbar-wrap {
                display: block;
            }
            .qk-delivery-eta__time { font-size: 30px; }
            .qk-delivery-eta__location { max-width: 180px; }
        }
    </style>
</head>

<body>
      <!--<script src="https://chat.bot247.live/api/chatbot-script" data-chatbot-id="cb_1749551624924"></script>-->
    <div class="main-wrapper">
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-modal">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
                        <div class="login_box">
                            <div class="login_img_box">
                                <img src="{{asset('assets/images/Fresh_Farm_Delight.png')}}" alt="logo">
                            </div>
                            <div class="login_form_mainbox">
                                <!-- <form> -->
                                    <div class="login-modal-right">
                                        <div class="login_form_box login_step1" >
                                            <div class="login_logobox">
                                                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <h1 class="heading-design-h5 my-4">
                                                Login / SignUp
                                            </h1>
                                            <form action="" method="POST"
                                                enctype="multipart/form-data" class="login_form_step1">
                                                <!--@csrf-->
                                                <div class="form-group">
                                                    <label for="mobile_code">Mobile Number <span
                                                            class="required_icon">*</span></label>
                                                    <input type="text" id="mobile_code" class="form-control mobile_code"  name="number" data-index="1" required >
                                                    <input type="hidden" id="countryCode1" name="country_code" class="country_code">
                                                    <div id="error-msg" class="hide error-msg error"></div>
                                                    <!-- <div id="valid-msg" class="hide valid-msg"></div> -->
                                                    <input type="hidden" id="flagcode1" name="flag_code" class="flag_code">
                                                </div>
                                                <div class="login_submit_box">
                                                    <button type="button" class="submit_btn otp_request">Continue</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="login_form_box login_step2  d-none">
                                            <div class="login_logobox">
                                                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <div class="heading-design-h5 my-4">Verify your details</div>
                                            <p class="text-center">Your OTP has been sent to <span class="entered_mobile">921 541234566 </span> through SMS &  WhatsApp</p>

                                            <div class="alert alert-danger error-msg d-none"></div>
                                            <div class="alert alert-success success-msg d-none"></div>
                                            <form action="" class="login_form_step2">
                                                <!--@csrf-->

                                                <input type="hidden" name="number" class="number" id="number" />
                                                <input type="hidden" name="country_code" class="country_code" id="country_code" />
                                                <input type="hidden" name="user_email" class="user_email" id="user_email" />
                                                <input type="hidden" name="name" class="name" id="name" />
                                                <input type="hidden" name="referral_code" class="referral_code" id="referral_code" />
                                                <input type="hidden" name="otp" class="otp" id="otp" />
                                                <input type="hidden" name="userid" class="userid" id="userid" />
                                                
                                                <fieldset>
                                                    <div class="otp-input">
                                                        <input type="text" min="0" max="1" maxlength="1" class="form-control otp-value" required id="otp1" oninput="jumpNext(this, 'otp2')" inputmode="numeric">
                                                        <input type="text" min="0" max="1" maxlength="1" class="form-control otp-value" required id="otp2" oninput="jumpNext(this, 'otp3')" inputmode="numeric">
                                                        <input type="text" min="0" max="1" maxlength="1" class="form-control otp-value" required id="otp3" oninput="jumpNext(this, 'otp4')" inputmode="numeric">
                                                        <input type="text" min="0" max="1" maxlength="1" class="form-control otp-value" required id="otp4" inputmode="numeric">
                                                    </div>
                                                   
                                                    <div class="resend-text" id="resendWrapper">
                                                        <span id="otpText">
                                                            Didn't receive OTP?
                                                            <span id="timer">00:30</span>
                                                        </span>
                                                        <a href="javascript:void(0)" id="resendLink"
                                                            style="display:none;" onclick="resendOtp(this)">Resend
                                                            OTP</a>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group my-3 text-center">
                                                    <button type="button" class="submit_btn text-center back_login_btn">Back</button>
                                                    <button type="button" class="submit_btn text-center otp_submit">Verify & Continue</button>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="login_form_box login_step3 d-none">
                                            <div class="login_logobox">
                                                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <div class="login-location-step">
                                                <div class="login-location-hero">
                                                    <div class="login-location-hero-badge" aria-hidden="true">
                                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/></svg>
                                                    </div>
                                                    <h2 class="heading-design-h5 login-location-title mb-2">Where should we deliver?</h2>
                                                    <p class="login-location-sub text-center mb-0">Set your area once so we can show the right products, prices, and delivery options for you.</p>
                                                </div>
                                                <div class="login-location-actions">
                                                    <button type="button" class="login-location-option login-location-option--primary use_current_location_btn">
                                                        <span class="login-location-option-icon" aria-hidden="true">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm8.94 3A8.994 8.994 0 0013 3.06V1h-2v2.06A8.994 8.994 0 003.06 11H1v2h2.06A8.994 8.994 0 0011 20.94V23h2v-2.06A8.994 8.994 0 0020.94 13H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z" fill="currentColor"/></svg>
                                                        </span>
                                                        <span class="login-location-option-body">
                                                            <span class="login-location-option-title">Use current location</span>
                                                            <span class="login-location-option-desc">Fastest — we’ll detect where you are</span>
                                                        </span>
                                                    </button>
                                                    <button type="button" class="login-location-option login-location-option--outline pick_map_location_btn">
                                                        <span class="login-location-option-icon" aria-hidden="true">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z" fill="currentColor"/></svg>
                                                        </span>
                                                        <span class="login-location-option-body">
                                                            <span class="login-location-option-title">Choose on map</span>
                                                            <span class="login-location-option-desc">Search or tap to drop a pin</span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="location_picker_map_box login-location-map-panel d-none">
                                                    <label class="login-location-search-label" for="login-location-search">Search your address or landmark</label>
                                                    <div class="login-location-search-wrap">
                                                        <span class="login-location-search-icon" aria-hidden="true">
                                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" fill="currentColor"/></svg>
                                                        </span>
                                                        <input type="text" class="form-control login-location-search-input" id="login-location-search"
                                                            placeholder="e.g. Dubai Marina, building name, street" autocomplete="off">
                                                    </div>
                                                    <div id="login-location-map" class="login-location-map-canvas"></div>
                                                    <button type="button" class="submit_btn login-location-confirm-btn confirm_map_location_btn" disabled>
                                                        Confirm this location
                                                    </button>
                                                </div>
                                                <div class="out_of_range_box login-waitlist-card d-none">
                                                    <div class="login-waitlist-card-inner">
                                                        <div class="login-waitlist-visual" aria-hidden="true">
                                                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" fill="currentColor"/></svg>
                                                        </div>
                                                        <div class="out_of_range_message login-waitlist-message"></div>
                                                        <div class="join_waitlist_cta login-waitlist-cta">
                                                            <button type="button" class="submit_btn join_waitlist_btn login-waitlist-btn">Join the waitlist</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center login-location-back-wrap">
                                                    <button type="button" class="login-location-back back_to_otp_btn">← Back to verification</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="registrationLabel">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="login-modal">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-bs-label="Close"></button>
                            <div class="login_box">
                                <div class="login_img_box">
                                    <img src="{{asset('assets/images/Fresh_Farm_Delight.png')}}" alt="logo">
                                </div>
                                <div class="login_form_mainbox1">
                                  
                                    <div class="login-modal-right">
                                        <div class="login_form_box">
                                            <div class="login_logobox">
                                                <img src="{{asset('assets/images/QuicKart_logo.png')}}" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <h1 class="heading-design-h5 my-3 text-center">
                                                Registration
                                            </h1>
                                            <div id="errorMessages" style="color: red;"></div>
                                            <form action="" method="POST" enctype="multipart/form-data" class="register_form">
                                                <!--@csrf-->
                                                <div class="form-fields">
                                                    <fieldset class="form-group">
                                                        <label for="name">Name <span
                                                                class="required_icon">*</span></label>
                                                        <input type="text" name="name" id="name"
                                                            class="form-control" placeholder="Full Name" required pattern="[a-zA-Z\s]*">
                                                        <div class="error" id="error-name"></div>    
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label for="mobile_code">Mobile Number <span
                                                                class="required_icon">*</span></label>
                                                        <input type="text" id="mobile_code2" class="form-control mobile_code" name="number" required data-index="2">
                                                        <input type="hidden" id="countryCode2" name="country_code" class="country_code">
                                                        <div id="error-msg1" class="hide error-msg error"></div>
                                                        <div id="valid-msg1" class="hide valid-msg"></div>
                                                        <input type="hidden" id="flagcode2" name="flag_code" class="flagcode">
                                                        <div class="error" id="error-number"></div>    
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label for="email">Email <span
                                                                class="required_icon">*</span></label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control" placeholder="Email" required>
                                                        <div class="error" id="error-email"></div>    
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label for="referral-code">Referral Code (Optional)</label>
                                                        <input type="text" class="form-control" name="referral_code"
                                                            id="referral-code"
                                                            placeholder="Referral Code (Optional)">
                                                    </fieldset>

                                                </div>

                                                <div class="login_submit_box">
                                                      <fieldset class="d-flex gap-2">
                                                        <input type="checkbox" name="accept" id="accept" value="1"
                                                            checked required>
                                                        <label for="accept">I accept the <a
                                                                href="{{ENV('APP_URL')}}terms-conditions">Terms &
                                                                Condition</a>
                                                            & <a href="{{ENV('APP_URL')}}privacy-policy">Privacy
                                                                Policy</a></label>
                                                    </fieldset>
                                                    <div class="error" id="error-accept"></div> 
                                                    <button type="button" class="submit_btn text-center back_register_btn">Back</button>
                                                    <button type="button" class="submit_btn btn_register">Continue</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <header>
        <div class="osahan-menu">
            <div class="container-fluid">
                <div class="headerBox">
                    <div class="logoBox">
                        <a class="navbar-brand" href="{{ENV('APP_URL')}}"> 
                            <img src="{{asset('assets/images/QuicKart_logo.png')}}" 
                                alt="logo" class="img-fluid desktop-logo">
                            <img src="{{asset('assets/images/QuicKart_Icon.png')}}" 
                                alt="logo" class="img-fluid mobile-logo">
                        </a>
                        <button class="navbar-toggler navbar-toggler-white d-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="header_icons_box">
                        @if(request()->routeIs('index') || request()->is('/'))
                        <div class="qk-home-topbar-wrap">
                            <div class="qk-delivery-eta" role="status" aria-live="polite" title="Estimated delivery time" data-delivery-eta-root>
                                <span class="qk-delivery-eta__glow" aria-hidden="true"></span>
                                <div class="qk-delivery-eta__left">
                                    <div class="qk-delivery-eta__icon" aria-hidden="true">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.2 3.2.8-1.3-4.5-2.7V7z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                    <div class="qk-delivery-eta__body">
                                        <span class="qk-delivery-eta__label">Delivery in</span>
                                        <span class="qk-delivery-eta__time" data-delivery-eta-time>…</span>
                                        <span class="qk-delivery-eta__distance-chip" data-delivery-eta-distance>...</span>
                                        <span class="qk-delivery-eta__location">Your selected location</span>
                                    </div>
                                </div>
                                <a href="{{ !empty($data_arr['user_id']) ? url('profile?tag=1') : url('login') }}"
                                   class="qk-delivery-eta__profile"
                                   aria-label="Profile">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 12c2.761 0 5-2.462 5-5.5S14.761 1 12 1 7 3.462 7 6.5 9.239 12 12 12zm0 2c-3.866 0-7 2.91-7 6.5 0 .828.672 1.5 1.5 1.5h11c.828 0 1.5-.672 1.5-1.5 0-3.59-3.134-6.5-7-6.5z" fill="currentColor"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endif
                        
                        <div class="search-wrapper">
                            <div class="search-wrapBox">
                                <input type="text" id="searchInput" placeholder="Search products..." class="search-input form-control" autocomplete="off">
                                <button class="btn search_buttonBox" type="submit" id="searchBtn"> <img src="https://www.quickart.ae/assets/images/search_icon.png" alt="search" class="img-fluid search_icon"></button>
                            </div>
                             
                        </div>
                        
                        
                        <div id="search-overlay" style="
                            display: none;
                            position: fixed;
                            top: 0; left: 0; right: 0; bottom: 0;
                            background: rgba(0, 0, 0, 0.5);
                            z-index: 1000;
                            height:100vh;width:100%;">
                           
                        </div>
                        
                        <div class="loginBox" id="menu_mainbox">
                            <div class="login_cartbox_mobile">
                                <div class="mobile_profile_box" onclick="menu()">
                                    <img src="{{asset('assets/images/mobile_profile_icon.svg')}}" alt="Signin">
                                </div>
                            </div>
                            <span class="overlay"></span>
                            <div class="login_cartbox text-end">
                                <div class="toggle_close_logo" onclick="menu()">
                                    <img src="{{asset('assets/images/order-cancel.png')}}" alt="Close Icon" class="img-fluid">
                                </div>
                                <div class="mobile_text">Your Information</div>
                                <ul class="list-inline main-nav-right">
                                    
                                    @if(empty($data_arr['user_id']) && $data_arr['user_id'] == '')
                                    <li class="list-inline-item">
                                        <a href="{{ENV('APP_URL')}}login" class="top_icon" data-toggle="modal"
                                            data-bs-toggle="modal" data-bs-target="#login" title="Sign in">
                                            <div class="top_other_icon_img">
                                                <img src="{{asset('assets/images/top_login.png')}}" alt="Signin">
                                            </div>
                                            <div class="top_other_icon_heading">Sign in</div>
                                        </a>
                                    </li>
                                    @else
                                    @if(!request()->is('/'))
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}repeat-orders" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/repeat.svg')}}" alt="Repeat">
                                                </div>
                                                <div class="top_other_icon_heading">Repeat</div>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="list-inline-item cart-btn">
                                        <a href="{{url('cart?tab=1')}}" onclick="openCart()">
                                            <div class="top_other_icon_img">
                                                <img src="{{asset('assets/images/top_cart.png')}}" alt="Cart">
                                            </div>
                                            <div class="top_other_icon_heading">My Cart <small
                                                    class="cart-value">{{$totalCartCount ?? 0}}</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ENV('APP_URL')}}profile?tag=1" class="top_icon">
                                            <div class="top_other_icon_img">
                                                <img src="{{asset('assets/images/profile-icon.png')}}" alt="Signin">
                                            </div>
                                                 <div class="top_other_icon_heading">Hi, {{ session()->has('user_name') ? ucfirst(explode(' ', session('user_name'))[0]) : 'Account' }}</div>
                                             
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="top_icon" data-toggle="modal"
                                            data-bs-toggle="modal" data-bs-target="#logout">
                                            <div class="top_other_icon_img">
                                                <img src="{{asset('assets/images/top_login.png')}}" alt="Signin">
                                            </div>
                                            <div class="top_other_icon_heading">Logout</div>
                                        </a>
                                    </li>
                                     @endif
                                </ul>
                                <div class="main_menu_mobile">
                                    <ul class="main-mobile-nav">
                                        @if(!empty($data_arr['user_id']) && $data_arr['user_id'] != '')
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}profile?tag=1" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/profile-icon.png')}}" alt="Signin">
                                                </div>
                                                
                                                 <div class="top_other_icon_heading">Hi, {{ session()->has('user_name') ? ucfirst(explode(' ', session('user_name'))[0]) : 'Account' }}</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item cart-btn">
                                            <a onclick="openCart()">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/top_cart.png')}}" alt="Cart">
                                                </div>
                                                <div class="top_other_icon_heading">My Cart <small
                                                        class="cart-value">{{$totalCartCount ?? 0}}</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a onclick='openOrderPage()'>
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_order.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Order</div>
                                            </a>
                                        </li>
                                        @if(!request()->is('/'))
                                            <li class="list-inline-item">
                                                <a href="{{ENV('APP_URL')}}repeat-orders" class="top_icon">
                                                    <div class="top_other_icon_img">
                                                        <img src="{{asset('assets/images/repeat.svg')}}" alt="Repeat">
                                                    </div>
                                                    <div class="top_other_icon_heading">Repeat</div>
                                                </a>
                                            </li>
                                        @endif
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}address-list" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_location.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Address</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}coupon" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_offer.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Offers</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}notification" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_notification.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Notification</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}wallet" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/wallet.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Wallet</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}card-details" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_payment.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Card Details</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}wishlist" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu-wishlist.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Wishlist</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}notify" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu-notifyMe.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Notify Me</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}faq" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/menu_faq.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">FAQ's</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="top_icon" data-toggle="modal"
                                                data-bs-toggle="modal" data-bs-target="#logout">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/top_login.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Logout</div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(empty($data_arr['user_id']) && $data_arr['user_id'] == '')
                                        <li class="list-inline-item">
                                            <a href="{{ENV('APP_URL')}}login" class="top_icon" data-toggle="modal"
                                                data-bs-toggle="modal" data-bs-target="#login">
                                                <div class="top_other_icon_img">
                                                    <img src="{{asset('assets/images/top_login.png')}}" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Sign in</div>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

    </header>
    <main>
        @if(!empty(session('user_id')))
        <script>
        (function () {
            var roots = document.querySelectorAll('[data-delivery-eta-root]');
            if (!roots.length) return;
            fetch('{{ url('/delivery-eta') }}', { credentials: 'same-origin', headers: { 'Accept': 'application/json' } })
                .then(function (r) {
                    if (!r.ok) throw new Error('delivery-eta');
                    return r.json();
                })
                .then(function (data) {
                    if (data && (data.route_matrix_response != null || data.route_matrix_response_raw != null)) {
                        console.log('[delivery-eta] Google Route Matrix HTTP status:', data.route_matrix_http_status);
                        console.log('[delivery-eta] Google Route Matrix (parsed JSON):', data.route_matrix_response);
                        if (data.route_matrix_response_raw) {
                            console.log('[delivery-eta] Google Route Matrix (raw response body string):', data.route_matrix_response_raw);
                        }
                        if (data.route_matrix_debug_note) {
                            console.info('[delivery-eta]', data.route_matrix_debug_note);
                        }
                    }
                    var displayValue = '12 mins';
                    if (data && data.label) {
                        displayValue = data.label;
                    } else if (data && data.minutes != null) {
                        displayValue = data.minutes + ' mins';
                    }
                    roots.forEach(function (root) {
                        var timeEl = root.querySelector('[data-delivery-eta-time]');
                        var distanceEl = root.querySelector('[data-delivery-eta-distance]');
                        if (timeEl) timeEl.textContent = displayValue;
                        if (distanceEl) {
                            if (data && data.distance_label) {
                                distanceEl.textContent = data.distance_label;
                                distanceEl.style.display = 'inline-flex';
                            } else if (data && data.distance_meters != null) {
                                distanceEl.textContent = data.distance_meters + ' mtrs away';
                                distanceEl.style.display = 'inline-flex';
                            } else {
                                distanceEl.style.display = 'none';
                            }
                        }
                    });
                })
                .catch(function () {
                    roots.forEach(function (root) {
                        var timeEl = root.querySelector('[data-delivery-eta-time]');
                        var distanceEl = root.querySelector('[data-delivery-eta-distance]');
                        if (timeEl) timeEl.textContent = '12 mins';
                        if (distanceEl) distanceEl.style.display = 'none';
                    });
                });
        })();
        </script>
        @endif
        <div id="searchLoader" style="display: none; text-align: center; padding: 20px;">
            <img src="https://www.quickart.ae/assets/images/loader.gif" alt="Loading..." width="100">
        </div>
                <!-- Popup Modal -->
        <div id="suggestionsModal" style="position: fixed;
    top: 0px;
    left: 0px;
    z-index: 1000;
    display: none;
    height: 70vh;
    overflow: hidden;
    outline: 0px;
    bottom: 0;
    right:0;
    margin: auto;">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="suggestionsModalLabel">Suggested Items for You</h5>
                        <button type="button" id="suggestionsModal-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body suggestions-scroll-box" id="modalSuggestionsBox">
                    </div>
                </div>
            </div>
        </div>
        
    <!-- Navigrate to next page...G1 -->
    <script>
    let pendingProductId = null;
    let action = null;
        function openCart() {
            localStorage.setItem("selectedTab", "1");
            navigateToNextPage(href = '{{ env('APP_URL') }}cart?tab=1');
        }
        function navigateToNextPage(url) {
            const nextPageUrl = url;
            window.location.href = nextPageUrl;
        }
        function openOrderPage() {
            localStorage.setItem("selectedOrderTab", "1");
            navigateToNextPage(href = '{{ env('APP_URL') }}my-orders?tab=1');
        }
        
        function jumpNext(current, nextFieldId) {
            if (current.value.length >= 1) {
                current.value = current.value.replace(/\D/g, '').slice(0, 1); // Ensure only 1 digit
                document.getElementById(nextFieldId)?.focus();
            }
        }
        // Apply backspace clearing and focus logic
        document.querySelectorAll('.otp-value').forEach((input, index, inputs) => {
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace') {
                    if (input.value === '') {
                        if (index > 0) {
                            inputs[index - 1].focus();
                            inputs[index - 1].value = '';
                            e.preventDefault();
                        }
                    }
                }
            });
        });

        let isTimerRunning = false;
        let loginLocationMap = null;
        let loginLocationMarker = null;
        let loginLocationAutocomplete = null;
        let selectedLoginLat = null;
        let selectedLoginLng = null;
        let waitlistUserId = null;

        function resetLoginLocationStep() {
            selectedLoginLat = null;
            selectedLoginLng = null;
            waitlistUserId = null;
            $('.location_picker_map_box').addClass('d-none');
            $('.out_of_range_box').addClass('d-none');
            $('.join_waitlist_cta').removeClass('d-none');
            $('.out_of_range_message').text('You are currently outside our delivery area. Join the waitlist and we will notify you as soon as we start serving your location.');
            $('.confirm_map_location_btn').prop('disabled', true);
            $('#login-location-search').val('');
            if (loginLocationMarker) {
                loginLocationMarker.setMap(null);
                loginLocationMarker = null;
            }
        }

        function showLocationGateStep() {
            $('.login_step1').addClass('d-none');
            $('.login_step2').addClass('d-none');
            $('.login_step3').removeClass('d-none');
            resetLoginLocationStep();
        }

        function handleSuccessfulLoginAfterLocation(serverMessage) {
            if (pendingProductId) {
                if(action == 'addToCart'){
                    localStorage.setItem("selectedTab", 1);
                    addToCart(pendingProductId,1,true);
                    pendingProductId = null;
                    openCart();
                    return;
                }
                if(action == 'addToSubCart'){
                    pendingProductId = null;
                    $('#login').modal('hide');
                    $('#subscribe').modal('hide');
                    window.location.reload();
                    return;
                }
                if(action == 'wishlist'){
                    addToWishList(pendingProductId,1,true);
                    pendingProductId = null;
                    Swal.fire({
                        icon: 'success',
                        title: 'Product added!',
                        text: 'Product added in wishlist successfully !',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    window.location.href="{{url('wishlist')}}";
                    return;
                }
                if(action == 'notifyme'){
                    notifyMe(pendingProductId,pendingProductId,0,'');
                    pendingProductId = null;
                    Swal.fire({
                        icon: 'success',
                        title: 'Product added!',
                        text: 'Product added in notifylist successfully !',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    window.location.href="{{url('notify')}}";
                    return;
                }
            } else {
                if(action == 'trailpack'){
                    window.location.href="{{url('trial-pack')}}";
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful!',
                        text: serverMessage || 'Location verified. Login successful.',
                        timer: 3000,
                        showConfirmButton: false
                    });
                    window.location.href="{{route('index')}}";
                }
            }
        }

        function submitLoginLocationCheck(lat, lng) {
            var _token = jQuery('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('checkLoginLocationRange') }}",
                type: 'POST',
                data: { lat: lat, lng: lng, _token: _token },
                success: function (response) {
                    if (response.success && response.in_range === true) {
                        handleSuccessfulLoginAfterLocation(response.message);
                    } else if (response.success && response.in_range === false) {
                        waitlistUserId = response.waitlist_user_id || null;
                        if (response.already_waitlisted === true) {
                            $('.out_of_range_message').text('You are already on our waitlist. Thank you for your interest - we will let you know as soon as delivery starts in your area.');
                            $('.join_waitlist_cta').addClass('d-none');
                        } else {
                            $('.out_of_range_message').text('You are currently outside our delivery area. Join the waitlist and we will notify you as soon as we start serving your location.');
                            $('.join_waitlist_cta').removeClass('d-none');
                        }
                        $('.out_of_range_box').removeClass('d-none');
                        Swal.fire({
                            icon: 'warning',
                            title: 'Out of Range',
                            text: response.already_waitlisted === true
                                ? 'You are already on our waitlist. We will notify you when we start delivery in your area.'
                                : 'You are currently outside our delivery area. Join the waitlist to get notified when we start serving your location.'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Occured',
                            text: response.message || 'Unable to validate location.'
                        });
                    }
                },
                error: function (xhr) {
                    let msg = 'Unable to validate location. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        text: msg
                    });
                }
            });
        }

        function ensureLoginMapLoaded(callback) {
            if (window.google && window.google.maps) {
                callback();
                return;
            }

            window.initLoginLocationMap = function () {
                callback();
            };

            if (document.getElementById('login-location-map-script')) {
                return;
            }

            const script = document.createElement('script');
            script.id = 'login-location-map-script';
            script.async = true;
            script.defer = true;
            script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDjGU6WbSwLK9d7_CAVYQ1Br0DpFhx3Rt0&callback=initLoginLocationMap&libraries=places&v=weekly";
            document.head.appendChild(script);
        }

        function initLoginMapPicker(defaultLat, defaultLng) {
            const mapCenter = {
                lat: defaultLat || 25.2048,
                lng: defaultLng || 55.2708
            };

            loginLocationMap = new google.maps.Map(document.getElementById("login-location-map"), {
                center: mapCenter,
                zoom: 14,
                mapTypeId: "roadmap",
            });

            const input = document.getElementById("login-location-search");
            loginLocationAutocomplete = new google.maps.places.Autocomplete(input);
            loginLocationAutocomplete.addListener('place_changed', function () {
                const place = loginLocationAutocomplete.getPlace();
                if (!place.geometry || !place.geometry.location) {
                    return;
                }
                const lat = place.geometry.location.lat();
                const lng = place.geometry.location.lng();
                setMapLocationMarker(lat, lng);
            });

            loginLocationMap.addListener("click", function(event) {
                setMapLocationMarker(event.latLng.lat(), event.latLng.lng());
            });
        }

        function setMapLocationMarker(lat, lng) {
            selectedLoginLat = lat;
            selectedLoginLng = lng;
            if (!loginLocationMap) {
                return;
            }
            if (loginLocationMarker) {
                loginLocationMarker.setMap(null);
            }
            loginLocationMarker = new google.maps.Marker({
                position: { lat: lat, lng: lng },
                map: loginLocationMap
            });
            loginLocationMap.setCenter({ lat: lat, lng: lng });
            $('.confirm_map_location_btn').prop('disabled', false);
        }

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
                    $('.otp-value').val('');
                    startOTPTimer('timer','resendLink','otpText');
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

        
       $(document).ready(function(){
            $('#login').on('show.bs.modal', function (e) {
              $('#mobile_code').val(''); 
              $('#error-msg').html('');
              $('.otp-value').val('');
              updateCountryCodel();
            });
           
           $('.login_form_step1,.login_form_step2,.register_form').on('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    return false;
                }
            });
            
            
            $('.back_login_btn').on('click',function(){
                $('.login_step2').addClass('d-none');
                $('.login_step1').removeClass('d-none');
            });

            $('.back_to_otp_btn').on('click', function(){
                $('.login_step3').addClass('d-none');
                $('.login_step2').removeClass('d-none');
                resetLoginLocationStep();
            });
            
            $('.back_register_btn').on('click',function(){
                $('#registration').modal('hide');
                $('#login').modal('show');
            });
            
            $('.otp_request').on('click',function(){
                    var _token = jQuery('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                      url: "{{ route('loginsubmit') }}", // Change this to your actual URL
                      type: 'POST',
                      data: $('.login_form_step1').serialize()+'&_token='+_token, // Send form data
                      success: function (response) {
                        // alert('Form submitted successfully!');
                        console.log(response);
                        if(response.success == true && response.popup == 'otp'){
                            $('.entered_mobile').html(response.country_code+' '+response.number);

                            $('.number').val(response.number);
                            $('.country_code').val(response.country_code);
                            $('.user_email').val(response.email);
                            $('.name').val(response.name);
                            $('.referral_code').val(response.referral_code);
                            $('.userid').val(response.id);
                            $('.otp-value').val('');
                            $('.login_step2').removeClass('d-none');
                            $('.login_step1').addClass('d-none');

                            startOTPTimer('timer','resendLink','otpText');


                        }else if(response.success == true && response.popup == 'register'){
                            // Temporarily block registration flow for ZAP users.
                            Swal.fire({
                                icon: 'info',
                                title: 'Notice',
                                text: 'The zap feature is only for already existing users',
                                timer: 4000,
                                showConfirmButton: false
                            });

                            // $('#registration').modal('show');
                            //
                            // $('.register_form').find('.country_code').val(response.country_code);
                            // $('.register_form').find('.mobile_code').val(response.number);
                            // $('.register_form').find('.flagcode').val(response.flag_code);
                            // $('#login').modal('hide');
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Account Deleted',
                                text: response.message,
                                timer: 3000,
                                showConfirmButton: false
                            });
                            return;
                        }
                        
                      },
                      error: function (xhr, status, error) {
                        // alert('Error submitting the form.');
                        console.error(error);
                      }
                    });
                
            
                
            });

        
            $('.otp_submit').on('click',function(){
                 var _token = jQuery('meta[name="csrf-token"]').attr('content');
                // Collect all values from input fields with class 'allotp'
                let otpValues = Array.from(document.querySelectorAll('.otp-value')).map(input => input.value);

                // Join them into a single string (if needed)
                let otp = otpValues.join('');

                if(otp == ''){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        text:  'OTP is required',
                        timer: 3000,
                        showConfirmButton: false
                    });
                }else{
                    $('.otp').val(otp);

                    $.ajax({
                      url: "{{ route('loginotpsubmit') }}", // Change this to your actual URL
                      type: 'POST',
                      data: $('.login_form_step2').serialize()+'&_token='+_token, // Send form data
                      success: function (response) {
                        if(response.success == false){
                             Swal.fire({
                                icon: 'error',
                                title: 'Error Occured',
                                text:  response.message,
                                timer: 3000,
                                showConfirmButton: false
                            });
                            $('.otp-value').val('');
                        }else{
                            showLocationGateStep();
                        }
                      },
                      error: function (xhr, status, error) {
                        // alert('Error submitting the form.');
                        if (xhr.status === 422) {
                          const errors = xhr.responseJSON.errors;
                          // Loop through each error and display it after the corresponding input
                          for (let field in errors) {
                            // $(`#error-${field}`).html(`<small style="color:red;">${errors[field][0]}</small>`);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error Occured',
                                text:  errors[field][0],
                                timer: 3000,
                                showConfirmButton: false
                            });
                          }
                        }
                      }
                     });  
                }                              
                
            });

            $('.btn_register').on('click',function(){
                 var _token = jQuery('meta[name="csrf-token"]').attr('content');
                $.ajax({
                  url: "{{ route('registeruser') }}", // Change this to your actual URL
                  type: 'POST',
                  data: $('.register_form').serialize()+'&_token='+_token, // Send form data
                  success: function (response) {
                    // alert('Form submitted successfully!');
                    console.log(response);
                    if(response.success == true && response.popup == 'otp'){
                        $('#registration').modal('hide');
                        $('#login').modal('show');
                        $('.login_step2').removeClass('d-none');
                        $('.login_step1').addClass('d-none');

                        $('.entered_mobile').html(response.country_code+' '+response.number);

                        $('.number').val(response.number);
                        $('.country_code').val(response.country_code);
                        $('.user_email').val(response.email);
                        $('.name').val(response.name);
                        $('.referral_code').val(response.referral_code);
                        $('.userid').val(response.id);
                        $('.login_step2').removeClass('d-none');
                        $('.register_form').addClass('d-none');

                        startOTPTimer('timer','resendLink','otpText');
                        fbq('track', 'CompleteRegistration', {
                                value: 0.00,
                                currency: 'AED',
                                content_name: response.name + ', ' + response.number
                            });

                    }else{
                        if(response.message == 'The given data was invalid.'){

                        }
                    }
                    
                  },
                  error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                      const errors = xhr.responseJSON.errors;
                      // Loop through each error and display it after the corresponding input
                      for (let field in errors) {
                        $(`#error-${field}`).html(`<small style="color:red;">${errors[field][0]}</small>`);
                      }
                    }
                    console.error(error);
                  }
                });
                
            });

            $('.use_current_location_btn').on('click', function () {
                if (!navigator.geolocation) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Occured',
                        text: 'Your browser does not support geolocation. Please use map selection.'
                    });
                    return;
                }

                navigator.geolocation.getCurrentPosition(function (position) {
                    submitLoginLocationCheck(position.coords.latitude, position.coords.longitude);
                }, function () {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Location Permission Required',
                        text: 'Unable to fetch current location. Please select location on map.'
                    });
                }, {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 0
                });
            });

            $('.pick_map_location_btn').on('click', function () {
                $('.location_picker_map_box').removeClass('d-none');
                ensureLoginMapLoaded(function () {
                    if (!loginLocationMap) {
                        initLoginMapPicker();
                    }
                    setTimeout(function() {
                        google.maps.event.trigger(loginLocationMap, 'resize');
                        loginLocationMap.setCenter(loginLocationMap.getCenter());
                    }, 100);
                });
            });

            $('.confirm_map_location_btn').on('click', function () {
                if (selectedLoginLat === null || selectedLoginLng === null) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select Location',
                        text: 'Please select and confirm a location on map.'
                    });
                    return;
                }
                submitLoginLocationCheck(selectedLoginLat, selectedLoginLng);
            });

            $('.join_waitlist_btn').on('click', function () {
                var _token = jQuery('meta[name="csrf-token"]').attr('content');
                const sentUserId = waitlistUserId;
                console.log('join-waitlist sent user_id:', sentUserId);
                $.ajax({
                    url: "{{ route('joinWaitlist') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        user_id: sentUserId,
                        number: $('.login_form_step2 .number').val(),
                        country_code: $('.login_form_step2 .country_code').val()
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Waitlist Joined',
                            text: response.message || 'You have been added to the waitlist.'
                        }).then(() => {
                            window.location.href = "{{ route('index') }}";
                        });
                    },
                    error: function (xhr) {
                        let msg = 'Unable to join waitlist. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            msg = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Occured',
                            text: msg
                        });
                    }
                });
            });
            
        });

        
        function userLogout() {
            // Get CSRF token value
            var _token = $('meta[name="csrf-token"]').attr('content');
            // Perform AJAX request
            $.ajax({
            url: "{{ route('userLogout') }}",
            method: "POST",
            data: {},
            headers: {
            'X-CSRF-TOKEN': _token
            },
            success: function (response) {
                Swal.fire({
                title: 'Success!',
                text:'Logout successful. Have a great day!',
                icon: 'success',
                confirmButtonText: 'Ok'
                }).then((result) => {
                if (result.isConfirmed) {
                // Reload the page
                window.location.href="{{route('index')}}";
                }
                });   
            }
            });
        }
        
        document.addEventListener("DOMContentLoaded", function () {
            const loginModal = document.getElementById('login');
            // Listen for modal close event
            loginModal.addEventListener('hidden.bs.modal', function () {
                // Reset to login_step1
                document.querySelector('.login_step1').classList.remove('d-none');
                document.querySelector('.login_step2').classList.add('d-none');
                document.querySelector('.login_step3').classList.add('d-none');
                // Optionally clear form fields or error messages
                document.querySelector('.login_form_step1').reset();
                document.querySelector('.login_form_step2').reset();
                resetLoginLocationStep();
                // Optional: Reset timer or messages
                document.getElementById('otpText').style.display = 'block';
                document.getElementById('resendLink').style.display = 'none';
            });
        });
    </script>
    
    <!-- Search api call for autosuggest...G1 -->
    <script>

        function fetchSearchSuggestions(keyword) {
            const suggestionsBox = document.getElementById('modalSuggestionsBox');
            const modal = document.getElementById('suggestionsModal');
            const overlay = document.getElementById('search-overlay');
            const loader = document.getElementById('searchLoader');

            if (keyword.length < 1) {
                modal.style.display = 'none';
                overlay.style.display = 'none';
                return;
            }

            loader.style.display = 'block';
            overlay.style.display = 'block';
            const url = "https://lwjwrnpfftdevebgvcmz.supabase.co/functions/v1/smart-responder";
            const userId = "{{ session()->get('user_id') ?? '' }}";
            const deviceId = localStorage.getItem('device_id') || 'test123';

            suggestionsBox.innerHTML = '<div style="text-align:center;">Loading...</div>';
            modal.style.display = 'block';

            jQuery.ajax({
                url: url,
                method: "POST",
                contentType: "application/json",
                dataType: "json",
                data: JSON.stringify({
                    store_id: 7,
                    keyword: keyword,
                    user_id: userId ? String(userId) : "",
                    device_id: deviceId,
                    sub_cat_id: "null",
                    cat_id: "null",
                    sortprice: "null",
                    sortname: "null",
                    page: 1,
                    perpage: 20,
                    min_price: "null",
                    max_price: "null",
                    min_discount: "null",
                    max_discount: "null",
                    stock: "null",
                    byname: "null"
                }),
                success: function(data) {
                    suggestionsBox.innerHTML = '';
                    loader.style.display = 'none';

                    if (data.status === "1" && Array.isArray(data.data) && data.data.length > 0) {
                        data.data.forEach(product => {
                            const productName = typeof product === 'string' ? product : (product.product_name || '');
                            if (!productName) return;

                            const div = document.createElement('div');
                            div.textContent = productName;
                            div.classList.add('suggestion-item');
                            div.style.cursor = "pointer";
                            div.style.padding = "8px 0";
                            div.onclick = () => {
                                const searchInput = document.getElementById('searchInput');
                                const popup = document.getElementById('suggestionsModal');
                                searchInput.value = '';
                                modal.style.display = 'none';
                                popup.style.display = 'none';
                                overlay.style.display = 'none';
                                gtag('event', 'view_search_resultsW', {
                                    search_term: productName,
                                    method: 'search_input_box',
                                    page_location: window.location.href,
                                    debug_mode: true
                                });
                                const slug = encodeURIComponent(productName.toLowerCase());
                                window.location.href = `{{ENV('APP_URL')}}search?name=${slug}`;
                            };
                            suggestionsBox.appendChild(div);
                        });
                        modal.style.display = 'block';
                    } else {
                        suggestionsBox.innerHTML = '<div style="padding:10px;">No products found</div>';
                    }
                },
                error: function() {
                    loader.style.display = 'none';
                    suggestionsBox.innerHTML = '<div style="padding:10px;">Something went wrong</div>';
                }
            });
        }
    
        function navigateToNextPage(url) {
            const nextPageUrl = url;
            window.location.href = nextPageUrl;
            // console.log(window.location.href);
        }
        
          document.getElementById('searchBtn').addEventListener('click', function () {
            const input = document.getElementById('searchInput');
            const keyword = input.value.trim();
        
            if (keyword.length > 0) {
                gtag('event', 'view_search_resultsW', {
                  search_term: input.value,  
                  method: 'search_input_box',      
                  page_location: window.location.href,
                  debug_mode: true                  // true if testing in DebugView
                });
               fetchSearchSuggestions(keyword);
            }
          });
    </script>
    <!--Search overlay-->
    <script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const overlay = document.getElementById('search-overlay');
    const popup = document.getElementById('suggestionsModal');
    const popupClose = document.getElementById('suggestionsModal-close');
    
    const urlParams = new URLSearchParams(window.location.search);
    const name = urlParams.get('name');
    if (name) {
        if (window.location.href.includes('product-details')) {
            document.getElementById('searchInput').value = document.getElementById('txt_product_name').value;
        }else{
            document.getElementById('searchInput').value = decodeURIComponent(name); //.replace(/-/g, ' '));
        }
    }
    
    searchInput.addEventListener('focus', () => {
      overlay.style.display = 'block';
     // popup.style.display = 'block';
    });
    popupClose.addEventListener('click', () => {
      popup.style.display = 'none';
      overlay.style.display = 'none';
      searchInput.value = '';
      searchInput.blur();
    });
    overlay.addEventListener('click', (e) => {
      if (
        !popup.contains(e.target) &&
        !searchInput.contains(e.target)
      ) {
        popup.style.display = 'none';
        overlay.style.display = 'none';
        searchInput.value = '';
        searchInput.blur();
      }
    });
    
    searchInput.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
      event.preventDefault(); 

      const keyword = searchInput.value.trim();
      if (keyword.length > 0) {
          gtag('event', 'view_search_resultsW', {
                  search_term: searchInput.value,  
                  method: 'search_input_box',      
                  page_location: window.location.href,
                  debug_mode: true                  // true if testing in DebugView
                });
        fetchSearchSuggestions(keyword);
      }
    }
  });
  });
</script>

   