<?php

namespace App\Http\Controllers\Mobile\Login;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
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

        if ( $request->autoLogin == "true" ) {
            // dd($request->autoLogin);
            Cookie::queue(Cookie::forever('AKTV', $member->memberPK));
        }

        $loginData = [
            "memberPK" => $member->memberPK,
            "memberEmail" => $member->email,
            "memberName" => Crypt::decryptString($member->memberName),
        ];
        $request->session()->push('login', $loginData);
        return redirect('/');
    }
}
