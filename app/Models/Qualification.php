<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $certificatePK
 * @property mixed|string $advisorPK
 * @property mixed|string $issuingAgency
 * @property mixed|string $certificateName
 * @property mixed|string $certificateFilePath
 * @property mixed|string $isDelete
 * @property mixed|string $qualification
 * @property mixed|string $createDate
 */
class Qualification extends Model
{
    protected $table = 'qualification';
    protected $primaryKey = 'certificatePK';
    public $timestamps = false;


    public static function getAdvisorQualificationInfo($advisorPK) {
        $getAdvisorQualificationInfo = DB::table('qualification')
                                        ->select('advisorPK', 'issuingAgency', 'certificateName', 'certificateFilePath')
                                        ->where('advisorPK','=',$advisorPK)
                                        ->get();
                                        
        $advisorQualificationInfo = json_decode(json_encode($getAdvisorQualificationInfo), true);

        foreach($advisorQualificationInfo as $key => $list){
            $advisorQualificationInfo[$key] = [
                'advisorPK' => $list['advisorPK'],
                'issuingAgency' => $list['issuingAgency'],
                'certificateName' => $list['certificateName'],
                'certificateFilePath' => $list['certificateFilePath'],
            ];
        }
        return $advisorQualificationInfo;
    }

}
