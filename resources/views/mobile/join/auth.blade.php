@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "회원가입",
])
<section id="container" class="page-body">
    <div class="page-contents page-write">
        <!-- 20221225 수정  -->
        <div class="member-find-desc">안전한 회원가입을 위해<br>본인 인증을 해주세요.</div>
        <div class="page-bottom-ui"><a href="javascript:phoneAuthSubmit()" class="btn btn-orange btn-large-size btn-page-action">휴대폰 인증하기</a></div>
        <!-- //20221225 수정  -->
    </div>
    <form name="phoneAuth" action="/auth" method="post">
        @csrf
        <input type="hidden" name="CP_CD" maxlength="12" size="16" value="">
        <input type="hidden" name="SITE_NAME" maxlength="20" size="24" value="마음팔레트">
    </form>
    <form name="joinForm" method="post" action="/createMember">
        @csrf
        <input type="hidden" name="userName" value="">
        <input type="hidden" name="userPhone" value="">
        <input type="hidden" name="DI" value="">
        <input type="hidden" name="CI" value="">
    </form>
</section>
<script>

    function phoneAuthSubmit() {
        window.open("/auth", "auth_popup", "width=430,height=640,scrollbars=yes");
        var form1 = document.phoneAuth;
        form1.target = "auth_popup";
        form1.submit();
    }

    function authSuccess() {
        $.ajax({
            type:'POST',
            url:'/memberAuthFind',
            data: {
                "CI" : document.joinForm.CI.value
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){

                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    document.joinForm.submit();
                } else {
                    alert(data.message);
                }
            }
        });
    }

</script>
@include('/mobile/common/end')

