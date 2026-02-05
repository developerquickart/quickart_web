<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="rating_review_section">
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
            <div class="rating_review_mainbox">
                <h5 class="heading-design-h5">FAQ's</h5>
                <div class="faq_mainBox">
                    <?php if(isset($faqsList['data'])): ?>
                        <div class="faq_listingBox">
                            <?php $__currentLoopData = $faqsList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faqModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="accordion accordion-flush" id="accordion1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#Que_<?php echo e($faqModel['id']); ?>" aria-expanded="false"
                                                aria-controls="Que_<?php echo e($faqModel['id']); ?>">
                                                <?php echo e($faqModel['question']); ?>

                                            </button>
                                        </h2>
                                        <div id="Que_<?php echo e($faqModel['id']); ?>" class="accordion-collapse collapse"
                                            data-bs-parent="#accordion1">
                                            <div class="accordion-body">
                                                <?php echo e($faqModel['answer']); ?>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/Profile/faq.blade.php ENDPATH**/ ?>