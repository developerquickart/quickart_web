<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\carbon;
use Symfony\Component\HttpFoundation\Session\Session;

class TrialPackController extends Controller
{

    public function __construct()
    {
        //construct
    }

    //Show Trial pack api call...G1
    public function trialPackList(Request $request)
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
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($data_arr['user_id']); 
        }

        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'trailpacklist', [
                'json' => [
                    'user_id' => $user_ID,
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

        return view('Trailpack/trial-pack', compact('title', 'data_arr', 'productList'));
    }


    //Show trial pack product list... G1
    public function showTrialPackProduct(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }

        $productListT = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'trailpackdetails', [
                'json' => [
                    "trail_id" => $request->trialPID,
                    'user_id' => $user_ID,
                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);
                // Construct HTML content dynamically
                $htmlcode = "<div>";
                foreach ($productListT['data']['product_details'] as $product) {
                    $htmlcode .= "
                    <div class='trial_pack_product_listing'>
                        <div class='trial_pack_product_img'>
                            <img src='" . $product['product_image'] . "' alt='' class='img-fluid'>
                        </div>
                        <div class='trial_pack_product_content'>
                            <div class='trial_pack_product_name'>
                                " . $product['product_name'] . "
                            </div>
                            <div class='trial_pack_product_rupees'>
                                <p class='offer-price'>AED <span>" . $product['discounted_price'] . "</span></p>
                                <p class='regular-price'><span>AED" . $product['mrp'] . "</span></p>
                            </div>
                        </div>
                    </div>
                    <hr>";
                }
                $htmlcode .= "</div>";


                return response()->json([
                    'status' => 'success',
                    'htmlcode' => $htmlcode,
                    "data" => $productListT['data']
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


    //Show buy now trial pack... G1
    public function buyNowTrailPack(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }


        $productListT = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'add_trail_pack', [
                'json' => [
                    "trail_id" => $request->trialPID,
                    "user_id" => $user_ID,
                    "qty" => $request->qty,

                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);
                
                // echo "<pre>";print_r($productListT);echo "</pre>";
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

    //Show Trial pack cart api call...G1
    public function trialPackCart(Request $request)
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
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }


        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'show_trailpack', [
                'json' => [
                    'user_id' => $user_ID,
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

        return view('Trailpack/trial-pack-cart', compact('title', 'data_arr', 'productList'));
    }


    //Checkout trial pack... G1
    public function checkoutTrialPackAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }
        $store_ID = env('STORE_ID');
        $method = '';
        if ($request->paymentMethod == 'Pay Now') {
            $method = 'card';
        } else if ($request->paymentMethod == 'COD') {
            $method = 'COD';
        }
        $browser = detectBrowser($request);

        $productListT = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'checkout_trailpack', [
                'json' => [

                    "user_id" => $user_ID,
                    "address_id" => $request->addressID,
                    "bank_id" => 0,
                    "si_sub_ref_no" => $request->siNo,
                    "store_id" => $store_ID,
                    "payment_method" => $method,
                    "payment_status" => "Pending",
                    "wallet" => "no",
                    "payment_id" => null,
                    "payment_gateway" => null,
                    "coupon_id" => 0,
                    "coupon_code" => "",
                    "discount_amount" => 0.0,
                    "delivery_date" => $request->deliveyDate,
                    "time_slot" => $request->timeSlot,
                    "del_partner_tip" => $request->deliveryPartenerTip,
                    "del_partner_instruction" => $request->selectedPartnerInstruction,
                    "device_id" => "",
                    "totalwalletamt" => 0,
                    "group_id" =>null,
                    "order_instruction" => $request->orderInstruction,
                    "platform" => "web",
                    "browser" => $browser,
                ]
            ]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);
                // dd($productListT);
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


    //Show address api call... G1
    public function showAddressList(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }
        $store_ID = env('STORE_ID');

        $productListT = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'show_address', [
                'json' => [
                    "store_id" => $store_ID,
                    "user_id" => $user_ID
                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);

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

    //Show address api call... G1
    public function showCardList(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        // if(!empty(session()->get('user_id'))){
        //     $this->updateproductdetails($user_ID); 
        // }
        $store_ID = env('STORE_ID');

        $productListT = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'user_bank_details', [
                'json' => [
                    "user_id" => $user_ID
                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);

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


    //Quick Pay trial pack... G1
    public function quickPayTrialPackAPICall(Request $request)
    {


        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        // if(!empty(session()->get('user_id'))){
        //     $this->updateproductdetails($user_ID); 
        // }
        $store_ID = env('STORE_ID');
        $method = '';
        if ($request->paymentMethod == 'quick') {
            $method = 'card';
        } else {
            $method = 'applepay';
        }
        $browser = detectBrowser($request);

        $productListT = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'trailpayment', [
                'json' => [
                    "user_id" => $user_ID,
                    "address_id" => $request->addressID,
                    "bank_id" => 0,
                    "si_sub_ref_no" => "",
                    "store_id" => $store_ID,
                    "payment_method" => $method,
                    "payment_status" => "Pending",
                    "wallet" => "no",
                    "payment_id" => null,
                    "payment_gateway" => null,
                    "coupon_id" => 0,
                    "coupon_code" => "",
                    "discount_amount" => 0.0,
                    "delivery_date" => $request->deliveyDate,
                    "time_slot" => $request->timeSlot,
                    "del_partner_tip" => $request->deliveryPartenerTip,
                    "del_partner_instruction" => $request->selectedPartnerInstruction,
                    "device_id" => "",
                    "platform" => "web",
                    "totalwalletamt" => 0,
                    "group_id" => null,
                    "order_instruction" => $request->orderInstruction,
                    "browser" => $browser
                ]
            ]);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productListT = json_decode($response->getBody()->getContents(), true);
                // dd($productListT);
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
}
