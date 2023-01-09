<?php

namespace App\Http\Controllers\Advisor\Login;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdvisorNewPasswordSettingController extends Controller
{
    public function __invoke(Request $request)
    {
        $advisorPK = $request['advisorPK'];
        $newPassword = $request['newPassword'];
        $getAdvisorInfo = Advisor::findAdvisorInfo($advisorPK);
        if($getAdvisorInfo){
            try {
                DB::beginTransaction();
                Advisor::updateNewPassword($getAdvisorInfo['advisorPK'], $newPassword);
                DB::commit();
                return view("/advisor/login/login");

            }catch(\Exception $e){

            }
            
        }
    }

}