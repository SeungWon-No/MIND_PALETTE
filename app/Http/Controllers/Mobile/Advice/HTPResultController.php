<?php

namespace App\Http\Controllers\Mobile\Advice;

use App\Http\Controllers\Controller;
use App\Http\Util\StringUtil;
use App\Models\Answer;
use App\Models\Counseling;
use Illuminate\Http\Request;

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
        if ($counselingPK == "") {
            return redirect('/')->with('error', '권한이 없습니다.');
        }

        $counseling = Counseling::find($counselingPK);

        if (!$counseling) {
            return redirect('/')->with('error', '권한이 없습니다.');
        }

        return view("/mobile/advice/result",[
            "counseling" => $counseling,
            "images" => Answer::findHTPImage($counselingPK)
        ]);
    }
}
