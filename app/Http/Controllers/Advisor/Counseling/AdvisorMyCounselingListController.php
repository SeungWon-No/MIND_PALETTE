<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Counseling;
use Illuminate\Http\Request;

class AdvisorMyCounselingListController extends Controller
{
    protected $counseling;
    protected $advisor;
    protected $statusCode = [
        "" => "",
        "279" => "",
        "280" => "ongoing",
        "281" => "end",
        "354" => "",
        "353" => "disabled",
        "355" => "end danger",
        "356" => "end need-care",
    ];

    public function __construct(Counseling $counseling, Advisor $advisor)
    {
        $this->counseling = $counseling;
        $this->advisor = $advisor;
    }

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
            "statusCode" => $this->statusCode,
        ]);
    }

    public function store(Request $request)
    {
        
    }

    public function myWaitingCounseling(Request $request){
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $waitingCounselingList = $this->counseling->getWaitingCounselingList();

        return view("/advisor/counseling/myCounselingList",[
            "isLogin" => $isLogin,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $waitingCounselingList,
            'statusCode'=>$this->statusCode,
        ]);
        
    }
    public function myCompleteCounseling(Request $request){
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $completeCounselingList = $this->counseling->getCompleteCounselingList();

        return view("/advisor/counseling/myCounselingList",[
            'advisorProfile' => $advisorProfile,
            'counselingList' => $completeCounselingList,
            'statusCode'=>$this->statusCode,
        ]);


    }
    public function myWarningCounseling(Request $request){

        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필
        $warningList = $this->counseling->getWarningCounselingList();

        return view("/advisor/counseling/myCounselingList",[
            'advisorProfile' => $advisorProfile,
            'counselingList' => $warningList,
            'statusCode'=>$this->statusCode,
        ]);
    }
    public function myImpossibleCounseling(Request $request){

        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        
        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $impossibleList = $this->counseling->getImpossibleCounselingList();

        return view("/advisor/counseling/myCounselingList",[
            'advisorProfile' => $advisorProfile,
            'counselingList' => $impossibleList,
            'statusCode'=>$this->statusCode,
        ]);

    }

}