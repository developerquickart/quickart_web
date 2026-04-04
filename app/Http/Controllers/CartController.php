<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $CartCount;
    //Add Remove quantity of cart items.
    public function __construct()
    {
        // Construct
        //$user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        //$this->CartCount = $this->updateproductdetails($user_ID); // Set the class property
        // dd($this->CartCount['action']);
        
    }

function checkSelectedTimeslotCashback($data) {
    try {
        $timeslotsData = $data['timeslotsdata'] ?? [];
        $products = $data['products'] ?? [];

        if (empty($timeslotsData)) return "";

        // 1. Get selected date/time
        $selectedDate = $data['selectedDate'] ?? "";
        $selectedTime = $data['selectedTime'] ?? "";

        // 2. If empty, use first available
        if (empty($selectedDate) || empty($selectedTime)) {
            $firstDateEntry = $timeslotsData[0];
            $selectedDate = $firstDateEntry['date'] ?? "";
            $firstTimeslots = $firstDateEntry['timeslots'] ?? [];
            $selectedTime = !empty($firstTimeslots)
                ? ($firstTimeslots[0]['time_slots'] ?? "")
                : "";
        }

        // 3. Find matching date entry
        $dateEntry = collect($timeslotsData)->firstWhere('date', $selectedDate);
        if (empty($dateEntry)) return "";

        // 4. Find matching time slot
        $slot = collect($dateEntry['timeslots'] ?? [])->firstWhere('time_slots', $selectedTime);
        if (empty($slot)) return "";

        // 5. Discount & minAmount
        $discount = floatval($slot['discount'] ?? 0);
        $minAmount = floatval($slot['min_amount'] ?? 0);

        // 6. Calculate total cart amount
        $total = 0;
        foreach ($products as $p) {
            $qty = intval($p['cart_qty'] ?? 0);
            $price = floatval($p['price'] ?? 0);
            $total += $qty * $price;
        }
        if ($total <= 0) return "";

        // 7. Eligibility check
        if ($discount > 0) {
            if ($total >= $minAmount) {
                $cashback = $total * $discount / 100;
                return "Awesome! You’ve earned AED " . number_format($cashback, 2) . " cashback";
            } else {
                $needed = number_format($minAmount - $total, 2);
                return "You have to add AED $needed to get $discount% cashback for selected time slot $selectedTime";
            }
        }

        return "";
    } catch (Exception $e) {
        return "";
    }
}


 
     // Add to cart api call
    public function addQuantityCart(Request $request)
    {

        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        
        // if(!empty(session()->get('user_id'))){
        //     $this->updateproductdetails($data_arr['user_id']); 
        // }

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        // $user_ID = env('USER_ID');
        $browser = detectBrowser($request);
                //  echo "<pre>";
                //                 print_r([
                //     "user_id" => $data_arr['user_id'],
                //     "qty" => $request->qty,
                //     "varient_id" => $request->varient_id,
                //     "store_id" => $store_ID,
                //     "product_feature_id" => $request->selectedFeatureId == 0 ? null : $request->selectedFeatureId,
                //     "device_id" => "null",
                //     "platform" => "web-" . $browser,
                // ]);
                // echo "</pre>";
                // die();
        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'add_to_cart', [
                'json' => [
                    "user_id" => $data_arr['user_id'],
                    "qty" => $request->qty,
                    "varient_id" => $request->varient_id,
                    "store_id" => $store_ID,
                    "product_feature_id" =>  $request->selectedFeatureId == 0 ? null : $request->selectedFeatureId,
                    "device_id" => "null",
                    "platform" => "web-".$browser
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $this->CartCount = $this->updateproductdetails($data_arr['user_id']); 
            
            // dd($response);
            if ($statusCode == 200) {
               
                $productList = json_decode($response->getBody()->getContents(), true);
                // echo "<pre>";
                // print_r($productList);
                // echo "</pre>";
                // die();
                return response()->json(['success' => true, 'data' => $productList, 'cart_count' => $this->CartCount]);
            } else {
                // $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }

     // Add to updatecart api call...G1
    public function updateCart(Request $request)
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
        // $user_ID = env('USER_ID');
        $browser = detectBrowser($request);

        // echo "<pre>";
        //     print_r([
        //     "user_id" => $data_arr['user_id'],
        //     "varient_id" => $request->varients,
        //     "store_id" => $store_ID,
        //     "product_feature_id" => $request->selectedFeatureId == 0 ? null : $request->selectedFeatureId,
        //     "device_id" => "null",
        //     "platform" => "web-" . $browser,
        // ]);
        // echo "</pre>";
        // die();
        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'update_cart', [
                'json' => [
                    "user_id" => $data_arr['user_id'], 
                    "varient_id" => $request->varients,
                    "store_id" => $store_ID,
                    "product_feature_id" =>  $request->selectedFeatureId == 0 ? null : $request->selectedFeatureId,
                    "platform" => "web-".$browser
                ]
            ]);

            $statusCode = $response->getStatusCode();
            
            // dd($response);
            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);
                return response()->json(['success' => true, ]);
            } else {
                // $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }
    // Add to updatecart api call...G1
    public function updateSubCart(Request $request)
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
        // $user_ID = env('USER_ID');
        $browser = detectBrowser($request);

        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'update_subcart', [
                'json' => [
                    "user_id" => $data_arr['user_id'], 
                    "varient_id" => $request->varients,
                    "store_id" => $store_ID,
                    "product_feature_id" =>  $request->selectedFeatureId == 0 ? null : $request->selectedFeatureId,
                    "platform" => "web-".$browser
                ]
            ]);

            $statusCode = $response->getStatusCode();
            
            // dd($response);
            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);
                return response()->json(['success' => true, ]);
            } else {
                // $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }

    // Show sub cart api call...G1

    public function showSubCartAPICall(Request $request)
    {

        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        $browser = detectBrowser($request);
        
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }

        if ($request->query('tab') === '2') {
            return redirect('/cart?tab=1');
        }

        $subCartProductList = array();
        $showCartProductList = array();
        $mightHaveMissedProductList = array();

        $selectedTab = $request->query('tab', '1');
        if ($selectedTab == "1") {
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'show_spcatcart', [
                    'json' => [
                        'user_id' => $user_ID,
                        "device_id" => "",
                        'platform' => "web-".$browser,
                        "selected_date" => "null",
                        "selected_time" => "null"
                    ]
                ]);
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    $showCartProductList = json_decode($response->getBody()->getContents(), true);
                    // print_r($subCartProductList);
                 $title = "daily";
                 if (empty($showCartProductList['data'])) {
                     try {
                            $client = new Client();
                            $response = $client->post($nodeappUrl . 'might_have_missed', [
                                'json' => [
                                    "user_id" => $user_ID,
                                    "store_id" => $store_ID,
                                    "device_id" => "",
                                    "type" => "quick",
                                ]
                            ]);
                            $statusCode = $response->getStatusCode();
                            if ($statusCode == 200) {
                                $mightHaveMissedProductList = json_decode($response->getBody()->getContents(), true);
                                // print_r($mightHaveMissedProductList);
                                // return view('Cart/cart', compact('title', 'data_arr', 'showCartProductList', 'mightHaveMissedProductList'));
                                return view('Cart/cart', compact('title', 'data_arr', 'showCartProductList', 'mightHaveMissedProductList', 'subCartProductList'));
                            } else {
                                $errorMessage = env('ERRORMSG');
                            }
                        } catch (RequestException $e) {
            
                            $errorMessage = $e->getMessage();
                        } catch (\Exception $e) {
            
                            $errorMessage = $e->getMessage();
                        }
   
                    } else {
                  return view('Cart/cart', compact('title', 'data_arr', 'showCartProductList', 'mightHaveMissedProductList', 'subCartProductList'));
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
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'showsub_cart', [
                    'json' => [
                        'user_id' => $user_ID,
                        "device_id" => "",
                        'platform' =>"web-".$browser
                    ]
                ]);
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    $subCartProductList = json_decode($response->getBody()->getContents(), true);
                  //  echo "<pre>";print_r($subCartProductList);echo "</pre>";
         $title = "subscription";
        if (empty($subCartProductList['data'])) {
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'might_have_missed', [
                    'json' => [
                        "user_id" => $user_ID,
                        "store_id" => $store_ID,
                        "device_id" => "",
                        "type" => "subscription",
                    ]
                ]);
                $statusCode = $response->getStatusCode();
                if ($statusCode == 200) {
                    $mightHaveMissedProductList = json_decode($response->getBody()->getContents(), true);
                   
                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
            }
   
        }

        } else {
                $errorMessage = env('ERRORMSG');
            }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }
            // return view('Cart/cart', compact('title', 'data_arr', 'subCartProductList','mightHaveMissedProductList' ));
            return view('Cart/cart', compact('title', 'data_arr', 'subCartProductList','mightHaveMissedProductList', 'showCartProductList'));
        }
    }


    //Checkout subscription order... G1
    public function checkoutSubscriptionOrderAPICall(Request $request)
    {
 
        $nodeappUrl = env('NODE_APP_URL');
        //$user_ID = env('USER_ID');
        $store_ID = env('STORE_ID');
        $method = '';
        $paymentType = '';
        $browser = detectBrowser($request);
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }
        
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
         
        if ($request->paymentMethod == 'Pay Now') {
            $method = 'card';
            $paymentType = 'paynow';
        } else if ($request->paymentMethod == 'Pay Per Delivery') {
            $method = 'card';
            $paymentType = 'payperdelivery';
        }
        $walletAmt = "0";
        $cashWalletAmt = "0";
        
        if ($request->totalwalletamt == "NaN" || $request->totalwalletamt == "" || $request->totalwalletamt == null) {
            $walletAmt = "0";
        } else {
            $walletAmt = $request->totalwalletamt;
        }
        if ($request->totalcashwalletamt == "NaN" || $request->totalcashwalletamt == "" || $request->totalcashwalletamt == null) {
            $cashWalletAmt = "0";
        } else {
            $cashWalletAmt = $request->totalcashwalletamt;
        }
        
     
        $productListT = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'checkout_subcribtionorder', [
                'json' => [
                    "user_id" => $user_ID,
                    "is_subscription" => 1,
                    "address_id" => $request->addressID,
                    "bank_id" => 0,
                    "si_sub_ref_no" => $request->siNo,
                    "store_id" => $store_ID,
                    "payment_method" => $method,
                    "payment_status" => "pending",
                    "wallet" => $request->walletStatus,
                    "payment_id" => null,
                    "payment_gateway" => null,
                    "coupon_id" => 0,
                    "coupon_code" => "",
                    "discount_amount" => $request->disccountAmount,
                    "device_id" => "",
                    "del_partner_instruction" => $request->selectedPartnerInstruction,
                    "payment_type" => $paymentType,
                    "del_partner_tip" => "0",
                    "totalrefwalletamt" => $walletAmt,
                    "totalwalletamt" => $cashWalletAmt,
                    "platform" => "web",
                    "browser" => $browser,
                    "order_instruction" => $request->orderInstruction
                ]
            ]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);
                return response()->json([
                    'success' => $productListT['status'],
                    'action' => $productListT['status'],
                    'message' => $productListT['message'],
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
    //Checkout payment subscription order api call... G1
    public function checkoutPaymentSubcribtionOrderAPICall(Request $request)
    {

        $nodeappUrl = env('NODE_APP_URL');
        //$user_ID = env('USER_ID');
        $store_ID = env('STORE_ID');
        $method = '';
        $paymentType = '';
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        $browser = detectBrowser($request);

        // if ($request->paymentMethod == 'Pay Now') {
        //     $method = 'card';
        //     $paymentType = 'paynow';
        // } else if ($request->paymentMethod == 'Pay Per Delivery') {
        //     $method = 'card';
        //     $paymentType = 'payperdelivery';
        // }
        $walletAmt = "0";
        $cashWalletAmt = "0";
        if ($request->totalwalletamt == "NaN" || $request->totalwalletamt == "" || $request->totalwalletamt == null) {
            $walletAmt = "0";
        } else {
            $walletAmt = $request->totalwalletamt;
        }
        if ($request->totalcashwalletamt == "NaN" || $request->totalcashwalletamt == "" || $request->totalcashwalletamt == null) {
            $cashWalletAmt = "0";
        } else {
            $cashWalletAmt = $request->totalcashwalletamt;
        }

        // print_r("user_id => $user_ID,
        //             is_subscription => 1,
        //             address_id => $request->addressID,
        //             bank_id => 0,
        //             si_sub_ref_no => $request->siNo,
        //             store_id => $store_ID,
        //             payment_method => $method,
        //             payment_status => pending,
        //             wallet => $request->walletStatus,
        //             payment_id => null,
        //             payment_gateway => null,
        //             coupon_id => 0,
        //             coupon_code => '',
        //             discount_amount => $request->disccountAmount,
        //             device_id => '',
        //             del_partner_instruction => $request->instruction,
        //             payment_type => $paymentType,
        //             del_partner_tip => 0,
        //             "totalrefwalletamt" => $walletAmt,
                    // "totalwalletamt" => $cashWalletAmt,,platform => Web");
        $productListT = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'subpayment', [
                'json' => [
                    "user_id" => $user_ID,
                    "is_subscription" => 1,
                    "address_id" => $request->addressID,
                    "bank_id" => 0,
                    "si_sub_ref_no" => $request->siNo,
                    "store_id" => $store_ID,
                    "payment_method" => $request->paymentMethod,
                    "payment_status" => "pending",
                    "wallet" => $request->walletStatus,
                    "payment_id" => null,
                    "payment_gateway" => null,
                    "coupon_id" => 0,
                    "coupon_code" => "",
                    "discount_amount" => $request->disccountAmount,
                    "device_id" => "",
                    "del_partner_instruction" => $request->selectedPartnerInstruction,
                    "payment_type" => "paynow",
                    "del_partner_tip" => "0",
                    "totalrefwalletamt" => $walletAmt,
                    "totalwalletamt" => $cashWalletAmt,
                    "platform" => "web",
                    "group_id" => null,
                    "browser" => $browser,
                    "order_instruction" => $request->orderInstruction,
                ]
            ]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);
                // dd($response);

                return response()->json([
                    'success' => $productListT['status'],
                    'action' => $productListT['data']['redirect_url'],
                    'message' => $productListT['message'],
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

    //Order completed page...G1
    public function orderCompletedPage(Request $request)
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
        return view('/order-complete', compact('title', 'data_arr'))->with('CartCount', $this->CartCount);


    }
    
    public function loaderPage(Request $request)
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
        return view('/loading-screen', compact('title', 'data_arr'));


    }


    // API call for save slected date and time for category product in daily cart...G1
    public function saveSelectedDateTimeAPI(Request $request)
    {
        // echo "<pre>";
        // print_r($arr);
        // die();

        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";

        $nodeappUrl = env('NODE_APP_URL');
        // $store_ID = env('STORE_ID');
        //$user_ID = env('USER_ID');
        $productList = array();
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'upquickorder_timeslot', [
                'json' => [
                    "user_id" => $user_ID,
                    "platform" => "web",
                    "dataarray" => $request->input('dataarray')
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);

                return response()->json(['success' => true, 'data' => $productList, 'cart_count' => $this->CartCount]);
            } else {
                $errorMessage = env('ERRORMSG');

            }
        } catch (RequestException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }


    //Checkout daily order... G1
    public function checkoutDailyOrderAPICall(Request $request)
    {

        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        $store_ID = env('STORE_ID');
        $method = '';
        $paymentType = '';
        $browser = detectBrowser($request);

        // echo "<pre>";
        // print_r('jivan');
        // die();
        $walletAmt = "0";
        $cashWalletAmt = "0";
        $siNo = '';
        if ($request->totalwalletamt == "NaN" || $request->totalwalletamt == "" || $request->totalwalletamt == null) {
            $walletAmt = "0";
        } else {
            $walletAmt = $request->totalwalletamt;
        }
        if ($request->totalcashwalletamt == "NaN" || $request->totalcashwalletamt == "" || $request->totalcashwalletamt == null) {
            $cashWalletAmt = "0";
        } else {
            $cashWalletAmt = $request->totalcashwalletamt;
        }
        
        if ($request->paymentMethod == "COD") {
            $method = 'COD';
            $siNo = '';
        } else {
            $method = "card";
            $siNo = $request->siNo;
        }

        // print_r("user_id => $user_ID,
        //             address_id => $request->addressID,
        //             bank_id => 0,
        //             si_sub_ref_no => $request->siNo,
        //             store_id => $store_ID,
        //             payment_method => $method,
        //             payment_status => pending,
        //             wallet => $request->walletStatus,
        //             payment_id => null,
        //             payment_gateway => null,
        //             discount_amount => $request->disccountAmount,
        //             device_id => '',
        //             payment_type => $paymentType,
        //             del_partner_tip => 0,
        //             totalwalletamt =>  $walletAmt,platform => Web,
        //             coupon_id => $request->couponId,
        //             coupon_code => $request->couponCode,
        //             del_partner_instruction => $request->instruction,
        //             del_partner_tip => $request->tip,
        //             "totalrefwalletamt" => $walletAmt,
                    // "totalwalletamt" => $cashWalletAmt,
        //             platform => Web,
        //             delivery_date => null,
        //             time_slot => null,
        //             order_instruction => $request->orderInstruction");die();
        $productListT = [];

        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'checkout_quickorder', [
                'json' => [
                    "user_id" => $user_ID,
                    "address_id" => $request->addressID,
                    "bank_id" => 0,
                    "si_sub_ref_no" => $siNo,
                    "store_id" => $store_ID,
                    "payment_method" => $method,
                    "payment_status" => ($method == 'COD')? "pending":"success",
                    "wallet" => $request->walletStatus,
                    "payment_id" => null,
                    "payment_gateway" => null,
                    "coupon_id" => !empty($request->couponId)?$request->couponId:'',
                    "coupon_code" => !empty($request->couponCode)?$request->couponCode:'',
                    "discount_amount" => !empty($request->disccountAmount)?$request->disccountAmount:0,
                    "device_id" => "",
                    "del_partner_instruction" => !empty($request->selectedPartnerInstruction)?$request->selectedPartnerInstruction:'',
                    "del_partner_tip" => !empty($request->tip)?$request->tip:'',
                    "totalrefwalletamt" => $walletAmt,
                    "totalwalletamt" => $cashWalletAmt,
                    "platform" => "web",
                    "browser" => $browser,
                    "delivery_date" => date('Y-m-d', strtotime('+2 day')),
                    "time_slot" => '06:00 am - 10:00 am',
                    "order_instruction" => !empty($request->orderInstruction)?$request->orderInstruction:''
                ]
            ]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);
                return response()->json([
                    'success' => $productListT['status'],
                    'action' => $productListT['status'],
                    'message' => $productListT['message'],
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

    //Checkout payment daily payment order api call... G1
    public function checkoutDailyPaymentOrderAPICall(Request $request)
    {

        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        $store_ID = env('STORE_ID');
        $walletAmt = "0";
        $cashWalletAmt = "0";
        if ($request->totalwalletamt == "NaN" || $request->totalwalletamt == "" || $request->totalwalletamt == null) {
            $walletAmt = "0";
        } else {
            $walletAmt = $request->totalwalletamt;
        }
        if ($request->totalcashwalletamt == "NaN" || $request->totalcashwalletamt == "" || $request->totalcashwalletamt == null) {
            $cashWalletAmt = "0";
        } else {
            $cashWalletAmt = $request->totalcashwalletamt;
        }
        $productListT = [];
        $browser = detectBrowser($request);
    
   
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'payment', [
                'json' => [
                    "user_id" => $user_ID,
                    "address_id" => $request->addressID,
                    "bank_id" => 0,
                    "si_sub_ref_no" => '',
                    "store_id" => $store_ID,
                    "payment_method" => $request->paymentMethod,
                    "payment_status" => "success",
                    "wallet" => $request->walletStatus,
                    "payment_id" => null,
                    "payment_gateway" => null,
                    "coupon_id" => $request->couponID,
                    "coupon_code" => $request->couponCode,
                    "discount_amount" => $request->disccountAmount,
                    "device_id" => "",
                    "del_partner_instruction" => $request->selectedPartnerInstruction,
                    "payment_type" => 'paynow',
                    "del_partner_tip" => $request->tip,
                    "totalrefwalletamt" => $walletAmt,
                    "totalwalletamt" => $cashWalletAmt,
                    "platform" => "web", //do not change,
                    "browser"=>$browser,
                    "group_id" => null,
                    "delivery_date" => date('Y-m-d', strtotime('+2 day')),
                    "time_slot" => '06:00 am - 10:00 am',
                    "order_instruction" => $request->orderInstruction,
                    "successroutename" => 'success',
                    "cancelroutename" => 'failure'
                ]
            ]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);
                // dd($response);

                return response()->json([
                    'success' => $productListT['status'],
                    'action' => $productListT['data']['redirect_url'],
                    'message' => $productListT['message'],
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
    
     public function dailyOrderSuccess(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die();

        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $nodeappUrl = env('NODE_APP_URL');
        // $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        
        $payment_id = $request->query('payment_id');
        $trans_id = $request->query('trans_id');
        $order_id = $request->query('order_id');
        $hash = $request->query('hash');
        $encrypted = $request->query('encrypted');
        $platform = $request->query('platform');
        $browser = detectBrowser($request);
      
        $productList = array();
        try {
            $client = new Client();
            $response = $client->get($nodeappUrl . 'successfirst', [
            'query' => [
                "user_id" => $user_ID,
                "platform" => $platform,
                "browser" => $browser,
                "payment_id" => $payment_id,
                "trans_id" => $trans_id,
                "order_id" => $order_id,
                "encrypted" => $encrypted,
                "hash" => $hash
            ]
            ]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);
                
                if($request->platform == 'web'){
                    if($request->screen == 'daily'){
                         return redirect('/order-complete?screen=daily');
                    }else{
                        return redirect('/order-complete?screen=subscription');
                    }     
                }else{
                    return redirect('/loading');
                }
               
                // return response()->json(['success' => true, 'data' => $productList, 'cart_count' => $this->CartCount]);
            } else {
                $errorMessage = env('ERRORMSG');

            }
        } catch (RequestException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }
    
     public function dailyOrderFailure(Request $request)
    {
    
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):'';

        $nodeappUrl = env('NODE_APP_URL');
        
        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'failure', [
                'json' => [
                    
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);

                 return \Redirect::to('cart?tab=1')->with('error','You order could not placed.Please Try again');
            } else {
                $errorMessage = env('ERRORMSG');

            }
            
           
        } catch (RequestException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }

}

