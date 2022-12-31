<?php

namespace App\Http\Controllers\Advisor\Logout;

use App\Http\Controllers\Controller;
use Cookie;
use Illuminate\Http\Request;

class AdvisorLogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->session()->pull('advisorLogin','');
        Cookie::queue(Cookie::forget('AD_AKTV'));

        return redirect('/advisor/login');
    }
}
