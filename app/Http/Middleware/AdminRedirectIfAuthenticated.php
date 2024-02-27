<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard('admin')->check()){
            return redirect(RouteServiceProvider::HOME);
        }
        else{
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
