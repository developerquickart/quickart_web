<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php $__currentLoopData = $featurecategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <url>
        <loc><?php echo e(url('/featured-categories-product-list?fid=' . $featuredCat['id'] . '&name=' . Str::slug($featuredCat['title']))); ?></loc>
        <changefreq>daily</changefreq>
         <lastmod><?php echo e(\Carbon\Carbon::now()->toAtomString()); ?></lastmod>
        <priority>0.75</priority>
    </url>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/sitemap/sitemap-featured-categories.blade.php ENDPATH**/ ?>