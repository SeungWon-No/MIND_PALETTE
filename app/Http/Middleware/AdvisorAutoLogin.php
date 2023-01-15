<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Advisor;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdvisorAutoLogin
{
    public function handle(Request $request, Closure $next)
    {
        if ( Cookie::has('AD_AKTV') && !$request->session()->has("advisorLogin") ) {
            dd(2123123);
            $advisorPK = Cookie::get('AD_AKTV');

            $advisor = Advisor::findAdvisorInfo($advisorPK);

            if ($advisor->withdrawal == null && $advisor->blockDate == null) {
                Advisor::updateLoginDate($advisor->advisorPK);

                $loginData = [
                    "advisorPK" => $advisor->advisorPK,
                    "advisorEmail" => $advisor->email,
                    "advisorName" => Crypt::decryptString($advisor->advisorName),
                    "advisorStatus" => $advisor->advisorStatus
                ];
                $request->session()->push('advisorLogin', $loginData);
            }
        }

        return $next($request);
    }
}
