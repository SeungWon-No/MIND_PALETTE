<?php

namespace App\Http\Controllers\Advisor\Login;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
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
        $advisorInfo = json_decode(json_encode($getAdvisorInfo), true);
        dd(Crypt::decryptString($advisorInfo['password']));
        
        
        
        
        $qq = Hash::make($request['newPassword']);
        $tt = Crypt::decryptString($qq);
        dd($tt);

        if($newPassword){
            dd('true');
        }else{
            dd('false');
        }
        if ($getAdvisorInfo) {
            try {
                DB::beginTransaction();

                // DB::table('advisor')
                // ->where('advisorPK', $getAdvisorInfo['advisorPK'])
                // ->update(['votes' => 1]);


    
    
                DB::commit();
                
            }catch(\Exception $e){
    
            } 
        };
    }

}