<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class CounselingCancelLog extends Model
{
    protected $table = 'counselingCancelLog';
    protected $primaryKey = 'counselingCancelLogPK';
    public $timestamps = false;

}
