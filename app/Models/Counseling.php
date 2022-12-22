<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $counselingPK
 * @property mixed $memberPK
 * @property mixed $advisorPK
 * @property mixed $applicantName
 * @property mixed $relationship
 * @property mixed|string $phone
 * @property int|mixed $city
 * @property int|mixed $region
 * @property int|mixed $counselingStatus
 * @property int|mixed $updateDate
 * @property int|mixed $createDate
 */
class Counseling extends Model
{
    protected $table = 'counseling';
    protected $primaryKey = 'counselingPK';
    public $timestamps = false;

    public static function findAllCounseling($userPK) {
        $freeCounseling = CounselingTemplate::findFreeCounselingResult($userPK);
        return Counseling::select("counselorName","counselingStatus","updateDate")
            ->where('memberPK','=',$userPK)->union($freeCounseling)->get();
    }

}
