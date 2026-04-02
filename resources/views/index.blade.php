@include('header')
<?php
$referralCode = $appInfo['data']['referral_code'] ?? '';
$referralText = $appInfo['data']['referral_message'] ?? '';
?>
<!-- MAIN BANNER START Done-->
<section class="carousel-slider-main text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(isset($oneAPIList['banner']) && count($oneAPIList['banner']) > 0)
                <div class="home_banner">
                    <div class="owl-carousel owl-carousel-slider">
                        @foreach($oneAPIList['banner'] as $banner)
                        <div class="item">
                            <div class="banner_img">
                                <img 
                                  class="img-fluid" 
                                  src="{{ $banner['banner_image'] }}" 
                                  alt="First slide"
                                  style="cursor:pointer;"
                                  onclick="openBannerProductList('{{ url('banner-product-list', ['name' => Str::slug($banner['banner_name'])]) }}', '{{ $banner['banner_id'] ?? '' }}', 'store', {{ json_encode(trim($banner['banner_name'] ?? '')) }})"
                                />
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                @if(isset($oneAPIList['featurecategory']) && count($oneAPIList['featurecategory']) > 0)
                <div class="featured_cat_MainBox">
                    <div class="section-header1">
                        <h5 class="heading-design-h5 text-center pb-3">Filter by Tags</h5>
                    </div>
                    <div class="order_again_mainBox">
                        <div class="row">
                            <div class="featured_cate_mainbox">
                                @foreach($oneAPIList['featurecategory'] as $featuredCat)
                                <div class="featured_cate_list">
                                    <div class="featured_cate_img">
                                        <a
                                            href="{{ENV('APP_URL')}}featured-categories-product-list/{{$featuredCat['id']}}/{{Str::slug($featuredCat['title'])}}">
                                            <img src="{{$featuredCat['image']}}" alt="categories" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="featured_cate_text">{{$featuredCat['title']}}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- MAIN BANNER END -->
<!-- CATEGORIES SECTION START Done-->
@if(isset($oneAPIList['top_cat']) && count($oneAPIList['top_cat']) > 0)
<section class="top-category section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5" onclick="openPopUPScreen('search', '13', 'Popup banner')">Categories</h5>
                    <a class="float-right text-secondary" href="{{ENV('APP_URL')}}all-categories">View All</a>
                </div>
                <div class="categories_list">
                    @foreach($oneAPIList['top_cat'] as $topCat)
                    <div class="category-item">
                        <a href="{{ env('APP_URL') }}subcategories-product-list/{{ Str::slug($topCat['title']) }}/{{ $topCat['cat_id'] }}/{{ Str::slug($topCat['subcategory_title']) }}/{{ $topCat['subcategory_id'] }}"> 
                            <img class="img-fluid"
                                src="{{ $topCat['image'] ?? asset('assets/images/default-product.jpg') }}"
                                alt="Product">
                            <h6>{{ trim($topCat['title']) }}</h6>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</section>
@endif
<!-- CATEGORIES SECTION END -->
<!-- FEATURED CATEGORIES SECTION END-->

@php
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\RequestException;
    
    try {
    $client = new Client();
    $nodeappUrl = env('NODE_APP_URL'); // Replace with your API Base URL
    
    $response = $client->post($nodeappUrl . 'oneapi', [
        'json' => [
            'store_id' => 7,
            'user_id' => !empty(session()->get('user_id')) ? session()->get('user_id') : 2,
            'is_subscription' => 1,
            'device_id' => ""
        ]
    ]);
    
    if ($response->getStatusCode() === 200) {
        $oneAPIList = json_decode($response->getBody()->getContents(), true);
    }
    } catch (RequestException $e) {
    $errorMessage = $e->getMessage();
    \Log::error('API Request Error: ' . $errorMessage);
    } catch (\Exception $e) {
    $errorMessage = $e->getMessage();
    \Log::error('API General Error: ' . $errorMessage);
    }
    @endphp
<!-- SECOND PRODUCT BANNER SECTION START -->
@if(isset($oneAPIList['second_banner']) && count($oneAPIList['second_banner']) > 0)
<section class="offer-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-carousel-four">
                    @foreach($oneAPIList['second_banner'] as $secondBanner)
                    <div class="item">
                        <div class="banner_img">
                            <img 
                                  class="img-fluid" 
                                  src="{{ $secondBanner['banner_image'] }}" 
                                  alt="First slide"
                                  style="cursor:pointer;"
                                  onclick="openBannerProductList('{{ url('banner-product-list', ['name' => Str::slug($secondBanner['banner_name'])]) }}', '{{ $secondBanner['banner_id'] ?? '' }}', 'product', {{ json_encode(trim($secondBanner['banner_name'] ?? '')) }})"
                                />
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- SECOND PRODUCT BANNER SECTION END -->

{{-- Temporarily hidden: active subscription orders on homepage
<!-- YOUR ACTIVE SUBSCRIPTION SECTION START Done-->
@if(!empty($data_arr['user_id']) && $data_arr['user_id'] != '')
    @if(isset($oneAPIList['activesub_ordlist']) && count($oneAPIList['activesub_ordlist']) > 0)
    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="row">
                <div ̰class="col-lg-12">
                    <div class="section-header">
                        <h5 class="heading-design-h5">Your Active Subscription's</h5>
                        <a class="float-right text-secondary" onclick='openOrderPage()'>View All</a>
                    </div>
                    <div class="owl-carousel owl-carousel-featured subscription_slider">
                        @foreach($oneAPIList['activesub_ordlist'] as $activesub_ordlist)
                        <div class="item">
                            <div class="product">
    
                                <a href="{{ENV('APP_URL')}}subscription-order-product?group_id={{$activesub_ordlist['group_id']}}"
                                    class="active_order">
                                    <div class="product-img">
                                        <img class="img-fluid" src="{{$activesub_ordlist['prodList'][0]['varient_image']}}"
                                            alt="product">
                                    </div>
                                    <div class="product-body">
                                        <div class="product_header">
                                            <div class="product_top_left">
                                                <div class="discount_text p-1"><span>Active</span></div>
                                            </div>
                                        </div>
                                        <div class="product_name">{{$activesub_ordlist['productname']}}</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endif
<!-- BEST SELLERS PRODUCT SECTION END -->
--}}

<!-- FRESH DAIRY SECTION START Done-->
@if(isset($oneAPIList['occasionalCategory']) && count($oneAPIList['occasionalCategory']) > 0)
<section class="product-items-slider section-padding">
    <div class="categories_wise_product_list">
        <div class="container">
            <div class="row">
                @foreach($oneAPIList['occasionalCategory'] as $occasionalCategory)
                <div class="col-lg-12">
                    <div class="categories_product_list">
                        <div class="section-header">
                            <h5 class="heading-design-h5">
                                {{$occasionalCategory['title']}}<span>{{$occasionalCategory['sub_title']}}</span></h5>
                            <a class="float-right text-secondary"
                                href="{{ env('APP_URL') }}occasional-product-list?name={{ Str::slug($occasionalCategory['title']) }}">
                                View All</a>
                        </div>
                        <div class="owl-carousel owl-carousel-featured">
                            @foreach($occasionalCategory['product_details'] as $productDetail)
                            @if(trim($productDetail['stock']) != '0')
                            <div class="item">
                                <div class="product" data-productDetail='@json($productDetail)'data-product-id="{{ trim($productDetail['product_id']) }}">
                                    <div class="product_header">
                                        <div class="product_top_left">
                                            @if($productDetail['discountper'] > 0)
                                            <div class="discount_text">
                                                {{ number_format(trim($productDetail['discountper']), 0) }}%<span>Off</span>
                                            </div>
                                            @endif
                                            @if(!empty($productDetail['country_icon']))
                                            <div class="country_flag">
                                                <img src="{{ trim($productDetail['country_icon']) }}" alt="flag">
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product_top_right">
                                            <div class="product_wishlist">
                                                <a href="javascript:void(0);" class="wishlist-btn"
                                                    data-varient-id="{{ trim($productDetail['varient_id']) }}">
                                                    <img class="wishlist-icon"
                                                        src="{{ asset(trim($productDetail['isFavourite']) == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                        alt="wishlist" style="max-width: 25px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                     <a href="{{ url('product-details') }}?name={{ Str::slug($productDetail['product_name']) }}&id={{ trim($productDetail['product_id']) }}">
                                        <div class="product-img">
                                            <img class="img-fluid" src="{{ trim($productDetail['product_image']) }}"
                                                alt="Product">
                                        </div>
                                        @if(isset($productDetail['feature_tags']) &&
                                        count($productDetail['feature_tags']) > 0)
                                        <div class="product_featured_cat_icon_list">
                                            <div class="product_featured_cat_icon">
                                                @foreach($productDetail['feature_tags'] as $tags)
                                                <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                         <div class="product-body">
                                            <div class="product_name">{{ trim($productDetail['product_name']) }}</div>
                                            
                                            
                                        </div>
                                    </a>
                                    <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                        <span>
                                            {{ trim($productDetail['quantity'] ?? '') }} {{ trim($productDetail['unit'] ?? '') }}
                                        </span>
                                    
                                        @if(isset($productDetail['varients']) && count($productDetail['varients']) > 1)
                                        <div class="change-qty" data-productDetail='@json($productDetail)'data-product-id="{{ trim($productDetail['product_id']) }}">
                                            <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                                {{ count($productDetail['varients']) }} options
                                                <img class="varient-down-arrow" src="{{ asset('assets/images/chevron.svg') }}" alt="down-arrow" style="width: 12px; height: 12px;">
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-footer">
                                        <div class="product_detail">
                                            <p class="offer-price">AED
                                                <span>{{ number_format(trim($productDetail['price']), 2) }}</span><br>
                                                @if ($productDetail['price'] != $productDetail['mrp'])
                                                <span class="regular-price">AED
                                                    <span>{{ number_format(trim($productDetail['mrp']), 2) }}</span></span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="cart_btn" data-product-id="{{ trim($productDetail['product_id']) }}" data-productdetail='@json($productDetail)'>
                                            <div class="qtyBox"
                                                data-varient-id="{{ trim($productDetail['varient_id']) }}">
                                                <button class="qty-btn qty-btn-minus change-qty" type="button"
                                                    data-productDetail='@json($productDetail)'
                                                    data-change="-1">-</button>
                                                <input type="text" name="qty"
                                                    value="{{ trim($productDetail['total_cart_qty']) }}" id="totalCartQTY"
                                                    class="input-qty input-rounded" min="0">
                                                <input type="hidden" name="stock" id="stock"
                                                    value="{{ trim($productDetail['stock']) }}">
                                                <button class="qty-btn qty-btn-plus change-qty" type="button"
                                                    data-productDetail='@json($productDetail)'
                                                    data-change="1">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                    <div class="item">
                        <div class="product" data-productDetail='@json($productDetail)'data-product-id="{{ trim($productDetail['product_id']) }}">
                            <div class="product_header">
                                <div class="product_top_left">
                                    @if($productDetail['discountper'] > 0)
                                    <div class="discount_text">
                                        {{number_format($productDetail['discountper'], 0)}}%<span>Off</span></div>
                                    @endif
                                    @if($productDetail['country_icon'] != null || $productDetail['country_icon'] != "")
                                    <div class="country_flag">
                                        <img src="{{$productDetail['country_icon']}}" alt="flag">
                                    </div>
                                    @endif
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="{{ $productDetail['varient_id'] }}">
                                            <img class="wishlist-icon"
                                                src="{{ asset($productDetail['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                    <div class="product_wishlist">
                                        @if($productDetail['notify_me'] == 'false')
                                        <a href="javascript:void(0);" class="notify-me"
                                            data-varient-id="{{ $productDetail['varient_id'] }}"
                                            data-product-id="{{ $productDetail['product_id'] }}" data-notified="0">
                                            <img class="notify-icon" src="{{ asset('assets/images/notification.png') }}"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                        @else
                                        <a href="{{ENV('APP_URL')}}notify">
                                            <img id="notifyMe-{{ $productDetail['varient_id'] }}" data-notified="1"
                                                src="{{ asset('assets/images/notification-fill.png') }}" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                             <a href="{{ url('product-details') }}/{{ Str::slug($productDetail['product_name']) }}/{{ trim($productDetail['product_id']) }}">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{$productDetail['product_image']}}" alt="product">
                                </div>
                            </a>
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name">{{ trim($productDetail['product_name']) }}</div>
                                    <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                        <span>
                                            {{ trim($productDetail['quantity'] ?? '') }} {{ trim($productDetail['unit'] ?? '') }}
                                        </span>
                                    
                                        @if(isset($productDetail['varients']) && count($productDetail['varients']) > 1)
                                         <div class="change-qty" data-productDetail='@json($productDetail)'data-product-id="{{ trim($productDetail['product_id']) }}">
                                            <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                                {{ count($productDetail['varients']) }} options
                                                <img class="varient-down-arrow" src="{{ asset('assets/images/chevron.svg') }}" alt="down-arrow" style="width: 12px; height: 12px;">
                                            </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title">Product Unavailable</div>
                                    @if($productDetail['notify_me'] == "true")
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
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<!-- occasionalCategory END -->

<!-- BEST SELLERS PRODUCT SECTION START Done-->
@if(isset($oneAPIList['topselling']) && count($oneAPIList['topselling']) > 0)
<section class="product-items-slider section-padding">
    <div class="container">
        <div class="row">
            <div ̰class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Best Sellers</h5>
                    <a class="float-right text-secondary"
                        href="{{ env('APP_URL') }}top-selling-product-list">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-featured">
                    @foreach($oneAPIList['topselling'] as $topselling)
                    @if(!$topselling['stock'] == 0)
                    <div class="item">
                        <div class="product" data-productDetail='@json($topselling)'data-product-id="{{ trim($topselling['product_id']) }}">
                            <div class="product_header">
                                <div class="product_top_left">
                                    @if($topselling['discountper'] > 0)
                                    <div class="discount_text">
                                        {{number_format($topselling['discountper'], 0)}}%<span>Off</span></div>
                                    @endif
                                    @if($topselling['country_icon'] != null || $topselling['country_icon'] != "")
                                    <div class="country_flag">
                                        <img src="{{$topselling['country_icon']}}" alt="flag">
                                    </div>
                                    @endif
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="{{ $topselling['varient_id'] }}">
                                            <img class="wishlist-icon"
                                                src="{{ asset($topselling['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                             <a href="{{ url('product-details') }}/{{ Str::slug($topselling['product_name']) }}/{{ trim($topselling['product_id']) }}">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{$topselling['product_image']}}" alt="product">
                                </div>
                                @if(isset($topselling['feature_tags']) &&
                                count($topselling['feature_tags']) > 0)
                                <div class="product_featured_cat_icon_list">
                                    <div class="product_featured_cat_icon">
                                        @foreach($topselling['feature_tags'] as $tags)
                                        <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="product-body">
                                    <div class="product_name">{{$topselling['product_name']}}</div>
                                </div>
                            </a>
                            <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                <span>
                                    {{ trim($topselling['quantity'] ?? '') }} {{ trim($topselling['unit'] ?? '') }}
                                </span>
                                @if(isset($topselling['varients']) && count($topselling['varients']) > 1)
                                <div class="change-qty" data-productDetail='@json($topselling)'data-product-id="{{ trim($topselling['product_id']) }}">
                                    <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                        {{ count($topselling['varients']) }} options
                                        <img class="varient-down-arrow" src="{{ asset('assets/images/chevron.svg') }}" alt="down-arrow" style="width: 12px; height: 12px;">
                                    </span>
                                </div>
                                @endif
                            </div>
                            <div class="product-footer">
                                <div class="product_detail">
                                    <p class="offer-price">AED
                                        <span>{{number_format($topselling['price'], 2)}}</span><br>
                                        @if ($topselling['price'] != $topselling['mrp'])
                                        <span class="regular-price">AED
                                            <span>{{number_format($topselling['mrp'], 2)}}</span></span>
                                    </p>
                                    @endif
                                </div>
                                <div class="cart_btn" data-product-id="{{ trim($topselling['product_id']) }}" data-productdetail='@json($topselling)'>
                                    <div class="qtyBox"
                                        data-varient-id="{{ trim($topselling['varient_id']) }}">
                                        <button class="qty-btn qty-btn-minus change-qty" type="button"
                                            data-productDetail='@json($topselling)'
                                            data-change="-1">-</button>
                                        <input type="text" name="qty"
                                            value="{{ trim($topselling['total_cart_qty']) }}" id="totalCartQTY"
                                            class="input-qty input-rounded" min="0">
                                        <input type="hidden" name="stock" id="stock"
                                            value="{{ trim($topselling['stock']) }}">
                                        <button class="qty-btn qty-btn-plus change-qty" type="button"
                                            data-productDetail='@json($topselling)'
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
                                    @if($topselling['discountper'] > 0)
                                    <div class="discount_text">
                                        {{number_format($topselling['discountper'], 0)}}%<span>Off</span></div>
                                    @endif
                                    @if($topselling['country_icon'] != null || $topselling['country_icon'] != "")
                                    <div class="country_flag">
                                        <img src="{{$topselling['country_icon']}}" alt="flag">
                                    </div>
                                    @endif
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="{{ $topselling['varient_id'] }}">
                                            <img class="wishlist-icon"
                                                src="{{ asset($topselling['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                    <div class="product_wishlist">
                                        @if($topselling['notify_me'] == 'false')
                                        <a href="javascript:void(0);" class="notify-me"
                                            data-varient-id="{{ $topselling['varient_id'] }}"
                                            data-product-id="{{ $topselling['product_id'] }}" data-notified="0">
                                            <img class="notify-icon" src="{{ asset('assets/images/notification.png') }}"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                        @else
                                        <a href="{{ENV('APP_URL')}}notify">
                                            <img id="notifyMe-{{ $topselling['varient_id'] }}" data-notified="1"
                                                src="{{ asset('assets/images/notification-fill.png') }}" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <a href="{{ url('product-details') }}/{{ Str::slug($topselling['product_name']) }}/{{ trim($topselling['product_id']) }}">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{$topselling['product_image']}}" alt="product">
                                </div>
                            </a>
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name">{{ trim($topselling['product_name']) }}</div>
                                    <div class="product_weight"><span>{{$topselling['quantity']}}
                                            {{$topselling['unit']}}</span></div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title">Product Unavailable</div>
                                    @if($topselling['notify_me'] == "true")
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
            </div>
        </div>
    </div>
</section>
@endif
<!-- BEST SELLERS PRODUCT SECTION END -->

{{-- Temporarily hidden: Order Again on homepage
<!-- ORDER AGAIN SECTION START Done-->
@if(isset($oneAPIList['orderlist']) && count($oneAPIList['orderlist']) > 0)
<section class="order-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Order Again</h5>
                    <a class="float-right text-secondary" onclick='openOrderPage()'>View All</a>
                </div>
                <div class="order_again_mainBox">
                    <div class="owl-carousel owl-carousel-orderAgain">
                        @foreach($oneAPIList['orderlist'] as $orderList)
                        <div class="item">
                            <a
                                href=" @if ($orderList['type'] == 'Quick'){{ url(ENV('APP_URL') . 'daily-order-details?group_id=' . $orderList['group_id']) }} @else {{ url(ENV('APP_URL') . 'subscription-order-product?group_id=' . $orderList['group_id']) }} @endif">
                                <div class="order_again_listBox">
                                    <div class="order_again_imgBox">
                                        @if(count($orderList['prodList']) > 0 )
                                        <img class="img-fluid" src="{{$orderList['prodList']['0']['varient_image']}}"
                                            alt="product">
                                        @else
                                        <img class="img-fluid" src="{{asset('assets/images/product1.png')}}"
                                            alt="product">
                                        @endif
                                    </div>
                                    @if(count($orderList['prodList']) > 1 )
                                    <div class="order_again_count">{{count($orderList['prodList']) - 1}}+ product</div>
                                    @endif
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- ORDER AGAIN SECTION END -->
--}}



<!-- GET SNEAKY BANNER SECTION START -->
<section class="offer-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="offer_sliderBox">
                    @if(isset($oneAPIList['sneaky_banner']))
                    <div class="item sneaky_bannerBox">
                        <div class="banner_img trialpackImg" onclick="openSneakyBanner('{{$oneAPIList['sneaky_banner']['banner_name']}}')">
                            <a><img class="img-fluid" src="{{$oneAPIList['sneaky_banner']['banner_image']}}"
                                    alt="Sneaky">
                            </a>
                        </div>
                    </div>
                    @endif
                    @if(isset($oneAPIList['trailpackimage']))
                    <div class="item trialpack_bannerBox">
                        <div class="banner_img trialpackImg">
                            <a class="btn-trail-home"><img class="img-fluid"
                                    src="{{$oneAPIList['trailpackimage']}}" alt="Sneaky">
                            </a>
                        </div>
                    </div>
                    @endif
                    
                    <div class="item popup_bannerBox">
                        <div class="banner_img trialpackImg"
                            >
                            <a href="{{ENV('APP_URL')}}additional-categories/Fresh-Picks"><img class="img-fluid" src="{{ asset('assets/images/fresh-pick.jpg') }}"
                                    alt="Fresh-Pick">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- GET SNEAKY BANNER SECTION END -->

<!-- FRESH DAIRY SECTION START -->
@if(isset($oneAPIList['additional_category']) && count($oneAPIList['additional_category']) > 0)
<section class="product-items-slider section-padding">
    <div class="categories_wise_product_list">
        <div class="container">
            <div class="row">
                @foreach($oneAPIList['additional_category'] as $additionalCat)
                <div class="col-lg-12">
                    <div class="categories_product_list">
                        <div class="section-header">
                            <h5 class="heading-design-h5">
                                {{$additionalCat['title']}}<span>{{$additionalCat['sub_title']}}</span></h5>
                            <a class="float-right text-secondary"
                                href="{{ENV('APP_URL')}}additional-categories/{{ strtolower(str_replace(' ', '-', $additionalCat['title']))  }}">View
                                All</a>
                        </div>
                        <div class="owl-carousel owl-carousel-featured">
                            @foreach($additionalCat['product_details'] as $productDetail)
                            @if(!$productDetail['stock'] == 0)
                            <div class="item">
                                <div class="product" data-productDetail='@json($productDetail)'data-product-id="{{ trim($productDetail['product_id']) }}">
                                    <div class="product_header">
                                        <div class="product_top_left">
                                            @if($productDetail['discountper'] > 0)
                                            <div class="discount_text">
                                                {{number_format($productDetail['discountper'], 0)}}%<span>Off</span>
                                            </div>
                                            @endif
                                            @if($productDetail['country_icon'] != null || $productDetail['country_icon']
                                            != "")
                                            <div class="country_flag">
                                                <img src="{{$productDetail['country_icon']}}" alt="flag">
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product_top_right">
                                            <div class="product_wishlist">
                                                <a href="javascript:void(0);" class="wishlist-btn"
                                                    data-varient-id="{{ $productDetail['varient_id'] }}">
                                                    <img class="wishlist-icon"
                                                        src="{{ asset($productDetail['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                        alt="wishlist" style="max-width: 25px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('product-details') }}/{{ Str::slug($productDetail['product_name']) }}/{{ trim($productDetail['product_id']) }}">
                                        <div class="product-img">
                                            <img class="img-fluid" src="{{$productDetail['product_image']}}"
                                                alt="Product">
                                        </div>
                                        @if(isset($productDetail['feature_tags']) &&
                                        count($productDetail['feature_tags']) > 0)
                                        <div class="product_featured_cat_icon_list">
                                            <div class="product_featured_cat_icon">
                                                @foreach($productDetail['feature_tags'] as $tags)
                                                <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                        <div class="product-body">
                                            <div class="product_name">{{$productDetail['product_name']}}</div>
                                        </div>
                                    </a>
                                     <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                        <span>
                                            {{ trim($productDetail['quantity'] ?? '') }} {{ trim($productDetail['unit'] ?? '') }}
                                        </span>
                                    
                                        @if(isset($productDetail['varients']) && count($productDetail['varients']) > 1)
                                        <div class="change-qty" data-productDetail='@json($productDetail)'data-product-id="{{ trim($productDetail['product_id']) }}">
                                            <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                                {{ count($productDetail['varients']) }} options
                                                <img class="varient-down-arrow" src="{{ asset('assets/images/chevron.svg') }}" alt="down-arrow" style="width: 12px; height: 12px;">
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-footer">
                                        <div class="product_detail">
                                            <p class="offer-price">AED
                                                <span>{{number_format($productDetail['price'], 2)}}</span><br>
                                                @if ($productDetail['price'] != $productDetail['mrp'])
                                                <span class="regular-price">AED
                                                    <span>{{number_format($productDetail['mrp'], 2)}}</span></span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="cart_btn" data-product-id="{{ trim($productDetail['product_id']) }}" data-productdetail='@json($productDetail)'>
                                            <div class="qtyBox"
                                                data-varient-id="{{ trim($productDetail['varient_id']) }}">
                                                <button class="qty-btn qty-btn-minus change-qty" type="button"
                                                    data-productDetail='@json($productDetail)'
                                                    data-change="-1">-</button>
                                                <input type="text" name="qty"
                                                    value="{{ trim($productDetail['total_cart_qty']) }}" id="totalCartQTY"
                                                    class="input-qty input-rounded" min="0">
                                                <input type="hidden" name="stock" id="stock"
                                                    value="{{ trim($productDetail['stock']) }}">
                                                <button class="qty-btn qty-btn-plus change-qty" type="button"
                                                    data-productDetail='@json($productDetail)'
                                                    data-change="1">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="item">
                                <div class="product" data-productDetail='@json($productDetail)'data-product-id="{{ trim($productDetail['product_id']) }}">
                                    <div class="product_header">
                                        <div class="product_top_left">
                                            @if($productDetail['discountper'] > 0)
                                            <div class="discount_text">
                                                {{number_format($productDetail['discountper'], 0)}}%<span>Off</span>
                                            </div>
                                            @endif
                                            @if($productDetail['country_icon'] != null || $productDetail['country_icon']
                                            != "")
                                            <div class="country_flag">
                                                <img src="{{$productDetail['country_icon']}}" alt="flag">
                                            </div>
                                            @endif
                                        </div>
                                        <div class="product_top_right">
                                            <div class="product_wishlist">
                                                <a href="javascript:void(0);" class="wishlist-btn"
                                                    data-varient-id="{{ $productDetail['varient_id'] }}">
                                                    <img id="wishlist-{{ $productDetail['varient_id'] }}"
                                                        src="{{ asset($productDetail['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                        alt="wishlist" style="max-width: 25px;" class="wishlist-icon">
                                                </a>
                                            </div>
                                            <div class="product_wishlist">
                                                @if($productDetail['notify_me'] == 'false')
                                                <a href="javascript:void(0);" class="notify-me"
                                                    data-varient-id="{{ $productDetail['varient_id'] }}"
                                                    data-product-id="{{ $productDetail['product_id'] }}" data-notified="0">
                                                    <img class="notify-icon"
                                                        src="{{ asset('assets/images/notification.png') }}"
                                                        alt="wishlist" style="max-width: 25px;">
                                                </a>
                                                @else
                                                <a href="{{ENV('APP_URL')}}notify" data-notified="1">
                                                    <img id="notifyMe-{{ $productDetail['varient_id'] }}"
                                                        src="{{ asset('assets/images/notification-fill.png') }}"
                                                        alt="wishlist" style="max-width: 25px;">
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('product-details') }}/{{ Str::slug($productDetail['product_name']) }}/{{ trim($productDetail['product_id']) }}">
                                        <div class="product-img">
                                            <img class="img-fluid" src="{{$productDetail['product_image']}}"
                                                alt="product">
                                        </div>
                                    </a>
                                    @if(isset($productDetail['feature_tags']) &&
                                    count($productDetail['feature_tags']) > 0)
                                    <div class="product_featured_cat_icon_list">
                                        <div class="product_featured_cat_icon">
                                            @foreach($productDetail['feature_tags'] as $tags)
                                            <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <div class="product-body notify_box">
                                        <div class="product-body">
                                            <div class="product_name">{{$productDetail['product_name']}}</div>
                                            <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                                <span>
                                                    {{ trim($productDetail['quantity'] ?? '') }} {{ trim($productDetail['unit'] ?? '') }}
                                                </span>
                                            
                                                @if(isset($productDetail['varients']) && count($productDetail['varients']) > 1)
                                                <div class="change-qty" data-productDetail='@json($productDetail)'data-product-id="{{ trim($productDetail['product_id']) }}">
                                                    <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                                        {{ count($productDetail['varients']) }} options
                                                        <img class="varient-down-arrow" src="{{ asset('assets/images/chevron.svg') }}" alt="down-arrow" style="width: 12px; height: 12px;">
                                                    </span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_unavailable">
                                            <div class="product_unavailable_title">Product Unavailable</div>
                                            @if($productDetail['notify_me'] == "true")
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
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<!-- FRESH DAIRY SECTION END-->

<!-- TRENDING PRODUCTS SECTION START Done -->
@if(isset($oneAPIList['recentselling']) && count($oneAPIList['recentselling']) > 0)
<section class="product-items-slider section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Trending Products</h5>
                    <a class="float-right text-secondary"
                        href="{{ENV('APP_URL')}}recent-selling-product-list">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-featured">
                    @foreach($oneAPIList['recentselling'] as $recentselling)
                    @if(!$recentselling['stock'] == 0)
                    <div class="item">
                        <div class="product" data-productDetail='@json($recentselling)'data-product-id="{{ trim($recentselling['product_id']) }}">
                            <div class="product_header">
                                <div class="product_top_left">
                                    @if($recentselling['discountper'] > 0)
                                    <div class="discount_text">
                                        {{number_format($recentselling['discountper'], 0)}}%<span>Off</span></div>
                                    @endif
                                    @if($recentselling['country_icon'] != null || $recentselling['country_icon'] != "")
                                    <div class="country_flag">
                                        <img src="{{$recentselling['country_icon']}}" alt="flag">
                                    </div>
                                    @endif
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="{{ $recentselling['varient_id'] }}">
                                            <img class="wishlist-icon"
                                                src="{{ asset($recentselling['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('product-details') }}/{{ Str::slug($recentselling['product_name']) }}/{{ trim($recentselling['product_id']) }}">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{$recentselling['product_image']}}" alt="Product">
                                </div>
                                @if(isset($productDetail['feature_tags']) &&
                                count($productDetail['feature_tags']) > 0)
                                <div class="product_featured_cat_icon_list">
                                    <div class="product_featured_cat_icon">
                                        @foreach($productDetail['feature_tags'] as $tags)
                                        <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="product-body">
                                    <div class="product_name">{{$recentselling['product_name']}}</div>
                                    
                                </div>
                            </a>
                            <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                <span>
                                    {{ trim($recentselling['quantity'] ?? '') }} {{ trim($recentselling['unit'] ?? '') }}
                                </span>
                                @if(isset($recentselling['varients']) && count($recentselling['varients']) > 1)
                                <div class="change-qty" data-productDetail='@json($recentselling)'data-product-id="{{ trim($recentselling['product_id']) }}">
                                    <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                        {{ count($recentselling['varients']) }} options
                                        <img class="varient-down-arrow" src="{{ asset('assets/images/chevron.svg') }}" alt="down-arrow" style="width: 12px; height: 12px;">
                                    </span>
                                </div>
                                @endif
                            </div>
                            <div class="product-footer">
                                <div class="product_detail">
                                    <p class="offer-price">AED
                                        <span>{{number_format($recentselling['price'], 2)}}</span><br>
                                        @if ($recentselling['price'] != $recentselling['mrp'])
                                        <span class="regular-price">AED
                                            <span>{{number_format($recentselling['mrp'], 2)}}</span></span>
                                    </p>
                                    @endif
                                </div>
                                <div class="cart_btn" data-product-id="{{ trim($recentselling['product_id']) }}" data-productdetail='@json($recentselling)'>
                                    <div class="qtyBox"
                                        data-varient-id="{{ trim($recentselling['varient_id']) }}">
                                        <button class="qty-btn qty-btn-minus change-qty" type="button"
                                            data-productDetail='@json($recentselling)'
                                            data-change="-1">-</button>
                                        <input type="text" name="qty"
                                            value="{{ trim($recentselling['total_cart_qty']) }}" id="totalCartQTY"
                                            class="input-qty input-rounded" min="0">
                                        <input type="hidden" name="stock" id="stock"
                                            value="{{ trim($recentselling['stock']) }}">
                                        <button class="qty-btn qty-btn-plus change-qty" type="button"
                                            data-productDetail='@json($recentselling)'
                                            data-change="1">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                    @else
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    @if($recentselling['discountper'] > 0)
                                    <div class="discount_text">
                                        {{number_format($recentselling['discountper'], 0)}}%<span>Off</span></div>
                                    @endif
                                    @if($recentselling['country_icon'] != null || $recentselling['country_icon'] != "")
                                    <div class="country_flag">
                                        <img src="{{$recentselling['country_icon']}}" alt="flag">
                                    </div>
                                    @endif
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="{{ $recentselling['varient_id'] }}">
                                            <img class="wishlist-icon"
                                                src="{{ asset($recentselling['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png') }}"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                    <div class="product_wishlist">
                                        @if($recentselling['notify_me'] == 'false')
                                        <a href="javascript:void(0);" class="notify-me" data-notified="0"
                                            data-varient-id="{{ $recentselling['varient_id'] }}"
                                            data-product-id="{{ $recentselling['product_id'] }}">
                                            <img class="notify-icon" src="{{ asset('assets/images/notification.png') }}"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                        @else
                                        <a href="{{ENV('APP_URL')}}notify" data-notified="1">
                                            <img id="notifyMe-{{ $recentselling['varient_id'] }}"
                                                src="{{ asset('assets/images/notification-fill.png') }}" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('product-details') }}/{{ Str::slug($recentselling['product_name']) }}/{{ trim($recentselling['product_id']) }}">
                                <div class="product-img">
                                    <img class="img-fluid" src="{{$recentselling['product_image']}}" alt="product">
                                </div>
                            </a>
                            @if(isset($productDetail['feature_tags']) &&
                            count($productDetail['feature_tags']) > 0)
                            <div class="product_featured_cat_icon_list">
                                <div class="product_featured_cat_icon">
                                    @foreach($productDetail['feature_tags'] as $tags)
                                    <img class="img-fluid" src="{{ trim($tags['image']) }}" alt="Product">
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name">{{$recentselling['product_name']}}</div>
                                    <div class="product_weight"><span>{{$recentselling['quantity']}}
                                            {{$recentselling['unit']}}</span></div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title">Product Unavailable</div>
                                    @if($recentselling['notify_me'] == "true")
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
            </div>
        </div>
    </div>
</section>
@endif
<!-- TRENDING PRODUCTS SECTION END -->
<!-- EXPLORE BY BRAND SECTION START Done -->
@if(isset($oneAPIList['brand']) && count($oneAPIList['brand']) > 0)
<section class="top-category section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Explore by Brands</h5>
                    <a class="float-right text-secondary" href="{{ENV('APP_URL')}}all-brands">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-brands">
                    @foreach($oneAPIList['brand'] as $brand)
                    <div class="item">
                        <div class="brand-item">
                            <a href="{{ENV('APP_URL')}}brand-product-list?name={{Str::slug($brand['title'])}}&id={{$brand['cat_id']}}">
                                <img class="img-fluid" src="{{$brand['image']}}" alt="Product">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- EXPLORE BY BRAND SECTION END -->

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

function openOrderPage() {
    // Save selected tab to localStorage
    localStorage.setItem("selectedOrderTab", "1");
    navigateToNextPage(href = '{{ env('
        APP_URL ') }}my-orders?tab=1');

}

function navigateToNextPage(url) {
    const nextPageUrl = url;
    window.location.href = nextPageUrl;
    // console.log(window.location.href);
}
</script>



@include('footer')

@if(isset($oneAPIList['popup_banner']) && count($oneAPIList['popup_banner']) > 0)
<!-- ONLOAD MODEL START -->
<div class="modal" id="onload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="row">
                <div class="col-lg-12">
                    <div class="loginBox text-center">
                        <div class="trialpack_bannerBox ">
                            @if(isset($oneAPIList['popup_banner']))
                            <div class="banner_img trialpackImg"
                                onclick="openPopUPScreen('{{ $oneAPIList['popup_banner']['type'] ?? '' }}', '{{ $oneAPIList['popup_banner']['banner_id'] ?? '' }} ' , '{{ $oneAPIList['popup_banner']['banner_name'] ?? '' }}')">
                                <a>
                                    <img class="img-fluid" src="{{ $oneAPIList['popup_banner']['banner_image'] }}"
                                        alt="{{ $oneAPIList['popup_banner']['banner_image'] }}">
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Banner Click start...G1 -->
<script>
  function openBannerProductList(baseUrl, bannerId, bannerType, bannerName) {
      const nameStr = (bannerName != null && String(bannerName)) ? String(bannerName) : '';
      if (nameStr.toLowerCase() === "refer") {
            if(currentUserID == ''){
                Swal.fire({
                  title: "{{ env('GUESTMSG') }}", 
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Sign Up",
                  cancelButtonText: "OK",
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#aaa",
                  reverseButtons: true, 
                }).then((result) => {
                  if (result.isConfirmed) {
                    const modalEl = document.getElementById("onload");
                    const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modalInstance.hide();
                     $('#login').modal('show');
                          }
                });
            } else {
                const referralCode = @json($referralCode);
                const referralText = @json($referralText);
                 const shareText = referralText + " Tap link to download app - https://www.quickart.ae/SignUpScreen?refCode=" + referralCode;
                //  console.log("Could not copy text:", shareText);
                //  console.log("Could not copy text:", referralText);
                  navigator.clipboard.writeText(shareText).then(() => {
                    alert("Referral link copied!");
                  }).catch(err => {
                    console.error("Could not copy text:", err);
                  });
            }
          
      } else {
            const finalUrl = `${baseUrl}?banner-id=${encodeURIComponent(bannerId)}&banner-type=${encodeURIComponent(bannerType)}`;
            console.log("Navigating to:", finalUrl);
            window.location.href = finalUrl; 
      }
    
  }
</script>
<!-- Banner Click END -->

<script>
window.onload = function() {
    @if(empty(session('user_id')))
    {{-- Guest: prompt sign-in on homepage load; do not show marketing popup banner --}}
    if (typeof jQuery !== 'undefined' && jQuery('#login').length) {
        jQuery('#login').modal('show');
    }
    @else
    if (!sessionStorage.getItem("modalShown")) {
        var onloadEl = document.getElementById("onload");
        if (onloadEl) {
            var modal = new bootstrap.Modal(onloadEl);
            modal.show();
            sessionStorage.setItem("modalShown", "true");
        }
    }
    @endif
};

function openPopUPScreen(type, bannerId, title) {
    if (type === 'search') {
        const baseUrl = "{{ env('APP_URL') }}searchProductList";
        const cleanBannerId = String(bannerId).trim();
        const cleanTitle = String(title)
            .trim()
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');

        const fullUrl = `${baseUrl}?banner_id=${cleanBannerId}&title=${cleanTitle}`;
        window.location.href = fullUrl;
    } else if (type === 'trial') {
        if(currentUserID == ''){
             action = 'trailpack';
             const modalEl = document.getElementById("onload");
            const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modalInstance.hide();
             $('#login').modal('show');
        }else{
            window.location.href="{{url('trial-pack')}}";
        }
    } else if (type === 'dashboard') {
         if (title.toLowerCase() === "refer") {
            if(currentUserID == ''){
                Swal.fire({
                  title: "{{ env('GUESTMSG') }}",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Sign Up",
                  cancelButtonText: "OK",
                  confirmButtonColor: "#3085D6",
                  cancelButtonColor: "#aaa",
                  reverseButtons: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    const modalEl = document.getElementById("onload");
                    const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modalInstance.hide();
                     $('#login').modal('show');
                          }
                });
            } else {
                const referralCode = @json($referralCode);
                const referralText = @json($referralText);
                 const shareText = referralText + " Tap link to download app - https://www.quickart.ae/SignUpScreen?refCode=" + referralCode;
                //  console.log("Could not copy text:", shareText);
                //  console.log("Could not copy text:", referralText);
                  navigator.clipboard.writeText(shareText).then(() => {
                    alert("Referral link copied!");
                  }).catch(err => {
                    console.error("Could not copy text:", err);
                  });
            }
        }else {
            const modalEl = document.getElementById("onload");
            const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modalInstance.hide();
            sessionStorage.setItem("modalShown", "true");
            
        }
        
    } else if (type === 'offers') {
         window.location.href="{{url('offers')}}";
    }
}




function navigateToNextPage(url) {
    const nextPageUrl = url;
    window.location.href = nextPageUrl;
}
</script>
<!-- ONLOAD MODAL END -->

<!-- SNEAKY BANNER LOCATION SCRIPT START -->
<script>
function openSneakyBanner(bannerName) {
      if (bannerName.toLowerCase() === "refer") {
            if(currentUserID == ''){
                Swal.fire({
                  title: "{{ env('GUESTMSG') }}", 
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Sign Up",
                  cancelButtonText: "OK",
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#aaa",
                  reverseButtons: true, 
                }).then((result) => {
                  if (result.isConfirmed) {
                    const modalEl = document.getElementById("onload");
                    const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modalInstance.hide();
                     $('#login').modal('show');
                          }
                });
            } else {
                const referralCode = @json($referralCode);
                const referralText = @json($referralText);
                 const shareText = referralText + " Tap link to download app - https://www.quickart.ae/SignUpScreen?refCode=" + referralCode;
                //  console.log("Could not copy text:", shareText);
                //  console.log("Could not copy text:", referralText);
                  navigator.clipboard.writeText(shareText).then(() => {
                    alert("Referral link copied!");
                  }).catch(err => {
                    console.error("Could not copy text:", err);
                  });
            }
          
      } else {
     navigator.geolocation.getCurrentPosition(
        function (position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            console.log('Geolocation :', lat, lng);
        //    const fullUrl = `{{ENV('APP_URL')}}product-list?screen_name=sneaky_banner&lat=${lat}&lng=${lng}`;
        const fallbackLat = 25.2048;
        const fallbackLng = 55.2708;
        const fullUrl = `{{ENV('APP_URL')}}product-list?screen_name=sneaky_banner&lat=${fallbackLat}&lng=${fallbackLng}`;
        navigateToNextPage(href = fullUrl);
        },
        function (error) {
            console.error('Geolocation error:', error.message);
            const fallbackLat = 25.2048;
        const fallbackLng = 55.2708;
        const fullUrl = `{{ENV('APP_URL')}}product-list?screen_name=sneaky_banner&lat=${fallbackLat}&lng=${fallbackLng}`;
        navigateToNextPage(href = fullUrl);
        },
        {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0,
        }
     )
    }
}
</script>

<!-- SNEAKY BANNER LOCATION SCRIPT END -->

<!-- OFFERS BANNER SLIDER START -->
<script>
    const sliderBox = document.querySelector('.offer_sliderBox');

    // Arrow key scrolling
    window.addEventListener('keydown', function(event) {
        if (event.key === 'ArrowRight') {
            sliderBox.scrollBy({ left: 100, behavior: 'smooth' });
        }
        if (event.key === 'ArrowLeft') {
            sliderBox.scrollBy({ left: -100, behavior: 'smooth' });
        }
    });

    // Mouse drag scrolling
    let isDown = false;
    let startX;
    let scrollLeft;

    sliderBox.addEventListener('mousedown', (e) => {
        isDown = true;
        sliderBox.classList.add('active'); // optional: you can style .active for cursor change
        startX = e.pageX - sliderBox.offsetLeft;
        scrollLeft = sliderBox.scrollLeft;
    });

    sliderBox.addEventListener('mouseleave', () => {
        isDown = false;
        sliderBox.classList.remove('active');
    });

    sliderBox.addEventListener('mouseup', () => {
        isDown = false;
        sliderBox.classList.remove('active');
    });

    sliderBox.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - sliderBox.offsetLeft;
        const walk = (x - startX) * 2; // multiplier controls speed
        sliderBox.scrollLeft = scrollLeft - walk;
    });
    
    $(document).on('click','.btn-trail-home',function(){
        if(currentUserID == ''){
             action = 'trailpack';
             $('#login').modal('show');
        }else{
            window.location.href="{{url('trial-pack')}}";
        }
    });
</script>
<!-- OFFERS BANNER SLIDER END -->

<script>
  // This ensures the page reloads when the user navigates back
  window.addEventListener("pageshow", function (event) {
    if (event.persisted) {
      window.location.reload();
    }
  });
</script>