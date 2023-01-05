<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdviceVerify
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has("login") ) {
            return redirect('/')->with('error', '접근 권한이 없습니다.');
        }

        $path = $request->path();
        $advicePK = explode("/",$path);

        $counseling = \App\Models\Counseling::find($advicePK[1]);

        if (!$counseling) {
            return redirect('/')->with('error', '상담이 존재하지 않습니다.');
        }

        if ( $counseling->memberPK != $request->session()->get('login')[0]['memberPK']) {
            return redirect('/')->with('error', '접근 권한이 없습니다.');
        }


        $message = "";
        switch ($counseling->counselingStatus) {
            case 278 :
            case 279 :
            case 280 :
                $message = "상담 신청이 완료된 상담입니다.";
                break;
            case 281 :
                $message = "완료된 상담 입니다.";
                break;
        }

        if ($message != "") {
//            return redirect('/')->with('error', $message);
        }

        return $next($request);
    }
}
