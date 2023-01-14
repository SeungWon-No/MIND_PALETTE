<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class NoticeBoard extends Model
{
    protected $table = 'noticeBoard';
    protected $primaryKey = 'noticePK';
    public $timestamps = false;

    public static function findNotice() {
        return NoticeBoard::where("isDelete","N")
            ->orderBy("noticePK", "DESC")
            ->paginate(10);
    }
}
