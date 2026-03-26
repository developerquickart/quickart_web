<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    //Constructor

    public function __construct()
    {
        // Construct
    }

    public function productSearch(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):"0";
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $name = "Trending Products";

        $brandList =  array();
        $productList =  array();
        $recentSearch =  array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'trendingrecentsearch',[
                'json' => [
                    "store_id" => $store_ID,
                    "user_id" => $user_ID,
                ]
            ]);


            // Check the response status code
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $searchdata = json_decode($response->getBody()->getContents(), true);
                $brandList = $searchdata['trend_brands'];
                $productList = $searchdata['trend_products'];
                $recentSearch = $searchdata['recent_search'];
                
              //  echo "<pre>";print_r($searchdata);echo "</pre>";
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
           // dd($e->getMessage());
            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {
         //   dd($e->getMessage());
            $errorMessage = $e->getMessage();
        }

        return view('Search/productSearch', compact('title', 'data_arr', 'brandList', 'name', 'productList', 'recentSearch'));
    }

  
    // Search method 
    public function Search(Request $request)
    {

        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):"";
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }
        if ($request->query('keyword')) {
            $keyword = $request->query('keyword');
            // $keyword = ucwords(str_replace('-', ' ', Str::slug($request->query('keyword'))));
        } elseif ($request->query('name')) {
            // if (preg_match('/[\p{Arabic}]/u', $request->query('name'))) {
            // //   $keyword = ucwords(str_replace('-', ' ', Str::slug($request->query('name'))));
            // $keyword = urldecode(str_replace('-', ' ', $request->query('name')));
            // } else {
               $keyword = $request->query('name');
            // }
        } else {
            $keyword = $request->query('search_item');
            // $keyword = ucwords(str_replace('-', ' ', Str::slug($request->query('search_item'))));
        }
        
        // echo $keyword;exit;
       
        $dictionary = array();
       
        
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'getProducts',[
                'json' => [
                    "store_id" => $store_ID,
                    "user_id" => $user_ID,
                ]
            ]);


            // Check the response status code
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productdata = json_decode($response->getBody()->getContents(), true);
                $dictionary = $productdata['data'];
               
                
              //  echo "<pre>";print_r($searchdata);echo "</pre>";
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
           // dd($e->getMessage());
            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {
         //   dd($e->getMessage());
            $errorMessage = $e->getMessage();
        }

        $searchbysort = array();
        $errorMessage = null;
        $perpage = 20;
        // $keyword = correctSpelling($keyword,$dictionary);
       
         if ($request->has('utmSource')) {
                $utmSource = $request->query('utmSource');
                // Use or log it
                \Log::info('UTM Source: ' . $utmSource);
                try {
                        $client = new Client();
                        $response = $client->post($nodeappUrl . 'seo_source', [
                            'json' => [
                                'user_id' => $data_arr['user_id'],
                                "utm_source" => $request->query('utmSource'),
                                "utm_campaign" => $request->query('utmCampaign'),
                                "utm_network" => $request->query('utmNetwork'),
                                "utm_medium" => $request->query('utmMedium'),
                                "utm_keyword" => $request->query('utmKeyword'),
                                "placement" => $request->query('utmPlacement'),
                                "device_id" => "",
                                "fcm_token" => "",
                                "platform" => "web"
                            ]
                        ]);
                        // dd($response);
                        $statusCode = $response->getStatusCode();
                    
                        $responseBody = json_decode($response->getBody()->getContents(), true);
                        if ($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1") {
                             // search by store api call.
                            try {
                                $client = new Client();
                                $response = $client->post('https://fipunwrfngwnoaersvlb.supabase.co/functions/v1/product-search', [
                                    'json' => [
                                        "user_id" => $user_ID,
                                        "store_id" => $store_ID,
                                        "keyword" => $keyword,
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
                                        "device_id" => "",
                                        "min_rating" => "null",
                                        "max_rating" => "null",
                                        "perpage" => $perpage,
                                        "page" => 1
                                    ]
                                ]);

                                $statusCode = $response->getStatusCode();

                                if ($statusCode == 200) {
                                    // Decode the JSON response correctly
                                    $searchbysort = json_decode($response->getBody()->getContents(), true);
                                    // echo "<pre>";print_r($searchbysort);echo "</pre>";
                                } else {
                                    $errorMessage = env('ERRORMSG');
                                }
                            } catch (RequestException $e) {
                                $errorMessage = $e->getMessage();
                            } catch (\Exception $e) {
                                $errorMessage = $e->getMessage();
                            }
                           
                        } else {
                            $errorMessage = env('ERRORMSG');
                        }
                    } catch (RequestException $e) {

                        $errorMessage = $e->getMessage();
                    } catch (\Exception $e) {

                        $errorMessage = $e->getMessage();
                    }
            } else {
              \Log::info('UTM Source not present');
             
               // search by store api call.
                try {
                    $client = new Client();
                    $response = $client->post('https://fipunwrfngwnoaersvlb.supabase.co/functions/v1/product-search', [
                        'json' => [
                            "user_id" => $user_ID,
                            "store_id" => $store_ID,
                            "keyword" => $keyword,
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
                            "device_id" => "",
                            "min_rating" => "null",
                            "max_rating" => "null",
                            "perpage" => $perpage,
                            "page" => 1
                        ]
                    ]);

                    $statusCode = $response->getStatusCode();

                    if ($statusCode == 200) {
                        // Decode the JSON response correctly
                        $searchbysort = json_decode($response->getBody()->getContents(), true);
                        // echo "<pre>";print_r($searchbysort);echo "</pre>";
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
            $store_ID = env('STORE_ID');
            $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):"";
            $keyword = $request->query('name');
            $page = $request->query('page');
            $perpage = 20;
            // search by store api call.
            try {
                $client = new Client();
                $response = $client->post('https://fipunwrfngwnoaersvlb.supabase.co/functions/v1/product-search', [
                    'json' => [
                        "user_id" => $user_ID,
                        "store_id" => $store_ID,
                        "keyword" => $keyword,
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
                        "device_id" => "",
                        "min_rating" => "null",
                        "max_rating" => "null",
                        "perpage" => $perpage,
                        "page" => $page
                    ]
                ]);
    
                $statusCode = $response->getStatusCode();
    
                if ($statusCode == 200) {
                    // Decode the JSON response correctly
                    $searchbysort = json_decode($response->getBody()->getContents(), true);
                    return view('Search.search-partial', compact('title', 'data_arr', 'searchbysort', 'keyword'));
                    // echo "<pre>";print_r($searchbysort);echo "</pre>";
                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {
                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }
              
        }
        // dd($searchbysort);
        return view('Search/search', compact('title', 'data_arr', 'searchbysort', 'keyword'));
    }
}
