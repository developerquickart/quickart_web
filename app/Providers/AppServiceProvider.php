<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        require_once app_path('Helpers/helpers.php');

        View::composer('header', function ($view) {
            $onTheWayOrder = [
                'show' => false,
                'group_id' => null,
            ];

            $userId = session()->get('user_id');
            if (empty($userId)) {
                $view->with('onTheWayOrder', $onTheWayOrder);
                return;
            }

            try {
                $nodeAppUrl = env('NODE_APP_URL');
                if (empty($nodeAppUrl)) {
                    $view->with('onTheWayOrder', $onTheWayOrder);
                    return;
                }

                $client = new Client();
                $response = $client->post($nodeAppUrl . 'my_dailyorders', [
                    'json' => [
                        'user_id' => $userId,
                        'page' => 1,
                        'perpage' => null,
                        'platform' => 'web',
                    ],
                    'http_errors' => false,
                    'timeout' => 8,
                ]);

                if ($response->getStatusCode() === 200) {
                    $dailyOrderResponse = json_decode($response->getBody()->getContents(), true);
                    $dailyOrders = $dailyOrderResponse['data'] ?? [];

                    if (is_array($dailyOrders) && !empty($dailyOrders)) {
                        foreach ($dailyOrders as $order) {
                            if (
                                isset($order['order_status'], $order['group_id']) &&
                                $order['order_status'] === 'Out_For_Delivery' &&
                                !empty($order['group_id'])
                            ) {
                                $onTheWayOrder = [
                                    'show' => true,
                                    'group_id' => $order['group_id'],
                                ];
                                break;
                            }
                        }
                    }
                }
            } catch (\Throwable $e) {
                Log::warning('Unable to fetch On the way order for header', [
                    'user_id' => $userId,
                    'error' => $e->getMessage(),
                ]);
            }

            $view->with('onTheWayOrder', $onTheWayOrder);
        });
    }
}
