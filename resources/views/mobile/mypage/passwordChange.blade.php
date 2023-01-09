@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "비밀번호 변경"
])
<section id="container" class="page-body">
    @csrf
    <div class="page-contents page-write">
        <div class="mypage-wrap">
            <fieldset>
                <legend>비밀번호 변경 입력 폼</legend>
                <div class="form-group">
                    <div class="form-group-cell">
                        <div class="form-group-item">
                            <div class="form-item-label">현재 비밀번호</div>
                            <div class="form-item-data">
                                <div class="input">
                                    <input
                                        id="originPassword"
                                        name="originPassword"
                                        type="password"
                                        placeholder="영문+숫자+특수문자 8~20자 입력"
                                        onfocusout="checkOriginPassword()"
                                           onKeyUp="inputChange(this);"
                                           onblur="inputBlur(this);">
                                    <div id="error-password-origin"  style="display:none">
                                        <div class="form-input-valid font-color-error">기존 비빌번호를 입력해주세요.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
            <div class="page-bottom-ui"><a href="javascript:submitPassword()" class="btn btn-orange btn-large-size btn-page-action">저장</a></div>
        </div>
    </div>
</section>
<div id="pwChangeConfirm" class="toast-pop-wrap">
    <div class="toast-pop-data" id="toastMessage">비밀번호가 성공적으로 변경되었습니다.</div>
</div>
<script>
    function submitPassword() {

        var checkValid = true;
        checkValid = (checkOriginPassword() && checkValid);
        checkValid = (checkPassword() && checkValid);
        checkValid = (confirmPassword() && checkValid);

        if (checkValid) {
            $.ajax({
                type:'POST',
                url:'/MyPage/passwordChangePrc',
                data: {
                    "originPassword" : $("#originPassword").val(),
                    "changePassword" : $("#userPassword").val(),
                },
                async : false,
                headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
                success:function(json){
                    var data = JSON.parse(json);
                    $("#toastMessage").html(data.message);
                    common.toastPopOpen('pwChangeConfirm');
                }
            });
        }
    }
    function checkOriginPassword() {
        if ($("#originPassword").val() === "" ) {
            $("#originPassword").addClass("valid-error");
            $("#error-password-origin").html(" <div class='form-input-valid font-color-error'>비밀번호를 입력해주세요.</div>");
            $("#error-password-origin").css("display","block");
            return false;
        }
        return true
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

