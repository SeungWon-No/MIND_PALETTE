<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Advisor\Login\AdvisorLoginController;
use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\AdvisorAuth;
use App\Models\Career;
use App\Models\EducationLevel;
use App\Models\Member;
use App\Models\MemberAgree;
use App\Models\MemberAuth;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdvisorJoinController extends Controller{
    public function index()
    {
        return view("/advisor/join/basicInformation");
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $ci = Crypt::decryptString($request['CI']) ?? '';
            $nowDate = date("Y-m-d H:i:s");

            $advisor = Advisor::findAuthAdvisor($ci);
            if ($advisor) {
                return redirect("/advisor/login")->with("error","이미 가입된 회원입니다.");
            }

            // 필수 약관 동의
            $memberAgree = new MemberAgree;
            $memberAgree->agree1 = "Y";
            $memberAgree->updateDate = $nowDate;
            $memberAgree->createDate = $nowDate;
            $memberAgree->save();

            // 상담사 개인정보
            $advisor = new Advisor();
            $advisor->email = $request["userEmail"] ?? '';
            $advisor->password = Hash::make($request['userPassword']);
            $advisor->advisorName = $request['userName'] ?? '';
            $advisor->phone = $request['userPhone'] ?? '';
            $di = Crypt::decryptString($request['DI']) ?? '';
            $advisor->mbAgreePK = $memberAgree->mbAgreePK;
            $advisor->isDelete = 'N';
            $advisor->advisorStatus = 360;
            $advisor->lastLoginDate = $nowDate;
            $advisor->updateDate = $nowDate;
            $advisor->createDate = $nowDate;
            $advisor->save();

            $advisorAuth = new AdvisorAuth();
            $advisorAuth->advisorPK = $advisor->advisorPK;
            $advisorAuth->advisorCI = $ci;
            $advisorAuth->advisorDI = $di;
            $advisorAuth->createDate = $nowDate;
            $advisorAuth->save();

            $request->redirectUrl = "/advisor/consultationInformation";
            DB::commit();

            return AdvisorLoginController::login($request,Advisor::find($advisor->advisorPK));

        } catch (\Exception $e) {
            return redirect("/advisor/login")->with("error","필수 입력값 누락입니다.");
        }
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

        $advisor = Advisor::findAuthAdvisor($CI);

        $result = [
            "status" => "success",
            "message" => "",
        ];

        if ($advisor) {
            $memberEmailArray = explode("@",$advisor->email);
            $memberEmailId = (strlen($memberEmailArray[0]) < 4) ? $memberEmailArray[0]."**" : $memberEmailArray[0];
            $memberEmailId = substr($memberEmailId,0,strlen($memberEmailArray[0])-2);
            $result["status"] = "fail";
            $result["email"] = $memberEmailId."**@".$memberEmailArray[1];
        }

        return json_encode($result);
    }

    public function show(Request $request)
    {

    }

    public function consultationInformation() {
        return view("/advisor/join/consultationInformation");
    }
}
?>
