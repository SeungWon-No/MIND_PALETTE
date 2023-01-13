@include('advisor/common/header')
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="inquiry-cont">
            <div class="counseling-notice__heading">
              <h3 class="counseling-notice__tit">1:1 상담</h3>
            </div>
            <div class="inquiry-table">
              <div class="inquiry-table__inner">
                <div class="inquiry-table__header">
                  <div class="inquiry-table__row">
                    <div class="table-header__cell col-1">번호</div>
                    <div class="table-header__cell col-2">제목</div>
                    <div class="table-header__cell col-3">날짜</div>
                    <div class="table-header__cell col-4">분류</div>
                  </div>
                </div>
                <div class="inquiry-table__body">
                  <div class="inquiry-table__row">
                    <!-- 상담완료 일때 inquiry-btn에 클래스 actived추가-->
                    <div class="table-body__cell col-1">60</div>
                    <div class="table-body__cell col-2"><a href="#none">상담관련 내용입니다.</a></div>
                    <div class="table-body__cell col-3">2022.11.28</div>
                    <div class="table-body__cell col-4">
                      <a href="#none" class="inquiry-btn">상담대기</a>
                    </div>
                  </div>
                  <div class="inquiry-table__row">
                    <!-- 상담완료 일때 inquiry-btn에 클래스 actived추가-->
                    <div class="table-body__cell col-1">60</div>
                    <div class="table-body__cell col-2"><a href="#none">상담관련 내용입니다.</a></div>
                    <div class="table-body__cell col-3">2022.11.28</div>
                    <div class="table-body__cell col-4">
                      <a href="#none" class="inquiry-btn actived">상담완료</a>
                    </div>
                  </div>
                </div>
                <a href="#none" class="inquiry-writing__btn">글쓰기</a>
              </div>
            </div>
            <div class="paging-box">
              <a href="#none" class="paging-prev"><span class="icon pagin-perv-icon"></span></a>
              <a href="#none" class="paging-num active">1</a>
              <a href="#none" class="paging-num">2</a>
              <a href="#none" class="paging-next"><span class="icon pagin-next-icon"></span></a>
            </div>
          </div>
        </div> <!--column-left end-->
        <div class="column-right">
          <div class="account">
            <div class="account-info__cell">
              <div class="account-profile__photo">
                <img src="../assets/images/user-profile.jpg" alt="" class="account-profile__img">
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
          <!--22.12.29 수정 -->
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
          <!-- //22.12.29 수정 -->
          <!-- 22.12.29 수정 -->
          <div class="recent-history">
            <div class="aside__heading">
              <h4 class="aside__heading__tit">최근 상담 내역</h4>
              <a href="#none" class="aside__heading__link">더보기<span class="icon link-more-icon"></span></a>
            </div>
            <div class="recent-history__list">
              <a href="#none" class="recent-history__item">
                <div class="recent-history__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="recent-history__img">
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
              <a href="#none" class="recent-history__item">
                <div class="recent-history__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="recent-history__img">
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
              <a href="#none" class="recent-history__item">
                <div class="recent-history__photo">
                  <img src="../assets/images/couns-list-01.jpg" alt="" class="recent-history__img">
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
            </div>
          </div>
          <!-- //22.12.29 수정 -->
          <!-- 22.12.29 수정 -->
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
          <!-- //22.12.29 수정 -->
          <!-- 22.12.29 수정 -->
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
                <!-- 22.12.30 수정 -->
                <svg class="service-eval__svg" width="180" height="320" xmlns="http://www.w3.org/2000/svg">
                  <!-- 
                    점수가 90%이면 
                    <g class="arcCircle">의 offset-distance는 90%
                    <path class="arcGraphValue">의 stroke-dashoffset는 10%
                    점수가 10%이면
                    <g class="arcCircle">의 offset-distance는 10%
                    <path class="arcGraphValue">의 stroke-dashoffset는 90%
                  -->
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
                <!--// 22.12.30 수정 -->
              </div>
            </div>
          <!--// 22.12.29 수정 -->
          </div>
          <div class="aside__link-banners">
            <a href="#" class="aside__link-banner aside__link-banner--top">
              <img src="../assets/images/aside-link-01.png" alt="" class="aside__link-banner-img">
            </a>
            <a href="#" class="aside__link-banner aside__link-banner--bottom">
              <img src="../assets/images/aside-link-02.png" alt="" class="aside__link-banner-img">
            </a>
          </div>
        </div> <!-- column-right end-->
      </div>
    </div> <!-- container end-->  
@include('advisor/common/footer')
@include('advisor/common/end')