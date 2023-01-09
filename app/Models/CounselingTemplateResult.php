<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounselingTemplateResult extends Model
{
    protected $table = 'counselingTemplateResult';
    protected $primaryKey = 'counselingTemplateResultPK';
    public $timestamps = false;

    public static function findResultScore($type, $resultScore) {
        return CounselingTemplateResult::select("counselingTemplateResultPK")
            ->where('templateType','=',$type)
            ->where('minScore','<=',$resultScore)
            ->where('maxScore','>=',$resultScore)->get()->first();
    }

}
