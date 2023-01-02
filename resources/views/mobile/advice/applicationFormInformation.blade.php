@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "신청서 작성 안내",
    "isShowProgress" => true,
    "progressValue" => $progressWidth
])
<script>
    function pageClose(){
        pop.open('savePop');
    }
</script>
<section id="container" class="page-body">
    @csrf
    <div class="page-contents">
        <div class="advice-request-write">
            <div class="basic-data-group msmall">
                <div style="padding:0 5px;">
                    <h2 class="point-title small">4. 신청서를 작성해주세요.</h2>
                    <p class="advice-write-desc">자녀의 문제를 정확하게 이해하고 효과적인 상담 및 분석을 진행하기 위함으로, 가능한 자세히 적어주세요.</p>
                </div>
            </div>
            <div class="basic-data-group">
                <ol class="advice-request-step">
                    <li>
                        <div class="item-icon"><div class="icon icon-kid-yellow"></div></div>
                        <div class="item-desc">
                            <em>STEP 1.</em>
                            <div class="txt">아이 인적사항</div>
                        </div>
                    </li>
                    <li>
                        <div class="item-icon"><div class="icon icon-family-yellow"></div></div>
                        <div class="item-desc">
                            <em>STEP 2.</em>
                            <div class="txt">가족 관계</div>
                        </div>
                    </li>
                    <li>
                        <div class="item-icon"><div class="icon icon-why-yellow"></div></div>
                        <div class="item-desc">
                            <em>STEP 3.</em>
                            <div class="txt">검사 목적</div>
                        </div>
                    </li>
                </ol>
            </div>
            <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
            <div class="page-bottom-ui"><a href='javascript:nextForm("false")' class="btn btn-orange btn-large-size btn-page-action">다음으로</a></div>
        </div>
    </div>
</section>
<script>
    function popupSaveAction() {
        nextForm("true");
    }

    function nextForm(isClose) {
        $.ajax({
            type:'POST',
            url:'/HTPSave/{{$counselingPK}}',
            data: {
                "isClose" : isClose
            },
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    location.href = data.nextStep;
                } else {
                    alert(data.message);
                }
            }
        });
    }
</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

