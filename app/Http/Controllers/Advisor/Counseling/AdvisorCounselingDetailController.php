<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Answer;
use App\Models\Counseling;
use App\Models\CounselingTemplateResult;
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

        $timer = [
            "hour" => "24",
            "minute" => "0"
        ];

        if ($getClientInfo['startDate'] != "") {
            $nowTime = date("Y-m-d H:i:s");
            $startTime = $getClientInfo['startDate'];
            $diffTime = strtotime($nowTime) - strtotime($startTime);
            $diffHour = ceil($diffTime / (60*60));

            if ($diffHour >= 24) {
                $timer["hour"] = "0";
                $timer["minute"] = "0";
            } else {
                $addOneDay = date("Y-m-d H:i:s", strtotime($startTime."+1 days"));
                $diffTime = strtotime($addOneDay) - strtotime($nowTime);
                $timer["hour"] = floor($diffTime / (60*60));
                $timer["minute"] = floor(($diffTime-($timer["hour"]*60*60)) / 60);
            }
        }


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
            "timer" => $timer,
            'images' => $images,
            "waiteCounseling" => Counseling::findWaitCounseling(),
            "houseQuestions" => Questions::findAllQuestion(302),
            "houseAnswer" => $this->getAllAnswer($request,$counselingPK,302, $getClientInfo['memberPK']),
            "treeQuestions" => Questions::findAllQuestion(303),
            "treeAnswer" => $this->getAllAnswer($request,$counselingPK,303, $getClientInfo['memberPK']),
            "person1Questions" => Questions::findAllQuestion(304),
            "person1Answer" => $this->getAllAnswer($request,$counselingPK,304, $getClientInfo['memberPK']),
            "person2Questions" => Questions::findAllQuestion(305),
            "person2Answer" => $this->getAllAnswer($request,$counselingPK,305, $getClientInfo['memberPK']),
            "writeFormat" => CounselingTemplateResult::findAdvisorWriteFormat(),
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

    public function counselingCancel(Request $request, $counselingPK) {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        try {
            $nowDate = date("Y-m-d H:i:s");
            $updateValue = [
                "advisorPK" => null,
                "counselingResult" => '',
                "counselingStatus" => 279,
                "startDate" => null,
                "updateDate" => $nowDate,
            ];
            Counseling::updateCounselingAdvisor($counselingPK, $advisorPK, $updateValue);

            $result = [
                "status" => "success",
                "message" => "상담 취소되었습니다.",
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

    public function update(Request $request, $counselingPK) {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        try {
            $content = $request->counselingResult ?? '';
            $counselorStatus = $request->counselorStatus ?? '354';
            $type = $request->submitType ?? '';



            $nowDate = date("Y-m-d H:i:s");
            $updateValue = [
                "counselingResult" => $content,
                "counselorStatus" => $counselorStatus,
                "updateDate" => $nowDate,
            ];

            if ($type == "write") {
                $updateValue["counselingStatus"] = "281";
            }

            Counseling::updateCounselingAdvisor($counselingPK, $advisorPK, $updateValue);

            if ($type == "temp") {
                return redirect('/advisor/counselingDetail/'.$counselingPK)->with('error', '임시저장 되었습니다.');
            } else {
                return redirect('/advisor/counselingDetail/'.$counselingPK);
            }

        }catch (Exception $e) {
            return redirect('/advisor/counselingDetail/'.$counselingPK)->with('error', '상담 저장에 실패하였습니다. 증상이 계속되면 고객센터로 문의해주세요.');
        }
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
