<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    /*
    | Google Maps Platform — single key from GOOGLE_MAPS_SERVER_KEY (Routes API server-side + browser map on order details).
    */
    'google' => [
        'maps_server_key' => env('GOOGLE_MAPS_SERVER_KEY'),
        /** When true (or APP_DEBUG), /delivery-eta includes full Route Matrix JSON for browser console inspection */
        'log_route_matrix_response' => env('GOOGLE_LOG_ROUTE_MATRIX_RESPONSE', false),
        /** Passed to Routes API computeRouteMatrix (ccTLD), optional regional bias */
        'routes_region_code' => env('GOOGLE_ROUTES_REGION_CODE', 'AE'),
    ],

];
