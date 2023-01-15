<?php

namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Cookie;
use Illuminate\Http\Request;

class AdvisorExamineController extends Controller
{
    public function __invoke(Request $request)
    {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"]; // 132
        $getAdvisorInfo = Advisor::getAdvisorProfile($advisorPK); // 상담사 정보 

        return view('/advisor/join/examine', [
            'getAdvisorInfo' => $getAdvisorInfo
        ]);
    }
}
