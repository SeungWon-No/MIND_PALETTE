@include('advisor/common/header')
<div id="container" class="login">
      <div class="login-box">
        <div class="login-inner">
          <div class="login-heading">
            <p class="login-heading__desc">아동 심리케어 플랫폼</p>
            <div class="login-logo">
              <img src="../advisor/assets/images/login-logo.png" alt="" class="login-logo__img">
            </div>
          </div>
          <div class="login-input__wrap">
            <!-- 에러시 login-form__input에 클래스 vaild-error 추가 -->
            <div class="login-input__cell">
              <input type="text" class="login-form__input" placeholder="이메일">
            </div>
            <div class="login-input__cell">
              <input type="password" class="login-form__input" placeholder="비밀번호">
            </div>
          </div>
          <div class="login-check__wrap">
            <label class="label-checkbox login-checkbox__wrap">
              <input type="checkbox" class="form-checkbox login-checkbox">
              <span class="icon icon-size-15 check-bx-off-icon"></span>로그인유지
            </label>
            <div class="login-support">
              <a href="#none" class="find-info__link">아이디 • 비밀번호 찾기</a>
              <a href="/join" class="join-member-link">회원가입</a>
            </div>
          </div>
            <!-- 로그인 에러시 생성
            <div class="login-alert">
              <p class="login-alert__desc">이메일을 다시 확인해주세요.</p> 
              <p class="login-alert__desc">비밀번호를 다시 확인해주세요.</p>
            </div> --> 
          <div class="login-btn__wrap">
            <a href="#none" class="login-btn">로그인</a>
          </div>
        </div>
      </div>
    </div> <!-- container end-->
@include('advisor/common/footer')    
@include('advisor/common/end')