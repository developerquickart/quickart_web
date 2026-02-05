<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="account-page section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5"> Order Details</h5>
                </div>
                
                
                <?php
                // echo "<pre>";
                // print_r($dailyOrderDetailsList['data']);
                ?>
                
                <?php if(isset($dailyOrderDetailsList['data'])): ?>
                <div class="daily_order_detailsBox">
                    <div class="row ">
                        <div class="col-lg-6">
                            <div class="order_detailsMainbox position__sticky">
                                <div class="order_detailbox">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="your_order_details_box">
                                                <div class="sub_order_details_heading">Your Order Details:</div>
                                                <ul class="order_details_list">
                                                    <li>Order ID:
                                                        <span><?php echo e($dailyOrderDetailsList['data']['group_id']); ?></span>
                                                    </li>
                                                    <li>Delivery Date :
                                                        <span><?php echo e($dailyOrderDetailsList['data']['delivery_date']); ?></span>
                                                    </li>
                                                    <li>Order total : <span>AED
                                                            <?php if($dailyOrderDetailsList['data']['order_type'] == 'trail'): ?>
                                                            <?php echo e(number_format($dailyOrderDetailsList['data']['total_price'], 2)); ?>

                                                            <?php else: ?>
                                                            <?php echo e(number_format($dailyOrderDetailsList['data']['price_without_delivery'], 2)); ?>

                                                            <?php endif; ?>
                                                            </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="shipping_order_box">
                                                <div class="sub_order_details_heading">Shipping Address:</div>
                                                <ul class="order_details_list">
                                                    <li>Delivery To: <span>
                                                            <?php echo e($dailyOrderDetailsList['data']['address_name']); ?></span>
                                                    </li>
                                                    <li>Address :
                                                        <span><?php echo e($dailyOrderDetailsList['data']['delivery_address']); ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_track_mainBox">
                                    <div class="headerBox">
                                        <div class="order-subheading">Order Track</div>
                                        <?php if($dailyOrderDetailsList['data']['order_status'] == "Completed"): ?>
                                        <?php
                                            $jsonData = json_encode($dailyOrderDetailsList['data']);
                                            $encodedData = urlencode($jsonData);
                                        ?>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>rating-reviews?screenName=dailyreview&data=<?php echo e($encodedData); ?>">
                                        <div> <span style="font-weight: 500;  color: green">Rate Order</span> </div>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($dailyOrderDetailsList['data']['order_status'] != "Cancelled" && $dailyOrderDetailsList['data']['order_status'] != "Payment_failed"): ?>
                                    
                                    <?php
                                    $currentStatus = $dailyOrderDetailsList['data']['order_status'];
                                    $statusFlow = ["Placed", "Confirmed", "Out_For_Delivery", "Completed"];
                                    $currentStatusIndex = array_search($currentStatus, $statusFlow);
                                    ?>

                                    <div class="order_track_listBox">
                                        <div class="track_list">
                                            <?php $__currentLoopData = $statusFlow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div
                                                class="track_list_check <?php echo e($index <= $currentStatusIndex ? 'track_select' : ''); ?>">
                                                <img src="<?php echo e(asset('assets/images/check.png')); ?>" alt="Check"
                                                    class="img-fluid">
                                            </div>
                                            <?php if($index < count($statusFlow) - 1): ?> 
                                            <div class="track_list_sept <?php echo e($index < $currentStatusIndex ? 'track_select' : ''); ?>"> </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </div>
                                        <div class="track_list status_list">
                                            <?php $__currentLoopData = $statusFlow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="track_status list<?php echo e($index + 1); ?>" <?php if($currentStatusIndex == $index): ?> style="color: green;" <?php endif; ?>>
                                                <?php if($status == "Out_For_Delivery"): ?>
                                                Out For Delivery
                                                <?php elseif($status == "Confirmed"): ?>
                                                Processed
                                                <?php else: ?>
                                                <?php echo e($status); ?>

                                                <?php endif; ?>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if($dailyOrderDetailsList['data']['order_status'] == "Cancelled" || $dailyOrderDetailsList['data']['order_status'] == "Payment_failed"): ?>
                                    <div class="order_cancel_statusBox">
                                        <div class="order_cancelled_box">
                                            <div class="order_cancelled_img">
                                                <img src="<?php echo e(asset('assets/images/failed.png')); ?>" alt="failed"
                                                    class="img-fluid">
                                            </div>
                                            <div class="order_cancelled_text">
                                                <div class=""> 
                                                <?php if($dailyOrderDetailsList['data']['order_status'] == "Cancelled"): ?>
                                                Order Cancelled
                                                <?php else: ?>
                                                Payment Failed
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="d-flex gap-2 align-items-end flex-wrap">
                                        <?php if($dailyOrderDetailsList['data']['order_status'] == "Completed"): ?>
                                        <div class="cancelBtn text-end"
                                             onclick="openInvoice('<?php echo e($dailyOrderDetailsList['data']['prodwiseinvoice']); ?>')">
                                                <div class="cancel_orderBtn">
                                                    <img src="<?php echo e(asset('assets/images/invoice.png')); ?>" alt="Buy"
                                                        class="img-fluid">
                                                    View Order Invoice
                                                </div>
                                        </div>
                                        <?php endif; ?>
                                         <?php    // dd($dailyOrderDetailsList); ?>
                                        <?php if($dailyOrderDetailsList['data']['order_status'] == "Completed"): ?>
                                       
                                        <div class="cancel_orderBtn"
                                            onclick="openImagePopup('<?php echo e($dailyOrderDetailsList['data']['delivery_proof']); ?>')">
                                            <img src="<?php echo e(asset('assets/images/boxes.png')); ?>" alt="Buy" class="img-fluid"
                                                style="width: 50px;">
                                            Delivery Proof
                                        </div>
                                       

                                        <div class="buyAgain_btn"
                                            onclick="buyAgain('<?php echo e($dailyOrderDetailsList['data']['cart_id']); ?>')"><img
                                                src="<?php echo e(asset('assets/images/buyagain.png')); ?>" alt="Buy" class="img-fluid">
                                            Buy Again
                                        </div>
                                        <?php endif; ?>
                                        <div class="cancelBtn text-end">
                                            <?php if($dailyOrderDetailsList['data']['order_status'] == "Pending"): ?>
                                            <div class="cancel_order_btn">
                                                <div class="cancel_orderBtn"
                                                    onclick="getCancelReasonList('<?php echo e($dailyOrderDetailsList['data']['group_id']); ?>', 'daily', '0')">
                                                    <img src="<?php echo e(asset('assets/images/order-cancel.png')); ?>" alt="Cancel"
                                                        class="img-fluid"> Cancel Order
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="daily_payment_detail_section">
                                <div class="order-subheading">Payment Details</div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Total Value:
                                                <span>AED
                                                    <?php echo e(number_format(($dailyOrderDetailsList['data']['total_products_mrp']+$dailyOrderDetailsList['data']['trail_discount']), 2)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Payment method:
                                                <span><?php echo e($dailyOrderDetailsList['data']['payment_method']); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Delivery fees: <span>AED
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['delivery_charge'], 2)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>VAT: <span>AED
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['vat'], 2)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Delivery Partner Tip: <span>AED
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['del_partner_tip'], 2)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php if($dailyOrderDetailsList['data']['payment_method'] == "COD"): ?>

                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>COD Extra Charges: <span>AED
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['cod_charges'], 2)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    <div class="col-12">
                                        <div style="border-bottom: 0.5px solid #000; margin: 3px 0;"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Order Value:
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li><span>AED
                                                    <?php if($dailyOrderDetailsList['data']['order_type'] == 'trail'): ?>
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['price_without_delivery'], 2)); ?>

                                                    <?php else: ?>
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['total_price'], 2)); ?>

                                                    <?php endif; ?>
                                                    

                                                    </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php if($dailyOrderDetailsList['data']['order_type'] == 'trail'): ?>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Trial pack discount:
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li><span style="color: green;">AED
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['trail_discount'], 2)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php else: ?>
                                      <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li>Wallet Applied:
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li><span style="color: green;">AED
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['paid_by_wallet'], 2)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class=" col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                        <li>Coupon Applied: <?php if($dailyOrderDetailsList['data']['coupon_code'] != null): ?> <span style="color: green;">(<?php echo e($dailyOrderDetailsList['data']['coupon_code']); ?>)</span> <?php endif; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list">
                                            <li><span style="color: green;">AED
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['coupon_discount'], 2)); ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php endif; ?>



                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="order_details_list payment">
                                            <li>Amount to be Paid: </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <ul class="">
                                            <li><span><strong>
                                                        AED
                                                    <?php if($dailyOrderDetailsList['data']['order_type'] == 'trail'): ?>
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['total_price'], 2)); ?>

                                                    <?php else: ?>
                                                    <?php echo e(number_format($dailyOrderDetailsList['data']['total_price'] - $dailyOrderDetailsList['data']['coupon_discount'] - $dailyOrderDetailsList['data']['paid_by_wallet'], 2)); ?>

                                                    <?php endif; ?>
                                                    </strong>
                                                </span> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                <?php
                                    $special = $dailyOrderDetailsList['data']['special_instruction'] ?? '';
                                    $partner = $dailyOrderDetailsList['data']['delivery_partner_instruction'] ?? '';
                                ?>
                                
                                <?php if(!empty($special) || !empty($partner)): ?>
                                <div class="daily_payment_detail_section">
                                    <div class="order-subheading">Order Details</div>
                                    <ul class="order_details_list">
                                        <li>Order Instruction:
                                            <span>
                                                <?php echo e($dailyOrderDetailsList['data']['special_instruction']); ?></span>
                                        </li>
                                    </ul>
                                    <ul class="order_details_list">
                                        <li>Delivery Partner Instruction:
                                            <span><?php echo e($dailyOrderDetailsList['data']['delivery_partner_instruction']); ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if(isset($dailyOrderDetailsList['data']['data']) &&
                        count($dailyOrderDetailsList['data']['data']) > 0): ?>
                        <div class="col-lg-6">
                            <?php $__currentLoopData = $dailyOrderDetailsList['data']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="order_infobox ">
                                <div class="ordered_product">
                                    <div class="product_imgbox">
                                        <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($productList['product_name'])); ?>/<?php echo e(trim($productList['product_id'])); ?>">
                                            <img src="<?php echo e($productList['varient_image']); ?>" alt="" class=" img-fluid">
                                        </a>
                                    </div>
                                    <div class="order_info">
                                        <div class="order_product_name"><?php echo e($productList['product_name']); ?></div>
                                        <div class="order_details">
                                            <div class="row">
                                                <ul>
                                                    <li>Product Order ID: <span><?php echo e($productList['order_cart_id']); ?></span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <ul>
                                                        <li>Quantity: <span><?php echo e($productList['qty']); ?></span></li>
                                                        <li>Weight: <span><?php echo e($productList['unit']); ?></span></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <ul>
                                                        <li>Discounted Price: <span class="price">AED
                                                                <?php echo e(number_format($productList['price'], 2)); ?></span></li>
                                                        <li>Amount: <span class="price">AED
                                                                <?php echo e(number_format($productList['price'] * $productList['qty'], 2)); ?></span>
                                                        </li>
    
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <ul>
                                                <!--<li>Discounted Price:-->
                                                <!--        <span>AED <?php echo e(number_format($productList['price'], 2)); ?></span>-->
                                                <!--    </li>-->
                                                    <li>Delivery Time:
                                                        <span><?php echo e($productList['prodwisetime_slot']); ?></span>
                                                    </li>
                                                    <?php if($productList['order_status_delivery'] == "Cancelled" ): ?>
                                                    <li>Reason:
                                                        <span><?php echo e($productList['cancel_reason']); ?></span>
                                                    </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <ul>
                                                    <?php if($productList['product_feature_value'] != "" || $productList['product_feature_value'] != null ): ?>
                                                    <li>Your Packaging Preference:
                                                        <span><?php echo e($productList['product_feature_value']); ?></span>
                                                    </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="order_daily_detail_mainbox">
                                                    <ul>
                                                        <li>
                                                            <?php
                                                                $hasOffer = false;
                                                                    foreach ($dailyOrderDetailsList['data']['data'] as $product) {
                                                                        $offerValue = $product['is_offer_product'] ?? 0;
                                                            
                                                                        if ($offerValue == 1 || $offerValue === '1') {
                                                                            $hasOffer = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                
                                                            ?>
                                                         
                                                                <?php if($productList['order_status_delivery'] == "Pending" && $hasOffer == false && $dailyOrderDetailsList['data']['order_type'] != 'trail' ): ?>
                                                            <div class="cancel_order_btn">
                                                                <div class="cancel_orderBtn"
                                                                    onclick="getCancelReasonList('<?php echo e($productList['order_cart_id']); ?>', 'dailyProduct', '0')">
                                                                    <img src="<?php echo e(asset('assets/images/order-cancel.png')); ?>"
                                                                        alt="Cancel" class="img-fluid"> Cancel Product
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li>
                                                        <div class="cancel_order_btn" style="display: flex; align-items: center; gap: 8px;">
                                                            <div class="daily-order-status-btn1"
                                                                style="color: <?php echo e(getProdOrderStatusColor($productList['prodorder_status'])); ?>;">
                                                                <?php echo e($productList['prodorder_status'] == 'Out_For_Delivery' ? "Out For Delivery" : getOrderStatus($productList['prodorder_status'])); ?>

                                                            </div>
    
                                                            <?php if($productList['prodorder_status'] == 'Cancelled'): ?>
                                                                <img src="<?php echo e(asset('assets/images/cancel.png')); ?>" alt=""
                                                                    style="width: 15px; height: 15px;">
                                                            <?php endif; ?>
                                                            <?php if($productList['prodorder_status'] == 'Completed'): ?>
                                                            <img src="<?php echo e(asset('assets/images/Success.png')); ?>" alt=""
                                                                style="width: 15px; height: 15px;">
                                                            <?php endif; ?>
                                                        </div>
                                                        </li>
                                                      
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Image Popup Modal -->
    <!--<div id="imagePopup" class="popup-container" onclick="closeImagePopup()">-->
    <!--    <div class="popup-content">-->
    <!--        <span class="close-btn" onclick="closeImagePopup()">&times;</span>-->
    <!--        <img id="popupImage" src="" alt="Delivery Proof">-->
    <!--    </div>-->
    <!--</div>-->
    <div class="modal fade" id="imagePopup" tabindex="-1" aria-labelledby="imagePopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagePopupLabel">Delivery Proof</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="popupImage" src="" alt="Delivery Proof" class="img-fluid" />
                </div>

            </div>
        </div>
    </div>
    <script>
    function openImagePopup(imageUrl) {
        if (imageUrl === null || imageUrl === '') {
                Swal.fire({
                icon: 'warning',
                title: 'QuicKart',
                text: 'Delivery proof not available'
            });
        } else {
        const popupImage = document.getElementById('popupImage');
        popupImage.src = imageUrl;

        const myModal = new bootstrap.Modal(document.getElementById('imagePopup'));
        myModal.show();
        }
    }
    </script>
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    function openInvoice(data) {
        console.log("Invoice data:", data);
        if (data === null || data === '') {
            Swal.fire({
                icon: 'warning',
                title: 'QuicKart',
                text: 'Order invoice not available'
            });
        } else {
           window.open(data, '_blank');
        }
    }
</script>
<script>
// function openImagePopup(imageSrc) {
//     let popup = document.getElementById("imagePopup");
//     document.getElementById("popupImage").src = imageSrc;
//     popup.classList.add("show-popup"); // Show modal
// }

// function closeImagePopup() {
//     let popup = document.getElementById("imagePopup");
//     popup.classList.remove("show-popup"); // Hide modal
// }
 </script>
<!-- Nevigrate to screen -->
<script>
function navigateToNextPage(url) {
    const nextPageUrl = url;

    window.location.href = nextPageUrl;
    console.log(window.location.href);
}
</script>
<!-- Buy again api call...G1 -->
<script>
function buyAgain(cartId) {
    console.log("Buy Again clicked for cart ID:", cartId);
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>buyAgainAPICall";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            cartID: cartId,
            screenName: "daily",
            _token: _token,
        },
        success: function(result) {
            gtag('event', 'buy_againDailyW', {
                  cartID: cartId,
                  currency: 'AED',
                  type: "daily",
                  items: [],
                  debug_mode: false
                });
            console.log(result);
            localStorage.setItem("selectedTab", "1");
            navigateToNextPage(href = "<?php echo e(ENV('APP_URL')); ?>cart?tab=1");



        },
        error: function(xhr, status, error) {
            console.error("XHR:", xhr);
            console.error("Status:", status);
            console.error("Error:", error);
            alert("An error occurred: " + xhr.responseText);
        },
    });

}
</script>
<!-- Nevigrate to screen -->
<script>
function navigateToNextPage(url) {
    const nextPageUrl = url;

    window.location.href = nextPageUrl;
    // console.log(window.location.href);
}
</script><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Orders/DailyOrders/daily-order-details.blade.php ENDPATH**/ ?>