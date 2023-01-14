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
        $type = $request->type ?? '';
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];

        return view("/advisor/notice/notice",[
            "advisorProfile" => Advisor::getAdvisorProfile($advisorPK),
            "noticeList" => NoticeBoard::findNotice($type),
            "type" =>$type
        ]);
    }

    public function store(Request $request)
    {

    }

    public function show(Request $request,$noticePK)
    {
        $advisorPK = $request->session()->get('advisorLogin')[0]["advisorPK"];
        $notice = NoticeBoard::find($noticePK);
        $notice->viewCount = $notice->viewCount+1;
        $notice->save();

        $pages = NoticeBoard::findPageNavigation($noticePK);
        $pageNavigation = [];
        foreach ( $pages as $page) {

            if ($page->noticePK < $noticePK) {
                $pageNavigation["prePage"] = [
                    "noticePK" => $page->noticePK,
                    "title" => $page->title,
                ];
            } else {
                $pageNavigation["nextPage"] = [
                    "noticePK" => $page->noticePK,
                    "title" => $page->title,
                ];

            }
        }
        return view("/advisor/notice/noticeDetail",[
            "advisorProfile" => Advisor::getAdvisorProfile($advisorPK),
            "notice" => $notice,
            "pageNavigation" => $pageNavigation
        ]);
    }

}
