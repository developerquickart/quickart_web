<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Subscription Order</h5>
                </div>
                <?php if(isset($subscriptionOrderList['data']) && count($subscriptionOrderList['data']) > 0): ?>

                    <div class="sub_order_listBox">
                        <div class="row">
                            <?php $__currentLoopData = $subscriptionOrderList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6">
                                <div class="sub_order_list">
                                <div class="sub_order_details">
                                    <div class="" onclick="navigateToNextPage('<?php echo e(url(ENV('APP_URL') . 'subscription-order-product?group_id=' . $orderList['group_id'])); ?>')">
                                        <div class="sub_order_name" id="sgroup_id">Order ID
                                            <span>#<?php echo e($orderList['group_id']); ?></span>
                                        </div>
                                        <div class="sub_order_id">Order Date
                                            <span><?php echo e(date("d-m-Y", strtotime($orderList['order_date']))); ?></span>
                                        </div>
                                    </div>
                                    <div class="sub_order_btns">
                                         <?php if(isset($orderList['order_status']) && $orderList['order_status'] ==
                                        'Completed'): ?>
                                        <div class="buyAgain_btn" onclick="buyAgain()"><img
                                                src="<?php echo e(asset('assets/images/buyagain.png')); ?>" alt="" class="img-fluid">
                                            Buy Again</div>
                                        <?php endif; ?>
                                        <?php if(isset($orderList['si_order']) && $orderList['si_order'] == 'yes'): ?>
                                            <div class="change_card" data-bs-toggle="modal" data-bs-target="#cardModal" onclick="fetchCardList('<?php echo e($orderList['si_sub_ref_no']); ?>', '<?php echo e($orderList['cart_id']); ?>')"><img src="<?php echo e(asset('assets/images/card.png')); ?>"
                                                    alt="" class="img-fluid"
                                                    >Change 
                                                Card</div>
                                        <?php endif; ?>
                                        <?php if(isset($orderList['order_status']) && $orderList['order_status'] ==
                                        'Completed'): ?>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>rating-reviews">
                                            <div class="rate_order_btn">Rate Order</div>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                     <div style="border-bottom: 0.3px solid #dadbf0; margin-top: 5px; margin-bottom: 5px "></div>
                                                       <div class="col-lg-12">
                                                            <ul>
                                                                <li><?php echo e($orderList['productname']); ?></span></li>
                                                            </ul>
                                                        </div>
                                </div>
                                <div class="sub_order_priceBox" onclick="navigateToNextPage('<?php echo e(url(ENV('APP_URL') . 'subscription-order-product?group_id=' . $orderList['group_id'])); ?>')">
                                    <div class="priceBox">AED <span><?php echo e(number_format($orderList['total_mrp'], 2)); ?></span>
                                    </div>
                                </div>
                                <div class="view_box" onclick="navigateToNextPage('<?php echo e(url(ENV('APP_URL') . 'subscription-order-product?group_id=' . $orderList['group_id'])); ?>')">View Details</div>
                               
                            </div>  
                            </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                       </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Selected card list modal...G1 -->
    <div class="modal fade" id="cardModal" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cardModalLabel">Saved Cards</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="cardListContainer">
                        <p>Loading...</p> <!-- This will be replaced with actual data -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    function buyAgain() {
        const sgroup_id = document.getElementById("sgroup_id").value;
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(ENV('APP_URL')); ?>buyAgainAPICall";

        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                cartID: sgroup_id,
                screenName:"subscription",
                _token: _token,
            },
            success: function (result) {
                navigateToNextPage(href="<?php echo e(ENV('APP_URL')); ?>cart");
            },
            error: function (xhr, status, error) {
                console.error("XHR:", xhr);
                console.error("Status:", status);
                console.error("Error:", error);
                alert("An error occurred: " + xhr.responseText);
            },
        });

    }

</script>

<!-- Show card list api call...G1 -->
<script>

    function fetchCardList(siNO,cartId) {
        console.log("AJAX si:1", siNO);
        console.log("AJAX cartId:1", cartId);

        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(ENV(key: 'APP_URL')); ?>showCardList";

        jQuery.ajax({
            url: url, method: "POST", data: {
                screenName: "trialPack",
                _token: _token
            },

            success: function (response) {
                // console.log("AJAX Success:", btnName);
                if (response.success === '1') {
    let cardListContainer = $("#cardListContainer");
    cardListContainer.empty(); // Clear previous content
    let data = response.action;

    if (data && data.data.length > 0) {
        let cardHtml = '<div class="card_listingBox"><form>';

        data.data.forEach((cardList, index) => {
            // Start a new row for every even index
            if (index % 2 === 0) {
                cardHtml += `<div class="row">`;
            }

            cardHtml += `
                <div class="col-lg-6">
                    <div class="payment_method">
                        <label class="payment_option cards" for="card${cardList.si_sub_ref_no}">
                            <div style="display: flex; justify-content: space-between;">
                                <div class="card_text">Card</div>
                            </div>
                            <input type="radio" name="payment" id="card${cardList.si_sub_ref_no}" 
                                   data-subref="${cardList.si_sub_ref_no}" 
                                   data-cardno="${cardList.card_no}"  
                                   data-cartid="${cartId}" 
                                   ${cardList.si_sub_ref_no == siNO ? 'checked' : ''} 
                                   onchange="saveSelectedCardData(this)"/>

                            <div class="plan-content">
                                <div class="plan-details">
                                    <div class="payment_details">
                                        <div class="cards_img">
                                            <img src="<?php echo e(asset('assets/images/card.png')); ?>" alt="card">
                                        </div>
                                        <div class="card_text">${cardList.card_no}</div>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            `;

            // Close the row after two items or when it's the last item
            if (index % 2 === 1 || index === data.data.length - 1) {
                cardHtml += `</div>`; 
            }
        });

        cardHtml += '</form></div>';
        cardListContainer.html(cardHtml);
    } else {
        cardListContainer.html("<p>No cards found.</p>");
    }
} else {
    alert("Error: " + response.message);
}

            }
            , error: function (xhr, status, error) {

                alert("An error occurred: " + xhr.responseText);
            }
            ,
        });

    }

    // Function to handle selected address
    function saveSelectedCardData(element) {
        let siSubRefNo = element.getAttribute("data-subref");
        let cartNo = element.getAttribute("data-cartid");
            changeCardApiCall(siSubRefNo, cartNo)
        $('#cardModal').modal('hide');


    }

</script>
<!-- Buy again api call...G1 -->
<script>
    function changeCardApiCall(siNo, cartId) {
        const sgroup_id = document.getElementById("sgroup_id").value;
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(ENV('APP_URL')); ?>changeCardAPICall";

        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                cartID: cartId,
                siNo:siNo,
                screenName:"subscription",
                _token: _token,
            },
            success: function (result) {
                //  console.log("done", result.success);
                 var status = result.success;
                 Swal.fire({
                            title: result.message
                            , showDenyButton: false
                            , showCancelButton: false
                            , icon: "sucess"
                            , confirmButtonText: "OK"
                        , }).then((result) => {
                            if (result.isConfirmed) {
                                if(status== 1) {
                                window.location.reload();
                                }
                            }
                        });
            },
            error: function (xhr, status, error) {
                console.error("XHR:", xhr);
                console.error("Status:", status);
                console.error("Error:", error);
                alert("An error occurred: " + xhr.responseText);
            },
        });

    }

</script>
<?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Orders/SubscriptionOrders/subscription-orders.blade.php ENDPATH**/ ?>