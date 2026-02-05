<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="account-page section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">My Order Info</h5>
                </div>
                <div class="order-infoMainBox">
                    <?php if(isset($subscriptionOrderProductDetail['data'])): ?>

                    <div class="row">
                        <div class="col-lg-6">
                            <?php $__currentLoopData = $subscriptionOrderProductDetail['data']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="order_infobox">
                                <a href="<?php echo e(url(ENV('APP_URL') . 'product-details?product_id=' . $orderList['product_id'])); ?>">
                                    <div class="ordered_product">
                                        <div class="product_imgbox">
                                            <img src="<?php echo e($orderList['varient_image']); ?>" alt="" class=" img-fluid">
                                        </div>
                                        <div class="order_info">
                                            <div class="order_product_name"><?php echo e($orderList['product_name']); ?>

                                            </div>
                                            <div class="order_details">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <ul>
                                                            <li>Weight : <span><?php echo e($orderList['quantity']); ?>

                                                                    <?php echo e($orderList['unit']); ?></span></li>
                                                            <li>Total Deliveries :
                                                                <span><?php echo e($subscriptionOrderProductDetail['data']['total_delivery']); ?></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <ul>
                                                            <li>Item Price : <span class="price">AED
                                                                    <?php echo e(number_format($orderList['price_without_tax'], 2)); ?></span>
                                                            </li>
                                                            <li>Quantity : <span><?php echo e($orderList['qty']); ?></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            <div class="order_detailbox">
                                <div class="order_details">
                                    <div class="order-subheading"><img src="<?php echo e(asset('assets/images/Icon_Frame.png')); ?>"
                                            alt="order_info" class="img-fluid"> My Order Info</div>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Order Status:</td>
                                                <td> <span
                                                        style="color: <?php echo e(getProdOrderStatusColor($subscriptionOrderProductDetail['data']['order_status'])); ?>">
                                                        <?php echo e(getOrderStatus($subscriptionOrderProductDetail['data']['order_status'])); ?></span>
                                                </td>
                                            </tr>
                                            <td>Order Date:</td>
                                            <td><?php echo e($subscriptionOrderProductDetail['data']['order_date']); ?></td>
                                            </tr>
                                            </tr>
                                           
                                            <tr>
                                                <td>Total Deliveries:</td>
                                                <td><?php echo e($subscriptionOrderProductDetail['data']['total_order']); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td><?php echo e($subscriptionOrderProductDetail['data']['delivery_address']); ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="2">
                                                    <div style="float:left; width: 36%;">Pending Deliveries:</div>
                                                    <div style="float:left; width: 20%;"><?php echo e($subscriptionOrderProductDetail['data']['pending_order']); ?></div>
                                                    <div style="float:left; width: 40%;">Pause Deliveries:</div>
                                                    <div style="float:left; width: auto;"><?php echo e($subscriptionOrderProductDetail['data']['pause_order']); ?></div>
                                                </td>
                                                
                                            </tr>
                                             <tr>
                                                <td colspan="2">
                                                    <div style="float:left; width: 36%;">Completed Deliveries:</div>
                                                    <div style="float:left; width: 20%;"><?php echo e($subscriptionOrderProductDetail['data']['completed_order']); ?></div>
                                                    <div style="float:left; width: 40%;">Cancelled Deliveries:</div>
                                                    <div style="float:left; width: auto;"><?php echo e($subscriptionOrderProductDetail['data']['cancelled_order']); ?></div>
                                                </td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                <td>Item Total:</td>
                                                <td style="font-weight: bold;">AED
                                                    <?php echo e(number_format($subscriptionOrderProductDetail['data']['total_price'], 2)); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Delivery Charges:</td>
                                                <td style="font-weight: bold;">AED
                                                    <?php echo e(number_format($subscriptionOrderProductDetail['data']['delivery_charge'], 2)); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Wallet Applied:</td>
                                                <td style="font-weight: bold; color: green;">AED
                                                    <?php echo e(number_format($subscriptionOrderProductDetail['data']['paid_by_wallet'], 2)); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Bill:</td>
                                                <td style="font-weight: bold;">AED
                                                    <?php echo e(number_format($subscriptionOrderProductDetail['data']['total_products_mrp'], 2)); ?>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                             <div class="headerBox">
                                <?php if($subscriptionOrderProductDetail['data']['order_status'] != "Cancelled"): ?>
                                        <div class="cancelBtn text-end">
                                            <div class="cancel_order_btn">
                                                <div class="cancel_orderBtn" 
                                                     onclick="getCancelReasonList('<?php echo e($subscriptionOrderProductDetail['data']['cart_id']); ?>', 'subscription', '<?php echo e($subscriptionOrderProductDetail['data']['data'][0]['store_order_id']); ?>')">
                                                     <img src="<?php echo e(asset('assets/images/order-cancel.png')); ?>" alt="Cancel"
                                                    class="img-fluid"> Cancel Order
                                                </div>
                                            </div>
                                        </div>
                                <?php endif; ?>

                                            <div class="cancelBtn text-end">
                                                <a href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" > 
                                                <div class="cancel_orderBtn">
                                                    <img
                                                        src="<?php echo e(asset('assets/images/invoice.png')); ?>" alt="Buy"
                                                        class="img-fluid">
                                                    View Invoice
                                                </div>
                                                    </a>
                                             
                                             </div>
                                         </div>
                                </div>
                        <div class="col-lg-6">
                            <div class="order_detailsMainbox position__sticky">
                                <div class="delivery_detailbox">
                                    <div class="order-subheading">
                                        <img src="<?php echo e(asset('assets/images/Delivery_Fast.png')); ?>" alt="Delivery"
                                            class="img-fluid"> Delivery Dates
                                    </div>
                                    <div class="delivery_status d-flex align-items-center">
                                        <div class="instruction_text"> <img src="<?php echo e(asset('assets/images/pause.png')); ?>"
                                                alt="Delivery" class="img-fluid"> Tap on the order date to pause/resume
                                            the order
                                        </div>
                                        <div class="calender_listbox mt-3">
                                          
                                            <?php $__currentLoopData = $subscriptionOrderProductDetail['data']['subscription_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subDetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="calender_status_list 
                                                        <?php echo e($subDetails['order_status'] == 'Pending' ? 'pending' : 
                                                        ($subDetails['order_status'] == 'Completed' ? 'complete' : 
                                                        ($subDetails['order_status'] == 'Cancelled' ? 'cancel' : 'pause'))); ?> )">
                                                <div class="calendar_box"  <?php if($subDetails['order_status'] == 'Pause'): ?> 
                                                                                data-selectedDate='<?php echo json_encode($subDetails, 15, 512) ?>'
                                                                                data-bs-target="#vacation" 
                                                                                data-bs-toggle="modal" 
                                                                                onclick="openResumeDates(this)" 
                                                                                <?php elseif($subDetails['order_status'] == 'Pending'): ?>
                                                                                 data-selectedDate='<?php echo json_encode($subDetails, 15, 512) ?>'
                                                                                onclick="pauseOrderByDate(this)" 
                                                                            <?php endif; ?>>
                                                    <div class="calender_status"><?php echo e($subDetails['order_status']); ?></div>
                                                    <div class="calender_date">
                                                        <span><?php echo e(\Carbon\Carbon::parse($subDetails['delivery_date'])->format('D d')); ?><br>
                                                              <?php echo e(\Carbon\Carbon::parse($subDetails['delivery_date'])->format('M Y')); ?></span>
                                                        <span>
                                                            <?php echo e(\Carbon\Carbon::parse(explode(" - ", $subDetails['time_slot'])[0])->format('g')); ?> -
                                                            <?php echo e(\Carbon\Carbon::parse(explode(" - ", $subDetails['time_slot'])[1])->format('g A')); ?>

                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                                        </div>
                                    </div>  
                                     <div class="modal fade" id="vacation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <div class="order-subheading d-flex align-items-center">
                                                        <img src="<?php echo e(asset('assets/images/calender.png')); ?>" alt="" class="img-fluid" style="max-width:30px">
                                                        Schedule Delivery
                                                    </div>
                                                    <p>Choose a date</p>
                                                   
                                                    <div class="calender_listbox calender_list_status my-3"></div> <!-- Updated dynamically -->
                                                
                                                    <div class="calender_btn">
                                                        <input type="hidden" name="selectedDate-PR" id="selectedDate-PR"> 
                                                        <button type="submit" class="btn btn-lg submit_btn" onclick="resumeOrderByDate(this)">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Loader (Initially Hidden) -->
    <div id="ajaxLoader" style="display: none;">
        <img src="<?php echo e(asset('assets/images/loader.gif')); ?>" alt="Loading...">
    </div>
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    let selectedDateData = null;
 // Api call for get resume order date...G1
function openResumeDates(element){
    // console.log("G1----->",status);
    
        selectedDateData = JSON.parse(element.getAttribute("data-selectedDate"));

        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(url('/showResumeOrderDate')); ?>";
        $("#ajaxLoader").show();
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                screenName: "cart",
                _token: _token
            },
            success: function (response) {
                $("#ajaxLoader").hide();
                if (response.success === '1') {
                    updateCalendar(response.action['data']);
                jQuery("#vacation").modal("show");
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function (xhr, status, error) {
                  $("#ajaxLoader").hide();
                alert("An error occurred: " + xhr.responseText);
            },
        });
    
    
}

//Set date in  date list...G1
function updateCalendar(data) {
    let calendarContainer = document.querySelector(".calender_list_status");
    calendarContainer.innerHTML = ""; // Clear previous entries

    data.forEach(item => {
         let selectedDate = item['date'];
        let dateObj = new Date(item.date);
      
        let day = dateObj.toLocaleDateString("en-US", { weekday: "short" }); 
        let date = dateObj.getDate(); 
        let month = dateObj.toLocaleDateString("en-US", { month: "short" }); 
        let timeslotsHtml = "";
    
        let calendarItem = `
            <div class="calender_list" onClick="selctedDateGet('${selectedDate}')">
                <div class="calendar_box">
                    <div class="calender_day">${day}</div>
                    <div class="calender_date">${date}<span>${month}</span></div>
                </div>
            </div>
        `;
        
        calendarContainer.innerHTML += calendarItem;
    });
     attachClickEvents(data);
}

let selectedDate = '';
//Handle date selection...G1
let activeDate = "";

function attachClickEvents() {
    const calenderLists = document.querySelectorAll(".calender_list");

    if (calenderLists.length === 0) {
        console.warn("No calendar items found. Event listeners not attached.");
        return; // Exit if no elements found
    }

    calenderLists.forEach(item => {
        item.addEventListener("click", function () {
            // Remove 'active' class from all items
            calenderLists.forEach(el => el.classList.remove("active"));

            // Add 'active' class to clicked item
            this.classList.add("active");
        });
    });
}
//Get selected Date...G1
function selctedDateGet(selectedDate){
activeDate = selectedDate;
}
                                                       

//Set resume order date...G1
function resumeOrderByDate (){
        //  console.log("Currently Selected Date 111:", activeDate);

        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(url('/resumePauseOrder')); ?>";
         $("#ajaxLoader").show();
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                subscriptionID : selectedDateData.subscription_id,
                cartId  : selectedDateData.cart_id,
                timeSlot  : selectedDateData.time_slot,
                deliveryDate : activeDate,
                _token: _token
            },
            success: function (response) {
                  jQuery("#vacation").modal("hide");
                 $("#ajaxLoader").hide();
                if (response.success === '1') {
                 window.location.reload();
              
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function (xhr, status, error) {
                  $("#ajaxLoader").hide();
                alert("An error occurred: " + xhr.responseText);
            },
        });
}
//Set resume order...G1
function pauseOrderByDate(element){
         console.log("G1----->",);
        selectedDateData = JSON.parse(element.getAttribute("data-selectedDate"));

        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(url('/pauseOrderDate')); ?>";
         $("#ajaxLoader").show();
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                subscriptionID : selectedDateData.subscription_id,
                cartId  : selectedDateData.cart_id,
                sOrderID  : selectedDateData.store_order_id,             
                _token: _token
            },
            success: function (response) {
                  jQuery("#vacation").modal("hide");
                 $("#ajaxLoader").hide();
                if (response.success === '1') {
                 window.location.reload();
              
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function (xhr, status, error) {
                  $("#ajaxLoader").hide();
                alert("An error occurred: " + xhr.responseText);
            },
        });
}

</script>
<?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Orders/SubscriptionOrders/subscription-order-info.blade.php ENDPATH**/ ?>