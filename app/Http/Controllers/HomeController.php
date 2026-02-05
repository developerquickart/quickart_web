<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HomeController extends Controller
{

    protected $CartCount;
    protected $loggedInUser;

    public function __construct()
    {
        // Construct
        //$user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        //$this->CartCount = $this->updateproductdetails($user_ID); // Set the class property
        // dd($this->CartCount['action']);
    }

       // One api for show data in dashboard...G1
    public function oneAPIList(Request $request)
    {
        
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Farm Fresh Milk | Fresh Fruits and Vegetables | Quickart app";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "Enjoy the finest organic & farm-fresh milk, Fresh fruits & vegetables with the QuicKart app. Our farm-fresh milk & fruits are sourced directly from local farms.";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }


        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        $this->loggedInUser = !empty($request->session()->get('user_id')) ?
            $request->session()->get('user_id') : null;

        $oneAPIList = array();
        $errorMessage = null; // Initialize errorMessage to avoid undefined variable notice
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
                                $response = $client->post($nodeappUrl . 'oneapi', [
                                    'json' => [
                                        'store_id' => $store_ID,
                                        'user_id' => $user_ID,//!empty($this->loggedInUser) ? $this->loggedInUser : '',
                                        'is_subscription' => 1,
                                        'device_id' => ""
                                    ]
                                ]);

                                $statusCode = $response->getStatusCode();

                                if ($statusCode == 200) {
                                    // Decode the JSON response correctly
                                    $oneAPIList = json_decode($response->getBody()->getContents(), true);
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

            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'oneapi', [
                    'json' => [
                        'store_id' => $store_ID,
                        'user_id' => $user_ID,//!empty($this->loggedInUser) ? $this->loggedInUser : '',
                        'is_subscription' => 1,
                        'device_id' => ""
                    ]
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    // Decode the JSON response correctly
                    $oneAPIList = json_decode($response->getBody()->getContents(), true);
                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {
                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }
        }
        $appInfo = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'app_info', [
                'json' => [
                    'user_id' =>  $user_ID,
                    'platform' => "web",
                    'app_name' => "customer",
                    'device_id' => "",
                    'actual_device_id' => "",
                    'store_id' => $store_ID
                ]
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $appInfo = json_decode($response->getBody()->getContents(), true);
            } else {
                $errorMessage = "Unexpected status code: " . $statusCode;
                return response()->json(['error' => $errorMessage], $statusCode);
            }
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
            return response()->json(['error' => $errorMessage], 500);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return response()->json(['error' => $errorMessage], 500);
        }

        
        
        return view('index', compact('title', 'data_arr', 'oneAPIList', 'errorMessage', 'appInfo'))
            ->with('CartCount', $this->CartCount);
    }
    
    public function refund(){
        $data_arr = array();
        $data_arr['title'] = "Fresh Cow Milk in Dubai, UAE Home Delivery | Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "QuicKart offers fresh cow milk in Dubai UAE home delivery straight from local farms.Our farm-fresh milk is delivered promptly to maintain its freshness & nutritional value.";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        return view('footer/return-refund', ['data_arr' => $data_arr]);
    }
    
    public function privacypolicy(){
         $data_arr = array();
        $data_arr['title'] = "Farm Fresh Dairy Products | Fresh Fruits and Vegetables | Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "With QuicKart, you can buy Farm Fresh Dairy Products &amp; a selection of the finest organic fruits &amp; vegetables. Our privacy policy protects your personal information.";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        return view('footer/privacy-policy', ['data_arr' => $data_arr]);
    }
    
      // Seo api call index page in dashboard...G1
    // public function seoCallForIndex(Request $request)
    // {
        
        
    //     $title = "Quickart-category";
    //     $data_arr = array();
    //     $data_arr['title'] = "Farm Fresh Milk | Fresh Fruits and Vegetables | Quickart app";
    //     $data_arr['keywords'] = "";
    //     $data_arr['description'] = "Enjoy the finest organic & farm-fresh milk, Fresh fruits & vegetables with the QuicKart app. Our farm-fresh milk & fruits are sourced directly from local farms.";
    //     $data_arr['canonical'] = "";
    //     $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
       
    //     $nodeappUrl = env('NODE_APP_URL');
    //     $store_ID = env('STORE_ID');
    //     $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
    //     $this->loggedInUser = !empty($request->session()->get('user_id')) ?
    //         $request->session()->get('user_id') : null;

    //     $oneAPIList = array();
    //     $errorMessage = null; // Initialize errorMessage to avoid undefined variable notice
    //     if ($request->has('utmSource')) {
    //         $utmSource = $request->query('utmSource');
    //         // Use or log it
    //         \Log::info('UTM Source: ' . $utmSource);
    //         try {
    //                 $client = new Client();
    //                 $response = $client->post($nodeappUrl . 'seo_source', [
    //                     'json' => [
    //                         'user_id' => $data_arr['user_id'],
    //                         "utm_source" => $request->query('utmSource'),
    //                         "utm_campaign" => $request->query('utmCampaign'),
    //                         "utm_network" => $request->query('utmNetwork'),
    //                         "utm_medium" => $request->query('utmMedium'),
    //                         "utm_keyword" => $request->query('utmKeyword'),
    //                         "placement" => $request->query('utmPlacement'),
    //                         "device_id" => "",
    //                         "fcm_token" => "",
    //                         "platform" => "web"
    //                     ]
    //                 ]);
    //                 // dd($response);
    //                 $statusCode = $response->getStatusCode();
                
    //                 $responseBody = json_decode($response->getBody()->getContents(), true);
    //                 if ($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1") {
    //                 } else {
    //                     $errorMessage = env('ERRORMSG');
    //                 }
    //             } catch (RequestException $e) {

    //                 $errorMessage = $e->getMessage();
    //             } catch (\Exception $e) {

    //                 $errorMessage = $e->getMessage();
    //             }
    //     } else {
    //         \Log::info('UTM Source not present');

    //     }
    //      return redirect()->to('/'); 
    // }
    

public function seoCallForIndex(Request $request)
{
    // --- SEO Logging Section ---
    $data_arr = [
        'title' => "Farm Fresh Milk | Fresh Fruits and Vegetables | Quickart app",
        'keywords' => "",
        'description' => "Enjoy the finest organic & farm-fresh milk, Fresh fruits & vegetables with the QuicKart app. Our farm-fresh milk & fruits are sourced directly from local farms.",
        'canonical' => "",
        'user_id' => session()->get('user_id') ?? ''
    ];

    $nodeappUrl = env('NODE_APP_URL');
    $this->loggedInUser = $request->session()->get('user_id') ?? null;
    $errorMessage = null;

    if ($request->has('utmSource')) {
        \Log::info('UTM Source: ' . $request->query('utmSource'));
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'seo_source', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    'utm_source' => $request->query('utmSource'),
                    'utm_campaign' => $request->query('utmCampaign'),
                    'utm_network' => $request->query('utmNetwork'),
                    'utm_medium' => $request->query('utmMedium'),
                    'utm_keyword' => $request->query('utmKeyword'),
                    'placement' => $request->query('utmPlacement'),
                    'device_id' => "",
                    'fcm_token' => "",
                    'platform' => "web"
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);

            if (!($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1")) {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException | \Exception $e) {
            $errorMessage = $e->getMessage();
        }
    } else {
        \Log::info('UTM Source not present');
    }

    // --- Device-based Redirection Section ---
    $userAgent = $request->header('User-Agent');
    $androidStore = 'https://play.google.com/store/apps/details?id=com.quickart.customer';
    $iosStore = 'https://apps.apple.com/in/app/quickart/id1624846848';
    $webUrl = url('/');

    if (stripos($userAgent, 'android') !== false) {
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'seo_source', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    'utm_source' => "QR Code",
                    'utm_campaign' => "New User",
                    'utm_network' => "New User",
                    'utm_medium' => "dubai",
                    'utm_keyword' => "New User",
                    'placement' => "android",
                    'device_id' => "",
                    'fcm_token' => "",
                    'platform' => "android"
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);

            if (!($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1")) {
                $errorMessage = env('ERRORMSG');
            } 
            return redirect()->away($androidStore);
            
        } catch (RequestException | \Exception $e) {
            $errorMessage = $e->getMessage();
        }
        // return redirect()->away($androidStore);
    } elseif (
        stripos($userAgent, 'iphone') !== false ||
        stripos($userAgent, 'ipad') !== false ||
        stripos($userAgent, 'ios') !== false
    ) {
          try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'seo_source', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    'utm_source' => "QR Code",
                    'utm_campaign' => "New User",
                    'utm_network' => "New User",
                    'utm_medium' => "dubai",
                    'utm_keyword' => "New User",
                    'placement' => "ios",
                    'device_id' => "",
                    'fcm_token' => "",
                    'platform' => "ios"
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);

            if (!($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1")) {
                $errorMessage = env('ERRORMSG');
            } 
             return redirect()->away($iosStore);
            
        } catch (RequestException | \Exception $e) {
            $errorMessage = $e->getMessage();
        }
        // return redirect()->away($iosStore);
    } else {
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'seo_source', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    'utm_source' => "QR Code",
                    'utm_campaign' => "New User",
                    'utm_network' => "New User",
                    'utm_medium' => "dubai",
                    'utm_keyword' => "New User",
                    'placement' => "web",
                    'device_id' => "",
                    'fcm_token' => "",
                    'platform' => "web"
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);

            if (!($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1")) {
                $errorMessage = env('ERRORMSG');
            } 
        
             return redirect($webUrl);
            
        } catch (RequestException | \Exception $e) {
            $errorMessage = $e->getMessage();
        }
        // return redirect($webUrl);
    }
}

}