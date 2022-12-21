<?php
namespace App\Http\Controllers\Advisor\Join;

use App\Http\Controllers\Controller;
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

        $memberBasicInfomation = [ // 상담사 기본정보
            'email' => $request["userEmail"] ?? '',
            'password' => Hash::make($request['userPassword']),
            'memberName' => Crypt::encryptString($request['userName']) ?? '',
            'phoneNumber' => Crypt::encryptString($request['userPhone']) ?? '',
            'auth' => 'N',
            'lastLoginDate' => $nowDate,
            'updateDate' => $nowDate,
        ];

        $memberAdditionalInfomation = [ // 상담사 추가 정보
            'schoolName' => $request["schoolName"] ?? '',
            'department' => $request["department"] ?? '',
            'major' => $request["major"] ?? '',
            'certificateAttachment' => $request["certificateAttachment"] ?? '',
            'publisher' => $request["publisher"] ?? '',
            'licenseTitle' => $request["licenseTitle"] ?? '',
            'career' => $request["career"] ?? '',
        ];

        print_r($memberAdditionalInfomation);
        return view("/advisor/join/consultationInformation");
    }

    public function show(Request $request)
    {
        
    }
}
?>
