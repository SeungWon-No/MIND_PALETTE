<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdvisorJoinController extends Controller{
    public function index()
    {
        return view("/advisor/join/basicInformation");
    }

    public function store(Request $request)
    {
        $nowDate = date("Y-m-d H:i:s");

        $member = new Advisor();
        $member->email = $request["userEmail"] ?? '';
        $member->password = Hash::make($request['userPassword']);
        $member->memberName = Crypt::encryptString($request['userName']) ?? '';
        $member->phone = Crypt::encryptString($request['userPhoneNumber']) ?? '';
        //$member->mbAgreePK = $agreePK;
        //$member->auth = 'N';
        $member->advisorStatus = '1';
        $member->lastLoginDate = $nowDate;
        $member->updateDate = $nowDate;
        $member->createDate = $nowDate;

        $member->save();

        return view("/advisor/join/consultationInformation");
        
    }

    public function show(Request $request)
    {
        
    }
}
?>
