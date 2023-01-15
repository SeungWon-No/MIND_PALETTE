<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class ServiceRating extends Model
{
    protected $table = 'serviceRating';
    protected $primaryKey = 'serviceRatingPK';
    public $timestamps = false;

    public static function findMemberLog($memberPK) {
        return ServiceRating::where("memberPK",$memberPK)->get()->first();
    }
}
