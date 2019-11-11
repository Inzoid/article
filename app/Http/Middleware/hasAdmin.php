<?php

namespace App\Http\Middleware;
use Sentinel;
use Closure;

class hasAdmin
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
        if(Sentinel::getUser()->roles()->first()->slug == 'admin') {
            return $next($request);
        }
            return redirect()->route('index');
    }
}
