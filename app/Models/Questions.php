<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'questionsPK';
    public $timestamps = false;

    public static function findQuestions($questionsType, $offset, $limit) {
        return Questions::where('questionsType','=',$questionsType)
            ->orderBy("questionsOrder", "ASC")
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

    public static function findAnyQuestions($questionsType, $offset, $limit) {
        return Questions::whereIn('questionsType',$questionsType)
            ->orderBy("questionsOrder", "ASC")
            ->offset($offset)
            ->limit($limit)
            ->get();
    }
    public static function findAnyAllQuestions($questionsType) {
        return Questions::whereIn('questionsType',$questionsType)
            ->orderBy("questionsOrder", "ASC")
            ->get();
    }

    public static function findAllQuestion($questionsType) {
        return Questions::where('questionsType','=',$questionsType)
            ->where("isDelete", "N")
            ->orderBy("questionsOrder", "ASC")
            ->get();
    }
}
