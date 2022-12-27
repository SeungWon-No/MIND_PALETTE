<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Advisor\Login\AdvisorLoginController;
use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\MemberAgree;
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

            $nowDate = date("Y-m-d H:i:s");
            
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
            $advisor->advisorName = Crypt::encryptString($request['userName']) ?? '';
            $advisor->phone = Crypt::encryptString($request['userPhoneNumber']) ?? '';
            $advisor->mbAgreePK = $memberAgree->mbAgreePK;
            //$member->auth = 'N';
            $advisor->advisorStatus = '1';
            $advisor->lastLoginDate = $nowDate;
            $advisor->updateDate = $nowDate;
            $advisor->createDate = $nowDate;

            $advisor->save();


            $request->redirectUrl = "/advisor/consultationInformation";
            DB::commit();

            return AdvisorLoginController::login($request,Advisor::find($advisor->advisorPK));

        } catch (\Exception $e) {

        }


    }

    public function show(Request $request)
    {

    }

    public function consultationInformation() {
        return view("/advisor/join/consultationInformation");
    }
}
?>
