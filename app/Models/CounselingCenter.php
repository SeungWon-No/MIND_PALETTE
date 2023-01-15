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

    public static function findRandomCenter() {
        return CounselingCenter::where("isDelete","N")
            ->inRandomOrder()
            ->limit(1)
            ->get()->first();
    }
}
