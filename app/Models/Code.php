<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'code';
    protected $primaryKey = 'codePK';
    public $timestamps = false;

    public static function findCode($codeType) {
        return Code::where('codeType','=',$codeType)
            ->where('used','=',"Y")
            ->orderBy('codeOrder', 'ASC')->get();
    }

    public static function findChildCode($parentsCodePK) {
        return Code::where('parentsCodePK','=',$parentsCodePK)
            ->where('used','=',"Y")
            ->orderBy('codeOrder', 'ASC')->get();
    }

    public static function findAreaCode() {
        return Code::where('codeType','=',"area")
            ->where('used','=',"Y")
            ->where('parentsCodePK','=',-1)
            ->orderBy('codeOrder', 'ASC')->get();
    }
}
