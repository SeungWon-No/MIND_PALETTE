<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Advisor\Login\AdvisorLoginController;
use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Member;
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

            $memberAgree = new MemberAgree;
            $memberAgree->agree1 = "Y";
            $memberAgree->updateDate = $nowDate;
            $memberAgree->createDate = $nowDate;
            $memberAgree->save();

            $member = new Advisor();
            $member->email = $request["userEmail"] ?? '';
            $member->password = Hash::make($request['userPassword']);
            $member->advisorName = Crypt::encryptString($request['userName']) ?? '';
            $member->phone = Crypt::encryptString($request['userPhoneNumber']) ?? '';
            $member->mbAgreePK = $memberAgree->mbAgreePK;
            //$member->auth = 'N';
            $member->advisorStatus = '1';
            $member->lastLoginDate = $nowDate;
            $member->updateDate = $nowDate;
            $member->createDate = $nowDate;

            $member->save();


            $request->redirectUrl = "/advisor/consultationInformation";
            DB::commit();
            return AdvisorLoginController::login($request,Advisor::find($member->advisorPK));
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
