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

    private const ROUTE_MATRIX_URL = 'https://routes.googleapis.com/distanceMatrix/v2:computeRouteMatrix';

    private const ROUTE_MATRIX_FIELD_MASK = 'originIndex,destinationIndex,duration,staticDuration,distanceMeters,status,condition';

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
                'eta_coords_used' => $this->etaCoordsPayload($storeLat, $storeLng, $userLat, $userLng),
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
                'eta_coords_used' => $this->etaCoordsPayload($storeLat, $storeLng, $userLat, $userLng),
            ]);
        }

        $cacheKey = 'delivery_eta_rm_v3_' . session('user_id') . '_' . md5(implode('|', [
            round((float) $storeLat, 5),
            round((float) $storeLng, 5),
            round((float) $userLat, 5),
            round((float) $userLng, 5),
        ]));

        $exposeMatrix = config('app.debug') || (bool) config('services.google.log_route_matrix_response');

        $payload = Cache::get($cacheKey);
        $routeMatrixParsed = null;
        $routeMatrixRawBody = null;
        $routeMatrixHttpStatus = null;
        $routeMatrixDebugAttempts = [];

        if (! is_array($payload)) {
            $fetchOutcome = $this->fetchRouteMatrixWithAttempts(
                (float) $storeLat,
                (float) $storeLng,
                (float) $userLat,
                (float) $userLng,
                $key
            );
            $routeMatrixDebugAttempts = $fetchOutcome['attempts'];

            if ($fetchOutcome['data'] !== null) {
                $fetched = $fetchOutcome['data'];
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
            $body = [
                'minutes' => self::FALLBACK_MINUTES,
                'label' => (string) self::FALLBACK_MINUTES . ' mins',
                'distance_meters' => null,
                'distance_label' => null,
                'source' => 'fallback_api',
                'eta_coords_used' => $this->etaCoordsPayload($storeLat, $storeLng, $userLat, $userLng),
                /** Full request JSON + previews (no API key) for browser console debugging */
                'route_matrix_debug' => [
                    'url' => self::ROUTE_MATRIX_URL,
                    'field_mask_header' => self::ROUTE_MATRIX_FIELD_MASK,
                    'note' => 'Map vs current location both use this same API; compare eta_coords_used and each attempt request_json.',
                    'attempts' => $routeMatrixDebugAttempts,
                ],
            ];

            return response()->json($body);
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

    /**
     * @return array{attempts: array, data: ?array}
     */
    private function fetchRouteMatrixWithAttempts(float $originLat, float $originLng, float $destLat, float $destLng, string $apiKey): array
    {
        $attempts = [];
        $preferences = ['TRAFFIC_AWARE', 'TRAFFIC_UNAWARE', null];

        foreach ($preferences as $pref) {
            [$data, $log] = $this->postRouteMatrixOnce($originLat, $originLng, $destLat, $destLng, $apiKey, $pref);
            $attempts[] = $log;
            if (is_array($data)) {
                return ['attempts' => $attempts, 'data' => $data];
            }
        }

        return ['attempts' => $attempts, 'data' => null];
    }

    private function etaCoordsPayload(?float $storeLat, ?float $storeLng, ?float $userLat, ?float $userLng): array
    {
        return [
            'origin_store' => [
                'latitude' => $storeLat,
                'longitude' => $storeLng,
                'role' => 'Routes API origins[0] (store → user delivery)',
            ],
            'destination_user' => [
                'latitude' => $userLat,
                'longitude' => $userLng,
                'role' => 'Routes API destinations[0]',
            ],
        ];
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
     * @return array{0: ?array, 1: array} [result or null, attempt log]
     */
    private function postRouteMatrixOnce(float $originLat, float $originLng, float $destLat, float $destLng, string $apiKey, ?string $routingPreference): array
    {
        $regionCode = config('services.google.routes_region_code');
        $regionCode = is_string($regionCode) && $regionCode !== '' ? $regionCode : null;

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
        if ($regionCode !== null) {
            $body['regionCode'] = $regionCode;
        }

        $attemptLog = [
            'routingPreference' => $routingPreference,
            'request_json' => $body,
            'field_mask' => self::ROUTE_MATRIX_FIELD_MASK,
        ];

        try {
            $response = Http::timeout(12)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'X-Goog-Api-Key' => $apiKey,
                    'X-Goog-FieldMask' => self::ROUTE_MATRIX_FIELD_MASK,
                ])
                ->post(self::ROUTE_MATRIX_URL, $body);

            $httpStatus = $response->status();
            $rawBody = $response->body();
            $attemptLog['http_status'] = $httpStatus;
            $attemptLog['response_body_preview'] = mb_substr($rawBody, 0, 2000);

            if (! $response->ok()) {
                $attemptLog['failure_reason'] = 'http_not_ok';
                Log::warning('Route Matrix HTTP error', [
                    'status' => $httpStatus,
                    'routingPreference' => $routingPreference,
                    'body' => mb_substr($rawBody, 0, 1500),
                ]);

                return [null, $attemptLog];
            }

            $rows = $response->json();
            if (! is_array($rows)) {
                $attemptLog['failure_reason'] = 'invalid_json';
                Log::warning('Route Matrix invalid JSON', ['routingPreference' => $routingPreference]);

                return [null, $attemptLog];
            }
            if (isset($rows['error'])) {
                $attemptLog['failure_reason'] = 'api_error_object';
                $attemptLog['error'] = $rows['error'];
                Log::warning('Route Matrix API error', ['error' => $rows['error'], 'routingPreference' => $routingPreference]);

                return [null, $attemptLog];
            }
            if ($rows === []) {
                $attemptLog['failure_reason'] = 'empty_array';
                Log::warning('Route Matrix empty response', ['routingPreference' => $routingPreference]);

                return [null, $attemptLog];
            }

            $element = $rows[0];
            if (! is_array($element)) {
                $attemptLog['failure_reason'] = 'first_element_not_array';

                return [null, $attemptLog];
            }

            $attemptLog['element_summary'] = [
                'condition' => $element['condition'] ?? null,
                'status' => $element['status'] ?? null,
                'distanceMeters' => $element['distanceMeters'] ?? null,
                'duration' => $element['duration'] ?? null,
                'staticDuration' => $element['staticDuration'] ?? null,
            ];

            if (($element['condition'] ?? '') !== 'ROUTE_EXISTS') {
                $attemptLog['failure_reason'] = 'condition_not_route_exists';
                Log::info('Route Matrix route missing — try next routing mode', [
                    'routingPreference' => $routingPreference,
                    'element' => $element,
                ]);

                return [null, $attemptLog];
            }

            $durationRaw = $element['duration'] ?? '';
            $seconds = $this->parseRouteMatrixDurationSeconds($durationRaw);
            if ($seconds === null || $seconds <= 0) {
                $seconds = $this->parseRouteMatrixDurationSeconds($element['staticDuration'] ?? '');
            }
            if ($seconds === null || $seconds <= 0) {
                $attemptLog['failure_reason'] = 'duration_parse_failed';
                $attemptLog['duration_raw'] = $durationRaw;
                $attemptLog['static_duration_raw'] = $element['staticDuration'] ?? null;
                Log::warning('Route Matrix duration parse failed', [
                    'duration' => $durationRaw,
                    'staticDuration' => $element['staticDuration'] ?? null,
                    'routingPreference' => $routingPreference,
                ]);

                return [null, $attemptLog];
            }

            $minutes = max(1, (int) ceil($seconds / 60)) + self::PACKAGING_BUFFER_MINUTES;
            $distanceMeters = isset($element['distanceMeters']) && is_numeric($element['distanceMeters'])
                ? (int) round($element['distanceMeters'])
                : null;

            unset($attemptLog['failure_reason']);

            return [
                [
                    'minutes' => $minutes,
                    'distance_meters' => $distanceMeters,
                    'route_matrix_parsed' => $rows,
                    'route_matrix_raw_body' => $rawBody,
                    'route_matrix_http_status' => $httpStatus,
                ],
                $attemptLog,
            ];
        } catch (\Throwable $e) {
            $attemptLog['failure_reason'] = 'exception';
            $attemptLog['exception_message'] = $e->getMessage();
            Log::error('Route Matrix exception', ['message' => $e->getMessage(), 'routingPreference' => $routingPreference]);

            return [null, $attemptLog];
        }
    }

    /**
     * Google duration strings can be integer or fractional seconds, e.g. "600s" or "3.5s".
     *
     * @param  mixed  $durationRaw
     */
    private function parseRouteMatrixDurationSeconds($durationRaw): ?int
    {
        if (is_string($durationRaw) && preg_match('/^(\d+(?:\.\d+)?)s$/', $durationRaw, $m)) {
            $sec = (float) $m[1];

            return max(1, (int) ceil($sec));
        }
        if (is_numeric($durationRaw)) {
            return max(1, (int) ceil((float) $durationRaw));
        }
        if (is_array($durationRaw)) {
            if (isset($durationRaw['seconds']) && is_numeric($durationRaw['seconds'])) {
                return max(1, (int) ceil((float) $durationRaw['seconds']));
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
