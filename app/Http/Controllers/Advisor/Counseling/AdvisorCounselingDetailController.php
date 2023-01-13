<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Answer;
use App\Models\Counseling;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdvisorCounselingDetailController extends Controller
{
    public function index(Request $request)
    {
        
    }

    public function show(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        
        $sliceUrl = explode('/', $request->url());
        $counselingPK = $sliceUrl[5];

        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        $getClientInfo = Counseling::getCounselingDetail($counselingPK);
        $images = Answer::findHTPImage($counselingPK);
        
        return view("/advisor/counseling/counselingDetail", [
            "advisorProfile" => $advisorProfile,
            'clientInfo' => $getClientInfo,
            'images' => $images,
            "questions" => Questions::findAllQuestion(335),
            "answer" => $this->getAllAnswer($request, $counselingPK, 335, $getClientInfo['memberPK']),
            "temperamentTest"=>Answer::findTemperamentTest($counselingPK),
        ]);
        
    }

    private function getAllAnswer($request, $counselingPK, $questionsType, $memberPK) {

        $answers = Answer::findAllAnswer($memberPK,"",$questionsType, $counselingPK);
        
        $answerResult = array();
        foreach ($answers as $answerRow) {
            $answerResult[$answerRow->questionsPK] = $answerRow->answer;
        }
        return $answerResult;
    }
}