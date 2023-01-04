@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "기질 검사",
    "isShowProgress" => true,
    "progressValue" => $progressWidth
])
<script>
    function pageClose(){
        pop.open('savePop');
    }
</script>
<section id="container" class="page-body">
    <form name="CTRFrom">
        @csrf
        <div class="page-contents">
            <div class="advice-request-write">
                <div class="basic-data-group">
                    <div class="survey-group">
                        @foreach($questions as $questionsRow)
                            <div class="survey-items">
                                <div class="item-title">{{$questionsRow->questions}}</div>
                                <div class="item-data">
                                    <div class="form-survey-check">
                                        <div class="form-survey-horizontal-inputs six">
                                            <input type="hidden" class="hidden"
                                                   name="questions{{$questionsRow->questionsPK}}"
                                                   @if(isset($answer[$questionsRow->questionsPK]))
                                                       @if(isset($scoreIndex["questions".$questionsRow->questionsPK]))
                                                           value="{{$scoreIndex["questions".$questionsRow->questionsPK][($answer[$questionsRow->questionsPK]-1)]}}"
                                                       @else
                                                           value="{{$answer[$questionsRow->questionsPK]}}"
                                                       @endif
                                                   @else
                                                       value=""
                                                @endif
                                            >
                                            <div class="form-survey-btns">
                                                <button type="button" class="btn-survey-nav"><em>1</em></button>
                                                <button type="button" class="btn-survey-nav"><em>2</em></button>
                                                <button type="button" class="btn-survey-nav"><em>3</em></button>
                                                <button type="button" class="btn-survey-nav"><em>4</em></button>
                                                <button type="button" class="btn-survey-nav"><em>5</em></button>
                                            </div>
                                            <div class="bar"></div>
                                        </div>
                                        <div class="form-survey-labels"><div>절대 그렇지<br>않음</div><div>항상<br>그렇다</div></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- btn클래스에 disabled클래스 추가시 비활성화 표현 -->
                <div class="page-bottom-ui"><a id="nextButton" class="btn btn-orange btn-large-size btn-page-action disabled">다음으로</a></div>
            </div>
        </div>
    </form>
</section>
<script>
    $(function(){
        $(document).on('click' , '.btn-survey-nav' , function(){
            var $parent = $(this).parents('.form-survey-horizontal-inputs');
            var $index = $(this).index() ;
            $parent.removeClass('check1 check2 check3 check4 check5').addClass('check' + ($index + 1) );
            $parent.find('input').val($index+1);
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
                $(this).find('.form-survey-horizontal-inputs').removeClass('check1 check2 check3 check4 check5').addClass('check' + ($index) );
            };
        });

        if ( inputLength === checkOptionLength) {
            $("#nextButton").removeClass("disabled");
            $("#nextButton").attr("href",'javascript:submitForm(false);');
        }
    };


    function popupSaveAction() {
        submitForm(true);
    }

    function submitForm(isClose) {
        var queryString = $("form[name=CTRFrom]").serialize() ;
        queryString = queryString + "&isClose="+isClose;
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
</script>
@include('/mobile/common/savePopup')
@include('/mobile/common/end')

