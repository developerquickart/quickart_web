<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{ url('/product-list?screen_name=sneaky_banner&lat=25.2048&lng=55.2708') }}</loc>
        <changefreq>daily</changefreq>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
    </url>
     <url>
        <loc>{{ url('/all-categories') }}</loc>
        <changefreq>daily</changefreq>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
    </url>
     <url>
        <loc>{{ url('/recent-selling-product-list') }}</loc>
        <priority>0.7</priority>
    </url>
     <url>
        <loc>{{ url('/top-selling-product-list') }}</loc>
        <priority>0.7</priority>
    </url>
    <url>
        <loc>{{ url('/about') }}</loc>
        <changefreq>daily</changefreq>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{ url('/return-refund') }}</loc>
        <changefreq>daily</changefreq>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{ url('/privacy-policy') }}</loc>
        <changefreq>daily</changefreq>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{ url('/terms-conditions') }}</loc>
        <changefreq>daily</changefreq>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{ url('/faq') }}</loc>
        <changefreq>daily</changefreq>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
    </url>
    <url>
        <loc>{{ url('/help') }}</loc>
        <changefreq>daily</changefreq>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
    </url>
    
</urlset>