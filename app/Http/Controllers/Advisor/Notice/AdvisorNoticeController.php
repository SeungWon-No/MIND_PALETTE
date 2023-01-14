<?php

namespace App\Http\Controllers\Advisor\Notice;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\NoticeBoard;
use Illuminate\Http\Request;

class AdvisorNoticeController extends Controller
{
    public function index(Request $request)
    {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];

        return view("/advisor/notice/notice",[
            "advisorProfile" => Advisor::getAdvisorProfile($advisorPK),
            "noticeList" => NoticeBoard::findNotice()
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
