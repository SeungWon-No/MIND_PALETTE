<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    // public static function findAdvisorEducationLevel($advisorPK) {
    //     return EducationLevel::where('advisorPK','=',$advisorPK)->count();
    // }

    // public static function getAdvisorEducationInfo($advisorPK) {
    //     return EducationLevel::where('advisorPK','=',$advisorPK)
    //         -> all();
    // }
    
}
