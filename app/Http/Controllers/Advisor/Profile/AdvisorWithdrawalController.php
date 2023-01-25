<?php

namespace App\Http\Controllers\Advisor\Profile;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\AdvisorAuth;
use App\Models\Career;
use App\Models\Counseling;
use App\Models\EducationLevel;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdvisorWithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        return view("/advisor/profile/memberWithdrawal");

    }

    public function store(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        if($advisorPK){

            $nowDateTime = date('Y-m-d H:i:s');
            $advisorName = $request->advisorName ?? '';
            $advisorEmail = $request->email ?? '';
            $advisorPassword = $request->advisorPassword ?? '';

            if($advisorName != '' && $advisorEmail != '' && $advisorPassword != ''){

                try{

                    DB::beginTransaction();
                    $getAdvisorInfo = Advisor::findAdvisorInfo($advisorPK);
                    
                    $contrastName = $getAdvisorInfo->advisorName ?? '';
                    $contrastEmail = $getAdvisorInfo->email ?? '';
                    $contrastPassword = $getAdvisorInfo->password ?? '';
                    $passwordMatchingCheck = Hash::check($advisorPassword, $contrastPassword);
                    
        
                    if ($advisorName == Crypt::decryptString($contrastName) &&
                        $advisorEmail == $contrastEmail && $passwordMatchingCheck == true){

                        EducationLevel::where('advisorPK', $advisorPK)->update(['isDelete' => 'Y']);        // 학력사항 삭제 처리
                        Qualification::where('advisorPK', '=', $advisorPK)->update(['isDelete' => 'Y']);    // 자격사항 삭제 처리
                        Career::where('advisorPK', '=', $advisorPK)->update(['isDelete' => 'Y']);           // 경력사항 삭제 처리
                        Counseling::where('advisorPK', $advisorPK)->update(['isDelete' => 'Y']);            // 상담 내역 삭제 처리
                        AdvisorAuth::where('advisorPK', $advisorPK)->delete();                              // 상담사 인증 정보 삭제 (hard delete)
                        Advisor::where('advisorPK', $advisorPK)->update(['isDelete' => 'Y'], ['withdrawal' => $nowDateTime]); // 상담사 정보 삭제 처리, 탈퇴일 입력
                        
                        DB::commit();

                        $result = ["status" => "success"];
                        return json_encode($result);

                    }else{

                        $result = ["status" => "fail"];
                        return json_encode($result);
                    }

                }catch(\Exception $e){

                }

            }

        }

    }

}
