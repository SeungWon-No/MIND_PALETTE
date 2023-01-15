<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'contactPK';
    public $timestamps = false;

    public static function getInquiryList($items, $advisorPK)
    {
        $getInquiryList = Contact::where('isDelete', '=', 'N')
            ->where('advisorPK',$advisorPK)
            ->orderBy('contactPK',"DESC")
            ->paginate($items);

        $inquiryList = json_decode(json_encode($getInquiryList), true);

        foreach($inquiryList['data'] as $key => $list){
            $inquiryList['data'][$key] = [
                'contactPK' => $list['contactPK'],
                'contactName' => Crypt::decryptString($list['contactName']) ?? '',
                'contactPhone' => Crypt::decryptString($list['contactPhone']) ?? '',
                'contactTitle' => $list['contactTitle'],
                'contactContent' => $list['contactContent'],
                'contactStatus' => $list['contactStatus'],
                'isDelete' => $list['isDelete'],
                'updateDate' => $list['updateDate'],
                'createDate' => $list['createDate'],
            ];
        }
        return $inquiryList;
    }

    public static function getMyInquiryPost($contactPK)
    {
        return Contact::where('isDelete', '=', 'N')
            ->where('contactPK', '=', $contactPK)
            ->get()->first();
    }

}
