<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Page Infomation -->
  <title>마음팔레트</title>
  <meta name="Description" content="">
  <meta name="Author" content=""> 
  <meta name="Keywords" content="">
  <!-- SNS Basic -->
  <meta property="og:title" content=""> <!--타이틀--> 
  <meta property="og:description" content=""> <!--설명 100자내외-->
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content=""> 
  <!-- SNS Twitter -->
  <meta name="twitter:card" content="summary"> <!---->
  <meta name="twitter:title" content="타이틀"> <!--타이틀-->
  <meta name="twitter:description" content=""> <!--설명 100자내외-->
  <meta name="twitter:image" content=""> 
  <link rel="canonical" href=""> <!--대표도메인-->
  <!-- jquery -->
  <script src="../pc/assets/js/jquery.js"></script>
  <!--swiper -->
  <script src="../pc/assets/js/swiper.min.js"></script>
  <!-- custom css -->
  <link rel="stylesheet" href="../pc/assets/css/style.css">
</head>
<body>
  <div id="wrapper">
    <div id="container" class="login">
      <div class="login-box">
        <div class="login-inner">
          <div class="login-heading">
            <p class="login-heading__desc">아동 심리케어 플랫폼</p>
            <div class="login-logo">
              <img src="../pc/assets/images/login-logo.png" alt="" class="login-logo__img">
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
              <a href="#none" class="join-member-link">회원가입</a>
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
  </div> <!-- wrap end-->

  <!-- 팝업 -->
  
  <article id="loginCheckBox" class="layer-pop__wrap">
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
              <button type="button" class="layer-alarm__btn login-check-agree">확인</button>
              <button type="button" class="layer-alarm__btn cancel" onclick="pop.close()">취소</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>
  <!-- custom js -->
  <script src="../pc/assets/js/common.js"></script>
</body>
</html>