<!-- ORDER CANCEL POPUP MODAL START -->
<div class="modal fade" id="cancel_order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="order-subheading d-flex align-items-center">Cancel Order</div>
                <p>Please tell us the correct reson for cancellation. This information is only used to improve our
                    service.</p>
                <h6>Select Reasons *</h6>
                <ul class="reasons_list">
                    <li>
                        <input type="radio" id="reason_1" name="reason" value="Need different product">
                        <label for="reason_1">Need different product</label>
                    </li>
                    <li>
                        <input type="radio" id="reason_2" name="reason" value="Wrongly ordered">
                        <label for="reason_2">Wrongly ordered</label>
                    </li>
                    <li>
                        <input type="radio" id="reason_3" name="reason" value="High Quantity">
                        <label for="reason_3">High Quantity</label>
                    </li>
                    <li>
                        <input type="radio" id="reason_4" name="reason" value="Need different brand">
                        <label for="reason_4">Need different brand</label>
                    </li>
                    <li>
                        <input type="radio" id="reason_5" name="reason" value="Other">
                        <label for="reason_5">Other</label>
                    </li>
                    <textarea id="otherReason" name="otherReason" placeholder="Please specify your reason"></textarea>
                </ul>
                <div class="cancel_btn">Cancel Order</div>
            </div>
        </div>
    </div>
</div>
<!-- ORDER CANCEL POPUP MODAL END -->

<!-- OTHER REASON SCRIPT START -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const otherRadio = document.getElementById('reason_5');
    const otherTextarea = document.getElementById('otherReason');
    const radioButtons = document.querySelectorAll('input[name="reason"]');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            if (otherRadio.checked) {
                otherTextarea.style.display = 'block';
            } else {
                otherTextarea.style.display = 'none';
            }
        });
    });
});
</script>
<!-- OTHER REASON SCRIPT START -->

<!-- ORDER CONFIRMED POPUP MODAL START -->
<div class="modal fade" id="order_confirmed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="popup_body text-center">
                    <img src="<?php echo e(asset('assets/images/Success.png')); ?>" alt="" class="img-fluid" style="max-width:80px">
                    <div class="subheading">Order Confirmed</div>
                    <p>Your order has been placed successfully. </p>
                    <div class="mb-3">
                        <div>You will receive you order till 9.00PM</div>
                        <a class="link" href="<?php echo e(ENV('APP_URL')); ?>daily-orders">Track order</a>
                    </div>
                    <a href="<?php echo e(ENV('APP_URL')); ?>" class="mb-3 d-block">
                        <div class="cancel_btn">Continue Shopping</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ORDER CONFIRMED POPUP MODAL END -->

<!-- ----- PAYMENT FAILED POPUP MODAL START--- -->
<div class="modal fade" id="order_failed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="popup_body text-center">
                    <img src="<?php echo e(asset('assets/images/failed.png')); ?>" alt="" class="img-fluid" style="max-width:80px">
                    <div class="subheading">Order Failed !</div>
                    <p>Your order is not placed.</p>
                    <a href="" class="mb-3 d-block">
                        <div class="cancel_btn">Try Again</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ----- PAYMENT FAILED POPUP MODAL END--- --><?php /**PATH /var/www/html/createProject/resources/views/popup.blade.php ENDPATH**/ ?>