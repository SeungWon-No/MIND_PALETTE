<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NoticeBoard extends Model
{
    protected $table = 'noticeBoard';
    protected $primaryKey = 'noticePK';
    public $timestamps = false;

    public static function findMainNotice() {
        return NoticeBoard::where("isDelete","N")
            ->orderBy("noticePK", "DESC")
            ->limit(10)->get()->first();
    }
    public static function findNotice($type) {
        $orderBy = ($type == "old") ? "ASC" : "DESC";
        $pagination = NoticeBoard::where("isDelete","N")
            ->orderBy("noticePK", $orderBy)
            ->paginate(10);
        return json_decode(json_encode($pagination), true);
    }

    public static function findPageNavigation($noticePK) {
        return DB::select("select * from noticeBoard
          where ( noticePK = IFNULL((select min(noticePK) from noticeBoard where noticePK > ".$noticePK." ),0)
                      or  noticePK = IFNULL((select max(noticePK) from noticeBoard where noticePK < ".$noticePK." ),0)
          )");
    }
}
