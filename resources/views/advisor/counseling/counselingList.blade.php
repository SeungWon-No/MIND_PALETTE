@include('advisor/common/header')
    <div id="container">
      <div class="column-wrapper">
        <div class="column-left">
          <div class="counseling-cont">
            <div class="counseling-tab__wrap">
              <!-- 활성화 된 버튼(counseling-tab__btn)에 클래스 active 추가 -->
              <a href="#" class="counseling-tab__btn active">전체</a>
              <a href="#" class="counseling-tab__btn">상담대기</a>
              <a href="#" class="counseling-tab__btn">상담완료</a>
              <a href="#" class="counseling-tab__btn">주의/위험</a>
              <a href="#" class="counseling-tab__btn">상담불가</a>
            </div>
            <div class="counseling-search__wrap">
              <div class="counseling-search__left">
                <div class="select-box">
                  <button class="select-box__label">선택 <span class="icon select-down-icon"></span></button>
                  <!-- select-option__list에 acitve 클래스 붙으면 활성화 -->
                  <ul class="select-option__list">
                    <li class="select-option">아이이름</li>
                    <li class="select-option">상담코드</li>
                  </ul>                      
                </div>
                <div class="counseling-search__group">
                  <input type="text" class="counseling-search__form" placeholder="검색 입력">
                </div>
              </div>
            </div>
            <div class="counseling-list__heading">
              <!-- 탭에 따라 문구변경 
                전체-> 전체내역
                상담대기-> 상담대기 내역
                상담완료->상담완료 내역
                주의/위험->주의/위험 내역
                상담불가-> 상담불가 내역 
              -->
              <h3 class="counseling-list__tit">전체내역</h3>
              <div class="counseling-sort__wrap">
                <div class="counseling-sort__btns">
                  <!-- 활성화 된 버튼(counseling-tab__btn)에 클래스 active 추가 -->
                  <a href="#" class="counseling-sort active">전체</a>
                  <a href="#" class="counseling-sort">12월</a>
                  <a href="#" class="counseling-sort">11월</a>
                  <a href="#" class="counseling-sort">10월</a>
                </div>
                <div class="counseling-sort__datepicker">
                  <input type="text" id="sdate" autocomplete="off">
                  <span class="datepicker-unit">~</span>
                  <input type="text" id="edate" autocomplete="off">

                  <button type="button" class="datepicker-apply__btn">조회<span class="icon search-apply-icon"></span></button>
                </div>
              </div>
            </div>
            <div class="counseling-list__wrap">
              <ul class="counseling-list">
                <!-- case에 맞게 class명에 추가 -->
                <!-- case 1. [default] counseling -->
                <!-- case 2. [ing] counseling ongoing -->
                <!-- case 3. [end] counseling end -->
                <!-- case 3-1. [end + danger] counseling end danger -->
                <!-- case 3-2. [end + need-care] counseling end need-care -->

                @foreach ($counselingList as $list)
                  <li class="counseling">
                    <a href="#none" class="counseling-thumb">
                      <img src="../advisorAssets/assets/images/couns-list-01.jpg" alt="" class="counseling-thumb__img">
                    </a>
                    <div class="counseling-user__info">
                      <div class="counseling-user__name">{{$list['counselorName']}}</div>
                      <div class="counseling-user__year">{{$list['counselorBirthday']}}</div>
                      <div class="counseling-user__gender">{{$list['counselorGender']}}</div>
                    </div>
                    <div class="counseling-code__cell">
                      <div class="counseling-code__detail">상담코드:<span class="counseling-code">{{$list['counselingPK']}}</span></div>
                    </div>
                    <div class="counseling-link__cell">
                      <a href="#none" class="counseling-link">상담하기</a>
                    </div>
                  </li>
                @endforeach
              </ul>
              <div class="paging-box">
                <a href="#none" class="paging-prev"><span class="icon pagin-perv-icon"></span></a>
                <a href="#none" class="paging-num active">1</a>
                <a href="#none" class="paging-num">2</a>
                <a href="#none" class="paging-num">3</a>
                <a href="#none" class="paging-next"><span class="icon pagin-next-icon"></span></a>
              </div>
            </div>
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
                    <div class="account-profile__name">{{$advisorProfile['advisorName']}}</div>
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
                <!-- 작성 중인 상담이 1건 이상이면 class에  active추가 -->
                <a href="#none" class="my-history__obj active">• 작성중
                  <span class="my-history__num">1</span><span class="my-history__unit">건</span>
                </a>
                <!-- 작성 중인 상담이 1건 이상이면 남은 시간 추가 -->
                <div class="my-history__time-cell">남은 시간 <span class="my-history__time">11:30</span></div>
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
  </div>
  <script src="../advisorAssets/assets/js/common.js"></script>

  <!-- datepicker-->
  <script src="../advisorAssets/assets/js/jquery-ui.min.js"></script>
  <script>
    
    $.datepicker.regional['ko'] = {
        closeText: '닫기',
        prevText: '이전달',
        nextText: '다음달',
        currentText: '오늘',
        monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)','7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
        monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        dayNames: ['일','월','화','수','목','금','토'],
        dayNamesShort: ['일','월','화','수','목','금','토'],
        dayNamesMin: ['일','월','화','수','목','금','토'],
        weekHeader: 'Wk',
        dateFormat: 'yy-mm-dd',
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: true,
        yearSuffix: '',
        showOn: 'both',
        buttonText: "달력",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: 'c-99:c+99',
        buttonImage: "../advisorAssets/assets/images/icon/datepicker-icon.png",
        buttonImageOnly: true,
    };
    $.datepicker.setDefaults($.datepicker.regional['ko']);

    $('#sdate').datepicker();
    $('#sdate').datepicker("option", "maxDate", $("#edate").val());
    $('#sdate').datepicker("option", "onClose", function ( selectedDate ) {
        $("#edate").datepicker( "option", "minDate", selectedDate );
    });

    $('#edate').datepicker();
    $('#edate').datepicker("option", "minDate", $("#sdate").val());
    $('#edate').datepicker("option", "onClose", function ( selectedDate ) {
        $("#sdate").datepicker( "option", "maxDate", selectedDate );
    });

  </script>
</body>
</html>