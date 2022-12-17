@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "title" => "회원가입"
])
<section id="container" class="page-body">
    <div class="page-contents page-write">
        <div class="join-wrap">
            <div class="point-title">이용약관에 동의해주세요.</div>
            <div class="join-agree-all"><label class="form-checkbox"><input type="checkbox"><span class="form-check-icon"><em><strong>이용약관에 모두 동의합니다.</strong></em></span></label></div>
            <div class="join-agree-data">
                <div class="join-agree-check"><label class="form-checkbox"><input type="checkbox"><span class="form-check-icon"><em><strong>마음팔레트 이용 약관<span class="need">*</span></strong></em></span></label></div>
                <div class="join-agree-detail">약관내용</div>
            </div>
            <div class="join-agree-data">
                <div class="join-agree-check"><label class="form-checkbox"><input type="checkbox"><span class="form-check-icon"><em><strong>개인정보 수집 및 이용<span class="need">*</span></strong></em></span></label></div>
                <div class="join-agree-detail">약관내용</div>
            </div>
            <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
            <div class="page-bottom-ui"><a href="#" class="btn btn-orange btn-large-size btn-page-action disabled">다음으로</a></div>
        </div>
    </div>
</section>
@include('/mobile/common/end')

