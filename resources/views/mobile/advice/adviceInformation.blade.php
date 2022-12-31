@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "HTP 검사 안내",
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
            <div class="basic-data-group">
                <div style="padding:0 5px;">
                    <h2 class="point-title small">시작 전 꼼꼼히 읽어주세요.</h2>
                </div>
            </div>
            <!-- 20221220 수정 : 내용 수정 -->
            <div class="basic-data-group">
                <div class="advice-start-info">
                    <ol class="advice-start-step">
                        <li><em>STEP 1</em><div class="item-desc">A4용지 4장, 연필(HB,2B), 지우개를 준비하세요.</div></li>
                        <li><em>STEP 2</em><div class="item-desc">아이가 편안하게 집중해서 그릴 수 있는 <span class="font-color-red">환경을 제공</span>하세요.<br>(부모가 개입하지 않도록 권장)</div></li>
                        <li><em>STEP 3</em><div class="item-desc">HTP 그림그리기 <span class="font-color-red">안내에 따라</span> 아이가 그림을 그리는 타이밍에 맞춰 버튼을 터치하세요.</div></li>
                        <li><em>STEP 4</em><div class="item-desc"><span class="font-color-red">각 그림들을 촬영</span>한 후 그림을 등록하고 그림에 대한 아이의 생각을 적어주세요.</div></li>
                    </ol>
                </div>
            </div>
            <!-- //20221220 수정 : 내용 수정 -->
            <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
            <div class="page-bottom-ui"><a href="javascript:nextForm('false')" class="btn btn-orange btn-large-size btn-page-action">다음으로</a></div>
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

