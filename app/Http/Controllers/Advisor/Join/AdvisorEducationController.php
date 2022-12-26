<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Advisor\Login\AdvisorLoginController;
use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Member;
use App\Models\MemberAgree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdvisorEducationController extends Controller{

    public function store(Request $request)
    {
        try {

            $educationCount = $request->educationCount ?? 0;

            $degreeArray = array();
            for ($index = 1; $index < $educationCount ; $index++) {
               $degree = $request['degree'.$index];
               $degreeArray[$index] =  $degree;
            }

            dd($request);

        } catch (\Exception $e) {

        }


    }

}
?>
