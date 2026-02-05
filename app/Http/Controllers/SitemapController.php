<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 
use Illuminate\Support\Str;   
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\File; 
use Carbon\Carbon; 


class SitemapController extends Controller
{
     public function index()
    {
        return response()
            ->view('sitemap/sitemap', ['now' => Carbon::now()->toAtomString()])
            ->header('Content-Type', 'application/xml');
    }

   public function generateAllSitemaps()
    { 
        $data = $this->getSitemapData();

        // Save individual sitemaps to public folder
        File::put(('sitemap.xml'), view('sitemap.sitemap', ['now' => Carbon::now()->toAtomString()])->render());
        File::put(('sitemap-products.xml'), view('sitemap.sitemap-products', ['allProducts' => $data['allProducts']])->render());
        File::put(('sitemap-categories.xml'), view('sitemap.sitemap-categories', ['topCat' => $data['topCat']])->render());
        File::put(('sitemap-brands.xml'), view('sitemap.sitemap-brands', ['allBrand' => $data['allBrand']])->render());
        File::put(('sitemap-banners.xml'), view('sitemap.sitemap-banners', ['banners' => $data['bannersList']])->render());
        File::put(('sitemap-second-banners.xml'), view('sitemap.sitemap-second-banners', ['sBanners' => $data['sBanners']])->render());
        File::put(('sitemap-featured-categories.xml'), view('sitemap.sitemap-featured-categories', ['featurecategory' => $data['featurecategoryList']])->render());
        File::put(('sitemap-occasional-category.xml'), view('sitemap.sitemap-occasional-category', ['occasionalCategory' => $data['occasionalCategory']])->render());
        File::put(('sitemap-additional-category.xml'), view('sitemap.sitemap-additional-category', ['additionalCategory' => $data['additionalCategory']])->render());
        File::put(('sitemap-pages.xml'), view('sitemap.sitemap-pages', ['now' => Carbon::now()->toAtomString()])->render());
        return "✅ All sitemap XML files generated successfully.";
    }


    // This method will be reused in the command
    public function getSitemapData()
    {
        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = session('user_id') ?? '';
       
        $allProducts = collect();
        $topCat = collect();
        $allBrand = collect();
        $featurecategory = collect();
        $banners = collect();
        $sBanners = collect();
        $occasionalCategory = collect();
        $additionalCategory = collect();

        $sitemapData = [
            'allProducts' => collect(),
            'topCat' => collect(),
            // 'subCat' => collect(),
            'allBrand' => collect(),
            'featurecategory' => collect(),
            'bannersList' => collect(),
            'sBanners' => collect(),
            'occasionalCategory' => collect(),
            'additionalCategory' => collect(),
        ];

        // Initial API request
        $response = Http::post($nodeappUrl . 'oneapi', [
            'store_id' => $store_ID,
            'user_id' => $user_ID,
            'is_subscription' => 1,
            'device_id' => ""
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $occasionalCategory = collect($data['occasionalCategory'] ?? []);
            $additionalCategory = collect($data['additional_category'] ?? []);
            $banners = collect($data['banner'] ?? []);
            $sBanners = collect($data['second_banner'] ?? []);
            $featurecategory = collect($data['featurecategory'] ?? []);
            $sitemapData['occasionalCategory'] = collect($data['occasionalCategory'] ?? []);
            $sitemapData['additionalCategory'] = collect($data['additional_category'] ?? []);
            $sitemapData['bannersList'] = collect($data['banner'] ?? []);
            $sitemapData['sBanners'] = collect($data['second_banner'] ?? []);
            $sitemapData['featurecategoryList'] = collect($data['featurecategory'] ?? []);
          
        }
         //API call get all occasional Category product data...G1
          if ($occasionalCategory->count() > 0) {
            foreach ($occasionalCategory as $category) {
                // Prepare request payload
                $payload = [
                    "store_id" => $store_ID,
                    "user_id" => $user_ID,
                    "byname" => $category['title'] ?? '',  // use name or id
                    "min_price" => null,
                    "max_price" => null,
                    "stock" => null,
                    "min_discount" => null,
                    "max_discount" => null,
                    "sort" => null,
                    "sortname" => null,
                    "sortprice" => null,
                    "cat_id" => "null",
                    "sub_cat_id" => "null",
                    "cattype" => "occasional",
                    "page" => 1,
                    "perpage" => null,
                    "platform" => "web"
                ];

                // Make API request
                $response1 = Http::post($nodeappUrl . 'occasionalcat_search', $payload);
                if ($response1->successful()) {
                    $products = collect($response1->json()['data'] ?? []);
                    //    dd($products->count());
                    if (!isset($data['allProducts'])) {
                    $sitemapData['allProducts'] = collect();
                    }
                    $sitemapData['allProducts'] = $sitemapData['allProducts']->merge($products);
                }
            }

          }

        //API call get all additonal category product data...G1
        if ($additionalCategory->count() > 0) {
        foreach ($additionalCategory as $category) {
            // Prepare request payload
            $payload = [
                "store_id" => $store_ID,
                "user_id" => $user_ID,
                "byname" => $category['title'] ?? '',  
                "min_price" => null,
                "max_price" => null,
                "stock" => null,
                "min_discount" => null,
                "max_discount" => null,
                "sort" => null,
                "sortname" => null,
                "sortprice" => null,
                "cat_id" => "null",
                "sub_cat_id" => "null",
                "page" => 1,
                "perpage" => null,
                "platform" => "web"
            ];

            // Make API request
            $response1 = Http::post($nodeappUrl . 'additionalcat_search', $payload);
            if ($response1->successful()) {
                $products = collect($response1->json()['data'] ?? []);
                if (!isset($sitemapData['allProducts'])) {
                    $sitemapData['allProducts'] = collect();
                }
                $sitemapData['allProducts'] = $sitemapData['allProducts']->merge($products);

                //    dd($products->count());
            }
        }

        }
        // Fresh picks product data call...G1
            $response2 = Http::post($nodeappUrl . 'additionalcat_search', [
                "store_id" => $store_ID,
                "user_id" => $user_ID,
                "byname" =>  "fresh food",
                "min_price" => "null",
                "max_price" => "null",
                "stock" => "null",
                "min_discount" => "null",
                "max_discount" => "null",
                "sort" => "null",
                "sortname" => "null",
                "sortprice" => "null",
                "cat_id" => "null",
                "sub_cat_id" => "null",
                "page" => 1,
                "perpage" => null,
                "platform" => "web"
             ]);
            if ($response2->successful()) {
                $data = $response2->json();
                $freshProducts = collect($data['data'] ?? []);
                if (!isset($sitemapData['allProducts'])) {
                    $sitemapData['allProducts'] = collect();
                }
                $sitemapData['allProducts'] = $sitemapData['allProducts']->merge($freshProducts);
            }

        //API call get searchbybanner store product data...G1
          if ($banners->count() > 0) {
            foreach ($banners as $banner) {
                // Prepare request payload
                $payload = [
                    'user_id' => $user_ID,
                    'store_id' => $store_ID,
                    'keyword' => $banner['banner_name'] ?? '',
                    'byname' => "null",
                    'min_price' => "null",
                    'max_price' => "null",
                    'stock' => "null",
                    'min_discount' => "null",
                    'max_discount' => "null",
                    'sort' => "null",
                    'sortname' => "null",
                    'sortprice' => "null",
                    'cat_id' => "null",
                    'sub_cat_id' => "null",
                    'device_id' => "",
                    'brand_id' => "",
                    'banner_id' => $banner['banner_id'] ?? '', 
                    "banner_type"=>"store",
                    'perpage' => null,
                    'page' => 1,
                    "platform" => "web"
                ];

                // Make API request
                $response3 = Http::post($nodeappUrl . 'searchbybanner', $payload);
                if ($response3->successful()) {
                    //    dd($products->count());
                    $sitemapData['allProducts'] = $sitemapData['allProducts']->merge($response3->json()['data'] ?? []);
                }
            }

          }

        //API call get searchbybanner second product  data...G1
          if ($sBanners->count() > 0) {
            foreach ($sBanners as $banner) {
                // Prepare request payload
                $payload = [
                    'user_id' => $user_ID,
                    'store_id' => $store_ID,
                    'keyword' => $banner['banner_name'] ?? '',
                    'byname' => "null",
                    'min_price' => "null",
                    'max_price' => "null",
                    'stock' => "null",
                    'min_discount' => "null",
                    'max_discount' => "null",
                    'sort' => "null",
                    'sortname' => "null",
                    'sortprice' => "null",
                    'cat_id' => "null",
                    'sub_cat_id' => "null",
                    'device_id' => "",
                    'brand_id' => "",
                    'banner_id' => $banner['banner_id'] ?? '', 
                    "banner_type"=>"product",
                    'perpage' => null,
                    'page' => 1,
                    "platform" => "web"
                ];

                // Make API request
                $response4 = Http::post($nodeappUrl . 'searchbybanner', $payload);
                if ($response4->successful()) {
                  $sitemapData['allProducts'] = $sitemapData['allProducts']->merge($response4->json()['data'] ?? []);
                }
            }

          }
         //API call get all categories list  data...G1
            $payload = [
                'store_id' => $store_ID,
                "byname" => null,
                "latest"=> null
            ];

            // Make API request
            $response4 = Http::post($nodeappUrl . 'catee', $payload);
            if ($response4->successful()) {
                $topCat = collect($response4->json()['data'] ?? []);
                $sitemapData['topCat'] = collect($response4->json()['data'] ?? []);

                //API call get all subcategories list  data...G1
                 if ($topCat->count() > 0) {
                    foreach ($topCat as $cat) {
                        $payload = [
                        'store_id' => $store_ID,
                        "cat_id" => $cat['cat_id'] ?? '',
                        "user_id" =>  $user_ID,
                        "platform" => "web"
                        ];

                        // Make API request for subcatee
                        $response5 = Http::post($nodeappUrl . 'subcatee', $payload);
                        if ($response5->successful()) {
                            $subCat = collect($response5->json()['data'] ?? []);
                             $sitemapData['subCat'] = collect($response5->json()['data'] ?? []);

                             //API call get subcat product  data...G1
                            if ($subCat->count() > 0) {
                                foreach ($subCat as $subcatList) {
                                    // Prepare request payload
                                    $payload = [
                                       "store_id" => $store_ID,
                                        "cat_id" => $cat['cat_id'] ?? '',
                                        "user_id" =>  $user_ID,
                                        "byname" => null,
                                        "min_price" => null,
                                        "max_price" => null,
                                        "stock" => null,
                                        "min_discount" => null,
                                        "max_discount" => null,
                                        "min_rating" => null,
                                        "max_rating" => null,
                                        "sort" => null,
                                        "sortname" => "null",
                                        "sortprice" => null,
                                        "sub_cat_id" => $subcatList['cat_id'] ?? '',
                                        "page" => 1,
                                        "perpage" => null,
                                    ];

                                    // Make API request
                                    $response4 = Http::post($nodeappUrl . 'cat_product', $payload);
                                    if ($response4->successful()) {
                                    //     $products = collect($response4->json()['data'] ?? []);
                                        //    dd($products->count());
                                         $sitemapData['allProducts'] = $sitemapData['allProducts']->merge($response4->json()['data'] ?? []);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        //API call get top_selling  product  data...G1
        $payload = [
            "store_id" => $store_ID,
            "user_id" => $user_ID,
            "byname" => '"Best Sellers',
            "min_price" => "null",
            "max_price" => "null",
            "stock" => "null",
            "min_discount" => "null",
            "max_discount" => "null",
            "sort" => "null",
            "sortname" => "null",
            "sortprice" => "null",
            "cat_id" => "null",
            "sub_cat_id" => "null",
            "page" => 1,
            "perpage" => null
        ];
         // Make API request
        $response6 = Http::post($nodeappUrl . 'top_selling', $payload);
        if ($response6->successful()) {
            // $products = collect($response6->json()['data'] ?? []);
             $sitemapData['allProducts'] = $sitemapData['allProducts']->merge($response6->json()['data'] ?? []);
        }
        //API call get Trending Products data...G1
        $payload = [
            "store_id" => $store_ID,
            "user_id" => $user_ID,
            "byname" => 'Trending Products',
            "min_price" => "null",
            "max_price" => "null",
            "stock" => "null",
            "min_discount" => "null",
            "max_discount" => "null",
            "sort" => "null",
            "sortname" => "null",
            "sortprice" => "null",
            "cat_id" => "null",
            "sub_cat_id" => "null",
            "page" => 1,
            "perpage" => null
        ];

        // Make API request
        $response6 = Http::post($nodeappUrl . 'recentselling', $payload);
        if ($response6->successful()) {
            // $products = collect($response6->json()['data'] ?? []);
            $sitemapData['allProducts'] =$sitemapData['allProducts']->merge($response6->json()['data'] ?? []);
        }
        
         //API call get brand lists data...G1
        $response7 = Http::get($nodeappUrl . 'brand_list', '');
        if ($response7->successful()) {
            $allBrand = collect($response7->json()['data'] ?? []);
             $sitemapData['allBrand'] = collect($response7->json()['data'] ?? []);
             //API call get brands product data...G1
          if ($allBrand->count() > 0) {
            foreach ($allBrand as $banner) {
                // Prepare request payload
                $payload = [
                    'user_id' => $user_ID,
                    'store_id' => $store_ID,
                    'keyword' => $allBrand['title'] ?? '',
                    'byname' => "null",
                    'min_price' => "null",
                    'max_price' => "null",
                    'stock' => "null",
                    'min_discount' => "null",
                    'max_discount' => "null",
                    'sort' => "null",
                    'sortname' => "null",
                    'sortprice' => "null",
                    'cat_id' => "null",
                    'sub_cat_id' => "null",
                    'device_id' => "",
                    "min_rating" => "null",
                    "max_rating" => "null",
                    'brand_id' => $banner['cat_id'] ?? '',
                    'perpage' => null,
                    'page' => 1,
                    "platform" => "web"
                ];

                // Make API request
                $response8 = Http::post($nodeappUrl . 'searchbybrands', $payload);
                if ($response8->successful()) {
                  $sitemapData['allProducts'] = $sitemapData['allProducts']->merge($response8->json()['data'] ?? []);
                }
            }

          }
        }
         return $sitemapData;
    }


}
