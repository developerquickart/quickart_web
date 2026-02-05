<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <?php $__currentLoopData = $allBrand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <url>
        <loc><?php echo e(url('/brand-product-list?name=' . Str::slug($brand['title']) . '&id=' . $brand['cat_id'])); ?></loc>
        <lastmod><?php echo e(\Carbon\Carbon::now()->toDateString()); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset>
<?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/sitemap/sitemap-brands.blade.php ENDPATH**/ ?>