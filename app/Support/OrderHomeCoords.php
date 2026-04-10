<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;

final class OrderHomeCoords
{
    /**
     * Resolve delivery address coordinates: orders.address_id → address.lat / address.lng (text).
     *
     * @return array{home_lat: float, home_lng: float}|null
     */
    public static function forGroupId(string $groupId, ?int $sessionUserId = null): ?array
    {
        $groupId = trim($groupId);
        if ($groupId === '') {
            return null;
        }

        try {
            $order = DB::table('orders')->where('group_id', $groupId)->first();
            if (! $order || empty($order->address_id)) {
                return null;
            }

            if ($sessionUserId !== null && isset($order->user_id) && (int) $order->user_id !== $sessionUserId) {
                return null;
            }

            $addr = DB::table('address')->where('address_id', $order->address_id)->first();
            if (! $addr) {
                return null;
            }

            $latRaw = $addr->lat ?? null;
            $lngRaw = $addr->lng ?? null;
            if ($latRaw === null || $latRaw === '' || $lngRaw === null || $lngRaw === '') {
                return null;
            }

            $lat = (float) $latRaw;
            $lng = (float) $lngRaw;
            if (! is_finite($lat) || ! is_finite($lng)) {
                return null;
            }

            return [
                'home_lat' => $lat,
                'home_lng' => $lng,
            ];
        } catch (\Throwable $e) {
            return null;
        }
    }
}
