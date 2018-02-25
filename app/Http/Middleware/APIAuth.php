<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class APIAuth {

    protected $except = [
        'API/users/create',
        'API/users/login',
        'API/users/logout',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        
        $uri = ltrim($request->url(), $request->getSchemeAndHttpHost().$request->getBaseUrl());

        if (!in_array($uri, $this->except)) {

            if (Auth::guard('api')->guest()) {
                return response('Unauthorized.', 401);
            }
        }

        return $next($request);
    }

}
