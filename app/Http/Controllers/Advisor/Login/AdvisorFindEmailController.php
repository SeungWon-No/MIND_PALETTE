<?php

namespace App\Http\Controllers\Advisor\Login;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\AdvisorAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class AdvisorFindEmailController extends Controller
{
    public function __invoke(Request $request)
    {
        $di = Crypt::decryptString($request['DI']) ?? '';
        $ci = Crypt::decryptString($request['CI']) ?? '';

        $getFindAdvisorEmail = AdvisorAuth::findAdvisorEmail($di, $ci); // request로 전달 받은 di, ci 값과 동일한 데이터가 있는지 조회, 있다면 advisorPK return
        $getAdvisorInfo = Advisor::findAdvisorInfo($getFindAdvisorEmail[0]['advisorPK']); // advisorPK로 advisor정보 조회

        // 이메일 마스킹 처리
        if($getAdvisorInfo){
            $sliceAdvisorId = Str::before($getAdvisorInfo['email'], '@'); // '@'를 기준으로 이전의 string (id)
            $sliceAdvisorEmail = Str::after($getAdvisorInfo['email'], '@'); // '@'를 기준으로 이후의 string (mail)
            $maskAdvisorId = Str::mask($sliceAdvisorId, '*', -3);   // id 뒤에서 3자리를 '*'로 표시
            if(Str::length($maskAdvisorId) <= 3){
                $maskAdvisorId = Str::mask($sliceAdvisorId, '*', -1); // id가 세글자보다 작을 경우에는 1자리만 '*' 처리
            }
            $maskAdvisorEmail = $maskAdvisorId.'@'.$sliceAdvisorEmail;  // 전체 email 조합
        }  
        
        
        return view("/advisor/login/loginFindEmail",[   // 상담사 메인 페이지 
            "findEmail" => $maskAdvisorEmail ?? '',
            "withdrawal" => $getAdvisorInfo['withdrawal'] ?? '',
        ]);
    }

}