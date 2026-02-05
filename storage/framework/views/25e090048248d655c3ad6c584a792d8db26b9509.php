<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php $__currentLoopData = $topCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(!empty($cat['subcategory'])): ?>
        <?php $__currentLoopData = $cat['subcategory']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <url>
                <loc><?php echo e(url('/subcategories-product-list/' . Str::slug($cat['title']) . '/' . $cat['cat_id'] . '/' . Str::slug($subcat['title']) . '/' . $subcat['cat_id'])); ?></loc>
                <changefreq>daily</changefreq>
                <lastmod><?php echo e(\Carbon\Carbon::now()->toAtomString()); ?></lastmod>
                <priority>0.7</priority>
            </url>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset><?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/sitemap/sitemap-categories.blade.php ENDPATH**/ ?>