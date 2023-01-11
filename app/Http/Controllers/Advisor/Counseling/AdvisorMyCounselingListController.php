<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Counseling;
use Illuminate\Http\Request;

class AdvisorMyCounselingListController extends Controller
{
    public function index(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        //$counselingList = Counseling::getMyCounselingList($advisorPK); // 나의 상담 리스트
        $counselingList = Counseling::pagination(); // 전체 상담 리스트
        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/counseling/myCounselingList",[   // 상담사 메인 페이지 
            "isLogin" => $isLogin,
            "counselingList" => $counselingList,
            "advisorProfile" => $advisorProfile,
        ]);
    }

    public function store(Request $request)
    {
        
    }

    public function show(Request $request)
    {
        
    }

}