<?php

namespace App\Http\Controllers\Advisor\Counseling;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Answer;
use App\Models\Career;
use App\Models\Code;
use App\Models\Counseling;
use App\Models\CounselingCancelLog;
use App\Models\CounselingLog;
use App\Models\CounselingTemplateResult;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

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
            "editor" => "none",
            "result" => "none"
        ];


        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $sliceUrl = explode('/', $request->url());
        $counselingPK = $sliceUrl[5];

        $getClientInfo = Counseling::getCounselingDetail($counselingPK);
        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        $takeCounselingAdvisorProfile = Advisor::getTakeCounselingAdvisorProfile($getClientInfo->advisorPK); // 상담 진행한 상담사 프로필
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
                $timer["hour"] = ($timer["hour"] < 10) ? "0".$timer["hour"] :$timer["hour"];
                $timer["minute"] = ($timer["minute"] < 10) ? "0".$timer["minute"] :$timer["minute"];
            }
        }

        if ($getClientInfo["counselingStatus"] == 280 && $getClientInfo["advisorPK"] == $advisorPK) {
            $cssStyle["status"] = "none";
            $cssStyle["editor"] = "block";
            $cssStyle["result"] = "none";
        }

        if ($getClientInfo["counselingStatus"] == 281) {
            $cssStyle["status"] = "none";
            $cssStyle["editor"] = "none";
            $cssStyle["result"] = "block";
        }

        $advisorProfile["career"] = Career::findCareerLimit($getClientInfo->advisorPK, 3);
        return view("/advisor/counseling/counselingDetail", [
            "counselingPK" =>$counselingPK,
            "advisorProfile" => $advisorProfile,
            "takeCounselingAdvisorProfile" => $takeCounselingAdvisorProfile,
            'clientInfo' => $getClientInfo,
            'statusCode' => $statusCode,
            'cssStyle' => $cssStyle,
            "schoolCode" => Code::findCodeType("school"),
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
                "message" => "이 상담은 상담이 불가합니다."
            ];
            return json_encode($result);
        }

        $counselingStatus = Counseling::findCounselingStatus($counselingPK);
        if ($counselingStatus->counselingStatus == 279) {
            try {
                DB::beginTransaction();

                $nowDate = date("Y-m-d H:i:s");

                $advisor = Advisor::find($advisorPK);
                $advisor->counselingCount = $advisor->counselingCount+1;
                $advisor->save();

                $counselingLog = new CounselingLog;
                $counselingLog->advisorPK = $advisorPK;
                $counselingLog->counselingPK = $counselingPK;
                $counselingLog->counselingStatus = 280;
                $counselingLog->createDate = $nowDate;
                $counselingLog->save();

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
                DB::commit();
                return json_encode($result);
            }catch (\Exception $e) {
                DB::rollBack();
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
            DB::beginTransaction();
            $nowDate = date("Y-m-d H:i:s");

            $cancelReason = $request->cancelReason ?? '';
            $timeout = $request->timeout ?? '';
            $etcCancelReason = $request->etcCancelReason ?? '';
            if ($timeout == "true") {
                $cancelReason = "timeout";
            } else {
                if ($cancelReason == "etc") {
                    $cancelReason = str_replace("\n","<br/>",htmlspecialchars(urldecode($etcCancelReason)));
                }
            }

            $cancelLog = new CounselingCancelLog;
            $cancelLog->advisorPK = $advisorPK;
            $cancelLog->reason = $cancelReason;
            $cancelLog->counselingPK = $counselingPK;
            $cancelLog->createDate = $nowDate;
            $cancelLog->save();

            $advisor = Advisor::find($advisorPK);
            $advisor->counselingCount = $advisor->counselingCount-1;
            $advisor->save();

            $counselingLog = new CounselingLog;
            $counselingLog->advisorPK = $advisorPK;
            $counselingLog->counselingPK = $counselingPK;
            $counselingLog->counselingStatus = 279;
            $counselingLog->createDate = $nowDate;
            $counselingLog->save();

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
            DB::commit();
            return json_encode($result);
        }catch (\Exception $e) {
            DB::rollBack();
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
            DB::beginTransaction();
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

                $counselingLog = new CounselingLog;
                $counselingLog->advisorPK = $advisorPK;
                $counselingLog->counselingPK = $counselingPK;
                $counselingLog->counselingStatus = 281;
                $counselingLog->createDate = $nowDate;
                $counselingLog->save();
            }

            Counseling::updateCounselingAdvisor($counselingPK, $advisorPK, $updateValue);

            DB::commit();
            if ($type == "temp") {
                return redirect('/advisor/counselingDetail/'.$counselingPK)->with('error', '임시저장 되었습니다.');
            } else {
                return redirect('/advisor/counselingDetail/'.$counselingPK);
            }

        }catch (\Exception $e) {
            DB::rollBack();
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

    // 작성 가이드
    public function counselingStructureGuide(){
        return view('/advisor/counseling/counselingStructureGuide');
    }

    public function counselingContentGuide(){
        return view('/advisor/counseling/counselingContentGuide');
    }
}
