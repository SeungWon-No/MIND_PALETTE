<?php

namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
use Cookie;
use Illuminate\Http\Request;

class AdvisorExamineController extends Controller
{
    public function __invoke(Request $request)
    {
        return redirect('/advisor/join/examine');
    }
}
