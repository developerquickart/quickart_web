<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<!-- ORDER CANCEL POPUP MODAL START -->
<div class="modal fade" id="cancel_order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="order-subheading d-flex align-items-center">Cancel Order</div>
                <p>Please tell us the correct reason for cancellation. This information is only used to improve our
                    service.</p>
                <h6>Select Reasons *</h6>
                <ul class="reasons_list" id="reasonsList">
                    <!-- Reasons will be populated here -->
                </ul>
                <textarea id="otherReason" name="otherReason" placeholder="Please specify your reason"
                    style="display:none"></textarea>

                <div class="cancel_btn" id="cancel_order_btn_click" onclick="cancelOrder()">
                    Cancel Order
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ORDER CANCEL POPUP MODAL END -->
<!-- //Cancel order reason list api call...G1 -->
<script>
function getCancelReasonList(cartID, screenName, storeOrderID) {
    console.log(cartID);
    console.log(storeOrderID);
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>cancelOrderReasonsList";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            cartID: cartID,
            screenName: screenName,
            storeOrderID: storeOrderID,
            _token: _token,
        },
        success: function(result) {
            document.getElementById("reasonsList").innerHTML = result;
            const otherReasonInput = document.getElementById("otherReason");

            // Get the modal element
            const modalElement = document.getElementById('cancel_order');
            const cancelOrderModal = new bootstrap.Modal(modalElement);
            cancelOrderModal.show();

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
<!-- Handle cancel order radio button click...G1 -->
<script>
function handleReasonClick(element) {
    const selectedValue = element.value;
    const otherReasonInput = document.getElementById("otherReason");

    if (selectedValue === "Others") {
        // Initially, hide the textarea
        otherReasonInput.style.display = 'block';

    } else {
        otherReasonInput.style.display = 'none';
    }
    console.log("Selected Reason:", selectedValue);
}
</script>

<!-- Cancel order api call...G1 -->
<script>
function cancelOrder() {
    // console.log($request.cartID);
    const cancel_cartID = document.getElementById("cancel_cartID").value;
    const storeOrderID = document.getElementById("store_order_id").value;
    const cancel_screenName = document.getElementById("cancel_screenName").value;
    const selectedReason = document.querySelector('input[name="reason"]:checked')?.value;
    const otherReason = document.getElementById("otherReason").value;

    const reason = selectedReason === "Others" ? otherReason : selectedReason;

    if (!reason || reason === 'undefined' || reason.trim() === '') {
        if (selectedReason === "Others" && !reason) {
             return Swal.fire({
                title: "Please enter a reason for cancellation.",
                icon: "warning",
                draggable: true
            }).then(() => {
               // location.reload();
            });
        }
        return Swal.fire({
                title: "Please select a reason for cancellation.",
                icon: "warning",
                draggable: true
            }).then(() => {
               // location.reload();
            });
    }

    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>cancelOrderAPICall";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            cartID: cancel_cartID,
            screenName: cancel_screenName,
            canecelReason: reason,
            storeOrderID: storeOrderID,
            _token: _token,
        },
        success: function(result) {
            gtag('event', 'cancel_orderW', {
                transaction_id: "cart id:" + cancel_cartID,
                reason: reason,
                storeOrderID: storeOrderID,
                debug_mode: false
              });
            Swal.fire({
                title: result.message,
                icon: "success",
                draggable: true
            }).then(() => {
                location.reload();
            });


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

<!-- ORDER CANCEL POPUP MODAL END -->

<!-- LOGOUT MODEL START -->
<div class="modal" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="row">
                <div class="col-lg-12">
                    <div class="loginBox text-center">
                        <div class="logout_heading">
                            <img src="<?php echo e(asset('assets/images/QuicKart_logo.png')); ?>" 
                                alt="logo" class="img-fluid">
                        </div>
                        <div class="my-3">
                            <p>Are you sure you want to logout?</p>
                        </div>
                    </div>
                    <div class="buttonWrap">
                        <button type="submit" class="cancel_btn text-center" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="submit_btn text-center" onclick="userLogout();">Logout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGOUT MODAL END -->

<!-- SUCCESS Popup -->
<div class="custom-popup" id="successPopup">
    <div class="popup-contentBox success">
        <span class="close-popup">&times;</span>
        <div class="popup_contentMainBox">
            <div class="popup_contentTextBox">
                <div class="popup_content_imageBox">
                    <img src="<?php echo e(asset('assets/images/success.webp')); ?>" alt="Success" class="img-fluid">
                </div>
                <div class="popup_content_message">
                    <div class="popup_contentHeading">Successful</div>
                    <div class="popup_conetntMsg">Account created successfully. Welcome!</div>
                </div>
            </div>
            <div class="popup_contentButtonBox"></div>
        </div>
    </div>
</div>

<!-- ERROR Popup -->
<div class="custom-popup" id="errorPopup">
    <div class="popup-contentBox error">
        <span class="close-popup">&times;</span>
        <div class="popup_contentMainBox">
            <div class="popup_contentTextBox">
                <div class="popup_content_imageBox">
                    <img src="<?php echo e(asset('assets/images/error.webp')); ?>" alt="Error" class="img-fluid">
                </div>
                <div class="popup_content_message">
                    <div class="popup_contentHeading">Error</div>
                    <div class="popup_conetntMsg">Account creation failed. Please try again later.</div>
                </div>
            </div>
            <div class="popup_contentButtonBox"></div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function () {
    // Open popup
    jQuery('.open-popup-btn').on('click', function () {
        var popupId = jQuery(this).data('popup');
        jQuery('#' + popupId).css('display', 'flex').hide().fadeIn();
    });

    // Close popup
    jQuery('.close-popup').on('click', function () {
        jQuery(this).closest('.custom-popup').fadeOut();
    });

    // Close on background click
    jQuery('.custom-popup').on('click', function (e) {
        if (jQuery(e.target).is('.custom-popup')) {
            jQuery(this).fadeOut();
        }
    });
});

</script>
 <?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/popup.blade.php ENDPATH**/ ?>