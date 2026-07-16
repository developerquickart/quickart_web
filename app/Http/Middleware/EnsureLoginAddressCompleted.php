<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * After login via current location / map, force the user through add-address
 * before they can browse the rest of the site.
 */
class EnsureLoginAddressCompleted
{
    public function handle(Request $request, Closure $next)
    {
        $pending = $request->session()->get('qk_must_complete_address');
        if (empty($pending) || !is_array($pending)) {
            return $next($request);
        }

        // Allow the add-address form, save endpoint, location validation, and header ETA.
        if (
            $request->is('add-address')
            || $request->is('get-address')
            || $request->is('check-address-location-range')
            || $request->is('delivery-eta')
            || $request->is('cart-delivery-eta')
        ) {
            return $next($request);
        }

        // Allow logout / auth endpoints so the user is not trapped.
        if (
            $request->is('logout')
            || $request->is('loginotpsubmit')
            || $request->is('check-login-location-range')
        ) {
            return $next($request);
        }

        $lat = $pending['lat'] ?? null;
        $lng = $pending['lng'] ?? null;
        if (!is_numeric($lat) || !is_numeric($lng)) {
            $request->session()->forget('qk_must_complete_address');
            return $next($request);
        }

        $params = http_build_query([
            'addedFrom' => 'login',
            'tab' => '1',
            'prefill' => '1',
            'lat' => $lat,
            'lng' => $lng,
        ]);

        return redirect('/add-address?' . $params);
    }
}
