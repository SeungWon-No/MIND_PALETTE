<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Counseling;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $isLogin = $request->session()->has('login');
        $counselingCount = 0;
        $counselingRow = null;

        if ($isLogin) {
            $memberPK = $request->session()->get('login')[0]["memberPK"];
            $counselingRow = Counseling::findAllCounseling($memberPK);
        }

        return view("/mobile/index",[
            "isLogin" => $isLogin,
            "counselingCount" => $counselingCount,
            "counselingRow" => $counselingRow,
        ]);
    }
}
