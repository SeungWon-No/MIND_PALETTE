<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Code;
use App\Models\Counseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvisorCounselingListController extends Controller
{
    protected $counseling;
    protected $advisor;
    protected $code;
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

        $counselingList = $this->counseling->pagination(); // 전체 상담 리스트
        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필

        return view("/advisor/counseling/counselingList",[   // 상담사 메인 페이지
            "isLogin" => $isLogin,
            "searchMonth" => $this->code->searchMonth(),
            "counselingList" => $counselingList,
            "advisorProfile" => $advisorProfile,
            "statusCode" => $this->statusCode,
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

        
        if($sdate == null && $edate == null && $selectBoxCategory == 'counselorName'){ // 이름 전체 기간 검색
            $counselingList = $this->counseling->searchingCounselorNameWithoutPeriod($searchingText);

        }else if($sdate == null && $edate == null && $selectBoxCategory == 'counselingCode'){ // 코드 전체 기간 검색
            $counselingList = $this->counseling->searchingCounselorCodeWithoutPeriod($searchingText);

        }else if ($sdate != null && $edate != null && $selectBoxCategory == 'counselorName') { // 이름 검색
            $counselingList = $this->counseling->searchingCounselorName($searchingText, $sdate, $edate);

        }else if($sdate != null && $edate != null && $selectBoxCategory == 'counselingCode'){  // 상담코드 검색
            $counselingList = $this->counseling->searchingCounselorCode($searchingText, $sdate, $edate);

        }else{
            return view("/advisor/counseling/counselingList");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/counseling/".$previousPage, [
            'isLogin' => $isLogin,
            'counselingList' => $counselingList,
            'advisorProfile' => $advisorProfile,
            'searchMonth' => $this->code->searchMonth(),
            'statusCode' => $this->statusCode,
        ]);
    }

    public function waitingCounselingList(Request $request){
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $waitingCounselingList = $this->counseling->getWaitingCounselingList();

        return view("/advisor/counseling/counselingList",[
            "isLogin" => $isLogin,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $waitingCounselingList,
            'statusCode'=>$this->statusCode,
            'searchMonth' => $this->code->searchMonth(),
        ]);

    }
    public function completeCounselingList(Request $request){
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $completeCounselingList = $this->counseling->getCompleteCounselingList();

        return view("/advisor/counseling/counselingList",[
            'advisorProfile' => $advisorProfile,
            'counselingList' => $completeCounselingList,
            'statusCode'=>$this->statusCode,
            'searchMonth' => $this->code->searchMonth(),
        ]);


    }
    public function warningCounselingList(Request $request){

        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필
        $warningList = $this->counseling->getWarningCounselingList();

        return view("/advisor/counseling/counselingList",[
            'advisorProfile' => $advisorProfile,
            'counselingList' => $warningList,
            'statusCode'=>$this->statusCode,
            'searchMonth' => $this->code->searchMonth(),
        ]);
    }
    public function impossibleCounselingList(Request $request){

        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $impossibleList = $this->counseling->getImpossibleCounselingList();

        return view("/advisor/counseling/counselingList",[
            'advisorProfile' => $advisorProfile,
            'counselingList' => $impossibleList,
            'statusCode'=>$this->statusCode,
            'searchMonth' => $this->code->searchMonth(),
        ]);

    }

}
