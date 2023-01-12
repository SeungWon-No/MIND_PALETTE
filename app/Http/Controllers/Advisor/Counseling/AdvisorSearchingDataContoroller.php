<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Counseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AdvisorSearchingDataContoroller extends Controller
{
    public function __invoke(Request $request)
    {
        $selectBoxCategory = $request['selectBoxCategory'];
        $searchingText = $request['searchingText'];
        $sdate = $request['sdate'];
        $edate = $request['edate'];

        if ($selectBoxCategory == 'counselorName') { // 이름 검색
            $searchingResult = Counseling::searchingCounselorName($searchingText, $sdate, $edate);

        }else{ // 상담코드 검색
            $searchingResult = Counseling::searchingCounselorCode($searchingText, $sdate, $edate);
        }
        
        return view("/advisor/counseling/counselingList", [
            'searchingResult' => $searchingResult,
        ]);
        
    }

}