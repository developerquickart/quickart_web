<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($categories as $cat)
    @foreach ($cat['subcategories'] ?? [] as $sub)
        <url>
            <loc>{{ url('/category/' . $cat['slug'] . '/subcategory/' . $sub['slug']) }}</loc>
            <changefreq>daily</changefreq>
            <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
            <priority>0.6</priority>
        </url>
    @endforeach
@endforeach
</urlset>