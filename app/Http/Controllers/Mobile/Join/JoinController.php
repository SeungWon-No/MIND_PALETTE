<?php

namespace App\Http\Controllers\Mobile\Join;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Login\LoginController;
use App\Models\Member;
use App\Models\MemberAgree;
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
    public function create(Request $request)
    {
        if ($request->session()->has('login')) {
            return redirect('/')->with('error', '로그인 상태입니다.');
        }
        return view("/mobile/join/create");
    }

    public function store(Request $request)
    {
        try{
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
            $member->memberName = Crypt::encryptString($request['userName']) ?? '';
            $member->phone = Crypt::encryptString($request['userPhone']) ?? '';
            $member->mbAgreePK = $agreePK;
            $member->auth = 'N';
            $member->lastLoginDate = $nowDate;
            $member->updateDate = $nowDate;
            $member->createDate = $nowDate;
            $member->save();

            $request->redirectUrl = "/join/completion";
            DB::commit();
            return LoginController::login($request,Member::findMemberInfo($member->memberPK));
        } catch(Exception $e){
            DB::rollback();
        }
    }

    public function show(){
        return view("/mobile/join/completion");
    }
}
