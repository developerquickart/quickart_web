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

    <meta property="og:title" content="Quickart" />
    <meta property="og:site_name" content="Quickart" />
    <meta property="og:url" content="https://testblog.democheck.in/quickcart/" />
    <meta property="og:description" content="Quickart" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://testblog.democheck.in/assets/images/QuicKart_logo.png" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <script>
        window.onscroll = function () {
            var header = document.querySelector("header");
            if (window.pageYOffset > 0) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        };
    </script>
</head>

<body>
    <div class="modal fade login-modal-main" id="bd-example-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-modal">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center login-footer-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#login" role="tab"><i
                                                    class="mdi mdi-lock"></i> LOGIN</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#register" role="tab"><i
                                                    class="mdi mdi-pencil"></i> REGISTER</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="row align-items-center login_box">
                            <div class="col-lg-4 pad-right-0 g-0">
                                <div class="login-modal-left1">
                                    <img src="<?php echo e(asset('assets/images/QuicKart_logo.png')); ?>" alt="logo">
                                </div>
                            </div>
                            <div class="col-lg-8 pad-left-0 g-0">
                                <button type="button" class="close close-top-right" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <form>
                                    <div class="login-modal-right">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="login" role="tabpanel">
                                                <h5 class="heading-design-h5">Login to your account</h5>
                                                <fieldset class="form-group mobile_box">
                                                    <select class="form-control" name="countrycode" id="countrycode">
                                                        <option data-countrycode="Dubai" value="971" selected="">971
                                                        </option>
                                                    </select>
                                                    <select class="form-control" name="code" id="code">
                                                        <option data-countrycode="Dubai" value="50" selected="">50
                                                        </option>
                                                        <option data-countrycode="Dubai" value="52" selected="">52
                                                        </option>
                                                        <option data-countrycode="Dubai" value="54" selected="">54
                                                        </option>
                                                        <option data-countrycode="Dubai" value="55" selected="">55
                                                        </option>
                                                        <option data-countrycode="Dubai" value="56" selected="">56
                                                        </option>
                                                        <option data-countrycode="Dubai" value="58" selected="">58
                                                        </option>
                                                    </select>
                                                    <input type="text" class="form-control" placeholder="Mobile Number"
                                                        maxlength="7" minlength="7">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <button type="submit" class="btn btn-lg submit_btn  btn-block">Get
                                                        OTP</button>
                                                </fieldset>
                                                <h5 class="heading-design-h5">Verify OTP</h5>
                                                <p>OTP has been sent to your registered mobile number<br>Enter OTP
                                                    Manually</p>
                                                <fieldset class="form-group">
                                                    <div class="input_field_box">
                                                        <input type="text" name="" id="" />
                                                        <input type="text" name="" id="" />
                                                        <input type="text" name="" id="" />
                                                        <input type="text" name="" id="" />
                                                    </div>
                                                    <!-- <input type="text" class="form-control" placeholder="Enter OTP"> -->
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-lg submit_btn  btn-block">Login</button>
                                                </fieldset>
                                            </div>
                                            <div class="tab-pane" id="register" role="tabpanel">
                                                <h5 class="heading-design-h5">Register Now!</h5>
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control" placeholder="Full Name">
                                                </fieldset>
                                                <fieldset class="form-group mobile_box">
                                                    <select class="form-control" name="countrycode1" id="countrycode1">
                                                        <option data-countrycode="Dubai" value="971" selected="">971
                                                        </option>
                                                    </select>
                                                    <select class="form-control" name="code1" id="code1">
                                                        <option data-countrycode="Dubai" value="50" selected="">50
                                                        </option>
                                                        <option data-countrycode="Dubai" value="52" selected="">52
                                                        </option>
                                                        <option data-countrycode="Dubai" value="54" selected="">54
                                                        </option>
                                                        <option data-countrycode="Dubai" value="55" selected="">55
                                                        </option>
                                                        <option data-countrycode="Dubai" value="56" selected="">56
                                                        </option>
                                                        <option data-countrycode="Dubai" value="58" selected="">58
                                                        </option>
                                                    </select>
                                                    <input type="text" class="form-control" placeholder="Mobile Number"
                                                        maxlength="7" minlength="7">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </fieldset>
                                                <fieldset class="form-group city">
                                                    <select class="form-control" name="city" id="city">
                                                        <option data-countrycode="Dubai" value="">Select City</option>
                                                        <option data-countrycode="Dubai" value="Dubai">Dubai</option>
                                                    </select>
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control" placeholder="Select Area">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Building Name/Villa/House No.">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control" placeholder="Enter Street">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Landmark (Optional)">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <input type="text" class="form-control"
                                                        placeholder="Referral Code (Optional)">
                                                </fieldset>
                                                <fieldset class="form-group">
                                                    <button type="submit" class="btn btn-lg submit_btn  btn-block">Sign
                                                        Up</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-top bg-success pt-2 pb-2 d-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 text-center">
                    <a class="location-top" href="#"><i class="mdi mdi-map-marker-circle" aria-hidden="true"></i>
                        Dubai</a>
                </div>
                <div class="col-lg-7">
                    <div class="text-center">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-list" class="mb-0 text-white">
                                20% cashback for new users | Code: <strong><span class="text-light">OGOFERS13 <span
                                            class="mdi mdi-tag-faces"></span></span> </strong>
                            </a>
                        </marquee>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="my-2 my-lg-0 login_cartbox">
                        <ul class="list-inline main-nav-right">
                            <li class="list-inline-item">
                                <a href="#" data-bs-target="#bd-example-modal" data-bs-toggle="modal"
                                    class="btn btn-link"><i class="mdi mdi-account-circle"></i> Login / Sign Up</a>
                            </li>
                            <li class="list-inline-item cart-btn">
                                <a href="#" data-bs-toggle="offcanvas" class="btn btn-link border-none"><i
                                        class="mdi mdi-cart"></i> My Cart <small class="cart-value">5</small></a>
                            </li>
                        </ul>
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
                        <a class="navbar-brand" href="<?php echo e(ENV('APP_URL')); ?>"> <img
                                src="<?php echo e(asset('assets/images/QuicKart_logo.png')); ?>" alt="logo" class="img-fluid"> </a>

                        <button class="navbar-toggler navbar-toggler-white d-none" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="header_icons_box">
                        <div class="searchBox">
                            <div class="navbar-collapse" id="navbarNavDropdown">
                                <div class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto top-categories-search-main">
                                    <div class="top-categories-search">
                                        <form action="">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Search Product"
                                                    aria-label="Search Product" type="text">
                                                <span class="input-group-btn">
                                                    <button class="btn " type="submit"> <img
                                                            src="<?php echo e(asset('assets/images/search_icon.png')); ?>"
                                                            alt="search" class="img-fluid"></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="loginBox">
                            <div class="login_cartbox text-end">
                                <ul class="list-inline main-nav-right">
                                    <li class="list-inline-item cart-btn">
                                        <a href="<?php echo e(ENV('APP_URL')); ?>cart">
                                            <div class="top_other_icon_img">
                                                <img src="<?php echo e(asset('assets/images/top_cart.png')); ?>" alt="Cart">
                                            </div>
                                            <div class="top_other_icon_heading">My Cart <small
                                                    class="cart-value">5</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo e(ENV('APP_URL')); ?>" class="top_icon" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Sign in">
                                            <div class="top_other_icon_img">
                                                <img src="<?php echo e(asset('assets/images/top_login.png')); ?>" alt="Signin">
                                            </div>
                                            <div class="top_other_icon_heading">Sign in</div>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="<?php echo e(ENV('APP_URL')); ?>profile" class="top_icon" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Profile">
                                            <div class="top_other_icon_img">
                                                <img src="<?php echo e(asset('assets/images/profile-icon.png')); ?>" alt="Signin">
                                            </div>
                                            <div class="top_other_icon_heading">Profile</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light osahan-menu-2 pad-none-mobile d-none">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
                        <li class="nav-item">
                            <a class="nav-link shop" href="<?php echo e(ENV('APP_URL')); ?>"><span class="mdi mdi-store"></span> Super
                                Store</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(ENV('APP_URL')); ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(ENV('APP_URL')); ?>about" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Dairy</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Milk</a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Yogurt</a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Salted Butter </a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Unsalted Butter</a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Laban</a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Cheese and Butter</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Fruits and Veg</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Fresh Products</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Poultry</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Egg</a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Chicken</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Quick Combos</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Combos</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Ready To Eat</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Chilled Products</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Bakery</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>product-list"><i
                                        class="mdi mdi-chevron-right" aria-hidden="true"></i> Bakery</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                My Account
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>profile">My Profile</a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>address-list">My Address</a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>wishlist">Favourites </a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>notify">Notify Product List </a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>orderlist">Order List</a>
                                <a class="dropdown-item" href="<?php echo e(ENV('APP_URL')); ?>wallet">My wallet</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header><?php /**PATH /var/www/html/createProject/resources/views/header.blade.php ENDPATH**/ ?>