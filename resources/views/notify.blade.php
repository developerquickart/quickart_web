@include('header')
<section class="top-category section-padding py-5">
    <div class="container-fluid">
        <div class="sidemenu_mainBox">
            <div class="sidemenu_menu_mainBox">
                <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
                    <nav class="menu open-current-submenu">
                        <div id="side-menu">
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}profile"  class="sub-menu-list-link">Profile</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}my-orders?tab=1" class="sub-menu-list-link">My Order</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}address-list" class="sub-menu-list-link">My Address</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}coupon" class="sub-menu-list-link">My Offers</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}notification" class="sub-menu-list-link">Notification</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="false" aria-controls="account">Payment Details</div>
                                <div class="collapse" id="account" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="{{ENV('APP_URL')}}wallet" class="sub-inner-links">Wallet</a></li>
                                        <li><a href="{{ENV('APP_URL')}}card-details" class="sub-inner-links">Card Details</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#shopping" aria-expanded="false" aria-controls="shopping">My Shopping</div>
                                <div class="collapse" id="shopping" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="{{ENV('APP_URL')}}wishlist" class="sub-inner-links">Wishlist</a></li>
                                        <li><a href="{{ENV('APP_URL')}}notify" class="sub-inner-links">Notify Me</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}help" class="sub-menu-list-link">Get Help</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="{{ENV('APP_URL')}}faq" class="sub-menu-list-link">FAQ's</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="javascript(0)" data-bs-toggle="modal" data-bs-target="#logout" class="sub-menu-list-link">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </aside>
            </div>
            <div class="sidemenu_content_mainBox">
                <div class="section-header">
                    <h5 class="heading-design-h5">Notify Product List</h5>
                </div>
                @if(isset($productList['data']) && count($productList['data']) > 0)
                <div class="product_list_box">
                    @foreach($productList['data'] as $product)
                    @if(!$product['stock'] == 0)
                    <div class="all_product_list">
                        <div class="product" data-productDetail='@json($product)'data-product-id="{{ trim($product['product_id']) }}">
                            <div class="product_header">
                                <div class="product_top_left">
                                    @if($product['discountper'] > 0)
                                    <div class="discount_text">
                                        {{number_format($product['discountper'], 0)}}%<span>Off</span>
                                    </div>
                                    @else
                                    @endif
                                    @if($product['country_icon'] != null)
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
                                </div>
                            </div>
                            <a href="{{ENV('APP_URL')}}product-details/{{ Str::slug($product['product_name']) }}/{{$product['product_id']}}">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{$product['product_image']}}" alt="">
                                </div>
                                <div class="product-body">
                                    <div class="product_name">{{$product['product_name']}}</div>
                                    
                                </div>
                            </a>
                            <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                <span>
                                    {{ trim($product['quantity'] ?? '') }} {{ trim($product['unit'] ?? '') }}
                                </span>
                                @if(isset($product['varients']) && count($product['varients']) > 1)
                                <div class="change-qty" data-productDetail='@json($product)'data-product-id="{{ trim($product['product_id']) }}">
                                    <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                        {{ count($product['varients']) }} options
                                        <img class="varient-down-arrow" src="{{ asset('assets/images/chevron.svg') }}" alt="down-arrow" style="width: 12px; height: 12px;">
                                    </span>
                                </div>
                                @endif
                            </div>
                            <div class="product-footer">
                                <div class="product_detail">
                                    @if($product['price'] == $product['mrp'])
                                    <p class="offer-price">AED {{ number_format($product['price'], 2) }}</p>
                                    @else
                                    <p class="offer-price">AED {{number_format($product['price'], 2)}}<br><span
                                            class="regular-price">AED
                                            {{number_format($product['mrp'], 2)}}</span></p>
                                    @endif
                                </div>
                                <div class="cart_btn" data-product-id="{{ trim($product['product_id']) }}" data-productdetail='@json($product)'>
                                    <div class="qtyBox"
                                        data-varient-id="{{ trim($product['varient_id']) }}">
                                        <button class="qty-btn qty-btn-minus change-qty" type="button"
                                            data-productDetail='@json($product)'
                                            data-change="-1">-</button>
                                        <input type="text" name="qty"
                                            value="{{ trim($product['total_cart_qty']) }}" id="totalCartQTY"
                                            class="input-qty input-rounded" min="0">
                                        <input type="hidden" name="stock" id="stock"
                                            value="{{ trim($product['stock']) }}">
                                        <button class="qty-btn qty-btn-plus change-qty" type="button"
                                            data-productDetail='@json($product)'
                                            data-change="1">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="remove_product_text">
                                <a href="javascript:void(0);" onclick="removeNotifyMe(this)"
                                    data-varient-id="{{ $product['varient_id'] }}"
                                    data-product-id="{{ $product['product_id'] }}">
                                    <div class="product_unavailable_subtitle11" style="color: #df2525;"> Remove from list</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="all_product_list">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    @if($product['discountper'] > 0)
                                    <div class="discount_text">{{number_format($product['discountper'], 0)}}%<span>Off</span>
                                    </div>
                                    @endif
                                    @if(!empty($product['country_icon']))
                                    <div class="country_flag">
                                        <img src="{{$product['country_icon']}}" alt="flag">
                                    </div>
                                    @else
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
                            <a href="{{ENV('APP_URL')}}product-details/{{ Str::slug($product['product_name']) }}/{{$product['product_id']}}">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{$product['product_image']}}" alt="">
                                </div>
                            </a>
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name" style="color: white;">{{$product['product_name']}}</div>
                                    <div class="product_weight1"><span>{{$product['quantity']}} {{$product['unit']}}</span></div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title1">Currently unavailable</div>
                                    <p style="color: #c9c0c0;">You will be notified.</p>
                                    <a href="javascript:void(0);" onclick="removeNotifyMe(this)"
                                        data-varient-id="{{ $product['varient_id'] }}"
                                        data-product-id="{{ $product['product_id'] }}">
                                        <div class="product_unavailable_subtitle" style="color: #0a0a0a;">Remove from list</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @else
                <div class="shop-list section-padding">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6">
                                <div class="data_not_available">
                                    <div class="imageBox">
                                        <img src="{{asset('assets/images/No_product_available.png')}}" alt="empty cart"
                                            class="img-fluid">
                                    </div>
                                    <div class="textBox text-center">
                                        <a href="{{url('/')}}" class="my-4 d-block">
                                            <div class="cancel_btn">Let's Shop</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- ONCLICK CART BOX START -->
<div class="cart_flating_btn" onclick="toggleOrderBox(event)">
    <small class="cart-value">0</small> <!-- This will be updated dynamically -->
    <img src="{{asset('assets/images/grocery-store.svg')}}" alt="">
</div>
<div class="order_placeBox" id="orderBox" style="display: none;">
    <div class="row align-items-center">
        <div class="col-12">
            <div class="freeDeliverytext">Congratulations! You've got <span>FREE DELIVERY</span></div>
            <div class="countText">0 items | AED 0</div> <!-- This will be updated -->
            <div class="saveText">You have saved <span>AED 0</span> on your order</div> <!-- This will be updated -->
        </div>
    </div>
</div>
<!-- ONCLICK CART BOX END -->

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
<!-- Notify Me START -->
<script>
function removeNotifyMe(element) {
    var varient_id = element.getAttribute('data-varient-id');
    var product_id = element.getAttribute('data-product-id');
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "{{ENV('APP_URL')}}RemoveNotifyMe";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            varient_id: varient_id,
            product_id: product_id,
            _token: _token
        },
        success: function(result) {
            window.location.href = "{{ENV('APP_URL')}}notify";
        },
        error: function(xhr, status, error) {
            console.error("Error:", status, error);
            alert("An error occurred: " + error);
        }
    });
}
</script>
<!-- Notify Me SCRIPT END -->
@include('footer')