@include('header')

<section class="shop-list section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="section-header">
                <h5 class="heading-design-h5">Repeat Orders</h5>
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
                                @endif
                            </div>
                        </div>
                        <a href="{{ENV('APP_URL')}}product-details/{{ Str::slug($product['product_name']) }}/{{$product['product_id']}}">
                            <div class="product-img">
                                <img class="img-fluid" src="{{$product['varient_image']}}" alt="">
                            </div>
                            <div class="product_featured_cat_icon_list">
                                <div class="product_featured_cat_icon">
                                    @foreach($product['feature_tags'] as $tags)
                                    <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-body">
                                <div class="product_name">{{$product['product_name']}}</div>
                            </div>
                        </a>
                        <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                            <span>
                                {{ trim($product['varients'][0]['quantity'] ?? '') }} {{ trim($product['varients'][0]['unit'] ?? '') }}
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
                        <div class="order_repeat_count">Ordered <span>{{$product['ordercount']}}</span>
                            times</div>
                        <div class="product-footer">
                            <div class="product_detail">
                                @if($product['varients'][0]['price'] == $product['varients'][0]['mrp'])
                                <p class="offer-price">AED {{ number_format($product['varients'][0]['price'], 2) }}</p>
                                @else
                                <p class="offer-price">AED {{number_format($product['varients'][0]['price'], 2)}}<br><span
                                        class="regular-price">AED
                                        {{number_format($product['varients'][0]['mrp'], 2)}}</span></p>
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
                    </div>
                </div>
                @else
                <div class="all_product_list">
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    @if($product['discountper'] > 0)
                                    <div class="discount_text">
                                        {{number_format($product['discountper'], 0)}}%<span>Off</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="product_top_right">

                                    <div class="product_wishlist">
                                        @if($product['notify_me'] == 'false')
                                        <a href="javascript:void(0);" class="notify-me" data-notified="0"
                                            data-varient-id="{{ $product['varient_id'] }}"
                                            data-product-id="{{ $product['product_id'] }}">
                                            <img class="notify-icon"
                                                src="{{ asset('assets/images/notification.png') }}" alt="wishlist"
                                                style="max-width: 25px;">
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
                            <a href="{{ENV('APP_URL')}}product-details/{{ Str::slug($product['product_name']) }}/{{$product['product_id']}}">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{$product['varient_image']}}" alt="product">
                                </div>
                            </a>
                            <div class="product_featured_cat_icon_list">
                                <div class="product_featured_cat_icon">
                                    @foreach($product['feature_tags'] as $tags)
                                    <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name">{{$product['product_name']}}</div>
                                    <div class="product_weight"><span>{{$product['qty']}}
                                            {{$product['unit']}}</span></div>
                                    <div class="order_repeat_count">Ordered <span>{{$product['ordercount']}}</span>
                                        times</div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title">Product Unavailable</div>
                                    @if($product['notify_me'] == "true")
                                    <p>You will be notified.</p>
                                    @else
                                    <p>Click on the bell to get notified.</p>
                                    @endif
                                </div>
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

@include('footer')