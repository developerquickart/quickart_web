<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\carbon;
use Symfony\Component\HttpFoundation\Session\Session;
use function Laravel\Prompts\alert;
use Psy\Readline\Hoa\Console;
use Response;
use GuzzleHttp\Exception\RequestException;

class RateReviewController extends Controller
{

    public function __construct()
    {
        //construct
    }

    // Subscription order product list... G1
    public function getReviewProductList(Request $request)
    {

        //dd($request->all());
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
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        // if (empty($user_ID)) {
        // return redirect()->to('/'); // or use '/home' if that's your homepage
        // }

        $screenName = $request->screenName;
        // $orderList = json_decode(urldecode(request()->query('data')), true);
        $orderList = json_decode(urldecode($request->query('data')), true);

        $groupid = isset($orderList['group_id']) ? $orderList['group_id'] : '';

        $reviewProductList = array();
        try {
            $client = new Client();

            if ($screenName == 'subreview') {
                $url = $nodeappUrl . 'merge_orders';
                $payload = [
                    // "user_id" => $user_ID,
                    // "store_id" => $store_ID,
                    "group_id" => $groupid,
                    "platform" => "web"
                ];
            } else if ($screenName == 'dailyreview') {
                $url = $nodeappUrl . 'orders_details';
                $payload = [
                    'user_id' => $user_ID,
                    'group_id' => $groupid,
                    "platform" => "web"
                ];
            }

            $response = $client->post($url, [
                'json' => $payload
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $reviewProductList = json_decode($response->getBody()->getContents(), true);
                // echo "<pre>";
                // print_r($reviewProductList);
                // echo "</pre>";
                // die();
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }
        return view('Rating/rating-reviews', compact('screenName', 'data_arr', 'reviewProductList'));
    }



    // api call for add rate and review by order.. G1
    public function reviewAddedByOrderAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        // if(!empty(session()->get('user_id'))){
        //     $this->updateproductdetails($data_arr['user_id']); 
        // }

        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'review_on_delivery', [
                'json' => [
                    'user_id' => $user_ID,
                    "platform" => "web",
                    "cart_id" => $request->cartID,
                    "rating" => $request->rating,
                    "description" => $request->review,
                    "subscription_id" => $request->subscriptionID

                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);
            // dd($responseBody);

            if ($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1") {
                // dd($responseBody['data']['redirect_url']);
                return response()->json([
                    'success' => 1,
                    'action' => $responseBody['message'],
                    'message' => $responseBody['message'],
                ]);
            } else {
                return response()->json([
                    'success' => 0,
                    'action' => $responseBody['status'],
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

    // api call for add rate and review by order.. G1
    public function ratingReviewAddedByProduct(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        // if(!empty(session()->get('user_id'))){
        //     $this->updateproductdetails($data_arr['user_id']); 
        // }
        $store_ID = env('STORE_ID');


        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'add_product_rating', [
                'json' => [
                    'user_id' => $user_ID,
                    "platform" => "web",
                    "cart_id" => $request->cartID,
                    "rating" => $request->rating,
                    "description" => $request->review,
                    "subscription_id" => $request->subscriptionID,
                    "store_id" => $store_ID,
                    "varient_id" => $request->varientID,
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);
            // dd($responseBody);

            if ($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1") {
                // dd($responseBody['data']['redirect_url']);
                return response()->json([
                    'success' => 1,
                    'action' => $responseBody['message'],
                    'message' => $responseBody['message'],
                ]);
            } else {
                return response()->json([
                    'success' => 0,
                    'action' => $responseBody['status'],
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


    // Subscription order product list... G1
    public function getRatingReviewListAPICall(Request $request)
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
        $varientId = $request->query('varient_id');
        $productName = $request->query('product_name');

        $ratingReviewList = array();
        try {
            $client = new Client();

            $url = $nodeappUrl . 'product_review_list';
            $payload = [
                "varient_id" => $varientId
            ];
            $response = $client->post($url, [
                'json' => $payload
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode == 200) {
                $ratingReviewList = json_decode($response->getBody()->getContents(), true);
                // echo "<pre>";
                // print_r($reviewProductList);
                // echo "</pre>";
                // die();
            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }
        return view('Rating/rating-list', compact('productName', 'data_arr', 'ratingReviewList'));
    }


}