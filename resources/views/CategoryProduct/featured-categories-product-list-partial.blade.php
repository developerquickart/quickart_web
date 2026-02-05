<input type="hidden" name="totalPages" id="totalPages" value="{{$productList[0]['totalPages'] ?? 1}}" />
@foreach($productList as $product)
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
        <a href="{{ url('product-details') }}/{{ Str::slug($product['product_name']) }}/{{ trim($product['product_id']) }}">
            <div class="product-img">
                <img class="img-fluid" src="{{$product['product_image']}}"
                    alt="">
            </div>
            @if(isset($product['feature_tags']) &&
            count($product['feature_tags']) > 0)
            <div class="product_featured_cat_icon_list">
                <div class="product_featured_cat_icon">
                    @foreach($product['feature_tags'] as $tags)
                    <img class="img-fluid" src="{{ trim($tags['image']) }}"
                        alt="Product">
                    @endforeach
                </div>
            </div>
            @endif
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
                <p class="offer-price">AED
                    {{ number_format($product['price'], 2) }}
                </p>
                @else
                <p class="offer-price">AED
                    {{number_format($product['price'], 2)}}<br><span
                        class="regular-price">AED
                        {{number_format($product['mrp'], 2)}}</span>
                </p>
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
        <div class="subscribe_text">Subscribe & Save 5%</div>
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
                    @if($product['country_icon'] != null ||
                    $product['country_icon']
                    !=
                    "")
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
                        src="{{$product['product_image']}}" alt="product">
                </div>
            </a>
            <div class="product-body notify_box">
                <div class="product-body">
                    <div class="product_name">{{$product['product_name']}}
                    </div>
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
</div>
@endif
@endforeach
                                            