<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Illuminate\Http\Request;

class LoginValid
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('login')) {
            return redirect('/login')->with('error', '로그인이 필요한 서비스입니다.');
        }
        return $next($request);
    }
}
