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

class CardController extends Controller
{

    public function __construct()
    {
        //construct
    }
    // Api call for get card list...G1
    public function cardList(Request $request)
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
        $siNo = $request->si_sub_ref_no;


        $nodeappUrl = env('NODE_APP_URL');
        $store_ID = env('STORE_ID');
        // $user_ID = env('USER_ID');
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        $cardList = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'user_bank_details', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    "platform" => "web"
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $cardList = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        return view('BankCard/card-details', compact('title', 'data_arr', 'cardList', 'siNo'));
    }


    // api call for remove card.. G1
    public function removeCardAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        if(!empty(session()->get('user_id'))){
            $this->updateproductdetails($user_ID); 
        }
        
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'deletecard', [
                'json' => [
                    'user_id' => $user_ID,
                    'bank_id' => $request->bankId,
                    "platform" => "web"
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);

            if ($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === 1) {
                return response()->json([
                    'success' => true,
                    'action' => $responseBody['status'],
                    'message' => $responseBody['message'],
                ]);
            } else {
                return response()->json([
                    'success' => false,
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

    // api call for add card.. G1
    public function addCardAPICall(Request $request)
    {
        $nodeappUrl = env('NODE_APP_URL');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):''; 
        // if(!empty(session()->get('user_id'))){
        //     $this->updateproductdetails($user_ID); 
        // }
        $addedFrom = $request->addedFrom;
        $tab = $request->tab;
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'savecard', [
                'json' => [
                    'user_id' => $user_ID,
                    "platform" => "web",
                    "addedFrom"=>$addedFrom,
                    "tab"=>$tab,
                    "successroutename" => 'cardSuccessCall',
                    "cancelroutename" => 'cardFailureCall'
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody()->getContents(), true);
            // dd($responseBody);

            if ($statusCode == 200 && isset($responseBody['status']) && $responseBody['status'] === "1") {
                // dd($responseBody['data']['redirect_url']);
                return response()->json([
                    'success' => true,
                    'action' => $responseBody['data']['redirect_url'],
                    'message' => $responseBody['message'],
                ]);
            } else {
                return response()->json([
                    'success' => false,
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
    
      public function cardSuccessCall(Request $request)
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
        
        $productList = array();
        try {
            $client = new Client();
            $response = $client->get($nodeappUrl . 'savesuccess?order_id='.$request->order_id);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);
                
                if($request->addedFrom == 'card'){
                    return \Redirect::to('card-details');
                }elseif($request->addedFrom == 'trail-pack-cart'){
                    return \Redirect::to('trial-pack-cart');
                }else{
                    return \Redirect::to('cart?tab='.$request->tab);
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
    
     public function cardFailureCall(Request $request)
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
            $response = $client->post($nodeappUrl . 'savefailure', [
                'json' => [
                    "user_id" => $data_arr['user_id'],
                    "platform" => "web",
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $productList = json_decode($response->getBody()->getContents(), true);

                //  return \Redirect::to('card-details')->with('error','Card could not saved.Please try again');
                 if($request->addedFrom == 'card'){
                    return \Redirect::to('card-details')->with('error','Card could not saved.Please try again');
                }else{
                    return \Redirect::to('cart?tab='.$request->tab)->with('error','Card could not saved.Please try again');
                }
            } else {
                $errorMessage = env('ERRORMSG');

            }
            
           
        } catch (RequestException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

    }


    // Api call for get app info...G1
    public function appInfo(Request $request)
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
        // $user_ID = env('USER_ID');
        $user_ID = !empty(session()->get('user_id')) ? session()->get('user_id') : '';
        if (empty($user_ID)) {
        return redirect()->to('/'); // or use '/home' if that's your homepage
        }
        
        $getUserProfile = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'show_profile', [
                'json' => [
                    'user_id' => $data_arr['user_id']
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $getUserProfile = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }

        $appInfo = array();
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'app_info', [
                'json' => [
                    'user_id' =>  $data_arr['user_id'],
                    'platform' => "web",
                    'app_name' => "customer",
                    'device_id' => $getUserProfile['data']['device_id'],
                    'actual_device_id' => $getUserProfile['data']['actual_device_id'],
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


        return view('BankCard/wallet', compact('title', 'data_arr', 'appInfo'));
    }

}
