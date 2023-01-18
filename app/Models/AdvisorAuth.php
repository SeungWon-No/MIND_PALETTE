<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvisorAuth extends Model
{
    protected $table = 'advisorAuth';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;


    public static function findAdvisorEmail($di, $ci){
        $findAdvisorEmail = AdvisorAuth::select('advisorPK')
                            ->where('advisorCI','=', $ci)
                            ->where('advisorDI', '=', $di)
                            ->get();

        $findAdvisorPK = json_decode(json_encode($findAdvisorEmail), true);
        return $findAdvisorPK;
    }
    
}
