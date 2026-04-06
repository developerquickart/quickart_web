<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DeliveryEtaController extends Controller
{
    private const FALLBACK_MINUTES = 18;

    /** Extra minutes shown on top of Google route time (packaging / prep). */
    private const PACKAGING_BUFFER_MINUTES = 5;

    private const CACHE_TTL_SECONDS = 600;

    public function show(Request $request)
    {
        if (empty(session('user_id'))) {
            return response()->json(['minutes' => null, 'label' => null], 401);
        }

        $userLat = $this->sessionCoord('delivery_user_lat');
        $userLng = $this->sessionCoord('delivery_user_lng');
        $storeLat = $this->sessionCoord('delivery_store_lat');
        $storeLng = $this->sessionCoord('delivery_store_lng');

        if ($userLat === null || $userLng === null || $storeLat === null || $storeLng === null) {
            return response()->json([
                'minutes' => self::FALLBACK_MINUTES,
                'label' => (string) self::FALLBACK_MINUTES . ' mins',
                'distance_meters' => null,
                'distance_label' => null,
                'source' => 'fallback_no_coords',
            ]);
        }

        $key = config('services.google.maps_server_key');
        if (empty($key)) {
            return response()->json([
                'minutes' => self::FALLBACK_MINUTES,
                'label' => (string) self::FALLBACK_MINUTES . ' mins',
                'distance_meters' => null,
                'distance_label' => null,
                'source' => 'fallback_no_api_key',
            ]);
        }

        $cacheKey = 'delivery_eta_rm_v3_' . session('user_id') . '_' . md5(
            implode('|', [
                round((float) $storeLat, 5),
                round((float) $storeLng, 5),
                round((float) $userLat, 5),
                round((float) $userLng, 5),
            ])
        );

        $exposeMatrix = config('app.debug') || (bool) config('services.google.log_route_matrix_response');

        $payload = Cache::get($cacheKey);
        $routeMatrixParsed = null;
        $routeMatrixRawBody = null;
        $routeMatrixHttpStatus = null;

        if (! is_array($payload)) {
            $fetched = $this->fetchRouteMatrixMinutes((float) $storeLat, (float) $storeLng, (float) $userLat, (float) $userLng, $key);
            if (is_array($fetched)) {
                Cache::put($cacheKey, [
                    'minutes' => $fetched['minutes'],
                    'distance_meters' => $fetched['distance_meters'] ?? null,
                ], self::CACHE_TTL_SECONDS);
                $tracked = $request->session()->get('delivery_eta_rm_cache_keys', []);
                if (! is_array($tracked)) {
                    $tracked = [];
                }
                if (! in_array($cacheKey, $tracked, true)) {
                    $tracked[] = $cacheKey;
                    $request->session()->put('delivery_eta_rm_cache_keys', $tracked);
                }
                $payload = [
                    'minutes' => $fetched['minutes'],
                    'distance_meters' => $fetched['distance_meters'] ?? null,
                ];
                $routeMatrixParsed = $fetched['route_matrix_parsed'] ?? null;
                $routeMatrixRawBody = $fetched['route_matrix_raw_body'] ?? null;
                $routeMatrixHttpStatus = $fetched['route_matrix_http_status'] ?? null;
            } else {
                $payload = null;
            }
        }

        if ($payload === null) {
            return response()->json([
                'minutes' => self::FALLBACK_MINUTES,
                'label' => (string) self::FALLBACK_MINUTES . ' mins',
                'distance_meters' => null,
                'distance_label' => null,
                'source' => 'fallback_api',
            ]);
        }

        $distanceMeters = isset($payload['distance_meters']) && is_numeric($payload['distance_meters'])
            ? (int) $payload['distance_meters']
            : null;

        $body = [
            'minutes' => $payload['minutes'],
            'label' => $payload['minutes'] . ' mins',
            'distance_meters' => $distanceMeters,
            'distance_label' => $this->formatDistanceLabel($distanceMeters),
            'source' => 'google_route_matrix',
        ];

        if ($exposeMatrix) {
            $body['route_matrix_response'] = $routeMatrixParsed;
            $body['route_matrix_response_raw'] = $routeMatrixRawBody;
            $body['route_matrix_http_status'] = $routeMatrixHttpStatus;
            if ($routeMatrixParsed === null && $routeMatrixRawBody === null) {
                $body['route_matrix_debug_note'] = 'Served from cache; trigger a fresh Routes API call (wait for cache expiry or change coords) to see full payload here.';
            }
        }

        return response()->json($body);
    }

    private function sessionCoord(string $key): ?float
    {
        $v = session($key);
        if ($v === null || $v === '') {
            return null;
        }
        if (is_array($v)) {
            return null;
        }
        if (is_numeric($v)) {
            $f = (float) $v;

            return is_finite($f) ? $f : null;
        }

        return null;
    }

    /**
     * Google Routes API — Compute Route Matrix (REST).
     *
     * @return array{minutes: int, route_matrix_parsed?: array|null, route_matrix_raw_body?: string|null, route_matrix_http_status?: int}|null
     */
    private function fetchRouteMatrixMinutes(float $originLat, float $originLng, float $destLat, float $destLng, string $apiKey): ?array
    {
        $preferences = ['TRAFFIC_AWARE', 'TRAFFIC_UNAWARE', null];
        foreach ($preferences as $pref) {
            $parsed = $this->postRouteMatrixOnce($originLat, $originLng, $destLat, $destLng, $apiKey, $pref);
            if (is_array($parsed)) {
                return $parsed;
            }
        }

        return null;
    }

    /**
     * @param  ?string  $routingPreference  TRAFFIC_AWARE, TRAFFIC_UNAWARE, or null to omit
     * @return array{minutes: int, route_matrix_parsed?: array|null, route_matrix_raw_body?: string|null, route_matrix_http_status?: int}|null
     */
    private function postRouteMatrixOnce(float $originLat, float $originLng, float $destLat, float $destLng, string $apiKey, ?string $routingPreference): ?array
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
        ];
        if ($routingPreference !== null && $routingPreference !== '') {
            $body['routingPreference'] = $routingPreference;
        }

        try {
            $response = Http::timeout(12)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'X-Goog-Api-Key' => $apiKey,
                    'X-Goog-FieldMask' => 'originIndex,destinationIndex,duration,distanceMeters,status,condition',
                ])
                ->post($url, $body);

            $httpStatus = $response->status();
            $rawBody = $response->body();

            if (! $response->ok()) {
                Log::warning('Route Matrix HTTP error', [
                    'status' => $httpStatus,
                    'routingPreference' => $routingPreference,
                    'body' => $rawBody,
                ]);

                return null;
            }

            $rows = $response->json();
            if (! is_array($rows)) {
                Log::warning('Route Matrix invalid JSON', ['routingPreference' => $routingPreference]);

                return null;
            }
            if (isset($rows['error'])) {
                Log::warning('Route Matrix API error', ['error' => $rows['error'], 'routingPreference' => $routingPreference]);

                return null;
            }
            if ($rows === []) {
                Log::warning('Route Matrix empty response', ['routingPreference' => $routingPreference]);

                return null;
            }

            $element = $rows[0];
            if (! is_array($element)) {
                return null;
            }

            if (($element['condition'] ?? '') !== 'ROUTE_EXISTS') {
                Log::info('Route Matrix route missing — will retry if other routing modes available', [
                    'routingPreference' => $routingPreference,
                    'element' => $element,
                ]);

                return null;
            }

            $durationRaw = $element['duration'] ?? '';
            $seconds = $this->parseRouteMatrixDurationSeconds($durationRaw);
            if ($seconds === null || $seconds <= 0) {
                Log::warning('Route Matrix duration parse failed', ['duration' => $durationRaw, 'routingPreference' => $routingPreference]);

                return null;
            }

            $minutes = max(1, (int) ceil($seconds / 60)) + self::PACKAGING_BUFFER_MINUTES;
            $distanceMeters = isset($element['distanceMeters']) && is_numeric($element['distanceMeters'])
                ? (int) round($element['distanceMeters'])
                : null;

            return [
                'minutes' => $minutes,
                'distance_meters' => $distanceMeters,
                'route_matrix_parsed' => $rows,
                'route_matrix_raw_body' => $rawBody,
                'route_matrix_http_status' => $httpStatus,
            ];
        } catch (\Throwable $e) {
            Log::error('Route Matrix exception', ['message' => $e->getMessage(), 'routingPreference' => $routingPreference]);

            return null;
        }
    }

    /**
     * @param  mixed  $durationRaw
     */
    private function parseRouteMatrixDurationSeconds($durationRaw): ?int
    {
        if (is_string($durationRaw) && preg_match('/^(\d+)s$/', $durationRaw, $m)) {
            return (int) $m[1];
        }
        if (is_numeric($durationRaw)) {
            return (int) $durationRaw;
        }
        if (is_array($durationRaw)) {
            if (isset($durationRaw['seconds']) && is_numeric($durationRaw['seconds'])) {
                return (int) $durationRaw['seconds'];
            }
        }

        return null;
    }

    private function formatDistanceLabel(?int $distanceMeters): ?string
    {
        if ($distanceMeters === null || $distanceMeters < 0) {
            return null;
        }

        if ($distanceMeters < 1000) {
            return $distanceMeters . ' mtrs away';
        }

        $km = round($distanceMeters / 1000, 1);
        return $km . ' km away';
    }
}
