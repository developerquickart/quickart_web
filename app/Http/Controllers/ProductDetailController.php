<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\carbon;
use Psy\Readline\Hoa\Console;
use Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Mews\Purifier\Facades\Purifier;
use function Laravel\Prompts\alert;
use Illuminate\Support\Str; 

class ProductDetailController extends Controller
{

    public function __construct()
    {
        //construct

    }
    // Get product detail... G1
    public function getProductDetail(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        // $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        // $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        
        $data_arr['title'] = "";
        $data_arr['description'] = "";
        $data_arr['image'] = "";
        $data_arr['url'] = "";
        $data_arr['type'] = "";
        
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');

        $getProductDetail = array();

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
                                $response = $client->post($nodeappUrl . 'product_det', [
                                    'json' => [
                                        'user_id' => $data_arr['user_id'],
                                        "product_id" => $request->id,
                                        "store_id" => $store_ID,
                                        "is_subscription" => 1
                                    ]
                                ]);
                                // dd($response);
                                $statusCode = $response->getStatusCode();
                                if ($statusCode == 200) {
                                    $getProductDetail = json_decode($response->getBody()->getContents(), true);
                                    
                                    if (isset($getProductDetail['detail'])) {
                                        $product = $getProductDetail['detail'];

                                        // Build product URL exactly like Blade
                                        $productUrl = url('product-details') 
                                                      . '?name=' . Str::slug($product['product_name']) 
                                                      . '&id=' . trim($product['product_id']);
                                    
                                        // Prepare OG meta data
                                        $data_arr['title'] = $product['product_name'] ?? 'QuickArt';
                                        $data_arr['description'] = $product['varient'][0]['description'] 
                                                                      ?? 'Shop fresh products online at QuickArt';
                                        $data_arr['image'] = $product['product_image'] ?? $product['images'][0]['image'] ?? 'https://quickart2.democheck.in/quickart_web/assets/images/QuicKart_New_Final.png';
                                        $data_arr['url']   = $productUrl;
                                        $data_arr['type']  = "product";
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
                    $response = $client->post($nodeappUrl . 'product_det', [
                        'json' => [
                            'user_id' => $data_arr['user_id'],
                            "product_id" => $request->id,
                            "store_id" => $store_ID,
                            "is_subscription" => 1

                        ]
                    ]);
                    // dd($response);
                    $statusCode = $response->getStatusCode();
                    if ($statusCode == 200) {
                        $getProductDetail = json_decode($response->getBody()->getContents(), true);
                        if (isset($getProductDetail['detail'])) {
                            $product = $getProductDetail['detail'];

                            // Build product URL exactly like Blade
                            $productUrl = url('product-details') 
                                          . '?name=' . Str::slug($product['product_name']) 
                                          . '&id=' . trim($product['product_id']);
                            $cleanUrl = strtok($product['product_image'] ?? $product['images'][0]['image'], '?');
                            $newUrl = $cleanUrl . '?width=1200&height=400&quality=100';
                            
                            // Prepare OG meta data
                            $data_arr['title'] = $product['product_name'] ?? 'QuickArt';
                            $data_arr['description'] = $product['varient'][0]['description'] 
                                                          ?? 'Shop fresh products online at QuickArt';
                            $data_arr['image'] = $newUrl ?? 'https://quickart2.democheck.in/quickart_web/assets/images/QuicKart_New_Final.png';
                            $data_arr['url']   = $productUrl;
                            $data_arr['type']  = "product";
                        }
                    } else {
                        $errorMessage = env('ERRORMSG');
                    }
                } catch (RequestException $e) {

                    $errorMessage = $e->getMessage();
                } catch (\Exception $e) {

                    $errorMessage = $e->getMessage();
                }
        }
        
        
        // print_r($data_arr);die();
        

       return view('CategoryProduct/product-details', compact('title', 'data_arr', 'getProductDetail'));
    }


    //Show all weak list... G1
    public function showWeekList(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $screenName = $request->screenName;
        $totalDeliveries = [];
        try {
            $client = new Client();
            $response = $client->get($nodeappUrl . 'total_deliveries', [
                'headers' => [
                    'Accept' => 'application/json',
                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $totalDeliveries = json_decode($response->getBody()->getContents(), true);

                $htmlcode = "<div class='week-list'>";
                foreach ($totalDeliveries['data'] as $week) {
                    $isChecked = ($week['total_deliveries'] == $request->noOfWeeks) ? "checked" : "";

                    $htmlcode .= "
                 
        <div class='weeks'>
            <input type='radio' id='week-" . $week['id'] . "' name='week' value='" . $week['total_deliveries'] . "' onclick='handleSelectedWeekClickCart(this)' $isChecked>
            <label for='week-" . $week['id'] . "'>" . $week['total_deliveries'] . " " . $week['types'] . "</label>
        </div> ";
                }
                $htmlcode .= "</div>";

                return response()->json([
                    'status' => 'success',
                    'htmlcode' => $htmlcode
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to fetch data from the API.'
                ]);
            }
        } catch (RequestException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }


    //Show all weak list... G1
    public function handleDateSelection(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        if ($request->repeatDays != null) {
            $string = \implode(', ', $request->repeatDays);
        }


        $timeSlotsList = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'timeslot', [
                'json' => [
                    "store_id" => $store_ID,
                    "selected_date" => $request->selectedDate,
                    "repeated_days" => $string
                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $timeSlotsList = json_decode($response->getBody()->getContents(), true);
                $htmlcode = "<div class='week-list'> ";
                $htmlcode1 = "<div class='week-list'> ";
                $timeIndex = 0;

                foreach ($timeSlotsList['data'] as $time) {
                    $isChecked = ($time['timeslot'] == $request->selectedTimeSlot) ? "checked" : "";
                    $timeIndex++;
                    $htmlcode .= "
                 
        <div class='weeks'>
            <input type='radio' id='" . "time-" . $timeIndex . "' name='time' value='" . $time['timeslot'] . "' $isChecked>
            <label for='" . "time-" . $timeIndex . "'>" . $time['timeslot'] . "</label>
        </div> ";
                }
                $htmlcode1 .= "<div class='delivery-first-date' style='color: red;'>Please note your first delivery will start on - " . Carbon::parse($timeSlotsList['deliveryDate'])->format('d-m-Y') . "</div>";

                $htmlcode .= "</div>";

                return response()->json([
                    'status' => 'success',
                    'htmlcode' => $htmlcode,
                    'htmlcode1' => $htmlcode1
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to fetch data from the API.'
                ]);
            }
        } catch (RequestException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }


    //Add to sub cart api ... G1
    public function addToSubCart(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        $store_ID = env('STORE_ID');

        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'add_to_subcart', [
                'json' => [
                    'user_id' => $user_ID,
                    "qty" => $request->qty,
                    "store_id" => $store_ID,
                    "varient_id" => $request->varientID,
                    "is_subscription" => 1,
                    "percentage" => "20",
                    "device_id" => "",
                    "repeat_orders" => $request->repeatDays,
                    "time_slot" => $request->timeSlot,
                    "sub_totaldelivery" => $request->selectedWeek,
                    "start_delivery_date" => $request->deliveyDate,
                    "isAutoRenew" => $request->autorenew,
                    "product_feature_id" => $request->selectedFeatureId
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);
            // dd($responseBody);

            if ($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1") {
                // print_r($responseBody);
                return response()->json([
                    'success' => $responseBody['status'],
                    'action' => $responseBody,
                    'message' => $responseBody['message'],
                ]);
            } else {
                return response()->json([
                    'success' => $responseBody['status'],
                    'action' => $responseBody,
                    'message' => $responseBody['message'] ?? env('ERRORMSG'),
                ]);
            }
        } catch (RequestException $e) {
            $errorMessage = $e->getMessage();
            $responseBody = $e->getResponse() ? $e->getResponse()->getBody()->getContents() : 'No response body';

            \Log::error('RequestException: ' . $errorMessage);
            \Log::error('Response body: ' . $responseBody);

            return response()->json([
                'success' => false,
                'message' => 'Request failed: ' . $errorMessage,
                'response_body' => $responseBody
            ]);
        } catch (\Exception $e) {
            // Handle generic exceptions
            $errorMessage = $e->getMessage();

            \Log::error('Exception: ' . $errorMessage);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $errorMessage,
            ]);
        }
    }

}