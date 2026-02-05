<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="order_successful_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="order_confirmed_box">
                    <img src="<?php echo e(asset('assets/images/failed.png')); ?>" alt="Check" class="img-fluid">
                    <div class="heading-design-h5 text-center my-3">Order Cancelled !</div>
                    <p>Your order has been cancelled successfully</p>
                    <p>Check our range of products & shop again.</p>
                    <div class="btn_wrap">
                        <?php if(\Request::get('tab') == 1): ?>
                            <a href="<?php echo e(url('/')); ?>" class="button continue_btn">Continue Shopping</a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>" class="button continue_btn">Continue Shopping</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/order-cancelled.blade.php ENDPATH**/ ?>