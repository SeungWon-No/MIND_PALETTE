@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "ID/PW 찾기",
])
<script>
    function pageClose(){
        location.href = '/';
    }
</script>
<section id="container" class="page-body">
    <div class="page-contents page-write">
        <div class="member-find-wrap">
            <div class="page-tab">
                <div class="page-tab-inner">
                    <!-- 활성화시 actived클래스 추가 -->
                    <div class="tab-cell actived"><a class="btn-tab-item"><span>아이디 찾기</span></a></div>
                    <div class="tab-cell"><a href="#" class="btn-tab-item"><span>비밀번호 찾기</span></a></div>
                </div>
            </div>
            <!-- 20221220 수정  -->
            <div class="member-find-desc">휴대폰 인증을 통해<br>고객님의 아이디를 찾습니다.</div>
            <div id="email" style="display: none" class="member-find-result"></div>
            <div class="page-bottom-ui">
                <a
                    id="buttonText"
                    href="javascript:phoneAuthSubmit()" class="btn btn-orange btn-large-size btn-page-action">
                    휴대폰 인증하기
                </a>
            </div>
            <!-- //20221220 수정  -->
        </div>
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
                    $("#infoText").html("인증된 전화번호로<br>등록된 계정이 없습니다.");
                    $("#buttonText").text('돌아가기');
                    $("#buttonText").attr("href",'/login');
                } else if ( data.status === "fail" ) {
                    $("#infoText").html("고객님이 사용하신<br>이메일 아이디의 일부분입니다.");
                    $("#email").text(data.email);
                    $("#email").css("display","block");
                    $("#buttonText").text('로그인');
                    $("#buttonText").attr("href",'/login');
                } else {
                    alert(data.message);
                }
            }
        });
    }

</script>
@include('/mobile/common/end')

