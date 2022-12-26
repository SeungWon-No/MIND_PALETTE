<?php

namespace App\Http\Controllers\Mobile\Advice;

use App\Http\Controllers\Controller;
use App\Models\Code;
use Illuminate\Http\Request;

class HTPController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function save(Request $request, $counselingPK) {
        $pageOrder = $this->getAdviceOrder();
        $nowStatusCodePK = $this->getPageStatus("adviceInformation",$pageOrder);

        dd($nowStatusCodePK);
    }

    private function getAdviceOrder() {
        $pageOrder = Code::findCode("counselingStatus");

        $pageOrderResult = array();
        foreach ($pageOrder as $pageOrderRow) {
            $pageOrderResult[$pageOrderRow->codePK] = $pageOrderRow->codeName;
        }

        return $pageOrderResult;
    }

    private function getPageStatus($page,$pageOrder) {
        return array_search($page,$pageOrder);
    }
}
