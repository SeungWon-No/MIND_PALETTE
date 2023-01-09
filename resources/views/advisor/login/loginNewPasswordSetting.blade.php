@include('advisor/common/loginForm/loginHeader')
<body>
  <div id="wrapper">
    <div id="container" class="login">
      <div class="login-box">
        <div class="login-inner pwd-find">
          <div class="login-tab__cont">
            <div class="login-tab__wrap">
              <a href="/advisor/findIdPassword" class="login-tab">아이디 찾기</a>
              <a href="#" class="login-tab active">비밀번호 찾기</a>
            </div>
            <!-- defalut form -->
            <div class="lgoin-tab__content">
              <div class="login-tab__desc">
                회원 정보에 등록하신 휴대폰으로 인증
              </div>
              <div class="login-tab__desc-s">
                회원 가입 시 등록한 휴대폰 번호와 일치해야 합니다.
              </div>
            </div>

            <form id="newPasswordSetting" name="newPasswordSetting" action="/advisor/newPasswordSetting" method="POST" autocomplete="off">
              @csrf
              <!-- input new password form -->
              <div class="login-input__wrap find-pwd">
                <div class="login-input__cell">
                    <label class="login-form__label">새 비밀번호</label>
                    <input id="newPassword" name="newPassword" type="password" class="login-form__input" placeholder="영문+숫자 6~20자 입력"
                    onkeyup="validPasswordCheck()" required>
                    <div id="valid-error-newPassword" class="login-alert__desc" style="display: none">영문+숫자 6~20자를 입력하셔야 합니다.</div>
                  </div>
                  <div class="login-input__cell">
                    <label class="login-form__label">새 비밀번호 확인</label>
                    <input id="confirmNewPassword" name="confirmNewPassword" type="password" class="login-form__input" placeholder="비밀번호 재입력"
                    onkeyup="validConfirmUserPasswordCheck()" required>
                    <div id="valid-error-confirmNewPassword" class="login-alert__desc" style="display: none">비밀번호가 일치하지 않습니다.</div>
                  </div>
              </div>
            </form>
          </div>
          <div class="login-btn__wrap">
          <a href="#" class="login-btn" onclick="">휴대폰 인증</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../advisorAssets/assets/js/common.js?v={{JS_VERSION}}"></script>
</body>
</html>
<script>
    // 비밀번호 유효성 체크
  function validPasswordCheck() {
    var password = $('#newPassword').val();
    var regExp = /^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[$`~!@$!%*#^?&\\(\\)\-_=+]).{6,14}$/;
    var checkResult = regExp.test(password);
    var lengthCheck = true;

    if (password == "") {
        $("#newPassword").attr("class", "login-form__input vaild-error");
        $("#valid-error-newPassword").attr("style", "display:''; color:#ff0000").html('비밀번호를 입력해주세요.');
        return false;
    }

    if (password.length < 6 || password.length > 14) { //6~14자 이내
      return false;
    }

    if (checkResult == false || lengthCheck == false) {
        $("#newPassword").attr("class", "login-form__input vaild-error");
        $("#valid-error-newPassword").attr("style", "display:''; color:#ff0000").html('6-14자 이내로  영문 , 숫자 , 특수문자를 조합하여 작성합니다.');
        return false;

    }else if(checkResult == true && lengthCheck == true){
        $("#newPassword").attr("class", "login-form__input");
        $("#valid-error-newPassword").attr("style", "display:''; color:#4169e1;").html('사용 가능한 비밀번호 입니다.');
        return true;
    }

  }

  // 비밀번호 재확인 체크
  function validConfirmUserPasswordCheck() {
    var password = $('#newPassword').val();
    var confirmPassword = $('#confirmNewPassword').val();

    if (confirmPassword !== '') {
      if (password != confirmPassword) {
        $('#valid-error-confirmNewPassword').attr("style", "display:''; color:#ff0000").html('비밀번호가 일치하지 않습니다.');
        return false;
      }else {
        $('#valid-error-confirmNewPassword').attr("style", "display:''; color:#4169e1;").html('확인되었습니다.');
        return true;
      }
    }else{
      $('#valid-error-confirmNewPassword').attr("style", "display:''; color:#ff0000").html('비밀번호를 입력해주세요.');
      return false;
    }
  }

  
</script>