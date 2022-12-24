<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Answer extends Model
{
    protected $table = 'answer';
    protected $primaryKey = 'answerPK';
    public $timestamps = false;

    public static function findAnswers($memberPK, $questionsType, $offset, $limit) {
        return Answer::join("questions","questions.questionsPK","=","answer.questionsPK")
            ->where('memberPK','=',$memberPK)
            ->where('questionsType','=',$questionsType)
            ->orderBy("questionsOrder", "ASC")
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

    public static function findAnswer($memberPK, $questionsPK, $counselingTemplatePK) {
        return Answer::select("answerPK")
            ->where('memberPK','=',$memberPK)
            ->where('questionsPK','=',$questionsPK)
            ->where('counselingTemplatePK','=',$counselingTemplatePK)
            ->get()->first();
    }

    public static function updateAnswer($answerPK, $updateValue) {
        return Answer::where('answerPK',$answerPK)
            ->update($updateValue);
    }

    public static function sumAnswerScore($counselingTemplatePK) {
        return Answer::select("sum(cast(answer as unsigned))")
            ->where('counselingTemplatePK','=',$counselingTemplatePK)
            ->get()->first();
    }
}
