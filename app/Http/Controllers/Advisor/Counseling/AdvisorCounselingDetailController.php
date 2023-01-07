<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Counseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdvisorCounselingDetailController extends Controller
{
    public function index(Request $request)
    {
        $getClientInfo = Counseling::find(1);
        $clientInfo = json_decode(json_encode($getClientInfo), true);
        $clientInfo = [
            'clientName' => Crypt::decryptString($clientInfo['counselorName']), // 상담 대상 이름
            'counselorBirthday' => Crypt::decryptString($clientInfo['counselorBirthday']), // 생년월일
            'counselorSchool' => $clientInfo['counselorSchool'], // 학교
            'counselorGender' => $clientInfo['counselorGender'],// 성별
            'hobby' => $clientInfo['hobby'], // 취미 
            'familyRelations1' => $clientInfo['familyRelations1'], // ex) x남 y녀 중 z째 
            'familyRelations2' => $clientInfo['familyRelations2'],
            'familyRelations3' => $clientInfo['familyRelations3'],
            'specialty' => $clientInfo['specialty'], // 특기
            'friendship' => $clientInfo['friendship'], // 친구들과의 관계
            'relationshipTeacher' => $clientInfo['relationshipTeacher'], // 선생님과의 관계
            'relationshipDad' => $clientInfo['relationshipDad'], // 아버지와의 관계
            'relationshipMother' => $clientInfo['relationshipMother'],// 어머니와의 관계
            'relationshipSiblings' => $clientInfo['relationshipSiblings'], // 형제 관계
            'relationshipSister' => $clientInfo['relationshipSister'],// 자매 관계
            'stressCauses' => $clientInfo['stressCauses'], // 가족 내력, 스트레스 요인
            'reasonInspection' => $clientInfo['reasonInspection'], // 심리 상담 사유    
        ];

        $image = Answer::findHTPImage(1);
        dd($image);
        return view("/advisor/counseling/counselingDetail", [
            'clientInfo' => $clientInfo
        ]);
    }
}