<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="section-padding">
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
            <?php if(isset($couponList)): ?>
            <div class="coupon_listing_box">
                <div class="subheading">Available Coupons</div>
                <div class="coupon_item_list">
                    <?php $__currentLoopData = $couponList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $couponModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="coupon_item">
                        <div class="coupon_data">
                            <div class="coupon_code_data">
                                <div class="coupon_code">
                                    <div class="coupon_img">
                                        <a data-fancybox="coupon" data-src="<?php echo e($couponModel['coupon_image']); ?>"
                                            data-caption="<?php echo e($couponModel['coupon_description']); ?>">
                                            <img src="<?php echo e($couponModel['coupon_image']); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="coupon_code_text" >
                                        <?php echo e($couponModel['coupon_code']); ?>

                                    </div>
                                </div>
                            </div>
                            <p><?php echo e($couponModel['coupon_description']); ?> </p>
                        </div>
                        <div class="coupon_details">
                            <div class="coupon_details_text">
                                Use code
                                <strong><?php echo e($couponModel['coupon_name']); ?>

                                    (<?php echo e($couponModel['coupon_code']); ?>)</strong> to get
                                <?php if($couponModel['type'] == "percentage"): ?>
                                <strong><?php echo e($couponModel['amount']); ?>%</strong>
                                <?php else: ?>
                                <strong><?php echo e($couponModel['amount']); ?> AED</strong>
                                <?php endif; ?>
                                off on your order .
                            </div>
                        </div>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
              <?php else: ?>
            <div class="shop-list section-padding">
            <div class="container">
            <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
            <div class="data_not_available">
            <div class="imageBox">
            <img src="<?php echo e(asset('assets/images/No_data_available.png')); ?>" alt="empty cart"
            class="img-fluid">
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- COPY TEXT START -->
<script>
let lastCopiedElement = null;

document.addEventListener("DOMContentLoaded", () => {
    const couponElements = document.querySelectorAll(".coupon_code_text");
    couponElements.forEach(element => {
        element.addEventListener("click", () => {
            const text = element.innerText;
            const textarea = document.createElement("textarea");
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);

            if (lastCopiedElement) {
                lastCopiedElement.classList.remove("copied");
            }
            element.classList.add("copied");
            lastCopiedElement = element;
            
            Swal.fire({
                icon: 'success',
                title: 'Coupon Code Copied Successfully!',
                text: response.message,
                timer: 3000,
                showConfirmButton: false
            });

            // alert("Text copied to clipboard: " + text);
        });
    });
});
</script>

<!-- COPY TEXT END -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Profile/coupon.blade.php ENDPATH**/ ?>