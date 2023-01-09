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
    public function index(Request $request)
    {
        return view("/advisor/login/loginFindEmail");
    }

    public function store(Request $request)
    {
        $nowDate = date("Y-m-d H:i:s");
        $di = Crypt::decryptString($request['DI']) ?? '';
        $ci = Crypt::decryptString($request['CI']) ?? '';
        dd($di."/".$ci);

        $advisorAuth = new AdvisorAuth();
        $getFindAdvisorEmail = AdvisorAuth::findAdvisorEmail($di, $ci);


        
    }

    public function find(Request $request)
    {

    }

    public function show(Request $request)
    {

    }

}