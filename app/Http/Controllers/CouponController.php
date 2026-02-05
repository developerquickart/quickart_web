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


class CouponController extends Controller
{

    public function __construct()
    {
        //construct
    }

    //Api call for get coupon list...G1
    public function geCouponList(Request $request)
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
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        
        $couponList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'couponlist', [
                'json' => [
                    'user_id' => $user_ID,
                    "store_id" => $store_ID,
                    "total_delivery" => "",
                    "cart_id" => "null"
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $couponList = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        return view('Profile/coupon', compact('title', 'data_arr', 'couponList'));
    }

    //Api call for get coupon list...G1
    public function showCouponlistAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }

        $couponList = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'couponlist', [
                'json' => [
                    "store_id" => $store_ID,
                    "user_id" => $user_ID,
                    "total_delivery" => "",
                    "cart_id" => "null"
                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $couponList = json_decode($response->getBody()->getContents(), true);

                return response()->json([
                    'success' => $couponList['status'],
                    'action' => $couponList,
                    'message' => $couponList['message'],
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


    //Api call for get coupon list...G1

    public function applyCouponAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';  
        // if(!empty(session()->get('user_id'))){
        //     $this->updateproductdetails($data_arr['user_id']); 
        // }

        $couponList = [];
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'apply_coupon', [
                'json' => [
                    "store_id" => $store_ID,
                    "user_id" => $user_ID,
                    "coupon_code" => $request->couponCode,
                    "order_type" => $request->orderType
                ]
            ]);
            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $couponList = json_decode($response->getBody()->getContents(), true);

                return response()->json([
                    'success' => $couponList['status'],
                    'action' => $couponList,
                    'message' => $couponList['message'],
                ]);
            } else {
                return response()->json([
                    'status' => $couponList['status'],
                    'message' => $couponList['message'],
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
