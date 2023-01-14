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

    public static function findCodeType($codeType) {
        $codeRow = Code::where("codeType",$codeType)
            ->where('used','=',"Y")->get();

        $value = array();
        foreach ($codeRow as $code) {
            $value[$code->codePK] = $code->codeName;
        }
        return $value;
    }

    public static function searchMonth(){
        $nowMonth = date("Y-m")."-01";
        $pre1 = date("Y-m", strtotime($nowMonth."-1 month"));
        $pre1Format = date("m월", strtotime($nowMonth."-1 month"));
        $pre2 = date("Y-m", strtotime($nowMonth."-2 month"));
        $pre2Format = date("m월", strtotime($nowMonth."-2 month"));
        $pre3 = date("Y-m", strtotime($nowMonth."-3 month"));
        $pre3Format = date("m월", strtotime($nowMonth."-3 month"));

        $searchMonth = [
            $pre1Format => [
                "start" => $pre1."-01",
                "end" => $pre1."-".date('t', strtotime($pre1."-01"))
            ],
            $pre2Format => [
                "start" => $pre2."-01",
                "end" => $pre2."-".date('t', strtotime($pre2."-01"))
            ],
            $pre3Format => [
                "start" => $pre3."-01",
                "end" => $pre3."-".date('t', strtotime($pre3."-01"))
            ],
        ];
        return $searchMonth;
    }
}
