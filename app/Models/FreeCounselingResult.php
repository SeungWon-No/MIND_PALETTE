<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeCounselingResult extends Model
{
    protected $table = 'counseling';
    protected $primaryKey = 'counselingPK';
    public $timestamps = false;

    public static function findFreeCounselingResult($userPK) {
        return FreeCounselingResult::select("counselorName","counselingStatus","updateDate")
            ->where('memberPK','=',$userPK);
    }

}
