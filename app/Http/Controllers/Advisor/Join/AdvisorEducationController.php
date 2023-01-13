<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use App\Models\Qualification;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvisorEducationController extends Controller{ //TODO: Education이 아니라 해당 페이지 관련 CONTROLLER로 사용

    public function store(Request $request)
    {
        try {
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
                    'certificateFilePath' => $request['education-attachedFilePath'.$index],   // 첨부파일 경로
                    'fileName' => $request['education-attachedFileName'.$index],   // 첨부파일 경로
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
                    'fileName' => $request['qualification-attachedFileName'.$index],   // 첨부파일 경로
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
                $advisorCareer[$index] = [
                    'advisorPK' => session('advisorLogin')[0]['advisorPK'], // 사용자 PK (session)
                    'counselingCareer'=>$request['counselingCareer'],
                    'careerType'=>$request['careerType'.$index],
                    'companyName'=>$request['companyName'.$index],
                    'employmentType'=>$request['employmentType'.$index],
                    'assignedTask'=>$request['assignedTask'.$index],
                    'certificateFilePath'=>$request['career-attachedFilePath'.$index],
                    'fileName' => $request['career-attachedFileName'.$index],   // 첨부파일 경로
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
                $career->save();

            }

            DB::commit();
            return redirect('/advisor/consultationInformation');

        }catch(\Exception $e){

        }
    }

    public function show() {
        return view("/advisor/join/consultationInformation");
    }

}
?>
