@include('header')
<section class="rating_review_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="rating_review_mainbox">
                    <h5 class="heading-design-h5">Ratings and Reviews</h5>
                    <div class="rating_review_order">
                        <div class="rating_review_logo">
                            <img src="{{asset('assets/images/delivery-boy.png')}}" alt="Delivary image"
                                class="img-fluid">
                        </div>
                        <div class="rating_review_content">
                            <div class="rating_review_name">
                                How was your delivery experience?
                            </div>

                            @php
                                $orderList = json_decode(urldecode(request()->query('data')), true);
                                $drating = isset($orderList['drating']) ? intval($orderList['drating']) : 0;
                                $dreview = isset($orderList['dreview']) ? $orderList['dreview'] : '';
                            @endphp
                            <div class="rate">
                                <input type="radio" id="star5" name="star" value="5" {{ $drating == 5 ? 'checked' : '' }} />
                                <label for="star5" title="5 stars">★</label>

                                <input type="radio" id="star4" name="star" value="4" {{ $drating == 4 ? 'checked' : '' }} />
                                <label for="star4" title="4 stars">★</label>

                                <input type="radio" id="star3" name="star" value="3" {{ $drating == 3 ? 'checked' : '' }} />
                                <label for="star3" title="3 stars">★</label>

                                <input type="radio" id="star2" name="star" value="2" {{ $drating == 2 ? 'checked' : '' }} />
                                <label for="star2" title="2 stars">★</label>

                                <input type="radio" id="star1" name="star" value="1" {{ $drating == 1 ? 'checked' : '' }} />
                                <label for="star1" title="1 star">★</label>
                            </div>

                            <form action="">
                                <div class="form-group">
                                    @if ($dreview != '')
                                        <textarea id="delivery_review" class="form-control" name="delivery_review"
                                            placeholder="Add your review" readonly>{{ $dreview }}</textarea>
                                    @else 
                                        <input type="text" id="order_review" class="form-control" name="delivery_review"
                                            placeholder="Add your review">
                                    @endif
                                </div>
                                @if ($dreview == '')
                                    <div class="locate_map_button">
                                        <a onclick="reviewAddForOrder(this)" data-product='@json($orderList)'>Submit</a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="rating_review_mainbox">
                    <div class="rating_review_secondbox">
                        <div class="add_address_subheading">
                            Please tell us about items in your order
                        </div>
                        <div class="rating_review_second_cardbox">

                            @foreach($screenName == 'dailyreview' ? $reviewProductList['data']['data'] : $reviewProductList['data'] as $index => $product)
                                <div class="rating_review_card">
                                    <div class="rating_review_logo">
                                        <img src="{{ $screenName == 'dailyreview' ? ($product['varient_image'] ?? 'fallback.jpg') : ($product['product_image'] ?? 'fallback.jpg') }}"
                                            alt="Delivary image" class="img-fluid">
                                    </div>
                                    <div class="rating_review_content">
                                        <div class="rating_review_name">
                                            {{ $product['product_name'] }}
                                        </div>
                                        <div class="rate">
                                            <input type="radio" id="star15_{{$index}}" name="star_{{$index}}" value="5"
                                                {{$product['rating'] == 5 ? 'checked' : '' }} />
                                            <label for="star15_{{$index}}" title="5 stars">★</label>

                                            <input type="radio" id="star14_{{$index}}" name="star_{{$index}}" value="4"
                                                {{$product['rating'] == 4 ? 'checked' : '' }} />
                                            <label for="star14_{{$index}}" title="4 stars">★</label>

                                            <input type="radio" id="star13_{{$index}}" name="star_{{$index}}" value="3" {{ $product['rating'] == 3 ? 'checked' : '' }} />
                                            <label for="star13_{{$index}}" title="3 stars">★</label>

                                            <input type="radio" id="star12_{{$index}}" name="star_{{$index}}" value="2" {{ $product['rating'] == 2 ? 'checked' : '' }} />
                                            <label for="star12_{{$index}}" title="2 stars">★</label>

                                            <input type="radio" id="star11_{{$index}}" name="star_{{$index}}" value="1" {{ $product['rating'] == 1 ? 'checked' : '' }} />
                                            <label for="star11_{{$index}}" title="1 star">★</label>
                                        </div>

                                        <form action="">
                                            <div class="form-group">
                                                @if ($product['review'] != '')
                                                    <div>{{ $product['review'] }}</div>
                                                @else 
                                                    <input type="text" id="pdelivery_review_{{$index}}" class="form-control"
                                                        name="delivery_review" placeholder="Add your review">
                                                @endif
                                            </div>
                                            @if ($product['review'] == '')
                                                <div class="locate_map_button">
                                                    <a onclick="addProductRatingReview(this, {{ $index }}, '{{ $screenName }}')"
                                                        data-productD='@json($product)'>Submit</a>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const textarea = document.getElementById("delivery_review");
            if (!textarea) {
                return;
            }
            function autoResize() {
                textarea.style.height = "auto";
                textarea.style.height = textarea.scrollHeight + "px";
            }
            textarea.addEventListener("input", autoResize);
            autoResize();
        });



        // Api call for add reviewAddForOrder...G1
        function reviewAddForOrder(element) {

            let productData = JSON.parse(element.getAttribute("data-product"));

            console.log("AJAX si:1", productData['cart_id']);
            const selected = document.querySelector('input[name="star"]:checked');
            let rating = selected ? selected.value : null;
            console.log("AJAX si:2", productData['subscription_id']);

            if (rating != null) {
                var _token = jQuery('meta[name="csrf-token"]').attr('content');
                var url = "{{ENV('APP_URL')}}reviewAddedByOrder";
                let orderReview = document.getElementById("order_review").value;

                jQuery.ajax({
                    url: url, method: "POST", data: {
                        cartID: productData['cart_id'],
                        rating: rating,
                        review: orderReview,
                        subscriptionID: productData['subscription_id'],
                        _token: _token
                    },

                    success: function (response) {
                        // console.log("AJAX Success:", btnName);
                        if (response.success == '1') {

                            Swal.fire({
                                title: response.message
                                , showDenyButton: false
                                , showCancelButton: false
                                , icon: "sucess"
                                , confirmButtonText: "OK"
                                ,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                   // window.location.reload();
                                }
                            });

                        } else {
                            alert("Error: " + response.message);
                        }

                    }
                    , error: function (xhr, status, error) {

                        alert("An error occurred: " + xhr.responseText);
                    }
                    ,
                });
            } else if (rating === null) {
                Swal.fire({
                    title: "Please select rating",
                    icon: "warning",
                    draggable: true
                });

            }
        }


        // Api call for add add product review and rating...G1
        function addProductRatingReview(element, selectedIndex, screenname) {

            let productData = JSON.parse(element.getAttribute("data-productD"));
            // console.log("AJAX si:3", selectedIndex);

            // console.log("AJAX si:1", productData['cart_id']);
            const selected = document.querySelector(`input[name="star_${selectedIndex}"]:checked`);
            let rating = selected ? selected.value : null;
            // console.log("AJAX si:2", rating);

            if (rating != null) {
                var _token = jQuery('meta[name="csrf-token"]').attr('content');
                var url = "{{ENV('APP_URL')}}reviewAddedByProduct";
                let orderReview = document.getElementById(`pdelivery_review_${selectedIndex}`).value;
            
                // console.log("AJAX si:2", orderReview);
                jQuery.ajax({
                    url: url, method: "POST", data: {
                        cartID: screenname == 'dailyreview' ? productData['order_cart_id'] : productData['cart_id'],
                        rating: rating,
                        review: orderReview,
                        subscriptionID: productData['subscription_id'],
                        varientID: productData['varient_id'],
                        _token: _token
                    },

                    success: function (response) {
                        // console.log("AJAX Success:", btnName);
                        if (response.success == '1') {

                            Swal.fire({
                                title: response.message
                                , showDenyButton: false
                                , showCancelButton: false
                                , icon: "sucess"
                                , confirmButtonText: "OK"
                                ,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // window.location.reload();

                                }
                            });

                        } else {
                            alert("Error: " + response.message);
                        }

                    }
                    , error: function (xhr, status, error) {

                        alert("An error occurred: " + xhr.responseText);
                    }
                    ,
                });
            } else if (rating === null) {
                Swal.fire({
                    title: "Please select rating",
                    icon: "warning",
                    draggable: true
                });

            }
        }

    </script>
</section>
@include('footer')