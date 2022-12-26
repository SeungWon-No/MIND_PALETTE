<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PASSAuthController extends Controller
{
    public function __invoke(Request $request)
    {
        $SITE_NAME	=	$request->SITE_NAME;
        // $SITE_URL 	=   "forkliftdream.com";
        $SITE_URL 	=   "m.forkliftdream.com";

        $CP_CD = "V60440000000";

        $RETURN_URL = "http://".$_SERVER['HTTP_HOST']."/auth/return";// 인증 완료 후 리턴될 URL (도메인 포함 full path)

        //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
        //' 인증요청사유코드 (가이드 문서 참조)
        //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
        $RQST_CAUS_CD ="00";

        $target = "PROD";	// 테스트="TEST", 운영="PROD"
        $popupUrl = "https://safe.ok-name.co.kr/CommonSvl";	// 운영 URL

        $license = "/usr/share/nginx/".$CP_CD."_IDS_01_".$target."_AES_license.dat";

        /**************************************************************************
        okcert3 request param JSON String
         **************************************************************************/
        $params  = '{ "CP_CD":"'.$CP_CD.'",';
        $params .= '"RETURN_URL":"'.$RETURN_URL.'",';
        $params .= '"SITE_NAME":"'.$SITE_NAME.'",';
        $params .= '"SITE_URL":"'.$SITE_URL.'",';
        $params .= '"RQST_CAUS_CD":"'.$RQST_CAUS_CD.'" }';

        $svcName = "IDS_HS_POPUP_START";
        $out = NULL;

        // okcert3 실행
        $ret = okcert3_u($target, $CP_CD, $svcName, $params, $license, $out);	// UTF-8
        // $ret = okcert3($target, $CP_CD, $svcName, $params, $license, $out);		// EUC-KR

        /**************************************************************************
        okcert3 응답 정보
         **************************************************************************/
        $RSLT_CD = "";						// 결과코드
        $RSLT_MSG = "";						// 결과메시지
        $MDL_TKN = "";						// 모듈토큰
        $TX_SEQ_NO = "";					// 거래일련번호

        if ($ret == 0) {// 함수 실행 성공일 경우 변수를 결과에서 얻음
            // $out = iconv("euckr","utf-8",$out);		// 인코딩 icnov 처리. okcert3 호출(EUC-KR)일 경우에만 사용 (json_decode가 UTF-8만 가능)
            $output = json_decode($out,true);		// $output = UTF-8

            $RSLT_CD = $output['RSLT_CD'];
            // $RSLT_MSG  = iconv("utf-8","euckr", $output["RSLT_MSG"]);	// 다시 EUC-KR 로 변환
            $RSLT_MSG  = $output["RSLT_MSG"];

            if(isset($output["TX_SEQ_NO"])) $TX_SEQ_NO = $output["TX_SEQ_NO"]; // 필요 시 거래 일련 번호 에 대하여 DB저장 등의 처리

            if( $RSLT_CD == "B000" ) { // B000 : 정상건
                $MDL_TKN = $output['MDL_TKN'];
            }
        }

        return view('/common/auth',[
            "popupUrl" => $popupUrl,
            "RSLT_CD" => $RSLT_CD,
            "RSLT_MSG" => $RSLT_MSG,
            "MDL_TKN" => $MDL_TKN,
            "CP_CD" => $CP_CD,
            "ret" => $ret
        ]);
    }

    public function authReturn(Request $request){
        /* 팝업창 리턴 항목 */
        $MDL_TKN	=	$request->mdl_tkn;

        // ########################################################################
        // # KCB로부터 부여받은 회원사코드(아이디) 설정 (12자리)
        // ########################################################################
        $CP_CD = "V60440000000";				// 회원사코드(아이디)

        //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
        //' 타겟 : 운영/테스트 전환시 변경 필요
        //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
        $target = "PROD"; // 테스트="TEST", 운영="PROD"

        //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
        //' 라이센스 파일
        //'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
        $license = "/usr/share/nginx/".$CP_CD."_IDS_01_".$target."_AES_license.dat";


        /**************************************************************************
        okcert3 request param JSON String
         **************************************************************************/
        $params = '{ "MDL_TKN":"'.$MDL_TKN.'" }';


        $svcName = "IDS_HS_POPUP_RESULT";
        $out = NULL;

        // okcert3 실행
        $ret = okcert3_u($target, $CP_CD, $svcName, $params, $license, $out);  // UTF-8
        // $ret = okcert3($target, $CP_CD, $svcName, $params, $license, $out);  // EUC-KR

        /**************************************************************************
        okcert3 응답 정보
         **************************************************************************/
        $RSLT_CD = "";						// 결과코드
        $RSLT_MSG = "";						// 결과메시지
        $TX_SEQ_NO = "";					// 거래일련번호

        $RSLT_NAME		= "";
        $RSLT_BIRTHDAY 	= "";
        $RSLT_SEX_CD	= "";
        $RSLT_NTV_FRNR_CD="";

        $DI				= "";
        $CI				= "";
        $CI_UPDATE		= "";
        $TEL_COM_CD		= "";
        $TEL_NO			= "";

        $RETURN_MSG 	= "";				// 리턴메시지

        $isSuccess = false;
        $authResult = array();

        if($ret == 0) {		// 함수 실행 성공일 경우 변수를 결과에서 얻음
            // $out = iconv("euckr","utf-8",$out);		// 인코딩 icnov 처리. okcert3 호출(EUC-KR)일 경우에만 사용 (json_decode가 UTF-8만 가능)
            $output = json_decode($out,true);		// $output = UTF-8

            $RSLT_CD	= $output['RSLT_CD'];
            // $RSLT_MSG  = iconv("utf-8","euckr", $output["RSLT_MSG"]);	// 다시 EUC-KR 로 변환
            $RSLT_MSG  = $output["RSLT_MSG"];	// 다시 EUC-KR 로 변환

            if(isset($output["TX_SEQ_NO"])) $TX_SEQ_NO = $output["TX_SEQ_NO"]; // 필요 시 거래 일련 번호 에 대하여 DB저장 등의 처리
            if(isset($output["RETURN_MSG"]))  $RETURN_MSG  = $output['RETURN_MSG'];

            if( $RSLT_CD == "B000" ) { // B000 : 정상건
                // $RSLT_NAME  = iconv("utf-8","euckr",$output['RSLT_NAME']); // 다시 EUC-KR 로 변환
                $RSLT_NAME  = $output['RSLT_NAME'];
                $RSLT_BIRTHDAY	= $output['RSLT_BIRTHDAY'];
                $RSLT_SEX_CD	= $output['RSLT_SEX_CD'];
                $RSLT_NTV_FRNR_CD=$output['RSLT_NTV_FRNR_CD'];

                $DI				= $output['DI'];
                $CI 			= $output['CI'];
                $CI_UPDATE		= $output['CI_UPDATE'];
                $TEL_COM_CD		= $output['TEL_COM_CD'];
                $TEL_NO			= $output['TEL_NO'];

                dd($output);

//                $hashName = Hash::make($RSLT_NAME);
//                $hashPhone = Hash::make($TEL_NO);
//                $hashCI = Hash::make($CI);
//                $hashDI = Hash::make($DI);
//
//                $authResult = [
//                    "DI" => $DI,
//                    "hashDI" => $hashDI,
//                    "CI" => $CI,
//                    "hashCI" => $hashCI,
//                    "name" => $RSLT_NAME,
//                    "hashName" => $hashName,
//                    "phone" => $TEL_NO,
//                    "hashPhone" => $hashPhone,
//                ];

                $isSuccess = true;
            }
        } else {
        }
        return view("/common/authResult",[
            "isSuccess" => $isSuccess,
            "authResult" => $authResult
        ]);

    }
}
