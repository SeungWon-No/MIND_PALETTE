<?php

namespace App\Http\Controllers\Mobile\Login;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\CounselingTemplate;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('advisorLogin')) {
            return redirect('/advisor/main')->with('error', '로그인 상태입니다.');
        }
        return view("/mobile/login/login");
    }

    public function store(Request $request): string
    {
        $email = urldecode($request["email"]) ?? "";
        $pw = urldecode($request["pw"]) ?? "";

        if ( $email == "" || $pw  == "" ) {
            return "이메일 또는 패스워드를 입력해주세요";
        }
        $member = Member::findUser($email,$pw)->first();
        if ($member) {
            if (Hash::check($pw, $member->pw)) {
                $this->login($request,  Member::findMemberInfo($member->memberPK));
                return "success";
            }
        }
        return "아이디/패스워드가 일치하지 않습니다.";

    }

    public static function login($request, $member): RedirectResponse
    {
        Member::updateLoginDate($member->memberPK);

        if ( Cookie::has('FREE_ADVICE') ) {
            $freeCode = Cookie::get('FREE_ADVICE');
            CounselingTemplate::updateCounselingTemplate($member->memberPK,$freeCode);
            Cookie::queue(Cookie::forget('FREE_ADVICE'));
        }

        $redirectUrl = (isset($request->redirectUrl)) ? $request->redirectUrl : "/";

        if ( $request->autoLogin == "true" ) {
            // dd($request->autoLogin);
            Cookie::queue(Cookie::forever('AD_AKTV', $member->memberPK));
        }

        $loginData = [
            "memberPK" => $member->memberPK,
            "memberEmail" => $member->email,
            "memberName" => Crypt::decryptString($member->memberName),
        ];
        $request->session()->push('login', $loginData);
        return redirect($redirectUrl);
    }
}
