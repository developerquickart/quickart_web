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

class SubscriptionOrderController extends Controller
{

    public function __construct()
    {
        //construct
    }
    // Subscription order list... G1
    public function subscriptionOrderList(Request $request)
    {

        //dd($request->all());
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $subscriptionOrderList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'my_orders_subscription_list', [
                'json' => [
                    'store_id' => $store_ID,
                    'user_id' => $user_ID,
                    'page' => 1,
                    'perpage' => null
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $subscriptionOrderList = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        return view('Orders/SubscriptionOrders/subscription-orders', compact('title', 'data_arr', 'subscriptionOrderList'));
    }
    
     public function generate_invoce(Request $request)
    {
        
      //dd($request->all());
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }
        // $orderDate = $request->query('order_date');
        // $total = $request->query('total');
       

        $subscriptionOrderProductList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'generate_invoice', [
                'json' => [
                    'user_id' => $user_ID,
                    "cart_id" => $request->cart_id
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
               // $subscriptionOrderProductList = json_decode($response->getBody()->getContents(), true);
                  $apiResponse = json_decode($response->getBody()->getContents(), true);
                    if ($apiResponse['status'] == 1 && !empty($apiResponse['data'])) {
                        $pdfUrl = $apiResponse['data'];
                        return redirect()->away($pdfUrl);
                    } else {
                        return back()->with('error', 'Invoice could not be generated.');
                    }

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }
        return view('Orders/SubscriptionOrders/subscription-order-product', compact( 'data_arr', 'subscriptionOrderProductList'));

        // return view('Orders/subscription-order-product', compact(['groupID', 'orderDate', 'total',], 'subscriptionOrderProductList'));
    }


    // Subscription order product list... G1
    public function subscriptionOrderProductList(Request $request)
    {

        //dd($request->all());
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $data_arr['user_id'] = !empty(session()->get('user_id'))?session()->get('user_id'):''; 

        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }
        // $orderDate = $request->query('order_date');
        // $total = $request->query('total');
        $groupID = $request->group_id;

        $subscriptionOrderProductList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'merge_orders', [
                'json' => [
                    'platform' => "web",
                    "group_id" => $groupID
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $subscriptionOrderProductList = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }
        return view('Orders/SubscriptionOrders/subscription-order-product', compact('groupID', 'data_arr', 'subscriptionOrderProductList'));

        // return view('Orders/subscription-order-product', compact(['groupID', 'orderDate', 'total',], 'subscriptionOrderProductList'));
    }


    // Subscription order detail... G1
    public function subscriptionOrderProductDetail(Request $request)
    {

        //dd($request->all());
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
        $data_arr['canonical'] = "";
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $nodeappUrl = env('NODE_APP_URL');
        // $store_ID = env('STORE_ID');
        // $user_ID = env('USER_ID');


        $subscriptionOrderProductDetail = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'my_orders_sub', [
                'json' => [
                    "cart_id" => $request->cart_id,
                    "store_order_id" => $request->store_order_id,
                    "subscription_id" => ""
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $subscriptionOrderProductDetail = json_decode($response->getBody()->getContents(), true);
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }
        return view('Orders/SubscriptionOrders/subscription-order-info', compact('title', 'data_arr', 'subscriptionOrderProductDetail'));

    }



    //Show cancel order reasons list... G1
    public function cancelOrderReasonsList(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        // $store_ID = env('STORE_ID');
        // $user_ID = env('USER_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }

        $productList = array();
        try {
            $client = new Client();
            $response = $client->get($nodeappUrl . 'cancelorderreason', [
                'headers' => [
                    'Accept' => 'application/json',
                ]
            ]);
            // dd($response);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);


                $htmlcode = " <input type='hidden' id='cancel_cartID' name='cancel_cartID' value='$request->cartID'>
                              <input type='hidden' id='cancel_screenName' name='cancel_screenName' value='$request->screenName'>
                              <input type='hidden' id='store_order_id' name='store_order_id' value='$request->storeOrderID'>";
                foreach ($productList['data'] as $item) {
                    // $errorMessage = env('ERRORMSG');

                    $htmlcode .= "<li>
                        <input type='radio' id='reason_" . $item['res_id'] . "' name='reason' value='" . $item['reason'] . "' onclick='handleReasonClick(this)'>
                        <label for='reason_" . $item['res_id'] . "'>" . $item['reason'] . "</label> 
                    </li>";
                }
                echo $htmlcode;
            } else {
                // $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

    }

    //Show cancel order api call... G1
    public function cancelOrderAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        // $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }
        // dd(
        //     "'json' cart_id => $request->cartID, user_id => $user_ID, cancel_reason => $request->canecelReason"
        // );

        $productList = array();

        try {
            if ($request->screenName == "subscription") {
                //Api for for cancel in subscription order...G1
                $url = $nodeappUrl . 'cancelledproductorder';
                $payload = [
                    "cart_id" => $request->cartID,
                    "user_id" => $user_ID,
                    "cancel_reason" => $request->canecelReason,
                    "store_order_id" => $request->storeOrderID
                ];
            } else if ($request->screenName == "daily") {
                //Api for for bayagain in daily order...G1
                $url = $nodeappUrl . 'cancelledquickorder';
                $payload = [
                    "group_id" => $request->cartID,
                    "user_id" => $user_ID,
                    "cancel_reason" => $request->canecelReason,

                ];
                
            } else if ($request->screenName == "dailyProduct") {
               
                //Api for for bayagain in daily order...G1
                $url = $nodeappUrl . 'cancelledquickorderprod';
                $payload = [
                    "cart_id" => $request->cartID,
                    "user_id" => $user_ID,
                    "cancel_reason" => $request->canecelReason

                ];
            }

            $client = new Client();
            $response = $client->post($url, [
                'json' => $payload
            ]);

            $client = new Client();
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);
                // dd($productList);
                return response()->json([
                    'success' => true,
                    'action' => $productList,
                    'message' => $productList['message'],
                ]);

            } else {
                // $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

    }

    //Show buy again api call... G1
    public function buyAgainAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        // $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        // if(!empty(session()->get('user_id'))){
        //     $this->updateproductdetails($user_ID); 
        // }
        $productList = array();
        try {
            if ($request->screenName == "subscription") {
                //Api for for bayagain in subscription order...G1
                $url = $nodeappUrl . 'place_repeated_order';
                $payload = [
                    "cart_id" => $request->cartID,
                    "user_id" => $user_ID,
                    "replace_status" => 1,
                    "device_id" => "",
                    "order_type" => "subscription",
                ];
            } else if ($request->screenName == "daily") {
                //Api for for bayagain in daily order...G1
                $url = $nodeappUrl . 'quick_place_repeated_order';
                $payload = [
                    "cart_id" => $request->cartID,
                    "user_id" => $user_ID,
                    "replace_status" => 1,
                    "order_type" => "quick",
                ];
            }

            $client = new Client();
            $response = $client->post($url, [
                'json' => $payload
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);
                // dd($productList);
                // print_r($productList['message']);
                return response()->json([
                    'success' => true,
                    'action' => $productList,
                    'message' => $productList['message'],
                ]);

            } else {
                // $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

    }



    //Change card api call... G1
    public function changeCardAPICall(Request $request)
    {


        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        // if(!empty(session()->get('user_id'))){
        //     $this->updateproductdetails($user_ID); 
        // }
        $store_ID = env('STORE_ID');
   

        $productListT = [];
        // dd("Jivan ---- user_id => $user_ID, si_sub_ref_no => $request->siNo, cart_id => $request->cartID, device_id => web, platform => web");
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'order_card_changes', [
                'json' => [
                    "user_id" => $user_ID,
                    "si_sub_ref_no" => $request->siNo,
                    "cart_id" => $request->cartID,
                    "device_id" => "web",
                    "platform" => "web"
                ]
            ]);
            $statusCode = $response->getStatusCode();
            
            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);
                // dd($productListT);
                return response()->json([
                    'success' => $productListT['status'],
                    'action' => $productListT,
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



    //Api call for get resume order date list...G1
    public function showResumeOrderDatelistAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }
        $store_ID = env('STORE_ID');

        $dateList = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'resumeord_timeslot', [
                'json' => [

                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $dateList = json_decode($response->getBody()->getContents(), true);

                return response()->json([
                    'success' => $dateList['status'],
                    'action' => $dateList,
                    'message' => $dateList['message'],
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
    //Api call for resume pause order date...G1
    public function resumePauseOrderAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }
        $store_ID = env('STORE_ID');

        $dateResponse = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'my_subscription_resume_order', [
                'json' => [
                    "subscription_id" => $request->subscriptionID,
                    "cart_id" => $request->cartId,
                    "time_slot" => $request->timeSlot,
                    "delivery_date" => $request->deliveryDate
                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $dateResponse = json_decode($response->getBody()->getContents(), true);

                return response()->json([
                    'success' => $dateResponse['status'],
                    'action' => $dateResponse,
                    'message' => $dateResponse['message'],
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

    //Api call for pause  order date...G1
    public function pauseOrderDateAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }
        $store_ID = env('STORE_ID');

        $dateResponse = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'my_subscription_pause_order', [
                'json' => [
                    "subscription_id" => $request->subscriptionID,
                    "cart_id" => $request->cartId,
                    "pause_reason" => "pause by customer",
                    "store_order_id" => $request->sOrderID
                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $dateResponse = json_decode($response->getBody()->getContents(), true);

                return response()->json([
                    'success' => $dateResponse['status'],
                    'action' => $dateResponse,
                    'message' => $dateResponse['message'],
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

}
