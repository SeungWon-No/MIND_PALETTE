@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "기질 검사 안내",
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
                    <h2 class="point-title small">3. 기질 검사 안내</h2>
                    <p class="advice-write-desc">각 문항을 읽고 평소 자녀의 행동과 일치하는 정도에 따라 해당하는 칸에 표시하세요.</p>
                </div>
            </div>
            <div class="basic-data-group">
                <div class="point-note actived">
                    <div class="btn-point-note-nav"><em>기질이란?</em></div>
                    <div class="point-note-desc"><div class="txt">정서 활동 사회성 기질 검사로, 기질은 거의 변하지 않는 안정된 특성입니다. 아동의 유년기에 시행된다면 추후 부모의 아동 양육에 도움이 될 것으로 예상됩니다.</div></div>
                </div>
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

