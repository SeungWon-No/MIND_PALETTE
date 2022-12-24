<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounselingTemplate extends Model
{
    protected $table = 'counselingTemplate';
    protected $primaryKey = 'counselingTemplatePK';
    public $timestamps = false;

    public static function findFreeCounselingResult($userPK) {
        return CounselingTemplate::select("counselorName","counselingStatus","updateDate")
            ->where('memberPK','=',$userPK);
    }

}
