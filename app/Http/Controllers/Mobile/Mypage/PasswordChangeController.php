<?php

namespace App\Http\Controllers\Mobile\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view("mobile/mypage/passwordChange");
    }

    public function passwordChangePrc(Request $request) {
        $originPassword = $request->originPassword ?? '';
        $changePassword = $request->changePassword ?? '';

        if ($originPassword == "" || $changePassword == "" ) {
            return redirect('/MyPage/passwordChange')->with("toast","필수 값이 없습니다.");
        }
        try {
            $memberPK = $request->session()->get('login')[0]["memberPK"];
            $member = Member::find($memberPK);

            if (!Hash::check($originPassword, $member->pw)) {
                return redirect('/MyPage/passwordChange')->with("toast","패스워드가 일치하지 않습니다.");
            }

            Member::updatePKPassword($memberPK,Hash::make($changePassword));

            return redirect('/mypage')->with("toast","비밀번호가 성공적으로 변경되었습니다.");
        }catch (\Exception $e) {

        }
    }
}
