<?php

namespace App\Http\Controllers\Advisor\Notice;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Illuminate\Http\Request;

class AdvisorNoticeController extends Controller
{
    public function index(Request $request)
    {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        // 리스트 전체 가져오기
        return view("/advisor/notice/notice",[
            "advisorProfile" => Advisor::getAdvisorProfile($advisorPK),
        ]);
    }

    public function store(Request $request)
    {

    }

    public function show(Request $request)
    {
        return view("/advisor/notice/noticeDetail");
    }

}
