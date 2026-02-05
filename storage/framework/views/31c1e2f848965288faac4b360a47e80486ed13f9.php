<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="account-page section-padding">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Daily Orders</h5>
                </div>
                <?php if(isset($dailyOrderList['data']) && count($dailyOrderList['data']) > 0): ?>
                <div class="order-infoMainBox">
                    <div class="row">
                        <?php $__currentLoopData = $dailyOrderList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="daily_order_infoBox">
                                <a
                                    href="<?php echo e(url(ENV('APP_URL') . 'daily-order-details?group_id=' . $orderList['group_id'])); ?>">
                                    <div class="daily_product">
                                        <div class="order_info">
                                            <div class="order_details">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <ul>
                                                            <li>Order ID : <span><?php echo e($orderList['group_id']); ?></span></li>
                                                            <li>Delivery Date :
                                                                <span><?php echo e($orderList['order_date']); ?></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3">
                                                        <ul>
                                                            <li>AED
                                                                <span><?php echo e(number_format($orderList['price_without_delivery'], 2)); ?></span>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                    <?php if($orderList['orderType'] =="trail"): ?>
                                                    <div class="col-lg-3 col-md-3">
                                                        <p class="text-with-bg">Trial Pack</p>
                                                    </div>
                                                    <?php endif; ?>
                                                    <div
                                                        style="border-bottom: 0.3px solid #dadbf0; margin-top: 5px; margin-bottom: 5px ">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <ul>
                                                            <li><?php echo e($orderList['productname']); ?></span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Orders/DailyOrders/daily-orders.blade.php ENDPATH**/ ?>