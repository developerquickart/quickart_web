<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="order_successful_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="order_confirmed_box">
                    <img src="<?php echo e(asset('assets/images/Success.png')); ?>" alt="Check" class="img-fluid">
                    <div class="heading-design-h5 text-center my-3">Order Confirmed !</div>

                    <?php if(\Request::get('screen') == "daily" && $CartCount['subscriptioncartCount'] > 0): ?>
                        <p>You're almost done! Your Daily Cart is checked out. Complete your order by checking out your
                            Subscription Cart.</p>
                    <?php endif; ?>
                    <?php if(\Request::get('screen') == "subscription" && $CartCount['dailycartCount'] > 0): ?>
                        <p>You're almost done! Your Subscription Cart is checked out. Complete your order by checking out
                            your
                            Daily Cart.</p>
                    <?php endif; ?>
                    <p>You will receive your order on selected date.</p>
                    <p>
                    <div class="green_text" onclick="onClickTrackOrderBtn('<?php echo e(\Request::get('screen')); ?>')">
                        Track Order
                    </div>
                    </p>
                    <div class="btn_wrap">
                        <a href="/" class="button continue_btn">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function onClickTrackOrderBtn(screenString) {
        if (screenString == "daily") {
            localStorage.setItem("selectedOrderTab", "1");
            navigateToNextPage(href = '<?php echo e(env('APP_URL ')); ?>my-orders?tab=1');
            // navigateToNextPage(href = "<?php echo e(ENV('APP_URL')); ?>daily-orders");

        } else if (screenString == "subscription") {
            // navigateToNextPage(href = "<?php echo e(ENV('APP_URL')); ?>subscription-orders");
            localStorage.setItem("selectedOrderTab", "2");
            navigateToNextPage(href = '<?php echo e(env('APP_URL ')); ?>my-orders?tab=2');
        }
    }
</script>
<script>
    function navigateToNextPage(url) {
        const nextPageUrl = url;
        window.location.href = nextPageUrl;
        // console.log(window.location.href);
    }
</script>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/order-complete.blade.php ENDPATH**/ ?>