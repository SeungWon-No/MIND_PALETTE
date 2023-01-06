<?php

namespace App\Http\Controllers\Mobile\Join;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Login\LoginController;
use App\Models\Member;
use App\Models\MemberAgree;
use App\Models\MemberAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JoinController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('login')) {
            return redirect('/')->with('error', '로그인 상태입니다.');
        }
        return view("/mobile/join/agree");
    }
    public function createMember(Request $request)
    {
        if ($request->session()->has('login')) {
            return redirect('/')->with('error', '로그인 상태입니다.');
        }

        try {
            $userName = $request->userName ?? '';
            $userPhone = $request->userPhone ?? '';
            $DI = $request->DI ?? '';
            $CI = $request->CI ?? '';

            Crypt::decryptString($userName);
            Crypt::decryptString($userPhone);
            Crypt::decryptString($DI);
            Crypt::decryptString($CI);

            return view("/mobile/join/create",[
                "userName" => $userName,
                "userPhone" => $userPhone,
                "DI" => $DI,
                "CI" => $CI,
            ]);
        } catch (\Exception $e) {
            return redirect('/')->with('error', '본인 인증 정보가 없습니다.');
        }
    }


    public function store(Request $request)
    {
        try{

            $userName = $request->userName ?? '';
            $userPhone = $request->userPhone ?? '';
            $DI = $request->DI ?? '';
            $CI = $request->CI ?? '';

            Crypt::decryptString($userName);
            Crypt::decryptString($userPhone);
            $DI = Crypt::decryptString($DI);
            $CI = Crypt::decryptString($CI);

            DB::beginTransaction();
            $nowDate = date("Y-m-d H:i:s");

            $memberAgree = new MemberAgree;
            $memberAgree->agree1 = "Y";
            $memberAgree->agree2 = "Y";
            $memberAgree->updateDate = $nowDate;
            $memberAgree->createDate = $nowDate;
            $memberAgree->save();

            $agreePK = $memberAgree->mbAgreePK;

            $member = new Member;
            $member->email = $request["userEmail"] ?? '';
            $member->pw = Hash::make($request['userPassword']);
            $member->memberName = $userName;
            $member->phone = $userPhone;
            $member->mbAgreePK = $agreePK;
            $member->auth = 'Y';
            $member->lastLoginDate = $nowDate;
            $member->updateDate = $nowDate;
            $member->createDate = $nowDate;
            $member->save();

            $memberAuth = new MemberAuth;
            $memberAuth->memberPK = $member->memberPK;
            $memberAuth->memberCI = $CI;
            $memberAuth->memberDI = $DI;
            $memberAuth->createDate = $nowDate;
            $memberAuth->save();

            $request->redirectUrl = "/join/completion";
            DB::commit();
            return LoginController::login($request,Member::findMemberInfo($member->memberPK));
        } catch(\Exception $e){
            DB::rollback();
        }
    }

    public function show(){
        return view("/mobile/join/completion");
    }
}
