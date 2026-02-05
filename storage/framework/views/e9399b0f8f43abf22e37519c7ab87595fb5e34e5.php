<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php $__currentLoopData = $occasionalCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasionalCategoryList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <url>
        <loc><?php echo e(url('/occasional-product-list?name=' . Str::slug($occasionalCategoryList['title']) )); ?></loc>
        <changefreq>daily</changefreq>
         <lastmod><?php echo e(\Carbon\Carbon::now()->toAtomString()); ?></lastmod>
        <priority>0.75</priority>
    </url>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/sitemap/sitemap-occasional-category.blade.php ENDPATH**/ ?>