<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Util\CounselingStatus;
use App\Models\Advisor;
use App\Models\Answer;
use App\Models\Code;
use App\Models\Counseling;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $isLogin = $request->session()->has('login');
        $counselingCount = 0;
        $counselingRow = null;
        $HTPImageRow = null;

        if ($isLogin) {
            $memberPK = $request->session()->get('login')[0]["memberPK"];
            $counselingRow = Counseling::findCounselingLimit($memberPK);
            $counselingCount = $counselingRow->count();
            $HTPImageRow = Answer::findHTPImageRow($memberPK);
        }

        return view("/mobile/index",[
            "isLogin" => $isLogin,
            "counselingRow" => $counselingRow,
            "counselingCount" => $counselingCount,
            "HTPImageRow" => $HTPImageRow,
            "counselingStatus" => CounselingStatus::$counselingStatus,
            "payCounselingWritingCode" => CounselingStatus::$payCounselingWritingCode,
            "payCounselingStatus" => CounselingStatus::$payCounselingStatus,
            "statusCode" => Code::findCodeType("counselingStatus"),
            "advisor" => Advisor::findRandomAdvisorLimit(3)
        ]);
    }
}
