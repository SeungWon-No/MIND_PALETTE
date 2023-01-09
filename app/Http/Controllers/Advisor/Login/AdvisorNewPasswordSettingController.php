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
        dd($request);
        $newPassword = Hash::make($request['newPassword']);
        $confirmNewPassword = Hash::make($request['confirmNewPassword']);
        dd($newPassword."/".$confirmNewPassword);

        if ($newPassword == $confirmNewPassword){
            $getAdvisorPk = Advisor::findPassword($newPassword);
            dd($getAdvisorPk);
            try {
                DB::beginTransaction();


                DB::commit();
                
            }catch(\Exception $e){

            } 

        }
        $advisor = new Advisor();
        $advisor->password = Hash::make($request['newPassword']);
        $advisor->password = Hash::make($request['confirmNewPassword']);
    }

}