@include('header')
<?php
$strToArr = 'Ajman,Dubai,Sharjah,عجمان,دبي,الشارقة';
$countries = explode(',', $strToArr);
if (isset($showCartProductList['data'])) {
    $minOrderAmount = $showCartProductList['data']['oneday_min_order_amount'];
}
?>
<style>
/* Pac-container inside modal */
.pac-container {
    z-index: 2000 !important;
    
}
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
<!-- cart section start -->
<section class="cart_section section-padding position-relative">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_tabbing_mainBox">
                            <div class="cart_tabbing_content" id="content">
                                <div id="1" class="tabcontent">
                                    <div class="content_Mainbox">
                                        @if (session('error'))
                                            <div class="alert">{{ session('error') }}</div>
                                        @endif
                                        @if(isset($showCartProductList['status']) == 1)
                                        @if(isset($showCartProductList['data']))
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="cart_left_mainbox position__sticky1">
                                                    <div class="free_deliveryBox">
                                                        <img src="{{asset('assets/images/freeDelivery.png')}}"
                                                            alt="lock" style="max-width:30px">
                                                        <span><strong>FREE
                                                                DELIVERY</strong>
                                                            - Shop now & Save!</span>
                                                    </div>
                                                    <div class="car_product_list_mainBox">
                                                        @foreach($showCartProductList['data']['data'] as $index =>
                                                        $productCat)
                                                        <!-- ---- -->
                                                        <div class="missed-items-slider calender_flex_class">
                                                            <div class="section-header">
                                                                <h5 class="heading-design-h5">
                                                                    {{$productCat['cat_name']}}</span>
                                                                </h5>
                                                            </div>
                                                            
                                                        </div>
                                                        @php
                                                            $cashbackMessage = checkSelectedTimeslotCashback($productCat);
                                                        @endphp
                                                        
                                                        @if(!empty($cashbackMessage))
                                                            <div class="cashback_message">{{ $cashbackMessage }}</div>
                                                        @endif
                                                        <!-- --- -->
                                                        @foreach($productCat['products'] as $product)
                                                        <div class="car_product_list">
                                                            <div class="ordered_product">
                                                                <div class="product_imgbox">
                                                                    <a href="{{ url('product-details') }}/{{ Str::slug($product['product_name']) }}/{{ trim($product['product_id']) }}">
                                                                        <img src="{{$product['product_image']}}"
                                                                            alt="{{$product['product_name']}}"
                                                                            class=" img-fluid">
                                                                    </a>
                                                                </div>
                                                                <div class="order_info">
                                                                    <div class="order-namingBox">
                                                                        <div class="item">
                                                                            <div class="order_product_name">
                                                                                {{$product['product_name']}}
                                                                            </div>
                                                                            <div class="weightBox">
                                                                                <span>{{$product['quantity']}}
                                                                                    {{ $product['unit']}}</span>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="item">
                                                                            <div class="priceBox text-end">
                                                                                <div class="actual_price">AED
                                                                                    <span>{{number_format($product['price'], 2)}}</span>
                                                                                </div>
                                                                                <div class="mrp_price">
                                                                                    @if ($product['price'] !=
                                                                                    $product['mrp'])
                                                                                    <span class="regular-price">AED
                                                                                        <span>{{number_format($product['mrp'], 2)}}</span></span>
                                                                                    @endif
                                                                                </div>
                                                                                 <div class="actual_price">Item Total AED 
                                                                                    <span>{{ number_format((float)($product['price'] ?? 0) * (int)($product['cart_qty'] ?? 0), 2) }}</span>
                                                                                </div>
                                                                            </div>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <div class="order_details mt-2">
                                                                        <div class="row g-0">
                                                                            <div class="col-4">
                                                                                @if($product['product_feature_value'] != null || $product['product_feature_value'] != "")
                                                                                <div class="order_product_name1" style="font-weight: 500;">Your Packaging Preference</div>
                                                                                <div class="feature_txt">
                                                                                    <span>{{$product['product_feature_value']}}</span>
                                                                                    <span><img src="{{asset('assets/images/remove01.png')}}" alt="close" class="img-fluid varient_close_btn" onclick='removeSelectedPreference("{{ $product["varient_id"] }}", "daily")'></span>
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                            <div class="col-8">
                                                                                <div class="sub_btn_mainBox">
                                                                                    <div class="cart_button_Box">
                                                                                        @if ($product['isOfferProduct'] == 'false')
                                                                                        <div class="cart_btn" data-product-id="{{ trim($product['product_id']) }}" data-productdetail='@json($product)'>
                                                                                            <div class="qtyBox"
                                                                                                data-varient-id="{{ trim($product['varient_id']) }}">
                                                                                                <button class="qty-btn qty-btn-minus change-qty" type="button"
                                                                                                    data-productDetail='@json($product)'
                                                                                                    data-screen-name='cart'
                                                                                                    data-change="-1">-</button>
                                                                                                <input type="text" name="qty"
                                                                                                    value="{{ trim($product['cart_qty']) }}" id="totalCartQTY"
                                                                                                    class="input-qty input-rounded" min="0">
                                                                                                <input type="hidden" name="stock" id="stock"
                                                                                                    value="{{ trim($product['stock']) }}">
                                                                                                <button class="qty-btn qty-btn-plus change-qty" type="button"
                                                                                                    data-productDetail='@json($product)'
                                                                                                    data-screen-name='cart'
                                                                                                    data-change="1">+</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endif
                                                                                        <div class="cart_deletebox">
                                                                                            <img src="{{asset('assets/images/delete.svg')}}"
                                                                                                alt="Delete icon"
                                                                                                class="img-fluid"
                                                                                                onclick="removeDailyCartProduct({{ $product['varient_id'] }}, '0', '{{ $product['product_name'] }}', {{ $product['price'] }})">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @endforeach

                                                    </div>
                                                    <div class="cart_forgot_text">
                                                        <a href="{{url('/')}}">
                                                            Did you forget anything? add more products
                                                        </a>
                                                    </div>
                                                    @if(isset($showCartProductList['data']['offer_product'])  &&
                                                            count($showCartProductList['data']['offer_product']) > 0)
                                                    <div class="cart_offers_mainBox position-relative">
                                                        <div class="cart_offer_buy_textBox">
                                                            <div class="cart_offer_img">
                                                                <img src="{{asset('assets/images/cart-gift.png')}}" alt="gift" class="img-fluid">
                                                            </div>
                                                            <div class="cart_offer_textBox">Buy for AED {{$showCartProductList['data']['oneday_min_order_amount']}} & get this product for just 1 AED</div>
                                                        </div>
                                                         @foreach($showCartProductList['data']['offer_product'] as $product)
                                                        <div class="cart_offer_product_mainBox">
                                                            <div class="cart_product_list">
                                                                <div class="ordered_product">
                                                                    <div class="product_imgbox">
                                                                        <a href="{{url('product-details?name='.Str::slug($product['product_name']).'&id='.$product['product_id'])}}">
                                                                            <img src="{{$product['product_image']}}" alt="Fresh Cow Ghee" class=" img-fluid">
                                                                        </a>
                                                                    </div>
                                                                    <div class="order_info">
                                                                        <div class="order-namingBox">
                                                                            <div class="itemBox">
                                                                                <div class="order_product_name">
                                                                                    {{$product['product_name']}}
                                                                                </div>
                                                                                <div class="weightBox my-2">
                                                                                    <span>{{$product['quantity']}} {{$product['unit']}}</span>
                                                                                </div>
                                                                                <div class="priceBox">
                                                                                      <p class="offer-price">AED
                                                                                        <span>{{number_format($product['price'], 2)}}</span>
                                                                                        @if ($product['price'] != $product['mrp'])
                                                                                        <span class="regular-price">AED
                                                                                            <span>{{number_format($product['mrp'], 2)}}</span></span>
                                                                                        @endif
                                                                                     </p>
                                                                                </div>
                                                                            </div>
                                                                            @if ($showCartProductList['data']['total_price'] >= $showCartProductList['data']['oneday_min_order_amount'] && $product['is_added'] == false )
                                                                            <div class="itemBox">
                                                                                <div class="blue_button"
                                                                                    onclick='removeDailyCartProduct({{ json_encode($product["varient_id"]) }}, "1", {{ json_encode($product["product_name"]) }}, {{ json_encode($product["price"]) }})'>
                                                                                    Add
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="unlocked_product_box">
                                                                <div class="cart_offer_buy_textBox">
                                                                    <div class="cart_offer_img">
                                                                        <img src="{{asset('assets/images/lock.png')}}" alt="gift" class="img-fluid">
                                                                    </div>
                                                                     @if ($showCartProductList['data']['total_price'] < $showCartProductList['data']['oneday_min_order_amount'])
                                                                        <div class="cart_offer_textBox">
                                                                            Just <strong>AED {{ number_format(abs($showCartProductList['data']['oneday_min_order_amount'] - $showCartProductList['data']['total_price']), 2) }}</strong> away from unlocking this product!
                                                                        </div>  
                                                                    @else
                                                                        <div class="cart_offer_textBox">Woohoo! Offers unlocked just for you! Add items to your cart to enjoy the offer.</div>
                                                                     @endif
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        @endforeach
                                                        <div class="offers_bomb" id="offerPopup" style="display:none;">
                                                            <img src="{{ asset('assets/images/offer_animation.gif') }}" alt="offers_bomb" class="img-fluid">
                                                        </div>
                                                            
                                                    </div>
                                                    
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="car_order_detailsBox ">
                                                    <div class="coupons_box">
                                                        <div class="coupons_boxlist" id="couponView"
                                                            data-bs-toggle="modal" data-bs-target="#couponModal"
                                                            onclick="fetchCouponList()">
                                                            <img src="{{asset('assets/images/offer.png')}}" alt="lock"
                                                                style="max-width:30px">
                                                            <span><strong>View Coupons & Offers</strong> </span>
                                                        </div>
                                                        <div class="coupons_boxlist" id="couponApplied"
                                                            style="display: none;">
                                                            <span><strong id='couponCode'
                                                                    style="color: green;"></strong> coupon applied &
                                                                <strong id="couponPrice" style="color: green;">
                                                                    AED</strong>
                                                                Saved</span>
                                                            <div class='remove-coupon' id="removeCoupon"
                                                                onclick="removeCoupon()"
                                                                style="color: red; display: none;">
                                                                <strong>Remove</strong>
                                                            </div>
                                                        </div>
                                                        <input type='hidden' id='couponID' name='coupon-id' value=''>

                                                    </div>

                                                    <div class="order_detailbox">
                                                        <div class="order-subheading d-flex align-items-center">
                                                            Delivery Partner Tip
                                                        </div>
                                                        <p>The entire amount will be sent to your delivery partner
                                                        </p>
                                                        <div class="week-list">
                                                            <div class="weeks">
                                                                <input type="radio" id="tip_01" name="tip" value="3"
                                                                    onclick="toggleRadio(this)">
                                                                <label for="tip_01">AED 3 <span
                                                                        class="smiley_icon">🙂</span></label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="tip_02" name="tip" value="5"
                                                                    onclick="toggleRadio(this)">
                                                                <label for="tip_02">AED 5 <span
                                                                        class="smiley_icon">😄</span></label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="tip_03" name="tip" value="10"
                                                                    onclick="toggleRadio(this)">
                                                                <label for="tip_03">AED 10 <span
                                                                        class="smiley_icon">😍</span></label>
                                                            </div>
                                                            <div class="weeks">
                                                                <input type="radio" id="tip_04" name="tip" value="15"
                                                                    onclick="toggleRadio(this)">
                                                                <label for="tip_04">AED 15 <span
                                                                        class="smiley_icon">😎</span></label>
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
                                                                                @if($showCartProductList['data']['total_price']!=$showCartProductList['data']['total_mrp'])
                                                                                <span class="regular-price">AED
                                                                                    <span>
                                                                                        {{number_format($showCartProductList['data']['total_mrp'], 2) }}</span></span>
                                                                                <!-- </p> -->
                                                                                @endif
                                                                            </span> AED
                                                                            {{number_format($showCartProductList['data']['total_price'], 2)}}
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="small-text">
                                                                        <td>Delivery Charges</td>
                                                                        <td>AED
                                                                            {{number_format($showCartProductList['data']['delivery_charge'], 2)}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="small-text">
                                                                        <td>Coupon Discount</td>
                                                                        <td>AED <span id="couponDiscount"> 0.00</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="small-text" id='codChargesRowD'>
                                                                        <td>COD Extra charges</td>
                                                                        <td id="codCharges">AED 0.00
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="small-text">
                                                                        <td>Delivery Partner Tip</td>
                                                                        <td id='deliveryTip'>AED 0.00</td>
                                                                    </tr>
                                                                    <!--<tr class="small-text">-->
                                                                    <!--    <td>VAT</td>-->
                                                                    <!--    <td>AED-->
                                                                    <!--        {{number_format($showCartProductList['data']['vat'], 2)}}-->
                                                                    <!--    </td>-->
                                                                    <!--</tr>-->
                                                                    <tr>
                                                                        <td>Total Value</td>
                                                                        <td id=totalValue><strong>AED
                                                                                {{number_format($showCartProductList['data']['total_price'], 2)}}</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="quickart-cash">
                                                                        <td>Referral Wallet</td>
                                                                        <td>
                                                                            <span
                                                                                style="display: inline-flex; align-items: center; gap: 8px;">
                                                                                <label for="daily_wallet">AED
                                                                                    <span
                                                                                        id="walletAmountD">{{ number_format(max(0, (float)($showCartProductList['data']['referral_balance'] ?? 0)), 2) }}</span>
                                                                                </label>
                                                                                <input type="checkbox"
                                                                                    onclick="wallettotalCalculationPayment()"
                                                                                    name="daily_wallet"
                                                                                    id="daily_wallet">
                                                                                <input type='hidden'
                                                                                    id='walletPercentageD'
                                                                                    name='wallet-percentage'
                                                                                    value="{{$showCartProductList['data']['wallet_deduction_percentage']}}">
                                                                            </span>
                                                                            <br>
                                                                            <span id="walletTextD"
                                                                                style="color: green; display: none;">
                                                                                <span
                                                                                    id="selectedWalletAmountD">0.00</span>
                                                                                <label id="appliedWalletD"
                                                                                    style="color: black; display: inline;">
                                                                                    AED Wallet applied
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="quickart-cash">
                                                                        <td>Cash Wallet</td>
                                                                        <td>
                                                                            <span
                                                                                style="display: inline-flex; align-items: center; gap: 8px;">
                                                                                <label for="daily_wallet">AED
                                                                                    <span
                                                                                        id="walletAmountCash">{{ number_format(max(0, (float)($showCartProductList['data']['wallet_balance'] ?? 0)), 2) }}</span>
                                                                                </label>
                                                                                <input type="checkbox"
                                                                                    onclick="wallettotalCalculationPaymentCash()"
                                                                                    name="daily_wallet"
                                                                                    id="daily_wallet_cash">
                                                                                <input type='hidden'
                                                                                    id='walletPercentageCash'
                                                                                    name='wallet-percentage'
                                                                                    value="{{$showCartProductList['data']['wallet_deduction_percentage']}}">
                                                                            </span>
                                                                            <br>
                                                                            <span id="walletTextCash"
                                                                                style="color: green; display: none;">
                                                                                <span
                                                                                    id="selectedWalletAmountCash">0.00</span>
                                                                                <label id="appliedWalletCash"
                                                                                    style="color: black; display: inline;">
                                                                                    AED Wallet applied
                                                                                </label>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total to Pay</td>
                                                                        <td id="toPay"><strong>AED {{number_format($showCartProductList['data']['total_price'], 2)}}</strong></td>
                                                                    </tr>
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                           
                                                         @php
                                                            $totalCashbackMessage = calculateTotalCashback($showCartProductList['data']['data'] );
                                                            
                                                        @endphp
                                                        
                                                        @if(!empty($totalCashbackMessage))
                                                            <div class="cashback_message">{{ $totalCashbackMessage }}</div>
                                                        @endif
                                                        
                                                    </div>
                                                    
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
                                                                        <img src="{{asset('assets/images/streamline_call-hang-up.png')}}"
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
                                                                        <img src="{{asset('assets/images/octicon_bell-slash.png')}}"
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
                                                                        <img src="{{asset('assets/images/door.png')}}"
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
                                                    
                                                   
                                                    <div class="order_detailbox">
                                                        <div class="payment_address_box p-0 m-0">
                                                            @php //echo "<pre>";print_r($showCartProductList['data']);echo "</pre>"; @endphp
                                                            
                                                            <div class="address_detailsBox change_addressbox">
                                                                <div class="payment_add_img">
                                                                    <img src="{{ asset('assets/images/home_address.png') }}"
                                                                        alt="lock" style="max-width: 35px;">
                                                                </div>
                                                                <div class="address_details">
                                                                    <div class="address_head">
                                                                        Delivering to
                                                                        <span class="address-type" id="addressType"
                                                                            style="font-weight: 600;">
                                                                            {{ $showCartProductList['data']['lastadd'][0]['type'] ?? ''}}
                                                                        </span>
                                                                    </div>
                                                                    <div class="address_location" id="showAddress">
                                                                        <p class="loaction">
                                                                            {{ $showCartProductList['data']['lastadd'][0]['house_no'] ?? ''}}
                                                                        </p>
                                                                    </div>
                                                                    <input type="hidden" id="addressId"
                                                                        name="address_id"
                                                                        value="{{ $showCartProductList['data']['lastadd'][0]['address_id'] ?? ''}}">
                                                                </div>
                                                            </div>
                                                            <div class="change_btn btn_addresslist"
                                                                style="font-weight: 600; color: green;"
                                                                data-bs-toggle="modal" data-bs-target="#addressModal"
                                                                onclick="fetchAddressList()">
                                                                <span>Change Address</span> 
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="payment_mainBox new_payment_mainBox">
                                                        <div class="trial_radio_btn_box">
                                                            <div class="trial_radio_mainbox">
                                                                <div class="trial_radio_btn">
                                                                    <label for="daily_COD">COD</label>
                                                                    <input type="radio" id="daily_COD" name="toggle"
                                                                        value="COD" onclick="toggleCODCharges(this.value)">
                                                                </div>
                                                                <div class="trial_radio_btn">
                                                                    <label for="daily_PayNow">Pay Now</label>
                                                                    <input type="radio" id="daily_PayNow" name="toggle"
                                                                        value="Pay Now" checked
                                                                        onclick="toggleCODCharges(this.value)">
                                                                </div>
                                                            </div>
                                                            <div id="COD" class="content-div">
                                                                <div class="cod_icon_test_mainbox">
                                                                    <div class="cod_icon_box">
                                                                        <img src="assets/images/bank-account-icon.svg"
                                                                            alt="COD Icon" class="img-fluid">
                                                                    </div>
                                                                    <div class="cod_content_box">
                                                                        An additional charges of AED
                                                                        {{number_format($showCartProductList['data']['codcharges'], 2)}}
                                                                        is applicable
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="Pay Now" class="content-div">
                                                            <div id="payNowQuick">
                                                                <div class="pay_btnbox">
                                                                    <div class="pay_btn_listing"
                                                                        onclick="checkOutDailyCartApiCall('quickPay')">
                                                                        <div class="pay_btn_icon">
                                                                            <img src="{{asset('assets/images/money.svg')}}"
                                                                                alt="Pay Icon" class="img-fluid">
                                                                        </div>
                                                                        <div class="pay_btn_content">
                                                                            Quick Pay
                                                                            <div class="pay_btn_sub_content">
                                                                                (Without saving card)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="applyBtn" style="opacity:0;">
                                                                        <div class="pay_btn_listing" id="applyBtn"
                                                                            onclick="checkOutDailyCartApiCall('applePay')">
                                                                            <div class="pay_btn_icon">
                                                                                <img src="{{asset('assets/images/apple.svg')}}"
                                                                                    alt="Pay Icon" class="img-fluid">
                                                                            </div>
                                                                            <div class="pay_btn_content">
                                                                                Apple Pay
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class id='payNow'>
                                                                        <div
                                                                            class="payment_address_box payment_address_box_without_border">
                                                                            @if (!empty($showCartProductList['data']['lastcarddetails']))
                                                                            <div class="address_detailsBox">
                                                                                <div class="payment_add_img">
                                                                                    <img src="{{asset('assets/images/pay_card.png')}}"
                                                                                        alt="lock" style="max-width:35px">
                                                                                </div>
                                                                                <div class="card_details">
                                                                                    <div class="acard_details">
                                                                                        Pay with card <span class="card-type"
                                                                                            id="cardType" style="font-weight: 600;">
                                                                                            {{ $showCartProductList['data']['lastcarddetails']['card_no'] ?? ''}}</span>
                                                                                    </div>
                                                                                    <input type="hidden" id="siNo" name="si_no"
                                                                                        value="{{ $showCartProductList['data']['lastcarddetails']['si_sub_ref_no'] ?? ''}}">
                                                                                </div>
                                                                            </div>
                                                                            @endif
                                                                            <div class="change_btn"
                                                                                style="font-weight: 600; color: green;"
                                                                                data-bs-toggle="modal" data-bs-target="#cardModal"
                                                                                onclick="fetchCardList('{{ $showCartProductList['data']['lastcarddetails']['si_sub_ref_no'] ?? ''}}')">
                                                                                @if (!empty($showCartProductList['data']['lastcarddetails']))
                                                                                    Change
                                                                                @else
                                                                                    Add Card
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="pay_btn_wrap new_pay_btn_wrap">
                                                            <div class="trial_total_box">
                                                                <span class="total_heading">Total</span>
                                                                <span class="total_amount"><strong id="totalAmtDaily">AED
                                                                        {{number_format($showCartProductList['data']['total_price'], 2)}}</strong>
                                                                </span>
                                                            </div>
                                                            <input type="hidden" name="total_price" id="total_price" value="{{$showCartProductList['data']['total_price']}}">
                                                            <input type="hidden" name="cod_extra_charges" id="cod_extra_charges" >
                                                            <input type="hidden" name="cod_charges" id="cod_charges" value="{{$showCartProductList['data']['codcharges']}}">
                                                            <input type="hidden" name="delivery_partner_tip" id="delivery_partner_tip" >
                                                            <input type="hidden" name="coupon_discount" id="coupon_discount" >
                                                            <input type="hidden" name="delivery_charges" id="delivery_charges" >
                                                            <input type="hidden" name="wallet_use_amt" id="wallet_use_amt" >
                                                             <input type="hidden" name="wallet_use_amt_cash" id="wallet_use_amt_cash" >
                                                            <input type="hidden" name="final_price" id="final_price" >
                                                            <div class="pay_btn"
                                                                onclick="checkOutDailyCartApiCall('payNow')">
                                                                <span>Place Order</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="empty_cartMainbox">
                                            <div class="imageBox">
                                                <img src="{{asset('assets/images/empty-cart.gif')}}" alt="empty cart"
                                                    class="img-fluid">
                                            </div>
                                            <div class="textBox">
                                                <div class="subheading">No Product Available</div>
                                                <p style="color: #8F8F8F;">Your cart is waiting!<br> Find something you
                                                    love
                                                    and
                                                    add it to your cart.</p>
                                                <a href="{{url('/')}}" class="mb-3 d-block">
                                                    <div class="cancel_btn">Let's Shop</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="missed_product_list section-padding">
                                            <div class="section-header">
                                                <h5 class="subheading">Suggested for you</h5>
                                            </div>
                                            @if(isset($mightHaveMissedProductList['data']))
                                            <div class="owl-carousel owl-carousel-featured">
                                                @foreach($mightHaveMissedProductList['data'] as $product)
                                                @if(!$product['stock'] == 0)
                                                <div class="item">
                                                    <div class="product">
                                                        <div class="product_header">
                                                            <div class="product_top_left">
                                                                @if($product['percentage'] > 0)
                                                                <div class="discount_text">
                                                                    {{number_format($product['percentage'], 0)}}%<span>Off</span>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="product_top_right">
                                                                <div class="product_wishlist">
                                                                    <a href="javascript:void(0);" class="wishlist-btn"
                                                                        data-varient-id="{{ $product['varient_id'] }}">
                                                                        <img class="wishlist-icon"
                                                                            src="{{ asset($product['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                                            alt="wishlist" style="max-width: 25px;">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="{{ url('product-details') }}/{{ Str::slug($product['product_name']) }}/{{ trim($product['product_id']) }}">
                                                            <div class="product-img">
                                                                <img class="img-fluid"
                                                                    src="{{$product['varient_image']}}" alt="product">
                                                            </div>
                                                            @if(isset($product['feature_tags']) &&
                                                            count($product['feature_tags']) > 0)
                                                            <div class="product_featured_cat_icon_list">
                                                                <div class="product_featured_cat_icon">
                                                                    @foreach($product['feature_tags'] as $tags)
                                                                    <img class="img-fluid"
                                                                        src="{{ trim($tags['image']) }}" alt="Product">
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <div class="product-body">
                                                                <div class="product_name">{{$product['product_name']}}
                                                                </div>
                                                                
                                                            </div>
                                                        </a>
                                                        <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                                            <span>
                                                                {{ trim($product['quantity'] ?? '') }} {{ trim($product['unit'] ?? '') }}
                                                            </span>
                                                        
                                                            @if(isset($product['varients']) && count($product['varients']) > 1)
                                                            <div class="change-qty" data-productDetail='@json($product)' data-screen-name='cart'>
                                                                <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                                                    {{ count($product['varients']) }} options
                                                                    <img class="varient-down-arrow" src="{{ asset('assets/images/chevron.svg') }}" alt="down-arrow" style="width: 12px; height: 12px;">
                                                                </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="product-footer">
                                                            <div class="product_detail">
                                                                <p class="offer-price">AED
                                                                    <span>{{number_format($product['price'], 2)}}</span><br>
                                                                    @if ($product['price'] != $product['mrp'])
                                                                    <span class="regular-price">AED
                                                                        <span>{{number_format($product['mrp'], 2)}}</span></span>
                                                                    @endif
                                                                 </p>
                                                            </div>
                                                            <div class="cart_btn" data-product-id="{{ trim($product['product_id']) }}" data-productdetail='@json($product)'>
                                                                <div class="qtyBox"
                                                                    data-varient-id="{{ trim($product['varient_id']) }}">
                                                                    <button class="qty-btn qty-btn-minus change-qty" type="button"
                                                                        data-productDetail='@json($product)'
                                                                        data-screen-name='cart'
                                                                        data-change="-1">-</button>
                                                                    <input type="text" name="qty"
                                                                        value="{{ trim($product['total_cart_qty']) }}" id="totalCartQTY"
                                                                        class="input-qty input-rounded" min="0">
                                                                    <input type="hidden" name="stock" id="stock"
                                                                        value="{{ trim($product['stock']) }}">
                                                                    <button class="qty-btn qty-btn-plus change-qty" type="button"
                                                                        data-productDetail='@json($product)'
                                                                        data-screen-name='cart'
                                                                        data-change="1">+</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                </div>
                                                @else
                                                <div class="item">
                                                    <div class="product">
                                                        <div class="product_header">
                                                            <div class="product_top_left">
                                                                @if($product['percentage'] > 0)
                                                                <div class="discount_text">
                                                                    {{number_format($product['percentage'], 0)}}%<span>Off</span>
                                                                </div>
                                                                @endif
                                                                @if(!empty($product['country_icon']))
                                                                <div class="country_flag">
                                                                    <img src="{{$product['country_icon']}}" alt="flag">
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div class="product_top_right">
                                                                <div class="product_wishlist">
                                                                    <a href="javascript:void(0);" class="wishlist-btn"
                                                                        data-varient-id="{{ $product['varient_id'] }}">
                                                                        <img class="wishlist-icon"
                                                                            src="{{ asset($product['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                                            alt="wishlist" style="max-width: 25px;">
                                                                    </a>
                                                                </div>
                                                                <div class="product_wishlist">
                                                                    @if($product['notify_me'] == 'false')
                                                                    <a href="javascript:void(0);" class="notify-me" data-notified="0"
                                                                        data-varient-id="{{ $product['varient_id'] }}"
                                                                        data-product-id="{{ $product['product_id'] }}">
                                                                        <img class="notify-icon"
                                                                            src="{{ asset('assets/images/notification.png') }}"
                                                                            alt="wishlist" style="max-width: 25px;">
                                                                    </a>
                                                                    @else
                                                                    <a href="{{ENV('APP_URL')}}notify" data-notified="1">
                                                                        <img id="notifyMe-{{ $product['varient_id'] }}"
                                                                            src="{{ asset('assets/images/notification-fill.png') }}"
                                                                            alt="wishlist" style="max-width: 25px;">
                                                                    </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a href="{{ url('product-details') }}/{{ Str::slug($product['product_name']) }}/{{ trim($product['product_id']) }}">
                                                            <div class="product-img">
                                                                <img class="img-fluid"
                                                                    src="{{$product['varient_image'] ?? ''}}" alt="product">
                                                            </div>
                                                        </a>
                                                        <div class="product-body notify_box">
                                                            <div class="product-body">
                                                                <div class="product_name">
                                                                    {{ trim($product['product_name']) }}</div>
                                                                <div class="product_weight">
                                                                    <span>{{$product['quantity']}}
                                                                        {{$product['unit']}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="product_unavailable">
                                                                <div class="product_unavailable_title">Product
                                                                    Unavailable
                                                                </div>
                                                                @if($product['notify_me'] == "true")
                                                                <p>You will be notified.</p>
                                                                @else
                                                                <p>Click on the bell to get notified.</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Selected address list modal...G1 -->
    <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-header">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h5 class="heading-design-h5">Saved Addresses</h5>
                            <a class="add_card_btn" href="{{ url('add-address?addedFrom=cart&tab='.\Request::get('tab')) }}">
                                Add New address</a>
                        </div>
                    </div>

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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-header">
                    <div class="col-lg-12">
                        <div class="section-header">
                            <h5 class="heading-design-h5">Saved Cards</h5>
                            <div class="add_card_btn" onclick="addCard()">Add New Card</div>
                        </div>
                    </div>

                </div>
                <div class="modal-body">
                    <div id="cardListContainer">
                        <p>Loading...</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Selected Date time daily cart Modal...G1 -->
    <div class="modal fade othercat_popbox" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-header">
                    <h5 class="modal-title" id="selectedDateTimeModal"></h5>
                </div>
                <div class="modal-body">
                    <div class="schedule_box">
                        <div class="schedule_header" id="scheduleHeader">

                            <div class="day_box" id="dayBoxn">
                                {{-- set data by id --}}
                            </div>
                            <div class="time_box" id="timeBoxn">
                                {{-- set data by id --}}
                            </div>
                        </div>
                    </div>
                    <div id="scheduleDetailsBox1" class="schedule_deatils_box1 mt-4">
                        <!-- Date Selection -->
                        <div class="subheading" id="dateListLabel" style="float:left; margin:18px 40px 0 0">Choose a date</div>
                        <div id="dateList" class="schedule-list"></div>
                        <hr>
                        <div class="subheading">Choose a time</div>
                        <div id="timeList" class="schedule-list"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="tabwise" id="tabwise"> 
                    <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
                    <button type="button" class="btn pay_btn" id="saveSelectedDateTime"
                        onclick="saveSelectedDateTimeApiCall('save','')">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Selected coupon list modal...G1 -->
    <div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-header">
                    <div class="col-lg-12">
                        <div class="section-header mb-0">

                            <div class="section-header1">
                                <h5 class="heading-design-h5">Apply Coupon</h5>
                            </div>
                            <div class="coupons_listing_mainbox">
                                <div class="coupon_searchBox">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="coupon_search m-0">
                                                <input id="couponCodeInput" class="form-control"
                                                    placeholder="Enter Coupon Code" type="text">
                                                <button type="submit"
                                                    onclick="applyCouponAPICallForSubmitN(event)">APPLY</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="coupon_listing_box">
                            <div class="heading-design-h5">Available Coupons</div>
                            <div class="couponListContainer" id="couponListContainer">
                                <!-- Coupons will be inserted here -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <!-- Edit Address modal...Priyanka -->
    <div class="modal fade" id="editAddressModal" tabindex="-1" role="dialog" aria-labelledby="editAddressModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-bs-label="Close"></button>
            <div class="edit_address_mainBox">
               
                 <div class="location_map_MainBox">
                        <div class="locate_map_button_box">
                            <input id="pac-input" class="controls" type="text" placeholder="Search Location"/>
                            <div id="map" style="height: 100%; width: 100%;"></div>
                            <img src="{{asset('assets/images/qk_location.webp')}}" class="centerMarker" />
                        </div>
                        <div class="location_textBox">
                            <button type="button" class="location_confirm_btn btnConfirm">Confirm Location</button>
                            <!--<div class="location_confirm_btn btnConfirm">Confirm Location</div>-->
                            <div class="location_infoBox">
                                <img src="{{asset('assets/images/other-location.svg')}}" width="35" height="35" alt="Other">
                                <div class="location_address">Please select location</div>
                            </div>
                        </div>
                    </div>
                <div class="location_form_MainBox">
                    <h5 class="modal-title mb-3" id="editAddressModalLabel">Edit Address</h5>

                    <div class="form_box">
                        <form action="" method="POST" class="update-address" enctype="multipart/form-data">
                            @csrf
                            
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
                                            <img src="{{asset('assets/images/home-location.svg')}}" width="18"
                                                height="18" alt="Home">Home</label>
                                    </div>
                                    <div class="add_address_radio_listing">
                                        <input type="radio" name="address_type" id="work" value="Work">
                                        <label for="work" class="add_lable_2">
                                            <img src="{{asset('assets/images/work-location.svg')}}" width="18"
                                                height="18" alt="Work">Work</label>
                                    </div>
                                    <div class="add_address_radio_listing">
                                        <input type="radio" name="address_type" id="other" value="Others">
                                        <label for="other" class="add_lable_3">
                                            <img src="{{asset('assets/images/other-location.svg')}}" width="18"
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
                                    <input type="hidden" id="addcountryCode" name="country_code" value="{{$addressList['country_code'] ?? ''}}">
                                    <input type="hidden" id="addflagcode" name="flagcode" value="{{$addressList['dial_code'] ?? ''}}"
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

    <!-- Loader (Initially Hidden) -->
    <div id="ajaxLoader" style="display: none;">
        <img src="{{asset('assets/images/loader.gif')}}" alt="Loading...">
    </div>
</section>
<!-- cart section end -->

<script>
        document.addEventListener("DOMContentLoaded", function () {
             const minOrderAmount = {{ $minOrderAmount ?? '' }};
                let offerShown = false;
        
                function checkOfferPopup() {
                    // Get current total price from the page
                    let totalPriceText = document.getElementById("totalAmtDaily").innerText.replace(/[^\d.]/g, '');
                    let totalPrice = parseFloat(totalPriceText);
        
                    if (!offerShown && totalPrice >= minOrderAmount) {
                        const popup = document.getElementById("offerPopup");
                        popup.style.display = "block";
                        offerShown = true;
        
                        setTimeout(() => {
                            popup.style.display = "none";
                        }, 3000);
                    }
                }
              checkOfferPopup();   
        });
    </script>

<script>
  const isAppleBrowser = () => {
    const ua = navigator.userAgent;
    return /Safari/.test(ua) && !/Chrome/.test(ua) && (/Macintosh|iPhone|iPad|iPod/.test(ua));
  };

  if (isAppleBrowser()) {
    document.getElementById('applyBtn').style.opacity = '1';
  }
</script>

<script>
function openCity(evt, tabId) {
    var tabcontent = document.querySelectorAll(".tabcontent");
    tabcontent.forEach(tab => tab.style.display = "none");

    var tablinks = document.querySelectorAll(".tablinks");
    tablinks.forEach(tab => tab.classList.remove("active"));
    var activeTab = document.getElementById(tabId);
    if (activeTab) {
        activeTab.style.display = "block";
    }

    if (evt) {
        evt.currentTarget.classList.add("active");
    } else {
        var savedTabLink = document.querySelector(`[onclick="openCity(event, '${tabId}')"]`);
        if (savedTabLink) {
            savedTabLink.classList.add("active");
        }
    }

    // Store selected tab in localStorage
    localStorage.setItem("selectedTab", tabId);
}

document.addEventListener("DOMContentLoaded", function() {
    var rawTab = "{{ \Request::get('tab') }}";
    var savedTab = (rawTab === '' || rawTab === '2') ? '1' : rawTab;
    openCity(null, savedTab);
});

function openSubscriptionTap(event) {
    localStorage.setItem("selectedTab", "1");
    window.location.href = "{{ env('APP_URL') }}cart?tab=1";
}
</script>

<!-- TABBING SCRIPT END -->

<!-- check all days checbox script start -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#alldays').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('.day_count input[type="checkbox"]').prop('checked', isChecked).change();
        document.getElementById('select-date').value = '';

        document.querySelectorAll('input[type="radio"][name="week"]').forEach(radio => {
            radio.checked = false;
        });
         $('.delivery-first-date').hide();
      
         if (document.getElementById('timeSlot')) {
            $('#timeSlot').hide();
        }
       
    });

    $('.day_count input[type="checkbox"]').on('change', function() {
        var allChecked = $('.day_count input[type="checkbox"]').length === $(
            '.day_count input[type="checkbox"]:checked').length;
        $('#alldays').prop('checked', allChecked);
        document.getElementById('select-date').value = '';

        document.querySelectorAll('input[type="radio"][name="week"]').forEach(radio => {
            radio.checked = false;
        });
        document.querySelector('.delivery-first-date').style.display = 'none';
         
         if (document.getElementById('timeSlot')) {
            $('#timeSlot').hide();
        }

    });
   
});
</script>
<!-- check all days checbox script end -->
 
<!-- Clear modal class data...G1 -->
<script>
    function closeModalClass() { 
        $('.day_count input[type="checkbox"]').prop('checked', false).trigger('change');
        document.getElementById('select-date').value = '';
        document.querySelectorAll('input[type="radio"][name="week"]').forEach(radio => {
            radio.checked = false;
        });
         $('.delivery-first-date').hide();
     
         if (document.getElementById('timeSlot')) {
            $('#timeSlot').hide();
        }
    }
 </script>
 <script>
    function removeSelectedPreference(varientID, type){
        
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        
        var url = "";
        if (type == "daily") {
            url = "{{ url('/update-cart') }}";
        }else {
            url = "{{ url('/update-subcart') }}";
        }
        let varients = [varientID]; 
       
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                varients: varients,
                selectedFeatureId: 0,
                _token: _token
            },
            success: function(result) {
                // alert("AJAX Response: " + JSON.stringify(result));
                console.log(result);
                if (result.success) {
                     location.reload();
                } else {
                    alert(result.message); // Show error message
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
            // alert("An error occurred: " + error); // Show error alert
            }
        });
         
     }
 </script>
 
<!-- Add card api call...G1 -->
<script>
function addCard() {
    $("#ajaxLoader").show();
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}addCardAPICall";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            addedFrom:'cart',
             tab:"{{\Request::get('tab')}}",
            _token: _token,
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
document.querySelectorAll('input[name="toggle"]').forEach(radio => {
    radio.addEventListener('change', function() {
        // Hide all divs
        document.querySelectorAll('.content-div').forEach(div => div.style.display = 'none');

        // Show the selected div
        const selectedDiv = document.getElementById(this.value);
        if (selectedDiv) {
            selectedDiv.style.display = 'block';
        }
    });
});
</script>
<script>
document.querySelectorAll('input[name="toggle-two"]').forEach(radio => {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.content-div-two').forEach(div => div.style.display = 'none');

        // Show the selected div
        const selectedDiv = document.getElementById(this.value);
        if (selectedDiv) {
            selectedDiv.style.display = 'block';
        }
    });
});
</script>

<!-- delete to subcart api call...G1 -->
<script>
function removeToSubCartCall(varientId, rStatus, cQty, ctimeSlot, cSubTotlaDelivery, cSubDeliveryDate, cRepeatOrder, cIsAutoRenew, name, price, featureId) {
    const selectedDays = [];
    let selectedDayString = "",
        selectedWeekValue = "",
        selectedTimeSlot = "", isAutoRenew = "no",
        qty = 0;
    let selectedDate = "";
    if (rStatus == 'remove') {
        const checkboxes = document.querySelectorAll('.day_count input[type="checkbox"]');
        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                selectedDays.push(checkbox.value);
                selectedDayString += (selectedDayString ? ", " : "") + checkbox.value;
            }
        });
        selectedDate = document.getElementById("select-date").value;
        const selectedWeek = document.querySelector('.week-list input[type="radio"]:checked');
        if (selectedWeek) {
            selectedWeekValue = selectedWeek.value;
        }
        const selectedTime = document.querySelector('.time-list input[type="radio"]:checked');
        if (selectedTime) {
            selectedTimeSlot = selectedTime.value;
        }
    }else if (rStatus == 'plus') {
            qty = parseInt(cQty || 0) + 1;
        selectedWeekValue = cSubTotlaDelivery;
        selectedDate = cSubDeliveryDate;
        selectedTimeSlot = ctimeSlot;
        selectedDayString = cRepeatOrder;
        isAutoRenew = cIsAutoRenew;
    }else if (rStatus == 'minus') {
         cQty = parseInt(cQty || 0);
         qty = (cQty <= 1) ? 0 : cQty - 1;
        selectedWeekValue = cSubTotlaDelivery;
        selectedDate = cSubDeliveryDate;
        selectedTimeSlot = ctimeSlot;
        selectedDayString = cRepeatOrder;
        isAutoRenew = cIsAutoRenew;
    } else {
        if (cQty > 1) {
            qty = cQty;
        } else {
            qty = "1";
        }
        selectedWeekValue = "1";
        selectedDate = null;
        selectedTimeSlot = null;
        selectedDayString = '';
    }
    // console.log("G1----qty->",qty);
    //  console.log("G1----selectedWeekValue->",selectedWeekValue);
    //   console.log("G1----selectedDate->",selectedDate);
    //   console.log("G1----selectedTimeSlot->",selectedTimeSlot);
    //     console.log("G1----selectedDayString->",selectedDayString);
    //      console.log("G1----isAutoRenew->",isAutoRenew);
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}addToSubCart";
    $("#ajaxLoader").show();
    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            screenName: "subcart",
            varientID: varientId,
            qty: qty,
            repeatDays: selectedDayString,
            timeSlot: selectedTimeSlot,
            selectedWeek: selectedWeekValue,
            deliveyDate: selectedDate,
            autorenew: isAutoRenew,
            selectedFeatureId:featureId,
            _token: _token,
        },
        success: function(result) {
            $("#ajaxLoader").hide();
            // if (rStatus != 'plus' && rStatus == 'minus') {
             if (rStatus != 'remove' && rStatus != 'minus') {
                //   console.log("G1----fb->",varientId, name, price);
            fbq('track', 'AddToCart', {
                content_ids: varientId,
                content_name: name,
                content_type: 'product subscription',
                value: price,
                currency: 'AED'
                });
            gtag('event', 'add_to_subcartW', {
                currency: 'AED',
                value: price, 
                items: [{
                    item_id: varientId,
                    item_name:  name,
                    quantity: qty,
                    price: price
                }],
                method: 'cart_button_click',
                page_location: window.location.href,
                debug_mode: false // set true if testing in DebugView
                });
            }
             openSubscriptionTap(event);
            // }
        },
        error: function(xhr, status, error) {
            $("#ajaxLoader").hide();
            alert("An error occurred: " + xhr.responseText);
        },
    });
}

</script>

<!-- //Show week list api call...G1 -->
<script>
function showWeekListUI(screenName, element) {
    let productModel = JSON.parse(element.getAttribute('data-product'));
    let modal = document.getElementById("subscribe");
    // console.log("jivan---->");
    if (!modal) {
        console.error("Modal with ID 'subscribe' not found!");
        return;
    }
    
    modal.setAttribute("data-product-price", productModel.price ?? '');
    modal.setAttribute("data-product-name", productModel.product_name ?? '');
    modal.setAttribute("data-sub-delivery-date", productModel.sub_delivery_date ?? '');
    modal.setAttribute("data-repeat_orders", productModel.repeat_orders ?? '');
    modal.setAttribute("data-qty", productModel.cart_qty ?? '');
    modal.setAttribute("data-varient-id", productModel.varient_id ?? '');
    modal.setAttribute("data-isautorenew", productModel.isautorenew ?? 'no');
    modal.setAttribute("data-feature-id", productModel.product_feature_id ?? '');


    function convertTo24HourFormat(time) {
        let [timePart, modifier] = time.split(" ");
        let [hours, minutes] = timePart.split(":");

        if (modifier === "PM" && hours !== "12") {
            hours = parseInt(hours) + 12;
        } else if (modifier === "AM" && hours === "12") {
            hours = "00";
        }

        return `${hours}:${minutes}`;
    }
   
    let isPastDate = 0;
    let currentDateTime = new Date();
    if (productModel.sub_delivery_date && productModel.sub_time_slot) {
        console.log(`Product: has a past date.--2`);
        let timeSlotStart = productModel.sub_time_slot.split(" - ")[0].trim();
        let deliveryDateTimeString = `${productModel.sub_delivery_date}T${convertTo24HourFormat(timeSlotStart)}:00`;
        let deliveryDateTime = new Date(deliveryDateTimeString);

        console.log(`Product: has a past date.-->` + deliveryDateTime + '&' + currentDateTime);

        if (deliveryDateTime < currentDateTime) {
            isPastDate = 1;
            console.log(`Product: has a past date.`);
        }
    }
    if (isPastDate != 1) {
        modal.setAttribute("data-sub-time-slot", productModel.sub_time_slot);
    }

    // document.querySelector("#subscribe .modal-body div").innerText = productModel.product_name;
    let selectedDays = productModel.repeat_orders ? productModel.repeat_orders.split(",").map(day => day.trim()) : [];
    document.querySelectorAll("input[name='day']").forEach((checkbox) => {
        checkbox.checked = selectedDays.includes(checkbox.value);
    });
    // console.log("selectedDaysD:", selectedDays);

    const checkboxes = document.querySelectorAll(".day_count input[type='checkbox']");

    checkboxes.forEach((checkbox) => {
        if (selectedDays.includes(checkbox.value)) {
            checkbox.checked = true;
        }
    });
    // const checkboxesAuto = document.querySelectorAll("#isAutorenew input[type='checkbox']");
    console.log(`Product: has a past date.--------------------->`,productModel.isautorenew);

    const checkbox = document.getElementById("isAutorenew");

    if (productModel.isautorenew === "yes" && checkbox) {
        checkbox.checked = true;
    }

    let dateInput = document.querySelector("#subscribe .modal-body #select-date");
    if (dateInput) {
        dateInput.value = productModel.sub_delivery_date;
        if (productModel.sub_delivery_date != null && isPastDate != 1) {
            console.log(`Product: ${productModel.sub_delivery_date} has a past date.1--- ` + isPastDate);
            handleDateChange("");
        }
    }

    // Call backend
    jQuery.ajax({
        url: "{{ENV('APP_URL')}}showWeekListA",
        method: "POST",
        data: {
            screenName: screenName,
            noOfWeeks: productModel.sub_total_delivery,
            _token: jQuery('meta[name="csrf-token"]').attr('content'),
        },
        success: function(response) {
            if (response.status === 'success') {
                jQuery('#weekListC').html(response.htmlcode);
            }
            disableSpecificDays(productModel);
        },
        error: function(xhr) {
            alert("An error occurred: " + xhr.responseText);
        },
    });

    // 👉 Show modal only after everything is set
    let bootstrapModal = new bootstrap.Modal(modal);
    bootstrapModal.show();
}
</script>

<!-- Handle week selection click...G1 -->
<script>
function handleSelectedWeekClickCart(element) {

    const selectedValue = element.value;
    const otherReasonInput = document.getElementById("weekModel");

    console.log("Selected jivan week:", selectedValue);
    console.log("Selected jivan otherReasonInput:", otherReasonInput);


    // Get all checkboxes
    const checkboxes = document.querySelectorAll('.day_count input[type="checkbox"]');
    const selectedDays = [];

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            selectedDays.push(checkbox.value);
        }
    });

    if (selectedValue == 1 && selectedDays.length <= 1) {
        Swal.fire({
            title: "{{ENV('WEEKSELECTIONMSG')}}",
            showDenyButton: false,
            showCancelButton: false,
            icon: "sucess",
            confirmButtonText: "OK",
        }).then((result) => {
            if (result.isConfirmed) {
                element.checked = false;
            }
        });
    }

}
</script>

<script>
    // Set min date to tomorrow
    const dateInput = document.getElementById('select-date');
    const today = new Date();
    today.setDate(today.getDate() + 1); // Add 1 day (tomorrow)

    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0'); 
    const dd = String(today.getDate()).padStart(2, '0');

    const minDate = `${yyyy}-${mm}-${dd}`;
    dateInput.min = minDate;
</script>
<!-- Handle date click...G1 -->
<script>

function handleDateClick() {
    // Get all checkboxes
    const checkboxes = document.querySelectorAll('.day_count input[type="checkbox"]');
    const selectedDays = [];

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            selectedDays.push(checkbox.value);
        }
    });
    if (document.getElementById('timeSlot')) {
            $('#timeSlot').show();
        }
    if (selectedDays.length == 0) {
        event.preventDefault();
        Swal.fire({
            title: "{{ENV('SELECTREPEATDAYSMSG')}}",
            showDenyButton: false,
            showCancelButton: false,
            icon: "sucess",
            confirmButtonText: "OK",
        }).then((result) => {
            if (result.isConfirmed) {
                // element.checked = false;
            }
        });
    }


}
</script>

<!-- Handle date changed...G1 -->
<script>
function parseDateTime(dateStr, timeStr) {
    const [hourMin, ampm] = timeStr.split(' ');
    let [hours, minutes] = hourMin.split(':').map(Number);
    if (ampm === 'PM' && hours !== 12) hours += 12;
    if (ampm === 'AM' && hours === 12) hours = 0;
    const dateObj = new Date(dateStr);
    dateObj.setHours(hours);
    dateObj.setMinutes(minutes);
    dateObj.setSeconds(0);
    return dateObj;
}
function handleDateChange(event) {
   let modal = document.getElementById("subscribe");
    let subTimeSlot = modal.getAttribute("data-sub-time-slot");
    let sub_delivery_date = modal.getAttribute("data-sub-delivery-date");
    let isPastDate = 0;
    let currentDateTime = new Date();
    if (sub_delivery_date && subTimeSlot) {
        let timeSlotStart = subTimeSlot.split(" - ")[0].trim();
        let deliveryDateTime = parseDateTime(sub_delivery_date, timeSlotStart);
        console.log("Parsed deliveryDateTime:", deliveryDateTime);
        if (deliveryDateTime < currentDateTime) {
            isPastDate = 1;
        }
    }
    const checkboxes = document.querySelectorAll('.day_count input[type="checkbox"]');
    const selectedDays = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.value);
    let selectedDate = event.target?.value || "";
    if (subTimeSlot && sub_delivery_date && isPastDate === 0) {
                console.log("Selected Date selectedDate--->");
        selectedDate = sub_delivery_date;
    }
        console.log("Selected Date selectedDate :", selectedDate);
        console.log("Selected Date selectedDays :", selectedDays);
        console.log("Selected Date subTimeSlot :", subTimeSlot);
    const _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}handleDateSelection";
    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            selectedDate: selectedDate,
            repeatDays: selectedDays,
            selectedTimeSlot: subTimeSlot,
            _token: _token,
        },
        success: function(response) {
            // console.log(response); // Handle success response
            if (response.status === 'success') {
                $('#timeSlot').html(response.htmlcode);
                $('#checkDDate').html(response.htmlcode1);
            }
        },
        error: function(xhr, status, error) {
            // console.error("Error:", error);
            alert("An error occurred: " + xhr.responseText);
        },
    });
}
</script>

<!-- Add to subcart api call...G1 -->
<script>
function handleOnCLickAction(event) {
    const checkbox = event.target;
    const day = checkbox.value;
    if (checkbox.checked) {
        checkbox.checked = true;
        console.log(`${day} is selected.`);
    } else {
        checkbox.checked = false;
        console.log(`${day} is deselected.`);
        document.getElementsByName(day).checked = false;

    }
    const selectedDays = Array.from(document.querySelectorAll('.day_count input[type="checkbox"]:checked'))
        .map(checkbox => checkbox.value);

    console.log("Selected Days:", selectedDays);
}

function AddToSubCartCall(element) {

    let modal = document.getElementById("subscribe");

    // Retrieve stored product details
    let productPrice = modal.getAttribute("data-product-price");
    let varientID = modal.getAttribute("data-varient-id");
    let productName = modal.getAttribute("data-product-name");
    let subDeliveryDate = modal.getAttribute("data-sub-delivery-date");
    let subTimeSlot = modal.getAttribute("data-sub-time-slot");
    let repeat_orders = modal.getAttribute("data-repeat_orders");
    let qty = modal.getAttribute("data-qty");
     let featureId = modal.getAttribute("data-feature-id");
    // console.log("Variant ID:", varientID);
    // console.log("Product Name:", productName);
    // console.log("Subscription Delivery Date:", subDeliveryDate);
    // console.log("Subscription Time Slot:", subTimeSlot);

    const checkboxes = document.querySelectorAll('.day_count input[type="checkbox"]');

    let selectedDayString = "",
        selectedWeekValue = "", isAutorenew = "no",
        selectedTimeSlot = "";

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("click", function() {
            selectedDayString = getSelectedDays();
        });
    });

    const selectedDays = Array.from(document.querySelectorAll('.day_count input[type="checkbox"]:checked'))
        .map(checkbox => checkbox.value);

    selectedDayString = selectedDays.join(", ");

    const selectedDate = document.getElementById("select-date").value;
    const selectedWeek = document.querySelector('.week-list input[type="radio"]:checked');
    if (selectedWeek) {
        selectedWeekValue = selectedWeek.value;
    }

    const selectedTime = document.querySelector('.time-list input[type="radio"]:checked');
    if (selectedTime) {
        selectedTimeSlot = selectedTime.value;
    }
    const checkbox = document.getElementById("isAutorenew");
    if (checkbox.checked) {
        console.log("Checkbox is checked");
        isAutorenew = "yes";
    } else {
        console.log("Checkbox is not checked");
        isAutorenew = "no";
    }

    if (selectedDayString !== "" && selectedWeekValue !== "" && selectedDate !== "" && selectedTimeSlot !== "") {

        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}addToSubCart";
        $("#ajaxLoader").show();
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                screenName: "cart",
                qty: qty,
                varientID: varientID,
                repeatDays: selectedDayString,
                timeSlot: selectedTimeSlot,
                selectedWeek: selectedWeekValue,
                deliveyDate: selectedDate,
                autorenew: isAutorenew,
                selectedFeatureId: featureId,
                _token: _token,
            },
            success: function(result) {
                $("#ajaxLoader").hide();
                if (result.success === '1') {
                    // alert(result.action);
                    // console.log("G1----fb->",varientID, productName, productPrice);
                fbq('track', 'AddToCart', {
                                content_ids: varientID,
                                content_name: productName,
                                content_type: 'product subscription',
                                value: productPrice,
                                currency: 'AED'
                                });
                    localStorage.setItem("selectedTab", "1");
                   window.location.href = "{{ env('APP_URL') }}cart?tab=1";
                } else {
                    Swal.fire({
                    title: result.message,
                    icon: "error",
                    draggable: true
                      });
                }
            },
            error: function(xhr, status, error) {
                $("#ajaxLoader").hide();
                alert("An error occurred: " + xhr.responseText);
            },
        });

    } else if (selectedDayString === "") {
        Swal.fire({
            title: "{{ENV('SELECTREPEATDAYSMSG')}}",
            icon: "warning",
            draggable: true
        });
    } else if (selectedWeekValue === "") {
        Swal.fire({
            title: "{{ENV('SELECTSUBSCRIPTIONWEEKMSG')}}",
            icon: "warning",
            draggable: true
        });
    } else if (selectedDate === "") {
        Swal.fire({
            title: "{{ENV('SELECTSTARTDATEDELIVERYMSG')}}",
            icon: "warning",
            draggable: true
        });
    } else if (selectedTimeSlot === "") {
        Swal.fire({
            title: "{{ENV('SELECTTIMESLOTMSG')}}",
            icon: "warning",
            draggable: true
        });
    }
}
</script>

<!-- //Set date selection in current date + 1 value...G1 -->
@if(isset($subCartProductList['data']) && is_array($subCartProductList['data']))
<script>
function setMinDate() {
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);
    const minDate = tomorrow.toISOString().split('T')[0];
    document.getElementById('select-date').setAttribute('min', minDate);
}
// Call the function to set the minimum date when the page loads
window.onload = setMinDate;
</script>
@endif

<!-- Set diseable days -->
<script>
function disableSpecificDays(productModel) {
    console.log("Jivan 4---productModel-->", productModel);
    let allowedDays = productModel.available_days.split(",");
    console.log("Available Days:", allowedDays);

    // All possible days
    const allDays = {
        sun: "day_sunday",
        mon: "day_monday",
        tue: "day_tuesday",
        wed: "day_wednesday",
        thu: "day_thursday",
        fri: "day_friday",
        sat: "day_saturday"
    };

    Object.keys(allDays).forEach(day => {
        if (!allowedDays.includes(day)) {
            const checkbox = document.getElementById(allDays[day]);
            if (checkbox && allowedDays != "all") {
                checkbox.disabled = true; // Disable checkbox
                const label = checkbox.closest('label');
                label.style.cursor = "not-allowed";
                label.style.opacity = "0.2";
            }

        }
    });
}
</script>

<!-- Update Cart qty....G1 -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Select all qty buttons
    document.querySelectorAll(".qty-btn1").forEach(button => {
        button.addEventListener("click", function() {
           
            let qtyBox = this.closest(".qtyBox");
            let inputField = qtyBox.querySelector(".input-qty");
            let product = qtyBox.getAttribute("data-product");

            let change = parseInt(this.getAttribute("data-change"));
            let currentQty = parseInt(inputField.value);
            let newQty = currentQty + change;
            if (newQty < 1) newQty = 1;

            inputField.value = currentQty;

            // console.log("G1---product-->", product);
            // Call API to update quantity
            updateCartQuantity(product, newQty);
        });
    });

    function updateCartQuantity(productString, quantity) {
        let product = JSON.parse(productString);
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}add-to-cart";
        $("#ajaxLoader").show();
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                screenName: "cart",
                qty: quantity,
                varientID: product.varient_id,
                repeatDays: product.repeat_orders,
                timeSlot: product.sub_time_slot,
                selectedWeek: product.sub_total_delivery,
                deliveyDate: product.sub_delivery_date,
                selectedFeatureId:product.product_feature_id,
                _token: _token,
            },

            success: function(result) {
                $("#ajaxLoader").hide();
                if (result.success === '1') {
                    localStorage.setItem("selectedTab", "1");
                    window.location.href = "{{ env('APP_URL') }}cart?tab=1";
                }
            },
            error: function(xhr, status, error) {
                $("#ajaxLoader").hide();
                alert("An error occurred: " + xhr.responseText);
            },
        });

    }
});
</script>

<!-- WalletSelectedby percentage handle...G1 -->
<script>
let baseTotal = parseFloat("{{ $subCartProductList['data']['total_price'] ?? 0 }}");
let walletB = parseFloat("{{ $subCartProductList['data']['referral_balance'] ?? 0 }}")
let cashWalletB = parseFloat("{{ $subCartProductList['data']['wallet_balance'] ?? 0 }}")

function onWalletSelected(checkbox) {
//     let walletText = document.getElementById("walletText");
//     // let walletAmount = parseFloat(document.getElementById("walletAmountS").innerText);
//     let walletPercentage = parseFloat(document.getElementById("walletPercentage").value);
//     // console.log("Wallet Selected: Amount & Percentage → " + walletAmount + " & " + walletPercentage);
//     let deductedAmount = (baseTotal * walletPercentage) / 100;
   
//   console.log("G1------>", walletB);
//     console.log("G1------>", deductedAmount + walletB);
//     if (checkbox.checked) {
//         if (deductedAmount <= walletB) {
//             document.getElementById("selectedWalletAmount").innerText = deductedAmount.toFixed(2);
//             walletText.style.display = "inline";
//             document.getElementById("totalPay").innerText = "AED " + (baseTotal - deductedAmount).toFixed(2);
//             document.getElementById("totalAmt").innerText = "AED " + (baseTotal - deductedAmount).toFixed(2);
//         } else {
//             document.getElementById("selectedWalletAmount").innerText = walletB.toFixed(2);
//             walletText.style.display = "inline";
//             document.getElementById("totalPay").innerText = "AED " + (baseTotal - walletB).toFixed(2);
//             document.getElementById("totalAmt").innerText = "AED " + (baseTotal - walletB).toFixed(2);
//         }


//     } else {
//         walletText.style.display = "none";
//         document.getElementById("totalPay").innerHTML = "AED " + baseTotal.toFixed(2);
//         document.getElementById("totalAmt").innerHTML = "AED " + baseTotal.toFixed(2);

//         // console.log("Wallet Unselected");
//     }
document.getElementById("walletText").style.display = checkbox.checked ? "inline" : "none";
    updateFinalTotal();
}

function onCashWalletSelected(checkbox) {
//     let walletText = document.getElementById("cashWalletText");
//         let selectedWalletAmount = parseFloat(document.getElementById("selectedWalletAmount").innerText);

//     // let walletAmount = parseFloat(document.getElementById("walletAmountS").innerText);
//     // let walletPercentage = parseFloat(document.getElementById("walletPercentage").value);
//     // console.log("Wallet Selected: Amount & Percentage → " + walletAmount + " & " + walletPercentage);
//     let deductedAmount = (baseTotal - selectedWalletAmount);
   
//   console.log("G1------>", cashWalletB);
//     console.log("G1------>", deductedAmount + cashWalletB);
//     if (checkbox.checked) {
//         if (deductedAmount <= cashWalletB) {
//             document.getElementById("selectedCashWalletAmount").innerText = deductedAmount.toFixed(2);
//             walletText.style.display = "inline";
//             document.getElementById("totalPay").innerText = "AED " + (baseTotal - deductedAmount).toFixed(2);
//             document.getElementById("totalAmt").innerText = "AED " + (baseTotal - deductedAmount).toFixed(2);
//         } else {
//             document.getElementById("selectedCashWalletAmount").innerText = cashWalletB.toFixed(2);
//             walletText.style.display = "inline";
//             document.getElementById("totalPay").innerText = "AED " + (baseTotal - cashWalletB).toFixed(2);
//             document.getElementById("totalAmt").innerText = "AED " + (baseTotal - cashWalletB).toFixed(2);
//         }


//     } else {
//         walletText.style.display = "none";
//         document.getElementById("totalPay").innerHTML = "AED " + baseTotal.toFixed(2);
//         document.getElementById("totalAmt").innerHTML = "AED " + baseTotal.toFixed(2);

//         // console.log("Wallet Unselected");
//     }
 document.getElementById("cashWalletText").style.display = checkbox.checked ? "inline" : "none";
    updateFinalTotal();
}

function updateFinalTotal() {

    let walletChecked = document.getElementById("subscription_wallet")?.checked;
    let cashChecked = document.getElementById("subscription_cash_wallet")?.checked;

    let walletPercentage = parseFloat(document.getElementById("walletPercentage").value) || 0;

    let referralUsed = 0;
    let cashUsed = 0;

    // ================= REFERRAL WALLET =================
    if (walletChecked) {
        let walletCalc = (baseTotal * walletPercentage) / 100;
        referralUsed = Math.min(walletCalc, walletB);
    }

    let remainingAfterReferral = baseTotal - referralUsed;

    // ================= CASH WALLET =================
    if (cashChecked) {
        cashUsed = Math.min(remainingAfterReferral, cashWalletB);
    }

    let finalTotal = remainingAfterReferral - cashUsed;

    if (finalTotal < 0) finalTotal = 0;

    // ================= UI UPDATE =================
    document.getElementById("selectedWalletAmount").innerText = referralUsed.toFixed(2);
    document.getElementById("selectedCashWalletAmount").innerText = cashUsed.toFixed(2);

    document.getElementById("totalPay").innerText = "AED " + finalTotal.toFixed(2);
    document.getElementById("totalAmt").innerText = "AED " + finalTotal.toFixed(2);

    // console.log("Referral Used:", referralUsed);
    // console.log("Cash Used:", cashUsed);
    // console.log("Final Total:", finalTotal);
}
</script>

<!-- Delivery partner instruction handle...G1 -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    let radioButtons = document.querySelectorAll("input[name='instruction']");

    radioButtons.forEach(function(radio) {
        radio.addEventListener("change", function() {
            console.log("Selected Delivery Instruction:", this.value);
        });
    });
});
</script>

<!-- Show all address api call...G1 -->

<script>
function fetchAddressList() {
    // console.log("AJAX Success:1", btnName);
    $("#ajaxLoader").show();
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}showAddressList";

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
                                        <img alt="delete" src="{{asset('assets/images/adddelete.png')}}">
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
                                                            <img src="{{asset('assets/images/call.png')}}" alt="Call"
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
                                                        <img alt="edit1" src="{{ asset('assets/images/addedit.png') }}">
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
        return "{{asset('assets/images/home_location.png')}}";
    } else if (type === "Work") {
        return "{{asset('assets/images/office_location.png')}}";
    } else {
        return "{{asset('assets/images/other_location.png')}}";
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

<!-- Show card list api call...G1 -->
<script>
function fetchCardList(selectedsi) {
   
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
    // console.log("G1:---siNO--2->", siNO);
    //     console.log("G1:---siNO--3->", selectedsi);


    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}showCardList";

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
                                                   onchange="saveSelectedCardDataN(this)"/>

                                            <div class="plan-content">
                                                <div class="plan-details">
                                                    <div class="payment_details">
                                                        <div class="cards_img">
                                                            <img src="{{asset('assets/images/card.png')}}" alt="card">
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
function saveSelectedCardDataN(element) {
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

<!-- Set Pay now and pay per delivery selection...G1 -->
@if(isset($subCartProductList['data']) && is_array($subCartProductList['data']))
<script>
function toggleSubRadioBtnCharges() {
    let selectedPayment = document.querySelector("input[name='toggle-two']:checked");

    if (!selectedPayment) return;

    let paymentType = selectedPayment.value;
    let quickPayDiv = document.getElementById("quickPay");

    if (paymentType === "Pay Per Delivery") {
        quickPayDiv.style.display = "none";
    } else {
        quickPayDiv.style.display = "flex";
    }

}
document.addEventListener("DOMContentLoaded", toggleSubRadioBtnCharges);

document.addEventListener("DOMContentLoaded", function() {
    toggleSubRadioBtnCharges();
    document.querySelectorAll("input[name='toggle']").forEach(radio => {
        radio.addEventListener("change", toggleSubRadioBtnCharges);
    });
    document.querySelectorAll("input[name='tip']").forEach(tip => {
        tip.addEventListener("change", toggleSubRadioBtnCharges);
    });
});
</script>
<script>
function getSelectedPaymentOption() {
    let selectedOption = document.querySelector('input[name="toggle-two"]:checked');
    if (selectedOption) {
        // console.log("Selected Payment Option:", selectedOption.value);
        return selectedOption.value;
    } else {
        // console.log("No option selected");
        return null;
    }
}
// Example: Call the function on button click
document.addEventListener("DOMContentLoaded", function() {
    // Check selected radio button on page load
    getSelectedPaymentOption();

    // Add event listener to update when radio button changes
    document.querySelectorAll('input[name="toggle-two"]').forEach((radio) => {
        radio.addEventListener("change", getSelectedPaymentOption);
    });
});
</script>

@endif

<!-- Check out subscription cart api call...G1 -->
@if(isset($subCartProductList['data']) && is_array($subCartProductList['data']))

<!--checkout subcart api call...G1 -->
<script>
function checkOutSubCartApiCall() {
    localStorage.removeItem("selectedAddress");
    // console.log("Added to cart: ", varientId);
    var selectedDate = '',
        selectedTimeSlot = '',
        selectedPartnerInstruction = '';
    let fullText = document.getElementById("totalAmt").innerText;  
    let totalPrice = parseFloat(fullText.replace("AED", "").trim());
    let selectedPayment = document.querySelector("input[name='toggle-two']:checked");
    let paymentType = selectedPayment.value;
    if (paymentType === "Pay Per Delivery" && totalPrice <= 0) {
        Swal.fire({
            title: "Your wallet balance is sufficient to cover the entire order amount, so other payment options are not available",
            icon: "warning"
        });
        return; 
    }
    
    var addressID1 = "";
    // const addressID = document.getElementById("addressId").value;
    const addressInput = document.getElementById('addressId');
    if (addressInput && addressInput.value && addressInput.value.trim() !== '' && addressInput.value !== 'undefined') {
        addressID1 = addressInput.value;
        console.log('AddressID:', addressID1);
    } else {
        Swal.fire({
            title: "Please select a delivery address.",
            icon: "warning"
        });
        return;
    }
    // console.log("Selected addressID:", addressID);
    // const siNO = document.getElementById("siNo").value;
     var siNO = "";
    const siNOs = document.getElementById("siNo");
    if (siNOs) {
        console.log(siNOs.value); // Safe to access .value
        siNO = siNOs.value;
    } else {
        console.warn("Element with id 'siNo' not found.");
         Swal.fire({
        title: "Please select bank card",
        icon: "warning"
    });
    return;
    }
    // console.log("Selected siNO:", siNO);
    let selectedMethod1 = document.querySelector('input[name="toggle-two"]:checked');
    if (selectedMethod1) {
        selectedMethod = selectedMethod1.value;
    }
    // console.log("Selected Payment Method:", selectedMethod);
    // let selectedInstruction = document.querySelector('input[name="instruct"]:checked');
    // if (selectedInstruction) {
    //     // console.log("Selected Instruction:", selectedInstruction.value);
    //     selectedPartnerInstruction = selectedInstruction.value;
    // }
    let selectedInstructions = document.querySelectorAll('input[name="instruction[]"]:checked');
    let values = [];
    selectedInstructions.forEach(item => {
        values.push(item.value);
    });
    selectedPartnerInstruction = values.join(", ");
    // console.log("Selected selectedPartnerInstructions:", selectedPartnerInstructions);
    
    let currentDateTime = new Date();
    let products = @json($subCartProductList['data']['data']);
    let isRequired = 0;
    isPastDate = 0
    products.forEach(product => {
        if (product.repeat_orders && product.repeat_orders.trim() !== "") {} else {
            isRequired = 1;
            console.log(`Product: ${product.product_name}, No repeat orders set.`);
        }
        let subDeliveryDate = product.sub_delivery_date;
        let subTimeSlot = product.sub_time_slot;
        if (subDeliveryDate && subTimeSlot) {
            let timeSlotStart = subTimeSlot.split(" - ")[0].trim();
            let deliveryDateTime = new Date(`${subDeliveryDate} ${timeSlotStart}`);
            if (deliveryDateTime < currentDateTime) {
                isPastDate = 1;
                console.log(`Product: ${product.product_name} has a past date.`);
            }
        }
    });
    const walletCheckbox = document.getElementById("subscription_wallet");
    let cashChecked = document.getElementById("subscription_cash_wallet");
    let isWalletSlected = "no";
    if (walletCheckbox.checked) {
        isWalletSlected = "yes";
    }
    if (cashChecked.checked){
         isWalletSlected = "yes";
    }
    const autoRenewID = document.getElementById("autoRenewID").value;
    // console.log(`autoRenewID-----: ${autoRenewID}`);
    if ((autoRenewID) === 'yes' && selectedMethod === "Pay Now") {
        Swal.fire({
        title: "Your auto-renwal is now active. You can place orders only using Pay Per Delivery",
        icon: "warning",
        draggable: true
        });
        return;
    }
    let orderInstruction = document.getElementById("orderInstruction").value;

    let selectedWalletAmount = parseFloat(document.getElementById("selectedWalletAmount").innerText);
    let selectedCashWalletAmount = parseFloat(document.getElementById("selectedCashWalletAmount").innerText);
    
    // console.log(`selectedWalletAmount: ${selectedWalletAmount}`);
    if (addressID1 !== "" && siNO !== "" && isRequired !== 1 && isPastDate !== 1) {
        $("#ajaxLoader").show();
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}checkoutsubcribtionorder";
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                screenName: "ShowSubCart",
                addressID: addressID1,
                siNo: siNO,
                paymentMethod: selectedMethod,
                selectedPartnerInstruction: selectedPartnerInstruction,
                walletStatus: isWalletSlected,
                disccountAmount: 0,
                totalwalletamt: selectedWalletAmount,
                totalcashwalletamt:selectedCashWalletAmount,
                _token: _token,
                orderInstruction:orderInstruction
            },
            success: function(result) {
                console.log(result);
                $("#ajaxLoader").hide();
                if (result.success === '1') {
                     let fullText = document.getElementById("totalAmt").innerText;  
                let amount = parseFloat(fullText.replace("AED", "").trim());    
                fbq('track', 'Purchase', {
                    value: parseFloat(amount),
                    currency: 'AED'
                });
                let items = [];
                products.forEach(product => {
                    items.push({
                        item_id: product.varient_id.toString(),
                        item_name: product.product_name,
                        quantity: parseInt(product.cart_qty),
                        price: parseFloat(product.mrp)  // or use `product.price` if you prefer selling price
                    });
                    });
                gtag('event', 'begin_checkoutSubscriptionW', {
                    currency: 'AED', 
                    value: amount, 
                    items: items,
                    method: 'cart_checkout_button',
                    page_location: window.location.href,
                    debug_mode: false // true for DebugView testing
                    });
                     navigateToNextPage(href =
                                "{{ENV('APP_URL')}}order-complete?screen=subscription");
                }
            },
            error: function(xhr, status, error) {
                $("#ajaxLoader").hide();
                alert("An error occurred: " + xhr.responseText);
            },
        });
    } else if (isRequired === 1) {
        Swal.fire({
            title: "Please select all required information.",
            icon: "warning",
            draggable: true
        });
    } else if (isPastDate === 1) {
        Swal.fire({
            title: "{{ENV('CHECKPASSEDDATE')}}",
            icon: "warning",
            draggable: true
        });
    } else if (addressID1 === "") {
        Swal.fire({
            title: "{{ENV('SELECTADDRESS')}}",
            icon: "warning",
            draggable: true
        });
    } else if (siNO === "") {
        Swal.fire({
            title: "{{ENV('SELECTCARD')}}",
            icon: "warning",
            draggable: true
        });
    }
}
</script>
@endif

<script>
function navigateToNextPage(url) {
    const nextPageUrl = url;
    window.location.href = nextPageUrl;
    // console.log(window.location.href);
}
</script>
<!-- Check out subscription cart payment api call...G1 -->
@if(isset($subCartProductList['data']) && is_array($subCartProductList['data']))

<!--checkout subcart api call...G1 -->
<script>
function checkOutSubCartPaymentApiCall(btnType) {
    console.log("Added to cart: ", btnType);
    var selectedDate = '',
        selectedTimeSlot = '',
        selectedPartnerInstruction = '';

    const addressID = document.getElementById("addressId").value;
    // console.log("Selected addressID:", addressID);
    let selectedMethod1 = document.querySelector('input[name="toggle-two"]:checked');
    if (selectedMethod1) {
        selectedMethod = selectedMethod1.value;
    }
    let fullText = document.getElementById("totalAmt").innerText;  
    let totalPrice = parseFloat(fullText.replace("AED", "").trim());
    
    let selectedPayment = document.querySelector("input[name='toggle-two']:checked");
    let paymentType = selectedPayment.value;
    if (paymentType === "Pay Per Delivery" && totalPrice <= 0) {
        Swal.fire({
            title: "Your wallet balance is sufficient to cover the entire order amount, so other payment options are not available",
            icon: "warning"
        });
        return; 
    }
    
    if (totalPrice <= 0) {
        Swal.fire({
            title: "Your wallet balance is sufficient to cover the entire order amount, so other payment options are not available",
            icon: "warning"
        });
        return;
    }

     let selectedInstructions = document.querySelectorAll('input[name="instruction[]"]:checked');
    let values = [];
    selectedInstructions.forEach(item => {
        values.push(item.value);
    });
    selectedPartnerInstruction = values.join(", ");
    
    let currentDateTime = new Date();
    let products = @json($subCartProductList['data']['data']);
    let isRequired = 0;
    isPastDate = 0
    products.forEach(product => {
        if (product.repeat_orders && product.repeat_orders.trim() !== "") {} else {
            isRequired = 1;
            console.log(`Product: ${product.product_name}, No repeat orders set.`);
        }
        let subDeliveryDate = product.sub_delivery_date;
        let subTimeSlot = product.sub_time_slot;

        if (subDeliveryDate && subTimeSlot) {
            let timeSlotStart = subTimeSlot.split(" - ")[0].trim();
            let deliveryDateTime = new Date(`${subDeliveryDate} ${timeSlotStart}`);
            if (deliveryDateTime < currentDateTime) {
                isPastDate = 1;
                console.log(`Product: ${product.product_name} has a past date.`);
            }
        }

    });
    const walletCheckbox = document.getElementById("subscription_wallet");
    let cashChecked = document.getElementById("subscription_cash_wallet");
    let isWalletSlected = "no";
    if (walletCheckbox.checked) {
        isWalletSlected = "yes";
    }
    if (cashChecked.checked){
         isWalletSlected = "yes";
    }


    let selectedWalletAmount = parseFloat(document.getElementById("selectedWalletAmount").innerText);
    let selectedCashWalletAmount = parseFloat(document.getElementById("selectedCashWalletAmount").innerText);

   let orderInstruction = document.getElementById("orderInstruction").value;

    if (addressID !== "" && isRequired !== 1 && isPastDate !== 1) {
        $("#ajaxLoader").show();
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}checkoutPaymentSubcribtionOrder";

        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                screenName: "ShowSubCart",
                addressID: addressID,
                paymentMethod: btnType,
                selectedPartnerInstruction: selectedPartnerInstruction,
                walletStatus: isWalletSlected,
                disccountAmount: 0,
                totalwalletamt: selectedWalletAmount,
                totalcashwalletamt:selectedCashWalletAmount,
                orderInstruction: orderInstruction,
                _token: _token,
            },
            success: function(result) {
                $("#ajaxLoader").hide();
                if (result.success === '1') {
                    let fullText = document.getElementById("totalAmt").innerText;  
                let amount = parseFloat(fullText.replace("AED", "").trim());    
                fbq('track', 'Purchase', {
                    value: parseFloat(amount),
                    currency: 'AED'
                });
                let items = [];
                products.forEach(product => {
                    items.push({
                        item_id: product.varient_id.toString(),
                        item_name: product.product_name,
                        quantity: parseInt(product.cart_qty),
                        price: parseFloat(product.mrp)  // or use `product.price` if you prefer selling price
                    });
                    });
                gtag('event', 'begin_checkoutSubscriptionW', {
                    currency: 'AED', 
                    value: amount, 
                    items: items,
                    method: 'cart_checkout_button',
                    page_location: window.location.href,
                    debug_mode: false // true for DebugView testing
                    });
                    navigateToNextPage(href = result.action);
                    // navigateToNextPage(href = "{{ENV('APP_URL')}}order-complete?screen=subscription");
                } else {
                    Swal.fire({
                        icon: "sucess",
                        title: result.message,
                        showCancelButton: false,
                        confirmButtonText: "Ok",
                    }).then((result) => {
                        if (result.isConfirmed) {

                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                $("#ajaxLoader").hide();
                alert("An error occurred: " + xhr.responseText);
            },
        });

    } else if (isRequired === 1) {
        Swal.fire({
            title: "Please select all required information.",
            icon: "warning",
            draggable: true
        });
    } else if (isPastDate === 1) {
        Swal.fire({
            title: "{{ENV('CHECKPASSEDDATE')}}",
            icon: "warning",
            draggable: true
        });
    } else if (addressID === "") {
        Swal.fire({
            title: "{{ENV('SELECTADDRESS')}}",
            icon: "warning",
            draggable: true
        });
    }
}
</script>
@endif



<!--------------  Daily Cart Functionality   ---------------------->
<!-- delete product form daily cart api call...G1 -->
<script>
function removeDailyCartProduct(varientId, qty, nameStr, price) {
    console.log("Added to cart: ", varientId);

    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}add-to-cart";
    $("#ajaxLoader").show();
    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            varient_id: varientId,
            qty: qty,
            _token: _token,
        },

        success: function(result) {
            $("#ajaxLoader").hide();
             gtag('event', 'remove_to_cartW', {
                                    currency: 'AED',
                                    value: price, 
                                    items: [{
                                        item_id: varientId,
                                        item_name:  nameStr,
                                        quantity: qty,
                                        price: price
                                    }],
                                    method: 'cart_button_click',
                                    page_location: window.location.href,
                                    debug_mode: false // set true if testing in DebugView
                                    });
            window.location.href = '{{ env('
            APP_URL ') }}cart?tab=1'
            localStorage.setItem("activeTab", "1");
        },
        error: function(xhr, status, error) {
            $("#ajaxLoader").hide();
            alert("An error occurred: " + xhr.responseText);
        },
    });

}
</script>
<!-- Bootstrap & jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
let selectedProductData = null;
let selectedDateString = "";

function openMyModal(tab,btn, element, selectedIndex) {
    document.getElementById("tabwise").value=tab;
    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
    let productData = JSON.parse(element.getAttribute("data-productCat"));
    selectedProductData = productData;
    
    document.getElementById("selectedDateTimeModal").innerText = "Select date & time for " + productData.cat_name;
    if (btn == "modalBtn") {
        document.getElementById("dayBoxn").innerText = productData.selectedDate;
        // document.getElementById("timeBoxn").innerText = productData.selectedTime;
        let timeStr = productData.selectedTime; // e.g. "06:00 am - 10:00 am"
        let formatted = timeStr.replace(/:00/g, ''); // remove all ":00"
        document.getElementById("timeBoxn").innerText = formatted;
    } else {
        document.getElementById("dayBoxn").innerText = productData.timeslotsdata[0].date;
        // document.getElementById("timeBoxn").innerText = productData.timeslotsdata[0].timeslots[0].time_slots;
        let timeStr = productData.timeslotsdata[0].timeslots[0].time_slots; 
        let formatted = timeStr.replace(/:00/g, '');
        document.getElementById("timeBoxn").innerText = formatted;
    }
    // console.log("g1---->", productData.cat_id)
    ;
    if (productData.cat_id != 0) {
        document.getElementById("dateList").style.display = "none"
        document.getElementById("dateListLabel").style.display = "none"
    }

    let dateList = document.getElementById("dateList");
    let timeList = document.getElementById("timeList");

    dateList.innerHTML = "";
    timeList.innerHTML = "";
    productData.timeslotsdata.forEach((slot, index) => {
        let dateId = `date_${index}`;
        let checked = "";
        if (productData.selectedDate != null && productData.selectedDate == slot.date) {
            checked = index === index ? "checked" : "";
        } else {
            checked = index === 0 ? "checked" : "";
        }
        let dateElement = `
                <div class="schedule">
                    <input type="radio" id="${dateId}" name="date" value="${slot.date}" ${checked} onchange="updateTimes('${slot.date}', ${index}, '${slot.timeslots[0].time_slots}')">
                    <label for="${dateId}">
                        <div class="dateBox">${slot.date.split('-')[2]}</div>
                        <div class="dayBox">${formatDate(slot.date)}</div>
                    </label>
                </div>
            `;
        dateList.innerHTML += dateElement;
    });
    if (btn == "modalBtn") {
        updateTimes(productData.selectedDate, selectedIndex, productData.selectedTime);

    } else {
        updateTimes(productData.timeslotsdata[0].date, 0, productData.timeslotsdata[0].timeslots[0].time_slots);
    }
    myModal.show();
}
// Function to update times based on selected date
function updateTimes(selectedDate, index, timeSlotSelected) {
       const productData = selectedProductData;
    let timeSlots = null;
    for (let i = 0; i < productData.timeslotsdata.length; i++) {
        if (selectedDate == productData.timeslotsdata[i].date) {
            timeSlots = productData.timeslotsdata[i].timeslots
            break;
        }

    }
    let timeList = document.getElementById("timeList");
    timeList.innerHTML = "";

    timeSlots.forEach((slot, i) => {
        let timeId = `time_${index}_${i}`;
        // let checked = i === 0 ? "checked" : "";

        let checked = "";
        if (productData.selectedTime != null && productData.selectedTime == slot.time_slots) {
            checked = i === i ? "checked" : "";
        } else {
            checked = i === 0 ? "checked" : "";
        }
        let timeElement = `
                <div class="schedule2">
                    <input type="radio" id="${timeId}" name="time" value="${slot.time_slots}" ${checked} onchange="updateSelected('${selectedDate}', '${slot.time_slots}')">
                    <label for="${timeId}">
                        <div class="dateBox2"><div class="date_text">${slot.time_slots.replace(/:00/g, '').replace(' - ', ' to ')} </div>
                      </div>
                    </label>
                </div>
            `;
        timeList.innerHTML += timeElement;
    });

    updateSelected(selectedDate, timeSlotSelected);
}

// Function to update selected date and time in modal header
function updateSelected(date, time) {
    selectedDateString = '';
    selectedDateString = date;
    document.getElementById("dayBoxn").innerText = formatDate(date);
    let formatted = time.replace(/:00/g, '');
    document.getElementById("timeBoxn").innerText = formatted;
}

// // Format date (YYYY-MM-DD to "Today", "Tomorrow", or weekday)
function formatDate(dateString) {
    let date = new Date(dateString);
    let today = new Date();
    let tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);

    if (date.toDateString() === today.toDateString()) return "Today";
    if (date.toDateString() === tomorrow.toDateString()) return "Tomorrow";

    return date.toLocaleDateString("en-US", {
        weekday: 'long'
    });
}

// <!-- Save selected dat time for category in daily cart api call...G1 -->
/** Daily cart: only this time slot is used for category sync (matches CartController checkout). */
const DAILY_CART_FIXED_TIME_SLOT = '06:00 am - 10:00 am';

function saveSelectedDateTimeApiCall(selectedBtn, type) {
    // console.log("Data Sent to Server:");
    var fixedSlot = DAILY_CART_FIXED_TIME_SLOT;

    var tab_list=document.getElementById("tabwise").value;
    let dataarray = [];
    if (selectedBtn == "save") {
        if (!selectedProductData) {
            alert("Error: No product selected!");
            return;
        }
        let dateInput = document.querySelector('input[name="date"]:checked');
        let selectedDate = dateInput ? dateInput.value : null;
        let selectedTime = fixedSlot;

        if (!selectedDate) {
            alert("Please select a date.");
            return;
        }
        dataarray = [{
            cat_id: selectedProductData.cat_id,
            selected_date: selectedDate,
            timeslots: selectedTime
        }];
    } else {
        showCartData.data.forEach(category => {
            if (!category.timeslotsdata || !category.timeslotsdata[0]) {
                return;
            }
            if (category.selectedTime === null || category.selectedTime !== fixedSlot) {
                dataarray.push({
                    cat_id: category.cat_id,
                    selected_date: category['timeslotsdata'][0]['date'],
                    timeslots: fixedSlot,
                });
            }
        });
    }

    if (selectedBtn !== "save" && dataarray.length === 0) {
        if (type === "payNow") {
            checkOutDailyCartApiCallWithData();
        } else {
            checkOutDailyCartPaymentApiCall(type);
        }
        return;
    }

    // console.log("Data Sent to Server:", dataarray);
    var url = "{{ENV('APP_URL')}}saveSelectedDateTimeDB";
    $("#ajaxLoader").show();
    $.ajax({
        url: url,
        method: "POST",
        data: {
            dataarray: dataarray,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(result) {
            $("#myModal").modal('hide');
            $("#ajaxLoader").hide();
            // console.log("Response:", result);
            if (selectedBtn == "save") {
                localStorage.setItem("activeTab", tab_list);
                window.location.href = "{{ env('APP_URL') }}cart?tab="+tab_list;
            } else {
                console.log("G1------->2");
                // checkOutDailyCartApiCallWithData();
                if (type == "payNow") {
                console.log(`selectedWalletAmount: }1444`);
                checkOutDailyCartApiCallWithData();
            } else {
                console.log(`selectedWalletAmount: }1554`);

                checkOutDailyCartPaymentApiCall(type);
            }
            }
        },
        error: function(xhr) {
            $("#myModal").modal('hide');
            // console.error("Error:", xhr.responseText);
            alert("An error occurred: " + xhr.responseText);
        },
    });

}

// Api call for coupon list...G1
function fetchCouponList() {
    $("#ajaxLoader").show();
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ url('/showCouponlist') }}";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            screenName: "cart",
            _token: _token
        },
        success: function(response) {
            $("#ajaxLoader").hide();
            if (response.success === '1') {
                let couponListContainer = $("#couponListContainer");
                couponListContainer.empty();

                let data = response.action;
                if (data && data.data.length > 0) {
                    let couponHtml = '';

                    data.data.forEach(coupon => {
                        couponHtml += `
                            <div class="couponListContainer_list">
                                <div class="coupon_item">
                                    <div class="coupon_data">
                                        <div class="coupon_code_data">
                                            <div class="coupon_code">
                                                <div class="coupon_img">
                                                    <a href="">
                                                        <img src="${coupon.coupon_image}" alt="">
                                                    </a>
                                                </div>
                                                <div>
                                                    <div class="coupon_code_text" onclick="copyText('${coupon.coupon_code}')">
                                                        ${coupon.coupon_code}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="coupon_apply_btn" onclick="applyCouponAPICall('${coupon.coupon_code}')">
                                                Apply
                                            </div>
                                        </div>
                                        <p>${coupon.coupon_description}</p>
                                    </div>
                                    <div class="coupon_details">
                                        <div class="coupon_details_text">
                                            Use code <strong>${coupon.coupon_name} (${coupon.coupon_code})</strong> to get 
                                            ${coupon.type === "percentage" ? `<strong>${coupon.amount}%</strong>` : `<strong>${coupon.amount} AED</strong>`}
                                            off on your order.
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                    });

                    couponListContainer.html(couponHtml);
                } else {
                    couponListContainer.html("<p>No Coupon found.</p>");
                }
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(xhr, status, error) {
            $("#ajaxLoader").show();
            alert("An error occurred: " + xhr.responseText);
        },
    });
}

// app coupon submit btnclick ...G1
function applyCouponAPICallForSubmitN(event) {
    // event.preventDefault();
    console.log("Data Sent to couponCode:");

    let couponCode = document.getElementById("couponCodeInput").value.trim();
    console.log("Data Sent to couponCode:", couponCode);
    if (couponCode === "") {
        alert("Please enter a coupon code.");
        return;
    }
    console.log("applyCouponAPICall----", couponCode);

    applyCouponAPICall(couponCode);
}
// apply CouponAPICall...G1
function applyCouponAPICall(couponCode) {

    // console.log("Data Sent to Server:", dataarray);
    var url = "{{ENV('APP_URL')}}applyCouponCall";
    $("#ajaxLoader").show();
    $.ajax({
        url: url,
        method: "POST",
        data: {
            couponCode: couponCode,
            orderType: "quick",
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function(result) {

            $("#ajaxLoader").hide();
            if (result.success == "1") {
                // console.log("G1:---", result.success);
                document.getElementById("couponView").style.display = "none";
                document.getElementById("couponApplied").style.display = "flex";
                document.getElementById("removeCoupon").style.display = "block";
                document.getElementById("couponCode").innerText = result.action['data']['coupon_code'];
                document.getElementById("couponPrice").innerText = result.action['data']['save_amount'] +
                    " AED";
                document.getElementById("couponDiscount").innerText = (result.action['data']['save_amount'])
                    .toFixed(2);
                document.getElementById("couponID").innerText = result.action['data']['coupon_id'];
                document.getElementById("coupon_discount").value = (result.action['data']['save_amount']);
               wallettotalCalculationPayment();
               wallettotalCalculationPaymentCash(); 
               totalCalculationPayment();
               gtag('event', 'apply_couponW', {
                  coupon: result.action['data']['coupon_code'],
                  value: result.action['data']['save_amount'], 
                  currency: 'AED',
                  debug_mode: false 
                });
            } else {
               // console.log("G1:---", result.message);
                Swal.fire({
                title: result.message,
                icon: "warning",
                draggable: true
                }); 
            }
            // console.log("Response:", result);
            $('#couponModal').modal('hide');

            document.body.removeAttribute("style")
        },
        error: function(xhr) {
            // console.error("Error:", xhr.responseText);
            $("#ajaxLoader").hide();
            alert("An error occurred: " + xhr.responseText);
        },
    });

}

//Remove Coupon...G1
function removeCoupon() {
    document.getElementById("couponView").style.display = "block";
    document.getElementById("couponApplied").style.display = "none";
    document.getElementById("removeCoupon").style.display = "none";
    document.getElementById("couponCode").innertext = '';
    document.getElementById("couponPrice").innertext = '';
    document.getElementById("couponDiscount").innerText = "AED 0.00";
    document.getElementById("coupon_discount").value = 0;
    wallettotalCalculationPayment();
    wallettotalCalculationPaymentCash(); 
    totalCalculationPayment();
}


///////// ====================== Ranjit Calculation  =================================

let selectedRadio = null;

function toggleRadio(radio) {
if (selectedRadio === radio) {
radio.checked = false;
selectedRadio = null;
document.getElementById("deliveryTip").innerText = "AED 0.00";
document.getElementById("delivery_partner_tip").value = 0;
totalCalculationPayment(); // No tip selected, treat as 0
} else {
selectedRadio = radio;

document.getElementById("deliveryTip").innerText = "AED "+radio.value+".00";
document.getElementById("delivery_partner_tip").value = radio.value;
wallettotalCalculationPayment();
wallettotalCalculationPaymentCash(); 
totalCalculationPayment();
}
}

let walletD = Math.max(0, parseFloat("{{ max(0, (float)($showCartProductList['data']['referral_balance'] ?? 0)) }}") || 0)
let walletCash = Math.max(0, parseFloat("{{ max(0, (float)($showCartProductList['data']['wallet_balance'] ?? 0)) }}") || 0)

function wallettotalCalculationPayment() {
    const checkbox = document.getElementById('daily_wallet');
    // const walletBalance = parseFloat(document.getElementById('walletAmountD').innerText) || 0;
    const walletPercentageD = parseFloat(document.getElementById('walletPercentageD').value) || 0;
    
    var total_price = parseFloat(document.getElementById("total_price").value) || 0;
    var cod_extra_charges = parseFloat(document.getElementById("cod_extra_charges").value) || 0;
    var delivery_partner_tip = parseFloat(document.getElementById("delivery_partner_tip").value) || 0;
    var delivery_charges = parseFloat(document.getElementById("delivery_charges").value) || 0;
    var coupon_discount = parseFloat(document.getElementById("coupon_discount").value) || 0;
    
    var finalPrice = (total_price + cod_extra_charges + delivery_partner_tip + delivery_charges) - coupon_discount;
    var finalWalletAmount=0;
    if (checkbox.checked) {
    var walletAmount=(finalPrice*walletPercentageD)/100; 
    if(walletD >= walletAmount){
        finalWalletAmount=walletAmount;   
    }else
    {
        finalWalletAmount=walletD;     
    }
    // console.log("G1------>",walletD);
    // Show applied wallet UI
    document.getElementById('walletTextD').style.display = 'block';
    document.getElementById('selectedWalletAmountD').innerText = finalWalletAmount.toFixed(2);
    // Set hidden input to pass to backend if needed
    document.getElementById('wallet_use_amt').value = finalWalletAmount;
    } else {
    // Unchecked: hide and reset
    document.getElementById('walletTextD').style.display = 'none';
    document.getElementById('selectedWalletAmountD').innerText = '0.00';
    document.getElementById('wallet_use_amt').value = 0;
    }
    wallettotalCalculationPaymentCash();
    // Call the main total recalculation function
    totalCalculationPayment();
}
// Cash wallet functionality added...G1
function wallettotalCalculationPaymentCash() {
    const checkbox = document.getElementById('daily_wallet_cash');
    const walletPercentageD = parseFloat(document.getElementById('walletPercentageCash').value) || 0;
    
    var total_price = parseFloat(document.getElementById("total_price").value) || 0;
    var cod_extra_charges = parseFloat(document.getElementById("cod_extra_charges").value) || 0;
    var delivery_partner_tip = parseFloat(document.getElementById("delivery_partner_tip").value) || 0;
    var delivery_charges = parseFloat(document.getElementById("delivery_charges").value) || 0;
    var coupon_discount = parseFloat(document.getElementById("coupon_discount").value) || 0;
    var wallet_use_amt = parseFloat(document.getElementById("wallet_use_amt").value) || 0;

    
    var finalPrice = (total_price + cod_extra_charges + delivery_partner_tip + delivery_charges) - coupon_discount;
    var finalWalletAmount1=0;
    if (checkbox.checked) {
        
        // console.log("G1------>",walletCash);
        // console.log("G1---finalPrice--->",finalPrice);
        // console.log("G1----wallet_use_amt-->",wallet_use_amt);
        finalWalletAmount1 = finalPrice - wallet_use_amt;
        if (finalWalletAmount1 < 0) finalWalletAmount1 = 0.0;
    
        var finalWalletAmount=0;
        if (walletCash <= finalWalletAmount1) {
          finalWalletAmount = walletCash; // apply full cash wallet
        } else {
          finalWalletAmount = finalWalletAmount1; // apply only remaining amount
        }
        //  console.log("G1-----finalWalletAmount1-->",finalWalletAmount);
    
        // Show applied wallet UI
        document.getElementById('walletTextCash').style.display = 'block';
        document.getElementById('selectedWalletAmountCash').innerText = finalWalletAmount.toFixed(2);
        document.getElementById('wallet_use_amt_cash').value = finalWalletAmount;
    } else {
        // Unchecked: hide and reset
        document.getElementById('walletTextCash').style.display = 'none';
        document.getElementById('selectedWalletAmountCash').innerText = '0.00';
        document.getElementById('wallet_use_amt_cash').value = 0;
    }
    // Call the main total recalculation function
    totalCalculationPayment();
}

function toggleCODCharges(value) {
  const codChargesInput = document.getElementById('cod_extra_charges');
  const codCharges = parseFloat(document.getElementById('cod_charges').value) || 0;
//   var totalPrice = parseFloat(document.getElementById("toPay").value) || 0;
  let totalText = document.getElementById("toPay").innerText || "0";
  let totalPrice = parseFloat(totalText.replace(/[^0-9.-]+/g,"")) || 0;

  console.log("value:", value, "totalPrice:", totalPrice);

  if (value && value.toUpperCase().trim() === 'COD' && totalPrice > 0) {
    document.getElementById("codCharges").innerText = "AED " + codCharges.toFixed(2);
    codChargesInput.value = codCharges;
  } else {
    document.getElementById("codCharges").innerText = "AED 0.00";
    codChargesInput.value = 0;
  }
// G1 add code for hide and unhide option...
  const codDiv = document.getElementById('COD');
    const payNowDiv = document.getElementById('Pay Now');

    if (value === 'COD') {
        codDiv.style.display = 'block';
        payNowDiv.style.display = 'none';
    } else if (value === 'Pay Now') {
        codDiv.style.display = 'none';
        payNowDiv.style.display = 'block';
    }


// Recalculate final total
wallettotalCalculationPayment();
wallettotalCalculationPaymentCash(); 
totalCalculationPayment();
}

function totalCalculationPayment() {
     console.log("G1---totalPrice---> called",);
    // Parse float values from input fields
    var total_price = parseFloat(document.getElementById("total_price").value) || 0;
    var cod_extra_charges = parseFloat(document.getElementById("cod_extra_charges").value) || 0;
    var delivery_partner_tip = parseFloat(document.getElementById("delivery_partner_tip").value) || 0;
    var delivery_charges = parseFloat(document.getElementById("delivery_charges").value) || 0;
    var coupon_discount = parseFloat(document.getElementById("coupon_discount").value) || 0;
    var wallet_use_amt = parseFloat(document.getElementById("wallet_use_amt").value) || 0;
    var wallet_use_amt_cash = parseFloat(document.getElementById("wallet_use_amt_cash").value) || 0;

    // Correct calculation
    var finalPrice = 
        (total_price + cod_extra_charges + delivery_partner_tip + delivery_charges) 
        - (coupon_discount + wallet_use_amt + wallet_use_amt_cash);
        
    var finalFirstPrice = 
        (total_price + cod_extra_charges + delivery_partner_tip + delivery_charges) 
        - (coupon_discount);
    // Round to 2 decimal places
    finalPrice = finalPrice.toFixed(2);
    finalFirstPrice = finalFirstPrice.toFixed(2);
    // Display final price
    document.getElementById("toPay").innerText = "AED " + finalPrice;
    document.getElementById("final_price").value = finalPrice;
    document.getElementById("totalValue").innerText = "AED " + finalFirstPrice;
    document.getElementById("totalAmtDaily").innerText = "AED " + finalPrice;
}


//==================================== END CODE ===========================================


let showCartData = @json($showCartProductList['data'] ?? []);
// < !--checkout subcart api call...G1-- >
function checkOutDailyCartApiCall(type) {
    let selectedMethod = "";
    let addressID = '';
    const addressInput = document.getElementById('addressId');
    // var totalPrice = parseFloat(document.getElementById("toPay").value) || 0;
    let totalText = document.getElementById("toPay").innerText || "0";
    let totalPrice = parseFloat(totalText.replace(/[^0-9.-]+/g,"")) || 0;

    // console.log("G1---totalPrice---> ", totalPrice);
    if (totalPrice <= 0 && type != "payNow") {
        Swal.fire({
            title: "Your wallet balance is sufficient to cover the entire order amount, so other payment options are not available",
            icon: "warning"
        });
        return;
    }
    
    
    if (addressInput.value !== 'undefined' && addressInput.value !== null && addressInput.value.trim() !== '') {
      const addressID = addressInput.value;
      console.log('AddressID:', addressID);
    } else {
     return Swal.fire({
        title: "Please select a delivery address.",
        icon: "warning"
      });
    }
    let siNO = '';
    const selectedPayment = document.querySelector("input[name='toggle']:checked");
    if (selectedPayment) {
        selectedMethod = selectedPayment.value;
        console.log("Selected Method:", selectedMethod);
    }
    if (type === "payNow" && selectedMethod === "Pay Now") {
        const siNOS = document.getElementById("siNo");
        if (siNOS && siNOS.value !== 'undefined' && siNOS.value !== null && siNOS.value.trim() !== '') {
            siNO = siNOS.value;
            console.log("SI Number:", siNO);
        } else {
             return Swal.fire({
                title: "{{ENV('SELECTCARD')}}",
                icon: "warning"
            });
        }
    }
    // Sync time slot to fixed morning window before checkout (anything else is corrected server-side).
        let needsFixedSlotSync = false;
        for (let i = 0; i < showCartData['data'].length; i++) {
            const product = showCartData['data'][i];
            if (!product.selectedTime || product.selectedTime !== DAILY_CART_FIXED_TIME_SLOT) {
                needsFixedSlotSync = true;
                saveSelectedDateTimeApiCall('add', type);
                break;
            }
        }
        if (!needsFixedSlotSync) {
            if (type === "payNow") {
                checkOutDailyCartApiCallWithData();
            } else {
                checkOutDailyCartPaymentApiCall(type);
            }
        }
}

// < !--checkout daily quickpay api call...G1-- >
function checkOutDailyCartApiCallWithData() {
    console.log("G1----> ", checkOutDailyCartApiCallWithData);
    // console.log("Added to cart: ", varientId);
    var selectedPartnerInstruction = '',
        selectedMethod = "";
       
    const addressID = document.getElementById("addressId").value;
    // const siNO = document.getElementById("siNo").value;
     var siNO = "";
    const siNOs = document.getElementById("siNo");
    if (siNOs) {
        console.log(siNOs.value); // Safe to access .value
        siNO = siNOs.value;
    } else {
        console.warn("Element with id 'siNo' not found.");
    }

    let selectedPayment = document.querySelector("input[name='toggle']:checked");
    if (selectedPayment) {
        selectedMethod = selectedPayment.value;
    }
    // let selectedInstruction1 = document.querySelector('input[name="instruction"]:checked');
    // if (selectedInstruction1) {
    //      selectedPartnerInstruction = selectedInstruction1.value;
    // } else {
    //     console.log("No instruction selected");
    // }
    let selectedInstructions = document.querySelectorAll('input[name="instruction[]"]:checked');
    let values = [];
    selectedInstructions.forEach(item => {
        values.push(item.value);
    });
    selectedPartnerInstruction = values.join(", ");
    
    const walletCheckbox = document.getElementById("daily_wallet");
    const cashWalletCheckbox = document.getElementById("daily_wallet_cash");
    let isWalletSlected = "no";
    if (walletCheckbox.checked) {
        isWalletSlected = "yes";
    }
    if (cashWalletCheckbox.checked){
        isWalletSlected = "yes";
    }
    let selectedWalletAmount = parseFloat(document.getElementById("selectedWalletAmountD").innerText);
    let selectedWalletCashAmount = parseFloat(document.getElementById("selectedWalletAmountCash").innerText);
    let disccountAmount = document.getElementById("couponDiscount").innerText;
    let couponCode = document.getElementById("couponCode").innerText;
    let couponId = document.getElementById("couponID").innerText;
    let selectedTip = document.querySelector('input[name="tip"]:checked');
    var selectedPartnerTip = 0;
    if (selectedTip) {
        // console.log("Selected Tip:", selectedTip.value);
        selectedPartnerTip = parseFloat(selectedTip.value);
    }
    let orderInstruction = document.getElementById("orderInstruction").value;
    console.log("Selected orderInstruction:", orderInstruction);

    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}checkoutdailyorder";
    $("#ajaxLoader").show();
    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            screenName: "ShowDailyCart",
            addressID: addressID,
            siNo: siNO,
            paymentMethod: selectedMethod,
            selectedPartnerInstruction: selectedPartnerInstruction,
            walletStatus: isWalletSlected,
            disccountAmount: disccountAmount,
            totalwalletamt: selectedWalletAmount,
            totalcashwalletamt: selectedWalletCashAmount,
            couponId: couponId,
            couponCode: couponCode,
            tip: selectedPartnerTip,
            orderInstruction: orderInstruction,
            _token: _token,
        },
        success: function(result) {
            $("#ajaxLoader").hide();
            if (result.success === '1') {
                let fullText = document.getElementById("totalAmtDaily").innerText;  
                let amount = parseFloat(fullText.replace("AED", "").trim());    
                fbq('track', 'Purchase', {
                    value: parseFloat(amount),
                    currency: 'AED'
                });
                 const cartData = showCartData.data;
                let items = [];

                cartData.forEach(category => {
                if (category.products && category.products.length > 0) {
                    category.products.forEach(product => {
                    items.push({
                        item_id: product.varient_id.toString(),
                        item_name: product.product_name,
                        quantity: parseInt(product.cart_qty),
                        price: parseFloat(product.mrp)  // or use product.price if discounted
                    });
                    });
                }
                });
                console.log("G1----->",items);
                
                gtag('event', 'begin_checkoutDailyW', {
                    currency: 'AED', 
                    value: amount, 
                    items: items,
                    method: 'cart_checkout_button',
                    page_location: window.location.href,
                    debug_mode: false // true for DebugView testing
                    });
               navigateToNextPage(href = "{{ENV('APP_URL')}}order-complete?screen=daily");
            } else {
                Swal.fire({
                    icon: "sucess",
                    title: result.message,
                    showCancelButton: false,
                    confirmButtonText: "Ok",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                });
            }
        },
        error: function(xhr, status, error) {
            $("#ajaxLoader").hide();
            alert("An error occurred: j" + xhr.responseText);
        },
    });

}


function checkOutDailyCartPaymentApiCall(btnType) {
    console.log("G1----> ", checkOutDailyCartPaymentApiCall);
    var selectedPartnerInstruction = '',
        selectedMethod = "";
    const addressID = document.getElementById("addressId").value;
    let selectedPayment = document.querySelector("input[name='toggle']:checked");
    if (selectedPayment) {
        selectedMethod = selectedPayment.value;
    }
    //   let selectedInstruction1 = document.querySelector('input[name="instruction"]:checked');
    // if (selectedInstruction1) {
    //      selectedPartnerInstruction = selectedInstruction1.value;
    // } else {
    //     console.log("No instruction selected");
    // }
    let selectedInstructions = document.querySelectorAll('input[name="instruction[]"]:checked');
    let values = [];
    selectedInstructions.forEach(item => {
        values.push(item.value);
    });
    selectedPartnerInstruction = values.join(", ");
    
    const walletCheckbox = document.getElementById("daily_wallet");
    const cashWalletCheckbox = document.getElementById("daily_wallet_cash");
    let isWalletSlected = "no";
    if (walletCheckbox.checked) {
        isWalletSlected = "yes";
    }
    if (cashWalletCheckbox.checked){
        isWalletSlected = "yes";
    }
    let selectedWalletCashAmount = parseFloat(document.getElementById("selectedWalletAmountCash").innerText);
    let selectedWalletAmount = parseFloat(document.getElementById("selectedWalletAmountD").innerText);
    let disccountAmount = document.getElementById("couponDiscount").innerText;
    let couponCode = document.getElementById("couponCode").innerText;
    let couponId = document.getElementById("couponID").innerText;
    let selectedTip = document.querySelector('input[name="tip"]:checked');
    var selectedPartnerTip = 0;
    if (selectedTip) {
        // console.log("Selected Tip:", selectedTip.value);
        selectedPartnerTip = parseFloat(selectedTip.value);
    }
    let orderInstruction = document.getElementById("orderInstruction").value;
    // console.log("Selected orderInstruction:", orderInstruction);
    $("#ajaxLoader").show();
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}checkoutpaymentdailyorder";
    console.log(`selectedWalletAmount: }2`);
    let pType = '';
    if (btnType == "quickPay") {
        pType = 'card'
    } else {
        pType = 'applepay'
    }
    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            screenName: "ShowDailyCart",
            addressID: addressID,
            paymentMethod: pType,
            selectedPartnerInstruction: selectedPartnerInstruction,
            walletStatus: isWalletSlected,
            couponID: couponId,
            couponCode: couponCode,
            disccountAmount: disccountAmount,
            totalwalletamt: selectedWalletAmount,
            totalcashwalletamt: selectedWalletCashAmount,
            tip: selectedPartnerTip,
            orderInstruction: orderInstruction,
            _token: _token

        },
        success: function(result) {
            $("#ajaxLoader").hide();
            if (result.success === '1') {
                 let fullText = document.getElementById("totalAmtDaily").innerText;  
                let amount = parseFloat(fullText.replace("AED", "").trim());    
                fbq('track', 'Purchase', {
                    value: parseFloat(amount),
                    currency: 'AED'
                });
                const cartData = showCartData.data;
                let items = [];

                cartData.forEach(category => {
                if (category.products && category.products.length > 0) {
                    category.products.forEach(product => {
                    items.push({
                        item_id: product.varient_id.toString(),
                        item_name: product.product_name,
                        quantity: parseInt(product.cart_qty),
                        price: parseFloat(product.mrp) 
                    });
                    });
                }
                });

                gtag('event', 'begin_checkoutDailyW', {
                    currency: 'AED', 
                    value: amount, 
                    items: items,
                    method: 'cart_checkout_button',
                    page_location: window.location.href,
                    debug_mode: false // true for DebugView testing
                    });
                navigateToNextPage(href = result.action);

            } else {
                Swal.fire({
                    icon: "sucess",
                    title: result.message,
                    showCancelButton: false,
                    confirmButtonText: "Ok",
                }).then((result) => {
                    if (result.isConfirmed) {

                    }
                });
            }
        },
        error: function(xhr, status, error) {
            $("#ajaxLoader").hide();
            alert("An error occurred: " + xhr.responseText);
        },
    });
}

document.addEventListener("DOMContentLoaded", function() {
    var myModal = document.getElementById("couponModal");

    myModal.addEventListener("show.bs.modal", function() {
        document.body.style.overflow = "hidden";
        document.body.style.paddingRight = "0px";
    });

    myModal.addEventListener("hidden.bs.modal", function() {
        document.body.style.overflow = "";
    });

    var addressModal = document.getElementById("addressModal");

    addressModal.addEventListener("show.bs.modal", function() {
        document.body.style.overflow = "hidden";
        document.body.style.paddingRight = "0px";
    });

    var addedFrom = "{{\Request::get('addedFrom')}}";
    addressModal.addEventListener("hidden.bs.modal", function() {
        document.body.style.overflow = "";
        if(addedFrom == 'cart'){
            window.location.href="{{url('cart?tab='.\Request::get('tab'))}}"
        }
    });
    
    
    if(addedFrom == 'cart'){
        $('#addressModal').modal('show');
        $('.btn_addresslist').trigger('click');
    }
    
   
   
    //  Changes by G1... set first valuein address..
    let nTitle = @json($title);
    //  console.log("G1------>title",nTitle);

     if (nTitle === 'daily') {
        let showCartProductList = @json($showCartProductList);
       if (showCartProductList.data.lastadd && showCartProductList.data.lastadd.length > 0) {
            const address = showCartProductList.data.lastadd[0];
            var selected_address1 = {};
            selected_address1.house_no = address.house_no;
            selected_address1.address_id = address.address_id;
            selected_address1.type = address.type;

            localStorage.setItem("selectedAddress", JSON.stringify(selected_address1));
        } else {
              localStorage.removeItem("selectedAddress");
            console.log("No last address found.");
        }
    }else {
         let subCartProductList = @json($subCartProductList);
        if (subCartProductList.data.lastadd && subCartProductList.data.lastadd.length > 0) {
            const address = subCartProductList.data.lastadd[0];
           
            var selected_address1;
            selected_address1.house_no = address.house_no
            selected_address1.address_id = address.address_id
            selected_address1.type = address.type
            localStorage.setItem("selectedAddress", JSON.stringify(selected_address1));
        } else {
              localStorage.removeItem("selectedAddress");
            console.log("No last address found.");
        }
    }
      
        var selected_address =JSON.parse(localStorage.getItem("selectedAddress")) || "";
        console.log("G1----11-->selected_address",selected_address);
        saveSelectedAddress(selected_address);
         if(!selected_address){
        $('.change_addressbox').addClass('d-none');
        $('.btn_addresslist span').html('Add Address');
        }else{
            $('.change_addressbox').removeClass('d-none');
            $('.btn_addresslist span').html('Change');
        }

         const checked = document.querySelector('input[name="toggle"]:checked');
         if (checked) toggleCODCharges(checked.value);
        
});
</script>

<!-- jQuery (if needed) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@include('footer')


<!-- COPY COUPON CODE SCRIPT START -->
<script>
function copyText(element) {
    const text = element.innerText.trim();
    navigator.clipboard.writeText(text).then(() => {
        alert(`Copied: ${text}`);
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}
</script>
<!-- COPY COUPON CODE SCRIPT END -->


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
                  url: "{{ route('update-address') }}", // Change this to your actual URL
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
    var url = "{{ ENV('APP_URL') }}deleteAddressAPICall";
    
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


<!-- subscription model popup start -->


<div class="modal fade login-modal-main" id="subscribe">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            <div class="modal-body">
                <div class="subscription_selectDetails_box">
                    <div class="repeatDays_box">
                        <div class="order-subheading d-flex justify-content-between align-items-center">
                            <div class="headingBox">
                                <img src="{{asset('assets/images/calender.png')}}" alt="" class="img-fluid"
                                    style="max-width:25px">
                                Repeat Days
                            </div>
                        </div>
                        <ul class="day_count">
                            <li>
                                <label>
                                    <input type="checkbox" name="day[]" value="Sun" id="day_sunday"
                                        onclick="handleOnCLickAction(event)">
                                    <div class="day-box">S</div>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="day[]" value="Mon" id="day_monday"
                                        onclick="handleOnCLickAction(event)">
                                    <div class="day-box">M</div>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="day[]" value="Tue" id="day_tuesday"
                                        onclick="handleOnCLickAction(event)">
                                    <div class="day-box">T</div>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="day[]" value="Wed" id="day_wednesday"
                                        onclick="handleOnCLickAction(event)">
                                    <div class="day-box">W</div>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="day[]" value="Thu" id="day_thursday"
                                        onclick="handleOnCLickAction(event)">
                                    <div class="day-box">T</div>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="day[]" value="Fri" id="day_friday"
                                        onclick="handleOnCLickAction(event)">
                                    <div class="day-box">F</div>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="day[]" value="Sat" id="day_saturday"
                                        onclick="handleOnCLickAction(event)">
                                    <div class="day-box">S</div>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="subscription_duration" id="weekModel">
                        <div class="order-subheading d-flex">
                            <img src="{{asset('assets/images/Certificate.png')}}" alt="" class="img-fluid"
                                style="max-width:25px">
                            <div class="head">
                                <div class="heading">Subscription Duration</div>
                                <div class="subheading">Select week duration for
                                    subscription</div>
                            </div>
                        </div>
                        <div class="week-list" id="weekListC"></div>
                    </div>
                    <div class="subscription_duration d-flex justify-content-between align-items-center">
                        <div class="order-subheading d-flex">
                            <img src="{{asset('assets/images/calender-black.png')}}" alt="" class="img-fluid"
                                style="max-width:25px">
                            <div class="head">
                                <div class="heading">Start Date of Delivery
                                </div>
                                <div class="subheading pb-0">Select date for
                                    duration</div>
                            </div>
                        </div>
                        <div class="dateBox">
                            <input type="date" name="select-date" id="select-date" value=""
                                onchange="handleDateChange(event)" onclick="handleDateClick()">
                        </div>
                    </div>
                    <div class="fdate" id="checkDDate"> </div>

                    <div class="subscription_duration" id="timeModel">
                        <div class="order-subheading d-flex">
                            <img src="{{asset('assets/images/Clock.png')}}" alt="" class="img-fluid"
                                style="max-width:25px">
                            <div class="head">
                                <div class="heading">Select Time of Delivery
                                </div>
                            </div>
                        </div>
                        <div class="time-list" id="timeSlot"> </div>
                    </div>
                    <div class="subscription_duration pt-2 pb-4">
                        <label>
                            <input type="checkbox" id="isAutorenew" name="subscribe" value="yes">
                            Auto Renew Order
                        </label>
                    </div>
                    <div class="button_wrap justify-content-center">
                        <button type="button" class="order_cancel_btn" data-bs-dismiss="modal"
                            aria-label="Close" onclick='closeModalClass()'>Cancel</button>
                        <div class="order_confirm_btn" onclick="AddToSubCartCall(this)">Confirm</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>