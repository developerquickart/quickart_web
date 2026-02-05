<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ url('sitemap-products.xml') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap-categories.xml') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
   
    <sitemap>
        <loc>{{ url('sitemap-occasional-category.xml') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap-additional-category.xml') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap-featured-categories.xml') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
     <sitemap>
        <loc>{{ url('sitemap-brands.xml') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap-banners.xml') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
    <sitemap>
        <loc>{{ url('sitemap-second-banners.xml') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
     <sitemap>
        <loc>{{ url('sitemap-pages.xml') }}</loc>
        <lastmod>{{ $now }}</lastmod>
        <changefreq>daily</changefreq>
    </sitemap>
</sitemapindex>
