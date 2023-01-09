<?php

namespace App\Http\Controllers\Mobile\Mypage;

use App\Http\Controllers\Controller;
use App\Http\Util\CounselingStatus;
use App\Models\Answer;
use App\Models\Code;
use App\Models\Counseling;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function index(Request $request)
    {
        $memberPK = $request->session()->get('login')[0]["memberPK"];
        $counselingRow = Counseling::findAllCounseling($memberPK);
        $counselingCount = $counselingRow->count();
        return view("mobile/mypage/mypage",[
            "counselingRow" => $counselingRow,
            "counselingCount" => $counselingCount,
            "counselingStatus" => CounselingStatus::$counselingStatus,
            "payCounselingWritingCode" => CounselingStatus::$payCounselingWritingCode,
            "payCounselingStatus" => CounselingStatus::$payCounselingStatus,
            "statusCode" => Code::findCodeType("counselingStatus"),
            "HTPImageRow" => Answer::findHTPImageRow($memberPK)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
