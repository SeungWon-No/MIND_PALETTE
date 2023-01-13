<?php

namespace App\Http\Controllers\Advisor\Profile;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\EducationLevel;
use App\Models\Qualification;
use Illuminate\Http\Request;

class AdvisorProfileController extends Controller
{
    public function index(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        $getAdvisorProfile = Advisor::getAdvisorProfile($advisorPK);
        $getAdvisorEducationInfo = EducationLevel::getAdvisorEducationInfo($advisorPK);
        $getAdvisorQualificationInfo = Qualification::getAdvisorQualificationInfo($advisorPK);

        return view("/advisor/profile/profile", [
            'advisorProfile' => $getAdvisorProfile,
            'getAdvisorEducationInfo' => $getAdvisorEducationInfo,
            'getAdvisorQualificationInfo' => $getAdvisorQualificationInfo,
        ]);

    }

    public function store(Request $request)
    {

    }

    public function show(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        $getAdvisorProfile = Advisor::getAdvisorProfile($advisorPK);
//        $getAdvisorEducationInfo = EducationLevel::getAdvisorEducationInfo($advisorPK);
        $getAdvisorQualificationInfo = Qualification::getAdvisorQualificationInfo($advisorPK);

        $codeTitle = [
            "325" => "학사",
            "326" => "석사",
            "327" => "박사",
            "328" => "졸업",
            "329" => "재학",
            "330" => "수료",
        ];

        return view("/advisor/profile/profileUpdate", [
            'advisorProfile' => $getAdvisorProfile,
            'advisorEducationInfos' => EducationLevel::findAdvisorEducationInfo($advisorPK),
            'getAdvisorQualificationInfo' => $getAdvisorQualificationInfo,
            'codeTitle' => $codeTitle,
        ]);

    }

}
