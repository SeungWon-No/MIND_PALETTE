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

}
