<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo e(url('/')); ?></loc>
        <priority>1.0</priority>
    </url>
    <!-- Fresh picks...G1 -->
     <url>
        <loc><?php echo e(url('/additional-categories?name=Fresh-Picks')); ?></loc>
        <priority>0.7</priority>
    </url>
    <!-- sneaky banner...G1 -->
     <url>
        <loc><?php echo e(url('/product-list?screen_name=sneaky_banner&lat=25.2048&lng=55.2708')); ?></loc>
        <priority>0.7</priority>
    </url>
    <!-- all-categories...G1 -->
     <url>
        <loc><?php echo e(url('/all-categories')); ?></loc>
        <priority>0.7</priority>
    </url>
    
    <!-- recent-selling-product-list...G1 -->
     <url>
        <loc><?php echo e(url('/recent-selling-product-list')); ?></loc>
        <priority>0.7</priority>
    </url>
     <!-- top-selling-product-list...G1 -->
     <url>
        <loc><?php echo e(url('/top-selling-product-list')); ?></loc>
        <priority>0.7</priority>
    </url>

    <!-- Dynamic Banner list URLs...G1 -->
    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('banner-product-list/' . Str::slug($banner['banner_name'])) . '?banner-id=' . trim($banner['banner_id']) . '&banner-type=store'); ?></loc>
            <priority>0.7</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <!-- Dynamic Banner list URLs...G1 -->
    <?php $__currentLoopData = $Sbanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('banner-product-list/' . Str::slug($banner['banner_name'])) . '?banner-id=' . trim($banner['banner_id']) . '&banner-type=product'); ?></loc>
            <priority>0.7</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <!-- Dynamic brand list URLs...G1 -->
    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/brand-product-list?name=' . Str::slug($brand['title']) . '&id=' . $brand['cat_id'])); ?></loc>
            <priority>0.7</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Dynamic category list URLs...G1 -->
    <?php $__currentLoopData = $topCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/subcategories-product-list?category=' . Str::slug($cat['title']) . '&catid=' . $cat['cat_id'])); ?></loc>
            <priority>0.7</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   
     <!-- Dynamic brand list URLs...G1 -->
    <?php $__currentLoopData = $featurecategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/featured-categories-product-list?fid=' . $featuredCat['id'] . '&name=' . Str::slug($featuredCat['title']))); ?></loc>
            <priority>0.7</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     <!-- Dynamic occasionalCategory list URLs...G1 -->
    <?php $__currentLoopData = $occasionalCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasionalCategoryList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/occasional-product-list?name=' . Str::slug($occasionalCategoryList['title']) )); ?></loc>
            <priority>0.7</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

     <!-- Dynamic additionalCategory list URLs...G1 -->
    <?php $__currentLoopData = $additionalCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalCategoryList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/additional-categories?name=' . Str::slug($additionalCategoryList['title']) )); ?></loc>
            <priority>0.7</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <!-- Dynamic Product Detail URLs...G1 -->
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(url('/product-details?name=' .  Str::slug($product['product_name']) . '&id=' . $product['product_id'] )); ?></loc>
            <priority>0.7</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
    
</urlset><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/sitemap.blade.php ENDPATH**/ ?>