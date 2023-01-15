<?php

namespace App\Http\Controllers\Mobile\Advice;

use App\Http\Controllers\Controller;
use App\Http\Util\StringUtil;
use App\Models\Advisor;
use App\Models\Answer;
use App\Models\Code;
use App\Models\Counseling;
use App\Models\CounselingCenter;
use App\Models\EducationLevel;
use App\Models\ServiceRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class HTPResultController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $counselingPK = $request->counselingPK ?? '';
        $memberPK = $request->session()->get('login')[0]['memberPK'];
        if ($counselingPK == "") {
            return redirect('/')->with('error', '권한이 없습니다.');
        }

        $counseling = Counseling::find($counselingPK);

        if (!$counseling) {
            return redirect('/')->with('error', '권한이 없습니다.');
        }
        $advisor = Advisor::find($counseling->advisorPK);

        return view("/mobile/advice/result",[
            "counseling" => $counseling,
            "advisorImage" => $advisor->profilePath,
            "advisorName" => Crypt::decryptString($advisor->advisorName),
            "advisorCenter" => $advisor->centerName,
            "advisorEducationLevel" => EducationLevel::findAdvisorEducationInfoLimit($counseling->advisorPK,3),
            "educationCode" => Code::findCodeType("degree"),
            "images" => Answer::findHTPImage($counselingPK),
            "temperamentTest"=>Answer::findTemperamentTest($counselingPK),
            "serviceRating" => ServiceRating::findMemberLog($memberPK),
            "center" => CounselingCenter::findRandomCenter()
        ]);
    }

    public function serviceRating(Request $request) {
        $nowDate = date("Y-m-d H:i:s");
        $memberPK = $request->session()->get('login')[0]['memberPK'];
        $rating = $request->rating ?? '';

        if ($rating == "") {
            $result = [
                "status" => "fail",
                "message" => "필수 값 누락입니다."
            ];
            return json_encode($result);
        }

        if (ServiceRating::findMemberLog($memberPK) ){
            $result = [
                "status" => "fail",
                "message" => "별점이 등록 되었습니다!"
            ];
            return json_encode($result);
        }

        $serviceRating = new ServiceRating;
        $serviceRating->memberPK = $memberPK;
        $serviceRating->rating = $rating;
        $serviceRating->createDate = $nowDate;
        $serviceRating->save();

        $result = [
            "status" => "success",
            "message" => "별점이 등록 되었습니다."
        ];
        return json_encode($result);
    }

    public function reviewRating(Request $request, $counselingPK) {
        $nowDate = date("Y-m-d H:i:s");
        $rating = $request->rating ?? '';
        $reviewContent = $request->reviewContent ?? '';
        $reviewContent = str_replace("\n","<br/>",htmlspecialchars(urldecode($reviewContent)));

        if ($rating == "") {
            $result = [
                "status" => "fail",
                "message" => "필수 값 누락입니다."
            ];
            return json_encode($result);
        }

        try {
            DB::beginTransaction();

            $counseling = Counseling::find($counselingPK);
            if ($counseling) {
                $preRating = $counseling->rating;

                $counseling->rating = $rating;
                $counseling->review = $reviewContent;
                $counseling->updateDate = $nowDate;
                $counseling->save();

                $advisor = Advisor::find($counseling->advisorPK);
                $advisor->rating = $advisor->rating - $preRating + $rating ;

                if ($preRating <= 0) {
                    $advisor->ratingCount = $advisor->ratingCount + 1;
                }

                $advisor->save();
            }
            DB::commit();
            $result = [
                "status" => "success",
                "message" => "상담사 후기가 등록되었습니다."
            ];
            return json_encode($result);
        }catch (Exception $e) {
            DB::rollBack();
            $result = [
                "status" => "fail",
                "message" => "별점 등록 실패입니다. 증상이 계속되면 고객센터로 문의해주세요."
            ];
            return json_encode($result);
        }
    }
}
