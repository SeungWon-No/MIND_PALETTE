<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvisorIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        return view("/advisor/main",[   // 상담사 메인 페이지 
            "isLogin" => $isLogin,
        ]);
    }
}
