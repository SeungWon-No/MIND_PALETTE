<?php

namespace App\Http\Controllers\Mobile\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view("/mobile/login/login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $email = urldecode($request["email"]) ?? "";
        $pw = urldecode($request["pw"]) ?? "";

        if ( $email == "" || $pw  == "" ) {
            return "이메일 또는 패스워드를 입력해주세요";
        }
        $member = Member::findUser($email,$pw)->first();
        if ($member) {
            if (Hash::check($pw, $member->pw)) {
                $this->login($request,  Member::findMemberInfo($member->mbSrl));
                return "success";
            }
        }
        return "아이디/패스워드가 일치하지 않습니다.";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function login($request, $member) {
        $request->session()->pull('snsJoin','');
        $request->session()->pull('login','');

        Member::updateLoginDate($member->mbSrl);

        if ( $request->autoLogin == "true" ) {
            // dd($request->autoLogin);
            Cookie::queue(Cookie::forever('AKTV', $member->mbSrl));
        }

        $loginData = [
            "mbSrl" => $member->mbSrl,
            "rating" => $member->rating,
            "mbPhone" => $member->phone,
            "mbEmail" => $member->email,
            "mbName" => $member->mbName,
            "nickName" => $member->nickName,
            "auth" => $member->auth,
            "photo" => $member->photo,
            "addr" => $member->cpAddr1." ".$member->cpAddr2,
        ];
        $request->session()->push('login', $loginData);
        return redirect('/')->with('loginSuccess','success');
    }
}
