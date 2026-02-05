<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- cart section start -->
<section class="cart_section section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <!--<div class="section-header">-->
                <!--    <h5 class="heading-design-h5">Cart</h5>-->
                <!--</div>-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_tabbing_mainBox">
                            <div class="cart_tabbing_tabs">
                                <a class="tablinks cart-tab-item active" id="dailyCartTab"
                                    onclick="openCity(event, '1')">Daily Cart</a>
                                <a class="tablinks cart-tab-item" id="subscriptionCartTab"
                                    onclick="openCity(event, '2')">Subscription Cart</a>
                            </div>
                            <div class="cart_tabbing_content" id="content">
                                <div id="1" class="tabcontent" style="display: block;">
                                    <div class="content_Mainbox">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="free_deliveryBox">
                                                    <img src="<?php echo e(asset('assets/images/freeDelivery.png')); ?>" alt="lock"
                                                        style="max-width:30px">
                                                    <span><strong>AED 12</strong> saved, <strong>FREE DELIVERY</strong>
                                                        Unlocked !</span>
                                                </div>

                                                <div class="car_product_list_mainBox">
                                                    <div class="car_product_list">
                                                        <div class="ordered_product">
                                                            <div class="product_imgbox">
                                                                <img src="<?php echo e(asset('assets/images/product1.png')); ?>"
                                                                    alt="" class=" img-fluid">
                                                            </div>
                                                            <div class="order_info">
                                                                <div class="row">
                                                                    <div class="col-8">
                                                                        <div class="order_product_name">Marmum 1ltr Full
                                                                            Cream
                                                                            Fresh Milk (1 Ltrs)
                                                                        </div>
                                                                        <div class="weightBox">
                                                                            weight <span>1 Lt</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="priceBox text-end">
                                                                            <div class="actual_price">AED
                                                                                <span>6.65</span>
                                                                            </div>
                                                                            <div class="mrp_price">AED
                                                                                <span>8</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order_details">
                                                                    <div class="row align-items-end g-0">
                                                                        <div class="col-12">
                                                                            <div class="sub_btn_mainBox">
                                                                                <div class="sub_box">
                                                                                    <a class="subscribe_btn">Subscribe &
                                                                                        save 8%</a>
                                                                                </div>
                                                                                <div class="qtyBox justify-content-end">
                                                                                    <button
                                                                                        class="qty-btn qty-btn-minus"
                                                                                        type="button">-</button>
                                                                                    <input type="text" name="qty"
                                                                                        value="1"
                                                                                        class="input-qty input-rounded">
                                                                                    <button class="qty-btn qty-btn-plus"
                                                                                        type="button">+</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="car_product_list">
                                                        <div class="ordered_product">
                                                            <div class="product_imgbox">
                                                                <img src="<?php echo e(asset('assets/images/product1.png')); ?>"
                                                                    alt="" class=" img-fluid">
                                                            </div>
                                                            <div class="order_info">
                                                                <div class="row">
                                                                    <div class="col-8">
                                                                        <div class="order_product_name">Marmum 1ltr Full
                                                                            Cream
                                                                            Fresh Milk (1 Ltrs)
                                                                        </div>
                                                                        <div class="weightBox">
                                                                            weight <span>1 Lt</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="priceBox text-end">
                                                                            <div class="actual_price">AED
                                                                                <span>6.65</span>
                                                                            </div>
                                                                            <div class="mrp_price">AED
                                                                                <span>8</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order_details">
                                                                    <div class="row align-items-end g-0">
                                                                        <div class="col-12">
                                                                            <div class="sub_btn_mainBox">
                                                                                <div class="sub_box">
                                                                                    <a class="subscribe_btn">Subscribe &
                                                                                        save 8%</a>
                                                                                </div>
                                                                                <div class="qtyBox justify-content-end">
                                                                                    <button
                                                                                        class="qty-btn qty-btn-minus"
                                                                                        type="button">-</button>
                                                                                    <input type="text" name="qty"
                                                                                        value="1"
                                                                                        class="input-qty input-rounded">
                                                                                    <button class="qty-btn qty-btn-plus"
                                                                                        type="button">+</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="missed-items-slider section-padding">
                                                    <div class="section-header">
                                                        <h5 class="heading-design-h5">Schedule Delivery</span>
                                                        </h5>
                                                    </div>
                                                    <div class="sehedule_delivery_mainBox">
                                                        <div class="schedule_box">
                                                            <div class="schedule_header" id="scheduleHeader">
                                                                <div class="day_box" id="dayBox">Today</div>
                                                                <div class="time_box" id="timeBox">06:00 AM - 10:00 AM
                                                                </div>
                                                                <div id="arrowBox" class="arrow_box" title="Click Here">
                                                                    <img src="<?php echo e(asset('assets/images/down_arrow.png')); ?>"
                                                                        alt="arrow">
                                                                </div>
                                                            </div>
                                                            <div id="scheduleDetailsBox" class="schedule_deatils_box">
                                                                <div class="subheading">Choose a date</div>
                                                                <div class="schedule-list">
                                                                    <div class="schedule">
                                                                        <input type="radio" id="date_01" name="date"
                                                                            value="Today" checked>
                                                                        <label for="date_01">
                                                                            <div class="dateBox">10</div>
                                                                            <div class="dayBox">Today</div>
                                                                        </label>
                                                                    </div>
                                                                    <div class="schedule">
                                                                        <input type="radio" id="date_02" name="date"
                                                                            value="Tomorrow">
                                                                        <label for="date_02">
                                                                            <div class="dateBox">11</div>
                                                                            <div class="dayBox">Tom</div>
                                                                        </label>
                                                                    </div>
                                                                    <div class="schedule">
                                                                        <input type="radio" id="date_03" name="date"
                                                                            value="Wed">
                                                                        <label for="date_03">
                                                                            <div class="dateBox">12</div>
                                                                            <div class="dayBox">Wed</div>
                                                                        </label>
                                                                    </div>
                                                                    <div class="schedule">
                                                                        <input type="radio" id="date_04" name="date"
                                                                            value="Thu">
                                                                        <label for="date_04">
                                                                            <div class="dateBox">13</div>
                                                                            <div class="dayBox">Thu</div>
                                                                        </label>
                                                                    </div>
                                                                    <div class="schedule">
                                                                        <input type="radio" id="date_05" name="date"
                                                                            value="Fri">
                                                                        <label for="date_05">
                                                                            <div class="dateBox">14</div>
                                                                            <div class="dayBox">Fri</div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="subheading">Choose a time</div>
                                                                <div class="schedule-list">
                                                                    <div class="schedule">
                                                                        <input type="radio" id="time_01" name="time"
                                                                            value="06:00 AM - 10:00 AM" checked>
                                                                        <label for="time_01">
                                                                            <div class="dateBox">06:00 AM - 10:00 AM
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                    <div class="schedule">
                                                                        <input type="radio" id="time_02" name="time"
                                                                            value="02:00 PM - 05:00 PM">
                                                                        <label for="time_02">
                                                                            <div class="dateBox">02:00 PM - 05:00 PM
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                    <div class="schedule">
                                                                        <input type="radio" id="time_03" name="time"
                                                                            value="05:00 PM - 09:00 PM">
                                                                        <label for="time_03">
                                                                            <div class="dateBox">05:00 PM - 09:00 PM
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="car_order_detailsBox position__sticky">
                                                    <div class="gift_section">
                                                        <div class="order-subheading d-flex align-items-center">
                                                            <img src="<?php echo e(asset('assets/images/gift.png')); ?>" alt=""
                                                                class="img-fluid" style="max-width:30px"> Free gift for
                                                            you!
                                                        </div>
                                                        <div class="gift_boxlist">
                                                            <div class="owl-carousel owl-carousel-slider">
                                                                <div class="item">
                                                                    <div class="gift_mainBox">
                                                                        <div class="gift_details">
                                                                            <div class="gift_product_details">
                                                                                <div class="gift_product_img">
                                                                                    <img src="<?php echo e(asset('assets/images/product1.png')); ?>"
                                                                                        alt="" class=" img-fluid">
                                                                                </div>
                                                                                <div class="gift_product_des">
                                                                                    <div class="gift_product_name">
                                                                                        Marmum 1ltr Full Cream Fresh
                                                                                        Milk (1 Ltrs)
                                                                                    </div>
                                                                                    <ul>
                                                                                        <li>Price : <span
                                                                                                class="price">AED
                                                                                                6.70</span></li>
                                                                                        <li>Weight : <span>300 ml</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="add_btnBox">
                                                                                <a href="" class="add_btn">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="gift_offer">
                                                                            <img src="<?php echo e(asset('assets/images/gift_icon.png')); ?>"
                                                                                alt="lock" style="max-width:30px">
                                                                            <span>Add items worth AED
                                                                                <strong>10</strong> for Unlocked
                                                                                free gift !</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="item">
                                                                    <div class="gift_mainBox">
                                                                        <div class="gift_details">
                                                                            <div class="gift_product_details">
                                                                                <div class="gift_product_img">
                                                                                    <img src="<?php echo e(asset('assets/images/product1.png')); ?>"
                                                                                        alt="" class=" img-fluid">
                                                                                </div>
                                                                                <div class="gift_product_des">
                                                                                    <div class="gift_product_name">
                                                                                        Marmum 1ltr Full Cream Fresh
                                                                                        Milk (1 Ltrs)
                                                                                    </div>
                                                                                    <ul>
                                                                                        <li>Price : <span
                                                                                                class="price">AED
                                                                                                6.70</span></li>
                                                                                        <li>Weight : <span>300 ml</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="add_btnBox">
                                                                                <a href="" class="add_btn">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="gift_offer">
                                                                            <img src="<?php echo e(asset('assets/images/gift_icon.png')); ?>"
                                                                                alt="lock" style="max-width:30px">
                                                                            <span>Add items worth AED
                                                                                <strong>10</strong> for Unlocked
                                                                                free gift !</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="coupons_box">
                                                        <a href="<?php echo e(ENV('APP_URL')); ?>coupon">
                                                            <img src="<?php echo e(asset('assets/images/offer.png')); ?>" alt="lock"
                                                                style="max-width:30px">
                                                            <span><strong>View Coupons & Offers</strong></span>
                                                        </a>
                                                    </div>
                                                    <div class="order_detailbox">
                                                        <div class="order-subheading d-flex align-items-center">
                                                            Delivery Partner Tip
                                                        </div>
                                                        <p>The entire amount will be sent to your delivery partner</p>
                                                        <div class="week-list">
                                                            <div class="weeks">
                                                                <input type="radio" id="tip_01" name="tip" value="3">
                                                                <label for="tip_01">AED 3 <span
                                                                        class="smiley_icon">🙂</span></label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="tip_02" name="tip" value="5">
                                                                <label for="tip_02">AED 5 <span
                                                                        class="smiley_icon">😄</span></label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="tip_03" name="tip" value="10">
                                                                <label for="tip_03">AED 10 <span
                                                                        class="smiley_icon">😍</span></label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="tip_04" name="tip" value="15">
                                                                <label for="tip_04">AED 15 <span
                                                                        class="smiley_icon">😎</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order_detailbox">
                                                        <div class="order-subheading d-flex align-items-center">
                                                            Bill Details
                                                        </div>
                                                        <div class="order_details">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Item Total :</td>
                                                                        <td>AED 7</td>
                                                                    </tr>
                                                                    <tr class="small-text">
                                                                        <td>Handing Charges</td>
                                                                        <td>AED 0.00</td>
                                                                    </tr>
                                                                    <tr class="small-text">
                                                                        <td>Delivery Charges</td>
                                                                        <td>AED 0</td>
                                                                    </tr>
                                                                    <tr class="small-text">
                                                                        <td>Delivery Partner Tip</td>
                                                                        <td>AED 0.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Bill</td>
                                                                        <td><strong>AED 7</strong></td>
                                                                    </tr>
                                                                    <tr class="quickart-cash">
                                                                        <td>Quickart Wallet</td>
                                                                        <td>
                                                                            <label for="wallet">AED 20 </label>
                                                                            <input type="checkbox" name="wallet"
                                                                                id="wallet">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>To Pay</td>
                                                                        <td><strong>AED</strong> 1234</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="order_detailbox instruction_box">
                                                        <div class="order-subheading d-flex align-items-center">
                                                            Delivery Instructions
                                                        </div>
                                                        <p>Delivery partner will be notified</p>
                                                        <div class="week-list">
                                                            <div class="weeks">
                                                                <input type="radio" id="instruction_02"
                                                                    name="instruction" value="avoid_calling">
                                                                <label for="instruction_02">
                                                                    <span>
                                                                        <img src="<?php echo e(asset('assets/images/streamline_call-hang-up.png')); ?>"
                                                                            alt="" class="img-fluid"
                                                                            style="max-width:15px">
                                                                    </span>
                                                                    <div class="delivery_instruction_text">Avoid calling
                                                                        customer</div>
                                                                </label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="instruction_03"
                                                                    name="instruction" value="bell">
                                                                <label for="instruction_03">
                                                                    <span>
                                                                        <img src="<?php echo e(asset('assets/images/octicon_bell-slash.png')); ?>"
                                                                            alt="" class="img-fluid"
                                                                            style="max-width:15px">
                                                                    </span>
                                                                    <div class="delivery_instruction_text">Don’t ring
                                                                        the bell</div>
                                                                </label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="instruction_04"
                                                                    name="instruction" value="leave_door">
                                                                <label for="instruction_04">
                                                                    <span>
                                                                        <img src="<?php echo e(asset('assets/images/door.png')); ?>"
                                                                            alt="" class="img-fluid"
                                                                            style="max-width:18px">
                                                                    </span>
                                                                    <div class="delivery_instruction_text">Leave it at
                                                                        my door</div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="payment_mainBox">
                                                        <div class="payment_address_box">
                                                            <div class="address_detailsBox">
                                                                <div class="payment_add_img">
                                                                    <img src="<?php echo e(asset('assets/images/home_address.png')); ?>"
                                                                        alt="lock" style="max-width:45px">
                                                                </div>
                                                                <div class="address_details">
                                                                    <div class="address_head">Delivering to
                                                                        <strong>Home</strong>
                                                                    </div>
                                                                    <div class="address_location">
                                                                        <span class="loaction">Dubai, 278/2, Zahra Town
                                                                            House - AI Qudra Road, Churchil Tower One,
                                                                            Dubai, United Arab Emirates.</span>
                                                                        <span class="distance">7.5 km away</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="change_btn">
                                                                <a href="<?php echo e(ENV('APP_URL')); ?>address-list">Change</a>
                                                            </div>
                                                        </div>
                                                        <div class="payment_address_box">
                                                            <div class="address_detailsBox">
                                                                <div class="payment_add_img">
                                                                    <img src="<?php echo e(asset('assets/images/pay_card.png')); ?>"
                                                                        alt="lock" style="max-width:45px">
                                                                </div>
                                                                <div class="address_details">
                                                                    <div class="card_details">Pay with card ****0074
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="change_btn">
                                                                <a href="<?php echo e(ENV('APP_URL')); ?>card-details">Change</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pay_btn_wrap">
                                                        <a href="" class="pay_btn">
                                                            <span>Pay Now</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="2" class="tabcontent" style="display: none;">
                                    <div class="content_Mainbox">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="free_deliveryBox">
                                                    <img src="<?php echo e(asset('assets/images/freeDelivery.png')); ?>" alt="lock"
                                                        style="max-width:30px">
                                                    <span><strong>AED 12</strong> saved, <strong>FREE DELIVERY</strong>
                                                        Unlocked !</span>
                                                </div>

                                                <div class="car_product_list_mainBox">
                                                    <div class="car_product_list">
                                                        <div class="ordered_product">
                                                            <div class="product_imgbox">
                                                                <img src="<?php echo e(asset('assets/images/product1.png')); ?>"
                                                                    alt="" class=" img-fluid">
                                                            </div>
                                                            <div class="order_info">
                                                                <div class="row">
                                                                    <div class="col-8">
                                                                        <div class="order_product_name">Marmum 1ltr Full
                                                                            Cream
                                                                            Fresh Milk (1 Ltrs)
                                                                        </div>
                                                                        <div class="weightBox">
                                                                            weight <span>1 Lt</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="priceBox text-end">
                                                                            <div class="actual_price">AED
                                                                                <span>6.65</span>
                                                                            </div>
                                                                            <div class="mrp_price">AED
                                                                                <span>8</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order_details">
                                                                    <div class="row align-items-end g-0">
                                                                        <div class="col-12">
                                                                            <div class="sub_btn_mainBox">
                                                                                <div class="qtyBox justify-content-end">
                                                                                    <button
                                                                                        class="qty-btn qty-btn-minus"
                                                                                        type="button">-</button>
                                                                                    <input type="text" name="qty"
                                                                                        value="1"
                                                                                        class="input-qty input-rounded">
                                                                                    <button class="qty-btn qty-btn-plus"
                                                                                        type="button">+</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="required_text" class="required_info_text"
                                                            onclick="addClasses(this)">Please
                                                            <strong>click
                                                                here</strong> to select
                                                            all required information.
                                                        </div>
                                                        <div class="subscription_date_time">Repeats on <span>Sun,
                                                                Mon, Tue</span> for <span>2</span> weeks from
                                                            <span>06:00 AM - 10:00 AM</span>
                                                        </div>
                                                        <div class="subscription_selectDetails">
                                                            <div class="repeatDays_box">
                                                                <div
                                                                    class="order-subheading d-flex justify-content-between align-items-center">
                                                                    <div class="headingBox">
                                                                        <img src="<?php echo e(asset('assets/images/calender.png')); ?>"
                                                                            alt="" class="img-fluid"
                                                                            style="max-width:25px">
                                                                        Repeat Days
                                                                    </div>
                                                                    <div class="allDay_checkbox">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="alldays">
                                                                        <label class="form-check-label" for="alldays">
                                                                            All days
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <ul class="day_count">
                                                                    <li>
                                                                        <label>
                                                                            <input type="checkbox" name="day_sunday"
                                                                                id="day_sunday">
                                                                            <div class="day-box">S</div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label>
                                                                            <input type="checkbox" name="day_monday"
                                                                                id="day_monday">
                                                                            <div class="day-box">M</div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label>
                                                                            <input type="checkbox" name="day_tuesday"
                                                                                id="day_tuesday">
                                                                            <div class="day-box">T</div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label>
                                                                            <input type="checkbox" name="day_wednesday"
                                                                                id="day_wednesday">
                                                                            <div class="day-box">W</div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label>
                                                                            <input type="checkbox" name="day_thursday"
                                                                                id="day_thursday">
                                                                            <div class="day-box">T</div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label>
                                                                            <input type="checkbox" name="day_friday"
                                                                                id="day_friday">
                                                                            <div class="day-box">F</div>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label>
                                                                            <input type="checkbox" name="day_saturday"
                                                                                id="day_saturday">
                                                                            <div class="day-box">S</div>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="subscription_duration">
                                                                <div class="order-subheading d-flex">
                                                                    <img src="<?php echo e(asset('assets/images/Certificate.png')); ?>"
                                                                        alt="" class="img-fluid" style="max-width:25px">
                                                                    <div class="head">
                                                                        <div class="heading">Subscription Duration</div>
                                                                        <div class="subheading">Select week duration for
                                                                            subscription</div>
                                                                    </div>
                                                                </div>
                                                                <div class="week-list">
                                                                    <div class="weeks">
                                                                        <input type="radio" id="control_01" name="week"
                                                                            value="11">
                                                                        <label for="control_01">1 week</label>
                                                                    </div>
                                                                    <div class="weeks">
                                                                        <input type="radio" id="control_02" name="week"
                                                                            value="12">
                                                                        <label for="control_02">2 week</label>
                                                                    </div>
                                                                    <div class="weeks">
                                                                        <input type="radio" id="control_03" name="week"
                                                                            value="13">
                                                                        <label for="control_03">4 week</label>
                                                                    </div>
                                                                    <div class="weeks">
                                                                        <input type="radio" id="control_04" name="week"
                                                                            value="14">
                                                                        <label for="control_04">8 week</label>
                                                                    </div>
                                                                    <div class="weeks">
                                                                        <input type="radio" id="control_05" name="week"
                                                                            value="15">
                                                                        <label for="control_05">12 week</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="subscription_duration d-flex justify-content-between align-items-center">
                                                                <div class="order-subheading d-flex">
                                                                    <img src="<?php echo e(asset('assets/images/calender-black.png')); ?>"
                                                                        alt="" class="img-fluid" style="max-width:25px">
                                                                    <div class="head">
                                                                        <div class="heading">Start Date of Delivery
                                                                        </div>
                                                                        <div class="subheading pb-0">Select date for
                                                                            duration</div>
                                                                    </div>
                                                                </div>
                                                                <div class="dateBox">
                                                                    <input type="date" name="select-date"
                                                                        id="select-date">
                                                                </div>
                                                            </div>
                                                            <div class="subscription_duration">
                                                                <div class="order-subheading d-flex">
                                                                    <img src="<?php echo e(asset('assets/images/Clock.png')); ?>"
                                                                        alt="" class="img-fluid" style="max-width:25px">
                                                                    <div class="head">
                                                                        <div class="heading">Select Time of Delivery
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="week-list">
                                                                    <div class="weeks">
                                                                        <input type="radio" id="delivery_time_01"
                                                                            name="time" value="11">
                                                                        <label for="delivery_time_01">06:00 am - 10:00
                                                                            am</label>
                                                                    </div>
                                                                    <div class="weeks">
                                                                        <input type="radio" id="delivery_time_02"
                                                                            name="time" value="12">
                                                                        <label for="delivery_time_02">02:00 pm - 05:00
                                                                            pm</label>
                                                                    </div>
                                                                    <div class="weeks">
                                                                        <input type="radio" id="delivery_time_03"
                                                                            name="time" value="13">
                                                                        <label for="delivery_time_03">05:00 pm - 09:00
                                                                            pm</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="button_wrap justify-content-center">
                                                                <div class="order_confirm_btn">Confirm</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="car_product_list">
                                                        <div class="ordered_product">
                                                            <div class="product_imgbox">
                                                                <img src="<?php echo e(asset('assets/images/product1.png')); ?>"
                                                                    alt="" class=" img-fluid">
                                                            </div>
                                                            <div class="order_info">
                                                                <div class="row">
                                                                    <div class="col-8">
                                                                        <div class="order_product_name">Marmum 1ltr Full
                                                                            Cream
                                                                            Fresh Milk (1 Ltrs)
                                                                        </div>
                                                                        <div class="weightBox">
                                                                            weight <span>1 Lt</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <div class="priceBox text-end">
                                                                            <div class="actual_price">AED
                                                                                <span>6.65</span>
                                                                            </div>
                                                                            <div class="mrp_price">AED
                                                                                <span>8</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="order_details">
                                                                    <div class="row align-items-end g-0">
                                                                        <div class="col-12">
                                                                            <div class="sub_btn_mainBox">
                                                                                <div class="qtyBox justify-content-end">
                                                                                    <button
                                                                                        class="qty-btn qty-btn-minus"
                                                                                        type="button">-</button>
                                                                                    <input type="text" name="qty"
                                                                                        value="1"
                                                                                        class="input-qty input-rounded">
                                                                                    <button class="qty-btn qty-btn-plus"
                                                                                        type="button">+</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="car_order_detailsBox position__sticky">
                                                    <div class="gift_section">
                                                        <div class="order-subheading d-flex align-items-center">
                                                            <img src="<?php echo e(asset('assets/images/gift.png')); ?>" alt=""
                                                                class="img-fluid" style="max-width:30px"> Free gift for
                                                            you!
                                                        </div>
                                                        <div class="gift_boxlist">
                                                            <div class="owl-carousel owl-carousel-slider">
                                                                <div class="item">
                                                                    <div class="gift_mainBox">
                                                                        <div class="gift_details">
                                                                            <div class="gift_product_details">
                                                                                <div class="gift_product_img">
                                                                                    <img src="<?php echo e(asset('assets/images/product1.png')); ?>"
                                                                                        alt="" class=" img-fluid">
                                                                                </div>
                                                                                <div class="gift_product_des">
                                                                                    <div class="gift_product_name">
                                                                                        Marmum 1ltr Full Cream Fresh
                                                                                        Milk (1 Ltrs)
                                                                                    </div>
                                                                                    <ul>
                                                                                        <li>Price : <span
                                                                                                class="price">AED
                                                                                                6.70</span></li>
                                                                                        <li>Weight : <span>300 ml</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="add_btnBox">
                                                                                <a href="" class="add_btn">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="gift_offer">
                                                                            <img src="<?php echo e(asset('assets/images/gift_icon.png')); ?>"
                                                                                alt="lock" style="max-width:30px">
                                                                            <span>Add items worth AED
                                                                                <strong>10</strong> for Unlocked
                                                                                free gift !</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="item">
                                                                    <div class="gift_mainBox">
                                                                        <div class="gift_details">
                                                                            <div class="gift_product_details">
                                                                                <div class="gift_product_img">
                                                                                    <img src="<?php echo e(asset('assets/images/product1.png')); ?>"
                                                                                        alt="" class=" img-fluid">
                                                                                </div>
                                                                                <div class="gift_product_des">
                                                                                    <div class="gift_product_name">
                                                                                        Marmum 1ltr Full Cream Fresh
                                                                                        Milk (1 Ltrs)
                                                                                    </div>
                                                                                    <ul>
                                                                                        <li>Price : <span
                                                                                                class="price">AED
                                                                                                6.70</span></li>
                                                                                        <li>Weight : <span>300 ml</span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                            <div class="add_btnBox">
                                                                                <a href="" class="add_btn">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="gift_offer">
                                                                            <img src="<?php echo e(asset('assets/images/gift_icon.png')); ?>"
                                                                                alt="lock" style="max-width:30px">
                                                                            <span>Add items worth AED
                                                                                <strong>10</strong> for Unlocked
                                                                                free gift !</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="coupons_box">
                                                        <a href="<?php echo e(ENV('APP_URL')); ?>coupon">
                                                            <img src="<?php echo e(asset('assets/images/offer.png')); ?>" alt="lock"
                                                                style="max-width:30px">
                                                            <span><strong>View Coupons & Offers</strong></span>
                                                        </a>
                                                    </div>
                                                    <div class="order_detailbox">
                                                        <div class="order-subheading d-flex align-items-center">
                                                            Delivery Partner Tip
                                                        </div>
                                                        <p>The entire amount will be sent to your delivery partner</p>
                                                        <div class="week-list">
                                                            <div class="weeks">
                                                                <input type="radio" id="sub_tip_01" name="sub_tip"
                                                                    value="3">
                                                                <label for="sub_tip_01">AED 3 <span
                                                                        class="smiley_icon">🙂</span></label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="sub_tip_02" name="sub_tip"
                                                                    value="5">
                                                                <label for="sub_tip_02">AED 5 <span
                                                                        class="smiley_icon">😄</span></label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="sub_tip_03" name="sub_tip"
                                                                    value="10">
                                                                <label for="sub_tip_03">AED 10 <span
                                                                        class="smiley_icon">😍</span></label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="sub_tip_04" name="sub_tip"
                                                                    value="15">
                                                                <label for="sub_tip_04">AED 15 <span
                                                                        class="smiley_icon">😎</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="order_detailbox">
                                                        <div class="order-subheading d-flex align-items-center">
                                                            Bill Details
                                                        </div>
                                                        <div class="order_details">
                                                            <table>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Item Total :</td>
                                                                        <td>AED 7</td>
                                                                    </tr>
                                                                    <tr class="small-text">
                                                                        <td>Handing Charges</td>
                                                                        <td>AED 0.00</td>
                                                                    </tr>
                                                                    <tr class="small-text">
                                                                        <td>Delivery Charges</td>
                                                                        <td>AED 0</td>
                                                                    </tr>
                                                                    <tr class="small-text">
                                                                        <td>Delivery Partner Tip</td>
                                                                        <td>AED 0.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Bill</td>
                                                                        <td><strong>AED 7</strong></td>
                                                                    </tr>
                                                                    <tr class="quickart-cash">
                                                                        <td>Quickart Wallet</td>
                                                                        <td>
                                                                            <label for="subscription_wallet">AED 20
                                                                            </label>
                                                                            <input type="checkbox"
                                                                                name="subscription_wallet"
                                                                                id="subscription_wallet">
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>To Pay</td>
                                                                        <td><strong>AED</strong> 1234</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="order_detailbox instruction_box">
                                                        <div class="order-subheading d-flex align-items-center">
                                                            Delivery Instructions
                                                        </div>
                                                        <p>Delivery partner will be notified</p>
                                                        <div class="week-list">
                                                            <div class="weeks">
                                                                <input type="radio" id="sub_instruction_02"
                                                                    name="sub_instruction" value="avoid_calling">
                                                                <label for="sub_instruction_02">
                                                                    <span>
                                                                        <img src="<?php echo e(asset('assets/images/streamline_call-hang-up.png')); ?>"
                                                                            alt="" class="img-fluid"
                                                                            style="max-width:15px">
                                                                    </span>
                                                                    <div class="delivery_instruction_text">Avoid calling
                                                                        customer</div>
                                                                </label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="sub_instruction_03"
                                                                    name="sub_instruction" value="bell">
                                                                <label for="sub_instruction_03">
                                                                    <span>
                                                                        <img src="<?php echo e(asset('assets/images/octicon_bell-slash.png')); ?>"
                                                                            alt="" class="img-fluid"
                                                                            style="max-width:15px">
                                                                    </span>
                                                                    <div class="delivery_instruction_text">Don’t ring
                                                                        the bell</div>
                                                                </label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="sub_instruction_04"
                                                                    name="sub_instruction" value="leave_door">
                                                                <label for="sub_instruction_04">
                                                                    <span>
                                                                        <img src="<?php echo e(asset('assets/images/door.png')); ?>"
                                                                            alt="" class="img-fluid"
                                                                            style="max-width:18px">
                                                                    </span>
                                                                    <div class="delivery_instruction_text">Leave it at
                                                                        my door</div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="payment_mainBox">
                                                        <div class="payment_address_box">
                                                            <div class="address_detailsBox">
                                                                <div class="payment_add_img">
                                                                    <img src="<?php echo e(asset('assets/images/home_address.png')); ?>"
                                                                        alt="lock" style="max-width:45px">
                                                                </div>
                                                                <div class="address_details">
                                                                    <div class="address_head">Delivering to
                                                                        <strong>Home</strong>
                                                                    </div>
                                                                    <div class="address_location">
                                                                        <span class="loaction">Dubai, 278/2, Zahra Town
                                                                            House - AI Qudra Road, Churchil Tower One,
                                                                            Dubai, United Arab Emirates.</span>
                                                                        <span class="distance">7.5 km away</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="change_btn">
                                                                <a href="<?php echo e(ENV('APP_URL')); ?>address-list">Change</a>
                                                            </div>
                                                        </div>
                                                        <div class="payment_address_box">
                                                            <div class="address_detailsBox">
                                                                <div class="payment_add_img">
                                                                    <img src="<?php echo e(asset('assets/images/pay_card.png')); ?>"
                                                                        alt="lock" style="max-width:45px">
                                                                </div>
                                                                <div class="address_details">
                                                                    <div class="card_details">Pay with card ****0074
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="change_btn">
                                                                <a href="<?php echo e(ENV('APP_URL')); ?>card-details">Change</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pay_btn_wrap">
                                                        <a href="" class="pay_btn">
                                                            <span>Pay Now</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty_cartMainbox text-center d-none">
                            <img src="<?php echo e(asset('assets/images/no_cart.png')); ?>" alt="" class="img-fluid"
                                style="max-width:80px">
                            <div class="subheading">Empty cart!</div>
                            <p style="color: #8F8F8F;">Looks like you haven’t added any items yet.</p>
                            <div class="mb-3">
                                <div>Explore our variety of products and new offers</div>
                            </div>
                            <a href="" class="mb-3 d-block">
                                <div class="cancel_btn">Let's Shop</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cart section end -->


<!-- SCHEDULAE BOX SCRIPT START -->
<script>
document.getElementById('arrowBox').onclick = function() {
    var header = document.getElementById('scheduleHeader');
    var detailsBox = document.getElementById('scheduleDetailsBox');

    header.classList.toggle('expanded');
    detailsBox.classList.toggle('expanded');
};
</script>
<!-- SCHEDULAE BOX SCRIPT END -->
<!-- TABBING SCRIPT START -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    function openCity(evt, cityName) {
        var tabcontent = document.getElementsByClassName("tabcontent");
        for (var i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        var tablinks = document.getElementsByClassName("tablinks");
        for (var i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active");
        }
        document.getElementById(cityName).style.display = "block";
        if (evt) {
            evt.currentTarget.classList.add("active");
        }
    }
    var subscribeBtns = document.getElementsByClassName('subscribe_btn');
    for (var i = 0; i < subscribeBtns.length; i++) {
        subscribeBtns[i].addEventListener('click', function() {
            var subscriptionCartTab = document.getElementById('subscriptionCartTab');
            subscriptionCartTab.click();
        });
    }
    var dailyCartTab = document.getElementById('dailyCartTab');
    dailyCartTab.addEventListener('click', function(event) {
        openCity(event, '1');
    });
    var subscriptionCartTab = document.getElementById('subscriptionCartTab');
    subscriptionCartTab.addEventListener('click', function(event) {
        openCity(event, '2');
    });
});
</script>

<!-- TABBING SCRIPT END -->
<!-- check all days checbox script start -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#alldays').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('.day_count input[type="checkbox"]').prop('checked', isChecked).change();
    });

    $('.day_count input[type="checkbox"]').on('change', function() {
        var allChecked = $('.day_count input[type="checkbox"]').length === $(
            '.day_count input[type="checkbox"]:checked').length;
        $('#alldays').prop('checked', allChecked);
    });
});
</script>
<!-- check all days checbox script end -->

<!-- ON CHANGE SHOW SELECTED DATE AND TIME IN SCHEDULE DELIVERY SECTION START -->
<script>
// Function to update the day box
function updateDayBox() {
    const dayBox = document.getElementById('dayBox');
    const dateRadios = document.getElementsByName('date');
    dateRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.checked) {
                dayBox.textContent = radio.value;
            }
        });
    });
}

// Function to update the time box
function updateTimeBox() {
    const timeBox = document.getElementById('timeBox');
    const timeRadios = document.getElementsByName('time');
    timeRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.checked) {
                timeBox.textContent = radio.value;
            }
        });
    });
}

// Call the functions to add event listeners
updateDayBox();
updateTimeBox();
</script>
<!-- ON CHANGE SHOW SELECTED DATE AND TIME IN SCHEDULE DELIVERY SECTION START -->

<script>
// Get the required_info_text and subscription_selectDetails elements
var requiredText = document.getElementById('required_text');
var subscriptionDetails = document.querySelector('.subscription_selectDetails');

// Add event listener to the required_info_text element
requiredText.addEventListener('click', function() {
    // Add class to the required_info_text element
    requiredText.classList.add('clicked');

    // Add class to the subscription_selectDetails element
    subscriptionDetails.classList.add('show');
});
</script>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/cart.blade.php ENDPATH**/ ?>