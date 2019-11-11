<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel, Session;

class RoleSentinelMiddleWare
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
        if (Sentinel::inrole('writer') && Sentinel::getUser()->hasAccess
        ([$request->route()->getName()])) {
            return $next($request);

        } elseif (Sentinel::getUser()->hasAccess('admin')) {
            return $next($request);
            
        } else {
            Session::flash('error', 'You dont have privilage');
            return redirect()->route('root');
        }
    }
}
