<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use App\Models\Counseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdvisorIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        
        //$waitingCount = Counseling::getWaitingCounseling(); // 상담 대기 건수
        //$completeCount = Counseling::getCompleteCounseling();// 상담 완료 건수
        
        $counselingList = Counseling::getCounselingList(); // 전체 상담 리스트

        // 임의 값 지정
        $waitingCount = 999;
        $completeCount = 777;
        

        return view("/advisor/main",[   // 상담사 메인 페이지 
            "isLogin" => $isLogin,
            "waitingCount" => $waitingCount,
            "completeCount" => $completeCount,
            "counselingList" => $counselingList,
        ]);
    }


    // 마음 건강 지수 
    public function getMentalHealthScore(){
        // Todo : 계산식 모름
    }

    
    // 주의 / 위험 상태
    public function getWarningState(){

    }

    // Todo: 상담 불가 상태 추가 
    public function getImpossibleCounseling(){

    }

}
