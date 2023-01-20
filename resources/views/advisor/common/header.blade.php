<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>마음팔레트</title>
  <meta name="Description" content="">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="타이틀">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">
  <link rel="canonical" href="">
  <script src="/advisorAssets/assets/js/jquery.js?v={{JS_VERSION}}"></script>
  <script src="/advisorAssets/assets/js/swiper.min.js?v={{JS_VERSION}}"></script>
  <link rel="stylesheet" href="/advisorAssets/assets/css/style.css?v={{CSS_VERSION}}">
</head>
<body>
@if (session('error'))
    <script>
        if(location.hash !== "#e"){
            history.pushState(null, '', window.location.pathname+"?#e");
            alert("{{session('error')}}");
        }
    </script>
@endif
  <div id="wrapper">
    <header id="header">
      <div class="header-top">
        <div class="header-top__inner">
          <div class="header-top__left">
            <h1 class="logo">마음팔레트
              <a href="/advisor/" class="logo-link">
                <img src="/advisorAssets/assets/images/logo.png" alt="마음팔레트 로고" class="logo-img">
              </a>
            </h1>
          </div>
          @if(session()->has('advisorLogin'))
          <div class="header-top__right">
            <div class="user-info__cell">
              <div class="user-profile__photo">
                <img src="/advisorAssets/assets/images/user-profile.jpg" alt="" class="user-profile__img">
              </div>
              <div class="user-info__username">{{(isset($advisorProfile)) ? $advisorProfile['advisorName'] : ""}}</div>
            </div>
            <a href="/advisor/logout" class="account-logout__btn">로그아웃</a>
          </div>
          @endif
        </div>
      </div>
      <div class="header-bottom">
        <div class="header-bottom__inner">
          <nav class="nav">
            <a id="main" href="/advisor/" class="nav-menu">홈</a>
            <a id="counselingList" href="/advisor/counselingList" class="nav-menu">상담리스트</a>
            <a id="myCounselingList" href="/advisor/myCounselingList" class="nav-menu">나의 상담 리스트</a>
            <a id="profile" href="/advisor/profile" class="nav-menu">프로필</a>
            <a id="notice" href="/advisor/notice" class="nav-menu">공지사항</a>
            <a id="inquiry" href="/advisor/inquiry" class="nav-menu">1:1 상담</a>
          </nav>
        </div>
      </div>
      <script>
          var pathname = $(location).attr('pathname');
          const homeSub = ["/advisor","/advisor/waitingCounseling","/advisor/completeCounseling",
              "/advisor/warningCounseling","/advisor/impossibleCounseling"];
          const counselingSub = ["/advisor/waitingCounselingList","/advisor/completeCounselingList",
              "/advisor/warningCounselingList","/advisor/impossibleCounselingList"];
          const myCounselingSub = ["/advisor/myWaitingCounseling","/advisor/myCompleteCounseling",
              "/advisor/myWarningCounseling","/advisor/myImpossibleCounseling"];


          $(".nav a").each(function(){
              var hrefLink = $(this).attr('href');
              var id = $(this).attr('id');
              if (pathname === hrefLink) {
                  $(this).addClass("active");
              }

              if ((id === "profile" || id === "notice" || id === "inquiry" ) && pathname.includes(hrefLink)) {
                  $(this).addClass("active");
              }
          });

          if (homeSub.includes(pathname)) {
              $("#main").addClass("active");
          }

          if (counselingSub.includes(pathname)) {
              $("#counselingList").addClass("active");
          }

          if (myCounselingSub.includes(pathname)) {
              $("#myCounselingList").addClass("active");
          }
      </script>
    </header>
