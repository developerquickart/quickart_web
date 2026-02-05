<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Order ID: <?php echo e($groupID); ?> </h5>
                </div>
                <div class="sub_order_listBox">
                    
                    <?php if(isset($subscriptionOrderProductList['data']) && count($subscriptionOrderProductList['data']) > 0): ?>
                    <div class="my-order-mainList">
                    
                        <?php $__currentLoopData = $subscriptionOrderProductList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderList1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php
                       // echo "<pre>";
                    //    print_r($orderList1['subscription_details']);
                        ?>
                        <?php
                        $subscription_details=$orderList1['subscription_details'];
                        $orderList=$orderList1['data']['0'];
                        ?>

                        <div class="my-order-list">
                            <div class="sub_orderList">
                                <div class="sub_order_ProductList_product">
                                    <div class="sub_order_list_product_details">
                                        <div class="sub_order_list_product_imgbox list1">
                                            <div class="sub_order_list_product_img">
                                                 <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($orderList['product_name'])); ?>/<?php echo e(trim($orderList['product_id'])); ?>">
                                                    <img src="<?php echo e($orderList['varient_image']); ?>"
                                                        alt="<?php echo e($orderList['product_name']); ?>" class="img-fluid">
                                                </a>
                                                <div class="orderDetail"
                                                    data-productData='<?php echo json_encode($orderList1, 15, 512) ?>'
                                                    data-colorCode='<?php echo e(getProdOrderStatusColor($orderList1["order_status"])); ?>'
                                                     data-status='<?php echo e(getOrderStatus($orderList1["order_status"])); ?>'
                                                     onclick="openOrderSummaryModal(this)">
                                                    <div class="sub_order_name"><?php echo e($orderList['product_name']); ?></div>
                                                    <div class="sub_order_id">Product Order
                                                        ID:<span> #<?php echo e($orderList['order_cart_id']); ?></span></div>
                                                    <div class="sub_order_name">Payment method:<span> <?php echo e($orderList1['payment_method']); ?></span></div>    
                                                </div>
                                            </div>
                                            <div class="sub_order_list_product_status" data-productData='<?php echo json_encode($orderList1, 15, 512) ?>'
                                            data-colorCode='<?php echo e(getProdOrderStatusColor($orderList1["order_status"])); ?>'
                                            data-status='<?php echo e(getOrderStatus($orderList1["order_status"])); ?>'
                                                onclick="openOrderSummaryModal(this)">
                                                <div class="sub_order_name"><span
                                                        style="color: <?php echo e(getProdOrderStatusColor($orderList1['order_status'])); ?>">
                                                        <?php echo e(getOrderStatus($orderList1['order_status'])); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sub_order_list_product_imgbox" data-productData='<?php echo json_encode($orderList1, 15, 512) ?>'
                                        data-colorCode='<?php echo e(getProdOrderStatusColor($orderList1["order_status"])); ?>'
                                         data-status='<?php echo e(getOrderStatus($orderList1["order_status"])); ?>'
                                            onclick="openOrderSummaryModal(this)">
                                            <div class="sub_order_list_product_date">
                                               
                                                <div class="sub_order_time">No.of Weeks:
                                                    <span><?php echo e($orderList1['total_delivery']); ?></span>
                                                </div>
                                            </div>
                                            <div class="sub_order_list_product_price">
                                                <div class="sub_order_priceBox">AED <span>
                                                        <?php echo e(number_format($orderList1['total_products_mrp'], 2)); ?></span>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="sub_order_list_product_detailsButtons">
                                            <div class="manage_subscription_btn" 
                                             data-productData='<?php echo json_encode($orderList1, 15, 512) ?>'
                                            onclick="openSubscriptionResumepauseOrderModal(this)"
                                               >
                                                <div class="btn_icon">
                                                    <img src="<?php echo e(asset('assets/images/calender.png')); ?>" alt="order_info"
                                                        class="img-fluid">
                                                </div>
                                                <div class="btn_text">Manage Subscription</div>
                                            </div>
                                           <?php if($orderList1['order_status'] !== 'Cancelled'): ?>
                                            <a class="view_invoice_btn" target="_blank" href="<?php echo e(url(ENV('APP_URL') . 'generate_invoce?cart_id=' . $orderList['order_cart_id'])); ?>">
                                                <div class="btn_icon">
                                                    <img src="<?php echo e(asset('assets/images/invoice.png')); ?>" alt="order_info"
                                                        class="img-fluid">
                                                </div>
                                                  View Invoice
                                            </a>
                                            <?php endif; ?>
                                            <div class="order-summary-text"
                                                    data-productData='<?php echo json_encode($orderList1, 15, 512) ?>'
                                                    data-colorCode='<?php echo e(getProdOrderStatusColor($orderList1["order_status"])); ?>'
                                                     data-status='<?php echo e(getOrderStatus($orderList1["order_status"])); ?>'
                                                     onclick="openOrderSummaryModal(this)">Order Summary ></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="modal fade" id="order-summary-<?php echo e($orderList['order_cart_id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="order_detailbox mb-0">
                                        <div class="order_details">
                                            <div class="order-subheading">Order Summary</div>
                                            <div class="order_summaryBox_list">
                                                <div class="order_summary_Box">
                                                    <div class="order_summary_details_Box">
                                                        <div class="order_summary_details">
                                                            <div class="order_summary_productName"><?php echo e($orderList['product_name']); ?></div>
                                                            <div class="order_summary_quantity">(<?php echo e($orderList['quantity']); ?> <?php echo e($orderList['unit']); ?>)</div>
                                                            <div class="order_summary_days">Repeat Days - (<?php echo e($orderList['repeat_orders']); ?>)</div>
                                                            <div class="order_summary_week">No. of Weeks - <?php echo e($orderList1['total_delivery']); ?></div>
                                                        </div>
                                                        <div class="order_summary_price_box">
                                                            <div class="order_summary_price">AED <span id="price_summary"><?php echo e(number_format($orderList1['total_products_mrp'], 2)); ?></span></div>
                                                            <!--<div class="order_summary_status"><span-->
                                                            <!--        style="color: <?php echo e(getProdOrderStatusColor($orderList1['order_status'])); ?>">-->
                                                            <!--        <?php echo e(getOrderStatus($orderList1["order_status"])); ?> </span></div>-->
                                                        </div>
                                                    </div>
                                                    <div class="order_summary_address_box">
                                                        <div class="order_summary_heading">Address: <?php echo e($orderList1['delivery_address']); ?></div>
                                                        <div class="order_summary_details_text"></div>
                                                    </div>
                                                </div>
                                                <div class="order_summary_Box">
                                                    <div class="order_summary_Box_heading">Delivery Details</div>
                                                    <div class="bill_details_box">
                                                        <div class="bill_title">Total Deliveries:</div>
                                                        <div class="bill_amount"><?php echo e($orderList1['total_order']); ?></div>
                                                    </div>
                                                    <div class="bill_details_box">
                                                        <div class="bill_title">Completed Deliveries:</div>
                                                        <div class="bill_amount"><?php echo e(number_format($orderList1['completed_order'], 0)); ?></div>
                                                    </div>
                                                    <div class="bill_details_box">
                                                        <div class="bill_title">Pending Deliveries:</div>
                                                        <div class="bill_amount"><?php echo e(number_format($orderList1['pending_order'], 0)); ?></div>
                                                    </div>
                                                    <div class="bill_details_box">
                                                        <div class="bill_title">Pause Deliveries:</div>
                                                        <div class="bill_amount"><?php echo e(number_format($orderList1['pause_order'], 0)); ?></div>
                                                    </div>
                                                    <div class="bill_details_box">
                                                        <div class="bill_title">Cancelled Deliveries:</div>
                                                        <div class="bill_amount"><?php echo e(number_format($orderList1['cancelled_order'], 0)); ?></div>
                                                    </div>
                                                    <?php if(!empty($orderList1['special_instruction'])): ?>
                                                     <div class style="margin:10px 0;">
                                                        <div class="bill_title">Order Instruction:</div>
                                                        <div class="bill_amount1"><?php echo e($orderList1['special_instruction']); ?></div>
                                                    </div>
                                                    <?php endif; ?>
                                                    <?php if(!empty($orderList1['delivery_partner_instruction'])): ?>
                                                     <div class style="margin:10px 0;">
                                                        <div class="bill_title">Delivery Partner Instruction:</div>
                                                        <div class="bill_amount1"><?php echo e($orderList1['delivery_partner_instruction']); ?></div>
                                                    </div>
                                                    <?php endif; ?>
                                                    
                                                    <?php if($orderList['product_feature_value'] != "" || $orderList['product_feature_value'] != null ): ?>
                                                     <div class style="margin:10px 0;">
                                                    <div class="bill_title">Your Packaging Preference:</div>
                                                        <div class="bill_amount1"><?php echo e($orderList['product_feature_value']); ?></div>
                                                    </div>
                                                    <?php endif; ?>
                                                
                                                </div>
                                                <div class="order_summary_Box">
                                                    <div class="order_summary_Box_heading">Bill Details</div>
                                                    <div class="bill_details_box">
                                                        <div class="bill_title">Item Total</div>
                                                        <div class="total_bill_amount">AED <?php echo e(number_format($orderList1['total_products_mrp'], 2)); ?></div>
                                                    </div>
                                                    <div class="bill_details_box">
                                                        <div class="bill_title">Delivery Charges</div>
                                                        <div class="total_bill_amount">AED <?php echo e(number_format($orderList1['delivery_charge'], 2)); ?></div>
                                                    </div>
                                                    <div class="bill_details_box">
                                                        <div class="bill_title">Wallet Applied</div>
                                                        <div class="total_bill_amount" style="color: var(--green-color);">AED <?php echo e(number_format($orderList1['paid_by_wallet'], 2)); ?></div>
                                                    </div>
                                                </div>
                                                <div class="order_summary_Box">
                                                    <div class="bill_details_box">
                                                        <div class="total_bill">Total Bill</div>
                                                        <div class="total_bill_amount">AED <?php echo e(number_format(($orderList1['total_products_mrp'] - $orderList1['paid_by_wallet']), 2)); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order_summary_buttons">
                                                <div class="autorenewal_btn" id="autorenewalBtn-<?php echo e($orderList['order_cart_id']); ?>"><img src="<?php echo e(asset('assets/images/buyagain.png')); ?>"
                                                        alt="Auto Renewal" class="img-fluid"> Auto Renewal</div>
                                                <?php if($orderList1['order_status'] !== 'Cancelled' && $orderList1['order_status'] !== 'Completed' && $orderList1['order_status'] === 'Pending'): ?>        
                                                    <div class="cancel_orderBtn"id="cancelOrderBtn-<?php echo e($orderList['order_cart_id']); ?>"><img src="<?php echo e(asset('assets/images/order-cancel.png')); ?>"
                                                            alt="Cancel" class="img-fluid">
                                                        Cancel Order</div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        <!-- Pause/Resume popup code start -->                        
                        <div class="modal fade subscription-modal" id="subscription-<?php echo e($orderList['order_cart_id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="instruction_text"> <img src="<?php echo e(asset('assets/images/pause.png')); ?>" alt="Delivery"
                                                class="img-fluid"> Tap on the order date to Pause/Resume the order
                                        </div>
                                         <div class="delivery_status d-flex align-items-center">
                                            <div class="calender_listbox mt-3" id="calendarListContainer">
                                                <?php $__currentLoopData = $subscription_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriptiondetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="<?php echo e($subscriptiondetails['subscription_id']); ?>" 
                                                <?php if($subscriptiondetails['order_status'] == 'Pause'): ?> onclick="ResumeOrder('<?php echo $subscriptiondetails['subscription_id']?>','<?php echo $subscriptiondetails['cart_id']?>','<?php echo $subscriptiondetails['time_slot']?>','<?php echo $subscriptiondetails['delivery_date']?>','<?php echo $subscriptiondetails['store_order_id']?>')" <?php endif; ?>
                                                <?php if($subscriptiondetails['order_status'] == 'Pending'): ?> onclick="PauseOrder('<?php echo $subscriptiondetails['subscription_id']?>','<?php echo $subscriptiondetails['cart_id']?>','<?php echo $subscriptiondetails['time_slot']?>','<?php echo $subscriptiondetails['delivery_date']?>','<?php echo $subscriptiondetails['store_order_id']?>')" <?php endif; ?>
                                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'calender_status_list',
                                                'pending' => $subscriptiondetails['order_status'] === 'Pending',
                                                'complete' => $subscriptiondetails['order_status'] === 'Completed',
                                                'pause' => $subscriptiondetails['order_status'] === 'Pause',
                                                'cancel' => $subscriptiondetails['order_status'] === 'Cancelled',
                                                ]) ?>">
                                                    <div class="calendar_box">
                                                         <div class="calender_status">
                                                            <?php echo e($subscriptiondetails['order_status'] == 'Out_For_Delivery' ? 'Out For Delivery' : $subscriptiondetails['order_status']); ?>

                                                        </div> 
                                                        <div class="calender_date">
                                                        <?php
                                                        $date = \Carbon\Carbon::parse($subscriptiondetails['delivery_date']);
                                                        ?>
                                                        <span><?php echo e($date->format('D d')); ?><br> <?php echo e($date->format('M Y')); ?></span>
                                                        <span><?php
                                                        $slot = $subscriptiondetails['time_slot']; // e.g., "05:00 pm - 09:00 pm"
                                                        preg_match('/(\d{2}):\d{2} (am|pm) - (\d{2}):\d{2} \2/i', $slot, $matches);
                                                        ?>
                                                        
                                                        <?php if(!empty($matches)): ?>
                                                        <?php echo e($matches[1]); ?>-<?php echo e($matches[3]); ?> <?php echo e(strtolower($matches[2])); ?>

                                                        <?php else: ?>
                                                        <?php echo e($slot); ?> 
                                                        <?php endif; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="ploader">
                                            <div id="loader" style="display: flex; justify-content: center; align-items: center;">
                                                <img src="<?php echo e(asset('assets/images/loader.gif')); ?>" alt="Loading..." class="img-fluid" style="max-width:7%;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pause/Resume popup code end -->    

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade vacation-modal" id="vacation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="order-subheading d-flex align-items-center"><img
                        src="<?php echo e(asset('assets/images/calender.png')); ?>" alt="" class="img-fluid"
                        style="max-width:30px">Schedule Delivery
                </div>
                <p>Choose a date</p>
                <div class="calender_listbox my-3">
                    <?php
                    use Carbon\Carbon;
                    $startDate = Carbon::now()->addDays(2); // current date + 2 days
                    ?>
                    <?php for($i = 0; $i < 30; $i++): ?>
                    <?php
                    $date = $startDate->copy()->addDays($i);
                    $formattedDate = $date->format('Y-m-d');
                    ?>
                    <div class="calender_list"  onclick="SelectDateResumeOrder('<?php echo e($formattedDate); ?>')">
                    <?php
                    $date = $startDate->copy()->addDays($i);
                    ?>
                    <div class="calendar_box">
                    <div class="calender_day"><?php echo e(strtoupper($date->format('D'))); ?></div>
                    <div class="calender_date">
                    <?php echo e($date->format('d')); ?><span><?php echo e($date->format('M')); ?></span>
                    </div>
                    </div>
                    </div>
                    <?php endfor; ?>
                    <input type="hidden" name="cartId" id="cartId">
                    <input type="hidden" name="subscriptionID" id="subscriptionID">
                    <input type="hidden" name="timeSlot" id="timeSlot">
                    <input type="hidden" name="sOrderID" id="sOrderID">
                    
                  </div>
                <div class="ploader1">
                    <div id="loader" style="display: flex; justify-content: center; align-items: center;">
                        <img src="<?php echo e(asset('assets/images/loader.gif')); ?>" alt="Loading..." class="img-fluid" style="max-width:7%;" />
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>

$('.subscription-modal').on('hidden.bs.modal', function () {
      location.reload();
});
    
// $('.vacation-modal').on('hidden.bs.modal', function () {
//       location.reload();
// });
    
$('.ploader').hide();$('.ploader1').hide();
window.openOrderSummaryModal = function(el) {
    const data = JSON.parse(el.getAttribute('data-productData'));
    const cart_id = data['cart_id'];
    const colorCode = el.getAttribute('data-colorCode');
    const status = el.getAttribute('data-status');

    // DOM elements
    const cancelBtn = document.getElementById('cancelOrderBtn-' + cart_id);
    const autorenewalBtn = document.getElementById('autorenewalBtn-' + cart_id);

    if (!data.data || !data.data[0]) {
        console.warn('Invalid data structure');
        return;
    }

    const orderData = data.data[0];

    // Hide buttons based on status
    if (status === 'Cancelled' || status === 'Completed') {
        if (cancelBtn) cancelBtn.style.display = 'none';
        if (autorenewalBtn) autorenewalBtn.style.display = 'none';
    }

    // Hide auto-renewal if not enabled
    if (orderData.isautorenew !== "yes") {
        if (autorenewalBtn) autorenewalBtn.style.display = 'none';
    }

    // Set cancel reason action
    if (cancelBtn) {
        cancelBtn.setAttribute(
            'onclick',
            `getCancelReasonList('${orderData.order_cart_id}', 'subscription', '${orderData.store_order_id}')`
        );
    }
   
    gtag('event', 'view_order_summaryW', {
      transaction_id: "Cart_id:" + orderData.order_cart_id,  
      value: data.total_products_mrp,                  
      currency: 'AED',              
      items: [],
      debug_mode: false
    });

    // Show modal
    const myModal = new bootstrap.Modal(document.getElementById('order-summary-' + cart_id));
    myModal.show();
};


// Set subscription resume pause data...G1
window.openSubscriptionResumepauseOrderModal = function(el) {
    const data = JSON.parse(el.getAttribute('data-productData'));
    const cart_id = data['cart_id'];
    const modal = new bootstrap.Modal(document.getElementById('subscription-'+cart_id));
    modal.show();
}


function formatTimeSlot(slot) {
    // Example: "02:00 pm - 05:00 pm"
    const parts = slot.split(' - ');
    if (parts.length !== 2) return slot;

    const start = formatHour(parts[0]);
    const end = formatHour(parts[1]);
    const period = parts[0].toLowerCase().includes('am') ? 'AM' : 'PM';

    return `${start}-${end} ${period}`;
}

function formatHour(timeStr) {
    const [time, modifier] = timeStr.trim().split(' ');
    const [hour] = time.split(':');
    return hour.padStart(2, '0'); // Ensure 2-digit hour
}


function ResumeOrder(subscriptionID,cartId,timeSlot,deliveryDate,sOrderID)
{
document.getElementById('subscriptionID').value=subscriptionID;
document.getElementById('cartId').value=cartId;
document.getElementById('timeSlot').value=timeSlot;
document.getElementById('sOrderID').value=sOrderID;
// Show modal
const myModal = new bootstrap.Modal(document.getElementById('vacation'));
myModal.show();
}

function SelectDateResumeOrder(deliveryDate) {
var subscriptionID = document.getElementById('subscriptionID').value;
var cartId = document.getElementById('cartId').value;
var timeSlot = document.getElementById('timeSlot').value; 
var sOrderID = document.getElementById('sOrderID').value; 
var _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

$('.ploader1').hide();
$.ajax({
url: "<?php echo e(route('resumePauseOrder')); ?>",
method: "POST",
beforeSend: function () {
    $('.ploader1').show(); // Show loader before sending request
},
data: {
    subscriptionID: subscriptionID,
    cartId: cartId,
    timeSlot: timeSlot,
    deliveryDate: deliveryDate,
    _token: _token
},
success: function (result) {
    // Hide the modal properly
    var myModalEl = document.getElementById('vacation');
    var myModal = bootstrap.Modal.getInstance(myModalEl);
    if (myModal) {
    myModal.hide();
    gtag('event', 'resume_pause_orderW', {
      subscription_id: subscriptionID ,  // Or order_id
      status: 'resumed',
      cartId: cartId,
      resume_date: deliveryDate + timeSlot,
      debug_mode: false 
    });
}


// Format delivery date
const dateObj = new Date(deliveryDate);
const dayShort = dateObj.toLocaleDateString('en-US', { weekday: 'short' });
const dayNum = String(dateObj.getDate()).padStart(2, '0');
const month = dateObj.toLocaleDateString('en-US', { month: 'short' });
const year = dateObj.getFullYear();

// Format time slot (e.g., "05:00 pm - 09:00 pm" to "05-09 pm")
let timeSlotFormatted = timeSlot;
const match = timeSlot.match(/(\d{2}):\d{2} (am|pm) - (\d{2}):\d{2} \2/i);
if (match) {
    timeSlotFormatted = `${match[1]}-${match[3]} ${match[2].toLowerCase()}`;
}

// Remove the existing calendar div (if any)
const oldDiv = document.getElementById(subscriptionID);
if (oldDiv) {
    oldDiv.remove();
}

// Construct new div
const newDiv = document.createElement('div');
newDiv.id = subscriptionID; // Assign ID to new div
newDiv.classList.add('calender_status_list', 'pending');
newDiv.setAttribute('onclick', `PauseOrder('${subscriptionID}', '${cartId}', '${timeSlot}', '${deliveryDate}', '${sOrderID}')`);
newDiv.innerHTML = `
    <div class="calendar_box">
        <div class="calender_status">Pending</div>
        <div class="calender_date">
            <span>${dayShort} ${dayNum}<br> ${month} ${year}</span>
            <span>${timeSlotFormatted}</span>
        </div>
    </div>
`;

// Append to the correct parent container (replace 'calendarContainer' with actual parent ID)
document.getElementById('calendarListContainer').appendChild(newDiv);

// Optionally show success message or refresh UI
},
error: function (xhr, status, error) {
    console.error('Error:', error);
    alert('Something went wrong. Please try again.');
},
complete: function () {
    $('.ploader').hide(); // Hide loader after request finishes
}
});
}

function PauseOrder(subscriptionID,cartId,timeSlot,deliveryDate,sOrderID)
{
      const inputDate = new Date(deliveryDate);
      const today = new Date();
      today.setHours(0, 0, 0, 0);
      const isToday = inputDate.toDateString() === new Date().toDateString();
    if (inputDate <= today || isToday) {
        Swal.fire({
                title: 'QuicKart',
                text:'You cannot pause delivery for past or current dates.',
                icon: 'warning',
                confirmButtonText: 'Ok'
                }).then((result) => {
                
                });
    }else {
        
        $('.ploader').hide();
        var _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $.ajax({
        url: "<?php echo e(route('pauseOrderDateAPICall')); ?>",
        method: "POST",
        beforeSend: function () {
            $('.ploader').show(); // Show loader before sending request
        },
        data: {
            subscriptionID: subscriptionID,
            cartId: cartId,
            timeSlot: timeSlot,
            deliveryDate: deliveryDate,
            sOrderID:sOrderID,
            _token: _token
        },
        success: function (result) {
            // Format delivery date
            const dateObj = new Date(deliveryDate);
            const dayShort = dateObj.toLocaleDateString('en-US', { weekday: 'short' });
            const dayNum = String(dateObj.getDate()).padStart(2, '0');
            const month = dateObj.toLocaleDateString('en-US', { month: 'short' });
            const year = dateObj.getFullYear();
            
            // Format time slot (e.g., "05:00 pm - 09:00 pm" to "05-09 pm")
            let timeSlotFormatted = timeSlot;
            const match = timeSlot.match(/(\d{2}):\d{2} (am|pm) - (\d{2}):\d{2} \2/i);
            if (match) {
                timeSlotFormatted = `${match[1]}-${match[3]} ${match[2].toLowerCase()}`;
            }
            
            // Remove the existing calendar div (if any)
            const oldDiv = document.getElementById(subscriptionID);
            if (oldDiv) {
                oldDiv.remove();
            }
            
            // Construct new div
            const newDiv = document.createElement('div');
            newDiv.id = subscriptionID; // Assign ID to new div
            newDiv.classList.add('calender_status_list', 'pause');
            newDiv.setAttribute('onclick', `ResumeOrder('${subscriptionID}', '${cartId}', '${timeSlot}', '${deliveryDate}', '${sOrderID}')`);
            newDiv.innerHTML = `
                <div class="calendar_box">
                    <div class="calender_status">Pause</div>
                    <div class="calender_date">
                        <span>${dayShort} ${dayNum}<br> ${month} ${year}</span>
                        <span>${timeSlotFormatted}</span>
                    </div>
                </div>
            `;
            
            // Append to the correct parent container (replace 'calendarContainer' with actual parent ID)
            document.getElementById('calendarListContainer').appendChild(newDiv);
            gtag('event', 'resume_pause_orderW', {
              subscription_id: subscriptionID ,  // Or order_id
              status: 'pause',
              cartId: cartId,
              resume_date: deliveryDate + timeSlot,
              debug_mode: false 
            });
            // Optionally show success message or refresh UI
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
            alert('Something went wrong. Please try again.');
        },
        complete: function () {
            $('.ploader').hide(); // Hide loader after request finishes
        }
        
        });    
                
    }
}

</script><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Orders/SubscriptionOrders/subscription-order-product.blade.php ENDPATH**/ ?>