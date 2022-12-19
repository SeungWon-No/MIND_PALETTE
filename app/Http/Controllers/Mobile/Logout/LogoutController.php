<?php

namespace App\Http\Controllers\Mobile\Logout;

use App\Http\Controllers\Controller;
use Cookie;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->session()->pull('login','');
        Cookie::queue(Cookie::forget('AKTV'));

        return redirect('/');
    }
}
