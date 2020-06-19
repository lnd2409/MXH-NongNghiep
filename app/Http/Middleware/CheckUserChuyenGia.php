<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckUserChuyenGia
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
        if (Auth::guard('chuyengia')->check()) {
            # code...
            return $next($request);
        }
        else
        {
            return redirect()->route('login-chuyen-gia');
        }
    }
}
