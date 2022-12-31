<?php

namespace App\Http\Controllers\Mobile\Advice;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Questions;
use Illuminate\Http\Request;

class ProcessInformationController extends Controller
{
    public function __invoke(Request $request, $counselingPK)
    {
        return view("mobile/advice/processInformation",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 5.2
        ]);
    }

    public function adviceInformation(Request $request, $counselingPK) {
        return view("mobile/advice/adviceInformation",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 10.4
        ]);
    }
    public function paintingHouseTimer(Request $request, $counselingPK) {
        return view("mobile/advice/paintingHouseTimer",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 15.6,
            "answer" => $this->getAnswer($request,$counselingPK,302,[60,61,62])
        ]);
    }
    public function paintingTreeTimer(Request $request, $counselingPK) {
        return view("mobile/advice/paintingTreeTimer",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 21.2,
            "answer" => $this->getAnswer($request,$counselingPK,303,[70,71,72])
        ]);
    }
    public function paintingPerson1Timer(Request $request, $counselingPK) {
        return view("mobile/advice/paintingPerson1Timer",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 26.4,
            "answer" => $this->getAnswer($request,$counselingPK,304,[97,79,80,81])
        ]);
    }
    public function paintingPerson2Timer(Request $request, $counselingPK) {
        return view("mobile/advice/paintingPerson2Timer",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 31.6,
            "answer" => $this->getAnswer($request,$counselingPK,305,[98,89,90])
        ]);
    }
    public function answerInformation(Request $request, $counselingPK) {
        return view("mobile/advice/answerInformation",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 36.8
        ]);
    }

    public function answerHouse(Request $request, $counselingPK) {
        return view("mobile/advice/answerHouse",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 42
        ]);
    }
    private function getAnswer($request, $counselingPK, $questionsType, $key) {

        $memberPK = "";
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
        }

        $answers = Answer::findSpecificAnswers($memberPK,"",$counselingPK,$questionsType,$key);

        $answerResult = array();
        foreach ($answers as $answerRow) {
            $answerResult[$answerRow->questionsPK] = $answerRow->answer;
        }

        return $answerResult;
    }
}
