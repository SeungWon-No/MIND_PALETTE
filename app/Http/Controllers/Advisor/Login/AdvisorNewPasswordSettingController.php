<?php

namespace App\Http\Controllers\Advisor\Login;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdvisorNewPasswordSettingController extends Controller
{
    public function __invoke(Request $request)
    {
        $advisorPK = $request['advisorPK'];
        $newPassword = $request['newPassword'];

        $getAdvisorInfo = Advisor::findAdvisorInfo($advisorPK);
        dd($getAdvisorInfo['advisorPK']);
        if ($getAdvisorInfo) {
            try {
                DB::beginTransaction();


    
    
                DB::commit();
                
            }catch(\Exception $e){
    
            } 
        };
    }

}