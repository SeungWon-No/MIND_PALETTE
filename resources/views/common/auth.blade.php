<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마음팔레트</title>
    @if($ret == 0)
        <script>
            function request(){
                document.form1.action = "{{$popupUrl}}";
                document.form1.method = "post";

                document.form1.submit();
            }
        </script>
</head>

<body>
<form name="form1">
    <!-- 인증 요청 정보 -->
    <!--// 필수 항목 -->
    <input type="hidden" name="tc" value="kcb.oknm.online.safehscert.popup.cmd.P931_CertChoiceCmd"/>		<!-- 변경불가-->
    <input type="hidden" name="cp_cd" value="{{$CP_CD}}">	<!-- 회원사코드 -->
    <input type="hidden" name="mdl_tkn" value="{{$MDL_TKN}}">	<!-- 모듈토큰 -->
    <input type="hidden" name="target_id" value="">
    <!-- 필수 항목 //-->
</form>
    <?php
    if ({{$RSLT_CD}} == "B000") {
        //인증요청
        echo ("<script>request();</script>");
    } else {
        //요청 실패 페이지로 리턴
        echo ("<script>alert('".$RSLT_CD." : ".$RSLT_MSG."'); self.close();</script>");
    }
    ?>
@else
    <script>
        alert('Fuction Fail / ret: {{$ret}}');
        self.close();
    </script>
@endif
</body>
</html>
