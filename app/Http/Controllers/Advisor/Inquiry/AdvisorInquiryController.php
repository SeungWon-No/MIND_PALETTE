<?php

namespace App\Http\Controllers\Advisor\Inquiry;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvisorInquiryController extends Controller
{
    public function index(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        // 리스트 전체 가져오기
        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        $getInquiryList = Contact::getInquiryList(20);
        
        return view("/advisor/inquiry/inquiry", [
            "advisorProfile" => $advisorProfile,
            "getInquiryList" => $getInquiryList,
        ]);
    }

    public function store(Request $request)
    {

    }

    public function show(Request $request)
    {
        $requestUrl = $request->fullUrl();
        $sliceRequestUrl = explode('/', $requestUrl);
        $contactPK = $sliceRequestUrl[5];

        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        $getMyInquiryPost = Contact::getMyInquiryPost($contactPK);
        if($getMyInquiryPost['contactType'] == 1) {
            $getMyInquiryPost['contactType'] = 'actived';
        }
        
        return view("/advisor/inquiry/inquiryPost", [
            "advisorProfile" => $advisorProfile,
            "getMyInquiryPost" => $getMyInquiryPost,
        ]);
    }

    public function writePost(Request $request){

        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $nowDateTime = date('Y-m-d H:i:s');

        $inquiryPost = new Contact();
        $inquiryPost->memberPK = '';
        $inquiryPost->contactName = '';
        $inquiryPost->contactPhone = '';
        $inquiryPost->contactTitle = $request['inquiryTitle'];
        $inquiryPost->contactContent = $request['content'];
        $inquiryPost->contactStatus = 352;
        $inquiryPost->isDelete = 'N';
        $inquiryPost->updateDate = $nowDateTime;
        $inquiryPost->createDate = $nowDateTime;
        $inquiryPost->save();
        
        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/inquiry/inquiry", [
            "advisorProfile" => $advisorProfile,
        ]);
        
    }

    public function inquiryWrite(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값

        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        // 리스트 전체 가져오기
        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        return view("/advisor/inquiry/inquiryWrite", [
            "advisorProfile" => $advisorProfile,
        ]);
    }

    public function inquiryEdit(Request $request)
    {
        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }
        $contactPK = $request['contactPK'];
        $advisorProfile = Advisor::getAdvisorProfile($advisorPK); // 상담사 프로필
        $getMyInquiryPost = Contact::getMyInquiryPost($contactPK);
        if($getMyInquiryPost['contactType'] == 1) {
            $getMyInquiryPost['contactType'] = 'actived';
        }
        return view("/advisor/inquiry/inquiryEdit", [
            "advisorProfile" => $advisorProfile,
            "getMyInquiryPost" => $getMyInquiryPost,
        ]);

    }

}