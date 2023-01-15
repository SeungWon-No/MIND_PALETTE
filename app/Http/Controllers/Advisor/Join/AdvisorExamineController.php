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
        $getAdvisorInfo = Advisor::getAdvisorProfile($advisorPK);
        dd($getAdvisorInfo);

        return view('/advisor/join/examine');
    }
}
