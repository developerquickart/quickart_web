<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($allProducts as $product)
    <url>
         <loc>{{ url('/product-details/' .  Str::slug($product['product_name']) . '/' . $product['product_id'] ) }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->toDateString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach
</urlset>
