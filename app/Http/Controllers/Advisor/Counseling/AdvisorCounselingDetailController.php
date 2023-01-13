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
        $statusCode = [
            "279" => "상담하기",
            "280" => "상담중",
            "281" => "상담완료",
            "353" => "상담불가",
        ];
        $cssStyle = [
            "status" => "block",
            "editor" => "none"
        ];
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

        if ($getClientInfo["counselingStatus"] == 280 && $getClientInfo["advisorPK"] == $advisorPK) {
            $cssStyle["status"] = "none";
            $cssStyle["editor"] = "block";
        }

        return view("/advisor/counseling/counselingDetail", [
            "counselingPK" =>$counselingPK,
            "advisorProfile" => $advisorProfile,
            'clientInfo' => $getClientInfo,
            'statusCode' => $statusCode,
            'cssStyle' => $cssStyle,
            'images' => $images,
            "questions" => Questions::findAllQuestion(335),
            "answer" => $this->getAllAnswer($request, $counselingPK, 335, $getClientInfo['memberPK']),
            "temperamentTest"=>Answer::findTemperamentTest($counselingPK),
        ]);
    }

    public function counselingStatus(Request $request, $counselingPK) {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];

        if (Counseling::findMyCounseling($advisorPK) > 0) {
            $result = [
                "status" => "fail",
                "message" => "이미 상담중인 상담건이 존재합니다."
            ];
            return json_encode($result);
        }

        $counselingStatus = Counseling::findCounselingStatus($counselingPK);
        if ($counselingStatus->counselingStatus == 279) {
            try {
                $nowDate = date("Y-m-d H:i:s");
                $updateValue = [
                    "advisorPK" => $advisorPK,
                    "counselingStatus" => 280,
                    "startDate" => $nowDate,
                    "updateDate" => $nowDate,
                ];
                Counseling::updateCounselingStatus($counselingPK, $updateValue);

                $result = [
                    "status" => "success",
                ];
                return json_encode($result);
            }catch (\Exception $e) {
                $result = [
                    "status" => "fail",
                    "message" => "상담시작에 실패하였습니다. 증상이 계속되면 고객센터로 문의해주세요."
                ];
                return json_encode($result);
            }
        }
    }

    public function store(Request $request){

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
