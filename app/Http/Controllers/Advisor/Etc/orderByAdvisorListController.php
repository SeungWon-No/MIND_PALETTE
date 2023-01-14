<?php

namespace App\Http\Controllers\Advisor\Etc;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Counseling;
use Illuminate\Http\Request;

class orderByAdvisorListController extends Controller
{ 
    public function __invoke(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $url = $request->fullUrl();
        $getParameter = explode('=', $url);

        if ($getParameter == ''){
            return view("/advisor/advisorList");
        }

        $orderByOption = $getParameter[1];
        if ($orderByOption == 'orderByRecent'){
            $advisorList = Advisor::advisorListOrderBy(9, 'DESC');
            $returnText = ['data'=>'최신순'];
        }else{
            $advisorList = Advisor::advisorListOrderBy(9, 'ASC');
            $returnText = ['data'=>'과거순'];
        }

        $advisorProfile = Advisor::getAdvisorProfile($advisorPK);
        $myCompleteCount = Counseling::getMyCompleteCounselingCount($advisorPK);

        return view('/advisor/advisorList',[
            'advisorList' => $advisorList,
            'advisorProfile' => $advisorProfile,
            'myCompleteCount' => $myCompleteCount,
            'returnText' => $returnText,
        ]);
    }
}
