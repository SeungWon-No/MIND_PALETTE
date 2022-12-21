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
                <h2>HTP 검사 안내</h2>
                <div class="txt">HTP 그림 투사검사(집,나무, 남,여 그림)와 설문 및 질문의 답변을 통해 아이의 심리상태를 분석합니다. 전문상담가가 그림 심리분석을 진행하며 그림 분석 비용은 5만원입니다. (센터에서 진행하는 검사비용 대비 30%수준)</div>
                <div class="txt">검사 이후 추가 상담 및 치료가 필요한 분들은 전문 상담사가 소속된 센터나, 가까운 심리상담센터에 방문해서 후속 상담 및 치료를 받으실 수 있습니다.<br>*권장 연령: 영유아~초기 청소년</div>
            </div>
            <div class="advice-info-agree" onclick="checked('agree1')">
                <h3 class="data-title">마음팔레트는 원활한 서비스 이용을 위해<br>개인정보를 수집하고 있습니다.</h3>
                <div class="join-agree-data">
                    <div class="join-agree-check"><label class="form-checkbox">
                            <input id="agree1" type="checkbox" class="check-agree-checkbox">
                            <span class="form-check-icon">
                                <em><strong>개인정보 제공,활용 동의<span class="need">*</span></strong></em>
                            </span>
                        </label>
                    </div>
                    <div class="join-agree-detail">약관내용</div>
                </div>
                <div class="join-agree-data" onclick="checked('agree2')">
                    <div class="join-agree-check">
                        <label class="form-checkbox">
                            <input id="agree2"  type="checkbox" class="check-agree-checkbox">
                            <span class="form-check-icon">
                                <em><strong>개인정보 수집,이용활용,제공 등의 동의<span class="need">*</span></strong></em>
                            </span>
                        </label>
                    </div>
                    <div class="join-agree-detail">약관내용</div>
                </div>
            </div>
        </div>
        <!-- btn클래스에 클래스 추가시 비활성화 표현 -->
        <div class="page-bottom-ui"><a id="adviceRequest" href="#" class="btn btn-orange btn-large-size btn-page-action disabled">상담을 진행합니다.</a></div>
    </div>
</section>
<script>
    function checked(id) {
        if ( $('#'+id).is(":checked") ) {
            $('#'+id).prop('checked',false);
        } else {
            $('#'+id).prop('checked',true);
        }


        if ($("input[class='check-agree-checkbox']:checked").length === 2) {
            $("#adviceRequest").removeClass("disabled");
            $("#adviceRequest").attr("href",'/requestAdvice');
        } else {
            $("#adviceRequest").addClass("disabled");
            $("#adviceRequest").removeAttr("href");
        }
    }
</script>
@include('/mobile/common/end')

