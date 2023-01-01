<?php

namespace App\Http\Controllers\Advisor\Login;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AdvisorFindController extends Controller
{
    public function __invoke(Request $request)
    {
        return view("/advisor/login/loginFindEmail");
    }

}