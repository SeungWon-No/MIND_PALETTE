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
    public static function findCounselingAnswer($memberPK, $questionsType, $counselingPK, $offset, $limit) {
        $answerResult = Answer::join("questions","questions.questionsPK","=","answer.questionsPK");

        $answerResult->where('memberPK','=',$memberPK);
        $answerResult->where('counselingPK','=',$counselingPK);

        $answerResult->where('questionsType','=',$questionsType)
            ->orderBy("questionsOrder", "ASC")
            ->offset($offset)
            ->limit($limit);

        return $answerResult->get();
    }

    public static function findCounselingAnswers($memberPK, $questionsType, $counselingPK, $offset, $limit) {
        $answerResult = Answer::join("questions","questions.questionsPK","=","answer.questionsPK");

        $answerResult->where('memberPK','=',$memberPK);
        $answerResult->where('counselingPK','=',$counselingPK);

        $answerResult->whereIn('questionsType',$questionsType)
            ->orderBy("questionsOrder", "ASC")
            ->offset($offset)
            ->limit($limit);

        return $answerResult->get();
    }

    public static function findAllAnswer($memberPK, $freeCode, $questionsType, $counselingPK) {
        $answerResult = Answer::join("questions","questions.questionsPK","=","answer.questionsPK");

        if ($memberPK != "") {
            $answerResult->where('memberPK','=',$memberPK);
        } else if ($freeCode != "") {
            $answerResult->where('tempCounselingCode','=',$freeCode);
        }

        $answerResult->where('questionsType','=',$questionsType)
            ->where('counselingPK','=',$counselingPK)
            ->orderBy("questionsOrder", "ASC");

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

    public static function findCounselingAnswerPK($memberPK, $questionsPK, $counselingPK) {
        $answerResult = Answer::select("answerPK");
        $answerResult->where('memberPK','=',$memberPK);
        $answerResult->where('questionsPK','=',$questionsPK)
            ->where('counselingPK','=',$counselingPK);
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
    public static function sumCounselingAnswerScore($counselingPK) {
        return Answer::select(DB::raw('sum(cast(answer as unsigned)) as sumScore'))
            ->where('counselingPK','=',$counselingPK)
            ->where('answerType','=',"293")
            ->get("cast(answer as unsigned) as sumCount")->first();
    }

    public static function sumCounselingAnswerType($counselingPK,$questionsType) {
        return Answer::select(DB::raw('sum(cast(answer as unsigned)) as sumScore'))
            ->join('questions','answer.questionsPK','=','questions.questionsPK')
            ->where('counselingPK','=',$counselingPK)
            ->where('questionsType','=',$questionsType)->get()->first();
    }

    public static function findSpecificAnswers($memberPK, $freeCode, $counselingPK, $questionsType, $key) {
        $answerResult = Answer::join("questions","questions.questionsPK","=","answer.questionsPK");

        if ($memberPK != "") {
            $answerResult->where('memberPK','=',$memberPK);
        } else if ($freeCode != "") {
            $answerResult->where('tempCounselingCode','=',$freeCode);
        }
        $answerResult->whereIn('answer.questionsPK', $key);
        $answerResult->where('questionsType','=',$questionsType)
            ->where('counselingPK','=',$counselingPK)
            ->orderBy("questionsOrder", "ASC");

        return $answerResult->get();
    }
}
