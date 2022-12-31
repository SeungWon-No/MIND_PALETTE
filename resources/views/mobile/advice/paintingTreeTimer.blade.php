@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "HTP 그림그리기",
    "isShowProgress" => true,
    "progressValue" => $progressWidth
])
<script>
    function pageClose(){
        pop.open('savePop');
    }
</script>
<section id="container" class="page-body">
    <form name="CTRFrom" >
        @csrf
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
                        <div class="card-header"><h3 class="item-subject">Tree : 나무 그리기</h3><div class="icon icon-tree-white"></div></div>
                        <div class="card-body">
                            <div class="item-desc">아이에게 A4용지를 세로로 주면서
                                <strong class="font-color-red">“나무를 그리세요"</strong>
                                라고 안내해줍니다. 아이가 편안하게 집중해서 그릴 수 있도록 환경을 만들어주며, 아이의 질문엔
                                <strong class="font-color-red">“하고 싶은 대로 하면 된다"</strong> 라고 안내해줍니다.
                                종이를 돌려서 그려도 제지하지 않습니다.
                            </div>
                            <div class="draw-timer-info">
                                <div class="txt" style="display:block;">그리기 시작 버튼을 터치하면 타이머가 실행됩니다.</div>
                                <div class="txt" style="display:block;">버튼을 터치하면 타이머가 이어서 진행됩니다.</div>
                            </div>
                            <div class="draw-timer-ui">
                                <div class="left">
                                    <div style="display:block;">
                                        @if(isset($answer["70"]))
                                            <button id="drawButton" onclick="timer()"
                                                    type="button"
                                                    class="btn-draw-timer-nav disabled">
                                                그리기 완료
                                            </button>
                                        @else
                                            <button id="drawButton" onclick="timer()"
                                                    type="button"
                                                    class="btn-draw-timer-nav ready">
                                                그리기 시작
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="right">
                                    <div id="timerBox"class="draw-timer-value disabled">
                                        <div id="timerText" class="number">
                                            @if(isset($answer["70"]))
                                                {{$answer["70"]}}
                                            @else
                                                00:00
                                            @endif
                                        </div>
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
                            <input type="hidden"
                                   class="hiddenTimer" id="questions70" name="questions70"
                                   @if(isset($answer["70"]))
                                       value="{{$answer["70"]}}"
                                   @endif />
                            <div class="form-group">
                                <div class="form-group-cell">
                                    <div class="form-group-item">
                                        <div class="form-item-label">그림을 그리는 순서가 어떻게 되나요?<em class="need">*</em></div>
                                        <div class="form-item-data">
                                            <input
                                                id="questions71" name="questions71"
                                                @if(isset($answer["71"]))
                                                    value="{{$answer["71"]}}"
                                                @endif
                                                type="text" placeholder="예) 뿌리-줄기-가지-수관"
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
                                                id="questions72" name="questions72"
                                                @if(isset($answer["72"]))
                                                    value="{{$answer["72"]}}"
                                                @endif
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
                    <a href='javascript:checkSubmit("false")' class="btn btn-orange btn-large-size btn-page-action">다음으로</a>
                </div>
            </div>
        </div>
    </form>
</section>
<script>
    function popupSaveAction() {
        checkSubmit("true");
    }

    function checkSubmit(isClose){
        var queryString = $("form[name=CTRFrom]").serialize() ;
        queryString = queryString + "&isClose="+isClose;

        var isSubmit = true;

        if ( isClose === "false") {
            isSubmit = (checkQuestionsTimer() && isSubmit);
            isSubmit = (checkQuestionsOrder() && isSubmit);
            isSubmit = (checkQuestionsCount() && isSubmit);
        }

        if (isSubmit) {
            $.ajax({
                type:'POST',
                url:'/HTPSave/{{$counselingPK}}',
                data: queryString,
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
    }

    function checkQuestionsTimer() {
        var questions = $("#questions70").val();
        $("#cardBox").removeClass("valid-error");
        if (questions === "") {
            $("#cardBox").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkQuestionsOrder() {
        var questions = $("#questions71").val();
        $("#questions71").removeClass("valid-error");
        if (questions === "") {
            $("#questions71").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkQuestionsCount() {
        var questions = $("#questions72").val();
        $("#questions72").removeClass("valid-error");
        if (questions === "") {
            $("#questions72").addClass("valid-error");
            return false;
        }
        return true;
    }

    function clearFrom() {
        $("#questions70").val("");
        $("#questions71").val("");
        $("#questions72").val("");
    }
</script>
<script src="/mobile/assets/js/CTRTimer.js?v={{JS_VERSION}}"></script>
@if(isset($answer["70"]))
    <script>
        paintingCompleteTimer();
    </script>
@endif

@include('/mobile/common/savePopup')
@include('/mobile/common/end')

