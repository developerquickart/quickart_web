<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DeliveryEtaController extends Controller
{
    private const FALLBACK_MINUTES = 18;

    private const CACHE_TTL_SECONDS = 600;

    public function show(Request $request)
    {
        if (empty(session('user_id'))) {
            return response()->json(['minutes' => null, 'label' => null], 401);
        }

        $userLat = session('delivery_user_lat');
        $userLng = session('delivery_user_lng');
        $storeLat = session('delivery_store_lat');
        $storeLng = session('delivery_store_lng');

        if ($userLat === null || $userLng === null || $storeLat === null || $storeLng === null) {
            return response()->json([
                'minutes' => self::FALLBACK_MINUTES,
                'label' => (string) self::FALLBACK_MINUTES . ' mins',
                'source' => 'fallback_no_coords',
            ]);
        }

        $key = config('services.google.maps_server_key');
        if (empty($key)) {
            return response()->json([
                'minutes' => self::FALLBACK_MINUTES,
                'label' => (string) self::FALLBACK_MINUTES . ' mins',
                'source' => 'fallback_no_api_key',
            ]);
        }

        $cacheKey = 'delivery_eta_rm_v2_' . session('user_id') . '_' . md5(
            implode('|', [
                round((float) $storeLat, 5),
                round((float) $storeLng, 5),
                round((float) $userLat, 5),
                round((float) $userLng, 5),
            ])
        );

        $payload = Cache::get($cacheKey);
        if (! is_array($payload)) {
            $payload = $this->fetchRouteMatrixMinutes((float) $storeLat, (float) $storeLng, (float) $userLat, (float) $userLng, $key);
            if (is_array($payload)) {
                Cache::put($cacheKey, $payload, self::CACHE_TTL_SECONDS);
            }
        }

        if ($payload === null) {
            return response()->json([
                'minutes' => self::FALLBACK_MINUTES,
                'label' => (string) self::FALLBACK_MINUTES . ' mins',
                'source' => 'fallback_api',
            ]);
        }

        return response()->json([
            'minutes' => $payload['minutes'],
            'label' => $payload['minutes'] . ' mins',
            'source' => 'google_route_matrix',
        ]);
    }

    /**
     * Google Routes API — Compute Route Matrix (REST).
     *
     * @return array{minutes: int}|null
     */
    private function fetchRouteMatrixMinutes(float $originLat, float $originLng, float $destLat, float $destLng, string $apiKey): ?array
    {
        $url = 'https://routes.googleapis.com/distanceMatrix/v2:computeRouteMatrix';

        $body = [
            'origins' => [
                [
                    'waypoint' => [
                        'location' => [
                            'latLng' => [
                                'latitude' => $originLat,
                                'longitude' => $originLng,
                            ],
                        ],
                    ],
                ],
            ],
            'destinations' => [
                [
                    'waypoint' => [
                        'location' => [
                            'latLng' => [
                                'latitude' => $destLat,
                                'longitude' => $destLng,
                            ],
                        ],
                    ],
                ],
            ],
            'travelMode' => 'DRIVE',
            'routingPreference' => 'TRAFFIC_AWARE',
        ];

        try {
            $response = Http::timeout(12)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'X-Goog-Api-Key' => $apiKey,
                    'X-Goog-FieldMask' => 'originIndex,destinationIndex,duration,distanceMeters,status,condition',
                ])
                ->post($url, $body);

            if (! $response->ok()) {
                Log::warning('Route Matrix HTTP error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return null;
            }

            $rows = $response->json();
            if (! is_array($rows)) {
                Log::warning('Route Matrix invalid JSON');

                return null;
            }
            if (isset($rows['error'])) {
                Log::warning('Route Matrix API error', ['error' => $rows['error']]);

                return null;
            }
            if ($rows === []) {
                Log::warning('Route Matrix empty response');

                return null;
            }

            $element = $rows[0];
            if (! is_array($element)) {
                return null;
            }

            if (($element['condition'] ?? '') !== 'ROUTE_EXISTS') {
                Log::warning('Route Matrix route missing', ['element' => $element]);

                return null;
            }

            $durationRaw = $element['duration'] ?? '';
            if (is_string($durationRaw) && preg_match('/^(\d+)s$/', $durationRaw, $m)) {
                $seconds = (int) $m[1];
            } elseif (is_numeric($durationRaw)) {
                $seconds = (int) $durationRaw;
            } else {
                Log::warning('Route Matrix duration parse failed', ['duration' => $durationRaw]);

                return null;
            }

            if ($seconds <= 0) {
                return null;
            }

            $minutes = max(1, (int) ceil($seconds / 60));

            return ['minutes' => $minutes];
        } catch (\Throwable $e) {
            Log::error('Route Matrix exception', ['message' => $e->getMessage()]);

            return null;
        }
    }
}
