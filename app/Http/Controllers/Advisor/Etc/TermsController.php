<?php

namespace App\Http\Controllers\Advisor\Etc;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        return view("/advisor/etc/termsPage",[
            "advisorProfile" => Advisor::getAdvisorProfile($advisorPK)
        ]);
    }
}
