@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => false,
    "title" => "회원가입"
])
<section id="container" class="page-body">
    <form id="joinForm" name="joinForm" action="/join" method="post" autocomplete="off">
        @csrf
        <div class="page-contents page-write">
            <div class="join-wrap">
                <fieldset>
                    <legend>회원가입 입력 폼</legend>
                    <div class="form-group">
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">이메일<em class="need">*</em></div>
                                <div class="form-item-data">
                                    <input id="userEmail" name="userEmail" type="text" placeholder="입력" onFocus="inputChange(this);"
                                           onfocusout="checkEmail()"
                                           onKeyUp="inputChange(this);" onblur="inputBlur(this);" >
                                    <div id="error-email-info" style="display:none">
                                        <div class="form-input-valid font-color-error">이메일 형식이 올바르지 않습니다.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">비밀번호<em class="need">*</em></div>
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
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">이름<em class="need">*</em></div>
                                <div class="form-item-data">
                                    <input id="userName" name="userName" type="text" value="{{$userName}}}">
                                    <div style="display:none">
                                        <div class="form-input-valid font-color-error">이름을 입력하세요.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-cell">
                            <div class="form-group-item">
                                <div class="form-item-label">휴대전화<em class="need">*</em></div>
                                <div class="form-item-data">
                                    <div class="form-phone-confirm">
                                        <div class="form-control-btns">
                                            <input id="userPhone" name="userPhone" value="{{$userPhone}}}" >
                                            <button type="button" class="btn btn-outline-gray btn-inline btn-middle-size">
                                                인증번호
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="page-bottom-ui"><a href="javascript:submitForm()" class="btn btn-orange btn-large-size btn-page-action">회원가입</a></div>
            </div>
        </div>
    </form>
</section>
<script>
    function submitForm() {

        var checkValid;
        var isSubmit = true;

        checkValid = checkEmail();
        isSubmit = !!(isSubmit && checkValid);
        checkValid = checkPassword();
        isSubmit = !!(isSubmit && checkValid);

        if (isSubmit) {
            $("#joinForm").submit();
        }
        return false;
    }
    function checkEmail() {
        var email = $("#userEmail");
        var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;


        $("#userEmail").removeClass("valid-error");
        $("#error-email-info").css("display","none");
        if (email.val() === "" ) {
            $("#userEmail").addClass("valid-error");
            $("#error-email-info").html(" <div class='form-input-valid font-color-error'>이메일을 입력하세요.</div>");
            $("#error-email-info").css("display","block");
            return false;
        }

        if (regExp.test(email.val()) === false ) {
            $("#userEmail").addClass("valid-error");
            $("#error-email-info").html(" <div class='form-input-valid font-color-error'>이메일 형식이 올바르지 않습니다.</div>");
            $("#error-email-info").css("display","block");
            return false;
        }

        var emailCount = "1";
        $.ajax({
            type:'POST',
            url:'/emailCheck',
            data: {
                "userEmail" : email.val()
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(data){
                emailCount = data;
            }
        });

        if ( emailCount === "1" ) {
            $("#userEmail").addClass("valid-error");
            $("#error-email-info").html(" <div class='form-input-valid font-color-error'>이미 등록된 이메일 입니다.</div>");
            $("#error-email-info").css("display","block");
            return false;
        }
        return true;
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

