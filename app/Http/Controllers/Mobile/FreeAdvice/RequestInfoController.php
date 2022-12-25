<?php

namespace App\Http\Controllers\Mobile\FreeAdvice;

use App\Http\Controllers\Controller;
use App\Models\CounselingTemplate;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class RequestInfoController extends Controller
{
    public function __invoke(Request $request)
    {
        return view("/mobile/freeAdvice/requestInfo");
    }

    public function create(Request $request) {
        $counselorName = $request->counselorName ?? '';

        if ($counselorName == "") {
            return json_encode([
                "status" => "fail",
                "message" => "필수 값이 존재하지 않습니다."
            ]);
        }

        try {
            DB::beginTransaction();
            $nowDate = date("Y-m-d H:i:s");

            $counselingTemplate = new CounselingTemplate;
            if ( $request->session()->has("login")) {
                $memberPK = $request->session()->get('login')[0]['memberPK'];
                $counselingTemplate->memberPK = $memberPK;
            } else {
                $freeCode = "";
                if ( Cookie::has('FREE_ADVICE') ) {
                    $freeCode = Cookie::get('FREE_ADVICE');
                } else {
                    $freeCode = date("YmdHis").sprintf('%03d', rand(000,999));
                    Cookie::queue(Cookie::forever('FREE_ADVICE', $freeCode));
                }

                $counselingTemplate->tempCounselingCode = $freeCode;
            }
            $counselingTemplate->counselorName = Crypt::encryptString($counselorName);
            $counselingTemplate->counselingStatus = 290; //depressionStep1
            $counselingTemplate->updateDate = $nowDate;
            $counselingTemplate->createDate = $nowDate;
            $counselingTemplate->save();

            DB::commit();
            return json_encode([
                "status" => "success",
                "counselingTemplatePK" => $counselingTemplate->counselingTemplatePK
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode([
                "status" => "fail",
                "message" => "무료 상담 오류입니다. 증상이 계속되면 관리자에게 문의해주세요"
            ]);
        }
    }
}
