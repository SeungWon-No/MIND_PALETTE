<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $certificatePK
 * @property mixed|string $advisorPK
 * @property mixed|string $issuingAgency
 * @property mixed|string $certificateName
 * @property mixed|string $certificateFilePath
 * @property mixed|string $isDelete
 * @property mixed|string $qualification
 * @property mixed|string $createDate
 * @property mixed|string $isDelete
 */
class Qualification extends Model
{
    protected $table = 'qualification';
    protected $primaryKey = 'certificatePK';
    public $timestamps = false;

    // public static function findAdvisorEducationLevel($advisorPK) {
    //     return EducationLevel::where('advisorPK','=',$advisorPK)->count();
    // }

    // public static function getAdvisorEducationInfo($advisorPK) {
    //     return EducationLevel::where('advisorPK','=',$advisorPK)
    //         -> all();
    // }
    
}
