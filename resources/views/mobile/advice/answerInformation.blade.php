@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "그림 등록 및 답변 안내",
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
                    <!-- 20221225 수정 -->
                    <h2 class="point-title small">2. 순서대로 그림을 등록해주세요.</h2>
                    <!-- //20221225 수정 -->
                    <p class="advice-write-desc">그림 4개를 준비한 후, 각각의 그림에 대한 질문을 통해 아이의 생각을 작성합니다.</p>
                </div>
            </div>
            <div class="basic-data-group">
                <div class="advice-request-list">
                    <ol class="advice-request-step">
                        <li>
                            <div class="item-icon"><div class="icon icon-house-orange"></div></div>
                            <div class="item-desc">
                                <em>STEP 1.</em>
                                <div class="txt">House : 집</div>
                            </div>
                        </li>
                        <li>
                            <div class="item-icon"><div class="icon icon-tree-orange"></div></div>
                            <div class="item-desc">
                                <em>STEP 2.</em>
                                <div class="txt">Tree : 나무</div>
                            </div>
                        </li>
                        <li>
                            <div class="item-icon"><div class="icon icon-person-orange"></div></div>
                            <div class="item-desc">
                                <em>STEP 3.</em>
                                <div class="txt">Person : 사람1</div>
                            </div>
                        </li>
                        <li>
                            <div class="item-icon"><div class="icon icon-person-orange"></div></div>
                            <div class="item-desc">
                                <em>STEP 4.</em>
                                <div class="txt">Person : 사람2</div>
                            </div>
                        </li>
                        <!-- 20221220 수정 -->
                        <li>
                            <div class="item-icon"><div class="icon icon-why-yellow"></div></div>
                            <div class="item-desc">
                                <em>STEP 5.</em>
                                <div class="txt">행동 관찰</div>
                            </div>
                        </li>
                        <!-- //20221220 수정 -->
                    </ol>
                </div>
            </div>
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

