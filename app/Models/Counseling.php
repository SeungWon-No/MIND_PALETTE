<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counseling extends Model
{
    protected $table = 'counseling';
    protected $primaryKey = 'counselingPK';
    public $timestamps = false;

    public static function findAllCounseling($userPK) {
        $freeCounseling = FreeCounselingResult::findFreeCounselingResult($userPK);
        return Counseling::select("counselorName","counselingStatus","updateDate")
            ->where('memberPK','=',$userPK)->union($freeCounseling)->get();
    }

}
