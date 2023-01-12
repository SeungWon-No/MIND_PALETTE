<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Counseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AdvisorSearchingDataContoroller extends Controller
{
    public function __invoke(Request $request)
    {
        //dd($request);
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

        if ($selectBoxCategory == 'counselorName') { // 이름 검색
            $counselingList = Counseling::searchingCounselorName($searchingText, $sdate, $edate);

        }else{ // 상담코드 검색
            $counselingList = Counseling::searchingCounselorCode($searchingText, $sdate, $edate);
        }
        //dd($counselingList);

        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/counseling/".$previousPage, [
            'isLogin' => $isLogin,
            'counselingList' => $counselingList,
            'advisorProfile' => $advisorProfile,
        ]);
        
    }

}