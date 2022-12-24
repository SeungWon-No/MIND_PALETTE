<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Answer extends Model
{
    protected $table = 'answer';
    protected $primaryKey = 'answerPK';
    public $timestamps = false;

    public static function findAnswers($memberPK, $freeCode, $questionsType, $offset, $limit) {
        $answerResult = Answer::join("questions","questions.questionsPK","=","answer.questionsPK");

        if ($memberPK != "") {
            $answerResult->where('memberPK','=',$memberPK);
        } else if ($freeCode != "") {
            $answerResult->where('tempCounselingCode','=',$freeCode);
        }

        $answerResult->where('questionsType','=',$questionsType)
            ->orderBy("questionsOrder", "ASC")
            ->offset($offset)
            ->limit($limit);

        return $answerResult->get();
    }

    public static function findAnswer($memberPK, $freeCode, $questionsPK, $counselingTemplatePK) {
        $answerResult = Answer::select("answerPK");
        if ($memberPK != "") {
            $answerResult->where('memberPK','=',$memberPK);
        } else if ($freeCode != "") {
            $answerResult->where('tempCounselingCode','=',$freeCode);
        }
        $answerResult->where('questionsPK','=',$questionsPK)
            ->where('counselingTemplatePK','=',$counselingTemplatePK);
        return $answerResult->get()->first();
    }

    public static function updateAnswer($answerPK, $updateValue) {
        return Answer::where('answerPK',$answerPK)
            ->update($updateValue);
    }

    public static function sumAnswerScore($counselingTemplatePK) {
        return Answer::select(DB::raw('sum(cast(answer as unsigned)) as sumScore'))
            ->where('counselingTemplatePK','=',$counselingTemplatePK)
            ->where('answerType','=',"293")
            ->get("cast(answer as unsigned) as sumCount")->first();
    }
}
