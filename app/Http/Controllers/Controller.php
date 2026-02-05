<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function updateproductdetails($user_id)
    {

        $nodeappUrl = env('NODE_APP_URL');
        // $user_ID = env('USER_ID');
        $user_ID = !empty(session()->get('user_id'))?session()->get('user_id'):'';
        
        // $userName = !empty(session()->get('user_name'))?session()->get('user_name'):'Guest';
        // $firstWord = ucfirst(explode(' ', $userName)[0]);
        // \View::share('user_name',$firstWord);
        
        \View::share('totalCartCount', 0);
        if($user_ID){
            try {
                $client = new Client();
                $response = $client->post($nodeappUrl . 'updateproductdetails', [
                    'json' => [
                        "user_id" => $user_ID
                    ]
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode == 200) {
                    $CartCount = json_decode($response->getBody()->getContents(), true);

                    $dailycartCount = !empty($CartCount['data']['dailycartCount'])?$CartCount['data']['dailycartCount']:0;
                    $subscriptioncartCount = !empty($CartCount['data']['subscriptioncartCount'])?$CartCount['data']['subscriptioncartCount']:0;
                    $totalCartCount = $dailycartCount + $subscriptioncartCount;
                    \View::share('totalCartCount', $totalCartCount);
                    
                  //  echo "<pre>";print_r($CartCount); echo "</pre>";exit;

                    return $CartCount['data'];
                } else {
                    return "false";
                }
            } catch (RequestException $e) {
                return "false";
            } catch (\Exception $e) {
                return "false";
            }
        }
        
    }
}
