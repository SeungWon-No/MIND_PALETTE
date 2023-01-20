<?php

namespace App\Http\Controllers\Advisor\Login;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

use Symfony\Component\HttpFoundation\RedirectResponse;

class AdvisorLoginController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('advisorLogin')) {
            return redirect('/advisor/')->with('error', '로그인 상태입니다.');
        }
        return view("/advisor/login/login");
    }

    public function store(Request $request)
    {
        $email = $request["userEmail"] ?? "";
        $password = $request["userPassword"] ?? "";

        if ($email == "" || $password == "") {  // 입력 정보 누락시
            return redirect("/advisor/loginFail");
        }

        $advisor = Advisor::findUser($email)->first();
        $passwordCheck = Hash::check($password, $advisor->password);      

        if ($advisor == null || $advisor->isDelete == 'Y' || $passwordCheck == false) { // 동일한 이메일이 없거나 탈퇴한 회원일 경우 login 실패처리
            return redirect("/advisor/loginFail");

        }else{  // 로그인 성공
            if ($passwordCheck) {
                $this->login($request, Advisor::findAdvisorInfo($advisor->advisorPK));
                return redirect("/advisor/");
            }
        }
        
    }

    public static function login($request, $advisor)
    {
        Advisor::updateLoginDate($advisor->advisorPK);

        $redirectUrl = (isset($request->redirectUrl)) ? $request->redirectUrl : "/advisor/";

        if ( $request->autoLogin == "true" ) {
            Cookie::queue(Cookie::forever('AD_AKTV', $advisor->advisorPK));
        }

        $loginData = [
            "advisorPK" => $advisor->advisorPK,
            "advisorEmail" => $advisor->email,
            "advisorName" => Crypt::decryptString($advisor->advisorName),
            "advisorStatus" => $advisor->advisorStatus
        ];
        $request->session()->push('advisorLogin', $loginData);
        return redirect($redirectUrl);
    }
}
