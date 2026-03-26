<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    
   
    <meta property="og:title" content="<?php echo e($data_arr['title'] ?? 'QuicKart - Fresh Farm-to-Door Delivery'); ?>" />
    <meta property="og:description" content="<?php echo e($data_arr['description'] ?? 'Get fresh milk, premium dairy, fruits, vegetables, and daily essentials delivered to your doorstep with QuicKart'); ?>" />
    <meta property="og:image" content="<?php echo e($data_arr['image'] ?? 'https://quickart2.democheck.in/quickart_web/assets/images/QuicKart_New_Final.png'); ?>" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <!--<meta property="og:url" content="<?php echo e($data_arr['url'] ?? 'https://quickart2.democheck.in/quickart_web/'); ?>" />-->
    <meta property="og:type" content="<?php echo e($data_arr['type'] ?? 'website'); ?>" />
    
	
	
    
    <!-- Favicon Icon -->
    <link rel="icon" type="<?php echo e(asset('assets/images/favicon.ico')); ?>" href="<?php echo e(asset('assets/images/favicon.ico')); ?>">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Material Design Icons -->
    <link href="<?php echo e(asset('assets/vendor/icons/css/materialdesignicons.min.css')); ?>" media="all" rel="stylesheet"
        type="text/css" />
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
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
  
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
                                <img src="<?php echo e(asset('assets/images/Fresh_Farm_Delight.png')); ?>" alt="logo">
                            </div>
                            <div class="login_form_mainbox">
                                <!-- <form> -->
                                    <div class="login-modal-right">
                                        <div class="login_form_box login_step1" >
                                            <div class="login_logobox">
                                                <img src="<?php echo e(asset('assets/images/QuicKart_logo.png')); ?>" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <h1 class="heading-design-h5 my-4">
                                                Login / SignUp
                                            </h1>
                                            <form action="" method="POST"
                                                enctype="multipart/form-data" class="login_form_step1">
                                                <!--<?php echo csrf_field(); ?>-->
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
                                                <img src="<?php echo e(asset('assets/images/QuicKart_logo.png')); ?>" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <div class="heading-design-h5 my-4">Verify your details</div>
                                            <p class="text-center">Your OTP has been sent to <span class="entered_mobile">921 541234566 </span> through SMS &  WhatsApp</p>

                                            <div class="alert alert-danger error-msg d-none"></div>
                                            <div class="alert alert-success success-msg d-none"></div>
                                            <form action="" class="login_form_step2">
                                                <!--<?php echo csrf_field(); ?>-->

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
                                    <img src="<?php echo e(asset('assets/images/Fresh_Farm_Delight.png')); ?>" alt="logo">
                                </div>
                                <div class="login_form_mainbox1">
                                  
                                    <div class="login-modal-right">
                                        <div class="login_form_box">
                                            <div class="login_logobox">
                                                <img src="<?php echo e(asset('assets/images/QuicKart_logo.png')); ?>" alt="Logo"
                                                    class="img-fluid">
                                            </div>
                                            <h1 class="heading-design-h5 my-3 text-center">
                                                Registration
                                            </h1>
                                            <div id="errorMessages" style="color: red;"></div>
                                            <form action="" method="POST" enctype="multipart/form-data" class="register_form">
                                                <!--<?php echo csrf_field(); ?>-->
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
                                                                href="<?php echo e(ENV('APP_URL')); ?>terms-conditions">Terms &
                                                                Condition</a>
                                                            & <a href="<?php echo e(ENV('APP_URL')); ?>privacy-policy">Privacy
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
                        <a class="navbar-brand" href="<?php echo e(ENV('APP_URL')); ?>"> 
                            <img src="<?php echo e(asset('assets/images/QuicKart_logo.png')); ?>" 
                                alt="logo" class="img-fluid desktop-logo">
                            <img src="<?php echo e(asset('assets/images/QuicKart_Icon.png')); ?>" 
                                alt="logo" class="img-fluid mobile-logo">
                        </a>
                        <button class="navbar-toggler navbar-toggler-white d-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="header_icons_box">
                        
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
                                    <img src="<?php echo e(asset('assets/images/mobile_profile_icon.svg')); ?>" alt="Signin">
                                </div>
                            </div>
                            <span class="overlay"></span>
                            <div class="login_cartbox text-end">
                                <div class="toggle_close_logo" onclick="menu()">
                                    <img src="<?php echo e(asset('assets/images/order-cancel.png')); ?>" alt="Close Icon" class="img-fluid">
                                </div>
                                <div class="mobile_text">Your Information</div>
                                <ul class="list-inline main-nav-right">
                                    
                                    <?php if(empty($data_arr['user_id']) && $data_arr['user_id'] == ''): ?>
                                    <li class="list-inline-item">
                                        <a href="<?php echo e(ENV('APP_URL')); ?>login" class="top_icon" data-toggle="modal"
                                            data-bs-toggle="modal" data-bs-target="#login" title="Sign in">
                                            <div class="top_other_icon_img">
                                                <img src="<?php echo e(asset('assets/images/top_login.png')); ?>" alt="Signin">
                                            </div>
                                            <div class="top_other_icon_heading">Sign in</div>
                                        </a>
                                    </li>
                                    <?php else: ?>
                                    <li class="list-inline-item">
                                        <a href="<?php echo e(ENV('APP_URL')); ?>repeat-orders" class="top_icon">
                                            <div class="top_other_icon_img">
                                                <img src="<?php echo e(asset('assets/images/repeat.svg')); ?>" alt="Repeat">
                                            </div>
                                            <div class="top_other_icon_heading">Repeat</div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item cart-btn">
                                        <a href="<?php echo e(url('cart?tab=1')); ?>" onclick="openCart()">
                                            <div class="top_other_icon_img">
                                                <img src="<?php echo e(asset('assets/images/top_cart.png')); ?>" alt="Cart">
                                            </div>
                                            <div class="top_other_icon_heading">My Cart <small
                                                    class="cart-value"><?php echo e($totalCartCount ?? 0); ?></small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo e(ENV('APP_URL')); ?>profile?tag=1" class="top_icon">
                                            <div class="top_other_icon_img">
                                                <img src="<?php echo e(asset('assets/images/profile-icon.png')); ?>" alt="Signin">
                                            </div>
                                                 <div class="top_other_icon_heading">Hi, <?php echo e(session()->has('user_name') ? ucfirst(explode(' ', session('user_name'))[0]) : 'Account'); ?></div>
                                             
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="top_icon" data-toggle="modal"
                                            data-bs-toggle="modal" data-bs-target="#logout">
                                            <div class="top_other_icon_img">
                                                <img src="<?php echo e(asset('assets/images/top_login.png')); ?>" alt="Signin">
                                            </div>
                                            <div class="top_other_icon_heading">Logout</div>
                                        </a>
                                    </li>
                                     <?php endif; ?>
                                </ul>
                                <div class="main_menu_mobile">
                                    <ul class="main-mobile-nav">
                                        <?php if(!empty($data_arr['user_id']) && $data_arr['user_id'] != ''): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>profile?tag=1" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/profile-icon.png')); ?>" alt="Signin">
                                                </div>
                                                
                                                 <div class="top_other_icon_heading">Hi, <?php echo e(session()->has('user_name') ? ucfirst(explode(' ', session('user_name'))[0]) : 'Account'); ?></div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item cart-btn">
                                            <a onclick="openCart()">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/top_cart.png')); ?>" alt="Cart">
                                                </div>
                                                <div class="top_other_icon_heading">My Cart <small
                                                        class="cart-value"><?php echo e($totalCartCount ?? 0); ?></small>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a onclick='openOrderPage()'>
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu_order.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Order</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>repeat-orders" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/repeat.svg')); ?>" alt="Repeat">
                                                </div>
                                                <div class="top_other_icon_heading">Repeat</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>address-list" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu_location.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Address</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>coupon" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu_offer.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Offers</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>notification" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu_notification.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Notification</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>wallet" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/wallet.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Wallet</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>card-details" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu_payment.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Card Details</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>wishlist" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu-wishlist.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Wishlist</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>notify" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu-notifyMe.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Notify Me</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>faq" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu_faq.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">FAQ's</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="top_icon" data-toggle="modal"
                                                data-bs-toggle="modal" data-bs-target="#logout">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/top_login.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Logout</div>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if(empty($data_arr['user_id']) && $data_arr['user_id'] == ''): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>login" class="top_icon" data-toggle="modal"
                                                data-bs-toggle="modal" data-bs-target="#login">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/top_login.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Sign in</div>
                                            </a>
                                        </li>
                                        <?php endif; ?>
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
            navigateToNextPage(href = '<?php echo e(env('APP_URL')); ?>cart?tab=1');
        }
        function navigateToNextPage(url) {
            const nextPageUrl = url;
            window.location.href = nextPageUrl;
        }
        function openOrderPage() {
            localStorage.setItem("selectedOrderTab", "1");
            navigateToNextPage(href = '<?php echo e(env('APP_URL')); ?>my-orders?tab=1');
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
            var url = "<?php echo e(ENV('APP_URL')); ?>resend-otp";

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
            
            $('.back_register_btn').on('click',function(){
                $('#registration').modal('hide');
                $('#login').modal('show');
            });
            
            $('.otp_request').on('click',function(){
                    var _token = jQuery('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                      url: "<?php echo e(route('loginsubmit')); ?>", // Change this to your actual URL
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
                            $('#registration').modal('show');

                            $('.register_form').find('.country_code').val(response.country_code);
                            $('.register_form').find('.mobile_code').val(response.number);
                            $('.register_form').find('.flagcode').val(response.flag_code);
                            $('#login').modal('hide');
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
                      url: "<?php echo e(route('loginotpsubmit')); ?>", // Change this to your actual URL
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
                            if (pendingProductId) {
                                if(action == 'addToCart'){
                                    localStorage.setItem("selectedTab", 1);
                                    console.log('pendingProductId header',pendingProductId);
                                    addToCart(pendingProductId,1,true); //productID,change(+/-),isfromlogin(true/false)
                                    pendingProductId = null;
                                    openCart();    
                                }
                                if(action == 'addToSubCart'){
                                    console.log('pendingProductId header',pendingProductId);
                                    pendingProductId = null;
                                    $('#login').modal('hide'); 
                                    $('#subscribe').modal('hide');  
                                    window.location.reload();
                                    // $('#subscribe').modal('show'); 
                                }
                                if(action == 'wishlist'){
                                    console.log('pendingProductId header',pendingProductId);
                                    addToWishList(pendingProductId,1,true); //productID,change(+/-),isfromlogin(true/false)
                                    pendingProductId = null;
                                        Swal.fire({
                                        icon: 'success',
                                        title: 'Product added!',
                                        text: 'Product added in wishlist successfully !',
                                        timer: 3000,
                                        showConfirmButton: false
                                    });
                                    window.location.href="<?php echo e(url('wishlist')); ?>";  
                                }
                                if(action == 'notifyme'){
                                    console.log('pendingProductId header',pendingProductId);
                                    notifyMe(pendingProductId,pendingProductId,0,''); //productID,change(+/-),isfromlogin(true/false)
                                    pendingProductId = null;
                                        Swal.fire({
                                        icon: 'success',
                                        title: 'Product added!',
                                        text: 'Product added in notifylist successfully !',
                                        timer: 3000,
                                        showConfirmButton: false
                                    });
                                    window.location.href="<?php echo e(url('notify')); ?>";  
                                }
                            }else{
                                if(action == 'trailpack'){
                                    // console.log('pendingProductId header',pendingProductId);
                                    // buyNow(pendingProductId,afterLoginAction); //productID,change(+/-),isfromlogin(true/false)
                                    // pendingProductId = null;
                                    window.location.href="<?php echo e(url('trial-pack')); ?>";  
                                }else{
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'OTP Sent Successfully!',
                                        text: response.message,
                                        timer: 3000,
                                        showConfirmButton: false
                                    });
                                    window.location.href="<?php echo e(route('index')); ?>";
                                }    
                            }
                           
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
                  url: "<?php echo e(route('registeruser')); ?>", // Change this to your actual URL
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
            
        });

        
        function userLogout() {
            // Get CSRF token value
            var _token = $('meta[name="csrf-token"]').attr('content');
            // Perform AJAX request
            $.ajax({
            url: "<?php echo e(route('userLogout')); ?>",
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
                window.location.href="<?php echo e(route('index')); ?>";
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
                // Optionally clear form fields or error messages
                document.querySelector('.login_form_step1').reset();
                document.querySelector('.login_form_step2').reset();
                // Optional: Reset timer or messages
                document.getElementById('otpText').style.display = 'block';
                document.getElementById('resendLink').style.display = 'none';
            });
        });
    </script>
    
    <!-- Search api call for autosuggest...G1 -->
    <script>

        document.getElementById('searchInput').addEventListener('input', function () {
            const keyword = this.value;
            const suggestionsBox = document.getElementById('modalSuggestionsBox');
            const modal = document.getElementById('suggestionsModal');
                    const loader = document.getElementById('searchLoader');

            if (keyword.length >= 3) {
                loader.style.display = 'block';
                const _token = jQuery('meta[name="csrf-token"]').attr('content');
                const url = "<?php echo e(ENV('APP_URL')); ?>search-autosuggest-products";
        
                // Show loading or clear modal before data fetch
                suggestionsBox.innerHTML = '<div style="text-align:center;">Loading...</div>';
                modal.style.display = 'block';
                
                jQuery.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        keyword: keyword,
                        _token: _token,
                    },
                    success: function(data) {
                        suggestionsBox.innerHTML = ''; 
                        loader.style.display = 'none';
                       
                        if (data.status === "1" && Array.isArray(data.data) && data.data.length > 0) {
                            data.data.forEach(productName => {
                                const div = document.createElement('div');
                                div.textContent = productName;
                                div.classList.add('suggestion-item');
                                div.style.cursor = "pointer";
                                div.style.padding = "8px 0";
                                div.onclick = () => {
                                    const searchInput = document.getElementById('searchInput');
                                    const overlay = document.getElementById('search-overlay');
                                    const popup = document.getElementById('suggestionsModal');
                                    searchInput.value = '';
                                    modal.style.display = 'none';
                                    popup.style.display = 'none';
                                    overlay.style.display = 'none';
                                     gtag('event', 'view_search_resultsW', {
                                      search_term: productName,  
                                      method: 'search_input_box',      
                                      page_location: window.location.href,
                                      debug_mode: true                  // true if testing in DebugView
                                    });
                                    // const slug = productName.toLowerCase().replace(/ /g, '-');
                                    const slug = encodeURIComponent(productName.toLowerCase());
                                    window.location.href = `<?php echo e(ENV('APP_URL')); ?>search?name=${slug}`;
                                };
                                suggestionsBox.appendChild(div);
                               
                            });
                            modal.style.display = 'block'; 
                        } else {
                            suggestionsBox.innerHTML = '<div style="padding:10px;">No products found</div>';
                            // setTimeout(() => {
                            //     modal.style.display = 'none'; 
                            // }, 1500);
                        }
                    },
                    error: function(xhr) {
                        suggestionsBox.innerHTML = '<div style="padding:10px;">Something went wrong</div>';
                        // setTimeout(() => {
                        //     modal.style.display = 'none';
                        // }, 2000);
                    }
                });
            } else {
                modal.style.display = 'none'; // hide modal if input too short
            }
        });
    
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
            //   const slug = keyword.toLowerCase().replace(/ /g, '-');
               const slug = encodeURIComponent(keyword.toLowerCase()); //.replace(/ /g, '-'));
               window.location.href = `<?php echo e(ENV('APP_URL')); ?>search?name=${slug}`;
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
        const slug = encodeURIComponent(keyword.toLowerCase()); //.replace(/ /g, '-'));
        console.log(slug);
        const baseUrl = "<?php echo e(ENV('APP_URL')); ?>"; 
        window.location.href = `${baseUrl}search?name=${slug}`;
      }
    }
  });
  });
</script>

   <?php /**PATH C:\xampp\htdocs\quickart\quickart_web\resources\views/header.blade.php ENDPATH**/ ?>