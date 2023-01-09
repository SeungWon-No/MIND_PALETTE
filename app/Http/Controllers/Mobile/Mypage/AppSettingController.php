<?php

namespace App\Http\Controllers\Mobile\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MemberAgree;
use Illuminate\Http\Request;

class AppSettingController extends Controller
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
        return view("mobile/mypage/appSetting",[
            "noti" => Member::findNotiAgree($memberPK)
        ]);
    }

    public function changeAgree(Request $request) {
        if (!isset($request->agreePK)) return;

        MemberAgree::updateAgree1($request->agreePK,$request->isChecked);
    }
}
