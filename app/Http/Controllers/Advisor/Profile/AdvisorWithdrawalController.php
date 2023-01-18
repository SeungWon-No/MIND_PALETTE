<?php

namespace App\Http\Controllers\Advisor\Profile;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\AdvisorAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

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

            $advisorName = $request->advisorName ?? '';
            $advisorEmail = $request->email ?? '';
            $advisorPassword = $request->advisorPassword ?? '';

            if($advisorName != '' && $advisorEmail != '' && $advisorPassword != ''){

                $getAdvisorInfo = Advisor::findAdvisorInfo($advisorPK);
                
                $contrastName = $getAdvisorInfo->advisorName ?? '';
                $contrastEmail = $getAdvisorInfo->email ?? '';
    
                if ($advisorName == Crypt::decryptString($contrastName) && $advisorEmail == $contrastEmail){
                    dd(1);
    
                }else{
                    dd(2);
                }
            }

        }

    }


    public function show(Request $request)
    {

    }

}
