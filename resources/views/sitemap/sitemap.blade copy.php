<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
    </url>
    <!-- Fresh picks...G1 -->
     <url>
        <loc>{{ url('/additional-categories?name=Fresh-Picks') }}</loc>
        <priority>0.7</priority>
    </url>
    <!-- sneaky banner...G1 -->
     <url>
        <loc>{{ url('/product-list?screen_name=sneaky_banner&lat=25.2048&lng=55.2708') }}</loc>
        <priority>0.7</priority>
    </url>
    <!-- all-categories...G1 -->
     <url>
        <loc>{{ url('/all-categories') }}</loc>
        <priority>0.7</priority>
    </url>
    
    <!-- recent-selling-product-list...G1 -->
     <url>
        <loc>{{ url('/recent-selling-product-list') }}</loc>
        <priority>0.7</priority>
    </url>
     <!-- top-selling-product-list...G1 -->
     <url>
        <loc>{{ url('/top-selling-product-list') }}</loc>
        <priority>0.7</priority>
    </url>

    <!-- Dynamic Banner list URLs...G1 -->
    @foreach ($banners as $banner)
        <url>
            <loc>{{ url('banner-product-list/' . Str::slug($banner['banner_name'])) . '?banner-id=' . trim($banner['banner_id']) . '&banner-type=store' }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach
     <!-- Dynamic Banner list URLs...G1 -->
    @foreach ($Sbanners as $banner)
        <url>
            <loc>{{ url('banner-product-list/' . Str::slug($banner['banner_name'])) . '?banner-id=' . trim($banner['banner_id']) . '&banner-type=product' }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach

      <!-- Dynamic brand list URLs...G1 -->
    @foreach ($brands as $brand)
        <url>
            <loc>{{ url('/brand-product-list?name=' . Str::slug($brand['title']) . '&id=' . $brand['cat_id']) }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach

    <!-- Dynamic category list URLs...G1 -->
    @foreach ($topCat as $cat)
        <url>
            <loc>{{ url('/subcategories-product-list?category=' . Str::slug($cat['title']) . '&catid=' . $cat['cat_id']) }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach
   
     <!-- Dynamic brand list URLs...G1 -->
    @foreach ($featurecategory as $featuredCat)
        <url>
            <loc>{{ url('/featured-categories-product-list?fid=' . $featuredCat['id'] . '&name=' . Str::slug($featuredCat['title'])) }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach

     <!-- Dynamic occasionalCategory list URLs...G1 -->
    @foreach ($occasionalCategory as $occasionalCategoryList)
        <url>
            <loc>{{ url('/occasional-product-list?name=' . Str::slug($occasionalCategoryList['title']) ) }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach

     <!-- Dynamic additionalCategory list URLs...G1 -->
    @foreach ($additionalCategory as $additionalCategoryList)
        <url>
            <loc>{{ url('/additional-categories?name=' . Str::slug($additionalCategoryList['title']) ) }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach
      <!-- Dynamic Product Detail URLs...G1 -->
    @foreach ($products as $product)
        <url>
            <loc>{{ url('/product-details?name=' .  Str::slug($product['product_name']) . '&id=' . $product['product_id'] ) }}</loc>
            <priority>0.7</priority>
        </url>
    @endforeach
    
    
    
</urlset>