<?php

namespace App\Http\Controllers\Advisor\Profile;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdvisorWithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        return view("/advisor/profile/memberWithdrawal");

    }

    public function store(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        if($advisorPK){

            $advisorName = $request['advisorName'];
            $advisorEmail = $request['email'];
            $advisorPassword = $request['advisorPassword'];

            $getAdvisorInfo = Advisor::findAdvisorInfo($advisorPK);
            
            $contrastName = $getAdvisorInfo['advisorName'] ?? '';
            $contrastEmail = $getAdvisorInfo->email ?? '';
            $contrastPassword = $getAdvisorInfo['password'] ?? '';

            
            if($advisorPassword == Crypt::decryptString($contrastPassword)){
                dd(1);
            }else{
                dd(2);
            }

            if ($advisorName == Crypt::decryptString($contrastName) && 
                $advisorEmail == $contrastEmail && 
                $advisorPassword == $contrastPassword){
                dd(1);

            }else{
                dd(2);
            }
        }

        

    }


    public function show(Request $request)
    {

    }

}
