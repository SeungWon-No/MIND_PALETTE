<?php

namespace App\Http\Controllers\Mobile\Mypage;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ChangePhoneController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $memberPK = $request->session()->get('login')[0]["memberPK"];
            $userName = $request->userName ?? '';
            $userPhone = $request->userPhone ?? '';
            $DI = $request->DI ?? '';
            $CI = $request->CI ?? '';

            Crypt::decryptString($userName);
            Crypt::decryptString($userPhone);
            Crypt::decryptString($DI);
            Crypt::decryptString($CI);

            Member::updatePKPhone($memberPK,$userPhone);

            return redirect('/mypage')->with("toast","전화번호가 성공적으로 변경되었습니다.");
        }catch (\Exception $e) {
            return redirect('/MyPage/changePhone')->with("toast","전화번호 변경에 실패하였습니다.");
        }

    }
}
