@include('header')
<section class="rating_review_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="rating_review_mainbox">
                    <h5 class="heading-design-h5 mb-1">{{ $productName }}</h5>
                    <div class="add_address_subheading">
                        Ratings and Reviews
                    </div>
                    @if(isset($ratingReviewList['data']))
                    @php
                        $totalRatings = count($ratingReviewList['data']);
                        $reviewsWithDescription = count(array_filter($ratingReviewList['data'], function ($item) {
                            return !empty(trim($item['description'] ?? ''));
                        }));
                    @endphp
                    <p><strong>{{ $totalRatings }}</strong> total ratings,
                        <strong>{{ $reviewsWithDescription }}</strong> with review
                    </p>

                    <div class="rating_review_mainBox1">
                        @foreach($ratingReviewList['data'] as $product)
                            <div class="rating_review_list1">
                                <div class="rating_profile d-flex align-items-center gap-2">
                                    @if (strpos($product['user_image'], '/N/A') !== false) 
                                        <img src="assets/images/profile.webp" alt="profile" class="img-fluid product_rating_profile_img">
                                    @else
                                        <img src="{{$product['user_image']}}" alt="profile" class="img-fluid product_rating_profile_img">
                                    @endif
                                    <div class="rating_name">{{ $product['name'] }}</div>
                                </div>
                                <div class="ratingBox">
                                    <div class="rate" style="direction: rtl; unicode-bidi: bidi-override;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $product['rating'])
                                                <span title="{{ $i }} star" style="color: #FEDE33; font-size: 24px;">★</span>
                                            @else
                                                <span title="{{ $i }} star" style="color: #ccc; font-size: 24px;">★</span>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="rating_count">Verified Purchase</div>
                                </div>
                                <div class="review_time">Review on <span>{{getTimeAgo($product['created_at'])}}</span></div>
                                <div class="review_text">{{ $product['description'] }}</div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')