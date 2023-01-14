<?php

namespace App\Http\Controllers\Advisor\Inquiry;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Illuminate\Http\Request;

class AdvisorInquiryController extends Controller
{
    public function index(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        // 리스트 전체 가져오기
        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/inquiry/inquiry", [
            "advisorProfile" => $advisorProfile,
        ]);
    }

    public function store(Request $request)
    {
        
    }

    public function show(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        // 리스트 전체 가져오기
        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/inquiry/inquiryEdit", [
            "advisorProfile" => $advisorProfile,
        ]);
    }

}