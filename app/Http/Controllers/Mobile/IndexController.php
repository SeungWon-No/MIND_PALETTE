<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Counseling;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $counselingCount = 0;
        $counselingRow = null;

        if ($request->session()->has('login')) {
            $memberPK = $request->session()->get('login')[0]["memberPK"];
            $counselingRow = Counseling::findAllCounseling($memberPK);
        }

        return view("/mobile/index",[
            "counselingCount" => $counselingCount,
            "counselingRow" => $counselingRow,
        ]);
    }
}
