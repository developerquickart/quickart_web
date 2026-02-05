<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- MAIN BANNER START-->
<section class="carousel-slider-main text-center">
       <?php if(isset($oneAPIList['banner']) && count($oneAPIList['banner']) > 0): ?>
    <div class="owl-carousel owl-carousel-slider">
         <?php $__currentLoopData = $oneAPIList['banner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <div class="banner_img">
                <!-- <a href="<?php echo e(env('APP_URL')); ?>banner-product-list"> -->
                    <a href="<?php echo e(env('APP_URL')); ?>banner-product-list?banner_id=<?php echo e($banner['banner_id']); ?>&name=<?php echo e(urlencode($banner['banner_name'])); ?>">

                    <img class="img-fluid" src="<?php echo e($banner['banner_image']); ?>" alt="<?php echo e($banner['banner_name']); ?>">
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      
    </div>
    <?php endif; ?>
</section>
<!-- MAIN BANNER END -->
<!-- FRESH DAIRY SECTION START -->
<section class="product-items-slider section-padding">
     <?php if(isset($oneAPIList['occasionalCategory']) && count($oneAPIList['occasionalCategory']) > 0): ?>
    <div class="container-fluid">
        <div class="row">
<?php $__currentLoopData = $oneAPIList['occasionalCategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasionalCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5"><?php echo e($occasionalCategory['title']); ?><span><?php echo e($occasionalCategory['sub_title']); ?></span></h5>
                      <a class="float-right text-secondary"
                        href="<?php echo e(env('APP_URL')); ?>product-list?screen_name=occasionalCategory&name=<?php echo e(urlencode($occasionalCategory['title'])); ?>">
                        View All</a>
                </div>
                <div class="owl-carousel owl-carousel-featured">
                    <?php $__currentLoopData = $occasionalCategory['product_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                 <div class="product_top_left">
                                     <?php if($productDetail['discountper'] > 0): ?>
                                   <div class="discount_text"><?php echo e(number_format($productDetail['discountper'], 2)); ?><span>Off</span></div>
                                    <?php endif; ?>
                                      <?php if($productDetail['country_icon'] != null || $productDetail['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($productDetail['country_icon']); ?>" alt="flag">
                                    </div>
                                      <?php endif; ?>
                                </div>
                             
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                      
                                        <a onclick="addRemoveWishlist('<?php echo $productDetail['varient_id'];?>', '<?php echo $productDetail['isFavourite'];?>')">
                                            <?php if($productDetail['isFavourite'] == "true"): ?>
                                            <img src="<?php echo e(asset('assets/images/wishlisted.png')); ?>" 
                                                alt="wishlist"
                                                style="max-width: 25px;"
                                                id="wishlist-<?php echo e($productDetail['varient_id']); ?>">
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('assets/images/wishlist.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;" id="wishlist-<?php echo e($productDetail['varient_id']); ?>">
                                                 <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(url(ENV('APP_URL') . 'product-details?product_id=' . $productDetail['product_id'])); ?>">

                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($productDetail['product_image']); ?>" alt="Product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($productDetail['product_name']); ?></div>
                                    <div class="product_weight"><span><?php echo e($productDetail['quantity']); ?> <?php echo e($productDetail['unit']); ?></span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row">
                                       <div class="col-6">
                                        <div class="product_detail">
                                            <p class="offer-price">AED <span><?php echo e(number_format($productDetail['price'], 2)); ?></span><br>
                                            <?php if($productDetail['price'] != $productDetail['mrp']): ?>
                                            <span class="regular-price">AED
                                                    <span><?php echo e(number_format($productDetail['mrp'], 2)); ?></span></span></p>
                                                 <?php endif; ?>  
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <button class="add-to-cart-btn">Add</button>
                                            <div class="qtyBox" id="qtyBox" style="display: none;">
                                                <button class="qty-btn qty-btn-minus" type="button">-</button>
                                                <input type="text" name="qty" value="0" class="input-qty input-rounded">
                                                <button class="qty-btn qty-btn-plus" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
            </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div>
    </div>
      <?php endif; ?>
</section>
<!-- occasionalCategory END -->

<!-- BEST SELLERS PRODUCT SECTION START -->
<section class="product-items-slider section-padding">
           <?php if(isset($oneAPIList['topselling']) && count($oneAPIList['topselling']) > 0): ?>

    <div class="container-fluid">
        
        <div class="row">
            <div  ̰class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Best Sellers</h5>
                               <a class="float-right text-secondary"
                        href="<?php echo e(env('APP_URL')); ?>product-list?screen_name=topselling">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-featured">
         <?php $__currentLoopData = $oneAPIList['topselling']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topselling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                               
                                <div class="product_top_left">
                                     <?php if($topselling['discountper'] > 0): ?>
                                   <div class="discount_text"><?php echo e(number_format($product['discountper'], 2)); ?><span>Off</span></div>
                                    <?php endif; ?>
                                      <?php if($topselling['country_icon'] != null || $topselling['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($topselling['country_icon']); ?>" alt="flag">
                                    </div>
                                      <?php endif; ?>
                                </div>
                             
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="">
                                            <?php if($topselling['isFavourite'] == "true"): ?>
                                            <img src="<?php echo e(asset('assets/images/wishlisted.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;"
                                                class="wishlist-icon" 
                                                data-varient-id="<?php echo e($topselling['varient_id']); ?>"
                                                >
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('assets/images/wishlist.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                                 <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-details">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($topselling['product_image']); ?>" alt="product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($topselling['product_name']); ?></div>
                                    <div class="product_weight"><span><?php echo e($topselling['quantity']); ?> <?php echo e($topselling['unit']); ?></span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="product_detail">
                                            <p class="offer-price">AED <span><?php echo e(number_format($topselling['price'], 2)); ?></span><br>
                                            <?php if($topselling['price'] != $topselling['mrp']): ?>
                                            <span class="regular-price">AED
                                                    <span><?php echo e(number_format($topselling['mrp'], 2)); ?></span></span></p>
                                                 <?php endif; ?>  
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <button class="add-to-cart-btn">Add</button>
                                            <div class="qtyBox" id="qtyBox" style="display: none;">
                                                <button class="qty-btn qty-btn-minus" type="button">-</button>
                                                <input type="text" name="qty" value="0" class="input-qty input-rounded">
                                                <button class="qty-btn qty-btn-plus" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                </div>
            </div>
        </div>
        
    </div>
        <?php endif; ?>
</section>
<!-- BEST SELLERS PRODUCT SECTION END -->
<!-- CATEGORIES SECTION START -->
<section class="top-category section-padding">
      <?php if(isset($oneAPIList['top_cat']) && count($oneAPIList['top_cat']) > 0): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Categories</h5>
                    <a class="float-right text-secondary" href="<?php echo e(ENV('APP_URL')); ?>all-categories">View All</a>
                </div>
                
                <div class="owl-carousel owl-carousel-category">
                      <?php $__currentLoopData = $oneAPIList['top_cat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="category-item">
                               <a href="<?php echo e(ENV('APP_URL')); ?>subcategories-product-list/<?php echo e(str_replace(" ", "-", strtolower($topCat['title']))); ?>-<?php echo e($topCat['cat_id']); ?>">
                                <img class="img-fluid" src="<?php echo e($topCat['image']); ?>"
                                    alt="Product">
                                <h6><?php echo e($topCat['title']); ?></h6>
                            </a>
                        </div>
                    </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
            </div>
        </div>
   
    </div>
       <?php endif; ?>
</section>
<!-- CATEGORIES SECTION END -->
<!-- ORDER AGAIN SECTION START -->
<section class="order-section section-padding">
     <?php if(isset($oneAPIList['orderlist']) && count($oneAPIList['orderlist']) > 0): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Order Again</h5>
                    <a class="float-right text-secondary" href="<?php echo e(ENV('APP_URL')); ?>subscription-orders">View All</a>
                </div>
                <div class="order_again_mainBox">
                    
                    <div class="row">
                          <?php $__currentLoopData = $oneAPIList['orderlist']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2 col-sm-4 col-6">
                            <a href="<?php echo e(ENV('APP_URL')); ?>order-details">
                                <div class="order_again_listBox">
                                    <div class="order_again_imgBox">
                                      <?php if(count($orderList['prodList']) > 0 ): ?>
                                             <img class="img-fluid" src="<?php echo e($orderList['prodList']['0']['varient_image']); ?>"
                                            alt="product">
                                               <?php else: ?>
                                                <img class="img-fluid" src="<?php echo e(asset('assets/images/product1.png')); ?>"
                                            alt="product">
                                                <?php endif; ?>
                                    </div>
                                        <?php if(count($orderList['prodList']) > 1 ): ?>
                                    <div class="order_again_count"><?php echo e(count($orderList['prodList']) - 1); ?>+ product</div>
                                         <?php endif; ?>
                                </div>
                            </a>
                        </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        
                    </div>
             
                </div>
            </div>
        </div>
    </div>
      <?php endif; ?>
</section>
<!-- ORDER AGAIN SECTION END -->
<!-- FEATURED CATEGORIES SECTION START -->
<section class="order-section section-padding">
    <?php if(isset($oneAPIList['featurecategory']) && count($oneAPIList['featurecategory']) > 0): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Featured Category</h5>
                </div>
                <div class="order_again_mainBox">
                    <div class="row">
                            
                        <div class="featured_cate_mainbox">
                            <?php $__currentLoopData = $oneAPIList['featurecategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="featured_cate_list">
                                <div class="featured_cate_img">
                                    <img src="<?php echo e($featuredCat['image']); ?>" alt="categories"
                                        class="img-fluid">
                                </div>
                                <div class="featured_cate_text"><?php echo e($featuredCat['title']); ?></div>
                            </div>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
      <?php endif; ?>
</section>
<!-- FEATURED CATEGORIES SECTION END-->
<!-- SECOND PRODUCT BANNER SECTION START -->
<section class="offer-product section-padding">
         <?php if(isset($oneAPIList['second_banner']) && count($oneAPIList['second_banner']) > 0): ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-carousel-slider">
                      <?php $__currentLoopData = $oneAPIList['second_banner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secondBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="banner_img">
                                               <a href="<?php echo e(env('APP_URL')); ?>banner-product-list?brand_id=<?php echo e($secondBanner['brand_id'] != null ? $secondBanner['brand_id'] : 0); ?>&name=<?php echo e(urlencode($secondBanner['banner_name'])); ?>">

                                <img class="img-fluid"
                                    src="<?php echo e($secondBanner['banner_image']); ?>" alt="First slide"></a>
                        </div>
                    </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
            </div>
        </div>
    </div>
     <?php endif; ?>
</section>
<!-- SECOND PRODUCT BANNER SECTION END -->
<!-- FRESH DAIRY SECTION START -->
<section class="product-items-slider section-padding">
     <?php if(isset($oneAPIList['additional_category']) && count($oneAPIList['additional_category']) > 0): ?>
    <div class="container-fluid">
        <div class="row">
<?php $__currentLoopData = $oneAPIList['additional_category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5"><?php echo e($additionalCat['title']); ?><span><?php echo e($additionalCat['sub_title']); ?></span></h5>
                    <a class="float-right text-secondary" href="<?php echo e(ENV('APP_URL')); ?>product-list?screen_name=additional_category&name=<?php echo e(urlencode($additionalCat['title'])); ?>">View All</a>

                </div>
                <div class="owl-carousel owl-carousel-featured">
                    <?php $__currentLoopData = $additionalCat['product_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                 <div class="product_top_left">
                                     <?php if($productDetail['discountper'] > 0): ?>
                                   <div class="discount_text"><?php echo e(number_format($productDetail['discountper'], 2)); ?><span>Off</span></div>
                                    <?php endif; ?>
                                      <?php if($productDetail['country_icon'] != null || $productDetail['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($productDetail['country_icon']); ?>" alt="flag">
                                    </div>
                                      <?php endif; ?>
                                </div>
                             
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="">
                                            <?php if($productDetail['isFavourite'] == "true"): ?>
                                            <img src="<?php echo e(asset('assets/images/wishlisted.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;"
                                                class="wishlist-icon" 
                                                data-varient-id="<?php echo e($productDetail['varient_id']); ?>"
                                                >
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('assets/images/wishlist.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                                 <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-details">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($productDetail['product_image']); ?>" alt="Product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($productDetail['product_name']); ?></div>
                                    <div class="product_weight"><span><?php echo e($productDetail['quantity']); ?> <?php echo e($productDetail['unit']); ?></span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row">
                                       <div class="col-6">
                                        <div class="product_detail">
                                            <p class="offer-price">AED <span><?php echo e(number_format($productDetail['price'], 2)); ?></span><br>
                                            <?php if($productDetail['price'] != $productDetail['mrp']): ?>
                                            <span class="regular-price">AED
                                                    <span><?php echo e(number_format($productDetail['mrp'], 2)); ?></span></span></p>
                                                 <?php endif; ?>  
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <button class="add-to-cart-btn">Add</button>
                                            <div class="qtyBox" id="qtyBox" style="display: none;">
                                                <button class="qty-btn qty-btn-minus" type="button">-</button>
                                                <input type="text" name="qty" value="0" class="input-qty input-rounded">
                                                <button class="qty-btn qty-btn-plus" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
            </div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </div>
    </div>
      <?php endif; ?>
</section>

<!-- GET SNEAKY BANNER SECTION START -->
<section class="offer-product section-padding">
         <?php if(isset($oneAPIList['sneaky_banner'])): ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner_img">
                    <a href="<?php echo e(ENV('APP_URL')); ?>product-list"><img class="img-fluid"
                            src="<?php echo e($oneAPIList['sneaky_banner']['banner_image']); ?>" alt="Sneaky">
                    </a>
                </div>
            </div>
        </div>
    </div>
       <?php endif; ?>
</section>
<!-- GET SNEAKY BANNER SECTION END -->

<!-- TRENDING PRODUCTS SECTION START -->
<section class="product-items-slider section-padding">
         <?php if(isset($oneAPIList['sneaky_banner']) && count($oneAPIList['recentselling']) > 0): ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Trending Products</h5>
                    <a class="float-right text-secondary" href="<?php echo e(ENV('APP_URL')); ?>product-list?screen_name=recentselling">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-featured">
                    <?php $__currentLoopData = $oneAPIList['recentselling']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentselling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <?php if($recentselling['discountper'] > 0): ?>
                                   <div class="discount_text"><?php echo e(number_format($recentselling['discountper'], 2)); ?><span>Off</span></div>
                                    <?php endif; ?>
                                      <?php if($recentselling['country_icon'] != null || $recentselling['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($recentselling['country_icon']); ?>" alt="flag">
                                    </div>
                                      <?php endif; ?>
                            </div>
                           <a href="<?php echo e(ENV('APP_URL')); ?>product-details">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($recentselling['product_image']); ?>" alt="Product">
                                </div>
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($recentselling['product_name']); ?></div>
                                    <div class="product_weight"><span><?php echo e($recentselling['quantity']); ?> <?php echo e($recentselling['unit']); ?></span></div>
                                </div>
                            </a>
                            <div class="product-footer">
                                <div class="row">
                                    <div class="col-6">
                                          <div class="product_detail">
                                            <p class="offer-price">AED <span><?php echo e(number_format($productDetail['price'], 2)); ?></span><br>
                                            <?php if($productDetail['price'] != $productDetail['mrp']): ?>
                                            <span class="regular-price">AED
                                                    <span><?php echo e(number_format($productDetail['mrp'], 2)); ?></span></span></p>
                                                 <?php endif; ?>  
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="cart_btn">
                                            <button class="add-to-cart-btn">Add</button>
                                            <div class="qtyBox" id="qtyBox" style="display: none;">
                                                <button class="qty-btn qty-btn-minus" type="button">-</button>
                                                <input type="text" name="qty" value="0" class="input-qty input-rounded">
                                                <button class="qty-btn qty-btn-plus" type="button">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
               </div>
            </div>
        </div>
    </div>
        <?php endif; ?>
</section>
<!-- TRENDING PRODUCTS SECTION END -->
<!-- EXPLORE BY BRAND SECTION START -->
<section class="top-category section-padding">
             <?php if(isset($oneAPIList['brand']) && count($oneAPIList['brand']) > 0): ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Explore by Brands</h5>
                    <a class="float-right text-secondary" href="<?php echo e(ENV('APP_URL')); ?>all-brands">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-brands">
                          <?php $__currentLoopData = $oneAPIList['brand']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                                      

                        <div class="brand-item">
                            <a href="<?php echo e(ENV('APP_URL')); ?>product-list">
                                <img class="img-fluid" src="<?php echo e($brand['image']); ?>" alt="Product">
                            </a>
                        </div>
                     
                    </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
            </div>
        </div>
    </div>
        <?php endif; ?>
</section>
<!-- EXPLORE BY BRAND SECTION END -->
 <!-- GET SNEAKY BANNER SECTION START -->
<section class="offer-product section-padding">
         <?php if(isset($oneAPIList['trailpackimage'])): ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                 <div class="section-header">
                    <h5 class="heading-design-h5">TRIAL PACK PRODUCTS</h5>
                    <a class="float-right text-secondary" href="<?php echo e(ENV('APP_URL')); ?>product-list?screen_name=trailpackimage">View All</a>
                </div>
                <div class="banner_img">
                    <a href="<?php echo e(ENV('APP_URL')); ?>product-list"><img class="img-fluid"
                            src="<?php echo e($oneAPIList['trailpackimage']); ?>" alt="Sneaky">
                    </a>
                </div>
            </div>
        </div>
    </div>
       <?php endif; ?>
</section>
<!-- GET SNEAKY BANNER SECTION END -->



<!-- ONCLICK CART BOX START -->
<div class="cart_flating_btn" onclick="toggleOrderBox(event)">
    <small class="cart-value">5</small>
    <img src="<?php echo e(asset('assets/images/grocery-store.svg')); ?>" alt="">
</div>
<div class="order_placeBox" id="orderBox" style="display: none;">
    <div class="row align-items-center">
        <div class="col-12">
            <div class="freeDeliverytext">Congratulations! You've got <span>FREE DELIVERY</span></div>
            <div class="countText">5 items | AED 100.17</div>
            <div class="saveText">You have saved <span>AED 2.91</span> on your order</div>
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
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/createProject/resources/views/index.blade.php ENDPATH**/ ?>