<?php

namespace App\Http\Controllers\Advisor\Profile;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Career;
use App\Models\Counseling;
use App\Models\EducationLevel;
use App\Models\Member;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
            'advisorCareerInfo' => Career::findAdvisorCareerInfo($advisorPK),
            'rating5' => Counseling::findCounselingRating($advisorPK,5),
            'rating4' => Counseling::findCounselingRating($advisorPK,4),
            'rating3' => Counseling::findCounselingRating($advisorPK,3),
            'rating2' => Counseling::findCounselingRating($advisorPK,2),
            'rating1' => Counseling::findCounselingRating($advisorPK,1),
        ]);

    }

    public function store(Request $request)
    {
        //dd($request);
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];

        $counselingCareer = $request->counselingCareer ?? '';
        $centerName = $request->centerName ?? '';

        if ($counselingCareer != "" || $centerName != "") {
            $advisor = Advisor::find($advisorPK);
            if ($counselingCareer != "") {
                $advisor->career = $counselingCareer;
            }
            if ($centerName != "") {
                $advisor->centerName = $centerName;
            }
            $advisor->save();
        }

        $advisorBriefIntroduction = $request->briefIntroduction ?? '';
        $advisorDetailedDescription = $request->detailedDescription ?? '';

        if ($advisorBriefIntroduction != "" || $advisorDetailedDescription != "") {
            $advisor = Advisor::find($advisorPK);
            if ($advisorBriefIntroduction != "") {
                $advisor->briefIntroduction = $advisorBriefIntroduction;
            }
            if ($advisorDetailedDescription != "") {
                $advisor->detailedDescription = $advisorDetailedDescription;
            }
            $advisor->save();
        }

        $nowDateTime = date('Y-m-d H:i:s');

        $educationCount = $request->educationCount ?? 0;
        for ($index = 1; $index <= $educationCount; $index++) {

            $educationPK = $request['educationPK' . $index] ?? '';
            if ($educationPK == '') {
                $educationLevel = new EducationLevel;
            } else {
                $educationLevel = EducationLevel::find($educationPK);
            }

            $educationLevel->advisorPK = $advisorPK;
            $educationLevel->degree = $request['degree' . $index];
            $educationLevel->school = $request['schoolName' . $index];
            $educationLevel->department = $request['department' . $index];
            $educationLevel->major = $request['major' . $index];
            $educationLevel->graduationStatus = $request['graduation' . $index];
            $educationLevel->certificateFilePath = $request['education-attachedFilePath' . $index];
            $educationLevel->fileName = $request['education-attachedFileName' . $index];
            $educationLevel->updateDate = $nowDateTime;
            $educationLevel->createDate = $nowDateTime;
            $educationLevel->save();
        }

        // 자격사항 INSERT
        $qualificationCount = $request->qualificationCount ?? 0;
        for ($index = 1; $index <= $qualificationCount; $index++) {

            $qualificationPK = $request['qualificationPK' . $index] ?? '';

            if ($qualificationPK == '') {
                $qualification = new Qualification;
            } else {
                $qualification = Qualification::find($qualificationPK);
            }

            $qualification->advisorPK = $advisorPK;
            $qualification->issuingAgency = $request['issuance' . $index];
            $qualification->certificateName = $request['licenseTitle' . $index];
            $qualification->certificateFilePath = $request['qualification-attachedFilePath' . $index];
            $qualification->fileName = $request['qualification-attachedFileName' . $index];
            $qualification->updateDate = $nowDateTime;
            $qualification->createDate = $nowDateTime;
            $qualification->save();
        }

            // 경력사항 INSERT
        $careerCount = $request->careerCount ?? 0;
        for ($index = 1; $index <= $careerCount; $index++) {
            $careerPK = $request['careerPK' . $index] ?? '';

            if ($careerPK == '') {
                $career = new Career;
            } else {
                $career = Career::find($careerPK);
            }

            $career->advisorPK = $advisorPK;
            $career->counselingCareer = $request['counselingCareer'];
            $career->careerType = $request['careerType' . $index];
            $career->companyName = $request['companyName' . $index];
            $career->employmentType = $request['employmentType' . $index];
            $career->assignedTask = $request['assignedTask' . $index];
            $career->certificateFilePath = $request['career-attachedFilePath' . $index];
            $career->fileName = $request['career-attachedFileName' . $index];
            $career->createDate = $nowDateTime;
            $career->updateDate = $nowDateTime;
            $career->save();

        }
        return redirect('/advisor/profile/profileUpdate');
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
        // $getAdvisorQualificationInfo = Qualification::getAdvisorQualificationInfo($advisorPK);

        $codeTitle = [
            "325" => "학사",
            "326" => "석사",
            "327" => "박사",
            "328" => "졸업",
            "329" => "재학",
            "330" => "수료",
            "331" => "현재 근무지",
            "332" => "이전 근무지",
            "333" => "풀타임",
            "334" => "파트타임",
            "367" => "선택",
            "368" => "선택",
        ];

        return view("/advisor/profile/profileUpdate", [
            'advisorProfile' => $getAdvisorProfile,
            'advisorEducationInfos' => EducationLevel::findAdvisorEducationInfo($advisorPK),
            'advisorQualificationInfo' => Qualification::findAdvisorQualificationInfo($advisorPK),
            'advisorCareerInfo' => Career::findAdvisorCareerInfo($advisorPK),
            'codeTitle' => $codeTitle,
        ]);

    }

    public function changePhone(Request $request){

        try {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];

            $userName = $request->userName ?? '';
            $userPhone = $request->userPhone ?? '';
            $DI = $request->DI ?? '';
            $CI = $request->CI ?? '';

            Crypt::decryptString($userName);
            $phoneNumber = Crypt::decryptString($userPhone);
            Crypt::decryptString($DI);
            Crypt::decryptString($CI);

            $advisor = Advisor::find($advisorPK);
            $advisor->phone = $userPhone;
            $advisor->save();

            $result = [
                "status" => "success",
                "message" => $phoneNumber
            ];
        }catch (\Exception $e) {
            $result = [
                "status" => "fail",
                "message" => "전화번호 변경에 실패하였습니다."
            ];
        }

        return json_encode($result);
    }

}
