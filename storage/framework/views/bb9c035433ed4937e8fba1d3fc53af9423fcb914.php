<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$referralCode = $appInfo['data']['referral_code'] ?? '';
$referralText = $appInfo['data']['referral_message'] ?? '';
?>
<!-- MAIN BANNER START Done-->
<section class="carousel-slider-main text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if(isset($oneAPIList['banner']) && count($oneAPIList['banner']) > 0): ?>
                <div class="home_banner">
                    <div class="owl-carousel owl-carousel-slider">
                        <?php $__currentLoopData = $oneAPIList['banner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="banner_img">
                                <img 
                                  class="img-fluid" 
                                  src="<?php echo e($banner['banner_image']); ?>" 
                                  alt="First slide"
                                  style="cursor:pointer;"
                                  onclick="openBannerProductList('<?php echo e(url('banner-product-list', ['name' => Str::slug($banner['banner_name'])])); ?>', 'byname'=>'<?php echo e(trim($banner['banner_name'])); ?>', 'store', '<?php echo e(trim($banner['banner_name'])); ?>')"
                                />
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <?php if(isset($oneAPIList['featurecategory']) && count($oneAPIList['featurecategory']) > 0): ?>
                <div class="featured_cat_MainBox">
                    <div class="section-header1">
                        <h5 class="heading-design-h5 text-center pb-3">Filter by Tags</h5>
                    </div>
                    <div class="order_again_mainBox">
                        <div class="row">
                            <div class="featured_cate_mainbox">
                                <?php $__currentLoopData = $oneAPIList['featurecategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="featured_cate_list">
                                    <div class="featured_cate_img">
                                        <a
                                            href="<?php echo e(ENV('APP_URL')); ?>featured-categories-product-list/<?php echo e($featuredCat['id']); ?>/<?php echo e(Str::slug($featuredCat['title'])); ?>">
                                            <img src="<?php echo e($featuredCat['image']); ?>" alt="categories" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="featured_cate_text"><?php echo e($featuredCat['title']); ?></div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- MAIN BANNER END -->
<!-- CATEGORIES SECTION START Done-->
<?php if(isset($oneAPIList['top_cat']) && count($oneAPIList['top_cat']) > 0): ?>
<section class="top-category section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5" onclick="openPopUPScreen('search', '13', 'Popup banner')">Categories</h5>
                    <a class="float-right text-secondary" href="<?php echo e(ENV('APP_URL')); ?>all-categories">View All</a>
                </div>
                <div class="categories_list">
                    <?php $__currentLoopData = $oneAPIList['top_cat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="category-item">
                        <a href="<?php echo e(env('APP_URL')); ?>subcategories-product-list/<?php echo e(Str::slug($topCat['title'])); ?>/<?php echo e($topCat['cat_id']); ?>/<?php echo e(Str::slug($topCat['subcategory_title'])); ?>/<?php echo e($topCat['subcategory_id']); ?>"> 
                            <img class="img-fluid"
                                src="<?php echo e($topCat['image'] ?? asset('assets/images/default-product.jpg')); ?>"
                                alt="Product">
                            <h6><?php echo e(trim($topCat['title'])); ?></h6>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

    </div>
</section>
<?php endif; ?>
<!-- CATEGORIES SECTION END -->
<!-- FEATURED CATEGORIES SECTION END-->

<?php
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\RequestException;
    
    try {
    $client = new Client();
    $nodeappUrl = env('NODE_APP_URL'); // Replace with your API Base URL
    
    $response = $client->post($nodeappUrl . 'oneapi', [
        'json' => [
            'store_id' => 7,
            'user_id' => !empty(session()->get('user_id')) ? session()->get('user_id') : 2,
            'is_subscription' => 1,
            'device_id' => ""
        ]
    ]);
    
    if ($response->getStatusCode() === 200) {
        $oneAPIList = json_decode($response->getBody()->getContents(), true);
    }
    } catch (RequestException $e) {
    $errorMessage = $e->getMessage();
    \Log::error('API Request Error: ' . $errorMessage);
    } catch (\Exception $e) {
    $errorMessage = $e->getMessage();
    \Log::error('API General Error: ' . $errorMessage);
    }
    ?>
<!-- SECOND PRODUCT BANNER SECTION START -->
<?php if(isset($oneAPIList['second_banner']) && count($oneAPIList['second_banner']) > 0): ?>
<section class="offer-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-carousel-four">
                    <?php $__currentLoopData = $oneAPIList['second_banner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secondBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="banner_img">
                            <img 
                                  class="img-fluid" 
                                  src="<?php echo e($secondBanner['banner_image']); ?>" 
                                  alt="First slide"
                                  style="cursor:pointer;"
                                  onclick="openBannerProductList('<?php echo e(url('banner-product-list', ['name' => Str::slug($secondBanner['banner_name'])])); ?>', 'byname'=>'<?php echo e(trim($banner['banner_name'])); ?>', 'product', '<?php echo e(trim($secondBanner['banner_name'])); ?>')"
                                />
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- SECOND PRODUCT BANNER SECTION END -->

<!-- YOUR ACTIVE SUBSCRIPTION SECTION START Done-->
<?php if(!empty($data_arr['user_id']) && $data_arr['user_id'] != ''): ?>
    <?php if(isset($oneAPIList['activesub_ordlist']) && count($oneAPIList['activesub_ordlist']) > 0): ?>
    <section class="product-items-slider section-padding">
        <div class="container">
            <div class="row">
                <div ̰class="col-lg-12">
                    <div class="section-header">
                        <h5 class="heading-design-h5">Your Active Subscription's</h5>
                        <a class="float-right text-secondary" onclick='openOrderPage()'>View All</a>
                    </div>
                    <div class="owl-carousel owl-carousel-featured subscription_slider">
                        <?php $__currentLoopData = $oneAPIList['activesub_ordlist']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activesub_ordlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="product">
    
                                <a href="<?php echo e(ENV('APP_URL')); ?>subscription-order-product?group_id=<?php echo e($activesub_ordlist['group_id']); ?>"
                                    class="active_order">
                                    <div class="product-img">
                                        <img class="img-fluid" src="<?php echo e($activesub_ordlist['prodList'][0]['varient_image']); ?>"
                                            alt="product">
                                    </div>
                                    <div class="product-body">
                                        <div class="product_header">
                                            <div class="product_top_left">
                                                <div class="discount_text p-1"><span>Active</span></div>
                                            </div>
                                        </div>
                                        <div class="product_name"><?php echo e($activesub_ordlist['productname']); ?></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
<?php endif; ?>
<!-- BEST SELLERS PRODUCT SECTION END -->

<!-- FRESH DAIRY SECTION START Done-->
<?php if(isset($oneAPIList['occasionalCategory']) && count($oneAPIList['occasionalCategory']) > 0): ?>
<section class="product-items-slider section-padding">
    <div class="categories_wise_product_list">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $oneAPIList['occasionalCategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasionalCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-12">
                    <div class="categories_product_list">
                        <div class="section-header">
                            <h5 class="heading-design-h5">
                                <?php echo e($occasionalCategory['title']); ?><span><?php echo e($occasionalCategory['sub_title']); ?></span></h5>
                            <a class="float-right text-secondary"
                                href="<?php echo e(env('APP_URL')); ?>occasional-product-list?name=<?php echo e(Str::slug($occasionalCategory['title'])); ?>">
                                View All</a>
                        </div>
                        <div class="owl-carousel owl-carousel-featured">
                            <?php $__currentLoopData = $occasionalCategory['product_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(trim($productDetail['stock']) != '0'): ?>
                            <div class="item">
                                <div class="product" data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>">
                                    <div class="product_header">
                                        <div class="product_top_left">
                                            <?php if($productDetail['discountper'] > 0): ?>
                                            <div class="discount_text">
                                                <?php echo e(number_format(trim($productDetail['discountper']), 0)); ?>%<span>Off</span>
                                            </div>
                                            <?php endif; ?>
                                            <?php if(!empty($productDetail['country_icon'])): ?>
                                            <div class="country_flag">
                                                <img src="<?php echo e(trim($productDetail['country_icon'])); ?>" alt="flag">
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="product_top_right">
                                            <div class="product_wishlist">
                                                <a href="javascript:void(0);" class="wishlist-btn"
                                                    data-varient-id="<?php echo e(trim($productDetail['varient_id'])); ?>">
                                                    <img class="wishlist-icon"
                                                        src="<?php echo e(asset(trim($productDetail['isFavourite']) == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                        alt="wishlist" style="max-width: 25px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                     <a href="<?php echo e(url('product-details')); ?>?name=<?php echo e(Str::slug($productDetail['product_name'])); ?>&id=<?php echo e(trim($productDetail['product_id'])); ?>">
                                        <div class="product-img">
                                            <img class="img-fluid" src="<?php echo e(trim($productDetail['product_image'])); ?>"
                                                alt="Product">
                                        </div>
                                        <?php if(isset($productDetail['feature_tags']) &&
                                        count($productDetail['feature_tags']) > 0): ?>
                                        <div class="product_featured_cat_icon_list">
                                            <div class="product_featured_cat_icon">
                                                <?php $__currentLoopData = $productDetail['feature_tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img class="img-fluid" src="<?php echo e(trim($tags['image'])); ?>" alt="Product">
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                         <div class="product-body">
                                            <div class="product_name"><?php echo e(trim($productDetail['product_name'])); ?></div>
                                            
                                            
                                        </div>
                                    </a>
                                    <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                        <span>
                                            <?php echo e(trim($productDetail['quantity'] ?? '')); ?> <?php echo e(trim($productDetail['unit'] ?? '')); ?>

                                        </span>
                                    
                                        <?php if(isset($productDetail['varients']) && count($productDetail['varients']) > 1): ?>
                                        <div class="change-qty" data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>">
                                            <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                                <?php echo e(count($productDetail['varients'])); ?> options
                                                <img class="varient-down-arrow" src="<?php echo e(asset('assets/images/chevron.svg')); ?>" alt="down-arrow" style="width: 12px; height: 12px;">
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product_detail">
                                            <p class="offer-price">AED
                                                <span><?php echo e(number_format(trim($productDetail['price']), 2)); ?></span><br>
                                                <?php if($productDetail['price'] != $productDetail['mrp']): ?>
                                                <span class="regular-price">AED
                                                    <span><?php echo e(number_format(trim($productDetail['mrp']), 2)); ?></span></span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <div class="cart_btn" data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>" data-productdetail='<?php echo json_encode($productDetail, 15, 512) ?>'>
                                            <div class="qtyBox"
                                                data-varient-id="<?php echo e(trim($productDetail['varient_id'])); ?>">
                                                <button class="qty-btn qty-btn-minus change-qty" type="button"
                                                    data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'
                                                    data-change="-1">-</button>
                                                <input type="text" name="qty"
                                                    value="<?php echo e(trim($productDetail['total_cart_qty'])); ?>" id="totalCartQTY"
                                                    class="input-qty input-rounded" min="0">
                                                <input type="hidden" name="stock" id="stock"
                                                    value="<?php echo e(trim($productDetail['stock'])); ?>">
                                                <button class="qty-btn qty-btn-plus change-qty" type="button"
                                                    data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'
                                                    data-change="1">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                    <div class="item">
                        <div class="product" data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <?php if($productDetail['discountper'] > 0): ?>
                                    <div class="discount_text">
                                        <?php echo e(number_format($productDetail['discountper'], 0)); ?>%<span>Off</span></div>
                                    <?php endif; ?>
                                    <?php if($productDetail['country_icon'] != null || $productDetail['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($productDetail['country_icon']); ?>" alt="flag">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="<?php echo e($productDetail['varient_id']); ?>">
                                            <img class="wishlist-icon"
                                                src="<?php echo e(asset($productDetail['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                    <div class="product_wishlist">
                                        <?php if($productDetail['notify_me'] == 'false'): ?>
                                        <a href="javascript:void(0);" class="notify-me"
                                            data-varient-id="<?php echo e($productDetail['varient_id']); ?>"
                                            data-product-id="<?php echo e($productDetail['product_id']); ?>" data-notified="0">
                                            <img class="notify-icon" src="<?php echo e(asset('assets/images/notification.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                        <?php else: ?>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>notify">
                                            <img id="notifyMe-<?php echo e($productDetail['varient_id']); ?>" data-notified="1"
                                                src="<?php echo e(asset('assets/images/notification-fill.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                             <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($productDetail['product_name'])); ?>/<?php echo e(trim($productDetail['product_id'])); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($productDetail['product_image']); ?>" alt="product">
                                </div>
                            </a>
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name"><?php echo e(trim($productDetail['product_name'])); ?></div>
                                    <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                        <span>
                                            <?php echo e(trim($productDetail['quantity'] ?? '')); ?> <?php echo e(trim($productDetail['unit'] ?? '')); ?>

                                        </span>
                                    
                                        <?php if(isset($productDetail['varients']) && count($productDetail['varients']) > 1): ?>
                                         <div class="change-qty" data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>">
                                            <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                                <?php echo e(count($productDetail['varients'])); ?> options
                                                <img class="varient-down-arrow" src="<?php echo e(asset('assets/images/chevron.svg')); ?>" alt="down-arrow" style="width: 12px; height: 12px;">
                                            </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title">Product Unavailable</div>
                                    <?php if($productDetail['notify_me'] == "true"): ?>
                                    <p>You will be notified.</p>
                                    <?php else: ?>
                                    <p>Click on the bell to get notified.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- occasionalCategory END -->

<!-- BEST SELLERS PRODUCT SECTION START Done-->
<?php if(isset($oneAPIList['topselling']) && count($oneAPIList['topselling']) > 0): ?>
<section class="product-items-slider section-padding">
    <div class="container">
        <div class="row">
            <div ̰class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Best Sellers</h5>
                    <a class="float-right text-secondary"
                        href="<?php echo e(env('APP_URL')); ?>top-selling-product-list">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-featured">
                    <?php $__currentLoopData = $oneAPIList['topselling']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topselling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$topselling['stock'] == 0): ?>
                    <div class="item">
                        <div class="product" data-productDetail='<?php echo json_encode($topselling, 15, 512) ?>'data-product-id="<?php echo e(trim($topselling['product_id'])); ?>">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <?php if($topselling['discountper'] > 0): ?>
                                    <div class="discount_text">
                                        <?php echo e(number_format($topselling['discountper'], 0)); ?>%<span>Off</span></div>
                                    <?php endif; ?>
                                    <?php if($topselling['country_icon'] != null || $topselling['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($topselling['country_icon']); ?>" alt="flag">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="<?php echo e($topselling['varient_id']); ?>">
                                            <img class="wishlist-icon"
                                                src="<?php echo e(asset($topselling['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                             <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($topselling['product_name'])); ?>/<?php echo e(trim($topselling['product_id'])); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($topselling['product_image']); ?>" alt="product">
                                </div>
                                <?php if(isset($topselling['feature_tags']) &&
                                count($topselling['feature_tags']) > 0): ?>
                                <div class="product_featured_cat_icon_list">
                                    <div class="product_featured_cat_icon">
                                        <?php $__currentLoopData = $topselling['feature_tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img class="img-fluid" src="<?php echo e(trim($tags['image'])); ?>" alt="Product">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($topselling['product_name']); ?></div>
                                </div>
                            </a>
                            <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                <span>
                                    <?php echo e(trim($topselling['quantity'] ?? '')); ?> <?php echo e(trim($topselling['unit'] ?? '')); ?>

                                </span>
                                <?php if(isset($topselling['varients']) && count($topselling['varients']) > 1): ?>
                                <div class="change-qty" data-productDetail='<?php echo json_encode($topselling, 15, 512) ?>'data-product-id="<?php echo e(trim($topselling['product_id'])); ?>">
                                    <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                        <?php echo e(count($topselling['varients'])); ?> options
                                        <img class="varient-down-arrow" src="<?php echo e(asset('assets/images/chevron.svg')); ?>" alt="down-arrow" style="width: 12px; height: 12px;">
                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="product-footer">
                                <div class="product_detail">
                                    <p class="offer-price">AED
                                        <span><?php echo e(number_format($topselling['price'], 2)); ?></span><br>
                                        <?php if($topselling['price'] != $topselling['mrp']): ?>
                                        <span class="regular-price">AED
                                            <span><?php echo e(number_format($topselling['mrp'], 2)); ?></span></span>
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <div class="cart_btn" data-product-id="<?php echo e(trim($topselling['product_id'])); ?>" data-productdetail='<?php echo json_encode($topselling, 15, 512) ?>'>
                                    <div class="qtyBox"
                                        data-varient-id="<?php echo e(trim($topselling['varient_id'])); ?>">
                                        <button class="qty-btn qty-btn-minus change-qty" type="button"
                                            data-productDetail='<?php echo json_encode($topselling, 15, 512) ?>'
                                            data-change="-1">-</button>
                                        <input type="text" name="qty"
                                            value="<?php echo e(trim($topselling['total_cart_qty'])); ?>" id="totalCartQTY"
                                            class="input-qty input-rounded" min="0">
                                        <input type="hidden" name="stock" id="stock"
                                            value="<?php echo e(trim($topselling['stock'])); ?>">
                                        <button class="qty-btn qty-btn-plus change-qty" type="button"
                                            data-productDetail='<?php echo json_encode($topselling, 15, 512) ?>'
                                            data-change="1">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <?php if($topselling['discountper'] > 0): ?>
                                    <div class="discount_text">
                                        <?php echo e(number_format($topselling['discountper'], 0)); ?>%<span>Off</span></div>
                                    <?php endif; ?>
                                    <?php if($topselling['country_icon'] != null || $topselling['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($topselling['country_icon']); ?>" alt="flag">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="<?php echo e($topselling['varient_id']); ?>">
                                            <img class="wishlist-icon"
                                                src="<?php echo e(asset($topselling['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                    <div class="product_wishlist">
                                        <?php if($topselling['notify_me'] == 'false'): ?>
                                        <a href="javascript:void(0);" class="notify-me"
                                            data-varient-id="<?php echo e($topselling['varient_id']); ?>"
                                            data-product-id="<?php echo e($topselling['product_id']); ?>" data-notified="0">
                                            <img class="notify-icon" src="<?php echo e(asset('assets/images/notification.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                        <?php else: ?>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>notify">
                                            <img id="notifyMe-<?php echo e($topselling['varient_id']); ?>" data-notified="1"
                                                src="<?php echo e(asset('assets/images/notification-fill.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($topselling['product_name'])); ?>/<?php echo e(trim($topselling['product_id'])); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($topselling['product_image']); ?>" alt="product">
                                </div>
                            </a>
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name"><?php echo e(trim($topselling['product_name'])); ?></div>
                                    <div class="product_weight"><span><?php echo e($topselling['quantity']); ?>

                                            <?php echo e($topselling['unit']); ?></span></div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title">Product Unavailable</div>
                                    <?php if($topselling['notify_me'] == "true"): ?>
                                    <p>You will be notified.</p>
                                    <?php else: ?>
                                    <p>Click on the bell to get notified.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- BEST SELLERS PRODUCT SECTION END -->

<!-- ORDER AGAIN SECTION START Done-->
<?php if(isset($oneAPIList['orderlist']) && count($oneAPIList['orderlist']) > 0): ?>
<section class="order-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Order Again</h5>
                    <a class="float-right text-secondary" onclick='openOrderPage()'>View All</a>
                </div>
                <div class="order_again_mainBox">
                    <div class="owl-carousel owl-carousel-orderAgain">
                        <?php $__currentLoopData = $oneAPIList['orderlist']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <a
                                href=" <?php if($orderList['type'] == 'Quick'): ?><?php echo e(url(ENV('APP_URL') . 'daily-order-details?group_id=' . $orderList['group_id'])); ?> <?php else: ?> <?php echo e(url(ENV('APP_URL') . 'subscription-order-product?group_id=' . $orderList['group_id'])); ?> <?php endif; ?>">
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
</section>
<?php endif; ?>
<!-- ORDER AGAIN SECTION END -->



<!-- GET SNEAKY BANNER SECTION START -->
<section class="offer-product section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="offer_sliderBox">
                    <?php if(isset($oneAPIList['sneaky_banner'])): ?>
                    <div class="item sneaky_bannerBox">
                        <div class="banner_img trialpackImg" onclick="openSneakyBanner('<?php echo e($oneAPIList['sneaky_banner']['banner_name']); ?>')">
                            <a><img class="img-fluid" src="<?php echo e($oneAPIList['sneaky_banner']['banner_image']); ?>"
                                    alt="Sneaky">
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if(isset($oneAPIList['trailpackimage'])): ?>
                    <div class="item trialpack_bannerBox">
                        <div class="banner_img trialpackImg">
                            <a class="btn-trail-home"><img class="img-fluid"
                                    src="<?php echo e($oneAPIList['trailpackimage']); ?>" alt="Sneaky">
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="item popup_bannerBox">
                        <div class="banner_img trialpackImg"
                            >
                            <a href="<?php echo e(ENV('APP_URL')); ?>additional-categories/Fresh-Picks"><img class="img-fluid" src="<?php echo e(asset('assets/images/fresh-pick.jpg')); ?>"
                                    alt="Fresh-Pick">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- GET SNEAKY BANNER SECTION END -->

<!-- FRESH DAIRY SECTION START -->
<?php if(isset($oneAPIList['additional_category']) && count($oneAPIList['additional_category']) > 0): ?>
<section class="product-items-slider section-padding">
    <div class="categories_wise_product_list">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $oneAPIList['additional_category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-12">
                    <div class="categories_product_list">
                        <div class="section-header">
                            <h5 class="heading-design-h5">
                                <?php echo e($additionalCat['title']); ?><span><?php echo e($additionalCat['sub_title']); ?></span></h5>
                            <a class="float-right text-secondary"
                                href="<?php echo e(ENV('APP_URL')); ?>additional-categories/<?php echo e(strtolower(str_replace(' ', '-', $additionalCat['title']))); ?>">View
                                All</a>
                        </div>
                        <div class="owl-carousel owl-carousel-featured">
                            <?php $__currentLoopData = $additionalCat['product_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!$productDetail['stock'] == 0): ?>
                            <div class="item">
                                <div class="product" data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>">
                                    <div class="product_header">
                                        <div class="product_top_left">
                                            <?php if($productDetail['discountper'] > 0): ?>
                                            <div class="discount_text">
                                                <?php echo e(number_format($productDetail['discountper'], 0)); ?>%<span>Off</span>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($productDetail['country_icon'] != null || $productDetail['country_icon']
                                            != ""): ?>
                                            <div class="country_flag">
                                                <img src="<?php echo e($productDetail['country_icon']); ?>" alt="flag">
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="product_top_right">
                                            <div class="product_wishlist">
                                                <a href="javascript:void(0);" class="wishlist-btn"
                                                    data-varient-id="<?php echo e($productDetail['varient_id']); ?>">
                                                    <img class="wishlist-icon"
                                                        src="<?php echo e(asset($productDetail['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                        alt="wishlist" style="max-width: 25px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($productDetail['product_name'])); ?>/<?php echo e(trim($productDetail['product_id'])); ?>">
                                        <div class="product-img">
                                            <img class="img-fluid" src="<?php echo e($productDetail['product_image']); ?>"
                                                alt="Product">
                                        </div>
                                        <?php if(isset($productDetail['feature_tags']) &&
                                        count($productDetail['feature_tags']) > 0): ?>
                                        <div class="product_featured_cat_icon_list">
                                            <div class="product_featured_cat_icon">
                                                <?php $__currentLoopData = $productDetail['feature_tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <img class="img-fluid" src="<?php echo e(trim($tags['image'])); ?>" alt="Product">
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="product-body">
                                            <div class="product_name"><?php echo e($productDetail['product_name']); ?></div>
                                        </div>
                                    </a>
                                     <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                        <span>
                                            <?php echo e(trim($productDetail['quantity'] ?? '')); ?> <?php echo e(trim($productDetail['unit'] ?? '')); ?>

                                        </span>
                                    
                                        <?php if(isset($productDetail['varients']) && count($productDetail['varients']) > 1): ?>
                                        <div class="change-qty" data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>">
                                            <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                                <?php echo e(count($productDetail['varients'])); ?> options
                                                <img class="varient-down-arrow" src="<?php echo e(asset('assets/images/chevron.svg')); ?>" alt="down-arrow" style="width: 12px; height: 12px;">
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product_detail">
                                            <p class="offer-price">AED
                                                <span><?php echo e(number_format($productDetail['price'], 2)); ?></span><br>
                                                <?php if($productDetail['price'] != $productDetail['mrp']): ?>
                                                <span class="regular-price">AED
                                                    <span><?php echo e(number_format($productDetail['mrp'], 2)); ?></span></span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                        <div class="cart_btn" data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>" data-productdetail='<?php echo json_encode($productDetail, 15, 512) ?>'>
                                            <div class="qtyBox"
                                                data-varient-id="<?php echo e(trim($productDetail['varient_id'])); ?>">
                                                <button class="qty-btn qty-btn-minus change-qty" type="button"
                                                    data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'
                                                    data-change="-1">-</button>
                                                <input type="text" name="qty"
                                                    value="<?php echo e(trim($productDetail['total_cart_qty'])); ?>" id="totalCartQTY"
                                                    class="input-qty input-rounded" min="0">
                                                <input type="hidden" name="stock" id="stock"
                                                    value="<?php echo e(trim($productDetail['stock'])); ?>">
                                                <button class="qty-btn qty-btn-plus change-qty" type="button"
                                                    data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'
                                                    data-change="1">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="item">
                                <div class="product" data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>">
                                    <div class="product_header">
                                        <div class="product_top_left">
                                            <?php if($productDetail['discountper'] > 0): ?>
                                            <div class="discount_text">
                                                <?php echo e(number_format($productDetail['discountper'], 0)); ?>%<span>Off</span>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($productDetail['country_icon'] != null || $productDetail['country_icon']
                                            != ""): ?>
                                            <div class="country_flag">
                                                <img src="<?php echo e($productDetail['country_icon']); ?>" alt="flag">
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="product_top_right">
                                            <div class="product_wishlist">
                                                <a href="javascript:void(0);" class="wishlist-btn"
                                                    data-varient-id="<?php echo e($productDetail['varient_id']); ?>">
                                                    <img id="wishlist-<?php echo e($productDetail['varient_id']); ?>"
                                                        src="<?php echo e(asset($productDetail['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                        alt="wishlist" style="max-width: 25px;" class="wishlist-icon">
                                                </a>
                                            </div>
                                            <div class="product_wishlist">
                                                <?php if($productDetail['notify_me'] == 'false'): ?>
                                                <a href="javascript:void(0);" class="notify-me"
                                                    data-varient-id="<?php echo e($productDetail['varient_id']); ?>"
                                                    data-product-id="<?php echo e($productDetail['product_id']); ?>" data-notified="0">
                                                    <img class="notify-icon"
                                                        src="<?php echo e(asset('assets/images/notification.png')); ?>"
                                                        alt="wishlist" style="max-width: 25px;">
                                                </a>
                                                <?php else: ?>
                                                <a href="<?php echo e(ENV('APP_URL')); ?>notify" data-notified="1">
                                                    <img id="notifyMe-<?php echo e($productDetail['varient_id']); ?>"
                                                        src="<?php echo e(asset('assets/images/notification-fill.png')); ?>"
                                                        alt="wishlist" style="max-width: 25px;">
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($productDetail['product_name'])); ?>/<?php echo e(trim($productDetail['product_id'])); ?>">
                                        <div class="product-img">
                                            <img class="img-fluid" src="<?php echo e($productDetail['product_image']); ?>"
                                                alt="product">
                                        </div>
                                    </a>
                                    <?php if(isset($productDetail['feature_tags']) &&
                                    count($productDetail['feature_tags']) > 0): ?>
                                    <div class="product_featured_cat_icon_list">
                                        <div class="product_featured_cat_icon">
                                            <?php $__currentLoopData = $productDetail['feature_tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <img class="img-fluid" src="<?php echo e(trim($tags['image'])); ?>" alt="Product">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="product-body notify_box">
                                        <div class="product-body">
                                            <div class="product_name"><?php echo e($productDetail['product_name']); ?></div>
                                            <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                                <span>
                                                    <?php echo e(trim($productDetail['quantity'] ?? '')); ?> <?php echo e(trim($productDetail['unit'] ?? '')); ?>

                                                </span>
                                            
                                                <?php if(isset($productDetail['varients']) && count($productDetail['varients']) > 1): ?>
                                                <div class="change-qty" data-productDetail='<?php echo json_encode($productDetail, 15, 512) ?>'data-product-id="<?php echo e(trim($productDetail['product_id'])); ?>">
                                                    <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                                        <?php echo e(count($productDetail['varients'])); ?> options
                                                        <img class="varient-down-arrow" src="<?php echo e(asset('assets/images/chevron.svg')); ?>" alt="down-arrow" style="width: 12px; height: 12px;">
                                                    </span>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="product_unavailable">
                                            <div class="product_unavailable_title">Product Unavailable</div>
                                            <?php if($productDetail['notify_me'] == "true"): ?>
                                            <p>You will be notified.</p>
                                            <?php else: ?>
                                            <p>Click on the bell to get notified.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- FRESH DAIRY SECTION END-->

<!-- TRENDING PRODUCTS SECTION START Done -->
<?php if(isset($oneAPIList['recentselling']) && count($oneAPIList['recentselling']) > 0): ?>
<section class="product-items-slider section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h5 class="heading-design-h5">Trending Products</h5>
                    <a class="float-right text-secondary"
                        href="<?php echo e(ENV('APP_URL')); ?>recent-selling-product-list">View All</a>
                </div>
                <div class="owl-carousel owl-carousel-featured">
                    <?php $__currentLoopData = $oneAPIList['recentselling']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentselling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$recentselling['stock'] == 0): ?>
                    <div class="item">
                        <div class="product" data-productDetail='<?php echo json_encode($recentselling, 15, 512) ?>'data-product-id="<?php echo e(trim($recentselling['product_id'])); ?>">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <?php if($recentselling['discountper'] > 0): ?>
                                    <div class="discount_text">
                                        <?php echo e(number_format($recentselling['discountper'], 0)); ?>%<span>Off</span></div>
                                    <?php endif; ?>
                                    <?php if($recentselling['country_icon'] != null || $recentselling['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($recentselling['country_icon']); ?>" alt="flag">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="<?php echo e($recentselling['varient_id']); ?>">
                                            <img class="wishlist-icon"
                                                src="<?php echo e(asset($recentselling['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($recentselling['product_name'])); ?>/<?php echo e(trim($recentselling['product_id'])); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($recentselling['product_image']); ?>" alt="Product">
                                </div>
                                <?php if(isset($productDetail['feature_tags']) &&
                                count($productDetail['feature_tags']) > 0): ?>
                                <div class="product_featured_cat_icon_list">
                                    <div class="product_featured_cat_icon">
                                        <?php $__currentLoopData = $productDetail['feature_tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img class="img-fluid" src="<?php echo e(trim($tags['image'])); ?>" alt="Product">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($recentselling['product_name']); ?></div>
                                    
                                </div>
                            </a>
                            <div class="product_weight" style="display: flex; align-items: center; gap: 8px;">
                                <span>
                                    <?php echo e(trim($recentselling['quantity'] ?? '')); ?> <?php echo e(trim($recentselling['unit'] ?? '')); ?>

                                </span>
                                <?php if(isset($recentselling['varients']) && count($recentselling['varients']) > 1): ?>
                                <div class="change-qty" data-productDetail='<?php echo json_encode($recentselling, 15, 512) ?>'data-product-id="<?php echo e(trim($recentselling['product_id'])); ?>">
                                    <span style="color: #2e317e; font-weight: 500; display: flex; align-items: center; gap: 4px;">
                                        <?php echo e(count($recentselling['varients'])); ?> options
                                        <img class="varient-down-arrow" src="<?php echo e(asset('assets/images/chevron.svg')); ?>" alt="down-arrow" style="width: 12px; height: 12px;">
                                    </span>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="product-footer">
                                <div class="product_detail">
                                    <p class="offer-price">AED
                                        <span><?php echo e(number_format($recentselling['price'], 2)); ?></span><br>
                                        <?php if($recentselling['price'] != $recentselling['mrp']): ?>
                                        <span class="regular-price">AED
                                            <span><?php echo e(number_format($recentselling['mrp'], 2)); ?></span></span>
                                    </p>
                                    <?php endif; ?>
                                </div>
                                <div class="cart_btn" data-product-id="<?php echo e(trim($recentselling['product_id'])); ?>" data-productdetail='<?php echo json_encode($recentselling, 15, 512) ?>'>
                                    <div class="qtyBox"
                                        data-varient-id="<?php echo e(trim($recentselling['varient_id'])); ?>">
                                        <button class="qty-btn qty-btn-minus change-qty" type="button"
                                            data-productDetail='<?php echo json_encode($recentselling, 15, 512) ?>'
                                            data-change="-1">-</button>
                                        <input type="text" name="qty"
                                            value="<?php echo e(trim($recentselling['total_cart_qty'])); ?>" id="totalCartQTY"
                                            class="input-qty input-rounded" min="0">
                                        <input type="hidden" name="stock" id="stock"
                                            value="<?php echo e(trim($recentselling['stock'])); ?>">
                                        <button class="qty-btn qty-btn-plus change-qty" type="button"
                                            data-productDetail='<?php echo json_encode($recentselling, 15, 512) ?>'
                                            data-change="1">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="subscribe_text">Subscribe & Save 5%</div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="item">
                        <div class="product">
                            <div class="product_header">
                                <div class="product_top_left">
                                    <?php if($recentselling['discountper'] > 0): ?>
                                    <div class="discount_text">
                                        <?php echo e(number_format($recentselling['discountper'], 0)); ?>%<span>Off</span></div>
                                    <?php endif; ?>
                                    <?php if($recentselling['country_icon'] != null || $recentselling['country_icon'] != ""): ?>
                                    <div class="country_flag">
                                        <img src="<?php echo e($recentselling['country_icon']); ?>" alt="flag">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="product_top_right">
                                    <div class="product_wishlist">
                                        <a href="javascript:void(0);" class="wishlist-btn"
                                            data-varient-id="<?php echo e($recentselling['varient_id']); ?>">
                                            <img class="wishlist-icon"
                                                src="<?php echo e(asset($recentselling['isFavourite'] == 'true' ? 'assets/images/wishlisted.png' : 'assets/images/wishlist.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                    </div>
                                    <div class="product_wishlist">
                                        <?php if($recentselling['notify_me'] == 'false'): ?>
                                        <a href="javascript:void(0);" class="notify-me" data-notified="0"
                                            data-varient-id="<?php echo e($recentselling['varient_id']); ?>"
                                            data-product-id="<?php echo e($recentselling['product_id']); ?>">
                                            <img class="notify-icon" src="<?php echo e(asset('assets/images/notification.png')); ?>"
                                                alt="wishlist" style="max-width: 25px;">
                                        </a>
                                        <?php else: ?>
                                        <a href="<?php echo e(ENV('APP_URL')); ?>notify" data-notified="1">
                                            <img id="notifyMe-<?php echo e($recentselling['varient_id']); ?>"
                                                src="<?php echo e(asset('assets/images/notification-fill.png')); ?>" alt="wishlist"
                                                style="max-width: 25px;">
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo e(url('product-details')); ?>/<?php echo e(Str::slug($recentselling['product_name'])); ?>/<?php echo e(trim($recentselling['product_id'])); ?>">
                                <div class="product-img">
                                    <img class="img-fluid" src="<?php echo e($recentselling['product_image']); ?>" alt="product">
                                </div>
                            </a>
                            <?php if(isset($productDetail['feature_tags']) &&
                            count($productDetail['feature_tags']) > 0): ?>
                            <div class="product_featured_cat_icon_list">
                                <div class="product_featured_cat_icon">
                                    <?php $__currentLoopData = $productDetail['feature_tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <img class="img-fluid" src="<?php echo e(trim($tags['image'])); ?>" alt="Product">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="product-body notify_box">
                                <div class="product-body">
                                    <div class="product_name"><?php echo e($recentselling['product_name']); ?></div>
                                    <div class="product_weight"><span><?php echo e($recentselling['quantity']); ?>

                                            <?php echo e($recentselling['unit']); ?></span></div>
                                </div>
                                <div class="product_unavailable">
                                    <div class="product_unavailable_title">Product Unavailable</div>
                                    <?php if($recentselling['notify_me'] == "true"): ?>
                                    <p>You will be notified.</p>
                                    <?php else: ?>
                                    <p>Click on the bell to get notified.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- TRENDING PRODUCTS SECTION END -->
<!-- EXPLORE BY BRAND SECTION START Done -->
<?php if(isset($oneAPIList['brand']) && count($oneAPIList['brand']) > 0): ?>
<section class="top-category section-padding">
    <div class="container">
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
                            <a href="<?php echo e(ENV('APP_URL')); ?>brand-product-list?name=<?php echo e(Str::slug($brand['title'])); ?>&id=<?php echo e($brand['cat_id']); ?>">
                                <img class="img-fluid" src="<?php echo e($brand['image']); ?>" alt="Product">
                            </a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- EXPLORE BY BRAND SECTION END -->

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

function openOrderPage() {
    // Save selected tab to localStorage
    localStorage.setItem("selectedOrderTab", "2");
    navigateToNextPage(href = '<?php echo e(env('
        APP_URL ')); ?>my-orders?tab=2');

}

function navigateToNextPage(url) {
    const nextPageUrl = url;
    window.location.href = nextPageUrl;
    // console.log(window.location.href);
}
</script>



<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(isset($oneAPIList['popup_banner']) && count($oneAPIList['popup_banner']) > 0): ?>
<!-- ONLOAD MODEL START -->
<div class="modal" id="onload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="row">
                <div class="col-lg-12">
                    <div class="loginBox text-center">
                        <div class="trialpack_bannerBox ">
                            <?php if(isset($oneAPIList['popup_banner'])): ?>
                            <div class="banner_img trialpackImg"
                                onclick="openPopUPScreen('<?php echo e($oneAPIList['popup_banner']['type'] ?? ''); ?>', '<?php echo e($oneAPIList['popup_banner']['banner_id'] ?? ''); ?> ' , '<?php echo e($oneAPIList['popup_banner']['banner_name'] ?? ''); ?>')">
                                <a>
                                    <img class="img-fluid" src="<?php echo e($oneAPIList['popup_banner']['banner_image']); ?>"
                                        alt="<?php echo e($oneAPIList['popup_banner']['banner_image']); ?>">
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Banner Click start...G1 -->
<script>
  function openBannerProductList(baseUrl, bannerId, bannerType, bannerName) {
      if (bannerName.toLowerCase() === "refer") {
            if(currentUserID == ''){
                Swal.fire({
                  title: "<?php echo e(env('GUESTMSG')); ?>", 
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Sign Up",
                  cancelButtonText: "OK",
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#aaa",
                  reverseButtons: true, 
                }).then((result) => {
                  if (result.isConfirmed) {
                    const modalEl = document.getElementById("onload");
                    const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modalInstance.hide();
                     $('#login').modal('show');
                          }
                });
            } else {
                const referralCode = <?php echo json_encode($referralCode, 15, 512) ?>;
                const referralText = <?php echo json_encode($referralText, 15, 512) ?>;
                 const shareText = referralText + " Tap link to download app - https://www.quickart.ae/SignUpScreen?refCode=" + referralCode;
                //  console.log("Could not copy text:", shareText);
                //  console.log("Could not copy text:", referralText);
                  navigator.clipboard.writeText(shareText).then(() => {
                    alert("Referral link copied!");
                  }).catch(err => {
                    console.error("Could not copy text:", err);
                  });
            }
          
      } else {
            const finalUrl = `${baseUrl}?banner-id=${bannerId}&banner-type=${bannerType}`;
            console.log("Navigating to:", finalUrl);
            window.location.href = finalUrl; 
      }
    
  }
</script>
<!-- Banner Click END -->

<script>
window.onload = function() {
    if (!sessionStorage.getItem("modalShown")) {
        var modal = new bootstrap.Modal(document.getElementById("onload"));
        if(modal){
            modal.show();
            sessionStorage.setItem("modalShown", "true");
        }
    }
};

function openPopUPScreen(type, bannerId, title) {
    if (type === 'search') {
        const baseUrl = "<?php echo e(env('APP_URL')); ?>searchProductList";
        const cleanBannerId = String(bannerId).trim();
        const cleanTitle = String(title)
            .trim()
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');

        const fullUrl = `${baseUrl}?banner_id=${cleanBannerId}&title=${cleanTitle}`;
        window.location.href = fullUrl;
    } else if (type === 'trial') {
        if(currentUserID == ''){
             action = 'trailpack';
             const modalEl = document.getElementById("onload");
            const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modalInstance.hide();
             $('#login').modal('show');
        }else{
            window.location.href="<?php echo e(url('trial-pack')); ?>";
        }
    } else if (type === 'dashboard') {
         if (title.toLowerCase() === "refer") {
            if(currentUserID == ''){
                Swal.fire({
                  title: "<?php echo e(env('GUESTMSG')); ?>",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Sign Up",
                  cancelButtonText: "OK",
                  confirmButtonColor: "#3085D6",
                  cancelButtonColor: "#aaa",
                  reverseButtons: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    const modalEl = document.getElementById("onload");
                    const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modalInstance.hide();
                     $('#login').modal('show');
                          }
                });
            } else {
                const referralCode = <?php echo json_encode($referralCode, 15, 512) ?>;
                const referralText = <?php echo json_encode($referralText, 15, 512) ?>;
                 const shareText = referralText + " Tap link to download app - https://www.quickart.ae/SignUpScreen?refCode=" + referralCode;
                //  console.log("Could not copy text:", shareText);
                //  console.log("Could not copy text:", referralText);
                  navigator.clipboard.writeText(shareText).then(() => {
                    alert("Referral link copied!");
                  }).catch(err => {
                    console.error("Could not copy text:", err);
                  });
            }
        }else {
            const modalEl = document.getElementById("onload");
            const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
            modalInstance.hide();
            sessionStorage.setItem("modalShown", "true");
            
        }
        
    } else if (type === 'offers') {
         window.location.href="<?php echo e(url('offers')); ?>";
    }
}




function navigateToNextPage(url) {
    const nextPageUrl = url;
    window.location.href = nextPageUrl;
}
</script>
<!-- ONLOAD MODAL END -->

<!-- SNEAKY BANNER LOCATION SCRIPT START -->
<script>
function openSneakyBanner(bannerName) {
      if (bannerName.toLowerCase() === "refer") {
            if(currentUserID == ''){
                Swal.fire({
                  title: "<?php echo e(env('GUESTMSG')); ?>", 
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Sign Up",
                  cancelButtonText: "OK",
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#aaa",
                  reverseButtons: true, 
                }).then((result) => {
                  if (result.isConfirmed) {
                    const modalEl = document.getElementById("onload");
                    const modalInstance = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    modalInstance.hide();
                     $('#login').modal('show');
                          }
                });
            } else {
                const referralCode = <?php echo json_encode($referralCode, 15, 512) ?>;
                const referralText = <?php echo json_encode($referralText, 15, 512) ?>;
                 const shareText = referralText + " Tap link to download app - https://www.quickart.ae/SignUpScreen?refCode=" + referralCode;
                //  console.log("Could not copy text:", shareText);
                //  console.log("Could not copy text:", referralText);
                  navigator.clipboard.writeText(shareText).then(() => {
                    alert("Referral link copied!");
                  }).catch(err => {
                    console.error("Could not copy text:", err);
                  });
            }
          
      } else {
     navigator.geolocation.getCurrentPosition(
        function (position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;
            console.log('Geolocation :', lat, lng);
        //    const fullUrl = `<?php echo e(ENV('APP_URL')); ?>product-list?screen_name=sneaky_banner&lat=${lat}&lng=${lng}`;
        const fallbackLat = 25.2048;
        const fallbackLng = 55.2708;
        const fullUrl = `<?php echo e(ENV('APP_URL')); ?>product-list?screen_name=sneaky_banner&lat=${fallbackLat}&lng=${fallbackLng}`;
        navigateToNextPage(href = fullUrl);
        },
        function (error) {
            console.error('Geolocation error:', error.message);
            const fallbackLat = 25.2048;
        const fallbackLng = 55.2708;
        const fullUrl = `<?php echo e(ENV('APP_URL')); ?>product-list?screen_name=sneaky_banner&lat=${fallbackLat}&lng=${fallbackLng}`;
        navigateToNextPage(href = fullUrl);
        },
        {
            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0,
        }
     )
    }
}
</script>

<!-- SNEAKY BANNER LOCATION SCRIPT END -->

<!-- OFFERS BANNER SLIDER START -->
<script>
    const sliderBox = document.querySelector('.offer_sliderBox');

    // Arrow key scrolling
    window.addEventListener('keydown', function(event) {
        if (event.key === 'ArrowRight') {
            sliderBox.scrollBy({ left: 100, behavior: 'smooth' });
        }
        if (event.key === 'ArrowLeft') {
            sliderBox.scrollBy({ left: -100, behavior: 'smooth' });
        }
    });

    // Mouse drag scrolling
    let isDown = false;
    let startX;
    let scrollLeft;

    sliderBox.addEventListener('mousedown', (e) => {
        isDown = true;
        sliderBox.classList.add('active'); // optional: you can style .active for cursor change
        startX = e.pageX - sliderBox.offsetLeft;
        scrollLeft = sliderBox.scrollLeft;
    });

    sliderBox.addEventListener('mouseleave', () => {
        isDown = false;
        sliderBox.classList.remove('active');
    });

    sliderBox.addEventListener('mouseup', () => {
        isDown = false;
        sliderBox.classList.remove('active');
    });

    sliderBox.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - sliderBox.offsetLeft;
        const walk = (x - startX) * 2; // multiplier controls speed
        sliderBox.scrollLeft = scrollLeft - walk;
    });
    
    $(document).on('click','.btn-trail-home',function(){
        if(currentUserID == ''){
             action = 'trailpack';
             $('#login').modal('show');
        }else{
            window.location.href="<?php echo e(url('trial-pack')); ?>";
        }
    });
</script>
<!-- OFFERS BANNER SLIDER END -->

<script>
  // This ensures the page reloads when the user navigates back
  window.addEventListener("pageshow", function (event) {
    if (event.persisted) {
      window.location.reload();
    }
  });
</script><?php /**PATH C:\xampp\htdocs\quickart\quickart_web\resources\views/index.blade.php ENDPATH**/ ?>