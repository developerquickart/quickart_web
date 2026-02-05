<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($featurecategory as $featuredCat)
    <url>
        <loc>{{ url('/featured-categories-product-list?fid=' . $featuredCat['id'] . '&name=' . Str::slug($featuredCat['title'])) }}</loc>
        <changefreq>daily</changefreq>
         <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
        <priority>0.75</priority>
    </url>
@endforeach
</urlset>