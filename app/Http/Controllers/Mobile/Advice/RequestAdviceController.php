<?php

namespace App\Http\Controllers\Mobile\Advice;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Counseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RequestAdviceController extends Controller
{
    public function index()
    {
        $code = new Code;

        return view("/mobile/advice/requestAdvice",[
            "relationship" => $code->findCode("FamilyRelations"),
            "city" => $code->findAreaCode(),
        ]);
    }

    public function store(Request $request)
    {

        $nowDate = date("Y-m-d H:i:s");

        $applicantName = (isset($request->applicantName)) ? $request->applicantName : '';
        $relationship = (isset($request->relationshipCode)) ? $request->relationshipCode : -1;
        $phone = (isset($request->phone)) ? $request->phone : '';
        $city = (isset($request->cityCode)) ? $request->cityCode : -1;
        $region = (isset($request->regionCode)) ? $request->regionCode : -1;

        if ( $applicantName == "" || $relationship == -1 || $phone == "" || $city == -1 || $region == -1) {
            return json_encode([
                "status" => "fail",
                "message" => "필수 값이 존재하지 않습니다."
            ]);
        }

        $memberPK = $request->session()->get('login')[0]['memberPK'];
        $counseling = new Counseling;
        $counseling->memberPK = $memberPK;
        $counseling->applicantName = Crypt::encryptString($applicantName);
        $counseling->relationship = $relationship;
        $counseling->phone = Crypt::encryptString($phone);
        $counseling->city = $city;
        $counseling->region = $region;
        $counseling->counselingStatus = 282; //adviceInfoStep01
        $counseling->updateDate = $nowDate;
        $counseling->createDate = $nowDate;
        $counseling->save();
        $counselingPK = $counseling->counselingPK;

        return json_encode([
            "status" => "success",
            "requestAdvicePK" => $counselingPK
        ]);
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

    public function findRegion($id) : string
    {
        $region = Code::findChildCode($id);

        $regionSelectOption = "<option value='-1'>시/군/구 선택</option>";
        foreach ($region as $regionRow) {
            $regionSelectOption .= "<option value='".$regionRow->codePK."'>";
            $regionSelectOption .= $regionRow->codeName;
            $regionSelectOption .= "</option>";
        }
        return $regionSelectOption;
    }
}
