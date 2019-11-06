<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Senitnel::guest()) {
            if ($request->ajax()) {
                return response('Unautorizhed', 401);
            } else {
                return redirect()->guest('login');
            }
        }
        return $next($request);
    }
}
