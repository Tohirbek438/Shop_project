<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            dd(1);
        }
        else{
            dd(0);
            // return redirect('/admin/login');
        }

    }
}
