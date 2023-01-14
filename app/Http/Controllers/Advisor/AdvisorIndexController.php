<?php

namespace App\Http\Controllers\Advisor;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Counseling;
use Illuminate\Http\Request;

class AdvisorIndexController extends Controller
{
    protected $counseling;
    protected $advisor;

    public function __construct(Counseling $counseling, Advisor $advisor)
    {
        $this->counseling = $counseling;
        $this->advisor = $advisor;
    }

    public function __invoke(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        
        $waitingCount = $this->counseling->getWaitingCounselingCount();
        $completeCount = $this->counseling->getCompleteCounselingCount();
        $cautionCount = $this->counseling->getCautionCounselingCount();
        $dangerCount = $this->counseling->getDangerCounselingCount();
        $impossibleCount = $this->counseling->getImpossibleCounselingCount();
        $counselingList = $this->counseling->pagination(); // 전체 상담 리스트
        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필
        $advisorList = $this->advisor->pagination(); // 상담사 리스트

        return view("/advisor/main",[   // 상담사 메인 페이지 
            "isLogin" => $isLogin,
            "waitingCount" => $waitingCount,
            "completeCount" => $completeCount,
            "cautionCount" => $cautionCount,
            "dangerCount" => $dangerCount,
            "impossibleCount" => $impossibleCount,
            "counselingList" => $counselingList,
            "advisorProfile" => $advisorProfile,
            "advisorList" => $advisorList,
        ]);
    }

    public function waitingCounseling(Request $request){
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $waitingCount = $this->counseling->getWaitingCounselingCount();
        $completeCount = $this->counseling->getCompleteCounselingCount();
        $cautionCount = $this->counseling->getCautionCounselingCount();
        $dangerCount = $this->counseling->getDangerCounselingCount();
        $impossibleCount = $this->counseling->getImpossibleCounselingCount();
        $advisorList = $this->advisor->pagination();
        $waitingCounselingList = $this->counseling->getWaitingCounselingList();

        return view("/advisor/main",[
            'advisorList' => $advisorList,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $waitingCounselingList,
            'waitingCount' => $waitingCount,
            'completeCount' => $completeCount,
            'cautionCount' => $cautionCount,
            'dangerCount' => $dangerCount,
            'impossibleCount' => $impossibleCount,
        ]);
        
    }
    public function completeCounseling(Request $request){
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $waitingCount = $this->counseling->getWaitingCounselingCount();
        $completeCount = $this->counseling->getCompleteCounselingCount();
        $cautionCount = $this->counseling->getCautionCounselingCount();
        $dangerCount = $this->counseling->getDangerCounselingCount();
        $impossibleCount = $this->counseling->getImpossibleCounselingCount();
        $advisorList = $this->advisor->pagination();
        $completeCounselingList = $this->counseling->getCompleteCounselingList();

        return view("/advisor/main",[
            'advisorList' => $advisorList,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $completeCounselingList,
            'waitingCount' => $waitingCount,
            'completeCount' => $completeCount,
            'cautionCount' => $cautionCount,
            'dangerCount' => $dangerCount,
            'impossibleCount' => $impossibleCount,
        ]);


    }
    public function warningCounseling(Request $request){

        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필
        $waitingCount = $this->counseling->getWaitingCounselingCount();
        $completeCount = $this->counseling->getCompleteCounselingCount();
        $cautionCount = $this->counseling->getCautionCounselingCount();
        $dangerCount = $this->counseling->getDangerCounselingCount();
        $impossibleCount = $this->counseling->getImpossibleCounselingCount();
        $warningList = $this->counseling->getWarningCounselingList();
        $advisorList = $this->advisor->pagination(); // 상담사 리스트

        return view("/advisor/main",[
            'advisorList' => $advisorList,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $warningList,
            'waitingCount' => $waitingCount,
            'completeCount' => $completeCount,
            'cautionCount' => $cautionCount,
            'dangerCount' => $dangerCount,
            'impossibleCount' => $impossibleCount,
        ]);
    }
    public function impossibleCounseling(Request $request){

        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        
        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $waitingCount = $this->counseling->getWaitingCounselingCount();
        $completeCount = $this->counseling->getCompleteCounselingCount();
        $cautionCount = $this->counseling->getCautionCounselingCount();
        $dangerCount = $this->counseling->getDangerCounselingCount();
        $impossibleCount = $this->counseling->getImpossibleCounselingCount();
        $advisorList = $this->advisor->pagination();
        $impossibleList = $this->counseling->getImpossibleCounselingList();

        return view("/advisor/main",[
            'advisorList' => $advisorList,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $impossibleList,
            'waitingCount' => $waitingCount,
            'completeCount' => $completeCount,
            'cautionCount' => $cautionCount,
            'dangerCount' => $dangerCount,
            'impossibleCount' => $impossibleCount,
        ]);

    }

}
