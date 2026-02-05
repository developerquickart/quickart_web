<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="login_section">
    <div class="login_mainbox">
        <div class="login_background_img">
            <img src="<?php echo e(asset('assets/images/login-background.webp')); ?>" alt="Login image" class="img-fluid">
        </div>
        <div class="login_content_mainbox">
            <div class="login_logobox">
                <img src="<?php echo e(asset('assets/images/QuicKart_logo.png')); ?>" alt="Logo" class="img-fluid">
            </div>
            <h1 class="login_headingbox">
                Login / SignUp
            </h1>
            <form action="<?php echo e(route('loginsubmit')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="mobile_code">Mobile Number <span class="required_icon">*</span></label>
                    <input type="text" id="mobile_code" class="form-control" name="number" required>
                    <input type="hidden" id="countryCode" name="country_code">
                    <div id="error-msg" class="hide"></div>
                    <input type="hidden" id="flagcode" name="flag_code">
                </div>
                <div class="login_submit_box">
                    <button class="submit_btn">Continue</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>

</script>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Auth/login.blade.php ENDPATH**/ ?>