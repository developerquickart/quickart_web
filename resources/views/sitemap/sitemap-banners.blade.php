<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($banners as $banner)
    <url>
        <loc>{{ url('banner-product-list/' . Str::slug($banner['banner_name'])) . '?banner-id=' . trim($banner['banner_id']) . '&banner-type=store' }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->toDateString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
</urlset>
