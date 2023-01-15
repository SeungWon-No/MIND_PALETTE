<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Illuminate\Http\Request;

class AdvisorLoginValid
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('advisorLogin')) {
            return redirect('/advisor/login')->with('error', '로그인이 필요한 서비스입니다.');
        }

        $advisorLoginData = $request->session()->get('advisorLogin')[0];
        if ($advisorLoginData["advisorStatus"] == 360 ) { //361
            return redirect('/advisor/consultationInformation')->with('error', '관리자 승인 이후 사용 가능한 메뉴입니다.');
        }
        if ($advisorLoginData["advisorStatus"] == 361 || $advisorLoginData["advisorStatus"] == 362 ) {
            return redirect('/advisor/examine')->with('error', '관리자 승인을 기다려주세요.');
        }

        return $next($request);
    }
}
