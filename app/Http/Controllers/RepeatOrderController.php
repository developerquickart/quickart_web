<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\carbon;
use Symfony\Component\HttpFoundation\Session\Session;

class RepeatOrderController extends Controller
{

    public function __construct()
    {
        //construct
    }

    public function ProductList(Request $request)
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

        // Repeat orders product list api call
    
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'repeat_orders', [
                    'json' => [
                        "store_id" => $store_ID,
                        "user_id" => $user_ID,
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
       
        return view('repeat-orders', compact('title', 'data_arr', 'productList'));
    }

}