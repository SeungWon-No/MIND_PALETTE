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
    <header id="header">
      <div class="header-top">
        <div class="header-top__inner">
          <div class="header-top__left">
            <h1 class="logo">마음팔레트
              <a href="/" class="logo-link">
                <img src="../pc/assets/images/logo.png" alt="마음팔레트 로고" class="logo-img">
              </a>
            </h1>
            <div class="header-search__box">
              <input type="text" class="header-search">
              <button type="button" class="header-search__btn"><span class="icon search-icon"></span></button>
            </div>
          </div>
          <div class="header-top__right">
            <div class="user-info__cell">
              <div class="user-profile__photo">
                <img src="../pc/assets/images/user-profile.jpg" alt="" class="user-profile__img">
              </div>
              <div class="user-info__username">김아무</div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom">
        <div class="header-bottom__inner">
          <nav class="nav">
            <!-- 링크에 해당하는 페이지면 nav-menu에 클래스 active -->
            <a href="/" class="nav-menu">홈</a>
            <a href="#none" class="nav-menu active">상담리스트</a>
            <a href="#none" class="nav-menu">나의 상담 리스트</a>
            <a href="#none" class="nav-menu">프로필</a>
            <a href="#none" class="nav-menu">공지사항</a>
          </nav>
        </div>
      </div>
    </header>
    <div id="container">
      <main>
        <div class="detail-top__cont">
          <div class="detail-top__inner">
            <div class="detail-item__cont">
              <!-- detail-item__wrap에 클래스 active 추가시 활성화 -->
              <div class="detail-item__wrap active">
                <div class="detail-item">
                  <div class="detail-item__photo">
                    <img src="../pc/assets/images/detail-item-01.png" alt="" class="detail-item__img">
                    <div class="detail-item__btn-wrap">
                      <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                      <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                    </div>
                  </div>
                  <div class="detail-item__label">집</div>
                </div>
                <div class="detail-item">
                  <div class="detail-item__photo">
                    <img src="../pc/assets/images/detail-item-02.png" alt="" class="detail-item__img">
                    <div class="detail-item__btn-wrap">
                      <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                      <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                    </div>
                  </div>
                  <div class="detail-item__label">나무</div>
                </div>
                <div class="detail-item">
                  <div class="detail-item__photo">
                    <img src="../pc/assets/images/detail-item-03.png" alt="" class="detail-item__img">
                    <div class="detail-item__btn-wrap">
                      <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                      <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                    </div>
                  </div>
                  <div class="detail-item__label">사람1</div>
                </div>
                <div class="detail-item">
                  <div class="detail-item__photo">
                    <img src="../pc/assets/images/detail-item-04.png" alt="" class="detail-item__img">
                    <div class="detail-item__btn-wrap">
                      <button type="button" class="detail-item__btn plus"><span class="icon plus-icon"></span></button>
                      <button type="button" class="detail-item__btn doc"><span class="icon document-icon"></span></button>
                    </div>
                  </div>
                  <div class="detail-item__label">사람2</div>
                </div>
                <div class="detail-item__video">
                  <div class="detail-item__photo">
                    <img src="../pc/assets/images/detail-item-05.png" alt="" class="detail-item__img">
                  </div>
                  <div class="detail-item__label">동영상</div>
                </div>
              </div>
              <!-- detail-slider__wrap에 클래스 active 추가시 활성화 -->
              <div class="detail-slider__wrap">
                <div class="detail-item__slider">
                  <div class="detail-item__slider-wrapper swiper-wrapper">
                    <div class="detail-item__slide swiper-slide">
                      <div class="detail-item__cell">
                        <div class="detail-item__photo">
                          <img src="../pc/assets/images/detail-item-01.png" alt="" class="detail-item__img">
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
                          <img src="../pc/assets/images/detail-item-02.png" alt="" class="detail-item__img">
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
                          <img src="../pc/assets/images/detail-item-03.png" alt="" class="detail-item__img">
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
                          <img src="../pc/assets/images/detail-item-04.png" alt="" class="detail-item__img">
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
                <div class="detail-info__avater"></div>
                <div class="detail-info__cell">
                  <div class="detail-info__label">이름</div>
                  <div class="detail-info__name">홍길동</div>
                </div>
              </div>
              <div class="detail-tab__box">
                <div class="detail-tab__head">
                  <!-- detail-tab__btn에 클래스 active추가시 활성화 -->
                  <button type="button" class="detail-tab__btn">아이의 인적사항</button>
                  <button type="button" class="detail-tab__btn">가족관계 사항</button>
                  <button type="button" class="detail-tab__btn">심리상담 사유</button>
                  <button type="button" class="detail-tab__btn active">무료 심리상담</button>
                </div>
                <div class="detail-tab__content">
                  <div class="detail-tab__bg-line"></div>
                  <!-- content-cell에 클래스 active 추가시 활성화 -->
                  <!-- detail-tab__btn의 순서대로 content-cell에도 순서대로 active-->
                  <div class="content-cell">
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
                  <div class="content-cell active">
                    <div class="fr-counseling">
                      <div class="fr-counseling__text">
                        <p class="fr-counseling__desc">
                          사고의 양과 연상 활동은 부족한 편으로 보임. Popular response 단 2개로 사회적으로 통용되는 관습적 지각력은 매우 부족할 것으로 예상됨.<br><br> 지능 검사의 이해 소검사의 저조한 점수와 더불어 이와 같은 특성은 또래의 눈에 ‘특이한 아이'로 비춰질 수 있게 할 것이며,<br> 이에 원만한 대인관계는 어려울 것으로 예측됨. 특히 모든 반응이 Bt 혹은 Ad,Cs 반응으로 H 반응은 결여되어 있으므로, 실질적인 상호작용은 매우 적은 빈도로 일어날 것으로 판단됨.
                        </p>
                      </div>
                      <div class="fr-counseling__emotion">
                        <div class="emotion-wrap">
                          <div class="emotion-item">
                            <!-- emotion-stauts 케이스
                              1. 1단계  emotion-stauts에 step-1 클래스 추가
                              2. 2단계  emotion-stauts에 step-2 클래스 추가
                              3. 3단계  emotion-stauts에 step-3 클래스 추가
                              4. 4단계  emotion-stauts에 step-4 클래스 추가
                              
                              자아존중감 선택은 emotion-stauts에 클래스 reverse 추가 
                              step-1 ~ 4 클래스는 동일
                            -->
                            <div class="emotion-label">우울</div>
                            <div class="emotion-stauts order-01 step-4">
                              <span class="emotion-icon"></span>
                              <div class="emotion-staut__graph">
                                <button type="button" class="emotion-status__btn"></button>
                                <button type="button" class="emotion-status__btn"></button>
                                <button type="button" class="emotion-status__btn"></button>
                                <button type="button" class="emotion-status__btn"></button>
                              </div>
                            </div>
                            <div class="emotion-desc">3단계</div>
                          </div>
                          <div class="emotion-item">
                            <div class="emotion-label">불안</div>
                            <div class="emotion-stauts order-02 step-2">
                              <span class="emotion-icon"></span>
                              <div class="emotion-staut__graph">
                                <button type="button" class="emotion-status__btn"></button>
                                <button type="button" class="emotion-status__btn"></button>
                                <button type="button" class="emotion-status__btn"></button>
                                <button type="button" class="emotion-status__btn"></button>
                              </div>
                            </div>
                            <div class="emotion-desc">1단계</div>
                          </div>
                          <div class="emotion-item">
                            <div class="emotion-label">자아<br>존중감</div>
                            <div class="emotion-stauts order-03 step-4">
                              <span class="emotion-icon"></span>
                              <div class="emotion-staut__graph">
                                <button type="button" class="emotion-status__btn"></button>
                                <button type="button" class="emotion-status__btn"></button>
                                <button type="button" class="emotion-status__btn"></button>
                                <button type="button" class="emotion-status__btn"></button>
                              </div>
                            </div>
                            <div class="emotion-desc">4단계</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="detail-tab__date">2022 . 11 . 28 . 작성</div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="detail-md__cont">
          <div class="detail-md__inner">
            <div class="counselor-cont">
              <div class="counselor-date">2022 . 11 . 29. 답변</div>
              <div class="counselor-info">
                <div class="counselor-info__top">
                  <div class="counselor-info__detail">
                    <div class="counselor-info__name">김아무 상담사</div>
                    <div class="counselor-info__more">
                      <div class="counselor-info__work">부평 아동 전문병원</div>
                      <div class="counselor-info__progress">팔레트 상담 <em>1353</em>진행</div>
                    </div>
                  </div>
                  <div class="counselor-info__photo">
                    <img src="../pc/assets/images/user-profile.jpg" alt="" class="counselor-info__img">
                  </div>
                </div>
                <div class="counselor-info__carrier">
                  현)근로복지공단 전문상담사, 전)경기도 교육청 학생상담 자원봉사자, 전)용산구 건강가정지원센터 전문상담사
                </div>
              </div>

              <div class="counselor-answer">
                <div class="counselor-answer__text">
                  <p class="counselor-answer__desc">
                    사고의 양과 연상 활동은 부족한 편으로 보입니다. <br>정서상태 3단계로 사회적으로 통용되는 관습적 지각력은 매우 부족할 것으로 예상됩니다.<br><br>심리검사의 이해 소검사의 저조하 점수와 더불어 이와 같은 특성은 또래의 눈에 “특이한 아이”로 비춰질 수 있게 할 것이며, 이에 원만한 대인관계는 어려울 것으로 예측되며, 특히 모든 반응이 Bt또는 Ad, Cs반응으로 H반응은 결여되어있으므로, 실질적인 상호작용은 매우 적은 빈도로 일어날 것으로 판단됩니다.
                  </p>
                </div>

                <div class="counselor-answer__emotion">
                  <div class="emotion-wrap">
                    <div class="emotion-head">
                      <div class="emotion-head__tit">정서상태</div>
                      <div class="emotion-head__status">3단계-위험</div>
                    </div>
                    <div class="emotion-item">
                      <div class="emotion-label">우울</div>
                      <div class="emotion-stauts order-01 step-4">
                        <span class="emotion-icon"></span>
                        <div class="emotion-staut__graph">
                          <button type="button" class="emotion-status__btn"></button>
                          <button type="button" class="emotion-status__btn"></button>
                          <button type="button" class="emotion-status__btn"></button>
                          <button type="button" class="emotion-status__btn"></button>
                        </div>
                      </div>
                      <div class="emotion-desc">3단계</div>
                    </div>
                    <div class="emotion-item">
                      <div class="emotion-label">불안</div>
                      <div class="emotion-stauts order-02 step-2">
                        <span class="emotion-icon"></span>
                        <div class="emotion-staut__graph">
                          <button type="button" class="emotion-status__btn"></button>
                          <button type="button" class="emotion-status__btn"></button>
                          <button type="button" class="emotion-status__btn"></button>
                          <button type="button" class="emotion-status__btn"></button>
                        </div>
                      </div>
                      <div class="emotion-desc">1단계</div>
                    </div>
                    <div class="emotion-item">
                      <div class="emotion-label">자아<br>존중감</div>
                      <div class="emotion-stauts order-03 step-4">
                        <span class="emotion-icon"></span>
                        <div class="emotion-staut__graph">
                          <button type="button" class="emotion-status__btn"></button>
                          <button type="button" class="emotion-status__btn"></button>
                          <button type="button" class="emotion-status__btn"></button>
                          <button type="button" class="emotion-status__btn"></button>
                        </div>
                      </div>
                      <div class="emotion-desc">4단계</div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="counselor-vote">
                <div class="counselor-vote__desc">김아무 전문 상담사님의 상담에 대한 의견을 남겨주세요.</div>

                <div class="counselor-vote__btn-wrap">
                  
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="detail-bt__cont">
          <div class="detail-bt__inner">
            <h3 class="sb-counseling__tit">대기중인 그림상담</h3>
            <div class="sb-counseling__slider">
              <div class="sb-counseling__wrapper swiper-wrapper">
                <div class="sb-counseling__slide swiper-slide">
                  <a href="#" class="sb-counseling__photo">
                    <img src="../pc/assets/images/couns-list-01.jpg" alt="" class="sb-counseling__img">
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
        
      </main>
    </div> <!-- container end-->
    <footer id="footer">
      <div class="footer__inner">
        <div class="footer__left">
          <div class="footer-logo">
            <a href="#none" class="footer-logo__link">
              <img src="../pc/assets/images/footer-logo.png" alt="다섯달란트 로고" class="footer-logo__img">
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
  <!-- custom js -->
  <script src="../pc/assets/js/common.js"></script>
</body>
</html>