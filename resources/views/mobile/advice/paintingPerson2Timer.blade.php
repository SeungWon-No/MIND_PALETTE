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
                        <div class="card-header"><h3 class="item-subject">Person : 사람2</h3><div class="icon icon-person-white"></div></div>
                        <div class="card-body">
                            <div class="item-desc">아이에게 A4용지를 세로로 주면서
                                <strong class="font-color-red">“다른 성별의 사람을 그리세요"</strong> 라고 안내해줍니다.
                                아이가 편안하게 집중해서 그릴 수 있도록 환경을 만들어주며, 아이의 질문엔
                                <strong class="font-color-red">“하고 싶은 대로 하면 된다"</strong> 라고 안내해줍니다.
                            </div>
                            <div class="draw-timer-info">
                                <div class="txt" style="display:block;">그리기 시작 버튼을 터치하면 타이머가 실행됩니다.</div>
                                <div class="txt" style="display:block;">버튼을 터치하면 타이머가 이어서 진행됩니다.</div>
                            </div>
                            <div class="draw-timer-ui">
                                <div class="left">
                                    <div style="display:block;">
                                        @if(isset($answer["98"]))
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
                                            @if(isset($answer["98"]))
                                                {{$answer["98"]}}
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
                                   class="hiddenTimer" id="questions98" name="questions98"
                                   @if(isset($answer["98"]))
                                       value="{{$answer["98"]}}"
                                   @endif />
                            <div class="form-group">
                                <div class="form-group-cell">
                                    <div class="form-group-item">
                                        <div class="form-item-label">그림을 그리는 순서가 어떻게 되나요?<em class="need">*</em></div>
                                        <div class="form-item-data">
                                            <input
                                                id="questions89" name="questions89"
                                                @if(isset($answer["89"]))
                                                    value="{{$answer["89"]}}"
                                                @endif
                                                type="text" placeholder="예) 얼굴-몸통-팔-다리-발"
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
                                                id="questions90" name="questions90"
                                                @if(isset($answer["90"]))
                                                    value="{{$answer["90"]}}"
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
        var questions = $("#questions98").val();
        $("#cardBox").removeClass("valid-error");
        if (questions === "") {
            $("#cardBox").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkQuestionsOrder() {
        var questions = $("#questions89").val();
        $("#questions89").removeClass("valid-error");
        if (questions === "") {
            $("#questions89").addClass("valid-error");
            return false;
        }
        return true;
    }

    function checkQuestionsCount() {
        var questions = $("#questions90").val();
        $("#questions90").removeClass("valid-error");
        if (questions === "") {
            $("#questions90").addClass("valid-error");
            return false;
        }
        return true;
    }

    function clearFrom() {
        $("#questions98").val("");
        $("#questions89").val("");
        $("#questions90").val("");
    }
</script>
<script src="/mobile/assets/js/CTRTimer.js?v={{JS_VERSION}}"></script>
@if(isset($answer["98"]))
    <script>
        paintingCompleteTimer();
    </script>
@endif

@include('/mobile/common/savePopup')
@include('/mobile/common/end')

