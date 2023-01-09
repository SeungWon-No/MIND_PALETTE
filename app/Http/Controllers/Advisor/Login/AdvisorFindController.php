<?php

namespace App\Http\Controllers\Advisor\Login;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\AdvisorAuth;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdvisorFindController extends Controller
{
    public function __invoke(Request $request)
    {
        $di = Crypt::decryptString($request['DI']) ?? '';
        $ci = Crypt::decryptString($request['CI']) ?? '';

        //$advisorAuth = new AdvisorAuth();
        $getFindAdvisorEmail = AdvisorAuth::findAdvisorEmail($di, $ci);
        $getAdvisorInfo = Advisor::findAdvisorInfo($getFindAdvisorEmail[0]['advisorPK']);

        return view("/advisor/loginFindEmail",[   // 상담사 메인 페이지 
            "findEmail" => $getAdvisorInfo['email'],
            "withdrawal" => $getAdvisorInfo['withdrawal'],
        ]);
    }

}