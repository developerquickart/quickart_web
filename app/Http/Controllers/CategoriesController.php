<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\carbon;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{

    public function __construct()
    {
        //construct
    }

    public function categoryList(Request $request)
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
                             //=========Categories List API ============
                            $categories = array();
                            try {
                                $client = new Client();
                                $response = $client->post($nodeappUrl . 'catee', [
                                    'json' => [
                                        // Data to send in the request body
                                        'store_id' => $store_ID,
                                        'byname' => "",
                                        'latest' => "",
                                        "platform" => "web"
                                    ]
                                ]);
                                $statusCode = $response->getStatusCode();

                                if ($statusCode == 200) {
                                    $categories = json_decode($response->getBody()->getContents(), true);

                                } else {
                                    $errorMessage = env('ERRORMSG');
                                }
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
               //=========Categories List API ============
                $categories = array();
                try {
                    $client = new Client();
                    $response = $client->post($nodeappUrl . 'catee', [
                        'json' => [
                            // Data to send in the request body
                            'store_id' => $store_ID,
                            'byname' => "",
                            'latest' => "",
                            "platform" => "web"
                        ]
                    ]);
                    $statusCode = $response->getStatusCode();

                    if ($statusCode == 200) {
                        $categories = json_decode($response->getBody()->getContents(), true);

                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (\Exception $e) {

                    $errorMessage = $e->getMessage();
                }


            }
        return view('CategoryProduct/all-categories', compact('title', 'data_arr', 'categories'));
        
    }
    
    public function productList(Request $request)
    {

        // $cat_url_data = explode("-", $request->cat_name);
        $cat_name = $request->category;
        $cat_name = ucwords(strtolower(str_replace('+', ' ', $cat_name)));
        $cat_name = ucwords(str_replace('-', ' ', Str::slug($cat_name)));
        // $count = count($cat_url_data);
        // $cat_id = $cat_url_data[$count - 1];
        $cat_id = $request->catid;
        // $category_name_array = array_slice($cat_url_data, 0, $count - 1);
        // $category_name = implode(" ", $category_name_array);
        // $category_name = ucwords($cat_name);
        $category_name = str_replace("-", " ", $request->category);

        $Sub_cat_name = $request->name;
        $Sub_cat_name = ucwords(strtolower(str_replace('+', ' ', $Sub_cat_name)));
        $Sub_cat_name = ucwords(str_replace('-', ' ', Str::slug($Sub_cat_name)));
        $Sub_cat_id = $request->subcatid;

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
        
        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $perpage = 20;

        $subCatList = array();

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
                            try {
                                $client = new Client();
                                $response = $client->post($nodeappUrl . 'subcatee', [
                                    'json' => [
                                        // Data to send in the request body
                                        "store_id" => $store_ID,
                                        "cat_id" => $cat_id,
                                        "user_id" => $data_arr['user_id'],
                                        "platform" => "web"
                                    ]
                                ]);
                                // Check the response status code
                                $statusCode = $response->getStatusCode();
                                if ($statusCode == 200) {
                                    // Response is successful, decode the JSON response
                                    $subCatList = json_decode($response->getBody()->getContents(), true);
                                // print_r($subCatList);
                                } else {
                                }
                            } catch (RequestException $e) {
                                $errorMessage = $e->getMessage();
                            } catch (\Exception $e) {
                                $errorMessage = $e->getMessage();
                            }

                            // Sub Category ID
                            if ($request->subcatid) {
                                $Sub_cat_id = $request->subcatid;
                                $Sub_cat_name = $request->name;
                            } else {
                                $Sub_cat_id = $subCatList['data'][0]['cat_id'];
                                $Sub_cat_name = $subCatList['data'][0]['title'];
                            }
                            // print_r( "store_id => $store_ID,
                            //             cat_id => $cat_id,
                            //         user_id => ,
                            //             byname => null,
                            //             min_price => null,
                            //             max_price => null,
                            //         stock => null,
                            //             min_discount => null,
                            //             max_discount => null,
                            //             min_rating => null,
                            //             max_rating => null,
                            //             sort => null,
                            //             sortname => null,
                            //             sortprice => null,
                            //             sub_cat_id => $Sub_cat_id,
                            //             page => 1,
                            //             perpage => $perpage");
                            $productList = array();
                            try {
                                $client = new Client();
                                
                                $response = $client->post($nodeappUrl . 'cat_product', [
                                    'json' => [
                                        "store_id" => $store_ID,
                                        "cat_id" => $cat_id,
                                        "user_id" => $data_arr['user_id'],
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
                                        "sub_cat_id" => $Sub_cat_id,
                                        "page" => 1,
                                        "perpage" => $perpage,
                                    ]
                                ]);
                                // Check the response status code
                                $statusCode = $response->getStatusCode();
                                if ($statusCode == 200) {
                                    // Response is successful, decode the JSON response
                                    $productList = json_decode($response->getBody()->getContents(), true);
                                    // echo count($productList);
                                    //       echo "<pre>";print_r($productList);echo "</pre>";
                                    // Process the data as needed
                                } else {
                                }
                            } catch (RequestException $e) {
                                $errorMessage = $e->getMessage();
                            } catch (\Exception $e) {
                                $errorMessage = $e->getMessage();
                            }

                            //All category api call...
                            $categories = array();
                            try {
                                $client = new Client();
                                $response = $client->post($nodeappUrl . 'catee', [
                                    'json' => [
                                        // Data to send in the request body
                                        'store_id' => $store_ID,
                                        'byname' => "",
                                        'latest' => "",
                                        "platform" => "web"
                                    ]
                                ]);
                                $statusCode = $response->getStatusCode();

                                if ($statusCode == 200) {
                                    $categories = json_decode($response->getBody()->getContents(), true);

                                } else {
                                    $errorMessage = env('ERRORMSG');
                                }
                            } catch (\Exception $e) {

                                $errorMessage = $e->getMessage();
                            }

                            if ($request->ajax()) {
                            
                                // $cat_url_data = explode("-", $request->cat_name);
                                // $count = count($cat_url_data);
                                // $cat_id = $cat_url_data[$count - 1];
                                $cat_id = $request->cat_id;
                                $subCatId = !empty($request->subcatid)?$request->subcatid:null;

                                $store_ID = env('STORE_ID');
                                $perpage = 20;
                                
                                $productList = array();
                                try {
                                    $client = new Client();
                                    $page = $request->page;
                                    $response = $client->post($nodeappUrl . 'cat_product', [
                                            'json' => [
                                                "store_id" => $store_ID,
                                                "cat_id" => $cat_id,
                                                'sub_cat_id' => !empty($subCatId)?$subCatId:'null',
                                                "user_id" => $data_arr['user_id'],
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
                                                "page" => $page,
                                                "perpage" => $perpage,
                                            ]
                                        ]);
                                        // Check the response status code
                                        $statusCode = $response->getStatusCode();
                                        if ($statusCode == 200) {
                                            // Response is successful, decode the JSON response
                                            $productList = json_decode($response->getBody()->getContents(), true);
                                            $productList = $productList['data'];
                                        //  echo count($productList);
                                        //   echo "<pre>";print_r($productList);echo "</pre>";
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

            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'subcatee', [
                    'json' => [
                        // Data to send in the request body
                        "store_id" => $store_ID,
                        "cat_id" => $cat_id,
                        "user_id" => $data_arr['user_id'],
                        "platform" => "web"
                    ]
                ]);
                // Check the response status code
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    // Response is successful, decode the JSON response
                    $subCatList = json_decode($response->getBody()->getContents(), true);
                // print_r($subCatList);
                } else {
                }
            } catch (RequestException $e) {
                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }

            // Sub Category ID
            if ($request->subcatid) {
                $Sub_cat_id = $request->subcatid;
                $Sub_cat_name = $request->name;
            } else {
                $Sub_cat_id = $subCatList['data'][0]['cat_id'];
                $Sub_cat_name = $subCatList['data'][0]['title'];
            }
            // print_r( "store_id => $store_ID,
            //             cat_id => $cat_id,
            //         user_id => ,
            //             byname => null,
            //             min_price => null,
            //             max_price => null,
            //         stock => null,
            //             min_discount => null,
            //             max_discount => null,
            //             min_rating => null,
            //             max_rating => null,
            //             sort => null,
            //             sortname => null,
            //             sortprice => null,
            //             sub_cat_id => $Sub_cat_id,
            //             page => 1,
            //             perpage => $perpage");
            $productList = array();
            try {
                $client = new Client();
                
                $response = $client->post($nodeappUrl . 'cat_product', [
                    'json' => [
                        "store_id" => $store_ID,
                        "cat_id" => $cat_id,
                        "user_id" => $data_arr['user_id'],
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
                        "sub_cat_id" => $Sub_cat_id,
                        "page" => 1,
                        "perpage" => $perpage,
                    ]
                ]);
                // Check the response status code
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    // Response is successful, decode the JSON response
                    $productList = json_decode($response->getBody()->getContents(), true);
                    // echo count($productList);
                    //       echo "<pre>";print_r($productList);echo "</pre>";
                    // Process the data as needed
                } else {
                }
            } catch (RequestException $e) {
                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }

            //All category api call...
            $categories = array();
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'catee', [
                    'json' => [
                        // Data to send in the request body
                        'store_id' => $store_ID,
                        'byname' => "",
                        'latest' => "",
                        "platform" => "web"
                    ]
                ]);
                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $categories = json_decode($response->getBody()->getContents(), true);

                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }

            if ($request->ajax()) {
            
                // $cat_url_data = explode("-", $request->cat_name);
                // $count = count($cat_url_data);
                // $cat_id = $cat_url_data[$count - 1];
                $cat_id = $request->catid;
                $subCatId = !empty($request->subcatid)?$request->subcatid:null;

                $store_ID = env('STORE_ID');
                $perpage = 20;
                
                $productList = array();
                try {
                    $client = new Client();
                    $page = $request->page;
                    $response = $client->post($nodeappUrl . 'cat_product', [
                            'json' => [
                                "store_id" => $store_ID,
                                "cat_id" => $cat_id,
                                'sub_cat_id' => !empty($subCatId)?$subCatId:'null',
                                "user_id" => $data_arr['user_id'],
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
                                "page" => $page,
                                "perpage" => $perpage,
                            ]
                        ]);
                        // Check the response status code
                        $statusCode = $response->getStatusCode();
                        if ($statusCode == 200) {
                            // Response is successful, decode the JSON response
                            $productList = json_decode($response->getBody()->getContents(), true);
                            $productList = $productList['data'];
                        //  echo count($productList);
                        //   echo "<pre>";print_r($productList);echo "</pre>";
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

        }
        //  echo "<pre>";
        //         print_r($Sub_cat_id);
        //          print_r($Sub_cat_name);
        //         echo "</pre>";
        //         die();

        return view('CategoryProduct/subcategories-product-list', compact('title', 'data_arr', 'productList', 'subCatList', 'category_name', 'Sub_cat_id', 'cat_id', 'categories', 'Sub_cat_name','cat_name'));
         
    }

    public function productList1(Request $request)
    {

        // $cat_url_data = explode("-", $request->cat_name);
        $cat_name = $request->cat_name;
        // $count = count($cat_url_data);
        // $cat_id = $cat_url_data[$count - 1];
        $cat_id = $request->cat_id;
        // $category_name_array = array_slice($cat_url_data, 0, $count - 1);
        // $category_name = implode(" ", $category_name_array);
        // $category_name = ucwords($cat_name);
        $category_name = str_replace("-", " ", $request->cat_name);

        $Sub_cat_name = "";
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
        
        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $perpage = 20;

        $subCatList = array();

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
                            try {
                                $client = new Client();
                                $response = $client->post($nodeappUrl . 'subcatee', [
                                    'json' => [
                                        // Data to send in the request body
                                        "store_id" => $store_ID,
                                        "cat_id" => $cat_id,
                                        "user_id" => $data_arr['user_id'],
                                        "platform" => "web"
                                    ]
                                ]);
                                // Check the response status code
                                $statusCode = $response->getStatusCode();
                                if ($statusCode == 200) {
                                    // Response is successful, decode the JSON response
                                    $subCatList = json_decode($response->getBody()->getContents(), true);
                                // print_r($subCatList);
                                } else {
                                }
                            } catch (RequestException $e) {
                                $errorMessage = $e->getMessage();
                            } catch (\Exception $e) {
                                $errorMessage = $e->getMessage();
                            }

                            // Sub Category ID
                            if ($request->sub_cat_id) {
                                $Sub_cat_id = $request->sub_cat_id;
                                $Sub_cat_name = $request->cat_name;
                            } else {
                                $Sub_cat_id = $subCatList['data'][0]['cat_id'];
                                $Sub_cat_name = $subCatList['data'][0]['title'];
                            }
                            // print_r( "store_id => $store_ID,
                            //             cat_id => $cat_id,
                            //         user_id => ,
                            //             byname => null,
                            //             min_price => null,
                            //             max_price => null,
                            //         stock => null,
                            //             min_discount => null,
                            //             max_discount => null,
                            //             min_rating => null,
                            //             max_rating => null,
                            //             sort => null,
                            //             sortname => null,
                            //             sortprice => null,
                            //             sub_cat_id => $Sub_cat_id,
                            //             page => 1,
                            //             perpage => $perpage");
                            $productList = array();
                            try {
                                $client = new Client();
                                
                                $response = $client->post($nodeappUrl . 'cat_product', [
                                    'json' => [
                                        "store_id" => $store_ID,
                                        "cat_id" => $cat_id,
                                        "user_id" => $data_arr['user_id'],
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
                                        "sub_cat_id" => $Sub_cat_id,
                                        "page" => 1,
                                        "perpage" => $perpage,
                                    ]
                                ]);
                                // Check the response status code
                                $statusCode = $response->getStatusCode();
                                if ($statusCode == 200) {
                                    // Response is successful, decode the JSON response
                                    $productList = json_decode($response->getBody()->getContents(), true);
                                    // echo count($productList);
                                    //       echo "<pre>";print_r($productList);echo "</pre>";
                                    // Process the data as needed
                                } else {
                                }
                            } catch (RequestException $e) {
                                $errorMessage = $e->getMessage();
                            } catch (\Exception $e) {
                                $errorMessage = $e->getMessage();
                            }

                            //All category api call...
                            $categories = array();
                            try {
                                $client = new Client();
                                $response = $client->post($nodeappUrl . 'catee', [
                                    'json' => [
                                        // Data to send in the request body
                                        'store_id' => $store_ID,
                                        'byname' => "",
                                        'latest' => "",
                                        "platform" => "web"
                                    ]
                                ]);
                                $statusCode = $response->getStatusCode();

                                if ($statusCode == 200) {
                                    $categories = json_decode($response->getBody()->getContents(), true);

                                } else {
                                    $errorMessage = env('ERRORMSG');
                                }
                            } catch (\Exception $e) {

                                $errorMessage = $e->getMessage();
                            }

                            if ($request->ajax()) {
                            
                                // $cat_url_data = explode("-", $request->cat_name);
                                // $count = count($cat_url_data);
                                // $cat_id = $cat_url_data[$count - 1];
                                $cat_id = $request->cat_id;
                                $subCatId = !empty($request->sub_cat_id)?$request->sub_cat_id:null;

                                $store_ID = env('STORE_ID');
                                $perpage = 20;
                                
                                $productList = array();
                                try {
                                    $client = new Client();
                                    $page = $request->page;
                                    $response = $client->post($nodeappUrl . 'cat_product', [
                                            'json' => [
                                                "store_id" => $store_ID,
                                                "cat_id" => $cat_id,
                                                'sub_cat_id' => !empty($subCatId)?$subCatId:'null',
                                                "user_id" => $data_arr['user_id'],
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
                                                "page" => $page,
                                                "perpage" => $perpage,
                                            ]
                                        ]);
                                        // Check the response status code
                                        $statusCode = $response->getStatusCode();
                                        if ($statusCode == 200) {
                                            // Response is successful, decode the JSON response
                                            $productList = json_decode($response->getBody()->getContents(), true);
                                            $productList = $productList['data'];
                                        //  echo count($productList);
                                        //   echo "<pre>";print_r($productList);echo "</pre>";
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

                try {
                    $client = new Client();
                    $response = $client->post($nodeappUrl . 'subcatee', [
                        'json' => [
                            // Data to send in the request body
                            "store_id" => $store_ID,
                            "cat_id" => $cat_id,
                            "user_id" => $data_arr['user_id'],
                            "platform" => "web"
                        ]
                    ]);
                    // Check the response status code
                    $statusCode = $response->getStatusCode();
                    if ($statusCode == 200) {
                        // Response is successful, decode the JSON response
                        $subCatList = json_decode($response->getBody()->getContents(), true);
                    // print_r($subCatList);
                    } else {
                    }
                } catch (RequestException $e) {
                    $errorMessage = $e->getMessage();
                } catch (\Exception $e) {
                    $errorMessage = $e->getMessage();
                }

                // Sub Category ID
                if ($request->sub_cat_id) {
                    $Sub_cat_id = $request->sub_cat_id;
                    $Sub_cat_name = $request->cat_name;
                } else {
                    $Sub_cat_id = $subCatList['data'][0]['cat_id'];
                    $Sub_cat_name = $subCatList['data'][0]['title'];
                }
                // print_r( "store_id => $store_ID,
                //             cat_id => $cat_id,
                //         user_id => ,
                //             byname => null,
                //             min_price => null,
                //             max_price => null,
                //         stock => null,
                //             min_discount => null,
                //             max_discount => null,
                //             min_rating => null,
                //             max_rating => null,
                //             sort => null,
                //             sortname => null,
                //             sortprice => null,
                //             sub_cat_id => $Sub_cat_id,
                //             page => 1,
                //             perpage => $perpage");
                $productList = array();
                try {
                    $client = new Client();
                    
                    $response = $client->post($nodeappUrl . 'cat_product', [
                        'json' => [
                            "store_id" => $store_ID,
                            "cat_id" => $cat_id,
                            "user_id" => $data_arr['user_id'],
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
                            "sub_cat_id" => $Sub_cat_id,
                            "page" => 1,
                            "perpage" => $perpage,
                        ]
                    ]);
                    // Check the response status code
                    $statusCode = $response->getStatusCode();
                    if ($statusCode == 200) {
                        // Response is successful, decode the JSON response
                        $productList = json_decode($response->getBody()->getContents(), true);
                        // echo count($productList);
                        //       echo "<pre>";print_r($productList);echo "</pre>";
                        // Process the data as needed
                    } else {
                    }
                } catch (RequestException $e) {
                    $errorMessage = $e->getMessage();
                } catch (\Exception $e) {
                    $errorMessage = $e->getMessage();
                }

                //All category api call...
                $categories = array();
                try {
                    $client = new Client();
                    $response = $client->post($nodeappUrl . 'catee', [
                        'json' => [
                            // Data to send in the request body
                            'store_id' => $store_ID,
                            'byname' => "",
                            'latest' => "",
                            "platform" => "web"
                        ]
                    ]);
                    $statusCode = $response->getStatusCode();

                    if ($statusCode == 200) {
                        $categories = json_decode($response->getBody()->getContents(), true);

                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (\Exception $e) {

                    $errorMessage = $e->getMessage();
                }

                if ($request->ajax()) {
                
                    // $cat_url_data = explode("-", $request->cat_name);
                    // $count = count($cat_url_data);
                    // $cat_id = $cat_url_data[$count - 1];
                    $cat_id = $request->cat_id;
                    $subCatId = !empty($request->sub_cat_id)?$request->sub_cat_id:null;

                    $store_ID = env('STORE_ID');
                    $perpage = 20;
                    
                    $productList = array();
                    try {
                        $client = new Client();
                        $page = $request->page;
                        $response = $client->post($nodeappUrl . 'cat_product', [
                                'json' => [
                                    "store_id" => $store_ID,
                                    "cat_id" => $cat_id,
                                    'sub_cat_id' => !empty($subCatId)?$subCatId:'null',
                                    "user_id" => $data_arr['user_id'],
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
                                    "page" => $page,
                                    "perpage" => $perpage,
                                ]
                            ]);
                            // Check the response status code
                            $statusCode = $response->getStatusCode();
                            if ($statusCode == 200) {
                                // Response is successful, decode the JSON response
                                $productList = json_decode($response->getBody()->getContents(), true);
                                $productList = $productList['data'];
                            //  echo count($productList);
                            //   echo "<pre>";print_r($productList);echo "</pre>";
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

            }
                return view('CategoryProduct/subcategories-product-list', compact('title', 'data_arr', 'productList', 'subCatList', 'category_name', 'Sub_cat_id', 'cat_id', 'categories', 'Sub_cat_name','cat_name'));
         
    }


    public function brandList(Request $request)
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


        $categories = array();
        try {
            $client = new Client();
            $response = $client->get($nodeappUrl . 'brand_list');


            // Check the response status code
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $brandList = json_decode($response->getBody()->getContents(), true);
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }
        // echo "<pre>";
        // print_r($categories);
        // die();
        // dd($categories);
        return view('CategoryProduct/all-brands', compact('title', 'data_arr', 'brandList'));
    }
    
    //Set categoryListFooter...G1
      public function categoryListFooter(Request $request)
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
        
       //=========Categories List API ============
        $categories = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'catee', [
                'json' => [
                    // Data to send in the request body
                    'store_id' => $store_ID,
                    'byname' => "",
                    'latest' => "",
                    "platform" => "web"
                ]
            ]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $categories = json_decode($response->getBody()->getContents(), true);
               return response()->json([
                    'success' => '1',
                    'action' => $categories
                ]);
            } else {
                $errorMessage = env('ERRORMSG');
                 return response()->json([
                    'success' => '0',
                    'message' => $e->getMessage()
                ]);
            }
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
            return response()->json([
                'success' => '0',
                'message' => 'Failed to load categories'
            ]);
        }

        
    }
    
}