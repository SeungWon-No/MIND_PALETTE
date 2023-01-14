<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'career';
    protected $primaryKey = 'careerPK';
    public $timestamps = false;

    public static function findAdvisorCareerInfo($advisorPK) {
        return Career::where("advisorPK", $advisorPK)
                ->where("isDelete","N")
                ->orderBy("careerPK","ASC")->get();
    }

    public static function findCareerLimit($advisorPK, $limit) {
        return Career::where("advisorPK", $advisorPK)
            ->where("isDelete","N")
            ->orderBy("careerPK","ASC")
            ->limit($limit)->get();
    }

}
