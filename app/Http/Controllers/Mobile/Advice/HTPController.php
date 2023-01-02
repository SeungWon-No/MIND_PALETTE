<?php

namespace App\Http\Controllers\Mobile\Advice;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Code;
use App\Models\Counseling;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HTPController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function save(Request $request, $counselingPK) {
        $URLSplit = explode("/", url()->previous());
        $nowURL = $URLSplit[3];
        $isClose = $request->isClose ?? "false";

        $pageOrder = $this->getAdviceOrder();
        $pageStatus = $this->getPageStatus($nowURL,$pageOrder);
        $pageStatus["counselingPK"] = $counselingPK;

        switch ($nowURL) {
            case "adviceInformation":
            case "temperamentTestInformation":
            case "applicationFormInformation":
                return $this->saveInformation($isClose, $pageStatus);
            case "paintingHouseTimer":
                return $this->paintingHouseTimer($request, $counselingPK, $isClose, $pageStatus);
            case "paintingTreeTimer":
                return $this->paintingTreeTimer($request, $counselingPK, $isClose, $pageStatus);
            case "paintingPerson1Timer":
                return $this->paintingPerson1Timer($request, $counselingPK, $isClose, $pageStatus);
            case "paintingPerson2Timer":
                return $this->paintingPerson2Timer($request, $counselingPK, $isClose, $pageStatus);
            case "answerInformation":
                return $this->answerInformation($isClose, $pageStatus);
            case "answerHouse":
            case "answerTree":
            case "answerPerson1":
            case "answerPerson2":
            case "behaviorObservation":
                return $this->saveAnswer($request, $counselingPK, $isClose, $pageStatus);
            case "temperamentTestStep1":
            case "temperamentTestStep2":
                return $this->saveAnswer($request, $counselingPK, $isClose, $pageStatus,"empty");
        }

        dd($pageStatus);
    }

    private function saveInformation($isClose, $pageStatus) {
        $nowDate = date("Y-m-d H:i:s");

        $result = [
            "status" => "fail",
            "message" => "상담 신청 오류입니다. 증상이 계속되면 관리자에게 문의해주세요 [1]"
        ];

        try {
            DB::beginTransaction();

            $counselingStatus = ($isClose == "true") ? $pageStatus["nowPageCode"] : $pageStatus["nextPageCode"];
            if ($isClose == "true") {
                $nextStep = "/";
            } else {
                $nextStep = "/".$pageStatus["nextPage"]."/".$pageStatus["counselingPK"];
            }
            $this->updateCounselingStatus($pageStatus["counselingPK"], $counselingStatus, $nowDate);

            $result = [
                "status" => "success",
                "message" => "",
                "nextStep" => $nextStep
            ];

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return json_encode($result);
    }

    private function paintingHouseTimer($request, $counselingPK, $isClose, $pageStatus) {

        $nowDate = date("Y-m-d H:i:s");

        $result = [
            "status" => "fail",
            "message" => "상담 신청 오류입니다. 증상이 계속되면 관리자에게 문의해주세요 [1]"
        ];
        try {
            DB::beginTransaction();

            $counselingStatus = ($isClose == "true") ? $pageStatus["nowPageCode"] : $pageStatus["nextPageCode"];
            if ($isClose == "true") {
                $nextStep = "/";
            } else {
                $nextStep = "/".$pageStatus["nextPage"]."/".$pageStatus["counselingPK"];
            }

            if ($request["questions60"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 60, $request["questions60"], $nowDate);
            }

            if ($request["questions61"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 61, $request["questions61"], $nowDate);
            }

            if ($request["questions62"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 62, $request["questions62"], $nowDate);
            }

            $this->updateCounselingStatus($pageStatus["counselingPK"], $counselingStatus, $nowDate);

            $result = [
                "status" => "success",
                "message" => "",
                "nextStep" => $nextStep
            ];

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return json_encode($result);
    }
    private function paintingTreeTimer($request, $counselingPK, $isClose, $pageStatus) {

        $nowDate = date("Y-m-d H:i:s");

        $result = [
            "status" => "fail",
            "message" => "상담 신청 오류입니다. 증상이 계속되면 관리자에게 문의해주세요 [1]"
        ];
        try {
            DB::beginTransaction();

            $counselingStatus = ($isClose == "true") ? $pageStatus["nowPageCode"] : $pageStatus["nextPageCode"];
            if ($isClose == "true") {
                $nextStep = "/";
            } else {
                $nextStep = "/".$pageStatus["nextPage"]."/".$pageStatus["counselingPK"];
            }

            if ($request["questions70"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 70, $request["questions70"], $nowDate);
            }

            if ($request["questions71"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 71, $request["questions71"], $nowDate);
            }

            if ($request["questions72"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 72, $request["questions72"], $nowDate);
            }

            $this->updateCounselingStatus($pageStatus["counselingPK"], $counselingStatus, $nowDate);

            $result = [
                "status" => "success",
                "message" => "",
                "nextStep" => $nextStep
            ];

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return json_encode($result);
    }
    private function paintingPerson1Timer($request, $counselingPK, $isClose, $pageStatus) {

        $nowDate = date("Y-m-d H:i:s");

        $result = [
            "status" => "fail",
            "message" => "상담 신청 오류입니다. 증상이 계속되면 관리자에게 문의해주세요 [1]"
        ];
        try {
            DB::beginTransaction();

            $counselingStatus = ($isClose == "true") ? $pageStatus["nowPageCode"] : $pageStatus["nextPageCode"];
            if ($isClose == "true") {
                $nextStep = "/";
            } else {
                $nextStep = "/".$pageStatus["nextPage"]."/".$pageStatus["counselingPK"];
            }

            if ($request["questions97"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 97, $request["questions97"], $nowDate);
            }

            if ($request["questions79"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 79, $request["questions79"], $nowDate);
            }

            if ($request["questions80"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 80, $request["questions80"], $nowDate);
            }

            if ($request["questions81"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 81, $request["questions81"], $nowDate);
            }

            $this->updateCounselingStatus($pageStatus["counselingPK"], $counselingStatus, $nowDate);

            $result = [
                "status" => "success",
                "message" => "",
                "nextStep" => $nextStep
            ];

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return json_encode($result);
    }


    private function paintingPerson2Timer($request, $counselingPK, $isClose, $pageStatus) {

        $nowDate = date("Y-m-d H:i:s");

        $result = [
            "status" => "fail",
            "message" => "상담 신청 오류입니다. 증상이 계속되면 관리자에게 문의해주세요 [1]"
        ];
        try {
            DB::beginTransaction();

            $counselingStatus = ($isClose == "true") ? $pageStatus["nowPageCode"] : $pageStatus["nextPageCode"];
            if ($isClose == "true") {
                $nextStep = "/";
            } else {
                $nextStep = "/".$pageStatus["nextPage"]."/".$pageStatus["counselingPK"];
            }

            if ($request["questions98"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 98, $request["questions98"], $nowDate);
            }

            if ($request["questions89"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 89, $request["questions89"], $nowDate);
            }

            if ($request["questions90"] != "") {
                $this->saveCounselAnswer($request, $counselingPK, 90, $request["questions90"], $nowDate);
            }

            $this->updateCounselingStatus($pageStatus["counselingPK"], $counselingStatus, $nowDate);

            $result = [
                "status" => "success",
                "message" => "",
                "nextStep" => $nextStep
            ];

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return json_encode($result);
    }
    private function answerInformation($isClose, $pageStatus) {
        $nowDate = date("Y-m-d H:i:s");

        $result = [
            "status" => "fail",
            "message" => "상담 신청 오류입니다. 증상이 계속되면 관리자에게 문의해주세요 [1]"
        ];

        try {
            DB::beginTransaction();

            $counselingStatus = ($isClose == "true") ? $pageStatus["nowPageCode"] : $pageStatus["nextPageCode"];
            if ($isClose == "true") {
                $nextStep = "/";
            } else {
                $nextStep = "/".$pageStatus["nextPage"]."/".$pageStatus["counselingPK"];
            }
            $this->updateCounselingStatus($pageStatus["counselingPK"], $counselingStatus, $nowDate);

            $result = [
                "status" => "success",
                "message" => "",
                "nextStep" => $nextStep
            ];

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return json_encode($result);
    }

    private function saveAnswer($request, $counselingPK, $isClose, $pageStatus, $saveType = "") {
        $nowDate = date("Y-m-d H:i:s");

        $result = [
            "status" => "fail",
            "message" => "상담 신청 오류입니다. 증상이 계속되면 관리자에게 문의해주세요 [1]"
        ];

        try {
            DB::beginTransaction();

            $counselingStatus = ($isClose == "true") ? $pageStatus["nowPageCode"] : $pageStatus["nextPageCode"];
            if ($isClose == "true") {
                $nextStep = "/";
            } else {
                $nextStep = "/".$pageStatus["nextPage"]."/".$pageStatus["counselingPK"];
            }

            $questionsType = "";
            switch ($pageStatus["nowPage"]) {
                case "answerHouse":
                    $questionsType = "302";
                    break;
                case "answerTree":
                    $questionsType = "303";
                    break;
                case "answerPerson1":
                    $questionsType = "304";
                    break;
                case "answerPerson2":
                    $questionsType = "305";
                    break;
                case "behaviorObservation":
                    $questionsType = "335";
                    break;
                case "temperamentTestStep1":
                case "temperamentTestStep2":
                    $questionsType = "336";
                    break;
                default :
                    return json_encode($result);
            }

            $questions = Questions::findAllQuestion($questionsType);

            foreach ($questions as $questionsRow) {
                $formName = "questions".$questionsRow->questionsPK;

                if ( $saveType == "" && isset($request[$formName])) {
                    $this->saveCounselAnswer($request, $counselingPK, $questionsRow->questionsPK, $request[$formName], $nowDate);
                } else if ( $saveType == "empty" && $request[$formName] != "") {
                    $this->saveCounselAnswer($request, $counselingPK, $questionsRow->questionsPK, $request[$formName], $nowDate);
                }
            }

            $this->updateCounselingStatus($pageStatus["counselingPK"], $counselingStatus, $nowDate);

            $result = [
                "status" => "success",
                "message" => "",
                "nextStep" => $nextStep
            ];

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return json_encode($result);
    }

    private function updateCounselingStatus($counselingPK, $counselingStatus,$nowDate) {
        $counseling = Counseling::find($counselingPK);
        $counseling->counselingStatus = $counselingStatus;
        $counseling->updateDate = $nowDate;
        $counseling->save();
    }

    private function saveCounselAnswer($request, $counselingPK, $questionsPK, $answerValue, $nowDate) {

        $memberPK = $request->session()->get('login')[0]['memberPK'];
        $updateAnswer = Answer::findCounselingAnswer($memberPK,$questionsPK,$counselingPK);

        if ( $updateAnswer ) {
            $updateValue = [
                "answer" => $answerValue,
                "updateDate" => $nowDate
            ];
            Answer::updateAnswer($updateAnswer->answerPK,$updateValue);
        } else {
            $answer = new Answer;

            $answer->memberPK = $memberPK;
            $answer->counselingPK = $counselingPK;
            $answer->questionsPK = $questionsPK;
            $answer->answerType = 293;
            $answer->answer = $answerValue;
            $answer->updateDate = $nowDate;
            $answer->createDate = $nowDate;
            $answer->save();
        }
    }

    private function getAdviceOrder() {
        $pageOrder = Code::findCode("counselingStatus");

        $pageOrderResult = array();
        $index = 0;
        foreach ($pageOrder as $pageOrderRow) {
            $pageOrderResult[$index] = [
                "codePK" => $pageOrderRow->codePK,
                "codeName" => $pageOrderRow->codeName
            ];
            $index++;
        }

        return $pageOrderResult;
    }

    private function getPageStatus($page,$pageOrder) {
        $pageStatus = [
            "prePage" => "",
            "nowPage" => $page,
            "nowPageCode" => "",
            "nextPage" => "",
            "nextPageCode" => "",
        ];
        $prePage = "/";
        $isNextStep = false;
        foreach ($pageOrder as $object) {
            if ($isNextStep) {
                $pageStatus["nextPage"] = $object["codeName"];
                $pageStatus["nextPageCode"] = $object["codePK"];
                break;
            }

            if ($object["codeName"] == $page) {
                $pageStatus["prePage"] = $prePage;
                $pageStatus["nowPageCode"] = $object["codePK"];
                $isNextStep = true;
            }

            $prePage = $object["codeName"];
        }
        return $pageStatus;
    }
}
