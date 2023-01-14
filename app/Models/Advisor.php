<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * @property mixed $advisorPK
 * @property mixed|string $email
 * @property mixed $pw
 * @property mixed|string $memberName
 * @property mixed|string $phone
 * @property mixed|string $gender
 * @property mixed|string $advisorBirthday
 * @property mixed|string $profilePath
 * @property mixed|string $designation
 * @property mixed|string $career
 * @property mixed|string $briefIntroduction
 * @property mixed|string $detailedDescription
 * @property mixed|string $isDelete
 * @property mixed|string $good
 * @property mixed|string $bad
 * @property mixed|string $mbAgreePK
 * @property mixed|string $lastLoginDate
 * @property mixed|string $advisorStatus
 * @property mixed|string $blockDate
 * @property mixed|string $withdrawal
 * @property mixed|string $updateDate
 * @property mixed|string $createDate
 */
class Advisor extends Model
{
    protected $table = 'advisor';
    protected $primaryKey = 'advisorPK';
    public $timestamps = false;

    public static function findEmail($userEmail) {
        return Advisor::where('email','=',$userEmail)->count();
    }

    public static function findUser($userEmail) {
        return Advisor::where('email','=',$userEmail)
            -> get();
    }
    public static function updateLoginDate($advisorPK){
        $nowDate = date("Y-m-d H:i:s");

        Advisor::where('advisorPK', $advisorPK)
            ->update(['lastLoginDate'=> $nowDate]);
    }

    public static function findAdvisorInfo($advisorPK) {
        return Advisor::where('advisorPK','=',$advisorPK)->first();
    }

    public static function getAdvisorProfile($advisorPK){
         $result = Advisor::select(
                'advisorPK',
                'email',
                'phone',
                'advisorName',
                'briefIntroduction',
                'counselingCount',
                'centerName',
                'career',
                'detailedDescription'
            )
            ->where('advisorPK', '=', $advisorPK)
            ->get()->first();
        $result->advisorName = Crypt::decryptString($result->advisorName);
        return $result;

    }

    public static function getAdvisorList(){
        $getAdvisorList = Advisor::select('advisorPK', 'advisorName', 'briefIntroduction')->get();

        $advisorList = json_decode(json_encode($getAdvisorList), true);

        foreach($advisorList as $pk => $list){
            $advisorList[$pk] = [
                'advisorPK' => $list['advisorPK'],
                'advisorName' => Crypt::decryptString($list['advisorName']),
                'briefIntroduction' => $list['briefIntroduction'],
            ];
        }
        return $advisorList;

    }

    public static function pagination(){
        $pagination = DB::table('advisor')
        ->select('advisorPK', 'advisorName', 'briefIntroduction')
        ->paginate(3);

        $advisorList = json_decode(json_encode($pagination), true);

        foreach($advisorList['data'] as $key => $list){
            $advisorList['data'][$key] = [
                'advisorPK' => $list['advisorPK'],
                'advisorName' => Crypt::decryptString($list['advisorName']),
                'briefIntroduction' => $list['briefIntroduction'],
            ];
        }
        return $advisorList;

    }

    public static function updateNewPassword($advisorPK, $newPassword){
        $cryptNewPassword = Hash::make($newPassword);
        Advisor::where('advisorPK', $advisorPK)->update(['password'=> $cryptNewPassword]);
    }


}
