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

        $advisor = new Advisor();
        $advisor->advisorName = $request['userName'] ?? '';
        $advisor->phone = $request['userPhone'] ?? '';
        $di = $request['DI'] ?? '';
        $ci = $request['CI'] ?? '';

        $advisorAuth = new AdvisorAuth();
        $getFindAdvisorEmail = AdvisorAuth::findAdvisorEmail($di, $ci);
        dd($getFindAdvisorEmail);


        
    }

    public function find(Request $request)
    {

    }

    public function show(Request $request)
    {

    }

}