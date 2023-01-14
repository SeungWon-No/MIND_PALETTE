<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'contactPK';
    public $timestamps = false;

    public static function getInquiryList($items)
    {
        $getInquiryList = Contact::where('isDelete', '=', 'N')
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
        $getMyInquiryPost = Contact::where('isDelete', '=', 'N')
            ->where('contactPK', '=', $contactPK)
            ->get();

        $getMyInquiryPost = json_decode(json_encode($getMyInquiryPost[0]), true);

        $myInquiryPost = [
            'contactPK' => $getMyInquiryPost['contactPK'],
            'memberPK' => $getMyInquiryPost['memberPK'],
            'contactType' => $getMyInquiryPost['contactType'],
            'contactName' => Crypt::decryptString($getMyInquiryPost['contactName']),
            'contactPhone' => Crypt::decryptString($getMyInquiryPost['contactPhone']),
            'contactTitle' => $getMyInquiryPost['contactTitle'],
            'contactContent' => $getMyInquiryPost['contactContent'],
            'contactStatus' => $getMyInquiryPost['contactStatus'],
            'updateDate' => date('Y.m.d', strtotime($getMyInquiryPost['updateDate'])),
            'createDate' => date('Y.m.d', strtotime($getMyInquiryPost['createDate'])),
        ];
        return $myInquiryPost;
    }

}
