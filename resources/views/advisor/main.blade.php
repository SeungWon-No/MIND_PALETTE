@include('advisor/common/header')
<div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="counseling-wrap">
            <div class="counseling-fillter__tab">
              <button type="button" class="counseling-filter__btn active" style="background:var(--point-green-color)">
                <span class="sun-icon"></span>
                <div class="filter__btn-tit">인천시 아동<br> 마음정신건강 지수 </div>
                <div class="counseling-status">
                  <span class="counseling-status__num">92</span>
                  <span class="counseling-status__unit">%</span>
                </div>
              </button>
              <button type="button" class="counseling-filter__btn active" style="background:var(--point-blue-color)">
                <div class="filter__btn-tit">상담대기</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">12</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
              <button type="button" class="counseling-filter__btn active" style="background:var(--primary-color)">
                <div class="filter__btn-tit">상담완료</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">1,225</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
              <button type="button" class="counseling-filter__btn active" style="background:var(--point-red-color)">
                <div class="filter__btn-tit">주의 / 위험</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">2</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
              <button type="button" class="counseling-filter__btn active" style="background:var(--font-grray-color)">
                <div class="filter__btn-tit">상담불가</div>
                <div class="counseling-status">
                  <span class="counseling-status__num">1</span>
                  <span class="counseling-status__unit">건</span>
                </div>
              </button>
            </div>
          </div>
          <div class="counseling-cont">
            <div class="cont-heading">
              <h3 class="cont-heading__tit">대기중인 그림상담</h3>
            </div>
            <div class="counseling-list__wrap">
              <ul class="counseling-list">
                <!-- TODO case에 맞게 class명에 추가 -->
                <!-- case 1. [default] counseling -->
                <!-- case 2. [ing] counseling ongoing -->
                <!-- case 3. [end] counseling end -->
                <!-- case 3-1. [end + danger] counseling end danger -->
                <!-- case 3-2. [end + need-care] counseling end need-care -->
                <!-- list items -->
                <li class="counseling">
                  <a href="#none" class="counseling-thumb">
                    <img src="../advisorAssets/assets/images/couns-list-01.jpg" alt="" class="counseling-thumb__img">
                  </a>
                  <div class="counseling-user__info">
                    <div class="counseling-user__name">홍길동</div>
                    <div class="counseling-user__year">191898</div>
                    <div class="counseling-user__gender">남아</div>
                  </div>
                  <div class="counseling-code__cell">
                    <div class="counseling-code__detail">상담코드:<span class="counseling-code">2143426</span></div>
                  </div>
                  <div class="counseling-link__cell">
                    <a href="#none" class="counseling-link">상담하기</a>
                  </div>
                </li>
                <!-- list items -->
              </ul>
              <div class="paging-box">
                <a href="#none" class="paging-prev"><span class="icon pagin-perv-icon"></span></a>
                <a href="#none" class="paging-num active">1</a>
                <a href="#none" class="paging-next"><span class="icon pagin-next-icon"></span></a>
              </div>
            </div>
          </div>
          <div class="expert-cont">
            <div class="cont-heading">
              <h3 class="cont-heading__tit">상담사 리스트</h3>
              <a href="#none" class="cont-heading__link">상담사 더보기 <span class="icon link-more-icon"></span></a>
            </div>
            <div class="expert-list">
              <!-- list items -->
              <div class="expert-item">
                <div class="expert-item__head">
                  <div class="expert-profile__photo">
                    <img src="../advisorAssets/assets/images/user-profile.jpg" alt="" class="expert-profile__img">
                  </div>
                  <div class="expert-profile">
                    <div class="expert-name">아무개 전문 상담사</div>
                    <div class="expert-star__review">
                      <span class="icon star-review-icon"></span>
                      <div class="star-review__score">4.0</div>
                      <div class="star-review__unit">/ 5</div>
                    </div>
                    <div class="expert-exp">
                      팔레트 상담 <span class="expert-exp__num">1242</span>회 진행
                    </div>
                  </div>
                </div>
                <div class="expert-item__body">
                  <h5 class="expert-introduce">자기소개</h5>
                  <p class="expert-introduce__desc">
                    아이의 전문적인 상담이 필요하신가요? 아이만을 위한 ‘개인적인 공간'에서 편안하게 고민을 털어 놓아주세요.꽁꽁 사매고 있던 짐을 나눠드릴 수 있는 시간들이 되실거라 기대합니다.
                  </p>
                </div>
              </div>
              <!-- list items -->
            </div>
            <p class="notice-data">
              <span class="icon notice-icon"></span>22년 11월 28일 14시 22분 기준 정보입니다.
            </p>
          </div>
        </div>
        <div class="column-right">
          <div class="account">
            <div class="account-info__cell">
              <div class="account-profile__photo">
                <img src="../advisorAssets/assets/images/user-profile.jpg" alt="" class="account-profile__img">
              </div>
              <div class="account-profile">
                <div class="account-profile__cell">
                  <div class="account-profile__info">
                    <div class="account-profile__name">김아무 상담사</div>
                    <div class="account-profile__center">사랑 마음 센터</div>
                  </div>
                </div>
                <a href="#none" class="account-profile__link">프로필 바로가기 ></a>
              </div>
            </div>
          </div>
          <div class="my-history">
            <div class="my-history__heading">
              <div class="my-history__tit">나의 상담내역</div>
              <div class="my-history__total">
                (총 <span class="my-history__totalnum">13</span>건)
              </div>
            </div>
            <ul class="my-history__list">  
              <li class="my-history__item">
                <!-- 작성중 1건 이상일때 my-history__obj에 클래스 active추가 -->
                <a href="#none" class="my-history__obj active">• 작성중
                  <span class="my-history__num">1</span><span class="my-history__unit">건</span>
                </a>
                <!-- 작성중 1건 이상일때 남은시간 추가 / 0건인 경우는 시간 x-->
                <div class="my-history__time-cell">남은 시간 <span class="my-history__time">11:30</span></div>
                <!-- //작성중 1건 이상일때 남은시간 추가 / 0건인 경우는 시간 x-->
              </li>
              <li class="my-history__item">
                <a href="#none" class="my-history__obj">• 상담완료
                  <span class="my-history__num">1</span><span class="my-history__unit">건</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="recent-history">
            <div class="aside__heading">
              <h4 class="aside__heading__tit">최근 상담 내역</h4>
              <a href="#none" class="aside__heading__link">더보기<span class="icon link-more-icon"></span></a>
            </div>
            <div class="recent-history__list">
              <!-- list items -->
              <a href="#none" class="recent-history__item">
                <div class="recent-history__photo">
                  <img src="../advisorAssets/assets/images/couns-list-01.jpg" alt="" class="recent-history__img">
                </div>
                <div class="recent-history__info-wrap">
                  <div class="recent-history__info">
                    <div class="recent-history__name">홍길동</div>
                    <div class="recent-history__year">191898</div>
                    <div class="recent-history__gender">남아</div>
                  </div>
                  <div class="counseling-code__cell">
                    <div class="counseling-code__detail">상담코드:<span class="counseling-code">2143426</span></div>
                  </div>
                </div>
              </a>
              <!-- list items -->
            </div>
          </div>
          <div class="my-prefer">
            <div class="my-prefer__inner">
              <div class="aside__heading">
                <h4 class="aside__heading__tit">나의 상담지수</h4>
              </div>
              <div class="my-prefer__star">
                <span class="icon star-review-icon"></span>
                <div class="star-review__score">4.0</div>
                <div class="star-review__unit">/ 5</div>
              </div>
            </div>
          </div>
          <div class="today-qNa">
            <div class="today-qNa__cell">
              <div class="aside__heading">
                <h4 class="aside__heading__tit">오늘의 상담신청 및 완료</h4>
              </div>
              <div class="today-qNa__wrap">
                <div class="today-question__num">221,424</div>
                <div class="today-qNa__unit">/</div>
                <div class="today-answer__num">141,324</div>
              </div>
              <div class="today-data">2022.11.21</div>
            </div>
            <div class="today-qNa__cell today-qNa__cell--svg">
              <div class="aside__heading">
                <h4 class="aside__heading__tit">서비스에 대한 만족도 평가</h4>
              </div>
              <div class="service-eval__wrap">
              <svg class="service-eval__svg" width="180" height="320" xmlns="http://www.w3.org/2000/svg">
                  <path class="arcGraph" stroke-linecap="round" d="M 10,90 A 1 1, 0, 0 1, 170 90"></path>
                  <path class="arcGraphValue" stroke-linecap="round" d="M 10,90 A 1 1, 0, 0 1, 170 90"></path>
                  <g class="arcCircle">
                    <circle class="shap-1" r="10"></circle>
                    <circle class="shap-2" r="8"></circle>
                  </g>
                </svg>
                <div class="service-eval__content">
                  <div class="service-eval">
                    <span class="service-eval__score">4.0</span>
                    <span class="service-eval__unit">점</span>
                  </div>
                  <div class="service-eval__desc">5점 만점 기준</div>
                </div>
              </div>
            </div>
          </div>
          <div class="aside__link-banners">
            <a href="#" class="aside__link-banner aside__link-banner--top">
              <img src="../advisorAssets/assets/images/aside-link-01.png" alt="" class="aside__link-banner-img">
            </a>
            <a href="#" class="aside__link-banner aside__link-banner--bottom">
              <img src="../advisorAssets/assets/images/aside-link-02.png" alt="" class="aside__link-banner-img">
            </a>
          </div>
        </div>
      </div>
    </div>
    
@include('advisor/common/footer')
@include('advisor/common/end')
