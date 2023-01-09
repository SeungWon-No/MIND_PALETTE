<?php

namespace App\Http\Controllers\Mobile\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Cookie;

class WithdrawalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view("mobile/mypage/withdrawal");
    }

    public function withdrawalPrc(Request $request){
        $memberPK = $request->session()->get('login')[0]["memberPK"];
        Member::withdrawal($memberPK);

        $request->session()->pull('login','');
        Cookie::queue(Cookie::forget('AKTV'));

        return redirect('/')->with('toast', '정상적으로 탈퇴 처리 되었습니다.');
    }
}
