<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NotifyMeController extends Controller
{
    //Add Notify Me Home Page
    public function __construct()
    {
        //construct
    }

    public function addNotifyMe(Request $request)
    {

        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
       

       $getUserProfile = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'show_profile', [
                'json' => [
                    'user_id' => $user_ID
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $getUser = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'addnotifyme', [
                'json' => [
                    "user_id" => $user_ID,
                    "varient_id" => $request->varient_id,
                    "product_id" => $request->product_id,
                    "platform" => "web",
                    "fcmtoken" => !empty($getUser['data']['device_id'])?$getUser['data']['device_id']:''
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);

                return response()->json([
                    'success' => true,
                    'action' => 'added',
                    'message' => 'Notification has been set successfully.'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to set notification.'
                ]);
            }
        } catch (RequestException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Request error: ' . $e->getMessage()
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    public function RemoveNotifyMe(Request $request)
    {

        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
     

        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'deletenotifyme', [
                'json' => [
                    'product_id' => $request->product_id,
                    'varient_id' => $request->varient_id,
                    'user_id' => $user_ID,
                    "platform"=> "ios", 
                    "fcmtoken"=>"jivan"
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

    public function showNotify(Request $request){
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
        // $user_ID = env('USER_ID');
        $store_ID = env('STORE_ID');
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        $productList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'shownotifyme', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    'store_id'=> $store_ID
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
        return view('notify', compact('title', 'data_arr', 'productList'));
    }
}
