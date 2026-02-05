<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="rating_review_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="rating_review_mainbox">
                    <h5 class="heading-design-h5">Ratings and Reviews</h5>
                    <div class="rating_review_order">
                        <div class="rating_review_logo">
                            <img src="<?php echo e(asset('assets/images/delivery-boy.png')); ?>" alt="Delivary image"
                                class="img-fluid">
                        </div>
                        <div class="rating_review_content">
                            <div class="rating_review_name">
                                How was your delivery experience?
                            </div>

                            <?php
                                $orderList = json_decode(urldecode(request()->query('data')), true);
                            
                                //$drating = isset($orderList['drating']) ? intval($orderList['drating']) : 0;
                                //$dreview = isset($orderList['dreview']) ? $orderList['dreview'] : '';
                                if(\Request::get('screenName') == 'subreview'){
                                //dd($reviewProductList);
                                    $drating = isset($reviewProductList['data'][0]['data'][0]['drating']) ? intval($reviewProductList['data'][0]['data'][0]['drating']) : 0;
                                    $dreview = isset($reviewProductList['data'][0]['data'][0]['dreview']) && $reviewProductList['data'][0]['data'][0]['dreview'] != 'N/A' ? $reviewProductList['data'][0]['data'][0]['dreview'] : '';
                                }else{
                                    $drating = isset($reviewProductList['data']['drating']) ? intval($reviewProductList['data']['drating']) : 0;
                                    $dreview = isset($reviewProductList['data']['dreview']) && $reviewProductList['data']['dreview'] != 'N/A' ? $reviewProductList['data']['dreview'] : '';
                                }
                                
                            ?>
                            <div class="rate">
                                <input type="radio" id="star5" name="star" value="5" <?php echo e($drating == 5 ? 'checked' : ''); ?> />
                                <label for="star5" title="5 stars">★</label>

                                <input type="radio" id="star4" name="star" value="4" <?php echo e($drating == 4 ? 'checked' : ''); ?> />
                                <label for="star4" title="4 stars">★</label>

                                <input type="radio" id="star3" name="star" value="3" <?php echo e($drating == 3 ? 'checked' : ''); ?> />
                                <label for="star3" title="3 stars">★</label>

                                <input type="radio" id="star2" name="star" value="2" <?php echo e($drating == 2 ? 'checked' : ''); ?> />
                                <label for="star2" title="2 stars">★</label>

                                <input type="radio" id="star1" name="star" value="1" <?php echo e($drating == 1 ? 'checked' : ''); ?> />
                                <label for="star1" title="1 star">★</label>
                            </div>

                            <form action="">
                                <div class="form-group">
                                    <?php if($dreview != '' && $dreview != 'N/A'): ?>
                                        <textarea id="delivery_review" class="form-control" name="delivery_review"
                                            placeholder="Add your review" readonly><?php echo e($dreview); ?></textarea>
                                    <?php else: ?> 
                                        <input type="text" id="order_review" class="form-control" name="delivery_review"
                                            placeholder="Add your review">
                                    <?php endif; ?>
                                </div>
                                <?php if($dreview == ''|| $dreview == 'N/A'): ?>
                                    <div class="locate_map_button">
                                        <a onclick="reviewAddForOrder(this)" data-product='<?php echo json_encode($orderList, 15, 512) ?>'>Submit</a>
                                    </div>
                                <?php endif; ?>
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

                            <?php $__currentLoopData = $screenName == 'dailyreview' ? $reviewProductList['data']['data'] : $reviewProductList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="rating_review_card">
                                    <div class="rating_review_logo">
                                        <img src="<?php echo e($screenName == 'dailyreview' ? ($product['varient_image'] ?? 'fallback.jpg') : ($product['data'][0]['varient_image'] ?? 'fallback.jpg')); ?>"
                                            alt="Delivary image" class="img-fluid">
                                    </div>
                                    <div class="rating_review_content">
                                        <div class="rating_review_name">
                                            <?php echo e($screenName == 'dailyreview' ? $product['product_name'] : $product['data'][0]['product_name']); ?>

                                        </div>
                                        <div class="rate">
                                            <input type="radio" id="star15_<?php echo e($index); ?>" name="star_<?php echo e($index); ?>" value="5"
                                                <?php echo e(($screenName == 'dailyreview' ? $product['rating'] : $product['data'][0]['rating']) == 5 ? 'checked' : ''); ?> />
                                            <label for="star15_<?php echo e($index); ?>" title="5 stars">★</label>

                                            <input type="radio" id="star14_<?php echo e($index); ?>" name="star_<?php echo e($index); ?>" value="4"
                                                <?php echo e(($screenName == 'dailyreview' ? $product['rating'] : $product['data'][0]['rating']) == 4 ? 'checked' : ''); ?> />
                                            <label for="star14_<?php echo e($index); ?>" title="4 stars">★</label>

                                            <input type="radio" id="star13_<?php echo e($index); ?>" name="star_<?php echo e($index); ?>" value="3" <?php echo e(($screenName == 'dailyreview' ? $product['rating'] : $product['data'][0]['rating']) == 3 ? 'checked' : ''); ?> />
                                            <label for="star13_<?php echo e($index); ?>" title="3 stars">★</label>

                                            <input type="radio" id="star12_<?php echo e($index); ?>" name="star_<?php echo e($index); ?>" value="2" <?php echo e(($screenName == 'dailyreview' ? $product['rating'] : $product['data'][0]['rating']) == 2 ? 'checked' : ''); ?> />
                                            <label for="star12_<?php echo e($index); ?>" title="2 stars">★</label>

                                            <input type="radio" id="star11_<?php echo e($index); ?>" name="star_<?php echo e($index); ?>" value="1" <?php echo e(($screenName == 'dailyreview' ? $product['rating'] : $product['data'][0]['rating']) == 1 ? 'checked' : ''); ?> />
                                            <label for="star11_<?php echo e($index); ?>" title="1 star">★</label>
                                        </div>

                                        <form action="">
                                            <?php
                                                $reviewText = $screenName == 'dailyreview' 
                                                    ? ($product['review'] ?? '') 
                                                    : ($product['data'][0]['rating_description'] ?? '');
                                            ?>
                                            <div class="form-group">
                                                <?php if(!empty($reviewText) && $reviewText !== 'null'): ?>
                                                    <div><?php echo e($reviewText); ?></div>
                                                <?php else: ?>
                                                    <input type="text" id="pdelivery_review_<?php echo e($index); ?>" class="form-control"
                                                        name="delivery_review" placeholder="Add your review">
                                                <?php endif; ?>
                                            </div>
                                               <?php if(empty($reviewText) || $reviewText === 'null'): ?>
                                                <div class="locate_map_button">
                                                   <a onclick="addProductRatingReview(this, <?php echo e($index); ?>, '<?php echo e($screenName); ?>')"
                                                    data-productD="<?php echo e($screenName == 'dailyreview' ? json_encode($product) : json_encode($product['data'][0])); ?>">
                                                    Submit
                                                    </a>
                                                </div>
                                               <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            console.log('productData',productData);

            console.log("AJAX si:1", productData['cart_id']);
            const selected = document.querySelector('input[name="star"]:checked');
            let rating = selected ? selected.value : null;
            console.log("AJAX si:2", productData['subscription_id']);

            if (rating != null) {
                var _token = jQuery('meta[name="csrf-token"]').attr('content');
                var url = "<?php echo e(ENV('APP_URL')); ?>reviewAddedByOrder";
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
                            gtag('event', 'rate_review_orderW', {
                              cartID: productData['cart_id'],
                              rating: rating,
                              review: orderReview,
                              subscriptionID: productData['subscription_id'],
                              debug_mode: false 
                            });
                            Swal.fire({
                                title: response.message
                                , showDenyButton: false
                                , showCancelButton: false
                                , icon: "sucess"
                                , confirmButtonText: "OK"
                                ,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
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
                var url = "<?php echo e(ENV('APP_URL')); ?>reviewAddedByProduct";
                let orderReview = document.getElementById(`pdelivery_review_${selectedIndex}`).value;
            
                // console.log("AJAX si:2", orderReview);
                // var cartId = (screenname == 'dailyreview') ? productData['cart_id'] : productData['order_cart_id'];
                console.log(screenname,productData);
                jQuery.ajax({
                    url: url, method: "POST", data: {
                        cartID: productData['order_cart_id'] ? productData['order_cart_id'] : '',
                        rating: rating,
                        review: orderReview ? orderReview : '',
                        subscriptionID: productData['subscription_id'],
                        varientID: productData['varient_id'],
                        _token: _token
                    },

                    success: function (response) {
                        // console.log("AJAX Success:", btnName);
                        if (response.success == '1') {
                            gtag('event', 'rate_review_order_productW', {
                              cartID: productData['cart_id'],
                              rating: rating,
                              review: orderReview,
                              subscriptionID: productData['subscription_id'],
                              varientID: productData['varient_id'],
                              debug_mode: false 
                            });

                            Swal.fire({
                                title: response.message
                                , showDenyButton: false
                                , showCancelButton: false
                                , icon: "sucess"
                                , confirmButtonText: "OK"
                                ,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                 window.location.reload();

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
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Rating/rating-reviews.blade.php ENDPATH**/ ?>