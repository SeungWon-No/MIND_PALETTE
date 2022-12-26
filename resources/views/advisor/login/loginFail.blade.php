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
              <input id="userEmail" name="userEmail" type="text" class="login-form__input vaild-error" placeholder="이메일">
            </div>
            <div class="login-input__cell">
              <input id="userPassword" name="userPassword" type="password" class="login-form__input vaild-error" placeholder="비밀번호">
            </div>
          </div>
          <div class="login-check__wrap">
            <label class="label-checkbox login-checkbox__wrap">
              <input type="checkbox" class="form-checkbox login-checkbox">
              <span class="icon icon-size-15 check-bx-off-icon"></span>로그인유지
            </label>
            <div class="login-support">
              <a href="#none" class="find-info__link">아이디 • 비밀번호 찾기</a>
              <a href="/advisor/join" class="join-member-link">회원가입</a>
            </div>
          </div>
            <div class="login-alert">
              <p class="login-alert__desc">이메일을 또는 비밀번호를 다시 확인해주세요.</p>
            </div>
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
    function submitForm() {
        $("#loginForm").submit();
    }
</script>
