<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $educationPK
 * @property mixed|string $advisorPK
 * @property mixed|string $degree
 * @property mixed|string $school
 * @property mixed|string $department
 * @property mixed|string $major
 * @property mixed|string $graduation
 * @property mixed|string $certificateFilePath
 * @property mixed|string $isDelete
 * @property mixed|string $createDate
 * @property mixed|string $updateDate
 */
class EducationLevel extends Model
{
    protected $table = 'educationLevel';
    protected $primaryKey = 'educationPK';
    public $timestamps = false;

    public static function findAdvisorEducationLevel($advisorPK) {
        return EducationLevel::where('advisorPK','=',$advisorPK)->count();
    }

    public static function getAdvisorEducationInfo($advisorPK) {
        $getAdvisorEducationLevel = DB::table('educationLevel')
            ->join('code as degreeCode', 'educationLevel.degree', '=', 'degreeCode.codePK')
            ->join('code as graduationStatusCode', 'educationLevel.graduationStatus',  '=','graduationStatusCode.codePK')
            ->select(
                'educationLevel.educationPK',
                'educationLevel.advisorPK',
                'educationLevel.school',
                'educationLevel.department',
                'educationLevel.major',
                'educationLevel.graduationStatus',
                'educationLevel.certificateFilePath',
                'degreeCode.codeName as degree',
                'graduationStatusCode.codeName as graduationStatus',
            )
            ->where('advisorPK', '=', $advisorPK)
            ->get();

        $advisorEducationLevel = json_decode(json_encode($getAdvisorEducationLevel), true);

        foreach ($advisorEducationLevel as $key => $list) {
            $advisorEducationLevel[$key] = [
                'educationPK' => $list['educationPK'],
                'advisorPK' => $list['advisorPK'],
                'degree' => $list['degree'],
                'school' => $list['school'],
                'department' => $list['department'],
                'major' => $list['major'],
                'graduationStatus' => $list['graduationStatus'],
                'certificateFilePath' => $list['department'],
            ];
        }

        return $advisorEducationLevel;
    }

    public static function findAdvisorEducationInfo($advisorPK) {
        return EducationLevel::where("advisorPK",$advisorPK)
                ->where("isDelete","N")
                ->orderBy("educationPK","ASC")->get();

    }


}
