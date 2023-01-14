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
    protected $counselingStatus = [
        ''=>'',
        "279" => '',
        "280" => 'ongoing',
        "281" => 'end',
        "353" => 'disabled',
    ];

    protected $counselorStatus = [
        ''=>'',
        "354" => 'default',
        "355" => 'danger',
        "356" => 'need-care',
    ];

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
        $myCompleteCount = $this->counseling->getMyCompleteCounselingCount($advisorPK);
        $counselingList = $this->counseling->pagination(); // 전체 상담 리스트
        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필
        $advisorList = $this->advisor->pagination(3); // 상담사 리스트

        return view("/advisor/main",[   // 상담사 메인 페이지 
            "isLogin" => $isLogin,
            "waitingCount" => $waitingCount,
            "completeCount" => $completeCount,
            "cautionCount" => $cautionCount,
            "dangerCount" => $dangerCount,
            "impossibleCount" => $impossibleCount,
            "myCompleteCount" => $myCompleteCount,
            "counselingList" => $counselingList,
            "advisorProfile" => $advisorProfile,
            "advisorList" => $advisorList,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
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
        $advisorList = $this->advisor->pagination(3);
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
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
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
        $advisorList = $this->advisor->pagination(3);
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
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
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
        $advisorList = $this->advisor->pagination(3); // 상담사 리스트

        return view("/advisor/main",[
            'advisorList' => $advisorList,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $warningList,
            'waitingCount' => $waitingCount,
            'completeCount' => $completeCount,
            'cautionCount' => $cautionCount,
            'dangerCount' => $dangerCount,
            'impossibleCount' => $impossibleCount,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
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
        $advisorList = $this->advisor->pagination(3);
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
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
        ]);

    }

    public function advisorList(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $advisorList = $this->advisor->pagination(9);
        $myCompleteCount = $this->counseling->getMyCompleteCounselingCount($advisorPK);

        return view("/advisor/advisorList", [
            'advisorList' => $advisorList,
            'advisorProfile' => $advisorProfile,
            'myCompleteCount' => $myCompleteCount,
        ]);

    }

}
