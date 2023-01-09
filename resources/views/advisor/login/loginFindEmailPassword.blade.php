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
              <div class="login-tab__desc">
                회원정보에 등록한 전화번호를 입력하셔야<br>인증번호를 받으실 수 있습니다.
              </div>
            </div>
          </div>
          <div class="login-btn__wrap">
          <form id="findEmailForm" name="findEmailForm" action="/advisor/loginFindEmail" method="POST" autocomplete="off">
          @csrf
            <input type="hidden" name="userName" value="">
            <input type="hidden" name="userPhone" value="">
            <input type="hidden" name="DI" value="">
            <input type="hidden" name="CI" value="">
          </form>
          <a href="#" class="login-btn" onclick="javascript:phoneAuthSubmit()">휴대폰 인증</a>
          </div>
        </div>
      </div>
    </div>
    <form name="phoneAuth" action="/auth" method="post">
        @csrf
        <input type="hidden" name="CP_CD" maxlength="12" size="16" value="">
        <input type="hidden" name="SITE_NAME" maxlength="20" size="24" value="마음팔레트">
    </form>
  </div>
  <script src="../advisorAssets/assets/js/common.js?v={{JS_VERSION}}"></script>
</body>
</html>
<script>
  function phoneAuthSubmit() {
        window.open("/auth", "auth_popup", "width=430, height=640, scrollbars=yes");
        var form1 = document.phoneAuth;
        form1.target = "auth_popup";
        form1.submit();
    }

  function authSuccess() {
    $("#findEmailForm").submit();
  }
</script>