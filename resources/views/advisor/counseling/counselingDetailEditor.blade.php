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
  <script src="../assets/js/jquery.js"></script>
  <!--swiper -->
  <script src="../assets/js/swiper.min.js"></script>
  <!-- custom css -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div id="wrapper">
    <header id="header">
      <div class="header-top">
        <div class="header-top__inner">
          <div class="header-top__left">
            <h1 class="logo">마음팔레트
              <a href="index.html" class="logo-link">
                <img src="../assets/images/logo.png" alt="마음팔레트 로고" class="logo-img">
              </a>
            </h1>
          </div>
          <div class="header-top__right">
            <div class="user-info__cell">
              <div class="user-profile__photo">
                <img src="../assets/images/user-profile.jpg" alt="" class="user-profile__img">
              </div>
              <div class="user-info__username">김아무</div>
            </div>
            <a href="#none" class="account-logout__btn">로그아웃</a>
          </div>
        </div>
      </div>
      <div class="header-bottom">
        <div class="header-bottom__inner">
          <!-- 22.12.29 수정 -->
          <nav class="nav">
            <!-- 링크에 해당하는 페이지면 nav-menu에 클래스 active -->
            <a href="index.html" class="nav-menu">홈</a>
            <a href="#none" class="nav-menu active">상담리스트</a>
            <a href="#none" class="nav-menu">나의 상담 리스트</a>
            <a href="#none" class="nav-menu">프로필</a>
            <a href="#none" class="nav-menu">공지사항</a>
            <a href="#none" class="nav-menu">1:1 상담</a>
          </nav>
          <!-- //22.12.29 수정 -->
        </div>
      </div>
    </header>
    <div id="container">
      <div class="detail-top__cont">
        <div class="detail-top__inner">
          <div class="detail-item__cont">
            <!-- detail-item__wrap에 클래스 active 추가시 활성화 -->
            <div class="detail-item__wrap active">
              <div class="detail-item">
                <div class="detail-item__photo">
                  <img src="../assets/images/detail-item-01.png" alt="" class="detail-item__img">
                  <div class="detail-item__btn-wrap">
                    <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                    <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                  </div>
                </div>
                <div class="detail-item__label">집</div>
              </div>
              <div class="detail-item">
                <div class="detail-item__photo">
                  <img src="../assets/images/detail-item-02.png" alt="" class="detail-item__img">
                  <div class="detail-item__btn-wrap">
                    <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                    <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                  </div>
                </div>
                <div class="detail-item__label">나무</div>
              </div>
              <div class="detail-item">
                <div class="detail-item__photo">
                  <img src="../assets/images/detail-item-03.png" alt="" class="detail-item__img">
                  <div class="detail-item__btn-wrap">
                    <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                    <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                  </div>
                </div>
                <div class="detail-item__label">사람1</div>
              </div>
              <div class="detail-item">
                <div class="detail-item__photo">
                  <img src="../assets/images/detail-item-04.png" alt="" class="detail-item__img">
                  <div class="detail-item__btn-wrap">
                    <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                    <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                  </div>
                </div>
                <div class="detail-item__label">사람2</div>
              </div>
            </div>
            <!-- detail-slider__wrap에 클래스 active 추가시 활성화 -->
            <div class="detail-slider__wrap">
              <div class="detail-item__slider">
                <div class="detail-item__slider-wrapper swiper-wrapper">
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="../assets/images/detail-item-01.png" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">집</div>
                    </div>
                    <div class="detail-item__qna">
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 집에는 누가 살고 있나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">이 집에는 엄마랑 아빠, 저만 살고있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 집의 분위기는 어떤가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">화목해요. 밖에는 울타리가 쳐져있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 집을 누구네 집이라고 생각하며 그렸나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집이에요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이것은 무엇인가요? 어떤 이유로 그렸나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">기타( 그 외 특이사항)</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                    </div>
                  </div>
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="../assets/images/detail-item-02.png" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">나무</div>
                    </div>
                    <div class="detail-item__qna">
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 나무는 몇 살 정도 되었나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">이 집에는 엄마랑 아빠, 저만 살고있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 나무의 건강은 어떤가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">화목해요. 밖에는 울타리가 쳐져있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">나무에게 소원이 있다면 무엇이 있을까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집이에요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 나무의 주변에는 무엇이 있나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">기타( 그 외 특이사항)</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                    </div>
                  </div>
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="../assets/images/detail-item-03.png" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">사람1</div>
                    </div>
                    <div class="detail-item__qna">
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 무엇을 하고 있나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">이 집에는 엄마랑 아빠, 저만 살고있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 지금 몇살인가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">화목해요. 밖에는 울타리가 쳐져있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 지금 기분이 어떤가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집이에요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">가장 힘들었던 일은 무엇일까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">누군가 생각하며 그린 사람이 있을까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">기타( 그 외 특이사항)</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                    </div>
                  </div>
                  <div class="detail-item__slide swiper-slide">
                    <div class="detail-item__cell">
                      <div class="detail-item__photo">
                        <img src="../assets/images/detail-item-04.png" alt="" class="detail-item__img">
                        <div class="detail-item__btn-wrap">
                          <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                          <button type="button" class="detail-item__btn doc active"><span class="icon document-icon"></span></button>
                        </div>
                      </div>
                      <div class="detail-item__label">사람2</div>
                    </div>
                    <div class="detail-item__qna">
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 무엇을 하고 있나요?</p>
                        <p class="detail-item__desc detail-item__desc--a">이 집에는 엄마랑 아빠, 저만 살고있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 지금 몇살인가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">화목해요. 밖에는 울타리가 쳐져있어요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">이 사람은 지금 기분이 어떤가요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집이에요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">가장 힘들었던 일은 무엇일까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">누군가 생각하며 그린 사람이 있을까요?</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                      <div class="detail-item__text-g">
                        <p class="detail-item__desc detail-item__desc--q">기타( 그 외 특이사항)</p>
                        <p class="detail-item__desc detail-item__desc--a">저희집 멍멍이에요 멍멍이랑 밖에서 뛰놀고 싶은데 못놀아요. 엄마가 자꾸 화내요.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>
              <button type="button" class="detail-slider__close">
                <span class="icon close-icon"></span>
              </button>
            </div>
          </div>
          <div class="detail-info__wrap">
            <div class="detail-info__user">
              <!-- 남자일때 detail-info__avater 클래스명 boy 추가-->
              <!-- <div class="detail-info__avater boy"></div> -->
              <div class="detail-info__avater"></div>
              <div class="detail-info__cell">
                <div class="detail-info__label">이름</div>
                <div class="detail-info__name">홍길동</div>
              </div>
            </div>
            <!-- 22.12.29 수정 -->
            <div class="detail-tab__box">
              <div class="detail-tab__head">
                <!-- detail-tab__btn에 클래스 active추가시 활성화 -->
                <button type="button" class="detail-tab__btn active">아이의 인적사항</button>
                <button type="button" class="detail-tab__btn">가족관계 사항</button>
                <button type="button" class="detail-tab__btn">심리상담 사유</button>
                <button type="button" class="detail-tab__btn">행동관찰</button>
                <button type="button" class="detail-tab__btn">기질검사</button>
              </div>
              <div class="detail-tab__content">
                <div class="detail-tab__bg-line"></div>
                <!-- content-cell에 클래스 active 추가시 활성화 -->
                <!-- detail-tab__btn의 순서대로 content-cell에도 순서대로 active-->
                <div class="content-cell active">
                  <div class="kid-info">
                    <div class="kid-info__item-wrap">
                      <div class="kid-info__item">
                        <div class="kid-info__label">생년월일</div>
                        <div class="kid-info__content">2005.05.38</div>
                      </div>
                      <div class="kid-info__item">
                        <div class="kid-info__label">학교</div>
                        <div class="kid-info__content">밝음 초등학교</div>
                      </div>
                    </div>
                    <div class="kid-info__item-wrap">
                      <div class="kid-info__item">
                        <div class="kid-info__label">성별</div>
                        <div class="kid-info__content">여아</div>
                      </div>
                      <div class="kid-info__item">
                        <div class="kid-info__label">취미활동</div>
                        <div class="kid-info__content">친구들과 소꿉놀이하기</div>
                      </div>
                    </div>
                    <div class="kid-info__item-wrap">
                      <div class="kid-info__item">
                        <div class="kid-info__label">가족관계</div>
                        <div class="kid-info__content">1남 2녀중 3째</div>
                      </div>
                      <div class="kid-info__item">
                        <div class="kid-info__label">장점 , 특기</div>
                        <div class="kid-info__content">친구들의 말을 잘 들어줌 , 그림을 잘그림</div>
                      </div>
                    </div>
                    <div class="kid-info__item">
                      <div class="kid-info__label">교우관계</div>
                      <div class="kid-info__content">
                        반에서 친한 애들 몇명과 평소에는 잘 지내나 학교에서만 그렇고, 그 이상으로 친한 친구들이 없습니다. 아이가 깊은 관계를 두려워 하는것인지 몇번 물어보았고 
                        친구들에게 미움 받는게 싫어서 학교에서만 밝게 행동한다고 말했습니다. 집에서는 조용하고 수줍음이 많은 편이라 학교에서도 그런 줄 알았는데 학교에서는 잘 
                        지내기 위해서 애쓰고 있었나봅니다.
                      </div>
                    </div>
                    <div class="kid-info__item">
                      <div class="kid-info__label">교사와의<br>관계</div>
                      <div class="kid-info__content">
                        잦은 교류가 있지는 않고, 가끔 상담을 하긴 하지만 선생님께서 아이에게 별다른 관심을 안주는 듯 합니다. 아이도 선생님 말은 곧잘  따르지만 의지는 못하고 있습니다.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="content-cell">
                  <div class="family-info">
                    <div class="family-info__item-wrap">
                      <div class="family-info__item">
                        <div class="family-info__label">
                          <span class="icon father-icon"></span>부
                        </div>
                        <div class="family-info__desc">
                          아이와 데면데면합니다. 일이 바빠 자주 아이와 놀아주지 못해서 아이가 낯을 가려요.
                        </div>
                      </div>
                      <div class="family-info__item">
                        <div class="family-info__label">
                          <span class="icon mother-icon"></span>모
                        </div>
                        <div class="family-info__desc">
                          아이가 수업이 끝나고 집에오면 항상 이야기를 나눕니다. 아이의 말을 경청하려 노력은 하고 있지만 나가서 친구들과 노는것이 위험하다 여겨질 때가 많아서 자주 못 놀게할 때가 많습니다.
                        </div>
                      </div>
                      <div class="family-info__item">
                        <div class="family-info__label">
                          <span class="icon brother-icon"></span>형제
                        </div>
                        <div class="family-info__desc">
                          장난기가 많고 장난을 많이 치는 편입니다. 막내에게 가끔 심한 장난을 쳐서 다칠 때도 있고, 잘 놀아주는 듯 하다가도 말을 안들어서 종종 싸웁니다.
                        </div>
                      </div>
                      <div class="family-info__item">
                        <div class="family-info__label">
                          <span class="icon sister-icon"></span>자매
                        </div>
                        <div class="family-info__desc">
                          사이가 좋은 자매사이에요. 종종 속이야기도 나누는것 같고 길동이가 제일 잘 따르고 있어요.
                        </div>
                      </div>
                    </div>
                    <div class="family-info__last">
                      <div class="family-info__label">가족내력 및 스트레스 요인</div>
                      <div class="family-info__desc">
                        어머니 쪽에 천식유전이 있어서 길동이도 약간의 천식 기운이있어요. 약은 계속 복용중이고 이거 때문에도 아이가 밖으로 나가서 놀때 천식에 안좋을까봐 걱정이 됩니다.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="content-cell">
                  <div class="reason-info">
                    <p class="reason-info__desc">
                      아이가 학교 이외의 장소에서는 친구들과 깊게 교류하지 못하고  집에서만 있으려 하는 일이 잦고. 아이에게 물어보아도 아이도 이유를 잘 몰라 답답해 하고 있습니다. 심층적인 상담과 분석으로 아이의 생각을 알고싶고, 해결할 수 있는 방법을 알고싶어서 신청하게 되었어요. 
                    </p>
                  </div>
                </div>
                <div class="content-cell">
                  <div class="observ-info">
                    <div class="observe-info__left">
                      <!-- 대답이 아니오 일때 observe-info__answer에 클래스 no 추가 -->
                      <div class="observe-info__item">
                        <div class="observe-info__question">Q1. 아이가 부모의 지시를 잘 따랐나요?</div>
                        <div class="observe-info__answer">네</div>
                      </div>
                      <div class="observe-info__item">
                        <div class="observe-info__question">Q2. 아이가 충동적이거나 산만한 모습을 보였나요?</div>
                        <div class="observe-info__answer">네</div>
                      </div>
                      <div class="observe-info__item">
                        <div class="observe-info__question">Q3. 아이가 침착하게 집중하는 모습을 보였나요?</div>
                        <div class="observe-info__answer no">아니오</div>
                      </div>
                    </div>
                    <div class="observe-info__right">
                      <div class="observe-info__item">
                        <div class="observe-info__question">Q4. 아이가 자신만만하게 그림을 그렸나요?</div>
                        <div class="observe-info__answer">네</div>
                      </div>
                      <div class="observe-info__item">
                        <div class="observe-info__question">Q5. 아이가 실수를 지나치게 두려워했나요?</div>
                        <div class="observe-info__answer">네</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="content-cell">
                  <div class="result-info">
                    <div class="result-info__left">
                      <div class="result-info__item">
                        <div class="result-info__label">정서표현지수는 <span class="high">높음(H)</span>  수준입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                            이 척도에서 높은 점수를 보이는 자녀는 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명할 수 있습니다. 타인이 정해놓은 규칙이나 행동들보다는 자유롭게 자신이 추구하는 즐거움을 탐색하려는 모습이 강하며, 심리적으로 좌절스럽거나 불편한 상황을 잘 견디지 못하고 피하려는 경향을 보일 수 있습니다.부정 정서는 주로 개인의 목표와 일치하지 않는 일을 경험할 때 발생한다는 점에서 대체로 자녀가 경험하고 싶어 하지 않은 정서라고 볼 수 있습니다. 그러나 그러한 느낌을 잘 알아차리고, 이를 자신의 것으로 수용하고, 표현할 수 있는 능력을 키우는 것은 자녀가 건강한 삶을 영위하는데 매우 중요합니다.부모가 자녀를 관찰하였을 때, 사소한 일에도 쉽게 성을 내고 분노를 밖으로 드러낸다면 이 부분을 살펴보시기 바랍니다. 자녀는 현재 정서교육이 필요한 시기입니다.잦은 부정적 정서 폭발은 자신과 타인이 합의되지 않은 상황에서 극적으로 이루어지므로 자녀는 부정적 피드백에 노출되거나 자기통제에 실패했다는 반복적 경험으로 낮은 자존감을 초래할 수 있습니다.부모는 쉽게 폭발하는 자녀의 정서에 크게 반응하거나 제한하기보다는 감정과 행동을 읽어주며, 부모가 느끼는 감정도 알려줄 필요가 있습니다. 부정적인 감정에 대해서 언어로 적절히 표현할 수 있고, 자율성과 책임감을 기를 수 있습니다.
                          </div>
                        </div>
                      </div>
                      
                      <div class="result-info__item">
                        <div class="result-info__label">행동표현 지수는 <span class="mid">보통(M) 수준</span>입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                            이 척도에서 높은 점수를 보이는 자녀는 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명할 수 있습니다. 타인이 정해놓은 규칙이나 행동들보다는 자유롭게 자신이 추구하는 즐거움을 탐색하려는 모습이 강하며, 심리적으로 좌절스럽거나 불편한 상황을 잘 견디지 못하고 피하려는 경향을 보일 수 있습니다.부정 정서는 주로 개인의 목표와 일치하지 않는 일을 경험할 때 발생한다는 점에서 대체로 자녀가 경험하고 싶어 하지 않은 정서라고 볼 수 있습니다. 그러나 그러한 느낌을 잘 알아차리고, 이를 자신의 것으로 수용하고, 표현할 수 있는 능력을 키우는 것은 자녀가 건강한 삶을 영위하는데 매우 중요합니다.부모가 자녀를 관찰하였을 때, 사소한 일에도 쉽게 성을 내고 분노를 밖으로 드러낸다면 이 부분을 살펴보시기 바랍니다. 자녀는 현재 정서교육이 필요한 시기입니다.잦은 부정적 정서 폭발은 자신과 타인이 합의되지 않은 상황에서 극적으로 이루어지므로 자녀는 부정적 피드백에 노출되거나 자기통제에 실패했다는 반복적 경험으로 낮은 자존감을 초래할 수 있습니다.부모는 쉽게 폭발하는 자녀의 정서에 크게 반응하거나 제한하기보다는 감정과 행동을 읽어주며, 부모가 느끼는 감정도 알려줄 필요가 있습니다. 부정적인 감정에 대해서 언어로 적절히 표현할 수 있고, 자율성과 책임감을 기를 수 있습니다.
                          </div>
                        </div>
                      </div>
                      <div class="result-info__item">
                        <div class="result-info__label">관계적응 지수는 <span class="low">낮음(L) 수준</span>입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                            이 척도에서 높은 점수를 보이는 자녀는 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명할 수 있습니다. 타인이 정해놓은 규칙이나 행동들보다는 자유롭게 자신이 추구하는 즐거움을 탐색하려는 모습이 강하며, 심리적으로 좌절스럽거나 불편한 상황을 잘 견디지 못하고 피하려는 경향을 보일 수 있습니다.부정 정서는 주로 개인의 목표와 일치하지 않는 일을 경험할 때 발생한다는 점에서 대체로 자녀가 경험하고 싶어 하지 않은 정서라고 볼 수 있습니다. 그러나 그러한 느낌을 잘 알아차리고, 이를 자신의 것으로 수용하고, 표현할 수 있는 능력을 키우는 것은 자녀가 건강한 삶을 영위하는데 매우 중요합니다.부모가 자녀를 관찰하였을 때, 사소한 일에도 쉽게 성을 내고 분노를 밖으로 드러낸다면 이 부분을 살펴보시기 바랍니다. 자녀는 현재 정서교육이 필요한 시기입니다.잦은 부정적 정서 폭발은 자신과 타인이 합의되지 않은 상황에서 극적으로 이루어지므로 자녀는 부정적 피드백에 노출되거나 자기통제에 실패했다는 반복적 경험으로 낮은 자존감을 초래할 수 있습니다.부모는 쉽게 폭발하는 자녀의 정서에 크게 반응하거나 제한하기보다는 감정과 행동을 읽어주며, 부모가 느끼는 감정도 알려줄 필요가 있습니다. 부정적인 감정에 대해서 언어로 적절히 표현할 수 있고, 자율성과 책임감을 기를 수 있습니다.
                          </div>
                        </div>
                      </div>
                      <div class="result-info__item">
                        <div class="result-info__label">관계추구 지수는 <span class="high">높음(H)</span>수준입니다.</div>
                        <div class="result-info__content">
                          <div class="result-info__desc">
                            이 척도에서 높은 점수를 보이는 자녀는 강한 감정 표현형으로 자신이 원하는 것과 원하지 않는 것에 대한 선호도가 분명할 수 있습니다. 타인이 정해놓은 규칙이나 행동들보다는 자유롭게 자신이 추구하는 즐거움을 탐색하려는 모습이 강하며, 심리적으로 좌절스럽거나 불편한 상황을 잘 견디지 못하고 피하려는 경향을 보일 수 있습니다.부정 정서는 주로 개인의 목표와 일치하지 않는 일을 경험할 때 발생한다는 점에서 대체로 자녀가 경험하고 싶어 하지 않은 정서라고 볼 수 있습니다. 그러나 그러한 느낌을 잘 알아차리고, 이를 자신의 것으로 수용하고, 표현할 수 있는 능력을 키우는 것은 자녀가 건강한 삶을 영위하는데 매우 중요합니다.부모가 자녀를 관찰하였을 때, 사소한 일에도 쉽게 성을 내고 분노를 밖으로 드러낸다면 이 부분을 살펴보시기 바랍니다. 자녀는 현재 정서교육이 필요한 시기입니다.잦은 부정적 정서 폭발은 자신과 타인이 합의되지 않은 상황에서 극적으로 이루어지므로 자녀는 부정적 피드백에 노출되거나 자기통제에 실패했다는 반복적 경험으로 낮은 자존감을 초래할 수 있습니다.부모는 쉽게 폭발하는 자녀의 정서에 크게 반응하거나 제한하기보다는 감정과 행동을 읽어주며, 부모가 느끼는 감정도 알려줄 필요가 있습니다. 부정적인 감정에 대해서 언어로 적절히 표현할 수 있고, 자율성과 책임감을 기를 수 있습니다.
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- 22.12.30 수정 -->
                    <div class="result-info__right">
                      <div class="graph-wrap">
                        <div class="graph-tit">기질검사 종합결과</div>
                        <div class="graph-content">
                          <div class="graph-data">
                            <div class="graph-bar__cell">
                              <!-- 
                                  bar에 클래스 red, yellow, green로 색구별
                                -->
                              <div class="graph-bar">
                                <div class="bar red" style="height: 90%;"></div>
                              </div>
                              <div class="graph-bar">
                                <div class="bar yellow" style="height: 50%;"></div>
                              </div>
                              <div class="graph-bar">
                                <div class="bar green" style="height: 20%;"></div>
                              </div>
                              <div class="graph-bar ">
                                <div class="bar yellow" style="height: 65%;"></div>
                              </div>
                            </div>
                          </div>
                          <div class="graph-grid">
                            <!-- 
                              1단계 green-line
                              2단계 yellow-line
                              3단계 red-line
                            -->
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line point-line red-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line point-line yellow-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line point-line green-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line"></div>
                            <div class="graph-x-line"></div>
                          </div>
                          <div class="graph-x-labels">
                            <!-- hide 클래스추가시 숨김 -->
                            <div class="graph-x-label hide">
                              <div class="label-value">100</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">90</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">80</div>
                            </div>
                            <div class="graph-x-label">
                              <div class="label-value">70</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">60</div>
                            </div>
                            <div class="graph-x-label">
                              <div class="label-value">50</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">40</div>
                            </div>
                            <div class="graph-x-label">
                              <div class="label-value">30</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">20</div>
                            </div>
                            <div class="graph-x-label hide">
                              <div class="label-value">10</div>
                            </div>
                          </div>
                          <div class="graph-y-labels">
                            <div class="graph-y-label">
                              <div class="label-y-value">
                                정서표현
                                <span class="graph-result">90점</span>
                              </div>
                            </div>
                            <div class="graph-y-label">
                              <div class="label-y-value">
                                행동표현
                                <span class="graph-result">50점</span>
                              </div>
                            </div>
                            <div class="graph-y-label">
                              <div class="label-y-value">
                                관계적응
                                <span class="graph-result">20점</span>
                              </div>
                            </div>
                            <div class="graph-y-label">
                              <div class="label-y-value">
                                관계추구
                                <span class="graph-result">65점</span>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- //22.12.30 수정 -->
                  </div>
                </div>
                <div class="detail-tab__date">2022 . 11 . 28 . 작성</div>
              </div>
            </div>
            <!--// 22.12.29 수정 -->
          </div>
        </div>
      </div>
      <div class="detail-md__cont">
        <div class="detail-md__inner">
          <!-- 22.12.29 수정 -->
          <div class="counselor-edit__cont">
            <div class="counselor-edit__top">
              <div class="counselor-common__info">
                <div class="common-info__photo">
                  <img src="../assets/images/user-profile.jpg" alt="" class="common-info__img">
                </div>
                <div class="common-info__name">김아무 상담사</div>
              </div>
              <div class="counselor-edit__btns-wrap">
                <button type="button" class="counselor-edit__btn counselor-edit__btn--save">임시저장</button>
                <button type="button" class="counselor-edit__btn">상담등록</button>
                <button type="button" class="counselor-edit__btn counselor-edit__btn--cancel">상담취소</button>
              </div>
            </div>
            <div class="counselor-edit__body">
              <div class="counselor-editor__area">
                <div class="counselor-editor__btn-wrap">
                  <button class="counselor-editor__btn guide">작성가이드</button>
                  <button class="counselor-editor__btn reset">폼 리셋</button>
                </div>
                <div class="counselor-editor">
                  <!-- 에디터영역 높이는 임시로 잡아뒀습니다. 500px--> 
                </div>
              </div>
              <div class="counselor-check__area">
                <div class="counselor-time__area">
                  <div class="counselor-time__desc">작성까지 남은 시간</div>
                  <div class="counselor-time">24 : 00</div>
                </div>
                <div class="counselor-notice__area">
                  <span class="icon caution-icon"></span>              
                  <div class="counselor-notice__text-g">
                    <h5>24시간 이내에 작성해주세요.</h5>
                    <p>시간 경과 시, 작성 중인 내용이 삭제되며 해당 검사지는 재상담이 불가합니다.</p>
                  </div>
                </div>
                <div class="counselor-note__check">
                  <div class="note-check__wrap">  
                    <div class="note-check__head">특이사항</div>
                    <div class="note-check__body">
                      <div class="note-check__item">
                        <input type="radio" class="note-check" name="noteCheck" checked>
                        <div class="note-check__cell">
                          <span class="icon note-check-icon green"></span>
                          <div class="note-check__label">해당없음</div>
                        </div>
                        <div class="note-check__desc">환자에게 해당하는 정서적 특이사항이 없을 경우.</div>
                      </div>
                      <div class="note-check__item">
                        <input type="radio" class="note-check" name="noteCheck">
                        <div class="note-check__cell">
                          <span class="icon note-check-icon red"></span>
                          <div class="note-check__label">위험</div>
                        </div>
                        <div class="note-check__desc">정서적 위험, 조치가 긴급한 환자의 경우..</div>
                      </div>
                      <div class="note-check__item">
                        <input type="radio" class="note-check" name="noteCheck">
                        <div class="note-check__cell">
                          <span class="icon note-check-icon yellow"></span>
                          <div class="note-check__label">주의</div>
                        </div>
                        <div class="note-check__desc">주의가 필요한 환자의 경우.</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--// 22.12.29 수정 -->
        </div>
      </div>
      <div class="detail-bt__cont">
        <div class="detail-bt__inner">
          <h3 class="sb-counseling__tit">대기중인 그림상담</h3>
          <div class="sb-counseling__slider">
            <div class="sb-counseling__wrapper swiper-wrapper">
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
              <div class="sb-counseling__slide swiper-slide">
                <a href="#" class="sb-counseling__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
                </a>
                <div class="sb-counseling__info">
                  <div class="sb-counseling__user">홍길동</div>
                  <div class="sb-counseling__year">191898</div>
                  <div class="sb-counseling__gender">남아</div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </div> <!-- container end-->
    <footer id="footer">
      <div class="footer__inner">
        <div class="footer__left">
          <div class="footer-logo">
            <a href="#none" class="footer-logo__link">
              <img src="../assets/images/footer-logo.png" alt="다섯달란트 로고" class="footer-logo__img">
            </a>
          </div>
        </div>
        <div class="footer__right">
          <div class="footer-link__cell">
            <a href="#none" class="footer-link">서비스 안내</a>
            <a href="#none" class="footer-link">이용약관</a>
            <a href="#none" class="footer-link">개인정보 취급방침</a>
            <a href="#none" class="footer-link">공지사항</a>
          </div>
          <address class="footer-info">
            <div class="footer-info__cell">
              <span>대표 : 진재연</span><span>통신판매신고번호 : 제 2021-인천부평-1164호</span><span> 개인정보보호 책임자 : 진재연</span><span>이메일 : support@5dalant.net</span>
            </div>
            <div class="footer-info__cell">
              <span>사업자등록번호 : 122-31-79460</span>
              <span>주소 : 인천광역시 부평구 부평대로 부평J타워3차 1239호</span>
              <span>전화 : 070-7566-0902</span>
            </div>
          </address>
          <div class="copyright">© 2020 Copyright by <em>5dalant.</em> All rights reserved.</div>
        </div>
      </div>
    </footer>
  </div> <!-- wrap end-->

  <!-- 팝업 -->
  <!-- 이미지 레이어 팝업 -->
  <article id="detailImagePop" class="layer-pop__wrap">
    <div class="layer-pop__parent">
      <div class="layer-pop__children">
        <div class="layer-pop__photo">
          <div class="layer-photo__cell">
            <img src="" alt="" class="layer-img">
          </div>
        </div>
      </div>
    </div>
  </article>
  <!-- 비디오 팝업 -->
  <article id="detailVideoPop" class="layer-pop__wrap">
    <div class="layer-pop__parent">
      <div class="layer-pop__children">
        <div class="layer-pop__video">
          <button type="button" class="pop-close__btn"><span class="icon close-white-icon"></span></button>
        </div>
      </div>
    </div>
  </article>

  <!-- custom js -->
  <script src="../assets/js/common.js"></script>
</body>
</html>