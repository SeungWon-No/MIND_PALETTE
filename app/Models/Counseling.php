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
        return Counseling::select(DB::raw("'PAY' as type, counselingPK as PK"),"counselorName","counselingStatus","updateDate")
            ->where('memberPK','=',$userPK)->union($freeCounseling)
            ->orderBy('updateDate', 'DESC')
            ->offset(0)
            ->limit(10)
            ->get();
    }

    public static function findCounseling($userPK) {
        return Counseling::where('memberPK','=',$userPK)
            ->orderBy('updateDate', 'DESC')
            ->get();
    }

    public static function findMyCounseling($advisorPK) {
        return Counseling::where('advisorPK','=',$advisorPK)
            ->where("counselingStatus","280")
            ->where("isDelete","N")
            ->get()->count();
    }
    public static function findCounselingStatus($counselingPK) {
        return Counseling::select("counselingStatus")
            ->where('counselingPK','=',$counselingPK)
            ->where("isDelete","N")
            ->get()->first();
    }

    public static function updateCounselingStatus($counselingPK, $value) {
        return Counseling::where('counselingPK','=',$counselingPK)
            ->update($value);
    }

    public static function updateCounselingCancelStatus($counselingPK, $advisorPK, $value) {
        return Counseling::where('counselingPK','=',$counselingPK)
            ->where('advisorPK','=',$advisorPK)
            ->update($value);
    }

    public static function getCounselingList(){ // 전체 상담 리스트
        $getResult = DB::table('counseling')
                    ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
                    ->select("counseling.counselingPK", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName")
                    ->where('counseling.memberPK', '<>', '0')
                    ->where('counseling.memberPK', '>=', '1')
                    ->orderBy("counselingPK", "DESC")
                    ->get();

        $counselingList = json_decode(json_encode($getResult), true);

        foreach($counselingList as $pk => $list){
            $counselingList[$pk] = [
                'counselingPK' => $list['counselingPK'],
                'counselorName' => $list['counselorName'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
            ];
        }
        return $counselingList;
    }

    public static function pagination()
    {
        $pagination = DB::table('counseling')
                    ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
                    ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName")
                    ->where('counseling.memberPK', '>', '0')
                    ->whereIn("counseling.counselingStatus",[279,280,281,353])
                    ->orderBy("counselingPK", "DESC")
                    ->paginate(10);

        $counselingList = json_decode(json_encode($pagination), true);

        foreach($counselingList['data'] as $key => $list){
            $counselingList['data'][$key] = [
                'counselingPK' => $list['counselingPK'],
                'counselingCode' => $list['counselingCode'],
                'counselorName' => $list['counselorName'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
            ];
        }
        //dd($counselingList['data']);
        return $counselingList;
    }


    // 상담 대기 중인 건수
    public static function getWaitingCounselingCount(){
        return Counseling::where('counselingCode', '=', '279')->count();
    }

    // 상담 완료 건수
    public static function getCompleteCounselingCount(){
        return Counseling::where('counselingCode', '=', '281')->count();
    }

    // 위험 수준 상담 건수 
    public static function getDangerCounselingCount(){
        return Counseling::where('isDelete', '=', 'N')
        ->where('counselorStatus', '=', '355')
        ->count();
    }

    // 주의 수준 상담 건수 
    public static function getCautionCounselingCount(){
        return Counseling::where('isDelete', '=', 'N')
        ->where('counselorStatus', '=', '356')
        ->count();
    }

    // 주의 수준 상담 리스트 
    public static function getCautionCounselingList(){

        $cautionList = DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName")
            ->where('counseling.memberPK', '>', '0')
            ->where('counseling.isDelete', '=', 'N')
            ->where("counseling.counselingStatus", '=', '356')
            ->orderBy("counselingPK", "DESC")
            ->first()
            ->paginate(10);

        return $cautionList;
    }

    // 위험 수준 상담 리스트 
    public static function getDangerCounselingList(){

        $dangerList = DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName")
            ->where('counseling.memberPK', '>', '0')
            ->where('counseling.isDelete', '=', 'N')
            ->where("counseling.counselingStatus", '=', '355')
            ->orderBy("counselingPK", "DESC")
            ->first()
            ->paginate(10);

        return $dangerList;
    }


    public static function getMyCounselingList($advisorPK){ // my 상담 리스트

        $getResult = DB::table('counseling')
                    ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
                    ->select("counseling.counselingPK", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName")
                    ->where('advisorPK', '=', $advisorPK)
                    ->orderBy("counselingPK", "DESC")
                    ->get();

        $myCounselingList = json_decode(json_encode($getResult), true);

        foreach($myCounselingList as $pk => $list){
            $myCounselingList[$pk] = [
                'counselingPK' => $list['counselingPK'],
                'counselorName' => $list['counselorName'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
            ];
        }
        return $myCounselingList;
    }

    public static function getCounselingDetail($counselingPK){

        $getResult = DB::table('counseling')
                    ->join('code as codeGender', 'counseling.counselorGender', '=', 'codeGender.codePK')
                    ->join('code as codeSchool', 'counseling.counselorSchool', '=', 'codeSchool.codePK')
                    ->select("counseling.counselingPK",
                             "counseling.memberPK",
                             "counseling.advisorPK",
                             "counseling.counselorName",
                             "counseling.counselorBirthday",
                             "codeSchool.codeName as counselorSchool",
                             "codeGender.codeName as counselorGender",
                             "counseling.hobby",
                             "counseling.familyRelations1",
                             "counseling.familyRelations2",
                             "counseling.familyRelations3",
                             "counseling.specialty",
                             "counseling.friendship",
                             "counseling.relationshipTeacher",
                             "counseling.relationshipDad",
                             "counseling.relationshipMother",
                             "counseling.relationshipSiblings",
                             "counseling.relationshipSister",
                             "counseling.stressCauses",
                             "counseling.reasonInspection",
                             "counseling.counselingStatus",
                             "counseling.createDate",
                             )
                    ->where('counseling.counselingPK', '=', $counselingPK)
                    ->orderBy("counselingPK", "DESC")
                    ->get();

        $getCounselingDetail = json_decode(json_encode($getResult), true);

        $clientInfo = [
            'memberPK' => $getCounselingDetail[0]['memberPK'],
            'advisorPK' => $getCounselingDetail[0]['advisorPK'],
            'clientName' => $getCounselingDetail[0]['counselorName'], // 상담 대상 이름
            'counselorBirthday' => Crypt::decryptString($getCounselingDetail[0]['counselorBirthday']), // 생년월일
            'counselorSchool' => $getCounselingDetail[0]['counselorSchool'], // 학교
            'counselorGender' => $getCounselingDetail[0]['counselorGender'],// 성별
            'hobby' => $getCounselingDetail[0]['hobby'], // 취미
            'familyRelations1' => $getCounselingDetail[0]['familyRelations1'], // ex) x남 y녀 중 z째
            'familyRelations2' => $getCounselingDetail[0]['familyRelations2'],
            'familyRelations3' => $getCounselingDetail[0]['familyRelations3'],
            'specialty' => $getCounselingDetail[0]['specialty'], // 특기
            'friendship' => $getCounselingDetail[0]['friendship'], // 친구들과의 관계
            'relationshipTeacher' => $getCounselingDetail[0]['relationshipTeacher'], // 선생님과의 관계
            'relationshipDad' => $getCounselingDetail[0]['relationshipDad'], // 아버지와의 관계
            'relationshipMother' => $getCounselingDetail[0]['relationshipMother'],// 어머니와의 관계
            'relationshipSiblings' => $getCounselingDetail[0]['relationshipSiblings'], // 형제 관계
            'relationshipSister' => $getCounselingDetail[0]['relationshipSister'],// 자매 관계
            'stressCauses' => $getCounselingDetail[0]['stressCauses'], // 가족 내력, 스트레스 요인
            'counselingStatus' => $getCounselingDetail[0]['counselingStatus'],
            'reasonInspection' => $getCounselingDetail[0]['reasonInspection'], // 심리 상담 사유
            'createDate' => $getCounselingDetail[0]['createDate'],
        ];
        return $clientInfo;


    }

    public static function searchingCounselorName($searchingText, $sdate, $edate)
    {
        $pagination= DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName")
            ->where('counseling.memberPK', '>', '0')
            ->where('counseling.createDate', '>=', $sdate)
            ->where('counseling.createDate', '<=', $edate)
            ->where('counseling.counselorName', 'like', '%'. $searchingText .'%')
            ->orderBy("counselingPK", "DESC")
            ->paginate(10);

        $counselingList = json_decode(json_encode($pagination), true);

        foreach($counselingList['data'] as $key => $list){
            $counselingList['data'][$key] = [
                'counselingPK' => $list['counselingPK'],
                'counselingCode' => $list['counselingCode'],
                'counselorName' => $list['counselorName'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
            ];
        }
        return $counselingList;
    }

    public static function searchingCounselorCode($searchingText, $sdate, $edate)
    {
        $pagination= DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName")
            ->where('counseling.memberPK', '>', '0')
            ->where('counseling.createDate', '>=', $sdate)
            ->where('counseling.createDate', '<=', $edate)
            ->where('counseling.counselingCode', '=', '"%'.$searchingText.'%"')
            ->orderBy("counselingPK", "DESC")
            ->paginate(10);

        $counselingList = json_decode(json_encode($pagination), true);

        foreach($counselingList['data'] as $key => $list){
            $counselingList['data'][$key] = [
                'counselingPK' => $list['counselingPK'],
                'counselingCode' => $list['counselingCode'],
                'counselorName' => $list['counselorName'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
            ];
        }
        return $counselingList;
    }

}
