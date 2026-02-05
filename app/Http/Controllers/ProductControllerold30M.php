<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\carbon;
use Symfony\Component\HttpFoundation\Session\Session;

class ProductController extends Controller
{

    public function __construct()
    {
        //construct
    }

     public function ProductList(Request $request)
    {


        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        // $user_ID = env('USER_ID');
        $productList = array();
        $perpage = 20;

        // Occasional category api call
        if ($request->query('screen_name') == 'occasionalCategory') {

            $name = $request->query('name');

            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'occasionalcat_search', [
                    'json' => [
                        "store_id" => $store_ID,
                        "user_id" => $data_arr['user_id'],
                        "byname" => $name,
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
                        "cattype" => "occasional",
                        "page" => 1,
                        "perpage" => $perpage
                    ]
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $productList = json_decode($response->getBody()->getContents(), true);

                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();

            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }
        }

        //Best seller api call
        if ($request->query('screen_name') == 'topselling') {

            $name = "Best Sellers";

            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'top_selling', [
                    'json' => [
                        "store_id" => $store_ID,
                        "user_id" => $data_arr['user_id'],
                        "byname" => $name,
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
                        "cattype" => "occasional",
                        "page" => 1,
                        "perpage" => $perpage
                    ]
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $productList = json_decode($response->getBody()->getContents(), true);

                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();

            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }
        }

        //NATIONAL DAY GIFT ESSENTIALS api call
        if ($request->query('screen_name') == 'additional_category') {
            
            $name = $request->query('name');
            $name = ucwords(strtolower(str_replace('+', ' ', $request->query('name'))));
            // $name = "fresh food";
            if($request->query('name') == "Fresh-Picks") {
            $name = "Fresh picks";
            }
            
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'additionalcat_search', [
                    'json' => [
                        "store_id" => $store_ID,
                        "user_id" => $data_arr['user_id'],
                        "byname" => $request->query('name') == "Fresh-Picks" ? "fresh food" : $name,
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
                        "cattype" => "occasional",
                        "page" => 1,
                        "perpage" => $perpage
                    ]
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $productList = json_decode($response->getBody()->getContents(), true);

                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();

            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }
        }

        //Trending Products api call
        if ($request->query('screen_name') == 'recentselling') {

            // $name = $request->query('name');
            // $name = ucwords(strtolower(str_replace('+', ' ', $request->query('name'))));

            $name = "Trending Products";

            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'recentselling', [
                    'json' => [
                        "store_id" => $store_ID,
                        "user_id" => $data_arr['user_id'],
                        "byname" => $name,
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
                        "cattype" => "occasional",
                        "page" => 1,
                        "perpage" => $perpage
                    ]
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $productList = json_decode($response->getBody()->getContents(), true);

                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();

            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }
        }

        //TRIAL PACK PRODUCTS api call
        if ($request->query('screen_name') == 'sneaky_banner') {

            // $name = $request->query('name');
            // $name = ucwords(strtolower(str_replace('+', ' ', $request->query('name'))));

            $name = "Sneaky Product List";

            try {
                $client = new Client();
                // $response = $client->post($nodeappUrl . 'sneaky_productlist', [
                //     'json' => [
                //         "userLat" => "25.026204874878225",
                //         "userLng" => "55.26353716850259",
                //         "store_id" => $store_ID,
                //         "device_id" => "1E044A0D-9060-4E6B-87C8-CCDF505FB372",
                //         "user_id" => $user_ID,
                //         "byname" => $name,
                //         "page" => 1,
                //         "perpage" => $perpage
                //     ]
                // ]);
                
                $response = $client->post($nodeappUrl . 'sneaky_productlist', [
                    'json' => [
                        "userLat" => $request->lat,
                        "userLng" => $request->lng,
                        "store_id" => $store_ID,
                        "device_id" => "",
                        "user_id" => $data_arr['user_id'],
                        // "byname" => $name,
                        // "page" => 1,
                        // "perpage" => $perpage
                    ]
                ]); 

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $productList = json_decode($response->getBody()->getContents(), true);

                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();

            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }
        }

        // Featured Category api call
        if ($request->query('screen_name') == 'featurecategory') {
            $name = $request->query('name');
            $name = ucwords(strtolower(str_replace('+', ' ', $request->query('name'))));
            $fid = $request->query('fid');
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'featurecat_prod', [
                    'json' => [
                        "store_id" => $store_ID,
                        "fcat_id" => $fid,
                        "user_id" => $data_arr['user_id'],
                        "byname" => $name,
                        "min_price" => "null",
                        "max_price" => "null",
                        "stock" => "null",
                        "min_discount" => "null",
                        "max_discount" => "null",
                        "min_rating" => "null",
                        "max_rating" => "null",
                        "sort" => "null",
                        "sortname" => "null",
                        "sortprice" => "null",
                        "page" => 1,
                        "perpage" => $perpage
                    ]
                ]);
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    $productList = json_decode($response->getBody()->getContents(), true);
                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {
                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }
        }

        // Product List by Brands api call
        if ($request->query('screen_name') == 'brand') {
            $name = $request->query('name');
            $brand_id = $request->query('brand_id');
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'searchbybrands', [
                    'json' => [
                        "user_id" => $data_arr['user_id'],
                        "store_id" => $store_ID,
                        "keyword" => $name,
                        "byname" => "null",
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
                        "device_id" => "UP1A.231005.007",
                        "min_rating" => "null",
                        "max_rating" => "null",
                        "brand_id" => $brand_id
                    ]
                ]);
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    $productList = json_decode($response->getBody()->getContents(), true);
                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {
                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }
        }


        if ($request->ajax()) {

            $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  

            $nodeappUrl = env('NODE_APP_URL');
            $store_ID = env('STORE_ID');
            $user_ID = env('USER_ID');
            $productList = array();
            $perpage = 20;
            $page = $request->page;

            // Occasional category api call
            if ($request->screen_name == 'occasionalCategory') {

                $name = $request->query('name');

                try {
                    $client = new Client();
                    $response = $client->post($nodeappUrl . 'occasionalcat_search', [
                        'json' => [
                            "store_id" => $store_ID,
                            "user_id" => $data_arr['user_id'],
                            "byname" => $name,
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
                            "cattype" => "occasional",
                            "page" => $page,
                            "perpage" => $perpage
                        ]
                    ]);

                    $statusCode = $response->getStatusCode();

                    if ($statusCode == 200) {
                        $productList = json_decode($response->getBody()->getContents(), true);

                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (RequestException $e) {

                    $errorMessage = $e->getMessage();

                } catch (\Exception $e) {

                    $errorMessage = $e->getMessage();
                }
            }

            //Best seller api call
            if ($request->screen_name == 'topselling') {

                $name = "Best Sellers";

                try {
                    $client = new Client();
                    $response = $client->post($nodeappUrl . 'top_selling', [
                        'json' => [
                            "store_id" => $store_ID,
                            "user_id" => $data_arr['user_id'],
                            "byname" => $name,
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
                            "cattype" => "occasional",
                            "page" => $page,
                            "perpage" => $perpage
                        ]
                    ]);

                    $statusCode = $response->getStatusCode();

                    if ($statusCode == 200) {
                        $productList = json_decode($response->getBody()->getContents(), true);

                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (RequestException $e) {

                    $errorMessage = $e->getMessage();

                } catch (\Exception $e) {

                    $errorMessage = $e->getMessage();
                }
            }

            //NATIONAL DAY GIFT ESSENTIALS api call
            if ($request->screen_name == 'additional_category') {

                $name = $request->query('name');
            $name = ucwords(strtolower(str_replace('+', ' ', $request->query('name'))));
            // $name = "fresh food";
            if($request->query('name') == "Fresh-Picks") {
            $name = "Fresh picks";
            }
            
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'additionalcat_search', [
                    'json' => [
                        "store_id" => $store_ID,
                        "user_id" => $data_arr['user_id'],
                        "byname" => $request->name == "Fresh-Picks" ? "fresh food" : $name,
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
                        "cattype" => "occasional",
                        "page" => $page,
                        "perpage" => $perpage
                    ]
                ]);
                
                    $statusCode = $response->getStatusCode();

                    if ($statusCode == 200) {
                        $productList = json_decode($response->getBody()->getContents(), true);

                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (RequestException $e) {

                    $errorMessage = $e->getMessage();

                } catch (\Exception $e) {

                    $errorMessage = $e->getMessage();
                }
            }

            //Trending Products api call
            if ($request->screen_name == 'recentselling') {

                // $name = $request->query('name');
                // $name = ucwords(strtolower(str_replace('+', ' ', $request->query('name'))));

                $name = "";

                try {
                    $client = new Client();
                    $response = $client->post($nodeappUrl . 'recentselling', [
                        'json' => [
                            "store_id" => $store_ID,
                            "user_id" => $data_arr['user_id'],
                            "byname" => $name,
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
                            "cattype" => "occasional",
                            "page" => $page,
                            "perpage" => $perpage
                        ]
                    ]);

                    $statusCode = $response->getStatusCode();

                    if ($statusCode == 200) {
                        $productList = json_decode($response->getBody()->getContents(), true);

                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (RequestException $e) {

                    $errorMessage = $e->getMessage();

                } catch (\Exception $e) {

                    $errorMessage = $e->getMessage();
                }
            }

            //TRIAL PACK PRODUCTS api call trailpackimage
            if ($request->screen_name == 'sneaky_banner') {
                

                // $name = $request->query('name');
                // $name = ucwords(strtolower(str_replace('+', ' ', $request->query('name'))));

                $name = "Sneaky Product List";

                try {
                    $client = new Client();
                    $response = $client->post($nodeappUrl . 'sneaky_productlist', [
                        'json' => [
                            "userLat" => "25.026204874878225",
                            "userLng" => "55.26353716850259",
                            "store_id" => $store_ID,
                            "device_id" => "1E044A0D-9060-4E6B-87C8-CCDF505FB372",
                            "user_id" => $user_ID,
                            "byname" => $name,
                            "page" => $page,
                            "perpage" => $perpage
                        ]
                    ]);

                    $statusCode = $response->getStatusCode();

                    if ($statusCode == 200) {
                        $productList = json_decode($response->getBody()->getContents(), true);

                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (RequestException $e) {

                    $errorMessage = $e->getMessage();

                } catch (\Exception $e) {

                    $errorMessage = $e->getMessage();
                }
            }

            // Featured Category api call
            if ($request->screen_name == 'featurecategory') {
                $name = $request->query('name');
                $name = ucwords(strtolower(str_replace('+', ' ', $request->query('name'))));
                $fid = $request->query('fid');
                try {
                    $client = new Client();
                    $response = $client->post($nodeappUrl . 'featurecat_prod', [
                        'json' => [
                            "store_id" => $store_ID,
                            "fcat_id" => $fid,
                            "user_id" => $data_arr['user_id'],
                            "byname" => $name,
                            "min_price" => "null",
                            "max_price" => "null",
                            "stock" => "null",
                            "min_discount" => "null",
                            "max_discount" => "null",
                            "min_rating" => "null",
                            "max_rating" => "null",
                            "sort" => "null",
                            "sortname" => "null",
                            "sortprice" => "null",
                            "page" => $page,
                            "perpage" => $perpage
                        ]
                    ]);
                    $statusCode = $response->getStatusCode();
                    if ($statusCode == 200) {
                        $productList = json_decode($response->getBody()->getContents(), true);
                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (RequestException $e) {
                    $errorMessage = $e->getMessage();
                } catch (\Exception $e) {
                    $errorMessage = $e->getMessage();
                }
            }

            // Product List by Brands api call
            if ($request->screen_name == 'brand') {
                $name = $request->query('name');
                $brand_id = $request->query('brand_id');
                try {
                    $client = new Client();
                    $response = $client->post($nodeappUrl . 'searchbybrands', [
                        'json' => [
                            "user_id" => $data_arr['user_id'],
                            "store_id" => $store_ID,
                            "keyword" => $name,
                            "byname" => "null",
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
                            "device_id" => "UP1A.231005.007",
                            "min_rating" => "null",
                            "max_rating" => "null",
                            "brand_id" => $brand_id,
                            "page" => $page,
                            "perpage" => $perpage
                        ]
                    ]);
                    $statusCode = $response->getStatusCode();
                    if ($statusCode == 200) {
                        $productList = json_decode($response->getBody()->getContents(), true);
                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (RequestException $e) {
                    $errorMessage = $e->getMessage();
                } catch (\Exception $e) {
                    $errorMessage = $e->getMessage();
                }
            }

            $productList = $productList['data'];
            return view('CategoryProduct.product-list-partial', compact('productList'));
        
        }

        return view('CategoryProduct/product-list', compact('title', 'data_arr', 'productList', 'name'));
    }
    
    public function FeaturedProductList(Request $request)
    {

        // $cat_url_data =explode("-", $name);
        // $count = count($c at_url_data);
        $cat_id = $request->fid;
        $Sub_cat_name = $request->name;
        $title = "Quickart-Products List";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }
        $perpage = 20;
        
        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        // $user_ID = env('USER_ID');

        $subCatList = array();
        try {
            $client = new Client();
            $response = $client->get($nodeappUrl . 'feature_category');
            // Check the response status code
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                // Response is successful, decode the JSON response
                $subCatList = json_decode($response->getBody()->getContents(), true);
            } else {
            }
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }


        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'featurecat_prod', [
                'json' => [
                    "store_id" => $store_ID,
                    "fcat_id" => $cat_id,
                    "user_id" => $data_arr['user_id'],
                    "min_price" => null,
                    "max_price" => null,
                    "stock" => null,
                    "min_discount" => null,
                    "max_discount" => null,
                    "min_rating" => null,
                    "max_rating" => null,
                    "sort" => null,
                    "sortname" => null,
                    "sortprice" => null,
                    "page" =>1,
                    "perpage" => $perpage,
                ]
            ]);
            // Check the response status code
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                // Response is successful, decode the JSON response
                $productList = json_decode($response->getBody()->getContents(), true);
               
                // Process the data as needed
            } else {
            }
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
        }
        
        if ($request->ajax()) {
        
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
        $store_ID = env('STORE_ID');
        $cat_id = $request->fid;
        
        $productList = array();
        try {
            $client = new Client();
            $page = $request->page;
            $response = $client->post($nodeappUrl . 'featurecat_prod', [
                'json' => [
                    "store_id" => $store_ID,
                    "fcat_id" => $cat_id,
                    "user_id" => $data_arr['user_id'],
                    "min_price" => null,
                    "max_price" => null,
                    "stock" => null,
                    "min_discount" => null,
                    "max_discount" => null,
                    "min_rating" => null,
                    "max_rating" => null,
                    "sort" => null,
                    "sortname" => null,
                    "sortprice" => null,
                    "page"=> $page,
                    "perpage" => $perpage,
                ]
            ]);
                // Check the response status code
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    // Response is successful, decode the JSON response
                    $productList = json_decode($response->getBody()->getContents(), true);
                    $productList = $productList['data'];
                    // echo "<pre>";print_r($productList);echo "</pre>";
                    // Process the data as needed
                } else {
                }
            } catch (RequestException $e) {
                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }
            return view('CategoryProduct.subcategories-product-list-partial', compact('productList'));
        }

        return view('CategoryProduct/featured-categories-product-list', compact('title', 'data_arr', 'productList', 'subCatList', 'cat_id', 'Sub_cat_name'));
    }

     public function fetchFeatureCategoryProducts(Request $request)
    {

        $storeId = env('STORE_ID');
        $fid = $request->fid;
        $title = $request->title;
        // $user_ID = env('USER_ID');
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        // Create a Guzzle client
        $nodeappUrl = env('NODE_APP_URL');
        $fetchProducts = array();
        $perpage = 20;

        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'featurecat_prod', [
                'json' => [
                    "store_id" => $storeId,
                    "fcat_id" => $request->fid,
                    "user_id" => $data_arr['user_id'] ,
                    "byname" => null,
                    "min_price" => null,
                    "max_price" => null,
                    "stock" => null,
                    "min_discount" => null,
                    "max_discount" => null,
                    "min_rating" => null,
                    "max_rating" => null,
                    "sort" => null,
                    "sortname" => null,
                    "sortprice" => null,
                    "page" =>1,
                    "perpage" => $perpage,
                ]
            ]);

            // Check the response status code
            if ($response->getStatusCode() == 200) {
                $fetchProducts = json_decode($response->getBody()->getContents(), true);

                if (!empty($fetchProducts['data'])) {
                    $htmlContent = "<div class='product_list_box'>";
                    foreach ($fetchProducts['data'] as $index => $product) {
                        $isFavourite = $product['isFavourite'] == "true";
                        $isNotified = $product['notify_me'] == "true";
                        $discountText = $product['discountper'] > 0 ? "<div class='discount_text'>" . number_format($product['discountper'], 0) . "%<span>Off</span></div>" : "";
                        $countryFlag = !empty($product['country_icon']) ? "<div class='country_flag'><img src='{$product['country_icon']}' alt='flag'></div>" : "";
                        $wishlistImage = asset('assets/images/' . ($isFavourite ? 'wishlisted.png' : 'wishlist.png'));
                        $notificationImage = asset('assets/images/notification.png');
                        $varientID = $product['varient_id'];
                        $cart_qty = $product['cart_qty'];
                        $defaultQunt = "";
                        if ($cart_qty == 0) {
                            $defaultQunt = "<input type='text' name='qty' value='0' class='input-qty input-rounded' id='qty-$varientID' min='1'>";
                        } else {
                            $defaultQunt = "<input type='text' name='qty' value='$cart_qty' class='input-qty input-rounded' id='qty-$varientID' min='1'>";
                        }
                       if ($product['stock'] > 0) {
                                $htmlContent .= "
                                <div class='all_product_list'>
                                    <div class='product'>
                                        <div class='product_header'>
                                            <div class='product_top_left'>
                                                $discountText
                                                $countryFlag
                                            </div>
                                            <div class='product_top_right'>
                                                <div class='product_wishlist'>
                                                    <a href='javascript:void(0);' onclick='addRemoveWishlist(this)' data-varient-id='{$product['varient_id']}'>
                                                        <img id='wishlist-{$product['varient_id']}' src='$wishlistImage' alt='wishlist' style='max-width: 25px;'>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <a href='" . env('APP_URL') . "product-details'>
                                            <div class='product-img'>
                                                <img class='img-fluid' src='{$product['product_image']}' alt=''>
                                            </div>";

                                // Add feature tags if available
                                if (isset($product['feature_tags']) && count($product['feature_tags']) > 0) {
                                    $htmlContent .= "<div class='product_featured_cat_icon_list'>
                                                        <div class='product_featured_cat_icon'>";
                                    foreach ($product['feature_tags'] as $tags) {
                                        $tagImage = trim($tags['image']);
                                        $htmlContent .= "<img class='img-fluid' src='$tagImage' alt='Product'>";
                                    }
                                    $htmlContent .= "    </div>
                                                    </div>";
                                }

                                $htmlContent .= "
                                            <div class='product-body'>
                                                <div class='product_name'>{$product['product_name']}</div>
                                                <div class='product_weight'><span>{$product['quantity']} {$product['unit']}</span></div>
                                            </div>
                                        </a>
                                        <div class='product-footer'>
                                            <div class='product_detail'>
                                                <p class='offer-price'>AED " . number_format($product['price'], 2) . "<br>" .
                                                    ($product['price'] != $product['mrp'] ? "<span class='regular-price'>AED " . number_format($product['mrp'], 2) . "</span>" : "") .
                                                "</p>
                                            </div>
                                            <div class='cart_btn'>
                                                <div class='qtyBox' id='qtyBox'>
                                                    <button id='remove-$varientID' class='qty-btn qty-btn-minus' type='button' onclick='addToCart($varientID, $cart_qty, -1)'>-</button>
                                                    $defaultQunt
                                                    <button id='add-$varientID' class='qty-btn qty-btn-plus' type='button' onclick='addToCart($varientID, $cart_qty, 1)'>+</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='subscribe_text'>Subscribe & Save 5%</div>
                                    </div>
                                </div>";
                            } else {
                            // Product is unavailable
                           $htmlContent .= "
                        <div class='all_product_list'>
                            <div class='product'>
                                <div class='product_header'>
                                    <div class='product_top_left'>
                                        $discountText
                                        $countryFlag
                                    </div>
                                    <div class='product_top_right'>
                                        <div class='product_wishlist'>
                                            <a href='javascript:void(0);' onclick='addRemoveWishlist(this)' data-varient-id='{$product['varient_id']}'>
                                                <img id='wishlist-{$product['varient_id']}' src='$wishlistImage' alt='wishlist' style='max-width: 25px;'>
                                            </a>
                                        </div>
                                        <div class='product_wishlist'>";

                                            // Check if the product is available for notification
                                            if ($product['notify_me'] == 'false') {
                                                $htmlContent .= "
                                                    <a href='javascript:void(0);' onclick='addNofityMe(this)' data-varient-id='{$product['varient_id']}' data-product-id='{$product['product_id']}'>
                                                        <img id='notifyme-{$product['varient_id']}-{$product['product_id']}'
                                                            src='" . asset($product['notify_me'] == 'true' ? 'assets/images/notification-fill.png' : 'assets/images/notification.png') . "'
                                                            alt='wishlist'
                                                            style='max-width: 25px;'>
                                                    </a>";
                                            } else {
                                                $htmlContent .= "
                                                    <a href='" . env('APP_URL') . "notify'>
                                                        <img id='notifyMe-{$product['varient_id']}' src='" . asset('assets/images/notification-fill.png') . "' alt='wishlist' style='max-width: 25px;'>
                                                    </a>";
                                            }

                    $htmlContent .= "
                                        </div>
                                    </div>
                                </div>
                                <a href='" . env('APP_URL') . "product-details'>
                                    <div class='product-img'>
                                        <img class='img-fluid' src='{$product['product_image']}' alt=''>
                                    </div>";

            // Inject feature tags section here
            if (isset($product['feature_tags']) && count($product['feature_tags']) > 0) {
                $htmlContent .= "<div class='product_featured_cat_icon_list'>
                                    <div class='product_featured_cat_icon'>";
                foreach ($product['feature_tags'] as $tags) {
                    $tagImage = trim($tags['image']);
                    $htmlContent .= "<img class='img-fluid' src='$tagImage' alt='Product'>";
                }
                $htmlContent .= "</div></div>";
            }

                $htmlContent .= "
                            </a>
                            <div class='product-body notify_box'>
                                <div class='product-body'>
                                    <div class='product_name'>{$product['product_name']}</div>
                                    <div class='product_weight'><span>{$product['quantity']} {$product['unit']}</span></div>
                                </div>
                                <div class='product_unavailable'>
                                    <div class='product_unavailable_title'>Product Unavailable</div>
                                    <p>You will be notified.</p>
                                </div>
                            </div>
                        </div>
                    </div>";

                        }
                    }
                    $htmlContent .= "</div>";
                    echo $htmlContent;
                }

            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => 'Failed to fetch data',
                'details' => $e->getMessage(),
            ]);
        }
    }

    // SEARCH BY BANNER PRODUCT

    public function searchProductList(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }


        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        // $user_ID = env('USER_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        $bannerID = $request->banner_id;
        $productList = array();

         try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'searchbypopupbanner', [
                    'json' => [
                        "store_id" => $store_ID,
                        "user_id" => $data_arr['user_id'],
                        "bannerid" => $bannerID,
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
                    ]
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $productList = json_decode($response->getBody()->getContents(), true);
                    // print_r($productList);
                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();

            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }
        return view('Search/search-by-popup-banner', compact('title', 'data_arr', 'productList', 'bannerID'));
    }

}