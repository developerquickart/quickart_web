<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Askbootstrap">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php if (!empty($data_arr)) {
    $canonical_url = !empty($data_arr['canonical']) 
        ? $data_arr['canonical'] 
        : (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . 
        "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>
    <title><?php echo $data_arr['title']; ?></title>
    <meta name="keywords" content="<?php echo $data_arr['keywords']; ?>">
    <meta name="description" content="<?php echo $data_arr['description']; ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    <?php } ?>

    
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
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
    <meta property="og:title" content="Quickart" />
    <meta property="og:site_name" content="Quickart" />
    <meta property="og:url" content="https://testblog.democheck.in/quickcart/" />
    <meta property="og:description" content="Quickart" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://testblog.democheck.in/assets/images/QuicKart_logo.png" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

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
    window.addEventListener('pageshow', function (event) {
        if (event.persisted || window.performance.getEntriesByType("navigation")[0].type === 'back_forward') {
            window.location.reload();
        }
    });
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
    
    window.addEventListener('pageshow', function (event) {
        if (event.persisted || window.performance.getEntriesByType("navigation")[0].type === 'back_forward') {
            window.location.reload();
        }
    });
    </script>
    
    <style>
        table, th, td {
          border: 1px solid;
          padding:3px;
          text-align:center;
        }
        
        table {
          border-collapse: collapse;
        }
            
    </style>
</head>

<body>
    <div class="main-wrapper">
        <?php if(!empty($offerBanner)): ?>
        <section class="shop-list section-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="section-header">
                        <h5 class="heading-design-h5"><?php echo e($offerBanner['banner_name'] ?? ''); ?></h5>
                
                    </div>  
                    
                    <!--<div class="subcategories_banner" id="subcategories_banner">-->
                    <!--       <img src="<?php echo e($offerBanner['banner_image'] ?? ''); ?>" alt="" id="subcategories_bannerImg">-->
                    <!--   </div>-->
                </div>    
                <div class="">
                        <?php echo $offerBanner['terms_and_conditions']; ?>

                    </div>
            </div>
        </section>
        <?php else: ?>
        <!--<section class="shop-list section-padding">-->
        <!--    <div class="container">-->
        <!--        <div class="row align-items-center justify-content-center">-->
        <!--            <div class="col-lg-6">-->
        <!--                <div class="data_not_available">-->
        <!--                    <div class="imageBox">-->
        <!--                        <img src="<?php echo e(asset('assets/images/No_product_available.png')); ?>" alt="empty cart"-->
        <!--                            class="img-fluid">-->
        <!--                    </div>-->
        <!--                    <div class="textBox text-center">-->
        <!--                        <a href="<?php echo e(url('/')); ?>" class="my-4 d-block">-->
        <!--                            <div class="cancel_btn">Let's Shop</div>-->
        <!--                        </a>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <!--No Offer found-->
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Offers/offer-detail.blade.php ENDPATH**/ ?>