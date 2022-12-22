<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvisorIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $isLogin = $request->session()->has('login');
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('login')[0]["advisorPK"];
        }

        return view("/advisor/main",[
            "isLogin" => $isLogin,
        ]);
    }
}
