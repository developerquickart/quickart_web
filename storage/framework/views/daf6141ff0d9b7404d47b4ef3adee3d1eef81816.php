<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

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
                    <h5 class="heading-design-h5">Card Details</h5>
                    <div class="add_card_btn" onclick="addCard()">Add New Card</div>
                </div>
                <?php if(isset($cardList['data']) && count($cardList['data']) > 0): ?>
                <div class="card_details_mainBox">
                    <div class="card_order_box">
                        <div class="row">
                            <?php $__currentLoopData = $cardList['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cardList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4">
                                <div class="payment_method">
                                    <label class="payment_option cards" for="card1">
                                        <div style="display: flex; justify-content: space-between;">

                                            <div class="card_text">Card</div>
                                            <div class="card_remove" onclick="removeCardAlert('<?php echo e($cardList['id']); ?>')">
                                                <img src="<?php echo e(asset('assets/images/delete.svg')); ?>" alt="Removed">
                                            </div>
                                        </div>
                                        <?php if($cardList['si_sub_ref_no'] == $siNo): ?>
                                        <div data-subref="<?php echo e($cardList['si_sub_ref_no']); ?>"
                                            data-cardno="<?php echo e($cardList['card_no']); ?>"></div>
                                        <?php else: ?>
                                        <div data-subref="<?php echo e($cardList['si_sub_ref_no']); ?>"
                                            data-cardno="<?php echo e($cardList['card_no']); ?>"> </div>
                                        <?php endif; ?>
                                        <div class="plan-content">
                                            <div class="plan-details">
                                                <div class="payment_details">
                                                    <div class="cards_img">
                                                        <img src="<?php echo e(asset('assets/images/card.png')); ?>" alt="card">
                                                    </div>
                                                    <div class="card_text"><?php echo e($cardList['card_no']); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
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
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<!-- Remove Card api call...G1 -->
<script>
function removeCardAlert(bankId) {
    Swal.fire({
        title: "Do you want to delete card?",
        showDenyButton: false,
        showCancelButton: true,
        confirmButtonText: "Delete",
    }).then((result) => {
        if (result.isConfirmed) {
            removeCard(bankId);
        } else if (result.isDenied) {
            Swal.fire("Changes are not saved", "", "info");
        }
    });
}
</script>
<!-- Remove Card api call...G1 -->

<script>
function removeCard(bankId) {

    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>removeCardAPICall";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            bankId: bankId,
            _token: _token,
        },
        success: function(result) {
            console.log(result.message);
            console.log(result.action);

            if (result.action == "1") {
                Swal.fire({
                    title: result.message,
                    showDenyButton: false,
                    showCancelButton: false,
                    icon: "sucess",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });



            } else {
                Swal.fire({
                    title: result.message,
                    icon: "error",
                    draggable: true
                }).then(() => {
                    //    location.reload();
                });
            }

        },
        error: function(xhr, status, error) {
            console.error("XHR:", xhr);
            console.error("Status:", status);
            console.error("Error:", error);
            alert("An error occurred: " + xhr.responseText);
        },
    });

}
</script>
<!-- Nevigrate to screen -->
<script>
function navigateToNextPage(url) {
    const nextPageUrl = url;

    window.location.href = nextPageUrl;
    console.log(window.location.href);
}
</script>

<!-- Add car api call...G1 -->
<script>
function addCard() {

    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(ENV('APP_URL')); ?>addCardAPICall";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: {
            addedFrom:'card',
            _token: _token,
        },
        success: function(result) {
            console.log(result.message);
            console.log(result.action);

            if (result.success == "1") {
                navigateToNextPage(href = result.action);

            } else {
                Swal.fire({
                    title: result.message,
                    icon: "error",
                    draggable: true
                }).then(() => {
                    //    location.reload();
                });
            }

        },
        error: function(xhr, status, error) {
            console.error("XHR:", xhr);
            console.error("Status:", status);
            console.error("Error:", error);
            alert("An error occurred: " + xhr.responseText);
        },
    });

}
</script><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/BankCard/card-details.blade.php ENDPATH**/ ?>