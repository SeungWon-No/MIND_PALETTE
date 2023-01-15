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
        $getInquiryList = Contact::getInquiryList(20, $advisorPK);

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

        if ($getMyInquiryPost->advisorPK != $advisorPK) {
            return redirect("/advisor/inquiry")->with("error","권한이 없습니다.");
        }

        return view("/advisor/inquiry/inquiryPost", [
            "advisorProfile" => $advisorProfile,
            "myInquiryPost" => $getMyInquiryPost,
        ]);
    }

    public function writePost(Request $request){

        $isLogin = $request->session()->has('advisorLogin'); // 상담사 로그인 세션 key값
        if ($isLogin) {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        }else{
            return view("/advisor/login/login");
        }

        $advisor = Advisor::find($advisorPK);

        $nowDateTime = date('Y-m-d H:i:s');

        $inquiryPost = new Contact();
        $inquiryPost->advisorPK = $advisorPK;
        $inquiryPost->contactName = $advisor->advisorName;
        $inquiryPost->contactPhone = $advisor->phone;
        $inquiryPost->contactTitle = $request['inquiryTitle'];
        $inquiryPost->contactContent = $request['content'];
        $inquiryPost->contactStatus = 352;
        $inquiryPost->contactType = 359;
        $inquiryPost->isDelete = 'N';
        $inquiryPost->updateDate = $nowDateTime;
        $inquiryPost->createDate = $nowDateTime;
        $inquiryPost->save();

        return redirect('advisor/inquiry');
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

    public function update(Request $request, $id) {
        try {
            $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
            $contact = Contact::find($id);
            if ($contact->advisorPK != $advisorPK) {
                return redirect("/advisor/inquiry")->with("error","권한이 없습니다.");
            }

            $nowDateTime = date('Y-m-d H:i:s');
            $contact->contactTitle = $request->inquiryTitle;
            $contact->contactContent = $request->content;
            $contact->updateDate = $nowDateTime;
            $contact->save();

            return redirect("/advisor/inquiry/".$contact->contactPK);
        }catch (\Exception $e) {
            return redirect("/advisor/inquiry/".$id)->with("error","수정에 실패했습니다.");
        }

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

        if ($getMyInquiryPost->advisorPK != $advisorPK) {
            return redirect("/advisor/inquiry")->with("error","권한이 없습니다.");
        }

        return view("/advisor/inquiry/inquiryEdit", [
            "advisorProfile" => $advisorProfile,
            "myInquiryPost" => $getMyInquiryPost,
        ]);
    }

    public function destroy(Request $request, $id) {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        $contact = Contact::find($id);
        if ($contact->advisorPK != $advisorPK) {
            return redirect("/advisor/inquiry")->with("error","권한이 없습니다.");
        }

        $nowDateTime = date('Y-m-d H:i:s');
        $contact->updateDate = $nowDateTime;
        $contact->isDelete = 'Y';
        $contact->save();

        return redirect("/advisor/inquiry")->with("error","삭제 되었습니다.");
    }

}
