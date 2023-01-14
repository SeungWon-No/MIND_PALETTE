@include('advisor/common/header')
    <div id="container">
      <div class="member-cont">
        <div class="member-inner">
          <div class="join-progress__wrap">
            <h3 class="member-heading__tit">자격심사 검토 예정</h3>
            <p class="join-progress__text">
              <strong>서윤경(user@email.com)님</strong>자격 심사가 진행 예정입니다.<br>심사 검토 이전에는 정보 수정이 가능합니다.
            </p>
            <div class="join-progress mg-bt-40 mg-t-170">
              <div class="join-progress__bar done"></div>
              <div class="join-progress__view ">
                <!-- join-progress__item에 클래스 active -->
                <div class="join-progress__item active">
                  <div class="icon join-progress__icon"></div>
                  <div class="join-progress__desc">기본정보 입력</div>
                </div>
                <div class="join-progress__item active">
                  <div class="icon join-progress__icon"></div>
                  <div class="join-progress__desc">상담 관련 정보 입력</div>
                </div>
                <div class="join-progress__item active">
                  <div class="icon join-progress__icon "></div>
                  <div class="join-progress__desc">자격 심사</div>
                </div>
              </div>
            </div>
            <!-- 자격심사 검토중일 때 join-progress__btn에 클래스 disabled추가  -->
            <a href="#none" class="join-progress__btn">수정하기</a>
          </div>
        </div>
      </div>
    </div> <!-- container end-->
@include('advisor/common/footer')
@include('advisor/common/end')