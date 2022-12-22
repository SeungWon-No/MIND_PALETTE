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
        $email = $request["userEmail"] ?? "";
        $password = $request["userPassword"] ?? "";

        if ($email == "" || $password == ""){
            return view("/advisor/login/loginFail");
        }

        $advisor = Advisor::findUser($email, $password)->first();
        if ($advisor) {
            if (Hash::check($password, $advisor->password)) {
                $this->login($request,  Advisor::findAdvisorInfo($advisor->advisorPK));
                return "success";
            }
        }
        return view("/advisor/login/loginFail");

    }

    public static function login($request, $advisor): RedirectResponse
    {
        Advisor::updateLoginDate($advisor->advisorPK);

        $redirectUrl = (isset($request->redirectUrl)) ? $request->redirectUrl : "/";

        if ( $request->autoLogin == "true" ) {
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
