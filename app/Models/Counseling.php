<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $counselingPK
 * @property mixed $counselingCode
 * @property mixed $memberPK
 * @property mixed $advisorPK
 * @property mixed $applicantName
 * @property mixed $relationship
 * @property mixed|string $phone
 * @property int|mixed $city
 * @property int|mixed $region
 * @property int|mixed $counselingStatus
 * @property int|mixed $updateDate
 * @property int|mixed $createDate
 */
class Counseling extends Model
{
    protected $table = 'counseling';
    protected $primaryKey = 'counselingPK';
    public $timestamps = false;

    public static function findAllCounseling($userPK) {
        $freeCounseling = CounselingTemplate::findFreeCounselingResult($userPK);
        return Counseling::select("counselorName","counselingStatus","updateDate")
            ->where('memberPK','=',$userPK)->union($freeCounseling)
            ->orderBy('updateDate', 'DESC')
            ->offset(0)
            ->limit(10)
            ->get();
    }

    public static function getCounselingList(){
        $getResult = DB::table('counseling')
                    ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
                    ->select("counseling.counselingPK", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName")
                    ->where('counseling.counselorGender', '=', '337') // 남자
                    ->orWhere('counseling.counselorGender', '=', '338') // 여자
                    ->orderBy("counselingPK", "DESC")
                    ->get();

        $counselingList = json_decode(json_encode($getResult), true);

        foreach($counselingList as $pk => $list){
            $counselingList[$pk] = [
                'counselingPK' => $list['counselingPK'],
                'counselorName' => Crypt::decryptString($list['counselorName']),
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
            ];
        }
        return $counselingList;
    }

    // 상담 대기 중인 건 수 [counselingStatus : 279]
    public static function getWaitingCounseling(){
        return Counseling::where('counselingCode', '=', '279')->count();
    }

    // 상담 완료 건수
    public static function getCompleteCounseling(){
        return Counseling::where('counselingCode', '=', '281')->count();
    }

}
