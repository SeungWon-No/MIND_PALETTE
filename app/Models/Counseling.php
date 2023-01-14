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

    public static function updateCounselingAdvisor($counselingPK, $advisorPK, $value) {
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
                    ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
                    ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "counseling.counselingStatus", "counseling.counselorStatus", "code.codeName" ,"answer")
                    ->where('answer.questionsPK', '68')
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
                'answer' => $list['answer'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
                'counselingStatus' => $list['counselingStatus'],
                'counselorStatus' => $list['counselorStatus'],
            ];
        }
        //dd($counselingList['data']);
        return $counselingList;
    }


    // 상담 대기 중인 건수
    public static function getWaitingCounselingCount(){
        return Counseling::where('counselingStatus', '=', '279')->count();
    }

    // 상담 완료 건수
    public static function getCompleteCounselingCount(){
        return Counseling::where('counselingStatus', '=', '281')->count();
    }

    // 상담 불가 건수
    public static function getImpossibleCounselingCount(){
        return Counseling::where('counselingStatus', '=', '353')->count();
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

    public static function getWaitingCounselingList(){

        $getWarningList = DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "counseling.counselingStatus", "counseling.counselorStatus", "code.codeName", "answer")
            ->where('counseling.memberPK', '>', '0')
            ->where('counseling.isDelete', '=', 'N')
            ->where('answer.questionsPK', '68')
            ->where("counseling.counselingStatus", "=", "279")
            ->orderBy("counselingPK", "DESC")
            ->paginate(10);

        $warningList = json_decode(json_encode($getWarningList), true);

        foreach($warningList['data'] as $key => $list){
            $warningList['data'][$key] = [
                'counselingPK' => $list['counselingPK'],
                'counselingCode' => $list['counselingCode'],
                'counselorName' => $list['counselorName'],
                'answer' => $list['answer'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
                'counselingStatus' => $list['counselingStatus'],
                'counselorStatus' => $list['counselorStatus'],
            ];
        }
        return $warningList;
    }

    // 주의/위험 수준 상담 리스트
    public static function getWarningCounselingList(){

        $getWarningList = DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "counseling.counselingStatus","counseling.counselorStatus", "code.codeName", "answer")
            ->where('counseling.memberPK', '>', '0')
            ->where('counseling.isDelete', '=', 'N')
            ->where('answer.questionsPK', '68')
            ->whereIn("counseling.counselorStatus",[355, 356])
            ->orderBy("counselingPK", "DESC")
            ->paginate(10);

        $warningList = json_decode(json_encode($getWarningList), true);

        foreach($warningList['data'] as $key => $list){
            $warningList['data'][$key] = [
                'counselingPK' => $list['counselingPK'],
                'counselingCode' => $list['counselingCode'],
                'counselorName' => $list['counselorName'],
                'answer' => $list['answer'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
                'counselingStatus' => $list['counselingStatus'],
                'counselorStatus' => $list['counselorStatus'],
            ];
        }
        return $warningList;
    }


    // 상담 완료 리스트
    public static function getCompleteCounselingList(){

        $getWarningList = DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday","counseling.counselingStatus","counseling.counselorStatus", "code.codeName", "answer")
            ->where('counseling.memberPK', '>', '0')
            ->where('counseling.isDelete', '=', 'N')
            ->where('answer.questionsPK', '68')
            ->where("counseling.counselingStatus", "=", "281")
            ->orderBy("counselingPK", "DESC")
            ->paginate(10);

        $warningList = json_decode(json_encode($getWarningList), true);

        foreach($warningList['data'] as $key => $list){
            $warningList['data'][$key] = [
                'counselingPK' => $list['counselingPK'],
                'counselingCode' => $list['counselingCode'],
                'counselorName' => $list['counselorName'],
                'answer' => $list['answer'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
                'counselingStatus' => $list['counselingStatus'],
                'counselorStatus' => $list['counselorStatus'],
            ];
        }
        return $warningList;
    }

    // 상담 불가 리스트
    public static function getImpossibleCounselingList(){

        $getWarningList = DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "counseling.counselingStatus","counseling.counselorStatus", "code.codeName", "answer")
            ->where('counseling.memberPK', '>', '0')
            ->where('counseling.isDelete', '=', 'N')
            ->where('answer.questionsPK', '68')
            ->where("counseling.counselingStatus", "=", "353")
            ->orderBy("counselingPK", "DESC")
            ->paginate(10);

        $warningList = json_decode(json_encode($getWarningList), true);

        foreach($warningList['data'] as $key => $list){
            $warningList['data'][$key] = [
                'counselingPK' => $list['counselingPK'],
                'counselingCode' => $list['counselingCode'],
                'counselorName' => $list['counselorName'],
                'answer' => $list['answer'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
                'counselingStatus' => $list['counselingStatus'],
                'counselorStatus' => $list['counselorStatus'],
            ];
        }
        return $warningList;
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

        return Counseling::join('code as codeGender', 'counseling.counselorGender', '=', 'codeGender.codePK')
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
                             "counseling.counselingResult",
                             "counseling.reasonInspection",
                             "counseling.counselingStatus",
                             "counseling.counselorStatus",
                             "counseling.rating",
                             "counseling.review",
                             "counseling.startDate",
                             "counseling.createDate",
                             )
                    ->where('counseling.counselingPK', '=', $counselingPK)
                    ->orderBy("counselingPK", "DESC")
                    ->get()->first();

    }

    public static function findWaitCounseling()
    {
        return Counseling::join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName","answer")
            ->where('answer.questionsPK', '68')
            ->where('counseling.memberPK', '>', '0')
            ->where("counseling.counselingStatus",279)
            ->orderBy("counselingPK", "DESC")
            ->limit(10)->get();
    }

    public static function searchingCounselorNameWithoutPeriod($searchingText)
    {
        $pagination= DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "counseling.counselingStatus","counseling.counselorStatus", "code.codeName", "answer")
            ->where('counseling.memberPK', '>', '0')
            ->whereIn("counseling.counselingStatus",[279,280,281,353])
            ->where('counseling.counselorName', 'like', '%'. $searchingText .'%')
            ->orderBy("counselingPK", "DESC")
            ->paginate(10);

        $counselingList = json_decode(json_encode($pagination), true);

        foreach($counselingList['data'] as $key => $list){
            $counselingList['data'][$key] = [
                'counselingPK' => $list['counselingPK'],
                'counselingCode' => $list['counselingCode'],
                'counselorName' => $list['counselorName'],
                'answer' => $list['answer'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
                'counselingStatus' => $list['counselingStatus'],
                'counselorStatus' => $list['counselorStatus'],
            ];
        }
        return $counselingList;
    }

    public static function searchingCounselorCodeWithoutPeriod($searchingText)
    {
        $pagination= DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "counseling.counselingStatus","counseling.counselorStatus", "code.codeName", "answer")
            ->where('counseling.memberPK', '>', '0')
            ->whereIn("counseling.counselingStatus",[279,280,281,353])
            ->where('counseling.counselingCode', 'like', '%'. $searchingText .'%')
            ->orderBy("counselingPK", "DESC")
            ->paginate(10);

        $counselingList = json_decode(json_encode($pagination), true);

        foreach($counselingList['data'] as $key => $list){
            $counselingList['data'][$key] = [
                'counselingPK' => $list['counselingPK'],
                'counselingCode' => $list['counselingCode'],
                'counselorName' => $list['counselorName'],
                'answer' => $list['answer'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
                'counselingStatus' => $list['counselingStatus'],
                'counselorStatus' => $list['counselorStatus'],
            ];
        }
        return $counselingList;
    }


    public static function searchingCounselorName($searchingText, $sdate, $edate)
    {
        $pagination= DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "counseling.counselingStatus","counseling.counselorStatus", "code.codeName", "answer")
            ->where('counseling.memberPK', '>', '0')
            ->whereIn("counseling.counselingStatus",[279,280,281,353])
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
                'answer' => $list['answer'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
                'counselingStatus' => $list['counselingStatus'],
                'counselorStatus' => $list['counselorStatus'],
            ];
        }
        return $counselingList;
    }

    public static function searchingCounselorCode($searchingText, $sdate, $edate)
    {
        $pagination= DB::table('counseling')
            ->join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "counseling.counselingStatus","counseling.counselorStatus", "code.codeName", "answer")
            ->where('counseling.memberPK', '>', '0')
            ->whereIn("counseling.counselingStatus",[279,280,281,353])
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
                'answer' => $list['answer'],
                'counselorBirthday' => Crypt::decryptString($list['counselorBirthday']),
                'counselorGender' => $list['codeName'],
                'counselingStatus' => $list['counselingStatus'],
                'counselorStatus' => $list['counselorStatus'],
            ];
        }
        return $counselingList;
    }

    public static function findCounselingRating($advisorPK, $rating){
        return Counseling::where("advisorPK",$advisorPK)
                ->where("counselingStatus",281)
                ->where("rating",$rating)
                ->get()->count();
    }


    public static function findRecentCounseling($advisorPK){
        return Counseling::join('code', 'counseling.counselorGender', '=', 'code.codePK')
            ->join('answer', 'counseling.counselingPK', '=', 'answer.counselingPK')
            ->select("counseling.counselingPK", "counseling.counselingCode", "counseling.counselorName", "counseling.counselorBirthday", "code.codeName","answer")
            ->where('answer.questionsPK', '68')
            ->where('counseling.memberPK', '>', '0')
            ->where('counseling.advisorPK', $advisorPK)
            ->whereIn("counseling.counselingStatus",[280,281])
            ->orderBy("counseling.updateDate", "DESC")
            ->limit(3)->get();
    }
    public static function findCompleteCounseling($advisorPK){
        return Counseling::where("advisorPK",$advisorPK)
            ->where("counselingStatus",281)
            ->get()->count();
    }

    public static function findWritingCounseling($advisorPK){
        return Counseling::where("advisorPK",$advisorPK)
            ->where("counselingStatus",280)
            ->get()->first();
    }

    public static function findTodayCounseling(){
        $day = date("Y-m-d");
        return Counseling::where("createDate",">=",$day." 00:00:00")
                ->where("createDate","<=",$day." 23:59:59")
                ->get()->count();
    }
    public static function findTodayCompleteCounseling(){
        $day = date("Y-m-d");
        return Counseling::where("updateDate",">=",$day." 00:00:00")
            ->where("updateDate","<=",$day." 23:59:59")
            ->where("counselingStatus",281)
            ->get()->count();
    }
}
