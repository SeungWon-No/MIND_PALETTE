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
                    <div class="tab-cell"><a href="/idFind" class="btn-tab-item"><span>아이디 찾기</span></a></div>
                    <div class="tab-cell actived"><a class="btn-tab-item"><span>비밀번호 찾기</span></a></div>
                </div>
            </div>
            <div class="member-find-desc">고객님이 사용중이신<br>이메일 아이디를 입력해주세요.</div>
            <fieldset>
                <legend>비밀번호 찾기 입력 폼</legend>
                <div class="form-group">
                    <div class="form-group-cell">
                        <div class="form-group-item">
                            <div class="form-item-label">이메일<em class="need">*</em></div>
                            <div class="form-item-data">
                                <!-- 20221220 수정 -->
                                <input
                                    id="userEmail" name="userEmail"
                                    type="text"
                                    placeholder="입력"
                                    onfocusout="checkEmail()"
                                    onblur="inputBlur(this);">
                                <div id="error-email-info" style="display:none">
                                    <div class="form-input-valid font-color-error">이메일을 다시 확인해주세요.</div>
                                </div>
                                <!-- //20221220 수정 -->
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <!-- 20221220 수정 -->
            <div class="page-bottom-ui">
                <a href="javascript:phoneAuthSubmit()" class="btn btn-orange btn-large-size btn-page-action">휴대폰 인증하기</a>
            </div>
            <!-- //20221220 수정 -->
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
    function checkEmail() {
        var email = $("#userEmail");
        var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;


        $("#userEmail").removeClass("valid-error");
        $("#error-email-info").css("display", "none");
        if (email.val() === "") {
            $("#userEmail").addClass("valid-error");
            $("#error-email-info").html(" <div class='form-input-valid font-color-error'>이메일을 입력하세요.</div>");
            $("#error-email-info").css("display", "block");
            return false;
        }

        if (regExp.test(email.val()) === false) {
            $("#userEmail").addClass("valid-error");
            $("#error-email-info").html(" <div class='form-input-valid font-color-error'>이메일 형식이 올바르지 않습니다.</div>");
            $("#error-email-info").css("display", "block");
            return false;
        }
        return true;
    }
    function phoneAuthSubmit() {
        if (!checkEmail()) {
            return false;
        }
        window.open("/auth", "auth_popup", "width=430,height=640,scrollbars=yes");
        var form1 = document.phoneAuth;
        form1.target = "auth_popup";
        form1.submit();
    }

    function authSuccess() {

        if (!checkEmail()) {
            return false;
        }

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

