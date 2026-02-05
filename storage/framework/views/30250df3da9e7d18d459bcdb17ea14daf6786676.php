<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="top-category section-padding py-5">
    <div class="container-fluid">
        <div class="sidemenu_mainBox">
            <div class="sidemenu_menu_mainBox">
                <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
                    <nav class="menu open-current-submenu">
                        <div id="side-menu">
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>profile" class="sub-menu-list-link">Profile</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>my-orders?tab=1" class="sub-menu-list-link">My Order</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>address-list" class="sub-menu-list-link">My Address</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>coupon" class="sub-menu-list-link">My Offers</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>notification" class="sub-menu-list-link">Notification</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#account" aria-expanded="false" aria-controls="account">Payment Details</div>
                                <div class="collapse" id="account" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="<?php echo e(ENV('APP_URL')); ?>wallet" class="sub-inner-links">Wallet</a></li>
                                        <li><a href="<?php echo e(ENV('APP_URL')); ?>card-details" class="sub-inner-links">Card Details</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list dropdown" data-bs-toggle="collapse" data-bs-target="#shopping" aria-expanded="false" aria-controls="shopping">My Shopping</div>
                                <div class="collapse" id="shopping" data-bs-parent="#side-menu">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal small">
                                        <li><a href="<?php echo e(ENV('APP_URL')); ?>wishlist" class="sub-inner-links">Wishlist</a></li>
                                        <li><a href="<?php echo e(ENV('APP_URL')); ?>notify" class="sub-inner-links">Notify Me</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>help" class="sub-menu-list-link">Get Help</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="<?php echo e(ENV('APP_URL')); ?>faq" class="sub-menu-list-link">FAQ's</a>
                                </div>
                            </div>
                            <div class="menu_item">
                                <div class="sub-menu-list">
                                    <a href="javascript(0)" data-bs-toggle="modal" data-bs-target="#logout" class="sub-menu-list-link">Logout</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </aside>
            </div>
            <div class="sidemenu_content_mainBox">
                <div class="section-header">
                    <h5 class="heading-design-h5">Wishlist</h5>
                </div>
                <?php if(isset($productList['data']) && count($productList['data']) > 0): ?>
                <div class="product_list_box">
                    <?php $__currentLoopData = $productList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$product['stock'] == 0): ?>
                    <div class="all_product_list">
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
                                </div>
                            </div>
                             <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($product['product_name'])); ?>/<?php echo e(trim($product['product_id'])); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($product['product_image']); ?>" alt="">
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
                                <div class="change-qty" data-productDetail='<?php echo json_encode($product, 15, 512) ?>'>
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
                                </a>
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
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <div class="shop-list section-padding">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6">
                                <div class="data_not_available">
                                    <div class="imageBox">
                                        <img src="<?php echo e(asset('assets/images/No_product_available.png')); ?>" alt="empty cart"
                                            class="img-fluid">
                                    </div>
                                    <div class="textBox text-center">
                                        <a href="/" class="my-4 d-block">
                                            <div class="cancel_btn">Let's Shop</div>
                                        </a>
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
</section>
<!-- ONCLICK CART BOX START -->
<div class="cart_flating_btn" onclick="toggleOrderBox(event)">
    <small class="cart-value">0</small> <!-- This will be updated dynamically -->
    <img src="<?php echo e(asset('assets/images/grocery-store.svg')); ?>" alt="">
</div>
<div class="order_placeBox" id="orderBox" style="display: none;">
    <div class="row align-items-center">
        <div class="col-12">
            <div class="freeDeliverytext">Congratulations! You've got <span>FREE DELIVERY</span></div>
            <div class="countText">0 items | AED 0</div> <!-- This will be updated -->
            <div class="saveText">You have saved <span>AED 0</span> on your order</div> <!-- This will be updated -->
        </div>
    </div>
</div>
<!-- ONCLICK CART BOX END -->

<script>
function toggleOrderBox(event) {
    event.stopPropagation();
    const orderBox = document.getElementById('orderBox');
    orderBox.style.display = orderBox.style.display === 'none' ? 'block' : 'none';
}
document.addEventListener('click', function(event) {
    const orderBox = document.getElementById('orderBox');
    const cartButton = document.querySelector('.cart_flating_btn');

    if (!orderBox.contains(event.target) && !cartButton.contains(event.target)) {
        orderBox.style.display = 'none';
    }
});
</script>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Profile/wishlist.blade.php ENDPATH**/ ?>