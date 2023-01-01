@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => true,
    "isShowCloseButton" => true,
    "title" => "행동 관찰",
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
        <div class="page-contents page-write">
            <div class="advice-request-write">
                <div class="survey-group">
                    @foreach($questions as $questionsRow)
                    <div class="survey-items">
                        <div class="item-title">{{$questionsRow->questions}}</div>
                        <div class="item-data">
                            <div class="form-button-group">
                                <div class="form-button-inner">
                                    <label class="form-button">
                                        <input
                                            class="behaviorAnswer"
                                            type="radio"
                                            name="questions{{$questionsRow->questionsPK}}"
                                            @if(isset($answer[$questionsRow->questionsPK]))
                                                @if($answer[$questionsRow->questionsPK] == "Y")
                                                    checked
                                                @endif
                                            @endif
                                            value="Y">
                                        <em>예</em>
                                    </label>
                                    <label class="form-button">
                                        <input
                                            class="behaviorAnswer"
                                            type="radio"
                                            name="questions{{$questionsRow->questionsPK}}"
                                            @if(isset($answer[$questionsRow->questionsPK]))
                                                @if($answer[$questionsRow->questionsPK] == "N")
                                                   checked
                                               @endif
                                            @endif
                                            value="N">
                                        <em>아니오</em>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
    $(".behaviorAnswer").on('click',function (){
        checkFormSubmit();
    });

    function checkFormSubmit() {
        if($(".behaviorAnswer").length/2 === $("input[class='behaviorAnswer']:checked").length ) {
            $("#nextButton").removeClass("disabled");
            $("#nextButton").attr("href",'javascript:checkSubmit("false");');
        }
    }

    function popupSaveAction() {
        checkSubmit("true");
    }

    function checkSubmit(isClose){
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

