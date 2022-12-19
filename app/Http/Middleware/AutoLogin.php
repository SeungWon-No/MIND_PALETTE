<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Member;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AutoLogin
{
    public function handle(Request $request, Closure $next)
    {
        if ( Cookie::has('AKTV') && !$request->session()->has("login") ) {
            $memberPK = Cookie::get('AKTV');

            $member = Member::findMemberInfo($memberPK);

            if ($member->withdrawal == null && $member->blockDate == null) {
                Member::updateLoginDate($member->memberPK);

                $loginData = [
                    "memberPK" => $member->memberPK,
                    "memberEmail" => $member->email,
                    "memberName" => Crypt::decryptString($member->memberName),
                ];
                $request->session()->push('login', $loginData);
            }
        }

        return $next($request);
    }
}
