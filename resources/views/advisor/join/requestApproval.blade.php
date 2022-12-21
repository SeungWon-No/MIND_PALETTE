@include('advisor/common/header')
<div id="container">
    <div class="member-cont">
    <div class="member-inner">

        <div class="join-progress__wrap">
        <h3 class="member-heading__tit">자격심사 진행중</h3>
        <p class="join-progress__text">
            <strong>서윤경(user@email.com)님</strong>상담사 가입을 축하드립니다! <br>신청이 승인되면 인증하신 메일로 알림을 보내드립니다.
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
        </div>
    </div>
    </div>
</div>
@include('advisor/common/footer')    
@include('advisor/common/end')