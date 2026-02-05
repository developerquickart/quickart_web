<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($occasionalCategory as $occasionalCategoryList)
    <url>
        <loc>{{ url('/occasional-product-list?name=' . Str::slug($occasionalCategoryList['title']) ) }}</loc>
        <changefreq>daily</changefreq>
         <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
        <priority>0.75</priority>
    </url>
@endforeach
</urlset>