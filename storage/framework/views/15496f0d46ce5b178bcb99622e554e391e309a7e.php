<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- cart section start -->
<?php
$strToArr = 'Ajman,Dubai,Sharjah,عجمان,دبي,الشارقة';
$countries = explode(',', $strToArr);
?>
<style>
  .centerMarker {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -12px;
    margin-top: -34px;
    z-index: 10;
    pointer-events: none;
     max-height:40px;
  }
</style>
<section class="cart_section section-padding">
    <div class="container-fluid">
        <?php if(isset($productList['data'])): ?>
            
        <div class="row">
            <div class="col-lg-6">
                <div class="position__sticky">
                    <div class="free_deliveryBox">
                        <img src="<?php echo e(asset('assets/images/freeDelivery.png')); ?>" alt="lock"
                            style="max-width:30px">
                        <span><strong>Free Delivery</strong>
                            - Shop now & Save!</span>
                    </div>
                    <div class="car_product_list_mainBox">
                        <?php $__currentLoopData = $productList['data']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="car_product_list">
                            <div class="ordered_product">
                                <div class="product_imgbox">
                                    <img src="<?php echo e($product['product_image']); ?>" alt="" class=" img-fluid">
                                </div>
                                <div class="order_info">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="order_product_name"><?php echo e($product['title']); ?>

                                            </div>
                                            <div class="actual_price">AED
                                                <span><?php echo e(number_format($product['discount_ord_price'], 2)); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order_details">
                                        <div class="row align-items-end g-0">
                                            <div class="col-12">
                                                <div class="sub_btn_mainBox">
                                                    <div class="qtyBox justify-content-end">
                                                        <div class="cart_deletebox"
                                                            onclick="deleteCartItem('<?php echo e($product['trail_id']); ?>', 'add')">
                                                            <img
                                                                src="<?php echo e(asset('assets/images/delete.svg')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="missed-items-slider order_detailbox section-padding">
                            <div class="section-header">
                                <div class="order-subheading d-flex align-items-center">Schedule Delivery Date</div>
                            </div>
                            <div class="schedule_header schedule_box" id="scheduleHeader">
                                <div class="day_box" id="dayBox">
                                    <?php echo e(Carbon\Carbon::parse($productList['data']['timeslotsdata'][0]['date'])->isToday() ? 'Today' : (Carbon\Carbon::parse($productList['data']['timeslotsdata'][0]['date'])->isTomorrow() ? 'Tomorrow' : Carbon\Carbon::parse($productList['data']['timeslotsdata'][0]['date'])->format('l'))); ?>

                                </div>
                                <div class="time_box" id="timeBox">
                                    <?php echo e($productList['data']['timeslotsdata'][0]['timeslots'][0]['time_slots']); ?>

                                </div>
                                <div id="arrowBox" class="arrow_box" title="Click Here">
                                    <img src="<?php echo e(asset('assets/images/down_arrow.png')); ?>" alt="arrow">
                                </div>
                            </div>
                            <div id="scheduleDetailsBox" class="schedule_deatils_box trailpack_schedule_box">
                                <div class="subheading">Choose a date</div>
                                <div class="schedule-list schedule-DateList">
                                    <?php $__currentLoopData = $productList['data']['timeslotsdata']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="schedule">
                                        <input type="radio"
                                            id="date_<?php echo e(Carbon\Carbon::parse($dateList['date'])->format('Ymd')); ?>"
                                            name="date" value="<?php echo e($dateList['date']); ?>"
                                            data-date="<?php echo e($dateList['date']); ?>"
                                            onclick="updateTimeSlots('<?php echo e($dateList['date']); ?>')"
                                            <?php echo e($loop->first ? 'checked' : ''); ?>>
                                        <label
                                            for="date_<?php echo e(Carbon\Carbon::parse($dateList['date'])->format('Ymd')); ?>">
                                            <div class="dateBox">
                                                <?php echo e(Carbon\Carbon::parse($dateList['date'])->format('d')); ?>

                                                </div>
                                                <div class="dayBox">
                                                    <?php echo e(Carbon\Carbon::parse($dateList['date'])->isToday() ? 'Today' :(Carbon\Carbon::parse($dateList['date'])->isTomorrow() ? 'Tomorrow' : Carbon\Carbon::parse($dateList['date'])->format('l'))); ?>

                                                </div>
                                        </label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <hr>
                                <div class="subheading">Choose a time</div>
                                <div class="schedule-list" id="timeSlotContainer">
                                    <!-- Time slots will be updated dynamically -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="car_order_detailsBox">
                    <div class="order_detailbox">
                        <div class="order-subheading d-flex align-items-center">
                            Delivery Partner Tip
                        </div>
                        <p>The entire amount will be sent to your delivery partner</p>
                        <div class="week-list">
                            <div class="weeks">
                                <input type="radio" id="tip_01" name="tip" value="3"
                                    onclick="updateTip(this)">
                                <label for="tip_01">AED 3 <span class="smiley_icon">🙂</span></label>
                            </div>
                            <div class="weeks">
                                <input type="radio" id="tip_02" name="tip" value="5"
                                    onclick="updateTip(this)">
                                <label for="tip_02">AED 5 <span class="smiley_icon">😄</span></label>
                            </div>
                            <div class="weeks">
                                <input type="radio" id="tip_03" name="tip" value="10"
                                    onclick="updateTip(this)">
                                <label for="tip_03">AED 10 <span class="smiley_icon">😍</span></label>
                            </div>
                            <div class="weeks">
                                <input type="radio" id="tip_04" name="tip" value="15"
                                    onclick="updateTip(this)">
                                <label for="tip_04">AED 15 <span class="smiley_icon">😎</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="order_detailbox">
                        <div class="order-subheading d-flex align-items-center">
                            Order Summary
                        </div>
                        <div class="order_details">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Item Total :</td>
                                        <td><span>
                                                <?php if($productList['data']['discount_total_price'] !=
                                                $productList['data']['total_mrp']): ?>
                                                <span class="regular-price">AED
                                                    <span>
                                                        <?php echo e(number_format($productList['data']['total_mrp'], 2)); ?></span></span>
                                                <!-- </p> -->
                                                <?php endif; ?>
                                            </span> AED
                                            <?php echo e(number_format($productList['data']['discount_total_price'], 2)); ?>

                                        </td>
                                    </tr>
                                    <tr class="small-text">
                                        <td>Delivery Partner Tip</td>
                                        <td id="deliveryTip">AED 0.00</td>
                                    </tr>
                                    <tr class="small-text">
                                        <td>VAT</td>
                                        <td>AED <?php echo e(number_format($productList['data']['vat'], 2)); ?>

                                        </td>
                                    </tr>

                                    <tr class="small-text" id='codChargesRow'>
                                        <td>COD charges</td>
                                        <td id="codCharges">AED
                                            <?php echo e(number_format($productList['data']['vat'], 2)); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>To Pay</td>
                                        <td id="totalPay"><strong>AED
                                                <?php echo e(number_format($productList['data']['discount_total_price'], 2)); ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--<div class="order_detailbox instruction_box">-->
                    <!--    <div class="order-subheading d-flex align-items-center">-->
                    <!--        Delivery Instructions-->
                    <!--    </div>-->
                    <!--    <p>Delivery partner will be notified</p>-->
                    <!--    <div class="week-list new_week-list">-->
                    <!--        <div class="weeks new_weeks">-->
                    <!--            <input type="radio" id="instruction_02"-->
                    <!--                name="instruction" value="Avoid calling customer">-->
                    <!--            <label for="instruction_02">-->
                    <!--                <span>-->
                    <!--                    <img src="<?php echo e(asset('assets/images/streamline_call-hang-up.png')); ?>"-->
                    <!--                        alt="" class="img-fluid"-->
                    <!--                        style="max-width:15px">-->
                    <!--                </span>-->
                    <!--                <div class="delivery_instruction_text">Avoid calling customer</div>-->
                    <!--            </label>-->
                    <!--        </div>-->
                    <!--        <div class="weeks new_weeks">-->
                    <!--            <input type="radio" id="instruction_03"-->
                    <!--                name="instruction" value="Don’t ring the bell">-->
                    <!--            <label for="instruction_03">-->
                    <!--                <span>-->
                    <!--                    <img src="<?php echo e(asset('assets/images/octicon_bell-slash.png')); ?>"-->
                    <!--                        alt="" class="img-fluid"-->
                    <!--                        style="max-width:15px">-->
                    <!--                </span>-->
                    <!--                <div class="delivery_instruction_text">Don’t ring the bell</div>-->
                    <!--            </label>-->
                    <!--        </div>-->
                    <!--        <div class="weeks new_weeks">-->
                    <!--            <input type="radio" id="instruction_04"-->
                    <!--                name="instruction" value="Leave it at my door">-->
                    <!--            <label for="instruction_04">-->
                    <!--                <span>-->
                    <!--                    <img src="<?php echo e(asset('assets/images/door.png')); ?>"-->
                    <!--                        alt="" class="img-fluid"-->
                    <!--                        style="max-width:18px">-->
                    <!--                </span>-->
                    <!--                <div class="delivery_instruction_text">Leave it at my door</div>-->
                    <!--            </label>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                  
                    <div class="order_detailbox instruction_box deliveryInstruction">
                        <div class="order-subheading d-flex align-items-center">
                            Delivery Instructions
                        </div>
                        <p>Delivery partner will be notified</p>
                        <div class="week-list new_week-list">
                            <div class="weeks new_weeks1">
                                <input type="checkbox" id="instruction_02"
                                    name="instruction[]" value="Avoid calling customer">
                                <label for="instruction_02">
                                    <span>
                                        <img src="<?php echo e(asset('assets/images/streamline_call-hang-up.png')); ?>"
                                            alt="" class="img-fluid" style="max-width:15px">
                                    </span>
                                    <div class="delivery_instruction_text">Avoid calling customer</div>
                                </label>
                            </div>
                        
                            <div class="weeks new_weeks1">
                                <input type="checkbox" id="instruction_03"
                                    name="instruction[]" value="Don’t ring the bell">
                                <label for="instruction_03">
                                    <span>
                                        <img src="<?php echo e(asset('assets/images/octicon_bell-slash.png')); ?>"
                                            alt="" class="img-fluid" style="max-width:15px">
                                    </span>
                                    <div class="delivery_instruction_text">Don’t ring the bell</div>
                                </label>
                            </div>
                        
                            <div class="weeks new_weeks1">
                                <input type="checkbox" id="instruction_04"
                                    name="instruction[]" value="Leave it at my door">
                                <label for="instruction_04">
                                    <span>
                                        <img src="<?php echo e(asset('assets/images/door.png')); ?>"
                                            alt="" class="img-fluid" style="max-width:18px">
                                    </span>
                                    <div class="delivery_instruction_text">Leave it at my door</div>
                                </label>
                            </div>
                        </div>
                    </div>
                                
                    
                    <div class="order_detailbox instruction_box">
                        <div class="order-subheading d-flex align-items-center">
                            Order Instructions
                        </div>
                        <div class="coupon_search">
                            <input id="orderInstruction" class="form-control"
                                placeholder="Enter order instructions" type="text">

                        </div>
                    </div>
                    <!-- ADDRESS -->
                    <div class="order_detailbox">
                        <div class="payment_address_box p-0 m-0">
                            <div class="address_detailsBox change_addressbox">
                                <div class="payment_add_img">
                                    <img src="<?php echo e(asset('assets/images/home_address.png')); ?>" alt="lock"
                                        style="max-width:45px">
                                </div>
                                <div class="address_details">
                                    <div class="address_head">
                                        Delivering to <span class="address-type" id="addressType"
                                            style="font-weight: bold;"><?php echo e($productList['data']['lastadd'][0]['type'] ?? ''); ?></span>
                                    </div>
                                    <div class="address_location" id="showAddress">
                                        <span
                                            class="loaction"><?php echo e($productList['data']['lastadd'][0]['house_no'] ?? ''); ?></span>
                                    </div>
                                    <input type="hidden" id="addressId" name="address_id"
                                        value="<?php echo e($productList['data']['lastadd'][0]['address_id'] ?? ''); ?>">
                                </div>
                            </div>
                            <div class="change_btn btn_addresslist" style="font-weight: 600; color: green;"
                                data-bs-toggle="modal" data-bs-target="#addressModal"
                                onclick="fetchAddressList()">Change Address</div>
                        </div>
                    </div>
                    <!-- PAYMENT -->
                    <div class="payment_mainBox new_payment_mainBox">
                        <div class="trial_radio_btn_box">
                            <div class="trial_radio_mainbox">
                                <div class="trial_radio_btn">
                                    <label for="trailPack_COD">COD</label>
                                    <input type="radio" id="trailPack_COD" name="toggle"
                                        value="COD" onclick="toggleCODCharges()">
                                </div>
                                <div class="trial_radio_btn">
                                    <label for="trailPack_PayNow">Pay Now</label>
                                    <input type="radio" id="trailPack_PayNow" name="toggle"
                                        value="Pay Now" checked
                                        onclick="toggleCODCharges()">
                                </div>
                            </div>

                            <div id="COD" class="content-div">
                                <div class="cod_icon_test_mainbox">
                                    <div class="cod_icon_box">
                                        <img src="assets/images/bank-account-icon.svg" alt="COD Icon"
                                            class="img-fluid">
                                    </div>
                                    <div class="cod_content_box">
                                        An additional charges of AED 2 is applicable
                                    </div>
                                </div>
                            </div>

                            <div id="Pay Now" class="content-div"></div>
                            
                            <div class="quick-pay" id="quickpay">
                                <div class="pay_btnbox">
                                    <div class="pay_btn_listing" onclick="quickPayTrilPackApiCall('quick')">
                                        <div class="pay_btn_icon">
                                            <img src="<?php echo e(asset('assets/images/money.svg')); ?>" alt="Pay Icon"
                                                class="img-fluid">
                                        </div>
                                        <div class="pay_btn_content">
                                            Quick Pay
                                            <div class="pay_btn_sub_content">
                                                (Without saving card)
                                            </div>
                                        </div>
                                    </div>
                                    <div id="applyBtn" style="opacity:0;">
                                        <div class="apple-pay">
                                            <div class="pay_btn_listing"
                                                onclick="quickPayTrilPackApiCall('applepay')">
                                                <div class="pay_btn_icon">
                                                    <img src="<?php echo e(asset('assets/images/apple.svg')); ?>"
                                                        alt="Pay Icon" class="img-fluid">
                                                </div>
                                                <div class="pay_btn_content">
                                                    Apple Pay</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="show-card" id="cardNoSe">
                                        <div class="payment_address_box">
                                            <div class="address_detailsBox">
                                                <div class="payment_add_img">
                                                    <img src="<?php echo e(asset('assets/images/pay_card.png')); ?>" alt="lock"
                                                        style="max-width:45px">
                                                </div>
                                                <div class="card_details">
                                                    <div class="acard_details">
                                                        Pay with card <span class="card-type" id="cardType"
                                                            style="font-weight: bold;">
                                                            <?php echo @$productList['data']['lastcarddetails']['card_no']; ?></span>
                                                    </div>
                                                    <input type="hidden" id="siNo" name="si_no"
                                                        value="<?php echo @$productList['data']['lastcarddetails']['si_sub_ref_no']; ?>">
                                                </div>
                                            </div>

                                            <div class="change_btn" style="font-weight: 600; color: green;"
                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                onclick="fetchCardList('<?php echo @$productList['data']['lastcarddetails']['si_sub_ref_no']; ?>')">
                                                Change </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pay_btn_wrap new_pay_btn_wrap">
                                <div class="trial_total_box">
                                    <span class="total_heading">Total</span>
                                    <span class="total_amount" id="totalPayD">
                                        <strong>AED<?php echo e(number_format($productList['data']['discount_total_price'], 2)); ?></strong>
                                    </span>
                                </div>
                                <div class="pay_btn" onclick="checkOutTrilPackApiCall()">
                                    <span>Pay Now</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="empty_cartMainbox">
            <div class="imageBox">
                <img src="<?php echo e(asset('assets/images/empty-cart.gif')); ?>" alt="empty cart"
                class="img-fluid">
            </div>
            <div class="textBox">
                <div class="subheading">No Product Available</div>
                <p style="color: #8F8F8F;">Your cart is waiting!<br> Find something you love and add it to your cart.</p>
                <a href="<?php echo e(url('/')); ?>" class="mb-3 d-block">
                <div class="cancel_btn">Let's Shop</div>
                </a>
            </div>
        </div>                                                                       
        <?php endif; ?>
    </div>
    <!-- Loader (Initially Hidden) -->
    <div id="ajaxLoader" style="display: none;">
        <img src="<?php echo e(asset('assets/images/loader.gif')); ?>" alt="Loading...">
    </div>
</section>
<!-- Selected address list modal...G1 -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h5 class="heading-design-h5">Saved Addresses</h5>
                         <a class="add_card_btn" href="<?php echo e(url('add-address?addedFrom=trailcart')); ?>">
                                Add New address</a>
                           
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria -label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="addressListContainer">
                    <p>Loading...</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Selected card list modal...G1 -->
<div class="modal fade" id="cardModal" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-lg-12">
                    <div class="section-header">
                        <h5 class="heading-design-h5">Saved Cards</h5>
                        <div class="add_card_btn" onclick="addCard()">Add New Card</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="cardListContainer">
                    <p>Loading...</p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- cart section end -->

<!-- Edit Address modal...Priyanka -->
    <div class="modal fade" id="editAddressModal" tabindex="-1" role="dialog" aria-labelledby="editAddressModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            <div class="edit_address_mainBox">
                <!-- <div class="location_map_MainBox">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d60505.42258750609!2d73.7705984!3d18.592563199999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1741782652767!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="locate_map_button_box">
                        <div class="locate_map_button">
                            <a href="<?php echo e(ENV('APP_URL')); ?>google-map" id="google-map">Locate on Map</a>
                        </div>
                        <div class="locate_map_text" id="locationAddress"></div>
                    </div>
                    <div class="location_textBox">
                        <div class="location_infoBox">
                            <img src="<?php echo e(asset('assets/images/other-location.svg')); ?>" width="38" height="38" alt="Other">
                            <div class="location_address">Jivan</div>
                        </div>
                    </div>
                </div> -->
                 <div class="location_map_MainBox">
                        <div class="locate_map_button_box">
                            <input id="pac-input" class="controls" type="text" placeholder="Search Location"/>
                            <div id="map" style="height: 100%; width: 100%;"></div>
                            <img src="<?php echo e(asset('assets/images/qk_location.webp')); ?>" class="centerMarker" />
                        </div>
                        <div class="location_textBox">
                            <button type="button" class="location_confirm_btn btnConfirm">Confirm Location</button>
                            <!--<div class="location_confirm_btn btnConfirm">Confirm Location</div>-->
                            <div class="location_infoBox">
                                <img src="<?php echo e(asset('assets/images/other-location.svg')); ?>" width="35" height="35" alt="Other">
                                <div class="location_address">Please select location</div>
                            </div>
                        </div>
                    </div>
                <div class="location_form_MainBox">
                    <h5 class="modal-title mb-3" id="editAddressModalLabel">Edit Address</h5>

                    <div class="form_box">
                        <form action="" method="POST" class="update-address" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <div class="add_adderess_list">
                                <fieldset class=" form-group">
                                    <label for="house_no">Address Details (House No, Building & Block No & Area) <span
                                            class="required_icon">*</span></label>
                                    <input type="text" name="house_no" id="house_no" class="form-control" required  pattern="[a-zA-Z0-9\s,-]*" title="Only letters, numbers, spaces, commas, and hyphens are allowed">
                                    <input type="hidden" name="address_id" id="address_id"
                                        value="">
                                    <input type="hidden" name="address" id="address"
                                        value="">
                                    <input type="hidden" id="latitude" name="latitude">
                                    <input type="hidden" id="longitude" name="longitude">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="landmark">Landmark & Area Name (Optional)</label>
                                    <input type="text" name="landmark" id="landmark" class="form-control" value="" pattern="[a-zA-Z0-9\s,-]*"  title="Only letters, numbers, spaces, commas, and hyphens are allowed">
                                </fieldset>
                            </div>
                            <div class="add_address_subheading">Save as <span class="required_icon">*</span></div>
                            <div class="add_adderess_listing">
                                <div class="add_address_radio_mainbox">
                                    <div class="add_address_radio_listing">
                                        <input type="radio" name="address_type" id="home" value="Home">
                                        <label for="home" class="add_lable_1">
                                            <img src="<?php echo e(asset('assets/images/home-location.svg')); ?>" width="18"
                                                height="18" alt="Home">Home</label>
                                    </div>
                                    <div class="add_address_radio_listing">
                                        <input type="radio" name="address_type" id="work" value="Work">
                                        <label for="work" class="add_lable_2">
                                            <img src="<?php echo e(asset('assets/images/work-location.svg')); ?>" width="18"
                                                height="18" alt="Work">Work</label>
                                    </div>
                                    <div class="add_address_radio_listing">
                                        <input type="radio" name="address_type" id="other" value="Others">
                                        <label for="other" class="add_lable_3">
                                            <img src="<?php echo e(asset('assets/images/other-location.svg')); ?>" width="18"
                                                height="18" alt="Other">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="add_address_subheading">Receiver Information</div>
                            <div class="add_adderess_list">
                                <fieldset class="form-group">
                                    <label for="Uname">Name <span class="required_icon">*</span></label>
                                    <input type="text" name="Uname" id="Uname" class="form-control" required pattern="[a-zA-Z\s]*" title="Only letters and spaces are allowed">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="number">Phone Number <span class="required_icon">*</span></label>
                                    <input type="text" name="number" id="addnumber" class="form-control" value="" required>
                                    <input type="hidden" id="addcountryCode" name="country_code" value="<?php echo e($addressList['country_code'] ?? ''); ?>">
                                    <input type="hidden" id="addflagcode" name="flagcode" value="<?php echo e($addressList['dial_code'] ?? ''); ?>"
                                    >
                                    <div id="adderror-msg" class="hide error-msg error"></div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="email">Email <span class="required_icon">*</span></label>
                                    <input type="email" name="email" id="addemail" class="form-control" required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
    title="Enter a valid email address (e.g. name@example.com)">
                                </fieldset>
                                <fieldset class="form-group">
                                    <img src="" class="door-img" width="70" height="70" />
                                    <label for="email">Door Image (Optional)</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </fieldset>
                            </div>
                            <div class="submit-button">
                                <input class="btn submitAddress_btn" type="button" value="Save Address">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Check if the browser is Safari                            
if (navigator.userAgent.includes("Safari") && !navigator.userAgent.includes("Chrome")) {
    document.getElementById("applePayButton").style.display = "block";
}
</script>
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
<!-- Check apple btn supported or not...G1 -->
<script>
  const isAppleBrowser = () => {
    const ua = navigator.userAgent;
    return /Safari/.test(ua) && !/Chrome/.test(ua) && (/Macintosh|iPhone|iPad|iPod/.test(ua));
  };

  if (isAppleBrowser()) {
    document.getElementById('applyBtn').style.opacity = '1';
  }
</script>



<!-- Check COD charges...G1 -->
<?php if(isset($productList['data']) && is_array($productList['data'])): ?>
<script>
let baseTotal1 = parseFloat("<?php echo e($productList['data']['discount_total_price'] ?? 0); ?>");

function toggleCODCharges() {
    let codChargesRow = document.getElementById("codChargesRow");
    let selectedPayment = document.querySelector("input[name='toggle']:checked");

    if (!selectedPayment) return;

    let paymentType = selectedPayment.value;

    let tip = 0;
    let selectedTip = document.querySelector('input[name="tip"]:checked');
    if (selectedTip) {
        tip = parseFloat(selectedTip.value);
    }

    let newTotal = baseTotal1 + (paymentType === "COD" ? 2 : 0) + tip;

    if (paymentType === "COD") {
        codChargesRow.style.display = "table-row";
        document.getElementById("codCharges").innerHTML = "AED 2.00";
        document.getElementById("cardNoSe").style.display = "none";
        document.getElementById("quickpay").style.display = "none";

    } else {
        codChargesRow.style.display = "none";
        document.getElementById("codCharges").innerHTML = "AED 0.00";
        document.getElementById("cardNoSe").style.display = "block";
        document.getElementById("quickpay").style.display = "block";

    }

    document.getElementById("totalPay").innerHTML = "<strong>AED " + newTotal.toFixed(2) + "</strong>";
    document.getElementById("totalPayD").innerHTML = "AED " + newTotal.toFixed(2);
}

document.addEventListener("DOMContentLoaded", function() {
    toggleCODCharges(); // Initialize on page load

    // Add event listeners to toggle radio buttons
    document.querySelectorAll("input[name='toggle']").forEach(radio => {
        radio.addEventListener("change", toggleCODCharges);
    });

    // Add event listener to tip selection
    document.querySelectorAll("input[name='tip']").forEach(tip => {
        tip.addEventListener("change", toggleCODCharges);
    });
});
</script>

<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- ON CHANGE SHOW SELECTED DATE AND TIME IN SCHEDULE DELIVERY SECTION START -->
<script>
// Function to update the day box
function updateDayBox() {
    const dayBox = document.getElementById('dayBox');
    const dateRadios = document.getElementsByName('date');
    dateRadios.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.checked) {
                const selectedDate = new Date(radio.value);
                const today = new Date();
                const tomorrow = new Date(today);
                tomorrow.setDate(today.getDate() + 1);

                let dayText = '';

                if (selectedDate.toDateString() === today.toDateString()) {
                    dayText = 'Today';
                } else if (selectedDate.toDateString() === tomorrow.toDateString()) {
                    dayText = 'Tomorrow';
                } else {
                    dayText = selectedDate.toLocaleDateString('en-US', {
                        weekday: 'long'
                    });
                }

                dayBox.textContent = dayText;
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
document.querySelectorAll('input[name="toggle"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.content-div').forEach(div => div.style.display = 'none');
        const selectedDiv = document.getElementById(this.value);
        if (selectedDiv) {
            selectedDiv.style.display = 'block';
        }
    });
});
</script>

<!-- Updated total pay amount...G1 -->
<script>

let baseTotal = 0;

<?php if(!empty($productList['data']) && isset($productList['data']['discount_total_price'])): ?>
    baseTotal = parseFloat("<?php echo e($productList['data']['discount_total_price']); ?>");
<?php endif; ?>

let selectedRadio = null;
function updateTip(radio) {
    
    if (selectedRadio === radio) {
        // Uncheck if already selected
        radio.checked = false;
        selectedRadio = null;
        let tipAmount = 0;
        let selectedPayment = document.querySelector("input[name='toggle']:checked");
        let paymentType = selectedPayment.value;
        let CodAmount=(paymentType === "COD" ? 2 : 0); 
       
        let newTotal = baseTotal + tipAmount + CodAmount;

        document.getElementById("deliveryTip").innerHTML = "AED " + tipAmount.toFixed(2);
        document.getElementById("totalPay").innerHTML = "<strong>AED " + newTotal.toFixed(2) + "</strong>";
        document.getElementById("totalPayD").innerHTML = "AED " + newTotal.toFixed(2);
        
    } else {
        // New selection
        selectedRadio = radio;
        let tipAmount = parseFloat(radio.value);
        let newTotal = baseTotal + tipAmount;

        document.getElementById("deliveryTip").innerHTML = "AED " + tipAmount.toFixed(2);
        document.getElementById("totalPay").innerHTML = "<strong>AED " + newTotal.toFixed(2) + "</strong>";
        document.getElementById("totalPayD").innerHTML = "AED " + newTotal.toFixed(2);
    }
}

</script>


<!-- Remove trial pack product api call...G1 -->
<script>
function deleteCartItem(trialPID, btnName) {
    // console.log("AJAX Success:1", btnName);

    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>buyNowTrialPack";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            trialPID: trialPID,
            qty: "0",
            _token: _token,
        },

        success: function(result) {
            // console.log("AJAX Success:", btnName);

            if (result.success === '1') {
                // console.log("Second ID:", btnName);
                if (btnName == "add") {
                    Swal.fire({
                        title: "Trial pack deleted successfully",
                        showDenyButton: false,
                        showCancelButton: false,
                        icon: "sucess",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });

                } else {
                    window.location.href = '<?php echo e(env('
                    APP_URL ')); ?>trial-pack-cart'
                }
            } else {
                alert("Error: " + result.message);
            }
        },
        error: function(xhr, status, error) {

            alert("An error occurred: " + xhr.responseText);
        },
    });

}
</script>

<!-- 

<?php if(isset($productList['data']) && is_array($productList['data'])): ?> -->

<script>
let timeSlotsData = <?php echo json_encode($productList['data']['timeslotsdata'], 15, 512) ?>;

// Function to update time slots when a date is selected
function updateTimeSlots(selectedDate) {
    let container = document.getElementById("timeSlotContainer");
    container.innerHTML = "";

    let selectedSlot = timeSlotsData.find(slot => slot.date === selectedDate);

    // Update the day box with the selected date
    document.getElementById("dayBox").innerHTML =
        new Date(selectedDate).toLocaleDateString("en-US", {
            weekday: 'long'
        });

    if (selectedSlot && selectedSlot.timeslots) {
        selectedSlot.timeslots.forEach((slot, index) => {
            container.innerHTML += `
                                            <div class="schedule">
                                                <input type="radio" id="time_${index}" name="time" value="${slot.time_slots}" 
                                                       ${index === 0 ? "checked" : ""} 
                                                       onclick="updateSelectedTime('${slot.time_slots}')">
                                                <label for="time_${index}">
                                                    <div class="dateBox">${slot.time_slots}</div>
                                                </label>
                                            </div>
                                        `;
        });

        // Automatically update timeBox with the first time slot
        if (selectedSlot.timeslots.length > 0) {
            updateSelectedTime(selectedSlot.timeslots[0].time_slots);
        }
    } else {
        container.innerHTML = "<p>No time slots available for this date.</p>";
        document.getElementById("timeBox").innerHTML = "N/A"; // Reset time box
    }
}

// Function to update the selected time in timeBox
function updateSelectedTime(selectedTime) {
    document.getElementById("timeBox").innerHTML = selectedTime;
}

// Initialize with the first selected date
document.addEventListener("DOMContentLoaded", function() {
    let firstDateInput = document.querySelector("input[name='date']:checked");
    if (firstDateInput) {
        updateTimeSlots(firstDateInput.value);
    }
    
    var addressModal = document.getElementById("addressModal");

    addressModal.addEventListener("show.bs.modal", function() {
        document.body.style.overflow = "hidden";
        document.body.style.paddingRight = "0px";
    });

    var addedFrom = "<?php echo e(\Request::get('addedFrom')); ?>";
    
    addressModal.addEventListener("hidden.bs.modal", function() {
        document.body.style.overflow = "";
        if(addedFrom == 'trailcart'){
            window.location.href="<?php echo e(url('trial-pack-cart')); ?>";
        }
    });
    
    
    if(addedFrom == 'trailcart'){
        $('#addressModal').modal('show');
        $('.btn_addresslist').trigger('click');
    }
        let productList = <?php echo json_encode($productList, 15, 512) ?>;
       if (productList.data.lastadd && productList.data.lastadd.length > 0) {
            const address = productList.data.lastadd[0];
            var selected_address1 = {};
            selected_address1.house_no = address.house_no;
            selected_address1.address_id = address.address_id;
            selected_address1.type = address.type;

            localStorage.setItem("selectedAddress", JSON.stringify(selected_address1));
        } else {
              localStorage.removeItem("selectedAddress");
            console.log("No last address found.");
        }
   
     var selected_address =JSON.parse(localStorage.getItem("selectedAddress")) || "";
     console.log(selected_address);
     saveSelectedAddress(selected_address);
     
     if (!selected_address) {
        console.log('if');
        $('.change_addressbox').addClass('d-none');
        $('.btn_addresslist').text('Add Address');
    } else {
        console.log('else');
        $('.change_addressbox').removeClass('d-none');
        $('.btn_addresslist').text('Change');
    }
    
});
</script>
<?php endif; ?>

<!-- Trial pack checkout api call...G1 -->
<script>
function checkOutTrilPackApiCall() {
     window.scrollTo({ top: 0, behavior: 'smooth' });
    // console.log("Added to cart: ", varientId);
    var selectedDate = '',
        selectedTimeSlot = '',
        selectedPartnerTip = '',
        selectedPartnerInstruction = '';

    const addressID = document.getElementById("addressId").value;
    // console.log("Selected addressID:", addressID);
    const siNO = document.getElementById("siNo").value;
    // console.log("Selected siNO:", siNO);
    let selectedMethod = document.querySelector('input[name="toggle"]:checked').value;
    // console.log("Selected Payment Method:", selectedMethod);

    let selectedDateC = document.querySelector("input[name='date']:checked");
    if (selectedDateC) {
        // console.log("Selected Date:", selectedDateC.value);
        selectedDate = selectedDateC.value;
    }

    let selectedDateCselectedSlot = document.querySelector('input[name="time"]:checked');

    if (selectedDateCselectedSlot) {
        // console.log("Selected Time Slot:", selectedDateCselectedSlot.value);
        selectedTimeSlot = selectedDateCselectedSlot.value;
    }

    // let selectedInstruction = document.querySelector('input[name="instruction"]:checked');

    // if (selectedInstruction) {
    //     console.log("Selected Instruction:", selectedInstruction.value);
    //     selectedPartnerInstruction = selectedInstruction.value;
    // }
    
    let selectedInstructions = document.querySelectorAll('input[name="instruction[]"]:checked');
    let values = [];
    selectedInstructions.forEach(item => {
        values.push(item.value);
    });
    let instructionString = values.join(", ");
    let selectedPartnerInstructions = instructionString;
    // console.log("Selected selectedPartnerInstructions:", selectedPartnerInstructions);
    
    let selectedTip = document.querySelector('input[name="tip"]:checked');

    if (selectedTip) {
        console.log("Selected Tip:", selectedTip.value);
        selectedPartnerTip = selectedTip.value;
    }
    let orderInstruction = document.getElementById("orderInstruction").value;

    if (addressID !== "" && addressID !== 'undefined' && siNO !== "" && selectedDate !== "" && selectedTimeSlot !== "") {
        $("#ajaxLoader").show();
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(ENV('APP_URL')); ?>checkoutTrialPack";

        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                screenName: "ShowTrialPack",
                addressID: addressID,
                siNo: siNO,
                paymentMethod: selectedMethod,
                timeSlot: selectedTimeSlot,
                deliveyDate: selectedDate,
                deliveryPartenerTip: selectedPartnerTip,
                selectedPartnerInstruction: selectedPartnerInstructions,
                orderInstruction:orderInstruction,
                _token: _token,
            },
            success: function(result) {
                $("#ajaxLoader").hide();
                if (result.success === '1') {
                    // localStorage.setItem("selectedOrderTab", "1");
                    // navigateToNextPage(href = '<?php echo e(env('
                    //     APP_URL ')); ?>my-orders?tab=1');
                   
                    navigateToNextPage(href =
                    "<?php echo e(ENV('APP_URL')); ?>order-complete?screen=trailpack");
                }
            },
            error: function(xhr, status, error) {
                $("#ajaxLoader").hide();
                alert("An error occurred: " + xhr.responseText);
            },
        });

    } else if (addressID === "" || addressID === 'undefined') {
        Swal.fire({
            title: "<?php echo e(ENV('SELECTADDRESS')); ?>",
            icon: "warning",
            draggable: true
        });
    } else if (siNO === "") {
        Swal.fire({
            title: "<?php echo e(ENV('SELECTCARD')); ?>",
            icon: "warning",
            draggable: true
        });
    } else if (selectedDate === "") {
        Swal.fire({
            title: "<?php echo e(ENV('SELECTSTARTDATEDELIVERYMSG')); ?>",
            icon: "warning",
            draggable: true
        });
    } else if (selectedTimeSlot === "") {
        Swal.fire({
            title: "<?php echo e(ENV('SELECTTIMESLOTMSG')); ?>",
            icon: "warning",
            draggable: true
        });
    }
}
</script>

<!-- Trial pack checkout api call...G1 -->
<script>
function quickPayTrilPackApiCall(method) {
    // console.log("Added to cart: ", method);
    var selectedDate = '',
        selectedTimeSlot = '',
        selectedPartnerTip = '',
        selectedPartnerInstruction = '';

    const addressID = document.getElementById("addressId").value;
    // console.log("Selected addressID:", addressID);
    const siNO = document.getElementById("siNo").value;
    // console.log("Selected siNO:", siNO);
    let selectedDateC = document.querySelector("input[name='date']:checked");
    if (selectedDateC) {
        // console.log("Selected Date:", selectedDateC.value);
        selectedDate = selectedDateC.value;
    }

    let selectedDateCselectedSlot = document.querySelector('input[name="time"]:checked');

    if (selectedDateCselectedSlot) {
        // console.log("Selected Time Slot:", selectedDateCselectedSlot.value);
        selectedTimeSlot = selectedDateCselectedSlot.value;
    }

    // let selectedInstruction = document.querySelector('input[name="instruction"]:checked');

    // if (selectedInstruction) {
    //     console.log("Selected Instruction:", selectedInstruction.value);
    //     selectedPartnerInstruction = selectedInstruction.value;
        
    // }
    let selectedInstructions = document.querySelectorAll('input[name="instruction[]"]:checked');
    let values = [];
    selectedInstructions.forEach(item => {
        values.push(item.value);
    });
    let instructionString = values.join(", ");
    let selectedPartnerInstructions = instructionString;
    // console.log("Selected selectedPartnerInstructions:", selectedPartnerInstructions);
    
    
    let selectedTip = document.querySelector('input[name="tip"]:checked');

    if (selectedTip) {
        console.log("Selected Tip:", selectedTip.value);
        selectedPartnerTip = selectedTip.value;
    }
    // console.log("Added to cart: ", method);
     let orderInstruction = document.getElementById("orderInstruction").value;

    if (addressID !== "" && siNO !== "" && selectedDate !== "" && selectedTimeSlot !== "") {
        $("#ajaxLoader").show();
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(ENV('APP_URL')); ?>quickPayTrialPack";

        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                screenName: "ShowTrialPack",
                addressID: addressID,
                paymentMethod: method,
                timeSlot: selectedTimeSlot,
                deliveyDate: selectedDate,
                deliveryPartenerTip: selectedPartnerTip,
                selectedPartnerInstruction: selectedPartnerInstructions,
                orderInstruction:orderInstruction,
                _token: _token,
            },
            success: function(result) {
                $("#ajaxLoader").hide();
                if (result.success === '1') {
                    console.log("Added to cart11----: ", result.action);
                    navigateToNextPage(href = result.action);
                }
            },
            error: function(xhr, status, error) {
                $("#ajaxLoader").hide();
                alert("An error occurred: " + xhr.responseText);
            },
        });

    } else if (addressID === "") {
        Swal.fire({
            title: "<?php echo e(ENV('SELECTADDRESS')); ?>",
            icon: "warning",
            draggable: true
        });
    } else if (siNO === "") {
        Swal.fire({
            title: "<?php echo e(ENV('SELECTCARD')); ?>",
            icon: "warning",
            draggable: true
        });
    } else if (selectedDate === "") {
        Swal.fire({
            title: "<?php echo e(ENV('SELECTSTARTDATEDELIVERYMSG')); ?>",
            icon: "warning",
            draggable: true
        });
    } else if (selectedTimeSlot === "") {
        Swal.fire({
            title: "<?php echo e(ENV('SELECTTIMESLOTMSG')); ?>",
            icon: "warning",
            draggable: true
        });
    }
}
</script>


<!-- Navigrate to next page...G1 -->
<script>
function navigateToNextPage(url) {
    const nextPageUrl = url;

    window.location.href = nextPageUrl;
    // console.log(window.location.href);
}
</script>

<!-- Show all address api call...G1 -->

<script>
function fetchAddressList() {
    // console.log("AJAX Success:1", btnName);
    $("#ajaxLoader").show();
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>showAddressList";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            screenName: "trialPack",
            _token: _token
        },

        success: function(response) {
            // console.log("AJAX Success:", btnName);
            // console.log(response);
            $("#ajaxLoader").hide();
            if (response.success === '1') {
                let addressListContainer = $("#addressListContainer");
                addressListContainer.empty(); // Clear previous content
                let data = response.action;

                if (data && data.data.length > 0) {
                    let addressHtml = '<div class="address_listingBox"><form>';

                    data.data.forEach(address => {
                        var atype='';
                        
                            atype= `<span class="remove_address"
                                        onclick="deleteAddressAlert('${address.address_id}')">
                                        <img alt="delete" src="<?php echo e(asset('assets/images/adddelete.png')); ?>">
                                    </span>`;
                        
                            
                        addressHtml += `
                            <div class="form-group">
                                <label class="address">
                                    <div class="address-content">
                                        <div class="address-details">
                                            <div class="addres_type" >
                                                <div class="addressIcon" onclick='saveSelectedAddress(${JSON.stringify(address)}, "sub")' >
                                                    <div class="address_img">
                                                        <img src="${getAddressIcon(address.type)}" alt="${address.type}">
                                                    </div>
                                                    <div class="addressBox">
                                                        <div class="address-details d-flex justify-content-between">
                                                            <div class="subtitle">${address.type}</div>
                                                            <div class="subtitle">
                                                            <img src="<?php echo e(asset('assets/images/call.png')); ?>" alt="Call"
                                                            class="img-fluid" style="max-width:12px;">
                                                                <span>${address.country_code} ${address.receiver_phone}</span>
                                                            </div>
                                                        </div>
                                                        <address>${address.house_no}, ${address.landmark}</address>
                                                    </div>
                                                </div>
                                                <div class="icons text-end">
                                                    <a href="#" data-toggle="modal" data-bs-toggle="modal"
                                                        data-bs-target="#editAddressModal"
                                                        onclick="populateForm(${address.address_id})">
                                                        <img alt="edit1" src="<?php echo e(asset('assets/images/addedit.png')); ?>">
                                                    </a>`+atype+`
                                                    <input type="hidden" id="address_id${address.address_id}"
                                                        name="address_id${address.address_id}"
                                                        value="${address.address_id}">
                                                    <input type="hidden" id="house_no${address.address_id}"
                                                        name="house_no${address.address_id}"
                                                        value="${address.house_no}">
                                                    <input type="hidden" id="landmark${address.address_id}"
                                                        name="landmark${address.address_id}"
                                                        value="${address.landmark}">
                                                    <input type="hidden" id="Uname${address.address_id}"
                                                        name="Uname${address.address_id}"
                                                        value="${address.receiver_name}">
                                                    <input type="hidden" id="number${address.address_id}"
                                                        name="number${address.address_id}"
                                                        value="${address.receiver_phone}">
                                                    <input type="hidden" id="email${address.address_id}"
                                                        name="email${address.address_id}"
                                                        value="${address.receiver_email}">
                                                    <input type="hidden" id="latitude${address.address_id}"
                                                        name="latitude${address.address_id}"
                                                        value="${address.lat}">
                                                    <input type="hidden" id="longitude${address.address_id}"
                                                        name="longitude${address.address_id}"
                                                        value="${address.lng}">
                                                    <input type="hidden" id="society_name${address.address_id}"
                                                        name="society_name${address.address_id}"
                                                        value="${address.society_name}">
                                                    <input type="hidden" id="countryCode${address.address_id}"
                                                        name="country_code${address.address_id}"
                                                        value="${address.country_code}">
                                                    <input type="hidden" id="flagcode${address.address_id}"
                                                        name="flagcode${address.address_id}"
                                                        value="${address.dial_code}">
                                                    <input type="hidden" id="type${address.address_id}"
                                                        name="type${address.address_id}" value="${address.type}">
                                                    <input type="hidden" id="door_image${address.address_id}"
                                                        name="door_image${address.address_id}" value="${address.doorimage}"> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        `;
                    
                    });

                    addressHtml += '</form></div>';
                    addressListContainer.html(addressHtml);
                } else {
                    addressListContainer.html("<p>No addresses found.</p>");
                }

            } else {
                alert("Error: " + result.message);
            }
        },
        error: function(xhr, status, error) {
            $("#ajaxLoader").hide();
            alert("An error occurred: " + xhr.responseText);
        },
    });

}

function getAddressIcon(type) {
    if (type === "Home") {
        return "<?php echo e(asset('assets/images/home_location.png')); ?>";
    } else if (type === "Work") {
        return "<?php echo e(asset('assets/images/office_location.png')); ?>";
    } else {
        return "<?php echo e(asset('assets/images/other_location.png')); ?>";
    }
}
// Function to handle selected address
function saveSelectedAddress(storedAddresses) {
    // console.log("Selected Address:", storedAddresses);     
    // console.log("Retrieved lastAddress:", lastAddress);
    let showAddress = document.getElementById("showAddress");
    let addressIdField = document.getElementById("addressId");
    let addressTypeField = document.getElementById("addressType");
    if (showAddress) showAddress.textContent = storedAddresses.house_no;
    if (addressIdField) addressIdField.value = storedAddresses.address_id;
    if (addressTypeField && storedAddresses.type) addressTypeField.textContent = storedAddresses.type;
    
    localStorage.setItem("selectedAddress", JSON.stringify(storedAddresses));

    $('.change_addressbox').removeClass('d-none');
    $('.btn_addresslist span').html('Change Address');
    $('#addressModal').modal('hide');
}
</script>

<!--edit address modal script-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjGU6WbSwLK9d7_CAVYQ1Br0DpFhx3Rt0&callback=initAutocomplete&libraries=places&v=weekly" async defer></script>
<script>
const input1 = document.querySelector("#addnumber");
const countryCodeInput1 = document.querySelector("#addcountryCode");
const flagcode1 = document.querySelector("#addflagcode");
const errorMsg1 = document.querySelector("#adderror-msg");
const validMsg1 = document.querySelector("#addvalid-msg");

const errorMap1 = [
    "Invalid number",
    "Invalid country code",
];

const iti1 = window.intlTelInput(input1, {
    separateDialCode: true,
    formatOnDisplay: false,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
});

const reset1 = () => {
    input1.classList.remove("error");
    if (errorMsg1) {
        errorMsg1.innerHTML = "";
        errorMsg1.classList.add("hide");
    }
    if (validMsg1) {
        validMsg1.innerHTML = "";
        validMsg1.classList.add("hide");
    }
};

const validateInput1 = () => {
    reset1();
    const phoneNumber = input1.value.trim();
    const countryData = iti1.getSelectedCountryData();

    if (phoneNumber === "" || !iti1.isValidNumber()) {
        input1.classList.add("error");
        errorMsg1.innerHTML = errorMap1[0];
        errorMsg1.classList.remove("hide");
        $('.submitAddress_btn').attr('disabled',true);
    } else {
        errorMsg1.classList.add("hide");
        $('.submitAddress_btn').removeAttr('disabled'); 
    }
};

const updateCountryCode1 = () => {
    const countryData = iti1.getSelectedCountryData();
    countryCodeInput1.value = countryData.dialCode;
    flagcode1.value = countryData.iso2;
    const maxLength = getRequiredNumberLength1(countryData);
    input1.maxLength =maxLength;
};

const numberLengths1 = {
    us: 10,
    ae: 9,
};

const getRequiredNumberLength1 = (countryData) => {
    return numberLengths1[countryData.iso2] || 10;
};

const addSpacesToPhoneNumber1 = (phoneNumber) => {
    return phoneNumber.replace(/(\d{4})(\d{3})(\d+)/, '$1 $2 $3');
};

input1.addEventListener('input', () => {
    input1.setAttribute("placeholder", "Please enter Mobile No");
    validateInput1();
    const countryData = iti1.getSelectedCountryData();
    const phoneNumber = input1.value.replace(/\s+/g, ''); // Remove spaces for length check
    const maxLength = getRequiredNumberLength1(countryData);
    input1.maxLength =maxLength;

    if (phoneNumber.length > maxLength) {
        input1.value = phoneNumber.slice(0, maxLength);
    } else {
        input1.value = phoneNumber;
    }
    
});

input1.addEventListener('countrychange', () => {
    reset1();
    updateCountryCode1();
    validateInput1();
    input1.placeholder = "";
    input1.setAttribute("placeholder", "Please enter Mobile No");
});


    let map; 
    let markers=[]; 
    let autocomplete; 


    var selected_location = '';
    var selected_lat = '';
    var selected_lng = '';
    var selected_adr_components = [];
    var selected_country = [];
    var geocoder;

    function initAutocomplete(lat,lng) {
        const center = { lat: parseFloat(lat), lng: parseFloat(lng) };
        const mapOptions = {
            center: center,
            zoom: 15,
            zoomControl: true,
            zoomControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
            },
            streetViewControl: false,
            mapTypeControl: false,
        };

         map = new google.maps.Map(document.getElementById("map"), mapOptions);

        geocoder = new google.maps.Geocoder();

        // Update coordinates and reverse geocode when map becomes idle after drag/zoom
        google.maps.event.addListener(map, 'idle', function () {
            const centerLatLng = map.getCenter();
            selected_lat = centerLatLng.lat();
            selected_lng = centerLatLng.lng();

            geocoder.geocode({ location: centerLatLng }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK && results[0]) {
                let formatted = results[0].formatted_address;

                // ✅ Remove Plus Code part if present
                if (formatted.includes('+')) {
                const parts = formatted.split(" - ");
                if (parts.length > 1) {
                    formatted = parts.slice(1).join(" - ");
                }
                }

                selected_location = formatted;
                selected_adr_components = results[0].address_components;
                selected_country = [];

                $.each(selected_adr_components, function (key, value) {
                const types = value.types;
                if (types.includes("country") || types.includes("administrative_area_level_1")) {
                    selected_country.push(value.short_name);
                }
                });

                document.getElementById("pac-input").value = formatted;
                document.getElementById("address").value = formatted;
                document.querySelector(".location_address").innerHTML = formatted;
                document.getElementById("latitude").value = selected_lat;
                document.getElementById("longitude").value = selected_lng;

                console.log("Map Center Updated:", formatted, selected_lat, selected_lng);
            } else {
                console.log("Geocode failed:", status);
            }
            });
        });

        const input = document.getElementById("pac-input");
        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo("bounds", map);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        autocomplete.addListener("place_changed", function () {
            const place = autocomplete.getPlace();
            if (!place.geometry || !place.geometry.location) {
            alert("No location data available");
            return;
            }
            map.panTo(place.geometry.location);
        });
    }
    
    window.initAutocomplete = initAutocomplete;


function populateForm(addressId) {
    
    $('#addressModal').modal('hide');
    let societyName = document.getElementById('society_name' + addressId).value;
    let house_no = document.getElementById('house_no' + addressId).value;
    let landmark = document.getElementById('landmark' + addressId).value;
    let Uname = document.getElementById('Uname' + addressId).value;
    let number = document.getElementById('number' + addressId).value;
    let email = document.getElementById('email' + addressId).value;
    let latitude = document.getElementById('latitude' + addressId).value;
    let longitude = document.getElementById('longitude' + addressId).value;
    let countryCode = document.getElementById('countryCode' + addressId).value;
    let type = document.getElementById('type' + addressId).value;
    let flagcode = document.getElementById('flagcode' + addressId).value;
    let doorimage = document.getElementById('door_image' + addressId).value;

    // if (societyName) {
    //     locationAddress.textContent = societyName;
    // }

    document.getElementById('house_no').value = house_no;
    document.getElementById('landmark').value = landmark;
    document.querySelector(`input[name="address_type"][value="${type}"]`).checked = true;
    document.getElementById('Uname').value = Uname;
    document.getElementById('addemail').value = email;
    document.getElementById('addnumber').value = number;
    document.getElementById('addcountryCode').value = countryCode;
    document.getElementById('addflagcode').value = flagcode;
    document.getElementById('latitude').value = latitude;
    console.log(longitude,addressId);
    document.getElementById('longitude').value = longitude;
    document.getElementById('address_id').value = addressId;
    document.getElementById('address').value = societyName;
    document.querySelector('.location_address').innerHTML = societyName;

    if(doorimage && doorimage != 'null'){
        document.querySelector('.door-img').src = doorimage;  
         document.querySelector('.door-img').style.display = "block";
    }else{
        document.querySelector('.door-img').src = "";
        document.querySelector('.door-img').style.display = "none";
    }

    iti1.setCountry(flagcode); // Set the country based on the flag code
    
    // initAutocomplete(latitude,longitude);
    if (latitude && longitude) {
        const currentLocation = new google.maps.LatLng(parseFloat(latitude), parseFloat(longitude));
        map.setCenter(currentLocation);
    }
     
    const myLatLng = { lat: parseFloat(latitude), lng:parseFloat(longitude)}; 
    const marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
      });

    $('#editAddressModal').modal('show');

}

$(document).ready(function() {
        
        $('.btnConfirm').on('click', function() {
            let validLocations = <?php echo json_encode($countries); ?>;
            let isValid = validLocations.some(loc => selected_location.includes(loc));
            let _token = jQuery('meta[name="csrf-token"]').attr('content');
            if (!isValid) {
                alert('Service is not available in this area');
                return;
            }
            if (!selected_location) {
                alert('Please select a location');
                return;
            }

            $('#latitude').val(selected_lat);
            $('#longitude').val(selected_lng);
            $('.location_address').html(selected_location);
            $('#address').val(selected_location);

            console.log("Saving Location:", selected_location, selected_lat, selected_lng, selected_country);
            // saveDataAndGoBack(selected_location, selected_lat, selected_lng);
        });

        $('.submitAddress_btn').on('click',function(){
            let form = $('.update-address')[0]; // plain DOM element
            let formData = new FormData(form); // includes file
            $.ajax({
                  url: "<?php echo e(route('update-address')); ?>", // Change this to your actual URL
                  type: 'POST',
                  headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                  },
                  data: formData, 
                processData: false, // Don't process data
                contentType: false, // Let browser set it (multipart/form-data)
                  success: function (response) {
                    if(response.success == false){
                         Swal.fire({
                            icon: 'error',
                            title: 'Error Occured',
                            text:  response.message,
                            timer: 3000,
                            showConfirmButton: false
                        });
                    
                    }else{
                        // Swal.fire({
                        //     icon: 'success',
                        //     title: 'Address updated Successfully!',
                        //     text: response.message,
                        //     timer: 3000,
                        //     showConfirmButton: false
                        // });
                        $('#editAddressModal').modal('hide');
                         $('#addressModal').modal('show');
                         fetchAddressList();
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
                 
        });
    }); 
    
    function deleteAddressAlert(addressId) {
        deleteAddress(addressId);
    }

function deleteAddress(addressId) {
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>deleteAddressAPICall";
    
    console.log('delete add');
    
    $.ajax({
        url: url,
        type: "POST",
        data: {
            addressId: addressId,
            _token: _token,
        },
        success: function(result) {
            console.log(result);
             
            if (result.action == "1") {
                // Clear localStorage if necessary
                var selected_address = JSON.parse(localStorage.getItem("selectedAddress")) || "";
                if (selected_address && selected_address.address_id == addressId) {
                    localStorage.removeItem("selectedAddress");
                }

            // Instead of using a button click to refresh the address list, call the refresh logic directly if possible
              fetchAddressList();
    
            } else {
                console.log('Deletion failed');
                return false;
            }
        },
        error: function(xhr) {
            alert("An error occurred: " + xhr.responseText);
        }
    });
    }

</script>
<!-- Show card list api call...G1 -->
<script>
function fetchCardList(selectedsi) {
    // console.log("AJAX Success:1", btnName);
    $("#ajaxLoader").show();

var siNO = document.getElementById("siNo")?.textContent || "";
    var cartID = document.getElementById("cardType")?.textContent || "";
    // console.log("G1:---siNO---1>", siNO, cartID);
    // console.log("G1:---siNO---1>", siNO.length);
    if (siNO && siNO.trim().length > 0) {
        // console.log("✅ siNO has value:", siNO);
    } else {
        // console.log("❌ siNO is empty or undefined");
        siNO = selectedsi;
    }

    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>showCardList";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            screenName: "trialPack",
            _token: _token
        },

        success: function(response) {
            // console.log("AJAX Success:", btnName);
            $("#ajaxLoader").hide();
            if (response.success === '1') {
                let cardListContainer = $("#cardListContainer");
                cardListContainer.empty(); // Clear previous content
                let data = response.action;

                if (data && data.data.length > 0) {
                    let cardHtml = '<div class="card_listingBox"><form><div class="row">';

                    data.data.forEach(cardList => {
                        cardHtml += `
                                <div class="col-lg-4">
                                    <div class="payment_method">
                                        <label class="payment_option cards" for="card${cardList.si_sub_ref_no}">
                                            <div style="display: flex; justify-content: space-between;">
                                                <div class="card_text">Card</div>
                                            </div>
                                            <input type="radio" name="payment" id="card${cardList.si_sub_ref_no}" 
                                                   data-subref="${cardList.si_sub_ref_no}" 
                                                   data-cardno="${cardList.card_no}" 
                                                   ${cardList.si_sub_ref_no == siNO ? 'checked' : ''} 
                                                   onchange="saveSelectedCardData(this)"/>

                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <div class="payment_details">
                                                        <div class="cards_img">
                                                            <img src="<?php echo e(asset('assets/images/card.png')); ?>" alt="card">
                                                        </div>
                                                        <div class="card_text">${cardList.card_no}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            `;
                    });

                    cardHtml += '</div></form></div>';
                    cardListContainer.html(cardHtml);
                } else {
                    cardListContainer.html("<p>No cards found.</p>");
                }


            } else {
                alert("Error: " + result.message);
            }
        },
        error: function(xhr, status, error) {
            $("#ajaxLoader").hide();
            alert("An error occurred: " + xhr.responseText);
        },
    });

}

// Function to handle selected address
function saveSelectedCardData(element) {
   let siSubRefNo = element.getAttribute("data-subref");
    let cardNo = element.getAttribute("data-cardno");

    // console.log("G1----->:", siSubRefNo);
    // console.log("G1----->:", cardNo);

    let cardSpan = document.getElementById("cardType");
    let siNO = document.getElementById("siNo");

    if (siNO) siNO.textContent = siSubRefNo;
    if (cardSpan) cardSpan.textContent = cardNo;

    $('#cardModal').modal('hide');
}
</script>

<!-- Add card api call...G1 -->
<script>
function addCard() {
    $("#ajaxLoader").show();
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>addCardAPICall";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            _token: _token,
            addedFrom:'trail-pack-cart',
        },
        success: function(result) {
            // console.log(result.message);
            // console.log(result.action);
            $("#ajaxLoader").hide();
            if (result.success == "1") {
                $('#cardModal').modal('hide');
                navigateToNextPage(href = result.action);

            } else {
                Swal.fire({
                    title: result.message,
                    icon: "error",
                    draggable: true
                }).then(() => {
                    location.reload();
                });
            }
        },
        error: function(xhr, status, error) {
            $("#ajaxLoader").hide();
            alert("An error occurred: " + xhr.responseText);
        },
    });

}
</script>

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Trailpack/trial-pack-cart.blade.php ENDPATH**/ ?>