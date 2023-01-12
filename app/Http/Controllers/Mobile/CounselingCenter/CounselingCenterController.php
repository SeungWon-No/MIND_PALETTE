<?php

namespace App\Http\Controllers\Mobile\CounselingCenter;

use App\Http\Controllers\Controller;
use App\Models\CounselingCenter;
use Illuminate\Http\Request;

class CounselingCenterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view("/mobile/counselingCenter/view",[
            "center" => CounselingCenter::findCounselingCenter()
        ]);
    }
}
