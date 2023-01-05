<?php

namespace App\Http\Controllers\Advisor\Notice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvisorNoticeController extends Controller
{
    public function index(Request $request)
    {
        // 리스트 전체 가져오기
        return view("/advisor/notice/notice");
    }

    public function store(Request $request)
    {
        
    }

    public function show(Request $request)
    {
        return view("/advisor/notice/noticeDetail");
    }

}