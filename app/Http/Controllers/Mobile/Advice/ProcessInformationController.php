<?php

namespace App\Http\Controllers\Mobile\Advice;

use App\Http\Controllers\Controller;
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
            "progressWidth" => 15.6
        ]);
    }

}
