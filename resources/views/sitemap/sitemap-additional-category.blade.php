<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($additionalCategory as $additionalCategoryList)
    <url>
        <loc>{{ url('/additional-categories?name=' . Str::slug($additionalCategoryList['title']) ) }}</loc>
        <changefreq>daily</changefreq>
         <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
        <priority>0.75</priority>
    </url>
@endforeach
</urlset>