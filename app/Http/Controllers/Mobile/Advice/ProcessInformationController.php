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
            "progressWidth" => 42,
            "questions" => Questions::findAllQuestion(302),
            "answer" => $this->getAllAnswer($request,$counselingPK,302)
        ]);
    }
    public function answerTree(Request $request, $counselingPK) {
        return view("mobile/advice/answerTree",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 47.2,
            "questions" => Questions::findAllQuestion(303),
            "answer" => $this->getAllAnswer($request,$counselingPK,303)
        ]);
    }

    public function answerPerson1(Request $request, $counselingPK) {
        return view("mobile/advice/answerPerson1",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 52.4,
            "questions" => Questions::findAllQuestion(304),
            "answer" => $this->getAllAnswer($request,$counselingPK,304)
        ]);
    }
    public function answerPerson2(Request $request, $counselingPK) {
        return view("mobile/advice/answerPerson2",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 57.6,
            "questions" => Questions::findAllQuestion(305),
            "answer" => $this->getAllAnswer($request,$counselingPK,305)
        ]);
    }
    public function behaviorObservation(Request $request, $counselingPK) {
        return view("mobile/advice/behaviorObservation",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 62.8,
            "questions" => Questions::findAllQuestion(335),
            "answer" => $this->getAllAnswer($request,$counselingPK,335)
        ]);
    }
    public function temperamentTestInformation(Request $request, $counselingPK) {
        return view("mobile/advice/temperamentTestInformation",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 68,
        ]);
    }
    public function temperamentTestStep1(Request $request, $counselingPK) {
        return view("mobile/advice/temperamentTestStep",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 73.2,
            "questions" => Questions::findQuestions(336,0,10),
            "answer" => $this->getAnswerLimit($request,$counselingPK,336,0,10)
        ]);
    }

    public function temperamentTestStep2(Request $request, $counselingPK) {
        return view("mobile/advice/temperamentTestStep",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 78.4,
            "questions" => Questions::findQuestions(336,10,10),
            "answer" => $this->getAnswerLimit($request,$counselingPK,336,10,10)
        ]);
    }
    public function applicationFormInformation(Request $request, $counselingPK) {
        return view("mobile/advice/applicationFormInformation",[
            "counselingPK" => $counselingPK,
            "progressWidth" => 83.6,
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

    private function getAllAnswer($request, $counselingPK, $questionsType) {

        $memberPK = "";
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
        }

        $answers = Answer::findAllAnswer($memberPK,"",$questionsType, $counselingPK);

        $answerResult = array();
        foreach ($answers as $answerRow) {
            $answerResult[$answerRow->questionsPK] = $answerRow->answer;
        }

        return $answerResult;
    }

    private function getAnswerLimit($request, $counselingPK, $questionsType, $offset, $limit) {

        $memberPK = "";
        if ($request->session()->has("login")) {
            $memberPK = $request->session()->get('login')[0]['memberPK'];
        }

        $answers = Answer::findCounselingAnswers($memberPK,$questionsType, $counselingPK, $offset, $limit);

        $answerResult = array();
        foreach ($answers as $answerRow) {
            $answerResult[$answerRow->questionsPK] = $answerRow->answer;
        }

        return $answerResult;
    }
}
