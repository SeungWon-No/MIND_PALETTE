<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Code;
use App\Models\Counseling;
use Illuminate\Http\Request;

class AdvisorSearchingDataContoroller extends Controller
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

    public function __invoke(Request $request)
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

        }else if($sdate == null && $edate == null && $selectBoxCategory == 'counselorCode'){ // 코드 전체 기간 검색
            $counselingList = $this->counseling->searchingCounselorCodeWithoutPeriod($searchingText);

        }else if ($sdate != null && $edate != null && $selectBoxCategory == 'counselorName') { // 이름 검색
            $counselingList = $this->counseling->searchingCounselorName($searchingText, $sdate, $edate);

        }else if($sdate != null && $edate != null && $selectBoxCategory == 'counselorCode'){  // 상담코드 검색
            $counselingList = $this->counseling->searchingCounselorCode($searchingText, $sdate, $edate);

        }else{
            return false;
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

}