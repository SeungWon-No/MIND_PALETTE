<?php

namespace App\Http\Controllers\Mobile\FreeAdvice;

use App\Http\Controllers\Controller;
use App\Http\Util\CounselingTemplate;
use App\Models\Answer;
use App\Models\CounselingTemplateResult;
use App\Models\Questions;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DepressionController extends Controller
{
    public function depressionStep1(Request $request, $counselingTemplatePK)
    {
        $questionsOption = CounselingTemplate::$depressionOption;
        $answer = null;
        $memberPK = "";
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
        }
        $freeCode = "";
        if ( Cookie::has('FREE_ADVICE') ) {
            $freeCode = Cookie::get('FREE_ADVICE');
        }

        $answer = $this->answerResult($memberPK, $freeCode,"step1",$questionsOption, $counselingTemplatePK);
        return view("/mobile/freeAdvice/depression",[
            "counselingTemplatePK" =>$counselingTemplatePK,
            "step" => "depressionStep1",
            "progressWidth" => 33,
            "questions" => Questions::findQuestions(287,
                $questionsOption["questionRange"]["step1"]["offset"],
                $questionsOption["questionRange"]["step1"]["limit"]
            ),
            "answer" => $answer,
            "options" => $questionsOption,
            "backUrl" => "/freeAdviceRequest"
        ]);
    }

    public function depressionStep2(Request $request, $counselingTemplatePK)
    {
        $questionsOption = CounselingTemplate::$depressionOption;
        $answer = null;
        $memberPK = "";
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
        }
        $freeCode = "";
        if ( Cookie::has('FREE_ADVICE') ) {
            $freeCode = Cookie::get('FREE_ADVICE');
        }

        $answer = $this->answerResult($memberPK, $freeCode,"step2",$questionsOption, $counselingTemplatePK);
        return view("/mobile/freeAdvice/depression",[
            "counselingTemplatePK" =>$counselingTemplatePK,
            "step" => "depressionStep2",
            "progressWidth" => 66,
            "questions" => Questions::findQuestions(287,
                $questionsOption["questionRange"]["step2"]["offset"],
                $questionsOption["questionRange"]["step2"]["limit"]
            ),
            "answer" => $answer,
            "options" => $questionsOption,
            "backUrl" => "/depressionStep1/".$counselingTemplatePK
        ]);
    }

    public function depressionStep3(Request $request, $counselingTemplatePK)
    {
        $questionsOption = CounselingTemplate::$depressionOption;
        $answer = null;
        $memberPK = "";
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
        }
        $freeCode = "";
        if ( Cookie::has('FREE_ADVICE') ) {
            $freeCode = Cookie::get('FREE_ADVICE');
        }

        $answer = $this->answerResult($memberPK, $freeCode,"step3",$questionsOption, $counselingTemplatePK);

        return view("/mobile/freeAdvice/depression",[
            "counselingTemplatePK" =>$counselingTemplatePK,
            "step" => "depressionStep3",
            "progressWidth" => 100,
            "questions" => Questions::findQuestions(287,
                $questionsOption["questionRange"]["step3"]["offset"],
                $questionsOption["questionRange"]["step3"]["limit"]
            ),
            "answer" => $answer,
            "options" => $questionsOption,
            "backUrl" => "/depressionStep2/".$counselingTemplatePK
        ]);
    }

    public function depressionResult(Request $request, $counselingTemplatePK) {

        $counselingTemplate = \App\Models\CounselingTemplate::findCounselingTemplateAnswer($counselingTemplatePK,129);
        $result = CounselingTemplateResult::find($counselingTemplate->counselingTemplateResultPK);

        $colorClass = ["green","orange","orange","red"];
        $freeInfoData = [
            "title" => "우리 아이 우울 검사 결과",
            "name" => $counselingTemplate->counselorName,
            "code" => $counselingTemplate->counselingTemplateCode,
            "createDate" => $counselingTemplate->createDate,
            "levelClass" => "", //three
            "levelIcon" => ($result->resultScore+1),
            "level" => $result->resultScore,
            "label" => "우울", //우울, 불안, 자아존중감,
            "levelWidth" => ($result->resultScore+1)*25,
            "iconType" => "1",
            "score" => $counselingTemplate->answer,
            "statusText" => $result->counselingTitle,
            "resultText" => $result->counselingResult,
            "isLogin" => $request->session()->has("login"),
            "infoText" => "※채점 방식 : 역채점 없음"
        ];

        return view("/mobile/freeAdvice/result",[
            "freeInfoData" =>  $freeInfoData,
            "colorClass" => $colorClass
        ]);
    }


    public function create(Request $request, $counselingTemplatePK)
    {
        $memberPK = "";
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
        }
        $freeCode = "";
        if ( Cookie::has('FREE_ADVICE') ) {
            $freeCode = Cookie::get('FREE_ADVICE');
        }

        $nowDate = date("Y-m-d H:i:s");
        $questionsOption = CounselingTemplate::$depressionOption;
        $nowStep = "";
        $nextStep = "";
        $counselingStatus = "";
        switch ($request->step) {
            case "depressionStep1" :
                $nowStep = "step1";
                $counselingStatus = ($request->isClose == "true") ? 290 : 291;
                $nextStep = "/depressionStep2/".$counselingTemplatePK;
                break;
            case "depressionStep2" :
                $nowStep = "step2";
                $counselingStatus = ($request->isClose == "true") ? 291 : 292;
                $nextStep = "/depressionStep3/".$counselingTemplatePK;
                break;
            case "depressionStep3" :
                $nowStep = "step3";
                $counselingStatus = ($request->isClose == "true") ? 292 : 349;
                $nextStep = "/depressionResult/".$counselingTemplatePK;
                break;
        }

        try {
            DB::beginTransaction();
            $questions = Questions::findQuestions(287,
                $questionsOption["questionRange"][$nowStep]["offset"],
                $questionsOption["questionRange"][$nowStep]["limit"]);

            foreach ($questions as $questionsRow) {
                $formName = "questions".$questionsRow->questionsPK;
                if (isset($request[$formName])) {
                    $updateAnswer = Answer::findAnswer($memberPK,$freeCode,$questionsRow->questionsPK,$counselingTemplatePK);

                    if ( $updateAnswer ) {
                        $updateValue = [
                            "answer" => $request[$formName],
                            "updateDate" => $nowDate
                        ];
                        Answer::updateAnswer($updateAnswer->answerPK,$updateValue);
                    } else {
                        $answer = new Answer;
                        if ( $memberPK != "") {
                            $answer->memberPK = $memberPK;
                        } else if ($freeCode != "") {
                            $answer->tempCounselingCode = $freeCode;
                        }

                        $answer->questionsPK = $questionsRow->questionsPK;
                        $answer->counselingTemplatePK = $counselingTemplatePK;
                        $answer->answerType = 293;
                        $answer->answer = $request[$formName];
                        $answer->updateDate = $nowDate;
                        $answer->createDate = $nowDate;
                        $answer->save();
                    }
                }
            }

            $counselingTemplate = \App\Models\CounselingTemplate::find($counselingTemplatePK);

            if ( $counselingStatus == 349) {
                $scoreResult = Answer::sumCounselingTemplateAnswerType($counselingTemplatePK,287);
                $updateAnswer = Answer::findAnswer($memberPK,$freeCode,129,$counselingTemplatePK);
                if ( $updateAnswer ) {
                    $updateValue = [
                        "answer" => $scoreResult->sumScore,
                        "updateDate" => $nowDate
                    ];
                    Answer::updateAnswer($updateAnswer->answerPK,$updateValue);
                } else {
                    $answer = new Answer;
                    $answer->questionsPK = 129;
                    $answer->counselingTemplatePK = $counselingTemplatePK;
                    $answer->answerType = 294;
                    if ( $memberPK != "") {
                        $answer->memberPK = $memberPK;
                    } else if ($freeCode != "") {
                        $answer->tempCounselingCode = $freeCode;
                    }
                    $answer->answer = $scoreResult->sumScore;
                    $answer->updateDate = $nowDate;
                    $answer->createDate = $nowDate;
                    $answer->save();
                }

                $resultScore = CounselingTemplateResult::findResultScore(349,$scoreResult->sumScore);

                if ($resultScore) {
                    $counselingTemplate->counselingTemplateResultPK = $resultScore->counselingTemplateResultPK;
                }
            }

            $counselingTemplate->counselingStatus = $counselingStatus;
            $counselingTemplate->updateDate = $nowDate;
            $counselingTemplate->save();

            DB::commit();
            return json_encode([
                "status" => "success",
                "nextStep" => $nextStep
            ]);
        }catch (\Exception $e) {
            DB::rollBack();
            return json_encode([
                "status" => "fail",
                "message" => "무료 상담 오류입니다. 증상이 계속되면 관리자에게 문의해주세요"
            ]);
        }
    }


    private function answerResult($memberPK, $freeCode, $step, $questionsOption, $counselingTemplatePK) {
        $returnValue = null;
        $answer = Answer::findAnswers($memberPK, $freeCode, $counselingTemplatePK,287,
            $questionsOption["questionRange"][$step]["offset"],
            $questionsOption["questionRange"][$step]["limit"]);

        foreach ($answer as $answerRow) {
            $returnValue[$answerRow->questionsPK] = $answerRow;
        }
        return $returnValue;
    }
}
