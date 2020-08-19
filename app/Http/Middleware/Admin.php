<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // @TODO implement
        if (!Auth::check()) {
            # code...
            return redirect()->route('login');
        }

        if (Auth::user()->is_admin == 1) {
            # code...
            return $next($request);
        }

        if (Auth::user()->is_admin == 0) {
            # code...
            return  redirect()->route('user');
        }
       
    }
}
