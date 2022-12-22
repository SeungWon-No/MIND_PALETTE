<?php

namespace App\Http\Controllers\Mobile\FreeAdvice;

use App\Http\Controllers\Controller;
use App\Http\Util\CounselingTemplate;
use App\Models\Questions;
use Illuminate\Http\Request;

class DepressionController extends Controller
{
    public function depressionStep1(Request $request, $counselingResultPK)
    {
        $questionsOption = CounselingTemplate::$depressionOption;
        return view("/mobile/freeAdvice/depression",[
            "questions" => Questions::findQuestions(287,
                $questionsOption["questionRange"]["step1"]["offset"],
                $questionsOption["questionRange"]["step1"]["limit"]
            ),
            "options" =>$questionsOption
        ]);
    }

    public function depressionStep2(Request $request, $counselingResultPK)
    {
        $questionsOption = CounselingTemplate::$depressionOption;
        return view("/mobile/freeAdvice/depression",[
            "questions" => Questions::findQuestions(287,
                $questionsOption["questionRange"]["step2"]["offset"],
                $questionsOption["questionRange"]["step2"]["limit"]
            ),
            "options" =>$questionsOption
        ]);
    }

    public function depressionStep3(Request $request, $counselingResultPK)
    {
        $questionsOption = CounselingTemplate::$depressionOption;
        return view("/mobile/freeAdvice/depression",[
            "questions" => Questions::findQuestions(287,
                $questionsOption["questionRange"]["step3"]["offset"],
                $questionsOption["questionRange"]["step3"]["limit"]
            ),
            "options" =>$questionsOption
        ]);
    }
}
