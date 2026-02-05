<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc><?php echo e(url('sitemap-products.xml')); ?></loc>
        <lastmod><?php echo e($now); ?></lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc><?php echo e(url('sitemap-categories.xml')); ?></loc>
        <lastmod><?php echo e($now); ?></lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
   
    <sitemap>
        <loc><?php echo e(url('sitemap-occasional-category.xml')); ?></loc>
        <lastmod><?php echo e($now); ?></lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc><?php echo e(url('sitemap-additional-category.xml')); ?></loc>
        <lastmod><?php echo e($now); ?></lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc><?php echo e(url('sitemap-featured-categories.xml')); ?></loc>
        <lastmod><?php echo e($now); ?></lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
     <sitemap>
        <loc><?php echo e(url('sitemap-brands.xml')); ?></loc>
        <lastmod><?php echo e($now); ?></lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc><?php echo e(url('sitemap-banners.xml')); ?></loc>
        <lastmod><?php echo e($now); ?></lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc><?php echo e(url('sitemap-second-banners.xml')); ?></loc>
        <lastmod><?php echo e($now); ?></lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
     <sitemap>
        <loc><?php echo e(url('sitemap-pages.xml')); ?></loc>
        <lastmod><?php echo e($now); ?></lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
</sitemapindex>
<?php /**PATH /home/demoquickart2/public_html/quickart_web/resources/views/sitemap/sitemap.blade.php ENDPATH**/ ?>