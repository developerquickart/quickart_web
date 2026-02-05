<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="shop-single section-padding pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="shop-detail-left">
                    <div class="shop-detail-slider">
                        <div class="product_header">
                            <div class="product_top_left">
                                <div class="discount_text">50% <span>Off</span></div>
                                <div class="country_flag">
                                    <img src="<?php echo e(asset('assets/images/flag_img.png')); ?>" alt="flag">
                                </div>
                            </div>
                            <div class="product_top_right">
                                <div class="product_wishlist">
                                    <a href="">
                                        <img src="<?php echo e(asset('assets/images/wishlist.png')); ?>" alt="wishlist"
                                            style="max-width: 25px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="main_sliderBox">
                            <div id="sync1" class="owl-carousel">
                                <div class="item">
                                    <div class="fancy-image-wrap">
                                        <a href="<?php echo e(asset('assets/images/image_name1.jpg')); ?>" data-fancybox="gallery">
                                            <img alt="" src="<?php echo e(asset('assets/images/image_name1.jpg')); ?>"
                                                class="img-fluid img-center">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fancy-image-wrap">
                                        <a href="<?php echo e(asset('assets/images/product2.jpg')); ?>" data-fancybox="gallery">
                                            <img alt="" src="<?php echo e(asset('assets/images/product2.jpg')); ?>"
                                                class="img-fluid img-center">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fancy-image-wrap">
                                        <a href="<?php echo e(asset('assets/images/image_name1.jpg')); ?>" data-fancybox="gallery">
                                            <img alt="" src="<?php echo e(asset('assets/images/image_name1.jpg')); ?>"
                                                class="img-fluid img-center">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fancy-image-wrap">
                                        <a href="<?php echo e(asset('assets/images/product2.jpg')); ?>" data-fancybox="gallery">
                                            <img alt="" src="<?php echo e(asset('assets/images/product2.jpg')); ?>"
                                                class="img-fluid img-center">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fancy-image-wrap">
                                        <a href="<?php echo e(asset('assets/images/image_name1.jpg')); ?>" data-fancybox="gallery">
                                            <img alt="" src="<?php echo e(asset('assets/images/image_name1.jpg')); ?>"
                                                class="img-fluid img-center">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fancy-image-wrap">
                                        <a href="<?php echo e(asset('assets/images/product2.jpg')); ?>" data-fancybox="gallery">
                                            <img alt="" src="<?php echo e(asset('assets/images/product2.jpg')); ?>"
                                                class="img-fluid img-center">
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="fancy-image-wrap">
                                        <a href="<?php echo e(asset('assets/images/image_name1.jpg')); ?>" data-fancybox="gallery">
                                            <img alt="" src="<?php echo e(asset('assets/images/image_name1.jpg')); ?>"
                                                class="img-fluid img-center">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navigation_slider">
                            <div id="sync2" class="owl-carousel">
                                <div class="item">
                                    <img alt="" src="<?php echo e(asset('assets/images/image_name1.jpg')); ?>"
                                        class="img-fluid img-center">
                                </div>
                                <div class="item">
                                    <img alt="" src="<?php echo e(asset('assets/images/product2.jpg')); ?>"
                                        class="img-fluid img-center">
                                </div>
                                <div class="item">
                                    <img alt="" src="<?php echo e(asset('assets/images/image_name1.jpg')); ?>"
                                        class="img-fluid img-center">
                                </div>
                                <div class="item">
                                    <img alt="" src="<?php echo e(asset('assets/images/product2.jpg')); ?>"
                                        class="img-fluid img-center">
                                </div>
                                <div class="item">
                                    <img alt="" src="<?php echo e(asset('assets/images/image_name1.jpg')); ?>"
                                        class="img-fluid img-center">
                                </div>
                                <div class="item">
                                    <img alt="" src="<?php echo e(asset('assets/images/product2.jpg')); ?>"
                                        class="img-fluid img-center">
                                </div>
                                <div class="item">
                                    <img alt="" src="<?php echo e(asset('assets/images/image_name1.jpg')); ?>"
                                        class="img-fluid img-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="shop-detail-right">
                    <div class="productDetail_name">Al Rawabi Full Milk Yogurt</div>
                    <div class="productDetail_weight">Weight: <span>1 KG</span></div>
                    <p class="offer-price ">AED <span class="value">450.99</span> <span class="regular-price">AED
                            800.99</span>
                    </p>
                    <div class="buttonBox">
                        <div class="sub_btnBox">
                            <a class="subscribe_btn" data-bs-target="#subscribe" data-bs-toggle="modal">Subscribe</a>
                        </div>
                        <div class="cart_btnBox">
                            <div class="cart_btn" id="addToCartBtn">Add To Cart</div>
                            <div class="detail-qtyBox" id="goToCartBtn" style="display:none;">
                                <a href="<?php echo e(ENV('APP_URL')); ?>cart" class="cart_btn">Go to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade login-modal-main" id="subscribe">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <div class="repeatDays_box">
                                        <div class="order-subheading d-flex justify-content-between">
                                            <div class="headingBox">
                                                <img src="<?php echo e(asset('assets/images/calender.png')); ?>" alt=""
                                                    class="img-fluid" style="max-width:30px"> Repeat Days
                                            </div>
                                            <div class="allDay_checkbox">
                                                <input class="form-check-input" type="checkbox" value="" id="alldays">
                                                <label class="form-check-label" for="alldays">
                                                    All days
                                                </label>
                                            </div>
                                        </div>
                                        <ul class="day_count">
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day_sunday" id="day_sunday">
                                                    <div class="day-box">S</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day_monday" id="day_monday">
                                                    <div class="day-box">M</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day_tuesday" id="day_tuesday">
                                                    <div class="day-box">T</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day_wednesday" id="day_wednesday">
                                                    <div class="day-box">W</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day_thursday" id="day_thursday">
                                                    <div class="day-box">T</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day_friday" id="day_friday">
                                                    <div class="day-box">F</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day_saturday" id="day_saturday">
                                                    <div class="day-box">S</div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="subscription_duration">
                                        <div class="order-subheading d-flex">
                                            <img src="<?php echo e(asset('assets/images/Certificate.png')); ?>" alt=""
                                                class="img-fluid" style="max-width:30px">
                                            <div class="head">
                                                <div class="heading">Subscription Duration</div>
                                                <div class="subheading">Select week duration for subscription</div>
                                            </div>
                                        </div>
                                        <div class="week-list">
                                            <div class="weeks">
                                                <input type="radio" id="control_01" name="week" value="11">
                                                <label for="control_01">1 week</label>
                                            </div>
                                            <div class="weeks">
                                                <input type="radio" id="control_02" name="week" value="12">
                                                <label for="control_02">2 week</label>
                                            </div>
                                            <div class="weeks">
                                                <input type="radio" id="control_03" name="week" value="13">
                                                <label for="control_03">4 week</label>
                                            </div>
                                            <div class="weeks">
                                                <input type="radio" id="control_04" name="week" value="14">
                                                <label for="control_04">8 week</label>
                                            </div>
                                            <div class="weeks">
                                                <input type="radio" id="control_05" name="week" value="15">
                                                <label for="control_05">12 week</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="subscription_duration d-flex justify-content-between align-items-center">
                                        <div class="order-subheading d-flex">
                                            <img src="<?php echo e(asset('assets/images/calender-black.png')); ?>" alt=""
                                                class="img-fluid" style="max-width:30px">
                                            <div class="head">
                                                <div class="heading">Start Date of Delivery</div>
                                                <div class="subheading pb-0">Select date for duration</div>
                                            </div>
                                        </div>
                                        <div class="dateBox">
                                            <input type="date" name="select-date" id="select-date">
                                        </div>
                                    </div>
                                    <div class="subscription_duration">
                                        <div class="order-subheading d-flex">
                                            <img src="<?php echo e(asset('assets/images/Clock.png')); ?>" alt="" class="img-fluid"
                                                style="max-width:30px">
                                            <div class="head">
                                                <div class="heading">Select Time of Delivery</div>
                                            </div>
                                        </div>
                                        <div class="week-list">
                                            <div class="weeks">
                                                <input type="radio" id="time_01" name="time" value="11">
                                                <label for="time_01">06:00 am - 10:00 am</label>
                                            </div>
                                            <div class="weeks">
                                                <input type="radio" id="time_02" name="time" value="12">
                                                <label for="time_02">02:00 pm - 05:00 pm</label>
                                            </div>
                                            <div class="weeks">
                                                <input type="radio" id="time_03" name="time" value="13">
                                                <label for="time_03">05:00 pm - 09:00 pm</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button_wrap">
                                        <div class="order_cancel_btn" data-dismiss="modal" aria-label="Close">Cancel
                                        </div>
                                        <div class="order_confirm_btn">Confirm</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product_description">
                        <div class="product_heading">About Product</div>
                        <ul class="listingBox">
                            <li><span>Description :</span> The flavor of ginger is frequently described as spicy,
                                peppery, and warm or hot. I also find it a little sweet. Young ginger is highly juicy
                                and has a considerably milder flavor. As it ages, it gets more fibrous, less juicy, and
                                significantly stronger/hotter.</li>
                            <li><span>Country of Origin :</span> India</li>
                            <li><span>Shelf Life :</span> 33 months </li>
                        </ul>
                    </div>
                    <div class="order_placeBox d-none">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <div class="freeDeliverytext"><img alt=""
                                        src="<?php echo e(asset('assets/images/freeDelivery.png')); ?>"
                                        class="img-fluid">Congratulation's you got <span>FREE DELIVERY</span></div>
                                <div class="countText">15 items | AED null</div>
                                <div class="saveText">You have saved <span>AED 10</span> on your order</div>
                            </div>
                            <div class="col-2">
                                <div class="count_bag">
                                    <img alt="" src="<?php echo e(asset('assets/images/shopping-bag.png')); ?>">
                                    <small class="cart-value">5</small>
                                </div>
                            </div>
                            <div class="place_order_btn text-center">
                                <a href="" class="yellow_btn">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- RELATED PRODUCT SECTION START -->
<section class="product-items-slider section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Related Products</h5>
                    <a class="float-right text-secondary" href="<?php echo e(ENV('APP_URL')); ?>product-list">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-featured">
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <div class="discount_text">50% <span>Off</span></div>
                                    <div class="country_flag">
                                        <img src="<?php echo e(asset('assets/images/flag_img.png')); ?>" alt="flag">
                                    </div>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="">
                                            <img src="<?php echo e(asset('assets/images/wishlist.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-details">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e(asset('assets/images/product1.png')); ?>" alt="product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name">Product Title Here</div>
                                    <div class="product_weight">Weight: <span>500 gm</span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product_detail">
                                            <p class="offer-price">AED 450.99<br><span class="regular-price">AED
                                                    800.99</span></p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <button class="add-to-cart-btn">Add</button>
                                            <div class="qtyBox" id="qtyBox" style="display: none;">
                                                <button class="qty-btn qty-btn-minus" type="button">-</button>
                                                <input type="text" name="qty" value="0" class="input-qty input-rounded">
                                                <button class="qty-btn qty-btn-plus" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <div class="discount_text">50% <span>Off</span></div>
                                    <div class="country_flag">
                                        <img src="<?php echo e(asset('assets/images/flag_img.png')); ?>" alt="flag">
                                    </div>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="">
                                            <img src="<?php echo e(asset('assets/images/wishlist.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-details">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e(asset('assets/images/product2.png')); ?>" alt="Product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name">Product Title Here</div>
                                    <div class="product_weight">Weight: <span>500 gm</span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product_detail">
                                            <p class="offer-price">AED 450.99<br><span class="regular-price">AED
                                                    800.99</span></p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <button class="add-to-cart-btn">Add</button>
                                            <div class="qtyBox" id="qtyBox" style="display: none;">
                                                <button class="qty-btn qty-btn-minus" type="button">-</button>
                                                <input type="text" name="qty" value="0" class="input-qty input-rounded">
                                                <button class="qty-btn qty-btn-plus" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <div class="discount_text">50% <span>Off</span></div>
                                    <div class="country_flag">
                                        <img src="<?php echo e(asset('assets/images/flag_img.png')); ?>" alt="flag">
                                    </div>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="">
                                            <img src="<?php echo e(asset('assets/images/wishlist.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-details">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e(asset('assets/images/product3.png')); ?>" alt="Product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name">Product Title Here</div>
                                    <div class="product_weight">Weight: <span>500 gm</span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product_detail">
                                            <p class="offer-price">AED 450.99<br><span class="regular-price">AED
                                                    800.99</span></p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <button class="add-to-cart-btn">Add</button>
                                            <div class="qtyBox" id="qtyBox" style="display: none;">
                                                <button class="qty-btn qty-btn-minus" type="button">-</button>
                                                <input type="text" name="qty" value="0" class="input-qty input-rounded">
                                                <button class="qty-btn qty-btn-plus" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <div class="discount_text">50% <span>Off</span></div>
                                    <div class="country_flag">
                                        <img src="<?php echo e(asset('assets/images/flag_img.png')); ?>" alt="flag">
                                    </div>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="">
                                            <img src="<?php echo e(asset('assets/images/wishlist.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-details">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e(asset('assets/images/product4.png')); ?>" alt="Product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name">Product Title Here</div>
                                    <div class="product_weight">Weight: <span>500 gm</span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product_detail">
                                            <p class="offer-price">AED 450.99<br><span class="regular-price">AED
                                                    800.99</span></p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <button class="add-to-cart-btn">Add</button>
                                            <div class="qtyBox" id="qtyBox" style="display: none;">
                                                <button class="qty-btn qty-btn-minus" type="button">-</button>
                                                <input type="text" name="qty" value="0" class="input-qty input-rounded">
                                                <button class="qty-btn qty-btn-plus" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <div class="discount_text">50% <span>Off</span></div>
                                    <div class="country_flag">
                                        <img src="<?php echo e(asset('assets/images/flag_img.png')); ?>" alt="flag">
                                    </div>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="">
                                            <img src="<?php echo e(asset('assets/images/wishlist.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-details">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e(asset('assets/images/product5.png')); ?>" alt="Product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name">Product Title Here</div>
                                    <div class="product_weight">Weight: <span>500 gm</span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product_detail">
                                            <p class="offer-price">AED 450.99<br><span class="regular-price">AED
                                                    800.99</span></p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <button class="add-to-cart-btn">Add</button>
                                            <div class="qtyBox" id="qtyBox" style="display: none;">
                                                <button class="qty-btn qty-btn-minus" type="button">-</button>
                                                <input type="text" name="qty" value="0" class="input-qty input-rounded">
                                                <button class="qty-btn qty-btn-plus" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- RELATED PRODUCT SECTION END -->

<!-- GO TO CART BUTTON SHOW SCRIPT START -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var addToCartBtn = document.getElementById('addToCartBtn');
        var goToCartBtn = document.getElementById('goToCartBtn');
        addToCartBtn.addEventListener('click', function () {
            addToCartBtn.style.display = 'none';
            goToCartBtn.style.display = 'block';
        });
    });
</script>
<!-- GO TO CART BUTTON SHOW SCRIPT END -->
<!-- check all days checbox script start -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#alldays').on('change', function () {
            var isChecked = $(this).is(':checked');
            $('.day_count input[type="checkbox"]').prop('checked', isChecked).change();
        });

        $('.day_count input[type="checkbox"]').on('change', function () {
            var allChecked = $('.day_count input[type="checkbox"]').length === $(
                '.day_count input[type="checkbox"]:checked').length;
            $('#alldays').prop('checked', allChecked);
        });
    });
</script>
<!-- check all days checbox script end -->
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/product-details.blade.php ENDPATH**/ ?>