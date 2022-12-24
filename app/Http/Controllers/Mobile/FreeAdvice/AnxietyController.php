<?php

namespace App\Http\Controllers\Mobile\FreeAdvice;

use App\Http\Controllers\Controller;
use App\Http\Util\CounselingTemplate;
use App\Models\Answer;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnxietyController extends Controller
{
    public function anxietyStep1(Request $request, $counselingTemplatePK)
    {
        $questionsOption = CounselingTemplate::$anxietyOption;
        $answer = null;
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
            $answer = $this->answerResult($memberPK,"step1",$questionsOption);
        }
        return view("/mobile/freeAdvice/anxiety",[
            "counselingTemplatePK" =>$counselingTemplatePK,
            "step" => "anxietyStep1",
            "progressWidth" => 33,
            "questions" => Questions::findQuestions(288,
                $questionsOption["questionRange"]["step1"]["offset"],
                $questionsOption["questionRange"]["step1"]["limit"]
            ),
            "answer" => $answer,
            "options" => $questionsOption
        ]);
    }

    public function anxietyStep2(Request $request, $counselingTemplatePK)
    {
        $questionsOption = CounselingTemplate::$anxietyOption;
        $answer = null;
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
            $answer = $this->answerResult($memberPK,"step2",$questionsOption);
        }
        return view("/mobile/freeAdvice/anxiety",[
            "counselingTemplatePK" =>$counselingTemplatePK,
            "step" => "anxietyStep2",
            "progressWidth" => 66,
            "questions" => Questions::findQuestions(288,
                $questionsOption["questionRange"]["step2"]["offset"],
                $questionsOption["questionRange"]["step2"]["limit"]
            ),
            "answer" => $answer,
            "options" => $questionsOption
        ]);
    }

    public function anxietyStep3(Request $request, $counselingTemplatePK)
    {
        $questionsOption = CounselingTemplate::$anxietyOption;
        $answer = null;
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
            $answer = $this->answerResult($memberPK,"step3",$questionsOption);
        }

        return view("/mobile/freeAdvice/anxiety",[
            "counselingTemplatePK" =>$counselingTemplatePK,
            "step" => "anxietyStep3",
            "progressWidth" => 100,
            "questions" => Questions::findQuestions(288,
                $questionsOption["questionRange"]["step3"]["offset"],
                $questionsOption["questionRange"]["step3"]["limit"]
            ),
            "answer" => $answer,
            "options" => $questionsOption
        ]);
    }


    public function create(Request $request, $counselingTemplatePK)
    {

        $memberPK = $request->session()->get('login')[0]['memberPK'];
        $nowDate = date("Y-m-d H:i:s");
        $questionsOption = CounselingTemplate::$depressionOption;
        $nowStep = "";
        $nextStep = "";
        $counselingStatus = "";
        switch ($request->step) {
            case "anxietyStep1" :
                $nowStep = "step1";
                $counselingStatus = 296;
                $nextStep = "/anxietyStep2/".$counselingTemplatePK;
                break;
            case "anxietyStep2" :
                $nowStep = "step2";
                $counselingStatus = 297;
                $nextStep = "/anxietyStep3/".$counselingTemplatePK;
                break;
            case "anxietyStep3" :
                $nowStep = "step3";
                $counselingStatus = 298;
                $nextStep = "/selfWorthStep1/".$counselingTemplatePK;
                break;
        }

        try {
            DB::beginTransaction();
            $questions = Questions::findQuestions(288,
                $questionsOption["questionRange"][$nowStep]["offset"],
                $questionsOption["questionRange"][$nowStep]["limit"]);

            foreach ($questions as $questionsRow) {
                $formName = "questions".$questionsRow->questionsPK;
                if ($request[$formName] != "") {
                    $updateAnswer = Answer::findAnswer($memberPK,$questionsRow->questionsPK,$counselingTemplatePK);
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
                        $answer->memberPK = $memberPK;
                        $answer->answer = $request[$formName];
                        $answer->updateDate = $nowDate;
                        $answer->createDate = $nowDate;
                        $answer->save();
                    }
                }
            }

            $counselingTemplate = \App\Models\CounselingTemplate::find($counselingTemplatePK);
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


    private function answerResult($memberPK, $step, $questionsOption) {
        $returnValue = null;
        $answer = Answer::findAnswers($memberPK,288,
            $questionsOption["questionRange"][$step]["offset"],
            $questionsOption["questionRange"][$step]["limit"]);

        foreach ($answer as $answerRow) {
            $returnValue[$answerRow->questionsPK] = $answerRow;
        }
        return $returnValue;
    }
}
