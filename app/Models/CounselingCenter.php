<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounselingCenter extends Model
{
    protected $table = 'counselingCenter';
    protected $primaryKey = 'centerPK';
    public $timestamps = false;

    public static function findCounselingCenter() {
        return CounselingCenter::where("isDelete","N")
            ->orderBy("title", "ASC")
            ->get();
    }
}
