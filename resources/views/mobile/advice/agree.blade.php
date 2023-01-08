@include('/mobile/common/start')@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => false,
    "title" => "HTP 상담 신청하기"
])
<script>
    function pageClose(){
        location.href = '/';
    }
</script>
<section id="container" class="page-body">
    <div class="page-contents">
        <div class="advice-info-wrap">
            <div class="advice-info-headline">
                <h2>HTP 검사란?</h2>
                <div class="txt">오늘날 현대인들은 가정, 직장, 학교 등의 환경에서 대인관계, 심리적 부적응, 자존감, 진로, 가정 내 소통 등 여러 가지 심리적 문제에 부딪히며, 자신의 생각과 감정을 언어로 표현하는데 어려움을 느끼고 트라우마와 고통을 호소하고 있습니다. Buck(1948)에 의해 개발된 HTP(집-나무-사람) 검사는 우리에게 친숙한 주제인 집, 나무, 사람을 그리게 함으로써 인간의 생각과 감정, 고통 등 내면세계를 이해하는데 유용하며, 대인관계 심리적 부적응, 심리적 문제를 알 수 있는 투사검사입니다.</div>
                <div class="txt"><div class="font-underline">*권장 연령: 영유아~초기 청소년</div></div>
            </div>
            <!-- 20221225 수정 -->
            <div class="advice-info-agree">
                <!-- 20221229 수정 -->
                <div style="padding:0 5px;">
                    <h3 class="data-title">마음팔레트는 원활한 서비스 이용을 위해<br>환불규정 동의를 받고 있습니다.</h3>
                </div>
                <div class="join-agree-data">
                    <div class="join-agree-check" onclick="checked('agree1')">
                        <label class="form-checkbox">
                            <input id="agree1" type="checkbox">
                            <span class="form-check-icon">
                                <em><strong>환불규정에 동의합니다.<span class="need">*</span></strong></em>
                            </span>
                        </label>
                    </div>
                    <div class="join-agree-detail"><a href="https://maeumpalette.com/" target="_blank"class="font-underline">https://maeumpalette.com/</a>
                        <a href="http://m.maeumpalette.com/" target="_blank" class="font-underline">http://m.maeumpalette.com/</a>

                        환불은 유료 HTP 상담 서비스에 적용되니 아래 내용을 확인해 주세요.

                        1. 이용자 본인의 의사로 서비스 이용을 포기한 경우
                        결제 후 유료 HTP 검사를 시작 안 한 경우 : 전액 환불
                        결제 후 유료 HTP검사 상담 신청을 완료한 경우 : 50% 환불
                        HTP검사 상담 신청 완료 후 전문 상담사가 분석중인 경우 : 환불 불가
                        전문 상담사가 결과리포트를 발송한 경우 : 환불 불가
                        기타 이용자의 귀책사유로 환불을 요청한 경우 : 환불 불가
                        * 귀책사유란? 시스템 가이드 불이행으로 사진 촬영 방법 오류, 필기도구 사용 오류 등으로 상담이 불가능한 상태로 자료를 등록한 경우

                        2. 환불 수단 및 소요기간
                        결제 시 사용하신 결제 수단에 따라 환불이 진행됩니다.
                        환불 접수는 최대 2~3일 소요됩니다.(영업일 기준)
                        환불 접수 이후 환불 소요 기간은 결제 수단별로 상이합니다.

                        3. 기타
                        환불 금액은 1의 자리에서 반올림하여 계산합니다.
                        회사의 기술적 문제(시스템 오류)로 관찰이 진행되지 못한 경우 환불의 대상이 됩니다.
                        마음팔레트에서 소개된 <인근 상담 센터>에서 직접 결제 후 환불을 원할 경우에는 다섯달란트가 환불의 책임을 지지 않습니다.

                            해당 환불규정은 2022년 12월 27일부터 적용합니다.</div>
                </div>
            </div>
        </div>
        <div class="basic-data-group">
            <div class="page-bottom-desc type-2">환불 내용을 확인하였으며, <a href="#" class="font-underline">개인정보 제공</a> 등에 동의합니다.</div>
            <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
            <div class="page-bottom-ui"><a id="adviceRequest"  href="#" class="btn btn-orange btn-large-size btn-page-action disabled">상담을 진행합니다.</a></div>
        </div>
        <!-- //20221229 수정  -->
    </div>
</section>
<script>
    function checked(id) {
        if ( $('#'+id).is(":checked") ) {
            $('#'+id).prop('checked',false);
            $("#adviceRequest").addClass("disabled");
            $("#adviceRequest").removeAttr("href");
        } else {
            $('#'+id).prop('checked',true);
            $("#adviceRequest").removeClass("disabled");
            $("#adviceRequest").attr("href",'/requestAdvice');
        }

    }
</script>
@include('/mobile/common/end')

