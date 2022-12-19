<?php

namespace App\Http\Controllers\Mobile\Join;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class EmailCheckController extends Controller
{
    public function __invoke(Request $request)
    {
        $userEmail = $request["userEmail"] ?? "";
        if ($userEmail == "") {
            return "1";
        }

//        return $userEmail;

        return Member::findEmail($userEmail);
    }

}
