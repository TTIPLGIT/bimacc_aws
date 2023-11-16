<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if(Auth::user()->hasRole('centre')){

                return redirect()->route('centres');
            }
            else if(Auth::user()->hasRole('claiment')){

                return redirect()->route('claiments');
            }
            return redirect()->route('centres');
        }

        return $next($request);
    }
}
