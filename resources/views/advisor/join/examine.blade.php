@php
print_r($getAdvisorStatus);
@endphp
@include('advisor/common/header')
    <div id="container">
      <div class="member-cont">
        <div class="member-inner">
          <!-- 예정 -->
          <div class="join-progress__wrap">
            @if($getAdvisorInfo['advisorStatus'] == 361) 
            <h3 class="member-heading__tit">자격심사 검토 예정</h3>
            @elseif($getAdvisorInfo['advisorStatus'] == 362)
            <h3 class="member-heading__tit">자격심사 검토 중</h3>
            @else
            <h3 class="member-heading__tit">자격심사 미승인</h3>
            @endif
            <p class="join-progress__text">
              @if($getAdvisorInfo['advisorStatus'] == 361) 
              <!-- 예정 -->
              <strong>{{$getAdvisorInfo['advisorName']}}({{$getAdvisorInfo['email']}})님</strong>자격 심사가 진행 예정입니다.<br>심사 검토 이전에는 정보 수정이 가능합니다.
              @elseif($getAdvisorInfo['advisorStatus'] == 362)
              <!-- 진행중 -->
              <strong>{{$getAdvisorInfo['advisorName']}}({{$getAdvisorInfo['email']}})님</strong>자격 심사가 진행중입니다.<br>심사 진행 중에는 정보 수정이 불가능합니다.
              @else
              <!-- 반려 -->
              <strong>{{$getAdvisorInfo['advisorName']}}({{$getAdvisorInfo['email']}})님</strong>상담사 가입에 실패하였습니다.<br>다음 기회에 시도 부탁드립니다.
              @endif
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
            @if($getAdvisorInfo['advisorStatus'] == 361) 
            <!-- 예정 -->
            <a href="/advisor/consultationInformation" class="join-progress__btn">수정하기</a>
            @elseif($getAdvisorInfo['advisorStatus'] == 362)
            <!-- 진행중 -->
            <a class="join-progress__btn disabled">수정하기</a>
            @else
            
            @endif
          </div>
        </div>
      </div>
    </div> <!-- container end-->
@include('advisor/common/footer')
@include('advisor/common/end')