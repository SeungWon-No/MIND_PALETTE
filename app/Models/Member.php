<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $memberPK
 * @property mixed|string $email
 * @property mixed $pw
 * @property mixed|string $memberName
 * @property mixed|string $phone
 * @property mixed $mbAgreePK
 * @property mixed|string $auth
 * @property mixed|string $lastLoginDate
 * @property mixed|string $updateDate
 * @property mixed|string $createDate
 */
class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'memberPK';
    public $timestamps = false;

    public static function findEmail($userEmail) {
        return Member::where('email','=',$userEmail)->count();
    }

    public static function findUser($userEmail) {
        return Member::where('email','=',$userEmail)
            -> where('joinType','=','site')
            -> get();
    }

    public static function findAuthUser($CI) {
        return Member::join("memberAuth","member.memberPK","=","memberAuth.memberPK")
            -> where('memberAuth.memberCI','=',$CI)
            -> where('joinType','=','site')
            -> whereNull('withdrawal')
            -> get()->first();
    }

    public static function findAuthUserEmail($CI, $email) {
        return Member::join("memberAuth","member.memberPK","=","memberAuth.memberPK")
            -> where('memberAuth.memberCI','=',$CI)
            -> where('joinType','=','site')
            -> where('email','=',$email)
            -> whereNull('withdrawal')
            -> get()->first();
    }
    public static function updateLoginDate($memberPK){
        $nowDate = date("Y-m-d H:i:s");

        Member::where('memberPK',$memberPK)
            ->update(['lastLoginDate'=> $nowDate]);
    }

    public static function findMemberInfo($memberPK) {
        return Member::where('memberPK','=',$memberPK)->first();
    }

    public static function updatePassword($email, $password) {
        Member::where('email',$email)
            ->update(['pw'=> $password]);
    }
}
