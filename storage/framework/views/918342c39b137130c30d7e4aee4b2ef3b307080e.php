<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="rating_review_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="rating_review_mainbox">
                    <h5 class="heading-design-h5 mb-1"><?php echo e($productName); ?></h5>
                    <div class="add_address_subheading">
                        Ratings and Reviews
                    </div>
                    <?php if(isset($ratingReviewList['data'])): ?>
                    <?php
                        $totalRatings = count($ratingReviewList['data']);
                        $reviewsWithDescription = count(array_filter($ratingReviewList['data'], function ($item) {
                            return !empty(trim($item['description'] ?? ''));
                        }));
                    ?>
                    <p><strong><?php echo e($totalRatings); ?></strong> total ratings,
                        <strong><?php echo e($reviewsWithDescription); ?></strong> with review
                    </p>

                    <div class="rating_review_mainBox1">
                        <?php $__currentLoopData = $ratingReviewList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rating_review_list1">
                                <div class="rating_profile d-flex align-items-center gap-2">
                                    <?php if(strpos($product['user_image'], '/N/A') !== false): ?> 
                                        <img src="assets/images/profile.webp" alt="profile" class="img-fluid product_rating_profile_img">
                                    <?php else: ?>
                                        <img src="<?php echo e($product['user_image']); ?>" alt="profile" class="img-fluid product_rating_profile_img">
                                    <?php endif; ?>
                                    <div class="rating_name"><?php echo e($product['name']); ?></div>
                                </div>
                                <div class="ratingBox">
                                    <div class="rate" style="direction: rtl; unicode-bidi: bidi-override;">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php if($i <= $product['rating']): ?>
                                                <span title="<?php echo e($i); ?> star" style="color: #FEDE33; font-size: 24px;">★</span>
                                            <?php else: ?>
                                                <span title="<?php echo e($i); ?> star" style="color: #ccc; font-size: 24px;">★</span>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                    <div class="rating_count">Verified Purchase</div>
                                </div>
                                <div class="review_time">Review on <span><?php echo e(getTimeAgo($product['created_at'])); ?></span></div>
                                <div class="review_text"><?php echo e($product['description']); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Rating/rating-list.blade.php ENDPATH**/ ?>