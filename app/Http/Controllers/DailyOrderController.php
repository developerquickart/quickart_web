<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\OrderHomeCoords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Carbon\carbon;
use Psy\Readline\Hoa\Console;
use Response;
use Symfony\Component\HttpFoundation\Session\Session;

class DailyOrderController extends Controller
{

    public function __construct()
    {
        //construct
    }

    // Daily order list... G1
    public function dailyOrderList(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
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
        $dailyOrderList = array();
        $selectedTab = $request->query('tab', '1');
        if ($selectedTab == "1") {
        try {
            $client = new Client();
            $response = $client->post($nodeappUrl . 'my_dailyorders', [
                'json' => [
                    'user_id' => $data_arr['user_id'],
                    'page' => 1,
                    'perpage' => null,
                    "platform" => "web"
                ]
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode == 200) {
                $dailyOrderList = json_decode($response->getBody()->getContents(), true);

            } else {
                $errorMessage = env('ERRORMSG');
            }
        } catch (RequestException $e) {

            $errorMessage = $e->getMessage();
        } catch (\Exception $e) {

            $errorMessage = $e->getMessage();
        }
        return view('Orders/my-orders', compact('title', 'data_arr', 'dailyOrderList'));
        } else {
            
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'my_orders_subscription_list', [
                    'json' => [
                        'store_id' => $store_ID,
                        'user_id' => $data_arr['user_id'],
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

        return view('Orders/my-orders', compact('title', 'data_arr', 'subscriptionOrderList'));
        }
    }

    // Daily order  details... G1
    public function dailyOrderDetailsList(Request $request)
    {
        $title = "Quickart-category";
        $data_arr = array();
        $data_arr['title'] = "Quickart";
        $data_arr['keywords'] = "";
        $data_arr['description'] = "";
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

        $dailyOrderDetailsList = array();
        $deliveryBoyTracking = null;

            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'orders_details', [
                    'json' => [
                        'user_id' => $user_ID,
                        'group_id' => $request->group_id,
                        "platform" => "web"
                    ]
                ]);
                //  dd($response);
                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $dailyOrderDetailsList = json_decode($response->getBody()->getContents(), true);
                   

                } else {
                    $errorMessage = env('ERRORMSG');
                }
            } catch (RequestException $e) {

                $errorMessage = $e->getMessage();
            } catch (\Exception $e) {

                $errorMessage = $e->getMessage();
            }

            $deliveryBoyTracking = null;
            if (! empty($dailyOrderDetailsList['data']) && is_array($dailyOrderDetailsList['data'])) {
                $deliveryBoyTracking = $this->buildDeliveryBoyTrackingMeta(
                    (string) $request->query('group_id', ''),
                    $dailyOrderDetailsList['data']
                );
            }

            return view('Orders/DailyOrders/daily-order-details', compact('title', 'data_arr', 'dailyOrderDetailsList', 'deliveryBoyTracking'));
        
    }

    /**
     * When order is out for delivery, enable live rider strip if subscription_order has dboy_id
     * and home coordinates resolve via orders.address_id → address.lat/lng.
     *
     * @param  array<string, mixed>  $orderData
     */
    private function buildDeliveryBoyTrackingMeta(string $groupId, array $orderData): ?array
    {
        if ($groupId === '' || ($orderData['order_status'] ?? '') !== 'Out_For_Delivery') {
            return null;
        }

        try {
            $sub = DB::table('subscription_order')->where('group_id', $groupId)->first();
            if (! $sub || empty($sub->dboy_id)) {
                return null;
            }
            if (isset($sub->user_id) && (int) $sub->user_id !== (int) session('user_id')) {
                return null;
            }
        } catch (\Throwable $e) {
            return null;
        }

        $uid = session('user_id');
        $sessionUserId = $uid !== null && $uid !== '' ? (int) $uid : null;
        $home = OrderHomeCoords::forGroupId($groupId, $sessionUserId);
        if ($home === null) {
            return null;
        }

        return [
            'group_id' => $groupId,
            'home_lat' => $home['home_lat'],
            'home_lng' => $home['home_lng'],
        ];
    }
   

}
