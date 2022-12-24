@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "불안",
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
                @if ($step == "anxietyStep1")
                <div class="basic-data-group">
                    <div class="point-note actived">
                        <div class="btn-point-note-nav"><em>실시 방법</em></div>
                        <div class="point-note-desc"><div class="txt">지난 한 주 동안 불안을 경험한 정도에 가까운 쪽에 표시합니다. 아이가 직접 답변을 선택하도록 해주세요.</div></div>
                    </div>
                </div>
                @endif
                <div class="basic-data-group">
                    <div class="survey-group">
                        @foreach($questions as $questionsRow)
                            <div class="survey-items">
                                <div class="item-title">{{$questionsRow->questions}}</div>
                                <div class="item-data">
                                    <div class="form-survey-check">
                                        <div class="form-survey-horizontal-inputs">
                                            <input type="hidden" class="hidden"
                                               name="questions{{$questionsRow->questionsPK}}"
                                                @if(isset($answer[$questionsRow->questionsPK]))
                                                    value="{{$answer[$questionsRow->questionsPK]->answer}}"
                                                @else
                                                    value=""
                                                @endif
                                            >
                                            <div class="form-survey-btns">
                                                <button type="button" class="btn-survey-nav"><em>0</em></button>
                                                <button type="button" class="btn-survey-nav"><em>1</em></button>
                                                <button type="button" class="btn-survey-nav"><em>2</em></button>
                                                <button type="button" class="btn-survey-nav"><em>3</em></button>
                                            </div>
                                            <div class="bar"></div>
                                        </div>
                                        <div class="form-survey-labels"><div>전혀 느끼지<br>않는다</div><div>심하게<br>느꼈다</div></div>
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
    $(function(){
        $(document).on('click' , '.btn-survey-nav' , function(){
            var $parent = $(this).parents('.form-survey-horizontal-inputs');
            var $index = $(this).index() ;
            $parent.removeClass('check1 check2 check3 check4').addClass('check' + ($index + 1) );
            $parent.find('input').val($index);
            checkLoadData();
        });

        checkLoadData();
    });

    function checkLoadData(){
        var inputLength = $(".hidden").length;
        var checkOptionLength = 0;
        $('.survey-items').each(function(){
            if($(this).find('input.hidden').val() != ''){
                checkOptionLength++;
                var $index = parseInt($(this).find('input.hidden').val());
                $(this).find('.form-survey-horizontal-inputs').removeClass('check1 check2 check3 check4').addClass('check' + ($index + 1) );
            };
        });

        if ( inputLength === checkOptionLength) {
            $("#nextButton").removeClass("disabled");
            $("#nextButton").attr("href",'javascript:submitForm(false);');
        }
    };
</script>
<script>

    function popupSaveAction() {
        submitForm(true);
    }

    function submitForm(isClose) {
        var queryString = $("form[name=depressionFrom]").serialize() ;
        $.ajax({
            type:'POST',
            url:'/anxiety/{{$counselingTemplatePK}}',
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

