@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "ID/PW 찾기",
])
<section id="container" class="page-body">
    <div class="page-contents page-write">
        <div class="member-find-wrap">
            <div class="page-tab">
                <div class="page-tab-inner">
                    <!-- 활성화시 actived클래스 추가 -->
                    <div class="tab-cell actived"><a href="#" class="btn-tab-item"><span>아이디 찾기</span></a></div>
                    <div class="tab-cell"><a href="#" class="btn-tab-item"><span>비밀번호 찾기</span></a></div>
                </div>
            </div>
            <!-- 20221220 수정  -->
            <div class="member-find-desc">휴대폰 인증을 통해<br>고객님의 아이디를 찾습니다.</div>
            <div class="page-bottom-ui"><a href="#" class="btn btn-orange btn-large-size btn-page-action">휴대폰 인증하기</a></div>
            <!-- //20221220 수정  -->
        </div>
    </div>
</section>
@include('/mobile/common/end')

