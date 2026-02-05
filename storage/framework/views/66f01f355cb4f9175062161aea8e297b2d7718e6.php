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
                <div class="section-header">
                    <h5 class="heading-design-h5">Notifications</h5>
                </div>
                <?php if(isset($showNotificationList['data']['data']) && count($showNotificationList['data']['data']) > 0): ?>
                <div class="notification_listing" id="notificationList">
                    <div class="notification_list faq_listingBox">
                        <?php $__currentLoopData = $showNotificationList['data']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion accordion-flush" id="accordion1">
                            <div class="accordion-item">
                                <a href="#notificationList1" class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#noti_<?php echo e(str_replace(' - ', '-', trim($data['title']))); ?>"
                                        aria-expanded="false"
                                        aria-controls="noti_<?php echo e(str_replace(' - ', '-', trim($data['title']))); ?>">
                                        <?php echo e($data['title']); ?>

                                    </button>
                                </a>
                                <div id="noti_<?php echo e(str_replace(' - ', '-', trim($data['title']))); ?>"
                                    class="accordion-collapse collapse" data-bs-parent="#accordion1">
                                    <div class="accordion-body">
                                        <?php $__currentLoopData = $data['notification_listing']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notificationList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="notificationBox"
                                            style="background-color: <?php echo e(setNotificationBGColor($notificationList['noti_title'], 'bg')); ?>; 
                                            border: 0.5px solid <?php echo e(setNotificationBGColor($notificationList['noti_title'], 'border')); ?>;">
                                            <?php if($notificationList['image']!= null): ?>
                                            <div class="notification_img">
                                                <img src="<?php echo e($notificationList['image']); ?>" alt="Notification">
                                            </div>
                                            <?php endif; ?>
                                            <div class="notification_textbox">
                                                <div class="notification_date">
                                                    <?php echo e(getTimeAgo($notificationList['created_at'])); ?></div>
                                                <div class="notification_heading"><?php echo e($notificationList['noti_title']); ?>

                                                </div>
                                                <div class="notification_text"><?php echo e($notificationList['noti_message']); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
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
    </div>
</section>

<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views//notification.blade.php ENDPATH**/ ?>