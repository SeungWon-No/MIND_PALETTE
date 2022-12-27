<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvisorEducationController extends Controller{

    public function store(Request $request)
    {
        try {
            $nowDateTime = date('Y-m-d H:i:s');
            $educationCount = $request->educationCount ?? 0;
            $advisorEducation = array();

            DB::beginTransaction();
            for ($index = 1; $index <= $educationCount ; $index++) {

                $advisorEducation[$index] = [
                    'advisorPK' => session('advisorLogin')[0]['advisorPK'], // 사용자 PK (session)
                    'degree' => (integer)$request['degree'.$index], // 학위
                    'school' => $request['schoolName'.$index],  // 학교명
                    'department' => $request['department'.$index],  // 학과
                    'major' => $request['major'.$index],    // 전공
                    'graduation' => (integer)$request['graduation'.$index], // 졸업여부
                    'certificateFilePath' => $request['attachedFilePath'.$index],   // 첨부파일 경로
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
                $educationLevel->createDate = $advisorEducation[$index]['createDate'];
                $educationLevel->updateDate = $advisorEducation[$index]['updateDate'];
                $educationLevel->save();
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
