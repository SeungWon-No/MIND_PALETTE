@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "전화번호 변경"
])

<section id="container" class="page-body">
    <div class="page-contents page-write">
        <div class="mypage-wrap">
            <div class="member-find-desc">안전한 전화번호 변경을 위해<br>본인 인증을 해주세요.</div>
            <div class="page-bottom-ui">
                <a
                    href="javascript:phoneAuthSubmit()"
                   class="btn btn-orange btn-large-size btn-page-action">휴대폰 인증하기</a>
            </div>
        </div>
    </div>
    <form name="phoneAuth" action="/auth" method="post">
        @csrf
        <input type="hidden" name="CP_CD" maxlength="12" size="16" value="">
        <input type="hidden" name="SITE_NAME" maxlength="20" size="24" value="마음팔레트">
    </form>
    <form name="joinForm" method="post" action="#">
        @csrf
        <input type="hidden" name="userName" value="">
        <input type="hidden" name="userPhone" value="">
        <input type="hidden" name="DI" value="">
        <input type="hidden" name="CI" value="">
    </form>
</section>
<div id="phoneChangeConfirm" class="toast-pop-wrap">
    <div class="toast-pop-data" id="toastMessage">전화번호가 성공적으로 변경되었습니다.</div>
</div>
<script>
    function phoneAuthSubmit() {
        window.open("/auth", "auth_popup", "width=430,height=640,scrollbars=yes");
        var form1 = document.phoneAuth;
        form1.target = "auth_popup";
        form1.submit();
    }

    function authSuccess() {
        var queryString = $("form[name=joinForm]").serialize() ;
        $.ajax({
            type:'POST',
            url:'/MyPage/changePhone',
            data: queryString,
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                $("#toastMessage").html(data.message);
                common.toastPopOpen('pwChangeConfirm');
            }
        });
    }
</script>
@include('/mobile/common/end')

