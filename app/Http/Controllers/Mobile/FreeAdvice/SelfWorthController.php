<?php

namespace App\Http\Controllers\Mobile\FreeAdvice;

use App\Http\Controllers\Controller;
use App\Http\Util\CounselingTemplate;
use App\Models\Answer;
use App\Models\CounselingTemplateResult;
use App\Models\Questions;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelfWorthController extends Controller
{
    public function selfWorthStep1(Request $request, $counselingTemplatePK)
    {
        $questionsOption = CounselingTemplate::$selfWorthOption;
        $answer = null;
        $memberPK = "";
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
        }
        $freeCode = "";
        if ( Cookie::has('FREE_ADVICE') ) {
            $freeCode = Cookie::get('FREE_ADVICE');
        }

        $answer = $this->answerResult($memberPK, $freeCode,"step1",$questionsOption);
        return view("/mobile/freeAdvice/selfWorth",[
            "counselingTemplatePK" =>$counselingTemplatePK,
            "step" => "selfWorthStep1",
            "progressWidth" => 50,
            "questions" => Questions::findQuestions(289,
                $questionsOption["questionRange"]["step1"]["offset"],
                $questionsOption["questionRange"]["step1"]["limit"]
            ),
            "answer" => $answer,
            "options" => $questionsOption
        ]);
    }

    public function selfWorthStep2(Request $request, $counselingTemplatePK)
    {
        $questionsOption = CounselingTemplate::$selfWorthOption;
        $memberPK = "";
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
        }
        $freeCode = "";
        if ( Cookie::has('FREE_ADVICE') ) {
            $freeCode = Cookie::get('FREE_ADVICE');
        }

        $answer = $this->answerResult($memberPK, $freeCode,"step2",$questionsOption);
        return view("/mobile/freeAdvice/selfWorth",[
            "counselingTemplatePK" =>$counselingTemplatePK,
            "step" => "selfWorthStep2",
            "progressWidth" => 100,
            "questions" => Questions::findQuestions(289,
                $questionsOption["questionRange"]["step2"]["offset"],
                $questionsOption["questionRange"]["step2"]["limit"]
            ),
            "answer" => $answer,
            "options" => $questionsOption
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
        $questionsOption = CounselingTemplate::$selfWorthOption;
        $nowStep = "";
        $nextStep = "";
        $counselingStatus = "";
        switch ($request->step) {
            case "selfWorthStep1" :
                $nowStep = "step1";
                $counselingStatus = ($request->isClose == "true")? 298 : 299;
                $nextStep = "/selfWorthStep2/".$counselingTemplatePK;
                break;
            case "selfWorthStep2" :
                $nowStep = "step2";
                $counselingStatus = ($request->isClose == "true") ? 299 : 300;
                $nextStep = "/";
                break;
        }

        try {
            DB::beginTransaction();
            $questions = Questions::findQuestions(289,
                $questionsOption["questionRange"][$nowStep]["offset"],
                $questionsOption["questionRange"][$nowStep]["limit"]);

            foreach ($questions as $questionsRow) {
                $formName = "questions".$questionsRow->questionsPK;
                if ($request[$formName] != "") {
                    $updateAnswer = Answer::findAnswer($memberPK,$freeCode,$questionsRow->questionsPK,$counselingTemplatePK);
                    if ( $updateAnswer ) {
                        $updateValue = [
                            "answer" => $request[$formName],
                            "updateDate" => $nowDate
                        ];
                        Answer::updateAnswer($updateAnswer->answerPK,$updateValue);
                    } else {
                        $answer = new Answer;
                        $answer->questionsPK = $questionsRow->questionsPK;
                        $answer->counselingTemplatePK = $counselingTemplatePK;
                        $answer->answerType = 293;
                        if ( $memberPK != "") {
                            $answer->memberPK = $memberPK;
                        } else if ($freeCode != "") {
                            $answer->tempCounselingCode = $freeCode;
                        }
                        $answer->answer = $request[$formName];
                        $answer->updateDate = $nowDate;
                        $answer->createDate = $nowDate;
                        $answer->save();
                    }
                }
            }

            $counselingTemplate = \App\Models\CounselingTemplate::find($counselingTemplatePK);

            if ($request->step == "selfWorthStep2" && $request->isClose == "false") {

                $scoreResult = Answer::sumAnswerScore($counselingTemplatePK);
                $updateAnswer = Answer::findAnswer($memberPK,$freeCode,59,$counselingTemplatePK);
                if ( $updateAnswer ) {
                    $updateValue = [
                        "answer" => $scoreResult->sumScore,
                        "updateDate" => $nowDate
                    ];
                    Answer::updateAnswer($updateAnswer->answerPK,$updateValue);
                } else {
                    $answer = new Answer;
                    $answer->questionsPK = 59;
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

                $resultScore = CounselingTemplateResult::findResultScore($scoreResult->sumScore);
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


    private function answerResult($memberPK,$freeCode, $step, $questionsOption) {
        $returnValue = null;
        $answer = Answer::findAnswers($memberPK,$freeCode,289,
            $questionsOption["questionRange"][$step]["offset"],
            $questionsOption["questionRange"][$step]["limit"]);

        foreach ($answer as $answerRow) {
            $returnValue[$answerRow->questionsPK] = $answerRow;
        }
        return $returnValue;
    }
}
