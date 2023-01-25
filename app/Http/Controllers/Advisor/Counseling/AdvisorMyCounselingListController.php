<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Code;
use App\Models\Counseling;
use Illuminate\Http\Request;

class AdvisorMyCounselingListController extends Controller
{
    protected $counseling;
    protected $advisor;
    protected $code;
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

    public function __construct(Counseling $counseling, Advisor $advisor, Code $code)
    {
        $this->counseling = $counseling;
        $this->advisor = $advisor;
        $this->code = $code;
    }

    public function index(Request $request)
    {
        
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        $counselingList = Counseling::getMyCounselingList($advisorPK); // 나의 상담 리스트
        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/counseling/myCounselingList",[   // 상담사 메인 페이지 
            "isLogin" => $isLogin,
            "counselingList" => $counselingList,
            "advisorProfile" => $advisorProfile,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
            "searchMonth" => $this->code->searchMonth(),
        ]);
    }

    public function store(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $previousUrl = url()->previous();
        $sliceUrl = explode('/', $previousUrl);
        $previousPage = $sliceUrl[4];

        $selectBoxCategory = $request['selectBoxCategory'];
        $searchingText = $request['searchingText'];
        $sdate = $request['sdate'];
        $edate = $request['edate'];

        $searchData = [
            "sdate" => $sdate,
            "edate" => $edate,
            "selectBoxCategory" => $selectBoxCategory,
            "searchingText" => $searchingText
        ];

        $counselingList = Counseling::searchingMyCounselor(15, $searchData, $advisorPK);

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/counseling/".$previousPage, [
            'isLogin' => $isLogin,
            'searchData' => $searchData,
            'counselingList' => $counselingList,
            'advisorProfile' => $advisorProfile,
            'searchMonth' => $this->code->searchMonth(),
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
        ]);
    }

    public function myWaitingCounseling(Request $request){
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $waitingCounselingList = $this->counseling->getMyWaitingCounselingList($advisorPK);

        return view("/advisor/counseling/myCounselingList",[
            "isLogin" => $isLogin,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $waitingCounselingList,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
            "searchMonth" => $this->code->searchMonth(),
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
        $completeCounselingList = $this->counseling->getMyCompleteCounselingList($advisorPK);

        return view("/advisor/counseling/myCounselingList",[
            'advisorProfile' => $advisorProfile,
            'counselingList' => $completeCounselingList,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
            "searchMonth" => $this->code->searchMonth(),
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
        $warningList = $this->counseling->getMyWarningCounselingList($advisorPK);

        return view("/advisor/counseling/myCounselingList",[
            'advisorProfile' => $advisorProfile,
            'counselingList' => $warningList,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
            "searchMonth" => $this->code->searchMonth(),
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
        $impossibleList = $this->counseling->getMyImpossibleCounselingList($advisorPK);

        return view("/advisor/counseling/myCounselingList",[
            'advisorProfile' => $advisorProfile,
            'counselingList' => $impossibleList,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
            "searchMonth" => $this->code->searchMonth(),
        ]);

    }

}