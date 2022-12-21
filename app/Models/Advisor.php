<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

        Advisor::where('advisorPK',$advisorPK)
            ->update(['lastLoginDate'=> $nowDate]);
    }

    public static function findMemberInfo($advisorPK) {
        return Advisor::where('advisorPK','=',$advisorPK)->first();
    }
}
