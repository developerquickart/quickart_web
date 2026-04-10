<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderTrackingController extends Controller
{
    /**
     * Poll delivery boy live coordinates (subscription_order.dboy_id → delivery_boy.lat/lng).
     */
    public function deliveryBoyPosition(Request $request)
    {
        if (empty(session('user_id'))) {
            return response()->json(['ok' => false, 'message' => 'unauthorized'], 401);
        }

        $groupId = $request->query('group_id');
        if ($groupId === null || $groupId === '') {
            return response()->json(['ok' => false, 'message' => 'group_id required'], 400);
        }

        try {
            $sub = DB::table('subscription_order')->where('group_id', $groupId)->first();
            if (! $sub) {
                return response()->json(['ok' => false, 'message' => 'order_not_found'], 404);
            }

            if (isset($sub->user_id) && (int) $sub->user_id !== (int) session('user_id')) {
                return response()->json(['ok' => false, 'message' => 'forbidden'], 403);
            }

            $dboyId = $sub->dboy_id ?? null;
            if ($dboyId === null || $dboyId === '') {
                return response()->json(['ok' => false, 'message' => 'no_dboy']);
            }

            $boy = DB::table('delivery_boy')->where('dboy_id', $dboyId)->first();
            if (! $boy) {
                return response()->json(['ok' => false, 'message' => 'delivery_boy_not_found'], 404);
            }

            $latRaw = $boy->lat ?? null;
            $lngRaw = $boy->lng ?? null;
            if ($latRaw === null || $latRaw === '' || $lngRaw === null || $lngRaw === '') {
                return response()->json(['ok' => false, 'message' => 'no_coordinates']);
            }

            $riderLat = (float) $latRaw;
            $riderLng = (float) $lngRaw;
            if (! is_finite($riderLat) || ! is_finite($riderLng)) {
                return response()->json(['ok' => false, 'message' => 'invalid_coordinates']);
            }

            $homeLat = null;
            $homeLng = null;
            foreach (['delivery_lat', 'user_lat', 'lat', 'address_lat'] as $k) {
                if (isset($sub->{$k}) && $sub->{$k} !== '' && is_numeric($sub->{$k})) {
                    $homeLat = (float) $sub->{$k};
                    break;
                }
            }
            foreach (['delivery_lng', 'user_lng', 'lng', 'address_lng'] as $k) {
                if (isset($sub->{$k}) && $sub->{$k} !== '' && is_numeric($sub->{$k})) {
                    $homeLng = (float) $sub->{$k};
                    break;
                }
            }

            return response()->json([
                'ok' => true,
                'rider_lat' => $riderLat,
                'rider_lng' => $riderLng,
                'home_lat' => $homeLat !== null && is_finite($homeLat) ? $homeLat : null,
                'home_lng' => $homeLng !== null && is_finite($homeLng) ? $homeLng : null,
            ]);
        } catch (\Throwable $e) {
            Log::warning('deliveryBoyPosition failed', [
                'group_id' => $groupId,
                'error' => $e->getMessage(),
            ]);

            return response()->json(['ok' => false, 'message' => 'server_error'], 500);
        }
    }
}
