<?php

namespace App\Http\Controllers\Mobile\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Counseling;
use Illuminate\Http\Request;

class PayListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $memberPK = $request->session()->get('login')[0]["memberPK"];
        return view("/mobile/mypage/payList",[
            "counseling" => Counseling::findCounseling($memberPK)
        ]);
    }
}
