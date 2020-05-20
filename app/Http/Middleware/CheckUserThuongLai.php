<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserThuongLai
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
        if (Auth::guard('thuonglai')->check()) {
            # code...
            return $next($request);
        }
        else
        {
            return redirect()->route('login-user');
        }
    }
}
