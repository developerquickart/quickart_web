<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>Best Grocery Delivery App Dubai | Grocery App Dubai | Quickart App</title>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    
    <!-- COUNTRY-CODE-SCRIPT-START -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    
     <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>

    <meta property="og:title" content="Quickart" />
    <meta property="og:site_name" content="Quickart" />
    <meta property="og:url" content="https://testblog.democheck.in/quickcart/" />
    <meta property="og:description" content="Quickart" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://testblog.democheck.in/assets/images/QuicKart_logo.png" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

</head>

<body>
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
                                                        <input type="text" min="0" max="1" max-length="1"
                                                            class="form-control otp-value" required id="otp1" oninput="jumpNext(this, 'otp2')">
                                                        <input type="text" min="0" max="1" max-length="1"
                                                            class="form-control otp-value" required id="otp2" oninput="jumpNext(this, 'otp3')">
                                                        <input type="text" min="0" max="1" max-length="1"
                                                            class="form-control otp-value" requiredn id="otp3" oninput="jumpNext(this, 'otp4')">
                                                        <input type="text" min="0" max="1" max-length="1"
                                                            class="form-control otp-value" required id="otp4">
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
    <!-- Search box start -->
    <header>
        <div class="osahan-menu search_page">
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
                        <div class="searchBox">
                            <form action="<?php echo e(ENV('APP_URL')); ?>search" method="GET" class="search-box">
                                <input type="text" name="name" class="search-input form-control" id="searchInput" 
                                    placeholder="Search Product" aria-label="Search product here ...">
                                <button class="btn search_buttonBox" type="submit"> <img
                                        src="<?php echo e(asset('assets/images/search_icon.png')); ?>" alt="search"
                                        class="img-fluid search_icon"></button>
                                <!-- <a href="<?php echo e(ENV('APP_URL')); ?>" class="cancel-button">Cancel</a> -->
                            </form>
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
                                        <a href="javascript:void(0);" onclick="openCart()">
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
                                            <a href="<?php echo e(ENV('APP_URL')); ?>profile?tag=3" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu_payment.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">Payment Details</div>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?php echo e(ENV('APP_URL')); ?>profile?tag=6" class="top_icon">
                                                <div class="top_other_icon_img">
                                                    <img src="<?php echo e(asset('assets/images/menu_order.png')); ?>" alt="Signin">
                                                </div>
                                                <div class="top_other_icon_heading">My Shopping</div>
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
      <!-- Recent Search Start -->
    <?php if(!empty($recentSearch)): ?>
    <section class="shop-list section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="search-item">
                    <?php $__currentLoopData = $recentSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentsearch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(ENV('APP_URL')); ?>search?keyword=<?php echo e(Str::slug($recentsearch['keyword'])); ?>" class="search_item_list">
                        <span class="search-text"><span class="icon">&#x21bb;</span>
                            <?php echo e($recentsearch['keyword']); ?></span>
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Recent Search End -->
    <!-- Trending Brands start -->
    <section class="top-category section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h5 class="heading-design-h5">Trending Brands</h5>
                    </div>
                    <div class="brand-slider-wrapper">
                        <div class="owl-carousel owl-carousel-brands owl-theme">
                            <?php $__currentLoopData = array_slice($brandList, 0,ceil(count($brandList) / 2)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="brand_list_item">
                                <div class="brand_item_box">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>search?name=<?php echo e(Str::slug($brand['title'])); ?>">
                                        <img class="img-fluid" src="<?php echo e($brand['image']); ?>" alt="Product">
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- </div>
                        <div class="owl-carousel brand-slider owl-theme"> -->
                            <?php $__currentLoopData = array_slice($brandList,ceil(count($brandList) / 2)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="brand_list_item">
                                <div class="brand_item_box">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>search?name=<?php echo e(Str::slug($brand['title'])); ?>">
                                        <img class="img-fluid" src="<?php echo e($brand['image']); ?>" alt="Product">
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trending Brands end -->

    <!-- Trending Products start -->
    <section class="shop-list section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="section-header">
                    <h5 class="heading-design-h5"><?php echo e($name); ?></h5>
                </div>

                <!-- <div class="owl-carousel product-slider owl-theme">
                    <?php $__currentLoopData = array_slice($productList, 0, ceil(count($productList) / 2)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$product['stock'] == 0): ?>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <?php if($product['discountper'] > 0): ?>
                                    <div class="discount_text"><?php echo e(number_format($product['discountper'], 2)); ?><span>Off</span></div>
                                    <?php endif; ?>
                                    <?php if($product['country_icon'] != null || $product['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($product['country_icon']); ?>" alt="flag">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn" data-varient-id="<?php echo e($product['varient_id']); ?>">
                                            <img class="wishlist-icon"
                                                src="<?php echo e(asset($product['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-details?product_id=<?php echo e($product['product_id']); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($product['product_image']); ?>" alt="Product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($product['product_name']); ?></div>
                                    <div class="product_weight"><span><?php echo e($product['quantity']); ?> <?php echo e($product['unit']); ?></span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <div class="product_detail">
                                            <p class="offer-price">AED <span><?php echo e(number_format($product['price'], 2)); ?></span><br>
                                                <?php if($product['price'] != $product['mrp']): ?>
                                                <span class="regular-price">AED
                                                    <span><?php echo e(number_format($product['mrp'], 2)); ?></span></span>
                                            </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <div class="qtyBox" data-varient-id="<?php echo e($product['varient_id']); ?>">
                                                <button class="qty-btn qty-btn-minus change-qty" type="button" data-varient-id="<?php echo e($product['varient_id']); ?>" data-change="-1">-</button>
                                                <input type="text" name="qty" value="<?php echo e($product['cart_qty']); ?>" class="input-qty input-rounded" min="0">
                                                <input type="hidden" name="stock" id="stock" value="<?php echo e($product['stock']); ?>">
                                                <button class="qty-btn qty-btn-plus change-qty" type="button" data-varient-id="<?php echo e($product['varient_id']); ?>" data-change="1">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <?php if($product['discountper'] > 0): ?>
                                    <div class="discount_text"><?php echo e(number_format($product['discountper'], 2)); ?><span>Off</span></div>
                                    <?php endif; ?>
                                    <?php if($product['country_icon'] != null || $product['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($product['country_icon']); ?>" alt="flag">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn" data-varient-id="<?php echo e($product['varient_id']); ?>">
                                            <img class="wishlist-icon"
                                                src="<?php echo e(asset($product['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                    </div>
                                    <div class="product_wishlist">
                                        <?php if($product['notify_me'] == 'false'): ?>
                                        <a href="javascript:void(0);" class="notify-me" data-varient-id="<?php echo e($product['varient_id']); ?>" data-product-id="<?php echo e($product['product_id']); ?>">
                                            <img class="notify-icon"
                                                src="<?php echo e(asset('assets/images/notification.png')); ?>"
                                                alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                        <?php else: ?>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>notify">
                                            <img id="notifyMe-<?php echo e($product['varient_id']); ?>" src="<?php echo e(asset('assets/images/notification-fill.png')); ?>" alt="wishlist" style="max-width: 25px;">
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-details?product_id=<?php echo e($product['product_id']); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($product['product_image']); ?>" alt="product">
                                </div>
                            </a>
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($product['product_name']); ?></div>
                                    <div class="product_weight"><span><?php echo e($product['quantity']); ?> <?php echo e($product['unit']); ?></span></div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title">Product Unavailable</div>
                                    <p>You will be notified.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> -->

                <div class="owl-carousel owl-carousel-featured owl-theme">
                    <?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$product['stock'] == 0): ?>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <?php if($product['discountper'] > 0): ?>
                                    <div class="discount_text">
                                        <?php echo e(number_format($product['discountper'], 2)); ?><span>Off</span></div>
                                    <?php endif; ?>
                                    <?php if($product['country_icon'] != null || $product['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($product['country_icon']); ?>" alt="flag">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="<?php echo e($product['varient_id']); ?>">
                                            <img class="wishlist-icon"
                                                src="<?php echo e(asset($product['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($product['product_name'])); ?>/<?php echo e(trim($product['product_id'])); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($product['product_image']); ?>" alt="Product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($product['product_name']); ?></div>
                                    <div class="product_weight"><span><?php echo e($product['quantity']); ?>

                                            <?php echo e($product['unit']); ?></span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="product_detail">
                                    <p class="offer-price">AED
                                        <span><?php echo e(number_format($product['price'], 2)); ?></span><br>
                                        <?php if($product['price'] != $product['mrp']): ?>
                                        <span class="regular-price">AED
                                            <span><?php echo e(number_format($product['mrp'], 2)); ?></span></span>
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <div class="cart_btn">
                                    <div class="qtyBox" data-varient-id="<?php echo e($product['varient_id']); ?>">
                                        <button class="qty-btn qty-btn-minus change-qty" type="button"
                                            data-varient-id="<?php echo e($product['varient_id']); ?>"
                                            data-change="-1">-</button>
                                        <input type="text" name="qty" value="<?php echo e($product['cart_qty']); ?>"
                                            class="input-qty input-rounded" min="0">
                                        <input type="hidden" name="stock" id="stock"
                                            value="<?php echo e($product['stock']); ?>">
                                        <button class="qty-btn qty-btn-plus change-qty" type="button"
                                            data-varient-id="<?php echo e($product['varient_id']); ?>"
                                            data-change="1">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <?php if($product['discountper'] > 0): ?>
                                    <div class="discount_text">
                                        <?php echo e(number_format($product['discountper'], 2)); ?><span>Off</span></div>
                                    <?php endif; ?>
                                    <?php if($product['country_icon'] != null || $product['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($product['country_icon']); ?>" alt="flag">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="<?php echo e($product['varient_id']); ?>">
                                            <img class="wishlist-icon"
                                                src="<?php echo e(asset($product['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                    <div class="product_wishlist">
                                        <?php if($product['notify_me'] == 'false'): ?>
                                        <a href="javascript:void(0);" class="notify-me"
                                            data-varient-id="<?php echo e($product['varient_id']); ?>"
                                            data-product-id="<?php echo e($product['product_id']); ?>">
                                            <img class="notify-icon" src="<?php echo e(asset('assets/images/notification.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                        <?php else: ?>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>notify">
                                            <img id="notifyMe-<?php echo e($product['varient_id']); ?>"
                                                src="<?php echo e(asset('assets/images/notification-fill.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                             <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($product['product_name'])); ?>/<?php echo e(trim($product['product_id'])); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($product['product_image']); ?>" alt="product">
                                </div>
                            </a>
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($product['product_name']); ?></div>
                                    <div class="product_weight"><span><?php echo e($product['quantity']); ?>

                                            <?php echo e($product['unit']); ?></span></div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title">Product Unavailable</div>
                                    <p>You will be notified.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
        </div>
    </section>
    <!-- Trending Products end -->

    <!-- Recent Search Start -->
    <?php if(!empty($recentSearch)): ?>
    <section class="shop-list section-padding">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="recent-searches">Recent Searches</div> -->
                <div class="section-header">
                    <h5 class="heading-design-h5">Recent Searches</h5>
                </div>
                <div class="search-item">
                    <?php $__currentLoopData = $recentSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentsearch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($recentsearch['keyword']) || $recentsearch['keyword'] != ''): ?>
                        <a href="<?php echo e(ENV('APP_URL')); ?>search?keyword=<?php echo e(Str::slug($recentsearch['keyword'])); ?>" class="search_item_list">
                            <span class="search-text"><span class="icon">&#x21bb;</span>
                                <?php echo e($recentsearch['keyword']); ?></span>
                        </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <!-- Recent Search End -->

    <!-- ONCLICK CART BOX START -->
    <div class="cart_flating_btn" onclick="toggleOrderBox(event)">
        <small class="cart-value">0</small> <!-- This will be updated dynamically -->
        <img src="<?php echo e(asset('assets/images/grocery-store.svg')); ?>" alt="">
    </div>
    <div class="order_placeBox" id="orderBox" style="display: none;">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="freeDeliverytext">Congratulations! You've got <span>FREE DELIVERY</span></div>
                <div class="countText">0 items | AED 0</div> <!-- This will be updated -->
                <div class="saveText">You have saved <span>AED 0</span> on your order</div>
                <!-- This will be updated -->
            </div>
        </div>
    </div>
    <!-- ONCLICK CART BOX END -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
     <script>
        window.onload = function () {
            const input = document.getElementById('searchInput');
            if (input) input.focus();
        };
    </script>
    
    <script>
    function toggleOrderBox(event) {
        event.stopPropagation();
        const orderBox = document.getElementById('orderBox');
        orderBox.style.display = orderBox.style.display === 'none' ? 'block' : 'none';
    }
    document.addEventListener('click', function(event) {
        const orderBox = document.getElementById('orderBox');
        const cartButton = document.querySelector('.cart_flating_btn');

        if (!orderBox.contains(event.target) && !cartButton.contains(event.target)) {
            orderBox.style.display = 'none';
        }
    });
    </script>

    <!-- Initialize the Slider -->
    <script>
    $(document).ready(function() {
        $('.brand-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: false,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 5
                },
                1000: {
                    items: 8
                }
            }
        });
    });
    </script>

    <!-- Initialize the Sliders -->
    <script>
    $(document).ready(function() {
        $('.product-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: false,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 2,
                },
                1020: {
                    items: 4,
                },
                1300: {
                    items: 4,
                },
            }
        });
    });
    </script>

    <script>
        document.querySelector('.search-box').addEventListener('submit', function (e) {
            const input = document.getElementById('searchInput');
            if (input && input.value) {
                input.value = input.value.trim().replace(/\s+/g, '-');
            }
        });
    </script>

    
    
    
    <!-- Cart Quantity End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- select2 Js -->
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Custom -->
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>

    <!-- FANCY BOX SCRIPT  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    
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
            navigateToNextPage(href = '<?php echo e(env('
                APP_URL ')); ?>my-orders?tab=1');
        }
        
        function jumpNext(current, nextFieldId) {
          if (current.value.length >= 1) {
            document.getElementById(nextFieldId).focus();
          }
        }

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

                        }
                        
                      },
                      error: function (xhr, status, error) {
                        // alert('Error submitting the form.');
                        console.error(error);
                      }
                    });
                
            
                
            });

        
            $('.otp_submit').on('click',function(){
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
                    var _token = jQuery('meta[name="csrf-token"]').attr('content');
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
                                    console.log('pendingProductId header',pendingProductId);
                                    addToCart(pendingProductId,1,true); //productID,change(+/-),isfromlogin(true/false)
                                    pendingProductId = null;
                                    openCart();    
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
</body>

</html><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Search/productSearch.blade.php ENDPATH**/ ?>