@include('advisor/common/header')
    <div id="container">
      <main>
        <div class="column-wrapper">
          <div class="column-left">
            <div class="counseling-wrap">
              <div class="counseling-fillter__tab">
                <!-- counseling-filter__btn 클래스 active 일때 활성화 -->
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
                <!-- ====================================
                  counseling 케이스 총 6가지 (전부 li태그에 클래스명 추가)
                1. 상담대기 
                2. 상담중 counseling에 ongoing 클래스 추가
                3. 상담불가 counseling에 disabled 클래스 추가
                4. 상담끝  counseling에 end 클래스 추가
                  4-1. 위험  counseling에 danger 추가 (end는 추가되있는 상태)
                  4-2. 긴급조치 필요 counseling에 need-care 추가 (end는 추가되있는 상태)
                =========================================  -->
                <ul class="counseling-list">
                  <!-- 상담 리스트 시작 -->
                  <li class="counseling">
                    <a href="#none" class="counseling-thumb">
                      <img src="../advisor/assets/images/couns-list-01.jpg" alt="" class="counseling-thumb__img">
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
                  <!-- 상담 리스트 끝 -->
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
              <?/* 상담사 리스트 시작 */?>
                <div class="expert-item">
                  <div class="expert-item__head">
                    <div class="expert-profile__photo">
                      <img src="../advisor/assets/images/user-profile.jpg" alt="" class="expert-profile__img">
                    </div>
                    <div class="expert-profile">
                      <div class="expert-name">아무개 전문 상담사</div>
                      <div class="expert-like__box">
                        <div class="expert-like__btn">
                          <span class="icon thumb-up-icon"></span>
                          <span class="expert-like__num">30</span>
                        </div>
                        <div class="expert-unlike__btn">
                          <span class="icon thumb-down-icon"></span>
                          <span class="expert-unlike__num">3</span>
                        </div>
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
                <?/* 상담사 리스트 끝*/?>
              </div>
              <p class="notice-data">
                <span class="icon notice-icon"></span>22년 11월 28일 14시 22분 기준 정보입니다.
              </p>
            </div>
          </div> <!--column-left end-->
          <div class="column-right">
            <div class="account">
              <div class="account-info__cell">
                <div class="account-profile__photo">
                  <img src="../advisor/assets/images/user-profile.jpg" alt="" class="account-profile__img">
                </div>
                <div class="account-profile">
                  <div class="account-profile__cell">
                    <div class="account-profile__info">
                      <div class="account-profile__name">김아무 상담사</div>
                      <div class="account-profile__center">사랑 마음 센터</div>
                    </div>
                    <a href="#none" class="account-logout__btn">로그아웃</a>
                  </div>
                  <a href="#none" class="account-profile__link">프로필 바로가기 ></a>
                </div>
              </div>
            </div>
            <div class="my-history">
              <div class="my-history__heading">
                <div class="my-history__tit">나의 상담내역</div>
                <div class="my-history__total">
                  (총 <span class="my-history__totalnum">23</span>건)
                </div>
              </div>
              <ul class="my-history__list">
                <li class="my-history__item">
                  <div class="my-history__obj">• 상담 진행중
                    <span class="my-history__num">1</span><span class="my-history__unit">건</span>
                  </div>
                </li>
                <li class="my-history__item">
                  <div class="my-history__obj">• 상담불안
                    <span class="my-history__num">1</span><span class="my-history__unit">건</span>
                  </div>
                </li>
                <li class="my-history__item">
                  <div class="my-history__obj">• 상담완료
                    <span class="my-history__num">1</span><span class="my-history__unit">건</span>
                  </div>
                </li>
                <li class="my-history__item">
                  <div class="my-history__obj">• 추가상담요청
                    <span class="my-history__num">1</span><span class="my-history__unit">건</span>
                  </div>
                </li>
              </ul>
            </div>
  
            <div class="recent-history">
              <div class="aside__heading">
                <h4 class="aside__heading__tit">최근 상담 내역</h4>
                <a href="#none" class="aside__heading__link">더보기<span class="icon link-more-icon"></span></a>
              </div>
              <div class="recent-history__list">
                <?/* 최근 상담 내역 리스트 시작*/?>
                <div class="recent-history__item">
                  <div class="recent-history__photo">
                    <img src="../advisor/assets/images/couns-list-01.jpg" alt="" class="recent-history__img">
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
                </div>
                <?/* 최근 상담 내역 리스트 끝*/?>
              </div>
            </div>
            <div class="my-prefer">
              <div class="aside__heading">
                <h4 class="aside__heading__tit">나의 공감, 반대률</h4>
              </div>
              <div class="my-prefer__content">
                <div class="my-prefer__view">
                  <!-- my-like__num와 my-unlike__num에 들어가는 퍼센트로 그래프 그려지게 만들어놨습니다.  -->
                  <canvas class="my-prefer__canvas" width="78" height="78">이 브라우저는 cnavas를 지원하지 않습니다.</canvas>
                </div>
                <div class="my-prefer__status">
                  <div class="my-prefer__like">
                    <p>공감<span class="my-like__num">70%</span></p>
                  </div>
                  <div class="my-prefer__unlike">
                    <p>반대<span class="my-unlike__num">30%</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="today-qNa">
              <div class="aside__heading">
                <h4 class="aside__heading__tit">오늘의 질문과 답변</h4>
              </div>
              <div class="today-qNa__wrap">
                <div class="today-question__num">221,424</div>
                <div class="today-qNa__unit">/</div>
                <div class="today-answer__num">141,324</div>
              </div>
              <div class="today-data">2022.11.21</div>
              <div class="aside__heading">
                <h4 class="aside__heading__tit">누적 답변수</h4>
              </div>
              <div class="today-qNa__wrap">
                <div class="today-totalAnswer__num">441,324,512</div>
              </div>
              <div class="since-data">since 2019</div>
            </div>
            <div class="aside__link-banners">
              <a href="#" class="aside__link-banner aside__link-banner--top">
                <img src="../advisor/assets/images/aside-link-01.png" alt="" class="aside__link-banner-img">
              </a>
              <a href="#" class="aside__link-banner aside__link-banner--bottom">
                <img src="../advisor/assets/images/aside-link-02.png" alt="" class="aside__link-banner-img">
              </a>
            </div>
          </div> <!-- column-right end-->
        </div>
      </main>
    </div>
@include('advisor/common/footer')    
@include('advisor/common/end')