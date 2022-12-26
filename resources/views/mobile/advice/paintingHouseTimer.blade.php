@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => false,
    "title" => "HTP 그림그리기",
    "isShowProgress" => true,
    "progressValue" => $progressWidth
])
<script>
    function pageClose(){
        // pop.open('savePop');
    }
</script>
<section id="container" class="page-body">
    <div class="page-contents">
        <div class="advice-request-write">
            <div class="basic-data-group msmall">
                <div style="padding:0 5px;">
                    <h2 class="point-title small">1. 아이가 그림을 그릴 수 있도록 안내해주세요.</h2>
                    <p class="advice-write-desc">아이가 그림을 그리는 동안 개입은 하지 않되, 행동을 유심히 관찰하세요.</p>
                </div>
            </div>
            <div class="basic-data-group">
                <!-- 필수값 체크시 valid-error 클래스 추가시 활성화 -->
                <div id="cardBox" class="card-item card-draw">
                    <div class="card-header"><h3 class="item-subject">House : 집 그리기</h3><div class="icon icon-house-white"></div></div>
                    <div class="card-body">
                        <div class="item-desc">
                            아이에게 A4용지를 가로로 주면서
                            <strong class="font-color-red">“(아파트나 빌라가 아닌) 집을 그리세요"</strong>
                            라고 안내해줍니다. 아이가 편안하게 집중해서 그릴 수 있도록 환경을 만들어주며, 아이의 질문엔
                            <strong class="font-color-red">“하고 싶은 대로 하면 된다"</strong> 라고 안내해줍니다.
                            <br>종이를 돌려서 그려도 제지하지 않습니다.
                        </div>
                        <div class="draw-timer-info">
                            <div class="txt" style="display:block;">그리기 시작 버튼을 터치하면 타이머가 실행됩니다.</div>
                            <div class="txt" style="display:block;">버튼을 터치하면 타이머가 이어서 진행됩니다.</div>
                        </div>
                        <div class="draw-timer-ui">
                            <div class="left">
                                <div style="display:block;">
                                    <button id="drawButton" onclick="timer()"
                                            type="button"
                                            class="btn-draw-timer-nav ready">
                                        그리기 시작
                                    </button>
                                </div>
                            </div>
                            <div class="right">
                                <div id="timerBox"class="draw-timer-value disabled">
                                    <div id="timerText" class="number">00:00</div>
                                    <button type="button" onclick="clearTimer()" class="btn-draw-timer-reset">
                                        <span class="icon icon-reset-gray"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- disabled클래스 추가시 비활성화 -->
                <div id="questionForm" class="draw-request disabled">
                    <div class="draw-request-title">그림을 마친 후 질문에 답변해주세요.</div>
                    <fieldset>
                        <legend>그림 질문 입력 폼</legend>
                        <input type="hidden" class="hiddenTimer" id="questions60" name="questions60">
                        <div class="form-group">
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">그림을 그리는 순서가 어떻게 되나요?<em class="need">*</em></div>
                                    <div class="form-item-data">
                                        <input
                                            id="questions61" name="questions61"
                                            onKeyUp="checkSubmit()"
                                            type="text" placeholder="예) 지붕-벽-문-창문-기타 요소(굴뚝, 계단, 길...)"
                                            onFocus="inputChange(this);" onKeyUp="checkQuestionsOrder();"
                                            onfocusout="checkQuestionsOrder()"
                                            onblur="inputBlur(this);" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-cell">
                                <div class="form-group-item">
                                    <div class="form-item-label">지우개 사용 위치 및 횟수는 어떻게 되나요?<em class="need">*</em></div>
                                    <div class="form-item-data">
                                        <input
                                            id="questions62" name="questions62"
                                            type="text" placeholder="예) 지붕 1번, 창문 1번"
                                            onFocus="inputChange(this);" onKeyUp="checkQuestionsCount();"
                                            onfocusout="checkQuestionsCount()"
                                            onblur="inputBlur(this);" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="page-bottom-ui">
                <a href='javascript:checkSubmit()' class="btn btn-orange btn-large-size btn-page-action">다음으로</a>
            </div>
        </div>
    </div>
</section>
<script>
    function checkSubmit(){
        var isSubmit = true;

        isSubmit = (checkQuestionsTimer() && isSubmit);
        isSubmit = (checkQuestionsOrder() && isSubmit);
        isSubmit = (checkQuestionsCount() && isSubmit);

        if (isSubmit) {

        }
    }

    function checkQuestionsTimer() {
        var questions = $("#questions60").val();
        $("#cardBox").removeClass("valid-error");
        if (questions === "") {
            $("#cardBox").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkQuestionsOrder() {
        var questions = $("#questions61").val();
        $("#questions61").removeClass("valid-error");
        if (questions === "") {
            $("#questions61").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkQuestionsCount() {
        var questions = $("#questions62").val();
        $("#questions62").removeClass("valid-error");
        if (questions === "") {
            $("#questions62").addClass("valid-error");
            return false;
        }
        return true;
    }
</script>
<script>
    var timerInterval = null;
    var timeCount = 0;
    var paintingStep = [
        "house",
        "tree",
        "person1",
        "person2"
    ]
    function timer() {
        if ( timerInterval == null ) {
            $("#timerBox").removeClass("disabled");

            $("#drawButton").removeClass("ready");
            $("#drawButton").removeClass("complete");
            $("#drawButton").removeClass("disabled");
            $("#drawButton").addClass("complete");
            $("#drawButton").text("그리기 완료");

            timerInterval = setInterval(function (){
                timeCount++;
                setTimeText();
            },1000);
        } else {
            $("#drawButton").removeClass("ready");
            $("#drawButton").removeClass("complete");
            $("#drawButton").removeClass("disabled");
            $("#drawButton").addClass("disabled");
            $("#questionForm").removeClass("disabled");

            checkQuestionsTimer();
            clearInterval(timerInterval);
            timerInterval = null;
        }
    }
    function clearTimer() {

        $("#cardBox").removeClass("valid-error");
        $("#timerBox").addClass("disabled");
        $("#questionForm").addClass("disabled");

        $("#drawButton").removeClass("ready");
        $("#drawButton").removeClass("complete");
        $("#drawButton").removeClass("disabled");
        $("#drawButton").addClass("ready");
        $("#drawButton").text("그리기 시작");

        $("#timerText").text("00:00");
        $(".hiddenTimer").val("");

        if ( timerInterval != null ) {
            timeCount = 0;
            clearInterval(timerInterval);
            timerInterval = null;
        }
    }
    function setTimeText() {
        var min = parseInt(timeCount/60);
        var sec = parseInt(timeCount%60);

        var timeText = min.toString().padStart(2,'0')+":"+sec.toString().padStart(2,'0');
        $("#timerText").text(timeText);
        $(".hiddenTimer").val(timeText);
    }
</script>
@include('/mobile/common/end')

