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

        $counselingList = $this->counseling->pagination(15); // 전체 상담 리스트
        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필

        return view("/advisor/counseling/counselingList",[   // 상담사 메인 페이지
            "isLogin" => $isLogin,
            "tag" => "counselingList",
            "searchMonth" => $this->code->searchMonth(),
            "counselingList" => $counselingList,
            "advisorProfile" => $advisorProfile,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
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

        $counselingList = Counseling::searchingCounselor(15, $searchData);

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/counseling/".$previousPage, [
            'isLogin' => $isLogin,
            "tag" => "counselingList",
            'searchData' => $searchData,
            'counselingList' => $counselingList,
            'advisorProfile' => $advisorProfile,
            'searchMonth' => $this->code->searchMonth(),
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
        ]);
    }

    public function waitingCounselingList(Request $request){
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $selectBoxCategory = $request['selectBoxCategory'] ?? '';
        $searchingText = $request['searchingText'] ?? '';
        $sdate = $request['sdate'] ?? '';
        $edate = $request['edate'] ?? '';

        $searchData = [
            "sdate" => $sdate,
            "edate" => $edate,
            "selectBoxCategory" => $selectBoxCategory,
            "searchingText" => $searchingText
        ];

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $waitingCounselingList = $this->counseling->getWaitingCounselingList($searchData);

        return view("/advisor/counseling/counselingList",[
            "isLogin" => $isLogin,
            "tag" => "waitingCounselingList",
            'searchData' => $searchData,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $waitingCounselingList,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
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

        $selectBoxCategory = $request['selectBoxCategory'] ?? '';
        $searchingText = $request['searchingText'] ?? '';
        $sdate = $request['sdate'] ?? '';
        $edate = $request['edate'] ?? '';

        $searchData = [
            "sdate" => $sdate,
            "edate" => $edate,
            "selectBoxCategory" => $selectBoxCategory,
            "searchingText" => $searchingText
        ];


        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $completeCounselingList = $this->counseling->getCompleteCounselingList($searchData);

        return view("/advisor/counseling/counselingList",[
            "tag" => "completeCounselingList",
            'searchData' => $searchData,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $completeCounselingList,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
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


        $selectBoxCategory = $request['selectBoxCategory'] ?? '';
        $searchingText = $request['searchingText'] ?? '';
        $sdate = $request['sdate'] ?? '';
        $edate = $request['edate'] ?? '';

        $searchData = [
            "sdate" => $sdate,
            "edate" => $edate,
            "selectBoxCategory" => $selectBoxCategory,
            "searchingText" => $searchingText
        ];

        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK); // 상담사 프로필
        $warningList = $this->counseling->getWarningCounselingList($searchData);

        return view("/advisor/counseling/counselingList",[
            "tag" => "warningCounselingList",
            'searchData' => $searchData,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $warningList,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
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

        $selectBoxCategory = $request['selectBoxCategory'] ?? '';
        $searchingText = $request['searchingText'] ?? '';
        $sdate = $request['sdate'] ?? '';
        $edate = $request['edate'] ?? '';

        $searchData = [
            "sdate" => $sdate,
            "edate" => $edate,
            "selectBoxCategory" => $selectBoxCategory,
            "searchingText" => $searchingText
        ];


        $advisorProfile = $this->advisor->getAdvisorProfile($advisorPK);
        $impossibleList = $this->counseling->getImpossibleCounselingList($searchData);

        return view("/advisor/counseling/counselingList",[
            "tag" => "impossibleCounselingList",
            'searchData' => $searchData,
            'advisorProfile' => $advisorProfile,
            'counselingList' => $impossibleList,
            "counselingStatus" => $this->counselingStatus,
            "counselorStatus" => $this->counselorStatus,
            'searchMonth' => $this->code->searchMonth(),
        ]);

    }

}
