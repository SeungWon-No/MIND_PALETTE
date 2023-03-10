<?php

namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Career;
use App\Models\Counseling;
use App\Models\EducationLevel;
use App\Models\Member;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdvisorEducationEditController extends Controller
{
    public function index(Request $request)
    {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        $getAdvisorProfile = Advisor::getAdvisorProfile($advisorPK);

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

        return view("/advisor/join/consultationInformationEdit", [
            'advisorProfile' => $getAdvisorProfile,
            'advisorEducationInfos' => EducationLevel::findAdvisorEducationInfo($advisorPK),
            'advisorQualificationInfo' => Qualification::findAdvisorQualificationInfo($advisorPK),
            'advisorCareerInfo' => Career::findAdvisorCareerInfo($advisorPK),
            'codeTitle' => $codeTitle,
        ]);
    }

    public function store(Request $request)
    {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        $counselingCareer = $request->counselingCareer ?? '';
        $centerName = $request->centerName ?? '';

            $advisor = Advisor::find($advisorPK);

            if($request['submitExtraValue']){
                if($request['submitExtraValue'] == 'save'){ // 임시 저장
                    $advisor->advisorStatus = 360;

                } else {    // 승인 요청
                    //$advisor->advisorStatus = 361;
                    $advisor->advisorStatus = 2; //todo : 테스트용
                }
            }
            $advisor->save();

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
            $educationLevel->fileName = $request['education-attachedFileName' . $index] ?? '첨부하기';
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
            $qualification->fileName = $request['qualification-attachedFileName' . $index] ?? '첨부하기';
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
            $career->fileName = $request['career-attachedFileName' . $index] ?? '첨부하기';
            $career->createDate = $nowDateTime;
            $career->updateDate = $nowDateTime;
            $career->save();
  
        }
        $getAdvisorStatus = Advisor::getAdvisorStatus($advisorPK);

            if ($getAdvisorStatus['advisorStatus'] == 360) { // 임시저장
                return redirect('/advisor/consultationInformationEdit');

            }else if ($getAdvisorStatus['advisorStatus'] == 361) { // 승인요청
                return redirect('/advisor/examine');

            }else{  // todo : 테스트를 위해 승인요청 단계없이 바로 상태값을 '2'로 변경하도록 하고있음, 이 후 로그아웃 처리
                return redirect('/advisor/logout')->with('error', '승인요청이 완료되었습니다.');
            }
    }


    public function show(Request $request)
    {
        
    }

}
