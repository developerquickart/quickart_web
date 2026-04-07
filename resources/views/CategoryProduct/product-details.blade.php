<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
 
@include('header')
<section class="shop-single section-padding pt-3">
    <div class="container">
        @if(isset($getProductDetail['detail']))
        <div class="product_details_mainBox">
            <div class="product_details_image">
                <div class="shop-detail-left">
                    <div class="shop-detail-slider">
                        <div class="product_header">
                            <div class="product_top_left">
                                @if($getProductDetail['detail']['discountper'] > 0)
                                <div class="discount_text" id="txtDiscount">
                                    {{number_format($getProductDetail['detail']['varients'][0]['discountper'], 0)}} %<span>Off</span>
                                </div>
                                @endif
                                @if($getProductDetail['detail']['country_icon'] != null ||
                                $getProductDetail['detail']['country_icon'] != "")
                                <div class="country_flag">
                                    <img src="{{$getProductDetail['detail']['country_icon']}}" alt="flag">
                                </div>
                                @endif
                            </div>
                            <div class="product_top_right">
                               <div class="product_wishlist">
                                   <a href="javascript:void(0);" class="wishlist-btn"
                                        data-varient-id="{{ $getProductDetail['detail']['varients'][0]['varient_id'] }}">
                                        <img
                                          id="wishlist-{{ $getProductDetail['detail']['varients'][0]['varient_id'] }}"
                                          src="{{ asset( $getProductDetail['detail']['varients'][0]['isFavourite'] ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                          alt="wishlist"
                                          style="max-width: 25px;"
                                          class="wishlist-icon varient-icon">
                                    </a>
                                </div>
                                <div class="share-container">
                                    <div class="share-btn">
                                        <svg height="25" viewBox="0 0 64 64" width="25"
                                            xmlns="http://www.w3.org/2000/svg" id="fi_3466003">
                                            <g id="Layer_10" data-name="Layer 10">
                                                <path
                                                    d="m52 42a10 10 0 0 0 -7.86 3.83l-22.49-11.24a9.89 9.89 0 0 0 0-5.18l22.49-11.24c5.76 7.39 17.86 3.32 17.86-6.17a10 10 0 1 0 -19.65 2.59l-22.49 11.24c-5.76-7.39-17.86-3.32-17.86 6.17s12.1 13.56 17.86 6.17l22.49 11.24a10 10 0 0 0 9.65 12.59c13.27-.55 13.26-19.45 0-20z">
                                                </path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="share-options">
                                        <a class="share-facebook" target="_blank">
                                            <img src="{{asset('assets/images/facebook-fill.svg')}}" alt="Facebook">
                                        </a>
                                        <a class="share-twitter" target="_blank">
                                            <img src="{{asset('assets/images/twitter-fill.svg')}}" alt="Twitter">
                                        </a>
                                        <a class="share-linkedin" target="_blank">
                                            <img src="{{asset('assets/images/linkedin-fill.svg')}}" alt="Linkedin">
                                        </a>
                                        <a class="share-instagram" target="_blank">
                                            <img src="{{asset('assets/images/instagram-fill.svg')}}" alt="Instagram">
                                        </a>
                                        <a class="share-whatsapp" target="_blank">
                                            <img src="{{asset('assets/images/whatsapp-fill.svg')}}" alt="Whatsapp">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main_sliderBox">
                            <div id="sync1" class="owl-carousel">
                                @foreach($getProductDetail['detail']['images'] as $image)
                                <div class="item">
                                    <div class="fancy-image-wrap">
                                        <a href="{{$image['image']}}" data-fancybox="gallery">
                                            <img alt="" src="{{$image['image']}}" class="img-fluid img-center">
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @if(isset($getProductDetail['detail']['feature_tags']) &&
                            count($getProductDetail['detail']['feature_tags']) > 0)
                            <div class="product_featured_cat_icon_list">
                                <div class="product_featured_cat_icon">
                                    @foreach($getProductDetail['detail']['feature_tags'] as $tags)
                                    <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="navigation_slider">
                            <div id="sync2" class="owl-carousel">
                                @foreach($getProductDetail['detail']['images'] as $image)
                                <div class="item">
                                    <img alt="" src="{{$image['image']}}" class="img-fluid img-center">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_details_description">
                <div class="shop-detail-right">
                    <div class="productDetail_name">{{$getProductDetail['detail']['product_name']}}</div>
                     <input type="hidden" name="product_name"
                                    id="txt_product_name" value="{{$getProductDetail['detail']['product_name']}}" />
                    <div class="product_proce_rate">
                        <div class="product_heading">Select Unit</div> 
                        @if ($getProductDetail['detail']['avgrating'] != 0)
                        <a
                            href="{{ url(ENV('APP_URL') . 'rating-list?varient_id=' . $getProductDetail['detail']['varient_id'] . '&product_name=' . $getProductDetail['detail']['product_name']) }}">
                            <div class="ratingBox">
                                <div class="rating_count">
                                    {{ number_format($getProductDetail['detail']['avgrating'], 1) }}</div>
                                <div class="rate" style="direction: rtl; unicode-bidi: bidi-override;">
                                    @php
                                        $rating = number_format($getProductDetail['detail']['avgrating'], 1); // example rating
                                        $fullStars = floor($rating); // 3
                                        $halfStar = ($rating - $fullStars) >= 0.5 ? true : false;
                                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                    @endphp
                                        
                                    {{-- Full Stars --}}
                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <span title="{{ $i }} star" class="filled" style="color: #FEDE33; font-size: 24px;">★</span>
                                    @endfor
                                    
                                    {{-- Half Star --}}
                                    @if ($halfStar)
                                        <span title="{{ $i }} star" class="half" style="color: #FEDE33; font-size: 24px;">★</span>
                                    @endif
                                    
                                    {{-- Empty Stars --}}
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <span title="{{ $i }} star" style="color: #ccc; font-size: 24px;">★</span>
                                    @endfor        
                                </div>
                                <div class="rating_count">{{ $getProductDetail['detail']['countrating'] }}</div>
                            </div>
                        </a>
                        @endif
                    </div>
                    @if ($getProductDetail['detail']['varients'][0]['stock'] > 0)
                   <div class="varient_unit_listing">
                      @foreach($getProductDetail['detail']['varients'] as $index => $varient)
                        <div 
                          class="varient_unit {{ $index == 0 ? 'active' : '' }}" 
                              onclick='selectedVarientUnit(@json($getProductDetail["detail"]), {{ $varient["varient_id"] }}, this)' >
                          <div class="productDetail_weight">
                            <span>{{ $varient['quantity'] }} {{ $varient['unit'] }}</span>
                          </div>
                          <div class="product_proce_rate">
                            <p class="offer-price">
                              AED <span class="value">{{ number_format($varient['price'], 2) }}</span>
                              @if ($varient['price'] != $varient['mrp'])
                                <span class="regular-price">
                                  AED <span>{{ number_format($varient['mrp'], 2) }}</span>
                                </span>
                              @endif
                            </p>
                          </div>
                        </div>
                      @endforeach
                    </div>
                   
                    <div class="buttonBox" style="display:flex;">
                        @if ($getProductDetail['detail']['availability'] == "all" ||
                            $getProductDetail['detail']['availability'] == "quick")
                          <div class="cart_btnBox">
                            @if ($getProductDetail['detail']['total_cart_qty'] == 0)
                              @if ($getProductDetail['detail']['is_offer_product'] == false)
                                <div class="cart_btn add_cart_btn change-qty" data-productDetail='@json($getProductDetail['detail'])'
                                     data-screen-name='product_detail'
                                     data-varient-id="{{ $getProductDetail['detail']['varient_id'] }}"
                                     data-product-id="{{ $getProductDetail['detail']['product_id'] }}">
                                  ADD TO CART
                                </div>
                              @endif    
                            @else
                              <div class="detail-qtyBox">
                                <div class="cart_btn"
                                     onclick="navigateToNextPage('{{ env('APP_URL') }}cart?tab=1', '1')">
                                  GO TO CART
                                </div>
                              </div>
                            @endif
                          </div>
                        @endif
                      </div>
                    
                      {{-- Out of stock block (hidden initially) --}}
                    <div class="productDetail_unavailable" style="display:none;">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 10px;">
                        <div class="stock_text">
                          <div class="product_unavailable_title"style="color: #ffffff;">Currently unavailable</div>
                          <p style="color: #f8f4f4;">Click on the bell to get notified</p>
                        </div>
                        <div class="stock_img">
                          <a href="javascript:void(0);" class="notify-me"
                             data-varient-id="{{ $getProductDetail['detail']['varient_id'] }}"
                             data-product-id="{{ $getProductDetail['detail']['product_id'] }}">
                            <img id="notify-icon"
                                 class="notify-icon"
                                 src="{{ asset('assets/images/bell.png') }}"
                                 alt="notify" style="max-width: 25px; filter: contrast(150%) brightness(90%) drop-shadow(0 0 1px black);">
                          </a>
                        </div>
                        </div>
                    </div>
                    @else
                    <div class="productDetail_unavailable" style="display:flex;">
                        <div class="stock_text">
                            <div class="product_unavailable_title" style="color: #ffffff;">Currently unavailable</div>
                            <p style="color: #f8f4f4;">Click on the bell to get notified</p>
                        </div>
                        <div class="stock_img" >
                            @if($getProductDetail['detail']['notifyMe'] == 'false')
                            <a href="javascript:void(0);" class="notify-me"
                                data-varient-id="{{ $getProductDetail['detail']['varient_id'] }}"
                                data-product-id="{{ $getProductDetail['detail']['product_id'] }}">
                                <img class="notify-icon" src="{{ asset('assets/images/bell.png') }}"
                                    alt="wishlist" style="max-width: 25px; filter: contrast(150%) brightness(90%) drop-shadow(0 0 1px black);">
                            </a>
                            @else
                            <a href="{{ENV('APP_URL')}}notify">
                                <img id="notifyMe-{{ $getProductDetail['detail']['varient_id'] }}"
                                    src="{{ asset('assets/images/notification-fill.png') }}" alt="wishlist"
                                    style="max-width: 25px;">
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="modal fade login-modal-main" id="subscribe">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close" onclick='closeModalClass()'></button>
                                    <div class="repeatDays_box">
                                        <div class="order-subheading d-flex justify-content-between">
                                            <div class="headingBox">
                                                <img src="{{asset('assets/images/calender.png')}}" alt="Calender"
                                                    class="img-fluid" style="max-width:30px"> Repeat Days
                                            </div>
                                        </div>
                                        <ul class="day_count">
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day" value="Sun" id="day_sunday">
                                                    <div class="day-box">S</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day" value="Mon" id="day_monday">
                                                    <div class="day-box">M</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day" value="Tue" id="day_tuesday">
                                                    <div class="day-box">T</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day" value="Wed" id="day_wednesday">
                                                    <div class="day-box">W</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day" value="Thu" id="day_thursday">
                                                    <div class="day-box">T</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day" value="Fri" id="day_friday">
                                                    <div class="day-box">F</div>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="day" value="Sat" id="day_saturday">
                                                    <div class="day-box">S</div>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="subscription_duration" id="weekModel">
                                        <div class="order-subheading d-flex">
                                            <img src="{{asset('assets/images/Certificate.png')}}" alt=""
                                                class="img-fluid" style="max-width:30px">
                                            <div class="head">
                                                <div class="heading">Subscription Duration</div>
                                                <div class="subheading">Select week duration for subscription</div>
                                            </div>
                                        </div>
                                        <div class="week-list" id="weekList">
                                        </div>
                                    </div>
                                    <div
                                        class="subscription_duration d-flex justify-content-between align-items-center">
                                        <div class="order-subheading d-flex">
                                            <img src="{{asset('assets/images/calender-black.png')}}" alt=""
                                                class="img-fluid" style="max-width:30px">
                                            <div class="head">
                                                <div class="heading">Start Date of Delivery</div>
                                                <div class="subheading pb-0">Select date for duration</div>
                                            </div>
                                        </div>
                                        <div class="dateBox">
                                            <input type="date" name="select-date" id="select-date"
                                                onchange="handleDateChange(event)" onclick="handleDateClick()">
                                        </div>

                                    </div>
                                    <div class="fdate" id="checkDDate"></div>
                                    <div class="subscription_duration" id="timeModel">
                                        <div class="order-subheading d-flex">
                                            <img src="{{asset('assets/images/Clock.png')}}" alt="" class="img-fluid"
                                                style="max-width:30px">
                                            <div class="head">
                                                <div class="heading">Select Time of Delivery</div>
                                            </div>
                                        </div>
                                        <div class="time-list" id="timeSlot">
                                        </div>
                                    </div>
                                    <div class="subscription_duration pt-2 pb-4">
                                        <label>
                                            <input type="checkbox" id="isAutorenew" name="subscribe" value="yes">
                                            Auto Renew Order
                                        </label>
                                    </div>
                                    <div class="button_wrap">
                                        <button type="button" class="order_cancel_btn" data-bs-dismiss="modal"
                                            aria-label="Close" onclick='closeModalClass()'>Cancel</button>
                                        <div class="order_confirm_btn"
                                             onclick="AddToSubCartCall('<?= $getProductDetail['detail']['varient_id'] ?>', '<?= $getProductDetail['detail']['product_name'] ?>', '<?= $getProductDetail['detail']['price'] ?>')">
                                            Confirm
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_description">
                    <div class="product_heading">About Product</div>
                    <ul class="listingBox">
                        <li><span id="varientDes">Description: {{$getProductDetail['detail']['varients'][0]['description']}}</span>
                        </li>
                        @if ($getProductDetail['detail']['country_of_origin'] != "" ||
                        $getProductDetail['detail']['country_of_origin'] != null)
                        <li><span>Country of Origin: </span>{{$getProductDetail['detail']['country_of_origin']}}
                        </li>
                        @endif
                        @if ($getProductDetail['detail']['shelf_life'] != "" ||
                        $getProductDetail['detail']['shelf_life'] != null)
                        <li><span>Shelf Life: </span>{{$getProductDetail['detail']['shelf_life']}} </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
<!-- RELATED PRODUCT SECTION START -->
<section class="product-items-slider related_product section-padding mb-2">
    <div class="container">
        <div class="row">
            @if(isset($getProductDetail['similar_product']))
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Related Products</h5>
                </div>
                <div class="owl-carousel owl-carousel-featured">
                    @foreach($getProductDetail['similar_product'] as $productList)
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    @if($productList['discountper'] > 0)
                                    <div class="discount_text">
                                        {{number_format($productList['discountper'], 0)}}%<span>Off</span>
                                    </div>
                                    @endif
                                    @if($productList['country_icon'] != null || $productList['country_icon'] != "")
                                    <div class="country_flag">
                                        <img src="{{$productList['country_icon']}}" alt="flag">
                                    </div>
                                    @endif
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="{{ $productList['varient_id'] }}">
                                            <img id="wishlist-{{ $productList['varient_id'] }}"
                                                src="{{ asset($productList['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                alt="wishlist" style="max-width: 25px;" class="wishlist-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a class="product_link"
                                href="{{ url('product-details') }}/{{ Str::slug($productList['product_name']) }}/{{ trim($productList['product_id']) }}" 
                                >
                                <div class="product-img">
                                    <img class="img-fluid" src="{{$productList['product_image']}}" alt="product">
                                </div>
                                <div class="product_featured_cat_icon_list">
                                    <div class="product_featured_cat_icon">
                                        @foreach($productList['feature_tags'] as $tags)
                                        <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="product-body">
                                    <div class="product_name">{{$productList['product_name']}}</div>
                                   
                                    <div class="product_weight"><span>{{$productList['quantity']}}
                                            {{$productList['unit']}}</span></div>
                                </div>
                            </a>
                            
                            <div class="product-footer">
                                <div class="product_detail">
                                    <p class="offer-price ">AED
                                        <span class="value">{{number_format($productList['price'], 2)}}</span>
                                    </p>
                                    @if ($productList['price'] != $productList['mrp'])
                                    <p class="regular-price">AED
                                        <span>{{number_format($productList['mrp'], 2)}}</span>
                                    </p>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            @endif
        </div>
    </div>
</section>
<!-- RELATED PRODUCT SECTION END -->

<!-- Variant Modal Open... G1 -->
   <div tabindex="-1" data-testid="focus-trap-container" >
        <div role="dialog" aria-modal="true" class="product_options" style="--transition-duration: undefineds;">
            <div class="products_overlay" data-testid="modal-overlay" role="button" tabindex="0"
                aria-label="Close overlay"></div>
            <div class="product_options_mainBox">
                <div class="product_optionsBox">
                    <div class="_2dmsv _3paQJ" role="heading" aria-level="2">
                        <div aria-hidden="true" class="heading" id="varientTitle"></div>
                    </div>
                    <div class="packaging_optionsBox">
                        <div class="packaging_heading">Select Packaging Preference:</div>
                        <div class="packaging_options_listing">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="packaging-options"
                                    id="packaging-options-bottle">
                                <label class="form-check-label" for="packaging-options-bottle">
                                    
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="packaging-options"
                                    id="packaging-options-pouch">
                                <label class="form-check-label" for="packaging-options-pouch">
                                    
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="product_options_list" role="list" aria-label="Items list">
                        <div class="varients_container">
                            <div class="varient_product_img">
                                <img src="https://quickart.b-cdn.net//images/product/20-05-2022/Al-Ain-Low-Fat-Yoghurt-1-Kg.png"
                                    alt="categories" class="img-fluid">
                            </div>
                            <div class="varient_product_details">
                                <div class="product_weight"></div>
                                <div class="offer-price">AED <span>0.00</span><br>
                                    <span class="regular-price">AED <span>1.27</span></span>
                                </div>
                            </div>
                            <div class="varient_product_cartBox">
                                <div class="qtyBox" data-varient-id="244">
                                    <button class="qty-btn qty-btn-minus change-qty" type="button"
                                        data-varient-id="244" data-change="-1">-</button>
                                    <input type="text" name="qty" value="1" class="input-qty input-rounded"
                                        min="0">
                                    <input type="hidden" name="stock" id="stock" value="1">
                                    <button class="qty-btn qty-btn-plus change-qty" type="button"
                                        data-varient-id="244" data-change="1">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="option_total_button_wrapper">
                        <button class="option_item_totalButton">
                            <div class="options_item_totalBox">
                                <div class="option_item_total_text">Item total :</div>
                                <div class="option_item_total_amount">0</div>
                            </div>
                            <div class="sc-gEvEer bTPZog">Done</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!----Varient model Closed...G1----->
<script>

    function openVariantSelectionModal1(productDetail) {
        const { varients, features, product_name } = productDetail;

        $('#varientTitle').text(product_name);
        const overlay = document.querySelector('.products_overlay');
        const productOptions = document.querySelector('.product_options');
        const mainBox = document.querySelector('.product_options_mainBox');
        const listContainer = productOptions.querySelector('.product_options_list');
        const packagingOptionsBox = document.querySelector('.packaging_optionsBox');
        const packagingList = packagingOptionsBox.querySelector('.packaging_options_listing');
        const doneButton = document.querySelector('.bTPZog');
        const allTotal = document.querySelector('.option_item_total_amount');
        packagingOptionsBox.style.display = 'block';

        // Reset modal content
        listContainer.innerHTML = '';
        packagingList.innerHTML = '';

        overlay.dataset.features = JSON.stringify(features);
        overlay.dataset.varients = JSON.stringify(varients);

        productOptions.style.display = 'block';
        productOptions.classList.add('active');
        overlay.classList.add('active');
        mainBox.classList.add('active');

        var total = 0;
        varients.forEach((variant, index) => {
                total += (variant.price * variant.subcartQty);
                const feature = features[index] || {};
                const varientDiv = document.createElement('div');
                varientDiv.className = 'varients_container';
                varientDiv.innerHTML = `
                    <div class="varient_product_img">
                        <img src="${variant.product_image}" alt="${variant.product_name}" class="img-fluid">
                    </div>
                    <div class="varient_product_details">
                        <div class="product_weight">${variant.quantity} ${variant.unit}</div>
                        <div class="offer-price">AED <span>${variant.price}</span></div>
                    </div>
                    <div class="varient_product_cartBox">
                        ${variant.stock > 0 ? `
                            <div class="qtyBox" data-varient-id="${variant.variant_id}">
                                <button class="qty-btn varient-btn-minus1" type="button" data-varient-id="${variant.varient_id}" data-product-id="${productDetail.product_id}" data-change="1" data-name="${productDetail.product_name}" data-price="${productDetail.price}">-</button>
                                <input type="text" name="qty" value="${variant.subcartQty}" class="input-qty input-rounded" min="0">
                                <button class="qty-btn varient-btn-plus1" type="button" data-varient-id="${variant.varient_id}" data-product-id="${productDetail.product_id}" data-change="1" data-name="${productDetail.product_name}" data-price="${productDetail.price}">+</button>
                            </div>
                        ` : `
                            <div class="product_unavailable">
                                ${
                                    variant.notify_me == 'false'
                                    ? `
                                        <a href="javascript:void(0);" class="notify-me"
                                            data-notified="0"
                                            data-varient-id="${variant.varient_id}"
                                            data-product-id="${productDetail.product_id}" data-isvarient="varient">
                                            <img src="${ASSET_URL}/notification.webp"
                                                alt="Notification"
                                                style="max-width:25px;" id="notify-me-${variant.varient_id}">
                                        </a>
                                      `
                                    : `
                                        <a href="${APP_URL}notify" data-notified="1" class="notify-me">
                                            <img id="notifyMe-${variant.varient_id}"
                                                src="${ASSET_URL}/notification-fill.png"
                                                alt="wishlist"
                                                style="max-width:25px;">
                                        </a>
                                      `
                                }
                                <div class="product_unavailable_title1">Product Unavailable</div>
                                <div class="product_unavailable_subtitle1">Tab the bell to get notified</div>
                            </div>
                        `}
                    </div>
                `;
                listContainer.appendChild(varientDiv);
        });
        allTotal.textContent = `AED ${total.toFixed(2)}`;

        // Features (radio)
        if (features.length > 0) {
            let featureId = features[0].id;
            varients.forEach(v => {
                const id = parseInt(v.product_feature_id || 0);
                if (id > 0) {
                featureId = id; 
                }
            });
            
            packagingList.innerHTML = ''; // clear old options
            features.forEach((feature, i) => {
                const isChecked = parseInt(feature.id) === parseInt(featureId) ? 'checked' : '';

                const option = document.createElement('div');
                option.classList.add('form-check');
                option.innerHTML = `
                <input class="form-check-input" type="radio" name="packaging-options"
                    id="packaging-option-${i}" value="${feature.id}" ${isChecked}>
                <label class="form-check-label" for="packaging-option-${i}">
                    ${feature.feature_value}
                </label>
                `;
                packagingList.appendChild(option);
            });
        } else {
            packagingOptionsBox.style.display = 'none';
        }

         const v1 = varients
            .filter(v => v.subcartQty > 0)
            .map(v => v.varient_id);

        console.log("Cart qty > 0 varient IDs:", v1);
        const radios = packagingList.querySelectorAll('input[name="packaging-options"]');
        radios.forEach(radio => {
            radio.addEventListener('change', async function () {
                const selectedFeatureId = this.value;
                console.log("Selected Feature ID:", selectedFeatureId);

                // Call for API
                var _token = jQuery('meta[name="csrf-token"]').attr('content');
                var url = "{{ url('/update-subcart') }}";
                jQuery.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        varients: v1,
                        id: selectedFeatureId,
                        _token: _token
                    },
                    success: function(result) {
                        // alert("AJAX Response: " + JSON.stringify(result));
                        console.log(result);
                          console.log("G1-----");
                        if (result.success) {
                              console.log("G1-----1");
                         const $mainCard = jQuery(`.add_sub_cart_btn_varient`);

                            if ($mainCard.length) {
                                  console.log("G1-----2");
                                let productDetail = $mainCard.data('product');
                                if (productDetail) {
                                    if (typeof productDetail === "string") {
                                        productDetail = JSON.parse(productDetail);
                                    }    
                                    // productDetail.varients[0].product_feature_id = selectedFeatureId;
                                    productDetail.varients.forEach(variant => {
                                      variant.product_feature_id = selectedFeatureId;
                                    });
                                    // Save the updated JSON back to the element
                                    $mainCard.attr('data-product', JSON.stringify(productDetail));
                                    // Also update data on both +/- buttons inside this card
                                    $mainCard.find('.change-qty').each(function () {
                                        jQuery(this).attr('data-product', JSON.stringify(productDetail));
                                    });
                                    console.log('✅ Updated main productDetail JSON:', productDetail);
                                }
                            }
                        
                        } else {
                            alert(result.message); // Show error message
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", status, error);
                    // alert("An error occurred: " + error); // Show error alert
                    }
                });
                
            });
        });


        doneButton.addEventListener('click', function() {
            productOptions.classList.remove('active');
            overlay.classList.remove('active');
            mainBox.classList.remove('active');
            productOptions.style.display = 'none';
        });
        // Close when clicking outside (overlay)
        overlay.addEventListener('click', function() {
            productOptions.classList.remove('active');
            overlay.classList.remove('active');
            mainBox.classList.remove('active');
        });
    }
  
    jQuery(document).on('click', '.varient-btn-minus1', function() {    
        const $btn = jQuery(this);
        const $qtyInput = $btn.siblings('input[name="qty"]'); 
        const stock = parseInt($btn.siblings('input[name="stock"]').val()); 
        const change = parseInt($btn.data('change'));
        let currentQty = parseInt($qtyInput.val()) || 0;
        const pName = $btn.data('name');
        const pPrice = $btn.data('price');

        let newQty = currentQty - 1;

        // Ensure newQty is >= 0 and <= stock
        if (newQty < 0) newQty = 0;
        if (newQty > stock) newQty = stock;

        $qtyInput.val(newQty);
        
        const allTotalEl = document.querySelector('.option_item_total_amount');
        const price = parseFloat($btn.siblings('input[name="price"]').val()) || 0;
        let currentTotal = parseFloat(allTotalEl.textContent.replace('AED', '').trim()) || 0;
        let total = currentTotal - price;
        if (total < 0) total = 0;
        allTotalEl.textContent = `AED ${total.toFixed(2)}`;
        
        const varientId = $btn.data('varient-id');
        // console.log('Variant ID:', varientId, 'New Qty:', newQty);

        addToSubCartAPICall(varientId, newQty, pName, pPrice,"remove");

    });
    
    jQuery(document).on('click', '.varient-btn-plus1', function() {
        const $btn = jQuery(this);
        const $qtyInput = $btn.siblings('input[name="qty"]'); // find the qty input in same box
        const stock = parseInt($btn.siblings('input[name="stock"]').val()); // stock value
        const change = parseInt($btn.data('change')); // -1 or +1
        let currentQty = parseInt($qtyInput.val()) || 0;
        const pName = $btn.data('name');
        const pPrice = $btn.data('price');

        // Update quantity
        let newQty = currentQty + 1;
        // console.log("G1----newQty-->",newQty);
        // Ensure newQty is >= 0 and <= stock
        if (newQty < 0) newQty = 0;
        if (newQty > stock) newQty = stock;

        // Update the input
        $qtyInput.val(newQty);
        
        const allTotalEl = document.querySelector('.option_item_total_amount');
        const price = parseFloat($btn.siblings('input[name="price"]').val()) || 0;
        let currentTotal = parseFloat(allTotalEl.textContent.replace('AED', '').trim()) || 0;
        let total = currentTotal + price;
        if (total < 0) total = 0;
        allTotalEl.textContent = `AED ${total.toFixed(2)}`;

        // Optional: call addToCart or update cart
        const varientId = $btn.data('varient-id');

        addToSubCartAPICall(varientId, newQty, pName, pPrice, "add");
    });
    
    function addToSubCartAPICall(varientId, qty, pName, pPrice, addedRemove){
        const packagingList = document.querySelector('.packaging_options_listing');
        let selectedFeatureId = 0;
    
        if (packagingList) {
        const selectedRadio = packagingList.querySelector('input[name="packaging-options"]:checked');
        selectedFeatureId = selectedRadio ? selectedRadio.value : 0;
        }
        console.log("Selected Feature ID:", selectedFeatureId ?? 'null');

        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "{{ENV('APP_URL')}}addToSubCart";
         
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                screenName: "productDetail",
                qty: qty,
                varientID: varientId,
                repeatDays: "",
                timeSlot: null,
                selectedWeek: "1",
                deliveyDate: null,
                autorenew: "",
                selectedFeatureId:selectedFeatureId,
                _token: _token,
            },

            success: function(result) {
                if (result.success === '1') {
                    const $mainCard = jQuery(`.add_sub_cart_btn_varient`);
                    const allTotal = document.querySelector('.option_item_total_amount');

                    if ($mainCard.length) {
                        let productDetail = $mainCard.data('product');
                        if (productDetail) {
                            if (typeof productDetail === "string") {
                                productDetail = JSON.parse(productDetail);
                            }
                            const variant = productDetail.varients.find(v => parseInt(v.varient_id) === parseInt(varientId));
                            if (variant) {
                                console.log("G1----newQty-->",qty);
                                // Update cart qty based on action
                                 let currentTotal = parseFloat(allTotal.textContent.replace('AED', '').trim()) || 0;
                                 let total = 0;
                                if (addedRemove === 'remove') {
                                    variant.subcartQty = Math.max(variant.subcartQty - 1, 0);
                                    total = currentTotal - pPrice;
                                } else {
                                   
                                    variant.subcartQty = variant.subcartQty + 1;
                                     total = currentTotal + pPrice;
                                }
                                
                               
                                
                                if (total < 0) total = 0;
                                allTotal.textContent = `AED ${total.toFixed(2)}`;
                                // Update the correct variant inside the array
                                const updatedVarients = productDetail.varients.map(v =>
                                    parseInt(v.varient_id) === parseInt(varientId) ? variant : v
                                );
                                // Recalculate total_cart_qty from all variants
                                const totalQty = productDetail.varients.reduce((sum, v) => sum + (parseInt(v.subcartQty) || 0), 0);
                                productDetail.total_subcart_qty = totalQty;
                                 $mainCard.find('#totalCartQTY').val(totalQty);


                                productDetail.varients = updatedVarients;
                                // Save the updated JSON back to the element
                                $mainCard.attr('data-product', JSON.stringify(productDetail));
                                // Also update data on both +/- buttons inside this card
                                $mainCard.find('.change-qty').each(function () {
                                    jQuery(this).attr('data-productdetail', JSON.stringify(productDetail));
                                });

                                // console.log('✅ Updated main productDetail JSON:', productDetail);
                            }
                        }
                    }
                    gtag('event', 'add_to_subcartW', {
                                    currency: 'AED',
                                    value: pPrice, 
                                    items: [{
                                        item_id: varientId,
                                        item_name:  pName,
                                        quantity: 1,
                                        price: pPrice
                                    }],
                                    method: 'subcart_button_click',
                                    page_location: window.location.href,
                                    debug_mode: true // set true if testing in DebugView
                                    });
                    fbq('track', 'AddToCart', {
                                content_ids: varientId,
                                content_name: pName,
                                content_type: 'product subscription',
                                value: pPrice,
                                currency: 'AED'
                                });
                    // window.location.reload();
                }
            },
            error: function(xhr, status, error) {

                alert("An error occurred: " + xhr.responseText);
            },
        });
    }
    
</script>

<!--- Set varient data in selection...G1 -->
<script>
function selectedVarientUnit(productDetail, varientId, el) {
    
  document.querySelectorAll('.varient_unit').forEach(box => {
    box.classList.remove('active');
  });
  el.classList.add('active');

  const variants = productDetail.varients || [];
  const selectedVariant = variants.find(v => v.varient_id == varientId)

  const ASSET_URL = "{{ asset('assets/images') }}";
  const wishlistIcon = document.querySelector(".varient-icon");
  const notifyIcon = document.getElementById("notify-icon");
  const descEl = document.getElementById("varientDes");
  const discountEl = document.getElementById("txtDiscount");

  
//   console.log(`Updated for variant ID ${selectedVariant.varient_id} ----- ${selectedVariant.isFavourite}`);

  // Update wishlist icon
   if (wishlistIcon) {
      if (selectedVariant.isFavourite === "true") {
        wishlistIcon.src = `${ASSET_URL}/wishlisted.png`;
      } else {
        wishlistIcon.src = `${ASSET_URL}/wishlist.png`;
      }
    }

  // Update notify icon
  if (notifyIcon) {
         if (selectedVariant.notify_me === "true") {
              notifyIcon.src = `${ASSET_URL}/notification-fill.png`;
         } else {
              notifyIcon.src = `${ASSET_URL}/bell.png`;
         }
  }

  // pdate description
  if (descEl) {
    descEl.innerHTML = `Description: ${selectedVariant.description || ""}`;
  }
    // Check if element exists
    if (discountEl) {
      discountEl.innerHTML = `${selectedVariant.discountper}% <span>Off</span>`;
    }
  
  // Update stock/out of stock
  const stockSection = document.querySelector(".productDetail_unavailable");
  const buttonBox = document.querySelector(".buttonBox");
  if (selectedVariant.stock > 0) {
    if (stockSection) stockSection.style.display = "none";
    if (buttonBox) buttonBox.style.display = "flex";
  } else {
    if (buttonBox) buttonBox.style.display = "none";
    if (stockSection) stockSection.style.display = "block";
  }
}

</script>


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
        console.log('All Days Changed');
        console.log('Hiding timeSlot:', document.getElementById('timeSlot'));
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
         console.log('All Days Changed');
console.log('Hiding timeSlot:', document.getElementById('timeSlot'));
         if (document.getElementById('timeSlot')) {
            $('#timeSlot').hide();
        }
    });
});
</script>

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

<!-- //Show week list api call...G1 -->
<script>
function showWeekListUI(screenName, productModel) { 
    // let productModel = JSON.parse(element.getAttribute('data-product'));
    // console.log("Product Model:", productModel);

    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}showWeekListA";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            screenName: screenName,
            _token: _token,
        },

        success: function(response) {

            if (response.status === 'success') {
                $('#weekList').html(response.htmlcode);
            }
            disableSpecificDays(productModel);
        },
        error: function(xhr, status, error) {

            alert("An error occurred: " + xhr.responseText);
        },
    });
}
</script>

<!-- Handle week selecttion click...G1 -->
<script>
function handleSelectedWeekClickCart(element) {
    const selectedValue = element.value;
    const otherReasonInput = document.getElementById("weekModel");
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

<!-- Handle date click...G1 -->
<script>
function handleDateClick() {
    // Get all checkboxes
    const checkboxes = document.querySelectorAll('.day_count input[type="checkbox"]');
    const selectedDays = [];
    
    if (document.getElementById('timeSlot')) {
    $('#timeSlot').show();
    } 

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            selectedDays.push(checkbox.value);
        }
    });

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
function handleDateChange(event) {

    // Get all checkboxes
    const checkboxes = document.querySelectorAll('.day_count input[type="checkbox"]');
    const selectedDays = [];

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            selectedDays.push(checkbox.value);
        }
    });
    const selectedDate = event.target.value;

    // console.log("Selected Date:", selectedDate);

    const _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}handleDateSelection";
    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            selectedDate: selectedDate,
            repeatDays: selectedDays,
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
 function AddToSubCartCall(varientId, pName, pPrice) {
    // console.log("Added to cart: ", varientId);

    const checkboxes = document.querySelectorAll('.day_count input[type="checkbox"]');
    const selectedDays = [];
    let selectedDayString = "",
        selectedWeekValue = "",
        isAutorenew = "no",
        selectedTimeSlot = "";


    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            selectedDays.push(checkbox.value);
            selectedDayString += (selectedDayString ? ", " : "") + checkbox.value;
        }
    });
    const selectedDate = document.getElementById("select-date").value;
    // const selectedWeek = document.querySelector('.week-list input[type="radio"]:checked');
    // if (selectedWeek) {
    //     selectedWeekValue = selectedWeek.value;
    // }
    document.querySelectorAll('input[type="radio"][name="week"]').forEach(radio => {
    if (radio.checked) {
        selectedWeekValue = radio.value;
    }
    });

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
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                screenName: "productDetail",
                qty: "1",
                varientID: varientId,
                repeatDays: selectedDayString,
                timeSlot: selectedTimeSlot,
                selectedWeek: selectedWeekValue,
                deliveyDate: selectedDate,
                autorenew: isAutorenew,
                _token: _token,
            },

            success: function(result) {
                if (result.success === '1') {
                    var modal = bootstrap.Modal.getInstance(document.getElementById('subscribe'));
                    if (modal) modal.hide();
                    gtag('event', 'add_to_subcartW', {
                                    currency: 'AED',
                                    value: pPrice, 
                                    items: [{
                                        item_id: varientId,
                                        item_name:  pName,
                                        quantity: 1,
                                        price: pPrice
                                    }],
                                    method: 'subcart_button_click',
                                    page_location: window.location.href,
                                    debug_mode: true // set true if testing in DebugView
                                    });
                    fbq('track', 'AddToCart', {
                                content_ids: varientId,
                                content_name: pName,
                                content_type: 'product subscription',
                                value: pPrice,
                                currency: 'AED'
                                });
                    window.location.reload();
                }
            },
            error: function(xhr, status, error) {

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

<!-- Set diseable days -->
<script>
function disableSpecificDays(productString) {
    const availableDays = productString.available_days;
    const allowedDays = availableDays.toLowerCase().split(',');

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
            // document.getElementById(allDays[day]).disabled = true;
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

// window.onload = disableSpecificDays;
</script>

<!-- Add to cart api call...G1 -->
<script>

jQuery(document).on('click', '.add_cart_btn', function() {
    if(currentUserID == ''){
         pendingProductId = jQuery(this).data('varient-id');
         action = 'addToCart';
         console.log(pendingProductId);
        $('#login').modal('show');
    }else{
        console.log('change-qty else');
        var varientId = jQuery(this).data('varient-id');
        var product_id = jQuery(this).data('product-id');
        var change = 1;
        var isLogin =false;
        var screenName = 'product_detail';
        // addToCart(varientId,change,isLogin,screenName);
        // addToCart(varientId, change, true, screenName, 1, "", product_id);

    }
});

jQuery(document).on('click', '.add_sub_cart_btn', function() {
    if(currentUserID == ''){
         pendingProductId = jQuery(this).data('varient-id');
         action = 'addToSubCart';
         console.log(pendingProductId);
        $('#login').modal('show');
    }else{
        console.log('change-qty else');
        // var varientId = jQuery(this).data('varient-id');
        // var change = 1;
        // var isLogin =false;
        // var screenName = 'product_detail';
        
        let productModel = jQuery(this).data('product');
        // console.log('G1-------', productModel);
    
        if (productModel && productModel.varients) {
          if (
            productModel.varients.length >= 2 ||
            (productModel.varients.length == 1 && productModel.features.length >= 1)
          ) {
            openVariantSelectionModal1(productModel);
          } else {
            $('#subscribe').modal('show');
            showWeekListUI('productDetail', productModel);
          }
        } else {
          console.error('productModel or varients not found', productModel);
        }
    }
});
</script>

<!-- Navigrate to next page...G1 -->
<script>
function navigateToNextPage(url, btn) {
    if (btn == '1') {
        // Store selected tab in localStorage
        localStorage.setItem("selectedTab", "1");
    } else {
        localStorage.setItem("selectedTab", "2");
    }
    const nextPageUrl = url;
    window.location.href = nextPageUrl;
    // console.log(window.location.href);
}
</script>
<!-- PRODUCT SHARE BUTTON SCRIPT START -->
<script>
const shareBtn = document.querySelector('.share-btn');
const shareOptions = document.querySelector('.share-options');
const copyBtn = document.querySelector('.copy-link');

const productUrl = encodeURIComponent(window.location.href);
const shareText = encodeURIComponent("Check out this product!");

// Toggle share menu
shareBtn.addEventListener('click', () => {
    shareOptions.style.display = shareOptions.style.display === 'block' ? 'none' : 'block';
});

// Update share links dynamically
document.querySelector('.share-facebook').href = `https://www.facebook.com/sharer/sharer.php?u=${productUrl}`;
// document.querySelector('.share-linkedin').href = `https://www.linkedin.com/sharing/share-offsite/?url=${productUrl}`;
document.querySelector('.share-twitter').href = `https://twitter.com/intent/tweet?url=${productUrl}&text=${shareText}`;
document.querySelector('.share-whatsapp').href = `https://wa.me/?text=${shareText}%20${productUrl}`;

document.querySelector('.share-linkedin').addEventListener('click', () => {
  const productUrl = window.location.href;
  const text = "Check this out!";

  if (navigator.share) {
    navigator.share({
      title: "My Product",
      text: text,
      url: productUrl
    }).catch(err => console.log("Share failed:", err));
  } else {
    // fallback to LinkedIn web share
    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(productUrl)}`, "_blank");
  }
});

function isMobile() {
  return /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
}
if (isMobile()) {
    
document.querySelector('.share-instagram').addEventListener('click', () => {
    const productUrl = window.location.href;
  const shareText = "Check out this product!";

  if (navigator.share) {
    navigator.share({
      title: "My Product",
      text: shareText,
      url: productUrl
    })
    .then(() => console.log("Shared successfully"))
    .catch(err => console.error("Share failed:", err));
  } else {
    alert("Sharing not supported in this browser. Copy this link: " + productUrl);
  }
});
} else {
     document.querySelector('.share-instagram').href = "https://www.instagram.com/direct/new/?text=" + productUrl;
}

// Copy to clipboard
copyBtn.addEventListener('click', () => {
    navigator.clipboard.writeText(window.location.href).then(() => {
        alert('Link copied to clipboard!');
    });
});


</script>


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


<!-- PRODUCT SHARE BUTTON SCRIPT END -->
@include('footer')