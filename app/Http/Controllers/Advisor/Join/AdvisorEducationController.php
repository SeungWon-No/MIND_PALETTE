<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\EducationLevel;
use App\Models\Qualification;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvisorEducationController extends Controller{

    public function store(Request $request)
    {
        try {

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
                if (true) {
                    if($request['submitExtraValue'] == 'save'){ // 임시 저장
                        $advisor->advisorStatus = 360;
                    } else {    // 승인 요청
                        //$advisor->advisorStatus = 361;
                        $advisor->advisorStatus = 2;
                    }
                }
                $advisor->save();
            }

            $nowDateTime = date('Y-m-d H:i:s');

            $educationCount = $request->educationCount ?? 0;
            $advisorEducation = array();

            $qualificationCount = $request->qualificationCount ?? 0;
            $advisorQualification = array();

            $career = $request->careerCount ?? 0;
            $advisorCareer = array();

            DB::beginTransaction();

            // 학력 사항 INSERT
            for ($index = 1; $index <= $educationCount ; $index++) {

                $advisorEducation[$index] = [
                    'advisorPK' => session('advisorLogin')[0]['advisorPK'], // 사용자 PK (session)
                    'degree' => (integer)$request['degree'.$index], // 학위
                    'school' => $request['schoolName'.$index],  // 학교명
                    'department' => $request['department'.$index],  // 학과
                    'major' => $request['major'.$index],    // 전공
                    'graduation' => (integer)$request['graduation'.$index], // 졸업여부
                    'certificateFilePath' => $request['education-attachedFilePath'.$index] ?? '',   // 첨부파일 경로
                    'fileName' => $request['education-attachedFileName'.$index] ?? '첨부하기',   // 첨부파일명
                    'createDate' => $nowDateTime,
                    'updateDate' => $nowDateTime,
                ];

                $educationLevel = new EducationLevel;
                $educationLevel->advisorPK = $advisorEducation[$index]['advisorPK'];
                $educationLevel->degree = $advisorEducation[$index]['degree'];
                $educationLevel->school = $advisorEducation[$index]['school'];
                $educationLevel->department = $advisorEducation[$index]['department'];
                $educationLevel->major = $advisorEducation[$index]['major'];
                $educationLevel->graduationStatus = $advisorEducation[$index]['graduation'];
                $educationLevel->certificateFilePath = $advisorEducation[$index]['certificateFilePath'];
                $educationLevel->fileName = $advisorEducation[$index]['fileName'];
                $educationLevel->updateDate = $advisorEducation[$index]['updateDate'];
                $educationLevel->createDate = $advisorEducation[$index]['createDate'];
                $educationLevel->save();
            }

            // 자격사항 INSERT
            for ($index = 1; $index <= $qualificationCount; $index++) {
                $advisorQualification[$index] = [
                    'advisorPK' => session('advisorLogin')[0]['advisorPK'], // 사용자 PK (session)
                    'issuingAgency'=>$request['issuance'.$index],
                    'certificateName'=>$request['licenseTitle'.$index],
                    'certificateFilePath'=>$request['qualification-attachedFilePath'.$index],
                    'fileName' => $request['qualification-attachedFileName'.$index] ?? '첨부하기',   // 첨부파일 경로
                    'createDate' => $nowDateTime,
                    'updateDate' => $nowDateTime,
                ];
                $qualification = new Qualification;
                $qualification->advisorPK = $advisorQualification[$index]['advisorPK'];
                $qualification->issuingAgency = $advisorQualification[$index]['issuingAgency'];
                $qualification->certificateName = $advisorQualification[$index]['certificateName'];
                $qualification->certificateFilePath = $advisorQualification[$index]['certificateFilePath'];
                $qualification->fileName = $advisorQualification[$index]['fileName'];
                $qualification->updateDate = $advisorQualification[$index]['updateDate'];
                $qualification->createDate = $advisorQualification[$index]['createDate'];
                $qualification->save();
            }

            // 경력사항 INSERT
            for ($index = 1; $index <= $qualificationCount; $index++) {
                if($request['careerType'.$index] == -1){
                    $request['careerType' . $index] = 367;
                }
                if($request['employmentType'.$index] == -1){
                    $request['employmentType' . $index] = 368;
                }
                $advisorCareer[$index] = [
                    'advisorPK' => session('advisorLogin')[0]['advisorPK'], // 사용자 PK (session)
                    'counselingCareer'=>$request['counselingCareer'],
                    'careerType'=>$request['careerType'.$index],
                    'companyName'=>$request['companyName'.$index],
                    'employmentType'=>$request['employmentType'.$index],
                    'assignedTask'=>$request['assignedTask'.$index],
                    'certificateFilePath'=>$request['career-attachedFilePath'.$index], // 첨부파일 경로
                    'fileName' => $request['career-attachedFileName'.$index] ?? '첨부하기',  // 파일명
                    'createDate' => $nowDateTime,
                    'updateDate' => $nowDateTime,
                ];

                $career = new Career;
                $career->advisorPK = $advisorCareer[$index]['advisorPK'];
                $career->counselingCareer = $advisorCareer[$index]['counselingCareer'];
                $career->careerType = $advisorCareer[$index]['careerType'];
                $career->companyName = $advisorCareer[$index]['companyName'];
                $career->employmentType = $advisorCareer[$index]['employmentType'];
                $career->assignedTask = $advisorCareer[$index]['assignedTask'];
                $career->certificateFilePath = $advisorCareer[$index]['certificateFilePath'];
                $career->fileName = $advisorCareer[$index]['fileName'];
                $career->createDate = $advisorCareer[$index]['createDate'];
                $career->updateDate = $advisorCareer[$index]['updateDate'];
                //dd($career->employmentType);
                $career->save();
            }
            DB::commit();
            $getAdvisorStatus = Advisor::getAdvisorStatus($advisorPK);
            
            //if($getAdvisorStatus['advisorStatus'] == 361){ // 승인요청
                //return redirect('/advisor/examine');
            if($getAdvisorStatus['advisorStatus'] == 2){ // 승인요청
                return redirect('/advisor/logout')->with('error', '승인요청이 완료되었습니다.');

            }else{  // 임시저장
                return redirect('/advisor/consultationInformationEdit');
            }
        }catch(\Exception $e){

        }
    }

    public function show() {
        return view("/advisor/join/consultationInformation");
    }

}
?>
