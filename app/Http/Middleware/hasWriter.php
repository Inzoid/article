<?php

namespace App\Http\Middleware;
use Sentinel;
use Closure;

class hasWriter
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
        if(Sentinel::getUser()->roles()->first()->slug == 'writer') {
            return $next($request);
        }
            return redirect()->route('login');
    }
}
