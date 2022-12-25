<?php

namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Illuminate\Http\Request;

class VerifyEmailDuplicationController extends Controller
{
    public function __invoke(Request $request)
    {
        $userEmail = $request["userEmail"] ?? "";

        if ($userEmail == "") {
            return "1";
        }
        
        return Advisor::findEmail($userEmail);
    }

}
