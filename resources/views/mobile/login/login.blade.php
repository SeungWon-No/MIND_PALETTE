@include('/mobile/common/start')
<div class="login-wrap">
    <div class="login-inner">
        <div class="login-logo"></div>
        <div class="login-input-wrap">
            <fieldset>
                <legend>로그인 입력 폼</legend>
                <div class="login-input">
                    <!-- common.js의 inputChange에서 valid-error클래스를 무조건 삭제하게 처리해 놓았습니다.(기획에서 코드 입력시 무조건 에러 표현은 사라지게 처리해달라는 내용이 있었습니다.) -->
                    <div class="input">
                        <div class="icon icon-form-id-yellow"></div>
                        <input type="text" placeholder="이메일" onFocus="inputChange(this);" onKeyUp="inputChange(this);" onblur="inputBlur(this);" class="valid-error">
                    </div>
                    <div class="input">
                        <div class="icon icon-form-pw-yellow"></div>
                        <input type="password" placeholder="비밀번호"  onFocus="inputChange(this);"onKeyUp="inputChange(this);" onblur="inputBlur(this);" class="valid-error">
                    </div>
                </div>
                <div class="login-check">
                    <label class="form-checkbox"><input type="checkbox"><span class="form-check-icon"><em>로그인 유지</em></span></label>
                    <a href="#">계정 정보를 잊으셧나요?</a>
                </div>
                <div style="display:block">
                    <div class="form-input-valid font-color-error">
                        <div style="display:block">이메일을 다시 확인해주세요.</div>
                        <div style="display:block">비밀번호를 다시 확인해주세요.</div>
                    </div>
                </div>
                <div class="login-btns"><a href="#" class="btn btn-orange btn-large-size btn-page-action">로그인</a></div>
                <div class="login-join">계정이 없으신가요? <a href="#">회원가입</a></div>
            </fieldset>
        </div>
    </div>
    <div class="login-footer">
        @include('/mobile/common/footer')
    </div>
</div>
@include('/mobile/common/end')

