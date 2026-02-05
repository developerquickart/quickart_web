<section class="section-padding bg-white border-top feature_section">
    <div class="container-fluid">
        <div class="row">
            <div class="featureBox_list">
                <div class="feature-box">
                    <div class="feature_box_img">
                        <img src="<?php echo e(asset('assets/images/footer_wallet.png')); ?>" alt="Easy Payment" class="img-fluid">
                    </div>
                    <div class="feature_box_text">
                        Farm-Fresh Goodness
                    </div>
                </div>
                <div class="feature-box">
                    <div class="feature_box_img">
                        <img src="<?php echo e(asset('assets/images/footer_wallet.png')); ?>" alt="Guranteed Saving"
                            class="img-fluid">
                    </div>
                    <div class="feature_box_text">
                        Premium Quality Guaranteed
                    </div>
                </div>
                <div class="feature-box">
                    <div class="feature_box_img">
                        <img src="<?php echo e(asset('assets/images/free-shipping.png')); ?>" alt="Free delivery" class="img-fluid">
                    </div>
                    <div class="feature_box_text">
                        FREE
                        DELIVERY
                    </div>
                </div>
                <div class="feature-box">
                    <div class="feature_box_img">
                        <img src="<?php echo e(asset('assets/images/footer_guarantee.png')); ?>" alt="Quality Guranteed"
                            class="img-fluid">
                    </div>
                    <div class="feature_box_text">
                        FREE Subscription
                    </div>
                </div>
                <div class="feature-box">
                    <div class="feature_box_img">
                        <img src="<?php echo e(asset('assets/images/footer_guarantee.png')); ?>" alt="Earn real reward"
                            class="img-fluid">
                    </div>
                    <div class="feature_box_text">
                        Hassle-Free Payments
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<div class="footer_box">
    <!-- <div class="show_footer">
        <div class="d-flex justify-content-between align-items-center">
            <div class="tag_line">Freshness Delivered Daily - Quickart</div>
            <div class="plus_icon">+</div>
        </div>
    </div> -->
    <footer class="Footer__Wrapper">
        <div class="container-fluid">
            <div class="FooterLinks__Grid">
                <div>
                    <div class="footer_heading">Useful Links</div>
                    <ul class="FooterLinks__List">
                        <li class="FooterLinks__ListItem"><a href="<?php echo e(ENV('APP_URL')); ?>about">About</a></li>
                        <li class="FooterLinks__ListItem"><a href="<?php echo e(ENV('APP_URL')); ?>privacy-policy">Privacy</a></li>
                        <li class="FooterLinks__ListItem"><a href="<?php echo e(ENV('APP_URL')); ?>faq">FAQs</a></li>
                        <!-- <li class="FooterLinks__ListItem"><a href="<?php echo e(ENV('APP_URL')); ?>careers">Careers</a></li> -->
                        <li class="FooterLinks__ListItem"><a href="<?php echo e(ENV('APP_URL')); ?>return-refund">Refund</a></li>
                        <!-- <li class="FooterLinks__ListItem"><a href="<?php echo e(ENV('APP_URL')); ?>mobile">Mobile</a></li> -->
                        <!-- <li class="FooterLinks__ListItem"><a href="<?php echo e(ENV('APP_URL')); ?>blog">Blog</a></li> -->
                        <li class="FooterLinks__ListItem"><a href="<?php echo e(ENV('APP_URL')); ?>terms-conditions">Terms</a></li>
                        <li class="FooterLinks__ListItem"><a href="<?php echo e(ENV('APP_URL')); ?>help">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <div class="footer_heading">Categories <span><a href="<?php echo e(ENV('APP_URL')); ?>all-categories">See All</a></span></div>
                    <!--<ul class="FooterLinks__List">-->
                    <!--    <li><a href="<?php echo e(env('APP_URL')); ?>subcategories-product-list?category=farm-fresh-dairy&catid=121">Farm Fresh-->
                    <!--                    Dairy</a></li>-->
                                        
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/bakery-22">Bakery</a></li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/vegetables-36">Vegetables</a></li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/eggs-19">Eggs</a></li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/dairy-1">Dairy</a>-->
                    <!--    </li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/bulk-buy-139">Bulk Buy</a></li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/fresh-flowers-60">Fresh Flowers</a></li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/ready-to-eat-29">Ready To Eat</a></li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/pantry-must-haves-31">Pantry Must Haves</a></li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/beverages-7">Beverages</a></li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/fresh-cuts-170">Fresh Cuts</a>-->
                    <!--    </li>-->
                    <!--    <li><a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/fruits-142">Fruits</a></li>-->
                    <!--</ul>-->
                    <ul class="FooterLinks__List" id="categoriesList">
                        <div id="ajaxLoader" style="display:none; text-align:center">
                            <img src="<?php echo e(asset('assets/images/loader.gif')); ?>" width="40" />
                        </div>
                        <!-- Data will be injected here via JS -->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright -->
    <div class="DownloadAndFollowRow__Wrapper">
        <div class="DownloadAndFollowRow__Grid">
            <div class="DownloadAndFollowRow__Item">&copy; Copyright 2025 QuicKart. All Rights Reserved</div>
            <div class="DownloadAndFollowRow__Item">
                <div class="download_buttonBox">
                    <div class="download_btnText">Download Now</div>
                    <div class="download_buttons_Item">
                    <div width="92" height="30" class="Imagestyles__Image">
                    <a href="https://play.google.com/store/apps/details?id=com.quickart.customer" target="_blank">
                    <img src="<?php echo e(asset('assets/images/google.png')); ?>" alt="App Store" width="92" height="30" loading="lazy" style="border-radius: 0px; object-fit: fill; cursor: pointer;">
                    </a>
                    </div>
                    <div width="92" height="30" class="Imagestyles__Image">
                    <a href="https://apps.apple.com/in/app/quickart/id1624846848" target="_blank">
                    <img src="<?php echo e(asset('assets/images/apple.png')); ?>" alt="App Store" width="92" height="30" loading="lazy" style="border-radius: 0px; object-fit: fill; cursor: pointer;">
                    </a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="DownloadAndFollowRow__Item socialMedia">
                <div class="DownloadAndFollorRow_SocialIcon">
                    <a href="https://www.facebook.com/QuicKart.uae/" target="_blank">
                        <img src="<?php echo e(asset('assets/images/facebook.svg')); ?>" alt="Facebook">
                    </a> 
                </div>
                <div class="DownloadAndFollorRow_SocialIcon">
                    <a href="https://twitter.com/Quickartuae/" target="_blank">
                        <img src="<?php echo e(asset('assets/images/twitter.svg')); ?>" alt="Twitter">
                    </a>
                </div>
                <div class="DownloadAndFollorRow_SocialIcon">
                    <a href="https://www.instagram.com/accounts/login/?next=/quickartuae/" target="_blank">
                        <img src="<?php echo e(asset('assets/images/instagram.svg')); ?>" alt="Instagram">
                    </a>
                </div>
                <div class="DownloadAndFollorRow_SocialIcon">
                    <a href="https://www.linkedin.com/company/quickart-general-trading-llc/" target="_blank">
                        <img src="<?php echo e(asset('assets/images/linkedin.svg')); ?>" alt="Linkedin">
                    </a>
                </div>
                <div class="DownloadAndFollorRow_SocialIcon">
                    <a href="//api.whatsapp.com/send?phone=97142390322&text=Wel-Come" target="_blank">
                        <img src="<?php echo e(asset('assets/images/whatsapp.svg')); ?>" alt="Whatsapp">
                    </a>
                </div>
            </div>  
        </div>
    </div>
    <!-- End Copyright -->
</div>
<div id="scrollToTopBtn" class="top_btn show" title="Move To Top">
    <img src="<?php echo e(asset('assets/images/top.png')); ?>" class="img-fluid" alt="top">
</div>

<!-- Variant Modal Open... G1 -->
   <div tabindex="-1" data-testid="focus-trap-container" >
        <div role="dialog" aria-modal="true" class="product_options" style="--transition-duration: undefineds;">
            <div class="products_overlay" data-testid="modal-overlay" role="button" tabindex="0"
                aria-label="Close overlay"></div>
            <div class="product_options_mainBox">
                <div class="product_optionsBox">
                    <div class="_2dmsv _3paQJ" role="heading" aria-level="2">
                        <div aria-hidden="true" class="heading" id="varientTitle"></div>
                    </div>
                    <div class="packaging_optionsBox">
                        <div class="packaging_heading">Select Packaging Preference:</div>
                        <div class="packaging_options_listing">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="packaging-options"
                                    id="packaging-options-bottle">
                                <label class="form-check-label" for="packaging-options-bottle">
                                    
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="packaging-options"
                                    id="packaging-options-pouch">
                                <label class="form-check-label" for="packaging-options-pouch">
                                    
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="product_options_list" role="list" aria-label="Items list">
                        <div class="varients_container">
                            <div class="varient_product_img">
                                <img src="https://quickart.b-cdn.net//images/product/20-05-2022/Al-Ain-Low-Fat-Yoghurt-1-Kg.png"
                                    alt="categories" class="img-fluid">
                            </div>
                            <div class="varient_product_details">
                                <div class="product_weight"></div>
                                <div class="offer-price">AED <span>0.00</span><br>
                                    <span class="regular-price">AED <span>1.27</span></span>
                                </div>
                            </div>
                            <div class="varient_product_cartBox">
                                <div class="qtyBox" data-varient-id="244">
                                    <button class="qty-btn qty-btn-minus change-qty" type="button"
                                        data-varient-id="244" data-change="-1">-</button>
                                    <input type="text" name="qty" value="1" class="input-qty input-rounded"
                                        min="0">
                                    <input type="hidden" name="stock" id="stock" value="1">
                                    <button class="qty-btn qty-btn-plus change-qty" type="button"
                                        data-varient-id="244" data-change="1">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="option_total_button_wrapper">
                        <button class="option_item_totalButton">
                            <div class="options_item_totalBox">
                                <div class="option_item_total_text">Item total :</div>
                                <div class="option_item_total_amount">0</div>
                            </div>
                            <div class="sc-gEvEer bTPZog">Done</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!----Varient model Closed...G1----->

<?php echo $__env->make('popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Bootstrap core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<!-- select2 Js -->
<!-- Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Custom -->
<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>

<!-- FANCY BOX SCRIPT  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


<!-- SCROLL TO TOP SCRIPT START -->
<script>

    document.addEventListener("DOMContentLoaded", function() {
        var scrollToTopBtn = document.getElementById("scrollToTopBtn");
        window.addEventListener("scroll", function() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollToTopBtn.classList.add("show");
            } else {
                scrollToTopBtn.classList.remove("show");
            }
        });
        scrollToTopBtn.addEventListener("click", function() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    });
</script>
<!-- SCROLL TO TOP SCRIPT END -->

<!-- Wishlist SCRIPT START -->
<script>
    jQuery(document).on('click', '.wishlist-btn', function() {
        
        if(currentUserID == ''){
            action = 'wishlist';
            pendingProductId = jQuery(this).data('varient-id');
            console.log(pendingProductId,action);
            $('#login').modal('show');
        }else{
            var varientId = jQuery(this).data('varient-id');
            addToWishList(varientId);
        }
    });

    function addToWishList(varientId){
        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(url('/addRemoveWishlist')); ?>";
        <?php
            $lastSegment = collect(request()->segments())->last();
        ?>
        var currentPage = "<?php echo e($lastSegment ?? ''); ?>";
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                varient_id: varientId,
                _token: _token
            },
            success: function(result) {
                if (result.success) {
                    // Update the image source based on the action
                    var imgElement = jQuery('.wishlist-btn[data-varient-id="' + varientId + '"]').find(
                        '.wishlist-icon');
                    imgElement.attr('src', result.action === 'added' ?
                        "<?php echo e(asset('assets/images/wishlisted.png')); ?>" :
                        "<?php echo e(asset('assets/images/wishlist.png')); ?>");
                        gtag('event', result.action === 'added' ? 'add_to_wishlist' : 'remove_from_wishlist', {
                                item_id: varientId,
                                item_name: result.name,
                                method: 'wishlist_button_clickW',
                                page_location: window.location.href,
                                debug_mode: false
                            });
                    if(result.action == 'removed' && currentPage == 'wishlist'){
                        window.location.reload();
                    }    
                } else {
                    alert(result.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            // alert("An error occurred.");
            }
        });
    }
</script>
<!-- Wishlist SCRIPT END -->
<!-- Add Notify Me Start -->
<script>
    var currentUserID = "<?php echo e($data_arr['user_id'] ?? ''); ?>";
    jQuery(document).on('click', '.notify-me', function() {
        
        
        if(currentUserID == ''){
            pendingProductId = jQuery(this).data('varient-id');
            action = 'notifyme';
            console.log(pendingProductId);
            $('#login').modal('show');
        }else{
            console.log('notify me else');
            var varient_id = jQuery(this).data('varient-id');
            var product_id = jQuery(this).data('product-id');
            var is_notified = jQuery(this).data('notified');
            var isvarient = jQuery(this).data('isvarient');
            console.log(is_notified);
            console.log(isvarient);
            var updatetext = jQuery(this).parents('.product').find('.product_unavailable p');
            notifyMe(varient_id,product_id,is_notified,updatetext, isvarient);
        }
    });

    function notifyMe(varient_id,product_id,is_notified,updatetext, isvarient){
        var _token = jQuery('meta[name="csrf-token"]').attr('content');

        if (is_notified == 1) {
            // If already notified, redirect to notification list
            window.location.href = '<?php echo e(url("notify")); ?>';
            return;
        }

        var url = "<?php echo e(url('/addNotifyMe')); ?>";
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                varient_id: varient_id,
                product_id: product_id,
                _token: _token
            },
            success: function(result) {
                if (result.success) {
                     var imgElement = jQuery('.notify-me[data-varient-id="' + varient_id + '"]').find(
                        '.notify-icon');
                        console.log("varient----",isvarient);
                        if (isvarient == "varient") {
                                document.getElementById('notify-me-' + varient_id).src = '<?php echo e(asset('assets/images/notification-fill.png')); ?>';
                        } else {
                    imgElement.attr('src', result.action === 'added' ?
                        "<?php echo e(asset('assets/images/notification-fill.png')); ?>" :
                        "<?php echo e(asset('assets/images/notification.png')); ?>");
                        }
                            jQuery(updatetext).html('You will be notified'); 
                            jQuery('.notify-me[data-varient-id="' + varient_id + '"]').attr('data-notified',1);
                            jQuery('.notify-me[data-varient-id="' + varient_id + '"]').data('notified',1);
                            gtag('event', result.action === 'added' ? 'addNotifyMe' : 'remove_NotifyMe', {
                            item_id: varient_id,
                            item_name: 'product-id:' + product_id,
                            method: 'notifyMe_button_clickW',
                            page_location: window.location.href,
                            debug_mode: false
                        });
                        
                        
                } else {
                    alert(result.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                alert("An error occurred.");
            }
        });
    }
</script>
<script>
    const APP_URL = "<?php echo e(env('APP_URL')); ?>";
    const ASSET_URL = "<?php echo e(asset('assets/images')); ?>";
</script>
<!-- Cart Quantity Start -->
<script>
    // Object to track added products
    var addedProducts = {};
    
    jQuery(document).on('click', '.change-qty', function() {
        var $btn = jQuery(this);
        var change = parseInt($btn.data('change'));
        var $qtyBox = $btn.closest('.qtyBox');
        var $qtyInput = $qtyBox.find('.input-qty');
        var productDetail = $btn.attr('data-productDetail');
        var screenName = $btn.attr('data-screen-name');
        var varients = [];
        var features = [];

        if (productDetail) {
            productDetail = JSON.parse(productDetail);
            varients = productDetail.varients || [];
            features = productDetail.features || [];
        } else {
            console.error('productDetail not found');
            return;
        }
        // console.log('productDetail:----------', productDetail);
        // Check login
        if (currentUserID == '') {
            pendingProductId = $qtyBox.data('varient-id');
            action = 'addToCart';
            $('#login').modal('show');
            return;
        }

        // Handle multiple variants or features
        if (varients.length >= 2 || (varients.length == 1 && features.length >= 1)) {
            openVariantSelectionModal(productDetail, screenName);
            return;
        }

        // Handle single variant (direct add/remove)
        if (varients.length === 1 && features.length === 0) {
            var varientId = varients[0].varient_id;

            // Always get the *live* input value
            var currentQty = parseInt($qtyInput.val()) || 0;
            var newQty = currentQty + change;
            if (newQty < 0) newQty = 0;

            // Update UI
            $qtyInput.val(newQty);

            // Optional: Update productDetail JSON so next click has the latest value
            productDetail.cart_qty = newQty;
            
            $btn.attr('data-productDetail', JSON.stringify(productDetail));
            
             if (screenName == "product_detail") {
                 newQty = 1;
             }
            //  console.log('screenName:----------0', newQty,);
            if (change == -1){
                addToCart(varientId, -1, true, screenName, newQty, "remove", productDetail.product_id, 0);
            }else {
                addToCart(varientId, 1, true, screenName, newQty,"", productDetail.product_id, 0);
            }
        }else{
            var currentQty = parseInt($qtyInput.val()) || 0;
            var newQty = currentQty + change;
            if (newQty < 0) newQty = 0;

            // Update UI
            $qtyInput.val(newQty);

            // Optional: Update productDetail JSON so next click has the latest value
            productDetail.cart_qty = newQty;
            
            $btn.attr('data-productDetail', JSON.stringify(productDetail));
            
            //  console.log('screenName:----------111', newQty,);
            if (change == -1){
                addToCart(productDetail.varient_id, -1, true, screenName, newQty, "remove", productDetail.product_id, productDetail.product_feature_id);
            }else {
            // Call addToCart with updated quantity
            addToCart(productDetail.varient_id, 1, true, screenName, newQty,"", productDetail.product_id, productDetail.product_feature_id);
            }
        }
    });
    
    function openVariantSelectionModal(productDetail, screenName) {
        const { varients, features, product_name } = productDetail;

        $('#varientTitle').text(product_name);
        const overlay = document.querySelector('.products_overlay');
        const productOptions = document.querySelector('.product_options');
        const mainBox = document.querySelector('.product_options_mainBox');
        const listContainer = productOptions.querySelector('.product_options_list');
        const packagingOptionsBox = document.querySelector('.packaging_optionsBox');
        const packagingList = packagingOptionsBox.querySelector('.packaging_options_listing');
        const doneButton = document.querySelector('.bTPZog');
        const allTotal = document.querySelector('.option_item_total_amount');
        packagingOptionsBox.style.display = 'block';

        // Reset modal content
        listContainer.innerHTML = '';
        packagingList.innerHTML = '';

        overlay.dataset.features = JSON.stringify(features);
        overlay.dataset.varients = JSON.stringify(varients);

        productOptions.style.display = 'block';
        productOptions.classList.add('active');
        overlay.classList.add('active');
        mainBox.classList.add('active');

        var total = 0;
         varients.forEach((variant, index) => {
                total += (variant.price * variant.cart_qty);
                const feature = features[index] || {};
                const varientDiv = document.createElement('div');
                varientDiv.className = 'varients_container';
                varientDiv.innerHTML = `
                    <div class="varient_product_img">
                        <img src="${variant.product_image}" alt="${variant.product_name}" class="img-fluid">
                    </div>
                    <div class="varient_product_details">
                        <div class="product_weight">${variant.quantity} ${variant.unit}</div>
                        <div class="offer-price">AED <span>${variant.price}</span></div>
                    </div>
                    <div class="varient_product_cartBox">
                        ${variant.stock > 0 ? `
                            <div class="qtyBox" data-varient-id="${variant.variant_id}">
                                <button class="qty-btn varient-btn-minus" type="button" data-varient-id="${variant.varient_id}" data-product-id="${productDetail.product_id}" data-price="${variant.price}" data-change="-1">-</button>
                                <input type="text" name="qty" value="${variant.cart_qty}" class="input-qty input-rounded" min="0">
                                <button class="qty-btn varient-btn-plus" type="button" data-varient-id="${variant.varient_id}" data-product-id="${productDetail.product_id}" data-price="${variant.price}" data-change="1">+</button>
                            </div>
                        ` : `
                            <div class="product_unavailable">
                                ${
                                    variant.notify_me == 'false'
                                    ? `
                                        <a href="javascript:void(0);" class="notify-me"
                                            data-notified="0"
                                            data-varient-id="${variant.varient_id}"
                                            data-product-id="${productDetail.product_id}" data-isvarient="varient">
                                            <img src="${ASSET_URL}/notification.webp"
                                                alt="Notification"
                                                style="max-width:25px;" id="notify-me-${variant.varient_id}">
                                        </a>
                                      `
                                    : `
                                        <a href="${APP_URL}notify" data-notified="1" class="notify-me">
                                            <img id="notifyMe-${variant.varient_id}"
                                                src="${ASSET_URL}/notification-fill.png"
                                                alt="wishlist"
                                                style="max-width:25px;">
                                        </a>
                                      `
                                }
                                <div class="product_unavailable_title1">Product Unavailable</div>
                                <div class="product_unavailable_subtitle1">Tab the bell to get notified</div>
                            </div>
                        `}
                    </div>
                `;
                listContainer.appendChild(varientDiv);
            });
            allTotal.textContent = `AED ${total.toFixed(2)}`;

            // Features (radio)
            if (features.length > 0) {
                let featureId = features[0].id;
                varients.forEach(v => {
                    const id = parseInt(v.product_feature_id || 0);
                    console.log("G1----featureId-->",id);
                    if (id > 0) {
                    featureId = id; 
                    }
                });
                
                packagingList.innerHTML = ''; // clear old options
                features.forEach((feature, i) => {
                    const isChecked = parseInt(feature.id) === parseInt(featureId) ? 'checked' : '';

                    const option = document.createElement('div');
                    option.classList.add('form-check');
                    option.innerHTML = `
                    <input class="form-check-input" type="radio" name="packaging-options"
                        id="packaging-option-${i}" value="${feature.id}" ${isChecked}>
                    <label class="form-check-label" for="packaging-option-${i}">
                        ${feature.feature_value}
                    </label>
                    `;
                    packagingList.appendChild(option);
                });


                
            } else {
                packagingOptionsBox.style.display = 'none';
            }

            
            const radios = packagingList.querySelectorAll('input[name="packaging-options"]');
            radios.forEach(radio => {
                radio.addEventListener('change', async function () {
                    const selectedFeatureId = this.value;
                    console.log("Selected Feature ID:", selectedFeatureId);
                    const v1 = varients
                                    .filter(v => v.cart_qty > 0)
                                    .map(v => v.varient_id);
                    
                    console.log("Cart qty >  varient IDs:", v1);

                    // Call for API
                    var _token = jQuery('meta[name="csrf-token"]').attr('content');
                    var url = "<?php echo e(url('/update-cart')); ?>";
                    jQuery.ajax({
                        url: url,
                        method: "POST",
                        data: {
                            varients: v1,
                            selectedFeatureId: selectedFeatureId,
                            _token: _token
                        },
                        success: function(result) {
                            // alert("AJAX Response: " + JSON.stringify(result));
                            console.log(result);
                            if (result.success) {
                             const $mainCard = jQuery(`.cart_btn[data-product-id="${productDetail.product_id}"]`);

                                if ($mainCard.length) {
                                    let productDetail = $mainCard.data('productdetail');
                                    if (productDetail) {
                                        if (typeof productDetail === "string") {
                                            productDetail = JSON.parse(productDetail);
                                        }    
                                        productDetail.varients.forEach(variant => {
                                          variant.product_feature_id = selectedFeatureId;
                                        });
                                        // Save the updated JSON back to the element
                                        $mainCard.attr('data-productdetail', JSON.stringify(productDetail));
                                        // Also update data on both +/- buttons inside this card
                                        $mainCard.find('.change-qty').each(function () {
                                            jQuery(this).attr('data-productdetail', JSON.stringify(productDetail));
                                        });
                                        const $mainCardn = jQuery(`.product[data-product-id="${productDetail.product_id}"]`);
                                        $mainCardn.find('.change-qty').each(function () {
                                            jQuery(this).attr('data-productdetail', JSON.stringify(productDetail));
                                        });
                                        console.log('✅ Updated main productDetail JSON:', productDetail);
                                    }
                                }
                            
                            } else {
                                alert(result.message); // Show error message
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", status, error);
                        // alert("An error occurred: " + error); // Show error alert
                        }
                    });
                    
                });
            });


        doneButton.addEventListener('click', function() {
            productOptions.classList.remove('active');
            overlay.classList.remove('active');
            mainBox.classList.remove('active');
            productOptions.style.display = 'none';
            if (screenName == "cart") {
                 window.location.reload();
            }
            
        });
        // Close when clicking outside (overlay)
        overlay.addEventListener('click', function() {
            productOptions.classList.remove('active');
            overlay.classList.remove('active');
            mainBox.classList.remove('active');
            if (screenName == "cart") {
                 window.location.reload();
            }
        });
    }
  
    jQuery(document).on('click', '.varient-btn-minus', function() {    
        const $btn = jQuery(this);
        const $qtyInput = $btn.siblings('input[name="qty"]'); 
        const stock = parseInt($btn.siblings('input[name="stock"]').val()); 
        const change = parseInt($btn.data('change'));
        let currentQty = parseInt($qtyInput.val()) || 0;

        let newQty = currentQty + change;

        // Ensure newQty is >= 0 and <= stock
        if (newQty < 0) newQty = 0;
        if (newQty > stock) newQty = stock;

        $qtyInput.val(newQty);
        
        
        
        const varientId = $btn.data('varient-id');
         const productID = $btn.data('product-id');
        // console.log('Variant ID:', varientId, 'New Qty:', newQty);
        var screenName = jQuery(this).data('screen');
         const price = $btn.data('price');
        const allTotalEl = document.querySelector('.option_item_total_amount');
        // const price = parseFloat($btn.siblings('input[name="offer-price"]').val()) || 0;
        let currentTotal = parseFloat(allTotalEl.textContent.replace('AED', '').trim()) || 0;
        let total = parseFloat(currentTotal - price);
        if (total < 0) total = 0;
         console.log('total------1',total);
        allTotalEl.textContent = `AED ${total.toFixed(2)}`;

        addToCart(varientId, change, true, "screenName", $qtyInput.val(),"remove", productID, 0);
    });
    jQuery(document).on('click', '.varient-btn-plus', function() {
        const $btn = jQuery(this);
        const $qtyInput = $btn.siblings('input[name="qty"]'); // find the qty input in same box
        const stock = parseInt($btn.siblings('input[name="stock"]').val()); // stock value
        const change = parseInt($btn.data('change')); // -1 or +1
        let currentQty = parseInt($qtyInput.val()) || 0;

        // Update quantity
        let newQty = currentQty + 1;

        // Ensure newQty is >= 0 and <= stock
        if (newQty < 0) newQty = 0;
        if (newQty > stock) newQty = stock;

        // Update the input
        $qtyInput.val(newQty);
        
        const allTotalEl = document.querySelector('.option_item_total_amount');
        // const price = parseFloat($btn.siblings('input[name="offer-price"]').val()) || 0;
        let currentTotal = parseFloat(allTotalEl.textContent.replace('AED', '').trim()) || 0;
        const price = $btn.data('price');
        console.log('total------3',currentTotal , price);
                let total = parseFloat(currentTotal + price);
        if (total < 0) total = 0;
        console.log('total------3',total);
        allTotalEl.textContent = `AED ${total.toFixed(2)}`;

        // Optional: call addToCart or update cart
        const varientId = $btn.data('varient-id');
         const productID = $btn.data('product-id');

        var screenName = jQuery(this).data('screen');
        // console.log('qty-btn-plus------1',$qtyInput.val());
        addToCart(varientId, change, true, "screenName", $qtyInput.val(),"", productID, 0);
    });



//Update Cart qty...G1
function addToCart(varientId,change,isLogin,screenName='', newQTY, addedRemove, productId='', cartFeatureID='') {
           
    var stock = parseInt(jQuery('.qtyBox[data-varient-id="' + varientId + '"] #stock').val());
    // console.log(stock);
    var removeButton = jQuery('.qty-btn-minus[data-varient-id="' + varientId + '"]');
    var addButton = jQuery('.qty-btn-plus[data-varient-id="' + varientId + '"]');
    var qtyBox = jQuery('.qtyBox[data-varient-id="' + varientId + '"] .input-qty');
    const qtyInput = jQuery('.qtyBox[data-varient-id="' + varientId + '"] .input-qty');
    if (newQTY < 0) {
        newQTY = 0; 
    }

    if (change > 0) {
        if (newQTY > stock) {
            Swal.fire({
                icon: 'warning',
                title: 'Stock Insufficient',
                text: 'No more stock available'
            });
            addButton.prop('disabled', true).html('<span class="loader"></span>');
            removeButton.prop('disabled', true);
            console.log(newQTY,stock);
            $(qtyBox).val(newQTY-1);
            addButton.prop('disabled', true);
            removeButton.prop('disabled', true);
            return false; 
        }
       
    } else {
        removeButton.prop('disabled', true);
        addButton.prop('disabled', true);
    }

    const packagingList = document.querySelector('.packaging_options_listing');
    let selectedFeatureId = 0;

    if (packagingList) {
    const selectedRadio = packagingList.querySelector('input[name="packaging-options"]:checked');
    selectedFeatureId = selectedRadio ? selectedRadio.value : 0;
    }
    if (screenName == "cart" && selectedFeatureId == 0) {
        selectedFeatureId = cartFeatureID;
    }
    console.log("Selected Feature ID:", selectedFeatureId ?? 'null');

    // Call for API
    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(url('/add-to-cart')); ?>";
    if (change > 0 && !addedProducts[varientId]) {
        addedProducts[varientId] = true;
    }
    if (newQTY >= 0) {
        jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                varient_id: varientId,
                qty: newQTY,
                selectedFeatureId: selectedFeatureId,
                _token: _token
            },
            success: function(result) {
                // alert("AJAX Response: " + JSON.stringify(result));
                console.log(result);
                // console.log('screenName:----------2', screenName);
                if (result.success) {
                //    var currentQty = parseInt($('#totalCartQTY').val()) || 0;
                    const $mainCard = jQuery(`.cart_btn[data-product-id="${productId}"]`);
                    if ($mainCard.length && screenName != "cart" ) {
                        let productDetail = $mainCard.data('productdetail');
                        if (productDetail) {
                            if (typeof productDetail === "string") {
                                productDetail = JSON.parse(productDetail);
                            }
                            const variant = productDetail.varients.find(v => parseInt(v.varient_id) === parseInt(varientId));
                            if (variant) {
                                // Update cart qty based on action
                                if (addedRemove === 'remove') {
                                    variant.cart_qty = Math.max(variant.cart_qty - 1, 0);
                                } else {
                                    variant.cart_qty = variant.cart_qty + 1;
                                }
                                // Update the correct variant inside the array
                                const updatedVarients = productDetail.varients.map(v =>
                                    parseInt(v.varient_id) === parseInt(varientId) ? variant : v
                                );
                                // Recalculate total_cart_qty from all variants
                                const totalQty = productDetail.varients.reduce((sum, v) => sum + (parseInt(v.cart_qty) || 0), 0);
                                productDetail.total_cart_qty = totalQty;
                                 $mainCard.find('#totalCartQTY').val(totalQty);


                                productDetail.varients = updatedVarients;
                                // Save the updated JSON back to the element
                                $mainCard.attr('data-productdetail', JSON.stringify(productDetail));
                                // Also update data on both +/- buttons inside this card
                                $mainCard.find('.change-qty').each(function () {
                                    jQuery(this).attr('data-productdetail', JSON.stringify(productDetail));
                                });
                                const $mainCardn = jQuery(`.product[data-product-id="${productId}"]`);
                                $mainCardn.find('.change-qty').each(function () {
                                    jQuery(this).attr('data-productdetail', JSON.stringify(productDetail));
                                });
                                
                                // console.log('✅ Updated main productDetail JSON:', $mainCardn);
                                // console.log('✅ Updated main productDetail JSON:', productDetail);
                            }
                        }
                    }
                    var dailyCartCount = result.cart_count.dailycartCount || 0;
                    // console.log(dailyCartCount);
                    var subscriptionCartCount = result.cart_count.subscriptioncartCount || 0;
                    var totalCartCount = dailyCartCount + subscriptionCartCount;
                    jQuery('.cart-value').text(totalCartCount);
                    var totalPrice = parseFloat(result.cart_count.dailytotalPrice) + parseFloat(
                        result.cart_count.subscriptiontotalPrice);
                    var savedAmount = parseFloat(result.cart_count.dailydiscountOnMrp) + parseFloat(
                        result.cart_count.subscriptiondiscountOnMrp);
                    jQuery('.countText').text(totalCartCount + ' items | AED ' + totalPrice.toFixed(
                        2));
                    jQuery('.saveText').html('You have saved <span>AED ' + savedAmount.toFixed(2) +
                        '</span> on your order');
                    if(result.data.status == 0){
                        Swal.fire({
                            icon: 'warning',
                            title: 'Quickart',
                            text: result.data.message
                            // text: 'You cannot add more than ' + stock + ' items to the cart.',
                        });
                    }else if(result.data.status == 1){
                         if (addedRemove == 'remove') {
                            gtag('event', 'remove_to_cartW', {
                                currency: 'AED',
                                value: result.data.data.price.toFixed(2), 
                                items: [{
                                    item_id: varientId,
                                    item_name:  result.data.data.product_name,
                                    quantity: newQTY,
                                    price: result.data.data.price.toFixed(2)
                                }],
                                method: 'cart_button_click',
                                page_location: window.location.href,
                                debug_mode: false // set true if testing in DebugView
                                });
                        } else {
                            gtag('event', 'add_to_cartW', {
                                currency: 'AED',
                                value: result.data.data.price.toFixed(2), 
                                items: [{
                                    item_id: varientId,
                                    item_name:  result.data.data.product_name,
                                    quantity: newQTY,
                                    price: result.data.data.price.toFixed(2)
                                }],
                                method: 'cart_button_click',
                                page_location: window.location.href,
                                debug_mode: false // set true if testing in DebugView
                                });
                        }
                        fbq('track', 'AddToCart', {
                            content_ids: varientId,
                            content_name: result.data.data.product_name,
                            content_type: 'product',
                            value: result.data.data.price.toFixed(2),
                            currency: 'AED'
                            });
                    }
                    // console.log('✅ UscreenN-----ame'  , screenName);
                    if (screenName == "cart" || screenName == "product_detail") {
                         window.location.reload();
                    }
                    
                } else {
                    alert(result.message); // Show error message
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", status, error);
               // alert("An error occurred: " + error); // Show error alert
            }
        }).always(function() {
            removeButton.prop('disabled', false);
            addButton.prop('disabled', false);
            removeButton.html('-');
            addButton.html('+');
        });
    } else {
        removeButton.prop('disabled', false);
        addButton.prop('disabled', false);
    }
}
</script>
<script>
$(document).ready(function() {
    var storedCartData = localStorage.getItem('cartData');
    if (storedCartData) {
        var cartData = JSON.parse(storedCartData);
        // Update UI from localStorage
        //jQuery('.cart-value').text(cartData.totalCartCount);
        //jQuery('.countText').text(cartData.totalCartCount + ' items | AED ' + cartData.totalPrice);
        //jQuery('.saveText').html('You have saved <span>AED ' + cartData.savedAmount + '</span> on your order');
    }
});

</script>
<!-- Cart Quantity End -->

<!-- Show trial pack product api call...G1 -->
<script>
    function buyNow(trialPID, btnName) {
        // console.log("AJAX Success:1", btnName);

        var _token = jQuery('meta[name="csrf-token"]').attr('content');
        var url = "<?php echo e(ENV('APP_URL')); ?>buyNowTrialPack";

        if (btnName != "add") {
            window.location.href = '<?php echo e(env('APP_URL')); ?>trial-pack-cart';
        }else{
            jQuery.ajax({
            url: url,
            method: "POST",
            data: {
                trialPID: trialPID,
                qty: "1",
                _token: _token,
            },

            success: function (result) {
                // console.log("AJAX Success:", btnName);

                if (result.success === '1') {
                    // console.log("Second ID:", btnName);
                    // if (btnName == "add") {
                    //     Swal.fire({
                    //         title: "Trial pack added successfully",
                    //         showDenyButton: false,
                    //         showCancelButton: false,
                    //         icon: "sucess",
                    //         confirmButtonText: "OK",
                    //     }).then((result) => {
                    //         if (result.isConfirmed) {
                    //             window.location.href = "<?php echo e(env('APP_URL')); ?>trial-pack-cart";
                    //         }
                    //     });

                    // } else {
                        window.location.href = '<?php echo e(env('APP_URL')); ?>trial-pack-cart';
                    // }
                } else {
                    alert("Error: " + result.message);
                }
            },
            error: function (xhr, status, error) {

                alert("An error occurred: " + xhr.responseText);
            },
        });
        }
        

    }
</script>

<!-- Include Firebase SDK -->
<script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-messaging-compat.js"></script>

<script>
  // Your Firebase config
  const firebaseConfig = {
    apiKey: "AIzaSyB-KcVMEb8TMyO6HKbthQ6m6tMXEadGyQ4",
    authDomain: "quickart-customer.firebaseapp.com",
    projectId: "quickart-customer",
    messagingSenderId: "616864050624",
    appId: "1:616864050624:web:2edcc5d6a43bb4c9b92c25",
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  const messaging = firebase.messaging();

  // Request notification permission from the browser
  Notification.requestPermission().then(function(permission) {
    if (permission === 'granted') {
      console.log('Notification permission granted.');

      messaging.getToken({ vapidKey: 'BKIaZ9bCtfZMsqlEMH1zynM6Xu7RG10tAHL9Xa7t7lasQB5FXPYNIZv-Kp3GVrFTGCybrsmocLYL5tv9wNuX4To' })
        .then(function(currentToken) {
          if (currentToken) {
            console.log('FCM Token:', currentToken);
            // Send this token to your Laravel backend if needed
            // Example: use fetch() or AJAX to post it to a route
          } else {
            console.log('No registration token available. Request permission to generate one.');
          }
        })
        .catch(function(err) {
          console.log('An error occurred while retrieving token. ', err);
        });
    } else {
      console.log('Notification permission not granted.');
    }
  });

  // Handle incoming messages
  messaging.onMessage(function(payload) {
    console.log('Message received: ', payload);
    const notificationTitle = payload.notification.title;
    const notificationOptions = {
      body: payload.notification.body,
      icon: payload.notification.icon
    };

    new Notification(notificationTitle, notificationOptions);
  });
</script>


<!-- PROFILE PAGES SIDE MENU START -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const currentPath = window.location.pathname;

    // ✅ 1. Handle top-level direct links
    document.querySelectorAll('#side-menu .sub-menu-list a').forEach(link => {
        const linkPath = new URL(link.href).pathname;
        if (linkPath === currentPath) {
            link.classList.add('menu-active');

            const menuItem = link.closest('.menu_item');
            if (menuItem) {
                menuItem.classList.add('menu-active');
                const subMenuList = menuItem.querySelector('.sub-menu-list');
                if (subMenuList) {
                    subMenuList.classList.add('menu-active');
                }
            }
        }
    });

    // ✅ 2. Handle sub-menu collapsible links
    document.querySelectorAll('#side-menu .sub-inner-links').forEach(link => {
        const linkPath = new URL(link.href).pathname;
        if (linkPath === currentPath) {
            link.classList.add('menu-active');

            const collapse = link.closest('.collapse');
            if (collapse) {
                collapse.classList.add('show');

                const menuItem = collapse.closest('.menu_item');
                if (menuItem) {
                    menuItem.classList.add('menu-active');
                    const subMenuList = menuItem.querySelector('.sub-menu-list');
                    if (subMenuList) {
                        subMenuList.classList.add('menu-active');
                    }
                }
            }
        }
    });
});
</script>
<!-- PROFILE PAGES SIDE MENU START -->

<!---Set categories listing...G1---->
<script>
document.addEventListener("DOMContentLoaded", function () {
    $("#ajaxLoader").show();

    var _token = jQuery('meta[name="csrf-token"]').attr('content');
    var url = "<?php echo e(env('APP_URL')); ?>cateegoriesList";

    jQuery.ajax({
        url: url,
        method: "POST",
        data: { _token: _token },
        success: function(response) {
            $("#ajaxLoader").hide();

            if (response.success === '1') {
                let data = response.action;
                let html = '';
              
                if (data && data.data.length > 0) {
                    data.data.slice(0, 12).forEach(function (category) {
                        // console.log("g1------>",category.title );
                        const slug = category.slug ?? category.title.toLowerCase().replace(/\s+/g, '-');
                        const subCat = category.subcategory && category.subcategory.length > 0 ? category.subcategory[0] : null;
                        const slug1 = subCat.title.toLowerCase().replace(/\s+/g, '-');
                        const url = `<?php echo e(env('APP_URL')); ?>subcategories-product-list/${slug}/${category.cat_id}/${slug1}/${subCat.cat_id}`;
                    
                        html += `
                            <li>
                                <a href="${url}">${category.title}</a>
                            </li>`;
                    });
                } else {
                    html = '<li>No categories available.</li>';
                }

                
                const footerList = document.getElementById('categoriesList');
                if (footerList) {
                    footerList.innerHTML = html;
                } else {
                    console.warn('.FooterLinks__List not found in DOM');
                }
            } else {
                alert("Error: " + response.message);
            }
        },
        error: function(xhr) {
            $("#ajaxLoader").hide();
            alert("An error occurred: " + xhr.responseText);
        }
    });
});
</script>


</div>
</body>

</html><?php /**PATH C:\xampp\htdocs\quickart\quickart_web\resources\views/footer.blade.php ENDPATH**/ ?>