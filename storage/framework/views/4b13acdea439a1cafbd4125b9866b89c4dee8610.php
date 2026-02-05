<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <url>
         <loc><?php echo e(url('/product-details/' .  Str::slug($product['product_name']) . '/' . $product['product_id'] )); ?></loc>
        <lastmod><?php echo e(\Carbon\Carbon::now()->toDateString()); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset>
<?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/sitemap/sitemap-products.blade.php ENDPATH**/ ?>