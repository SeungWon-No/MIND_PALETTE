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
    <div class="page-contents">
        <div class="advice-request-write">
            <div class="basic-data-group">
                <div style="padding:0 5px;">
                    <h2 class="point-title small">진행될 검사 과정입니다.</h2>
                    <p class="advice-write-desc">모든 단계의 <em class="font-color-red">필수 항목(*)들을 작성</em>해 주셔야 다음 화면으로 이동이 가능하며, 선택 항목의 답변들을 많이 기재해 주실수록 더욱 정확한 진단에 도움이 됩니다.</p>
                </div>
            </div>
            <!-- 20221225 수정 : 내용 수정 -->
            <div class="basic-data-group">
                <div class="advice-step-list">
                    <div class="advice-step-list-inner">
                        <div class="advice-step-cell">
                            <div class="advice-step-items">
                                <div class="advice-step-title">1. 그림 그리기</div>
                                <div class="advice-step-detail">집 → 나무 → 사람1 → 사람2<br><em>(약 5분 소요)</em></div>
                            </div>
                        </div>
                        <div class="advice-step-cell">
                            <div class="advice-step-items">
                                <div class="advice-step-title">2. 그림 등록 및 답변</div>
                                <div class="advice-step-detail">집 → 나무 → 사람1 → 사람2 → 행동관찰<br><em>(약 15분 소요)</em></div>
                            </div>
                        </div>
                        <div class="advice-step-cell">
                            <div class="advice-step-items">
                                <div class="advice-step-title">3. 기질 검사</div>
                                <div class="advice-step-detail">문항 수 : 20개<br><em>(약 3분 소요)</em></div>
                            </div>
                        </div>
                        <div class="advice-step-cell">
                            <div class="advice-step-items">
                                <div class="advice-step-title">4. 신청서 작성</div>
                                <div class="advice-step-detail">아이 인적사항 → 가족관계 → 검사 진행 사유<br><em>(약 3분 소요)</em></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-bottom-ui"><a href="/adviceInformation/{{$counselingPK}}" class="btn btn-orange btn-large-size btn-page-action">다음으로</a></div>
        </div>
    </div>
</section>
<script>
    function popupSaveAction() {
        location.href = "/";
    }
</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

