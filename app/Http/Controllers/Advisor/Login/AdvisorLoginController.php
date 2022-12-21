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
        if ($request->session()->has('login')) {
            return redirect('/')->with('error', '로그인 상태입니다.');
        }
        return view("/advisor/login/login");
    }

    public function store(Request $request): string
    {
        $email = urldecode($request["email"]) ?? "";
        $pw = urldecode($request["pw"]) ?? "";

        if ( $email == "" || $pw  == "" ) {
            return "이메일 또는 패스워드를 입력해주세요";
        }
        $advisor = Advisor::findUser($email,$pw)->first();
        if ($advisor) {
            if (Hash::check($pw, $advisor->pw)) {
                $this->login($request,  Advisor::findadvisorInfo($advisor->advisorPK));
                return "success";
            }
        }
        return "아이디/패스워드가 일치하지 않습니다.";

    }

    public static function login($request, $advisor): RedirectResponse
    {
        Advisor::updateLoginDate($advisor->advisorPK);

        $redirectUrl = (isset($request->redirectUrl)) ? $request->redirectUrl : "/";

        if ( $request->autoLogin == "true" ) {
            // dd($request->autoLogin);
            Cookie::queue(Cookie::forever('AKTV', $advisor->advisorPK));
            
        }

        $loginData = [
            "advisorPK" => $advisor->advisorPK,
            "advisorEmail" => $advisor->email,
            "advisorName" => Crypt::decryptString($advisor->advisorName),
        ];
        $request->session()->push('login', $loginData);
        return redirect($redirectUrl);
    }
}
