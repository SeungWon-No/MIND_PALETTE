@include('advisor/common/header')
<div id="container" class="login">
  <form id="loginForm" name="loginForm" action="/advisor/login" method="POST">
    @csrf
    <div class="login-box">
        <div class="login-inner">
          <div class="login-heading">
            <p class="login-heading__desc">아동 심리케어 플랫폼</p>
            <div class="login-logo">
              <img src="../advisorAssets/assets/images/login-logo.png" alt="" class="login-logo__img">
            </div>
          </div>
          <div class="login-input__wrap">
            <div class="login-input__cell">
              <input id="userEmail" name="userEmail" type="text" class="login-form__input" placeholder="이메일">
            </div>
            <div class="login-input__cell">
              <input id="userPassword" name="userPassword" type="password" class="login-form__input" placeholder="비밀번호">
            </div>
          </div>
          <div class="login-check__wrap">
            <label class="label-checkbox login-checkbox__wrap">
              <input id="autoLogin"  name="autoLogin" type="checkbox" class="form-checkbox login-checkbox" value="" onclick="window.autoLoginCheck()">
              <span class="icon icon-size-15 check-bx-off-icon"></span>로그인유지
            </label>
            <div class="login-support">
              <a href="#none" class="find-info__link">아이디 • 비밀번호 찾기</a>
              <a href="/advisor/join" class="join-member-link">회원가입</a>
            </div>
          </div>
          <article id="loginCheckBox" class="layer-pop__wrap active" style="display: none;">
            <div class="layer-pop__parent">
              <div class="layer-pop__children">
                <div class="layer-pop__data">
                  <div class="layer-alarm">
                    <div class="layer-alarm__text-g">
                      <p class="layer-alarm__desc">
                        로그인상태 유지를 사용하시면<br> 다음부터 아이디/비밀번호를 입력하실 필요가 없습니다.<br> 공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.<br>로그인 상태를 유지 하시겠습니까?
                      </p>
                    </div>
                    <div class="layer-alarm__btns-wrap">
                      <button type="button" class="layer-alarm__btn login-check-agree" onclick="window.autoLoginCheckConfirm()">확인</button>
                      <button type="button" class="layer-alarm__btn cancel" onclick="pop.close()">취소</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <div class="login-btn__wrap">
            <a href="javascript:submitForm()" class="login-btn">로그인</a>
          </div>
        </div>
    </div>
  </form>
</div>
@include('advisor/common/footer')
@include('advisor/common/end')
<script>
  
  function autoLoginCheckConfirm(){ // 자동로그인 유지 팝업에서 '확인'버튼 클릭 시 호출
    return true;
  }
  function autoLoginCheck(){  // 자동 로그인 프로세스
    var checkResult = $('[name=autoLogin]').prop('checked'); // 체크여부 확인

    if (checkResult == true) {
      $('#loginCheckBox').attr('style', "display:'';"); // 자동로그인 유지 팝업 ON
      var autoLoginCheckConfirm = window.autoLoginCheckConfirm(); // 팝업에서 '확인'버튼 누를 경우
      if (autoLoginCheckConfirm == true) {
        $('input[name=autoLogin]').attr('value','true');
      }
    }
  }
  
  function submitForm() {
      $("#loginForm").submit();
  }
</script>
