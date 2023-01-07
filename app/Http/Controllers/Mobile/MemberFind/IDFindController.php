<?php

namespace App\Http\Controllers\Mobile\MemberFind;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class IDFindController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view("/mobile/memberFind/idFind");
    }

    public function memberAuthFind(Request $request) {
        $CI = $request->CI ?? '';

        if ($CI == "") {
            $result = [
                "status" => "error",
                "message" => "인증 값이 존재하지 않습니다."
            ];
            return json_encode($result);
        }

        $CI = Crypt::decryptString($CI);

        $member = Member::findAuthUser($CI);

        $result = [
            "status" => "success",
            "message" => ""
        ];

        if ($member) {
            $memberEmailArray = explode("@",$member->email);
            $memberEmailId = (strlen($memberEmailArray[0]) < 4) ? $memberEmailArray[0]."**" : $memberEmailArray[0];
            $memberEmailId = substr($memberEmailId,0,strlen($memberEmailArray[0])-2);
            $result["status"] = "fail";
            $result["email"] = $memberEmailId."**@".$memberEmailArray[1];
        }

        return json_encode($result);
    }

    public function memberAuthCheck(Request $request) {
        $CI = $request->CI ?? '';
        $email = $request->email ?? '';

        if ($CI == "" || $email == "") {
            $result = [
                "status" => "error",
                "message" => "인증 값이 존재하지 않습니다."
            ];
            return json_encode($result);
        }

        $member = Member::findAuthUserEmail($CI,$email);
        $result = [
            "status" => "fail",
            "message" => ""
        ];

        if ($member) {
            $result["status"] = "success";
            $result["email"] = Hash::make($email);
        }

        return json_encode($result);
    }
}
