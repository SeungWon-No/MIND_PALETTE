<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CounselingTemplate extends Model
{
    protected $table = 'counselingTemplate';
    protected $primaryKey = 'counselingTemplatePK';
    public $timestamps = false;

    public static function findFreeCounselingResult($userPK) {
        return CounselingTemplate::select(DB::raw("'FREE' as type"),"counselorName","counselingStatus","updateDate")
            ->where('memberPK','=',$userPK);
    }

    public static function findCounselingTemplateAnswer($counselingTemplatePK, $questionsPK) {
        return CounselingTemplate::join("answer","counselingTemplate.counselingTemplatePK","=","answer.counselingTemplatePK")
            ->where("counselingTemplate.counselingTemplatePK",$counselingTemplatePK)
            ->where("answer.questionsPK",$questionsPK)->get()->first();
    }

    public static function updateCounselingTemplate($memberPK, $freeCode) {
        CounselingTemplate::where('tempCounselingCode',$freeCode)
            ->update(["memberPK" => $memberPK]);
    }
}
