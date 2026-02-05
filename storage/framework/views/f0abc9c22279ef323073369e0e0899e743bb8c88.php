<?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(!$product['stock'] == 0): ?>
<div class="all_product_list">
    <div class="item">
        <div class="product" data-productDetail='<?php echo json_encode($product, 15, 512) ?>'data-product-id="<?php echo e(trim($product['product_id'])); ?>">
            <div class="product_header">
                <div class="product_top_left">
                    <?php if($product['discountper'] > 0): ?>
                    <div class="discount_text">
                        <?php echo e(number_format($product['discountper'], 0)); ?>%<span>Off</span>
                    </div>
                    <?php else: ?>
                    <?php endif; ?>
                    <?php if($product['country_icon'] != null): ?>
                    <div class="country_flag">
                        <img src="<?php echo e($product['country_icon']); ?>" alt="flag">
                    </div>
                    <?php endif; ?>
                </div>
                <div class="product_top_right">
                    <div class="product_wishlist">
                        <a href="javascript:void(0);" class="wishlist-btn"
                            data-varient-id="<?php echo e($product['varient_id']); ?>">
                            <img class="wishlist-icon"
                                src="<?php echo e(asset($product['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                alt="wishlist" style="max-width: 25px;">
                        </a>
                    </div>

                </div>
            </div>
            <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($product['product_name'])); ?>/<?php echo e(trim($product['product_id'])); ?>">
                <div class="product-img">
                    <img class="img-fluid" src="<?php echo e($product['product_image']); ?>" alt="">
                </div>
                <div class="product_featured_cat_icon_list">
                    <div class="product_featured_cat_icon">
                        <?php $__currentLoopData = $product['feature_tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img class="img-fluid" src="<?php echo e(trim($tags['image'])); ?>" alt="Product">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="product-body">
                    <div class="product_name"><?php echo e($product['product_name']); ?></div>
                    
                </div>
            </a>
            <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                <span>
                    <?php echo e(trim($product['quantity'] ?? '')); ?> <?php echo e(trim($product['unit'] ?? '')); ?>

                </span>
                <?php if(isset($product['varients']) && count($product['varients']) > 1): ?>
                <div class="change-qty" data-productDetail='<?php echo json_encode($product, 15, 512) ?>'data-product-id="<?php echo e(trim($product['product_id'])); ?>">
                    <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                        <?php echo e(count($product['varients'])); ?> options
                        <img class="varient-down-arrow" src="<?php echo e(asset('assets/images/chevron.svg')); ?>" alt="down-arrow" style="width: 12px; height: 12px;">
                    </span>
                </div>
                <?php endif; ?>
            </div>
            <div class="product-footer">
                <div class="product_detail">
                    <?php if($product['price'] == $product['mrp']): ?>
                    <p class="offer-price">AED <?php echo e(number_format($product['price'], 2)); ?></p>
                    <?php else: ?>
                    <p class="offer-price">AED <?php echo e(number_format($product['price'], 2)); ?><br><span
                            class="regular-price">AED
                            <?php echo e(number_format($product['mrp'], 2)); ?></span></p>
                    <?php endif; ?>
                </div>
                <div class="cart_btn" data-product-id="<?php echo e(trim($product['product_id'])); ?>" data-productdetail='<?php echo json_encode($product, 15, 512) ?>'>
                    <div class="qtyBox"
                        data-varient-id="<?php echo e(trim($product['varient_id'])); ?>">
                        <button class="qty-btn qty-btn-minus change-qty" type="button"
                            data-productDetail='<?php echo json_encode($product, 15, 512) ?>'
                            data-change="-1">-</button>
                        <input type="text" name="qty"
                            value="<?php echo e(trim($product['total_cart_qty'])); ?>" id="totalCartQTY"
                            class="input-qty input-rounded" min="0">
                        <input type="hidden" name="stock" id="stock"
                            value="<?php echo e(trim($product['stock'])); ?>">
                        <button class="qty-btn qty-btn-plus change-qty" type="button"
                            data-productDetail='<?php echo json_encode($product, 15, 512) ?>'
                            data-change="1">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="all_product_list">
    <div class="item">
        <div class="product">
            <div class="product_header">
                <div class="product_top_left">
                    <?php if($product['discountper'] > 0): ?>
                    <div class="discount_text">
                        <?php echo e(number_format($product['discountper'], 0)); ?>%<span>Off</span>
                    </div>
                    <?php endif; ?>
                    <?php if($product['country_icon'] != null || $product['country_icon'] != ""): ?>
                    <div class="country_flag">
                        <img src="<?php echo e($product['country_icon']); ?>" alt="flag">
                    </div>
                    <?php endif; ?>
                </div>
                <div class="product_top_right">
                    <div class="product_wishlist">
                        <a href="javascript:void(0);" class="wishlist-btn"
                            data-varient-id="<?php echo e($product['varient_id']); ?>">
                            <img class="wishlist-icon"
                                src="<?php echo e(asset($product['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                alt="wishlist" style="max-width: 25px;">
                        </a>
                    </div>
                    <div class="product_wishlist">
                        <?php if($product['notify_me'] == 'false'): ?>
                        <a href="javascript:void(0);" class="notify-me" data-notified="0"
                            data-varient-id="<?php echo e($product['varient_id']); ?>"
                            data-product-id="<?php echo e($product['product_id']); ?>">
                            <img class="notify-icon"
                                src="<?php echo e(asset('assets/images/notification.png')); ?>" alt="wishlist"
                                style="max-width: 25px;">
                        </a>
                        <?php else: ?>
                        <a href="<?php echo e(ENV('APP_URL')); ?>notify" data-notified="1">
                            <img id="notifyMe-<?php echo e($product['varient_id']); ?>"
                                src="<?php echo e(asset('assets/images/notification-fill.png')); ?>"
                                alt="wishlist" style="max-width: 25px;">
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($product['product_name'])); ?>/<?php echo e(trim($product['product_id'])); ?>">
                <div class="product-img">
                    <img class="img-fluid" src="<?php echo e($product['product_image']); ?>" alt="product">
                </div>
                <div class="product_featured_cat_icon_list">
                    <div class="product_featured_cat_icon">
                        <?php $__currentLoopData = $product['feature_tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img class="img-fluid" src="<?php echo e(trim($tags['image'])); ?>" alt="Product">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="product-body notify_box">
                    <div class="product-body">
                        <div class="product_name"><?php echo e($product['product_name']); ?></div>
                        <div class="product_weight"><span><?php echo e($product['quantity']); ?>

                                <?php echo e($product['unit']); ?></span></div>
                    </div>
                    <div class="product_unavailable">
                        <div class="product_unavailable_title">Product Unavailable</div>
                        <?php if($product['notify_me'] == "true"): ?>
                        <p>You will be notified.</p>
                        <?php else: ?>
                        <p>Click on the bell to get notified.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
            
        </div>
    </div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/CategoryProduct/additional-categories-partial.blade.php ENDPATH**/ ?>