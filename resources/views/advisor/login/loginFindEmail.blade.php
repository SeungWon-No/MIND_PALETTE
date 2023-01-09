@include('advisor/common/loginForm/loginHeader')
<body>
  <div id="wrapper">
    <div id="container" class="login">
      <div class="login-box">
        <div class="login-inner">
          <div class="login-heading">
            <div class="login-logo">
            <img src="../advisorAssets/assets/images/login-logo.png" alt="" class="login-logo__img">
            </div>
          </div>
          <div class="login-tab__cont">
            <div class="login-tab__wrap">
              <a href="#" class="login-tab active">아이디 찾기</a>
              <a href="/advisor/loginFindPassword" class="login-tab">비밀번호 찾기</a>
            </div>
            <div class="lgoin-tab__content">
            @if($findEmail)
              <div class="login-tab__desc">
                고객님이 사용하신 이메일 아이디의 일부분입니다.
              </div>
              <div class="login-tab__desc">{{$findEmail}}</div>
            </div>
            @elseif($findEmail && $withdrawal)
            <div class="login-tab__desc">
                인증하신 전화번호는 이미 탈퇴하신 고객입니다.<br>재가입을 원하시면 고객센터(0000-000)으로 연락주세요.
            </div>
            @else
            <div class="login-tab__desc">
                인증하신 전화번호로<br>등록 된 계정이 없습니다.
            </div>
            @endif
          </div>
          <div class="login-btn__wrap">
          <a href="/advisor/login" class="login-btn">확인 (로그인 하기)</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../advisorAssets/assets/js/common.js?v={{JS_VERSION}}"></script>
</body>
</html>
<script>
  
</script>