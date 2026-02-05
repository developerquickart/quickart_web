<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="terms_section section-padding py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="section-header">
                    <h5 class="heading-design-h5">Terms & Conditions</h5>
                </div>
                <?php if(isset($getTermsCondition['data'])): ?>
                    <div class="width100 terms_content">
                        <?php echo $getTermsCondition['data']['description']; ?>

                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/footer/terms-condition.blade.php ENDPATH**/ ?>