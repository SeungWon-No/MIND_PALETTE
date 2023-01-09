<?php

namespace App\Http\Controllers\Advisor\Login;

use App\Http\Controllers\Controller;
use App\Models\AdvisorAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdvisorFindPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $di = Crypt::decryptString($request['DI']) ?? '';
        $ci = Crypt::decryptString($request['CI']) ?? '';

        $state = 'false';
        $getFindAdvisorEmail = AdvisorAuth::findAdvisorEmail($di, $ci); // request로 전달 받은 di, ci 값과 동일한 데이터가 있는지 조회, 있다면 advisorPK return
        $getAdvisorInfo = $getFindAdvisorEmail[0]['advisorPK']; // advisorPK로 advisor정보 조회

        if($getFindAdvisorEmail[0]['advisorPK']){
            $state = 'true';
        }

        return view("/advisor/login/loginNewPasswordSetting",[   // 상담사 메인 페이지 
            "state" => $state,
            "advisorPK" => $getAdvisorInfo
        ]);
    }

}