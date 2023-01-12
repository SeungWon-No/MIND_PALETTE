@include('/mobile/common/start')
<section id="container" class="page-body">
    <div class="page-contents">
        <div class="login-wrap">
            <div class="login-inner">
                <div class="login-logo"></div>
                <div class="login-logo__desc">마음팔레트</div>
                <div class="login-input-wrap">
                    <fieldset>
                        <legend>로그인 입력 폼</legend>
                        <div class="login-input">
                            @csrf
                            <!-- common.js의 inputChange에서 valid-error클래스를 무조건 삭제하게 처리해 놓았습니다.(기획에서 코드 입력시 무조건 에러 표현은 사라지게 처리해달라는 내용이 있었습니다.) -->
                            <div class="input">
                                <div class="icon icon-form-id-yellow"></div>
                                <input id="email" type="text" placeholder="이메일"
                                       onFocus="inputChange(this);" onKeyUp="inputChange(this);"
                                       onblur="inputBlur(this);"/>
                            </div>
                            <div class="input">
                                <div class="icon icon-form-pw-yellow"></div>
                                <input id="pw" type="password" placeholder="비밀번호"
                                       onFocus="inputChange(this);" onKeyUp="inputChange(this);"
                                       onblur="inputBlur(this);"/>
                            </div>
                        </div>
                        <div class="login-check">
                            <label class="form-checkbox" onclick="checkLoginForm()">
                                <input id="autoLogin"  name="autoLogin" type="checkbox" />
                                <span class="form-check-icon"><em>로그인 유지</em></span>
                            </label>
                            <a href="/idFind">계정 정보를 잊으셧나요?</a>
                        </div>
                        <div style="display:block">
                            <div class="form-input-valid font-color-error">
                                <div id="error-info" style="display: none">이메일을 다시 확인해주세요.</div>
                            </div>
                        </div>
                        <div class="login-btns">
                            <a href="javascript:login()" class="btn btn-orange btn-large-size btn-page-action">로그인</a>
                        </div>
                        <div class="login-join">계정이 없으신가요? <a href="/join">회원가입</a></div>
                    </fieldset>
                </div>
                <a href="/" class="btn-page-ui btn-page-close"><div class="icon icon-page-close-gray">페이지 닫기</div></a>
            </div>
            <div class="login-footer">
                <div class="footer-menu">
                    <a href="/terms" class="btn-footer-nav">이용약관</a>
                    <a href="/privacyStatement" class="btn-footer-nav">개인정보 취급방침</a>
                    <a href="/contact" class="btn-footer-nav">고객센터</a>
                </div>
                <div class="footer-copy">Copyright ©5DALANT All Rights Reserved.</div>
            </div>
        </div>
    </div>
</section>
<script>
    $(window).keypress(function(e){
        if(e.keyCode === 13) {
            login();
        }
    });

    function checkLoginForm() {
        var email = $("#email").val();
        var pw = $("#pw").val();

        if (email === "") {
            $("#email").addClass("valid-error");
        }

        if (pw === "") {
            $("#pw").addClass("valid-error");
        }
    }

    function login() {
        var email = $("#email").val();
        var pw = $("#pw").val();
        var autoLogin = document.getElementById('autoLogin').checked;

        $("#error-info").css("display","none");
        if ( email === "" ) {
            $("#email").addClass("valid-error");
            $("#error-info").text("이메일을 입력해주세요");
            $("#error-info").css("display","block");
            $("#email").focus();
            return false;
        }

        if ( pw === "" ) {
            $("#pw").addClass("valid-error");
            $("#error-info").text("비밀번호를 입력해주세요");
            $("#error-info").css("display","block");
            $("#pw").focus();
            return false;
        }

        $.ajax({
            type:'POST',
            url:'/login',
            data: {
                "email" : encodeURI(email),
                "pw" : encodeURI(pw),
                "autoLogin" : autoLogin
            },
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(data){
                if ( data === "success" ) {
                    location.href = '/';
                } else {
                    $("#error-info").text(data);
                    $("#error-info").css("display","block");
                }
            }
        });
    }
</script>
@include('/mobile/common/end')

