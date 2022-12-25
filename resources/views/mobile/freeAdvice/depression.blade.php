@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "우울",
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
    <form name="depressionFrom">
        <input type="hidden" value="{{$step}}" name="step">
        <div class="page-contents">
            <div class="advice-survey-write">
                @if ($step == "depressionStep1")
                <div class="basic-data-group">
                    <div class="point-note actived">
                        <div class="btn-point-note-nav"><em>실시 방법</em></div>
                        <div class="point-note-desc"><div class="txt">아이의 상태를 3개 문장 중 하나에 표시합니다.<br>아이가 직접 답변을 선택하도록 해주세요.</div></div>
                    </div>
                </div>
                @endif
                <div class="basic-data-group">
                    <div class="survey-group">
                        @foreach($questions as $questionsRow)
                        <div class="survey-items">
                            <div class="item-title">{!! $questionsRow->questions !!}</div>
                            <div class="item-data">
                                <div class="form-survey-check">
                                    <div class="form-survey-vertical-inputs">
                                        <label class="form-checkbox-buttons">
                                            <input
                                                class="q-radio-box"
                                                type="radio"
                                                name="questions{{$questionsRow->questionsPK}}"
                                                value="{{$options[($questionsRow->questionsPK)][0]["value"]}}"
                                                @if(isset($answer[$questionsRow->questionsPK]))
                                                    @if($answer[$questionsRow->questionsPK]->answer ==
                                                        $options[($questionsRow->questionsPK)][0]["value"])
                                                        checked
                                                    @endif
                                                @endif
                                            >
                                            <em>{{$options[($questionsRow->questionsPK)][0]["content"]}}</em>
                                        </label>
                                        <label class="form-checkbox-buttons">
                                            <input
                                                class="q-radio-box"
                                                type="radio"
                                                name="questions{{$questionsRow->questionsPK}}"
                                                value="{{$options[($questionsRow->questionsPK)][1]["value"]}}"
                                                @if(isset($answer[$questionsRow->questionsPK]))
                                                    @if($answer[$questionsRow->questionsPK]->answer ==
                                                        $options[($questionsRow->questionsPK)][1]["value"])
                                                        checked
                                                  @endif
                                                @endif
                                            >
                                            <em>{{$options[($questionsRow->questionsPK)][1]["content"]}}</em>
                                        </label>
                                        <label class="form-checkbox-buttons">
                                            <input
                                                class="q-radio-box"
                                                type="radio"
                                                name="questions{{$questionsRow->questionsPK}}"
                                                value="{{$options[($questionsRow->questionsPK)][2]["value"]}}"
                                                @if(isset($answer[$questionsRow->questionsPK]))
                                                    @if($answer[$questionsRow->questionsPK]->answer ==
                                                        $options[($questionsRow->questionsPK)][2]["value"])
                                                        checked
                                                    @endif
                                                @endif
                                            >
                                            <em>{{$options[($questionsRow->questionsPK)][2]["content"]}}</em>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="page-bottom-ui">
                    <a id="nextButton" class="btn btn-orange btn-large-size btn-page-action disabled">다음으로</a>
                </div>
            </div>
        </div>
    </form>
</section>
<script>
    checkFormSubmit();
    $(".q-radio-box").on('click',function (){
        checkFormSubmit();
    });

    function checkFormSubmit() {
        if($(".q-radio-box").length/3 === $("input[class='q-radio-box']:checked").length ) {
            $("#nextButton").removeClass("disabled");
            $("#nextButton").attr("href",'javascript:submitForm(false);');
        }
    }

    function popupSaveAction() {
        submitForm(true);
    }

    function submitForm(isClose) {
        var queryString = $("form[name=depressionFrom]").serialize() ;
        queryString = queryString + "&isClose="+isClose;
        $.ajax({
            type:'POST',
            url:'/depression/{{$counselingTemplatePK}}',
            data: queryString,
            async: false,
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            success:function(json){
                var data = JSON.parse(json);
                if ( data.status === "success" ) {
                    if (isClose) {
                        location.href = '/';
                    } else {
                        location.href = data.nextStep;
                    }
                } else {
                    alert(data.message);
                }
            }
        });
    }
</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

