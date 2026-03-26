<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ForcePublicUrl
{
    /**
     * Match generated asset/URL helpers to the request's public host (Railway, etc.).
     * Runs after TrustProxies so X-Forwarded-* headers apply.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->getHttpHost()) {
            URL::forceRootUrl($request->getSchemeAndHttpHost());
            if ($request->isSecure()) {
                URL::forceScheme('https');
            }
        }

        return $next($request);
    }
}
