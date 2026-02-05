<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($topCat as $cat)
    @if (!empty($cat['subcategory']))
        @foreach ($cat['subcategory'] as $subcat)
            <url>
                <loc>{{ url('/subcategories-product-list/' . Str::slug($cat['title']) . '/' . $cat['cat_id'] . '/' . Str::slug($subcat['title']) . '/' . $subcat['cat_id']) }}</loc>
                <changefreq>daily</changefreq>
                <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
                <priority>0.7</priority>
            </url>
        @endforeach
    @endif
@endforeach
</urlset>