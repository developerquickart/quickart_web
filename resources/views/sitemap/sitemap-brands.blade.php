<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   @foreach ($allBrand as $brand)
    <url>
        <loc>{{ url('/brand-product-list?name=' . Str::slug($brand['title']) . '&id=' . $brand['cat_id']) }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->toDateString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
</urlset>
