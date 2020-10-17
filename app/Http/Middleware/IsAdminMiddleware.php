<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{

    public function handle($request, Closure $next)
    {
        if (Auth::check()){
            if (Auth::User()->isAdmin()) {
                return $next($request);
            }else{
                return redirect(route('home'));

            }
        }else{
            return redirect(route('home'));

        }



    }
}
