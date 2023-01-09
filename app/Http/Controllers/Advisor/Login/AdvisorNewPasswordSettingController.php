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
        
        
        $test = Hash::make($newPassword);
        if($test == $getAdvisorInfo['password']){
            dd('같음');
        }
        if ($getAdvisorInfo) {
            try {
                DB::beginTransaction();

                DB::table('advisor')
                ->where('advisorPK', $getAdvisorInfo['advisorPK'])
                ->update(['votes' => 1]);


    
    
                DB::commit();
                
            }catch(\Exception $e){
    
            } 
        };
    }

}