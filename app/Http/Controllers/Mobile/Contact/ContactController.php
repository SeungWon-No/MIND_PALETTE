<?php

namespace App\Http\Controllers\Mobile\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('/mobile/contact/create');
    }

    public function save(Request $request) {
        try {
            $contactName = $request->contactName ?? '';
            $contactPhone = $request->contactPhone ?? '';
            $contactContent = $request->contactContent ?? '';

            $nowDate = date("Y-m-d H:i:s");

            if ($contactName == '' || $contactPhone == "" || $contactContent == '') {
                return redirect('/')->with('toast', '필수 값이 존재하지 않습니다.');
            }
            $contactContent = str_replace("\n","<br/>",htmlspecialchars(urldecode($contactContent)));

            $contact = new Contact;
            if ($request->session()->has("login")) {
                $memberPK = $request->session()->get('login')[0]['memberPK'];
                $contact->memberPK = $memberPK;
            }
            $contact->contactType = 358;
            $contact->contactName = Crypt::encryptString($contactName);
            $contact->contactPhone = Crypt::encryptString($contactPhone);
            $contact->contactContent = $contactContent;
            $contact->contactStatus = 352;
            $contact->updateDate = $nowDate;
            $contact->createDate = $nowDate;
            $contact->save();

            return redirect('/')->with('toast', '고객센터로 문의가 접수되었습니다.');
        }catch (\Exception $e) {
            return redirect('/')->with('toast', '문의하기에 실패하였습니다. 증상이 계속되면 고객센터로 문의해주세요');
        }
    }
}
