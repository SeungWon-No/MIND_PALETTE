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

<section id="PWFindContainer" class="page-body">
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
<section id="PWFindNewContainer" class="page-body" style="display: none">
    <form name="pwChangeForm">
        @csrf
        <input type="hidden" name="email" id="pwChangeEmail" value="">
        <input type="hidden" name="email" id="pwChangeEmailHash" value="">
        <div class="page-contents page-write">
            <div class="member-find-wrap">
                <div class="page-tab">
                    <div class="page-tab-inner">
                        <!-- 활성화시 actived클래스 추가 -->
                        <div class="tab-cell"><a href="/idFind" class="btn-tab-item"><span>아이디 찾기</span></a></div>
                        <div class="tab-cell actived"><a class="btn-tab-item"><span>비밀번호 찾기</span></a></div>
                    </div>
                </div>
                <div class="member-find-desc">새로운 비밀번호로 변경합니다.</div>
                <fieldset>
                    <legend>비밀번호 찾기 입력 폼</legend>
                    <div class="form-group">
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">새 비밀번호</div>
                                <div class="form-item-data">
                                    <div class="input">
                                        <input id="userPassword" name="userPassword"
                                               type="password" placeholder="영문+숫자+특수문자 8~20자 입력" onFocus="inputChange(this);"
                                               maxlength="20" onfocusout="checkPassword()"
                                               onKeyUp="inputChange(this);" onblur="inputBlur(this);">
                                        <div id="error-password-info"  style="display:none">
                                            <div class="form-input-valid font-color-error">영문+숫자+특수문자 8~20자를 입력하셔야 합니다.</div>
                                        </div>
                                    </div>
                                    <div class="input">
                                        <input id="pwConfirm" onfocusout="confirmPassword()"
                                               type="password" placeholder="비밀번호 재입력" onFocus="inputChange(this);"
                                               maxlength="20" onKeyUp="inputChange(this);" onblur="inputBlur(this);" >
                                        <div id="error-password-confirm-info" style="display:none">
                                            <div class="form-input-valid font-color-error">비밀번호가 일치하지 않습니다.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="page-bottom-ui"><a href="#" class="btn btn-orange btn-large-size btn-page-action">저장</a></div>
            </div>
        </div>
    </form>
</section>
<section id="PWFindNoneContainer" class="page-body" style="display: none">
    <div class="page-contents page-write">
        <div class="member-find-wrap">
            <div class="page-tab">
                <div class="page-tab-inner">
                    <!-- 활성화시 actived클래스 추가 -->
                    <div class="tab-cell"><a href="#" class="btn-tab-item"><span>아이디 찾기</span></a></div>
                    <div class="tab-cell actived"><a href="#" class="btn-tab-item"><span>비밀번호 찾기</span></a></div>
                </div>
            </div>
            <div class="member-find-desc">입력하신 아이디로<br>등록된 계정이 없습니다.</div>
            <div class="page-bottom-ui"><a href="javascript:resetPassword()" class="btn btn-orange btn-large-size btn-page-action">재입력</a></div>
        </div>
    </div>
</section>
<section id="PWFindCompleteContainer" class="page-body" style="display: none">
    <div class="page-contents page-write">
        <div class="member-find-wrap">
            <div class="page-tab">
                <div class="page-tab-inner">
                    <!-- 활성화시 actived클래스 추가 -->
                    <div class="tab-cell"><a href="#" class="btn-tab-item"><span>아이디 찾기</span></a></div>
                    <div class="tab-cell actived"><a href="#" class="btn-tab-item"><span>비밀번호 찾기</span></a></div>
                </div>
            </div>
            <div class="member-find-desc">비밀번호가 성공적으로 변경되었습니다.<br>홈에서 다시 로그인해주세요.</div>
            <div class="page-bottom-ui"><a href="#" class="btn btn-orange btn-large-size btn-page-action">로그인</a></div>
        </div>
    </div>
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
            url:'/memberAuthCheck',
            data: {
                "email" : $("#userEmail").value(),
                "CI" : document.joinForm.CI.value
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){

                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    $("#pwChangeEmail").val($("#userEmail").value());
                    $("#pwChangeEmailHash").val(data.email);
                    $("#PWFindContainer").css("display","none");
                    $("#PWFindNewContainer").css("display","block");
                } else if ( data.status === "fail" ) {
                    $("#PWFindContainer").css("display","none");
                    $("#PWFindNoneContainer").css("display","block");
                } else {
                    alert(data.message);
                }
            }
        });
    }

    function changePassword() {

        var checkValid = true;
        checkValid = (checkPassword() && checkValid);
        checkValid = (confirmPassword() && checkValid);

        if (checkValid) {
            var queryString = $("form[name=pwChangeForm]").serialize() ;
            $.ajax({
                type:'POST',
                url:'/changeMemberPassword',
                data: queryString,
                async: false,
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                success:function(json){
                    var data = JSON.parse(json);
                    if ( data.status === "success" ) {
                        $("#PWFindNewContainer").css("display","none");
                        $("#PWFindCompleteContainer").css("display","block");
                    } else {
                        alert(data.message);
                    }
                }
            });
            $("#joinForm").submit();
        }

    }

    function resetPassword() {
        $("#userEmail").val("");
        $("#PWFindContainer").css("display","block");
        $("#PWFindNoneContainer").css("display","none");
    }

    function checkPassword() {
        var userPassword = $("#userPassword").val();
        var regExp = /^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[$`~!@$!%*#^?&\\(\\)\-_=+]).{8,16}$/;

        $("#userPassword").removeClass("valid-error");
        $("#error-password-info").css("display","none");

        if ($("#userPassword").val() === "" ) {
            $("#userPassword").addClass("valid-error");
            $("#error-password-info").html(" <div class='form-input-valid font-color-error'>비밀번호를 입력해주세요.</div>");
            $("#error-password-info").css("display","block");
            return false;
        }

        if (!regExp.test(userPassword)) {
            $("#userPassword").addClass("valid-error");
            $("#error-password-info").html(" <div class='form-input-valid font-color-error'>영문+숫자+특수문자 8~20자를 입력하셔야 합니다.</div>");
            $("#error-password-info").css("display","block");
            return false;
        }

        if (userPassword.length < 8 || userPassword.length > 20) {
            $("#userPassword").addClass("valid-error");
            $("#error-password-info").html(" <div class='form-input-valid font-color-error'>영문+숫자+특수문자 8~20자를 입력하셔야 합니다.</div>");
            $("#error-password-info").css("display","block");
            return false;
        }

        return true;
    }

    function confirmPassword() {
        if ($("#userPassword").val() === "" ) {
            return false;
        }
        $("#pwConfirm").removeClass("valid-error");
        $("#error-password-confirm-info").css("display","none");
        if ($("#userPassword").val() !== $("#pwConfirm").val() ) {

            $("#pwConfirm").addClass("valid-error");
            $("#error-password-confirm-info").html(" <div class='form-input-valid font-color-error'>비밀번호가 일치하지 않습니다.</div>");
            $("#error-password-confirm-info").css("display","block");
            return false;
        }
        return true;
    }
</script>
@include('/mobile/common/end')

