<?php

namespace App\Http\Middleware;

use Closure;
use Cookie;
use Illuminate\Http\Request;

class FreeAdviceVerify
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has("login") && !Cookie::has('FREE_ADVICE')) {
            return redirect('/')->with('error', '접근 권한이 없습니다.');
        }

        $path = $request->path();
        $advicePK = explode("/",$path);

        $counselingTemplate = \App\Models\CounselingTemplate::find($advicePK[1]);

        if (!$counselingTemplate) {
            return redirect('/')->with('error', '상담이 존재하지 않습니다.');
        }

        if ($request->session()->has("login") ) {
            if ( $counselingTemplate->memberPK != $request->session()->get('login')[0]['memberPK']) {
                return redirect('/')->with('error', '접근 권한이 없습니다.');
            }
        } else {
            if ( $counselingTemplate->tempCounselingCode != Cookie::get('FREE_ADVICE')) {
                return redirect('/')->with('error', '접근 권한이 없습니다.');
            }
        }

        if ( $counselingTemplate->counselingStatus == 300 ) {
            return redirect('/')->with('error', '완료된 상담 입니다.');
        }

        return $next($request);
    }
}
