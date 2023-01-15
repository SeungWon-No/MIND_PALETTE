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

        if ($email == "" || $password == "") {
            return view("/advisor/login/loginFail");
        }

        $advisor = Advisor::findUser($email, $password)->first();
        if ($advisor) { // 로그인 성공
            if (Hash::check($password, $advisor->password)) {
                $this->login($request, Advisor::findAdvisorInfo($advisor->advisorPK));
                return redirect("/advisor/");
            }
        }
        return redirect("/advisor/loginFail");
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
