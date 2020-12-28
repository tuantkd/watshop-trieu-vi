<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogin
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
        if ((Auth::check() && Auth::user()->id_truy_cap == 1) || (Auth::check() && Auth::user()->id_truy_cap == 2)){
            return $next($request);
        }else{
            return redirect('dang-nhap');
        }
    }
}
